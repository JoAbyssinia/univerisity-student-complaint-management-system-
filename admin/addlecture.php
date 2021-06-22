<!DOCTYPE html>
<html lang="en">

<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=5;
$sideSublocation=51;
if(isset($_POST['submit']))
{	
    
            $lec_id=$_POST['lec_id'];
			$fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $dep=$_POST['dep'];
            $roll=$_POST['roll'];
			$gender= $_POST['gender'];
            $email = $_POST['email'];
            $phone=$_POST['phone'];
           

			$query = "INSERT INTO `lecture` (`id`, `fname`, `lname`, `dep`, `rolle`, `gender`, `email`, `phone`) 
            VALUES ('$lec_id', '$fname', '$lname', '$dep', '$roll', '$gender', '$email', '$phone');";
            // echo $query;
$sqli_admin = mysqli_query($con,$query);

if($sqli_admin)
{
echo "<script>alert('Lecture  added Successfully');</script>";
echo "<script>window.location.href ='viewlecture.php'</script>";
}else{
	echo "<script>alert('error occours please try again ');</script>";
}
}
?>


<body class="fix-header">
  
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
  
    <div id="wrapper">
       
    <?php 
        include ('include/navbar.php');
        include ('include/sidebar.php');
    ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Lecture page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Add lecture</li>
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
                            $autoID = "Lec"."/".$autoID."/".$yr;
                            ?>
                                <div class="col-md-12">
                                <input type="text" name="lec_id"  class="form-control form-control-line" value="<?php echo $autoID ?>"> 
                            </div>
    </div>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="fname" placeholder="First Name "
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="lname" placeholder="Last Name"
                                            class="form-control form-control-line"> </div>
                                </div>

                                <div class="form-group">
                            <label class="col-md-12">Department</label>
                            <div class="col-md-12">
							<select name="dep" class="form-control form-control-line" required="true">
    
							<option value="select">select Department </option>
							<?php
							$sql=mysqli_query($con,"SELECT * FROM rvuscms.department");
							while($row=mysqli_fetch_array($sql))
												{
							?>
							<option value="<?php echo $row['dep_id']; ?>"><?php echo $row['dep_name'] ?></option>
							<?php } ?>
                            </select>
                            <!-- </div> -->
						</div>

                </div>
                <div class="form-group">
                                    <label class="col-sm-12">Role</label>
                                    <div class="col-sm-12">
                                        <select name="roll" class="form-control form-control-line">
                                <option value="select role" >select Role </option>
								<option value="instructor">Instructor </option>
								<option value="department head">Department Head </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Gender</label>
                                    <div class="col-sm-12">
                                        <select name="gender" class="form-control form-control-line">
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
                                            id="example-email"> 
                                </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" placeholder="Phone Numebr"
                                            class="form-control form-control-line"> </div>
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