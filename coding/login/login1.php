<?php
$login = false;
if(isset($_POST['phone_login'])){
    require_once 'connection.php';
    /** @var mysqli $conn */
    $phone_login = $_POST["phone_login"];
    $password = $_POST["password_login"]; 

    $sql = "Select * from kj where Phone='$phone_login'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // $sql2 = "Select CustomerID from kj where Phone='$phone_login' and Password='$password'";
    // $result2 = mysqli_query($conn, $sql2);
    // while ($row0 = mysqli_fetch_row($result2)) {
    //     $id = $row0[0];
    // }

    if ($num == 1){
        while($row = mysqli_fetch_assoc($result)){
            $password_ok = false;
            if(password_verify($password,$row['Password'])){
                $password_ok = true;
            } elseif ($password === $row['Password']) {
                // legacy plain-text password support; re-hash the password for future logins
                $password_ok = true;
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $updateSql = "UPDATE kj SET Password='$newHash' WHERE Phone='$phone_login'";
                mysqli_query($conn, $updateSql);
            }

            if ($password_ok) {
                $sql2 = "Select CustomerID from kj where Phone='$phone_login'";
                $result2 = mysqli_query($conn, $sql2);
                while ($row0 = mysqli_fetch_row($result2)) {
                    $id = $row0[0];
                }

                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['Phone'] = $phone_login;   
                $_SESSION['id'] = $id;            
                header("location: ..\home\home-Copy.php");
                exit;
            } else {
                showError("Wrong Phone number or password");
            }
        }
    }       
    else{
        showError("Wrong Phone number or password");
        echo '<script> window.location = "../login/login.php"; </script>';

    }
    mysqli_close($conn);
} 
?>