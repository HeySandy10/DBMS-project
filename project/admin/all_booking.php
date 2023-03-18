<?php
session_start();
error_reporting(0);

// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','obbs');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
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

    <!-- bookings section starts  -->

    <div class="content">




        <!-- Dynamic Table Full Pagination -->
        <div>
            <div>
                <h1 class="heading"><span>total</span> bookings</h1>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;"></th>
                            <th style="width: 10%;">Booking ID</th>
                            <th style="width: 10%;">Cutomer Name</th>
                            <th style="width: 10%;">Mobile Number</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 15%;">Booking Date</th>
                            <th style="width: 10%;">Event</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbooking.ID as bid,tblbooking.BookingID,tblbooking.BookingDate,tblbooking.EventType,tblbooking.Status,tblbooking.ID from tblbooking join tbluser on tbluser.ID=tblbooking.UserID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{              
?>
                        <tr>
                            <td class="text-center" style="width: 5%;"><?php echo htmlentities($cnt);?></td>
                            <td class="font-w600" style="width: 10%;"><?php  echo htmlentities($row->BookingID);?></td>
                            <td class="font-w600" style="width: 10%;"><?php  echo htmlentities($row->FullName);?></td>
                            <td class="font-w600" style="width: 10%;"><?php  echo htmlentities($row->MobileNumber);?>
                            </td>
                            <td class="font-w600" style="width: 11%;"><?php  echo htmlentities($row->Email);?></td>
                            <td class="font-w600" style="width: 15%;">
                                <span class="badge badge-primary"><?php  echo htmlentities($row->BookingDate);?></span>
                            </td>
                            <td class="font-w600" style="width: 10%;"><?php  echo htmlentities($row->EventType);?></td>

                            <?php if($row->Status==""){ ?>

                            <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                            <?php } else { ?>
                            <td style="width: 10%;">
                                <span class="badge badge-primary"><?php  echo htmlentities($row->Status);?></span>
                            </td>
                            <?php } ?>
                            <td style="width: 10%;"><a
                                    href="view-booking-detail.php?editid=<?php echo htmlentities ($row->ID);?>&&bookingid=<?php echo htmlentities ($row->BookingID);?>"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php $cnt=$cnt+1;}} ?>



                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->

        <!-- END Dynamic Table Simple -->
    </div>

    <!-- bookings section ends -->
















    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js file link  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>
<?php }  ?>