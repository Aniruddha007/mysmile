<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

      $button = "submit";
      $btn_name = "Add Employee Notification";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('notification',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Employee Notification";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
        
        if($row['licence_image']!=''){
          $path1 = base_url("uploads/images/".$row['licence_image']);
        }
        
        if($row['vehicle_reg_image']!=''){
          $path2 = base_url("uploads/images/".$row['vehicle_reg_image']);
        }
        
        if($row['vehicle_insura_image']!=''){
          $path3 = base_url("uploads/images/".$row['vehicle_insura_image']);
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
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">Vegotta</a></li>
                                    <li class="active">Add Empoyee Training Notification</li>
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
                                                <label>Category Type *</label>
                                                 <?php $category = $this->admin_common_model->get_all('category');  ?>
                                                  <select style="width:550px; " name = "category_id" class="form-control" required>
                                                      <option value="">--select--</option>
                                                    <?php foreach($category as $category_name){?>
                                                      <option style="width:550px; " <?php if($row['category_id'] == $category_name['id']){echo 'selected' ; } ?> value="<?=$category_name['id']?>" ><?=$category_name['name'];?></option>
                                                    <?php } ?>
                                                  </select>
                                            </div>
          
          
          
                                            <div class="form-group">
                                                <label>Title *</label>
                                                <input type="text" style="width:550px; " class="form-control" name="title" required value="<?=$row['title'];?>">
                                            </div>
                                            
                                            
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Message/Link *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="message"><?php
  if($row['message']) echo $row['message'];
?></textarea>
                                            </div>
                                            
                                            
                                           <!-- <div class="form-group">
                                                <label>Title *</label>
                                                <input type="text" class="form-control" name="title" required value="<?=$row['title'];?>">
                                            </div>

                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Description *</label>
                                                <input type="text" class="form-control" name="description" required value="<?=$row['description'];?>" >
                                            </div>

                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Apply Amount *</label>
                                                <input type="number" class="form-control" name="apply_amount" required value="<?=$row['apply_amount'];?>" >
                                            </div>

                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Incentive Amount *</label>
                                                <input type="number" class="form-control" name="incentive_amount" required value="<?=$row['incentive_amount'];?>" >
                                            </div>


                                             <div class="form-group">
                                                <label>Start Date  *</label>
                                                <input type="date" class="form-control" name="start_date" required value="<?=$row['start_date'];?>">
                                            </div>

                                             <div class="form-group">
                                                <label>End Date *</label>
                                                <input type="date" class="form-control" name="end_date" required value="<?=$row['end_date'];?>">
                                            </div>
-->

                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
<!--                            <div class="col-md-6">
                            <div class="image-view">
                            <img src="<?=$path;?>" name="image" id="image">    
                            </div>    
                            </div>
-->                           

                        </div> <!-- End row -->

 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button>
                                        </form>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2021 © Vegotta.
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
$result = $this->admin_common_model->insert_data('notification_training',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
    
    
    
    
    
     // send notification for Andriod

                  $arr_get1 = ['type'=>'DRIVER'];

                   $users = $this->admin_common_model->get_where('users',$arr_get1);
                 foreach($users as $val)
			       {

                   $user_message_apk = array(
                             "message" => array(
                             "result" => "successful",
                             "key" => "Employee Training Notification",
                             "register_id" => $val['register_id'],
                             "title" => $arr_data['title'],
                             "message" => $arr_data['message'],
                             "date"=> date('Y-m-d h:i:s')
                           )
                         );
                  

                        $register_userid = array($val['register_id']);


                        $this->admin_common_model->driver_apk_notification($register_userid, $user_message_apk);

                    }


              // end send notification for Andriod  
              
              
echo 
"<script> swal(
  'Success',
  'Add Employee Notification Training Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/driverTrainingNoti_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Employee Training Notification',
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
$result = $this->admin_common_model->update_data('notification_training',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Employee Notification Training Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driverNoti_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Employee Training Notification',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

