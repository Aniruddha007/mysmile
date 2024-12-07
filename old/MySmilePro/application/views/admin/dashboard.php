<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';



  $fetch_sum = $this->db->query("SELECT SUM(total_amount) AS total_amount FROM user_request WHERE (status = 'Finish')")->result_array();
if($fetch_sum){
    $fetch_sum = $fetch_sum;
}else{
    $fetch_sum = 0;
}


// total_users


  $total_users = $this->db->query("SELECT * FROM users WHERE (type = 'USER')")->result_array();
  if($total_users){
  $total_users = count($total_users);
}else{
    $total_users = 0;
}
// total_drivers


 $total_drivers = $this->db->query("SELECT * FROM users WHERE (type = 'PROVIDER')")->result_array();
 if($total_drivers){
  $total_drivers = COUNT($total_drivers);
 }else{
     $total_drivers = 0;
     }
  
// total_offer_code


 $total_offer_code = $this->db->query("SELECT * FROM coupons group by code")->result_array();
 if($total_offer_code){
  $total_offer_code = COUNT($total_offer_code);
 }else{
     $total_offer_code = 0;
 }
// total_deactive_drivers


 $total_deactive_drivers = $this->db->query("SELECT * FROM users WHERE (type = 'PROVIDER' AND status = 'Deactive')")->result_array();
  if($total_deactive_drivers){
  $total_deactive_drivers = count($total_deactive_drivers);
}else{
    $total_deactive_drivers = 0;
}

// total_active_drivers


 $total_active_drivers = $this->db->query("SELECT * FROM users WHERE (type = 'PROVIDER' AND status = 'Active')")->result_array();
  if($total_active_drivers){
  $total_active_drivers = count($total_active_drivers);
}else{
    $total_active_drivers = 0;
}

// $total_category

  $total_category = $this->db->query("SELECT * FROM procedure_list WHERE type = 'Treatment'")->result_array();
 if($total_category){
  $total_category = count($total_category);
}else{
    $total_category = 0;
}


 
// $profile_question

  $profile_question = $this->db->query("SELECT * FROM profile_question ")->result_array();
 if($profile_question){
  $profile_question = count($profile_question);
}else{
    $profile_question = 0;
}



// $total_category_service

  $total_category_service = $this->db->query("SELECT * FROM procedure_list WHERE type = 'Condition' ")->result_array();
 if($total_category_service){
  $total_category_service = count($total_category_service);
}else{
    $total_category_service = 0;
}


// total_drivers active



 $total_drivers_a = $this->db->query("SELECT * FROM users WHERE (type = 'DRIVER' AND available_status = 'ONLINE')")->result_array();
  if($total_drivers_a){
  $total_drivers_a = count($total_drivers_a);
}else{
  $total_drivers_a = 0;
    
}
// total_drivers active


 $total_drivers_d = $this->db->query("SELECT * FROM users WHERE (type = 'DRIVER' AND available_status = 'OFFLINE')")->result_array();
if($total_drivers_d){
  $total_drivers_d = count($total_drivers_d);
}else{
    $total_drivers_d = 0;
}

// total_drivers_busy active


  $total_drivers_busy = $this->db->query("SELECT *FROM users WHERE (type = 'DRIVER' AND status = 'Busy')")->result_array();
 if($total_drivers_busy){
  $total_drivers_busy = count($total_drivers_busy);
}else{
  $total_drivers_busy = 0;  
}



// total_drivers active


 $total_drivers_o = $this->db->query("SELECT * FROM users WHERE (type = 'DRIVER' AND status = 'Active')")->result_array();
  if($total_drivers_o){
  $total_drivers_o = count($total_drivers_o);
}else{
    $total_drivers_o = 0;
}
// total_drivers active



$total_drivers_of = $this->db->query("SELECT * FROM users WHERE (type = 'DRIVER' AND status = 'Deactive')")->result_array();
 if($total_drivers_of){
  $total_drivers_of =count($total_drivers_of);
}else{
    $total_drivers_of = 0;
}



  $total_earning = $this->db->query("SELECT SUM(total_amount) AS total_amount FROM user_request WHERE (status = 'End' OR status = 'Finish' OR status = 'Complete')")->result_array();
  $total_earning = $total_earning[0]['total_amount'];


// $total_booking


  $total_booking = $this->db->query("SELECT COUNT(id) AS total_user_notification FROM user_request")->result_array();
  $total_booking = $total_booking[0]['total_user_notification'];


// total_complete


  $total_complete = $this->db->query("SELECT COUNT(id) AS total_users FROM user_request WHERE (status = 'End' OR status = 'Finish' OR status = 'Complete')")->result_array();
  $total_complete = $total_complete[0]['total_users'];


// total_cancel


  $total_cancel = $this->db->query("SELECT COUNT(id) AS total_users FROM user_request WHERE (status = 'Cancel' OR status = 'Reject')")->result_array();
  $total_cancel = $total_cancel[0]['total_users'];



// total_progress


  $total_progress = $this->db->query("SELECT COUNT(id) AS total_users FROM user_request WHERE (status = 'Accept' OR status = 'Start' OR status = 'Assign')")->result_array();
  $total_progress = $total_progress[0]['total_users'];


// $total_pending


  $total_pending = $this->db->query("SELECT COUNT(id) AS total_users FROM user_request WHERE (status = 'Pending')")->result_array();
  $total_pending = $total_pending[0]['total_users'];






?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome Admin </h4>
                                <ol class="breadcrumb pull-right">
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">

<div class="main-box">
    <div class="main-hedline">
       <h1><i class="fa fa-line-chart"></i> SITE STATISTICS</h1>    
    </div>  

<div class="clearfix">
   <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow bg-info">
                                    <span class="mini-stat-icon"><i class=" fa fa-user-plus"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_users;?></span>
                                        Total Patient
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="">
                                            <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/user_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <!--   <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-purple bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_drivers;?></span>
                                       Total Employee
                                    </div>
                                    <div class="tiles-progress color-c1">
                                        <div class="">
                                           <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/driver_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                            
                          
                            
                            <!--<div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-success bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-user"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?php echo $total_drivers_of;?></span>
                                       Deactive User
                                    </div>
                                    <div class="tiles-progress color-c2">
                                        <div class="">
                                        <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/user_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-success bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?php echo $total_category;?></span>
                                       Total Producer
                                    </div>
                                    <div class="tiles-progress color-c2">
                                        <div class="">
                                        <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/category_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>


                         
                            
                              <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c3 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_category_service; ?></span>
                                    Total Conditions
                                    </div>
                                    <div class="tiles-progress bgc-cd3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/category_list1');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                         
                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-purple bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $profile_question;?></span>
                                       Total Health Record
                                    </div>
                                    <div class="tiles-progress color-c1">
                                        <div class="">
                                           <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/category_list2');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-primary bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-user"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_deactive_drivers;?></span>
                                       Deactive Provider
                                    </div>
                                    <div class="tiles-progress color-c3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/driver_list_deactive');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 


 <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c2 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_active_drivers; ?></span>
                                       Total Active Provider
                                    </div>
                                    <div class="tiles-progress bgc-cd2">
                                        <div class="">
                                         <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/driver_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                       
                      
</div>

</div>




<div class="main-box">
    <div class="main-hedline">
       <h1><i class="fa fa-line-chart"></i> BOOKING STATISTICS</h1>    
    </div>  

<div class="clearfix">
    
    
    <?php 
    
  $today_add_ride = $this->db->query("SELECT COUNT(id) AS today_add_ride FROM user_request WHERE user_request.date_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY)")->result_array();

  $today_add_ride = $today_add_ride[0]['today_add_ride'];


  $this_month_ride = $this->db->query("SELECT COUNT(id) AS this_month_ride FROM user_request WHERE user_request.date_time > DATE_SUB(CURDATE(), INTERVAL 30 DAY)")->result_array();

  $this_month_ride = $this_month_ride[0]['this_month_ride'];

  $this_year_ride = $this->db->query("SELECT COUNT(id) AS this_year_ride FROM user_request WHERE user_request.date_time > DATE_SUB(CURDATE(), INTERVAL 365 DAY)")->result_array();

  $this_year_ride = $this_year_ride[0]['this_year_ride'];


$ride_percent = ($total_complete * 100)/ $total_booking;

///////////




    ?>
    
      <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow bg-info">
                                    <span class="mini-stat-icon"><i class=" fa fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_booking;?></span>
                                        Total Booking
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="">
                                            <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/pending_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
       <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-purple bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_pending;?></span>
                                       Total Pending
                                    </div>
                                    <div class="tiles-progress color-c1">
                                        <div class="">
                                           <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/pending_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                             <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c3 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_progress; ?></span>
                                      Total In Progress
                                    </div>
                                    <div class="tiles-progress bgc-cd3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/just_booked');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            
                             <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c2 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_complete; ?></span>
                                     Total Completed
                                    </div>
                                    <div class="tiles-progress bgc-cd2">
                                        <div class="">
                                         <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/complete_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            
                               <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-primary bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-list"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_cancel; ?></span>
                                      Total Cancelled
                                    </div>
                                    <div class="tiles-progress color-c3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/cancel_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
  
  
  
  
    
      <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow bg-info">
                                    <span class="mini-stat-icon"><i class=" fa fa-money"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"> <?= $total_earning;?></span>
                                        Total Earning 
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="">
                                            <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/complete_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
</div>

</div>
        
        
                        </div> <!-- end row -->

 <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
