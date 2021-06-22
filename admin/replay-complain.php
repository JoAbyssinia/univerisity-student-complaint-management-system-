<!DOCTYPE html>
<html lang="en">
<?php 
include('../connection.php');
include('include/header.php');
session_start();

if (!isset($_SESSION['userA'])&& !isset($_SESSION['passA'])) {
    header("location:index.php");   
}

if (!isset($_GET['cid'])) {
    // header("location:index.php");   
}else {
    $_SESSION['cid']=$_GET['cid'];
}



$sidelocation=8;
$sideSublocation=81;
?>
<?php 
$loc = 0;
    if (isset($_GET['from'])) {

        if ($_GET['from']=="grade") {
          $complain = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.grade_complaints where id='".$_GET['cid']."';"));
          $_SESSION['loc']=1;
        $loc=1;
        }elseif ($_GET['from']=="gender") {
            $complain = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.gender_complaint where id='".$_GET['cid']."';"));
            $_SESSION['loc']=2;
            $loc =2;
        }     
    }
  
?>

<?php  
    echo $_SESSION['cid'];
    if (isset($_GET['replay'])) {  
       if ($_SESSION['loc']==1) {

     $quer = "UPDATE `rvuscms`.`grade_complaints` SET `state` = 'close',`replay` = '".$_GET['disc']."'
     WHERE (`id` = '".$_SESSION['cid']."');";
    echo $quer;
     $result=mysqli_query($con,$quer);
     if ($result) {
         header("location:comp-submitgrade.php");
     }
    }elseif ($_SESSION['loc']==2) {
        $quer = "UPDATE `rvuscms`.`gender_complaint` SET `state` = 'close', `replay` = 'sdvsdv' WHERE(`id` = '".$_SESSION['cid']."');";
       echo $quer;
        $result=mysqli_query($con,$quer);
        if ($result) {
            header("location:comp-submitgender.php");
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

    <?php 

        include ('include/navbar.php');
        include ('include/sidebar.php');
    ?>
    <div id="wrapper"> 
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Replay Complaint </h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
           
              
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <div class="content-panel">
                                <section id="unseen" style="min-height: 400px;">
                                  <table class="table" style="width: 515px;">
                                    <tbody>

                                

                                        <tr>
                                            <td style="width: 100px;" >date: </td>
                                            <td> <?php  
                                                if ($loc==1) {
                                                   echo $complain[10];
                                                } else {
                                                    echo $complain[9];
                                                }
                                           ?> </td>
                                          </tr>
                                      <tr>
                                          <?php 
                                            if ($loc==1) {?>
                                               <td>course title </td>
                                        <td> <?php
                                            $course = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rvuscms.course  where `code`='".$complain[6]."';"));
                                        echo $course[1] ?>  </td> 
                                           <?php }else {?>
                                            <td>Lecture</td>
                                            <td>
                                            <?php
                                            
                                            $lecture = mysqli_fetch_array(mysqli_query($con,"SELECT fname,lname FROM rvuscms.lecture where id='".$complain[5]."';"));
                                        echo $lecture[0]." ".$lecture[1] ?> 
                                            </td>
                                            

                                          <?php  }
                                          ?>
                                        
                                      </tr>
                                      <?php 
                                        if ($loc==1) {?>
                                        <tr>
                                            <td>semister </td>
                                            <td>  <?php echo $complain[4] ?> </td>
                                      </tr> 
                                       <?php }
                                      ?>
                                      
                                      <tr>
                                        <td>state </td>
                                        <td>  <?php 
                                            if ($loc==1) {
                                                 echo $complain[9];
                                            }else{
                                                echo $complain['state'];
                                            }
                                        ?> </td>
                                      </tr>
                                      <tr>
                                        <td>discription </td>
                                        <td>  <?php 
                                            if ($loc==1) {
                                                echo $complain[7];
                                           }else{
                                               echo $complain['disc'];
                                           }
                                         ?>
                                        </td>
                                      </tr>
                                                                                                         
                                    </tbody>
                                </table>
                                </section>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <div class="content-panel">
                                <section id="unseen" style="min-height: 380px;">
                                <form  method="get">
                                <div class="form-group">
                                    <label class="col-md-12">Discription</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" name="disc"  class="form-control form-control-line">
                                        <?php 
                                            if ($loc==1) {
                                              echo trim($complain[11]);
                                            }elseif ($loc==2) {
                                                echo trim($complain[10]);
                                            } 
                                         ?>
                                        </textarea>
                                    </div>
                                </div>
                               <br>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="replay" class="btn btn-success">replay</button>
                                    </div>
                                </div>
                                </form>
                                <section>
                            </div>
                        </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->

<?php 
include('include/footer.php');
?>