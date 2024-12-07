<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

      $button = "submit";
      $btn_name = "Add Offer";
      $path = base_url("assets/images/banner/user_b.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('coupons',['id'=>$id]);
        $row = $fetch[0];
        
        $old_code = $row['code'];
        $button = "update";
        $btn_name = "Update Offer";        
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

<script>
//Javascript
function white_space(field)
{
     field.value = (field.value).replace(/^\\s*/g,'');
}
</script>
  
      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                 <li><a href="<?=base_url('admin/view_page/dashboard');?>">SelfCare</a></li>

                                    <li class="active">Add New Offer</li>
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
                                            
                                          <!--<div class="form-group">
            <label>User Name *</label> 

                <select id="chkveg" multiple="multiple" class="form-control"   name="user_id[]" required> 
               

              <?php 
              
               
             
              $category = $this->admin_common_model->get_where('users',['type'=>'USER']); 
             
              foreach($category as $category_name){ ?>
                  <option  <?php if($row['user_id'] == $category_name['id']){echo 'selected' ; } ?> value="<?=$category_name['id']?>" ><?=$category_name['first_name'] .' '.$category_name['last_name'];?></option>
                 
              <?php } ?>
              </select>
            
          </div>
                       -->                     
                                            
                                            <div class="form-group">
                                                <label>Title (Coupon Code)</label>
                                                <input type="text" class="form-control" name="code" value="<?=$row['code'];?>">
                                            </div>


                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Percentage </label>
                                                <input type="number" min="0" max="99" class="form-control" name="percentage" value="<?=$row['percentage'];?>" >
                                            </div>


                                             <div class="form-group">
                                                <label>End Date *</label>
                                                <input type="date" class="form-control" name="end_date" required value="<?=$row['end_date'];?>">
                                            </div>


                                           


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description *</label>

                                            <textarea class="form-control" required style="width:550px; height:150px;" cols="42" rows="5" name="description"><?php
                                            if($row['description']) echo $row['description'];
                                               ?></textarea>
                                            </div>
                                            
                                            
                                              <div class="form-group col-md-8">
                                                  
                                                  <div class="image-view">
                                                    <img src="<?=$path;?>" name="image" id="image">    
                                                    </div>
                                                <label>Offer Image</label>

                                               <input type="file" name="image" onchange="readURL(this,'image');" class="form-control">
                                            </div> 
                                        </div>

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
  //  $arr_data['code'] = rand(11111,99999);

          if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "OFFER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

          //print_r($arr_data);die;

unset($arr_data['submit'],$arr_data['id']);
//$result = $this->admin_common_model->insert_data('coupons',$arr_data); 
//echo $this->db->last_query(); die;
             
        

     date_default_timezone_set('Asia/Riyadh');
        $date_time =  date('Y-m-d H:i:s');

    
    
     // send notification for Andriod

                  $arr_get1 = ['type'=>'USER'];

                   $users = $this->admin_common_model->get_where('users',$arr_get1);
                 foreach($users as $val)
			       {

                   $user_message_apk = array(
                             "message" => array(
                             "result" => "successful",
                             "key" => "New offer",
                             "register_id" => $val['register_id'],
                             "title" => "New offer added from administration",
                             "message" =>  "New offer added from administration",
                             "date"=> $date_time
                           )
                         );
                  
                  
                  
   $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => "New offer",
              "ios_status" => "New offer",
              "title" => "New offer added",
              "message" =>  "New offer added from administration",
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

$arr_data['user_id']= $val['id'];
 
    
 $this->admin_common_model->insert_data('coupons',$arr_data); 
 
 if($arr_data['user_id']){
    $arr_data_noti = [
            'user_id'=>$val['id'],
            'title'=>"New offer",
            'message'=>"New offer added",
            'notification_type'=>'Offer',
            'code'=>$arr_data['code'],
            'date_time'=>$date_time,
            ];

            $this->admin_common_model->insert_data('notification',$arr_data_noti);
}


                    }

    
    
             
              
              
echo 
"<script> swal(
  'Success',
  'Add Offer Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/couponList')."';
});

</script>";
}
   


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();


            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "OFFER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update'],$arr_data['id']);

  date_default_timezone_set('Asia/Riyadh');
        $date_time =  date('Y-m-d H:i:s');

    
    
     // send notification for Andriod


                 $this->admin_common_model->delete_data('notification',['code'=>$old_code]);


                  $arr_get1 = ['type'=>'USER'];

                   $users = $this->admin_common_model->get_where('users',$arr_get1);
                 foreach($users as $val)
			       {

                   $user_message_apk = array(
                             "message" => array(
                             "result" => "successful",
                             "key" => "New offer",
                             "register_id" => $val['register_id'],
                             "title" => "New offer added from administration",
                             "message" =>  "New offer added from administration",
                             "date"=> $date_time
                           )
                         );
                  

                        $register_userid = array($val['register_id']);


                        $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
                        
                        
                        
                         $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => "New offer",
              "ios_status" => "New offer",
              "title" => "New offer added",
              "message" =>  "New offer added from administration",
              "user_id" => '',
              "provider_id" =>'',
              "category_name" => '',
              "user_name" => '',
              "receiver_id" => '',
              "request_id" => ''
            )
        );

                       

                        $register_userid = array($val['register_id']);


                        $this->admin_common_model->ios_user_notification_new($val['ios_register_id'],$user_message_apk_ios['message']);   

                        
                        

$arr_data['user_id']= $val['id'];
$arr_data['seen_status']= 'No';
 
 $user_id= $arr_data['user_id'];
 
    
 $this->admin_common_model->update_data('coupons',$arr_data,['code'=>$old_code,'user_id'=>$user_id]); 



    if($arr_data['user_id']){
   
            
             $arr_data_noti = [
            'user_id'=>$val['id'],
            'title'=>"New offer",
            'message'=>"New offer added",
            'notification_type'=>'Offer',
            'code'=>$arr_data['code'],
            'date_time'=>$date_time
            ];

            $this->admin_common_model->insert_data('notification',$arr_data_noti);

    }

                    }

    


echo 
"<script> swal(
  'Success',
  'Update Offer Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/couponList')."';
});

</script>";

  

}


?>

<style>
     .dialog {
    padding-right: 18px;
    float: left;
    position: relative;
}
.close-thik{
   background: #FFF none repeat scroll 0% 0%;
color: #0A0A0A;
font: 14px/100% arial,sans-serif;
position: absolute;
right: 20px;
text-decoration: none;
text-shadow: 0px 1px 0px #FFF;
top: 5px; 
}
.dialog label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.upload_file {
    width: 120px;
    height: 100px;
    border: 1px solid #0070BC;
}
.dialog input{
        visibility: hidden;
    position: absolute;

}
.form-group input[type="checkbox"] {
    display: block;
}
.multiselect.dropdown-toggle.btn.btn-default {
    width: 715px;
    background-color: 
#fff;
box-shadow: none;
border-color:
    #ccc;
}
ul.multiselect-container.dropdown-menu {
    overflow-x: hidden;
    height: 125px;
    overflow-y: scroll;
}
     </style>

<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
<script>
    $(function() {

        $('#chkveg').multiselect({
        
            includeSelectAllOption: true
        
        });
    });
</script> 


