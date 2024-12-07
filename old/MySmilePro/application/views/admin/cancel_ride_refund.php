<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';

         $arr_get1 = ['status'=>'Cancel','payment_type'=>'Card','payment_verified'=>'Verified','refund_status'=>'Pending'];

         $this->db->order_by('id','desc');

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
<!--      <a href="<?=base_url('admin/view_page/ExUser?type=Reject');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
-->                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">RESA</a></li>
                                    <li class="active">Refund Payment to User</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">REFUND PAYMENT TO USER</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                           <div class="datew-times">
                                            
                                       <div class="col-md-6  col-md-offset-3" style="margin-bottom: 10px;">
                      <div class="col-md-5">
                      <div id="datetimepicker" class="input-append date">
                   <input type="hidden" name="to" id="min" placeholder="12-04-2017 12:52 PM" class="form-control">
                      <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                      </div>
                      </div>
                      <div class="col-md-5">
                        <div id="datetimepicker_from" class="input-append date">
                    <input type="hidden" name="from" id="max" placeholder="12-04-2017 12:52 PM" class="form-control">
                      <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                      </div>
                      </div>
          </div>
          
          
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                         <tr>
                                                            <th>User Name</th>
                                                            <th>Pickup Address</th>
                                                            <th>Drop Address</th>
                                                            <th>User Assign Ambulance</th>
                                                            <th>Status</th>
                                                            <th>Payment Type</th>
                                                            <th>Payment Verified Status</th>
                                                            <th>Total Amount</th>
                                                            <th>Refund Amount</th>
                                                            <th>Refund Payment Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=1; foreach($req as $row){ 

$refund = ($row['paid_amount'] *  10 )/100;
$refund = $row['paid_amount'] - $refund;

                      $username = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                      $ambu = $this->admin_common_model->get_where('users',['id'=>$row['driver_id']]);
                      $driver = $this->admin_common_model->get_where('users',['type'=>'DRIVER']);



                                   ?>
                                                        <tr>
                                                            <td><?= $username[0]['first_name']; ?></td>
                                                            <td><?= $row['pick_address']; ?></td>
                                                            <td><?= $row['drop_address']; ?></td>
<!--                                                            <td><?= $ambu[0]['registration_no']; ?></td>
-->                                                            <td><?= $ambu[0]['first_name']; ?></td>
                                                            <td><?= $row['status']; ?></td>
                                                            
                                                      
                     
                                               <td><?= $row['payment_type']; ?></td>
                                               <td><?= $row['payment_verified']; ?></td>
                                               <td><?= $row['paid_amount']; ?></td>
                                               <td><?= $refund; ?></td>

                                         
                               
                    <td><select info name="refund_status" getId="<?=$row[id];?>" class="table-select" id="<?=$row[id];?>">

                   <option <?php if($row['refund_status']=='Pending'){echo "selected"; } ?> value="Pending"> Pending </option>
                   <option <?php if($row['refund_status']=='Complete'){echo "selected"; } ?> value="Complete"> Complete </option>

             
                        </select>
                      </td>
                                    

                                                            

                                                            <td class="text-center"> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>


  

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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>
     $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[9]);
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
            });
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>



<script>

    $('.table-select').change(function () { 

var id = $(this).attr('id');
//alert(id);

//$("#"+id).attr("disabled","disabled");
 
       //for open loader gif
       $(document).on({
         ajaxStart: function() { $(".loading").show(); },
         ajaxStop: function() { $(".loading").hide(); } 
       });

       var getId = $(this).attr('getId');
       var refund_status = $(this).val(); 
       $.post("<?=base_url().'admin/upt_refund_status';?>", { refund_status: refund_status, id: getId });
      location.reload();

   
       
    });   

</script>


