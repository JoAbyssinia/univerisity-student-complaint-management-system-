<!DOCTYPE html>
<html lang="en">
<?php 
include('connection.php');
include('include/header.php');
session_start();
if (!isset($_SESSION['user'])&& !isset($_SESSION['pass'])) {
    header("location:index.php");   
}

$sidelocation=2;
$sideSublocation=21;
?>


<?php 
    if (isset($_GET['newcomplaint'])) {
        
        $prof = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.student where sid ='".$_SESSION['user']."';"));

        $query = "INSERT INTO `rvuscms`.`grade_complaints` (`st_id`, `dep`, `year`, `sem`, `div`, `cr_code`, `disc`) VALUES 
        ('".$prof[0]."', '".$prof[3]."', '".$prof[6]."', '".$_GET['sem']."', '".$prof[4]."', '".$_GET['course']."', '".$_GET['disc']."')";
        $result = mysqli_query($con,$query);

        if ($result) {
            // echo "<script>alert('submited') </script>";
            header("location:complaints-history.php");
        }else {
            echo "<script>alert('Not Submited') </script>";
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
                        <h4 class="page-title">Grade Complaint</h4> </div>
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
                            <section id="unseen" style="min-height: 400px;">
                            <form method="GET" class="form-horizontal form-material">
                              
                                <div class="form-group">
                                    <label class="col-md-12">Course title</label>
                                    <select name="course" required class="form-control form-control-line" style="width: 98%; padding-left: 15px;">
                                        <option></option>
                                        
                                        
                                        <?php 
                                        $query = "SELECT * FROM `course`";
                                        $result = mysqli_query($con,$query);
                                        while ($row=mysqli_fetch_array($result)) { ?>

                                            <option value="<?php echo $row[0]; ?>"><?php echo $row['title'] ?></option>
                                            
                                       <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">semister</label>
                                    <select name="sem" class="form-control form-control-line" style="width: 98%; padding-left: 15px;" required data-placeholder="select semister"  >
                                        <option></option>
                                        <option>1st</option>
                                        <option>2nd</option>
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Discription</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" required name="disc" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="newcomplaint" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                            </section>
                    </div>
                    </div>
                </div>
                </div>
               
            </div>
<?php 
include('include/footer.php');
?>

