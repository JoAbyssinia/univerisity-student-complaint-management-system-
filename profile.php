<!DOCTYPE html>
<html lang="en">
<?php 
include('connection.php');
include('include/header.php');
session_start();
if (!isset($_SESSION['user'])&& !isset($_SESSION['pass'])) {
    header("location:index.php");   
}

$sidelocation=4;
$sideSublocation=41;
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
                        <h4 class="page-title">Profile</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/rvulogo.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="plugins/images/blank_avatar.png"
                                                class="thumb-lg img-circle" alt="img"></a>
                                    <?php 
                                    $prof = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.student where sid ='".$_SESSION['user']."';"));  
                                    ?>   

                                        <h3 class="text-white"> <?php 
                                           echo $prof[1]." ".$prof[2];
                                        ?> </h3>
                                        <h5 class="text-white text-capitalize">
                                            <?php 
                                              if ($prof[3]=='cs') {
                                                echo "Computer Science";
                                              }
                                            ?>

                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1> <?php 
                                      echo $prof[0];
                                    ?> </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled placeholder="Johnathan Doe"
                                            class="form-control form-control-line" value = "<?php echo $prof[1] ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled placeholder="Johnathan Doe"
                                            class="form-control form-control-line" value = "<?php echo $prof[2] ?>" > </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Department</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value = "<?php echo $prof[3] ?>" 
                                            class="form-control form-control-line" disabled name="example-email"
                                            id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Division</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value = "<?php echo $prof[4] ?>" 
                                            class="form-control form-control-line" disabled name="example-email"
                                            id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Gender</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value = "<?php echo $prof[5] ?>" disabled class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">acadamic year</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value = "<?php echo $prof[6] ?>"
                                            class="form-control form-control-line"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Phone number</label>
                                    <div class="col-md-12">
                                        <input type="text" disabled value = "<?php echo $prof[8] ?>"
                                            class="form-control form-control-line"> </div>
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