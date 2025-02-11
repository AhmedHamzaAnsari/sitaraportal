<?php
include("../config_indemnifier.php");
if(isset($_POST["Import"])){
		

		$filename=$_FILES["file"]["tmp_name"];
    $to = mysqli_real_escape_string($db,$_POST['to']);
    $from   = mysqli_real_escape_string($db,$_POST['from']);
    $end   = $from;
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $j = 0;
            
            $i = $begin = $to;
                
              
                while($i <= $end){
                    echo $i."<br>";
                    echo '<br/>';
                echo  $emapData[0].','.$emapData[1];
                echo '<br/>';

                    //echo $i.'&nbsp'.$emapData[0].','.$emapData[1].'</br>';

                    $sql = "INSERT INTO `price_listing`(`date`,`consignee_code`,`consignee_rate`,`deliverd_by`)VALUES('$i','$emapData[0]','$emapData[1]','consignee')";
                     //we are using mysql_query function. it returns a resource on true else False on error
                      $result = mysqli_query( $db, $sql );
                    	if(! $result )
                    	{
    
                    		// echo "Error: " . $sql . "<br>" . mysqli_error($db);
    
                    		echo "<script type=\"text/javascript\">
                    				alert(\"Invalid File:Please Upload CSV File.\");
                    				window.location = \"add_fleed.php\"
                    			</script>";
                        
                    	}
                        else{
                            echo "<script type=\"text/javascript\">
                            alert(\"CSV File has been successfully Imported.\");
                            window.location = \"add_fleed.php\"
                            </script>";
                        }
                    $i = date('Y-m-d', strtotime($i . ' +1 day'));
                }
               
	         }
	         fclose($file);
		 }
	}	 
?>		 