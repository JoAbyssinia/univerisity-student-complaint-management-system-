<!DOCTYPE html>
<html lang="en">

<?php 
include('../connection.php');
session_start();
include("include/header.php");

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
                        <h4 class="page-title">Dashboard Admin</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard Admin</a></li>
                        </ol>
                    </div>
                   
                </div>
              
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Students</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php 
                                    if ($_SESSION['type']=='admin') {
                                        $qu="SELECT count(*) FROM rvuscms.student;";
                                    }else {
                                        $qu="SELECT count(*) FROM rvuscms.student where department='$name[2]';";
                                        
                                    }
                                        
                                        $success = mysqli_fetch_array(mysqli_query($con,$qu));
                                        echo $success[0];
                                    ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total complains</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">
                                <?php 
                                    if ($_SESSION['type']=='admin') {
                                        $qu="SELECT count(*) FROM rvuscms.gender_complaint;";
                                        $qug = "SELECT count(*) FROM rvuscms.grade_complaints;";
                                    }else {
                                        $qu="SELECT count(*) FROM rvuscms.gender_complaint where dep='$name[2]';";";";
                                        $qug = "SELECT count(*) FROM rvuscms.grade_complaints where dep='$name[2]';";

                                     
                                        
                                    }

                                        $gender = mysqli_fetch_array(mysqli_query($con,$qu));
                                       
                                        $grade = mysqli_fetch_array(mysqli_query($con,$qug));
                                        echo $gender[0]+$grade[0];
                                        
                                    ?>
                                </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Gender Complains</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">
                                    <?php 
                                        echo $gender[0];
                                    ?>
                                </span></li>
                            </ul>
                        </div>
                    </div>               
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Grade Complains</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">
                                    <?php 
                                    echo $grade[0];
                                    ?>
                                </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
   
<?php 
include('include/footer.php');

?> 
