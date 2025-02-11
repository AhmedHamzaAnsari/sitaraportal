<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
        $users = array();
		
		if($access_key_received == $access_key){
			// get all category data from category table
			$sql_query = "SELECT distinct(dc.name),dc.uniqueId FROM sapstart 
            join devices as dc on dc.name=sapstart.tlno
            join positions as pos on pos.id=dc.latestPosition_id
            where tlno IN(SELECT name from devices) and pos.speed > 0 and pos.time>=(now() - interval 4 hour) and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by pos.time desc";
			
			$result = $db->query($sql_query) or die ("Error :".mysqli_error());
	 
			$users = array();
			while($user = $result->fetch_assoc()) {
				$id= $user['uniqueId'];
                // echo '----------------------------------------------------------<br>';
                // echo $id.'<br>';



                $sql_query2 = "SELECT (SELECT time as `timee` FROM `positions` where speed > 0 and time>=(now() - interval 4 hour) and device_id=$id order by time asc limit 1) as first , 
                (SELECT time as `timee` FROM `positions`  where speed > 0 and time>=(now() - interval 4 hour) and device_id=$id order by time desc limit 1) as last;";
			
                $result2 = $db->query($sql_query2) or die ("Error :".mysqli_error());
                $i=1;
                $mint;
                while($user2 = $result2->fetch_assoc()) {

                    $first = $user2['first'];
                    $last = $user2['last'];



                    // $datetime1 = new DateTime($first);
                    
                    // $datetime2 = new DateTime($last);
                    // $interval = $datetime1->diff($datetime2);
                    // $hours = $interval->format('%H');
                    
                    $to_time = strtotime($first);
                    $from_time = strtotime($last);
                    $mint = round(abs($to_time - $from_time) / 60,2);
                    
                    if($mint>200){
                        echo $id;
                        echo '<br>';
                        echo $mint. " minute";
                        echo '<br>';

                        $sql_query2 = "SELECT distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
                        join devices as dc on dc.name=sapstart.tlno
                        join positions as pos on pos.device_id=dc.uniqueId
                        where tlno IN(SELECT name from devices) and time>=(now() - interval 4 hour) and dc.uniqueId='$id' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 group by pos.time  order by pos.time desc limit 1;";
                    
                        $result2 = $db->query($sql_query2) or die ("Error :".mysqli_error());
                        $i=1;
                        while($user2 = $result2->fetch_assoc()) {
                            $users[] = $user2;
                        }


                    }

                    $i++;
                }
                
                // create json output
                $output = json_encode($users);

			}
			
			// create json output
			// $output = json_encode($users);
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