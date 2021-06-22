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
$sideSublocation=42;
?>


<?php 
    if (isset($_POST['passchange'])) {
        $pass = $_POST['password'];
        $newpass = $_POST['newpassword'];
        $confirpass = $_POST['confirmpassword'];


        if ($newpass == $confirpass) {

         $query = "UPDATE `rvuscms`.`student` SET `password` = '".$newpass."' WHERE (`sid` = '".$_SESSION['user']."');";
         
         $result=mysqli_query($con,$query);

         if ($result) {
            header("location:dashboard.php");
         }
        }
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
                        <h4 class="page-title">Change password</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="white-box">
                        <div class="content-panel">
                            <section id="unseen">
                              <div class="form-panel">

                              <?php 
                                        $prof = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.student where sid ='".$_SESSION['user']."';"));         
                              ?>   


                                <form class="form-horizontal style-form" method="post" name="chngpwd" onsubmit="return valid();">
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Current Password</label>
                                      <div class="col-sm-10">
                                          <input type="text" value="<?php echo $prof[7] ?>" name="password" placeholder="current password" required="required" class="form-control">
                                      </div>
                                  </div>
        
                                    <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="newpassword" placeholder="new password" required="required" class="form-control">
                                      </div>
                                  </div>
        
                                    <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="confirmpassword" placeholder="confirm password" required="required" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                   <div class="col-sm-10" style="padding-left:25% ">
                                <button type="submit" name="passchange" class="btn btn-success">Change</button>
                                </div>
                                </div>
        
                            </form>
                 
                              </div>
                            </section>
                    </div>
                    </div>
                </div>
                </div>
               
            </div>
<?php 
include('include/footer.php');
?>