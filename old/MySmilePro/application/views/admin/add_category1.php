<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Procedure";
      $path = base_url("assets/images/banner/user_b.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('procedure_list',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Procedure";        
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
                                <h4 class="pull-left page-title">Welcome Admin</h4>
                                <ol class="breadcrumb pull-right">
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Add Condition</li>
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
                                    <div class="panel-heading"><h3 class="panel-title">Update Condition</h3></div>
                                    <?php }else{?>
                                    <div class="panel-heading"><h3 class="panel-title">Add Condition</h3></div>
                                    <?php }?>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>Condition Name *</label>
                                                <input type="text" class="form-control" name="name" required value="<?=$row['name'];?>">
                                            </div>
                                                    <input type="hidden" class="form-control" name="type" required value="Condition">

                                           <!--   <div class="form-group">
                                                <label>Category Name(in Arabic) *</label>
                                                <input type="text" class="form-control" name="name_ar" required value="<?=$row['name_ar'];?>">
                                            </div>-->
                                            
                                         <div class="form-group">
                                                <label>Admin Price *</label>
                                                <input type="number" class="form-control" name="price" required value="<?=$row['price'];?>">
                                            </div>
                                                  
                                             <!--   <div class="form-group">
                                                <label>Status *</label>
                                               <select class="form-control" name="status" required>
                                               <option value="">--select--</option>
                                              <option value="Active" <?php if($row['status']=='Active'){ echo 'selected'; } ?>>Active</option>
                                               <option value="Deactive" <?php if($row['status']=='Deactive'){ echo 'selected'; } ?>>Deactive</option>
                                               </select>
                                            </div>
                                                   -->  
                                            
                                            
                                            

                                              </div>

                                       

 <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            

                        </div> <!-- End row -->
 <a href="<?=base_url('admin/view_page/category_list1');?>">
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

</script>
<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

       
       //print_r($arr_data);die;
date_default_timezone_set('Asia/Riyadh'); 

$arr_data['date_time']=date("Y-m-d H:i:s");
unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('procedure_list',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Condition Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/category_list1')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Condition',
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


          
date_default_timezone_set('Asia/Riyadh'); 

$arr_data['date_time']=date("Y-m-d H:i:s");

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('procedure_list',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
    
echo 
"<script> swal(
  'Success',
  'Update Condition Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/category_list1')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Condition',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

