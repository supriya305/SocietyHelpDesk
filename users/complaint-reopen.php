<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_POST['reopen'])){
        $cid=$_GET['cid'];
        $complaintdetails=$_POST['complaindetails'];
        $compfile=$_FILES["compfile"]["name"];
        move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);
        $query=mysqli_query($con,"update tblcomplaints set complaintDetails='$complaintdetails', complaintFile='$compfile', status=NULL where complaintNumber=$cid");
        //echo "update tblcomplaints set complaintDetails='$complaintdetails', complaintFile='$compfile', status=NULL where complaintNumber=$cid";
        echo '<script>alert("Your complain has been successfully reopen")</script>';
        header("location: complaint-history.php");
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SH | User Change Password</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

</head>

<body>

    <section id="container">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Complaint Reopen</h3>

                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">


                            <?php if($successmsg)
                      {?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                            </div>
                            <?php }?>

                            <?php if($errormsg)
                      {?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?>
                            </div>
                            <?php }?>

                            <form class="form-horizontal style-form" method="post" name="complaint"
                                enctype="multipart/form-data">


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Write your complain:</label>
                                    <div class="col-sm-6">
                                        <textarea name="complaindetails" cols="10" rows="10" class="form-control"
                                            maxlength="2000" placeholder="Reason for reopen the complain"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Related Doc(if any) </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="compfile" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10" style="padding-left:25% ">
                                        <button type="submit" name="reopen" class="btn btn-primary">Reopen</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



            </section>
        </section>
        <?php include("includes/footer.php");?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>

    <!--custom tagsinput-->
    <script src="assets/js/jquery.tagsinput.js"></script>

    <!--custom checkbox & radio-->

    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


    <script src="assets/js/form-component.js"></script>


    <script>
    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    <
    /body> < /
    html >
        <?php } ?>