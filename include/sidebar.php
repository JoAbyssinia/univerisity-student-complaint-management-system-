<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="dashboard.php" class="waves-effect<?php 
                      echo ($sidelocation==1) ? ' active' : '' ;?>"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                   
                    <li>
                        <a href="#" class="waves-effect <?php
                      echo ($sidelocation==2) ? ' active' : '' ;?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Lodge Complaints</a>
                        <ul class="nav nav-treeview" >
                            <li class="nav-item <?php
                            echo ($sideSublocation==21) ? ' active' : '' ;?> "><a href="grade-complain.php" > <i class="far fa-circle-o fa-fw"></i> Grade complaint</a></li>
                            <li class="nav-item <?php
                            echo ($sideSublocation==22) ? ' active' : '' ;?> "><a href="gender-complain.php"><i class="far fa-circle-o nav-icon fa-fw"></i>Gender Complaint</a></li>
                          
                        </ul>
                    </li>
                

                  <li>
                  <a href="#" class="waves-effect <?php
                      echo ($sidelocation==3) ? ' active' : '' ;?>"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i>Complaint History</a>

                    <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                           echo ($sideSublocation==31) ? ' active' : '' ;?>">
                        <a href="complaints-history.php" class="waves-effect"><i class=" fa fa-circle-o fa-fw"></i> grade </a>
                    </li>
                    <li class="nav-item <?php
                           echo ($sideSublocation==32) ? ' active' : '' ;?>">
                        <a href="gender-history.php" class="waves-effect"><i class=" fa fa-circle-o fa-fw"></i> gender</a>
                    </li>
                  </ul>
                  </li>

                  <li>
                  <a href="#" class="waves-effect <?php
                      echo ($sidelocation==4) ? ' active' : '' ;?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Account Setting</a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item <?php
                           echo ($sideSublocation==41) ? ' active' : '' ;?>">
                        <a href="profile.php" class="waves-effect"> <i class=" fa fa-circle-o fa-fw"></i> profile </a>
                    </li>
                    <li class="nav-item <?php
                           echo ($sideSublocation==42) ? ' active' : '' ;?>">
                        <a href="change-pass.php" class="waves-effect"><i class=" fa fa-circle-o fa-fw"></i> change password</a>
                    </li>
                  </ul>
                  </li>

                </ul>
                <div class="center p-20">
                     <a href="logout.php" class="btn btn-danger btn-block waves-effect waves-light">
                     <i class="fa fa-sign-out"></i>    
                     logout</a>
                 </div>
            </div>
            
        </div>