<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' 
";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
// <td>'.$status.'</td>
// <th width="20%">Status</td>


foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $db);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="label label-success">Online</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Offline</span>';
	}
	$output .= '
	<div class="person" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'>
        <div class="user-info">
            <div class="f-head">
                <img src="../images/idem icon 27x27.png" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" >'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $db).' '.fetch_is_type_status($row['user_id'], $db).'</span>
                    
                </div>
                
            </div>
        </div>
    </div>
	
	';
}



echo $output;

?>