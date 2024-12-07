<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowd');
	class Webservice_model extends CI_Model{

		public function get_where($table,$where){
			$data =	$this->db->where($where)
					 		 ->get($table);

			//echo $this->db->last_query();

	 		if($res = $data->result_array()){
	 			return $res;
			}else{
				return FALSE;
			}

			
		}	

		public function insert_data($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}

		public function update_data($table,$data,$where){
			$query = $this->db->where($where)
					 ->update($table,$data);
			if ($query)
			{
				return TRUE;
			}
		  	else
			{
				return FALSE;
			}
		}

		public function get_all($table){
			$data = $this->db->get($table);
			$data = $data->result_array();
			if ($data) {
				return $data;
			}else{
				return FALSE;
			}
		}

		public function humanTiming($time)
		{
			$time = time() - $time; // to get the time since that moment
			$time = ($time < 1) ? 1 : $time;
			$tokens = array(
				31536000 => 'year',
				2592000 => 'month',
				604800 => 'week',
				86400 => 'day',
				3600 => 'hour',
				60 => 'minute',
				1 => 'second'
			);
			foreach($tokens as $unit => $text)
			{
				if ($time < $unit) continue;
				$numberOfUnits = floor($time / $unit);
				return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
			}
		}

		function delete_data($table, $where)
		{
			$del = $this->db->where($where)
					 ->delete($table);
			if ($del)
			{
				return TRUE;
			}
		  	else
			{
				return FALSE;
			}
		}

               	function generateRandomString($num) {
			$length=$num;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

               function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
	        {
				$pi80 = M_PI / 180;
				$lat1*= $pi80;
				$lng1*= $pi80;
				$lat2*= $pi80;
				$lng2*= $pi80;
				$r = 6372.797; // mean radius of Earth in km
				$dlat = $lat2 - $lat1;
				$dlng = $lng2 - $lng1;
				$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
				$c = 2 * atan2(sqrt($a) , sqrt(1 - $a));
				$km = $r * $c;
				return ($miles ? ($km * 0.621371192) : $km);
	        }

 
   function user_apk_notification($registration_ids, $message)
	{

	// Set POST variables
//print_r($registration_ids); die;
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields = array(
		'registration_ids' => $registration_ids,
		'data' => $message,
	);
	$headers = array(
		'Authorization: key=' . "AAAA8Hs7aOc:APA91bGOQmMuS_XkhYHBeE1Ei-OxwBSKe7CaTMzxD9mUa35Np0xDMC-KRrb_blcpJa7_DULKiFLrJZJaGwcYoG_VhlZUt6uGj3tDYa-hcxS0w67Bt7fPHTbPlP4y9uQDY_gPP4vgEfTq",
		'Content-Type: application/json'
	);

	// print_r($headers);
	// Open connection

	$ch = curl_init();

	// Set the url, number of POST vars, POST data

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Disabling SSL Certificate support temporarly

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	// Execute post

	$result = curl_exec($ch);
	if ($result === FALSE)
		{
		die('Curl failed: ' . curl_error($ch));
		}

	// Close connection

	curl_close($ch);

//	echo $result;

	}





function driver_apk_notification($registration_ids, $message)
	{

	// Set POST variables
//print_r($registration_ids); die;
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields = array(
		'registration_ids' => $registration_ids,
		'data' => $message,
	);
	$headers = array(
		'Authorization: key=' . "AAAA8Hs7aOc:APA91bGOQmMuS_XkhYHBeE1Ei-OxwBSKe7CaTMzxD9mUa35Np0xDMC-KRrb_blcpJa7_DULKiFLrJZJaGwcYoG_VhlZUt6uGj3tDYa-hcxS0w67Bt7fPHTbPlP4y9uQDY_gPP4vgEfTq",
		'Content-Type: application/json'
	);

	// print_r($headers);
	// Open connection

	$ch = curl_init();

	// Set the url, number of POST vars, POST data

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Disabling SSL Certificate support temporarly

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	// Execute post

	$result = curl_exec($ch);
	if ($result === FALSE)
		{
		die('Curl failed: ' . curl_error($ch));
		}

	// Close connection

	curl_close($ch);

//	echo $result;die;

	}


            function ios_user_notification($site_url,$message, $ios_id,$sender_id)
			{

			  /*************** notification ****************/
                          
                          $message['alert'] = $message['key'];
                          $message['content-available'] = 1;
                          $message['badge'] = 1;
                          $message['sender_id'] = $sender_id;
                          $message['sound'] = 'default';
                          $message['ios_id'] = $ios_id;
                          $message['pem_file_name'] = 'Certificates.pem';
                          
                          $fields_string = (http_build_query($message));
                          
                          $url = $site_url.'ios_apk_noti.php';
                                                  
                          $fields_string = urldecode($fields_string);

                          $ch = curl_init();

                          curl_setopt($ch,CURLOPT_URL, $url);
                          curl_setopt($ch,CURLOPT_POST, count($message));
                          curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

                          $exc = curl_exec($ch);
                          curl_close($ch); 

			}

                        function ios_driver_notification($site_url,$message, $ios_id,$sender_id)
			{
                        
                          $message['alert'] = $message['key'];
                          $message['content-available'] = 1;
                          $message['badge'] = 1;
                          $message['sender_id'] = $sender_id;
                          $message['sound'] = 'default';
                          $message['ios_id'] = $ios_id;
                          $message['pem_file_name'] = 'Certificates.pem';
                          
                          $fields_string = (http_build_query($message));
                          
                          $url = $site_url.'ios_apk_noti.php';
                                                  
                          $fields_string = urldecode($fields_string);

                          $ch = curl_init();

                          curl_setopt($ch,CURLOPT_URL, $url);
                          curl_setopt($ch,CURLOPT_POST, count($message));
                          curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

                          $exc = curl_exec($ch);
                          curl_close($ch);                          


			}
                         





function ios_user_notification_new($token,$message)
	{//echo $token;
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    
        $key = "AAAAxD1FRtc:APA91bFRv6XIrJdNvujJk6y0CavkPOh37yg1I0GJWOkyPHlotL4HsDdC3wziljRZ6sWi7BMefSJz-WtFr9xbPl96Q9WXyJH0nGs-eNz1Xv9V6FpAZeVZrd0WrAIy4TfrSss3_IEwHKBX";
    
    $request_id = $message['request_id'];
    
    if($request_id){
        
        $request_id = $request_id;
    }else{
        $request_id = '';
    }
        //Creating the notification array.
        $notification = array(
            'title' =>$message['title'],
            'text' => $message['message'],
            'request_id' => $request_id,
            'ios_status' => $message['ios_status'],
            'sound' => 'default',
            'badge' => '1',
            );
    
        //This array contains, the token and the notification. The 'to' attribute stores the token.
        $fields = array('to' => $token, 'notification' => $notification,'priority'=>'high','content_available'=> true,'badge'=>'1','sound' => 'default');
    
        //Setup headers:
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key= '.$key; // key here
    
        $url = "https://fcm.googleapis.com/fcm/send";
        $ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	// Disabling SSL Certificate support temporarly
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	    $result = curl_exec($ch);
	    curl_close($ch);
	     // 	echo $result;die;
        return $result;
        
        
	}





function ios_provider_notification_new($token,$message)
	{//echo $token;
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    
        $key = "AAAARJdqG-E:APA91bF8Juexeh5qC7O3diGK22NULks9tGx91PfOFibJL58vu8cXIaoH3t_FydNJ65aBRiyZgJheLTlyZUL34Rinpo0L5ONQRWhvbmPizEODoQlTTvFn0wQovkdCxRiosMBNNicMKWLN";
    
        $request_id = $message['request_id'];

     if($request_id){
        
        $request_id = $request_id;
    }else{
        $request_id = '';
    }
    
        //Creating the notification array.
        $notification = array(
            'title' =>$message['title'],
            'text' => $message['message'],
            'request_id' => $request_id,
            'ios_status' => $message['ios_status'],
            'sound' => 'default',
            'badge' => '1',
            );
    
        //This array contains, the token and the notification. The 'to' attribute stores the token.
        $fields = array('to' => $token, 'notification' => $notification,'priority'=>'high','content_available'=> true,'badge'=>'1','sound' => 'default');
    
        //Setup headers:
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key= '.$key; // key here
    
        $url = "https://fcm.googleapis.com/fcm/send";
        $ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	// Disabling SSL Certificate support temporarly
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	    $result = curl_exec($ch);
	    curl_close($ch);
	      	//echo $result;die;
        return $result;
        
        
	}




function ios_user_notification_new123($token,$message)
	{//echo $token;
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    
        $key = "AAAARJdqG-E:APA91bF8Juexeh5qC7O3diGK22NULks9tGx91PfOFibJL58vu8cXIaoH3t_FydNJ65aBRiyZgJheLTlyZUL34Rinpo0L5ONQRWhvbmPizEODoQlTTvFn0wQovkdCxRiosMBNNicMKWLN";
    
    
    
    
        //Creating the notification array.
        $notification = array(
            'title' =>$message['title'],
            'text' => $message['message'],
            'ios_status' => $message['ios_status'],
            'sound' => 'default',
            'badge' => '1',
            );
    
        //This array contains, the token and the notification. The 'to' attribute stores the token.
        $fields = array('to' => $token, 'notification' => $notification,'priority'=>'high','content_available'=> true,'badge'=>'1','sound' => 'default');
    
        //Setup headers:
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key= '.$key; // key here
    
        $url = "https://fcm.googleapis.com/fcm/send";
        $ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	// Disabling SSL Certificate support temporarly
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	    $result = curl_exec($ch);
	    curl_close($ch);
	      //	echo $result;die;
        return $result;
        
        
	}




	}//end class
?>