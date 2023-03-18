<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$eid=$_GET['editid'];
    $bookingid=$_GET['bookingid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
  

$sql= "update tblbooking set Status=:status,Remark=:remark where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

 $query->execute();

  echo '<script>alert("Status has been updated")</script>';
 echo "<script>window.location.href ='all_booking.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <!-- header section starts  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- header section ends -->

    <div class="content">

        <!-- Register Forms -->
        <h2 class="heading">Update Booking</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Bootstrap Register -->
                <div class="block block-themed">
                    <div class="register">

                        <?php
              $eid=$_GET['editid'];

$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbooking.BookingID,tblbooking.BookingDate,tblbooking.BookingFrom,tblbooking.BookingTo,tblbooking.EventType,tblbooking.Numberofguest,tblbooking.Message, tblbooking.Remark,tblbooking.Status,tblbooking.UpdationDate,tblservice.ServiceName,tblservice.SerDes,tblservice.ServicePrice from tblbooking join tblservice on tblbooking.ServiceID=tblservice.ID join tbluser on tbluser.ID=tblbooking.UserID  where tblbooking.ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <table class="table">
                            <tr>
                                <th colspan="5" style="text-align: center;font-size: 25px;color: blue;">Booking Number:
                                    <?php  echo $row->BookingID;?>

                                </th>
                            </tr>
                            <tr>
                                <th>Client Name</th>
                                <td><?php  echo $row->FullName;?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?php  echo $row->MobileNumber;?></td>
                            </tr>


                            <tr>

                                <th>Email</th>
                                <td><?php  echo $row->Email;?></td>
                            </tr>
                            <tr>
                                <th>Booking From</th>
                                <td><?php  echo $row->BookingFrom;?></td>
                            </tr>

                            <tr>
                                <th>Booking To</th>
                                <td><?php  echo $row->BookingTo;?></td>
                            </tr>
                            <tr>
                                <th>Number of Guest</th>
                                <td><?php  echo $row->Numberofguest;?></td>
                            </tr>

                            <tr>

                                <th>Event Type</th>
                                <td><?php  echo $row->EventType;?></td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td><?php  echo $row->Message;?></td>
                            </tr>
                            <tr>

                                <th>Service Name</th>
                                <td><?php  echo $row->ServiceName;?></td>
                            </tr>

                            <tr>
                                <th>Service Price</th>
                                <td>$<?php  echo $row->ServicePrice;?></td>
                            </tr>
                            <tr>
                                <th>Apply Date</th>
                                <td><?php  echo $row->BookingDate;?></td>
                            </tr>

                            <tr>

                                <th>Order Final Status</th>

                                <td> <?php  $status=$row->Status;

if($row->Status=="Approved")
{
echo "Approved";
}

if($row->Status=="Cancelled")
{
echo "Cancelled";
}


if($row->Status=="")
{
echo "No Response Yet";
}


 ;?>
                                </td>
                            </tr>
                            <tr>
                                <th>Admin Remark</th>
                                <?php if($row->Status==""){ ?>

                                <td><?php echo "Not Updated Yet"; ?></td>
                                <?php } else { ?> <td><?php  echo htmlentities($row->Remark);?>
                                </td>
                                <?php } ?>
                            </tr>



                            <?php $cnt=$cnt+1;}} ?>


                        </table>

                        <?php 
if ($row->Status=="")
{
?>
                        <div>
                            <section class="register" id="register">
                                <form method="post" name="submit">
                                    <div class="inputBox">
                                        <textarea name="remark" placeholder="your remark" id="" cols="15"
                                            rows="4"></textarea>
                                        <select >
                                            <option value="Approved" selected="true">Approved</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>


                                    </div>
                                    <button class="btn" name="submit">UPDATE</button><br>

                                </form>
                            </section>

                        </div>



                        <?php } ?>






                    </div>
                    <!-- END Bootstrap Register -->
                </div>

            </div>
        </div>







        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- custom js file link  -->
        <script src="../js/admin_script.js"></script>

        <?php include '../components/message.php'; ?>

</body>

</html>
<?php }  ?>