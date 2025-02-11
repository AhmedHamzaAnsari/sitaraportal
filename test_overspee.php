<?php
 include("config_indemnifier.php");
    $start_time;
    $pre_time=0;
    $final_time=0;

    $start_speed;
    $next_speed =0;
    $pre_speed =0;
    $total_event;
    $min_=0;
    $max_=0;
    $location;
    $time_;

    $vehi = array("603", "513");
    $output = '
	<div class="table-responsive">
	<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    th, td {
        padding:10px;
    }
    </style>
		<table >
			<tr>
				<th>Lorry Name</th>
				<th>Overpeed Duration</th>
				<th>Min Speed</th>
				<th>Top Speed</th>
				<th>Time</th>
				<th>Location</th>
				
			</tr>
	';
    foreach ($vehi as $value) {
        // echo "$value <br>";
	    $sql__="SELECT pos.vehicle_id,pos.time,pos.speed,pos.vlocation FROM positions as pos where pos.device_id='$value' and  pos.time>'2021-12-14' and pos.time<'2021-12-15' and pos.power='1' order by pos.time asc;";
        $result__ = mysqli_query($db,$sql__);
    
    
    
        while( $row = mysqli_fetch_array($result__) ){
            // $userid = $row['id'];
            $date = date('H:i');
            $vehicle_id = $row['vehicle_id'];
            $time = $row['time'] ;
            $speed = $row['speed'];
            $location = $row['vlocation'] ;
            $time_ = $time;

            
                
            
                $start_speed = $speed;
                $start_time = $time;

                if($pre_speed>55 && $start_speed>55){
                    // echo '</br>';
                    // echo $start_speed . ' -- ' .$start_time. '<br>';
                    // echo $pre_speed . ' -- ' .$pre_time. '<br>';
                    // echo '--------------------';
                    // echo ' Mimis';

                    $d1 = strtotime($start_time);
                    $d2 = strtotime($pre_time);

                    $totalSecondsDiff = abs($d1-$d2); //42600225
                    $totalMinutesDiff = $totalSecondsDiff/60; 
                    
                    $final_time=$totalMinutesDiff;
                }
                else if($pre_speed>55 && $start_speed<55){
                    // echo 'Plus 1';
                    $final_time= $final_time+1;

                }
                

                $pre_speed = $start_speed;
                $pre_time= $start_time;

                
                


            
        }

        $sql__2="SELECT MAX(pos.speed) as maxx,MIN(pos.speed) as minn FROM positions as pos where pos.speed>'55' and pos.device_id='$value' and  pos.time>'2021-12-14' and pos.time<'2021-12-15' and pos.power='1' order by pos.time asc;";
        $result__2 = mysqli_query($db,$sql__2);
    
    
    
        while( $row = mysqli_fetch_array($result__2) ){
            $maxx = $row['maxx'];
            $minn = $row['minn'] ;



            $min_ = $minn;
            $max_ = $maxx;

                
                


            
        }

        
        echo '</br>';

        echo $vehicle_id;
        echo '</br>';
        echo $final_time;
        echo '</br>';
        echo '------------------------------------ </br>';
        echo '</br>';

        
          $output .= '
                <tr>
                    <td class="text-center">'.$vehicle_id.'</td>
                    <td >'.round($final_time).' Minutes</td>
                    <td >'.$min_.' km/hr</td>
                    <td >'.$max_.' km/hr</td>
                    <td >'.$time_.'</td>
                    <td >'.$location.'</td>
               
                </tr>
            ';
        
        

    }

    $output .= '
		</table>
	</div>
	';
	echo $output;


    $list = '
    <br/>
    <h3>Summary Past remarks</h3>
	<div class="table-responsive">
	<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    th, td {
        padding:10px;
    }
    </style>
		<table >
			<tr>
				<th>Lorry Name</th>
				<th>Number Of Vehicle Brokes limit Speed </th>
				
			</tr>
	';
    foreach ($vehi as $value) {
        $sql__count="SELECT count(pos.vehicle_id) as total_event,pos.time,pos.device_id,pos.speed,pos.vlocation,MAX(pos.speed) as maxx,MIN(pos.speed) as minn FROM positions as pos where pos.speed>'55' and pos.device_id='$value' and  pos.time>'2021-12-14' and pos.time<'2021-12-15' and pos.power='1' order by pos.time asc;";
        $result__count = mysqli_query($db,$sql__count);
    
    
    
        while( $row = mysqli_fetch_array($result__count) ){
            
            $total_event_ = $row['total_event'];
            $vlocation = $row['vlocation'] ;
            $maxx = $row['maxx'];
            $minn = $row['minn'] ;



            $total_event = $total_event_;
            $min_ = $minn;
            $max_ = $maxx;
            $location=$vlocation;
                
            
                
                
                


            
        }

       

        
          $list .= '
                <tr>
                    <td class="text-center">'.$vehicle_id.' </td>
                    <td >'.$total_event_.' Times</td>
               
                </tr>
            ';
        
        

    }

    $list .= '
		</table>
	</div>
	';
	echo $list;


    

            


?>