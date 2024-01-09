<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Dashboard</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../users/assets/lineicons/style.css">
    <!-- <link href="../users/assets/css/style.css" rel="stylesheet"> -->

</head>

<body>
    <?php include('include/header.php');?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php');?>
                <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="module-body">
                                <?php
                                $sql=mysqli_query($con,"select count(*) as num FROM tblcomplaints where timestampdiff(hour,regDate,ifnull(lastUpdationDate,CURRENT_TIMESTAMP)) >=2");
                                $row=mysqli_fetch_array($sql);
                                if($row['num']!=0)
                                {?>
                                <div class="alert alert-danger alert-dismissable" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?php echo htmlentities($row['num']." complaints has not been processed for more than 7 days!");?>
                                    <a href="complaint-7days.php">view</a>
                                </div>
                                <?php } ?>
                                <div class="col-md-2 col-sm-2 box0">
                                    <a href="notprocess-complaint.php">
                                        <div class="box1">
                                            <span class="li_news"></span>
                                            <?php 
                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null ");
$num1 = mysqli_num_rows($rt);
{?>
                                            <h3><?php echo htmlentities($num1);?></h3>
                                        </div>
                                        <p><?php echo htmlentities($num1);?> Complaints not Process yet</p>
                                    </a>
                                </div>

                                <?php }?>


                                <div class="col-md-2 col-sm-2 box0">
                                    <a href="inprocess-complaint.php">
                                        <div class="box1">
                                            <span class="li_news"></span>
                                            <?php 
  $status="processed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
                                            <h3><?php echo htmlentities($num1);?></h3>
                                        </div>
                                        <p><?php echo htmlentities($num1);?> Complaints Status in process</p>
                                    </a>
                                </div>
                                <?php }?>

                                <div class="col-md-2 col-sm-2 box0">
                                    <a href="closed-complaint.php">
                                        <div class="box1">
                                            <span class="li_news"></span>
                                            <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where  status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
                                            <h3><?php echo htmlentities($num1);?></h3>
                                        </div>
                                        <p><?php echo htmlentities($num1);?> Complaint has been closed</p>
                                    </a>
                                </div>

                                <?php }?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php');?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>

    <body>

    </body>
    <?php } ?>