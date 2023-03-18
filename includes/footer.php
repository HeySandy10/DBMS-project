<?php
include('includes/dbconnection.php');
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
</head>

<body>
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>branches</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Mysuru </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Bengaluru </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Mumbai </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="index.php"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="services.php"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="about.php"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="gallery.php"> <i class="fas fa-arrow-right"></i> gallery </a>
            <a href="contact.php"> <i class="fas fa-arrow-right"></i> contact us </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <a href="#"> <i class="fas fa-phone"></i><?php  echo htmlentities($row->MobileNumber);?></a>
            <a href="#"> <i class="fas fa-envelope"></i><?php  echo htmlentities($row->Email);?></a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> <?php  echo htmlentities($row->PageDescription);?></a>
            <?php $cnt=$cnt+1;}} ?>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        </div>

    </div>

    <div class="credit"> created by <span>TAMBI</span> | all rights reserved </div>

</section>
</body>

</html>