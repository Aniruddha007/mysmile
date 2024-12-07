<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "ASC");

$driverList = $this->admin_common_model->get_where('users',[type=>'DRIVER']);

?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>&nbsp;	&nbsp;	
<!--      <a href="<?=base_url('admin/view_page/ExUser?type=loading_drivers');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
-->                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">Get&Drop</a></li>
                                    <li class="active">Delivery Man Earning List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Delivery Man Earning List</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        
                                        <div class="datew-times">
                                            
                                       <div class="col-md-6  col-md-offset-3" style="margin-bottom: 10px;">
                      <div class="col-md-5">
                      <div id="datetimepicker" class="input-append date">
                    <b>  </b><input type="hidden" name="to" id="min" placeholder="12-04-2017 12:52 PM" class="form-control">
                      <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                      </div>
                      </div>
                      <div class="col-md-5">
                        <div id="datetimepicker_from" class="input-append date">
                    <b>  </b><input type="hidden" name="from" id="max" placeholder="12-04-2017 12:52 PM" class="form-control">
                      <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                      </div>
                      </div>
          </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                         <tr>
                                                            <th>First name</th>
                                                            <th>Last Name</th>
                                                            <th>Vehicle</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>Total Delivery </th>
                                                            <th>Total Amount Earned</th>
                                                            <th>60% of the total charge</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($driverList as $row){ 
                                                     
 $car = $this->admin_common_model->get_where('vehicles',['id'=>$row['vehicle_id']]);
 
 $driver_id = $row['id'];
    $total_delivery = $this->db->query("SELECT Count(*) as total_delivery FROM user_request WHERE accept_driver_id = $driver_id AND status = 'Finish'")->result_array();

                $fetch_sum = $this->db->query("SELECT SUM(total_amount) AS total_amount FROM user_request WHERE accept_driver_id = $driver_id AND (status = 'Finish')")->result_array();

$aa = ($fetch_sum[0]['total_amount']*60)/100;
 ?>

                                                        <tr>
                                                            <td><?= $row['first_name']; ?></td>
                                                            <td><?= $row['last_name']; ?></td>
                                                            <td><?= $car[0]['vehicle']; ?></td>
                                                            <td><?= $row['email']; ?></td>
                                                            <td><?= $row['mobile']; ?></td>
                                  
										
										<td><?= $total_delivery[0]['total_delivery'] ?></td>
                                         <td><?= $fetch_sum[0]['total_amount'] ?></td>
                                         
                                         <td><?= $aa ?></td>
						
										           


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
                    2020 © Get&Drop.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
<script>
$('select').change(function () { 
       //for open loader gif
       $(document).on({
         ajaxStart: function() { $(".loading").show(); },
         ajaxStop: function() { $(".loading").hide(); }    
       });

       var getId = $(this).attr('getId');
       var available_status = $(this).val();
    // alert(getId);
        url = "<?php echo base_url().'admin/upt_driver_stts'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":getId,"available_status":available_status}, 
                  success: function(data) { 
                     
                  location.reload();
            } });

    }); 

</script>


      
<script>
$('select').change(function () { 
       //for open loader gif
       $(document).on({
         ajaxStart: function() { $(".loading").show(); },
         ajaxStop: function() { $(".loading").hide(); }    
       });

       var getId1 = $(this).attr('getId1');
       var status = $(this).val();
    // alert(getId);
        url = "<?php echo base_url().'admin/upt_driver_stts1'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":getId1,"status":status}, 
                  success: function(data) { 
                     
                  location.reload();
            } });

    }); 

</script>


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
          data: {'table': 'users', 'id': id}, // change this to send js object
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>
     $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[4]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
            
        }
        );

       
            $("#min").datepicker({ dateFormat: 'dd-mm-yy' },{ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            $("#max").datepicker({ dateFormat: 'dd-mm-yy' },{ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
 var table = $('#datatable').DataTable({
                "ordering": false,
                "scrollX": true
            });
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>


