<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';

         $arr_get1 = ['status'=>'Finish'];

         $this->db->order_by('id','desc');

         $req = $this->admin_common_model->get_where('user_request',$arr_get1);
         $req = $this->db->query("SELECT * FROM user_request WHERE  status='Finish' OR status='End' OR status='Complete'  order by id desc")->result_array();

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
<!--      <a href="<?=base_url('admin/view_page/ExUser?type=Complete');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
-->                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Complete Booked Request</li>
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
                                        
                                        
                                                <section class="content">
    <form action="<?php echo base_url(); ?>admin/goRequest3" method="POST" id="bulk_form" onsubmit="delete_confirm()">



      				<input type="submit" class="btn btn-danger" name="<?php echo $a ="DELETE";?>" value="<?php echo $a ="DELETE";?>"/>
      								
      								
      								
      								
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
                                                            				                                            <th><input type="checkbox" id="select_all" value=""/></th> 

                                                            <th>Request Code</th>

                                                            <th>User Name</th>
                                                            <th>Provider Name</th>
                                                            <th>Total Amount</th>
                                                            <th>OfferAmount</th>
                                                            <th>AdminAmount</th>
                                                            <th>ProviderAmount</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Bids</th>
                                                            <th>Charting</th>
                                                            <th>PaymentStatus</th>
                                                            <th>Description</th>
                                                            <th>RequestDate</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=1; foreach($req as $row){ 
   $service_place = $row['service_place'];
                                                  if($service_place == 'Indoor'){
                                                      $service_place = "At Store";
                                                  }else{
                                                      $service_place = "At Home";
                                                      
                                                  }
                     
                          $username = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                          $driver = $this->admin_common_model->get_where('users',['id'=>$row['provider_id']]);
                      


                                   ?>
                                                        <tr>
                                                                                                                <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>  

                                                             <td><?= $row['unique_code']; ?></td>

                                                            <td><?= $username[0]['first_name'].' '.$username[0]['last_name']; ?></td>
                                                            <td><?= $driver[0]['first_name'].' '.$driver[0]['last_name']; ?></td>
                                                            <td><?= $row['total_amount']; ?></td>
                                                            <td><?= $row['offer_amount']; ?></td>
                                                                <td><?= $row['admin_commission']; ?></td>
                                                                <td><?= $row['barber_amount']; ?></td>
                                                            <td><?= $row['date']; ?></td>
                                                            <td><?= $row['time1']; ?></td>

 <td> <a href="<?=base_url('admin/view_page/request_bid_list/'.$row['id']);?>"><button type="button" class="btn btn-purple waves-effect waves-light" >Bids</button></a>
                                                </td>
                                                 <td> <a href="<?=base_url('admin/view_page/request_charting_list/'.$row['id']);?>"><button type="button" class="btn btn-purple waves-effect waves-light" >Charting</button></a>
                                                </td>
                  
                  
                                                            <td><?= $row['payment_confirmation']; ?></td>
                                                            <td><?= $row['description']; ?></td>
                                                            
                                                            <td><? 
                                                            
                                                            
                                              $date_time  = date("Y-m-d g:i a", strtotime($row['date_time']));
                                                            
                                                            echo $date_time; ?></td>
                                                            
                                                              <td class="text-center">
                                                              <a href="<?=base_url('admin/view_page/view_complete_ride/'.$row['id']);?>">
                                                                <button class="btn view-t" type="button">
                                                                  <i class="fa  fa-eye"></i>
                                                                </button>
                                                              </a> 
                                                           
                                                             </td>
                                                  
                                               
<!--
                                                            <td class="text-center"> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button> <a href="<?=base_url('admin/view_page/view_complete_ride/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-eye"></i></a> </button></td>

-->
  

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
    function delete_confirm(){
       // alert('dsds');
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure ?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record.');
        return false;
    }
}



$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>

<style type="text/css">
.table-striped > tbody > tr:nth-of-type(2n+1){
background-color: #fff;
}

.table-striped > tbody > tr{background-color: #f6f6f6;  }

</style>

<script type="text/javascript">
  $(function () {
    $('.checkboxPar').change(function(){ 
      $("#home input:checkbox").prop('checked', $(this).prop("checked"));
    })
  })

  $(function () {
    $('.checkboxPar1').change(function(){ 
      $("#menu1 input:checkbox").prop('checked', $(this).prop("checked"));
    })
  })

  $(function () {
    $('.checkboxPa2').change(function(){ 
      $("#menu2 input:checkbox").prop('checked', $(this).prop("checked"));
    })
  })

</script>



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
                "overflow": false,
                "scrollX": true
             });
          //  var table = $('#datatable').DataTable();


  /*var table = $('#datatable').DataTable({
                                      "ordering": true,
                                      "order": [[ 7, "desc" ]]
                                  });
                                  */
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>


