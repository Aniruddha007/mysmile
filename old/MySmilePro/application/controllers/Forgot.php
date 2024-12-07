<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Forgot extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->dataToSend = array();		
		$this->dataToSend['status'] = 'OK';
		$this->load->model('webservice_model');
	}

	public function forgotpassword() {
		print_r($_POST);
		die();
		$email = trim($this->input->post('user_email'));
		if ($email == '') {
			$this->dataToSend['status'] = 'error';
			$this->dataToSend['msg'] = 'Please enter your email address.';
			echo json_encode($this->dataToSend);
			die();

		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->dataToSend['status'] = 'error';
			$this->dataToSend['msg'] = 'Invalid email address.';
			echo json_encode($this->dataToSend);
			die();
		}

		$condition =  array('email'=>$email);

		$isExist = $this->webservice_model->get_where('users',$condition);
		echo "<pre>",print_r($isExist);
		die();

		if ($isExist) {
			$res 		= $this->common->getSelectDataWithCondition('client_tbl','*',$condition)[0];
			$otp = mt_rand(100000, 999999);
			$data['email'] = $res['client_email'];
			$data['otp'] = $otp;
            $data['expire_on'] = date('Y-m-d H:i:s', strtotime("2 HOURS")); //"DATE_ADD(NOW(),INTERVAL 2 HOUR)";
            $insres = $this->db->insert('dw_forgot_password', $data);

            if ($insres>0) {

            	$to = $res['client_email'];
            	$subject = "Reset Password | Josso Courier Delivery";

            	$replace = array("[%NAME%]", "[%OTP%]");
            	$replace_with = array(ucwords($res['client_name']), $otp);
            	$data = $this->load->view('forgot/user_forgot_password', '', TRUE);
            	$message = str_replace($replace, $replace_with, $data);

            	$para = array(
            		'to'=>$to,
            		'subject'=>$subject,
            		'message'=>$message,
            	);

            	sendMail($para);

            	$this->dataToSend['status'] = 'OK';
            	$this->dataToSend['msg'] = 'Please check your Email for OTP.';
            	echo json_encode($this->dataToSend);
            	die();
            }

        } else{
        	$this->dataToSend['status'] = 'error';
        	$this->dataToSend['msg'] = 'Email not registered !';
        	echo json_encode($this->dataToSend);
        	die();	
        }

    }

    public function reset_password() {
    	$email = trim($this->input->post('pick_up_email'));
    	$otp = trim($this->input->post('otp'));
    	$newpassword = trim($this->input->post('password'));

    	if ($email == '') {
    		$this->dataToSend['status'] = 'error';
    		$this->dataToSend['msg'] = 'Please enter your email address.';
    		echo json_encode($this->dataToSend);
    		die();
    	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    		$this->dataToSend['status'] = 'error';
    		$this->dataToSend['msg'] = 'Invalid email address.';
    		echo json_encode($this->dataToSend);
    		die();

    	}

    	if (strlen($otp) !=6 || !is_numeric($otp) || $otp == '') {
    		$this->dataToSend['status'] 	=	'error';
    		$this->dataToSend['msg'] 		=	'Invalid Otp';
    		echo json_encode($this->dataToSend);
    		die();
    	}

    	if ($newpassword == '') {
    		$this->dataToSend['status'] = 'error';
    		$this->dataToSend['msg'] = 'Please enter your new password.';
    		echo json_encode($this->dataToSend);
    		die();

    	}

    	$newpassword = MD5($newpassword);

    	$res = $this->common->check_otp_update_pwd($email, $otp, $newpassword);

    	if (!$res) {
    		$this->dataToSend['status'] = 'error';
    		$this->dataToSend['msg'] = 'OTP invalid or expired!';
    		echo json_encode($this->dataToSend);
    		die();	
    	} else {
    		$this->dataToSend['status'] = 'OK';
    		$this->dataToSend['msg'] = 'Password reset successfully.';
    		echo json_encode($this->dataToSend);
    		die();
    	}
    }
}

