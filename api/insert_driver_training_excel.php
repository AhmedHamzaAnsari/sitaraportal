<?php
//fetch.php
include ("../config_indemnifier.php");
ini_set('max_execution_time', 10000);
if(isset($_POST["submit"])){
    session_start();
    $user_id=$_SESSION['userid'];
    $dates = date('Y-m-d H:i:s');
    $filename=$_FILES["file"]["tmp_name"];
    


     if($_FILES["file"]["size"] > 0)
     {

          $file = fopen($filename, "r");
          $i=0;
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            echo $emapData[0] .'<br>';
            if($i!=0){
                if($emapData[0]!="" && $emapData[1]!=""){
                    $sql = "INSERT INTO `driver_training`
                    (`s_no`,
                    `date`,
                    `name`,
                    `son_of`,
                    `cnic`,
                    `contact`,
                    `licence`,
                    `training_place`,
                    `created_at`,
                    `created_by`)
                    VALUES
                    ('$emapData[0]',
                    '$emapData[2]',
                    '$emapData[3]',
                    '$emapData[4]',
                    '$emapData[5]',
                    '$emapData[6]',
                    '$emapData[7]',
                    '$emapData[8]',
                    '$dates',
                    '$user_id');";
                   $result = mysqli_query( $db, $sql );
                     if(! $result )
                     {
     
                         echo "Error: " . $sql . "<br>" . mysqli_error($db);
     
                        
                     
                     }
    
                }

            }

            $i++;
         }
         fclose($file);
         echo "<script type=\"text/javascript\">
								 alert(\"Upload Successfully.\");
								 window.location = '../driver_training.php';
							 </script>";
        
            
         
        
     }
}	 

?>