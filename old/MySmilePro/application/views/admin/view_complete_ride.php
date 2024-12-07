<?php include 'include/header.php';

      
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('user_request',['id'=>$id]);
        $row = $fetch[0];
               
        if($row['image']!=''){
          $path111 = base_url("uploads/images/".$row['image']);
        }else{

          $path111 = base_url("assets/images/banner/user_d.png");

           }
      }
      
                      $username = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                      $drivername = $this->admin_common_model->get_where('users',['id'=>$row['provider_id']]);
                    
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
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Order List</a></li>
                                    <li class="active">View Order</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">VIEW ORDER</h3></div>
                                  
                                  
                                  
                                    <div class="row ">
        <div class="col-sm-12 cdG">
          <!--<p><?=$btn_name;?> and add them to this site.  </p>-->
        </div>
        <div class="col-sm-12 cdG">
          <?php
          $where = "(id = '$id') GROUP BY order_id";
 $iddd = $this->uri->segment(4);
    //$fetch = $this->admin_common_model->get_where('place_order',$where);

          $fetch = $this->admin_common_model->get_where('user_request',['id'=>$iddd]);

          if ($fetch) {

            foreach($fetch as $val)
            {

              $products = $total = array();

              $fetch1 = $this->admin_common_model->get_where('user_request',['id'=>$val['id']]);

$cart_id  = explode(',' , $fetch1[0]['service_id']); 
 $product = array();
              foreach($cart_id as $val1){

               

                $get = $this->admin_common_model->get_where('provider_services',['id'=>$val1]); 
               // $get = $this->admin_common_model->get_where('category_service',['id'=>$P_idd]); 
                

               
               // $get[0]['image1']= base_url().'uploads/images/'.$get[0]['image1'];
               
              //  $get[0]['quantity'] = $cart[0]['quantity'];



                $total[] = ($get[0]['price']);                             
                $product = $get[0];                           
                $products[] = $product; 

              }
              $val['total'] = $fetch1[0]['total_amount'];
              $val['product'] = $products; 
              $data[] = $val;
            }
          }
      // echo "<pre>";print_r($data);
          ?>


          <div class="bg-order">

            <div class="clearfix row">

              <div class="col-md-12">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Order ID</td>
                      <td><?php echo $data[0]['unique_code'];?></td>
                    </tr>
                    <tr>
                      <td>Order Date</td>
                      <td><?php echo $data[0]['date'];?></td> 
                    </tr>
                    
                    <tr>
                      <td>Order Time</td>
                      <td><?php echo $data[0]['time1'];?></td> 
                    </tr>
                    
                    <tr>
                      <td>Address</td>
                       <td><?php echo $data[0]['address'];?></td> 
                    </tr>
                    
                    <tr><?php    $service_place = $data[0]['service_place'];
                                                  if($service_place == 'Indoor'){
                                                      $service_place = "At Store";
                                                  }else{
                                                      $service_place = "At Home";
                                                      
                                                  }?>
                     
                    
                    
                   <tr>
                      <td>Total Amount</td>
                                            <td><?php echo number_format($data[0]['total'],2);?> <!--<strong>through Cash Payment</strong>--></td>


<!--                      <td><?php echo number_format($data[0]['total'],2);?> through <strong><?php if($data[0]['patment_method']=='COD'){echo "Cash On Delivery";}else{echo 'Online Payment';}?></strong></td>
-->                    </tr>
                    <tr>
                      <td>Offer Amount</td>
                      <?php
                      ?>
                      <td><?php echo $data[0]['offer_amount'];?></td>
                    </tr>
                   
                   
                 <td>Admin Commission</td>
                      <?php
                      ?>
                      <td><?php echo $data[0]['admin_commission'];?></td>
                    </tr>
                   
                   
                  
                   
                   
                   <tr>
                      <td>Provider Amount</td>
                      <?php
                      ?>
                      <td><?php echo $data[0]['barber_amount'];?></td>
                    </tr>
                   
                   
                   
                   <tr>
                      <td>User Name</td>
                      <?php
                      $userdata = $this->admin_common_model->get_where('users',['id'=>$data[0]['user_id']]);
                      ?>
                      <td><?php echo $userdata[0]['first_name'].' '.$userdata[0]['last_name'];?></td>
                    </tr>
                   
                    <tr>
                      <td>Provider Name</td>
                      <?php
                      $userdata1 = $this->admin_common_model->get_where('users',['id'=>$data[0]['provider_id']]);
                      ?>
                      <td><?php echo $userdata1[0]['first_name'].' '. $userdata1[0]['last_name'];?></td>
                    </tr>
                   
                   
                  </tbody>
                </table>
              </div>

              <div class="col-md-12">
               <div class="form-design">


              <!--  <div class="wizard">
                  <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                      
                     <li role="presentation" class="<?php if($data[0]['status']==$data[0]['status']){echo 'active';};?>">
                      <a>
                        <span class="round-tab"> 1 </span>
                        <p><?php echo $data[0]['status']?> Order</p>
                      </a>
                    </li>
 
                  </ul>
                </div>-->

                <form role="form">

                  <div class="tab-content">

                    <div class="tab-pane <?php if($data[0]['status']=='Pending'){echo 'active';};?>" role="tabpanel" id="step1">
                      <div class="heading-line" style="text-align: center;font-size: 38px;">
                       Order Request has been Pending
                     </div>
                   </div>

                   <div class="tab-pane <?php if($data[0]['status']=='Accept'){echo 'active';};?>" role="tabpanel" id="step2">
                     <div class="heading-line" style="text-align: center;font-size: 38px;">
                       Order Request has been Accepted
                     </div>
                   </div>

                   <div class="tab-pane <?php if($data[0]['status']=='Start'){echo 'active';};?>" role="tabpanel" id="step2">
                     <div class="heading-line" style="text-align: center;font-size: 38px;">
                       Order Request has been Start
                     </div>
                   </div>

                   <div class="tab-pane <?php if($data[0]['status']=='Complete'){echo 'active';};?>" role="tabpanel" id="step2">
                     <div class="heading-line" style="text-align: center;font-size: 38px;">
                       Order Request has been Completed
                     </div>
                   </div>

                   <div class="tab-pane <?php if($data[0]['status']=='Finish'){echo 'active';};?>" role="tabpanel" id="step2">
                     <div class="heading-line" style="text-align: center;font-size: 38px;">
                       Order Request has been Completed
                     </div>
                   </div>

                   <div class="tab-pane <?php if($data[0]['status']=='Cancel' || $data[0]['status']=='Reject'){echo 'active';};?>" role="tabpanel" id="step2">
                     <div class="heading-line" style="text-align: center;font-size: 38px;">
                       Order Request has been Cancelled
                     </div>
                   </div>
             </div>
           </form>
         </div>
         
        

       </div> 
     </div>

   </div>

 </div>

 <?php
// $products = explode($data[0]['cart_id']);
 foreach($data[0]['product'] as $product) {
 ?>
 <div class="bg-order">

  <div class="clearfix row">
   <div class="col-md-6">
     <div class="prod-mange">
       <div class="media">
        <div class="media-left media-middle">
          
         <!-- <a href="#">
            <img class="media-object" style="width: 110px;height: 100px;min-width: 100%;object-fit: contain;margin: 0 auto;" src="<?php echo $product['image'];?>">
          </a>
         -->
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $product['name'];?></h4>
          
          <p>Service Name : <?php echo $product['service_name'];?></p>
          <p>Service Price : <?php echo $product['service_rate'];?></p>
<!--          <p>Service Quantity : <?php echo $product['quantity'];?></p>
          <p>Amount : <?php  $aa = $product['price'] * $product['quantity']; echo $aa;?></p>-->
         <!-- <p>Seller: <?php 
          $seller = $this->admin_common_model->get_where('users',['id'=>$product['user_id']]);

          echo $seller[0]['first_name']?$seller[0]['first_name']:'Seller Name Not Available';?></p>-->
        </div>
      </div>
    </div>  
  </div> 

</div>

</div>
<?php } ?>



</div><!-- /.col-sm-9 -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                        
                           

                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

           
            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
