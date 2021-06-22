<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=6;
$sideSublocation=61;

if(isset($_POST['submit']))
{	
    
            $depid=$_POST['depid'];
			$depname=$_POST['depname'];
			$query = "INSERT INTO `department` (`dep_id`, `dep_name`) 
            VALUES ('$depid', '$depname');";
            $query;
$sqli_admin = mysqli_query($con,$query);

if($sqli_admin)
{
echo "<script>alert('Admin  added Successfully');</script>";
echo "<script>window.location.href ='viewdepartment.php'</script>";
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
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Dep code </label>
                                    <div class="col-md-12">
                             <input type="text" name="depid"placeholder="Dep Code "
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Department Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="depname" placeholder="Department Name"
                                            class="form-control form-control-line"> </div>
                                </div>
                               
                               
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-success btn-lg btn-block">Add Department</button>                                    </div>
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