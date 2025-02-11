<?php

include("config_indemnifier.php");

	$userData = count($_POST["consignee_code"]);

	$trip_number  = $_POST["trip_number"];
	$diversion  = $_POST["diversion"];
	$dispatched  = $_POST["dispatched"];
	$remarks  = $_POST["remarks"];
	$yes_no = $_POST["yes_no"];
	



	// $document  = $_POST["document"];

    $file = rand(1000,100000)."-".$_FILES['upload_rec']['name'];
    $file_loc = $_FILES['upload_rec']['tmp_name'];
    $file_size = $_FILES['upload_rec']['size'];
    //  $file_type = $_FILES['file']['type'];
    $folder="uploads/";
    move_uploaded_file($file_loc,$folder.$file);

    $query_main  = "INSERT INTO `receive_main`(`trip_id`, `upload_receiving`, `diverstion`, `dispatched`, `remarks`, `trip_qty`) VALUES ('$trip_number','$file','$diversion','$dispatched','$remarks','$userData')";
	// echo $query_main;
	$result_main = mysqli_query($db, $query_main);
    $active = mysqli_insert_id($db);
    // $active = $resultlist['id'];
	$query_update  = "UPDATE `trip_main` SET `complete` = '$yes_no' WHERE `id` = '$trip_number';";
			// echo $query_update;
	$result_update = mysqli_query($db, $query_update);
	if ($userData > 0) {
	    for ($i=0; $i < $userData; $i++) { 
		if (trim($_POST['consignee_code'] != '') && trim($_POST['consignee_name'] != '')) {
			$main_id = $active;
			$remark_case_product = $_POST["consignee_other"][$i];
			$remarks_deliverd_qty = $_POST["diff_remark"][$i];
			$litr_storage = $_POST["litr_storage"][$i];
			
			$sub_id = $_POST["sub_id"][$i];

            $file_sub = rand(1000,100000)."-".$_FILES['uo_reciveing']['name'][$i];
            $file_loc1 = $_FILES['uo_reciveing']['tmp_name'][$i];
            $file_size = $_FILES['uo_reciveing']['size'][$i];

            $folder="uploads/";
            move_uploaded_file($file_loc1,$folder.$file_sub);

			
            $start_time = date("Y-m-d H:i:s");
			$query  = "INSERT INTO `receive_sub`(`receive_main_id`, `remark_case_product`, `remarks_deliverd_qty`, `shortage_ltr`, `receive_upload`,`trip_sub_id`) VALUES ('$main_id','$remark_case_product','$remarks_deliverd_qty','$litr_storage','$file_sub','$sub_id')";
			$result = mysqli_query($db, $query);

			
		}
	    }
	    echo "<script>
alert('Trip Reciving successfully');
window.location.href='create_reciving.php';
</script>";
	}else{
	    echo "Please Enter user name";
	}

?>