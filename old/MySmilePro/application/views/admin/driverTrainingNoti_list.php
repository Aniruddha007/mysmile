<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "asc");

$userList = $this->admin_common_model->get_all('notification_training');

?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>&nbsp;	&nbsp;	
<!--      <a href="<?=base_url('admin/view_page/ExUser?type=d_notification');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
-->                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">Vegotta</a></li>
                                    <li class="active">Employee Training Notification List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Employee Training Notification List</h3>
                                    </div>
                                    <div class="panel-body">
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
                                                            <th>Category</th>
                                                            <th>Title</th>
                                                            <th>Message</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($userList as $row){ 
                                                  
                                              $user = $this->admin_common_model->get_where('category',['id'=>$row['category_id']]);
                                                  
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
<!--                                                            <td><?= $user[0]['category_name']; ?></td>
                                                           
                                                            
                                                            <td><?= $row['id']; ?></td>
                                                            <td><?= $row['title']; ?></td>
                                                            <td><?= $row['description']; ?></td>
                                                            <td><?= $row['start_date']; ?></td>
                                                            <td><?= $row['end_date']; ?></td>
                                                            <td><?= $row['apply_amount']; ?></td>
                                                         -->    
                                                         <td><?= $user[0]['name']; ?></td>
                                                         <td><?= $row['title']; ?></td>
                                                         <td><?= $row['message']; ?></td>
                                                            <td class="text-center"><button class="btn delete-t"><i class="fa fa-trash-o" onclick="deleteUsers1('<?=$row["id"];?>')"></i></button></td>

  

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
                    2021 © Vegotta.
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
          data: {'table': 'notification_training', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("Added!", "Your selected Employee has been Send Money.", "success");
  
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
