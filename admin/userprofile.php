<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{

 ?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Profile</title>
    <!-- <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="anuj.css" rel="stylesheet" type="text/css"> -->
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
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
                                <h3>User Details</h3>
                            </div>
                            <div class="module-body">

                                <form name="updateticket" id="updateticket" method="post">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <?php 

$ret1=mysqli_query($con,"select * FROM users where id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>




                                        <tr>
                                            <td colspan="2"><b><?php echo $row['fullName'];?>'s profile</b></td>

                                        </tr>


                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr height="50">
                                            <td><b>Reg Date:</b></td>
                                            <td><?php echo htmlentities($row['regDate']); ?></td>
                                        </tr>
                                        <tr height="50">
                                            <td><b>User Email:</b></td>
                                            <td><?php echo htmlentities($row['userEmail']); ?></td>
                                        </tr>


                                        <tr height="50">
                                            <td><b>User Contact no:</b></td>
                                            <td><?php echo htmlentities($row['contactNo']); ?></td>
                                        </tr>



                                        <tr height="50">
                                            <td><b>Tower:</b></td>
                                            <td><?php echo htmlentities($row['tower']); ?></td>
                                        </tr>



                                        <tr height="50">
                                            <td><b>Flat No.:</b></td>
                                            <td><?php echo htmlentities($row['flatno']); ?></td>
                                        </tr>
                                        <tr height="50">
                                            <td><b>Last Updation:</b></td>
                                            <td><?php echo htmlentities($row['updationDate']); ?></td>

                                            <?php } ?>
                                    </table>
                                </form>
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
</body>

</html>

<?php } ?>