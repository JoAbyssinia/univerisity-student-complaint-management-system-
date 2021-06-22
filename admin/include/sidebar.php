<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                      
                      <?php 

                        
                      if ($_SESSION['type']=='admin') {?>
                       
                    

                      <li style="padding: 70px 0 0;">
                    
                      <a href="dashboard.php" class="waves-effect<?php
                      
                      echo ($sidelocation==1) ? ' active' : '' ;?>"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>

                    <li>
                      
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==8) ? ' active' : '' ;?>"><i class="fa fa-comments fa-fw" aria-hidden="true"></i>  Complains </a>

                      <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                            echo ($sideSublocation==81) ? ' active' : '' ;?> "><a href="comp-submitgrade.php" > <i class="far fa-circle-o fa-fw"></i>Grade Complains </a></li>
                    
                    <li class="nav-item <?php
                           echo ($sideSublocation==82) ? 'active' : '' ;?>">
                        <a href="comp-submitgender.php"> <i class="far fa-circle-o fa-fw"></i>Gender Complains</a>
                    </li>
                  </ul>
                  </li>


                    <li>
                       
                        <a href="profile.php" class="waves-effect <?php
                      echo ($sidelocation==2) ? ' active' : '' ;?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i> My Profile</a>
                    </li>
                    <li>
 
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==3) ? ' active' : '' ;?>"><i class="fa fa-bank fa-fw" aria-hidden="true"></i> Manage Admin</a>

                    <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                            echo ($sideSublocation==31) ? ' active' : '' ;?> "><a href="addadmin.php" > <i class="far fa-circle-o fa-fw"></i>Add Admin</a></li>
                    
                    <li class="nav-item <?php
                           echo ($sideSublocation==32) ? 'active' : '' ;?>">
                        <a href="viewadmin.php"> <i class="far fa-circle-o fa-fw"></i> View Admin</a>
                    </li>
                  </ul>
                  </li>

                  <li>
                      
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==4) ? ' active' : '' ;?>"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Manage Student</a>

                  <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                            echo ($sideSublocation==41) ? ' active' : '' ;?> "><a href="addstudent.php" > <i class="far fa-circle-o fa-fw"></i>Add Student</a></li>
                    
                    <li class="nav-item <?php
                           echo ($sideSublocation==42) ? 'active' : '' ;?>">
                        <a href="viewstudent.php"> <i class="far fa-circle-o fa-fw"></i> View Student</a>
                    </li>
                  </ul>

                  </li>

                  <li>
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==5) ? ' active' : '' ;?>"><i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>Manage Lectures</a>


                  <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                            echo ($sideSublocation==51) ? ' active' : '' ;?> "><a href="addlecture.php" > <i class="far fa-circle-o fa-fw"></i>Add Lectuer</a></li>
                    
                    <li class="nav-item <?php
                           echo ($sideSublocation==52) ? 'active' : '' ;?>">
                        <a href="viewlecture.php"> <i class="far fa-circle-o fa-fw"></i> View Lectuer</a>
                    </li>
                  </ul>



                  </li>
                  <li>
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==6) ? ' active' : '' ;?>"><i class="fa fa-archive fa-fw" aria-hidden="true"></i>Manage Department</a>

                   

                  <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                            echo ($sideSublocation==61) ? ' active' : '' ;?> "><a href="adddepartment.php" > <i class="far fa-circle-o fa-fw"></i>Add Department</a></li>
                    
                    <li class="nav-item <?php
                           echo ($sideSublocation==62) ? 'active' : '' ;?>">
                        <a href="viewdepartment.php"> <i class="far fa-circle-o fa-fw"></i> View Department</a>
                    </li>
                  </ul>

                  </li>
                  <li>
                        
                        
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==7) ? ' active' : '' ;?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Manage Course</a>

                        
                  <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                            echo ($sideSublocation==71) ? ' active' : '' ;?> "><a href="addcourse.php" > <i class="far fa-circle-o fa-fw"></i>Add Course</a></li>
                    
                    <li class="nav-item <?php
                           echo ($sideSublocation==72) ? 'active' : '' ;?>">
                        <a href="viewcourse.php"> <i class="far fa-circle-o fa-fw"></i> View Course</a>
                    </li>
                  </ul>
                </li>
 <!-- ende of admin  -->
                <?php } 

                if($_SESSION['type']=='lecture' ) {   ?>

                      <li style="padding: 70px 0 0;">
                    
                      <a href="dashboard.php" class="waves-effect<?php
                      
                      echo ($sidelocation==1) ? ' active' : '' ;?>"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
   
                  <li>
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==2) ? ' active' : '' ;?>"><i class="fa fa-comments fa-fw" aria-hidden="true"></i>Complains</a>


                    <ul class="nav nav-treeview">
                      <li class="nav-item <?php
                              echo ($sideSublocation==21) ? ' active' : '' ;?> "><a href="comp-grade-aprove.php" > <i class="far fa-circle-o fa-fw"></i>Grade complains</a></li>
                      
                     
                    </ul>
                </li>
                <li>
                       
                       <a href="profile.php" class="waves-effect <?php
                     echo ($sidelocation==3) ? ' active' : '' ;?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i> My Profile</a>
                   </li>

                  <?php  }  
                        
                      ?>
                  <!-- end of dep head -->
                 <!-- log out -->

                </ul>
                <div class="center p-20">
                     <a href="logout.php" class="btn btn-danger btn-block waves-effect waves-light"> <i class="fa fa-sign-out"></i> Logout </a>
                 </div>
            </div>
            
        </div>