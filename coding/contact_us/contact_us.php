<?php 
include '..\login\session_check.php'; 
include 'contact_data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contact us.css">
</head>
<body>
<div class="cu">
<?php include '..\home\navbar.php'; ?>
    <!-- <div class="text">
        <h3>— STAY IN TOUCH WITH US —</h3>
        <h1>CONTACT INFORMATION</h1>
    </div> -->
</div>
<div class="contant">
    <div class="contact_us_text">
    <h3>— STAY IN TOUCH WITH US —</h3>
        <h2>CONTACT US</h2>
    </div>
    <div class="container">
    <?php
        function showError($message){
            echo "<script>
            alert('$message');
        </script>";
        }
        ?>
        <form  method="POST">
            <div>
                <input type="text" id="contact_us_name" maxlength="20" name="contact_us_name" placeholder="Your name*" required>
            </div>
            <div>
                <input type="email" class="box" id="email" maxlength="30" name="contact_us_Email" placeholder="Your Email Address*" required>
            </div>
            <div>
                <select id="Help" name="contact_us_Help">
                    <option value="I need help with my online order">I need help with my online order</option>
                    <option value="I found incorrect/outdated information on a page">I found incorrect/outdated information on a page</option>
                    <option value="There is a photo/review that is bothering me and I would like to report it.">There is a photo/review that is bothering me and I would like to report it.</option>
                    <option value="The website are not working properly">The website are not working properly</option>
                    <option value="I would like to give feedback/suggestions.">I would like to give feedback/suggestions.</option>
                    <option value="other">Other</option>
                </select>
            <div>
                <textarea id="subject"  name="contact_us_subject" placeholder="Write something.." maxlength="250" style="height:200px" required></textarea>
            </div>
            <button type="submit"  class="submit">Submit</button>
        </form>
    </div>
    <div class="issue_help">
        <div class="issue_with_live_order">
            <h2>Issue with your live order?</h2>
            <p>Click on the 'Contact us' section in your web page to connect to our customer support team for help</p>
        </div>
    </div>
    
</div>
</body> 
</html>   

<script>
function sub(){
    const email = document.getElementById("email");
    var mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!email.value.match(mail_format))
        {
            alert("You have entered an invalid email address!");
            email.focus();
            return false;
        }
        else{
            return true;
        }
}
</script>
