<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Zone Price";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('zone_price',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Zone Price";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
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
                                    <li><a href="#">Get&Drop</a></li>
                                    <li class="active">Add Zone Price</li>
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
                                    <div class="panel-heading"><h3 class="panel-title">ADD NEW Zone Price</h3></div>
                                    <div class="panel-body">
                                        <form role="form">
                                            
                                                 <div class="form-group">
                                                <label>Pickup Zone Name *</label>
                                                <select class="form-control" name="pickup_zone" required > 
                                               <option>--select--</option>
                                                 <?php 
                                                      $zone = $this->admin_common_model->get_all('zones');

                                                 foreach($zone as $arr){ ?>
                                               <option required <?php if($row['pickup_zone']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['zone_name'];?> </option>
                                                 <?php } ?>
                                               </select>
                                            </div>



 <div class="form-group">
                                                <label>Drop up Zone Name *</label>
                                                <select class="form-control" name="dropup_zone" required > 
                                               <option>--select--</option>
                                                 <?php 
                                                      $zone = $this->admin_common_model->get_all('zones');

                                                 foreach($zone as $arr){ ?>
                                               <option required <?php if($row['dropup_zone']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['zone_name'];?> </option>
                                                 <?php } ?>
                                               </select>
                                            </div>

                                            
                                            
                                            
                                             <div class="form-group">
                                                <label>Price *</label>
                                                <input type="number" class="form-control" name="price" required value="<?=$row['price'];?>">
                                            </div>
                                            
                                            
                                                <div class="form-group">
                                                <label>Priority Price *</label>
                                                <input type="number" class="form-control" name="priority_price" required value="<?=$row['priority_price'];?>">
                                            </div>
                                            
                                            
                                                     
                                               
                                            
                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            

                        </div> <!-- End row -->

 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button>
                                        </form>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2020 © Get&Drop.
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

           

          //print_r($arr_data);die;
date_default_timezone_set('Asia/Calcutta'); 

$arr_data['date_time']=date("Y-m-d H:i:s");
unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('zone_price',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add zone Price Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/zone_price_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add zone price',
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


          
date_default_timezone_set('Asia/Calcutta'); 

$arr_data['date_time']=date("Y-m-d H:i:s");

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('zone_price',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update zone price Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/zone_price_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating zone price',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

