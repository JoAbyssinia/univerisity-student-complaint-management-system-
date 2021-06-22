<!DOCTYPE html>
<html lang="en">

<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=7;
$sideSublocation=72;
if(isset($_GET['del']))
		  {
			$query = "DELETE FROM `department` WHERE `dep_id`='".$_GET['id']."';";
					 mysqli_query($con,$query);
					 
					//  echo $query;
                  $_SESSION['msg']=$query;
		  }
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
        include ('include/navbar.php');
        include ('include/sidebar.php');
    ?>

       

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Course View</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Courses</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Course</h3>
                            <p class="text-muted">View Course </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
														$sql=mysqli_query($con,"select * from course");
														$cnt=1;
														while($row=mysqli_fetch_array($sql))
														{
														?>
													<tr>
                                                    <td class="center"><?php echo $cnt;?>.</td>
                                                    <td><?php echo $row['code'];?></td>
                                                    <td><?php echo $row['title'];?></td>
                                                    <td><?php echo $row['department'];?></td>
                                                    <td >
														<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="editcourse.php?id=<?php echo $row['dep_id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
															
			<a href="viewcourse.php?id=<?php echo $row['dep_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                                        </div>
                                                        
													<?php 
		$cnt=$cnt+1;
													 }?>
													
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php 
include('include/footer.php');

?> 