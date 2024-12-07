<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

      $button = "submit";
      $btn_name = "Add Note";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $rec_email = $fetch[0]['email'];
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Note";        
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
      
                    //   $car_list = $this->admin_common_model->get_where('car_list',[type =>'LOADING']);

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
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Add Note</li>
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
                                           <!-- <div class="form-group">
                                                <label>Title *</label>
                                                <input type="text" class="form-control" name="title" required value="<?=$row['title'];?>">
                                            </div>-->


 
                                           
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Note(for account Block) *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="note_block"><?php
  if($row['note_block']) echo $row['note_block'];
?></textarea>
                                            </div>


                                           <!--  <div class="form-group">
                                                <label>Start Date  *</label>
                                                <input type="date" class="form-control" name="start_date" required value="<?=$row['start_date'];?>">
                                            </div>

                                             <div class="form-group">
                                                <label>End Date *</label>
                                                <input type="date" class="form-control" name="end_date" required value="<?=$row['end_date'];?>">
                                            </div>-->


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

           
$arr_where = ['id'=>$arr_data['id']];


unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
    
    
    
echo 
"<script> swal(
  'Success',
  'Add Note Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/user_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Note',
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



$u_id = $arr_data['id'];
$u_note = $arr_data['note_block'];
           
           
$notes = $arr_data['note'];
$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
    
    
    
     $arr_get1 = ['id'=>$u_id];

                   $users_r = $this->admin_common_model->get_where('users',$arr_get1);
                   
                
                

                   $user_message_apk = array(
                             "message" => array(
                             "result" => "successful",
                             "key" => "User Block Note",
                             "register_id" => $users_r[0]['register_id'],
                             "note" => $u_note,
                             "date"=> date('Y-m-d h:i:s')
                           )
                         );
                  

$user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => "User Block Note",
              "ios_status" =>"User Block Note",
              "title" => "User Block Note",
              "message" => "User Block Note",
              "user_id" => '',
              "provider_id" =>'',
              "category_name" => '',
              "note" => $u_note,
              "user_name" => '',
              "receiver_id" => '',
              "request_id" => ''
            )
        );
        
                        $register_userid = array($users_r[0]['register_id']);


                        $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
                        
                 $this->admin_common_model->ios_user_notification_new($users_r[0]['ios_register_id'],$user_message_apk_ios['message']);       

  $arr_data_noti = [
            'user_id'=>$users_r[0]['id'],
            'request_id'=>'',
            'title'=>"User Block Note",
            'type'=>"USER",
            'message'=>$u_note,
            'notification_type'=>'Note',
            ];

            $this->admin_common_model->insert_data('notification',$arr_data_noti);



              // end send notification for Andriod   
    
    
           /*              $to =$rec_email;
                         $subject = "SelfCare | Your Account Note";
                         $body = "<div style='max-width: 600px; width: 100%; margin-left: auto; margin-right: auto;'>
                         

                         <div style='margin-top: 10px; padding-right: 10px; 
                         padding-left: 125px;
                         padding-bottom: 20px;'>
                         <hr>
                         <h3 style='color: #232F3F;'>Hi, ".$rec_email.",</h3>
                         <p>Welcome to SelfCare, please check note and update your account.</p>
                         <br>
                         <h3 style='color: #232F3F;'>Hi, ".$notes.",</h3>

                         <hr>

                         <p>Warm Regards<br>SelfCare <br>Support Team</p>

                         </div>
                         </div>

                         </div>";
                         
                          $headers = "From: info@SelfCare.com" . "\r\n";
                         $headers.= "MIME-Version: 1.0" . "\r\n";
                         $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $body, $headers);
        */
        
echo 
"<script> swal(
  'Success',
  'Update Note Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/user_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Note',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

