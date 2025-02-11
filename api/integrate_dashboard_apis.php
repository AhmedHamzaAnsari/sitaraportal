<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
		
		if($access_key_received == $access_key){
            $todate=date("Y-m-d H:i:s", time());
            $prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 hour'));

			// get all category data from category table
            if($_GET['which_api']=='total_loads_intransit'){
                $sql_query = "SELECT * FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where  deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='diversion'){
                $sql_query = "SELECT distinct(dc.name),dc.*,sapstart.*,os.old_sapno FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                join old_sapno as os on os.sap_id=sapstart.id
                where tlno IN(SELECT name from devices) order by sapstart.id desc";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='loads_where_vehicles_are_integrated'){
                $sql_query = "SELECT * FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno  IN(SELECT name from devices) and deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='loads_where_vehicles_are_Not_integrated'){
                $sql_query = "SELECT * FROM sapstart 
                where tlno  not IN(SELECT name from devices) and deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='integrated_vehicles_in_transit'){
                $sql_query = "SELECT  distinct(dc.name),dc.*,sapstart.* FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno IN(SELECT name from devices) and dc.devicescol >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='vehicles_currently_moving'){
                $sql_query = "SELECT  distinct(dc.name),dc.*,sapstart.* FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno IN(SELECT name from devices) and dc.Vehicle_Color > 0 and dc.devicescol >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='vehicle_ignition_on_but_not_moving'){
                $sql_query = "SELECT  distinct(dc.name),dc.*,sapstart.* FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno IN(SELECT name from devices) and dc.Vehicle_Color = 0 and dc.address =1 and dc.devicescol >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='speed_violation'){
                $sql_query = "SELECT distinct(dc.name),dc.*,sapstart.* FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno IN(SELECT name from devices) and dc.Vehicle_Color >= 60 and dc.devicescol >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='vehicles_currently_stopped'){
                $sql_query = "SELECT  distinct(dc.name),dc.*,sapstart.* FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno IN(SELECT name from devices) and dc.Vehicle_Color = 0 and dc.address =0 and dc.devicescol >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='vehicles_on_black_Spot'){
                $sql_query = " SELECT distinct(dc.name),dc.*,sapstart.*,gc.consignee_name FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                join geo_in_check as gc on gc.veh_id=dc.uniqueId
                where tlno IN(SELECT name from devices) and gc.geotype='black spote' and dc.devicescol >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
            elseif($_GET['which_api']=='vehicles_nr'){
                $sql_query = "SELECT  distinct(dc.name),dc.*,sapstart.* FROM sapstart 
                join devices as dc on dc.name=sapstart.tlno
                where tlno IN(SELECT name from devices) and dc.devicescol <='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;";
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
         
                $users = array();
                while($user = $result->fetch_assoc()) {
                    $users[] = $user;
                }
                
                // create json output
                $output = json_encode($users);

            }
		}else{
			die('accesskey is incorrect.');
		}
	} else {
		die('accesskey is required.');
	}
 
	//Output the output.
	echo $output;

	include_once('../includes/close_database.php'); 
?>