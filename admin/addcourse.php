<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=7;
$sideSublocation=71;


if(isset($_POST['submit']))
{	
    
            $crcode=$_POST['crcode'];
			$crtitle=$_POST['crtitle'];
            $crhr=$_POST['crhr'];
            $dep=$_POST['dep'];

			$query = "INSERT INTO `course` (`code`, `title`, `hour`, `department`) 
            VALUES ('$crcode', '$crtitle', '$crhr', '$dep');";
           
$sqli_admin = mysqli_query($con,$query);

if($sqli_admin)
{
echo "<script>alert('Course  added Successfully');</script>";
echo "<script>window.location.href ='viewcourse.php'</script>";
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
                        <h4 class="page-title">Add Department page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Add Department</li>
                        </ol>
                    </div>
                </div>
               
                <div class="row">
                  
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Course Code </label>
                                    <div class="col-md-12">
                                        <input type="text" name="crcode"placeholder="Course Code "
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Course Title </label>
                                    <div class="col-md-12">
                                        <input type="text" name="crtitle" placeholder="Course Title"
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Credit Hour</label>
                                    <div class="col-md-12">
                                        <input type="text" name="crhr" placeholder="Credit Hour"
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
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-success btn-lg btn-block">Add Course</button>
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
