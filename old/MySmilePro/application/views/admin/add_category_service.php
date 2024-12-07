<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Service";
      $path = base_url("assets/images/banner/user_b.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('category_service',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Service";        
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
                                <h4 class="pull-left page-title">Welcome SelfCare Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">SelfCare</a></li>
                                    <li class="active">Add Category Service</li>
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
 <?php if($row['id']){?>
                                    <div class="panel-heading"><h3 class="panel-title">Update Category Service</h3></div>
                                    <?php }else{?>
                                    <div class="panel-heading"><h3 class="panel-title">Add Category Service</h3></div>
                                    <?php }?>
                                                                       <div class="panel-body">
                                        <form role="form">
                                            
                                            
                                      
          
          
                                    <div class="form-group">
                                                <label>Category Type *</label>
                                                  <select required class="form-control" name="category_id" onchange="getSubCategory(this.value);">
                                                       <option required> Select Category </option>
                                                      <?php 
                                                            $catList = $this->admin_common_model->get_where('category',['remove_status'=>'No']);
                                        
                                                      foreach($catList as $arr){ ?>
                                        
                                                        <option required <?php if($row['category_id'] == $arr['id']){echo 'selected' ; } ?> value="<?=$arr['id']?>" ><?=$arr['name'];?></option>
                                        
                                                      <?php } ?>
                                                      </select>
                                            </div>
          
<!--                                    <div class="form-group">
                                                <label>SubCategory *</label>
                                                       <select  required class="form-control" name="sub_cat_id"> 
                                                          <?php 
                                                          
                                                          if(!empty($row)){
                                                             $sub_cat_id = $row['sub_cat_id'];
                                                          }
                                                          else{
                                                              $sub_cat_id = '';
                                                          }
                                                          
                                                          $fetchSubCategories = $this->admin_common_model->get_where('sub_category',['id'=>$sub_cat_id]);
                                                                $subCategoriesRows = $fetchSubCategories[0];?> 
                                                      <option required value = "<?php echo $row['sub_cat_id']?>" <?php if($row['id'] == $row['sub_cat_id']){echo "selected";}else{echo "Select SubCategory";}?>><?php echo $subCategoriesRows['name']?></option>
                                            
                                                          </select>
              
                                           </div>
-->                                           
                                            <div class="form-group">
                                                <label>Service Name *</label>
                                                <input type="text" class="form-control" name="name" required value="<?=$row['name'];?>">
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label>Price*</label>
                                                <input type="number" class="form-control" name="price" required value="<?=$row['price'];?>">
                                            </div>
                                            
                                           <!--  <div class="form-group">
                                                <label>Price(With Supplies) *</label>
                                                <input type="number" class="form-control" name="price_with_supplies" required value="<?=$row['price_with_supplies'];?>">
                                            </div>
                                            -->
                                            
                                            
                                            
                                           
                                          <div class="form-group">
                                                <label for="exampleInputEmail1">Description *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="description"><?php
  if($row['description']) echo $row['description'];
?></textarea>
                                            </div>



<!--
 <div class="form-group">
                                                <label for="exampleInputEmail1">Inclusions *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="inclusions"><?php
  if($row['inclusions']) echo $row['inclusions'];
?></textarea>
                                            </div>-->


                                        
                    
                                              <div class="row clearfix">
                                               <div class="col-md-4">
                                                <div class="image-view">
                                                <img src="<?=$path;?>" name="image" id="image">    
                                                </div>    
                                                </div>
                                                </div>

 <div class="row clearfix">
                                              <div class="form-group col-md-6">
                                                <label>Image</label>

                                               <input type="file" name="image" onchange="readURL(this,'image');" class="form-control">
                                            </div>

                                              </div>
                                              
                                              
                                                 <!--    <div class="form-group">
                                                <label>Status *</label>
                                               <select class="form-control" name="status" required>
                                               <option value="">--select--</option>
                                              <option value="Active" <?php if($row['status']=='Active'){ echo 'selected'; } ?>>Active</option>
                                               <option value="Deactive" <?php if($row['status']=='Deactive'){ echo 'selected'; } ?>>Deactive</option>
                                               </select>
                                            </div> -->
                                               
                                            
                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            

                        </div> <!-- End row -->
 <a href="<?=base_url('admin/view_page/category_service_list');?>">

 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light">Save</button>
 <button type="button" name="Cancel" class="btn btn-pink waves-effect waves-light">Cancel</button>
                                        </form>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

               
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
    
    
    function getSubCategory(category_id){
 $.ajax({
          url: "<?=base_url('admin/get_sub_category');?>",
          data: {'category_id': category_id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            $("select[name='sub_cat_id']").html(result);
          }
        });
}

</script>  

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
            
           if($_FILES['image']['name']!='')
      {
               $n = rand(0, 100000);
               $img = "SERVICE_Category_IMG_" . $n . '.png';
               move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
               $arr_data['image'] = $img;        
      }

          //print_r($arr_data);die;
date_default_timezone_set('Asia/Calcutta'); 

$arr_data['date_time']=date("Y-m-d H:i:s");
unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('category_service',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Service Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/category_service_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Service',
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

 if($_FILES['image']['name']!='')
      {
               $n = rand(0, 100000);
               $img = "SERVICE_Category_IMG_" . $n . '.png';
               move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
               $arr_data['image'] = $img;        
      }      
date_default_timezone_set('Asia/Calcutta'); 

$arr_data['date_time']=date("Y-m-d H:i:s");

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('category_service',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Service Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/category_service_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Service',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

