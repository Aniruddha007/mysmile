<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Request";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('user_request',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Request";        
        if($row['item_image']!=''){
          $path = base_url("uploads/images/".$row['item_image']);
        }
      }
      
                            $driver = $this->admin_common_model->get_where('users',['type'=>'DRIVER','vehicle_id'=>$row['vehicle_id']]);

              $users = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
              $pick_zone_list = $this->admin_common_model->get_all('zones');
              $drop_zone_list = $this->admin_common_model->get_all('zones');
              $car_list = $this->admin_common_model->get_all('vehicles');
              $fuels = $this->admin_common_model->get_all('fuels');

?>
      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">OneTapFuel</a></li>
                                    <li class="active">Update Request</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
<form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">

                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">UPDATE REQUEST</h3></div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>User Name *</label>
                                                <input type="text" class="form-control" name="first_name" required value="<?=$users[0]['first_name'].' '.$users[0]['last_name'];?>">
                                            </div>
                                            
                                          
                                     <div class="form-group">
                                                <label>Fuel Type *</label>
                                                <select class="form-control" name="fuel_id" required > 
                                               <option>--select--</option>
              <?php foreach($fuels as $arr){ ?>
                 <option <?php if($row['fuel_id']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['fuel_name'];?> </option>
              <?php } ?>
                                               </select>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label>Driver Name *</label>
                                                <select info name="accept_driver_id" required getId="<?=$row[id];?>" class="table-select form-control" id="<?=$row[id];?>" status="<?=$row[status];?>">
                       <option>--select--</option>
                       
              <?php foreach($driver as $arr){ 
                  
               $distance = $this->admin_common_model->distance($arr['lat'], $arr['lon'], $row['pickup_lat'], $row['pickup_lon'], $miles = false);
                                   $distance = number_format($distance, 2, '.', '');

              ?>
                 <option <?php if($row['accept_driver_id']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['first_name'];?> </option>

              <?php } ?>
                        </select>
                                            </div>
                                            
                                          
                                           
                                            <div class="form-group">
                                                <label>Drop Address  *</label>
                                                <input type="text" class="form-control" name="drop_address" required value="<?=$row['drop_address'];?>">
                                            </div>

                                        <!--    <div class="form-group">
                                                <label>Pickup Zone *</label>
                                                <select class="form-control" name="pickup_zone" required > 
                                               <option>--select--</option>
                                              <?php foreach($pick_zone_list as $arr){ ?>
                                                 <option <?php if($row['pickup_zone']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['zone_name'];?> </option>
                                              <?php } ?>
                                               </select>
                                            </div>-->
                                            
                                            
                                           <!--   <div class="form-group">
                                                <label>Drop Zone *</label>
                                                <select class="form-control" name="dropup_zone" required > 
                                               <option>--select--</option>
                                              <?php foreach($drop_zone_list as $arr){ ?>
                                                 <option <?php if($row['dropup_zone']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['zone_name'];?> </option>
                                              <?php } ?>
                                               </select>
                                            </div>
-->
                                        
                                             <div class="form-group">
                                                <label>Quantity *</label>
                                                <input type="number" class="form-control" name="quantity" required value="<?=$row['quantity'];?>">
                                            </div>
                                            
                                          
                                            
                                             <div class="form-group">
                                                <label>Total Amount *</label>
                                                <input type="number" class="form-control" name="total_amount" required value="<?=$row['total_amount'];?>">
                                            </div>
                                             <div class="form-group">
                                                <label>Description *</label>
                                                <input type="text" class="form-control" name="description" required value="<?=$row['description'];?>">
                                            </div>
                      <!--   <div class="col-md-6">
                                
                            </div>-->
                                             

                        
                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                          
                           

                        </div> <!-- End row -->

 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button>
                                        </form>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2020 © OneTapFuel.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
<script>

   function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

          //print_r($arr_data);die;
date_default_timezone_set('Asia/Calcutta'); 

$arr_data['date_time']=date("Y-m-d H:i:s");
unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('user_request',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Request Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/just_booked')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Request',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();


            $user_image = $row['item_image'];
            if($_FILES['item_image']['name']!=''){
    
                      //  unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "ITEM_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['item_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['item_image'] = $img; 

            }
date_default_timezone_set('Asia/Calcutta'); 

$arr_data['date_time']=date("Y-m-d H:i:s");

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update'],$arr_data['first_name']);
$result = $this->admin_common_model->update_data('user_request',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Request Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/just_booked')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Request',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

