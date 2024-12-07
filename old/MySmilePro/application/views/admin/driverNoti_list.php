<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "asc");

$userList = $this->db->query("SELECT * FROM notification WHERE type = 'DRIVER' AND notification_type = 'Admin' group by code order by id desc")->result_array();

?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>&nbsp;	&nbsp;	

                                <ol class="breadcrumb pull-right">
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Provider Notification List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Provider Notification List</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        
                                             <section class="content">
    <form action="<?php echo base_url(); ?>admin/goDriverNoti" method="POST" id="bulk_form" onsubmit="delete_confirm()">


      <a href="<?=base_url('admin/view_page/add_driverNoti');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Add New Notification</button></a>
                              
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
<!--                                                            <th>Username</th>
                                                           <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Apply Amount</th>
                                                            <th>Incentive Amount</th>  
                                                            --> 
				                                            <th><input type="checkbox" id="select_all" value=""/></th> 
                                                            <th>Title</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($userList as $row){ 
                                                  
                                            //      $user = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                                                  
                                               //   $ins = $this->admin_common_model->get_where('insentive_amount',['noti_id'=>$row['id']]);
if($ins){
    $onclick = '';
        $style = "color:green";

}else{
    $onclick = 'onclick';
    
    $style = "color:red";
}

                                              
                                              ?>

                                                        <tr> 
                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>  
                          
<!--                                                            <td><?= $user[0]['username']; ?></td>
                                                           
                                                            
                                                            <td><?= $row['id']; ?></td>
                                                            <td><?= $row['title']; ?></td>
                                                            <td><?= $row['description']; ?></td>
                                                            <td><?= $row['start_date']; ?></td>
                                                            <td><?= $row['end_date']; ?></td>
                                                            <td><?= $row['apply_amount']; ?></td>
                                                         -->    
                                                         <td><?= $row['title']; ?></td>
                                                         <td><?= $row['message']; ?></td>
                                                         
                                                         
                                                         <td><? 
                                                            
                                                            
                                              $date_time  = date("Y-m-d g:i a", strtotime($row['date_time']));
                                                            
                                                            echo $date_time; ?></td>
                                                            
                                                            
<!--                                                            <td class="text-center"><button class="btn delete-t"><i class="fa fa-trash-o" onclick="deleteUsers1('<?=$row["id"];?>')"></i></button></td>
-->
<!--           <td class="text-center"><a href="<?=base_url('admin/view_page/add_driverNoti/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button>  <a href="<?=base_url('admin/view_page/view_driver/'.$row['id']);?>"><button class="btn view-t"></a> </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>
-->



                                                     <td class="text-center">
                                                              <a href="<?=base_url('admin/view_page/add_driverNoti/'.$row['id']);?>">
                                                                <button class="btn view-t" type="button">
                                                                  <i class="fa  fa-edit"></i>
                                                                </button> 
                                                              </a> 
                                                            
                                                              
                                                             </td>
                                                        </tr>
<?php $i++; } ?>

                                                    </tbody>
                                                </table>

	&nbsp;&nbsp;
												 
													
													
       </form>
    </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2021 © Facility.
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
  text: "You Added Insentive Money!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Added it!",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/send_money');?>",
          data: {'table': 'notification', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("Added!", "Your selected Provider has been Send Money.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>

<script>
// delete function
function deleteUsers1(id)
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
          data: {'table': 'notification', 'id': id}, // change this to send js object
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
       
       
            var table = $('#datatable').DataTable({
                "ordering": false,
                "overflow": false,
                "scrollX": true
            });


/*
 var table = $('#datatable').DataTable({
                                      "ordering": true,
                                      "order": [[ 3, "desc" ]]
                                  });
    */
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>


