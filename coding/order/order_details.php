<?php include '..\login\session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order_details.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>order_details</title>
</head>

<body>
    <?php include '..\home\navbar.php'; ?>
    
    <div class="container">
        <h3 class="text-center m-4">ORDER DETAILS</h3>
        <div class="col con mt-5 p-4 border border-dark mb-5">
            <div class="row border-bottom border-dark">
                <div class="col ">
                    <h4 class="text-center">
                        INVOICE
                    </h4>
                </div>

            </div>
            <div class="row border-bottom border-dark py-2">
                <div class="col">
                    <h5>
                        Invoice no. : <?php echo $_POST['orderid']; ?>
                    </h5>
                </div>
                <?php
                                $sql = "SELECT CustomerID FROM `order` WHERE OrderID =$_POST[orderid]";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    $customer_id = $row[0];
                                }
                                // echo $customer_id;
                                ?>
                <div class="col text-end">
                    <h5>
                        Date : <?php
                                $sql = "SELECT Date FROM `order` WHERE OrderID = $_POST[orderid]";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    printf("%s \n", $row[0]);
                                }
                                ?>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="row ps-4">
                    <h5 class="row">
                        Name : <?php
                                $sql = "SELECT Name FROM kj WHERE CustomerID = $customer_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    printf("%s \n", $row[0]);
                                }
                                ?>
                    </h5>
                    <h5 class="row">
                        Phone no. : <?php
                                $sql = "SELECT Phone FROM kj WHERE CustomerID = $customer_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    printf("%s \n", $row[0]);
                                }
                                ?>
                    </h5>
                    <h5 class="row">
                        Email : <?php
                                $sql = "SELECT Email FROM kj WHERE CustomerID = $customer_id";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    printf("%s \n", $row[0]);
                                }
                                ?>
                    </h5>
                </div>
            </div>
            <table class="table text-center border border-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="">S no.</th>
                        <th scope="col">Items</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sr = 0;
                    $total = 0;
                    
                    $sql = "SELECT * from sub_order where OrderID = $_POST[orderid]";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        // $amount = 0;
                        $amount = $row['Price']*$row['Quantity'];
                        $sr = $sr + 1;
                        echo "
                                    <tr>
                                    <th scope='row'>$sr</th>
                                    <td>$row[Item_name]</td>
                                    <td>$row[Quantity]</td>
                                    
                                    <td>₹ $amount</td>
                                  </tr>
                                    ";
                        $total = $total + $row['Quantity'] * $row['Price'];
                    }


                    ?>

                </tbody>
            </table>
            <div class="row mt-5 border-top border-dark pt-4 text-end ">
                <div class="col">
                    <?php 
                    $sql = "SELECT `Payment_status` FROM `order` WHERE OrderID ='$_POST[orderid]';";
                    $result = mysqli_query($conn, $sql);
                    // if($result){
                    //     echo "sucess";
                    // }
                    // else{
                    //     echo "not";
                    // }
                    // echo $result;
                    while ($row = mysqli_fetch_row($result)){
                        $check = $row[0];
                        if($check==0){
                            echo "<h4 class=''col'>
                            Payment Failed
                       </h4>";
                        }else{
                            echo "<h4 class=''col'>
                            Total Amount : ₹ $total
                       </h4>";
                        }
                    }
                    // if()
                    ?>
                    
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-inline">
                    <h5>Items</h5>
                    <h5>Quantity</h5>
                    <h5>Price</h5>
                </div>
            </div> -->
        </div>
    </div>

</body>

</html>