<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Vehicle";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('vehicles',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update vehicles";        
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
                                    <li class="active">Add Vehicle</li>
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
                                    <div class="panel-heading"><h3 class="panel-title"><?php echo $btn_name;?></h3></div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>Vehicle Name *</label>
                                                <input type="text" class="form-control" name="vehicle" required value="<?=$row['vehicle'];?>">
                                            </div>


                                           <div class="form-group">
                                                <label>Base Fare *</label>
                                                <input type="number" class="form-control" name="base_fare" required value="<?=$row['base_fare'];?>">
                                            </div>


                                           <div class="form-group">
                                                <label>Price Per KM *</label>
                                                <input type="number" class="form-control" name="price_km" required value="<?=$row['price_km'];?>">
                                            </div>


                                           <div class="form-group">
                                                <label>Price Per Weight *</label>
                                                <input type="number" class="form-control" name="price_weight" required value="<?=$row['price_weight'];?>">
                                            </div>


                                           <div class="form-group">
                                                <label>Price Per Lenght *</label>
                                                <input type="number" class="form-control" name="price_length" required value="<?=$row['price_length'];?>">
                                            </div>


                                           <div class="form-group">
                                                <label>Priority Price Per KM *</label>
                                                <input type="number" class="form-control" name="priority_price_km" required value="<?=$row['priority_price_km'];?>">
                                            </div>

  <br>
                                              <div class="form-group col-md-6">
                                                  
                                                  <div class="image-view">
                            <img src="<?=$path;?>" name="image" id="image">    
                            </div>  
                                                <label>Vehicle Image</label>

                                               <input type="file" name="image" onchange="readURL(this,'image');" class="form-control">
                                            </div> 
                                        </div>

                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                          
                           

                        

 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button>
                                        </form>
                                        
                                        </div> <!-- End row -->
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

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

          //print_r($arr_data);die;

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('vehicles',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Vehicle Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/vehicle_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Vehicle',
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


            $user_image = $row['image'];
            if($_FILES['image']['name']!=''){
    
                      //  unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('vehicles',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Vehicle Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/vehicle_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Vehicle',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

