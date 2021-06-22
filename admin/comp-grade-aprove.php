<!DOCTYPE html>
<html lang="en">

<?php 
include('../connection.php');
session_start();
include("include/header.php");

$sidelocation=2;
$sideSublocation=21;
?>

<?php 
    if (isset($_GET['cid'])) {
            $qapp = "UPDATE `rvuscms`.`grade_complaints` SET `deep_head` = '1'
             WHERE (`id` = '".$_GET['cid']."')";
             mysqli_query($con,$qapp);
    }
?>

<body class="fix-header">
  
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    
    <div id="wrapper">
       
    <?php 
        include ('include/navbar.php');
        include ('include/sidebar.php');
    ?>

       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Grade complain</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        
                    </div>
                   
                </div>
              
                <div class="row">
                <div class="col-sm-12">
                        <div class="white-box">
                            <div class="content-panel">
                                <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">student name</th>
                                        <th style="text-align: center">course</th>
                                        <th style="text-align: center">date Reg</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $count = 1;
                                    $query="SELECT * FROM rvuscms.grade_complaints where dep='".$name[2]."'  order by timestamp desc;";

                                    $result = mysqli_query($con,$query);
                                    while ($row=mysqli_fetch_array($result)) {?>
                                    <tr>
                                        <td align="center"><?php echo $count ?></td>
                                        <td align="center"> <?php
                                        $fullname = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `student` where sid='$row[1]' "));
                                        echo $fullname[1]." ".$fullname[2];
                                        ?> </td>
                                        <td align="center"> <?php
                                            $course = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.course  where `code`='".$row[6]."';"));
                                        echo $course[1] ?> </td>
                                       <td align="center"><?php echo $row[10] ?></td>
                                        <td align="center">
                                        <?php if($row[9]=="submit"){?>
                                        <button type="button" class="btn btn-success"> <?php echo "submited"; ?> </button>
                                       <?php }elseif ($row[9]=="process") {?>
                                        <button type="button" class="btn btn-warning"> <?php    echo "in process"; ?> </button>
                                       <?php }elseif ($row[9]=="close") {?>
                                        <button type="button" class="btn btn-danger"> <?php       echo "Closed";?> </button>
                                       <?php } ?>
                                       
                                         </td> 
                                         <td align="center">
                                             <?php 
                                                if ($row[8]==1) {?>
                                                 <p>  <i class="fa fa-check-circle"></i> Approved </p>
                                               <?php }else {?>
                                                   <a href="comp-grade-aprove.php?cid=<?php echo $row[0] ?>&&from=grade">
                                        <button type="button" class="btn btn-primary"> approve</button></a>
                                         </td>
                                              <?php }
                                             ?>
                                        
                                    </tr>

                                   <?php $count++; }

                                ?>
                                                              
                                    </tbody>
                                </table>
  
                                </section>
                            </div>
                        <div>        
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
   
<?php 
include('include/footer.php');

?> 
