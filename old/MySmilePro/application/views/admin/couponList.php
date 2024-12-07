<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "desc");

//$userList = $this->admin_common_model->get_all('coupons');
              $userList = $this->db->query("SELECT * FROM coupons group by code order by date_time desc ")->result_array();

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
                                    <li class="active">Offer List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Offer List</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                         <section class="content">
    <form action="<?php echo base_url(); ?>admin/goOffer" method="POST" id="bulk_form" onsubmit="delete_confirm()">


      <a href="<?=base_url('admin/view_page/addCoupon');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Add New Offer</button></a>
                              
      				<input type="submit" class="btn btn-danger" name="<?php echo $a ="DELETE";?>" value="<?php echo $a ="DELETE";?>"/>
      								

                                        <div class="datew-times">
                                            
                                       <div class="col-md-6  col-md-offset-3" style="margin-bottom: 10px;">
                      <div class="col-md-5">
                      <div id="datetimepicker" class="input-append date">
                <b>    </b> <input type="hidden" name="to" id="min" placeholder="12-04-2017 12:52 PM" class="form-control">
                      <span class="add-on">
                      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                      </div>
                      </div>
                      <div class="col-md-5">
                        <div id="datetimepicker_from" class="input-append date">
                <b>     </b><input type="hidden" name="from" id="max" placeholder="12-04-2017 12:52 PM" class="form-control">
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
                                                            <th>Title</th>
                                                            <th>Percentage</th>
                                                            <th>End Date</th>
                                                            <th>Description</th>
                                                            <th>Image</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=1; foreach($userList as $row){ 
                                                  
                                                 $user = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                                                  
                                               ///   $ins = $this->admin_common_model->get_where('insentive_amount',['noti_id'=>$row['id']]);

                                              
                                              ?>

                                                        <tr>
                                                           
                                
                                
                                                            
                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>  
                          
                                                     <!--     <td>
<?php 

 $ans= $row['user_id']; 

 $ans= explode(",",$ans);

foreach($ans as $row1){

                 $emp = $this->admin_common_model->get_where('users',['id'=>$row1]);


?>
                <?= "<span class='label label-primary'>".$emp[0]['first_name']."</span>"; ?>
<?php } ?>

<!--</td>-->

                                                            <td><?= $row['code']; ?></td>
                                                            <td><?= $row['percentage']; ?></td>
                                                            <td><?= $row['end_date']; ?></td>
                                                            <td><?= $row['description']; ?></td>
                                                            <td><div class="col-sm-2">
                                                               <?php
                                                                if ($row['image'] == ''){
                                                                  $img_url = base_url('uploads/images/user.jpg');
                                                                }else{
                                                                  $img_url = base_url('uploads/images/'.$row['image']);
                                                                }
                                                              ?>
                                                              <img src="<?=$img_url;?>" alt="" width="50"> 
                                                            </div></td>
                                                           
                                                          <td><? 
                                                            
                                                            
                                              $date_time  = date("Y-m-d g:i a", strtotime($row['date_time']));
                                                            
                                                            echo $date_time; ?></td>
                                                            


                                                     <td class="text-center">
                                                              <a href="<?=base_url('admin/view_page/addCoupon/'.$row['id']);?>">
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
          url: "<?=base_url('admin/delete_data_new');?>",
          data: {'table': 'coupons', 'id': id}, // change this to send js object
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
                                      "order": [[ 7, "desc" ]]
                                  });
    */

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>


