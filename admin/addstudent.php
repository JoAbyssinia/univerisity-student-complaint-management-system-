<!DOCTYPE html>
<html lang="en">

<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=4;
$sideSublocation=41;
if(isset($_POST['submit']))
{	
    
            $s_id=$_POST['s_id'];
			$fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $dep=$_POST['dep'];
            $div=$_POST['div'];
			$gender= $_POST['gender'];
            $year=$_POST['year'];
            $phone = $_POST['phone'];

			$query = "INSERT INTO `student` (`sid`, `fname`, `lname`, `department`, `division`, `gender`, `year`,  `phone`) 
            VALUES ('$s_id', '$fname', '$lname', '$dep', '$div', '$gender', '$year',  '$phone');";
            // echo $query;
$sqli_admin = mysqli_query($con,$query);

if($sqli_admin)
{
echo "<script>alert('Student  added Successfully');</script>";
echo "<script>window.location.href ='viewstudent.php'</script>";
}else{
    echo $query;
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
                        <h4 class="page-title">Add Studentpage</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Add Student</li>
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
                            $autoID = "Stud"."/".$autoID."/".$yr;
                            ?>
                                <div class="col-md-12">
                                <input type="text" name="s_id"  class="form-control form-control-line"  value="<?php echo $autoID ?>"> 
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
                            </div>
						</div>
                        <div class="form-group">
                                    <label class="col-sm-12">Division</label>
                                    <div class="col-sm-12">
                                        <select name="div" class="form-control form-control-line">
                                        <option value="select" >select Divstion </option>
                                            <option value="regular">Regular</option>
                                            <option value="extension">Extension</option>
                                            <option value="weekend">Weekend</option>
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
                                    <label class="col-sm-12">Acadamic Year</label>
                                    <div class="col-sm-12">
                                        <select name="year" class="form-control form-control-line">
                                        <option value="select">select acadamic year</option>    
                                        <option value="1st">1st Year</option>
                                            <option value="2nd">2nd Year</option>
                                            <option value="3rd">3rd Year</option>
                                            <option value="4th">4th Year</option>
                                            <option value="5th">5th Year</option>
                                        </select>
                                    </div>
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
                                        <button type="submit"  name="submit" id="submit"class="btn btn-primary btn-success btn-lg btn-block">Add Student</button>
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