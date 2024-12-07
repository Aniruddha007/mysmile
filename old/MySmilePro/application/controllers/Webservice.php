<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '/third_party/FCM/androidNoti.php';

class Webservice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/indexa
	 *	- or -
	 * Since this controller is set as the default controller inadd
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>f
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  
  
 public function __construct(){
    parent:: __construct();
    $this->load->model('webservice_model');
    $this->load->library(['form_validation','email']);  
    define("SITE_URL",'http://app.tooths.ai/MySmilePro/'); 
    define("SITE_EMAIL",'dave.f.inga@gmail.com');  
    $this->load->helper('string');
    date_default_timezone_set('America/New_York');
}
public function index()
{
  $this->load->view('welcome_message');
}




/*************  admin_time_slot_list *************/
public

function admin_time_slot_list()
    {//2020-03-30
     
        $type =$this->input->get_post('type');
        $provider_id =$this->input->get_post('provider_id');
        $address_id =$this->input->get_post('address_id');
        $current_date  = $this->input->get_post('current_date', TRUE); 


        $fetch = $this->webservice_model->get_all('admin_time_slot');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
            
            $time_slot1 = $val['time_slot'];
            $fetch_check = $this->db->query("SELECT * FROM user_request where  address_id = '$address_id' AND provider_id = '$provider_id' AND date = '$current_date' AND time = '$time_slot1'")->result_array();
            if($fetch_check){
             $val['time_slot_status'] = 'No';
             
         }else{
             
          $val['time_slot_status'] = 'Yes';
          
      }


      $ressult[] = $val;
  }


  if(isset($ressult))
  {

    
      $data['result']=$ressult;
      $data['message']='successful';
      $data['status']='1';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;

      
  }else {

      $data['result'] = [];
      $data['message'] = 'data not found';
      $data['status'] = '0';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;
  }
  
  $ressult['result'] = $data;
  $ressult['message'] = 'successful';
  $ressult['status'] = '1';
  $json = $ressult;
  header('Content-type: application/json');
  echo json_encode($json);die;
}
else
{
   $ressult['result'] = [];
   $ressult['message'] = 'unsuccessful';
   $ressult['status'] = '0';
   $json = $ressult;
   header('Content-type: application/json');
   echo json_encode($json);die;
}

header('Content-type: application/json');
echo json_encode($json);die;
}




/*************  admin_time_slot_list1 *************/
public

function admin_time_slot_list1()
    {//2020-03-30
     
        $type =$this->input->get_post('type');
        $provider_id =$this->input->get_post('provider_id');
        $address_id =$this->input->get_post('address_id');
        $current_date  = $this->input->get_post('current_date', TRUE); 


        $fetch = $this->webservice_model->get_all('admin_time_slot');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
            
            $time_slot1 = $val['time_slot'];
            $fetch_check = $this->db->query("SELECT * FROM user_request where  address_id = '$address_id' AND provider_id = '$provider_id' AND date = '$current_date' AND time = '$time_slot1'")->result_array();
            if($fetch_check){
             $val['time_slot_status'] = 'No';
             
         }else{
             
          $val['time_slot_status'] = 'Yes';
          
      }


      $ressult[] = $val;
  }


  if(isset($ressult))
  {

    
      $data['result']=$ressult;
      $data['message']='successful';
      $data['status']='1';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;

      
  }else {

      $data['result'] = [];
      $data['message'] = 'data not found';
      $data['status'] = '0';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;
  }
  
  $ressult['result'] = $data;
  $ressult['message'] = 'successful';
  $ressult['status'] = '1';
  $json = $ressult;
  header('Content-type: application/json');
  echo json_encode($json);die;
}
else
{
   $ressult['result'] = [];
   $ressult['message'] = 'unsuccessful';
   $ressult['status'] = '0';
   $json = $ressult;
   header('Content-type: application/json');
   echo json_encode($json);die;
}

header('Content-type: application/json');
echo json_encode($json);die;
}



/*************  procedure_list *************/
public

function procedure_list()
    {//2020-03-30
     
        $type =$this->input->get_post('type');


        $fetch = $this->webservice_model->get_where('procedure_list',['type'=>$type]);
        if ($fetch)
        {
          foreach($fetch as $val)
          {
           $data[] = $val;
       }

       $ressult['result'] = $data;
       $ressult['message'] = 'successful';
       $ressult['status'] = '1';
       $json = $ressult;
   }
   else
   {
       $ressult['result'] = [];
       $ressult['message'] = 'unsuccessful';
       $ressult['status'] = '0';
       $json = $ressult;
   }

   header('Content-type: application/json');
   echo json_encode($json);
}



/*************  profile_question_list *************/
public

function profile_question_list()
    {//2020-03-30
     
        $user_id =$this->input->get_post('user_id');
        $fetch_user = $this->webservice_model->get_where('users',['id'=>$user_id]);
        if($fetch_user){
           $medicationdetails= $fetch_user[0]['medicationdetails'];
           $allergidetails= $fetch_user[0]['allergidetails'];
       }else{
           $medicationdetails= '';
           $allergidetails= '';
           
       }
       $fetch = $this->webservice_model->get_all('profile_question');
       if ($fetch)
       {
          foreach($fetch as $val)
          {
              $q_id = $val['id'];
              if($user_id){
                 $fetch_check = $this->db->query("SELECT * FROM profile_question_answer where user_id = '$user_id' AND question_id = '$q_id' ")->result_array();
                 if($fetch_check){
                     $val['submit_status'] = $fetch_check[0]['answer'];
                     
                 }else{
                     $val['submit_status'] = 'No';
                     
                 }
             }else{
                 $val['submit_status'] = 'No';
                 
             }
             
             $data[] = $val;
         }
         $ressult['medicationdetails'] = $medicationdetails;
         $ressult['allergidetails'] =  $allergidetails;
         $ressult['result'] = $data;
         $ressult['message'] = 'successful';
         $ressult['status'] = '1';
         $json = $ressult;
     }
     else
      {  $ressult['medicationdetails'] = $medicationdetails;
  $ressult['allergidetails'] = $allergidetails;
  $ressult['result'] = [];
  $ressult['message'] = 'unsuccessful';
  $ressult['status'] = '0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);
}




/*************  profile_question_list_new *************/
public

function profile_question_list_new()
    {//2020-03-30
     
        $user_id =$this->input->get_post('user_id');
        $date =$this->input->get_post('date');
        
        
        
        $medicationdetails= '';
        $allergidetails= '';
        $fetch = $this->webservice_model->get_all('profile_question');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
              $q_id = $val['id'];
              if($user_id){
                 $fetch_check = $this->db->query("SELECT * FROM profile_question_answer where user_id = '$user_id' AND question_id = '$q_id'AND date = '$date'  ")->result_array();
                 if($fetch_check){
                     $val['submit_status'] = $fetch_check[0]['answer'];
                     
                     $medicationdetails= $fetch_check[0]['medicationdetails'];
                     $allergidetails= $fetch_check[0]['allergidetails'];
                     
                 }else{
                     $val['submit_status'] = 'No';
                     
                     $medicationdetails= '';
                     $allergidetails= '';
                     
                 }
             }else{
                 $val['submit_status'] = 'No';
                 
                 $medicationdetails= '';
                 $allergidetails= '';
                 
             }
             
             $data[] = $val;
         }
         $ressult['medicationdetails'] = $medicationdetails;
         $ressult['allergidetails'] =  $allergidetails;
         $ressult['result'] = $data;
         $ressult['message'] = 'successful';
         $ressult['status'] = '1';
         $json = $ressult;
     }
     else
      {  $ressult['medicationdetails'] = $medicationdetails;
  $ressult['allergidetails'] = $allergidetails;
  $ressult['result'] = [];
  $ressult['message'] = 'unsuccessful';
  $ressult['status'] = '0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);
}


/*************  get_intro_bannner_list *************/
public

function get_intro_bannner_list()
    {//2020-03-30
     
        
        $fetch = $this->db->query("SELECT * FROM intro_banner where type = 'USER' ")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
           $val['image']=SITE_URL.'uploads/images/'.$val['image'];
           $data[] = $val;
       }

       $ressult['result'] = $data;
       $ressult['message'] = 'successful';
       $ressult['status'] = '1';
       $json = $ressult;
   }
   else
   {
       $ressult['result'] = [];
       $ressult['message'] = 'unsuccessful';
       $ressult['status'] = '0';
       $json = $ressult;
   }

   header('Content-type: application/json');
   echo json_encode($json);
}



/*************  get_intro_bannner_list1 *************/
public

function get_intro_bannner_list1()
    {//2020-03-30
     
        
        $fetch = $this->db->query("SELECT * FROM intro_banner where type = 'PROVIDER'")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
           $val['image']=SITE_URL.'uploads/images/'.$val['image'];
           $data[] = $val;
       }

       $ressult['result'] = $data;
       $ressult['message'] = 'successful';
       $ressult['status'] = '1';
       $json = $ressult;
   }
   else
   {
       $ressult['result'] = [];
       $ressult['message'] = 'unsuccessful';
       $ressult['status'] = '0';
       $json = $ressult;
   }

   header('Content-type: application/json');
   echo json_encode($json);
}




/************* user_signup function *************/

public function user_signup(){


    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    
    
    $arr_data = [
        'first_name'=>$this->input->get_post('first_name'),
        'last_name'=>$this->input->get_post('last_name'),
        'email'=>$this->input->get_post('email'),
           // 'password'=>$this->input->get_post('password'),
        'mobile'=>$this->input->get_post('mobile'),
        'mobile_with_code'=>$this->input->get_post('mobile_with_code'),
        'lat'=>$this->input->get_post('lat'),
        'lon'=>$this->input->get_post('lon'),
        'gender'=>$this->input->get_post('gender'),
        'register_id'=>$this->input->get_post('register_id'),
        'status'=>'Active',
        'date_time'=>$date_time,
        'type'=>'USER',
        'ios_register_id'=>$this->input->get_post('ios_register_id') 
    ];
    
      /*if($arr_data['type'] == 'DRIVER'){
          
          $arr_data['status'] = 'Deactive';
      }else{
          $arr_data['status'] = 'Active';

      }*/

      $arr_get = ['mobile' => $arr_data['mobile']];

      $login = $this->webservice_model->get_where('users',$arr_get);
      if ($login) {
        
        $ressult['result']=(object)[];
        $ressult['message']='mobile already exist';
        $ressult['status']='0';
        $json = $ressult;
        
        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }     


    $arr_get = ['email' => $arr_data['email']];

    $login = $this->webservice_model->get_where('users',$arr_get);
    if ($login) {
        
        $ressult['result']=(object)[];
        $ressult['message']='email already exist';
        $ressult['status']='0';
        $json = $ressult;
        
        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }    
    

    if (isset($_FILES['image']))
    {
     $n = rand(0, 100000);
     $img = "USER_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['image'] = $img;        
 }


 if (isset($_FILES['vehicle_image']))
 {
     $n = rand(0, 100000);
     $img = "VEHICLE_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['vehicle_image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['vehicle_image'] = $img;        
 }
 if (isset($_FILES['licence_image']))
 {
     $n = rand(0, 100000);
     $img = "LIC_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['licence_image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['licence_image'] = $img;        
 }



 if (isset($_FILES['vehicle_insura_image']))
 {
     $n = rand(0, 100000);
     $img = "VEH_INSU_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['vehicle_insura_image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['vehicle_insura_image'] = $img;        
 }



 if (isset($_FILES['registration_image']))
 {
     $n = rand(0, 100000);
     $img = "REGIS_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['registration_image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['registration_image'] = $img;        
 }



 $id = $this->webservice_model->insert_data('users',$arr_data);

 if ($id=="") {
    $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
}else{
  
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('users',$arr_gets); 
    
    $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}

header('Content-type:application/json');
echo json_encode($json);

}





/************* verify_number function *************/

public function verify_number(){




$code = '12345';//rand(11111,99999);

$mobile =$this->input->get_post('mobile');
$email =$this->input->get_post('email');
$mobile_with_code =$this->input->get_post('mobile_with_code');

if($mobile){
   $arr_get = "mobile = '$mobile' ";


   $login = $this->webservice_model->get_where('users',$arr_get);
   if ($login) {
      
    $object = (object) ['code' =>"0"];
    $ressult['result']=$object;
    $ressult['message']='mobile already exist';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}     

$arr_get123 = "email = '$email' ";

$login = $this->webservice_model->get_where('users',$arr_get123);
if ($login) {
  $object = (object) ['code' =>"0"];
  
  $ressult['result']=$object;
  $ressult['message']='Email already exist';
  $ressult['status']='0';
  $json = $ressult;
  
  header('Content-type:application/json');
  echo json_encode($json);
  die;
}        

$signup_referral_code =$this->input->get_post('signup_referral_code');



if($signup_referral_code){
 $arr_get_check = ['referral_code' => $signup_referral_code];

 $login_check = $this->webservice_model->get_where('users',$arr_get_check);
 if($login_check){
    


 }else{
   
    $ressult['result']=(object)[];
    $ressult['message']='You enter referral wrong code';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;    
}
}


  //   $to = $mobile;//'+12015488786';
    $to =$mobile_with_code;//'+12015488786';
    $to =urlencode($to);
    $msg = "Body=Your SelfCare OTP is : " . $code . "&To=" . $to . "&From=+19312631031";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/AC41f538bc2e327e488cdef578a063ea35ppppppppp/Messages.json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "AC41f538bc2e327e488cdef578a063ea35ppppppppp" . ":" . "516d7a46a65fd278d55985c254883246ppppppp");
    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    
    $response = json_decode($result);
        // print_r($response);die;

    if (isset($response->error)) {
      $ressult['result']=$response;
      $ressult['message']='unsuccessful';
      $ressult['status']='0';
      $json = $ressult;
      header('Content-type: application/json');
      echo json_encode($json);
      die;
      
  }else{

     //  curl_close ($ch);  
      $object = (object) ['code' =>$code];
      
      $ressult['result']=$object;
                        //  $ressult['result']=$response;
      $ressult['message']='successful';
      $ressult['status']='1';
      $json = $ressult;   
      
      header('Content-type: application/json');
      echo json_encode($json);die;
  }

  

}else{
  $object = (object) ['code' =>$code];

  $ressult['result']=$object;
  $ressult['message']='unsuccessful';
  $ressult['status']='0';
  $json = $ressult;
  header('Content-type: application/json');
  echo json_encode($json);
  die;
  
}

header('Content-type:application/json');
echo json_encode($json);die;

}




/************* check_number function *************/

public function check_number(){


$code = '12345';//rand(11111,99999);

$mobile =$this->input->get_post('mobile');
$type =$this->input->get_post('type');
$mobile_with_code =$this->input->get_post('mobile_with_code');

if($type == 'USER'){
   $arr_get = "mobile = '$mobile' AND mobile_with_code = '$mobile_with_code' AND type = '$type'";
}else{
   $arr_get = "mobile = '$mobile' AND mobile_with_code = '$mobile_with_code'";
   
}

$login = $this->webservice_model->get_where('users',$arr_get);
if ($login) {
  
  
   if($login[0]['block_unblock'] == 'Block'){
       
    $ressult['result']=(object)[];
    $ressult['note']=$login[0]['note_block'];
    $ressult['user_id']=$login[0]['id'];
    $ressult['message']='Your Account Block by admin.';
    $ressult['status']='4';
    $json = $ressult; 
    
    header('Content-type:application/json');
    echo json_encode($json);die;


    
}

if($login[0]['status'] == 'Deactive'){
   
    /* if($type == 'PROVIDER'){
                                $ressult['result']=(object)[];
                                $ressult['user_id']=$login[0]['id'];
                                $ressult['note']=$login[0]['note'];
                                $ressult['message']='Your Application has been received and under review, please wait for approval';
                                $ressult['status']='2';
                                $json = $ressult; 
                                
                               header('Content-type:application/json');
                               echo json_encode($json);die;
                           }*/

                       }

                       if($type == 'PROVIDER'){
                         if($login[0]['store_name'] == '' || $login[0]['address'] == ''){
                          
                            $ressult['result']=(object)[];
                            $ressult['user_id']=$login[0]['id'];
                            $ressult['note']='';
                            $ressult['message']='Your Profile not completed, please update your profile';
                            $ressult['status']='3';
                            $json = $ressult; 
                            
                            header('Content-type:application/json');
                            echo json_encode($json);die;
                            
                            
                            
                        }
                        
                    }

                    
  //   $to = $mobile;//'+12015488786';
    $to =$mobile_with_code;//'+12015488786';
    $to =urlencode($to);
    $msg = "Body=Your SelfCare OTP is : " . $code . "&To=" . $to . "&From=+19312631031";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/AC41f538bc2e327e488cdef578a063ea35ppppppppppppppppp/Messages.json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "AC41f538bc2e327e488cdef578a063ea35pppppppppp" . ":" . "516d7a46a65fd278d55985c254883246pppppppppp");
    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    
    $response = json_decode($result);
        // print_r($response);die;

    if (isset($response->error)) {
      $ressult['result']=$response;
      $ressult['message']='unsuccessful';
      $ressult['status']='0';
      $json = $ressult;
      header('Content-type: application/json');
      echo json_encode($json);
      die;
      
  }else{

     //  curl_close ($ch);  
      $object = (object) ['code' =>$code];
      
      $ressult['result']=$object;
                        //  $ressult['result']=$response;
      $ressult['message']='successful';
      $ressult['status']='1';
      $json = $ressult;   
      
      header('Content-type: application/json');
      echo json_encode($json);die;
  }
}else{
  $object = (object) ['code' =>$code];

  $ressult['result']=$object;
  $ressult['message']='Your have entered wrong mobile';
  $ressult['status']='0';
  $json = $ressult;
  header('Content-type: application/json');
  echo json_encode($json);
  die;
  
  
  
  
}

header('Content-type:application/json');
echo json_encode($json);die;

}




/************* user_login function *************/


public function user_login(){


    $email = $this->input->get_post('email', TRUE);
    $mobile = $this->input->get_post('mobile', TRUE);
    $password = $this->input->get_post('password', TRUE);
    $register_id = $this->input->get_post('register_id');
    $type = 'USER';
    $ios_register_id= $this->input->get_post('ios_register_id');
    
    $lat = $this->input->get_post('lat', TRUE);
    $lon = $this->input->get_post('lon', TRUE);

    $where = "mobile = '$mobile' AND type = 'USER'";
    

    

    $login = $this->webservice_model->get_where('users',$where);
    if ($login) {



       $wherech_r_id = "register_id = '$register_id' AND type = 'USER'";
       
       $login_ch_r_id = $this->webservice_model->get_where('users',$wherech_r_id);
       if($login_ch_r_id){
         
           $this->webservice_model->update_data('users',['register_id'=>''],$wherech_r_id);

       }
       
                   /*
                     $wherech_i_id = "ios_register_id = '$ios_register_id' AND type = 'USER'";
		
      $login_ch_i_id = $this->webservice_model->get_where('users',$wherech_i_id);
                   if($login_ch_i_id){
                       
                     $this->webservice_model->update_data('users',['ios_register_id'=>''],$wherech_i_id);

                 }*/
                 
                 

                 if($register_id) { 
                    
                     $arrr_get =   array(
                       'register_id'=>$register_id,
                       'lat'=>$lat,
                       'lon'=>$lon
                   );
                     

                     $this->webservice_model->update_data('users',$arrr_get,$where);
                 }

                 if($ios_register_id) {  

                     $arrr_get1 =   array(
                       'ios_register_id'=>$ios_register_id,
                       'lat'=>$lat,
                       'lon'=>$lon
                   );
                     
                     $this->webservice_model->update_data('users',$arrr_get1,$where);
                 }



                 $login3 = $this->webservice_model->get_where('users',$where);
                 $login3[0]['image']=SITE_URL.'uploads/images/'.$login3[0]['image'];
                 $ressult['result']=$login3[0];
                 $ressult['message']='successfull';
                 $ressult['status']='1';
                 $json = $ressult;
                 header('Content-type:application/json');
                 echo json_encode($json);die;
                 

             }else{
                $ressult['result']=(object)[];
                $ressult['message']='Your have entered wrong mobile';
                $ressult['status']='0';
                $json = $ressult;       
            }

            header('Content-type:application/json');
            echo json_encode($json);
        }




        /************* forget_password function *************/

        public function forget_password()
        {
           


$code = '';//rand(11111,99999);

$mobile =$this->input->get_post('mobile');
$mobile_with_code =$this->input->get_post('mobile_with_code');


$arr_get = "mobile = '$mobile' ";


$login = $this->webservice_model->get_where('users',$arr_get);
if ($login) {
   
  //   $to = $mobile;//'+12015488786';
    $to =$mobile_with_code;//'+12015488786';
    $to =urlencode($to);
    $msg = "Body=Your SelfCare OTP is : " . $code . "&To=" . $to . "&From=+19312631031";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/AC41f538bc2e327e488cdef578a063ea35ppppppppppppppppp/Messages.json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "AC41f538bc2e327e488cdef578a063ea35pppppppppp" . ":" . "516d7a46a65fd278d55985c254883246pppppppppp");
    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    
    $response = json_decode($result);
        // print_r($response);die;

    if (isset($response->error)) {
      $ressult['result']=$response;
      $ressult['message']='unsuccessful';
      $ressult['status']='0';
      $json = $ressult;
      header('Content-type: application/json');
      echo json_encode($json);
      die;
      
  }else{

     //  curl_close ($ch);  
   
   
     $this->webservice_model->update_data('users',['password'=>($code)],$arr_get);


     $object = (object) ['code' =>$code];
     
     $ressult['result']=$object;
                        //  $ressult['result']=$response;
     $ressult['message']='successful';
     $ressult['status']='1';
     $json = $ressult;   
     
     header('Content-type: application/json');
     echo json_encode($json);die;
 }
}else{
  $object = (object) ['code' =>$code];

  $ressult['result']=$object;
  $ressult['message']='Your have entered wrong mobile';
  $ressult['status']='0';
  $json = $ressult;
  header('Content-type: application/json');
  echo json_encode($json);
  die;
  
  
  
  
}

header('Content-type:application/json');
echo json_encode($json);die;




}






/************* get_profile function *************/

public function get_profile(){

  $user_id = $this->input->get_post('user_id');
  $arr_get = ['id'=>$this->input->get_post('user_id')];

  $current_date = $this->input->get_post('current_date');
  if($current_date){
    $current_date = $current_date ;
}else{
    $current_date = date('Y-m-d');
}

$login = $this->webservice_model->get_where('users',$arr_get);


if ($login) {  
   
          /*           $c_date = date('Y-m-d H:i:s');
             
                

 $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$user_id])->get('rating_review')->result_array();

         $rating = ($get[0]['rating']=='') ?  0 : $get[0]['rating'];   

         
         $login[0]['rating'] = "$rating";
*/

         $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
         $login[0]['store_logo']=SITE_URL.'uploads/images/'.$login[0]['store_logo'];
         $login[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login[0]['store_cover_image'];
           // $login[0]['licence_image']=SITE_URL.'uploads/images/'.$login[0]['licence_image'];
           // $login[0]['id_proof_image']=SITE_URL.'uploads/images/'.$login[0]['id_proof_image'];
           // $login[0]['vehicle_insura_image']=SITE_URL.'uploads/images/'.$login[0]['vehicle_insura_image'];
           // $login[0]['registration_image']=SITE_URL.'uploads/images/'.$login[0]['registration_image'];
         
         
         
         
         $user_id = $this->input->get_post('user_id');
         
         $pro_service = $this->db->query("select COUNT(id) AS total_cart from provider_services where user_id = $user_id AND remove_status = 'No'")->result_array();
         $login[0]['total_service_count']=$pro_service[0]['total_cart'];
     ///////
         
         
         $pro_noti = $this->db->query("select COUNT(id) AS total_cart from notification where user_id = '$user_id' AND seen_status = 'UNSEEN' AND (notification_type = 'Admin' OR notification_type = 'Offer' OR notification_type = 'Request' OR notification_type = 'Note')")->result_array();
         $login[0]['noti_count']=$pro_noti[0]['total_cart'];
         
     ///////
         
         /*   $pro_time = $this->db->query("select * from store_details where store_id = '$user_id'  AND store_ope_closs_status = 'OPEN' ")->result_array();
if($pro_time){
    $login[0]['store_set_time']= 'Yes';
}else{
    $login[0]['store_set_time']= 'No';
    
}*/
$fetch_check = $this->db->query("SELECT * FROM provider_time_slot where provider_id = '$user_id' AND date = '$current_date' ")->result_array();
if($fetch_check){
 $fetch[0]['store_set_time'] = 'Yes';
 
}else{
 $fetch[0]['store_set_time'] = 'No';
 
}


$add_to_cart = $this->db->query("select COUNT(id) AS total_cart,cat_id from add_to_cart where user_id = $user_id AND status = 'Pending'")->result_array();
$login[0]['total_cart']=$add_to_cart[0]['total_cart'];

$add_to_cart1 = $this->db->query("select * from add_to_cart where user_id = $user_id AND status = 'Pending'")->result_array();
if($add_to_cart1){
 $login[0]['cart_cat_id']=$add_to_cart1[0]['cat_id'];
 
}else{
 $login[0]['cart_cat_id']='';

}

$arr_get1 = ['id'=>$login[0]['cat_id']];

$login_cat = $this->webservice_model->get_where('category',$arr_get1);
if($login_cat){
    $login[0]['cat_name'] = $login_cat[0]['name'];
}else{
    $login[0]['cat_name'] ='';
    
}

$login_image = $this->webservice_model->get_where('provider_images',['user_id'=>$login[0]['id']]);
if($login_image){
    foreach($login_image as $val)
    {
        
     
     $val['image']=SITE_URL.'uploads/images/'.$val['image'];  
     $login[0]['provider_images'][]=$val;
 }
 
}else{
 $login[0]['provider_images']=[];
 
}


$ressult['result']=$login[0];
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;

}else{

    $json = ['result'=>(object)[],'status'=>'0','message'=>'Data Not Found'];

}

header('Content-type: application/json');
echo json_encode($json);
}      






/************* update_profile function *************/

public function user_update_profile(){

  $arr_get = ['id'=>$this->input->get_post('user_id')];

  $login = $this->webservice_model->get_where('users',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }



  $arr_data = [
     'first_name'=>$this->input->get_post('first_name'),
     'last_name'=>$this->input->get_post('last_name'),
     'email'=>$this->input->get_post('email'),
 ];

 


 
 if (isset($_FILES['image']))
 {
     $n = rand(0, 100000);
     $img = "USER_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['image'] = $img;        
 }
 

 $res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
 if ($res)
 {
    $data = $this->webservice_model->get_where('users',$arr_get);
    $data[0]['image']=SITE_URL.'uploads/images/'.$data[0]['image'];
    
    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}


/************* get_category function *************/


public

function get_category()
{
    $fetch = $this->webservice_model->get_where('category',['remove_status'=>'No']);
    if ($fetch)
    {
      foreach($fetch as $val)
      {
          $val['image']=SITE_URL.'uploads/images/'.$val['image'];
          $data[] = $val;
      }

      $ressult['result'] = $data;
      $ressult['message'] = 'successful';
      $ressult['status'] = '1';
      $json = $ressult;
  }
  else
  {
   $ressult['result'] = [];
   $ressult['message'] = 'unsuccessful';
   $ressult['status'] = '0';
   $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);
}



/*************  get_bannner_list *************/
public

function get_bannner_list()
    {//2020-03-30
        $c_date = date('Y-m-d');
        
        $fetch = $this->db->query("SELECT * FROM banner ")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
           $val['image']=SITE_URL.'uploads/images/'.$val['image'];
           $data[] = $val;
       }

       $ressult['result'] = $data;
       $ressult['message'] = 'successful';
       $ressult['status'] = '1';
       $json = $ressult;
   }
   else
   {
       $ressult['result'] = [];
       $ressult['message'] = 'unsuccessful';
       $ressult['status'] = '0';
       $json = $ressult;
   }

   header('Content-type: application/json');
   echo json_encode($json);
}




/*************  get_user_notification_list *************/
public

function get_user_notification_list()
{                     
 $user_id = $this->input->get_post('user_id', TRUE); 

 $this->db->order_by("id", "desc");
 
 $arr_get = ['type'=>'USER'];
                           // $login = $this->db->query("SELECT * FROM notification where type = 'USER' AND (user_id = '$user_id' OR user_id = '') order by id desc ")->result_array();
 $login = $this->db->query("SELECT * FROM notification WHERE FIND_IN_SET('$user_id', `user_id`) AND type = 'USER' AND (`notification_type`= 'Bid' OR `notification_type`= 'Admin' OR `notification_type`= 'Offer' OR `notification_type`= 'Request' OR `notification_type`= 'Note') ORDER BY id desc")->result_array();

     // $login = $this->webservice_model->get_where('notification',$arr_get);

 
 if ($login) {
  
  
      /*   $login_n = $this->db->query("SELECT * FROM notification WHERE `user_id` = '$user_id' AND type = 'USER'  AND `notification_type`= 'Admin' AND seen_status = 'UNSEEN' AND `notification_type`= 'Bid' ORDER BY id desc")->result_array();
if($login_n){
         $seen_status =  $login_n[0]['seen_status'];
         if($seen_status == 'UNSEEN'){
                     $ressult1=$login_n[0];

         }else{
                     $ressult1=(object)[];

         }
}   else{
                     $ressult1=(object)[];

         }
  $this->db->query("UPDATE `notification` SET `seen_status`='SEEN' WHERE `user_id` = '$user_id' AND (`notification_type`= 'Bid' OR `notification_type`= 'Admin' OR `notification_type`= 'Offer' OR `notification_type`= 'Request' OR `notification_type`= 'Note')");
              */  

  
  foreach($login as  $val)
  {   
     
    $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
    
    $val['date_time']= $date_time;  
    
    $data[] = $val;

}


                         // $ressult['unseen_notification']=(object)[];
$ressult['result']=$data;
$ressult['message']='successful';
$ressult['status']='1';
$json = $ressult;                      


}
else {
                        //  $ressult['unseen_notification']=(object)[];

  $ressult['result']=[];
  $ressult['message']='unsuccessful';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);

}



/************* provider_signup function *************/

public function provider_signup(){


    $open_day = "Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday";
    $open_time = "12:00,12:00,12:00,12:00,12:00,12:00,12:00";
    $close_time = "00:00,00:00,00:00,00:00,00:00,00:00,00:00";
    $store_ope_closs_status ="CLOSE,CLOSE,CLOSE,CLOSE,CLOSE,CLOSE,CLOSE";

    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    $gender = $this->input->get_post('gender', TRUE); 
    if($gender){
        
        $gender = $this->input->get_post('gender', TRUE); 
        
    }else{
        
        $gender = ''; 
        
    }
    $type = $this->input->get_post('type', TRUE); 

    $referral_code =  $this->webservice_model->generateRandomString(5);
    $signup_referral_code =$this->input->get_post('signup_referral_code');
    if($signup_referral_code){
      $signup_referral_code =$this->input->get_post('signup_referral_code');

  }else{
    $signup_referral_code = '';
}


$hygeinist_type =$this->input->get_post('hygeinist_type');
if($hygeinist_type){
  $hygeinist_type =$this->input->get_post('hygeinist_type');

}else{
    $hygeinist_type = '';
}



$cost_per_block = $this->input->get_post('cost_per_block');
if($cost_per_block){
    $cost_per_block = $this->input->get_post('cost_per_block');
    
}else{
    $cost_per_block = '';
    
}


$address = $this->input->get_post('address');
if($address){
    $address = $this->input->get_post('address');
    
}else{
    $address = '';
    
}

$lat = $this->input->get_post('lat');
if($lat){
    $lat = $this->input->get_post('lat');
    
}else{
    $lat = '';
    
}

$lon = $this->input->get_post('lon');
if($lon){
    $lon = $this->input->get_post('lon');
    
}else{
    $lon = '';
    
}
$arr_data = [
    'first_name'=>$this->input->get_post('first_name'),
    'cost_per_block'=>$cost_per_block,
    'last_name'=>$this->input->get_post('last_name'),
    'email'=>$this->input->get_post('email'),
    'mobile'=>$this->input->get_post('mobile'),
    'mobile_with_code'=>$this->input->get_post('mobile_with_code'),
    'cat_id'=>$this->input->get_post('cat_id'),
    'hygeinist_type'=>$hygeinist_type,
    'cat_name'=>$this->input->get_post('cat_name'),
    'license_number'=>$this->input->get_post('license_number'),
    'NPI_number'=>$this->input->get_post('NPI_number'),
    'CDS'=>$this->input->get_post('CDS'),
    'malpractice_insurance'=>$this->input->get_post('malpractice_insurance'),
    'malpractice_suits'=>$this->input->get_post('malpractice_suits'),
    'register_id'=>$this->input->get_post('register_id'),
    'status'=>'Deactive',
    'type'=>$type,
    'address'=>$address,
    'lat'=>$lat,
    'lon'=>$lon,
    'referral_code'=>$referral_code,
    'signup_referral_code'=>$signup_referral_code,
    'gender'=>$gender,
    'date_time'=>$date_time,
    'open_time'=>$open_time,
    'close_time'=>$close_time,
    'store_ope_closs_status'=>$store_ope_closs_status,
    'ios_register_id'=>$this->input->get_post('ios_register_id') 
];



$arr_get = ['mobile' => $arr_data['mobile']];

$login = $this->webservice_model->get_where('users',$arr_get);
if ($login) {
    
    $ressult['result']=(object)[];
    $ressult['message']='mobile already exist';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}     


$arr_get = ['email' => $arr_data['email']];

$login = $this->webservice_model->get_where('users',$arr_get);
if ($login) {
    
    $ressult['result']=(object)[];
    $ressult['message']='email already exist';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}    




$id = $this->webservice_model->insert_data('users',$arr_data);

if ($id=="") {
    $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
}else{
  
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('users',$arr_gets); 
    
    

/*
                            $open_day = (explode(",",$open_day));
                            $open_time = (explode(",",$open_time));
                            $close_time = (explode(",",$close_time));
                            $store_ope_closs_status = (explode(",",$store_ope_closs_status));

                            $i = 0;
                            foreach($open_day as $val)
		                 	{
		                 	     $arr_data1 = [
                                            'store_id'=>$id,
                                            'open_day'=>$val,
                                            'open_time'=>$open_time[$i],
                                            'close_time'=>$close_time[$i],
                                            'store_ope_closs_status'=>$store_ope_closs_status[$i],
                                            ];
      
		                 	     $this->webservice_model->insert_data('store_details',$arr_data1);

		                 	  $i++;
		                 	   }
		                 	   */
		                 	   



////////////mail
                               $key_new = $login[0]['first_name'].' '.$login[0]['last_name']." joined as provider, please check details and verify him";
                               $email = 'dave.f.inga@gmail.com';
                               $to = $email;
                               $subject = "MySmilePro: Email";
                               $body = "<div style='max-width: 600px; width: 100%; margin-left: auto; margin-right: auto;'>
                               <div style='color: #fff; width: 100%;'>
                               <img alt='' src='".SITE_URL."uploads/images/logo.png' width ='180' height='180'/>
                               </div>

                               <div style='margin-top: 10px; padding-right: 10px; 
                               
                               padding-bottom: 20px;'>
                               <hr>
                               <h3 style='color: #232F3F;'>Hello MySmilePro Admin,</h3>
                               <p> ".$key_new."</p>

                               <hr>

                               <p>Enjoy the time with your MySmilePro groups!</p>
                               <p>The MySmilePro team</p>

                               </div>
                               </div>

                               </div>";

//print_r($body);die;
                               $headers = "From: info@MySmilePro.com" . "\r\n";
                               $headers.= "MIME-Version: 1.0" . "\r\n";
                               $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";

       // mail($to, $subject, $body, $headers);
                               
                               
                               
////////////end mail 

                               date_default_timezone_set('America/New_York');
                               $date_time =  date('Y-m-d H:i:s');
                               
                               
                               $arr_data_noti = [
                                'user_id'=>$login[0]['id'],
                                'request_id'=>'',
                                'title'=>"New Provider Joined",
                                'type'=>"DRIVER",
                                'message'=>$login[0]['first_name'].' '.$login[0]['last_name']." joined as provider",
                                'notification_type'=>'Signup',
                                'date_time'=>$date_time,
                            ];

                            $this->webservice_model->insert_data('notification',$arr_data_noti);


                            $user_id = $login[0]['id'];
                            if($address){
                                
                                
                              $arr_data_address = [
                                'user_id'=>$user_id,
                                'address'=>$address,
                                'lat'=>$lat,
                                'lon'=>$lon,
                                'rentstatus'=>'Both'
                            ];

                            $d_id = $this->webservice_model->insert_data('user_address',$arr_data_address);

                            
                            $arr_data_address_user = [
                                'address_id'=>$d_id,
                            ];
                            $this->webservice_model->update_data('users',$arr_data_address_user,['id'=>$user_id]);


                        }


                        $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
                        $ressult['result']=$login[0];
                        $ressult['message']='successfull';
                        $ressult['status']='1';
                        $json = $ressult;
                    }

                    header('Content-type:application/json');
                    echo json_encode($json);

                }



                
                /************* provider_update_profile function *************/

                public function provider_update_profile(){

                  $arr_get = ['id'=>$this->input->get_post('user_id')];
                  
                  $user_id = $this->input->get_post('user_id', TRUE);



                  $login = $this->webservice_model->get_where('users',$arr_get);
                  if ($login[0]['id'] == "")
                  {
                      $ressult['result']=(object)[];
                      $ressult['message']='unsuccessfull';
                      $ressult['status']='0';
                      $json = $ressult;

                      header('Content-type:application/json');
                      echo json_encode($json);
                      die;
                  }



                  $arr_data = [
                     'first_name'=>$this->input->get_post('first_name'),
                     'last_name'=>$this->input->get_post('last_name'),
                     'email'=>$this->input->get_post('email'),
                     'cost_per_block'=>$this->input->get_post('cost_per_block'),
                     'cat_id'=>$this->input->get_post('cat_id'),
                     'cat_name'=>$this->input->get_post('cat_name'),
                 ];

                 


                 
                 if (isset($_FILES['image']))
                 {
                     $n = rand(0, 100000);
                     $img = "USER_IMG_" . $n . '.png';
                     move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                     $arr_data['image'] = $img;        
                 }
                 

                 $res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
                 if ($res)
                 {
                  
                     
                    $data = $this->webservice_model->get_where('users',$arr_get);
                    $data[0]['image']=SITE_URL.'uploads/images/'.$data[0]['image'];
                    
                    $ressult['result']=$data[0];
                    $ressult['message']='successfull';
                    $ressult['status']='1';
                    $json = $ressult;
                }
                else
                {
                  $ressult['result']=(object)[];
                  $ressult['message']='unsuccessfull';
                  $ressult['status']='0';
                  $json = $ressult;
              }

              header('Content-type: application/json');
              echo json_encode($json);

              

          }


          /************* upload_provider_document function *************/

          public function upload_provider_document(){


              
            $user_id = $this->input->get_post('user_id', TRUE);
            $open_day = $this->input->get_post('open_day', TRUE);
            $open_time = $this->input->get_post('open_time', TRUE);
            
            
            $close_time = $this->input->get_post('close_time', TRUE);
            $store_ope_closs_status = $this->input->get_post('store_ope_closs_status', TRUE);



            
            $user_check = $this->webservice_model->get_where('users',['id'=>$user_id]);

            
            $arr_data = [
             'first_name'=>$this->input->get_post('first_name'),
             'last_name'=>$this->input->get_post('last_name'),
             'email'=>$this->input->get_post('email'),
             'store_name'=>$this->input->get_post('store_name'),
             'address_id'=>$this->input->get_post('address_id'),
             'address'=>$this->input->get_post('address'),
             'lat'=>$this->input->get_post('lat'),
             'lon'=>$this->input->get_post('lon'),
             'cost_per_block'=>$this->input->get_post('cost_per_block'),
             'malpractice_helptxt'=>$this->input->get_post('malpractice_helptxt'),
             'license_number'=>$this->input->get_post('license_number'),
             'NPI_number'=>$this->input->get_post('NPI_number'),
             'CDS'=>$this->input->get_post('CDS'),
             'malpractice_insurance'=>$this->input->get_post('malpractice_insurance'),
             'malpractice_suits'=>$this->input->get_post('malpractice_suits'),
             'about_store'=>$this->input->get_post('about_store'),
             'home_address'=>$this->input->get_post('home_address'),
             'home_lat'=>$this->input->get_post('home_lat'),
             'home_lon'=>$this->input->get_post('home_lon'),
             'malpractice_insurance_expiry'=>$this->input->get_post('malpractice_insurance_expiry'),
         ];

         


         if (isset($_FILES['licence_image']))
         {
             $n = rand(0, 100000);
             $img = "licence_image_" . $n . '.png';
             move_uploaded_file($_FILES['licence_image']['tmp_name'], "uploads/images/" . $img);
             $arr_data['licence_image'] = $img;        
         }      
         
         
         
         if (isset($_FILES['licence_image1']))
         {
             $n = rand(0, 100000);
             $img = "licence_image1" . $n . '.png';
             move_uploaded_file($_FILES['licence_image1']['tmp_name'], "uploads/images/" . $img);
             $arr_data['licence_image1'] = $img;        
         }      
         
         
         
         if (isset($_FILES['npi_image']))
         {
             $n = rand(0, 100000);
             $img = "npi_image" . $n . '.png';
             move_uploaded_file($_FILES['npi_image']['tmp_name'], "uploads/images/" . $img);
             $arr_data['npi_image'] = $img;        
         }      
         
         
         
         if (isset($_FILES['malpractice_insurance_image']))
         {
             $n = rand(0, 100000);
             $img = "malpractice_insurance_image" . $n . '.png';
             move_uploaded_file($_FILES['malpractice_insurance_image']['tmp_name'], "uploads/images/" . $img);
             $arr_data['malpractice_insurance_image'] = $img;        
         }      
         
         
         
         if (isset($_FILES['malpractice_suits_image']))
         {
             $n = rand(0, 100000);
             $img = "malpractice_suits_image" . $n . '.png';
             move_uploaded_file($_FILES['malpractice_suits_image']['tmp_name'], "uploads/images/" . $img);
             $arr_data['malpractice_suits_image'] = $img;        
         }      
         
         

         if (isset($_FILES['store_logo']))
         {
          
          
             $n = rand(0, 100000);
             $img = "store_logo_" . $n . '.png';
             move_uploaded_file($_FILES['store_logo']['tmp_name'], "uploads/images/" . $img);
             $arr_data['store_logo'] = $img;  
             
         }
         
         
         

         if (isset($_FILES['store_cover_image']))
         {
             $n = rand(0, 100000);
             $img = "store_cover_image_" . $n . '.png';
             move_uploaded_file($_FILES['store_cover_image']['tmp_name'], "uploads/images/" . $img);
             $arr_data['store_cover_image'] = $img;  
             
         }
         
         
         
         $res =  $this->webservice_model->update_data('users',$arr_data,['id'=>$user_id]);

         

         if ($res=="") {
            $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
            
            
            header('Content-type: application/json');
            echo json_encode($json);die;
            
        }else{
           
           

            $user_p = $this->webservice_model->get_where('users',['id'=>$user_id]);

            date_default_timezone_set('America/New_York');
            $date_time =  date('Y-m-d H:i:s');
            
            
            if (isset($_FILES['provider_images']))
            {

             $provider_images = $_FILES['provider_images']['name'];
             
             $i=0;
             foreach($provider_images AS $name){
                 
              
               $n = rand(0, 100000);
                 $ext = 'png';//end(explode(".",$name));
                 $img = "PROVIDER_images_" . date('Ymdhis') . '_' . $n . '.'.$ext;
                 move_uploaded_file($_FILES['provider_images']['tmp_name'][$i], "uploads/images/" . $img);
                /* if($i==0){
                   $arr_data_new = ['store_cover_image'=> $img];
                   $res = $this->webservice_model->update_data('users',$arr_data_new, ['id'=>$user_id]);                   
               }*/
               $img_data = ['user_id'=>$user_id,'image'=>$img];
               $this->webservice_model->insert_data('provider_images',$img_data);
               $i++;

           }
           
       }
       $arr_gets = ['id'=>$user_id];
       
       
       $data = $this->webservice_model->get_where('users',$arr_gets);
       $data[0]['image']=SITE_URL.'uploads/images/'.$data[0]['image'];
       
       $ressult['result']=$data[0];
       $ressult['message']='successfull';
       $ressult['status']='1';
       $json = $ressult;

       header('Content-type:application/json');
       echo json_encode($json);
       die;
       
   }
   

   header('Content-type: application/json');
   echo json_encode($json);die;

   
   
}



/************* provider_login function *************/


public function provider_login(){


    $email = $this->input->get_post('email', TRUE);
    $mobile = $this->input->get_post('mobile', TRUE);
    $password = $this->input->get_post('password', TRUE);
    $register_id = $this->input->get_post('register_id');
    $type = 'USER';
    $ios_register_id= $this->input->get_post('ios_register_id');
    
    $lat = $this->input->get_post('lat', TRUE);
    $lon = $this->input->get_post('lon', TRUE);

    $where = "mobile = '$mobile' AND (type = 'PROVIDER' OR type = 'HYGIENIST')";
    

    

    $login = $this->webservice_model->get_where('users',$where);
    if ($login) {


       $wherech_r_id = "register_id = '$register_id' AND type = 'PROVIDER'";
       
       $login_ch_r_id = $this->webservice_model->get_where('users',$wherech_r_id);
       if($login_ch_r_id){
         
           $this->webservice_model->update_data('users',['register_id'=>''],$wherech_r_id);

       }
       
       
                     /*$wherech_i_id = "ios_register_id = '$ios_register_id' AND type = 'PROVIDER'";
		
      $login_ch_i_id = $this->webservice_model->get_where('users',$wherech_i_id);
                   if($login_ch_i_id){
                       
                     $this->webservice_model->update_data('users',['ios_register_id'=>''],$wherech_i_id);

                 }*/
 /*
 if($login[0]['hygeinist_type'] != 'Rent'){
     
     
                                $ressult['result']=(object)[];
                                $ressult['user_id']=$login[0]['id'];
                                $ressult['message']='Your Profile not completed, please update your profile';
                                $ressult['status']='3';
                                $json = $ressult; 
                                
                               header('Content-type:application/json');
                               echo json_encode($json);die;
                           
                               
                           }*/
                           
                           if($login[0]['store_name'] == '' ){
                              
                            $ressult['result']=(object)[];
                            $ressult['user_id']=$login[0]['id'];
                            $ressult['message']='Your Profile not completed, please update your profile';
                            $ressult['status']='3';
                            $json = $ressult; 
                            
                            header('Content-type:application/json');
                            echo json_encode($json);die;
                            
                            
                            
                        }
                        
                        

// if($login[0]['status'] == 'Active'){
                        


                        if($register_id) { 
                            
                         $arrr_get =   array(
                           'register_id'=>$register_id,
                       );
                         
                         $this->webservice_model->update_data('users',$arrr_get,$where);
                     }

                     if($ios_register_id) {  

                         $arrr_get1 =   array(
                           'ios_register_id'=>$ios_register_id,
                       );
                         
                         $this->webservice_model->update_data('users',$arrr_get1,$where);
                     }



                     $login3 = $this->webservice_model->get_where('users',$where);
                     $login3[0]['image']=SITE_URL.'uploads/images/'.$login3[0]['image'];
                     $ressult['result']=$login3[0];
                     $ressult['message']='successfull';
                     $ressult['status']='1';
                     $json = $ressult;
                     header('Content-type:application/json');
                     echo json_encode($json);die;
                     
                     
             //  }
                     
             /*else{
                                $ressult['result']=(object)[];
                                $ressult['user_id']=$login[0]['id'];
                                $ressult['message']='Your Application has been received and under review, please wait for approval';
                                $ressult['status']='2';
                                $json = $ressult; 
                                
                               header('Content-type:application/json');
                               echo json_encode($json);die;


                           }*/
                           

                       }else{
                        $ressult['result']=(object)[];
                        $ressult['message']='Your have entered wrong mobile';
                        $ressult['status']='0';
                        $json = $ressult;       
                    }

                    header('Content-type:application/json');
                    echo json_encode($json);
                }




                /************* get_provider_details function *************/
                public function get_provider_details(){

                  $arr_get = ['id'=>$this->input->get_post('provider_id')];


                  $provider_id = $this->input->get_post('provider_id');
                  $user_id = $this->input->get_post('user_id');

                  $login = $this->webservice_model->get_where('users',$arr_get);

                  if($login) {
                      
                     $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
                     $login[0]['store_logo']=SITE_URL.'uploads/images/'.$login[0]['store_logo'];
                     $login[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login[0]['store_cover_image'];
                     $login[0]['licence_image']=SITE_URL.'uploads/images/'.$login[0]['licence_image'];
                     $login[0]['licence_image1']=SITE_URL.'uploads/images/'.$login[0]['licence_image1'];
                     $login[0]['npi_image']=SITE_URL.'uploads/images/'.$login[0]['npi_image'];
                     $login[0]['malpractice_insurance_image']=SITE_URL.'uploads/images/'.$login[0]['malpractice_insurance_image'];
                     $login[0]['malpractice_suits_image']=SITE_URL.'uploads/images/'.$login[0]['malpractice_suits_image'];
   //$login[0]['pass_image']=SITE_URL.'uploads/images/'.$login[0]['pass_image'];
                     
                     
                     
                     $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

                     $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   

                     $login[0]['rating'] = $rating;

                     
                     
                     
                     
                     $rating_count = $this->webservice_model->get_where('rating_review',['to_id'=>$provider_id]);
                     if($rating_count){
                        $aa = count($rating_count);
                        $login[0]['rating_count'] = $aa;
                    }else{
                        $aa =0;
                        $login[0]['rating_count'] = $aa;
                        
                    }
                /*     
                        $follow_detail = $this->Webservice_model->get_where('follow_detail',['request_get_id'=>$login[0]['id']]);
                     if($follow_detail){
           		       $follow_detail = count($follow_detail);
                     }else{
           		       $follow_detail = 0;
                         
                     }
                     
                        $follow_detail1 = $this->Webservice_model->get_where('follow_detail',['request_id'=>$login[0]['id']]);
                     if($follow_detail1){
           		       $follow_detail1 = count($follow_detail1);
                     }else{
           		       $follow_detail1 = 0;
                         
                     }
                     
    $rating = number_format($rating, 1, '.', '');
    $login[0]['rating']=$rating;

    $login[0]['total_posts']=$aa;
    $login[0]['total_followers']=$follow_detail;
    $login[0]['total_following']=$follow_detail1;*/
    
    
    $val123 = [];
    $login_service = $this->webservice_model->get_where('provider_services',['user_id'=>$login[0]['id']]);
    if($login_service){
        foreach($login_service as $val)
        {
            
         
                                   //$val['image']=SITE_URL.'uploads/images/'.$val['image'];  
         
           $service_id = $val['id'];
           
           $login_image = $this->webservice_model->get_where('provider_service_image',['service_id'=>$service_id]);
           if($login_image){
            foreach($login_image as $val22)
            {
                
             
             $val22['image']=SITE_URL.'uploads/images/'.$val22['image']; 
             
             $val123[]=$val22;
             $val['service_images'][]=$val22;
         }
         
     }else{
         $val123=[];
         $val['service_images']=[];
         
     }
     $login[0]['service_details'][]=$val;
 }
 
}else{
 $login[0]['service_details']=[];
 
}

$login_image = $this->webservice_model->get_where('provider_images',['user_id'=>$login[0]['id']]);
if($login_image){
    foreach($login_image as $val)
    {
        
     
     $val['image']=SITE_URL.'uploads/images/'.$val['image'];  
     $login[0]['provider_images'][]=$val;
 }
 
}else{
 $login[0]['provider_images']=[];
 
}


$arr_provider = ['user_id'=>$user_id,'provider_id'=>$login[0]['id']];
$fav_provider = $this->webservice_model->get_where('fav_provider', $arr_provider);
if($fav_provider){
 $login[0]['fav_provider']='YES';

}else{
 $login[0]['fav_provider']='NO';
 
}

                       /* 
                           $login_store_de = $this->webservice_model->get_where('store_details',['store_id'=>$provider_id]);
                                if($login_store_de){
                                foreach($login_store_de as $val222)
                               {
                                
                                 $t1 = $val222['open_time'];
                                                      $t1_new = "00:00 AM";

                 if($t1 == '01:00'){
                     
                     $t1_new = "01:00 AM";
                 }
                 if($t1 == '02:00'){
                     
                     $t1_new = "02:00 AM";
                 }
                 if($t1 == '03:00'){
                     
                     $t1_new = "03:00 AM";
                 }
                 
                 if($t1 == '04:00'){
                     
                     $t1_new = "04:00 AM";
                 }
                 
                 if($t1 == '05:00'){
                     
                     $t1_new = "05:00 AM";
                 }
                 
                 if($t1 == '06:00'){
                     
                     $t1_new = "06:00 AM";
                 }
                 
                 if($t1 == '07:00'){
                     
                     $t1_new = "07:00 AM";
                 }
                 
                 if($t1 == '08:00'){
                     
                     $t1_new = "08:00 AM";
                 }
                 
                 if($t1 == '09:00'){
                     
                     $t1_new = "09:00 AM";
                 }
                 
                 if($t1 == '10:00'){
                     
                     $t1_new = "11:00 AM";
                 }
                 
                 if($t1 == '11:00'){
                     
                     $t1_new = "11:00 AM";
                 }
                 
                 if($t1 == '12:00'){
                     
                     $t1_new = "12:00 AM";
                 }
                 
                 if($t1 == '13:00'){
                     
                     $t1_new = "01:00 PM";
                 }
                 
                 if($t1 == '14:00'){
                     
                     $t1_new = "02:00 PM";
                 }
                 
                 if($t1 == '15:00'){
                     
                     $t1_new = "03:00 PM";
                 }
                 
                 
                 if($t1 == '16:00'){
                     
                     $t1_new = "04:00 PM";
                 }
                 
                 
                 if($t1 == '17:00'){
                     
                     $t1_new = "05:00 PM";
                 }
                 
                 
                 if($t1 == '18:00'){
                     
                     $t1_new = "06:00 PM";
                 }
                 
                 
                 if($t1 == '19:00'){
                     
                     $t1_new = "07:00 PM";
                 }
                 
                 
                 if($t1 == '20:00'){
                     
                     $t1_new = "08:00 PM";
                 }
                 
                 
                 if($t1 == '21:00'){
                     
                     $t1_new = "09:00 PM";
                 }
                 
                 
                 if($t1 == '22:00'){
                     
                     $t1_new = "10:00 PM";
                 }
                 
                 
                 if($t1 == '23:00'){
                     
                     $t1_new = "11:00 PM";
                 }
                 
                 
                 if($t1 == '24:00'){
                     
                     $t1_new = "12:00 PM";
                 }
                 
                    if($t1 == '00:00'){
                     
                     $t1_new = "00:00 PM";
                 }
                 
                 $t2 = $val222['close_time'];
                 
                  $t2_new = "00:00 AM";
                  
                  if($t2 == '01:00'){
                     
                     $t2_new = "01:00 AM";
                 }
                 if($t2 == '02:00'){
                     
                     $t2_new = "02:00 AM";
                 }
                 if($t2 == '03:00'){
                     
                     $t2_new = "03:00 AM";
                 }
                 
                 if($t2 == '04:00'){
                     
                     $t2_new = "04:00 AM";
                 }
                 
                 if($t2 == '05:00'){
                     
                     $t2_new = "05:00 AM";
                 }
                 
                 if($t2 == '06:00'){
                     
                     $t2_new = "06:00 AM";
                 }
                 
                 if($t2 == '07:00'){
                     
                     $t2_new = "07:00 AM";
                 }
                 
                 if($t2 == '08:00'){
                     
                     $t2_new = "08:00 AM";
                 }
                 
                 if($t2 == '09:00'){
                     
                     $t2_new = "09:00 AM";
                 }
                 
                 if($t2 == '10:00'){
                     
                     $t2_new = "11:00 AM";
                 }
                 
                 if($t2 == '11:00'){
                     
                     $t2_new = "11:00 AM";
                 }
                 
                 if($t2 == '12:00'){
                     
                     $t2_new = "12:00 AM";
                 }
                 
                 if($t2 == '13:00'){
                     
                     $t2_new = "01:00 PM";
                 }
                 
                 if($t2 == '14:00'){
                     
                     $t2_new = "02:00 PM";
                 }
                 
                 if($t2 == '15:00'){
                     
                     $t2_new = "03:00 PM";
                 }
                 
                 
                 if($t2 == '16:00'){
                     
                     $t2_new = "04:00 PM";
                 }
                 
                 
                 if($t2 == '17:00'){
                     
                     $t2_new = "05:00 PM";
                 }
                 
                 
                 if($t2 == '18:00'){
                     
                     $t2_new = "06:00 PM";
                 }
                 
                 
                 if($t2 == '19:00'){
                     
                     $t2_new = "07:00 PM";
                 }
                 
                 
                 if($t2 == '20:00'){
                     
                     $t2_new = "08:00 PM";
                 }
                 
                 
                 if($t2 == '21:00'){
                     
                     $t2_new = "09:00 PM";
                 }
                 
                 
                 if($t2 == '22:00'){
                     
                     $t2_new = "10:00 PM";
                 }
                 
                 
                 if($t2 == '23:00'){
                     
                     $t2_new = "11:00 PM";
                 }
                 
                 
                 if($t2 == '24:00'){
                     
                     $t2_new = "12:00 PM";
                 }
                 
                 
                 if($t2 == '00:00'){
                     
                     $t2_new = "00:00 PM";
                 }
                           
                               
                          //    $val222['open_time'] = $t1_new;
                          //    $val222['close_time'] = $t2_new;
                                   $login[0]['store_day_details'][]=$val222;
                                  }
                              
                                }else{
                                   $login[0]['store_day_details']=[];
    
                               }*/
                               
                               $login[0]['service_images'] = $val123;
                               
                               $ressult['result']=$login[0];
                               $ressult['message']='successfull';
                               $ressult['status']='1';
                               $json = $ressult;

                           }else{

                              $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'Data Not Found'];

                          }

                          header('Content-type: application/json');
                          echo json_encode($json);
                      }
                      
                      
                      
                      
                      
                      /*************  get_referral_provider *************/
                      public

                      function get_referral_provider()
                      {                     
                          
                          $arr_data = array(
                            'referral_code' => $this->input->get_post('referral_code'),
                        );
                          $user_id = $this->input->get_post('user_id');

                          $referral_code = $this->input->get_post('referral_code');
                          $login_user = $this->webservice_model->get_where('users', ['id'=>$user_id]);
                          
                          
                          
                          $lat = $this->input->get_post('lat');
                          $lon = $this->input->get_post('lon');
      $from_distance =500000000000000;// $this->input->get_post('distance');
      
      
      if($lat){
          $lat = $login_user[0]['lat'];
          $lon = $login_user[0]['lon'];
          $from_distance =5000000000;
          
      }else{
          $lat = $login_user[0]['lat'];
          $lon = $login_user[0]['lon'];
          $from_distance =50000000000000;
      }

      


      
      
      
      
      
      $login = $this->webservice_model->get_where('users', ['type'=>'HYGIENIST','signup_referral_code'=>$referral_code]);
      
      
      if ($login) {
         
          foreach($login as $val) {
             
             
             
			//////////////check condition
             
			//////////////////check condition end
             
             
              
                 //  $val['time_ago'] = $this->Webservice_model->humanTiming(strtotime($val['date_time']))." ago";
            
            
            if($val['lat']){
              $lat1 = $val['lat'];
              $lon1 = $val['lon'];
              
              
          }else{
              $lat1 = '40.79118';
              $lon1 = '-74.3133337';
              
          }

          
          $distance = $this->webservice_model->distance($lat, $lon, $lat1, $lon1, $miles = false);
          
          $distance = str_replace( ',', '', $distance);
 //print_r($distance);
          if($distance < $from_distance ){
            

             
            $provider_id = $val['id'];
            
            $val['distance'] = number_format($distance,2);
            
            
            
            $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

            $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   


            $val['rating']=$rating;
            $val['image']=SITE_URL.'uploads/images/'.$val['image'];
            $val['store_logo']=SITE_URL.'uploads/images/'.$val['store_logo'];
            $val['store_cover_image']=SITE_URL.'uploads/images/'.$val['store_cover_image'];
            $ressult[] = $val;
        }
    }
    
    
    
    
    
    if(isset($ressult))
    {
      
     
        
        
      $price = array();
      foreach ($ressult as $key => $row)
      {
       $distance = $row['rating'];
       $distance = str_replace( ',', '', $distance);
       $price[$key] = $distance;
   }
   array_multisort($price, SORT_DESC, $ressult);
   
   



   $data['result']=$ressult;
   $data['message']='successful';
   $data['status']='1';
   $json = $data;
   header('Content-type: application/json');
   echo json_encode($json);die;

   
}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}

}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}




	// print_r($login);


header('Content-type: application/json');
echo json_encode($json);die;
}





/***************get_all_provider *****************/
public
function get_all_provider()
{  
 $category_id = $this->input->get_post('category_id', TRUE); 
 $user_id = $this->input->get_post('user_id', TRUE); 
 
 $lat = $this->input->get_post('lat');
 $lon = $this->input->get_post('lon');
      $from_distance =5000000;// $this->input->get_post('distance');
      
      
      if($lat){
          $lat = $this->input->get_post('lat');
          $lon = $this->input->get_post('lon');
          $from_distance =50000;
          
      }else{
          $lat = '40.79118';
          $lon = '-74.3133337';
          $from_distance =50000000;
      }

      
      
      $fetch = $this->db->query("SELECT * FROM users WHERE id != '$user_id'  AND type = 'PROVIDER'  AND remove_status ='No' AND status ='Active'  order by id desc")->result_array();


      if ($fetch){
          
        foreach($fetch as $val)
        {
           
           $p_id =  $val['id'];  
           
           $arr_gets = ['user_id'=>$p_id];
           $lo = $this->webservice_model->get_where('user_address',$arr_gets);       
           
           if($lo){
              
           }else{
            continue;
        }
        if($val['lat']){
          $lat1 = $val['lat'];
          $lon1 = $val['lon'];
          
          
      }else{
          $lat1 = '40.79118';
          $lon1 = '-74.3133337';
          
      }
      
      $distance = $this->webservice_model->distance($lat, $lon, $lat1, $lon1, $miles = false);
      $val['distance'] = number_format($distance,2);

      
      $val['rating']="5.0";
      $val['image']=SITE_URL.'uploads/images/'.$val['image'];
      $val['store_logo']=SITE_URL.'uploads/images/'.$val['store_logo'];
      $val['store_cover_image']=SITE_URL.'uploads/images/'.$val['store_cover_image'];
      $ressult1[]=$val;
  }
  
  
  
  if(isset($ressult1))
  {
      
     
      $data['result']=$ressult1;
      $data['message']='successful';
      $data['status']='1';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;

      
  }else {

      $data['result'] = [];
      $data['message'] = 'data not found';
      $data['status'] = '0';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;
  }
  
  
  
  
}
else
{
    $data['result']=[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}





/*************  get_filter_provider *************/
public

function get_filter_provider()
{                     
  
  $arr_data = array(
    'cat_id' => $this->input->get_post('cat_id'),
    'type' => $this->input->get_post('type'),    
);
  $user_id = $this->input->get_post('user_id');

  $cat_id = $this->input->get_post('cat_id');
  $type = $this->input->get_post('type');
  $type_new = $this->input->get_post('type_new');

  
  
  $lat = $this->input->get_post('lat');
  $lon = $this->input->get_post('lon');
      $from_distance =500000;// $this->input->get_post('distance');
      
      
      if($lat){
          $lat = $this->input->get_post('lat');
          $lon = $this->input->get_post('lon');
          $from_distance =50000000;
          
      }else{
          $lat = '40.79118';
          $lon = '-74.3133337';
          $from_distance =500000000;
      }

      


      
      
      if($type== 'PROVIDER' || $type== 'HYGIENIST'){
         
         
          // $login = $this->webservice_model->get_where('users', ['type'=>'PROVIDER']);
       $login = $this->db->query("SELECT * FROM users where  (type = 'PROVIDER' OR type = 'HYGIENIST' ) ")->result_array();

       
       if ($login) {
         
          foreach($login as $val) {
             
             
             
			//////////////check condition
             
			//////////////////check condition end
             
             
              
                 //  $val['time_ago'] = $this->Webservice_model->humanTiming(strtotime($val['date_time']))." ago";
            
            
            if($val['lat']){
              $lat1 = $val['lat'];
              $lon1 = $val['lon'];
              
              
          }else{
              $lat1 = '40.79118';
              $lon1 = '-74.3133337';
              
          }

          
          $distance = $this->webservice_model->distance($lat, $lon, $lat1, $lon1, $miles = false);
          
          $distance = str_replace( ',', '', $distance);
 //print_r($distance);
          if($distance < $from_distance ){
            

             
            $provider_id = $val['id'];
            
            $val['distance'] = number_format($distance,2);
            
            
            
            $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

            $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   


            $val['rating']=$rating;
            $val['image']=SITE_URL.'uploads/images/'.$val['image'];
            $val['store_logo']=SITE_URL.'uploads/images/'.$val['store_logo'];
            $val['store_cover_image']=SITE_URL.'uploads/images/'.$val['store_cover_image'];
            $ressult[] = $val;
        }
    }
    
    
    
    
    
    if(isset($ressult))
    {
      
     
      if($type_new){
          
          if($type_new == 'rating'){
            
              $price = array();
              foreach ($ressult as $key => $row)
              {
               $distance = $row['rating'];
               $distance = str_replace( ',', '', $distance);
               $price[$key] = $distance;
           }
           array_multisort($price, SORT_DESC, $ressult);
           
       }else{
         $price = array();
         foreach ($ressult as $key => $row)
         {
           $distance = $row['distance'];
           $distance = str_replace( ',', '', $distance);
           $price[$key] = $type_new;
       }
       array_multisort($price, SORT_ASC, $ressult);
   }
}else{
    
   $price = array();
   foreach ($ressult as $key => $row)
   {
       $distance = $row['distance'];
       $distance = str_replace( ',', '', $distance);
       $price[$key] = $distance;
   }
   array_multisort($price, SORT_ASC, $ressult);
   
}

$data['result']=$ressult;
$data['message']='successful';
$data['status']='1';
$json = $data;
header('Content-type: application/json');
echo json_encode($json);die;


}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}



}
else {
  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}



}else{
    
    $login = $this->db->query("SELECT * FROM provider_services where cat_id = '$cat_id' group by user_id")->result_array();
    
    
    if ($login) {
     
      foreach($login as $val) {$val_p = [];
          $provider_id= $val['user_id'];
          $login_user = $this->webservice_model->get_where('users',['id'=>$provider_id]);
          if($login_user){}else{
            continue;
        }

        $distance = $this->webservice_model->distance($lat, $lon, $login_user[0]['lat'], $login_user[0]['lon'], $miles = false);

        
        if($distance < $from_distance ){

           $distance = str_replace( ',', '', $distance);

           $login_user[0]['distance'] = number_format($distance,2);
           
           
           
           $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

           $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   


           $login_user[0]['rating']=$rating;
           $login_user[0]['image']=SITE_URL.'uploads/images/'.$login_user[0]['image'];
           $login_user[0]['store_logo']=SITE_URL.'uploads/images/'.$login_user[0]['store_logo'];
           $login_user[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_user[0]['store_cover_image'];
           $ressult[] = $login_user[0];
       }
   }
   
   
   
   
   
   if(isset($ressult))
   {
      
      if($type_new){
          
          if($type_new == 'rating'){
            
              $price = array();
              foreach ($ressult as $key => $row)
              {
               $distance = $row['rating'];
               $distance = str_replace( ',', '', $distance);
               $price[$key] = $distance;
           }
           array_multisort($price, SORT_DESC, $ressult);
           
       }else{
         $price = array();
         foreach ($ressult as $key => $row)
         {
           $distance = $row['distance'];
           $distance = str_replace( ',', '', $distance);
           $price[$key] = $type_new;
       }
       array_multisort($price, SORT_ASC, $ressult);
   }
}else{
    
   $price = array();
   foreach ($ressult as $key => $row)
   {
       $distance = $row['distance'];
       $distance = str_replace( ',', '', $distance);
       $price[$key] = $distance;
   }
   array_multisort($price, SORT_ASC, $ressult);
   
}
$data['result']=$ressult;
$data['message']='successful';
$data['status']='1';
$json = $data;
header('Content-type: application/json');
echo json_encode($json);die;


}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}



}
else {
  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}

}

	// print_r($login);


header('Content-type: application/json');
echo json_encode($json);die;
}




/*************  get_filter_provider_multiple *************/
public

function get_filter_provider_multiple()
{                     
  
  $arr_data = array(
    'cat_id' => $this->input->get_post('cat_id'),
    'type' => $this->input->get_post('type'),    
);
  $user_id = $this->input->get_post('user_id');

  $treatment_id = $this->input->get_post('treatment_id');
  $condition_id = $this->input->get_post('condition_id');
  $store_name = $this->input->get_post('store_name');
  $type = $this->input->get_post('type');
  
  $from_price = $this->input->get_post('from_price');
  $to_price = $this->input->get_post('to_price');

  
  
  $lat = $this->input->get_post('lat');
  $lon = $this->input->get_post('lon');
      $from_distance =5000000000000;// $this->input->get_post('distance');
      
      
      if($lat){
          $lat = $this->input->get_post('lat');
          $lon = $this->input->get_post('lon');
          $from_distance =5000000000000000;
          
      }else{
          $lat = '40.79118';
          $lon = '-74.3133337';
          $from_distance =50000000000000;
      }

      


      $login = $this->db->query("SELECT * FROM users where  (type = 'PROVIDER' OR type = 'HYGIENIST' ) ")->result_array();

      
      if($type== 'PROVIDER' || $type== 'HYGIENIST'){
         if($store_name){
         //  $login = $this->webservice_model->get_where('users', ['type'=>'PROVIDER']);
             $login = $this->db->query("SELECT * FROM users where  store_name LIKE '%$store_name%' AND (type = 'PROVIDER'  OR type = 'HYGIENIST' )")->result_array();

         }else{
           //$login = $this->webservice_model->get_where('users', ['type'=>'PROVIDER']);
             $login = $this->db->query("SELECT * FROM users where  (type = 'PROVIDER' OR type = 'HYGIENIST' ) ")->result_array();

         }
         
         
         if ($login) {
             
          foreach($login as $val) {
             
             
             
			//////////////check condition
             
			//////////////////check condition end
             
             
              
                 //  $val['time_ago'] = $this->Webservice_model->humanTiming(strtotime($val['date_time']))." ago";
            
             
             $distance = $this->webservice_model->distance($lat, $lon, $val['lat'], $val['lon'], $miles = false);


             if($distance < $from_distance ){
               $distance = str_replace( ',', '', $distance);

               
               $provider_id = $val['id'];
               
               $val['distance'] = number_format($distance,2);
               
               
               
               $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

               $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   


               $val['rating']=$rating;
               $val['image']=SITE_URL.'uploads/images/'.$val['image'];
               $val['store_logo']=SITE_URL.'uploads/images/'.$val['store_logo'];
               $val['store_cover_image']=SITE_URL.'uploads/images/'.$val['store_cover_image'];
               $ressult[] = $val;
           }
       }
       
       
       
       
       
       if(isset($ressult))
       {
          
          
          $price = array();
          foreach ($ressult as $key => $row)
          {
              $distance = $row['distance'];
              $distance = str_replace( ',', '', $distance);
              $price[$key] = $distance;
          }
          array_multisort($price, SORT_ASC, $ressult);

          $data['result']=$ressult;
          $data['message']='successful';
          $data['status']='1';
          $json = $data;
          header('Content-type: application/json');
          echo json_encode($json);die;

          
      }else {

          $data['result'] = [];
          $data['message'] = 'data not found';
          $data['status'] = '0';
          $json = $data;
          header('Content-type: application/json');
          echo json_encode($json);die;
      }
      
      
      
  }
  else {
      $data['result'] = [];
      $data['message'] = 'data not found';
      $data['status'] = '0';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;
  }



}else{
   
  
  $get_where = '';
  
  
  if($treatment_id){
   if($get_where==''){
     $get_where = "cat_id = '$treatment_id'";
 }else{
     $get_where = $get_where." AND cat_id = '$treatment_id'";
 }
}

if($condition_id){
   if($get_where==''){
     $get_where = "cat_id = '$condition_id'";
 }else{
     $get_where = $get_where." OR cat_id = '$condition_id'";
 }
}




if($from_price){
 if($get_where==''){
   $get_where = "(service_rate >= $from_price AND service_rate <= $to_price) group by user_id";
}else{
   $get_where = $get_where." AND (service_rate >= $from_price AND service_rate <= $to_price ) group by user_id";
}


}



if($get_where==''){
 
 
         //  $login = $this->webservice_model->get_where('users',['type'=>'PROVIDER']);
 
   $login = $this->db->query("SELECT * FROM users where  (type = 'PROVIDER' OR type = 'HYGIENIST' ) ")->result_array();
   
   if ($login) {
     
      foreach($login as $val) {
         
         
         
			//////////////check condition
         
			//////////////////check condition end
         
         
          
                 //  $val['time_ago'] = $this->Webservice_model->humanTiming(strtotime($val['date_time']))." ago";
        
         
         $distance = $this->webservice_model->distance($lat, $lon, $val['lat'], $val['lon'], $miles = false);


         if($distance < $from_distance ){
           $distance = str_replace( ',', '', $distance);

           
           $provider_id = $val['id'];
           
           $val['distance'] = number_format($distance,2);
           
           
           
           $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

           $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   


           $val['rating']=$rating;
           $val['image']=SITE_URL.'uploads/images/'.$val['image'];
           $val['store_logo']=SITE_URL.'uploads/images/'.$val['store_logo'];
           $val['store_cover_image']=SITE_URL.'uploads/images/'.$val['store_cover_image'];
           $ressult[] = $val;
       }
   }
   
   
   
   
   
   if(isset($ressult))
   {
      
      
      $price = array();
      foreach ($ressult as $key => $row)
      {
          $distance = $row['distance'];
          $distance = str_replace( ',', '', $distance);
          $price[$key] = $distance;
      }
      array_multisort($price, SORT_ASC, $ressult);

      $data['result']=$ressult;
      $data['message']='successful';
      $data['status']='1';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;

      
  }else {

      $data['result'] = [];
      $data['message'] = 'data not found';
      $data['status'] = '0';
      $json = $data;
      header('Content-type: application/json');
      echo json_encode($json);die;
  }
  
  
  
}
else {
  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}



}else{
    
  
  

    
 $login = $this->webservice_model->get_where('provider_services', $get_where);
}


if ($login) {
 
  foreach($login as $val) {$val_p = [];
      $provider_id= $val['user_id'];
      $login_user = $this->webservice_model->get_where('users',['id'=>$provider_id]);
      if($login_user){}else{
        continue;
    }

    $distance = $this->webservice_model->distance($lat, $lon, $login_user[0]['lat'], $login_user[0]['lon'], $miles = false);

    
    if($distance < $from_distance ){

       $distance = str_replace( ',', '', $distance);

       $login_user[0]['distance'] = number_format($distance,2);
       
       
       
       $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

       $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   


       $login_user[0]['rating']=$rating;
       $login_user[0]['image']=SITE_URL.'uploads/images/'.$login_user[0]['image'];
       $login_user[0]['store_logo']=SITE_URL.'uploads/images/'.$login_user[0]['store_logo'];
       $login_user[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_user[0]['store_cover_image'];
       $ressult[] = $login_user[0];
       
   }
}





if(isset($ressult))
{
   
    
  $price = array();
  foreach ($ressult as $key => $row)
  {
   
   $distance = $row['distance'];
   $distance = str_replace( ',', '', $distance);
   $price[$key] = $distance;
}
array_multisort($price, SORT_ASC, $ressult);

$data['result']=$ressult;
$data['message']='successful';
$data['status']='1';
$json = $data;
header('Content-type: application/json');
echo json_encode($json);die;


}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}



}
else {
  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}

}

	// print_r($login);


header('Content-type: application/json');
echo json_encode($json);die;
}




/*************  get_high_rated_provider *************/
public

function get_high_rated_provider()
{           
  
  $arr_data = array(
    'cat_id' => $this->input->get_post('cat_id'),
    'description' => $this->input->get_post('description') ,
    'from_price' => $this->input->get_post('from_price'),
    'to_price' => $this->input->get_post('to_price'),    
    'gender_type' => $this->input->get_post('gender_type'),       
);
  
  $category_id = $this->input->get_post('category_id');
  
  $get_where = "type = 'PROVIDER' AND status ='Active' AND block_unblock = 'Unblock'";

  $user_id = $this->input->get_post('user_id');
  $lat = $this->input->get_post('lat');
  $lon = $this->input->get_post('lon');
      $from_distance =50000000;// $this->input->get_post('distance');
      
      if($lat){
          $lat = $this->input->get_post('lat');
          $lon = $this->input->get_post('lon');
          $from_distance =5000000000;
          
      }else{
          $lat = '40.79118';
          $lon = '-74.3133337';
          $from_distance =50000000000;
      }
      $from_price = $this->input->get_post('from_price');
      $to_price = $this->input->get_post('to_price');

      
      
      
      if($arr_data['cat_id']!=''){
       if($get_where==''){
         $get_where = "cat_id = '".$arr_data['cat_id']."'";
     }else{
         $get_where = $get_where." AND cat_id = '".$arr_data['cat_id']."'";
     }
 }
 
 
 if($arr_data['cat_id']!=''){
   if($get_where==''){
     $get_where = "cat_id = '".$arr_data['cat_id']."'";
 }else{
     $get_where = $get_where." AND cat_id = '".$arr_data['cat_id']."'";
 }
}


/* if($arr_data['from_price']!=''){
   if($get_where==''){
     $get_where = "budget >= ".$arr_data['from_price']."";
   }else{
     $get_where = $get_where." AND budget >= ".$arr_data['from_price']."";
   }
 }

 if($arr_data['to_price']!=''){
   if($get_where==''){
     $get_where = "budget <= ".$arr_data['to_price']."";
   }else{
     $get_where = $get_where." AND budget <= ".$arr_data['to_price']."";
   }
}*/


     /* if($arr_data['sort_by']!=''){
         if($get_where==''){
           $get_where = "'".$sort_by."'";
         }else{
           $get_where = $get_where." '".$sort_by."'";
         }
     }*/




       // $gender_type = $this->input->get_post('gender_type');
     if($arr_data['gender_type']==''){
        
        
      $user_g_type = $this->webservice_model->get_where('users',['id'=>$user_id]);
      $user_g_type_value = $user_g_type[0]['gender'];

      if($user_g_type_value !=''){
       if($get_where==''){
         $get_where = "(gender_type = '".$user_g_type_value."' OR gender_type = 'All')";
     }else{
         $get_where = $get_where." AND (gender_type = '".$user_g_type_value."' OR gender_type = 'All')";
     }
 }
 

    //user ka data get krna h or uska gender nikal kar fir genrt type me pass krna h 
}

if($arr_data['gender_type'] =='All'){
    
    //dono gender ka data aana chahiye
}



if($arr_data['gender_type'] =='Male'){
    
    //Male gender ka data aana chahiye
    
  
  if($arr_data['gender_type']!=''){
   if($get_where==''){
     $get_where = "(gender_type = '".$arr_data['gender_type']."' OR gender_type = 'All')";
 }else{
     $get_where = $get_where." AND (gender_type = '".$arr_data['gender_type']."' OR gender_type = 'All')";
 }
}

}



if($arr_data['gender_type'] =='Female'){
    
    
   
  if($arr_data['gender_type']!=''){
   if($get_where==''){
     $get_where = "(gender_type = '".$arr_data['gender_type']."' OR gender_type = 'All')";
 }else{
     $get_where = $get_where." AND (gender_type = '".$arr_data['gender_type']."' OR gender_type = 'All')";
 }
}


    //Female gender ka data aana chahiye
}





if($get_where==''){
 $login = $this->webservice_model->get_all('users');
}else{
 $login = $this->webservice_model->get_where('users', $get_where);
}

	// print_r($login);

if ($login) {
 
  foreach($login as $val) {
     
      
                 //  $val['time_ago'] = $this->Webservice_model->humanTiming(strtotime($val['date_time']))." ago";
    
     
     $distance = $this->webservice_model->distance($lat, $lon, $val['lat'], $val['lon'], $miles = false);

     
     if($distance < $from_distance ){
         $val['distance'] = number_format($distance,2);
         
         $provider_id = $val['id'];
         
         $val['distance'] = number_format($distance,2);
         
         $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$provider_id])->get('rating_review')->result_array();

         $rating = ($get[0]['rating']=='') ?  "0" : $get[0]['rating'];   

         
         $val['rating']=$rating;
         $val['image']=SITE_URL.'uploads/images/'.$val['image'];
         $val['store_logo']=SITE_URL.'uploads/images/'.$val['store_logo'];
         $val['store_cover_image']=SITE_URL.'uploads/images/'.$val['store_cover_image'];
         $ressult[] = $val;
     }
 }
 
 
 if(isset($ressult))
 {
  
  
  $price = array();
  foreach ($ressult as $key => $row)
  {
    $price[$key] = $row['rating'];
}
array_multisort($price, SORT_DESC, $ressult);

$data['result']=$ressult;
$data['message']='successful';
$data['status']='1';
$json = $data;


}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
}
}
else {
  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
}

header('Content-type: application/json');
echo json_encode($json);
}


/************* add_profile_question_answer function *************/

public function add_profile_question_answer(){


   $user_id = $this->input->get_post('user_id');
   $question_id = $this->input->get_post('question_id');
   $answer = $this->input->get_post('answer');
   $date = date('Y-m-d');
   
   $medicationdetails = $this->input->get_post('medicationdetails');
   
   $allergidetails = $this->input->get_post('allergidetails');



   
   $arr_get = ['user_id'=>$user_id,'date'=>$date];

   $login = $this->webservice_model->get_where('profile_question_answer',$arr_get);
   if($login) {
      
      

    $question_id = (explode(",",$question_id));
    $answer = (explode(",",$answer));
    
    $i = 0;
    foreach($question_id as $val)
    {
        if($i ==0){
          $arr_get_new = ['user_id'=>$user_id,'date' => $date];

          $this->webservice_model->delete_data('profile_question_answer',$arr_get_new);
      }
      $arr_data1 = [
        'user_id'=>$user_id,
        'question_id'=>$val,
        'date'=>$date,
        'medicationdetails'=>$medicationdetails,
        'allergidetails'=>$allergidetails,
        'answer'=>$answer[$i],
    ];
    
    $this->webservice_model->insert_data('profile_question_answer',$arr_data1);

    $i++;
}



$ressult['result']='successfull';
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
header('Content-type:application/json');
echo json_encode($json);die;



header('Content-type:application/json');
echo json_encode($json);
die;
}else{
  
  
  

   $question_id = (explode(",",$question_id));
   $answer = (explode(",",$answer));
   
   $i = 0;
   foreach($question_id as $val)
   {
     
       $arr_data1 = [
        'user_id'=>$user_id,
        'question_id'=>$val,
        'date'=>$date,
        'medicationdetails'=>$medicationdetails,
        'allergidetails'=>$allergidetails,
        'answer'=>$answer[$i],
    ];
    
    $this->webservice_model->insert_data('profile_question_answer',$arr_data1);

    $i++;
}



$ressult['result']='successfull';
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
header('Content-type:application/json');
echo json_encode($json);die;

}  	   



}






/***************get_profile_question_answer *****************/
public
function get_profile_question_answer()
{  
 $user_id = $this->input->get_post('user_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM profile_question_answer WHERE user_id = $user_id  group by date")->result_array();


 if ($fetch){
  
    foreach($fetch as $val)
    {
      $date_new = $val['date'];
      $fetch1 = $this->db->query("SELECT * FROM profile_question_answer WHERE user_id = $user_id AND date = '$date_new'")->result_array();

      foreach($fetch1 as $val1)
      {
          $val['profile_question_answer'][]=$val1; 
      }
      $ressult1[] = $val;
  }
  $data['result']=$ressult1;
  $data['message']='successfull';
  $data['status']='1';
  $json = $data;
}
else
{
    $data['result']=[];
    $data['message']='No Date Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}



/************* add_provider_time_slot function *************/

public function add_provider_time_slot(){


   $provider_id = $this->input->get_post('provider_id');
   $date = $this->input->get_post('date');
   $time_slot = $this->input->get_post('time_slot');
   $address_id = $this->input->get_post('address_id');
   $address = $this->input->get_post('address');
   $lat = $this->input->get_post('lat');
   $lon = $this->input->get_post('lon');



   
   $arr_get = ['provider_id' => $provider_id,'address_id' => $address_id,'date' => $date];

   $login = $this->webservice_model->get_where('provider_time_slot',$arr_get);
   if($login) {
      
      

    $time_slot = (explode(",",$time_slot));
    
    $i = 0;
    foreach($time_slot as $val)
    {
        if($i ==0){
          $arr_get_new = ['provider_id'=>$provider_id,'date' => $date];

          $this->webservice_model->delete_data('provider_time_slot',$arr_get_new);
      }
      $arr_data1 = [
        'provider_id'=>$provider_id,
        'date'=>$date,
        'address_id'=>$address_id,
        'address'=>$address,
        'lat'=>$lat,
        'lon'=>$lon,
        'time_slot'=>$val,
    ];
    
    $this->webservice_model->insert_data('provider_time_slot',$arr_data1);

    $i++;
}


$ressult['result']='successfull';
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
header('Content-type:application/json');
echo json_encode($json);die;



header('Content-type:application/json');
echo json_encode($json);
die;
}else{
  
  
  

    $time_slot = (explode(",",$time_slot));
    
    $i = 0;
    foreach($time_slot as $val)
    {
      $arr_data1 = [
        'provider_id'=>$provider_id,
        'date'=>$date,
        'address_id'=>$address_id,
        'address'=>$address,
        'lat'=>$lat,
        'lon'=>$lon,
        'time_slot'=>$val,
    ];
    
    $this->webservice_model->insert_data('provider_time_slot',$arr_data1);

    $i++;
}


$ressult['result']='successfull';
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
header('Content-type:application/json');
echo json_encode($json);die;

}  	   



}



/*************  check_time_slot *************/
public

function check_time_slot()
    {//2020-03-30

        $time_zone = $this->input->get_post('time_zone', TRUE);
        if($time_zone){
           date_default_timezone_set($time_zone );
           $c_time =  date('H:i');
           $today_day_name =  date('l'); 
       }else{
           $c_time =  date('H:i');
           $today_day_name =  date('l'); 
           
       }
       
       $provider_id = $this->input->get_post('provider_id', TRUE);
       $now_current_day  = $this->input->get_post('now_current_day', TRUE); 
       $current_date  = $this->input->get_post('current_date', TRUE); 
       if($provider_id){
        $fetch = $this->db->query("SELECT * FROM provider_time_slot where provider_id = '$provider_id' AND date = '$current_date' ")->result_array();
        
    }else{
        
        $provider_id = '1';
        $fetch = $this->db->query("SELECT * FROM provider_time_slot where provider_id = '$provider_id'")->result_array();
        
    }
    

    //$fetch = $this->webservice_model->get_all('coupons');
    if ($fetch)
    {
     foreach($fetch as $val)
     {
      $time_slot1 =  $val['time_slot'] ;

      
      $fetch_check = $this->db->query("SELECT * FROM user_request_time_slot where payment_status = 'Complete' AND provider_id = '$provider_id' AND date = '$current_date' AND time_slot = '$time_slot1'")->result_array();
      if($fetch_check){
         $val['time_slot_status'] = 'No';
         
     }else{
         $val['time_slot_status'] = 'Yes';
         
     }


     $new_time_hr = strtotime("+60 minutes", strtotime($c_time));
     $new_time_hr =  date('H:i', $new_time_hr);
     
     
     
     $day_name = $val['day_name'];
     $time_slot = $val['time_slot'];
     $b_time_slot =  (explode(" -",$time_slot));

     $b_time_slot = $b_time_slot[0];
     if($today_day_name == $now_current_day){
        if($new_time_hr > $b_time_slot){
            continue;

        }
    }
    $ressult[] = $val;
}

if(isset($ressult))
{
  
  $data['result']=$ressult;
  $data['message']='successful';
  $data['status']='1';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;

  
}else {

  $data['result'] = [];
  $data['message'] = 'data not found';
  $data['status'] = '0';
  $json = $data;
  header('Content-type: application/json');
  echo json_encode($json);die;
}

}
else
{
   $ressult['result'] = [];
   $ressult['message'] = 'unsuccessful';
   $ressult['status'] = '0';
   $json = $ressult;
   header('Content-type: application/json');
   echo json_encode($json);die;
}

header('Content-type: application/json');
echo json_encode($json);
}



/*************  get_time_slot_provider *************/
public

function get_time_slot_provider()
    {//2020-03-30
       $provider_id = $this->input->get_post('provider_id', TRUE);
       $now_current_day  = $this->input->get_post('now_current_day', TRUE); 
       $current_date  = $this->input->get_post('current_date', TRUE); 

       
       $fetch = $this->db->query("SELECT * FROM users where id = '$provider_id' ")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
       if ($fetch)
       {
          
           $a_open_time = '08:00';
           $a_close_time = '21:00';
           $diff = strtotime($a_close_time) - strtotime($a_open_time);
           $diff = $diff/3600;


           $k = $diff*2;
           for($j =1; $j <= $k; $j++){
  // echo $q = 30 * $j;
             
             $Start = "12:00:00";
             $Minutes = 30 ;
             if($j == '1'){
               $To = date("h:i A", strtotime($a_open_time)+($Minutes*60));
           }else{
            
               $To = date("h:i A", strtotime($To)+($Minutes*60));
               
           }

           $v1 = date('h:i A',strtotime('-30 minutes',strtotime($To)));

           $fetch[0]['time_slot'] = $v1 .' - '.$To; 
           $time_slot1 = $v1 .' - '.$To;
           
           
           $fetch_check = $this->db->query("SELECT * FROM provider_time_slot where provider_id = '$provider_id' AND date = '$current_date' AND time_slot = '$time_slot1'")->result_array();
           if($fetch_check){
             $fetch[0]['add_time_slot'] = 'Yes';
             
         }else{
             $fetch[0]['add_time_slot'] = 'No';
             
         }
         $data[] = $fetch[0];
     }

     $ressult['result'] = $data;
     $ressult['message'] = 'successful';
     $ressult['status'] = '1';
     $json = $ressult;
 }
 else
 {
   $ressult['result'] = [];
   $ressult['message'] = 'unsuccessful';
   $ressult['status'] = '0';
   $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);
}





/*************  get_time_slot_provider1 *************/
public

function get_time_slot_provider1()
    {//2020-03-30
       $provider_id = $this->input->get_post('provider_id', TRUE);
       $address_id = $this->input->get_post('address_id', TRUE);
       $now_current_day  = $this->input->get_post('now_current_day', TRUE); 
       $current_date  = $this->input->get_post('current_date', TRUE); 

       
       $fetch = $this->db->query("SELECT * FROM users where id = '$provider_id' ")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
       if ($fetch)
       {
          
           $a_open_time = '08:00';
           $a_close_time = '21:00';
           $diff = strtotime($a_close_time) - strtotime($a_open_time);
           $diff = $diff/3600;


$k = 13;//$diff*2;
for($j =1; $j <= $k; $j++){
  // echo $q = 30 * $j;
 
 $Start = "12:00:00";
 $Minutes = 60 ;
 if($j == '1'){
   $To = date("h:i A", strtotime($a_open_time)+($Minutes*60));
}else{
    
   $To = date("h:i A", strtotime($To)+($Minutes*60));
   
}

$v1 = date('h:i A',strtotime('-60 minutes',strtotime($To)));

$fetch[0]['time_slot'] = $v1 .' - '.$To; 
$time_slot1 = $v1 .' - '.$To;

if($address_id){
    $fetch_check = $this->db->query("SELECT * FROM provider_time_slot where address_id = '$address_id' AND provider_id = '$provider_id' AND date = '$current_date' AND time_slot = '$time_slot1'")->result_array();
    if($fetch_check){
     $fetch[0]['add_time_slot'] = 'Yes';
     
 }else{
     $fetch[0]['add_time_slot'] = 'No';
     
 }
 
}else{
    $fetch_check = $this->db->query("SELECT * FROM provider_time_slot where provider_id = '$provider_id' AND date = '$current_date' AND time_slot = '$time_slot1'")->result_array();

    $fetch[0]['add_time_slot'] = 'No';
}

$data[] = $fetch[0];
}

$ressult['result'] = $data;
$ressult['message'] = 'successful';
$ressult['status'] = '1';
$json = $ressult;
}
else
{
   $ressult['result'] = [];
   $ressult['message'] = 'unsuccessful';
   $ressult['status'] = '0';
   $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);
}


/*************  get_time_slot_provider2 *************/
public

function get_time_slot_provider2()
    {//2020-03-30
       $provider_id = $this->input->get_post('provider_id', TRUE);
       $address_id = $this->input->get_post('address_id', TRUE);
       $now_current_day  = $this->input->get_post('now_current_day', TRUE); 
       $current_date  = $this->input->get_post('current_date', TRUE); 

       
       $fetch = $this->db->query("SELECT * FROM provider_time_slot where address_id = '$address_id' AND provider_id = '$provider_id' AND date = '$current_date' ")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
       if ($fetch)
       {
        foreach($fetch as $val)
        {
            $val['time_slot_status'] = 'Yes';
            $data[] = $val;
        }      	   


        $ressult['result'] = $data;
        $ressult['message'] = 'successful';
        $ressult['status'] = '1';
        $json = $ressult;
    }
    else
    {
       $ressult['result'] = [];
       $ressult['message'] = 'unsuccessful';
       $ressult['status'] = '0';
       $json = $ressult;
   }

   header('Content-type: application/json');
   echo json_encode($json);
}




/************* add_service function *************/

public function add_service(){



    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    
    $arr_data = [
        'user_id'=>$this->input->get_post('user_id'),
        'service_name'=>$this->input->get_post('service_name'),
        'description'=>$this->input->get_post('description'),
        'service_rate'=>$this->input->get_post('service_rate'),
        'working_time'=>$this->input->get_post('working_time'),
        'type'=>$this->input->get_post('type'),
        'cat_id'=>$this->input->get_post('cat_id'),
        'date_time'=>$date_time,
    ];
    



    $arr_get = ['cat_id' => $arr_data['cat_id'],'user_id' => $arr_data['user_id']];

    $login = $this->webservice_model->get_where('provider_services',$arr_get);
    if ($login) {
        
        $ressult['result']=(object)[];
        $ressult['message']='This service already exist';
        $ressult['status']='0';
        $json = $ressult;
        
        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }     
    
    
/*
                        if (isset($_FILES['image']))
      {
               $n = rand(0, 100000);
               $img = "USER_IMG_" . $n . '.png';
               move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
               $arr_data['image'] = $img;        
      }
*/

      


      $id = $this->webservice_model->insert_data('provider_services',$arr_data);

      if ($id=="") {
        $json = ['result'=>'unsuccessfull','status'=>0,'message'=>'data not found'];
    }else{
      
        $arr_gets = ['id'=>$id];
        $login = $this->webservice_model->get_where('provider_services',$arr_gets); 
        
        
        if (isset($_FILES['service_images']))
        {


         $service_images = $_FILES['service_images']['name'];
         
         $i=0;
         foreach($service_images AS $name){
             
           $n = rand(0, 100000);
                 $ext = 'png';//end(explode(".",$name));
                 $img = "SERVICE_IMG_" . date('Ymdhis') . '_' . $n . '.'.$ext;
                 move_uploaded_file($_FILES['service_images']['tmp_name'][$i], "uploads/images/" . $img);
                 
                 $img_data = ['service_id'=>$id,'image'=>$img];
                 $this->webservice_model->insert_data('provider_service_image',$img_data);
                 $i++;

             }
             
         }
         
       // $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
         $ressult['result']=$login[0];
         $ressult['message']='successfull';
         $ressult['status']='1';
         $json = $ressult;
     }

     header('Content-type:application/json');
     echo json_encode($json);

 }
 
 
 
 /***************get_provider_service *****************/
 public
 function get_provider_service()
 {  
    
    
   
     $user_id = $this->input->get_post('user_id', TRUE); 
     
     $fetch = $this->db->query("SELECT * FROM provider_services WHERE user_id = $user_id AND remove_status = 'No'")->result_array();

     if ($fetch){
      
      
        foreach($fetch as $val)
        {
         
                                     // $val['image']=SITE_URL.'uploads/images/'.$val['image'];

            $service_id = $val['id'];
            
            $login_image = $this->webservice_model->get_where('provider_service_image',['service_id'=>$service_id]);
            if($login_image){
                foreach($login_image as $val22)
                {
                    
                 
                 $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
                 $val['service_images'][]=$val22;
             }
             
         }else{
             $val['service_images']=[];
             
         }
         $data[] = $val;
     }      
     
     

     
     
     
     $result['result'] = $data;
     $result['message'] = 'successfull';
     $result['status'] = '1';
     $json = $result;
     
     
     
     
     
 }
 else
 {
    $result['result']=[];
    $result['message']='No Data Found';
    $result['status']='0';
    $json = $result; 
}

header('Content-type: application/json');
echo json_encode($json);
}



/***************get_provider_service_details *****************/
public
function get_provider_service_details()
{  
    
    
   
 $service_id = $this->input->get_post('service_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM provider_services WHERE id = $service_id ")->result_array();

 if ($fetch){
  
     
    
    $result['result'] = $fetch[0];
    $result['message'] = 'successfull';
    $result['status'] = '1';
    $json = $result;
    
    
    
    
    
}
else
{
    $result['result']=[];
    $result['message']='No Data Found';
    $result['status']='0';
    $json = $result; 
}

header('Content-type: application/json');
echo json_encode($json);
}


/************* provider_update_service function *************/
public function provider_update_service(){
  
  $arr_get = ['id'=>$this->input->get_post('service_id')];
  $service_id = $this->input->get_post('service_id', TRUE); 

  $login = $this->webservice_model->get_where('provider_services',$arr_get);
  if ($login[0]['id'] == "")
  {
    $ressult['result']='Data Not Found';
    $ressult['message']='unsuccessfull';
    $ressult['status']='0';
    $json = $ressult;

    header('Content-type:application/json');
    echo json_encode($json);
    die;
}

$arr_data = [
    'service_name'=>$this->input->get_post('service_name'),
    'description'=>$this->input->get_post('description'),
    'service_rate'=>$this->input->get_post('service_rate'),
    'working_time'=>$this->input->get_post('working_time'),
    'type'=>$this->input->get_post('type'),
    'cat_id'=>$this->input->get_post('cat_id'),
];




if (isset($_FILES['image']))
{
 $n = rand(0, 100000);
 $img = "USER_IMG_" . $n . '.png';
 move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
 $arr_data['image'] = $img;        
}





$res = $this->webservice_model->update_data('provider_services',$arr_data,$arr_get);
if ($res)
{
  $data[0] = $this->webservice_model->get_where('provider_services',$arr_get)[0];
  
  
  if (isset($_FILES['service_images']))
  {


     $service_images = $_FILES['service_images']['name'];
     
     $i=0;
     foreach($service_images AS $name){
         
       $n = rand(0, 100000);
                 $ext = 'png';//end(explode(".",$name));
                 $img = "SERVICE_IMG_" . date('Ymdhis') . '_' . $n . '.'.$ext;
                 move_uploaded_file($_FILES['service_images']['tmp_name'][$i], "uploads/images/" . $img);
                 
                 $img_data = ['service_id'=>$service_id,'image'=>$img];
                 $this->webservice_model->insert_data('provider_service_image',$img_data);
                 $i++;

             }
             
         }

         $ressult['result']=$data[0];
         $ressult['message']='successfull';
         $ressult['status']='1';
         $json = $ressult;
     }
     else
     {
      $ressult['result']='Data Not Found';
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;
  }

  header('Content-type: application/json');
  echo json_encode($json);



}



/************** provider_delete_service  ****************/
public function provider_delete_service(){

	$arr_whr = ['id'=>$this->input->get_post('service_id', TRUE)];

	$product = $this->webservice_model->get_where('provider_services', $arr_whr);
	

	if(!empty($product)){
       
	   // $this->webservice_model->delete_data('provider_services', $arr_whr);
      $this->webservice_model->update_data('provider_services', ['remove_status'=>'Yes'], $arr_whr);                   

      $ressult['result']='successfull';
      $ressult['message']='Delete Service successfully';
      $ressult['status']='1';
      $json = $ressult;
  }else{

      $ressult['result']='unsuccessfull';
      $ressult['message']='Data Not Found';
      $ressult['status']='0';
      $json = $ressult;
  }


  header('Content-type: application/json');
  echo json_encode($json);

}




/************* add_provider_image function *************/

public function add_provider_image(){

 $user_id = $this->input->get_post('user_id');
 
 
 if (isset($_FILES['provider_images']))
 {


     $provider_images = $_FILES['provider_images']['name'];
     
     $i=0;
     foreach($provider_images AS $name){
         
       $n = rand(0, 100000);
       $ext = end(explode(".",$name));
       $img = "PROVIDER_images_" . date('Ymdhis') . '_' . $n . '.'.$ext;
       move_uploaded_file($_FILES['provider_images']['tmp_name'][$i], "uploads/images/" . $img);
                /* if($i==0){
                   $arr_data = ['image'=> $img];
                   $res = $this->webservice_model->update_data('product', $arr_data, $arr_gets);                   
               }*/
               $img_data = ['user_id'=>$user_id,'image'=>$img];
               $this->webservice_model->insert_data('provider_images',$img_data);
               $i++;

           }
           
       }
       
       
      //  $login = $this->webservice_model->get_where('product',$arr_gets);       
      //  $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
      //  $ressult['result']=$login[0];
       $ressult['message']='successfull';
       $ressult['status']='1';
       $json = $ressult;
       

       header('Content-type:application/json');
       echo json_encode($json);

   }
   
   
   /************* get_provider_image_list *************/
   public

   function get_provider_image_list()
   {
       
    $user_id = $this->input->get_post('user_id');

    $list = $this->webservice_model->get_where('provider_images',['user_id'=>$user_id]);
    
    
    if ($list)
    {
        foreach($list as $val)
        {
            
          $val['image']=SITE_URL.'uploads/images/'.$val['image'];  
          $data[] = $val;
      }

      
      
      

      if(!isset($data)){
        
        $ressult['result']='Data Not Found';
        $ressult['message']='unsuccessful';
        $ressult['status']='0';
        $json = $ressult;
        header('Content-type: application/json');
        echo json_encode($json); die;
        
    }



    $ressult['result']=$data;
    $ressult['message']='successful';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']='Data Not Found';
  $ressult['message']='unsuccessful';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}






/************** delete_provider_image_new  ****************/
public function delete_provider_image_new(){

	$provider_image_name =$this->input->get_post('provider_image_id', TRUE);



	if(!empty($provider_image_name)){
       
       

      $fetch = $this->db->query("DELETE FROM provider_images WHERE id = '$provider_image_name'");
      
      

      $ressult['result']='successfull';
      $ressult['message']='Delete Images successfully';
      $ressult['status']='1';
      $json = $ressult;
  }else{

      $ressult['result']='unsuccessfull';
      $ressult['message']='Data Not Found';
      $ressult['status']='0';
      $json = $ressult;
  }


  header('Content-type: application/json');
  echo json_encode($json);

}



/************** delete_provider_image  ****************/
public function delete_provider_image(){

	$provider_image_name =$this->input->get_post('provider_image_name', TRUE);



	if(!empty($provider_image_name)){
       
       

      $fetch = $this->db->query("DELETE FROM provider_images WHERE image = '$provider_image_name'");
      
      

      $ressult['result']='successfull';
      $ressult['message']='Delete Images successfully';
      $ressult['status']='1';
      $json = $ressult;
  }else{

      $ressult['result']='unsuccessfull';
      $ressult['message']='Data Not Found';
      $ressult['status']='0';
      $json = $ressult;
  }


  header('Content-type: application/json');
  echo json_encode($json);

}



/*************  get_provider_notification_list *************/
public

function get_provider_notification_list()
{                     
   $user_id = $this->input->get_post('user_id', TRUE); 

   $this->db->order_by("id", "desc");
   
   $arr_get = ['type'=>'DRIVER'];
                           // $login = $this->db->query("SELECT * FROM notification where type = 'DRIVER' AND (user_id = '$user_id' OR user_id = '') order by id desc ")->result_array();
   $login = $this->db->query("SELECT * FROM notification WHERE `user_id` = '$user_id' AND type = 'DRIVER'  AND (`notification_type`= 'Bid' OR `notification_type`= 'Admin' OR `notification_type`= 'Offer' OR `notification_type`= 'Request' OR `notification_type`= 'Note') ORDER BY id desc")->result_array();

    //  $login = $this->webservice_model->get_where('notification',$arr_get);
   

   
   if ($login) {
      
            /*        $login_n = $this->db->query("SELECT * FROM notification WHERE `user_id` = '$user_id' AND type = 'DRIVER'  AND seen_status = 'UNSEEN'  ORDER BY id desc")->result_array();
 if($login_n){
           $seen_status =  $login_n[0]['seen_status'];
         if($seen_status == 'UNSEEN'){
                     $ressult1=$login_n[0];

         }else{
                     $ressult1=(object)[];

         }
      }else{
                     $ressult1=(object)[];

                 }*/
                 $this->db->query("UPDATE `notification` SET `seen_status`='SEEN' WHERE `user_id` = '$user_id' AND (`notification_type`= 'Bid' OR `notification_type`= 'Admin' OR `notification_type`= 'Offer' OR `notification_type`= 'Request' OR `notification_type`= 'Note')");

                 
                 foreach($login as  $val)
                 {   
                     
                  $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
                  
                  $val['date_time']= $date_time;  
                  
                  $data[] = $val;

              }
              
              
                         // $ressult['unseen_notification']=(object)[];
              
              $ressult['result']=$data;
              $ressult['message']='successful';
              $ressult['status']='1';
              $json = $ressult;                      
              

          }
          else {
                         // $ressult['unseen_notification']=(object)[];
              
              $ressult['result']=[];
              $ressult['message']='unsuccessful';
              $ressult['status']='0';
              $json = $ressult;
          }

          header('Content-type: application/json');
          echo json_encode($json);

      }
      
      
      
      /************* add_provider_rating_review function *************/

      public function add_provider_rating_review(){


        $request_id = $this->input->get_post('request_id');
        $form_id = $this->input->get_post('form_id');
        $to_id = $this->input->get_post('to_id');

        date_default_timezone_set('America/New_York');
        $date_time =  date('Y-m-d H:i:s');
        

        $arr_data = [
            'form_id'=>$this->input->get_post('form_id'),
            'to_id'=>$this->input->get_post('to_id'),
            'request_id'=>$this->input->get_post('request_id'),
            'rating'=>$this->input->get_post('rating'),
            'feedback'=>$this->input->get_post('feedback'),
            'type'=>'USER',
            'date_time'=>$date_time,
        ];
        
        


        $id = $this->webservice_model->insert_data('rating_review',$arr_data);


        if ($id=="") {

            $json = ['result'=>(object)[],'status'=>0,'message'=>'data not found'];

        }else{




            $arr_gets = ['id' => $id];
            
            
            $login = $this->webservice_model->get_where('rating_review',$arr_gets); 
            
            
            
     //////

            $user_s = $this->webservice_model->get_where('users', ['id'=>$form_id]);
            $user_r = $this->webservice_model->get_where('users', ['id'=>$to_id]);

            $user_message_apk = array(
                "message" => array(
                  "result" => "successful",
                  "key" => "submitted rating review",
                  "user_id" => $form_id,
                  "provider_id" =>$to_id,
                  "user_name" => $user_s[0]['first_name'].' '.$user_s[0]['last_name'],
                  "request_id" => $request_id
              )
            );
            $key_ios = "You have been rated by user ".$user_s[0]['first_name'].' '.$user_s[0]['last_name'];

            $user_message_apk_ios = array(
                "message" => array(
                  "result" => "successful",
                  "key" => "submitted rating review",
                  "ios_status" =>"submitted rating review",
                  "title" => $key_ios,
                  "message" => "submitted rating review",
                  "user_id" => $form_id,
                  "provider_id" =>$to_id,
                  "category_name" => '',
                  "user_name" => $user_s[0]['first_name'].' '.$user_s[0]['last_name'],
                  "receiver_id" => '',
                  "request_id" => $request_id
              )
            );

            $register_userid = array($user_r[0]['register_id']);

            $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
            $this->webservice_model->ios_provider_notification_new($user_r[0]['ios_register_id'],$user_message_apk_ios['message']);

            

//////

            
            $ressult['result']=$login[0];
            $ressult['message']='successfull';
            $ressult['status']='1';
            $json = $ressult;
        }

        header('Content-type:application/json');
        echo json_encode($json);

    }
    
    
    
    
    /************* add_user_rating_review function *************/

    public function add_user_rating_review(){


        $request_id = $this->input->get_post('request_id');
        $status = 'Finish';
        $request_id = $this->input->get_post('request_id');
        $form_id = $this->input->get_post('form_id');
        $to_id = $this->input->get_post('to_id');


        date_default_timezone_set('America/New_York');
        $date_time =  date('Y-m-d H:i:s');
        
        
        $arr_data = [
            'form_id'=>$this->input->get_post('form_id'),
            'to_id'=>$this->input->get_post('to_id'),
            'request_id'=>$this->input->get_post('request_id'),
            'rating'=>$this->input->get_post('rating'),
            'feedback'=>$this->input->get_post('feedback'),
            'type'=>'PROVIDER',
            'date_time'=>$date_time,
        ];
        
        


        $id = $this->webservice_model->insert_data('rating_review',$arr_data);


        if ($id=="") {

            $json = ['result'=>(object)[],'status'=>0,'message'=>'data not found'];

        }else{




            $arr_gets = ['id' => $id];
            
            
            $login = $this->webservice_model->get_where('rating_review',$arr_gets);   
            
            
            
     //////

            $user_s = $this->webservice_model->get_where('users', ['id'=>$form_id]);
            $user_r = $this->webservice_model->get_where('users', ['id'=>$to_id]);

            $user_message_apk = array(
                "message" => array(
                  "result" => "successful",
                  "key" => "submitted rating review",
                  "user_id" => $to_id,
                  "provider_id" =>$form_id,
                  "user_name" => $user_s[0]['store_name'],
                  "request_id" => $request_id,
              )
            );
            
            $key_ios = "You have been rated by provider ".$user_s[0]['store_name'];
            $user_message_apk_ios = array(
                "message" => array(
                  "result" => "successful",
                  "key" => "submitted rating review",
                  "ios_status" =>"submitted rating review",
                  "title" => $key_ios,
                  "message" => "submitted rating review",
                  "user_id" => $form_id,
                  "provider_id" =>$to_id,
                  "category_name" => '',
                  "user_name" =>  $user_s[0]['store_name'],
                  "receiver_id" => '',
                  "request_id" => $request_id
              )
            );
            

            $register_userid = array($user_r[0]['register_id']);

            $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
            $this->webservice_model->ios_user_notification_new($user_r[0]['ios_register_id'],$user_message_apk_ios['message']);
            

//////


            $ressult['result']=$login[0];
            $ressult['message']='successfull';
            $ressult['status']='1';
            $json = $ressult;
        }

        header('Content-type:application/json');
        echo json_encode($json);

    }
    
    
    /***************get_rating_review *****************/
    public
    function get_rating_review()
    {  
     $user_id = $this->input->get_post('user_id', TRUE); 
     
     $fetch = $this->db->query("SELECT * FROM rating_review WHERE to_id = $user_id order by id desc")->result_array();


     if ($fetch){
      
        foreach($fetch as $val)
        {
           
         $where = ['id'=>$val['form_id']];
         $login = $this->webservice_model->get_where('users',$where);
         
         $login[0]['store_logo']=SITE_URL.'uploads/images/'.$login[0]['store_logo'];
         $login[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login[0]['store_cover_image'];
         $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
         $val['form_details']=$login[0];
         
         $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
         $val['date_time'] = $date_time;
         $ressult1[]=$val;
     }
     $data['result']=$ressult1;
     $data['message']='successfull';
     $data['status']='1';
     $json = $data;
 }
 else
 {
    $data['result']=[];
    $data['message']='unsuccessfull';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}






/************* place_bid function *************/

public function place_bid(){


  


   $arr_data = [
    'provider_id'=>$this->input->get_post('provider_id'),
    'request_id'=>$this->input->get_post('request_id'),
    'request_user_id'=>$this->input->get_post('request_user_id'),
    'amount'=>$this->input->get_post('amount')
];


$arr_get = ['request_id' => $arr_data['request_id'],'provider_id' => $arr_data['provider_id']];

$login = $this->webservice_model->get_where('place_bid',$arr_get);
if ($login) {
    
    $ressult['result']='your Offer already exist';
    $ressult['message']='your Offer already exist';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}     






$id = $this->webservice_model->insert_data('place_bid',$arr_data);

if ($id=="") {
    $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'data not found'];
}else{
  
 
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('place_bid',$arr_gets);  
    

    
    
//////

    $user_r = $this->webservice_model->get_where('users', ['id'=>$login[0]['request_user_id']]);
    $user_s = $this->webservice_model->get_where('users', ['id'=>$login[0]['provider_id']]);
    $product_details = $this->webservice_model->get_where('user_request', ['id'=>$login[0]['request_id']]);

    $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => "New bid",
          "alert" => "New bid",
          "message"=>$user_s[0]['first_name']." send you offer for your request",
          "user_id" => $user_s[0]['id'],
          "request_id"=>$login[0]['request_id'],
          "user_name" => $user_s[0]['first_name'],
          "userimage" => SITE_URL . "uploads/images/" . $user_s[0]['image'],
          "bid_id" => $login[0]['id']
      )
    );

    $register_userid = array($user_r[0]['register_id']);

    $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);

//////

    $arr_data_noti = [
        'user_id'=>$user_r[0]['id'],
        'request_id'=>$login[0]['request_id'],
        'title'=>"New bid",
        'message'=>$user_s[0]['first_name']." send you offer for your request",
        'type'=>'USER',
        'notification_type'=>'Bid'
    ];
    
    $this->webservice_model->insert_data('notification',$arr_data_noti);


    
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}

header('Content-type:application/json');
echo json_encode($json);

}



/************* update_place_bid function *************/

public function update_place_bid(){

  $arr_get = ['id'=>$this->input->get_post('place_bid_id')];

  $login = $this->webservice_model->get_where('place_bid',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']='Data Not Found';
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }

  $arr_data = [
    'amount'=>$this->input->get_post('amount'),
];





//////

$user_r = $this->webservice_model->get_where('users', ['id'=>$login[0]['request_user_id']]);
$user_s = $this->webservice_model->get_where('users', ['id'=>$login[0]['provider_id']]);
$product_details = $this->webservice_model->get_where('user_request', ['id'=>$login[0]['request_id']]);

$user_message_apk = array(
    "message" => array(
      "result" => "successful",
      "key" => "New bid",
      "alert" => "New bid",
      "message"=>$user_s[0]['first_name']." send you offer for your request",
      "user_id" => $user_s[0]['id'],
      "request_id"=>$login[0]['request_id'],
      "user_name" => $user_s[0]['first_name'],
      "userimage" => SITE_URL . "uploads/images/" . $user_s[0]['image'],
      "bid_id" => $login[0]['id']
  )
);

$register_userid = array($user_r[0]['register_id']);

$this->webservice_model->user_apk_notification($register_userid, $user_message_apk);

//////

$arr_get = ['id'=>$this->input->get_post('place_bid_id')];

$res = $this->webservice_model->update_data('place_bid',$arr_data,$arr_get);
if ($res)
   
{
    $data = $this->webservice_model->get_where('place_bid',$arr_get);

    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']='Data Not Found';
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}




/************* get_bid_place_list function *************/


public function get_bid_place_list()
{
 
   
 $request_id = $this->input->get_post('request_id', TRUE); 

 $bid_list = $this->db->query("SELECT * FROM place_bid WHERE request_id = '$request_id'")->result_array();

 if($bid_list){
    
     foreach($bid_list as $val)
     {
       
       $user_details= $this->webservice_model->get_where('users',['id'=>$val['provider_id']]);
       if($user_details){
         $user_details[0]['image']=SITE_URL.'uploads/images/'.$user_details[0]['image'];
         
         $val['provider_details']=$user_details[0];
     }else{
       $val['provider_details']=(object)[];
       
   }
   
   
   $data[] = $val;
   
}

$json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
}
else
{
 $json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
}

header('Content-type: application/json');
echo json_encode($json);
}




/************* offer_accept_by_user function *************/

public function offer_accept_by_user(){

  $arr_get = ['id'=>$this->input->get_post('request_id')];

  $request_id = $this->input->get_post('request_id', TRUE); 

  $offer_amount = $this->input->get_post('offer_amount', TRUE); 

  $bid_id = $this->input->get_post('bid_id', TRUE); 

  $provider_id = $this->input->get_post('provider_id', TRUE); 
  
  
  
  $login = $this->webservice_model->get_where('user_request',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']='Data Not Found';
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }
  



  
  $arr_data = [
    'status'=>'Accept',
    'offer_amount'=>$this->input->get_post('offer_amount'),
    'total_amount'=>$this->input->get_post('offer_amount'),
    'bid_id'=>$this->input->get_post('bid_id'),
    'accepted_provider_id'=>$this->input->get_post('provider_id'),
    
];





$arr_get1 = ['id'=>$login[0]['user_id']];

$user_s = $this->webservice_model->get_where('users',$arr_get1);

$arr_get2 = ['id'=>$provider_id];

$user_r = $this->webservice_model->get_where('users',$arr_get2);


                      // send notification for Andriod


$key = "Your offer accepted by user";
$user_message_apk = array(
    "message" => array(
      "result" => "successful",
      "key" => $key,
      "alert" => $key,
      "message"=>$user_s[0]['first_name']." accepted your offer",
      "user_id" => $user_s[0]['id'],
      "request_id"=>$request_id,
      "user_name" => $user_s[0]['first_name'],
      "userimage" => SITE_URL . "uploads/images/" . $user_s[0]['image'],
      "bid_id" => $bid_id
  )
);

$register_userid = array($user_r[0]['register_id']);

$this->webservice_model->user_apk_notification($register_userid, $user_message_apk);

//////

$arr_data_noti = [
    'user_id'=>$user_r[0]['id'],
    'request_id'=>$request_id,
    'title'=>"Offer Accepted",
    'message'=>$user_s[0]['first_name']." accepted your offer",
    'notification_type'=>'Bid',
    'type'=>'DRIVER'
];

$this->webservice_model->insert_data('notification',$arr_data_noti);



              // end send notification for Andriod   




$res = $this->webservice_model->update_data('user_request',$arr_data,$arr_get);
if ($res)
{


    $arr_get1 = ['id'=>$this->input->get_post('request_id')];
    $data = $this->webservice_model->get_where('user_request',$arr_get1);

    
    $this->webservice_model->update_data('place_bid',['status'=>'Accept'],['id'=>$bid_id]);

    
    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']='Data Not Found';
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}





/*************provider_update_available_status function *************/

public function provider_update_available_status(){

  $arr_get = ['id'=>$this->input->get_post('provider_id')];

  $login = $this->webservice_model->get_where('users',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['available_status']='';
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }

  

  $arr_data = [
    'available_status'=>$this->input->get_post('available_status')
    
];



$res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
if ($res)
{
    $data = $this->webservice_model->get_where('users',$arr_get);
    
    
    $ressult['result']=$data[0];
    $ressult['available_status']=$data[0]['available_status'];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['available_status']='';
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}






/*************  add_book_appointment *************/

public function add_book_appointment(){



    $request_for = $this->input->get_post('request_for',TRUE);
    $total_amount = $this->input->get_post('total_amount',TRUE);
    $payment_type = $this->input->get_post('payment_type');
    $lon = $this->input->get_post('lon');
    $lat = $this->input->get_post('lat');
    $address = $this->input->get_post('address');
    $user_id = $this->input->get_post('user_id');
    $provider_id = $this->input->get_post('provider_id');
    $date = $this->input->get_post('date');
    $time = $this->input->get_post('time');

    $cost = $this->input->get_post('cost', TRUE);
    if($cost){
       
       $cost = $cost;
   }else{
       $cost =  '';
       
   }
   
   
   $time_zone = $this->input->get_post('timezone', TRUE);
   if($time_zone){
       date_default_timezone_set($time_zone );
       $date_time =  date('Y-m-d H:i:s');
   }else{
       $date_time =  date('Y-m-d H:i:s');
       
   }
   $date_time_two_hr = strtotime("+60 minutes", strtotime($date_time));
   $date_time_two_hr =  date('Y-m-d H:i:s', $date_time_two_hr);

/*


        //$new_time =  date('H:i');
        
        
        $new_time_hr = strtotime("-60 minutes", strtotime($time));
        $new_time_hr =  date('H:i', $new_time_hr);
  
  

// 24-hour time to 12-hour time 
$time_in_12_hour_format  = date("g:i a", strtotime("$time"));


 $current_time = $time;
 $day_name =  date("l",strtotime($date)); 


   
  $current_time_with10 = strtotime("+10 minutes", strtotime($current_time));
  $current_time_with10 =  date('H:i', $current_time_with10);

*/

  
  
  
  
  
  
  if($payment_type == 'Cash'){
    $payment_status = 'Complete';
}else{
    $payment_status = 'Pending';
    
}


$get_place_order = $this->db->query("select * from user_request order by id desc")->result_array();
if($get_place_order){
    $unique_code = $get_place_order[0]['id'] + 1;

}else{
    $unique_code = 1;

}$type = "";
if($type == 'IOS'){
    $unique_code = '1-00'.$unique_code;
}else{
 $unique_code = '2-00'.$unique_code;
 
}


$timezone = $this->input->get_post('timezone', TRUE);
if($timezone){
    
    date_default_timezone_set("$timezone");
    $date_time = date('Y-m-d H:i:s');

    $selectedTime = $date_time;
    $date_time_last = strtotime("+60 minutes", strtotime($selectedTime));
    $date_time_last =  date('Y-m-d H:i:s', $date_time_last);
    
    
    
}else{
   date_default_timezone_set("Asia/Kolkata");
   $date_time = date('Y-m-d H:i:s');

   $selectedTime = $date_time;
   $date_time_last = strtotime("+60 minutes", strtotime($selectedTime));
   $date_time_last =  date('Y-m-d H:i:s', $date_time_last);

   
}

if($provider_id){

    if($request_for == 'Space'){
        
        $arr_data = [
            'user_id'=>$this->input->get_post('user_id'),
            'provider_id'=>$this->input->get_post('provider_id'),
            'accepted_provider_id'=>$this->input->get_post('provider_id'),
            'service_id'=>$this->input->get_post('service_id'),
            'service_name'=>$this->input->get_post('service_name'),
            'price'=>$this->input->get_post('price'),
            'total_amount'=>$this->input->get_post('total_amount'),
            'date'=>$this->input->get_post('date'),
            'time'=>$this->input->get_post('time'),
            'cost'=>$cost,
            'address'=>$this->input->get_post('address'),
            'address_id'=>$this->input->get_post('address_id'),
            'lat'=>$this->input->get_post('lat'),
            'lon'=>$this->input->get_post('lon'),
            'exam_status'=>$this->input->get_post('exam_status'),
            'request_for'=>$this->input->get_post('request_for'),
            'request_type'=>$this->input->get_post('request_type'),
            'description'=>$this->input->get_post('description'),
            'timezone'=>$this->input->get_post('timezone'),
            'date_time_two_hr'=>$date_time_two_hr,
            'date_time'=>$date_time,
            'payment_status'=>$payment_status,
            'unique_code'=>$unique_code,
            'payment_type'=>$this->input->get_post('payment_type')
        ];
        
        
    }else{

       $arr_data = [
        'user_id'=>$this->input->get_post('user_id'),
        'provider_id'=>$this->input->get_post('provider_id'),
        'accepted_provider_id'=>$this->input->get_post('provider_id'),
        'service_id'=>$this->input->get_post('service_id'),
        'service_name'=>$this->input->get_post('service_name'),
        'price'=>$this->input->get_post('price'),
        'address'=>$this->input->get_post('address'),
        'address_id'=>$this->input->get_post('address_id'),
        'lat'=>$this->input->get_post('lat'),
        'lon'=>$this->input->get_post('lon'),
        'cost'=>$cost,
        'total_amount'=>$this->input->get_post('total_amount'),
        'date'=>$this->input->get_post('date'),
        'time'=>$this->input->get_post('time'),
        'request_type'=>$this->input->get_post('request_type'),
        'description'=>$this->input->get_post('description'),
        'timezone'=>$this->input->get_post('timezone'),
        'date_time_two_hr'=>$date_time_two_hr,
        'date_time'=>$date_time,
        'payment_status'=>$payment_status,
        'unique_code'=>$unique_code,
        'payment_type'=>$this->input->get_post('payment_type')
    ];
    
    
}
$id = $this->webservice_model->insert_data('user_request',$arr_data);

if ($id=="") {
    $json = ['result'=>'unsuccessfull','status'=>0,'message'=>'data not found'];
}else{
  
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('user_request',$arr_gets); 
    
        /////////
    
    $service_id = $this->input->get_post('service_id');
    $service_name = $this->input->get_post('service_name');
    $price = $this->input->get_post('price');
    if($service_id){
        $service_id = (explode(",",$service_id));
        $service_name = (explode(",",$service_name));
        $price = (explode(",",$price));
                         //  print_r($service_id);
        $i = 0;
        foreach($service_id as $val_s)
        {
            
           $arr_data1 = [
            'request_id'=>$login[0]['id'],
            'extra_service_id'=>$val_s,
            'extra_service_name'=>$service_name[$i],
            'extra_service_price'=>$price[$i],
        ];
        
        $this->webservice_model->insert_data('user_request_extra_service',$arr_data1);

        $i++;
    }
}         	  
        ////////


$request_id = $login[0]['id'];


if (isset($_FILES['request_images']))
{


 $request_images = $_FILES['request_images']['name'];
 
 $i=0;
 foreach($request_images AS $name){
     
   $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
   $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
   move_uploaded_file($_FILES['request_images']['tmp_name'][$i], "uploads/images/" . $img);
                /* if($i==0){
                   $arr_data = ['image'=> $img];
                   $res = $this->webservice_model->update_data('product', $arr_data, $arr_gets);                   
               }*/
               $img_data = ['request_id'=>$request_id,'image'=>$img];
               $this->webservice_model->insert_data('user_request_images',$img_data);
               $i++;

           }
           
       }
       $provider_id = (explode(",",$provider_id));
       
       $i = 0;
       foreach($provider_id as $val_p)
       {
         $login_user = $this->webservice_model->get_where('users',['id'=>$user_id]); 
         $login_provider = $this->webservice_model->get_where('users',['id'=>$val_p]); 

         $key ="New booking request";
                             // send notification for Andriod
         date_default_timezone_set('America/New_York');
         $date_time =  date('Y-m-d H:i:s');
         
         
         $user_message_apk = array(
           "message" => array(
               "result" => "successful",
               "key" => $key,
               "title" =>$key,
               "alert" =>  $key,
               "message"=>$key,
               "pickup_lat" => $lat,
               "pickup_lon" => $lon,
               "pick_address" => $address,
               "user_id" => $user_id,
               "request_id" => $request_id,
               "status" => 'Pending',
               "user_name" => $login_user[0]['first_name'].' '.$login_user[0]['last_name'],
               "unique_code" => $unique_code,
               "date"=> $date_time
           )
       );
         
         $key_ios = "New order request by ".$login_user[0]['first_name'].' '.$login_user[0]['last_name'];
         $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => $key,
              "ios_status" =>$key,
              "title" =>$key_ios,
              "message" => $key,
              "pickup_lat" => $lat,
              "pickup_lon" => $lon,
              "pick_address" => $address,
              "user_id" => $user_id,
              "request_id" => $request_id,
              "status" => 'Pending',
              "user_name" => $login_user[0]['first_name'].' '.$login_user[0]['last_name'],
              "unique_code" => $unique_code,
              "provider_id" =>'',
              "category_name" => '',
              "receiver_id" => '',
          )
        );
         
         $register_userid = array($login_provider[0]['register_id']);
         $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
         $this->webservice_model->ios_provider_notification_new($login_provider[0]['ios_register_id'],$user_message_apk_ios['message']);

                        // end send notification for Andriod    
         
         
         $arr_data_noti = [
            'user_id'=>$this->input->get_post('provider_id'),
            'request_id'=>$request_id,
            'title'=>"New Request",
            'type'=>"DRIVER",
            'message'=>$login_user[0]['first_name'].' '.$login_user[0]['last_name']." Sent new request",
            'notification_type'=>'Request',
            'date_time'=>$date_time,
        ];

        $this->webservice_model->insert_data('notification',$arr_data_noti);

    }
    
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
    header('Content-type:application/json');
    echo json_encode($json); die;
}


}else{
    
 $arr_data = [
    'user_id'=>$this->input->get_post('user_id'),
    'service_id'=>$this->input->get_post('service_id'),
    'address'=>$this->input->get_post('address'),
    'address_id'=>$this->input->get_post('address_id'),
    'lat'=>$this->input->get_post('lat'),
    'lon'=>$this->input->get_post('lon'),
    'service_name'=>$this->input->get_post('service_name'),
    'price'=>$this->input->get_post('price'),
    'cost'=>$cost,
    'total_amount'=>$this->input->get_post('total_amount'),
    'date'=>$this->input->get_post('date'),
    'time'=>$this->input->get_post('time'),
    'request_type'=>$this->input->get_post('request_type'),
    'description'=>$this->input->get_post('description'),
    'timezone'=>$this->input->get_post('timezone'),
    'date_time_two_hr'=>$date_time_two_hr,
    'date_time'=>$date_time,
    'payment_status'=>$payment_status,
    'unique_code'=>$unique_code,
    'payment_type'=>$this->input->get_post('payment_type')
];


$request_id = $this->webservice_model->insert_data('user_request', $arr_data); 




if (isset($_FILES['request_images']))
{


 $request_images = $_FILES['request_images']['name'];
 
 $i=0;
 foreach($request_images AS $name){
     
   $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
   $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
   move_uploaded_file($_FILES['request_images']['tmp_name'][$i], "uploads/images/" . $img);
   
   $img_data = ['request_id'=>$request_id,'image'=>$img];
   $this->webservice_model->insert_data('user_request_images',$img_data);
   $i++;

}

}


$fetch = $this->db->query("SELECT * FROM users WHERE type = 'PROVIDER'")->result_array();

if($fetch)
{

   $i = 0; $ids = '';

   foreach($fetch as $val)
   {
       
    if($ids == ''){
        $ids = $val['id'];
    }else{

       $ids = $ids.','.$val['id'];
   }

   $val['result'] = "successful";
   $json[] = $val;
   $i++;
   $provider_id = $val['id'];
   $login_user = $this->webservice_model->get_where('users',['id'=>$user_id]); 
   $login_provider = $this->webservice_model->get_where('users',['id'=>$provider_id]); 

   $key ="New booking request";
                             // send notification for Andriod
   date_default_timezone_set('America/New_York');
   $date_time =  date('Y-m-d H:i:s');
   
   
   $user_message_apk = array(
       "message" => array(
           "result" => "successful",
           "key" => $key,
           "title" =>$key,
           "alert" =>  $key,
           "message"=>$key,
           "pickup_lat" => $lat,
           "pickup_lon" => $lon,
           "pick_address" => $address,
           "user_id" => $user_id,
           "request_id" => $request_id,
           "status" => 'Pending',
           "user_name" => $login_user[0]['first_name'].' '.$login_user[0]['last_name'],
           "unique_code" => $unique_code,
           "date"=> $date_time
       )
   );
   
   $key_ios = "New order request by ".$login_user[0]['first_name'].' '.$login_user[0]['last_name'];
   $user_message_apk_ios = array(
    "message" => array(
      "result" => "successful",
      "key" => $key,
      "ios_status" =>$key,
      "title" =>$key_ios,
      "message" => $key,
      "pickup_lat" => $lat,
      "pickup_lon" => $lon,
      "pick_address" => $address,
      "user_id" => $user_id,
      "request_id" => $request_id,
      "status" => 'Pending',
      "user_name" => $login_user[0]['first_name'].' '.$login_user[0]['last_name'],
      "unique_code" => $unique_code,
      "provider_id" =>'',
      "category_name" => '',
      "receiver_id" => '',
  )
);
   
   $register_userid = array($login_provider[0]['register_id']);
   $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
   $this->webservice_model->ios_provider_notification_new($login_provider[0]['ios_register_id'],$user_message_apk_ios['message']);

                        // end send notification for Andriod    
   
   
   $arr_data_noti = [
    'user_id'=>$provider_id,
    'request_id'=>$request_id,
    'title'=>"New Request",
    'type'=>"DRIVER",
    'message'=>$login_user[0]['first_name'].' '.$login_user[0]['last_name']." Sent new request",
    'notification_type'=>'Request',
    'date_time'=>$date_time,
];

$this->webservice_model->insert_data('notification',$arr_data_noti);



}



        /////////

$service_id = $this->input->get_post('service_id');
$service_name = $this->input->get_post('service_name');
$price = $this->input->get_post('price');

$service_id = (explode(",",$service_id));
$service_name = (explode(",",$service_name));
$price = (explode(",",$price));

$i = 0;
foreach($service_id as $val_s)
{
    
   $arr_data1 = [
    'request_id'=>$request_id,
    'extra_service_id'=>$val_s,
    'extra_service_name'=>$service_name[$i],
    'extra_service_price'=>$price[$i],
];

$this->webservice_model->insert_data('user_request_extra_service',$arr_data1);

$i++;
}

        ////////



$arr_data['provider_id'] = $ids;

$id = $this->webservice_model->update_data('user_request', $arr_data, ['id'=>$request_id]);
}else{
 $arr_data['provider_id'] = '';

 $id = $this->webservice_model->update_data('user_request', $arr_data, ['id'=>$request_id]);
 
}




$arr_gets = ['id'=>$request_id];
$login = $this->webservice_model->get_where('user_request',$arr_gets);       
$ressult['result']=$login[0];
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
header('Content-type:application/json');
echo json_encode($json);
die;


}









header('Content-type:application/json');
echo json_encode($json); die;

}




/************* add_user_address *************/

public

function add_user_address()
{
  $arr_data = array(
     'user_id' => $this->input->get_post('user_id', TRUE) ,
     'address' => $this->input->get_post('address', TRUE) ,
     'lat' => $this->input->get_post('lat', TRUE) ,
     'lon' => $this->input->get_post('lon', TRUE) ,
     'cost' => $this->input->get_post('cost', TRUE) ,
     'rentstatus' => $this->input->get_post('rentstatus', TRUE) ,
     'patientrentstatus' => $this->input->get_post('patientrentstatus', TRUE) ,
		//	'addresstype' => $this->input->get_post('addresstype', TRUE)
 );


 /* $user_id = $this->input->get_post('user_id', TRUE);


  $address = $this->input->get_post('address', TRUE);


      $arr_get = ['user_id' => $user_id,'address' => $address];

      $login = $this->webservice_model->get_where('user_address',$arr_get);
      if ($login) {
        
        $ressult['result']=(object)[];
        $ressult['message']='address already exist';
        $ressult['status']='0';
        $json = $ressult;
                               
        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }     */
    

    $id = $this->webservice_model->insert_data('user_address',$arr_data);

    if ($id=="") {
        $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'data not found'];
    }else{
        $arr_gets = ['id'=>$id];
        $login = $this->webservice_model->get_where('user_address',$arr_gets);       
        $ressult['result']=$login[0];
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
    }

    header('Content-type:application/json');
    echo json_encode($json);

}





/************* update_user_address function *************/

public function update_user_address(){

  $arr_get = ['id'=>$this->input->get_post('addressid')];

  $login = $this->webservice_model->get_where('user_address',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }



  $arr_data = array(
     'address' => $this->input->get_post('address', TRUE) ,
     'lat' => $this->input->get_post('lat', TRUE) ,
     'lon' => $this->input->get_post('lon', TRUE) ,
     'cost' => $this->input->get_post('cost', TRUE) ,
     'rentstatus' => $this->input->get_post('rentstatus', TRUE) ,
     'patientrentstatus' => $this->input->get_post('patientrentstatus', TRUE) ,
		//	'villa_no' => $this->input->get_post('villa_no', TRUE) ,
		//	'addresstype' => $this->input->get_post('addresstype', TRUE)
 );

  


  
  

  $res = $this->webservice_model->update_data('user_address',$arr_data,$arr_get);
  if ($res)
  {
    $data = $this->webservice_model->get_where('user_address',$arr_get);

    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}


/*************  get_user_address_patient function *************/
public function get_user_address_patient()
{
   $user_id= $this->input->get_post('user_id'); 
   $user_address = $this->webservice_model->get_where('user_address',['user_id'=>$user_id,'patientrentstatus'=>'Yes']);
   
   if ($user_address)
   {
     foreach($user_address as $val)
     {

      
         $data[] = $val;
         
     }    
     $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
 }
 else
 {
     $json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
 }
 
 header('Content-type: application/json');
 echo json_encode($json);
}


/*************  get_user_address function *************/
public function get_user_address()
{
   $user_id= $this->input->get_post('user_id'); 
   $user_address = $this->webservice_model->get_where('user_address',['user_id'=>$user_id]);
   
   if ($user_address)
   {
     foreach($user_address as $val)
     {

      
         $data[] = $val;
         
     }    
     $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
 }
 else
 {
     $json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
 }
 
 header('Content-type: application/json');
 echo json_encode($json);
}



/*************  get_user_address1 function *************/
public function get_user_address1()
{
   $c_date = date('Y-m-d');

   $user_id= $this->input->get_post('user_id'); 
   $type= $this->input->get_post('type'); 
   
   $user_address = $this->db->query("SELECT * FROM user_address WHERE  user_id = '$user_id' AND  (rentstatus = '$type' OR rentstatus = 'Both')")->result_array();

	   // $user_address = $this->webservice_model->get_where('user_address',['user_id'=>$user_id,'rentstatus'=>$type]);
   
   if ($user_address)
   {
     foreach($user_address as $val)
     {

      
         $data[] = $val;
         
     }    
     $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
 }
 else
 {
     $json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
 }
 
 header('Content-type: application/json');
 echo json_encode($json);
}


/*************  get_user_address2 function *************/
public function get_user_address2()
{
    $c_date = date('Y-m-d');
    $user_id= $this->input->get_post('user_id'); 
    $type= $this->input->get_post('type'); 
    
    $user_address = $this->db->query("SELECT * FROM user_request WHERE  address_id != '0' AND date >= '$c_date' AND user_id = '$user_id' AND status = 'Accept' group by address_id")->result_array();

    
    if ($user_address)
    {
     foreach($user_address as $val)
     {
      $user_address1 = $this->webservice_model->get_where('user_address',['id'=>$val['address_id']]);

      
      $data[] = $user_address1[0];
      
  }    
  $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
}
else
{
 $json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
}

header('Content-type: application/json');
echo json_encode($json);
}

/************** delete_user_address ****************/
public function delete_user_address(){
   
  $id = $this->input->get_post('address_id');
  $list = $this->webservice_model->get_where('user_address',['id'=>$id]);

  if ($list)
  {
    $this->webservice_model->delete_data('user_address',['id'=>$id]);

    $address_id = $this->input->get_post('address_id');
    $check = $this->webservice_model->get_where('users',['address_id'=>$address_id]);
    
    
    if($check){
        $u_id = $check[0]['id'];
        $arr_data = [
         'address'=>'',
         'lat'=>'0.0',
         'lon'=>'0.0',
         'address_id'=>'',
         'addresstype'=>'',
     ];

     

     $res = $this->webservice_model->update_data('users',$arr_data,['id'=>$u_id]);
 }
 
 $ressult['result']="delete successfull";
 $ressult['message']='successful';
 $ressult['status']='1';
 $json = $ressult;
 header('Content-type: application/json');
 echo json_encode($json);die;
}
else
{
  $ressult['result']='Data Not Found';
  $ressult['message']='unsuccessful';
  $ressult['status']='0';
  $json = $ressult;      
  header('Content-type: application/json');
  echo json_encode($json);die;                        
  
}



header('Content-type: application/json');
echo json_encode($json);
}


/*************  offer_list *************/
public

function offer_list()
    {//2020-03-30
        $c_date = date('Y-m-d');
        $user_id = $this->input->get_post('user_id');

        $fetch = $this->db->query("SELECT * FROM coupons WHERE  user_id = '$user_id' AND end_date >= '$c_date' order by id desc")->result_array();

    //$fetch = $this->webservice_model->get_all('coupons');
        if ($fetch)
        {
          foreach($fetch as $val)
          {
            
             
            
            
           $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
           
           $val['date_time']= $date_time;                            
           $val['image']=SITE_URL.'uploads/images/'.$val['image'];
           $data[] = $val;
       }

       $ressult['result'] = $data;
       $ressult['message'] = 'successful';
       $ressult['status'] = '1';
       $json = $ressult;
   }
   else
   {
       $ressult['result'] = [];
       $ressult['message'] = 'unsuccessful';
       $ressult['status'] = '0';
       $json = $ressult;
   }

   header('Content-type: application/json');
   echo json_encode($json);
}




/************* user_offer_seen_status function *************/

public function user_offer_seen_status(){

  $arr_get = ['user_id'=>$this->input->get_post('user_id')];

  $login = $this->webservice_model->get_where('coupons',$arr_get);
  if ($login)
  {
      
      
    $arr_data = [
     'seen_status'=>'Yes',
 ];

 
 $res = $this->webservice_model->update_data('coupons',$arr_data,$arr_get);
 if ($res)
 {
    
    $ressult['result']='successfull';
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']='unsuccessfull';
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}


$ressult['result']='unsuccessfull';
$ressult['message']='unsuccessfull';
$ressult['status']='0';
$json = $ressult;

header('Content-type:application/json');
echo json_encode($json);
die;
}else{
  
  
  $ressult['result']='unsuccessfull';
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;

  header('Content-type: application/json');
  echo json_encode($json);

  
}









}







/************* apply_offer function *************/

public function apply_offer(){

 $offer_code = $this->input->get_post('offer_code');
 $user_id = $this->input->get_post('user_id');
 $amount = $this->input->get_post('amount');
 $cu_date = date("Y-m-d");
 $arr_get = ['code' => $offer_code];
 $this->db->order_by("id", "desc");

 $login = $this->webservice_model->get_where('coupons',$arr_get);
 if ($login) {
    $arr_get_check = ['user_id' => $user_id,'offer_id' => $login[0]['id']];

    $login_check = $this->webservice_model->get_where('user_request',$arr_get_check);
    if($login_check){
        $ressult['result']='you already used this offer';
        $ressult['message']='unsuccessfull';
        $ressult['status']='0';
        $json = $ressult;
        
        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }
    
    $end_date =$login[0]['end_date'];
    $percentage =$login[0]['percentage'];
    if($cu_date <= $end_date){
        
     $discount = ($amount * $percentage)/100;
     $after_discount = $amount - $discount;
     
     
     $arr_get = ['id' => '1'];

     $login_admin = $this->webservice_model->get_where('admin',$arr_get);
     
     
     $commision =$login_admin[0]['commision'];
     $VAT =$login_admin[0]['VAT'];
     
     $admin_commission = ($amount * $commision)/100;
     $admin_VAT = ($amount * $VAT)/100;
     $after_commission = ($amount + $admin_commission + $admin_VAT) - $discount;
     
     
     $ressult['total_amount']=number_format($amount,2);
     $ressult['discount']=number_format($discount,2);
     $ressult['after_discount']=number_format($after_discount,2);
     $ressult['after_commission']=number_format($after_commission,2);
     $ressult['admin_VAT']=number_format($admin_VAT,2);
     $ressult['admin_commission']=number_format($admin_commission,2);
     $ressult['offer_id']=$login[0]['id'];
     $ressult['result']='applied successfull';
     $ressult['message']='successfull';
     $ressult['status']='1';
     $json = $ressult;
     
     header('Content-type:application/json');
     echo json_encode($json);
     die;
     
 }else{
     
    $ressult['total_amount']="0";
    $ressult['discount']="0";
    $ressult['after_discount']="0";
    $ressult['after_commission']="0";
    $ressult['admin_VAT']="0";
    $ressult['admin_commission']="0";
    $ressult['offer_id']='';
    $ressult['result']='Code is expired ';
    $ressult['message']='unsuccessfull';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}

}else{
    $ressult['total_amount']="0";
    $ressult['discount']="0";
    $ressult['after_discount']="0";
    $ressult['after_commission']="0";
    $ressult['admin_VAT']="0";
    $ressult['admin_commission']="0";
    $ressult['offer_id']='';
    $ressult['result']='Entered wrong code';
    $ressult['message']='unsuccessfull';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
    
}     


}






/************* calculation_new function *************/

public function calculation_new(){

 $request_id = $this->input->get_post('request_id');
 $total_amount = $this->input->get_post('total_amount');
 $arr_get = ['id' => '1'];

 $login = $this->webservice_model->get_where('admin',$arr_get);
 if ($login) {
    $arr_get1 = ['id' =>$request_id];
    
    $login_request = $this->webservice_model->get_where('user_request',$arr_get1);

    $discunt =  $login_request[0]['discount'];
    $commision =$login[0]['commision'];
    $VAT =$login[0]['VAT'];
    
    $admin_commission = ($total_amount * $commision)/100;
    $admin_VAT = ($total_amount * $VAT)/100;
    $after_commission = ($total_amount + $admin_commission + $admin_VAT) - $discunt;
    
    $ressult['discount']=number_format($discunt,2);
    $ressult['total_amount']=number_format($total_amount,2);
    $ressult['admin_commission']=number_format($admin_commission,2);
    $ressult['admin_VAT']=number_format($admin_VAT,2);
    $ressult['after_commission']=number_format($after_commission,2);
    $ressult1['result']=$ressult;
    $ressult1['message']='successfull';
    $ressult1['status']='1';
    $json = $ressult1;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
    
}else{
 
    $ressult['total_amount']='0.0';
    $ressult['admin_commission']='0.0';
    $ressult['admin_VAT']='0.0';
    $ressult['after_commission']='0.0';
    $ressult1['result']=$ressult;
    $ressult1['message']='unsuccessfull';
    $ressult1['status']='0';
    $json = $ressult1;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}




}




/************* calculation function *************/

public function calculation(){

 $total_amount = $this->input->get_post('total_amount');
 $arr_get = ['id' => '1'];

 $login = $this->webservice_model->get_where('admin',$arr_get);
 if ($login) {
  
  $commision =$login[0]['commision'];
  $VAT =$login[0]['VAT'];
  
  $admin_commission = ($total_amount * $commision)/100;
  $admin_VAT = ($total_amount * $VAT)/100;
  $after_commission = $total_amount + $admin_commission + $admin_VAT;
  
  $ressult['total_amount']=number_format($total_amount,2);
  $ressult['admin_commission']=number_format($admin_commission,2);
  $ressult['admin_VAT']=number_format($admin_VAT,2);
  $ressult['after_commission']=number_format($after_commission,2);
  $ressult1['result']=$ressult;
  $ressult1['message']='successfull';
  $ressult1['status']='1';
  $json = $ressult1;
  
  header('Content-type:application/json');
  echo json_encode($json);
  die;
  
}else{
 
    $ressult['total_amount']='0.0';
    $ressult['admin_commission']='0.0';
    $ressult['admin_VAT']='0.0';
    $ressult['after_commission']='0.0';
    $ressult1['result']=$ressult;
    $ressult1['message']='unsuccessfull';
    $ressult1['status']='0';
    $json = $ressult1;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}




}






/************* change_password function *************/
public function change_password()
{
  $password = $this->input->get_post('old_password', TRUE);
  $id = $this->input->get_post('user_id', TRUE);

  $arr_login = ['id' => $id ,'password' => $password];
  $login = $this->webservice_model->get_where('users', $arr_login);

  $arr_data = ['password'=>$this->input->get_post('password')];
  
  
  if ($login)
  {     
      $this->webservice_model->update_data('users',$arr_data,$arr_login);
      
      $ressult['result']="Change password successfuly";
      $ressult['message']='successfull';
      $ressult['status']='1';
      $json = $ressult;

      
  }
  else
  {
      $ressult['result']="Data not found";
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;
  }

  header('Content-type: application/json');
  echo json_encode($json);
}







/************* get_user_pending_book_appointment_list *************/
public

function get_user_pending_book_appointment_list()
{
   
    $user_id = $this->input->get_post('user_id');


    $list = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id AND  payment_status = 'Complete' AND (status = 'Pending') order by id desc")->result_array();

    
    
    if ($list)
    {
        foreach($list as $val)
        {
            
            $login_barber = $this->webservice_model->get_where('users',['id'=>$val['accepted_provider_id']]);
            
            if($login_barber){
             $login_barber[0]['store_logo']=SITE_URL.'uploads/images/'.$login_barber[0]['store_logo'];  
             $login_barber[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_barber[0]['store_cover_image'];  
             $login_barber[0]['image']=SITE_URL.'uploads/images/'.$login_barber[0]['image'];  
             $val['provider_details']=$login_barber[0];
         }else{
             $val['provider_details']=(object)[];
             
         }
         $exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$val['id']]);

         if($exp){
             foreach($exp as $val1)
                
             {
                
              $val['service_details'][]=$val1;
              
          }
          
          
      }else{
          $val['service_details']=[];
          
      }
      
      
      
                                //  $val['image']=SITE_URL.'uploads/images/'.$val['image'];  
      
      $request_id = $val['id'];
      
      $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
      if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $val['request_images'][]=$val22;
     }
     
 }else{
     $val['request_images']=[];
     
 }
 $request_id = $val['id'];
 $bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
 $val['place_bid_count']=$bid_count[0]['place_bid_count'];

 
 $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
 
 $val['date_time']= $date_time;  
 

 $data[] = $val;
}





if(!isset($data)){
    
    $ressult['result']=[];
    $ressult['message']='Data Not Found';
    $ressult['status']='0';
    $json = $ressult;
    header('Content-type: application/json');
    echo json_encode($json); die;
    
}



$ressult['result']=$data;
$ressult['message']='successful';
$ressult['status']='1';
$json = $ressult;
}
else
{
  $ressult['result']=[];
  $ressult['message']='Data Not Found';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}








/************* get_hygienist_book_appointment_list  *************/
public

function get_hygienist_book_appointment_list()
{
   
    $user_id = $this->input->get_post('user_id');


    $list = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id AND request_for = 'Space' AND (status = 'Pending' OR status = 'Accept' OR status = 'Start') order by id desc")->result_array();

    
    
    if ($list)
    {
        foreach($list as $val)
        {
            
            $login_barber = $this->webservice_model->get_where('users',['id'=>$val['provider_id']]);
            
            if($login_barber){
             $login_barber[0]['store_logo']=SITE_URL.'uploads/images/'.$login_barber[0]['store_logo'];  
             $login_barber[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_barber[0]['store_cover_image'];  
             $login_barber[0]['image']=SITE_URL.'uploads/images/'.$login_barber[0]['image'];  
             $val['provider_details']=$login_barber[0];
         }else{
             $val['provider_details']=(object)[];
             
         }
         $exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$val['id']]);

         if($exp){
             foreach($exp as $val1)
                
             {
                
              $val['service_details'][]=$val1;
              
          }
          
          
      }else{
          $val['service_details']=[];
          
      }
      
      
      
                                //  $val['image']=SITE_URL.'uploads/images/'.$val['image'];  
      
      $request_id = $val['id'];
      
      $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
      if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $val['request_images'][]=$val22;
     }
     
 }else{
     $val['request_images']=[];
     
 }
 $request_id = $val['id'];
 $bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
 $val['place_bid_count']=$bid_count[0]['place_bid_count'];

 
 $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
 
 $val['date_time']= $date_time;  
 

 $data[] = $val;
}





if(!isset($data)){
    
    $ressult['result']=[];
    $ressult['message']='Data Not Found';
    $ressult['status']='0';
    $json = $ressult;
    header('Content-type: application/json');
    echo json_encode($json); die;
    
}



$ressult['result']=$data;
$ressult['message']='successful';
$ressult['status']='1';
$json = $ressult;
}
else
{
  $ressult['result']=[];
  $ressult['message']='Data Not Found';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}




/************* get_hygienist_book_appointment_history_list*************/
public

function get_hygienist_book_appointment_history_list()
{
   
    $user_id = $this->input->get_post('user_id');
    

    $list = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id  AND request_for = 'Space'  AND (status = 'Reject' OR status = 'Cancel' OR status = 'Complete' OR status = 'Finish') order by id desc")->result_array();

    
    
    if ($list)
    {
        foreach($list as $val)
        {
            
            $login_barber = $this->webservice_model->get_where('users',['id'=>$val['accepted_provider_id']]);
            
            if($login_barber){
             $login_barber[0]['store_logo']=SITE_URL.'uploads/images/'.$login_barber[0]['store_logo'];  
             $login_barber[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_barber[0]['store_cover_image']; 
             $login_barber[0]['image']=SITE_URL.'uploads/images/'.$login_barber[0]['image'];  
             $val['provider_details']=$login_barber[0];
         }else{
             $val['provider_details']=(object)[];
             
         }
         
         $exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$val['id']]);

         if($exp){
             foreach($exp as $val1)
                
             {
                
              $val['service_details'][]=$val1;
              
          }
          
          
      }else{
          $val['service_details']=[];
          
      }
      
      
      
      $request_id = $val['id'];
      
      $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
      if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $val['request_images'][]=$val22;
     }
     
 }else{
     $val['request_images']=[];
     
 }
 
 $request_id = $val['id'];
 $bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
 $val['place_bid_count']=$bid_count[0]['place_bid_count'];


 
 $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
 
 $val['date_time']= $date_time;  
 
 
 $data[] = $val;
}





if(!isset($data)){
    
    $ressult['result']=[];
    $ressult['message']='Data Not Found';
    $ressult['status']='0';
    $json = $ressult;
    header('Content-type: application/json');
    echo json_encode($json); die;
    
}



$ressult['result']=$data;
$ressult['message']='successful';
$ressult['status']='1';
$json = $ressult;
}
else
{
  $ressult['result']=[];
  $ressult['message']='Data Not Found';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}


/************* get_book_appointment_list *************/
public

function get_user_book_appointment_list()
{
   
    $user_id = $this->input->get_post('user_id');


    $list = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id AND  payment_status = 'Complete' AND (status = 'Accept' OR status = 'Start') order by id desc")->result_array();

    
    
    if ($list)
    {
        foreach($list as $val)
        {
            
            $login_barber = $this->webservice_model->get_where('users',['id'=>$val['accepted_provider_id']]);
            
            if($login_barber){
             $login_barber[0]['store_logo']=SITE_URL.'uploads/images/'.$login_barber[0]['store_logo'];  
             $login_barber[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_barber[0]['store_cover_image'];  
             $login_barber[0]['image']=SITE_URL.'uploads/images/'.$login_barber[0]['image'];  
             $val['provider_details']=$login_barber[0];
         }else{
             $val['provider_details']=(object)[];
             
         }
         $exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$val['id']]);

         if($exp){
             foreach($exp as $val1)
                
             {
                
              $val['service_details'][]=$val1;
              
          }
          
          
      }else{
          $val['service_details']=[];
          
      }
      
      
      
                                //  $val['image']=SITE_URL.'uploads/images/'.$val['image'];  
      
      $request_id = $val['id'];
      
      $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
      if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $val['request_images'][]=$val22;
     }
     
 }else{
     $val['request_images']=[];
     
 }
 $request_id = $val['id'];
 $bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
 $val['place_bid_count']=$bid_count[0]['place_bid_count'];

 
 $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
 
 $val['date_time']= $date_time;  
 

 $data[] = $val;
}





if(!isset($data)){
    
    $ressult['result']=[];
    $ressult['message']='Data Not Found';
    $ressult['status']='0';
    $json = $ressult;
    header('Content-type: application/json');
    echo json_encode($json); die;
    
}



$ressult['result']=$data;
$ressult['message']='successful';
$ressult['status']='1';
$json = $ressult;
}
else
{
  $ressult['result']=[];
  $ressult['message']='Data Not Found';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}



/************* get_user_book_appointment_history_list*************/
public

function get_user_book_appointment_history_list()
{
   
    $user_id = $this->input->get_post('user_id');
    

    $list = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id AND  payment_status = 'Complete' AND (status = 'Reject' OR status = 'Cancel' OR status = 'Complete' OR status = 'Finish') order by id desc")->result_array();

    
    
    if ($list)
    {
        foreach($list as $val)
        {
            
            $login_barber = $this->webservice_model->get_where('users',['id'=>$val['accepted_provider_id']]);
            
            if($login_barber){
             $login_barber[0]['store_logo']=SITE_URL.'uploads/images/'.$login_barber[0]['store_logo'];  
             $login_barber[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_barber[0]['store_cover_image']; 
             $login_barber[0]['image']=SITE_URL.'uploads/images/'.$login_barber[0]['image'];  
             $val['provider_details']=$login_barber[0];
         }else{
             $val['provider_details']=(object)[];
             
         }
         
         $exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$val['id']]);

         if($exp){
             foreach($exp as $val1)
                
             {
                
              $val['service_details'][]=$val1;
              
          }
          
          
      }else{
          $val['service_details']=[];
          
      }
      
      
      
      $request_id = $val['id'];
      
      $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
      if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $val['request_images'][]=$val22;
     }
     
 }else{
     $val['request_images']=[];
     
 }
 
 $request_id = $val['id'];
 $bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
 $val['place_bid_count']=$bid_count[0]['place_bid_count'];


 
 $date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));
 
 $val['date_time']= $date_time;  
 
 
 $data[] = $val;
}





if(!isset($data)){
    
    $ressult['result']=[];
    $ressult['message']='Data Not Found';
    $ressult['status']='0';
    $json = $ressult;
    header('Content-type: application/json');
    echo json_encode($json); die;
    
}



$ressult['result']=$data;
$ressult['message']='successful';
$ressult['status']='1';
$json = $ressult;
}
else
{
  $ressult['result']=[];
  $ressult['message']='Data Not Found';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}





/***************get_proivder_book_appointment *****************/
public
function get_proivder_book_appointment()
{  
 $provider_id = $this->input->get_post('provider_id', TRUE); 
 $status = $this->input->get_post('status', TRUE); 
 $service_name = $this->input->get_post('service_name', TRUE); 
 
 if($service_name){
     
     
   if($status == "Pending"){
     
                        //  $fetch = $this->db->query("SELECT * FROM user_request WHERE provider_id = $provider_id AND payment_status = 'Complete' AND status = 'Pending'  order by id desc")->result_array();
                       //   $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  provider_id = $provider_id AND status = 'Pending' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

       $fetch = $this->db->query("SELECT * FROM user_request WHERE FIND_IN_SET('$provider_id', `provider_id`)  AND  service_name like '%$service_name%'  AND  status = 'Pending' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

   }else if($status == "Start"){
                          //  $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  provider_id = $provider_id AND status = 'Start' order by id desc")->result_array();
      $fetch = $this->db->query("SELECT * FROM user_request WHERE accepted_provider_id = $provider_id AND    service_name like '%$service_name%' AND status = 'Start' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

      
  }else if($status == "Accept"){
                           // $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  provider_id = $provider_id AND status = 'Accept' order by id desc")->result_array();
     $fetch = $this->db->query("SELECT * FROM user_request WHERE  accepted_provider_id = $provider_id AND    service_name like '%$service_name%' AND  status = 'Accept' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

 }else if($status == "Complete"){
     $fetch = $this->db->query("SELECT * FROM user_request WHERE  accepted_provider_id = $provider_id AND    service_name like '%$service_name%'  AND (status = 'Finish' OR status = 'Complete' OR  status = 'Cancel'  OR status = 'Reject' )  order by id desc")->result_array();

 }else{
     $fetch = $this->db->query("SELECT * FROM user_request WHERE  accepted_provider_id = $provider_id AND    service_name like '%$service_name%' AND (status = 'Finish' OR status = 'Complete' OR status = 'Cancel'  OR status = 'Reject' )  order by id desc")->result_array();
     
 }
 
 
}else{
 
 
   if($status == "Pending"){
     
                        //  $fetch = $this->db->query("SELECT * FROM user_request WHERE provider_id = $provider_id AND payment_status = 'Complete' AND status = 'Pending'  order by id desc")->result_array();
                       //   $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  provider_id = $provider_id AND status = 'Pending' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

       $fetch = $this->db->query("SELECT * FROM user_request WHERE FIND_IN_SET('$provider_id', `provider_id`) AND  status = 'Pending' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

   }else if($status == "Start"){
                          //  $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  provider_id = $provider_id AND status = 'Start' order by id desc")->result_array();
      $fetch = $this->db->query("SELECT * FROM user_request WHERE accepted_provider_id = $provider_id AND status = 'Start' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

      
  }else if($status == "Accept"){
                           // $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  provider_id = $provider_id AND status = 'Accept' order by id desc")->result_array();
     $fetch = $this->db->query("SELECT * FROM user_request WHERE  accepted_provider_id = $provider_id AND status = 'Accept' AND id NOT IN(select request_id from rejected_request where provider_id= $provider_id) order by id desc")->result_array();

 }else if($status == "Complete"){
     $fetch = $this->db->query("SELECT * FROM user_request WHERE  accepted_provider_id = $provider_id AND (status = 'Finish' OR status = 'Complete' OR  status = 'Cancel'  OR status = 'Reject' )  order by id desc")->result_array();

 }else{
     $fetch = $this->db->query("SELECT * FROM user_request WHERE  accepted_provider_id = $provider_id AND (status = 'Finish' OR status = 'Complete' OR status = 'Cancel'  OR status = 'Reject' )  order by id desc")->result_array();
     
 }
 
}


if ($fetch){
  
 foreach($fetch as $val)
 {
   
   
     
     $where = ['id'=>$val['user_id']];
     $login = $this->webservice_model->get_where('users',$where);
     if($login){
         $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
         $val['user_details']=$login[0];
     }else{
         $val['user_details']=(object)[];
         
     }
     
     
     $request_id = $val['id'];
     
     $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
     if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $val['request_images'][]=$val22;
     }
     
 }else{
     $val['request_images']=[];
     
 }
                               // print_r($val);die;
 
 
 
 $exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$val['id']]);

 if($exp){
     foreach($exp as $val1)
        
     {
        
      $val['service_details'][]=$val1;
      
  }
  
  
}else{
  $val['service_details']=[];
  
}

$request_id = $val['id'];
$bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
$val['place_bid_count']=$bid_count[0]['place_bid_count'];

$login_place_bid = $this->webservice_model->get_where('place_bid',['provider_id'=>$provider_id,'request_id'=>$request_id]);

if($login_place_bid){
 $val['place_bid_id']=$login_place_bid[0]['id'];
 $val['place_bid_amount']=$login_place_bid[0]['amount'];
}else{
 $val['place_bid_id']='';
 $val['place_bid_amount']='';
}


$date_time  = date("Y-m-d g:i a", strtotime($val['date_time']));

$val['date_time']= $date_time;  

$data[]=$val;

}
                          //     print_r($data);die;
if(isset($data))
{
    $ressult['result'] = $data;
    $ressult['message'] = 'successfull';
    $ressult['status'] = '1';
    $json = $ressult;
    header('Content-type: application/json');
    echo json_encode($json);die;
}else {
    $data['result'] = [];
    $data['message'] = 'No Request Found';
    $data['status'] = '0';
    $json = $data;
    header('Content-type: application/json');
    echo json_encode($json);die;
}


}
else
{
    $data['result']=[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
    header('Content-type: application/json');
    echo json_encode($json);die;
}

header('Content-type: application/json');
echo json_encode($json);die;
}




/************* get_request_details function *************/

public function get_request_details(){

  $arr_get = ['id'=>$this->input->get_post('request_id')];
  $user_id =$this->input->get_post('user_id');
  $request_id =$this->input->get_post('request_id');
  $provider_id =$this->input->get_post('provider_id');

  $login = $this->webservice_model->get_where('user_request',$arr_get);

  if ($login) {  
   
   
   
    $time_zone = $this->input->get_post('timezone', TRUE);
    if($time_zone){
       date_default_timezone_set($time_zone );
       $c_date_time =  date('Y-m-d H:i:s');
   }else{
       $c_date_time =  date('Y-m-d H:i:s');
       
   }
   if($c_date_time < $login[0]['date_time_two_hr']){
       
       $login[0]['cancel_status'] = 'Yes';
   }else{
       $login[0]['cancel_status'] = 'No';
       
   }
   
   
   $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$login[0]['provider_id']])->get('rating_review')->result_array();

   $rating = ($get[0]['rating']=='') ?  0 : $get[0]['rating'];   

   
   $login1_d[0]['rating'] = $rating;

   $login_check = $this->webservice_model->get_where('rating_review',['form_id'=>$user_id,'request_id'=>$request_id]);
   if($login_check){
     $login[0]['rating_review_status'] = 'YES';
 }else{
     $login[0]['rating_review_status'] = 'NO';
     
 }

 $where = ['id'=>$login[0]['accepted_provider_id']];
 $login_d = $this->webservice_model->get_where('users',$where);
 
 if($login_d){
     $login_d[0]['store_logo']=SITE_URL.'uploads/images/'.$login_d[0]['store_logo'];  
     $login_d[0]['store_cover_image']=SITE_URL.'uploads/images/'.$login_d[0]['store_cover_image']; 
     $login_d[0]['image']=SITE_URL.'uploads/images/'.$login_d[0]['image'];
     $login[0]['provider_details']=$login_d[0];
     
 }else{
   $login[0]['provider_details']=(object)[];
   
}



$where_u = ['id'=>$login[0]['user_id']];
$login_u = $this->webservice_model->get_where('users',$where_u);
if($login_u){
 $login_u[0]['image']=SITE_URL.'uploads/images/'.$login_u[0]['image'];
 $login[0]['user_details']=$login_u[0];
}

$request_id = $this->input->get_post('request_id');

$login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
if($login_image){
    foreach($login_image as $val22)
    {
        
     
     $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
     $login[0]['request_images'][]=$val22;
 }
 
}else{
 $login[0]['request_images']=[];
 
}


$exp = $this->webservice_model->get_where('user_request_extra_service', ['request_id'=>$request_id]);

if($exp){
 foreach($exp as $val1)
    
 {
    
  $login[0]['service_details'][]=$val1;
  
}


}else{
  $login[0]['service_details']=[];
  
}

$bid_count = $this->db->query("SELECT COUNT(id) AS place_bid_count FROM place_bid WHERE request_id  = $request_id")->result_array();
$login[0]['place_bid_count']=$bid_count[0]['place_bid_count'];

if($provider_id){
  $login_place_bid = $this->webservice_model->get_where('place_bid',['provider_id'=>$provider_id,'request_id'=>$request_id]);

  if($login_place_bid){
     $login[0]['place_bid_id']=$login_place_bid[0]['id'];
     $login[0]['place_bid_amount']=$login_place_bid[0]['amount'];
 }else{
     $login[0]['place_bid_id']='';
     $login[0]['place_bid_amount']='';
 }
 
}else{
 $login[0]['place_bid_id']='';
 $login[0]['place_bid_amount']='';
 
}

$date_time  = date("Y-m-d g:i a", strtotime($login[0]['date_time']));

$login[0]['date_time']= $date_time;  

$login[0]['emp_image']=SITE_URL.'uploads/images/'.$login[0]['emp_image'];  


   //////////


$request_id = $this->input->get_post('request_id');

$login_extra_service = $this->webservice_model->get_where('user_request_extra_service',['request_id'=>$request_id]);
if($login_extra_service){
    foreach($login_extra_service as $val55)
    {
        
     $login[0]['extra_service_list'][]=$val55;
 }
 
}else{
 $login[0]['extra_service_list']=[];
 
}



                                ////////////

$ressult['result']=$login[0];
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;

}else{

    $json = ['result'=>(object)[],'status'=>'0','message'=>'Data Not Found'];

}

header('Content-type: application/json');
echo json_encode($json);
}      





/************* request_cancel_by_user function *************/
public function request_cancel_by_user(){
  
    $status = $this->input->get_post('status');
    $arr_get = ['id'=>$this->input->get_post('request_id')];

    $login = $this->webservice_model->get_where('user_request',$arr_get);
    if ($login)
    {
        
       $time_zone =  $login[0]['timezone'];

       date_default_timezone_set($time_zone );
       $current_time =  date('H:i');
       
       
       
       $accept_one_hr  = $login[0]['accept_one_hr'];

    /*  if ($accept_one_hr <  $current_time){
                                           
            $ressult['result']=(object)[];
            $ressult['message']='You can not cancel this request as time remains less 1 hour.';
            $ressult['status']='0';
            $json = $ressult;
                               
                header('Content-type:application/json');
                echo json_encode($json);
                die;

                     }
                     */
                     

                     $arr_data = [
                        'status'=>$this->input->get_post('status')
                    ];
                    
                    
                    
                    
//////////

   /*  $admin_com = $login[0]['admin_commission'];

                  $login_admin = $this->webservice_model->get_where('users',['id'=>'1']);
     $login_admin  = $login_admin[0]['wallet'];

     $c_final_wallet = $admin_com + $login_admin;
           $this->webservice_model->update_data('users',['wallet'=>$c_final_wallet],['id'=>'1']);



 $login_user = $this->webservice_model->get_where('users',['id'=>$login[0]['user_id']]);

     $barber_amouunt = $login[0]['barber_amount'];
     $user_wallet  = $login_user[0]['wallet'];
     
     $n_wallet = $barber_amouunt + $user_wallet;
           $this->webservice_model->update_data('users',['wallet'=>$n_wallet],['id'=>$login[0]['user_id']]);

*/



           
     //////

           $user_s = $this->webservice_model->get_where('users', ['id'=>$login[0]['user_id']]);
           $user_r = $this->webservice_model->get_where('users', ['id'=>$login[0]['provider_id']]);

           $user_message_apk = array(
            "message" => array(
              "result" => "successful",
              "key" => "request is " .$status,
              "user_id" => $login[0]['user_id'],
              "provider_id" => $login[0]['provider_id'],
              "request_id" => $login[0]['id'],
              "status" => $status,
              "user_name" => $user_s[0]['first_name'].' '.$user_s[0]['last_name'],
          )
        );
           $key_ios = "New Request Canceled by ".$user_s[0]['first_name'].' '.$user_s[0]['last_name'];
           $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => "request is " .$status,
              "ios_status" =>"request is " .$status,
              "title" => $key_ios,
              "message" =>"request is " .$status,
              "user_id" => $login[0]['user_id'],
              "provider_id" => $login[0]['provider_id'],
              "status" => $status,
              "category_name" => '',
              "user_name" => $user_s[0]['first_name'].' '.$user_s[0]['last_name'],
              "receiver_id" => '',
              "request_id" => ''
          )
        );
           

           $register_userid = array($user_r[0]['register_id']);

           $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
           $this->webservice_model->ios_provider_notification_new($user_r[0]['ios_register_id'],$user_message_apk_ios['message']);
           
           date_default_timezone_set('America/New_York');
           $date_time =  date('Y-m-d H:i:s');
           
           $arr_data_noti = [
            'user_id'=>$login[0]['provider_id'],
            'request_id'=>$login[0]['id'],
            'title'=>"Cancelled request",
            'type'=>"DRIVER",
            'message'=>$user_s[0]['first_name'].' '.$user_s[0]['last_name']." Cancelled request",
            'notification_type'=>'Request',
            'date_time'=>$date_time,
        ];

        $this->webservice_model->insert_data('notification',$arr_data_noti);


//////


        $res = $this->webservice_model->update_data('user_request',$arr_data,$arr_get);
        if ($res)
        {
          $data[0] = $this->webservice_model->get_where('user_request',$arr_get)[0];

          $ressult['result']=$data[0];
          $ressult['message']='successfull';
          $ressult['status']='1';
          $json = $ressult;
      }
      else
      {
          $ressult['result']='Data Not Found';
          $ressult['message']='unsuccessfull';
          $ressult['status']='0';
          $json = $ressult;
      }
      
  }else{
      
    $ressult['result']='Data Not Found';
    $ressult['message']='unsuccessfull';
    $ressult['status']='0';
    $json = $ressult;
    
    header('Content-type:application/json');
    echo json_encode($json);
    die;


}

header('Content-type: application/json');
echo json_encode($json);



}




/************* add_rejected_request function *************/

public function add_rejected_request(){

 $arr_data = [
    'provider_id'=>$this->input->get_post('provider_id'),
    'request_id'=>$this->input->get_post('request_id')
];




$id = $this->webservice_model->insert_data('rejected_request',$arr_data);


if ($id=="") {

    $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'data not found'];

}else{


    $arr_gets = ['id' => $id];
    
    
    $login = $this->webservice_model->get_where('rejected_request',$arr_gets);   
    
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}

header('Content-type:application/json');
echo json_encode($json);

}



/************* change_request_status function *************/

public function change_request_status(){
    
    $status=$this->input->get_post('status');
    $provider_id=$this->input->get_post('provider_id');
    $request_id=$this->input->get_post('request_id');
    $reason_title=$this->input->get_post('reason_title');
    if($reason_title){
        $reason_title=$this->input->get_post('reason_title');
        
    }else{
        $reason_title='';
        
    }
    $reason_detail=$this->input->get_post('reason_detail');
    if($reason_detail){
        $reason_detail=$this->input->get_post('reason_detail');
        
    }else{
        $reason_detail='';
        
    }
 //$reason_detail= utf8_decode($reason_detail);

    $arr_get = ['id'=>$this->input->get_post('request_id')];

    $login = $this->webservice_model->get_where('user_request',$arr_get);
    if ($login[0]['id'] == "")
    {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }

  



  if($login[0]['status'] == 'Cancel'){
      
      $ressult['result']=(object)[];
      $ressult['message']='Request Cancel By User';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }
  
   /*  if($login[0]['status'] == 'Accept' || $login[0]['status'] == 'Start' || $login[0]['status'] == 'Finish'){
           
           if($login[0]['provider_id'] == $provider_id){}else{
          
                          $ressult['result']=(object)[];
                          $ressult['message']='Oops ! Someone Already accepted the booking request before you.';
                          $ressult['status']='0';
                          $json = $ressult;

                                header('Content-type:application/json');
                                echo json_encode($json);
                                die;
                                
           }
       }*/
       if($login[0]['status'] == 'Finish'){
          
          $ressult['result']=(object)[];
          $ressult['message']='unsuccessfull';
          $ressult['status']='0';
          $json = $ressult;

          header('Content-type:application/json');
          echo json_encode($json);
          die;
      }
      
      
      
      
      if($status == 'Finish' || $status == 'Complete'){
        
        
        
         $arr_data = [
         //   'total_amount'=>$this->input->get_post('total_amount'),
            'status'=>$this->input->get_post('status')
            
        ];
        
        $arr_driver = ['id'=>$provider_id];

        $data_driver = $this->webservice_model->get_where('users',$arr_driver);
        $d_wallet = $data_driver[0]['wallet'];
        $d_wallet =$d_wallet + $login[0]['barber_amount'];
        $this->webservice_model->update_data('users',['wallet'=>$d_wallet],$arr_driver);

    }else{


       if($status == 'Reject'){
        
        $arr_data_new = [
            'reason_title'=>$reason_title,
            'reason_detail'=>$reason_detail
            
        ];
        
        $this->webservice_model->update_data('user_request',$arr_data_new,$arr_get);
    }


    $arr_data = [
          //  'provider_id'=>$this->input->get_post('provider_id'),
        'status'=>$this->input->get_post('status')
        
    ];
}






if($status == 'Accept'){
    
    
    
 $arr_data = [
    'accepted_provider_id'=>$this->input->get_post('provider_id'),
    'status'=>$this->input->get_post('status')
    
];
}
$arr_get1 = ['id'=>$login[0]['user_id']];

$login1 = $this->webservice_model->get_where('users',$arr_get1);

$arr_get2 = ['id'=>$provider_id];

$login2 = $this->webservice_model->get_where('users',$arr_get2);


                      // send notification for Andriod




date_default_timezone_set('America/New_York');
$date_time =  date('Y-m-d H:i:s');
$user_message_apk = array(
 "message" => array(
   "result" => "successful",
   "key" => "Request ".$arr_data['status'],
   "title" =>"Request ".$arr_data['status'],
   "alert" =>  "Request ".$arr_data['status'],
   "message"=>"Request ".$arr_data['status'],
   "status" => $arr_data['status'],
   "userid" => $login[0]['user_id'],
   "request_id" => $this->input->get_post('request_id'),
   
   "user_name" => $login2[0]['store_name'],
   "user_phone" =>$login2[0]['mobile'],
   "user_lat" => $login2[0]['lat'],
   "user_lon" => $login2[0]['lon'],
   "user_image" => SITE_URL.'uploads/images/'.$login2[0]['image'],

   "driver_name" => $login1[0]['first_name'],
   "driver_phone" =>$login1[0]['mobile'],
   "driver_lat" => $login1[0]['lat'],
   "driver_lon" => $login1[0]['lon'],
   "driver_image" => SITE_URL.'uploads/images/'.$login1[0]['image'],
   "userid" => $login[0]['user_id'],

   "date"=> $date_time
)
);
if($status == 'Accept'){
  
  $key_ios = "New request accepted by ". $login2[0]['store_name'];
  
}else if($status == 'Start'){
  
  $key_ios = "Service has started by ". $login2[0]['store_name'];

  
}else if($status == 'Complete'){
  
    $key_ios = "New Request Completed by ". $login2[0]['store_name'];

}else if($status == 'Finish'){

  $key_ios = "Request Finished by ". $login2[0]['store_name'];
  
}else if($status == 'Reject'){

  $key_ios = "New request rejected by ". $login2[0]['store_name'];
  
}else{
  $key_ios = "Request ". $status;
  
}               

$user_message_apk_ios = array(
    "message" => array(
      "result" => "successful",
      "key" => "Request ".$arr_data['status'],
      "ios_status" =>"Request ".$arr_data['status'],
      "title" => $key_ios,
      "message" => "Request ".$arr_data['status'],
      "status" => $arr_data['status'],
      "userid" => $login[0]['user_id'],
      "request_id" => $this->input->get_post('request_id'),
      "provider_id" =>$login2[0]['id'],
      "category_name" => '',
      "user_name" => $login2[0]['first_name'].' '.$login2[0]['last_name'],
      "receiver_id" => '',
  )
);

                       //print_r($user_message_apk);die;

$register_userid = array($login1[0]['register_id']);

$this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
$this->webservice_model->ios_user_notification_new($login1[0]['ios_register_id'],$user_message_apk_ios['message']);

                       // $this->webservice_model->ios_provider_notification_new($login1[0]['ios_register_id'],$user_message_apk_ios['message']);


              // end send notification for Andriod   






$res = $this->webservice_model->update_data('user_request',$arr_data,$arr_get);
if ($res)
{

    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    
    $arr_data_noti = [
        'user_id'=>$login1[0]['id'],
        'request_id'=>$this->input->get_post('request_id'),
        'title'=>"Request ".$arr_data['status'],
        'type'=>"USER",
        'message'=>$login2[0]['store_name']." Request ".$arr_data['status'].'ed',
        'notification_type'=>'Request',
        'date_time'=>$date_time,
    ];

    $this->webservice_model->insert_data('notification',$arr_data_noti);



    $arr_get1 = ['id'=>$this->input->get_post('request_id')];
    $data = $this->webservice_model->get_where('user_request',$arr_get1);
    /*    $data[0]['username'] = $login1[0]['username'];
        $data[0]['user_phone'] = $login1[0]['mobile'];

        $data[0]['user_image']=SITE_URL.'uploads/images/'.$login1[0]['image'];*/
        $ressult['result']=$data[0];
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
    }
    else
    {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;
  }

  header('Content-type: application/json');
  echo json_encode($json);

  

}



/************************ insert chat ************************/
public function insert_chat()
{

  $type = $this->input->get_post('type', TRUE); 
  
  $time_zone = $this->input->get_post('timezone', TRUE);
  date_default_timezone_set($time_zone );
  $date_time =  date('Y-m-d H:i:s');
  
  
  
  $arr_data = array(
    'sender_id' => $this->input->get_post('sender_id', TRUE) ,
    'receiver_id' => $this->input->get_post('receiver_id', TRUE) , 
    'chat_message' => $this->input->get_post('chat_message', TRUE) , 
    'request_id' => $this->input->get_post('request_id', TRUE) , 
    'date_time' => $date_time, 
    'timezone' => $this->input->get_post('timezone', TRUE) 
);
  
  if($type=='Support'){
      $arr_data['type'] = 'Support'; 
  }
  
/*        $block = $this->webservice_model->get_where('block_user', "(user_id = '".$arr_data['receiver_id']."' AND block_id = '".$arr_data['sender_id']."') OR (user_id = '".$arr_data['sender_id']."' AND block_id = '".$arr_data['receiver_id']."')");
        
        if($block){  
            $json = ['result'=>'blocked user unblock first','status'=>'0','message'=>'unsuccessfull'];
            header('Content-type: application/json');
            echo json_encode($json); die;
        }*/

        if(isset($_FILES['chat_image'])){ 
            $file_ext = end(explode(".", $_FILES['chat_image']['name'])); 
            $user_img = "CHAT_".date('YmdHis')."_".rand(0, 100000).".".$file_ext;
            move_uploaded_file($_FILES['chat_image']['tmp_name'], "uploads/images/" . $user_img);
            $arr_data['chat_image'] = $user_img; 
        }
        
        $user_r = $this->webservice_model->get_where('users', ['id'=>$arr_data['receiver_id']]);
        $user_s = $this->webservice_model->get_where('users', ['id'=>$arr_data['sender_id']]);

        $user_message_apk = array(
            "message" => array(
              "result" => "successful",
              "key" => "You have a new message",
              "alert" => "A new message arrived",
              "title" => "A new message arrived",
              "message" => $arr_data['chat_message'],
              "user_id" => $user_s[0]['id'],
              "type" => '',
              "first_name" => $user_s[0]['first_name'],
              "last_name" => $user_s[0]['first_name'], 
              "userimage" => SITE_URL . "uploads/images/" . $user_s[0]['image'],
              "request_id" => intval($arr_data['request_id'])
          )
        );


        $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => "You have a new message",
              "ios_status" =>"You have a new message",
              "title" => "You have a new message",
              "message" => "You have a new message",
              "user_id" => $user_s[0]['id'],
              "provider_id" =>'',
              "category_name" => '',
              "user_name" => $user_s[0]['first_name'].' '.$user_s[0]['last_name'],
              "receiver_id" => '',
              "request_id" => ''
          )
        );
        
        
        $register_userid = array($user_r[0]['register_id']);

        $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
      //  $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
        //$this->webservice_model->ios_driver_notification(SITE_URL,$user_message_apk['message'], $user_r[0]['ios_register_id'],$user_s[0]['id']);
        //$this->webservice_model->ios_user_notification(SITE_URL,$user_message_apk['message'], $user_r[0]['ios_register_id'],$user_s[0]['id']);
        $this->webservice_model->ios_provider_notification_new($user_r[0]['ios_register_id'],$user_message_apk_ios['message']);

        $this->webservice_model->ios_user_notification_new($user_r[0]['ios_register_id'],$user_message_apk_ios['message']);

        $res = $this->webservice_model->insert_data('chat_detail', $arr_data);    

        if ($res != "") {
         $single_data = ['id' => $res];
         $fetch = $this->webservice_model->get_where('chat_detail', $single_data);
         $fetch[0]['chat_image'] = SITE_URL . "uploads/images/" . $fetch[0]['chat_image']; 
         
         $json = ['result'=>$fetch[0],'status'=>'1','message'=>'successfull'];
     } else {
         $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
     }
     
     header('Content-type: application/json');
     echo json_encode($json);

 }
 

 /************* get_chat_detail *************/
 public

 function get_chat_detail()
 {

  $sender_id = $this->input->get_post('sender_id', TRUE);
  $receiver_id = $this->input->get_post('receiver_id', TRUE);
  $request_id = $this->input->get_post('request_id', TRUE);         
  $type = $this->input->get_post('type', TRUE);

  $condition = "AND request_id = $request_id";
  if($type=='Support'){
      $condition = "";
  }
  
  $chat_detail = $this->db->query("SELECT * FROM chat_detail WHERE (sender_id = $sender_id AND receiver_id = $receiver_id $condition) OR (sender_id = $receiver_id AND receiver_id = $sender_id $condition) ORDER BY id ASC")->result_array();
  
 //echo $this->db->last_query(); die;

  if ($chat_detail)
  {
   foreach($chat_detail as $val)
   { 

       $sender = $this->webservice_model->get_where('users', ['id'=>$val['sender_id']]);
       $receiver = $this->webservice_model->get_where('users', ['id'=>$val['receiver_id']]);
       $sender[0]['sender_image']=SITE_URL.'uploads/images/'.$sender[0]['image'];
       $receiver[0]['receiver_image']=SITE_URL.'uploads/images/'.$receiver[0]['image'];
       $val['chat_image']=SITE_URL.'uploads/images/'.$val['chat_image'];

       $val['result'] = "successful";
       $val['sender_detail'] = $sender[0];
       $val['receiver_detail'] = $receiver[0];
       $data[] = $val;
       
   }
   
   $arr_where = ['sender_id'=>$sender_id,'receiver_id'=>$receiver_id,'request_id'=>$request_id];  
   $this->webservice_model->update_data('chat_detail', ['status'=>'SEEN'], $arr_where);

   $json = ['result'=>$data,'status'=>'1','message'=>'successfull'];

} else {

    $json = ['result'=>[],'status'=>'0','message'=>'data not found'];
}

header('Content-type: application/json');
echo json_encode($json);
}





/************* get conversation *************/
public

function get_conversation_detail()
{

    $receiver_id = $this->input->get_post('receiver_id', TRUE);
    $request_id = $this->input->get_post('request_id', TRUE);   
    $type = $this->input->get_post('type', TRUE);   

    $condition = "AND request_id = $request_id";
    if($type=='Support'){
        $condition = "";
    }

    $this->db->where(" (receiver_id = '$receiver_id' OR sender_id = '$receiver_id') ORDER BY id DESC");
    
    
    $chat_detail = $this->db->get('chat_detail')->result_array();
    
    

    $arr = [];

    

    if ($chat_detail)
    {
      foreach($chat_detail as $val)
      {
        
        if ($val['sender_id']==$receiver_id) {
          if (in_array($val['receiver_id'], $arr)) {
            
          }else{
            $arr[] = $val['receiver_id'];
            $user = $this->webservice_model->get_where('users', ['id'=>$val['receiver_id']]);
            
            $user[0]['image'] = SITE_URL . "uploads/images/" . $user[0]['image'];
            $data[] = $user[0];
        }

    }else{
      if (in_array($val['sender_id'], $arr)) {
        
      }else{
          
        $arr[] = $val['sender_id'];
        $user = $this->webservice_model->get_where('users', ['id'=>$val['sender_id']]);
        
        $user[0]['image'] = SITE_URL . "uploads/images/" . $user[0]['image'];
        $data[] = $user[0];
    }
}



}


}
else
{
  $json = ['result'=>[],'status'=>'0','message'=>'data not found'];
  header('Content-type: application/json');
  echo json_encode($json);
  die;
}


foreach($data as $key){    
    
    $where = "sender_id = '".$key['id']."' AND receiver_id = '".$receiver_id."' AND status = 'Deactive' ORDER BY id DESC";

    $msg = $this->webservice_model->get_where('chat_detail', $where);
    if($msg){
      $key['no_of_message'] = count($msg);
  }else{
      $key['no_of_message'] = 0;
  }

  $where1 = "(sender_id = '".$key['id']."' AND receiver_id = '".$receiver_id."') OR (receiver_id = '".$key['id']."' AND sender_id = '".$receiver_id."') ORDER BY id DESC";

  $msg1 = $this->webservice_model->get_where('chat_detail', $where1);
  
  
  if($user){ 
    $key['last_message'] = $msg1[0]['chat_message'];
    $key['request_id'] = $msg1[0]['request_id'];
    $key['date'] = $msg1[0]['date_time']; 
    $key['sender_id'] = $key['id'];
    $key['receiver_id'] = $receiver_id;
    $message[] = $key;
}else{ 
    $message[] = $key;
}


}

$json = ['result'=>$message,'status'=>'1','message'=>'successfull'];

header('Content-type: application/json');
echo json_encode($json);
}



/************* save_address function *************/

public function save_address(){

  $arr_get = ['id'=>$this->input->get_post('user_id')];

  $login = $this->webservice_model->get_where('users',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }



  $arr_data_new = [
     'address'=>$this->input->get_post('address'),
     'lat'=>$this->input->get_post('lat'),
     'lon'=>$this->input->get_post('lon'),
     'user_id'=>$this->input->get_post('user_id'),
     'addresstype'=>$this->input->get_post('addresstype'),
 ];

 
 $res123 = $this->webservice_model->insert_data('user_address', $arr_data_new);    



 $arr_data = [
     'address'=>$this->input->get_post('address'),
     'lat'=>$this->input->get_post('lat'),
     'lon'=>$this->input->get_post('lon'),
     'address_id'=>$res123,
     'addresstype'=>$this->input->get_post('addresstype'),
 ];

 

 $res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
 if ($res)
 {
    $data = $this->webservice_model->get_where('users',$arr_get);




    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}



/************* add_store_employee function *************/

public function add_store_employee(){

    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    
    
    $arr_data = [
        'first_name'=>$this->input->get_post('first_name'),
        'last_name'=>$this->input->get_post('last_name'),
        'store_id'=>$this->input->get_post('store_id'),
        'gender'=>$this->input->get_post('gender'),
        'status'=>'Active',
        'date_time'=>$date_time,
        'type'=>'EMPLOYEE'
    ];
    $store_id = $this->input->get_post('store_id', TRUE);
    $first_name = $this->input->get_post('first_name', TRUE);
    $last_name = $this->input->get_post('last_name', TRUE);

    $where = "store_id = '$store_id' AND first_name = '$first_name' AND last_name = '$last_name'";
    

    

    $login = $this->webservice_model->get_where('users',$where);
    
    if ($login) {
        
        $ressult['result']=(object)[];
        $ressult['message']='Employee name already exist';
        $ressult['status']='0';
        $json = $ressult;
        
        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }     


    if (isset($_FILES['image']))
    {
     $n = rand(0, 100000);
     $img = "EMP_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['image'] = $img;        
 }


 

 $id = $this->webservice_model->insert_data('users',$arr_data);

 if ($id=="") {
    $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
}else{
  
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('users',$arr_gets); 
    
    $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}

header('Content-type:application/json');
echo json_encode($json);

}




/************* get_store_employee *************/
public

function get_store_employee()
{

    $store_id = $this->input->get_post('store_id', TRUE);
    

    $where = "store_id = '$store_id' AND remove_status='No'";
    

    

    $login = $this->webservice_model->get_where('users',$where);
    
    if ($login)
    {
      foreach($login as $val)
      {
       $val['emp_image'] = $val['image'];

       $val['image'] = SITE_URL . "uploads/images/" . $val['image'];
       $data[] = $val;
   }
   
   
   $json = ['result'=>$data,'status'=>'1','message'=>'successfull'];

   header('Content-type: application/json');
   echo json_encode($json);
   die;
   
}
else
{
  $json = ['result'=>[],'status'=>'0','message'=>'data not found'];
  header('Content-type: application/json');
  echo json_encode($json);
  die;
}

}




/************* employee_update_profile function *************/

public function employee_update_profile(){

  $arr_get = ['id'=>$this->input->get_post('employee_id')];

  $login = $this->webservice_model->get_where('users',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }



  $arr_data = [
     'first_name'=>$this->input->get_post('first_name'),
     'last_name'=>$this->input->get_post('last_name'),
     'gender'=>$this->input->get_post('gender'),
 ];

 


 
 if (isset($_FILES['image']))
 {
     $n = rand(0, 100000);
     $img = "EMP_IMG_" . $n . '.png';
     move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
     $arr_data['image'] = $img;        
 }
 

 $res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
 if ($res)
 {
    $data = $this->webservice_model->get_where('users',$arr_get);
    $data[0]['image']=SITE_URL.'uploads/images/'.$data[0]['image'];
    
    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}



/************** delete_employee  ****************/
public function delete_employee(){

	$arr_whr = ['id'=>$this->input->get_post('employee_id', TRUE)];

	$product = $this->webservice_model->get_where('users', $arr_whr);
	

	if(!empty($product)){
       
	   // $this->webservice_model->delete_data('provider_services', $arr_whr);
      $this->webservice_model->update_data('users', ['remove_status'=>'Yes'], $arr_whr);                   

      $ressult['result']='successfull';
      $ressult['message']='Delete successfully';
      $ressult['status']='1';
      $json = $ressult;
  }else{

      $ressult['result']='unsuccessfull';
      $ressult['message']='Data Not Found';
      $ressult['status']='0';
      $json = $ressult;
  }


  header('Content-type: application/json');
  echo json_encode($json);

}





/************* update_approval_seen_status function *************/

public function update_approval_seen_status(){

  $arr_get = ['id'=>$this->input->get_post('user_id')];

  $login = $this->webservice_model->get_where('users',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }



  $arr_data = [
     'approve_status'=>'Yes',
 ];

 


 

 $res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
 if ($res)
 {
    $data = $this->webservice_model->get_where('users',$arr_get);

    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}




/************* provider_add_extra_service function *************/

public function provider_add_extra_service(){


    $request_id = $this->input->get_post('request_id');
    $extra_service_price = $this->input->get_post('extra_service_price');

    $arr_get = ['id'=>$request_id];

    $login = $this->webservice_model->get_where('user_request',$arr_get);
    if ($login){
        
        
       
       
     $arr_data = [
        'total_amount'=>$this->input->get_post('total_amount'),
        'barber_amount'=>$this->input->get_post('barber_amount'),
        'admin_commission'=>$this->input->get_post('admin_commission'),
        'admin_VAT'=>$this->input->get_post('admin_VAT'),
        
    ];
    
    
    $arr_data_new = [
        'request_id'=>$this->input->get_post('request_id'),
        'extra_service_name'=>$this->input->get_post('extra_service_name'),
        'extra_service_price'=>$this->input->get_post('extra_service_price'),
        'extra_service_id'=>$this->input->get_post('extra_service_id'),
        'extra_service_payment_type'=>$this->input->get_post('extra_service_payment_type'),
        'request_type'=>'Extra',
        
    ];
    
    


    $id =  $this->webservice_model->update_data('user_request',$arr_data,['id'=>$request_id]);
    
    $this->webservice_model->insert_data('user_request_extra_service',$arr_data_new);


    if ($id=="") {

        $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];

    }else{




        $arr_gets = ['id' => $request_id];
        
        
        $login = $this->webservice_model->get_where('user_request',$arr_gets);   
        
        
        
        
        
     //////

        $user_s = $this->webservice_model->get_where('users', ['id'=>$login[0]['provider_id']]);
        $user_r = $this->webservice_model->get_where('users', ['id'=>$login[0]['user_id']]);

        $user_message_apk = array(
            "message" => array(
              "result" => "successful",
              "key" => "Add Extra Service",
              "user_id" => $login[0]['user_id'],
              "provider_id" =>$login[0]['provider_id'],
              "user_name" => $user_s[0]['store_name'],
              "request_id" => $request_id
          )
        );
        $key_ios = "Extra service added by ".$user_s[0]['store_name'];

        $user_message_apk_ios = array(
            "message" => array(
              "result" => "successful",
              "key" => "Add Extra Service",
              "ios_status" =>"Add Extra Service",
              "title" => $key_ios,
              "message" => "Add Extra Service",
              "user_id" => $login[0]['user_id'],
              "provider_id" =>$login[0]['provider_id'],
              "category_name" => '',
              "user_name" => $user_s[0]['store_name'],
              "receiver_id" => '',
              "request_id" => $request_id
          )
        );

        $register_userid = array($user_r[0]['register_id']);

        $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
        $this->webservice_model->ios_user_notification_new($user_r[0]['ios_register_id'],$user_message_apk_ios['message']);

        
        $time_zone = $login[0]['timezone'];
        if($time_zone){
           date_default_timezone_set($time_zone );
           $date_time =  date('Y-m-d H:i:s');
       }else{
           $date_time =  date('Y-m-d H:i:s');
           
       }
       
       $arr_data_noti = [
        'user_id'=>$login[0]['user_id'],
        'request_id'=>$request_id,
        'title'=>"Extra Request",
        'type'=>"USER",
        'message'=>"Add Extra Service",
        'notification_type'=>'Request',
        'date_time'=>$date_time,
    ];

    $this->webservice_model->insert_data('notification',$arr_data_noti);



//////
    
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}

header('Content-type:application/json');
echo json_encode($json);die;
}else{
    
   $ressult['result']=(object)[];
   $ressult['message']='No Data Found';
   $ressult['status']='0';
   $json = $ressult;
   
   header('Content-type:application/json');
   echo json_encode($json);
   die;
   
}
}




/************* update_payment_confirmation function *************/

public function update_payment_confirmation(){

  $arr_get = ['id'=>$this->input->get_post('request_id')];

  $login = $this->webservice_model->get_where('user_request',$arr_get);
  if ($login)
  {



     $arr_data = [
         'payment_confirmation'=>'Complete',
     ];

     

     

     $res = $this->webservice_model->update_data('user_request',$arr_data,$arr_get);
     if ($res)
     {
        $data = $this->webservice_model->get_where('user_request',$arr_get);

        $ressult['result']=$data[0];
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
        

        header('Content-type:application/json');
        echo json_encode($json);
        die;
    }
    else
    {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }
  
  
}else{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;

  header('Content-type:application/json');
  echo json_encode($json);
  die;
}




}



/*************  addPayment *************/
public

function addPayment()
{           
 
  $user_id =  $this->input->get_post('user_id');
  $request_id =  $this->input->get_post('request_id');

  $arr_data = array(
    'user_id' => $this->input->get_post('user_id'),
    'request_id' => $this->input->get_post('request_id'), 
    'payment_method' => $this->input->get_post('payment_method'), 
    'transaction_id' => $this->input->get_post('transaction_id'), 
    'total_amount' => $this->input->get_post('total_amount')                           
);



  $pay = $this->webservice_model->insert_data('payment', $arr_data);

  


  if ($pay != "") {
      
      
    $key ="Payment Completed";
                             // send notification for Andriod
    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    
 ////////1
    
    
   // send notification for Andriod

    $data_request = $this->webservice_model->get_where('user_request',['id'=>$request_id]);
    
    $data_sender = $this->webservice_model->get_where('users',['id'=>$data_request[0]['user_id']]);
    $data_reciver = $this->webservice_model->get_where('users',['id'=>$data_request[0]['provider_id']]);

    

    date_default_timezone_set('America/New_York');
    $date_time =  date('Y-m-d H:i:s');
    $user_message_apk = array(
     "message" => array(
       "result" => "successful",
       "key" => $key,
       "title" =>$key,
       "alert" =>  $key,
       "message"=>$key,
       "status" => '',
       "userid" => $data_sender[0]['id'],
       "request_id" => $this->input->get_post('request_id'),
       
       "user_name" => '',
       "user_phone" =>'',
       "user_lat" => '',
       "user_lon" => '',
       "user_image" => '',

       "driver_name" => '',
       "driver_phone" =>'',
       "driver_lat" => '',
       "driver_lon" => '',
       "driver_image" => '',
       "userid" => $data_sender[0]['id'],

       "date"=> $date_time
   )
 );
    
    $user_message_apk_ios = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "ios_status" =>$key,
          "title" => $key,
          "message" => $key,
          "status" => '',
          "userid" => $data_sender[0]['id'],
          "request_id" => $this->input->get_post('request_id'),
          "provider_id" =>$data_reciver[0]['id'],
          "category_name" => '',
          "user_name" => '',
          "receiver_id" => '',
      )
    );
    
                       //print_r($user_message_apk);die;

    $register_userid = array($data_reciver[0]['register_id']);

    $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
    $this->webservice_model->ios_provider_notification_new($data_reciver[0]['ios_register_id'],$user_message_apk_ios['message']);


              // end send notification for Andriod   
    
    

    $time_zone = $data_request[0]['timezone'];
    if($time_zone){
       date_default_timezone_set($time_zone );
       $date_time =  date('Y-m-d H:i:s');
   }else{
       $date_time =  date('Y-m-d H:i:s');
       
   }
   
   $arr_data_noti = [
    'user_id'=>$data_reciver[0]['id'],
    'request_id'=>$request_id,
    'title'=>"Payment completed",
    'type'=>"DRIVER",
    'message'=>"Payment completed",
    'notification_type'=>'Request',
    'date_time'=>$date_time,
];

$this->webservice_model->insert_data('notification',$arr_data_noti);


 ///////1


$single_data = ['id' => $pay];

$response = $this->webservice_model->get_where('payment',$single_data)[0]; 





$json = ['result' => $response, 'status' => 1, 'message' => 'successfull'];          

header('Content-type: application/json');
echo json_encode($json);die;

}
else {
  $json = ['result' => (object)[], 'status' => 0, 'message' => 'unsuccessfull'];
}

header('Content-type: application/json');
echo json_encode($json);
}





/***************get_user_page *****************/
public
function get_user_page()
{  
 $category_id = $this->input->get_post('category_id', TRUE); 
 $user_id = $this->input->get_post('user_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM settings WHERE type = 'USER' ")->result_array();


 if ($fetch){
  
     
    $data['result']=$fetch[0];
    $data['message']='successfull';
    $data['status']='1';
    $json = $data;
}
else
{
    $data['result']=(object)[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}




/***************get_provider_page *****************/
public
function get_provider_page()
{  
 $category_id = $this->input->get_post('category_id', TRUE); 
 $user_id = $this->input->get_post('user_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM settings WHERE type = 'PROVIDER' ")->result_array();


 if ($fetch){
  
     
    $data['result']=$fetch[0];
    $data['message']='successfull';
    $data['status']='1';
    $json = $data;
}
else
{
    $data['result']=(object)[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}



/*************  add_user_request_charting *************/

public function add_user_request_charting(){



 
   $time_zone = $this->input->get_post('timezone', TRUE);
   if($time_zone){
       date_default_timezone_set($time_zone );
       $date_time =  date('Y-m-d H:i:s');
   }else{
       $date_time =  date('Y-m-d H:i:s');
       
   }
   
   

   $arr_data = [
    'user_id'=>$this->input->get_post('user_id'),
    'request_id'=>$this->input->get_post('request_id'),
    'provider_id'=>$this->input->get_post('provider_id'),
    'date'=>$this->input->get_post('date'),
    'code'=>$this->input->get_post('code'),
    'description'=>$this->input->get_post('description'),
    'date_time'=>$date_time,
];



$id = $this->webservice_model->insert_data('user_request_charting',$arr_data);

if ($id=="") {
    $json = ['result'=>'unsuccessfull','status'=>0,'message'=>'data not found'];
}else{
  
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('user_request_charting',$arr_gets); 
    
    
    
    $charting_id = $login[0]['id'];
    
    
    if (isset($_FILES['charting_images']))
    {


     $charting_images = $_FILES['charting_images']['name'];
     
     $i=0;
     foreach($charting_images AS $name){
         
       $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
       $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
       move_uploaded_file($_FILES['charting_images']['tmp_name'][$i], "uploads/images/" . $img);
       
       $img_data = ['charting_id'=>$charting_id,'image'=>$img];
       $this->webservice_model->insert_data('user_request_charting_images',$img_data);
       $i++;

   }
   
}


$ressult['result']=$login[0];
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
header('Content-type:application/json');
echo json_encode($json); die;
}












header('Content-type:application/json');
echo json_encode($json); die;

}






/************* update_user_request_charting function *************/
public function update_user_request_charting(){
  
  $arr_get = ['id'=>$this->input->get_post('charting_id')];
  $charting_id = $this->input->get_post('charting_id', TRUE); 

  $login = $this->webservice_model->get_where('user_request_charting',$arr_get);
  if ($login[0]['id'] == "")
  {
    $ressult['result']='Data Not Found';
    $ressult['message']='unsuccessfull';
    $ressult['status']='0';
    $json = $ressult;

    header('Content-type:application/json');
    echo json_encode($json);
    die;
}

$arr_data = [
    'date'=>$this->input->get_post('date'),
    'code'=>$this->input->get_post('code'),
    'description'=>$this->input->get_post('description'),
];








$res = $this->webservice_model->update_data('user_request_charting',$arr_data,$arr_get);
if ($res)
{
  $data[0] = $this->webservice_model->get_where('user_request_charting',$arr_get)[0];
  
  

  
  if (isset($_FILES['charting_images']))
  {


     $charting_images = $_FILES['charting_images']['name'];
     
     $i=0;
     foreach($charting_images AS $name){
         
       $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
       $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
       move_uploaded_file($_FILES['charting_images']['tmp_name'][$i], "uploads/images/" . $img);
       
       $img_data = ['charting_id'=>$charting_id,'image'=>$img];
       $this->webservice_model->insert_data('user_request_charting_images',$img_data);
       $i++;

   }
   
}




$ressult['result']=$data[0];
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;
}
else
{
  $ressult['result']='Data Not Found';
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}




/***************get_user_request_charting *****************/
public
function get_user_request_charting()
{  
 $category_id = $this->input->get_post('category_id', TRUE); 
 $user_id = $this->input->get_post('user_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM user_request_charting WHERE user_id = $user_id  order by id desc")->result_array();


 if ($fetch){
  
    foreach($fetch as $val)
    {
      
        $charting_id = $val['id'];
        
        $login_image = $this->webservice_model->get_where('user_request_charting_images',['charting_id'=>$charting_id]);
        if($login_image){
            foreach($login_image as $val22)
            {
                
             
             $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
             $val['charting_images'][]=$val22;
         }
         
     }else{
         $val['charting_images']=[];
         
     }
     
     
     $user_details= $this->webservice_model->get_where('users',['id'=>$val['provider_id']]);
     if($user_details){
         $user_details[0]['image']=SITE_URL.'uploads/images/'.$user_details[0]['image'];
         
         $val['provider_details']=$user_details[0];
     }else{
       $val['provider_details']=(object)[];
       
   }
   
   
   
   $u_details= $this->webservice_model->get_where('users',['id'=>$val['user_id']]);
   if($u_details){
     $u_details[0]['image']=SITE_URL.'uploads/images/'.$u_details[0]['image'];
     
     $val['user_details']=$u_details[0];
 }else{
   $val['user_details']=(object)[];
   
}


$request_details= $this->webservice_model->get_where('user_request',['id'=>$val['request_id']]);
if($request_details){

   $val['request_details']=$request_details[0];
}else{
   $val['request_details']=(object)[];
   
}


$ressult1[]=$val;
}
$data['result']=$ressult1;
$data['message']='successfull';
$data['status']='1';
$json = $data;
}
else
{
    $data['result']=[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}


/************* delete_user_request_charting *************/
public

function delete_user_request_charting()
{
  $id = $this->input->get_post('charting_id');
  $list = $this->webservice_model->get_where('user_request_charting',['id'=>$id]);

  if ($list)
  {
      $this->webservice_model->delete_data('user_request_charting',['id'=>$id]);

      $ressult['result']="delete successfull";
      $ressult['message']='delete successfull';
      $ressult['status']='1';
      $json = $ressult;
  }
  else
  {
      $ressult['result']='unsuccessful';
      $ressult['message']='unsuccessful';
      $ressult['status']='0';
      $json = $ressult;                              
      
  }

  
  
  header('Content-type: application/json');
  echo json_encode($json);
}

/***************get_user_request_charting_details *****************/
public
function get_user_request_charting_details()
{  
 $charting_id = $this->input->get_post('charting_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM user_request_charting WHERE id = $charting_id ")->result_array();


 if ($fetch){
  
   
  

    $login_image = $this->webservice_model->get_where('user_request_charting_images',['charting_id'=>$charting_id]);
    if($login_image){
        foreach($login_image as $val22)
        {
            
         
         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
         $fetch[0]['charting_images'][]=$val22;
     }
     
 }else{
     $fetch[0]['charting_images']=[];
     
 }
 
 
 $user_details= $this->webservice_model->get_where('users',['id'=>$fetch[0]['provider_id']]);
 if($user_details){
     $user_details[0]['image']=SITE_URL.'uploads/images/'.$user_details[0]['image'];
     
     $fetch[0]['provider_details']=$user_details[0];
 }else{
   $fetch[0]['provider_details']=(object)[];
   
}



$request_details= $this->webservice_model->get_where('user_request',['id'=>$fetch[0]['request_id']]);
if($request_details){

   $fetch[0]['request_details']=$request_details[0];
}else{
   $fetch[0]['request_details']=(object)[];
   
}


$data['result']=$fetch[0];
$data['message']='successfull';
$data['status']='1';
$json = $data;
}
else
{
    $data['result']=(object)[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}




/***************get_user_list_for_charting *****************/
public
function get_user_list_for_charting()
{  
 $category_id = $this->input->get_post('category_id', TRUE); 
 $provider_id = $this->input->get_post('provider_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM user_request WHERE accepted_provider_id = $provider_id  order by id desc")->result_array();


 if ($fetch){
  
    foreach($fetch as $val)
    {
      
      
        
        
     $user_details= $this->webservice_model->get_where('users',['id'=>$val['user_id']]);
     if($user_details){
         $user_details[0]['image']=SITE_URL.'uploads/images/'.$user_details[0]['image'];
         
         $val['user_details']=$user_details[0];
     }else{
       $val['user_details']=(object)[];
       
   }
   
   
   
   $request_details= $this->webservice_model->get_where('user_request',['id'=>$val['id']]);
   if($request_details){

       $val['request_details']=$request_details[0];
   }else{
       $val['request_details']=(object)[];
       
   }
   
   
   $ressult1[]=$val;
}
$data['result']=$ressult1;
$data['message']='successfull';
$data['status']='1';
$json = $data;
}
else
{
    $data['result']=[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}


	///////////////////SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare SelfCare 






///////////////////Delighting Delighting Delighting Delighting Delighting Delighting Delighting Delighting Delighting Delighting Delighting











/*************  get_sub_category_list function *************/
public function get_sub_category_list()
{
   $cat_id = $this->input->get_post('category_id');  
   $user_id = $this->input->get_post('user_id'); 
   
   $list = $this->db->query("select * from sub_category where category_id = $cat_id AND remove_status ='No' ")->result_array();

   
   if ($list)
   {
     foreach($list as $val)
     {             

       $arr_whr = ['sub_cat_id'=>$val['id']];$cat_new = [];
       $product_additional = $this->webservice_model->get_where('category_service', $arr_whr);
       if($product_additional){
           
           foreach($product_additional as $val1)
           {
             $val1['image']=SITE_URL.'uploads/images/'.$val1['image'];  
             
             $cat_new['sub_category_name']=$val['name'];
             
             
             
             
             
             $cat_new['service_details'][]=$val1;


         }
         
         
     }else{
       $cat_new[$val['name']]=[];
       
   }
   
   
   
   
   $data[] = $cat_new;
}

$json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
}
else
{
 $json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
}

header('Content-type: application/json');
echo json_encode($json);
}


/***************get_category_service *****************/
public
function get_category_service()
{  
 $category_id = $this->input->get_post('category_id', TRUE); 
 $user_id = $this->input->get_post('user_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM category_service WHERE category_id = $category_id  AND remove_status ='No' order by id desc")->result_array();


 if ($fetch){
  
    foreach($fetch as $val)
    {
       $arr_get = ['user_id'=>$this->input->get_post('user_id'),'sub_cat_id'=>$val['id']];
       
       $login = $this->webservice_model->get_where('provider_service',$arr_get);
       if ($login)
       {
        $val['added']="YES";  
    }else{
        $val['added']="NO";  
        
    }
    $val['rating']="5.0";
    $val['image']=SITE_URL.'uploads/images/'.$val['image'];
    $ressult1[]=$val;
}
$data['result']=$ressult1;
$data['message']='successfull';
$data['status']='1';
$json = $data;
}
else
{
    $data['result']=[];
    $data['message']='No Request Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}




/************* add_user_request function *************/

public function add_user_request(){

  $unique_code= rand(111111,999999);
  $user_id = $this->input->get_post('user_id', TRUE);
  $category_id = $this->input->get_post('category_id', TRUE);
  $category_service_id = $this->input->get_post('category_service_id', TRUE);
  $lat = $this->input->get_post('lat', TRUE);
  $lon = $this->input->get_post('lon', TRUE);
  $address = $this->input->get_post('address', TRUE);
  $timezone = $this->input->get_post('timezone', TRUE);
  if($timezone){
    
    date_default_timezone_set("$timezone");
    $date_time = date('Y-m-d H:i:s');


}else{
   date_default_timezone_set("Asia/Kolkata");
   $date_time = date('Y-m-d H:i:s');

   
}

$arr_data = [
    'user_id'=>$this->input->get_post('user_id'),
    'title'=>$this->input->get_post('title'),
    'category_id'=>$this->input->get_post('category_id'),
    'category_service_id'=>$this->input->get_post('category_service_id'),
    'category_name'=>$this->input->get_post('category_name'),
    'category_service_name'=>$this->input->get_post('category_service_name'),
    'date'=>$this->input->get_post('date'),
    'time'=>$this->input->get_post('time'),
    'address'=>$this->input->get_post('address'),
    'unique_code'=>$unique_code,
    'lat'=>$this->input->get_post('lat'),
    'lon'=>$this->input->get_post('lon'),
    'date_time'=>$date_time,
    'description'=>$this->input->get_post('description'),
    'offer_code'=>$this->input->get_post('offer_code'),
    'offer_id'=>$this->input->get_post('offer_id'),
    'payment_type'=>$this->input->get_post('payment_type'),
    'description'=>$this->input->get_post('description')
];
$fetch = $this->db->query("SELECT * FROM users WHERE FIND_IN_SET('$category_id', `cat_id`) AND type = 'PROVIDER' ")->result_array();
//print_r($fetch);die;
if($fetch)
  {         $user_distance = "10000000";

$i = 0; $ids = '';
foreach($fetch as $val)
{ 
   if(!$val['lat']=="" && !$val['lon']==""){
      $distance = $this->webservice_model->distance($lat, $lon, $val['lat'], $val['lon'], $miles = false);                       
      if($user_distance >= $distance){
        if($ids == ''){
            $ids = $val['id'];
        }else{

           $ids = $ids.','.$val['id'];
       }

       $i++;
       $key ="New booking request";
                             // send notification for Andriod

       $user_message_apk = array(
           "message" => array(
               "result" => "successful",
               "key" => $key,
               "title" =>$key,
               "alert" =>  $key,
               "message"=>$key,
               "pickup_lat" => $lat,
               "pickup_lon" => $lon,
               "pick_address" => $address,
               "user_id" => $user_id,
               "unique_code" => $unique_code,
               "date"=> $date_time
           )
       );
       
       $register_userid = array($val['register_id']);
       $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
       $this->webservice_model->ios_provider_notification_new($val['ios_register_id'],$user_message_apk['message']);

                        // end send notification for Andriod    

   }
}
}


$arr_data['driver_id'] = $ids;




}else{
  $ressult['result']=(object)[];
  $ressult['message']='No provider available in your area';
  $ressult['status']='0';
  $json = $ressult; 
  
  header('Content-type:application/json');
  echo json_encode($json);die;
  
  
  

  
}
$id = $this->webservice_model->insert_data('user_request',$arr_data);


if ($id=="") {
    $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
}else{
  
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('user_request',$arr_gets); 
    
    $request_id = $login[0]['id'];
    
    
    if (isset($_FILES['product_images']))
    {


     $product_images = $_FILES['product_images']['name'];
     
     $i=0;
     foreach($product_images AS $name){
         
       $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
       $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
       move_uploaded_file($_FILES['product_images']['tmp_name'][$i], "uploads/images/" . $img);
                /* if($i==0){
                   $arr_data = ['image'=> $img];
                   $res = $this->webservice_model->update_data('product', $arr_data, $arr_gets);                   
               }*/
               $img_data = ['request_id'=>$request_id,'image'=>$img];
               $this->webservice_model->insert_data('user_request_images',$img_data);
               $i++;

           }
           
       }
       
       
       $ressult['result']=$login[0];
       $ressult['message']='successfull';
       $ressult['status']='1';
       $json = $ressult;
   }

   header('Content-type:application/json');
   echo json_encode($json);

}



/************* check_provider_service function *************/

public function check_provider_service(){
    
  $user_id = $this->input->get_post('user_id', TRUE);
  $category_id = $this->input->get_post('category_id', TRUE);
  $category_service_id = $this->input->get_post('category_service_id', TRUE);
  
  $arr_get = ['user_id'=>$this->input->get_post('user_id'),'sub_cat_id'=>$this->input->get_post('sub_cat_id')];

  $login = $this->webservice_model->get_where('provider_service',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']='NO';
      $ressult['message']='NO';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }else{
      
    $ressult['result']='YES';
    $ressult['message']='YES';
    $ressult['status']='1';
    $json = $ressult;
    header('Content-type:application/json');
    echo json_encode($json);
    die;
}

}


/***************get_user_pending_request *****************/
public
function get_user_request()
{  
 $user_id = $this->input->get_post('user_id', TRUE); 
 
          // $fetch = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id AND status = 'Pending' order by id ASC")->result_array();

 $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND user_id = $user_id  AND status != 'Finish' AND status != 'Cancel' order by id desc")->result_array();

 if ($fetch){
  
    foreach($fetch as $val)
    {
       
     $where = ['id'=>$val['accept_driver_id']];
     $login = $this->webservice_model->get_where('users',$where);
     if($login){
         $login[0]['user_image']=SITE_URL.'uploads/images/'.$login[0]['image'];
         $val['driver_details']=$login[0];
         
     }else{
       $val['driver_details']=(object)[];
       
   }
   $where1 = ['form_id'=>$user_id,'type'=>'USER','request_id'=>$val['id']];
   $login1 = $this->webservice_model->get_where('rating_review',$where1);
   if($login1){
     $val['user_rating_status']='YES';
     
 }else{
     $val['user_rating_status']='NO';
     
 }
 $request_id = $val['id'];
 
 $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
 if($login_image){
    foreach($login_image as $val22)
    {
        
     
     $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
     $val['product_images'][]=$val22;
 }
 
}else{
 $val['product_images']=[];
 
}


$clr_id = $val['cart_id'];
$exp = explode(',',$clr_id);

$de=[];
foreach($exp as $val1)

{
    $id = $val1;
    $arr_get1 = "id = '$id'";
    
    $fetch1 = $this->webservice_model->get_where('add_to_cart', $arr_get1);
    


    $fetch2 = $this->webservice_model->get_where('category_service', ['id' =>$fetch1[0]['service_id']]);
    
    
    $fetch3 = $this->webservice_model->get_where('category', ['id' =>$fetch1[0]['cat_id']]);
    $fetch4 = $this->webservice_model->get_where('sub_category', ['id' =>$fetch1[0]['sub_cat_id']]);
    
    $fetch2[0]['quantity']=$fetch1[0]['quantity'];
    $fetch2[0]['total_amount']=$fetch1[0]['total_amount'];
    $val['cat_name']=$fetch3[0]['name'];
    $val['sub_cat_name']=$fetch4[0]['name'];
    
    

    $de[]=$fetch2[0];


    
}
$fetch33 = $this->webservice_model->get_where('user_address', ['id' =>$val['address_id']]);
if($fetch33){
    $val['address_details']=$fetch33[0];
}else{
    $val['address_details']=(object)[];
    
}

$val['service_details']=$de;

$ressult1[]=$val;
}
$data['result']=$ressult1;
$data['message']='successfull';
$data['status']='1';
$json = $data;
}
else
{
    $data['result']=[];
    $data['message']='unsuccessfull';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}

/***************get_user_complete_request *****************/
public
function get_user_complete_request()
{  
 $user_id = $this->input->get_post('user_id', TRUE); 
 
          // $fetch = $this->db->query("SELECT * FROM user_request WHERE user_id = $user_id AND status = 'Pending' order by id ASC")->result_array();

 $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  user_id = $user_id  AND (status = 'Finish' OR status = 'Cancel') order by id desc")->result_array();

 if ($fetch){
  
    foreach($fetch as $val)
    {
       
     $where = ['id'=>$val['accept_driver_id']];
     $login = $this->webservice_model->get_where('users',$where);
     if($login){
         $login[0]['user_image']=SITE_URL.'uploads/images/'.$login[0]['image'];
         $val['driver_details']=$login[0];
         
     }else{
       $val['driver_details']=(object)[];
       
   }
   $where1 = ['form_id'=>$user_id,'type'=>'USER','request_id'=>$val['id']];
   $login1 = $this->webservice_model->get_where('rating_review',$where1);
   if($login1){
     $val['user_rating_status']='YES';
     
 }else{
     $val['user_rating_status']='NO';
     
 }
 $request_id = $val['id'];
 
 $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
 if($login_image){
    foreach($login_image as $val22)
    {
        
     
     $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
     $val['product_images'][]=$val22;
 }
 
}else{
 $val['product_images']=[];
 
}



$clr_id = $val['cart_id'];
$exp = explode(',',$clr_id);

$de=[];
foreach($exp as $val1)

{
    $id = $val1;
    $arr_get1 = "id = '$id'";
    
    $fetch1 = $this->webservice_model->get_where('add_to_cart', $arr_get1);
    


    $fetch2 = $this->webservice_model->get_where('category_service', ['id' =>$fetch1[0]['service_id']]);
    
    
    $fetch3 = $this->webservice_model->get_where('category', ['id' =>$fetch1[0]['cat_id']]);
    $fetch4 = $this->webservice_model->get_where('sub_category', ['id' =>$fetch1[0]['sub_cat_id']]);
    
    $fetch2[0]['quantity']=$fetch1[0]['quantity'];
    $fetch2[0]['total_amount']=$fetch1[0]['total_amount'];
    $val['cat_name']=$fetch3[0]['name'];
    $val['sub_cat_name']=$fetch4[0]['name'];
    
    

    $de[]=$fetch2[0];


    
}
$fetch33 = $this->webservice_model->get_where('user_address', ['id' =>$val['address_id']]);
if($fetch33){
    $val['address_details']=$fetch33[0];
}else{
    $val['address_details']=(object)[];
    
}

$val['service_details']=$de;

$ressult1[]=$val;
}
$data['result']=$ressult1;
$data['message']='successfull';
$data['status']='1';
$json = $data;
}
else
{
    $data['result']=[];
    $data['message']='unsuccessfull';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}











/***************get_proivder_request *****************/
public
function get_proivder_request()
{  
 $driver_id = $this->input->get_post('driver_id', TRUE); 
 $status = $this->input->get_post('status', TRUE); 
 
 if($status == "Pending"){
     
                        //  $fetch = $this->db->query("SELECT * FROM user_request WHERE FIND_IN_SET('$driver_id', `driver_id`) AND status = 'Pending' order by id desc  ")->result_array();
  $fetch = $this->db->query("SELECT * FROM user_request WHERE FIND_IN_SET('$driver_id', `driver_id`) AND payment_status = 'Complete' AND status = 'Pending' AND id NOT IN(select request_id from rejected_request where driver_id= $driver_id) order by id desc")->result_array();

}else if($status == "Start"){
                          //$fetch = $this->db->query("SELECT * FROM user_request WHERE accept_driver_id = '$driver_id' AND status = 'Start' order by id desc  ")->result_array();
    $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  accept_driver_id = '$driver_id' AND status = 'Start' AND id NOT IN(select request_id from rejected_request where driver_id= $driver_id) order by id desc")->result_array();

    
}else if($status == "Accept"){
                       // $fetch = $this->db->query("SELECT * FROM user_request WHERE accept_driver_id = '$driver_id' AND status = 'Accept' order by id desc  ")->result_array();
  $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  accept_driver_id = '$driver_id' AND status = 'Accept' AND id NOT IN(select request_id from rejected_request where driver_id= $driver_id) order by id desc")->result_array();

}else if($status == "Complete"){
                    // $fetch = $this->db->query("SELECT * FROM user_request WHERE accept_driver_id = '$driver_id' AND (status = 'Finish' OR user_status = 'Cancel' OR status = 'Cancel' ) order by id desc  ")->result_array();
 $fetch = $this->db->query("SELECT * FROM user_request WHERE payment_status = 'Complete' AND  accept_driver_id = '$driver_id' AND (status = 'Finish' OR user_status = 'Cancel' OR status = 'Cancel' ) AND id NOT IN(select request_id from rejected_request where driver_id= $driver_id) order by id desc")->result_array();

}else{
                       // $fetch = $this->db->query("SELECT * FROM user_request WHERE FIND_IN_SET('$driver_id', `driver_id`) AND status = 'Cancel' order by id desc  ")->result_array();
  $fetch = $this->db->query("SELECT * FROM user_request WHERE FIND_IN_SET('$driver_id', `driver_id`) payment_status = 'Complete' AND  AND status = 'Cancel' AND id NOT IN(select request_id from rejected_request where driver_id= $driver_id) order by id desc")->result_array();
  
}
         //  $fetch = $this->db->query("SELECT * FROM user_request WHERE user_id = '$user_id' AND status != 'Finish' order by id desc  LIMIT 0,1")->result_array();

if ($fetch){
  
 foreach($fetch as $val)
 {
   
                           //   $val['item_image']=SITE_URL.'uploads/images/'.$val['item_image'];

                /* $arr_gets = ['request_id'=>$val['id'],'driver_id'=>$driver_id];
                 $lo = $this->webservice_model->get_where('rejected_request',$arr_gets);       
                       
                       if($lo){
                           continue;
                       }*/
                       
                       $where = ['id'=>$val['user_id']];
                       $login = $this->webservice_model->get_where('users',$where);
                       if($login){
                         $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
                         $val['user_details']=$login[0];
                     }else{
                         $val['user_details']=(object)[];
                         
                     }
                     
                     
                     $request_id = $val['id'];
                     
                     $login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
                     if($login_image){
                        foreach($login_image as $val22)
                        {
                            
                         
                         $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
                         $val['request_images'][]=$val22;
                     }
                     
                 }else{
                     $val['request_images']=[];
                     
                 }
                               // print_r($val);die;
                 
                 
                 $clr_id = $val['cart_id'];
                 $exp = explode(',',$clr_id);

                 $de=[];
                 foreach($exp as $val1)

                 {
                    $id = $val1;
                    $arr_get1 = "id = '$id'";
                    
                    $fetch1 = $this->webservice_model->get_where('add_to_cart', $arr_get1);
                    


                    $fetch2 = $this->webservice_model->get_where('category_service', ['id' =>$fetch1[0]['service_id']]);
                    
                    
                    $fetch3 = $this->webservice_model->get_where('category', ['id' =>$fetch1[0]['cat_id']]);
                    $fetch4 = $this->webservice_model->get_where('sub_category',['id' =>$fetch1[0]['sub_cat_id']]);
                    
                    $fetch2[0]['quantity']=$fetch1[0]['quantity'];
                    $fetch2[0]['total_amount']=$fetch1[0]['total_amount'];
                    if($fetch3){
                     $val['cat_name']=$fetch3[0]['name'];
                 }else{
                     $val['cat_name']='';
                     
                 }if($fetch4){
                    $val['sub_cat_name']=$fetch4[0]['name'];
                    
                }else{
                    $val['sub_cat_name']='';
                    
                }

                $de[]=$fetch2[0];


                
            }
            $fetch33 = $this->webservice_model->get_where('user_address',['id'=>$val['address_id']]);
            if($fetch33){
                $val['address_details']=$fetch33[0];
            }else{
                $val['address_details']=(object)[];
                
            }
            
            $val['service_details']=$de;

            $data[]=$val;
            
        }
                          //     print_r($data);die;
        if(isset($data))
        {
            $ressult['result'] = $data;
            $ressult['message'] = 'successfull';
            $ressult['status'] = '1';
            $json = $ressult;
            header('Content-type: application/json');
            echo json_encode($json);die;
        }else {
            $data['result'] = [];
            $data['message'] = 'No Request Found';
            $data['status'] = '0';
            $json = $data;
            header('Content-type: application/json');
            echo json_encode($json);die;
        }
        
        
    }
    else
    {
        $data['result']=[];
        $data['message']='No Request Found';
        $data['status']='0';
        $json = $data; 
        header('Content-type: application/json');
        echo json_encode($json);die;
    }

    header('Content-type: application/json');
    echo json_encode($json);die;
}




/************* user_change_request_status111111 function *************/

public function user_change_request_status11(){
    $user_status=$this->input->get_post('user_status');

    $arr_get = ['id'=>$this->input->get_post('request_id')];

    $login = $this->webservice_model->get_where('user_request',$arr_get);
    if ($login[0]['id'] == "")
    {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }

  
  if($user_status == 'Cancel'){
     
     $arr_data = [
          //  'accept_driver_id'=>$this->input->get_post('accept_driver_id'),
        'user_status'=>$user_status,
        'status'=>$user_status
        
    ];

}else{
  $arr_data = [
          //  'accept_driver_id'=>$this->input->get_post('accept_driver_id'),
    'user_status'=>$user_status
    
];

}



$arr_get1 = ['id'=>$login[0]['user_id']];

$login1 = $this->webservice_model->get_where('users',$arr_get1);

$arr_get2 = ['id'=>$login[0]['accept_driver_id']];

$login2 = $this->webservice_model->get_where('users',$arr_get2);
if($login2){

                      // send notification for Andriod

   
 date_default_timezone_set('America/New_York');
 $date_time =  date('Y-m-d H:i:s');
 

 $user_message_apk = array(
     "message" => array(
       "result" => "successful",
       "key" => "Request ".$user_status,
       "title" => "Request ".$user_status,
       "message" => "Request ".$user_status,
       "alert" => "Request ".$user_status,
       "register_id" => $login1[0]['register_id'],
       "userid" => $login[0]['user_id'],
       "request_id" => $this->input->get_post('request_id'),
       
       "user_name" => $login1[0]['first_name'],
       "user_phone" =>$login1[0]['mobile'],
       "user_lat" => $login1[0]['lat'],
       "user_lon" => $login1[0]['lon'],
       "user_image" => SITE_URL.'uploads/images/'.$login1[0]['image'],

       "driver_name" => $login2[0]['first_name'],
       "driver_phone" =>$login2[0]['mobile'],
       "driver_lat" => $login2[0]['lat'],
       "driver_lon" => $login2[0]['lon'],
       "driver_image" => SITE_URL.'uploads/images/'.$login2[0]['image'],
       "userid" => $login[0]['user_id'],

       "date"=> $date_time
   )
 );
 
                       //print_r($user_message_apk);die;

 $register_userid = array($login2[0]['register_id']);


 $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);

 $this->webservice_model->ios_provider_notification_new($login2[0]['ios_register_id'],$user_message_apk['message']);


              // end send notification for Andriod   
 
}

$res = $this->webservice_model->update_data('user_request',$arr_data,$arr_get);
if ($res)
{


    $arr_get1 = ['id'=>$this->input->get_post('request_id')];
    $data = $this->webservice_model->get_where('user_request',$arr_get1);
    /*    $data[0]['username'] = $login1[0]['username'];
        $data[0]['user_phone'] = $login1[0]['mobile'];

        $data[0]['user_image']=SITE_URL.'uploads/images/'.$login1[0]['image'];*/
        $ressult['result']=$data[0];
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
    }
    else
    {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;
  }

  header('Content-type: application/json');
  echo json_encode($json);

  

}


/************* get_request_details function *************/

public function get_request_details123456(){

  $arr_get = ['id'=>$this->input->get_post('request_id')];
  $user_id =$this->input->get_post('user_id');
  $request_id =$this->input->get_post('request_id');

  $login = $this->webservice_model->get_where('user_request',$arr_get);

  if ($login) {  
   
   
    
    $get = $this->db->select_avg("rating", "rating")->where(['to_id'=>$login[0]['accept_driver_id']])->get('rating_review')->result_array();

    $rating = ($get[0]['rating']=='') ?  0 : $get[0]['rating'];   

    
    $login1_d[0]['rating'] = $rating;

    $login_check = $this->webservice_model->get_where('rating_review',['form_id'=>$user_id,'request_id'=>$request_id]);
    if($login_check){
     $login[0]['rating_review_status'] = 'YES';
 }else{
     $login[0]['rating_review_status'] = 'NO';
     
 }

 $where = ['id'=>$login[0]['accept_driver_id']];
 $login_d = $this->webservice_model->get_where('users',$where);
 
 if($login_d){
     $login_d[0]['user_image']=SITE_URL.'uploads/images/'.$login_d[0]['image'];
     $login[0]['driver_details']=$login_d[0];
     
 }else{
   $login[0]['driver_details']=(object)[];
   
}



$where_u = ['id'=>$login[0]['user_id']];
$login_u = $this->webservice_model->get_where('users',$where_u);
if($login_u){
 $login_u[0]['user_image']=SITE_URL.'uploads/images/'.$login_u[0]['image'];
 $login[0]['user_details']=$login_u[0];
}

$request_id = $this->input->get_post('request_id');

$login_image = $this->webservice_model->get_where('user_request_images',['request_id'=>$request_id]);
if($login_image){
    foreach($login_image as $val22)
    {
        
     
     $val22['image']=SITE_URL.'uploads/images/'.$val22['image'];  
     $login[0]['product_images'][]=$val22;
 }
 
}else{
 $login[0]['product_images']=[];
 
}



$clr_id = $login[0]['cart_id'];
$exp = explode(',',$clr_id);

$de=[];
foreach($exp as $val1)

{
    $id = $val1;
    $arr_get1 = "id = '$id'";
    
    $fetch1 = $this->webservice_model->get_where('add_to_cart', $arr_get1);
    


    $fetch2 = $this->webservice_model->get_where('category_service', ['id' =>$fetch1[0]['service_id']]);
    
    
    $fetch3 = $this->webservice_model->get_where('category', ['id' =>$fetch1[0]['cat_id']]);
    $fetch4 = $this->webservice_model->get_where('sub_category', ['id' =>$fetch1[0]['sub_cat_id']]);
    
    $fetch2[0]['quantity']=$fetch1[0]['quantity'];
    $fetch2[0]['total_amount']=$fetch1[0]['total_amount'];
    $fetch2[0]['cat_name']=$fetch3[0]['name'];
    $fetch2[0]['sub_cat_name']=$fetch4[0]['name'];
    
    

    $de[]=$fetch2[0];


    
}
$fetch33 = $this->webservice_model->get_where('user_address', ['id' =>$login[0]['address_id']]);
if($fetch33){
    $login[0]['address_details']=$fetch33[0];
}else{
    $login[0]['address_details']=(object)[];
    
}



         //////////


$request_id = $this->input->get_post('request_id');

$login_extra_service = $this->webservice_model->get_where('user_request_extra_service',['request_id'=>$request_id]);
if($login_extra_service){
    foreach($login_extra_service as $val55)
    {
        
     $login[0]['extra_service_list'][]=$val55;
 }
 
}else{
 $login[0]['extra_service_list']=[];
 
}



                                ////////////


$login[0]['service_details']=$de;


$ressult['result']=$login[0];
$ressult['message']='successfull';
$ressult['status']='1';
$json = $ressult;

}else{

    $json = ['result'=>(object)[],'status'=>'0','message'=>'Data Not Found'];

}

header('Content-type: application/json');
echo json_encode($json);
}      







/*************update_employee_available_status function *************/

public function update_employee_available_status(){

  $arr_get = ['id'=>$this->input->get_post('employee_id')];

  $login = $this->webservice_model->get_where('users',$arr_get);
  if ($login[0]['id'] == "")
  {
      $ressult['result']=(object)[];
      $ressult['message']='unsuccessfull';
      $ressult['status']='0';
      $json = $ressult;

      header('Content-type:application/json');
      echo json_encode($json);
      die;
  }

  

  $arr_data = [
    'available_status'=>$this->input->get_post('available_status')
    
];



$res = $this->webservice_model->update_data('users',$arr_data,$arr_get);
if ($res)
{
    $data = $this->webservice_model->get_where('users',$arr_get);
    
    
    $ressult['result']=$data[0];
    $ressult['available_status']=$data[0]['available_status'];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']=(object)[];
  $ressult['message']='unsuccessfull';
  $ressult['status']='0';
  $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);



}




/************* add_employee_rating_review function *************/

public function add_employee_rating_review(){


    $request_id = $this->input->get_post('request_id');
                               // $total_amount = $this->input->get_post('total_amount');


    $arr_data = [
        'form_id'=>$this->input->get_post('form_id'),
        'to_id'=>$this->input->get_post('to_id'),
        'request_id'=>$this->input->get_post('request_id'),
        'rating'=>$this->input->get_post('rating'),
        'feedback'=>$this->input->get_post('feedback'),
        'type'=>'DRIVER'
    ];
    
    


    $id = $this->webservice_model->insert_data('rating_review',$arr_data);


    if ($id=="") {

        $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];

    }else{


            //    $this->webservice_model->update_data('user_request',['total_amount'=>$total_amount,'payment_status'=>'Waiting'],['id'=>$request_id]);


        $arr_gets = ['id' => $id];
        
        
        $login = $this->webservice_model->get_where('rating_review',$arr_gets);   
        
        $ressult['result']=$login[0];
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
    }

    header('Content-type:application/json');
    echo json_encode($json);

}




/************* add_user_rating_review111 function *************/

public function add_user_rating_review11(){


    $request_id = $this->input->get_post('request_id');
    $status = 'Finish';


    $arr_data = [
        'form_id'=>$this->input->get_post('form_id'),
        'to_id'=>$this->input->get_post('to_id'),
        'request_id'=>$this->input->get_post('request_id'),
        'rating'=>$this->input->get_post('rating'),
        'feedback'=>$this->input->get_post('feedback'),
        'type'=>'USER'
    ];
    
    


    $id = $this->webservice_model->insert_data('rating_review',$arr_data);


    if ($id=="") {

        $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];

    }else{


              //  $this->webservice_model->update_data('user_request',['status'=>$status,'payment_status'=>'Complete'],['id'=>$request_id]);


        $arr_gets = ['id' => $id];
        
        
        $login = $this->webservice_model->get_where('rating_review',$arr_gets);   
        
        $ressult['result']=$login[0];
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
    }

    header('Content-type:application/json');
    echo json_encode($json);

}

/***************get_states_list *****************/
public
function get_states_list()
{  
 $country_id = '169'; 
        //   $user_id = $this->input->get_post('user_id', TRUE); 
 
 $fetch = $this->db->query("SELECT * FROM states WHERE country_id = $country_id")->result_array();


 if ($fetch){
  
    foreach($fetch as $val)
    {
     
     $ressult1[]=$val;
 }
 $data['result']=$ressult1;
 $data['message']='successfull';
 $data['status']='1';
 $json = $data;
}
else
{
    $data['result']=[];
    $data['message']='No Data Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}



/***************get_city_list *****************/
public
function get_city_list()
{  
          // $country_id = '169'; 
  $state_id = $this->input->get_post('state_id', TRUE); 
  
  $fetch = $this->db->query("SELECT * FROM city WHERE state_id = $state_id")->result_array();


  if ($fetch){
      
    foreach($fetch as $val)
    {
     
     $ressult1[]=$val;
 }
 $data['result']=$ressult1;
 $data['message']='successfull';
 $data['status']='1';
 $json = $data;
}
else
{
    $data['result']=[];
    $data['message']='No Data Found';
    $data['status']='0';
    $json = $data; 
}

header('Content-type: application/json');
echo json_encode($json);
}





/***************add_to_cart_service*****************/
public

function add_to_cart_service()
{
 $arr_login = array(
  'user_id' => $this->input->get_post('user_id', TRUE) ,
  'service_id' => $this->input->get_post('service_id', TRUE),
  'status' => 'Pending'

); 
 
 $arr_chk = array(
  'user_id' => $this->input->get_post('user_id', TRUE) ,
  'status' => 'Pending'

); 
 

 $arr_product = array(
  'user_id' => $this->input->get_post('user_id', TRUE) ,
  'service_id' => $this->input->get_post('service_id', TRUE) ,
  'total_amount' => $this->input->get_post('total_amount', TRUE) ,
  'cat_id' => $this->input->get_post('cat_id', TRUE),
  'sub_cat_id' => $this->input->get_post('sub_cat_id', TRUE),
  'quantity' => $this->input->get_post('quantity', TRUE)
);

 $fetch = $this->webservice_model->get_where('add_to_cart', $arr_login);
 
 
 if ($fetch)
 {
  $update_qua = $arr_product['quantity'] + $fetch[0]['quantity'];
  $update_total_amount = $arr_product['total_amount'] + $fetch[0]['total_amount'];

  $res = $this->webservice_model->update_data('add_to_cart',['quantity'=>$update_qua,'total_amount'=>$update_total_amount], $arr_login);
  
  $ressult['quantity']=$arr_product['quantity'];
  $ressult['result']="cart update successfull";
  $ressult['message']='successfull';
  $ressult['status']='1';
  $json = $ressult;
  header('Content-type: application/json');
  echo json_encode($json);
  die;
  
  

  

}

else{
    
    $id = $this->webservice_model->insert_data('add_to_cart',$arr_product);

    if($id=="") {
        $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
    }else{
     
       $ressult['quantity']=$arr_product['quantity'];
       $ressult['result']="add to cart successfull";
       $ressult['message']='successfull';
       $ressult['status']='1';
       $json = $ressult;
       header('Content-type: application/json');
       echo json_encode($json);
       die;

   }


}           


header('Content-type: application/json');
echo json_encode($json);
die;
}

/***************update_cart*****************/
public

function update_cart_service()
{
    
 $arr_login = array(
  'id' => $this->input->get_post('cart_id', TRUE) 
); 
 
 $arr_product = array( 
  'quantity' => $this->input->get_post('quantity', TRUE),
  'total_amount' => $this->input->get_post('total_amount', TRUE)
);

 $fetch = $this->webservice_model->get_where('add_to_cart', $arr_login);
 
 
 if ($fetch)
 {
     
    $update_qua = $arr_product['quantity'];

    $res = $this->webservice_model->update_data('add_to_cart',$arr_product, $arr_login);
    
    
    $ressult['quantity']=$update_qua;

    $ressult['result']="cart update successfull";
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
    
}else{
  
  $ressult['result'] = 'unsuccessful';
  $ressult['message'] = 'unsuccessful';
  $ressult['status'] = '0';
  $json = $ressult;
}
header('Content-type: application/json');
echo json_encode($json);
die;

}


/*************  get_cart_service *************/
public

function get_cart_service()
{
 $arr_login = array(
  'user_id' => $this->input->get_post('user_id', TRUE) ,
  'status' => 'Pending'

); 
 $user_id = $this->input->get_post('user_id', TRUE);
 
 $fetch = $this->webservice_model->get_where('add_to_cart', $arr_login);
 
 
 
 if ($fetch)
 {
     foreach($fetch as $val)

     {
       $where1 = ['id'=>$val['service_id']];
       $fetch1 = $this->webservice_model->get_where('category_service',$where1);
        // $fetch1[0]['image1'] = SITE_URL . 'uploads/images/' . $fetch1[0]['image1'];
       $val['service_details'] = $fetch1[0];
       
       
       

       $data[] = $val;
   }
   $total_amount = $this->db->query("SELECT sum(total_amount)as total_amount FROM `add_to_cart` where user_id = $user_id and status = 'Pending'")->result_array(); 
   if($total_amount>=0){
       $ressult['total_amount'] = $total_amount[0]['total_amount'];

   }else{
       $ressult['total_amount'] = 0;

   }
   $user_id = $this->input->get_post('user_id');
   $add_to_cart = $this->db->query("select COUNT(id) AS total_cart from add_to_cart where user_id = $user_id AND status = 'Pending'")->result_array();

   $ressult['total_cart']=$add_to_cart[0]['total_cart'];
   
   $ressult['result'] = $data;
   $ressult['message'] = 'successful';
   $ressult['status'] = '1';
   $json = $ressult;
}
else
{
    $ressult['result'] = [];
    $ressult['message'] = 'unsuccessful';
    $ressult['status'] = '0';
    $json = $ressult;
}

header('Content-type: application/json');
echo json_encode($json);
}



/************* delete_cart_service *************/
public

function delete_cart_service()
{
  $id = $this->input->get_post('cart_id');
  $list = $this->webservice_model->get_where('add_to_cart',['id'=>$id]);

  if ($list)
  {
    $this->webservice_model->delete_data('add_to_cart',['id'=>$id]);

    $ressult['result']="Item delete successfull";
    $ressult['message']='successful';
    $ressult['status']='1';
    $json = $ressult;
}
else
{
  $ressult['result']='unsuccessful';
  $ressult['message']='unsuccessful';
  $ressult['status']='0';
  $json = $ressult;                              
  
}



header('Content-type: application/json');
echo json_encode($json);
}

/************* add_user_request1 function *************/

public function add_user_request1(){

  $user_id = $this->input->get_post('user_id', TRUE);
  $lat = $this->input->get_post('lat', TRUE);
  $lon = $this->input->get_post('lon', TRUE);
  $address_id = $this->input->get_post('address_id', TRUE);
  $total_amount = $this->input->get_post('total_amount', TRUE);
  $payment_type = $this->input->get_post('payment_type', TRUE);


  $get_admin_comm = $this->webservice_model->get_all('admin');

  $admin_commission = $get_admin_comm[0]['commision'];

  $admin_commission =  ($total_amount * $admin_commission)/100;

  $provider_commission =  ($total_amount - $admin_commission);

  if($admin_commission > 0){
    $admin_commission = $admin_commission;
}else{
    $admin_commission = 0;
}

if($provider_commission > 0){
    $provider_commission = $provider_commission;
}else{
    $provider_commission = 0;
}

$offer_amount =  $this->input->get_post('offer_amount', TRUE);

if($offer_amount){
    $offer_amount = $offer_amount;
}else{
    $offer_amount = 0;
    
}
$get_place_order = $this->db->query("select * from user_request order by id desc")->result_array();
if($get_place_order){
    $unique_code = $get_place_order[0]['id'] + 1;

}else{
    $unique_code = 1;

}$type = "";
if($type == 'IOS'){
    $unique_code = '1-00'.$unique_code;
}else{
 $unique_code = '2-00'.$unique_code;
 
}


$add_to_cart = $this->webservice_model->get_where('add_to_cart',['user_id'=>$user_id,'status'=>'Pending']);

if($add_to_cart){
    $i = 0; $ids1 = '';
    $idc = '';

    foreach($add_to_cart as $val)
    {
     if($ids1 == ''){
        $ids1 = $val['id'];
    }else{

       $ids1 = $ids1.','.$val['id'];
   }
}
}else{
    $ressult['result']=(object)[];
    $ressult['message']='Cart is Empty';
    $ressult['status']='0';
    $json = $ressult; 
    
    header('Content-type:application/json');
    echo json_encode($json);die;
    

}

$arr_data = [
    'user_id'=>$this->input->get_post('user_id'),
    'title'=>$this->input->get_post('title'),
    'cart_id' => $ids1, 
    'date'=>$this->input->get_post('date'),
    'time'=>$this->input->get_post('time'),
    'supplier_status'=>$this->input->get_post('supplier_status'),
    'address_id'=>$this->input->get_post('address_id'),
    'address'=>$this->input->get_post('address'),
    'unique_code'=>$unique_code,
    'total_amount' => $this->input->get_post('total_amount', TRUE), 
    'provider_amount' => $provider_commission, 
    'admin_commission' => $admin_commission, 
    'offer_amount' => $offer_amount, 
    'lat'=>$this->input->get_post('lat'),
    'lon'=>$this->input->get_post('lon'),
    'description'=>$this->input->get_post('description'),
    'offer_code'=>$this->input->get_post('offer_code'),
    'required_hour'=>$this->input->get_post('required_hour'),
    'required_worker'=>$this->input->get_post('required_worker'),
    'offer_id'=>$this->input->get_post('offer_id'),
    'payment_type'=>$this->input->get_post('payment_type')
];




$category_id = $add_to_cart[0]['cat_id'];
$fetch = $this->db->query("SELECT * FROM users WHERE FIND_IN_SET('$category_id', `cat_id`) AND type = 'PROVIDER' AND status = 'Active' ")->result_array();
//print_r($fetch);die;
if($fetch)
{ 
    if($payment_type == 'Card'){
        
      $id = $this->webservice_model->insert_data('user_request',$arr_data);

      
      
      
      $arr_gets = ['id'=>$id];
      $login = $this->webservice_model->get_where('user_request',$arr_gets); 
      
      $request_id = $login[0]['id'];
      
      $cart_ids = $login[0]['cart_id'];
      
                        //  $this->webservice_model->update_data('add_to_cart',['status'=>'Pending'],"id IN($cart_ids)");
                       //   $this->webservice_model->update_data('user_request',['payment_status'=>'Complete'],['id'=>$request_id]);
      
      
      if (isset($_FILES['product_images']))
      {


         $product_images = $_FILES['product_images']['name'];
         
         $i=0;
         foreach($product_images AS $name){
             
           $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
           $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
           move_uploaded_file($_FILES['product_images']['tmp_name'][$i], "uploads/images/" . $img);
                /* if($i==0){
                   $arr_data = ['image'=> $img];
                   $res = $this->webservice_model->update_data('product', $arr_data, $arr_gets);                   
               }*/
               $img_data = ['request_id'=>$request_id,'image'=>$img];
               $this->webservice_model->insert_data('user_request_images',$img_data);
               $i++;

           }
           
       }
       
       
       $ressult['result']=$login[0];
       $ressult['message']='successfull';
       $ressult['status']='1';
       $json = $ressult;

       
       header('Content-type:application/json');
       echo json_encode($json);die;
       
   }
   
   
   
   
   $user_distance = "10000000";

   $i = 0; $ids = '';
   foreach($fetch as $val)
   { 
       if(!$val['lat']=="" && !$val['lon']==""){
          $distance = $this->webservice_model->distance($lat, $lon, $val['lat'], $val['lon'], $miles = false);                       
          if($user_distance >= $distance){
            if($ids == ''){
                $ids = $val['id'];
            }else{

               $ids = $ids.','.$val['id'];
           }

           $i++;
           $key ="New booking request";
                             // send notification for Andriod
           date_default_timezone_set('America/New_York');
           $date_time =  date('Y-m-d H:i:s');
           
           
           $user_message_apk = array(
               "message" => array(
                   "result" => "successful",
                   "key" => $key,
                   "title" => $key,
                   "alert" => $key,
                   "message" => $key,
                   "pickup_lat" => $lat,
                   "pickup_lon" => $lon,
                   "pick_address" => $address_id,
                   "user_id" => $user_id,
                   "unique_code" => $unique_code,
                   "date"=> $date_time
               )
           );
           
           $register_userid = array($val['register_id']);
           $this->webservice_model->user_apk_notification($register_userid, $user_message_apk);
           $this->webservice_model->ios_provider_notification_new($val['ios_register_id'],$user_message_apk['message']); 
                        // end send notification for Andriod    

       }
   }
}


$arr_data['driver_id'] = $ids;




}else{
  
 $ressult['result']=(object)[];
 $ressult['message']='No provider available in your area';
 $ressult['status']='0';
 $json = $ressult; 
 
 header('Content-type:application/json');
 echo json_encode($json);die;
 
 
 

 
}
$id = $this->webservice_model->insert_data('user_request',$arr_data);


if ($id=="") {
    $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];
}else{
   
   
   
 
    
    $arr_gets = ['id'=>$id];
    $login = $this->webservice_model->get_where('user_request',$arr_gets); 
    
    $request_id = $login[0]['id'];
    
    $cart_ids = $login[0]['cart_id'];
    
    $this->webservice_model->update_data('add_to_cart',['status'=>'Complete'],"id IN($cart_ids)");
    $this->webservice_model->update_data('user_request',['payment_status'=>'Complete'],['id'=>$request_id]);
    
    
    if (isset($_FILES['product_images']))
    {


     $product_images = $_FILES['product_images']['name'];
     
     $i=0;
     foreach($product_images AS $name){
         
       $n = rand(0, 100000);
                 //$ext = end(explode(".",$name));
       $img = "REQUEST_images_" . date('Ymdhis') . '_' . $n . '.png';
       move_uploaded_file($_FILES['product_images']['tmp_name'][$i], "uploads/images/" . $img);
                /* if($i==0){
                   $arr_data = ['image'=> $img];
                   $res = $this->webservice_model->update_data('product', $arr_data, $arr_gets);                   
               }*/
               $img_data = ['request_id'=>$request_id,'image'=>$img];
               $this->webservice_model->insert_data('user_request_images',$img_data);
               $i++;

           }
           
       }
       
       
       $ressult['result']=$login[0];
       $ressult['message']='successfull';
       $ressult['status']='1';
       $json = $ressult;
   }

   header('Content-type:application/json');
   echo json_encode($json);

}





/************* add_withdraw_request function *************/

public function add_withdraw_request(){

 $arr_data = [
    'user_id'=>$this->input->get_post('user_id'),
    'amount'=>$this->input->get_post('amount'),
    'branch'=>$this->input->get_post('branch'),
    'account_holder_name'=>$this->input->get_post('account_holder_name'),
    'account_number'=>$this->input->get_post('account_number'),
    'ifsc_code'=>$this->input->get_post('ifsc_code'),
    'description'=>$this->input->get_post('description'),
];




$id = $this->webservice_model->insert_data('withdraw_request',$arr_data);


if ($id=="") {

    $json = ['result'=>(object)[],'status'=>'0','message'=>'data not found'];

}else{


    $arr_gets = ['id' => $id];
    
    
    $login = $this->webservice_model->get_where('withdraw_request',$arr_gets);   
    
    $ressult['result']=$login[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;
}

header('Content-type:application/json');
echo json_encode($json);

}











/*************  test_notification *************/
public

function test_notification()
{           
 
  $ios_id =  'czB9V3YKmUqopYKaiQ3SoR:APA91bFMS6BrgYFnr5ecPEa4RoKqEP1bUlLjDyf1xLDgxdPQDeM8inK0eGk0h-DwgcLdb_Ytsz_IDuaDfNbN4U_zgCPl9dzmSXcOEHF1nhpHdo6YcazPAbaUtvntJJC39AXPQ_hV5j4G';



  $key ="test";
  $user_message_apk = array(
   "message" => array(
       "result" => "successful",
       "key" => $key,
       "title" => $key,
       "ios_status" => $key,
       "alert" => $key,
       "message" => $key,
       "pickup_lat" => $key,
       "pickup_lon" => $key,
       "pick_address" => $key,
       "user_id" => $key,
       "unique_code" => $key,
       "date"=>$key
   )
);
  
  $this->webservice_model->ios_provider_notification_new($ios_id,$user_message_apk['message']); 
  
  $data['result']='successfull';
  $data['message']='successfull';
  $data['status']='1';
  $json = $data;
  
  header('Content-type: application/json');
  echo json_encode($json);die;
}
    /////////////////////////////////////////////////////////////////////////Vegotta Vegotta Vegotta Vegotta Vegotta




  // end class

}

?>
