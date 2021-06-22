<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.php">
                        <!-- Logo icon image, you can use font-icon also -->
                        
                        <!-- Logo text image you can use text also -->
                        <span>
                            <!--This is dark logo text-->
                            <img src="../plugins/images/rvulogo.jpg" alt="home" class="dark-logo" />
                            <!--This is light logo text-->
                            <img src="../plugins/images/rvulogo.jpg" style="height: 60px;margin: 5px;" alt="home" class="light-logo" />
                    
                       
                    </a>
                     </span> <b class="text-dark">
                           RVUSCMS Admin
                        </b>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-left pull-left">
                    <li>
                        <h3 class='text-white' style="padding-left: 15px; padding-top: 5px;" >Student complain managment System</h3>
                    </li>
                    
                   
                  </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    
                    <li>
                        <a class="profile-pic" href="#"> <img src="../plugins/images/blank_avatar.png" 
                            alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
                              
                              <?php 
                                
                                if (isset($_SESSION['type'])) {
                                   
                                    if ($_SESSION['type']=="admin") {
                                        $name = mysqli_fetch_array(mysqli_query($con,"SELECT fname,lname FROM rvuscms.admin where id ='".$_SESSION['userA']."';"));
                                     
                                        echo $name[0]." ".$name[1];
                                    }elseif ($_SESSION['type']=="lecture") {
                                        $name = mysqli_fetch_array(mysqli_query($con,"SELECT fname,lname,dep FROM rvuscms.lecture where id='".$_SESSION['userA']."';"));

                                        echo $name[0]." ".$name[1];
                                    }
                                }

                                
                              ?>

                            </b></a>
                    </li>
                  
									
						
                    
                <!-- </li> -->
                <!-- end: USER OPTIONS DROPDOWN -->
            </ul>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>