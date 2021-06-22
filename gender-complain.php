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
$sideSublocation=22;
?>


<?php 
    if (isset($_GET['newcomplaint'])) {
        
        $prof = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.student where sid ='".$_SESSION['user']."';"));

        $query = "INSERT INTO `rvuscms`.`gender_complaint` (`st_id`, `dep`, `div`, `year`, `lec_id`, `disc`, `date`) VALUES 
        ('$prof[0]', '$prof[3]', '$prof[4]', '$prof[6]', '".$_GET['lec']."', '".$_GET['disc']."', '".$_GET['date']."');";
        $result = mysqli_query($con,$query);

        if ($result) {
            echo "<script>alert('submited') </script>";
            header("location:gender-history.php");
        }else {
            echo "<script>alert('Not Submited') </script>";
        }

    }
?>


<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
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
                        <h4 class="page-title">Gender Complaint</h4> </div>
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
                                    <label class="col-md-12">Date</label>
                                    <input type="date" name="date"  id="example" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Lecture</label>
                                    <select name="lec" class="form-control form-control-line" style="width: 98%; padding-left: 15px;" required data-placeholder="select semister"  >
                                        <option></option>
                                    <?php 
                                        $queryS = " SELECT id,fname,lname FROM lecture";
                                        
                                        $resultS = mysqli_query($con,$queryS);

                                        while ($row=mysqli_fetch_array($resultS)) { ?>
                                            <option value="<?php echo $row[0] ?>">   <?php  echo $row[1]." ".$row[2]; ?>  </option>     
                                        <?php }
                                    ?>
                                       
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Discription</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" name="disc" class="form-control form-control-line"></textarea>
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

<script src="plugins/daterangepicker/daterangepicker.js"></script>


  
</script>