<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['signup']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret="select Email from tbluser where Email=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Scuccessfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('Email-id already exist. Please try again');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
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

    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
}   

</script>

</head>

<body>
<?php
    include 'includes/header.php';
    ?>

    <section class="register" id="register">

        <h1 class="heading"> <span>REGISTER</span> HERE </h1>

        <form method="post" name="signup" onsubmit="return checkpass();">
            <div class="inputBox">
             <input type="text" name="fname" placeholder="User Name" required="true">
             <input type="email" name="email" placeholder="E-mail" required="true">
             <input type="text" name="mobno" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
             <input type="password"  name="password" placeholder="Password" required="true" id="password1">
             <input type="password"  name="confirmpassword" placeholder="Confirm Password" required="true" id="password2">
            </div>
            <button class="btn" name="signup">SUBMIT</button><br>
            <a1>Already have an account?</a1>
            <a href="login.php">LOGIN HERE</a>
           
        </form>
        
    
    </section>


    
</body>
</html>