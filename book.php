<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
  	$bid=$_GET['bookid'];
  	$uid=$_SESSION['obbsuid'];
 $bookingfrom=$_POST['bookingfrom'];
  $bookingto=$_POST['bookingto'];
 $eventtype=$_POST['eventtype'];
 $nop=$_POST['nop'];
 $message=$_POST['message'];
 $bookingid=mt_rand(100000000, 999999999);
$sql="insert into tblbooking(BookingID,ServiceID,UserID,BookingFrom,BookingTo,EventType,Numberofguest,Message)values(:bookingid,:bid,:uid,:bookingfrom,:bookingto,:eventtype,:nop,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':bookingfrom',$bookingfrom,PDO::PARAM_STR);
$query->bindParam(':bookingto',$bookingto,PDO::PARAM_STR);
$query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);
$query->bindParam(':nop',$nop,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your Booking Request Has Been Send. We Will Contact You Soon")</script>';
echo "<script>window.location.href ='bookinghistory.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}
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

    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
    </script>
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>

    <section class="register">

        <h1 class="heading"> <span>BOOK </span> SERVICES</h1>

        <form action="#" method="post">
            <div class="inputBox">
                <a1>Booking from</a1>
                <input type="date" style="font-size: 18px" required="true" name="bookingfrom">
                <a1>Booking to</a1>
                <input type="date" style="font-size: 18px" required="true" name="bookingto">
                <!-- <select type="text" class="inputBox" name="eventtype" placeholder="Event type" required="true"> -->

                <select type="text" class="form-control" name="eventtype" required="true">
                    <option value="">Choose Event Type</option>
                    <?php 

$sql2 = "SELECT * from   tbleventtype ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>
                    <option value="<?php echo htmlentities($row->EventType);?>">
                        <?php echo htmlentities($row->EventType);?></option>
                    <?php } ?>
                </select>

                <input type="number" name="email" placeholder="Number of guests" required="true">
                <textarea required="true" name="message" placeholder="Message" cols="30" rows="8"></textarea>

            </div>


            <button type="submit" class="btn" name="submit">Book Now</button>

        </form>

    </section>


</body>

</html>
<?php } ?>