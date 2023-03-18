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
    <title>Messages</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <!-- header section starts  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- header section ends -->

    <!-- messages section starts  -->

    <div class="content">




        <!-- Dynamic Table Full Pagination -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="heading"> <span> Read </span>Queries</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">S.NO</th>

                            <th class="d-none d-sm-table-cell" style="width: 15%;">NAME</th>

                            <th class="d-none d-sm-table-cell" style="width: 15%;">EMAIL</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">SENT MESSAGE DATE</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">VIEW</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$sql="SELECT * from tblcontact where IsRead='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <tr>
                            <td class="text-center" style="width: 5%;"><?php echo htmlentities($cnt);?></td>
                            <td class="font-w600" style="width: 15%;"><?php  echo htmlentities($row->Name);?></td>

                            <td class="font-w600" style="width: 15%;"><?php  echo htmlentities($row->Email);?></td>
                            <td class="font-w600" style="width: 15%;">
                                <span class="badge badge-primary"><?php  echo htmlentities($row->EnquiryDate);?></span>
                            </td>

                            <td class="d-none d-sm-table-cell" style="width: 15%;"><a
                                    href="view-user-queries.php?viewid=<?php echo htmlentities ($row->ID);?>"><i
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

    <!-- messages section ends -->
















    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js file link  -->
    <script src="../js/admin_script.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>
<?php }  ?>