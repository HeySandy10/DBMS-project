<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->

<!-- dashboard section starts  -->

<section class="dashboard">
<?php
$sql="SELECT * from  tbladmin";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
?>

   <h1 class="heading">WELCOME <span><?php  echo $row->AdminName;?></span> TO YOUR <span>DASHBOARD</span>
   </h1>

   <div class="box-container">

   

   <div class="box">
   <?php 
$sql ="SELECT ID from tblbooking where Status is null ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalnewbooking=$query->rowCount();
?>
      
      <p>total new bookings</p>
      <h3><?php echo htmlentities($totalnewbooking);?></h3>
      <a href="new_booking.php" class="btn">view </a>
   </div>

   <div class="box">
   <?php 
$sql ="SELECT ID from tblbooking where Status='Approved' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalappbooking=$query->rowCount();
?>
      
      <p>total approved bookings</p>
      <h3><?php echo htmlentities($totalappbooking);?></h3>
      <a href="approved_booking.php" class="btn">view </a>
   </div>

   <div class="box">
   <?php 
$sql ="SELECT ID from tblbooking where Status='Cancelled' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalcanbooking=$query->rowCount();
?>
      
      <p>total cancelled bookings</p>
      <h3><?php echo htmlentities($totalcanbooking);?></h3>
      <a href="cancelled_booking.php" class="btn">view </a>
   </div>

 


   <div class="box">
   <?php 
$sql ="SELECT ID from tblcontact where IsRead is null ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalunreadquery=$query->rowCount();
?>
      
      <p>total unread queries</p>
      <h3><?php echo htmlentities($totalunreadquery);?></h3>
      <a href="unread_queries.php" class="btn">view queries</a>
   </div>

   <div class="box">
   <?php 
$sql ="SELECT ID from tblcontact where IsRead='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalreadquery=$query->rowCount();
?>
      
      <p>total read queries</p>
      <h3><?php echo htmlentities($totalreadquery);?></h3>
      <a href="read_queries.php" class="btn">view queries</a>
   </div>

   <div class="box">
      
   <?php 
$sql ="SELECT ID from tblservice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalserv=$query->rowCount();
?>
      <p>total services</p>
      <h3><?php echo htmlentities($totalserv);?></h3>
      <a href="manage_services.php" class="btn">view services</a>
   </div>

   <div class="box">
   <?php 
$sql ="SELECT ID from tbleventtype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totaleventtype=$query->rowCount();
?>
      
      <p>total Events</p>
      <h3><?php echo htmlentities($totaleventtype);?></h3>
      <a href="manage_event.php" class="btn">view events</a>
   </div>

   <div class="box">
     
      
     <p>Manage admins</p>
     <h3>New Admin</h3>
     <a href="../../ad_register.php" class="btn">Regsiter New</a>
  </div>

</section>


<!-- dashboard section ends -->




















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>
<?php } ?>