<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odmsaid']==0)) {
  header('location:logout.php');
  } else{

$vid=$_GET['viewid'];
$isread=1;
$sql="update tblcontact set IsRead=:isread where ID=:vid";
$query=$dbh->prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();

?>


<!doctype html>
<html lang="en" > 
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

    <?php include '../components/admin_header.php'; ?>
        
        <div >
           


            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="heading">View <span>Queries</span> </h3>
                        </div>
                        <div class="block-content block-content-full">
                          
                          
                           <?php

$sql="SELECT * from  tblcontact where ID=$vid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    
   <table class="table ">


    <tr>
    <th >Name </th>
    <td><?php  echo ($row->Name);?></td>
    
  </tr>
  <tr>
    <th scope>Email </th>
    <td><?php  echo ($row->Email);?></td>
    
  </tr>
  <tr>
    <th >Message </th>
    <td colspan="5"><?php  echo ($row->Message);?></td></tr>
 
   
<?php $cnt=$cnt+1;}} ?>
</table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full Pagination -->

                    <!-- END Dynamic Table Simple -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

      

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_tables_datatables.js"></script>
    </body>
</html>
<?php }  ?>