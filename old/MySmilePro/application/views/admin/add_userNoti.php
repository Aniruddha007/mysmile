<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

      $button = "submit";
      $btn_name = "Add Patient Notification";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('notification',['id'=>$id]);
        $row = $fetch[0];
        $old_code = $row['code'];
        $button = "update";
        $btn_name = "Resend Patient Notification";        
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
                                    <li class="active">Add Patient Notification</li>
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
                                                <label>Title *</label>
                                                <input type="text" style="width:550px; " class="form-control" name="title" required value="<?=$row['title'];?>">
                                            </div>
                                            
                                            
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Message *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="message"><?php
  if($row['message']) echo $row['message'];
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

                                         <input type="hidden" class="form-control" name="type" required value="USER" >

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
            
            $arr_data['code'] = rand(11111, 99999);

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

          //print_r($arr_data);die;



date_default_timezone_set('Asia/Riyadh');
        $date_time =  date('Y-m-d H:i:s');
        
    
    
     // send notification for Andriod

                  $arr_get1 = ['type'=>'USER','block_unblock'=>'Unblock'];

                   $users = $this->admin_common_model->get_where('users',$arr_get1);
                   
                    $i = 0; $ids = '';
                    
                 foreach($users as $val)
			       {

                   $user_message_apk = array(
                             "message" => array(
                             "result" => "successful",
                             "key" => "User Notification",
                             "register_id" => $val['register_id'],
                             "title" => $result['title'],
                             "message" => $result['message'],
                             "date"=> $date_time
                           )
                         );
                  
                  
                  $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" =>  "User Notification",
              "ios_status" => "User Notification",
              "title" => "You have a new notification",
              "message" =>  $arr_data['message'],
              "user_id" => '',
              "provider_id" =>'',
              "category_name" => '',
              "user_name" => '',
              "receiver_id" => '',
              "request_id" => ''
            )
        );

                        $register_userid = array($val['register_id']);


                        $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
                        $this->admin_common_model->ios_user_notification_new($val['ios_register_id'],$user_message_apk_ios['message']);   
                        /* if($ids == ''){
                                            $ids = $val['id'];
                                          }else{

                                         $ids = $ids.','.$val['id'];
                                       }*/
                                $i++;
                                
                               
    $arr_data = [
            'user_id'=>$val['id'],
            'title'=>$arr_data['title'],
            'message'=>$arr_data['message'],
            'notification_type'=>'Admin',
            'code'=>$arr_data['code'],
            'date_time'=>$date_time,
            ];

            $this->admin_common_model->insert_data('notification',$arr_data);
 
                                
                    }


              // end send notification for Andriod    
    
    //$arr_data['user_id'] = $ids;
    
    
    
    
echo 
"<script> swal(
  'Success',
  'Add Patient Notification Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/userNoti_list')."';
});

</script>";

   

}// end if submit


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
//$result = $this->admin_common_model->update_data('notification',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
    
    
                 $this->admin_common_model->delete_data('notification',['code'=>$old_code]);

    $arr_data['code'] = rand(11111,99999);
     // send notification for Andriod
date_default_timezone_set('Asia/Riyadh');
        $date_time =  date('Y-m-d H:i:s');
        
                  $arr_get1 = ['type'=>'USER','block_unblock'=>'Unblock'];

                   $users = $this->admin_common_model->get_where('users',$arr_get1);
                 foreach($users as $val)
			       {

                   $user_message_apk = array(
                             "message" => array(
                             "result" => "successful",
                             "key" => "User Notification",
                             "register_id" => $val['register_id'],
                             "title" => $result['title'],
                             "message" => $result['message'],
                             "date"=> $date_time
                           )
                         );
                  


   $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" =>  "User Notification",
              "ios_status" => "User Notification",
              "title" => "You have a new notification",
              "message" =>  $arr_data['message'],
              "user_id" => '',
              "provider_id" =>'',
              "category_name" => '',
              "user_name" => '',
              "receiver_id" => '',
              "request_id" => ''
            )
        );

                       
                       
                       
                        $register_userid = array($val['register_id']);


                        $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
                        $this->admin_common_model->ios_user_notification_new($val['ios_register_id'],$user_message_apk_ios['message']);   

               
    $arr_data = [
            'user_id'=>$val['id'],
            'title'=>$arr_data['title'],
            'message'=>$arr_data['message'],
            'code'=>$arr_data['code'],
            'notification_type'=>'Admin',
            'date_time'=>$date_time,
            ];

            $this->admin_common_model->insert_data('notification',$arr_data);
 
             
             
                    }


              // end send notification for Andriod    
    
    
    
echo 
"<script> swal(
  'Success',
  'Resend User Notification Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/userNoti_list')."';
});

</script>";

   // end if result




}


?>

