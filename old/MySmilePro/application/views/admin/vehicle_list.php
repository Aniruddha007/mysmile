<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "asc");

$userList = $this->admin_common_model->get_all('vehicles');

?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>&nbsp;	&nbsp;	
<!--      <a href="<?=base_url('admin/view_page/ExUser?type=loading');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
-->                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">Get&Drop</a></li>
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
                                                            <th>Base Fare</th>
                                                            <th>Price Per KM</th>
                                                            <th>Price Per Weight</th>
                                                            <th>Price Per Lenght</th>
                                                            <th>Priority Price Per KM</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($userList as $row){ ?>

                                                        <tr>
                                                            <td><?= $row['vehicle']; ?></td>
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
                                                            
                                                            <td><?= $row['base_fare']; ?></td>
                                                            <td><?= $row['price_km']; ?></td>
                                                            <td><?= $row['price_weight']; ?></td>
                                                            <td><?= $row['price_length']; ?></td>
                                                            <td><?= $row['priority_price_km']; ?></td>

                                                            <td class="text-center"><a href="<?=base_url('admin/view_page/add_vehicle/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>


  

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
          data: {'table': 'vehicles', 'id': id}, // change this to send js object
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
       var plan_type = $(this).val(); 
       $.post("<?=base_url().'admin/upt_plan_type';?>", { plan_type: plan_type, id: getId });
      location.reload();

   
       
    });   

</script>



