<?php


include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=3;
$sideSublocation=31;

if(isset($_POST['submit']))
{	
    
            $a_id=$_POST['a_id'];
			$fname=$_POST['f_name'];
			$lname=$_POST['l_name'];
			$gender= $_POST['gender'];
            $email = $_POST['email'];
            $phone=$_POST['phone'];
           

			$query = "INSERT INTO `admin` (`id`, `fname`, `lname`, `gender`, `email`, `phone`) 
            VALUES ('$a_id', '$fname', '$lname', '$gender', '$email', '$phone');";
            // echo $query;
$sqli_admin = mysqli_query($con,$query);
if($sqli_admin)
{
echo "<script>alert('Admin  added Successfully');</script>";
echo "<script>window.location.href ='viewadmin.php'</script>";
}else{
	echo "<script>alert('error occours please try again ');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">



<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
       
    <?php 
        include ('include/navbar.php');
        include ('include/sidebar.php');
    ?>

       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Admin</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Add Admin Page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                            <div class="form-group">
                                
                                <label class="col-md-12">Id Number</label>
                                <?php 
                            $autoID = rand(1000,9999);
                            $yr=DATE('y');
                            $autoID = "Admin"."/".$autoID."/".$yr;
                            ?>
                                <div class="col-md-12">
                                <input type="text" name="a_id"  class="form-control form-control-line" value="<?php echo $autoID ?>"> 
                            </div>
    </div>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="f_name" placeholder="First Name "
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="l_name" placeholder="Last Name"
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Gender</label>
                                    <div class="col-sm-12">
                                    <select name="gender" class="form-control form-control-line" required="true">
								<option value="select" >select gender </option>
								<option value="male">male </option>
								<option value="female">female </option>
							</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="Email"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" placeholder="Phone Numebr"
                                            class="form-control form-control-line"> </div>
                                </div>

                                
                              
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-success btn-lg btn-block">Add Admin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php 
include('include/footer.php');

?> 
