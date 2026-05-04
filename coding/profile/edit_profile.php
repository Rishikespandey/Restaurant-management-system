<?php include '..\login\session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_profile.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <title>edit profile</title>
</head>

<body>
    <?php include '..\home\navbar.php'; ?>
    <div class="container">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn">Edit Profile</button>
            </div>
            <form id="login" action="edit_profile_database.php" method="POST" class="input-group">
                <input type="text" name="name" maxlength="20"  id="phone_login" class="input-field" placeholder="Enter Name" value="<?php
                $sql = "Select Name from kj where Phone='$ph'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_row($result)) {
                    printf("%s \n", $row[0]);
                }
                ?>" required>
                <input type="email" name="email" maxlength="30" id="password_login" class="input-field" placeholder="Enter Email" value="<?php
                $sql = "Select Email from kj where Phone='$ph'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_row($result)) {
                    printf("%s \n", $row[0]);
                }
                ?>" required>
                <button type="submit" class="submit-btn">Submit</button>
            </form>


        </div>
    </div>

</body>

</html>
<!-- <div class="cn">
        <div class="row m-4">
            <h3 class="text-center">
                <!-- EDIT PROFILE -->
<!-- </h3>
        </div>
        <div class="con border border-dark rounded p-5 bg-light">
            <div class="row m-2">
                <h3 class="text-center mb-5">
                    EDIT PROFILE
                </h3>
            </div>
            <div class="row ">
                <div class="col">
                    <form action="edit_profile_database.php" method="POST">
                        <div class="mb-4">
                            <input type="text" class="form-control" name="name" placeholder="
                            <?php
                            $sql = "Select Name from kj where Phone='$ph'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_row($result)) {
                                printf("%s \n", $row[0]);
                            }
                            ?>">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" name="email" placeholder="
                            <?php
                            $sql = "Select Email from kj where Phone='$ph'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_row($result)) {
                                printf("%s \n", $row[0]);
                            }
                            ?>">
                        </div>
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </form>
                </div>
            </div> -->
</div> -->