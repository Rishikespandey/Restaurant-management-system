<!-- <?php include '..\login\session_check.php'; ?> -->
<?php
if (isset($_POST['contact_us_name'])) {
    // include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';

    // echo "check";
    $name = $_POST['contact_us_name'];
    $email = $_POST['contact_us_Email'];
    $help = $_POST['contact_us_Help'];
    $subject = $_POST["contact_us_subject"];


    $sql = "INSERT INTO `contact_us` (`Name`, `Email`, `Help`, `Subject`, `Date`) VALUES ('$name', '$email','$help', '$subject', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if($result){
        // echo "cehck";
        showError('Feedback submit successfully');
        // echo "<script> alert(); <script>";
        echo '<script>window.location.assign("../contact_us/contact_us.php"); </script>';
    }else{
        echo '<script>alert("Something wrong"); <script>';
    }
    mysqli_close($conn);
}
?>