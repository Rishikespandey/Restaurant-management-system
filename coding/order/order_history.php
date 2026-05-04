<?php 
include '..\login\session_check.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="order_history.css">
    <title>order_history</title>
</head>

<body>
    <?php include '..\home\navbar.php'; ?>
    <div class="cantainer mb-5">
        <div class="text-center m-4">
            <h2>My orders</h2>
        </div>
        <div class="con">
            <div class="row">
                <div class="row ">
                    <table class="table text-center table-striped border">
                        <thead>
                            <tr>
                                <th scope="col">S no.</th>
                                <th scope="col">OrderID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sr = 0;
                            $sql = "SELECT * from `order` where customerID = $_SESSION[id]";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sr = $sr + 1;
                                $status;
                                if ($row['Payment_status']) {
                                    $status = 'Success';
                                } else {
                                    $status = 'Failed';
                                }
                                echo "
                                    <tr>
                                    <form action='order_details.php' method='POST'>
                                        <th scope='row'>$sr</th>
                                        <td>$row[OrderID]</td>

                                        <td>₹ $row[Amount]</td>
                                        <input type='hidden' name='orderid' value='$row[OrderID]'>
                                        <td>$row[Date]</td>
                                        <td>$status</td>
                                        <td><button class='btn-sm btn-primary'>View details</a></td>
                                        </form>
                                    </tr>
                                    ";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>