<?php
include('../connection.php');
session_start();
$sidelocation=7;
$cid=($_GET['id']);
if(isset($_POST['submit']))
{	
    
            $cod=$_POST['cod'];
            $title=$_POST['title'];
            $hour=$_POST['hour'];
            $depname=$_POST['depname'];
			$query = "UPDATE `course` SET `code`='$cod', `title`='$title', `hour`='$hour', `department`='$depname'
             WHERE `code`='$cid';";
    
    // echo $query;
$sql = mysqli_query($con,$query);
if($sql)
{
	echo "<script>alert('Course info Updated Successfully');</script>";
	echo "<script>window.location.href ='viewcourse.php'</script>";
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
                        <h4 class="page-title">Edit Course page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Edit Course </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                   
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                        <?php $sql=mysqli_query($con,"select * from course where code='$cid'");
											
											while($data=mysqli_fetch_array($sql)){
										?>
                            <form role="form" method="POST" onsubmit="return valid();" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Course Code </label>
                                    <div class="col-md-12">
                             <input type="text" name="cod"placeholder="Course Code "
                                            class="form-control form-control-line" value="<?php echo $cid ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Course Title</label>
                                    <div class="col-md-12">
                                        <input type="text" name="title" placeholder="Department Name"
                                            class="form-control form-control-line"  value="<?php echo htmlentities($data['title']); ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Credit Hour</label>
                                    <div class="col-md-12">
                                        <input type="text" name="hour" placeholder="Credit Hour"
                                            class="form-control form-control-line"  value="<?php echo htmlentities($data['hour']); ?>"> </div>
                                </div>

                                <div class="form-group">
                            <label class="col-md-12">Department</label>
                            <div class="col-md-12">
							<select name="depname" class="form-control form-control-line" required="true">
    
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