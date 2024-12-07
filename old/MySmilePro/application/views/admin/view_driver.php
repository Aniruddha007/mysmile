<?php include 'include/header.php';
 

         $id = $this->uri->segment(4);
     
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
     

 ?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';
        
        if($row['image']!=''){
          $path1 = base_url("uploads/images/".$row['image']);
        }else{

          $path1 = base_url("assets/images/banner/user_b.png");
           }
              
        if($row['store_logo']){
          $path2 = base_url("uploads/images/".$row['store_logo']);
        }else{

          $path2 = base_url("assets/images/banner/user_b.png");
           }
           
                  
        if($row['store_cover_image']){
          $path3 = base_url("uploads/images/".$row['store_cover_image']);
        }else{

          $path3 = base_url("assets/images/banner/user_b.png");
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
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li><a href="<?=base_url('admin/view_page/driver_list_deactive');?>">Clinic List</a></li>
                                    <li class="active">Clinic Details</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">VIEW Clinic</h3></div>
                                    <div class="panel-body">
                                     
<div class="row">
 <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">Clinic Details</span> 
                                        </a> 
                                    </li> 
                                 

                                </ul> 
                                <div class="tab-content"> 

                                    <div class="tab-pane active" id="home-2"> 
                                      
                                  <div class="row">
                                      
                                      
                                  
                 
                                      

                 <div class="col-md-3 col-lg-2 " align="center"> 
                <img alt="User Pic" src="<?=$path1;?>" class="img-circle img-responsive" style="width: 200px;height: 200px;">
                
                  <td><strong>Image:</strong></td>
                 </div>
                 
                  <div class="col-md-3 col-lg-2 " > 
                <img alt="User Pic" src="<?=$path2;?>" class="img-circle img-responsive" style="width: 200px;height: 200px;">
                
                  <td><strong>Clinic Logo:</strong></td>
                 </div>
                 
                 
                  <div class="col-md-3 col-lg-2 " align="center"> 
                <img alt="User Pic" src="<?=$path3;?>" class="img-circle img-responsive" style="width: 200px;height: 200px;">
                
                  <td><strong>Clinic Cover Image:</strong></td>
                 </div>
           
            
           
           
         
<br><br>


         

           
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


                       <tr>
                        <td><strong>Email Address:</strong></td>
                        <td><?=$row['email'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Phone Number:</strong></td>
                        <td><?=$row['mobile'];?></td>
                      </tr>


                       <tr>
                        <td><strong>Status:</strong></td>
                        <td><?=$row['status'];?></td>
                      </tr>


                
                        <tr>
                        <td><strong> Available_status:</strong></td>
                        <td><?=$row['available_status'];?></td>
                      </tr>
                      
                      <tr>
                        <td><strong>Clinic Name:</strong></td>
                        <td><?=$row['store_name'];?></td>
                      </tr>


                       <tr>
                        <td><strong>About Clinic:</strong></td>
                        <td><?=$row['about_store'];?></td>
                      </tr>
                       <tr>
                        <td><strong>Clinic Availble for :</strong></td>
                        <td><?=$row['gender_type'];?></td>
                      </tr>


                       <tr>
                        <td><strong>Clinic Address:</strong></td>
                        <td><?=$row['address'];?></td>
                      </tr>



                    
                 


                       <tr>
                        <td><strong>License Number:</strong></td>
                        <td><?=$row['license_number'];?></td>
                      </tr>


                       <tr>
                        <td><strong>NPI  Number:</strong></td>
                        <td><?=$row['NPI_number'];?></td>
                      </tr>


                       <tr>
                        <td><strong>CDS:</strong></td>
                        <td><?=$row['CDS'];?></td>
                      </tr>



                       <tr>
                        <td><strong>Malpractice Insurance:</strong></td>
                        <td><?=$row['malpractice_insurance'];?></td>
                      </tr>



                       <tr>
                        <td><strong>Malpractice Suits:</strong></td>
                        <td><?=$row['malpractice_suits'];?></td>
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

                 
                 
          
                                                           
<div class="row">
<form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row_s['store_id'];?>">

                            
                  
                                       
                                      
                                      
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
           
          
 
</form>
                        </div> <!-- End row -->

                    </tr>   
                      
                    

                     
                    </tbody>
                  </table>
                  
                </div>
              </div> 
                                    </div> 

                                    <div class="tab-pane" id="messages-2">
                                      <div class="row">

                           
                                    
                                    


                          
                           
                                   
                       
                          
                                    
                            
                                    
                                    
                                    
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
                    2020 © OneTapFuel.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
