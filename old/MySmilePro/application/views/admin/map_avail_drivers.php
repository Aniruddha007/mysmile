<?php include('includes/header.php'); ?>

<?php include( 'includes/side_menu.php'); ?>	

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
        $lat = '-1.223509'; 
        $lon = '-78.757647';
      } 
} 
//echo $ip;
 //echo $lat."<br>".$lon;
 //die;

?>

<div id="container">
	
<?php include( 'includes/header_bar.php'); ?>	

<?php $fetch = $this->admin_common_model->get_where('users',['type'=>'DRIVER','lat !='=>'','lon !='=>'']); ?>


<script src="js/jquery.growl.js" type="text/javascript"></script>
<link href="css/jquery.growl.css" rel="stylesheet" type="text/css" />

<input type="hidden" id="tabValidator" value="Yes"/>







<style>
#txtSource {
    clear: both;
    height:34px;
    margin:0 10px 15px 0;
    width: 50%;
}
#btn_find {
    background-color: #e84c3d ;
    border:1px solid #e84c3d ;
    border-radius: 3px;
    box-shadow: none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    font-weight: 400;
    height: auto;
    line-height: 1.42857 !important;
    margin-bottom: 0;
    padding: 6px 25px;
    text-align: center;
    text-shadow: none;
    vertical-align: top;
    white-space: nowrap;
}
</style>
<div id="content" class="map_users">
		<div class="grid_container">
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Display available users in their location</h6> 
                        <div id="widget_tab">
            			</div>
					</div>
					<div class="widget_content">
							<form accept-charset="UTF-8" action="admin/find_location" accept-charset="iso-8859-1" class="form_container left_label" id="map_view_users" method="POST" autocomplete="off" enctype="multipart/form-data">  							<div class="grid_12">
									 <input name="lat" type="hidden" id="lat" value=""/>
              <input name="lon" type="hidden" id="lon" value=""/>
                <input name="type" type="hidden" value="DRIVER"/>
                <input name="location" id="txtSource" type="text"  class="form-control" value="" autocomplete="off" placeholder="Enter location"/>
								<button type="submit" class="btn" id="btn_find" >Find</button>
								</div>
								
								<div class="grid_12">
									
				<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOsaweruJ1wTisWeanZ5dlxaJtOyZsndQ&sensor=false&language=en&libraries=places"></script>
			<script type="text/javascript">
			//<![CDATA[
			
			var map; // Global declaration of the map
			var lat_longs_map = new Array();
			var markers_map = new Array();
            var iw_map;
			var placesService;
			var placesAutocomplete;
			
			iw_map = new google.maps.InfoWindow();
				
				 function initialize_map() {
				
				var myLatlng = new google.maps.LatLng(<?=$lat.','.$lon?>);
				var myOptions = {
			  		zoom: 7,
					center: myLatlng,
			  		mapTypeId: google.maps.MapTypeId.ROADMAP,
					minZoom: 3,
					maxZoom: 24}
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				var autocompleteOptions = {
					}
				var autocompleteInput = document.getElementById('location');
				
				placesAutocomplete = new google.maps.places.Autocomplete(autocompleteInput, autocompleteOptions);
				placesAutocomplete.bindTo('bounds', map);
					
			<?php $i=0; foreach($fetch as $val){ ?> 
			var myLatlng = new google.maps.LatLng(<?=$val['lat']?>,<?=$val['lon']?>);
			
			var marker_icon = {
				 url: "uploads/images/user_marker.png",
				 scaledSize: new google.maps.Size(25,31)};
				
			var markerOptions = {
				map: map,
				position: myLatlng,
				icon: marker_icon		
			};
			marker_<?=$i;?> = createMarker_map(markerOptions);
			
			marker_<?=$i;?>.set("content", "<div style='width:200px !important;height:50Px!important;'><?=$val['first_name'].' '.$val['last_name']?><br/><?=$val['email']?></div>");
			
			google.maps.event.addListener(marker_<?=$i;?>, "click", function(event) {
				iw_map.setContent(this.get("content"));
				iw_map.open(map, this);
			
			});
					 
			<?php $i++; } ?>
			
			
			
			
			}
		
		
		function createMarker_map(markerOptions) {
			var marker = new google.maps.Marker(markerOptions);
			markers_map.push(marker);
			lat_longs_map.push(marker.getPosition());
			return marker;
		}
		function placesCallback(results, status) {
				if (status == google.maps.places.PlacesServiceStatus.OK) {
					for (var i = 0; i < results.length; i++) {
						
						var place = results[i];
					
						var placeLoc = place.geometry.location;
						var placePosition = new google.maps.LatLng(placeLoc.lat(), placeLoc.lng());
						var markerOptions = {
				 			map: map,
				        	position: placePosition
				      	};
				      	var marker = createMarker_map(markerOptions);
				      	marker.set("content", place.name);
				      	google.maps.event.addListener(marker, "click", function() {
				        	iw_map.setContent(this.get("content"));
				        	iw_map.open(map, this);
				      	});
				      	
				      	lat_longs_map.push(placePosition);
					
					}
					
				}
			}
			
			google.maps.event.addDomListener(window, "load", initialize_map);
			
			//]]>
			</script>		
						<script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('txtSource'));
            google.maps.event.addListener(places, 'place_changed', function () { 
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng(); 
                 document.getElementById("lat").value = latitude;
                 document.getElementById("lon").value = longitude; 
            });
        });
</script> 			
									
									
									<div id="map_canvas" style="width:100%; height:450px;"></div>								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
		<span class="clear"></span>
</div>
</div>

<?php include( 'includes/footer.php'); ?>

