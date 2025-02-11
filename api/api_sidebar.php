<?php


include("../config_indemnifier.php");
$result = mysqli_query($db,"SELECT * FROM `bulkdata`");
$idd=1;

$users = mysqli_query($db,"SELECT * FROM `users` WHERE privilege='Admin' and id='$idd'");
$admin_vehi = mysqli_query($db,"SELECT count(*) as admin_vehi FROM `users_devices` where users_id=1");
$countadmin_vehi=mysqli_fetch_array($admin_vehi);
$dataArray = array();
$dataArray2 = array();
$dataArray3 = array();
$dataArray4 = array();
$parentfolder = array();

foreach($users as $key => $value1)
    { 
        $cid=$value1['id'];
        //echo $value1['name'].'</br>';
        
        $distributor="SELECT us.id,us.name,us.privilege FROM `users` as us INNER join `admin_distibutor` as ad on us.id=ad.distributor_id WHERE ad.admin_id=$cid";
        // echo $query;
        $distribut = mysqli_query($db, $distributor);
        
        foreach($distribut as $key => $value2)
        { 
            $did=$value2['id'];
            //echo $value2['name'].'</br>';
            $query2="SELECT us.id,us.name FROM `users` as us INNER join `distributor_end_user` as ue on us.id=ue.end_user_id  WHERE ue.distributor_id=$did";
            // echo $query;
            $results2 = mysqli_query($db, $query2);
            $i=1;
            foreach ($results2 as $city2){
                $eid=$city2['id'];  
                //echo $city2['name'].'</br>';
                $query4="SELECT ud.users_id,ud.devices_id,us.name,dc.name,dc.licensepn as car_name,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where ud.show_authority=1 and ud.users_id=$eid";
                //echo $query4;
                $results4 = mysqli_query($db, $query4);
				
					$rowcount=mysqli_num_rows($results4);
					
                    if($rowcount != 0)
                        {
                    foreach ($results4 as $city4)
                {
					
                    $city4['devices_id'];    
                    $city4['car_name'];
                    $dataArray4[]=  array('id' => $city4['devices_id'].'', 'text' => $city4['car_name'],'lat'=>$city4['latitude'],'lng'=>$city4['longitude']); 
					
                }
                        }
                
				
					 $dataArray3[] =  array('id' => $city2['id'].'_1', 'text' => $city2['name'],'items'=>$dataArray4);
                	unset($dataArray4);
				
			
               
            }
            $dataArray2[] = array('id' => $value2['id'].'_1_2', 'text' => $value2['name'],'items'=>$dataArray3);
            
        } 
        $dataArray[] = array('id' => $value1['id'].'_1_3', 'text' => $value1['name'],'items'=>$dataArray2,);
    } 
    
    echo json_encode($dataArray);
    
?>