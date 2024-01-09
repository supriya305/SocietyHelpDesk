<?php
    session_start();
	include('includes/config.php');
	error_reporting(0);
    $errmsg="";
    if(isset($_POST['verify'])){
        $query=mysqli_query($con,"select * from otps where otp='".$_POST['otp']."' and exp!=1 and email='".$_SESSION['email']."'");
        $count=mysqli_num_rows($query);
        if($count>0){
            $query=mysqli_query($con,"update otps set exp=1 where otp='".$_POST['otp']."'");
            $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,ref) values('".$_SESSION['fullname']."','".$_SESSION['email']."','".$_SESSION['password']."','".$_SESSION['contact']."',0)");
            $_SESSION['msg']="Succesfully Registered! Now you can login";
            header("location:registration.php");
        }
        else{
            $errmsg="Wrong OTP!";
        }
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

    <title>SH | OTP Verification</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>
    <div id="login-page">
        <div class="container">
            <h3 align="center" style="color:#fff"><a href="../index.php" style="color:black">Society Helpdesk</a></h3>
            <hr />
            <form class="form-login" method="post">
                <h2 class="form-login-heading">
                    OTP Verification
                </h2>
                <p style="padding-left: 1%; color: red">
                    <?php if($errmsg){
						echo htmlentities($errmsg);
					    }
                    ?>
                </p>
                <div class="login-wrap">
                    <p>An otp has been sent to <?php echo htmlentities($_SESSION['email']) ?>.</p>
                    <input type="text" name="otp" placeholder="Enter the 6-digit otp" autocomplete="off"
                        class="form-control" required><br>
                    <button class="btn btn-theme" type="submit" name="verify">Verify</button>
                </div>
            </form>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("assets/img/soc.jpg", {
        speed: 500
    });
    </script>
</body>

</html>