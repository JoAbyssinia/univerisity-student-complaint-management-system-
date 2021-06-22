

<?php

include('../connection.php');
session_start();
$sidelocation=3;
$Sid=($_GET['id']);

if(isset($_POST['submit']))
{
    $s_id=$_POST['s_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dep=$_POST['dep'];
    $div=$_POST['div'];
    $gender= $_POST['gender'];
    $yr = $_POST['yr'];
    $password = $_POST['password'];
    $phone=$_POST['phone'];
    
    $query = "UPDATE `student` SET `sid`='$s_id', `fname`='$fname', `lname`='$lname', `department`='$dep', `division`='$div',
     `gender`='$gender', `year`='$yr', `phone`='$phone', `password`='$password' WHERE `sid`='$Sid';";
    
    // echo $query;
$sql = mysqli_query($con,$query);
if($sql)
{
	echo "<script>alert('Student info Updated Successfully');</script>";
	echo "<script>window.location.href ='viewstudent.php'</script>";
// $msg="Admin Details updated Successfully";
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
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
    include('include/navbar.php');
include('include/sidebar.php');
        ?> ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== --> <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Student </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Edit Student Page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">

                        <?php $sql=mysqli_query($con,"select * from student where sid='$Sid'");
											
											while($data=mysqli_fetch_array($sql)){
										?>
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                            <div class="form-group">
                                
                                <label class="col-md-12">Id Number</label>
                                <div class="col-md-12">
                                <input type="text" name="s_id"  class="form-control form-control-line" value="<?php echo $Sid ?>" > 
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
										<label >Department</label>
										<select name="dep" class="form-control form-control-line" required="true">
										<option value="select">select Department </option>
										<?php
										$sql=mysqli_query($con,"SELECT * FROM rvuscms.department");
										while($row=mysqli_fetch_array($sql))
															{
										?>
										<option    
										<?php if ($data['department'] == $row['dep_id']) echo 'selected="selected"'; ?> value="<?php echo $row['dep_id']; ?>">
									    <?php echo $row['dep_name'] ?>
										</option>
										<?php } ?>
						
										</select>
                                        
									</div>

                                   
                                    <div class="form-group">
							<label>Division</label>
							<select name="div" class="form-control form-control-line" required="true">
							<option  value="select" >select Division </option> 
								<option <?php if ($data['division'] == 'R') echo ' selected="selected"'; ?> value="R">regular </option>
								<option <?php if ($data['division'] == 'E') echo ' selected="selected"'; ?> value="E">extension </option>
								<option <?php if ($data['division'] == 'W') echo ' selected="selected"'; ?> value="W">weekend </option>

							</select>
						</div>      
                                <div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control form-control-line"required="true">
							<option  value="select" >select gender </option> 
								<option <?php if ($data['gender'] == 'M') echo ' selected="selected"'; ?> value="M">male </option>
								<option <?php if ($data['gender'] == 'F') echo ' selected="selected"'; ?> value="F">female </option>
							</select>
						</div>

                        <div class="form-group">
							<label>Acadamic Year</label>
							<select name="yr" class="form-control form-control-line"required="true">
							<option  value="select" >Acadamic year </option> 
								<option <?php if ($data['year'] == '1st') echo ' selected="selected"'; ?> value="1st">1st year </option>
								<option <?php if ($data['year'] == '2nd') echo ' selected="selected"'; ?> value="2nd">2nd year</option>
                                <option <?php if ($data['year'] == '3rd') echo ' selected="selected"'; ?> value="3rd">3rd year </option>
								<option <?php if ($data['year'] == '4th') echo ' selected="selected"'; ?> value="4th">4th year</option>
                                <option <?php if ($data['year'] == '5th') echo ' selected="selected"'; ?> value="5th">5th year</option>

							</select>
						
                                
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="text" name="password" value="password" value="<?php echo htmlentities($data['password']); ?>" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="number" value="<?php echo htmlentities($data['phone']); ?>"  name="phone" placeholder="Phone Numebr"
                                            class="form-control form-control-line"> </div>
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