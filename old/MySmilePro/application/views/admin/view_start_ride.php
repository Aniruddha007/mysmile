<?php include 'include/header.php';

      
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('user_request',['id'=>$id]);
        $row = $fetch[0];
               
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }else{

          $path = base_url("assets/images/banner/user_d.png");

           }
      }
      
 $username = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                      $drivername = $this->admin_common_model->get_where('users',['id'=>$row['accept_driver_id']]);
                      $veh = $this->admin_common_model->get_where('car_list',['id'=>$row['vehicle_type']]);

 ?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">AMBE</a></li>
                                    <li><a href="<?=base_url('admin/view_page/driver_reject_ride');?>">Driver Denied Ride</a></li>
                                    <li class="active">View Rejected Ride</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">RIDE REJECTED BY DRIVER</h3></div>
                                    <div class="panel-body">
                                        
              <div class="row">
                <!--<div class="col-md-3 col-lg-3 " align="center"> 
                <img alt="User Pic" src="<?=$path;?>" class="img-circle img-responsive">
                 </div>-->
           
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information paddingt">
                    <tbody>

                                                            
                                                           

                                                            
                      <tr>
                        <td><strong>Bill number:</strong></td>
                        <td><?=$row['order_number'];?></td>
                      </tr>

                       <tr>
                        <td><strong>User Name:</strong></td>
                        <td><?=$username[0]['username'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Driver Name:</strong></td>
                        <td><?=$drivername[0]['mobile'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Booked Date:</strong></td>
                        <td><?=$row['date'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Booked Time:</strong></td>
                        <td><?=$row['time'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Pickup Address:</strong></td>
                        <td><?=$row['pick_address'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Dropoff Address:</strong></td>
                        <td><?=$row['drop_address'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Vehicle Name:</strong></td>
                        <td><?=$veh[0]['car_name'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Helper:</strong></td>
                        <td><?=$row['helper'];?></td>
                      </tr>
                      
                      
                       <tr>
                        <td><strong>Insurance Policy:</strong></td>
                        <td><?=$row['insurance_policy'];?></td>
                      </tr>
                      
                       <tr>
                        <td><strong>Request Created Date:</strong></td>
                        <td><?=$row['date_time'];?></td>
                      </tr>
                       
                     
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
        


                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                        
                           

                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © AMBE.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
