<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        
<?php
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
$result  = array('country'=>'', 'city'=>'');
if(filter_var($client, FILTER_VALIDATE_IP)){
  $ip = $client;
}elseif(filter_var($remote, FILTER_VALIDATE_IP)){
  $ip = $remote;
}else{
  $ip = $forward;
}
$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
if($ip_data && $ip_data->geoplugin_countryName != null){    
  if($lat=='' && $lon==''){
    $lat = $ip_data->geoplugin_latitude;
    $lon = $ip_data->geoplugin_longitude;
  }
}else{
    if($lat=='' && $lon==''){
        $lat = '22.23626833333333'; 
        $lon = '75.232748333333333';
      } 
} 
//echo $ip;
 //echo $lat."<br>".$lon;
 //die;

?>
       <?php include 'include/side_menu.php';

 $fetch = $this->admin_common_model->get_where('users',['lat !='=>'','lon !='=>'']); 
//print_r($fetch);die;
?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">AVLivreurs</a></li>
                                    <li class="active">Map View</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Map View</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        
                                        <div class="datew-times">
                               
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form accept-charset="UTF-8" action="admin/find_location" accept-charset="iso-8859-1" class="form_container left_label" id="map_view_users" method="POST" autocomplete="off" enctype="multipart/form-data">  							<div class="grid_12">
									 <input name="lat" type="hidden" id="lat" value=""/>
              <input name="lon" type="hidden" id="lon" value=""/>
                <input name="type" type="hidden" value="DRIVER"/>
								</div>
								
								<div class="grid_12">
									
				<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOsaweruJ1wTisWeanZ5dlxaJtOyZsndQ&sensor=false&language=en&libraries=places"></script>
			
			
			

									
									
									<div id="map_canvas" style="width:100%; height:450px;"></div>								</div>
							</form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2019 © AVLivreurs.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->
        
  
 <script type="text/javascript">

    var locations = [
      <?php $i=0; foreach($fetch as $val){
          
     if($val['type'] == 'USER'){
            $a = "http://techimmense.com/JITENDRA/AVLivreurs/uploads/images/u.jfif";

        } 
       
        if($val['type'] == 'DRIVER'){
            $a = "http://techimmense.com/JITENDRA/AVLivreurs/uploads/images/d.jfif";

        }
          
          ?>   
      ['<?=$val['first_name']?>','<?=$val['lat']?>','<?=$val['lon']?>','<?=$val['type']?>',4],
      
      	<?php $i++; 
          
          
       
      } ?>
    ];


    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 10,
      center: new google.maps.LatLng(22.23626833333333, 75.232748333333333),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

var marker_icon11 = {
                                 url: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Map_marker.svg/2000px-Map_marker.svg.png",
                                 scaledSize: new google.maps.Size(25,31)};
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(22.23626833333333, 75.232748333333333),
        map: map,
         icon:marker_icon11
      });

    for (i = 0; i < locations.length; i++) { 

          //  $a = "http://optimaiot.com/JITENDRA/RESA/uploads/images/d.png";

      // $a1 = locations[i][3];
 if(locations[i][3] == 'USER'){
            $a = "http://techimmense.com/JITENDRA/AVLivreurs/uploads/images/u.jfif";

        } 
        
        if(locations[i][3] == 'DRIVER'){
            $a = "http://techimmense.com/JITENDRA/AVLivreurs/uploads/images/d.jfif";

        } 
        
var marker_icon = {
                                 url:$a ,
                                 scaledSize: new google.maps.Size(25,31)};
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
         icon:marker_icon
      });




      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }


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
            });

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>


