<?php include 'include/header.php';?>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
        
       <?php include 'include/side_menu.php';
$this->db->order_by("id", "assc");

$userList = $this->admin_common_model->get_where('procedure_list',['type'=>'Treatment']);

?>


            <div class="content-page">              <div class="loading"></div>

                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title" >Welcome Admin </h4>&nbsp;	&nbsp;	
<!--      <a href="<?=base_url('admin/view_page/ExUser?type=users');?>"><button type="button" class="btn btn-purple waves-effect waves-light" > Export csv</button></a>
-->                                <ol class="breadcrumb pull-right">
                                <li><a href="<?=base_url('admin/view_page/dashboard');?>"><?php $fetch_app_name = $this->admin_common_model->get_where('admin',['id'=>'1']);
                                echo $fetch_app_name[0]['app_name']; ?></a></li>
                                    <li class="active">Procedure List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Procedure List</h3>
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
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                          <!--  <th>Name(in Arabic)</th>
                                                            <th>Image</th>-->
                                                            <th>Admin Price</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                   <tbody>

                                              <?php $i=2; foreach($userList as $row){ ?>

                                                        <tr>
                                                            <td><?= $row['name']; ?></td>
                                                            <td><?= $row['price']; ?></td>

										
										
                                                            
                                                      <td><? 
                                                            
                                                            
                                              $date_time  = date("Y-m-d g:i a", strtotime($row['date_time']));
                                                            
                                                            echo $date_time; ?></td>
                                                            
                                                            
                                                            <td class="text-center"><a href="<?=base_url('admin/view_page/add_category/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button>   </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>

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
        url = "<?php echo base_url().'admin/update_category_status'?>"; 
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
          data: {'table': 'procedure_list', 'id': id}, // change this to send js object
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
            
                              /*    var table = $('#datatable').DataTable({
                                      "ordering": true,
                                      "order": [[ 4, "desc" ]]
                                  });*/
// var table = $('#example').DataTable( {
//         "order": [[ 3, "desc" ]]
//     } );
            
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>


