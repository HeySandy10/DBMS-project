<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$sername=$_POST['sername'];
$serdes=$_POST['serdes'];
$serprice=$_POST['serprice'];

$sql="insert into tblservice(ServiceName,SerDes,ServicePrice)values(:sername,:serdes,:serprice)";
$query=$dbh->prepare($sql);
$query->bindParam(':sername',$sername,PDO::PARAM_STR);
$query->bindParam(':serdes',$serdes,PDO::PARAM_STR);
$query->bindParam(':serprice',$serprice,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Services has been added.")</script>';
echo "<script>window.location.href ='manage_services.php'</script>";
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
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->
<h3 class="heading"><span>ADD</span> services</h3>
<!-- register section starts  -->

<section class="form-container">
  

   <form action="" method="POST">
   <div class="inputBox">
      <input type="text" name="sername" placeholder="Service Name" maxlength="20" class="box" required >
      <input type="text" name="serdes" placeholder="Servce Description" maxlength="20" class="box" required >
      <input type="text" name="serprice"placeholder="Service Price" maxlength="20" class="box" required >
      <!-- <input type="submit" value="register now" name="submit" class="btn"> -->
       <button type="submit" class="btn" name="submit">Add
                                            </button>
    </div>
   </form>

</section>


<!-- register section ends -->


















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>
<?php }  ?>