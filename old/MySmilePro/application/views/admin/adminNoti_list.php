<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
       
       
  $this->db->query("UPDATE `notification` SET `seen_status`='SEEN' WHERE  (`notification_type`= 'Profile' OR `notification_type`= 'Signup')");


$this->db->order_by("id", "DESC");

$userList = $this->db->query("SELECT * FROM notification WHERE (notification_type = 'Profile' OR notification_type = 'Signup') order by id desc")->result_array();


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
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">SelfCare</a></li>
                                    <li class="active">Admin Notification List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Admin Notification List</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        
                                             <section class="content">
    <form action="<?php echo base_url(); ?>admin/goAdminNoti" method="POST" id="bulk_form" onsubmit="delete_confirm()">



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
<!--                                                           
                                                      <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Start Date</th>-->   
				                                            <th><input type="checkbox" id="select_all" value=""/></th> 
                                                            
                                                             <th>Name</th>
                                                            <th>Title</th>
                                                            <th>Message</th>
                                                            <th>Details</th>
                                                            <th>Update Field Name</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($userList as $row){ 
                                                  
                                                  $user = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);

                                              
                                              ?>

                                                        <tr>
                                                            
                                                            
                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>  
                          
                          
                                                            <td><?= $user[0]['first_name'].' '.$user[0]['last_name']; ?></td>
                                                           
                                                            
                                                            <td><?= $row['title']; ?></td>
                                                            <td><?= $row['message']; ?></td>
                                                              <td>
                                                      
                                                            <a href="<?=base_url('admin/view_page/view_driver/'.$row['user_id']);?>"><button type="button" class="btn btn-purple waves-effect waves-light" >Click To Details</button></a>

                                                      </td>
                                                    <td><?= $row['update_field']; ?></td>
                                                    
                                                    
                                                    <td><? 
                                                            
                                                            
                                              $date_time  = date("Y-m-d g:i a", strtotime($row['date_time']));
                                                            
                                                            echo $date_time; ?></td>
                                                            

 <!--
                                                            <td><?= $row['message']; ?></td>
<!--         <td class="text-center"><button class="btn delete-t"><i class="fa fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>
-->
<!--         <td class="text-center"><a href="<?=base_url('admin/view_page/add_userNoti/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button>  <a href="<?=base_url('admin/view_page/view_driver/'.$row['id']);?>"><button class="btn view-t"></a> </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>
-->
   

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



</script>

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
    
    $(".pcoded-badge").hide();
    
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
<!--

<?php $userList123 = '1';
if($userList123 == '1'){ $userList123='55';
?>
<script>
var aa = '1';
if(aa == '1'){
   
    
    window.setInterval('refresh()', 30000); 
    
    
     
    
}
    // Call a function every 10000 milliseconds 
    // (OR 10 seconds).

    // Refresh or reload page.
    function refresh() {
        window .location.reload();
    }
</script>

<?php $userList123++ ;} ?>-->