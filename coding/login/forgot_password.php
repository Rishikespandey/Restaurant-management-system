<?php include 'forgot_password_database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login page</title>
    <link rel="stylesheet" href="forgot_password.css">
    <!-- <script src="formValidation.js"></script> -->
</head>
<body>
    
    <div class="container">
        <div class="form-box">
             <div class="button-box">
                 <div id="btn"></div>
                <button type="button" class="toggle-btn">Forgot Password</button>
             </div>
        
        <?php
        function showError($message){
            echo "<script>
            alert('$message');
        </script>";
        }
        ?>
            <form  id="login" onsubmit="return formValidation(this)"  method="POST" class="input-group">
                <input type="number" name="phone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" id="phone_login" class="input-field" placeholder="Enter Phone Number" required>
                <input type="password" name="password" maxlength="20" id="password" class="input-field" placeholder="Enter New Password" required>
                <input type="password" name="cpassword" maxlength="20" id="cpassword" class="input-field" placeholder="Enter confirm Password" required>
                <button type="submit" name="submit" class="submit-btn">Submit</button>
            </form>
           

    </div>
    </div>
</body>
</html>

<script>
function formValidation(){
var pass = document.getElementById("password");
var cpass =document.getElementById("cpassword");
    var letters = /^[A-Za-z]+$/;
    var mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(pass.value.length < 6)
    {
        alert("Password length must be atleast 6 characters ");
        return false;
    }
    else if (pass.value != cpass.value) {
        alert ("\nPassword did not match: Please try again...")
        return false;
    }
    else{
        return true;
    }
}
</script>