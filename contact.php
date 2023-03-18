<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $sql="insert into tblcontact(Name,Email,Message) values(:name,:email,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
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

    <section class="register" id="register">

        <h1 class="heading"> <span>CONTACT</span> US </h1>

        <form action="" method="post">
            <div class="inputBox">
                <input type="text" name="name" placeholder="name">
                <input type="email" name="email" placeholder="email">
            </div>
            <textarea name="message" placeholder="your message" id="" cols="20" rows="8"></textarea>
            <input type="submit" name="submit" value="send message" class="btn">
        </form>

    </section>

    <?php
    include 'includes/footer.php';
?>


</body>

</html>