<?php session_start(); ?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Banquet Booking System</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php
    include 'includes/header.php';
?>   

<!-- header section ends --> 

 <!--  home section starts  -->

<section class="home" id="home">

    <div class="content">
    <?php if (strlen($_SESSION['obbsuid']==0)) {?>
        <h3>its time to celebrate! </h3>
        <h3>the best <span> event organizers </span></h3>
        <a href="register.php" class="btn">REGISTER HERE</a>
        <a href="login.php" class="btn">LOGIN</a>
    <?php } ?>

    <?php if (strlen($_SESSION['obbsuid']!=0)) {?>
        <h3>Book your <span> event now!</span></h3>
        <a href="services.php" class="btn"> OUR SERVICES</a>
    <?php } ?>

    </div>

    <div class="swiper-container home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/slide-1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-5.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-6.jpg" alt=""></div>
        </div>
    </div>

</section>


<!-- home section ends -->




<!-- footer section starts  -->

<?php
    include 'includes/footer.php';
?>

<!-- footer section ends -->


<div class="theme-toggler">

    <div class="toggle-btn">
        
    </div>

</div>











<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</php>