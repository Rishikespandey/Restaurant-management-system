<?php
if(isset($_POST['phone'])){
    include '..\login\connection.php';
    $password = $_POST['password'];
    $existsql= "select * From `kj` where Phone='$_POST[phone]'";
    $result=mysqli_query($conn, $existsql);
    $num = mysqli_num_rows($result);
    if ($num == 1)
    {
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE `kj` SET `Password`= '$hash' WHERE Phone = '$_POST[phone]';";
        $result = mysqli_query($conn, $sql);
        if($result){
            showError("update successfully");
            echo '<script> window.location.assign("../login/login.php"); </script>';
        }else{
            showError("update Failed");
        }
    }
    else{
        showError("user not exist");
        echo '<script> window.location.assign("../login/forgot_password.php"); </script>';

    }
    mysqli_close($conn);
}
?>