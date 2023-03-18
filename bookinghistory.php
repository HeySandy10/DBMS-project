<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
   

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

    <section class="service" id="service">

        <h1 class="heading"> BOOKING <span>HISTORY</span> </h1>
        <div class="content">
            <a href="book.php" class="btn">BOOK NOW</a>
        </div>


        <div class="about-top">
            <div class="container">
                <div class="wthree-services-bottom-grids">

                    <!-- <div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s"> -->
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th ></th> -->
                                    <th class="d-none d-sm-table-cell" style="width: 5%;">S.NO</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">BOOKING ID</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">CUSTOMER NAME</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">EMAIL</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">BOOKING DATE</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">STATUS</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">EVENT TYPE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$uid=$_SESSION['obbsuid'];
$sql="SELECT tbluser.FullName,tbluser.Email,tblbooking.BookingID,tblbooking.BookingDate,tblbooking.Status,tblbooking.ID,tblbooking.EventType from tblbooking join tbluser on tbluser.ID=tblbooking.UserID where tblbooking.UserID='$uid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <tr>
                                    <td class="font-w600" style="width: 5%;"><?php echo htmlentities($cnt);?></td>
                                    <td class="font-w600" style="width: 15%;">
                                        <?php  echo htmlentities($row->BookingID);?></td>
                                    <td class="font-w600" style="width: 15%;">
                                        <?php  echo htmlentities($row->FullName);?></td>
                                    <td class="font-w600" style="width: 15%;"><?php  echo htmlentities($row->Email);?>
                                    </td>
                                    <td class="font-w600" style="width: 15%;">
                                        <span
                                            class="badge badge-primary"><?php  echo htmlentities($row->BookingDate);?></span>
                                    </td>
                                    <?php if($row->Status==""){ ?>

                                    <td class="font-w600" style="width: 15%;"><?php echo "Not Updated Yet"; ?></td>
                                    <?php } else { ?>
                                    <td class="d-none d-sm-table-cell">
                                        <span
                                            class="badge badge-primary"><?php  echo htmlentities($row->Status);?></span>
                                    </td>
                                    <?php } ?>
                                    <td class="font-w600" style="width: 15%;">
                                        <?php  echo htmlentities($row->EventType);?></td>
                                   
                                </tr>
                                <?php $cnt=$cnt+1;}} ?>



                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>





    </section>
</body>

</html> <?php }  ?>