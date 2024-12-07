<?php include 'include/header.php';
 

         $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users_update',['id'=>$id]);
        $row = $fetch[0];
     

 ?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';
        
      
              
        if($row['image']!=''){
          $path111 = base_url("uploads/images/".$row['image']);
        }else{

          $path111 = base_url("assets/images/banner/user_d.png");
           }
           
           
            if($row['licence_image']!=''){
          $path1 = base_url("uploads/images/".$row['licence_image']);
        }else{

          $path1 = base_url("assets/images/banner/user_d.png");
           }
           
           
            if($row['vehicle_image']!=''){
          $path2 = base_url("uploads/images/".$row['vehicle_image']);
        }else{

          $path2 = base_url("assets/images/banner/user_d.png");
//http://ambitious.in.net/AMBE/assets/images/banner/user_d.png
           }
           
            if($row['vehicle_insura_image']!=''){
          $path3 = base_url("uploads/images/".$row['vehicle_insura_image']);
        }else{

          $path3 = base_url("assets/images/banner/user_d.png");
//http://ambitious.in.net/EZLoading/assets/images/banner/user_d.png
           }
           
            if($row['registration_image']!=''){
          $path4 = base_url("uploads/images/".$row['registration_image']);
        }else{

          $path4 = base_url("assets/images/banner/user_d.png");
//http://ambitious.in.net/EZLoading/assets/images/banner/user_d.png
           }
      }
                         
                            $d_type = $this->admin_common_model->get_where('vehicles',['id'=>$row['vehicle_id']]);



   
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
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">GetDrop</a></li>
                                    <li><a href="<?=base_url('admin/view_page/update_driver_list');?>">Delivery Man Profile Update</a></li>
                                    <li class="active">Driver Details</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">VIEW Delivery Man Profile Update</h3></div>
                                    <div class="panel-body">
                                     
<div class="row">
 <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">Delivery Man Profile Update</span> 
                                        </a> 
                                    </li> 
                                   
                                    <li class="tab"> 
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">Documents</span> 
                                        </a> 
                                    </li> 

                                </ul> 
                                <div class="tab-content"> 

                                    <div class="tab-pane active" id="home-2"> 
                                      
                                  <div class="row">
                <div class="col-md-3 col-lg-2 " align="center"> 
                <img alt="User Pic" src="<?=$path111;?>" class="img-circle img-responsive">
                 </div>
           
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information paddingt">
                    <tbody>

                      <tr>
                        <td><strong>First name:</strong></td>
                        <td><?=$row['first_name'];?></td>
                      </tr>
                      <tr>
                        <td><strong>Last name:</strong></td>
                        <td><?=$row['last_name'];?></td>
                      </tr>


                     
                    </tbody>
                  </table>
                  
                </div>
              </div>

                                    </div> 

                                    <div class="tab-pane" id="profile-2">
                                      <div class="row">
           
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information paddingt">
                    <tbody>

                 

                       <tr>
                        <td><strong>Type:</strong></td>
                        <td><?=$d_type[0]['vehicle'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Registration Number:</strong></td>
                        <td><?=$row['registration_no'];?></td>
                      </tr>

                    

                     
                    </tbody>
                  </table>
                  
                </div>
              </div> 
                                    </div> 

                                    <div class="tab-pane" id="messages-2">
                                      <div class="row">

                            <!-- Area Chart -->
                            <div class="col-lg-6">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Driver Documents</h3> 
                                    </div> 
                                    
                                    
                                    
                                  <div class="panel-body"> 
                                       <div class="form-group">
                                         <label>Image</label><br>
                                           <img src="<?=$path111;?>" width="200" height="200" id="image">
<a id="<?php echo $row['image'];?>" href="<?=$path111;?>" download="<?php echo $row['image'];?>">Download</a>
                                        </div> 
                                    </div>
                                    
                                      
                                  <div class="panel-body"> 
                                       <div class="form-group">
                                         <label>Licence Image</label><br>
                                           <img src="<?=$path1;?>" width="200" height="200" id="licence_image">
<a id="<?php echo $row['licence_image'];?>" href="<?=$path1;?>" download="<?php echo $row['licence_image'];?>">Download</a>
                                        </div> 
                                    </div>
                                    
                                    
                                         
                                  <div class="panel-body"> 
                                       <div class="form-group">
                                         <label>Vehicle Image</label><br>
                                           <img src="<?=$path2;?>" width="200" height="200" id="vehicle_image">
<a id="<?php echo $row['vehicle_image'];?>" href="<?=$path2;?>" download="<?php echo $row['vehicle_image'];?>">Download</a>

                                        </div> 
                                    </div>
                                    
                                    
                                     <div class="panel-body"> 
                                       <div class="form-group">
                                         <label>Vehicle insurance Image</label><br>
                                           <img src="<?=$path3;?>" width="200" height="200" id="vehicle_insura_image">
<a id="<?php echo $row['vehicle_insura_image'];?>" href="<?=$path3;?>" download="<?php echo $row['vehicle_insura_image'];?>">Download</a>

                                        </div> 
                                    </div>
                                    
                                       <div class="panel-body"> 
                                       <div class="form-group">
                                         <label>Registration Image</label><br>
                                           <img src="<?=$path4;?>" width="200" height="200" id="registration_image">
<a id="<?php echo $row['registration_image'];?>" href="<?=$path4;?>" download="<?php echo $row['registration_image'];?>">Download</a>

                                        </div> 
                                    </div>
                                    
                            
                                    
                                    
                                    
                                </div>
                            </div> <!-- col -->
                            

                                    
                                </div>
                            </div> <!-- col -->
                        </div> <!-- End row-->
                                    </div> 
                                  
                                </div> 
                            </div>  
</div>

    
        


                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                        
                           

                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2020 © GetDrop.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
