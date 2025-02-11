<?php

include("config_indemnifier.php");
session_start();
$user_id=$_SESSION['userid'];

	$userData = count($_POST["consignee_code"]);
	$lorry_number  = $_POST["lorry_number"];
	$without_tracker;
	if($lorry_number===""){
		$lorry_number  = $_POST["vehi_name_text"];
		$without_tracker="1";

	}
	else{
		$without_tracker="0";
		
	}
	$lorry_name  = $_POST["vehi_name"];
	$location  = $_POST["location"];
	$base  = $_POST["base"];
	$driver_cnic  = $_POST["driver_cnic"];
	$driver_no  = $_POST["driver_no"];
	$driver_h_cnic  = $_POST["driver_h_cnic"];
	$driver_h_no  = $_POST["driver_h_no"];
	$file  = $_POST["document"];
	$stage  = $_POST["stage"];
	$esti_time = $_POST["esti_time"];
	$esti_time = $_POST["esti_time"];
	$driver_name = $_POST["driver_name"];
	$driver_h_name = $_POST["driver_h_name"];

	$checkRecord = mysqli_query($db,"SELECT * FROM `driver_detail` WHERE cnic='$driver_cnic'");
	$totalrows = mysqli_num_rows($checkRecord);

	if($totalrows == 0){
		// Delete record
		$check_driver = "INSERT INTO `driver_detail`(`name`,`cnic`, `mobile_no`, `privilage`) VALUES ('$driver_name','$driver_cnic','$driver_no','0')";
		
		mysqli_query($db,$check_driver);
		$check_helper = "INSERT INTO `driver_detail`(`name`,`cnic`, `mobile_no`, `privilage`) VALUES ('$driver_h_name','$driver_h_cnic','$driver_h_no','1')";

		mysqli_query($db,$check_helper);
		
	}

	if($stage===""){
		$stage="0";
	}
	if($esti_time===""){
		$esti_time="0";
	}


    // $file = rand(1000,100000)."-".$_FILES['document']['name'];
    // $file_loc = $_FILES['document']['tmp_name'];
    // $file_size = $_FILES['document']['size'];
    // //  $file_type = $_FILES['file']['type'];
    // $folder="uploads/";
    // move_uploaded_file($file_loc,$folder.$file);

    $query_main  = "INSERT INTO `trip_main`(`lorry_no`, `location`, `base`, `driver_cnic`, `driver_contact`, `driver_helper_cnic`, `driver_helper_contact`, `document`, `stage_area`,`trip_count`,`without_tracker`,`estimated_time`,`driver_name`,`driver_helper_name`,`create_time`,`user_id`) VALUES ('$lorry_number','$location','$base','$driver_cnic','$driver_no','$driver_h_cnic','$driver_h_no','$file','$stage','$userData','$without_tracker','$esti_time','$driver_name','$driver_h_name','".date('Y-m-d h:i:s')."','$user_id')";
	// echo $query_main;
	$result_main = mysqli_query($db, $query_main);
    // $sqllist = "select *from trip_main where Id=(SELECT LAST_INSERT_ID());";
    // $resultlist = mysqli_query($db,$sqllist);
    // $rowlist = mysqli_fetch_array($resultlist,MYSQLI_ASSOC);
    $active = mysqli_insert_id($db);
    // $active = $resultlist['id'];
	if ($userData > 0) {
	    for ($i=0; $i < $userData; $i++) { 
		if (trim($_POST['consignee_code'] != '') && trim($_POST['consignee_name'] != '')) {
			$main_id = $active;
			$consignee_code = $_POST["consignee_code"][$i];
			$consignee_id = $_POST["consignee_id"][$i];
			$consignee_name = $_POST["consignee_name"][$i];
			$products = $_POST["products"][$i];
			$quantity = $_POST["quantity"][$i];
			$document_no = $_POST["document_no"][$i];
			$consignee_contact1 = $_POST["consignee_contact1"][$i];
			$consignee_contact2 = $_POST["consignee_contact2"][$i];
			$consignee_contact3 = $_POST["consignee_contact3"][$i];
			$del_order = $_POST["del_order"][$i];
			$eta = $_POST["eta"][$i];
			$del_ch = $_POST["del_ch"][$i];
			$by = $_POST["by"][$i];
            $start_time = date("Y-m-d H:i:s");
			$query  = "INSERT INTO `trip_sub`(`main_id`, `consignee_code`, `consignee_id`, `consignee_name`, `products`, `quantity`, `document_ref`, `consignee_contact_1`, `consignee_contact_2`, `consignee_contact_3`, `del_order`, `eta`, `del_ch`, `by_` ,`start_time`,`status`, `vehicle_id`, `vehicle_name`) VALUES ('$main_id','$consignee_code','$consignee_id','$consignee_name','$products','$quantity','$document_no','$consignee_contact1','$consignee_contact2','$consignee_contact3','$del_order','$eta','$del_ch','$by','$start_time','0','$lorry_number','$lorry_name')";
			$result = mysqli_query($db, $query);

			$sms_link = mysqli_insert_id($db);


			$sms_query  = "INSERT INTO `sms_link`(`sub_id`,`status`,`sms`)VALUES('$sms_link','0','0')";
			$result = mysqli_query($db, $sms_query);


		}
	}
	    echo "<script>
alert('Trip Add successfully');
window.location.href='starting_trip.php';
</script>";
	}else{
	    echo "Please Enter user name";
	}

?>