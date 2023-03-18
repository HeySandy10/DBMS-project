<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['obbsuid'];
    $AName=$_POST['fname'];
    $mobno=$_POST['mobno']; 
 
  $sql="update tbluser set FullName=:name,MobileNumber=:mobno where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
echo "<script>window.location.href ='profile.php'</script>";

     

  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

</head>

<body>

    <!-- header section starts  -->
    <?php
    include 'includes/header.php'; ?>
    <!-- header section ends -->

    <!-- update section starts  -->
    <h3 class="heading">update <span> profile</span></h3>

    <section class="register">

        <form action="" method="POST">
        <div class="inputBox">
        <?php
$uid=$_SESSION['obbsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>


            <label class="label">User Name:</label>
            <input type="text" class="box" name="fname" value="<?php  echo $row->FullName;?>" readonly="true">

            <label class="label">Contact Number:</label>
            <input type="text" class="box" name="mobno" value="<?php  echo $row->MobileNumber;?>" required='true'
                maxlength='10'>

            <label class="label">Email:</label>
            <input type="email" class="box" name="email" value="<?php  echo $row->Email;?>" required='true' readonly title="Email can't be edit">

            

            <label class="label">Registration Date:</label>
            <input type="text" class="box" id="email2" name="password" value="<?php  echo $row->Regdate;?>"
                readonly="true">

                <?php $cnt=$cnt+1;}} ?>
        

            <button type="submit" class="btn" name="submit">
              Update
            </button><br>
            </div>
            </form>   
        

    </section>

    <!-- update section ends -->


















    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js file link  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>
<?php }  ?>
