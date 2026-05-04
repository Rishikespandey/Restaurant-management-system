<?php
session_start();
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin']) {
    header('Location: dashboard.php');
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $stmt = mysqli_prepare($conn, "SELECT admin_id, password FROM admin_users WHERE phone = ? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) === 1) {
            mysqli_stmt_bind_result($stmt, $adminId, $hash);
            mysqli_stmt_fetch($stmt);
            if (is_string($hash) && $hash !== '' && password_verify($password, $hash)) {
                $_SESSION['admin_loggedin'] = true;
                $_SESSION['admin_id'] = $adminId;
                mysqli_stmt_close($stmt);
                header('Location: dashboard.php');
                exit;
            }
        }
        mysqli_stmt_close($stmt);
    }
    $message = 'Invalid admin phone or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Hungry Street</title>
    <style>
        body { margin:0; font-family: Arial, sans-serif; background: #eef2ff; display:flex; align-items:center; justify-content:center; min-height:100vh; }
        .login-panel { width: 100%; max-width: 420px; background:#fff; padding:32px; border-radius:16px; box-shadow:0 18px 40px rgba(15,23,42,.12); }
        .login-panel h1 { margin:0 0 20px; font-size:24px; color:#1e3a8a; }
        .login-panel label { display:block; margin:12px 0 6px; font-weight:600; color:#334155; }
        .login-panel input { width:100%; border:1px solid #cbd5e1; border-radius:10px; padding:12px 14px; font-size:15px; }
        .login-panel button { width:100%; margin-top:20px; border:none; background:#1e3a8a; color:#fff; font-size:16px; padding:12px; border-radius:10px; cursor:pointer; }
        .info { font-size:14px; color:#475569; margin-top:14px; }
        .alert { background:#fee2e2; color:#a91c1c; padding:12px 14px; border-radius:10px; margin-bottom:18px; }
    </style>
</head>
<body>
    <div class="login-panel">
        <h1>Admin Login</h1>
        <?php if ($message): ?>
            <div class="alert"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="phone">Admin Phone</label>
            <input id="phone" name="phone" type="tel" required value="1234567890" maxlength="15">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
            <button type="submit">Sign in</button>
        </form>
        <p class="info">Use phone 1234567890 and password Admin@123 to sign in.</p>
    </div>
</body>
</html>
