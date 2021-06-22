<!DOCTYPE html>
<html lang="en">
<?php 
include('connection.php');
include('include/header.php');
session_start();
if (!isset($_SESSION['user'])&& !isset($_SESSION['pass'])) {
    header("location:index.php");   
}

$sidelocation=1;

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
                        <h4 class="page-title">Dashboard</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Grade Complaints submited</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">
                                    <?php 
                                        $success = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM rvuscms.grade_complaints where st_id='".$_SESSION['user']."' and  state ='submit';"));
                                        echo $success[0];
                                    ?>

                                </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Grade Complaints closed</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-danger"></i> <span class="counter text-success">
                                    <?php 
                                     
                                       $success = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM rvuscms.grade_complaints where st_id='".$_SESSION['user']."' and state ='close';"));

                                      
                                       echo $success[0];
                                   
                                    ?>

                                </span></li>
                            </ul>
                           
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Gender Complaints submited</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">
                                <?php 
                                     
                                     $success = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM rvuscms.gender_complaint where st_id='".$_SESSION['user']."' and state ='submited';"));
                                     echo $success[0];
                                 
                                  ?>

                                </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"> Grade Complaints closed</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">
                                <?php 
                                     
                                     $success = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM rvuscms.gender_complaint where st_id='".$_SESSION['user']."' and state ='close';"));
                                     echo $success[0];
                                 
                                  ?>

                                </span></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            <!-- /.container-fluid -->

<?php 
include('include/footer.php');
?>