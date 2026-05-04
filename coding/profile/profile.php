<?php include '..\login\session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <?php include '..\home\navbar.php'; ?>
    <div class="wrapper">
        <div class="left">
            <!-- <img src="" alt="user" width="100"> -->
            <div class="col mb-5">
                <h5>User Name</h5><?php
                                    $sql = "Select Name from kj where Phone='$ph'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_row($result)) {
                                        printf("%s \n", $row[0]);
                                    }
                                    ?>
            </div>
            <div class="row">
                <div class="col">
                    <a href="edit_profile.php" class="">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="info">
                <h4>Information</h4>
                <div class="info_data">
                    <div class="data">
                        <h6>Email</h6>
                        <p><?php
                            $sql = "Select Email from kj where Phone='$ph'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_row($result)) {
                                printf("%s \n", $row[0]);
                            }
                            ?></p>
                    </div>
                    <div class="data">
                        <h6>Phone</h6>
                        <p><?php echo $_SESSION['Phone'] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="..\order\order_history.php">My Orders</a>
                </div>
                <div class="col">
                    <a href="..\login\logout.php">Log out</a>
                    <div>
                    </div>

                </div>
            </div>

</body>

</html>