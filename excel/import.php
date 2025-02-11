<?php
   include("../config_indemnifier.php");
?>
<?php
// include("../config_indemnifier.php");
ini_set('max_execution_time', 10000);
if(isset($_POST["Import"])){
		

		$filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				echo $emapData[0] .'<br>';
				if($emapData[0]!="" && $emapData[1]!=""){
					$sql = "INSERT INTO `ss_setup_region_country_port`(`region_id`,`country_id`,`port_id`,`is_active`,`created_at`) Value ('$emapData[0]','$emapData[1]','$emapData[2]',1,CURRENT_TIMESTAMP())";
				  //we are using mysql_query function. it returns a resource on true else False on error
				   $result = mysqli_query( $db, $sql );
					 if(! $result )
					 {
	 
						 // echo "Error: " . $sql . "<br>" . mysqli_error($db);
	 
						 echo "<script type=\"text/javascript\">
								 // alert(\"Invalid File:Please Upload CSV File.\");
								 // window.location = \"index.php\"
							 </script>";
					 
					 }

				}
	          //It wiil insert a row to our subject table from our csv file`

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	        //  echo "<script type=\"text/javascript\">
			// 			alert(\"CSV File has been successfully Imported.\");
			// 			window.location = \"index.php\"
			// 		</script>";
	        
			 

			 //close of connection
			// mysqli_close($db); 
				
		 	
			
		 }
	}	 
?>		 