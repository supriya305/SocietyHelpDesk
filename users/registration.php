<?php
    session_start();
	include('includes/config.php');
	error_reporting(0);
    $errmsg="";
    $msg=$_SESSION['msg'];
	if(isset($_POST['submit']))
	{
		$_SESSION['fullname']=$_POST['fullname'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
        $_SESSION['contact']=$_POST['contact'];
        $otp=rand(100000,999999);
        require_once("includes/OTPmail.php");
        $flag=sendOTP($_SESSION['email'],$otp);
        if($flag){
            $query=mysqli_query($con,"select * from otps where email='".$_SESSION['email']."'");
            $count=mysqli_num_rows($query);
            if($count>0){
                $query=mysqli_query($con,"update otps set otp=$otp, exp=0 where email='".$_SESSION['email']."'");
            }
            else{
                $query=mysqli_query($con,"insert into otps(otp,email,exp) values('$otp','".$_SESSION['email']."',0)");
            }
            header("location: otp_verification.php");
        }
        else {
            $errmsg="Email not exist";
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

    <title>SH | User Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            //data:'email='+$("#email").val(),
            data: {
                "email": $("#email").val()
            },
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</head>

<body>
    <div id="login-page">
        <div class="container">
            <h3 align="center" style="color:#fff"><a href="../index.php" style="color:black">Society Helpdesk</a></h3>
            <hr />
            <form class="form-login" method="post">
                <h2 class="form-login-heading">
                    User Registration
                </h2>
                <p style="padding-left: 1%; color: green">
                    <?php if($msg){
						echo htmlentities($msg);
					}?>
                </p>
                <p style="padding-left: 1%; color: red">
                    <?php if($errmsg){
						echo htmlentities($errmsg);
					    }
                    ?>
                </p>

                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required"
                        autofocus><br>
                    <input type="email" class="form-control" placeholder="Email ID" id="email"
                        onBlur="userAvailability()" name="email" required="required">
                    <span id="user-availability-status1" style="font-size:12px;"></span><br>
                    <input type="text" name="contact" placeholder="Contact No" class="form-control" required><br>
                    <input type="password" class="form-control" placeholder="Password" required="required"
                        name="password"><br>
                    <button class="btn btn-theme btn-block" type="submit" name="submit" id="submit"><i
                            class="fa fa-user"></i> Register</button>
                    <hr>
                    <div class="registration">
                        Already Registered<br />
                        <a class="" href="index.php">Sign in</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <?php $_SESSION['msg']=""; ?>
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