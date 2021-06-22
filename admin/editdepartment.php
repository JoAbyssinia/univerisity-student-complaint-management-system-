<?php
include('../connection.php');
session_start();
$sidelocation=6;
$did=($_GET['id']);
if(isset($_POST['submit']))
{	
    
            $depid=$_POST['depid'];
			$depname=$_POST['depname'];
			$query = "UPDATE `department` SET `dep_id`='$depid', `dep_name`='$depname' WHERE `dep_id`='$did';";
    
    // echo $query;
$sql = mysqli_query($con,$query);
if($sql)
{
	echo "<script>alert('department info Updated Successfully');</script>";
	echo "<script>window.location.href ='viewdepartment.php'</script>";
// $msg="Admin Details updated Successfully";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('include/header.php');?>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
   
    <div id="wrapper">
      
        <?php
include('include/navbar.php');
include('include/sidebar.php');
?>
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Department page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Edit Department</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                   
                  
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                        <?php $sql=mysqli_query($con,"select * from department where dep_id='$did'");
											
											while($data=mysqli_fetch_array($sql)){
										?>
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Dep code </label>
                                    <div class="col-md-12">
                             <input type="text" name="depid"placeholder="Dep Code "
                                            class="form-control form-control-line" value="<?php echo $did ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Department Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="depname" placeholder="Department Name"
                                            class="form-control form-control-line"  value="<?php echo htmlentities($data['dep_name']); ?>"> </div>
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