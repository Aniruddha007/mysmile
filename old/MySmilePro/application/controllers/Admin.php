<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define("SITE_URL", 'http://localhost:8082/MySmilePro/');

class Admin extends CI_Controller {
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  function upt_user_stts() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("users",['status'=>$status],['id'=>$id]);

  }
  
  function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('admin/authentication_model');                
    $this->load->model('admin/admin_common_model');
    $this->load->library(array('form_validation','session'));
    $this->load->helper('string');
    $this->load->model('Webservice_model');
    error_reporting(0);
    define("SITE_EMAIL",'dave.f.inga@gmail.com'); 
  }

  public function index() {
    $this->load->view('admin/index');
  }


  public function dashboard() {
    $this->load->view('admin/dashboard');
  }
  
  public function view_page($page) {
   $this->load->view('admin/'.$page);
  }

  function goProDe() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',',$_POST['checked_id']);
      // $delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if($idStr) {
        $delete = $this->db->query("DELETE FROM users WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/driver_list_deactive');
    }

    if ($_POST['APPROVE'] == 'APPROVE') {
      $idStr = implode(',',$_POST['checked_id']);
      if($idStr){
        $delete = $this->db->query("UPDATE users set status = 'Active' WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/driver_list_deactive');
    }

    if ($_POST['DISAPPROVE'] == 'DISAPPROVE') {
      $idStr = implode(',',$_POST['checked_id']);
      if ($idStr) {
        $delete = $this->db->query("UPDATE users set status = 'Deactive' WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/driver_list_deactive');
    }
  }

  function goPro() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM users WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/driver_list');
    }

    if ($_POST['APPROVE'] == 'APPROVE') {
      $idStr = implode(',', $_POST['checked_id']);
      if ($idStr) {
        $delete = $this->db->query("UPDATE users set status = 'Active' WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/driver_list');
    }

    if ($_POST['DISAPPROVE'] == 'DISAPPROVE') {
      $idStr = implode(',', $_POST['checked_id']);
      if ($idStr) {
        $delete = $this->db->query("UPDATE users set status = 'Deactive' WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/driver_list');
    }
  }

  function goOffer() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $result = $this->admin_common_model->get_where('coupons', ['id' => $idStr]);
        $c_new = $result[0]['code'];
        $delete = $this->db->query("DELETE FROM coupons WHERE code = '$c_new'");
        $delete = $this->db->query("DELETE FROM notification WHERE code = '$c_new'");
      }
      redirect('admin/view_page/couponList');
    }
  }

  function goProService() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM provider_services WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/category_service_list');
    }
  }

  function goRequest1() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM user_request WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/pending_ride');
    }
  }

  function goRequest2() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //print_r($idStr);die;
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        //echo"hello";die;
        $delete = $this->db->query("DELETE FROM user_request WHERE id IN ($idStr)");
      }
      
      redirect('admin/view_page/just_booked');
    }
  }

  function goRequest3() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM user_request WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/complete_ride');
    }
  }

  function goRequest4() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM user_request WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/cancel_ride');
    }
  }

  function goAdminNoti() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM notification WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/adminNoti_list');
    }
  }

  function goUserNoti() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //print_r($idStr);die;
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $user_d = $this->admin_common_model->get_where('notification', ['id' => $idStr]);
        $code = $user_d[0]['code'];
        $delete = $this->db->query("DELETE FROM notification WHERE code IN ($code)");
      }
      redirect('admin/view_page/userNoti_list');
    }
  }

  function goUser() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //print_r($idStr);die;
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM users WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/user_list');
    }
  }

  function goDriverNoti() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //print_r($idStr);die;
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $user_d = $this->admin_common_model->get_where('notification', ['id' => $idStr]);
        $code = $user_d[0]['code'];
        $delete = $this->db->query("DELETE FROM notification WHERE code IN ($code)");
      }
      redirect('admin/view_page/driverNoti_list');
    }
  }

  function goFeedback1() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //print_r($idStr);die;
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM rating_review WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/feedback_list1');
    }
  }

  function goFeedback() {
    if ($_POST['DELETE'] == 'DELETE') {
      $idStr = implode(',', $_POST['checked_id']);
      //print_r($idStr);die;
      //$delete = $this->$db->query("DELETE FROM users WHERE id IN ($idStr)");
      if ($idStr) {
        $delete = $this->db->query("DELETE FROM rating_review WHERE id IN ($idStr)");
      }
      redirect('admin/view_page/feedback_list');
    }
  }

  public function upt_provider_profile_details() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');

    if ($status == 'Active') {
      $user_d = $this->admin_common_model->get_where('user_update', ['id' => $id]);
      $store_id = $user_d[0]['store_id'];
      $user_p = $this->admin_common_model->get_where('users', ['id' => $store_id]);

      if ($user_d[0]['store_logo']) {
        $store_logo = $user_d[0]['store_logo'];
      } else {
        $store_logo = $user_p[0]['store_logo'];
      }

      if ($user_d[0]['store_cover_image']) {
        $store_cover_image = $user_d[0]['store_cover_image'];
      } else {
        $store_cover_image = $user_p[0]['store_cover_image'];
      }

      $arr_data = [
        'first_name' => $user_d[0]['first_name'],
        'last_name' => $user_d[0]['last_name'],
        'email' => $user_d[0]['email'],
        'store_name' => $user_d[0]['store_name'],
        'tax_number' => $user_d[0]['tax_number'],
        'address' => $user_d[0]['address'],
        'lat' => $user_d[0]['lat'],
        'lon' => $user_d[0]['lon'],
        'gender_type' => $user_d[0]['gender_type'],
        'cat_id' => $user_d[0]['cat_id'],
        'cat_name' => $user_d[0]['cat_name'],
        'indoor_service' => $user_d[0]['indoor_service'],
        'outdoor_service' => $user_d[0]['outdoor_service'],
        'about_store' => $user_d[0]['about_store'],
        'licence_id' => $user_d[0]['licence_id'],
        'licence_issue_date' => $user_d[0]['licence_issue_date'],
        'licence_expire_date' => $user_d[0]['licence_expire_date'],
        'bank_name' => $user_d[0]['bank_name'],
        'Iban_id' => $user_d[0]['Iban_id'],
        'account_number' => $user_d[0]['account_number'],
        'store_logo' => $store_logo,
        'store_cover_image' => $store_cover_image,
      ];

      $this->admin_common_model->update_data("users", $arr_data, ['id' => $store_id]);
      $this->admin_common_model->update_data("user_update", ['status' => $status], ['id' => $id]);

      // send notification for Android
      $key = "your profile details has been approved by admin";
      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "date" => date('Y-m-d h:i:s')
        )
      );

      $user_message_apk_ios = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "ios_status" => $key,
          "title" => $key,
          "message" => $key,
          "user_id" => '',
          "provider_id" => '',
          "category_name" => '',
          "user_name" => '',
          "receiver_id" => '',
          "request_id" => ''
        )
      );

      $register_userid = array($user_p[0]['register_id']);
      $this->admin_common_model->driver_apk_notification($register_userid, $user_message_apk);
      $this->admin_common_model->ios_provider_notification_new($user_p[0]['ios_register_id'], $user_message_apk_ios['message']);
      // end send notification for Android
    }
  }

  public function remove_status() {
    $table = $this->input->post('table');
    $id = $this->input->post('id');

    $this->admin_common_model->update_data($table, ['remove_status' => 'Yes'], ['id' => $id]);

    // $this->admin_common_model->delete_data($table,['id'=>$id]);
  }

  public function update_noti_status() {
    $table = 'notification';
    $id = $this->input->post('id');

    $this->admin_common_model->update_data($table, ['seen_status' => 'SEEN'], ['notification_type' => 'Profile']);

    // $this->admin_common_model->delete_data($table,['id'=>$id]);
  }

  function get_sub_category() {
    $category_id = $_POST['category_id'];
    $result = $this->admin_common_model->get_where('sub_category', ['category_id' => $category_id]);
    echo "<option value=''>Select Subcategory</option>";
    foreach ($result as $val) {
      echo "<option value='" . $val['id'] . "'>" . $val['name'] . "</option>";
    }
  }

  public function go() {
    $result = $this->authentication_model->admin_login();
    // echo $result;die;
    if ($result == '0') {
      // echo $result;die;
      $msg = array(
        'msg' => '<strong>Error!</strong> Invalid Username and Password. Log in failed.',
        'res' => 0
      );
      $this->session->set_userdata($msg);
      redirect('admin');
    } else if ($result == '2') {
      // echo $result;die;
      $msg = array(
        'msg' => '<strong>Error!</strong> Wait for admin approval.',
        'res' => 0
      );
      $this->session->set_userdata($msg);
      redirect('admin');
    } else {
      // echo $result;die;
      redirect('admin/dashboard', $message);
    }
  }

  public function admin_logout() {
    $this->session->unset_userdata('admin');
    return redirect('admin');   
  }

  function update_category_status() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("category", ['status' => $status], ['id' => $id]);
  }

  function upt_block_unblock() {
    $block_unblock = $this->input->post('block_unblock');
    $id = $this->input->post('id');

    $this->admin_common_model->update_data("users", ['block_unblock' => $block_unblock], ['id' => $id]);

    // send notification for Android
    $arr_get1 = ['id' => $id];
    $login1 = $this->admin_common_model->get_where('users', $arr_get1);

    if ($block_unblock == 'Block') {
      $key = "your account has been Blocked by admin";
      $key1 = "Blocked by admin";
    } else {
      $key = "your account has been Unblocked by admin";
      $key1 = "Unblocked by admin";
    }

    $user_message_apk = array(
      "message" => array(
        "result" => "successful",
        "key" => $key,
        "date" => date('Y-m-d h:i:s')
      )
    );

    $user_message_apk_ios = array(
      "message" => array(
        "result" => "successful",
        "key" => $key,
        "ios_status" => $key,
        "title" => $key,
        "message" => $login1[0]['note_block'],
        "user_id" => '',
        "provider_id" => '',
        "category_name" => '',
        "user_name" => '',
        "receiver_id" => '',
        "request_id" => ''
      )
    );

    $register_userid = array($login1[0]['register_id']);
    $this->admin_common_model->driver_apk_notification($register_userid, $user_message_apk);
    $this->admin_common_model->ios_provider_notification_new($login1[0]['ios_register_id'], $user_message_apk_ios['message']);
    $this->admin_common_model->ios_user_notification_new($login1[0]['ios_register_id'], $user_message_apk_ios['message']);

    if ($login1[0]['type'] == 'USER') {
      $arr_data_noti = [
        'user_id' => $login1[0]['id'],
        'request_id' => '',
        'title' => $key1,
        'type' => "USER",
        'message' => $key,
        'notification_type' => 'Note',
      ];
      $this->admin_common_model->insert_data('notification', $arr_data_noti);
    } else {
      $arr_data_noti = [
        'user_id' => $login1[0]['id'],
        'request_id' => '',
        'title' => $key1,
        'type' => "DRIVER",
        'message' => $key,
        'notification_type' => 'Note',
      ];
      $this->admin_common_model->insert_data('notification', $arr_data_noti);
    }
    // end send notification for Android  
  }

  function upt_drvr_stts() {
    $accept_driver_id = $this->input->post('accept_driver_id');
    $id = $this->input->post('id');
    $arr_get = ['id' => $id];
    $login = $this->admin_common_model->get_where('user_request', $arr_get);
    $arr_get1 = ['id' => $this->input->post('id')];
    if ($login[0]['status'] == 'Cancel') {
      echo "false";
      // redirect('admin/view_page/pending_ride');
    } else {
      $this->admin_common_model->update_data("user_request", ['accept_driver_id' => $accept_driver_id, 'driver_id' => $accept_driver_id, 'status' => 'Accept'], ['id' => $id]);

      // send notification for Android driver
      $arr_get1 = ['id' => $accept_driver_id];
      $login1 = $this->admin_common_model->get_where('users', $arr_get1);

      $distance = $this->admin_common_model->distance($login1[0]['lat'], $login1[0]['lon'], $login[0]['pick_lat'], $login[0]['pick_lon'], $miles = false);
      $distance = number_format($distance, 2, '.', '');

      $key = "New Booking";
      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "pickup_lat" => $login[0]['pickup_lat'],
          "pickup_lon" => $login[0]['pickup_lon'],
          "dropoff_lat" => $login[0]['dropoff_lat'],
          "dropoff_lon" => $login[0]['dropoff_lon'],
          "pick_address" => $login[0]['pick_address'],
          "drop_address" => $login[0]['drop_address'],
          "username" => $login1[0]['first_name'],
          "mobile" => $login1[0]['mobile'],
          "user_image" => SITE_URL . 'uploads/images/' . $login1[0]['image'],
          "driver_id" => $accept_driver_id,
          "request_id" => $id,
          "distance" => '0.3',//$distance,
          "diff_second" => '0',
          "date" => date('Y-m-d h:i:s')
        )
      );

      $register_userid = array($login1[0]['register_id']);
      $this->admin_common_model->driver_apk_notification($register_userid, $user_message_apk);

      // send notification for Android user
      $arr_get = ['id' => $id];
      $login = $this->admin_common_model->get_where('user_request', $arr_get);

      $arr_get1 = ['id' => $login[0]['user_id']];
      $login1 = $this->admin_common_model->get_where('users', $arr_get1);

      $distance = $this->admin_common_model->distance($login1[0]['lat'], $login1[0]['lon'], $login[0]['pick_lat'], $login[0]['pick_lon'], $miles = false);
      $distance = number_format($distance, 2, '.', '');

      $key = "Your request is assigned so please wait for Driver";
      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "pickup_lat" => $login[0]['pickup_lat'],
          "pickup_lon" => $login[0]['pickup_lon'],
          "dropoff_lat" => $login[0]['dropoff_lat'],
          "dropoff_lon" => $login[0]['dropoff_lon'],
          "pick_address" => $login[0]['pick_address'],
          "drop_address" => $login[0]['drop_address'],
          "username" => $login1[0]['first_name'],
          "mobile" => $login1[0]['mobile'],
          "user_image" => SITE_URL . 'uploads/images/' . $login1[0]['image'],
          "driver_id" => $accept_driver_id,
          "request_id" => $id,
          "distance" => $distance,
          "diff_second" => '0',
          "date" => date('Y-m-d h:i:s')
        )
      );

      $register_userid = array($login1[0]['register_id']);
      $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);

      echo 'true';
      // end send notification for Android driver
      // redirect('admin/view_page/pending_ride');
    }
  }

  function upt_plan_type() {
    $plan_type = $this->input->post('plan_type');
    $id = $this->input->post('id');

    $arr_get1 = ['id' => $this->input->post('id')];
    $arr_get_user = ['id' => $id];
    $login_user = $this->admin_common_model->get_where('users', $arr_get_user);

    $arr_get_plan = ['id' => $plan_type];
    $login_plan = $this->admin_common_model->get_where('plan_type', $arr_get_plan);

    $current_date = date('Y-m-d H:i:s');
    $days = $login_plan[0]['day'];
    $exp_date = date("Y-m-d H:i:s", strtotime(" +" . $days . " days"));

    // send notification for user driver
    $key = "New Plan Activate";
    $user_message_apk = array(
      "message" => array(
        "result" => "successful",
        "key" => $key,
        "plan" => $login_plan[0]['plan_type'],
        "expire_date" => $exp_date,
        "date" => date('Y-m-d h:i:s')
      )
    );

    $register_userid = array($login_user[0]['register_id']);

    // end send notification for Android user
    if ($plan_type == '') {
      $this->admin_common_model->update_data("users", ['plan_type' => '', 'exp_date' => ''], ['id' => $id]);
    } else {
      // $exp_date = '';
      $this->admin_common_model->update_data("users", ['plan_type' => $plan_type, 'exp_date' => $exp_date], ['id' => $id]);
      $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
    }

    redirect('admin/view_page/user_list');
  }

  function upt_refund_status() {
    $refund_status = $this->input->post('refund_status');
    $id = $this->input->post('id');
    $arr_refund_status = ['id' => $refund_status];
    $login_refund_status = $this->admin_common_model->get_where('user_request', $arr_refund_status);
    $this->admin_common_model->update_data("user_request", ['refund_status' => $refund_status], ['id' => $id]);
    redirect('admin/view_page/cancel_ride_refund');
  }

  public function find_location() {
    $locaion = $this->input->get_post('locaion');
    $type = $this->input->get_post('type');
    if ($type == 'USER') {
      $data['lat'] = $this->input->get_post('lat');
      $data['lon'] = $this->input->get_post('lon');
      $this->load->view('admin/map_avail_users', $data);
    } else {
      $data['lat'] = $this->input->get_post('lat');
      $data['lon'] = $this->input->get_post('lon');
      $this->load->view('admin/map_avail_drivers', $data);
    }
  }

  function upt_driver_stts() {
    $status = $this->input->post('available_status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("users",['available_status'=>$status],['id'=>$id]);
  }	

  function upt_driver_stts1_users_update() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $arr_get_user = ['id' => $id];
    $login_request = $this->admin_common_model->get_where('users_update', $arr_get_user);
    $user_id = $login_request[0]['user_id'];
    $check_user = ['id' => $user_id];
    $login_user = $this->admin_common_model->get_where('users', $check_user);
    $first_name = $login_request[0]['first_name'] ?? $login_user[0]['first_name'];
    $last_name = $login_request[0]['last_name'] ?? $login_user[0]['last_name'];
    $image = $login_request[0]['image'] ?? $login_user[0]['image'];
    $registration_no = $login_request[0]['registration_no'] ?? $login_user[0]['registration_no'];
    $licence_image = $login_request[0]['licence_image'] ?? $login_user[0]['licence_image'];
    $vehicle_image = $login_request[0]['vehicle_image'] ?? $login_user[0]['vehicle_image'];
    $vehicle_insura_image = $login_request[0]['vehicle_insura_image'] ?? $login_user[0]['vehicle_insura_image'];
    $registration_image = $login_request[0]['registration_image'] ?? $login_user[0]['registration_image'];
    $update_user = [
      'first_name' => $first_name,
      'last_name' => $last_name,
      'image' => $image,
      'image' => $image,
      'licence_image' => $licence_image,
      'vehicle_image' => $vehicle_image,
      'vehicle_insura_image' => $vehicle_insura_image,
      'registration_image' => $registration_image
    ];

    $this->admin_common_model->update_data("users", $update_user, $check_user);
    $this->admin_common_model->update_data("users_update", ['status' => $status], ['id' => $id]);
  }

  function upt_driver_stts_request() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("user_request_to_doctor", ['status' => $status], ['id' => $id]);
  }

  function upt_driver_stts_request_p() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');

    $arr_get_user = ['id' => $id];
    $login_request = $this->admin_common_model->get_where('plan_request', $arr_get_user);

    $arr_get_user = ['id' => $login_request[0]['user_id']];
    $login_user = $this->admin_common_model->get_where('users', $arr_get_user);

    if ($status == 'Accept') {
      //////

      $arr_get_plan = ['id' => $login_request[0]['plan_id']];
      $login_plan = $this->admin_common_model->get_where('plan_type', $arr_get_plan);

      $current_date = date('Y-m-d H:i:s');
      $days = $login_plan[0]['day'];
      $exp_date = date("Y-m-d H:i:s", strtotime(" +" . $days . "days"));

      // send notification for user driver
      $key = "New Plan Activate";
      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "plan" => $login_plan[0]['plan_type'],
          "expire_date" => $exp_date,
          "date" => date('Y-m-d h:i:s')
        )
      );

      $register_userid = array($login_user[0]['register_id']);

      // end send notification for Andriod user
      $this->admin_common_model->update_data("users", ['plan_type' => $login_request[0]['plan_id'], 'exp_date' => $exp_date], ['id' => $login_request[0]['user_id']]);
      $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);

      ///////
    }

    $this->admin_common_model->update_data("plan_request", ['status' => $status], ['id' => $id]);
  }

  function upt_driver_stts123() {
    $status = $this->input->post('payment_verified');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("user_request", ['payment_verified' => $status], ['id' => $id]);
    $arr_get_user = ['id' => $id];
    $login_request = $this->admin_common_model->get_where('user_request', $arr_get_user);
    $arr_get_user = ['id' => $login_request[0]['user_id']];
    $login_user = $this->admin_common_model->get_where('users', $arr_get_user);
    // send notification for user driver
    if ($status == 'Unverified') {
      $key = "Payment not paid";
      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "request_id" => $id,
          "date" => date('Y-m-d h:i:s')
        )
      );
    } else {
      $key = "Payment has been confirmed and Ambulance is on the way";
      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "request_id" => $id,
          "date" => date('Y-m-d h:i:s')
        )
      );
    }
    $register_userid = array($login_user[0]['register_id']);
    $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
  }

  function upt_driver_stts1() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("users", ['status' => $status, 'approve_status' => 'No'], ['id' => $id]);
    $arr_get1 = ['id' => $id];
    $login1 = $this->admin_common_model->get_where('users', $arr_get1);

    if ($status == 'Active') {
      $this->admin_common_model->update_data("users", ['note' => ''], ['id' => $id]);

      $key = "Your account has been activated by admin. Now you can receive new requests.";

      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "date" => date('Y-m-d h:i:s')
        )
      );

      $user_message_apk_ios = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "ios_status" => $key,
          "title" => $key,
          "message" => $key,
          "user_id" => '',
          "provider_id" => '',
          "category_name" => '',
          "user_name" => '',
          "receiver_id" => '',
          "request_id" => ''
        )
      );

      $register_userid = array($login1[0]['register_id']);
      $this->admin_common_model->driver_apk_notification($register_userid, $user_message_apk);
      $this->admin_common_model->ios_provider_notification_new($login1[0]['ios_register_id'], $user_message_apk_ios['message']);

      $arr_data_noti = [
        'user_id' => $login1[0]['id'],
        'request_id' => '',
        'title' => "Account Approved",
        'type' => "DRIVER",
        'message' => $key,
        'notification_type' => 'Note',
      ];

      $this->admin_common_model->insert_data('notification', $arr_data_noti);

      // End sending notification for Android

      $to = $login1[0]['email'];
      $subject = "Application Approved";
      $body = "<div style='max-width: 600px; width: 100%; margin-left: auto; margin-right: auto;'>
        <div style='color: #fff; width: 100%;'>
          <img alt='' src='" . base_url('uploads/images/logo.png') . "' width ='120' height='120'/>
        </div>

        <div style='margin-top: 10px; padding-right: 10px; 
          padding-left: 125px;
          padding-bottom: 20px;'>
          <hr>
          <h3 style='color: #232F3F;'>Hello " . $login1[0]['first_name'] . ",</h3>
          <p>Your account has been approved by admin. Now you can login to your account.</p>
          <hr>
          <p>Warm Regards<br>SelfCare<br>Support Team</p>
        </div>
      </div>";

      $headers = "From: info@SelfCare.com" . "\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      mail($to, $subject, $body, $headers);
    } else {
      $key = "Your account has been deactivated by admin.";

      $user_message_apk = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "date" => date('Y-m-d h:i:s')
        )
      );

      $user_message_apk_ios = array(
        "message" => array(
          "result" => "successful",
          "key" => $key,
          "ios_status" => $key,
          "title" => $key,
          "message" => $key,
          "user_id" => '',
          "provider_id" => '',
          "category_name" => '',
          "user_name" => '',
          "receiver_id" => '',
          "request_id" => ''
        )
      );

      $register_userid = array($login1[0]['register_id']);
      $this->admin_common_model->driver_apk_notification($register_userid, $user_message_apk);
      $this->admin_common_model->ios_provider_notification_new($login1[0]['ios_register_id'], $user_message_apk_ios['message']);

      $arr_data_noti = [
        'user_id' => $login1[0]['id'],
        'request_id' => '',
        'title' => "Account Disapproved",
        'type' => "DRIVER",
        'message' => $key,
        'notification_type' => 'Note',
      ];

      $this->admin_common_model->insert_data('notification', $arr_data_noti);

      // End sending notification for Android

      $to = $login1[0]['email'];
      $subject = "Application Disapproved";
      $body = "<div style='max-width: 600px; width: 100%; margin-left: auto; margin-right: auto;'>
        <div style='color: #fff; width: 100%;'>
          <img alt='' src='" . base_url('uploads/images/logo.png') . "' width ='120' height='120'/>
        </div>

        <div style='margin-top: 10px; padding-right: 10px; 
          padding-left: 125px;
          padding-bottom: 20px;'>
          <hr>
          <h3 style='color: #232F3F;'>Hello " . $login1[0]['first_name'] . ",</h3>
          <p>Your account has been disapproved by admin.</p>
          <hr>
          <p>Warm Regards<br>SelfCare<br>Support Team</p>
        </div>
      </div>";

      $headers = "From: info@SelfCare.com" . "\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      mail($to, $subject, $body, $headers);
    }
  }

  public function forgot_password() {
    $email = $this->input->post('email', TRUE);
    $arr_login = ['email' => $email];
    $login = $this->admin_common_model->fetch_recordbyid('admin', $arr_login);
    if ($login) {
      $pass = random_string('alnum', 6);
      $to = $email;
      $subject = "Forgot Password";
      $body = "<div style='max-width: 600px; width: 100%; margin-left: auto; margin-right: auto;'>
        <header style='color: #fff; width: 100%;'>
          <img alt='' src='" . base_url('uploads/images/logo.png') . "' width='120' height='120'/>
        </header>

        <div style='margin-top: 10px; padding-right: 10px; 
          padding-left: 125px;
          padding-bottom: 20px;'>
          <hr>
          <h3 style='color: #232F3F;'>Hello " . $login->name . ",</h3>
          <p>You have requested a new password for your doctor account.</p>
          <p>Your new password is <span style='background:#2196F3;color:white;padding:0px 5px'>" . $pass . "</span></p>
          <hr>
          <p>Warm Regards<br>Sniff<br>Support Team</p>
        </div>
      </div>";
      $headers = "From: info@technorizen.com" . "\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      mail($to, $subject, $body, $headers);
      $this->admin_common_model->update_data('admin', ['password' => $pass], $arr_login);
    } else {
      $msg = [
        'msg' => '<strong>Error!</strong> This email is not registered to SocialRyde.',
        'res' => 0
      ];
      $this->session->set_userdata($msg);
      redirect('admin/view_page/forgotpassword');
    }
    $msg = [
      'success' => '<strong>Success!</strong> Your new password has been sent to your registered email address.'
    ];
    $this->session->set_flashdata($msg);
    redirect('admin/view_page/forgotpassword');
  }

  public function delete_data() {
    $table = $this->input->post('table');
    $id = $this->input->post('id');
    $this->admin_common_model->delete_data($table, ['id' => $id]);
    //echo $this->db->last_query();
  }

  public function delete_data_new() {
    $table = $this->input->post('table');
    $id = $this->input->post('id');
    $fetch = $this->admin_common_model->get_where('coupons', ['id' => $id]);
    $code = $fetch[0]['code'];
    $this->admin_common_model->delete_data($table, ['code' => $code]);
    //echo $this->db->last_query();
  }

  function upt_withdraw_status() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("withdraw_request",['status'=>$status],['id'=>$id]);
    if($status == 'Complete'){
      $result_req = $this->admin_common_model->get_where('withdraw_request',['id'=>$id]);
      $user_id=  $result_req[0]['user_id'];
      $amount =  $result_req[0]['amount'];
      $result_user = $this->admin_common_model->get_where('users',['id'=>$user_id]);
      $user_wallet = $result_user[0]['wallet'];
      $req_wallet = $user_wallet - $amount;
      $this->admin_common_model->update_data("users",['wallet'=>$req_wallet],['id'=>$user_id]);
    }
  }	

  public function send_money() {
    $table = $this->input->post('table');
    $id = $this->input->post('id');
    $fetch = $this->admin_common_model->get_where('notification', ['id' => $id]);
    $row = $fetch[0];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $driver_type = $row['driver_type'];
    $apply_amount = $row['apply_amount'];
    $incentive_amount = $row['incentive_amount'];
    $driver_type = $row['driver_type'];
    $driver_list = $this->db->query("SELECT *, sum(total_amount) as total_amount FROM `user_request` WHERE status = 'Complete' AND request_type = '$driver_type' AND date >= '$start_date' AND date <= '$end_date' GROUP BY accept_driver_id ORDER BY total_amount DESC")->result_array();
    $i = 2;
    foreach ($driver_list as $row1) {
      if ($apply_amount > $row1['total_amount']) {
        continue;
      }
      $arr_data = [
        'noti_id' => $id,
        'driver_id' => $row1['accept_driver_id'],
        'total_amount' => $incentive_amount
      ];
      $id = $this->admin_common_model->insert_data('insentive_amount', $arr_data);
      $arrr_get = ['id' => $row1['accept_driver_id']];
      $login = $this->admin_common_model->get_where('users', $arrr_get);
      $wallet = $login[0]['wallet'];
      $wallet = $wallet + $incentive_amount;
      $this->admin_common_model->update_data('users', ['wallet' => $wallet], $arrr_get);
      $i++;
    }
  }

  public function create_owner() {
    $user_id = $this->input->post('user_id');
    $shop_id = $this->input->post('shop_id');
    if ($shop_id != '') {
      $this->admin_common_model->update_data('shop', ['user_id' => $user_id], ['id' => $shop_id]);
    }
    return redirect('admin/view_page/userList');
  }

  public function updateStatus() {
    $status = $_POST['status'];
    $id = $_POST['id'];
    $this->admin_common_model->update_data("place_order", ['status' => $status], ['id' => $id]);
    return redirect('admin/view_page/orderList');
  }

  public function upt_cat() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("category", ['status' => $status], ['id' => $id]);
  }

  public function upt_sub_cat() {
    $status = $this->input->post('status');
    $id = $this->input->post('id');
    $this->admin_common_model->update_data("sub_category", ['status' => $status], ['id' => $id]);
  }
// end class
}
