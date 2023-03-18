<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['odmsaid'];
    $AName=$_POST['adminname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $sql="update tbladmin set AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email where ID=:aid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
     

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
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <!-- header section starts  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- header section ends -->

    <!-- update section starts  -->
    <h3 class="heading">update <span> profile</span></h3>

    <section class="form-container">

        <form action="" method="POST">

            
            <?php
$sql="SELECT * from  tbladmin";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               
      ?>

            <label class="label">Admin Name:</label>
            <input type="text" class="box" name="adminname" value="<?php  echo $row->AdminName;?>" required='true'>

            <label class="label">User Name:</label>
            <input type="text" class="box" name="username" value="<?php  echo $row->UserName;?>" readonly="true">

            <label class="label">Email:</label>
            <input type="email" class="box" name="email" value="<?php  echo $row->Email;?>" required='true'>

            <label class="label">Contact Number:</label>
            <input type="text" class="box" name="mobilenumber" value="<?php  echo $row->MobileNumber;?>" required='true'
                maxlength='10'>

            <label class="label">Admin Registration Date:</label>
            <input type="text" class="box" id="email2" name="" value="<?php  echo $row->AdminRegdate;?>"
                readonly="true">
        

            <button type="submit" class="btn" name="submit">
                <i class="fa fa-plus mr-5"></i> Update
            </button><br>

            <?php $cnt=$cnt+1;}} ?>
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