<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  date_default_timezone_set('Asia/Kolkata');// change according timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () ); 
		$cid= $_GET["cid"];
		$result =mysqli_query($con,"SELECT * FROM tblcomplaints WHERE complaintNumber='".$cid."'");
		$count=mysqli_fetch_array($result);
        $msg="Your complaint has been cancelled successfully";
      //echo $count['status'];
		
          //  echo "<script>$('#cancel').prop('disabled',true);</script>";
  if(isset($_POST['cancel'])){
    // echo "<script type='text/javascript'>$(alert)</script>"
    $cmpno=$_GET['cid'];
    $query=mysqli_query($con,"Delete from tblcomplaints where complaintNumber='$cmpno'");
    header("location: dashboard.php");
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

    <title>SH | Complaint Details</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>

    <section id="container">
        <?php include('includes/header.php');?>
        <?php include('includes/sidebar.php');?>
        <section id="main-content" style="padding-left:5%; color:#000">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
                <?php if($count['status']=="cancelled")
                      {?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo htmlentities($msg);?>
                </div>
                <?php }?>
                <hr />


                <?php 
                  $query=mysqli_query($con,"select * from tblcomplaints where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");
                  while($row=mysqli_fetch_array($query)){
                  ?>
                <div class="row mt">
                    <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Number : </b></label>
                    <div class="col-sm-4">
                        <p><?php echo htmlentities($row['complaintNumber']);?></p>
                    </div>
                </div>
                <div class="row mt">
                    <label class="col-sm-2 col-sm-2 control-label"><b>Reg. Date :</b></label>
                    <div class="col-sm-4">
                        <p><?php echo htmlentities($row['regDate']);?></p>
                    </div>
                </div>


                <div class="row mt">
                    <label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
                    <div class="col-sm-4">
                        <p><?php echo htmlentities($row['category']);?></p>
                    </div>
                </div>



                <div class="row mt">
                    <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type :</b></label>
                    <div class="col-sm-4">
                        <p><?php echo htmlentities($row['complaintType']);?></p>
                    </div>
                </div>



                <div class="row mt">
                    <label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
                    <div class="col-sm-4">
                        <p><?php $cfile=$row['complaintFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo htmlentities("File NA");
}
else{ ?>
                            <a href="complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target='_blank'>
                                View File</a>
                            <?php } ?>

                        </p>
                    </div>
                </div>
                <div class="row mt">
                    <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details </label>
                    <div class="col-sm-10">
                        <p><?php echo htmlentities($row['complaintDetails']);?></p>
                    </div>

                </div>



                <?php 
$ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
                <div class="row mt">

                    <label class="col-sm-2 col-sm-2 control-label"><b>Remark:</b></label>
                    <div class="col-sm-10">
                        <?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp; <br /><b>Remark Date:
                            <?php echo  htmlentities($rw['rdate']); ?></b>
                    </div>
                </div>


                <?php } ?>

                <div class="row mt">

                    <label class="col-sm-2 col-sm-2 control-label"><b> Status :</b></label>
                    <div class="col-sm-4">
                        <p style="color:red"><?php 

if($row['status']=="NULL" || $row['status']=="" )
{
echo "Not Process yet";
} else{
              echo htmlentities($row['status']);
}
              ?></p>
                    </div>
                </div>
                <?php 	if($count['status']=="" || $count['status']=="NULL"){ ?>
                <form name="cancelf" method="post">
                    <div class="form-group">
                        <div class="col-sm-10" style="padding-left:25% ">
                            <button type="submit" name="cancel" id="cancel" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
                <?php } ?>



                <?php } ?>
            </section>
            <! --/wrapper -->
        </section><!-- /MAIN CONTENT -->
        <?php include('includes/footer.php');?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->

    <script>
    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });
    </script>

</body>

</html>
<?php } ?>