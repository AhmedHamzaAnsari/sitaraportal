<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM users 
WHERE id!= '".$_SESSION['userid']."' 
";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
// <td>'.$status.'</td>
// <th width="20%">Status</td>
$output = '
<div class="people">
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['id'], $db);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="label label-success">Online</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Offline</span>';
	}
	$output .= '
	
	<div class="person"  data-touserid="'.$row['id'].'">
    <div class="user-info start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['name'].'">
        <div class="f-head">
            <img src="../images/idem icon 27x27.png" alt="avatar">
        </div>
        <div class="f-body">
            <div class="meta-info">
                <span class="user-name " data-name="Nia Hillyer" >'.$row['name'].' '.count_unseen_message($row['id'], $_SESSION['userid'], $db).' '.fetch_is_type_status($row['id'], $db).'</span>
            </div>
                                                   
        </div>
    </div>
	</div>
	';
}
$output .= '</div>';


echo $output;

?>