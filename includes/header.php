<?php 
session_start();
error_reporting(0);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="cwh/css/style.css">

    <style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #222;
        font-size: 1px;
        line-height: 1.5;
    
        min-width: 245px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      /* align-items: center; */
        display: block;
        /* font-size: 1rem; */
    }
    </style>
</head>

<body>
    <header class="header">

        <a href="index.php" class="logo"><span>O</span>BBS</a>

        <nav class="navbar">
            <a href="index.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="gallery.php">GALLERY</a>
            <a href="services.php">SERVICES</a>
            <!-- <a href="contact.php">EVENTS</a> -->
            <a href="contact.php">CONTACT US</a>


            <?php  if (strlen($_SESSION['obbsuid']!=0)) {?>
            <div class="dropdown">
                <a href="">PROFILE</a>
                <ul class="dropdown-content">
                    <a class="dropdown-item" href="profile.php">PROFILE</a><br>
                    <a class="dropdown-item" href="bookinghistory.php">BOOKING HISTORY</a><br>
                    <a class="dropdown-item" href="change_pwd.php">CHANGE PASSWORD</a><br>
                    <a class="dropdown-item" href="logout.php">LOGOUT</a><br>
                </ul>
            </div>
            <?php } ?>

            <?php if (strlen($_SESSION['obbsuid']==0)) {?>
            <!-- <a href="services.php">SERVICES</a> -->
            <a href="admin_login.php">ADMIN</a>
            <?php } ?>

        </nav>

        <div id="menu-bars" class="fas fa-bars"></div>
    </header>
</body>

</html>