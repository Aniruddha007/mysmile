
<?php  $roll = $admin->type;
              $roll_id = $admin->id;
              
              
              $userList = $this->admin_common_model->get_where('admin',['id'=>$roll_id]);

 if($userList[0]['image']!=''){
          $path = base_url("uploads/images/".$userList[0]['image']);
        }else{
          $path = base_url("assets/images/users/avatar-1.jpg");
        }
        
        

        
  $total_unseen_notifi = $this->db->query("SELECT COUNT(id) AS total_users FROM notification WHERE (seen_status = 'UNSEEN' AND (notification_type = 'Profile' OR  notification_type = 'Signup') )")->result_array();
  $total_unseen_notifi = $total_unseen_notifi[0]['total_users'];

?>
 <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center" style="background-color: #3282b8;">
                        <a href="<?=base_url('admin/view_page/dashboard');?>" class="logo"><img src="<?=base_url('uploads');?>/images/logo.png" style="width: 85%;"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left">
                                    <i class="fa fa-bars" style="
    background-color: white;
"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                        

                            <ul class="nav navbar-nav navbar-right pull-right">
                              
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                               
                               <!--  <li class="hidden-xs">
                                <a href="#" class="waves-effect"><a href="<?=base_url('admin/view_page/adminNoti_list');?>"><i class="fa fa-bell" onclick="deleteUsers12345('111')"></i><span class="pcoded-badge label label-danger"><?php echo $total_unseen_notifi;?></span></a><span class="pull-right"></i></span></a>
                               </li>-->
                               
                               
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo $path;?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">

                                        <li><a href="<?=base_url('admin/view_page/profile/'.$roll_id);?>"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="<?=base_url('admin/admin_logout');?>"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

 <!-- <li class="has_sub <?php if($page=='adminNoti_list' || $page=='add_adminNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-bell"></i><span class="pcoded-badge label label-danger"><?php echo $total_unseen_notifi;?></span><span> Admin Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='adminNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/adminNoti_list');?>">Admin Notification List</a></li>

                                   
                              </ul>
                            </li>-->
                            
<?php
  $total_unseen_notifi = $this->db->query("SELECT COUNT(id) AS total_users FROM notification WHERE (seen_status = 'UNSEEN' AND (notification_type = 'Profile' OR  notification_type = 'Signup'))")->result_array();
  $total_unseen_notifi = $total_unseen_notifi[0]['total_users'];
?>
            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?=base_url('admin/view_page/dashboard');?>" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

<li class="has_sub <?php if($page=='setting_list' || $page=='add_setting'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Admin Setting </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/setting_list');?>">Admin Commission</a></li>

                                </ul>
                            </li>
                            

                 <li class="has_sub <?php if($page=='about_us' || $page=='termss' || $page=='privacy'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Patient Setting </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='about_us'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/about_us');?>">About Us</a></li>
                                   <li class="<?php if($page=='termss'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/termss');?>">Terms conditions</a></li>
                                   <li class="<?php if($page=='privacy'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/privacy');?>">Privacy Policy</a></li>

                                </ul>
                            </li>



                    <li class="has_sub <?php if($page=='about_us1' || $page=='terms1' || $page=='privacy1'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Provider Setting </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='about_us1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/about_us1');?>">About Us</a></li>
                                 <li class="<?php if($page=='terms1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/terms1');?>">Terms conditions</a></li>
                                   <li class="<?php if($page=='privacy1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/privacy1');?>">Privacy Policy</a></li>

                                </ul>
                            </li>


                       <li class="has_sub <?php if($page=='category_list' || $page=='add_cateogry'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Procedure</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='category_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/category_list');?>">Procedure List</a></li>
                                    <li class="<?php if($page=='add_category'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_category');?>">Add Procedure </a></li>
                              </ul>
                            </li>
                        
                       <li class="has_sub <?php if($page=='category_list1' || $page=='add_cateogry1'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Conditions</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='category_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/category_list1');?>">Condition List</a></li>
                                    <li class="<?php if($page=='add_category1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_category1');?>">Add Condition </a></li>
                              </ul>
                            </li>
                        
                        
                          <li class="has_sub <?php if($page=='category_list2' || $page=='add_cateogry2'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span> Health Record</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='category_list2'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/category_list2');?>">Health Record List</a></li>
                                    <li class="<?php if($page=='add_category2'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_category2');?>">Add Health Record </a></li>
                              </ul>
                            </li>
                          
                             <!--<li class="has_sub <?php if($page=='sub_category_list' || $page=='add_sub_category'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Sub Category</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='sub_category_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/sub_category_list');?>">Sub Category List</a></li>
                                    <li class="<?php if($page=='add_sub_category'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_sub_category');?>">Add Sub Category </a></li>
                              </ul>
                            </li>
                            -->

                      <!--  <li class="has_sub <?php if($page=='category_service_list' || $page=='add_category_service'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Provider Service</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='category_service_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/category_service_list');?>">Service List</a></li>
                                   <li class="<?php if($page=='add_category_service'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_category_service');?>">Add Service </a></li>
                              </ul>
                            </li>-->
                            
                            
                            
                            
                            
                        <!--    
                             <li class="has_sub <?php if($page=='zone_list' || $page=='add_zone'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Zone Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='add_zone'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_zone');?>">Add New Zone </a></li>

                                   <li class="<?php if($page=='zone_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/zone_list');?>">Zone List</a></li>
                                    
                                  </ul>
                            </li>
                            
                            
                               <li class="has_sub <?php if($page=='zone_price_list' || $page=='add_price_zone'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Zone Price Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                       
                                    <li class="<?php if($page=='add_price_zone'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_price_zone');?>">Add Zone Price</a></li>

                                    <li class="<?php if($page=='zone_price_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/zone_price_list');?>">Zone Price List</a></li>
                           </ul>
                            </li>-->

                          <!--  <li class="has_sub <?php if($page=='vehicle_list' || $page=='view_vehicle' || $page=='add_vehicle'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-car"></i><span> Vehicle Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='vehicle_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/vehicle_list');?>">Vehicle List</a></li>
                                    <li class="<?php if($page=='add_vehicle'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_vehicle');?>">Add Vehicle</a></li>
                                  
                              </ul>
                            </li>
                            -->
                            
                          <!-- <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-money"></i><span>Coupon Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='couponList'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/couponList');?>">Coupons</a></li>
                                    <li class="<?php if($page=='addCoupon'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/addCoupon');?>">Add Coupon</a></li>
                              </ul>
                            </li> -->
                            
                            
                             <li class="has_sub <?php if($page=='user_list' || $page=='add_user' || $page=='userNoti_list' || $page=='starting_banner_list' || $page=='add_userNoti' || $page=='add_starting_banner'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span>  Patient </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
<!--                                    <li><a href="<?=base_url('admin/view_page/user_dashboard');?>">Dashboard</a></li>
-->                                  

                             <li class="<?php if($page=='add_user'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_user');?>">Add Patient</a></li>

<li class="<?php if($page=='user_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/user_list');?>">Patient List</a></li>



                                    <!-- <li><a href="<?=base_url('admin/view_page/user_list1');?>">Corporate Users List</a></li>
                                -->   
                                
                                   
                                   
                             <li class="<?php if($page=='userNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/userNoti_list');?>">Patient Notification List</a></li>

                            <!-- <li class="<?php if($page=='starting_banner_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/starting_banner_list');?>">Intro pages List</a></li>-->

                                </ul>
                            </li>
                               <li class="has_sub <?php if($page=='add_starting_banner1' || $page=='add_driverNoti' || $page=='starting_banner_list1' || $page=='driverNoti_list' || $page=='driver_list' || $page=='view_driver'|| $page=='driver_list_deactive1' || $page=='add_driver' || $page=='earnList'|| $page=='driver_list_deactive' || $page=='emergency_driver_list'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span>Provider / Hygienist </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li class="<?php if($page=='add_driver'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driver');?>">Add Provider</a></li>

                                    <li class="<?php if($page=='driver_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driver_list');?>">Provider List</a></li>
                                    <li class="<?php if($page=='driver_list_deactive'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driver_list_deactive');?>">Pending Application in Admin</a></li>
<!--                                    <li class="<?php if($page=='earnList'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/earnList');?>">Driver earning </a></li>
                                    <li class="<?php if($page=='emergency_driver_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/emergency_driver_list');?>">Emergency Driver List </a></li>
                             -->  
                                                            
                        <li class="<?php if($page=='driverNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driverNoti_list');?>">Provider Notification List</a></li>
                       <!-- <li class="<?php if($page=='starting_banner_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/starting_banner_list1');?>">Intro pages List</a></li>-->

                             
                             </ul>
                            </li>
                            
                           <!-- <li class="has_sub <?php if($page=='adminNoti_list' || $page=='add_adminNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-bell"></i><span class="pcoded-badge label label-danger"><?php echo $total_unseen_notifi;?></span><span> Admin Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='adminNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/adminNoti_list');?>">Admin Notification List</a></li>

                                   
                              </ul>
                            </li>-->
                            
                          <!-- <li class="has_sub <?php if($page=='update_user_request' || $page=='update_user_request'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-question"></i><span>Provider Request </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='update_user_request'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/update_user_request');?>">Provider Request List</a></li>
                                      
                                </ul>
                            </li>-->
                            
                       <!--     <li class="has_sub <?php if($page=='emergency_dashboard' || $page=='emergency_list' || $page=='view_emergency' || $page=='add_emergency'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-plus-circle"></i><span> Emergency </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/emergency_dashboard');?>">Dashboard</a></li>
                                    <li><a href="<?=base_url('admin/view_page/emergency_list');?>">Emergency List</a></li>
                                    <li><a href="<?=base_url('admin/view_page/add_emergency');?>">Add Emergency</a></li>
                                   
                                </ul>
                            </li>-->
                            
                            

                          <!-- <li class="has_sub <?php if($page=='driver_list' || $page=='view_driver' || $page=='add_driver' || $page=='earnList'|| $page=='driver_list_deactive' || $page=='emergency_driver_list'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span>Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='driver_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driver_list');?>">Employee List</a></li>
                                    <li class="<?php if($page=='driver_list_deactive'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driver_list_deactive');?>">Pending Application in Admin</a></li>
                                    <li class="<?php if($page=='add_driver'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driver');?>">Add Employee</a></li>
                                    <li class="<?php if($page=='earnList'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/earnList');?>">Driver earning </a></li>
                                    <li class="<?php if($page=='emergency_driver_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/emergency_driver_list');?>">Emergency Driver List </a></li>
                               </ul>
                            </li>
                            -->
                            
                            
                       <!--      <li class="has_sub  <?php if($page=='couponList' || $page=='add_userNoti' || $page=='couponList' || $page=='addCoupon'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-money"></i><span>Offer Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='couponList'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/couponList');?>">Offer List</a></li>
                                   <li class="<?php if($page=='addCoupon'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/addCoupon');?>">Add New Offer </a></li>
                              </ul>
                            </li> 
                            -->
                            
                             <!--  <li class="has_sub <?php if($page=='userNoti_list' || $page=='add_userNoti' || $page=='couponList' || $page=='addCoupon'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-bell"></i><span> User Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='userNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/userNoti_list');?>">User Notification List</a></li>
                                    <li class="<?php if($page=='add_userNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_userNoti');?>">Add User Notification </a></li>
                             
                                   
                              </ul>
                            </li>
                            -->
                            
                            <!-- <li class="has_sub <?php if($page=='driverNoti_list' || $page=='add_driverNoti' || $page=='driverTrainingNoti_list' || $page=='addDriverTrainingNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-bell"></i><span> Provider Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='driverNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driverNoti_list');?>">Provider Notification List</a></li>
                                  <li class="<?php if($page=='add_driverNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driverNoti');?>">Add Provider Notification</a></li>
                             
                                    <li class="<?php if($page=='driverTrainingNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driverTrainingNoti_list');?>">Training Notification List</a></li>
                                    <li class="<?php if($page=='addDriverTrainingNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/addDriverTrainingNoti');?>">Add Training Notification</a></li>
                             
                              </ul>
                            </li>
                          -->
                          
                            
                          <!--  <li class="has_sub <?php if($page=='starting_banner_list' || $page=='add_starting_banner'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-flag"></i><span>User Intro Banner</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='starting_banner_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/starting_banner_list');?>">Intro pages List</a></li>
                                    <li class="<?php if($page=='add_starting_banner'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_starting_banner');?>">Add Intro pages</a></li>
                             </ul>
                            </li>-->
                            
                            
                             
                           <!-- <li class="has_sub <?php if($page=='starting_banner_list1' || $page=='add_starting_banner1'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-flag"></i><span>Provider Intro Banner</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='starting_banner_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/starting_banner_list1');?>">Intro pages List</a></li>
                                    <li class="<?php if($page=='add_starting_banner1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_starting_banner1');?>">Add Intro pages</a></li>
                            </ul>
                            </li>-->
                        
                            
                                 <li class="has_sub <?php if($page=='banner_list' || $page=='add_banner'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-flag"></i><span>Home Banner Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='banner_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/banner_list');?>">Banner List</a></li>
<!--                                    <li class="<?php if($page=='add_banner'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_banner');?>">Add Banner</a></li>
-->                              </ul>
                            </li>
                          
                            
                             <li class="has_sub <?php if($page=='pending_ride' || $page=='just_booked' || $page=='start_ride' || $page=='complete_ride'|| $page=='cancel_ride' || $page=='view_complete_ride'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>All Booking Request </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li><a href="<?=base_url('admin/view_page/pending_ride');?>">Pending Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/just_booked');?>">Booked Request</a></li>
<!--                                    <li><a href="<?=base_url('admin/view_page/start_ride');?>">Just Started Request</a></li>
-->                                   <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Completed Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled Request</a></li><!--
                                      <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled By User</a></li>-->
<!--                                    <li><a href="<?=base_url('admin/view_page/cancel_ride_refund');?>">Refund payment to User</a></li>
-->                                 
                                </ul>
                            </li>
                            
                          
                            
                           <!-- <li class="has_sub <?php if($page=='driverNoti_list' || $page=='add_driverNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Driver Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='driverNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driverNoti_list');?>">Employee Notification List</a></li>
                                    <li class="<?php if($page=='add_driverNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driverNoti');?>">Add Employee Notification </a></li>
                              </ul>
                            </li>-->
                            
                           
                            
                               <!-- <li class="has_sub <?php if($page=='update_driver_list' ){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span>Update Profile</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='update_driver_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/update_driver_list');?>">Update Delivery Man Profile</a></li>
                                    </ul>
                            </li>
-->
                        <!--   <li class="has_sub <?php if($page=='c_driver_map' || $page=='l_driver_map' ){echo 'active';}?>">
                                <a href="#" class="nav_icon marker"><i class="fa fa-map-marker"></i><span> Map View  </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='c_driver_map'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/c_driver_map');?>">Map </a></li>
                                    <li class="<?php if($page=='l_driver_map'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/l_driver_map');?>">Cabs Driver</a></li>
                             </ul>
                            </li>-->
                            

             <!--     <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>All Request </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li><a href="<?=base_url('admin/view_page/pending_ride');?>">Pending Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/just_booked');?>">Booked Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/start_ride');?>">Just Started Request</a></li>
                                   <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Completed Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled Request</a></li>
                                      <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled By User</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride_refund');?>">Refund payment to User</a></li>
                                 
                                </ul>
                            </li>-->
                            
                            
                        <!--    <li class="has_sub <?php if($page=='userNoti_list' || $page=='add_userNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> User Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='userNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/userNoti_list');?>">User Notification List</a></li>
                                    <li class="<?php if($page=='add_userNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_userNoti');?>">Add User Notification </a></li>
                              </ul>
                            </li>
                            
                               <li class="has_sub <?php if($page=='driverNoti_list' || $page=='add_driverNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Driver Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='driverNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driverNoti_list');?>">Driver Notification List</a></li>
                                    <li class="<?php if($page=='add_driverNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driverNoti');?>">Add Driver Notification </a></li>
                              </ul>
                            </li>-->
                            
                            <li class="has_sub <?php if($page=='feedback_list' || $page=='feedback_list1'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Feedback Details </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='feedback_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/feedback_list');?>"> Patient Feedback List</a></li>
                                    <li class="<?php if($page=='feedback_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/feedback_list1');?>"> Provider Feedback List</a></li>
                                </ul>
                            </li>
                            
                              
                              <li class="has_sub <?php if($page=='withdraw_list' || $page=='withdraw_list1'|| $page=='withdraw_list2'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Withdraw Request</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='withdraw_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/withdraw_list');?>">Pending Request</a></li>
                                    <li class="<?php if($page=='withdraw_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/withdraw_list1');?>">Completed Request</a></li>
                                    <li class="<?php if($page=='withdraw_list2'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/withdraw_list2');?>">Cancelled Request</a></li>
                              </ul>
                            </li>
                            
                             <!--  <li class="has_sub <?php if($page=='plan_list' || $page=='add_plan'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>Plan Type</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='plan_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/plan_list');?>">Plan List</a></li>
                                    <li class="<?php if($page=='add_plan'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_plan');?>">Add New Plan </a></li>
                              </ul>
                            </li>
                            
                            
                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>User Doctor Request </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/user_request_to_doctor_list');?>">New Request</a></li>
                                   <li><a href="<?=base_url('admin/view_page/complete_user_request_to_doctor');?>">Completed Request</a></li>
                  
                                </ul>
                            </li>
                            
                                <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span>User Plan Request </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/user_plan_request_list');?>">New Plan Request</a></li>
                                   <li><a href="<?=base_url('admin/view_page/all_plan_request_list');?>">Accept Reject Request</a></li>
                  
                                </ul>
                            </li>-->

                      <!--      
                           <li class="has_sub <?php if($page=='driver_list1' || $page=='view_driver1' || $page=='add_driver1'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="ion-android-social"></i><span>Cabs Drivers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='driver_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driver_list1');?>">Drivers List</a></li>
                                    <li class="<?php if($page=='add_driver1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driver1');?>">Add Driver</a></li>
                                </ul>
                            </li>




                         


                           <li class="has_sub <?php if($page=='vehicle_list' || $page=='view_vehicle' || $page=='add_vehicle'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-car"></i><span> Loading Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='vehicle_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/vehicle_list');?>">Loading Vehicle List</a></li>
                                    <li class="<?php if($page=='add_vehicle'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_vehicle');?>">Add Loading Vehicle</a></li>
                                  
                              </ul>
                            </li>
                            
                              <li class="has_sub <?php if($page=='vehicle_list1' || $page=='view_vehicle1' || $page=='add_vehicle1'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-car"></i><span> Cabs Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='vehicle_list1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/vehicle_list1');?>">Cabs Vehicle List</a></li>
                                    <li class="<?php if($page=='add_vehicle1'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_vehicle1');?>">Add Cabs Vehicle</a></li>
                              
                             
                              </ul>
                            </li>
                            
                            
                            </li>
                            
                              <li class="has_sub <?php if($page=='userNoti_list' || $page=='add_userNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> User Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='userNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/userNoti_list');?>">User Notification List</a></li>
                                    <li class="<?php if($page=='add_userNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_userNoti');?>">Add User Notification </a></li>
                              </ul>
                            </li>
                            
                               <li class="has_sub <?php if($page=='driverNoti_list' || $page=='add_driverNoti'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Driver Notification</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='driverNoti_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driverNoti_list');?>">Driver Notification List</a></li>
                                    <li class="<?php if($page=='add_driverNoti'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driverNoti');?>">Add Driver Notification </a></li>
                              </ul>
                            </li>
                            
                               <li class="has_sub <?php if($page=='feedback_list'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="ion-android-social"></i><span>Feedback Details </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='feedback_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/feedback_list');?>">Feedback List</a></li>
                                </ul>
                            </li>
                            
                        
                            

                                 <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-directions-car"></i><span> Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/pending_ride');?>">Just Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/just_booked');?>">Just Booked</a></li>
                                    <li><a href="<?=base_url('admin/view_page/start_ride');?>">Just Started Rides</a></li>
                                   <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Completed Rides</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled Rides</a></li>
                                   
                                </ul>
                            </li>
                          
                           <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-ban"></i><span>Training Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='training_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/training_list');?>">Training</a></li>
                                    <li class="<?php if($page=='add_training'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_training');?>">Add Training</a></li>
                              </ul>
                            </li>   
                          
                           <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-ban"></i><span>Coupon Details</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   <li class="<?php if($page=='couponList'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/couponList');?>">Coupons</a></li>
                                    <li class="<?php if($page=='addCoupon'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/addCoupon');?>">Add Coupon</a></li>
                              </ul>
                            </li>   -->
                   <!--       <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-ban"></i><span>Denied Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li><a href="<?=base_url('admin/view_page/user_reject_ride');?>">Rider Denied</a></li>
                                    <li><a href="<?=base_url('admin/view_page/driver_reject_ride');?>">Driver Denied</a></li>
                                </ul>
                            </li>-->
                            
                         <!--      <li class="has_sub <?php if($page=='event_list' || $page=='add_event'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-calendar"></i><span>  Events </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/event_list');?>">All Events</a></li>
                                    <li><a href="<?=base_url('admin/view_page/add_event');?>">Add Event</a></li>
                                   
                                </ul>
                            </li>



                               <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-directions-car"></i><span> Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/pending_ride');?>">Just Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/just_booked');?>">Just Booked</a></li>
                                    <li><a href="<?=base_url('admin/view_page/start_ride');?>">Just Started Rides</a></li>
                                    <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Completed Rides</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled Rides</a></li>
                                   
                                </ul>
                            </li>


                          <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-ban"></i><span>Denied Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li><a href="<?=base_url('admin/view_page/user_reject_ride');?>">Rider Denied</a></li>
                                    <li><a href="<?=base_url('admin/view_page/driver_reject_ride');?>">Driver Denied</a></li>
                                </ul>
                            </li>



                       <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Admin </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Change Password </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i> <span> Operators  </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Operators list</a></li>
                                    <li><a href="#">Add Operator</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-map-marker"></i><span> Map View  </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">View available drivers</a></li>
                                    <li><a href="#">View available users </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-globe"></i> <span> Location & Fare </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Location List</a></li>
                                    <li><a href="#">Add Location</a></li>
                                </ul>
                            </li>
                            
                           











                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-car"></i><span> Car Types </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Statistics</a></li>
                                    <li><a href="#">Car Types List</a></li>
                                </ul>
                            </li>

                           

                            <li>
                            <a href="calendar.html" class="waves-effect"><i class="fa fa-money"></i><span> Site Earnings </span></a>
                            </li>

                          

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa  fa-car"></i><span> Vehicles </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Vehicle Type List </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-star"></i><span> Review</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                  <ul class="list-unstyled">
                                    <li><a href="#">Vehicle Type List </a></li>
                                </ul>
                            </li>   -->



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
            
            
            <script>
// delete function
function deleteUsers123(id)
{
 
function(){



        $.ajax({
          url: "<?=base_url('admin/update_noti_status');?>",
          data: {'table': 'users', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);

            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

};

} 
// end delete function

</script>



