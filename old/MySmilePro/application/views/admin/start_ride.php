<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';

         $arr_get1 = ['status'=>'Accept'];

         $this->db->order_by('id','ASC');

         $req = $this->admin_common_model->get_where('user_request',$arr_get1);

?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
      

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>&nbsp;	&nbsp;	
      <a href="<?=base_url('admin/view_page/ExUser?type=Accept');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">RESA</a></li>
                                    <li class="active">Start Request</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">JUST START , NOT YET COMPLETE REQUEST</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>User Name</th>
                                                            <th>Driver Name</th>
                                                            <th>Request Id</th>
                                                            <th>Booked Date</th>
                                                            <th>Booked Time</th>
                                                            <th>Pickup Address</th>
                                                            <th>Ambulances Number</th>
                                                            <th>Driver Name</th>
                                                            <th>Status</th>
                                                            <th>Request Created Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=1; foreach($req as $row){ 

                      $username = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                      $drivername = $this->admin_common_model->get_where('drivers',['id'=>$row['accept_driver_id']]);
                      $veh = $this->admin_common_model->get_where('car_list',['id'=>$row['vehicle_type']]);

                                   ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $username[0]['name']; ?></td>
                                                            <td><?= $drivername[0]['first_name']; ?></td>
                                                            <td><?= $row['id']; ?></td>
                                                            <td><?= $row['date']; ?></td>
                                                            <td><?= $row['time']; ?></td>
                                                            <td><?= $row['pick_address']; ?></td>
                                                            <td><?= "test"; ?></td>
                                                            <td><?= "mp09 mx456"; ?></td>
                                                            <td><?= $row['status']; ?></td>
                                                            <td><?= $row['date_time']; ?></td>

                                                            <td class="text-center"> <a href="<?=base_url('admin/view_page/view_start_ride/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-eye"></i></a> </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>


  

                                                        </tr>
<?php $i++; } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © RESA.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->
<script>
// delete function
function deleteUsers(id)
{
  swal({
  title: "Are you sure?",
  text: "You want to permanently remove this item!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/delete_data');?>",
          data: {'table': 'user_request', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("Deleted!", "Your selected item has been deleted.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>

 <?php include 'include/footer.php';?>