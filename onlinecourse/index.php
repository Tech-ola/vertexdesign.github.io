<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="change-password.php";//
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid Reg no or Password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

    <?php include('includes/header.php');?>
    <div class="col-md-6"> <strong> <a href="../index.html" >Homepage</a></strong></div></div></div>
    <div class="content-wrapper">
        <div class="container" style="color: #428bca">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line" style="color: #428bca">Please Login To Enter </h4>

                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Reg no : </label>
                        <input type="text" name="regno" class="form-control"  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        Send us a Whatsapp Message to get your login details:
                        <a href="http://wa.me/2348143036359"> <img src="assets/img/whatsapp.png"  alt="whatsapp logo" style="height: 20px; width: 20px; "> Click to continue </a><br>
                        
                         <strong> The price list for each courses are given below:</strong>
                        <ul>
                            <li>
                                Graphics Design: $118.05(USD). <i style="color: blue">Current Discount Price: $65.96.</i>
                            </li>
                            <li>
                                Motion Graphics Design: $91.82(USD). <i style="color: blue">Current Discount Price: $39.58.</i>
                            </li>
                            <li>
                                Front-End Development: $79.16(USD). <i style="color: blue">Current Discount Price: $52.77.</i>
                            </li>
                            <li>
                                Web Development:$209.86(USD). <i style="color: blue">Current Discount Price: $131.93</i>
                            </li>
                            <li>
                                Mysql:$131.16(USD). <i style="color: blue">Current Discount Price: $79.16</i>
                            </li>
                        </ul>
                        
                        <strong style="color:red;">Please note:</strong><br>
                        <ul>
                        <li>Send a message to our whatsapp number to make payments and get login details.</li>
                        <li>Payments are to be made before you get your login details.</li>
                        <li>Please ensure you select only the course(s) you made payments for; as they may be <i style="color: red">penalty</i> for illegal selections.</li>
                        <li>Payments made are not <i style="color:red">Refundable.</li></li>
                        </ul>
                       
                    </div>
                                    </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
