<header>
    <div class="navbar">
        <div class="navbar_items position-absolute top-0 end-0">
            <a href="..\profile\profile.php"><img src="..\login\profile.jpg" alt="Profile" title="Profile" class="profile_icone"></a>
            <a href="..\contact_us\contact_us.php">CONTACT US</a>
            <a href="..\menu\menu.php">MENU</a>
            <a href="..\about us\about.php">ABOUT US</a>
            <a href="..\home\home-Copy.php" class="home">HOME</a>
        </div>
    </div>
</header>

<style>
    .navbar {
        margin: auto;
        height: 80px;
        overflow: hidden;
        background-color: #000;
    }

    .navbar a {
        float: right;
        color: #f2f2f2;
        text-align: center;
        margin: 20px;
        padding: 5px 10px;
        text-decoration: none;
        font-size: 20px;
    }

    .navbar a:hover {
        background-color: #ffa500;
        border-radius: 10%;
        color: #fff;
    }

    .profile_icone {
        height: 30px;
        width: 30px;
        border-radius: 100%;
    }
    .header{
    min-height: 100vh;
    background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.4)),
    url('back.jpg') center/cover no-repeat fixed;
    margin-top: auto;

}
</style>