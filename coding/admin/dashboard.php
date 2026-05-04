<?php
session_start();
if (!isset($_SESSION['admin_loggedin']) || !$_SESSION['admin_loggedin']) {
    header('Location: login.php');
    exit;
}
require_once '../login/connection.php';
$conn = get_db_connection();
/** @var mysqli $conn */

function ensureAdminTable(mysqli $conn): void {
    $create = "CREATE TABLE IF NOT EXISTS admin_users (
        admin_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NULL UNIQUE,
        phone VARCHAR(15) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    mysqli_query($conn, $create);

    $phoneColumnResult = mysqli_query($conn, "SHOW COLUMNS FROM admin_users LIKE 'phone'");
    if (!$phoneColumnResult || mysqli_num_rows($phoneColumnResult) === 0) {
        mysqli_query($conn, "ALTER TABLE admin_users ADD COLUMN phone VARCHAR(15) NULL AFTER email");
    }

    $defaultName = 'Hungry Street Admin';
    $defaultEmail = 'admin@hungrystreet.com';
    $defaultPhone = '1234567890';
    $defaultPassword = 'Admin@123';
    $defaultHash = password_hash($defaultPassword, PASSWORD_DEFAULT);

    $safePhone = mysqli_real_escape_string($conn, $defaultPhone);
    $checkResult = mysqli_query($conn, "SELECT admin_id, password FROM admin_users WHERE phone = '$safePhone' LIMIT 1");
    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $row = mysqli_fetch_assoc($checkResult);
        if (!password_verify($defaultPassword, $row['password'])) {
            $safeHash = mysqli_real_escape_string($conn, $defaultHash);
            mysqli_query($conn, "UPDATE admin_users SET password = '$safeHash' WHERE admin_id = " . intval($row['admin_id']));
        }
        return;
    }

    $insert = mysqli_prepare($conn, "INSERT INTO admin_users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    if ($insert) {
        mysqli_stmt_bind_param($insert, 'ssss', $defaultName, $defaultEmail, $defaultPhone, $defaultHash);
        mysqli_stmt_execute($insert);
        mysqli_stmt_close($insert);
    }
}

ensureAdminTable($conn);
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action === 'add_menu') {
        $name = mysqli_real_escape_string($conn, trim($_POST['name']));
        $price = intval($_POST['price']);
        $icon = mysqli_real_escape_string($conn, trim($_POST['icon']));
        $category = mysqli_real_escape_string($conn, trim($_POST['category']));
        $menuidRes = mysqli_query($conn, "SELECT COALESCE(MAX(Menuid),0)+1 AS next_id FROM menu");
        $nextId = 1;
        if ($menuidRes) {
            $row = mysqli_fetch_assoc($menuidRes);
            $nextId = intval($row['next_id']);
        }
        if ($name !== '' && $price > 0) {
            $insert = "INSERT INTO menu (Menuid, Name, Price, Icon, Categories) VALUES ($nextId, '$name', $price, '$icon', '$category')";
            if (mysqli_query($conn, $insert)) {
                $message = 'Menu item added successfully.';
            } else {
                $message = 'Could not add menu item.';
            }
        } else {
            $message = 'Item name and price are required.';
        }
    }
    if ($action === 'delete_user' && isset($_POST['user_id'])) {
        $userId = intval($_POST['user_id']);
        mysqli_query($conn, "DELETE FROM kj WHERE CustomerID = $userId");
        $message = 'User deleted successfully.';
    }
    if ($action === 'delete_menu' && isset($_POST['menu_id'])) {
        $menuId = intval($_POST['menu_id']);
        mysqli_query($conn, "DELETE FROM menu WHERE Menuid = $menuId");
        $message = 'Menu item deleted successfully.';
    }
    if ($action === 'update_admin' && isset($_POST['admin_email'], $_POST['admin_phone'])) {
        $adminId = intval($_POST['admin_id']);
        $adminEmail = mysqli_real_escape_string($conn, trim($_POST['admin_email']));
        $adminPhone = mysqli_real_escape_string($conn, trim($_POST['admin_phone']));
        $update = "UPDATE admin_users SET email = '$adminEmail', phone = '$adminPhone'";
        if (!empty($_POST['admin_password'])) {
            $newHash = password_hash(trim($_POST['admin_password']), PASSWORD_DEFAULT);
            $update .= ", password = '$newHash'";
        }
        $update .= " WHERE admin_id = $adminId";
        if (mysqli_query($conn, $update)) {
            $message = 'Admin credentials updated successfully.';
        } else {
            $message = 'Could not update admin credentials.';
        }
    }
    if ($action === 'toggle_payment' && isset($_POST['order_id'])) {
        $orderId = intval($_POST['order_id']);
        $update = "UPDATE `order` SET Payment_status = 1 - Payment_status WHERE OrderID = $orderId";
        mysqli_query($conn, $update);
        $message = 'Payment status updated.';
    }
    if ($action === 'delete_order' && isset($_POST['order_id'])) {
        $orderId = intval($_POST['order_id']);
        mysqli_query($conn, "DELETE FROM sub_order WHERE OrderID = $orderId");
        mysqli_query($conn, "DELETE FROM `order` WHERE OrderID = $orderId");
        $message = 'Order deleted successfully.';
    }
}
ensureAdminTable($conn);
$adminResult = mysqli_query($conn, "SELECT admin_id, name, email, phone FROM admin_users ORDER BY admin_id ASC LIMIT 1");
$adminUser = $adminResult ? mysqli_fetch_assoc($adminResult) : null;
$users = mysqli_query($conn, "SELECT CustomerID, Name, Phone, Email, Date FROM kj ORDER BY CustomerID DESC");
$menuItems = mysqli_query($conn, "SELECT Menuid, Name, Price, Icon, Categories FROM menu ORDER BY Categories, Name");
$orders = [];
$orderRes = mysqli_query($conn, "SELECT o.OrderID, o.CustomerID, o.Amount, o.Date, o.Payment_status, k.Name AS CustomerName, k.Phone FROM `order` o LEFT JOIN kj k ON k.CustomerID = o.CustomerID ORDER BY o.OrderID DESC");
if ($orderRes) {
    while ($row = mysqli_fetch_assoc($orderRes)) {
        $row['items'] = [];
        $orders[$row['OrderID']] = $row;
    }
}
$subRes = mysqli_query($conn, "SELECT OrderID, Item_name, Price, Quantity FROM sub_order ORDER BY OrderID");
if ($subRes) {
    while ($row = mysqli_fetch_assoc($subRes)) {
        if (isset($orders[$row['OrderID']])) {
            $orders[$row['OrderID']]['items'][] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Hungry Street</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="admin-header">
        <div class="brand">Hungry Street Admin Dashboard</div>
        <a class="admin-logout" href="logout.php">Sign out</a>
    </header>
    <div class="container">
        <?php if ($message): ?>
            <div class="alert"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <?php if ($adminUser): ?>
        <div class="card">
            <h2>Admin Account</h2>
            <form method="POST">
                <input type="hidden" name="action" value="update_admin">
                <input type="hidden" name="admin_id" value="<?php echo $adminUser['admin_id']; ?>">
                <div class="form-row">
                    <input type="tel" name="admin_phone" required placeholder="Admin phone" value="<?php echo htmlspecialchars($adminUser['phone']); ?>">
                    <input type="email" name="admin_email" placeholder="Admin email (optional)" value="<?php echo htmlspecialchars($adminUser['email']); ?>">
                </div>
                <div class="form-row" style="margin-top: 12px;">
                    <input type="password" name="admin_password" placeholder="New password (leave blank to keep current)">
                </div>
                <button type="submit">Update Admin</button>
            </form>
        </div>
        <?php endif; ?>
        <div class="card">
            <h2>Users</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Registered</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)): ?>
                            <tr>
                                <td><?php echo $user['CustomerID']; ?></td>
                                <td><?php echo htmlspecialchars($user['Name']); ?></td>
                                <td><?php echo htmlspecialchars($user['Phone']); ?></td>
                                <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                <td><?php echo htmlspecialchars($user['Date']); ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="action" value="delete_user">
                                        <input type="hidden" name="user_id" value="<?php echo $user['CustomerID']; ?>">
                                        <button type="submit" class="action-button danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <h2>Menu Items</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr><th>ID</th><th>Name</th><th>Price</th><th>Icon</th><th>Category</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                        <?php while ($item = mysqli_fetch_assoc($menuItems)): ?>
                            <tr>
                                <td><?php echo $item['Menuid']; ?></td>
                                <td><?php echo htmlspecialchars($item['Name']); ?></td>
                                <td><?php echo $item['Price']; ?></td>
                                <td><?php echo htmlspecialchars($item['Icon']); ?></td>
                                <td><?php echo htmlspecialchars($item['Categories']); ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="action" value="delete_menu">
                                        <input type="hidden" name="menu_id" value="<?php echo $item['Menuid']; ?>">
                                        <button type="submit" class="action-button danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <h2 style="margin-top: 24px;">Add New Menu Item</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add_menu">
                <div class="form-row">
                    <input type="text" name="name" placeholder="Item name" required>
                    <input type="number" name="price" placeholder="Price" required>
                    <input type="text" name="icon" placeholder="Icon filename or URL" required>
                    <select name="category" required>
                        <option value="veg">veg</option>
                        <option value="non-veg">non-veg</option>
                        <option value="chinese">chinese</option>
                        <option value="cheese">cheese</option>
                        <option value="pizza">pizza</option>
                        <option value="desert">desert</option>
                    </select>
                </div>
                <button type="submit">Add Item</button>
            </form>
        </div>
        <div class="card">
            <h2>Orders</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr><th>Order</th><th>Customer</th><th>Phone</th><th>Total</th><th>Date</th><th>Status</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['OrderID']; ?></td>
                                <td><?php echo htmlspecialchars($order['CustomerName']); ?></td>
                                <td><?php echo htmlspecialchars($order['Phone']); ?></td>
                                <td>₹<?php echo $order['Amount']; ?></td>
                                <td><?php echo $order['Date']; ?></td>
                                <td><?php echo $order['Payment_status'] ? 'Paid' : 'Pending'; ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="action" value="toggle_payment">
                                        <input type="hidden" name="order_id" value="<?php echo $order['OrderID']; ?>">
                                        <button type="submit" class="action-button success"><?php echo $order['Payment_status'] ? 'Mark Pending' : 'Mark Paid'; ?></button>
                                    </form>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="action" value="delete_order">
                                        <input type="hidden" name="order_id" value="<?php echo $order['OrderID']; ?>">
                                        <button type="submit" class="action-button danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7" style="background:#f8fafc;">
                                    <strong>Items:</strong>
                                    <?php if (!empty($order['items'])): ?>
                                        <ul style="margin:10px 0 0;padding-left:18px;">
                                            <?php foreach ($order['items'] as $item): ?>
                                                <li><?php echo htmlspecialchars($item['Item_name']); ?> — ₹<?php echo $item['Price']; ?> × <?php echo $item['Quantity']; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <span>No items found.</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
