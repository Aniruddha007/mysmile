<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "asc");

$userList = $this->admin_common_model->get_where('car_list',['type'=>'CABS']);

?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>&nbsp;	&nbsp;	
      <a href="<?=base_url('admin/view_page/ExUser?type=cabs');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">AMBE</a></li>
                                    <li class="active">Vehicle List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Vehicle List</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Vehicle Name</th>
                                                            <th>Vehicle Image</th>
                                                            <th>Minimum Charge</th>
                                                            <th>Upto KM</th>
                                                            <th>Rate/KM</th>
                                                            <th>Rate/MIN</th>
                                                            <th>GST(%)</th>
                                                            <th>Waiting Time Rate (/Min)</th>
                                                            <th>Free Time </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($userList as $row){ ?>

                                                        <tr>
                                                            <td><?= $row['car_name']; ?></td>
                                                            <td>
                                                                
                                                                   <div class="col-sm-2">
                                                                   <?php
                                                                    if ($row['image'] == ''){
                                                                      $img_url = base_url('uploads/images/user.jpg');
                                                                    }else{
                                                                      $img_url = base_url('uploads/images/'.$row['image']);
                                                                    }
                                                                  ?>
                                                                  <img src="<?=$img_url;?>" alt="" width="50"> 
                                                                </div><!-- col-sm-2 -->
                                                                
                                                            </td>
                                                            
                                                            <td><?= $row['min_charge']; ?></td>
                                                            <td><?= $row['upto_time']; ?></td>
                                                            <td><?= $row['rate_per_km']; ?></td>
                                                            <td><?= $row['rate_per_min']; ?></td>
                                                            <td><?= $row['gst']; ?></td>
                                                            <td><?= $row['waiting_time']; ?></td>
                                                            <td><?= $row['free_time']; ?></td>
                                                            <td class="text-center"><a href="<?=base_url('admin/view_page/add_vehicle1/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button> </td>


  

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
                    2018 © AMBE.
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
          data: {'table': 'car_list', 'id': id}, // change this to send js object
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
