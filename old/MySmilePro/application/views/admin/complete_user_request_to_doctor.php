<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';

         $arr_get1 = ['status'=>'Complete'];

         $this->db->order_by('id','desc');

         $req = $this->admin_common_model->get_where('user_request_to_doctor',$arr_get1);

?>

<style>
.limitcon{
      width: 50px; 
  overflow: hidden;
  text-overflow: ellipsis; 
}
</style>

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
      <a href="<?=base_url('admin/view_page/ExUser?type=Complete');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">RESA</a></li>
                                    <li class="active">User Doctore Complete Request</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">JUST COMPLETE , NOT YET PENDING REQUEST</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                           <div class="datew-times">
                                            
                                       <div class="col-md-6  col-md-offset-3" style="margin-bottom: 10px;">
                      <div class="col-md-5">
                      <div id="datetimepicker" class="input-append date">
                    <b> From: </b><input type="text" name="to" id="min" placeholder="12-04-2017 12:52 PM" class="form-control">
                      <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                      </div>
                      </div>
                      <div class="col-md-5">
                        <div id="datetimepicker_from" class="input-append date">
                    <b> To: </b><input type="text" name="from" id="max" placeholder="12-04-2017 12:52 PM" class="form-control">
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
                                                           <th>S.No</th>
                                                            <th>User Name</th>
                                                            <th>User Number</th>
                                                            <th>Doctor Name</th>
                                                            <th>Doctor Number</th>
                                                            <th>Request Status</th>
                                                            <th>Request Created Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=1; foreach($req as $row){ 

                     
                      $username = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                      $doctor = $this->admin_common_model->get_where('users',['id'=>$row['doctor_id']]);


                                   ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $username[0]['first_name']; ?></td>
                                                            <td><?= $username[0]['mobile']; ?></td>
                                                            <td><?= $doctor[0]['first_name']; ?></td>
                                                            <td><?= $doctor[0]['mobile']; ?></td>
                                                            <td><?=$row['status']; ?></td>

                                                             

                                                            <td><?= $row['date_time']; ?></td>

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
          data: {'table': 'user_request_to_doctor', 'id': id}, // change this to send js object
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
            var startDate = new Date(data[10]);
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
                "scrollX": true
            });

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>