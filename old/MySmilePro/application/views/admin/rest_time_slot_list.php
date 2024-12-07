<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';


 $roll = $admin->type;
                $roll_id = $admin->id;
             
      $button = "submit";
      $btn_name = "Update Clinic Time";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      
        $row = $this->admin_common_model->get_where('store_details',['store_id'=>$id]);
       
   // print_r($row);die;
      
      

?>

<link rel="stylesheet" href="css/intlTelInput.css">
    
    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Update Clinic Time</h4>
                                <ol class="breadcrumb pull-right">
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Update Clinic Time</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
<form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row['store_id'];?>">

                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Clinic Time Slot</h3></div>
                                    <div class="panel-body" style="padding-bottom: 5%;">
                                       
                                           

   
                                           
                                          <div class="row">
   <!-- <div class="col-md-3">
<div class="form-group">
                                                <label>Day Name *</label>
                                                <input readonly type="text" class="form-control" name="day1" required value="Monday"> <br>
                                                 <input readonly type="text" class="form-control" name="day2" required value="Tuesday"><br>
                                                 <input readonly type="text" class="form-control" name="day3" required value="Wednesday"><br>
                                                 <input readonly type="text" class="form-control" name="day4" required value="Thursday"><br>
                                                 <input readonly type="text" class="form-control" name="day5" required value="Friday"><br>
                                                 <input readonly type="text" class="form-control" name="day6" required value="Saturday"><br>
                                                 <input readonly type="text" class="form-control" name="day7" required value="Sunday">

                                            </div></div>
                                            
 <div class="col-md-3">
<div class="form-group">
                                                <label>Open Time *</label>
                                               <select class="form-control" name="o_time_day1" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[0]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[0]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[0]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[0]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[0]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[0]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[0]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[0]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[0]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[0]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[0]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[0]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[0]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[0]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[0]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[0]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[0]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[0]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[0]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[0]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[0]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[0]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[0]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[0]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               <br>
                                                <select class="form-control" name="o_time_day2" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[1]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[1]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[1]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[1]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[1]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[1]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[1]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[1]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[1]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[1]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[1]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[1]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[1]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[1]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[1]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[1]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[1]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[1]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[1]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[1]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[1]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[1]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[1]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[1]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               <br>
                                               <select class="form-control" name="o_time_day3" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[2]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[2]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[2]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[2]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[2]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[2]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[2]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[2]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[2]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[2]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[2]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[2]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[2]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[2]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[2]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[2]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[2]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[2]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[2]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[2]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[2]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[2]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[2]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[2]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                                <br>
                                                <select class="form-control" name="o_time_day4" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[3]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[3]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[3]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[3]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[3]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[3]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[3]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[3]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[3]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[3]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[3]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[3]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[3]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[3]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[3]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[3]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[3]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[3]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[3]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[3]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[3]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[3]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[3]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[3]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               
                                                <br>
                                                <select class="form-control" name="o_time_day5" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[4]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[4]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[4]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[4]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[4]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[4]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[4]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[4]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[4]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[4]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[4]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[4]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[4]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[4]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[4]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[4]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[4]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[4]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[4]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[4]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[4]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[4]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[4]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[4]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                                <br>
                                               
                                                <select class="form-control" name="o_time_day6" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[5]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[5]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[5]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[5]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[5]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[5]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[5]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[5]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[5]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[5]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[5]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[5]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[5]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[5]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[5]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[5]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[5]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[5]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[5]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[5]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[5]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[5]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[5]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[5]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                                <br>
                                               
                                                <select class="form-control" name="o_time_day7" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[6]['open_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[6]['open_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[6]['open_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[6]['open_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[6]['open_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[6]['open_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[6]['open_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[6]['open_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[6]['open_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[6]['open_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[6]['open_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[6]['open_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[6]['open_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[6]['open_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[6]['open_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[6]['open_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[6]['open_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[6]['open_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[6]['open_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[6]['open_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[6]['open_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[6]['open_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[6]['open_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[6]['open_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                            </div></div>
                                            
 <div class="col-md-3">
<div class="form-group">
                                                <label>Close Time *</label>
                                               
                                                <select class="form-control" name="c_time_day1" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[0]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[0]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[0]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[0]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[0]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[0]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[0]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[0]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[0]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[0]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[0]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[0]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[0]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[0]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[0]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[0]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[0]['close_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[0]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[0]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[0]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[0]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[0]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[0]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[0]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               <br>
                                                  <select class="form-control" name="c_time_day2" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[1]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[1]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[1]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[1]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[1]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[1]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[1]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[1]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[1]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[1]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[1]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[1]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[1]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[1]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[1]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[1]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[1]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[1]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[1]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[1]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[1]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[1]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[1]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               <br>
                                                 <select class="form-control" name="c_time_day3" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[2]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[2]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[2]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[2]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[2]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[2]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[2]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[2]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[2]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[2]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[2]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[2]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[2]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[2]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[2]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[2]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[2]['close_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[2]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[2]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[2]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[2]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[2]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[2]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[2]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                                <br>
                                                 <select class="form-control" name="c_time_day4" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[3]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[3]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[3]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[3]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[3]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[3]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[3]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[3]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[3]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[3]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[3]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[3]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[3]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[3]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[3]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[3]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[3]['close_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[3]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[3]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[3]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[3]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[3]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[3]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[3]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               
                                                <br>
                                                 <select class="form-control" name="c_time_day5" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[4]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[4]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[4]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[4]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[4]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[4]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[4]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[4]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[4]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[4]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[4]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[4]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[4]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[4]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[4]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[4]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[4]['close_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[4]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[4]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[4]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[4]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[4]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[4]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[4]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                                <br>
                                               
                                                <select class="form-control" name="c_time_day6" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[5]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[5]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[5]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[5]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[5]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[5]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[5]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[5]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[5]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[5]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[5]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[5]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[5]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[5]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[5]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[5]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[5]['close_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[5]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[5]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[5]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[5]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[5]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[5]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[5]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                                <br>
                                               
                                                <select class="form-control" name="c_time_day7" required>
                                               <option value="">--select--</option>
                                              <option value="01:00" <?php if($row[6]['close_time']=='01:00'){ echo 'selected'; } ?>>01:00</option>
                                              <option value="02:00" <?php if($row[6]['close_time']=='02:00'){ echo 'selected'; } ?>>02:00</option>
                                              <option value="03:00" <?php if($row[6]['close_time']=='03:00'){ echo 'selected'; } ?>>03:00</option>
                                              <option value="04:00" <?php if($row[6]['close_time']=='04:00'){ echo 'selected'; } ?>>04:00</option>
                                              <option value="05:00" <?php if($row[6]['close_time']=='05:00'){ echo 'selected'; } ?>>05:00</option>
                                              <option value="06:00" <?php if($row[6]['close_time']=='06:00'){ echo 'selected'; } ?>>06:00</option>
                                              <option value="07:00" <?php if($row[6]['close_time']=='07:00'){ echo 'selected'; } ?>>07:00</option>
                                              <option value="08:00" <?php if($row[6]['close_time']=='08:00'){ echo 'selected'; } ?>>08:00</option>
                                              <option value="09:00" <?php if($row[6]['close_time']=='09:00'){ echo 'selected'; } ?>>09:00</option>
                                              <option value="10:00" <?php if($row[6]['close_time']=='10:00'){ echo 'selected'; } ?>>10:00</option>
                                              <option value="11:00" <?php if($row[6]['close_time']=='11:00'){ echo 'selected'; } ?>>11:00</option>
                                              <option value="12:00" <?php if($row[6]['close_time']=='12:00'){ echo 'selected'; } ?>>12:00</option>
                                              <option value="13:00" <?php if($row[6]['close_time']=='13:00'){ echo 'selected'; } ?>>13:00</option>
                                              <option value="14:00" <?php if($row[6]['close_time']=='14:00'){ echo 'selected'; } ?>>14:00</option>
                                              <option value="15:00" <?php if($row[6]['close_time']=='15:00'){ echo 'selected'; } ?>>15:00</option>
                                              <option value="16:00" <?php if($row[6]['close_time']=='16:00'){ echo 'selected'; } ?>>16:00</option>
                                              <option value="17:00" <?php if($row[6]['close_time']=='17:00'){ echo 'selected'; } ?>>17:00</option>
                                              <option value="18:00" <?php if($row[6]['close_time']=='18:00'){ echo 'selected'; } ?>>18:00</option>
                                              <option value="19:00" <?php if($row[6]['close_time']=='19:00'){ echo 'selected'; } ?>>19:00</option>
                                              <option value="20:00" <?php if($row[6]['close_time']=='20:00'){ echo 'selected'; } ?>>20:00</option>
                                              <option value="21:00" <?php if($row[6]['close_time']=='21:00'){ echo 'selected'; } ?>>21:00</option>
                                              <option value="22:00" <?php if($row[6]['close_time']=='22:00'){ echo 'selected'; } ?>>22:00</option>
                                              <option value="23:00" <?php if($row[6]['close_time']=='23:00'){ echo 'selected'; } ?>>23:00</option>
                                              <option value="24:00" <?php if($row[6]['close_time']=='24:00'){ echo 'selected'; } ?>>24:00</option>
                                               </select>
                                               
                                               </div></div>
                                               
 <div class="col-md-3">
<div class="form-group">
                                                <label>Open Status *</label>
                                                <select class="form-control" name="o_open_status_day1" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[0]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[0]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               <br>
                                               
                                            <select class="form-control" name="o_open_status_day2" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[1]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[1]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               <br>
                                               
                                            <select class="form-control" name="o_open_status_day3" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[2]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[2]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               <br>
                                               
                                            <select class="form-control" name="o_open_status_day4" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[3]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[3]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               <br>
                                               
                                            <select class="form-control" name="o_open_status_day5" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[4]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[4]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               <br>
                                               
                                            <select class="form-control" name="o_open_status_day6" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[5]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[5]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               <br>
                                               
                                            <select class="form-control" name="o_open_status_day7" required>
                                               <option value="">--select--</option>
                                              <option value="OPEN" <?php if($row[6]['store_ope_closs_status']=='OPEN'){ echo 'selected'; } ?>>OPEN</option>
                                               <option value="CLOSE" <?php if($row[6]['store_ope_closs_status']=='CLOSE'){ echo 'selected'; } ?>>CLOSE</option>
                                               </select>
                                               </div></div></div>-->
                                               
                                            
                                         
                                           <?php $id = $this->uri->segment(4);
      
        $row_s = $this->admin_common_model->get_where('store_details',['store_id'=>$id]);
        
             foreach($row_s as $row_d){
                 
                 
                  $t1_new  = date("g:i a", strtotime($row_d['open_time']));
                  $t2_new  = date("g:i a", strtotime($row_d['colse_time']));
                  $t3_new  = $row_d['store_ope_closs_status'];
                  
              /*   $t1 = $row_d['open_time'];
                 $t1_new = "00:00 AM";

                 if($t1 == '01:00'){
                     
                     $t1_new = "01:00 AM";
                 }
                 if($t1 == '02:00'){
                     
                     $t1_new = "02:00 AM";
                 }
                 if($t1 == '03:00'){
                     
                     $t1_new = "03:00 AM";
                 }
                 
                 if($t1 == '04:00'){
                     
                     $t1_new = "04:00 AM";
                 }
                 
                 if($t1 == '05:00'){
                     
                     $t1_new = "05:00 AM";
                 }
                 
                 if($t1 == '06:00'){
                     
                     $t1_new = "06:00 AM";
                 }
                 
                 if($t1 == '07:00'){
                     
                     $t1_new = "07:00 AM";
                 }
                 
                 if($t1 == '08:00'){
                     
                     $t1_new = "08:00 AM";
                 }
                 
                 if($t1 == '09:00'){
                     
                     $t1_new = "09:00 AM";
                 }
                 
                 if($t1 == '10:00'){
                     
                     $t1_new = "11:00 AM";
                 }
                 
                 if($t1 == '11:00'){
                     
                     $t1_new = "11:00 AM";
                 }
                 
                 if($t1 == '12:00'){
                     
                     $t1_new = "12:00 AM";
                 }
                 
                 if($t1 == '13:00'){
                     
                     $t1_new = "01:00 PM";
                 }
                 
                 if($t1 == '14:00'){
                     
                     $t1_new = "02:00 PM";
                 }
                 
                 if($t1 == '15:00'){
                     
                     $t1_new = "03:00 PM";
                 }
                 
                 
                 if($t1 == '16:00'){
                     
                     $t1_new = "04:00 PM";
                 }
                 
                 
                 if($t1 == '17:00'){
                     
                     $t1_new = "05:00 PM";
                 }
                 
                 
                 if($t1 == '18:00'){
                     
                     $t1_new = "06:00 PM";
                 }
                 
                 
                 if($t1 == '19:00'){
                     
                     $t1_new = "07:00 PM";
                 }
                 
                 
                 if($t1 == '20:00'){
                     
                     $t1_new = "08:00 PM";
                 }
                 
                 
                 if($t1 == '21:00'){
                     
                     $t1_new = "09:00 PM";
                 }
                 
                 
                 if($t1 == '22:00'){
                     
                     $t1_new = "10:00 PM";
                 }
                 
                 
                 if($t1 == '23:00'){
                     
                     $t1_new = "11:00 PM";
                 }
                 
                 
                 if($t1 == '24:00'){
                     
                     $t1_new = "12:00 PM";
                 }
                 
                  if($t1 == '00:00' || $t1 == '0.0'){
                     
                     $t1_new = "00:00 PM";
                 }
                 
                 $t2 = $row_d['close_time'];
                   $t2_new = "00:00 AM";
                 
                  if($t2 == '01:00'){
                     
                     $t2_new = "01:00 AM";
                 }
                 if($t2 == '02:00'){
                     
                     $t2_new = "02:00 AM";
                 }
                 if($t2 == '03:00'){
                     
                     $t2_new = "03:00 AM";
                 }
                 
                 if($t2 == '04:00'){
                     
                     $t2_new = "04:00 AM";
                 }
                 
                 if($t2 == '05:00'){
                     
                     $t2_new = "05:00 AM";
                 }
                 
                 if($t2 == '06:00'){
                     
                     $t2_new = "06:00 AM";
                 }
                 
                 if($t2 == '07:00'){
                     
                     $t2_new = "07:00 AM";
                 }
                 
                 if($t2 == '08:00'){
                     
                     $t2_new = "08:00 AM";
                 }
                 
                 if($t2 == '09:00'){
                     
                     $t2_new = "09:00 AM";
                 }
                 
                 if($t2 == '10:00'){
                     
                     $t2_new = "11:00 AM";
                 }
                 
                 if($t2 == '11:00'){
                     
                     $t2_new = "11:00 AM";
                 }
                 
                 if($t2 == '12:00'){
                     
                     $t2_new = "12:00 AM";
                 }
                 
                 if($t2 == '13:00'){
                     
                     $t2_new = "01:00 PM";
                 }
                 
                 if($t2 == '14:00'){
                     
                     $t2_new = "02:00 PM";
                 }
                 
                 if($t2 == '15:00'){
                     
                     $t2_new = "03:00 PM";
                 }
                 
                 
                 if($t2 == '16:00'){
                     
                     $t2_new = "04:00 PM";
                 }
                 
                 
                 if($t2 == '17:00'){
                     
                     $t2_new = "05:00 PM";
                 }
                 
                 
                 if($t2 == '18:00'){
                     
                     $t2_new = "06:00 PM";
                 }
                 
                 
                 if($t2 == '19:00'){
                     
                     $t2_new = "07:00 PM";
                 }
                 
                 
                 if($t2 == '20:00'){
                     
                     $t2_new = "08:00 PM";
                 }
                 
                 
                 if($t2 == '21:00'){
                     
                     $t2_new = "09:00 PM";
                 }
                 
                 
                 if($t2 == '22:00'){
                     
                     $t2_new = "10:00 PM";
                 }
                 
                 
                 if($t2 == '23:00'){
                     
                     $t2_new = "11:00 PM";
                 }
                 
                 
                 if($t2 == '24:00'){
                     
                     $t2_new = "12:00 PM";
                 }
                   if($t2 == '00:00' || $t2 == '0.0'){
                     
                     $t2_new = "00:00 PM";
                 }*/
                 
       ?>    
                                  <?php if($t3_new == 'OPEN'){ ?>                             
                                    <tr>
                        <td><strong><?php echo $row_d['open_day'];?> : ( <?php echo $t1_new;?> - <?php echo $t2_new;?> ) </strong> </td>
                    <br><br>
                      </tr>             
                                        
                            <?php }else{ ?>
                            
                                 <tr>
                        <td><strong><?php echo $row_d['open_day'];?> : ( Closed ) </strong> </td>
                    <br><br>
                      </tr>     
                            
               <?php             } } ?>         
               


                                   

                                    </div>
                                    
                                       <div>
<!--              <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button> 
-->           </div> 
                                </div> 
                            </div> 
                            
                   <!-- <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Restaurant Information</h3></div>
                                    <div class="panel-body">
                                   
                                          


                                   
                                            <div class="form-group">
                                                <label>Registration Number </label>
                                                <input type="text"  class="form-control" name="reg_number"  value="<?=$row['reg_number'];?>">
                                            </div>

     
                                            <div class="form-group">
                                                <label>TIN Number </label>
                                                <input type="text"  class="form-control" name="tin_number"  value="<?=$row['tin_number'];?>">
                                            </div>

<!--
                                            <div class="form-group">
                                                <label>GST </label>
                                                <input type="text"  class="form-control" name="GST"  value="<?=$row['GST'];?>">
                                            </div>

     
                                            <div class="form-group">
                                                <label>Business Type</label>
                                                <input type="text"  class="form-control" name="business_type"  value="<?=$row['business_type'];?>">
                                            </div>
-->

                                       
                                            
                                            


  

          
           

                                       <!--  <div class="form-group">
                                                <label>Vehicle License Image</label><br>
                                                <img src="<?=$path1;?>" width="100" height="100" id="licence_image">
                                                <input type="file"  name="licence_image">
                                              
                                            </div> 
                                            
                                               <div class="form-group">
                                                <label>Vehicle Registration Image</label><br>
                                                <img src="<?=$path2;?>" width="100" height="100" id="vehicle_reg_image">
                                                <input type="file"  name="vehicle_reg_image">
                                              
                                            </div> 
                                            
                                               <div class="form-group">
                                                <label>Vehicle Insurance Image</label><br>
                                                <img src="<?=$path3;?>" width="100" height="100" id="vehicle_insura_image">
                                                <input type="file"  name="vehicle_insura_image">
                                              
                                            </div> -->

                                      
                                      
                                    </div>
                                </div> 
                            </div>
           
          
 
</form>
                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

            

            </div>
          
        </div>
        <!-- END wrapper -->

 <?php include 'include/footer.php';?>
 
 
<script src="js/intlTelInput.js"></script>
<script>
var input = document.querySelector("#mobile");
window.intlTelInput(input);


var input = document.querySelector("#phone");
intlTelInput(input, {
    utilsScript: "js/utils.js"
});
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

           
          /////////
           $day1 = $arr_data['day1'];
          $day2 = $arr_data['day2'];
          $day3 = $arr_data['day3'];
          $day4 = $arr_data['day4'];
          $day5 = $arr_data['day5'];
          $day6 = $arr_data['day6'];
          $day7 = $arr_data['day7'];
          
          $o_time_day1 = $arr_data['o_time_day1'];
          $o_time_day2 = $arr_data['o_time_day2'];
          $o_time_day3 = $arr_data['o_time_day3'];
          $o_time_day4 = $arr_data['o_time_day4'];
          $o_time_day5 = $arr_data['o_time_day5'];
          $o_time_day6 = $arr_data['o_time_day6'];
          $o_time_day7 = $arr_data['o_time_day7'];
          
          $c_time_day1 = $arr_data['c_time_day1'];
          $c_time_day2 = $arr_data['c_time_day2'];
          $c_time_day3 = $arr_data['c_time_day3'];
          $c_time_day4 = $arr_data['c_time_day4'];
          $c_time_day5 = $arr_data['c_time_day5'];
          $c_time_day6 = $arr_data['c_time_day6'];
          $c_time_day7 = $arr_data['c_time_day7'];
          
          
          $o_open_status_day1 = $arr_data['o_open_status_day1'];
          $o_open_status_day2 = $arr_data['o_open_status_day2'];
          $o_open_status_day3 = $arr_data['o_open_status_day3'];
          $o_open_status_day4 = $arr_data['o_open_status_day4'];
          $o_open_status_day5 = $arr_data['o_open_status_day5'];
          $o_open_status_day6 = $arr_data['o_open_status_day6'];
          $o_open_status_day7 = $arr_data['o_open_status_day7'];
          
          
     unset($arr_data['day1'],$arr_data['day2'],$arr_data['day3'],$arr_data['day4'],$arr_data['day5'],$arr_data['day6'],$arr_data['day7']);     
     unset($arr_data['o_time_day1'],$arr_data['o_time_day2'],$arr_data['o_time_day3'],$arr_data['o_time_day4'],$arr_data['o_time_day5'],$arr_data['o_time_day6'],$arr_data['o_time_day7']);     
     unset($arr_data['c_time_day1'],$arr_data['c_time_day2'],$arr_data['c_time_day3'],$arr_data['c_time_day4'],$arr_data['c_time_day5'],$arr_data['c_time_day6'],$arr_data['c_time_day7']);     
     unset($arr_data['o_open_status_day1'],$arr_data['o_open_status_day2'],$arr_data['o_open_status_day3'],$arr_data['o_open_status_day4'],$arr_data['o_open_status_day5'],$arr_data['o_open_status_day6'],$arr_data['o_open_status_day7']);     
          /////////

        
if ($day1) {
    
    
          $roll_id = $this->uri->segment(4);

       $this->Webservice_model->delete_data('store_details',['store_id'=>$roll_id]);
        
   
  $arr_rest_details1 = [
            'store_id'=>$roll_id,
            'open_day'=>$day1,
            'open_time'=>$o_time_day1,
            'close_time'=>$c_time_day1,
            'store_ope_closs_status'=>$o_open_status_day1,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details1); 
  
   
  $arr_rest_details2 = [
            'store_id'=>$roll_id,
            'open_day'=>$day2,
            'open_time'=>$o_time_day2,
            'close_time'=>$c_time_day2,
            'store_ope_closs_status'=>$o_open_status_day2,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details2); 


 $arr_rest_details3 = [
            'store_id'=>$roll_id,
            'open_day'=>$day3,
            'open_time'=>$o_time_day3,
            'close_time'=>$c_time_day3,
            'store_ope_closs_status'=>$o_open_status_day3,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details3); 


 $arr_rest_details4 = [
            'store_id'=>$roll_id,
            'open_day'=>$day4,
            'open_time'=>$o_time_day4,
            'close_time'=>$c_time_day4,
            'store_ope_closs_status'=>$o_open_status_day4,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details4); 


 $arr_rest_details5 = [
            'store_id'=>$roll_id,
            'open_day'=>$day5,
            'open_time'=>$o_time_day5,
            'close_time'=>$c_time_day5,
            'store_ope_closs_status'=>$o_open_status_day5,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details5); 


 $arr_rest_details6 = [
            'store_id'=>$roll_id,
            'open_day'=>$day6,
            'open_time'=>$o_time_day6,
            'close_time'=>$c_time_day6,
            'store_ope_closs_status'=>$o_open_status_day6,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details6); 


 $arr_rest_details7 = [
            'store_id'=>$roll_id,
            'open_day'=>$day7,
            'open_time'=>$o_time_day7,
            'close_time'=>$c_time_day7,
            'store_ope_closs_status'=>$o_open_status_day7,
            ];
      $this->admin_common_model->insert_data('store_details',$arr_rest_details7); 





echo 
"<script> swal(
  'Success',
  'Update Store Time Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driver_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Clinic',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit



?>

