<?php include '..\login\session_check.php'; ?>
<?php
if(isset($_POST['name'])){
    $sql = "UPDATE `kj` SET `Name`= '$_POST[name]' WHERE CustomerID = $_SESSION[id]";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<script> alert("update successfully") </script>';
        echo '<script> window.location.assign("../profile/profile.php") </script>';
    }else{
        echo '<script> alert("update failed") </script>';
    }
}
// echo $_SESSION['id'];
if(isset($_POST['email'])){
    $sql = "UPDATE `kj` SET `Email`='$_POST[email]' WHERE CustomerID = $_SESSION[id]";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<script> alert("update successfully") </script>';
        echo '<script> window.location.assign("../profile/profile.php") </script>';
    }else{
        echo '<script> alert("update failed") </script>';
    }
}

?>