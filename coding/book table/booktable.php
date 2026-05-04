<?php 
include '..\login\session_check.php';
if(isset($_POST['submit'])){
    $sql="INSERT INTO `table_booking`(`Name`, `Phone_number`, `Email`, `Booking_date`, `Table_no.`) VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[date]',1)";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script> alert("table booked") </script>';
        echo '<script> window.location="../book table/index.php"; </script>';
    }else{
        echo '<script> alert("Some thing wrong...") </script>';
        echo '<script> window.location="../book table/index.php"; </script>';

    }
}
?>