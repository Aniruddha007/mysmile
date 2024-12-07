<?php

require_once 'androidNoti.php';



$device_token = 'APA91bHc-ulZzGW_f1qib2T6-UmYsfyUI352IQ_DZe8vh2yglfgh-qLxvH_INcUIddtk-n4l1sXI2VFU2Z5GPlTJFKo_G0G0uuZrYk9k0bD3Oss-bey7BjaUtdeXLRAa1Zp_d8Z2dJ4Q';
$message = array('Message' => 'testing noti');
$pushA = new androidNoti();
$gcmRegIds = array();
array_push($gcmRegIds, $device_token);

$pushA->sendChatNotification($gcmRegIds, $message);

