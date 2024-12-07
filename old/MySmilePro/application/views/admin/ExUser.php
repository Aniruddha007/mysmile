<?php


$conn = mysqli_connect('localhost', 'techiu33_SelfCare', 'techiu33_SelfCare','techiu33_SelfCare');

      if ($_GET["type"] == 'users')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id','first_name', 'last_name', 'store_name', 'mobile','email', 'password','address', 'image','type', 'lat', 'lon','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT id,first_name,last_name,store_name,mobile,email,password,address,image,type,lat,lon,date_time FROM users where type = 'USER'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}

      if ($_GET["type"] == 'provider')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id','first_name', 'last_name', 'store_name', 'mobile','email', 'password','address', 'image','type', 'lat', 'lon','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT id,first_name,last_name,store_name,mobile,email,password,address,image,type,lat,lon,date_time FROM users where type = 'PROVIDER'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}
	
	  if ($_GET["type"] == 'cabs_drivers')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id','car_id', 'username', 'mobile','email', 'password','country_id','state_id', 'city_id','default_car_id','town','zip_code', 'image','type','driver_type','social_id', 'lat', 'lon', 'vehicle','registration_no','model','color','lic_number','licence_image','vehicle_reg_image','vehicle_insura_image','register_id','ios_register_id','status','code','available_status','wallet','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM users where type= 'DRIVER'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}
	
	
	

        if ($_GET["type"] == 'loading')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'car_name', 'image', 'min_charge', 'upto_time', 'rate_per_km', 'rate_per_min', 'per_helper_charge','insurance_policy_charge','gst','waiting_time','free_time','type','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM car_list where type= 'LOADING'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}
	
	
	   if ($_GET["type"] == 'cabs')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'car_name', 'image', 'min_charge', 'upto_time', 'rate_per_km', 'rate_per_min', 'per_helper_charge','insurance_policy_charge','gst','waiting_time','free_time','type','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM car_list where type= 'CABS'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}

         if ($_GET["type"] == 'u_notification')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id','title','description','start_date','end_date','apply_amount','incentive_amount','type','driver_type','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM notification where type = 'USER'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}
	
	
	  if ($_GET["type"] == 'd_notification')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id','title','description','start_date','end_date','apply_amount','incentive_amount','type','driver_type','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM notification where type = 'DRIVER'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}



	  if ($_GET["type"] == 'feedbacks')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id','feedback','rating','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM feedbacks";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}


if ($_GET["type"] == 'training')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'title','url','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM training";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}

      

      if ($_GET["type"] == 'pending')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id', 'driver_id', 'date', 'time', 'vehicle_type','quantity','weight', 'pickup_lat', 'pickup_lon', 'dropoff_lat', 'dropoff_lon', 'reciever_phone','pick_address','drop_address','item_image','description','helper','insurance_policy','km','total_amount','admin_fare','driver_fare','base_fare','ambe_commision','gst_fare','ambe_fare','total_fare','time_duration','status','payment_status','payment_type','type','package_type','request_type','accept_driver_id','user_status','order_number','code','pickup_time','drop_time','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM user_request where status = 'Pending'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}



	
	  if ($_GET["type"] == 'Accept')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id', 'driver_id', 'date', 'time', 'vehicle_type','quantity','weight', 'pickup_lat', 'pickup_lon', 'dropoff_lat', 'dropoff_lon', 'reciever_phone','pick_address','drop_address','item_image','description','helper','insurance_policy','km','total_amount','admin_fare','driver_fare','base_fare','ambe_commision','gst_fare','ambe_fare','total_fare','time_duration','status','payment_status','payment_type','type','package_type','request_type','accept_driver_id','user_status','order_number','code','pickup_time','drop_time','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM user_request where status = 'Accept'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}
	
	
	  if ($_GET["type"] == 'Reject')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id', 'driver_id', 'date', 'time', 'vehicle_type','quantity','weight', 'pickup_lat', 'pickup_lon', 'dropoff_lat', 'dropoff_lon', 'reciever_phone','pick_address','drop_address','item_image','description','helper','insurance_policy','km','total_amount','admin_fare','driver_fare','base_fare','ambe_commision','gst_fare','ambe_fare','total_fare','time_duration','status','payment_status','payment_type','type','package_type','request_type','accept_driver_id','user_status','order_number','code','pickup_time','drop_time','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM user_request where status = 'Reject'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}
	


if ($_GET["type"] == 'Complete')
	{
	$filename = $_GET['type'] . ".csv";
	$fp = fopen('php://output', 'w');
	$header = ['id', 'user_id', 'driver_id', 'date', 'time', 'vehicle_type','quantity','weight', 'pickup_lat', 'pickup_lon', 'dropoff_lat', 'dropoff_lon', 'reciever_phone','pick_address','drop_address','item_image','description','helper','insurance_policy','km','total_amount','admin_fare','driver_fare','base_fare','ambe_commision','gst_fare','ambe_fare','total_fare','time_duration','status','payment_status','payment_type','type','package_type','request_type','accept_driver_id','user_status','order_number','code','pickup_time','drop_time','date_time'];
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename=' . $filename);
	fputcsv($fp, $header);
	$query = "SELECT * FROM user_request where status = 'Complete'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_row($result))
		{
		fputcsv($fp, $row);
		}

	exit;
	}

       




?>