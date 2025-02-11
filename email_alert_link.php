<?php 
include("config_indemnifier.php");
$from = $_GET['from'];
// $to = $_GET['to'];
$cart_id = $_GET['id'];
$interval = $_GET['interval'];

$dating = $from .' '. $interval.':00';
// echo $dating;
$givenTimestamp = strtotime($dating);
$finalTimestamp = $givenTimestamp + (24 * 60 * 60); // Adding 24 hours in seconds

$formattedFinalTime = date('Y-m-d H:i:s', $finalTimestamp);
// echo $formattedFinalTime;

$targetDateTime = strtotime($formattedFinalTime);
$currentDateTime = time();

if ($currentDateTime < $targetDateTime) {


    ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SITARA</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">

    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">


    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
    /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise, Remove it
        */
    .navbar .navbar-item.navbar-dropdown {
        margin-left: auto;
    }

    .layout-px-spacing {
        min-height: calc(100vh - 125px) !important;
    }

    .car_upper {
        text-transform: uppercase !important;
    }

    .caret::before {
        content: none !important;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php


$from = $_GET['from'];
// $to = $_GET['to'];
$cart_id = $_GET['id'];
$interval = $_GET['interval'];
$cart_value="";
if($cart_id!='all'){
    $cart_value = "and ov.cartraige_id='$cart_id' and ov.time_peiod='$interval'";
}
else{
    $cart_value="and ov.is_load=1";
}

// echo "SELECT * FROM activity_overspeed_voiltion WHERE DATE(created_at) >= '$date' and cartraige_id='$cart_id' and time_peiod='$interval'";
$resultss = mysqli_query($db, "SELECT
ov.*,IF(ao.id IS NOT NULL AND ao.id IS NOT NULL, 1, 0) AS join_result,
CASE WHEN ov.is_load='1' THEN 'With-Load' ELSE 'Without-Load' END AS `is_load`,  
CASE WHEN ov.is_load='1' THEN '#f3fff3' ELSE '#FFF' END AS `row_color`  
FROM
activity_overspeed_voiltion as ov
LEFT JOIN action_overspeed as ao on ao.alert_id=ov.id
join devicesnew as dc on dc.id=ov.vehicle_id
WHERE DATE(ov.created_at) = '$from' $cart_value");

$excess_driving = mysqli_query($db, "SELECT 
ov.*,IF(ao.id IS NOT NULL AND ao.id IS NOT NULL, 1, 0) AS join_result,
CASE WHEN ov.is_load='1' THEN 'With-Load' ELSE 'Without-Load' END AS `is_load`,  
CASE WHEN ov.is_load='1' THEN '#f3fff3' ELSE '#FFF' END AS `row_color`  
FROM activity_excess_driving_voiltion as ov
LEFT JOIN action_excess_driving as ao on ao.alert_id=ov.id 
join devicesnew as dc on dc.id=ov.vehicle_id
WHERE DATE(ov.created_at) = '$from' $cart_value");

$resultss_nr = mysqli_query($db, "SELECT 
ov.*,IF(ao.id IS NOT NULL AND ao.id IS NOT NULL, 1, 0) AS join_result ,
CASE WHEN ov.is_load='1' THEN 'With-Load' ELSE 'Without-Load' END AS `is_load`,  
CASE WHEN ov.is_load='1' THEN '#f3fff3' ELSE '#FFF' END AS `row_color`  
FROM activity_nr_voiltion as ov
LEFT JOIN action_nr as ao on ao.alert_id=ov.id
join devicesnew as dc on dc.id=ov.vehicle_id
WHERE DATE(ov.created_at) = '$from' $cart_value");

$resultss_night = mysqli_query($db, "SELECT 
ov.*,IF(ao.id IS NOT NULL AND ao.id IS NOT NULL, 1, 0) AS join_result ,
CASE WHEN ov.is_load='1' THEN 'With-Load' ELSE 'Without-Load' END AS `is_load`,  
CASE WHEN ov.is_load='1' THEN '#f3fff3' ELSE '#FFF' END AS `row_color` 
FROM activity_night_voilation_voiltion as ov
LEFT JOIN action_night_voilation as ao on ao.alert_id=ov.id
join devicesnew as dc on dc.id=ov.vehicle_id
WHERE DATE(ov.created_at) = '$from' $cart_value");

$resultss_black_spot = mysqli_query($db, "SELECT 
ov.*,IF(ao.id IS NOT NULL AND ao.id IS NOT NULL, 1, 0) AS join_result,
CASE WHEN ov.is_load='1' THEN 'With-Load' ELSE 'Without-Load' END AS `is_load`,  
CASE WHEN ov.is_load='1' THEN '#f3fff3' ELSE '#FFF' END AS `row_color`
FROM activity_blackspot_voiltion as ov
LEFT JOIN action_black_spot as ao on ao.alert_id=ov.id 
join devicesnew as dc on dc.id=ov.vehicle_id
WHERE DATE(ov.created_at) = '$from' $cart_value");


$asset = "SELECT * from  report_email";
$resultdevice = mysqli_query($db, $asset);
?>

<style>
#content {
    margin-top: 0;
    margin-left: 0;
}
</style>

<script>
var action_value = [];
</script>

<body class="sidebar-noneoverflow starterkit">
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->


                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="row layout-top-spacing" id="cancel-row">

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="container-fluid">
                                    <h2>
                                        <?php echo $_GET['name'] ?>
                                    </h2>

                                </div>
                                <div class="container-fluid my-3">
                                    <div class="row">
                                        <div class="col-md-2 mx-4"
                                            style=" border: 1px solid;padding: 20px;border-radius: 10px">
                                            Total Overspeed <span
                                                style="float: right;font-weight: bold;"><?php echo mysqli_num_rows($resultss);?></span>
                                        </div>
                                        <div class="col-md-2 mx-4"
                                            style=" border: 1px solid;padding: 20px;border-radius: 10px;">
                                            Excess Driving <span
                                                style="float: right;font-weight: bold;"><?php echo mysqli_num_rows($excess_driving);?></span>
                                        </div>
                                        <div class="col-md-2 mx-4"
                                            style=" border: 1px solid;padding: 20px;border-radius: 10px;">
                                            NR <span
                                                style="float: right;font-weight: bold;"><?php echo mysqli_num_rows($resultss_nr);?></span>
                                        </div>
                                        <div class="col-md-2 mx-4"
                                            style=" border: 1px solid;padding: 20px;border-radius: 10px;">
                                            Night Voilation <span
                                                style="float: right;font-weight: bold;"><?php echo mysqli_num_rows($resultss_night);?></span>
                                        </div>
                                        <div class="col-md-2 mx-4"
                                            style=" border: 1px solid;padding: 20px;border-radius: 10px;">
                                            Black Spot <span
                                                style="float: right;font-weight: bold;"><?php echo mysqli_num_rows($resultss_black_spot);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (mysqli_num_rows($resultss) > 0) {
                                    ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Overspeed</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4 mt-4">

                                        <table id="html5-extension" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Vehicle #</th>
                                                    <th>Cartraige</th>
                                                    <th>Speed</th>
                                                    <th>Message</th>
                                                    <th>Time</th>
                                                    <th>Location</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Is-Load</th>
                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_array($resultss)) {
                                                        ?>
                                                <script>
                                                action_value.push("<?php echo $row["join_result"]; ?>")
                                                </script>
                                                <tr style="background-color: <?php echo $row["row_color"];?>;">
                                                    <td class="text-center">
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["vehicle_name"]; ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["cartriage_name"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["location"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["message"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["time"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["location"]; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["latitude"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["longitude"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["is_load"]; ?>

                                                    </td>

                                                    <td class="text-center">

                                                        <?php
                                                                if ($row["join_result"] != 1) {
                                                                    ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-id_alert='overspeed_<?php echo $row["id"]; ?>'
                                                            data-table_name='action_overspeed' class="edit_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                data-svg='overspeed_<?php echo $row["id"]; ?>'
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-danger">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                                } else {
                                                                    ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name='action_overspeed' class=""
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-dark">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                                }
                                                                ?>



                                                    </td>
                                                    <td class="text-center">


                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name='action_overspeed' class="view_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye text-success">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg></a>

                                                    </td>


                                                </tr>

                                                <?php
                                                        $i++;
                                                    }
                                                    ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php } ?>

                                <?php
                                if (mysqli_num_rows($excess_driving) > 0) {
                                    ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <h4>
                                            Excess Driving
                                        </h4>
                                    </div>
                                    <div class="table-responsive mb-4 mt-4">

                                        <table id="html5-extension1" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Vehicle #</th>
                                                    <th>Cartraige</th>
                                                    <th>Message</th>
                                                    <th>Duration (IN Mint)</th>
                                                    <th>Time</th>
                                                    <th>Is-Load</th>

                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_array($excess_driving)) {
                                                        ?>
                                                <script>
                                                action_value.push("<?php echo $row["join_result"]; ?>")
                                                </script>
                                                <tr style="background-color: <?php echo $row["row_color"];?>;">
                                                    <td class="text-center">
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["vehicle_name"]; ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["cartraige_name"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["message"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["duration"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["time"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["is_load"]; ?>

                                                    </td>



                                                    <td class="text-center">

                                                        <?php
                                                                if ($row["join_result"] != 1) {
                                                                    ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-id_alert='excess<?php echo $row["id"]; ?>'
                                                            data-table_name='action_excess_driving' class="edit_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                data-svg='excess<?php echo $row["id"]; ?>'
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-danger">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php

                                                                } else {
                                                                    ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name='action_excess_driving' class=""
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-dark">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                                }
                                                                ?>



                                                    </td>
                                                    <td class="text-center">


                                                        <a name="edit" id="<?php echo $row["id"]; ?>" class="view_data"
                                                            data-table_name='action_excess_driving'
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye text-success">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg></a>

                                                    </td>


                                                </tr>

                                                <?php
                                                        $i++;
                                                    }
                                                    ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php } ?>


                                <?php
                                if (mysqli_num_rows($resultss_nr) > 0) {
                            ?>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>NR</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4 mt-4">

                                        <table id="html5-extension_n4" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Vehicle #</th>
                                                    <th>Cartraige</th>
                                                    <th>Reporting Time</th>
                                                    <th>Location</th>
                                                    <th>Speed</th>
                                                    <th>Coordinates</th>
                                                    <th>Is-Load</th>

                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($resultss_nr)) {
                                                    ?>
                                                <script>
                                                action_value.push("<?php echo $row["join_result"]; ?>")
                                                </script>
                                                <tr style="background-color: <?php echo $row["row_color"];?>;">
                                                    <td class="text-center">
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["vehicle_name"]; ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["cartriage_name"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["time"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["location"]; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["speed"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["latitude"]; ?>,
                                                        <?php echo $row["longitude"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["is_load"]; ?>
                                                    </td>



                                                    <td class="text-center">
                                                        <?php
                                                            if ($row["join_result"] != 1) {
                                                                ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-id_alert='nr_<?php echo $row["id"]; ?>'
                                                            data-table_name='action_nr' class="edit_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                data-svg='nr_<?php echo $row["id"]; ?>'
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-danger">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                            } else {
                                                                ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name='action_nr' class="" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-dark">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                            }
                                                            ?>



                                                    </td>
                                                    <td class="text-center">


                                                        <a name="edit" id="<?php echo $row["id"]; ?>" class="view_data"
                                                            data-table_name='action_nr' data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye text-success">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg></a>

                                                    </td>


                                                </tr>

                                                <?php
                                                    $i++;
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php }?>

                                <?php
                                if (mysqli_num_rows($resultss_night) > 0) {
                            ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Night Voilation</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4 mt-4">

                                        <table id="html5-extension_night" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Vehicle #</th>
                                                    <th>Cartraige</th>
                                                    <th>Speed</th>
                                                    <th>Message</th>
                                                    <th>Time</th>
                                                    <th>Location</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Is-load</th>

                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($resultss_night)) {
                                                    ?>
                                                <script>
                                                action_value.push("<?php echo $row["join_result"]; ?>")
                                                </script>
                                                <tr style="background-color: <?php echo $row["row_color"];?>;">
                                                    <td class="text-center">
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["vehicle_name"]; ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["cartriage_name"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["location"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["message"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["time"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["location"]; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["latitude"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["longitude"]; ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["is_load"]; ?>
                                                    </td>



                                                    <td class="text-center">
                                                        <?php
                                                            if ($row["join_result"] != 1) {
                                                                ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-id_alert='night_<?php echo $row["id"]; ?>'
                                                            data-table_name='action_night_voilation' class="edit_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                data-svg='night_<?php echo $row["id"]; ?>'
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-danger">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                            } else {
                                                                ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name='action_night_voilation' class=""
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-dark">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                            }
                                                            ?>



                                                    </td>
                                                    <td class="text-center">


                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name='action_night_voilation' class="view_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye text-success">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg></a>

                                                    </td>


                                                </tr>

                                                <?php
                                                    $i++;
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php }?>

                                <?php
                                if (mysqli_num_rows($resultss_black_spot) > 0) {
                            ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Black Spot</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4 mt-4">

                                        <table id="html5-extension_blackspot" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Vehicle #</th>
                                                    <th>Cartraige</th>
                                                    <th>Black Spot</th>
                                                    <th>In Time</th>
                                                    <th>Out Time</th>
                                                    <th>In-Duration (In Mint)</th>
                                                    <th>Is-Load</th>

                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($resultss_black_spot)) {
                                                    ?>
                                                <script>
                                                action_value.push("<?php echo $row["join_result"]; ?>")
                                                </script>
                                                <tr style="background-color: <?php echo $row["row_color"];?>;">
                                                    <td class="text-center">
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["vehicle_name"]; ?>
                                                    </td>
                                                    <td class="text-center car_upper">
                                                        <?php echo $row["cartraige_name"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["blackspot_name"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["in_time"]; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["out_time"]; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["in_duration"]; ?>

                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row["is_load"]; ?>
                                                    </td>


                                                    <td class="text-center">
                                                        <?php
                                                            if ($row["join_result"] != 1) {
                                                                ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-id_alert='blackspot_<?php echo $row["id"]; ?>'
                                                            data-table_name="action_black_spot" class="edit_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                data-svg='blackspot_<?php echo $row["id"]; ?>'
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-danger">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                            } else {
                                                                ?>
                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name="action_black_spot" class=""
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-alert-octagon text-text">
                                                                <polygon
                                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                </polygon>
                                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                            </svg></a>
                                                        <?php
                                                            }
                                                            ?>



                                                    </td>
                                                    <td class="text-center">


                                                        <a name="edit" id="<?php echo $row["id"]; ?>"
                                                            data-table_name="action_black_spot" class="view_data"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye text-success">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg></a>

                                                    </td>


                                                </tr>

                                                <?php
                                                    $i++;
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php }?>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary close_alerts" style="float: right;"
                                                id="close_btn">Close</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- CONTENT AREA -->

                </div>

            </div>
            <!--  END CONTENT AREA  -->

            <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#000" id="title_edit">Add Alert Description
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container my-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" id="insert_form" enctype="multipart/form-data">
                                            <div class="form-row mb-4">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div>
                                                                <label>Is this Authentic Alert ?</label>
                                                                <select name="os_authentic_action"
                                                                    id="os_authentic_action" class="form-control">
                                                                    <option value="">Select an Option</option>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                            </div>
                                                            <div id="dynamic-fields"></div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4">Description</label>
                                                    <input type="text" class="form-control" id="action_discription"
                                                        name="action_discription">
                                                </div>




                                                <input type="hidden" name="employee_id" id="employee_id">
                                                <input type="hidden" name="id_alert" id="id_alert">

                                                <input type="hidden" name="table_name" id="table_name"
                                                    value="action_overspeed">
                                                <input type="hidden" name="cartraige_id" id="cartraige_id"
                                                    value="<?php echo $_GET['id'] ?>">
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-primary" name="insert"
                                                            id="insert" value="Submit" style="float:right" />

                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Cancel</button>
                            <!-- <button type="button" class="btn btn-primary">Save</button> -->
                        </div>
                    </div>
                </div>
            </div>


            <div id="zoomupModal2" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog modal-xl">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#000" id="title_edit">View Alert Action
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid my-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="action_table" class="table table-hover non-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Is Authentic</th>
                                                    <th>Status</th>
                                                    <th>Driver CNIC</th>
                                                    <th>Who is Responsible</th>
                                                    <th>Description</th>
                                                    <th>Created At</th>



                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Cancel</button>
                            <!-- <button type="button" class="btn btn-primary">Save</button> -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- END MAIN CONTAINER -->

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/js/app.js"></script>

        <script>
        let person = prompt("Please Enter Verification Code");

        if (person != '') {
            var varify_code = person;
            var id = "<?php echo $_GET['id']?>";
            var e_id = "<?php echo $_GET['e_id']?>";
            var interval = "<?php echo $_GET['interval']?>";
            var from = "<?php echo $_GET['from']?>";
            console.log(id)
            console.log(varify_code)
            $.ajax({
                url: "ajax_edit/get_verify_code.php",
                method: "POST",
                data: {
                    varify_code: varify_code,
                    id: id,
                    e_id: e_id,
                    interval: interval,
                    from: from
                },
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        alert("Verify Successfully");
                    } else {
                        alert('Wrong Verification Code.')
                        $('#container').text('');
                        $('#container').text('Verification failed . Please refresh page and try again');
                    }

                }
            });


        } else {
            alert('Link Expired.')
            $('#container').text('');
            $('#container').text('Verification failed . Please refresh page and try again');
        }
        </script>
        <script>
        console.log(action_value);
        $(document).ready(function() {



            var index = action_value.indexOf('0');

            if (index !== -1) {
                $("#close_btn").prop("disabled", true);
                console.log("Value", '0', "found at index", index);

            } else {
                $("#close_btn").prop("disabled", false);

                console.log("Value", '0', "not found in the array.");
            }


            $(document).on('click', '.edit_data', function() {

                var employee_id = $(this).attr("id");
                var table_name = $(this).data('table_name');
                var id_alert = $(this).data('id_alert');
                // alert(table_name)
                $('#zoomupModal').modal('show');
                $('#employee_id').val(employee_id);
                $("#insert").prop("disabled", false);
                $('#insert').val("Submit");
                $('#id_alert').val(id_alert);
                $('#table_name').val(table_name);
                $('#insert_form')[0].reset();
                $('#dynamic-fields').empty();

            });

            $(document).on('click', '.close_alerts', function() {

                var dates = "<?php echo $_GET['from']?>";
                var cart_id = "<?php echo $_GET['id']?>";
                var interval = "<?php echo $_GET['interval']?>";
                var e_id = "<?php echo $_GET['e_id']?>";

                // alert(dates)
                var result = confirm("Do you want to continue?");
                if (result === true) {
                    $.ajax({
                        url: "ajax_edit/add_alert_clase_action.php",
                        method: "POST",
                        data: {
                            dates: dates,
                            cart_id: cart_id,
                            interval: interval,
                            e_id: e_id
                        },
                        beforeSend: function() {},
                        success: function(data) {
                            console.log(data);
                            if (data == 1) {
                                alert("Close Successfully");
                            } else {
                                alert("Not Close Successfully " + data);
                            }

                        }
                    });
                }


            });


            $(document).on('click', '.view_data', function() {

                var employee_id = $(this).attr("id");
                var table_name = $(this).data('table_name');
                // alert(employee_id)
                if (employee_id != "") {
                    $.ajax({
                        url: "ajax_edit/get_all_alert_action_data.php",
                        method: "POST",
                        data: {
                            alert_id: employee_id,
                            table_name: table_name
                        },
                        beforeSend: function() {},
                        success: function(data) {
                            data = JSON.parse(data)
                            console.log(data);
                            $('#zoomupModal2').modal('show');
                            var len = data.length;
                            //alert("len "+len)
                            var table = $('#action_table').DataTable();
                            table
                                .clear()
                                .draw();

                            if (len > 0) {
                                // $("email_btn").fadeIn();
                                for (var i = 0; i < len; i++) {



                                    table
                                        .row.add([
                                            (i + 1),
                                            data[i].is_authorize,
                                            data[i].status,
                                            data[i].driver_cnic,
                                            data[i].who_is_responsible,
                                            data[i].description,
                                            data[i].created_at,


                                        ])
                                        .draw()
                                        .node();

                                    // if(i===len){
                                    //     $("#loader").hide();

                                    // }





                                }


                            }
                        }
                    });

                }

            });

            $('#insert_form').on("submit", function(event) {
                event.preventDefault();
                var data = new FormData(this);
                if ($('#total').val() == "") {
                    alert("Total is required");

                } else {
                    $.ajax({
                        url: "ajax_edit/overspeed_action.php",
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",
                        data: data,
                        beforeSend: function() {
                            $('#insert').val("Submiting");
                            $("#insert").prop("disabled", true);

                        },
                        success: function(data) {
                            console.log(data)

                            var id = $('#id_alert').val();
                            //    $("#html5-extension").load(" #html5-extension");

                            if (data != 0) {

                                alert('Action Inserted succesfully');
                                $('#insert_form')[0].reset();
                                $('[data-id_alert="' + id + '"]').removeClass(
                                    'edit_data');
                                $('[data-svg="' + id + '"]').removeClass(
                                    'text-danger');
                                $('[data-svg="' + id + '"]').addClass(
                                    'text-dark');
                                setTimeout(function() {
                                    // $('#zoomupModal').hide();
                                    //    window.location.reload();

                                }, 2000);
                            } else {
                                alert('Action Not Insert');
                                $('#insert').val("Insert");

                                $("#insert").prop("disabled", false);


                            }



                        }
                    });
                }
            });

            $('#os_authentic_action').on('change', function() {
                var selectedValue = $(this).val();
                $('#dynamic-fields').empty(); // Clear any previous dynamic fields

                if (selectedValue === 'yes') {
                    var dynamicSelect = '<label>Select status:</label>' +
                        '<select name="licenseStatus" class="form-control">' +
                        '<option value=""></option>' +
                        '<option value="loaded">Loaded</option>' +
                        '<option value="empty">Empty</option>' +
                        '</select>';
                    $('#dynamic-fields').append(dynamicSelect);

                    $('select[name="licenseStatus"]').on('change', function() {
                        var licenseStatusValue = $(this).val();
                        $('#dynamic-fields').find('.dynamic-input')
                            .remove(); // Clear any previous dynamic input fields

                        if (licenseStatusValue === 'loaded') {
                            $('#dynamic-fields').append('<div class="dynamic-input">' +
                                '<label>Enter Driver CNIC number:</label>' +
                                '<input type="text" name="driverCNIC" class="form-control">' +
                                '</div>');
                        } else if (licenseStatusValue === 'empty') {
                            $('#dynamic-fields').append('<div class="dynamic-input">' +
                                '<label>Who is responsible?</label>' +
                                '<input type="text" name="responsible" class="form-control">' +
                                '</div>');
                        }
                    });
                }
            });
        });
        </script>
        <script src="assets/js/custom.js"></script>
        <script src="plugins/table/datatable/datatables.js"></script>
        <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
        <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
        <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
        <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
        <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
        <script src="plugins/treeview/custom-jstree.js"></script>
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>


        <script>
        function toggleInputs() {
            const yesRadio = document.querySelector('input[value="yes"]');
            const addCninInput = document.getElementById('addCninInput');
            const responsibleInput = document.getElementById('responsibleInput');

            if (yesRadio.checked) {
                addCninInput.style.display = 'block';
                responsibleInput.style.display = 'none';
            } else {
                addCninInput.style.display = 'none';
                responsibleInput.style.display = 'block';
            }
        }
        $('#html5-extension').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        $('#html5-extension1').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        $('#html5-extension_n4').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        $('#html5-extension_night').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        $('#html5-extension_blackspot').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        </script>

        <script>
        function send_mail() {

            var email_arr = [];



            $('#multi_mail :selected').each(function(key) {
                email_arr[key] = $(this).val();


            })
            // alert(email_arr);



            // var r_email = [];
            // r_email.push('ahmedhamzaansari.99@gmail.com')

            $.ajax({
                url: 'http://151.106.17.246:8080/sitara_schedule_email/current_location_report.php',
                type: 'POST',
                data: {
                    email_arr: email_arr
                },
                beforeSend: function() {
                    // $('#insert').val("Updating");
                    $("#insert").prop("disabled", true);
                    $("#loader1").show();
                    $('#insert').val("Sending");
                    $('#title_edit').text("Sending Mail");


                },
                success: function(data) {


                    console.log(data)

                    setTimeout(() => {
                        $("#employee_table").fadeOut();
                        // $('#employee_table').html('');

                    }, 5000);






                },
                complete: function(data) {
                    // Hide image container
                    $("#loader1").hide();
                    $('#employee_table').html('<h1> Mail Send Successfully ..!</h1>');
                    $("#insert").prop("disabled", false);
                    $('#insert').val("Send");

                    $('#title_edit').text("Send Mail");

                    // $('#zoomupModal').modal('hide');
                }
            });



        }
        </script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>
<?php 
} else {
    ?>
<h2>Link Expired</h2>
<?php 
}
?>