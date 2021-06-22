<?php
include('../connection.php');
session_start();
$sidelocation=3;

$Aid=($_GET['id']);

if(isset($_POST['submit']))
{
    $a_id=$_POST['a_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $phone=$_POST['phone'];
    $password = $_POST['password'];
    $query = "UPDATE `admin` SET `id`='$a_id', `fname`='$fname', `lname`='$lname', `gender`='$gender', 
    `email`='$email', `phone`='$phone', `password`='$password'WHERE `id`='$Aid';";
    
    // echo $query;
$sql = mysqli_query($con,$query);
if($sql)
{
	echo "<script>alert('Admin info Updated Successfully');</script>";
	echo "<script>window.location.href ='viewadmin.php'</script>";

}
}
?>

<!DOCTYPE html>
<html lang="en">


<?php
include('include/header.php')
?>
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
    include('include/navbar.php');
include('include/sidebar.php');
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

                        <?php $sql=mysqli_query($con,"select * from admin where id='$Aid'");
											
											while($data=mysqli_fetch_array($sql)){
										?>
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                            <div class="form-group">
                                
                                <label class="col-md-12">Id Number</label>
                                <div class="col-md-12">
                                <input type="text" name="a_id"  class="form-control form-control-line" value="<?php echo $Aid ?>" > 
                            </div>
    </div>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="fname" placeholder="First Name "
                                        value="<?php echo htmlentities($data['fname']); ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="lname" placeholder="Last Name"
                                        value="<?php echo htmlentities($data['lname']); ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
							<abel class="col-md-12">gender</label>
							<select name="gender" class="form-control form-control-line"required="true">
							<option  value="select" >select gender </option> 
								<option <?php if ($data['gender'] == 'male') echo ' selected="selected"'; ?> value="male">male </option>
								<option <?php if ($data['gender'] == 'female') echo ' selected="selected"'; ?> value="female">female </option>
							</select>
						</div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="Email"
                                        value="<?php echo htmlentities($data['email']); ?>" class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="number" value="<?php echo htmlentities($data['phone']); ?>"  name="phone" placeholder="Phone Numebr"
                                            class="form-control form-control-line"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="text" name="password" value="password" value="<?php echo htmlentities($data[' password']); ?>" class="form-control form-control-line">
                                    </div>
                                </div>
                               
                               
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-success btn-lg btn-block">Update</button>
                                    </div>
                                </div>
                                <?php } 
								?>	
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php
include('include/footer.php')
?>