<?php
include("../config_indemnifier.php");
?>
<?php
// include("../config_indemnifier.php");
ini_set('max_execution_time', 10000);
if (isset($_POST["Import"])) {
    session_start();

    $filename = $_FILES["file"]["tmp_name"];

    $date = date('Y-m-d H:i:s');
    $user_id = $_SESSION['userid'];
    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($filename, "r");
        $ii = 1;
        $tableName = "sap_data_upload";

        // SQL query to truncate the table
        $sql_empty = "TRUNCATE TABLE sap_data_upload";
        // Execute the query
        if ($db->query($sql_empty) === TRUE) {
            // echo "Table $tableName truncated successfully";
        } else {
            echo "Error truncating table: " . $db->error;
        }



        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            // echo $emapData[0] .'<br>';
            if ($ii != 1) {
                if ($emapData[0] != "" && $emapData[1] != "") {


                    $sql = "SELECT * FROM sap_data_upload_history where delivery_no='$emapData[1]'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    //   $active = $row['active'];

                    $count = mysqli_num_rows($result);

                    $check_vehicles = "SELECT * FROM devicesnew where name='$emapData[0]'";
                    $result_vehicles = mysqli_query($db, $check_vehicles);
                    $row_vehicle = mysqli_fetch_array($result_vehicles, MYSQLI_ASSOC);
                    //   $active = $row['active'];

                    $count_vehicle = mysqli_num_rows($result_vehicles);

                    $is_tracker = '';

                    if ($count_vehicle > 0) {
                        $is_tracker = '0';
                    } else {
                        $is_tracker = '1';

                    }

                    $sql_1 = "INSERT INTO `sap_data_upload`
                        ( `tl_no`,
                        `delivery_no`,
                        `gi_posting_date`,
                        `sub_plant_name`,
                        `receiving_plant`,
                        `receiving_plant_name`,
                        `material_group`,
                        `material_no`,
                        `gi_qty`,
                        `planned_arrival_date`,
                        `created_at`,
                        `is_tracker`,
                        `created_by`,
                        `driver_name`,
                        `driver_cnic`,
                        `driver_contact`
                        )
                        VALUES
                        ('$emapData[0]',
                        '$emapData[1]',
                        '$emapData[2]',
                        '$emapData[3]',
                        '$emapData[4]',
                        '$emapData[5]',
                        '$emapData[6]',
                        '$emapData[7]',
                        '$emapData[8]',
                        '$emapData[9]',
                        '$date',
                        '$is_tracker',
                        '$user_id',
                        '$emapData[10]',
                        '$emapData[11]',
                        '$emapData[12]'
                        );";

                    mysqli_query($db, $sql_1);





                    $sql = "INSERT INTO `sap_data_upload_history`
                            (`tl_no`,
                            `delivery_no`,
                            `gi_posting_date`,
                            `sub_plant_name`,
                            `receiving_plant`,
                            `receiving_plant_name`,
                            `material_group`,
                            `material_no`,
                            `gi_qty`,
                           `planned_arrival_date`,
                            `created_at`,
                            `is_tracker`,
                            `created_by`,
                            `driver_name`,
                            `driver_cnic`,
                            `driver_contact`
                            )
                            VALUES
                            ('$emapData[0]',
                            '$emapData[1]',
                            '$emapData[2]',
                            '$emapData[3]',
                            '$emapData[4]',
                            '$emapData[5]',
                            '$emapData[6]',
                            '$emapData[7]',
                            '$emapData[8]',
                            '$emapData[9]',
                            '$date',
                            '$is_tracker',
                            '$user_id',
                            '$emapData[10]',
                            '$emapData[11]',
                            '$emapData[12]'
                            );";
                    //we are using mysql_query function. it returns a resource on true else False on error
                    $result = mysqli_query($db, $sql);
                    if (!$result) {

                        echo "Error: " . $sql . "<br>" . mysqli_error($db);

                        echo "<script type=\"text/javascript\">
                                        // alert(\"Invalid File:Please Upload CSV File.\");
                                        // window.location = \"index.php\"
                                    </script>";

                    }






                }

            }
            //It wiil insert a row to our subject table from our csv file`
            $ii++;
        }
        fclose($file);
        //throws a message if data successfully imported to mysql database from excel file
        echo "<script type=\"text/javascript\">
        			alert(\"CSV File has been successfully Imported.\");
                    window.location = \"../sap_data.php\"

        		</script>";



        //close of connection
        // mysqli_close($db); 



    }
}
?>