<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("date_time", "DESC");

//$driverList = $this->admin_common_model->get_where('users',['type'=>'PROVIDER','status'=>'Active']);
           $driverList = $this->db->query("SELECT * FROM users where status = 'Active' AND (type = 'PROVIDER' OR type = 'HYGIENIST' ) ")->result_array();

?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               			


                                <ol class="breadcrumb pull-right">
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Provider List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Provider List</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        
                                         <section class="content">
    <form action="<?php echo base_url(); ?>admin/goPro" method="POST" id="bulk_form" onsubmit="delete_confirm()">


      <a href="<?=base_url('admin/view_page/ExUser?type=provider');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
                              
      				<input type="submit" class="btn btn-danger" name="<?php echo $a ="DELETE";?>" value="<?php echo $a ="DELETE";?>"/>
      				<input style="background-color: green; color: white;" type="submit" class="btn btn-green" name="<?php echo $a ="APPROVE";?>" value="<?php echo $a ="APPROVE";?>"/>
														
	                <input style="background-color: red; color: white;" type="submit" class="btn btn-red" name="<?php echo $a ="DISAPPROVE";?>" value="<?php echo $a ="DISAPPROVE";?>"/>
										
										
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
				                                            <th><input type="checkbox" id="select_all" value=""/></th> 
                                                            <th>First name</th>
                                                            <th>Last Name</th>
                                                            <th>Stroe Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>type</th>
                                                            <th>Category</th>
                                                            <th>Availble for</th>
                                                            <th>Clinic Time</th>
                                                            <th>Clinic Logo</th>
                                                            <th>Clinic Cover Image</th>
                                                            <th>Clinic Service</th>
                                                            <th>Available<br>Status</th>
                                                            <th>Block<br>Unblock</th>
                                                            <th>Note for<br>account Block</th><!--
                                                            <th>Total Delivery </th>
                                                            <th>Total Amount Earned</th>
                                                            <th>60% of the total charge</th>-->
                                                            <th>Status</th>
                                                            <th>Reg. Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                             
                                                   <tbody>

                                              <?php $i=2; foreach($driverList as $row){ 
                                                  
                                                   $cat = $this->admin_common_model->get_where('category',['id'=>$row['cat_id']]);

 
 ?>

                                                        <tr>
                                                            
                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>  
                          
                                                            <td><?= $row['first_name']; ?></td>
                                                            <td><?= $row['last_name']; ?></td>
                                                            <td><?= $row['store_name']; ?></td>
                                                            <td><?= $row['email']; ?></td>
                                                            <td><?= $row['mobile']; ?></td>
                                                            <td><?= $row['type']; ?></td>
                                                            <td><?= $cat[0]['name']; ?></td>
                                                            <td><?= $row['gender_type']; ?></td>
                                              <td> <a href="<?=base_url('admin/view_page/rest_time_slot_list/'.$row['id']);?>"><button type="button" class="btn btn-purple waves-effect waves-light" >Timing</button></a>
                                                </td>
                                                            <td> 
                                                                
                                                                   <div class="col-sm-2">
                                                                   <?php
                                                                    if ($row['store_logo'] == ''){
                                                                      $img_url = base_url("assets/images/banner/user_b.png");
                                                                    }else{
                                                                      $img_url = base_url('uploads/images/'.$row['store_logo']);
                                                                    }
                                                                  ?>
                                                                  <img src="<?=$img_url;?>" alt="" width="50"> 
                                                                </div><!-- col-sm-2 -->
                                                                
                                                            </td>
                                                            
                                                            <td> 
                                                                
                                                                   <div class="col-sm-2">
                                                                   <?php
                                                                    if ($row['store_cover_image'] == ''){
                                                                      $img_url = base_url("assets/images/banner/user_b.png");
                                                                    }else{
                                                                      $img_url = base_url('uploads/images/'.$row['store_cover_image']);
                                                                    }
                                                                  ?>
                                                                  <img src="<?=$img_url;?>" alt="" width="50"> 
                                                                </div><!-- col-sm-2 -->
                                                                
                                                            </td>
                                                           
                                                             <td> <a href="<?=base_url('admin/view_page/store_service_list/'.$row['id']);?>"><button type="button" class="btn btn-purple waves-effect waves-light" >Service List</button></a>
                                                </td>
                                      
                                       
                                       <td><select name="available_status" getId="<?=$row['id'];?>"   style="height: auto !important;">
											<option  <?php if($row['available_status']=='ONLINE'){ echo 'selected'; } ?>>ONLINE</option>
											<option <?php if($row['available_status']=='OFFLINE'){ echo 'selected'; } ?>>OFFLINE</option> 
											</select>
										</td>
										
										  <td><select name="block_unblock" getId5="<?=$row['id'];?>"   style="height: auto !important;">
											<option  <?php if($row['block_unblock']=='Block'){ echo 'selected'; } ?>>Block</option>
											<option <?php if($row['block_unblock']=='Unblock'){ echo 'selected'; } ?>>Unblock</option> 
											</select>
										</td>
										
										            
                                                          <td><a href="<?=base_url('admin/view_page/add_note_block/'.$row['id']);?>"><button type="button" class="btn btn-purple waves-effect waves-light" >Note</button></a>
</td>
 
										
									<!--	<td><?= $total_delivery[0]['total_delivery'] ?></td>
                                         <td><?= $fetch_sum[0]['total_amount'] ?></td>
                                         
                                         <td><?= $aa ?></td>
						-->
										
										   <td><select name="status" getId1="<?=$row['id'];?>"   style="height: auto !important;">
										        <option value="Active" <?php if($row['status']=='Active'){ echo 'selected'; } ?>>Approve</option>
                                                <option value="Deactive" <?php if($row['status']=='Deactive'){ echo 'selected'; } ?>>Disapprove</option>
                     
												</select>
										</td>
										 
						
						                
                                                
<!--                                                            <td><?= $row['available_status']; ?></td>
-->                                                            


<td><? 
                                                            
                                                            
                                              $date_time  = date("Y-m-d g:i a", strtotime($row['date_time']));
                                                            
                                                            echo $date_time; ?></td>
                                                            
                                                            
                                                     <td class="text-center">
                                                              <a href="<?=base_url('admin/view_page/add_driver/'.$row['id']);?>">
                                                                <button class="btn view-t" type="button">
                                                                  <i class="fa  fa-edit"></i>
                                                                </button> 
                                                              </a> 
                                                              <a href="<?=base_url('admin/view_page/view_driver/'.$row['id']);?>">
                                                                <button class="btn view-t" type="button">
                                                                  <i class="fa  fa-eye"></i>
                                                                </button>
                                                              </a> 
                                                              
                                                             </td>



<!-- <td class="text-center"><a href="<?=base_url('admin/view_page/add_driver/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button>  <a href="<?=base_url('admin/view_page/view_driver/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-eye"></i></a> </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
 
 

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
$('select').change(function () { 
       //for open loader gif
       $(document).on({
         ajaxStart: function() { $(".loading").show(); },
         ajaxStop: function() { $(".loading").hide(); }    
       });

       var getId5 = $(this).attr('getId5');
       var block_unblock = $(this).val();
    // alert(getId);
        url = "<?php echo base_url().'admin/upt_block_unblock'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":getId5,"block_unblock":block_unblock}, 
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
                "overflow": false,
                "scrollX": true
            });
    /*        
 var table = $('#datatable').DataTable({
                                      "ordering": true,
                                      "responsive": true,
                                      "order": [[ 10, "desc" ]]
                                  });*/
    
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>



