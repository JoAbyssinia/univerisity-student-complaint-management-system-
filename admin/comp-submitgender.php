<!DOCTYPE html>
<html lang="en">
<?php 
include('../connection.php');
include('include/header.php');
session_start();
if (!isset($_SESSION['userA'])&& !isset($_SESSION['passA'])) {
    header("location:index.php");   
}

$sidelocation=8;
$sideSublocation=82;
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
    
    <?php 
        include ('include/navbar.php');
        include ('include/sidebar.php');
    ?>



    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">gender Complaint History</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="content-panel">
                                <section id="unseen">
                                  <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">lecture</th>
                                        <th style="text-align: center">date Reg</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $count = 1;
                                    $query="SELECT * FROM rvuscms.gender_complaint order by timestamp desc;";


                                    $result = mysqli_query($con,$query);
                                    while ($row=mysqli_fetch_array($result)) {?>
                                    <tr>
                                        <td align="center"><?php echo $count ?></td>
                                        <td align="center"> <?php
                                            $course = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.course  where `code`='".$row[6]."';"));
                                        echo $course[1] ?> </td>
                                       <td align="center"><?php echo $row[8] ?></td>
                                        <td align="center">
                                        <?php 
                                        
                                        if($row[7]=="submited"){?>
                                           <button type="button" class="btn btn-success"> <?php  echo "submited"; ?> </button>
                                      <?php  }elseif ($row[7]=="process") {?>
                                        <button type="button" class="btn btn-warning"> <?php    echo "in process"; ?> </button>
                                      <?php  }elseif ($row[7]=="close") {?>
                                        <button type="button" class="btn btn-danger"> <?php echo "Closed";?> </button>
                                       <?php } ?>
                                       
                                         </td><td align="center">
                                         <a href="replay-complain.php?cid=<?php echo $row[0] ?>&&from=gender">
                                        <button type="button" class="btn btn-primary">View Details</button></a>
                                         </td>
                                    </tr>

                                   <?php $count++; }

                                ?>
                                                              
                                    </tbody>
                                </table>
                                </section>
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