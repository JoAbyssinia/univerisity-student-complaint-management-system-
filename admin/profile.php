<!DOCTYPE html>
<html lang="en">

<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=3;

?>
<?php 
    if (isset($_GET['updatep'])) {
        if ($_SESSION['type']=='admin') {
           $qry = "UPDATE `rvuscms`.`admin` SET 
           `fname` = '".$_GET['fname']."', 
           `lname` = '".$_GET['lname']."', 
           `gender` = '".$_GET['gender']."', 
           `email` = '".$_GET['email']."', 
           `phone` = '".$_GET['phone']."', 
           `password` = '".$_GET['pass']."' 
           WHERE (`id` = '".$_SESSION['userA']."');";


        }else {
            $qry = "UPDATE `rvuscms`.`lecture` SET 
            `fname` = '".$_GET['fname']."', 
            `lname` = '".$_GET['lname']."', 
            `gender` = '".$_GET['gender']."', 
            `email` = '".$_GET['email']."', 
            `phone` = '".$_GET['phone']."', 
            `password` = '".$_GET['pass']."' 
            WHERE (`id` = '".$_SESSION['userA']."');";
        }

        $result = mysqli_query($con,$qry);
        if ($result) {
            echo "<script>alert('Lecture info Updated Successfully');</script>";
        }else {
            echo "<script>alert('Lecture info Updated failed');</script>";
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
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Profile Page</li>
                        </ol>
                    </div>
                </div>
                 
                    <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/rvulogo.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="../plugins/images/blank_avatar.png"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white">
                                        <?php 
                                    if ($_SESSION['type']=='admin') {
                                        $qu="SELECT * FROM rvuscms.admin where id = '".$_SESSION['userA']."';";
                                    }else {
                                        $qu="SELECT * FROM rvuscms.lecture where id='".$_SESSION['userA']."';";
                                        
                                    }
                                        
                                        $pedit = mysqli_fetch_array(mysqli_query($con,$qu));
                                        echo $pedit[1]." ".$pedit[2];
                                    ?>    
                                    </h4>
                                        <h5 class="text-white"> 
                                        <?php 
                                              if ($_SESSION['type']=='admin') {
                                                echo "Admin";
                                            }else {
                                                echo $pedit[3];
                                                
                                            }
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                               
                                <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <h1><?php 
                                              if ($_SESSION['type']=='admin') {
                                                echo $pedit[0];
                                            }else {
                                                echo $pedit[0];
                                                
                                            }
                                        ?></h1>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form method="get" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="fname" value="<?php 
                                             echo $pedit[1];
                                        ?>" placeholder="Johnathan Doe"
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text"  name="lname" value="<?php 
                                             echo $pedit[2];
                                        ?>" placeholder="Johnathan Doe"
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Gender</label>
                                    <div class="col-sm-12">
                                        <select name="gender" class="form-control form-control-line">
                                            <?php
                                                if ($pedit['gender']=='male') { ?>
                                                    <option value="M" select>Male</option> 
                                                <?php  }else { ?>
                                                    <option value="M" >Male</option>   
                                              <?php  }
                                                if ($pedit['gender']=='female') {?>
                                                    <option value="F" select >Female</option>
                                              <?php }else { ?>
                                                   <option value="F" >Female</option>
                                               <?php }
                                            ?>
                                            
                                           
                                        </select>
                                    </div>
                                </div>

                           
                                    <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input name="email" type="email" value="<?php  echo $pedit['email']; ?>" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email"> </div>
                                </div>
                              


                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input name="pass" type="text" value="<?php echo $pedit['password'] ?>" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input name="phone" type="text" value="<?php echo $pedit['phone'] ?>" placeholder="123 456 7890"
                                            class="form-control form-control-line"> </div>
                                </div>
                               
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="updatep" class="btn btn-primary btn-success btn-lg btn-block">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <?php 
include('include/footer.php');

?> 
