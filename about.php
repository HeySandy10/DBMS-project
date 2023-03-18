<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
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


    <section class="about" id="about">

        <h1 class="heading"><span>why choose</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="images/about-img.jpg" alt="">
            </div>

            <div class="content">
                <h3>we will give a very special celebration for you</h3>
            
                <?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                <p><?php  echo htmlentities($row->PageTitle);?></p>
                <h1><?php  echo $row->PageDescription;?></h1>
                <?php $cnt=$cnt+1;}} ?>
                <a href="contact.php" class="btn">contact us</a>
            </div>

        </div>

    </section>

    <?php
    include 'includes/footer.php';
?>
</body>

</html>