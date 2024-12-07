<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Terms Condition";
      $path = base_url("assets/images/banner/user_b.png");
      $id = $this->uri->segment(4);
    
        $fetch = $this->admin_common_model->get_where('settings',['type'=>'USER']);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Terms Condition";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      
?>
      
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>


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
                                    <div class="panel-heading"><h3 class="panel-title">Update Terms Condition</h3></div>
                                    <?php }else{?>
                                    <div class="panel-heading"><h3 class="panel-title">Add Category</h3></div>
                                    <?php }?>
                                    <div class="panel-body">
                                        <form role="form">
                                           
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Terms Condition *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="term"><?php
  if($row['term']) echo $row['term'];
?></textarea>
                                            </div>
                                            
                                         <!--   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Terms Condition Arabic*</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="term_sp"><?php
  if($row['term_sp']) echo $row['term_sp'];
?></textarea>
                                            </div>-->
                                            
                                            <!--<div class="form-group">
                                                <label>Price *</label>
                                                <input type="number" class="form-control" name="price" required value="<?=$row['price'];?>">
                                            </div>
                                            -->       
                                             <!--   <div class="form-group">
                                                <label>Status *</label>
                                               <select class="form-control" name="status" required>
                                               <option value="">--select--</option>
                                              <option value="Active" <?php if($row['status']=='Active'){ echo 'selected'; } ?>>Active</option>
                                               <option value="Deactive" <?php if($row['status']=='Deactive'){ echo 'selected'; } ?>>Deactive</option>
                                               </select>
                                            </div>
                                                   -->  
                                            
                                            
                                           
                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            

                        </div> <!-- End row -->
 <a href="<?=base_url('admin/view_page/about_us');?>">
 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light">Save</button>

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

          
$arr_data['date_time']=date("Y-m-d H:i:s");
unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('settings',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Terms conditions Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/category_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Terms conditions',
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

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('settings',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
    
echo 
"<script> swal(
  'Success',
  'Update Terms conditions Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/termss')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Terms conditions',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>


<script>

tinymce.init({
    selector: 'textarea',
    height: 200,
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true
});

// 
// CKEDITOR.replace('editor1', {});
// CKEDITOR.replace('editor2', {});
// CKEDITOR.replace('description', {});
</script>
