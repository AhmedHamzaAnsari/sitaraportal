<?php
include("sessioninput.php");


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Go Get Going With Go </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" class="dashboard-sales" />
    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="assets/css/elements/custom-tree_view.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    @font-face {
        font-family: myFirstFont;
        src: url(sansation_light.woff);
    }

    .widget-account-invoice-two {
        background-image: 0;
        background: #fff !important;
    }

    .component-card_3 .card-body {
        background: #1b1650;
        border-radius: 10px;
    }

    /* .component-card_3 .card-body h5.card-user_name{
            color: #f47621;
        } */
    .navbar .navbar-item.search-ul {
        margin-left: auto;
        margin-right: 0;
    }

    .widget-one_hybrid.widget-followers {
        background: #fff;
    }

    .widget-one_hybrid.widget-referral {
        background: #fff;

    }

    .widget-one_hybrid.widget-engagement {
        background: #fff;

    }

    .file-tree li.file-tree-folder::before {
        content: url(data:image/svg+xml <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="%232b50ed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>);



    }

    .component-card_7 {
        width: 100% !important;
    }

    .caret::before {
        display: none !important;
    }

    .car_upper {
        text-transform: uppercase !important;
    }

    .table-responsive {
        overflow: auto !important
    }
    </style>

    <?php function clean($string)
    {
        $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
    
        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    }

    $todate = date("Y-m-d H:i:s", time());
    $prev_date = date("Y-m-d H:i:s", strtotime($todate . ' -1 day'));
    include("config_indemnifier.php");
  





    $five_hour_back_time = date("Y-m-d H:i:s", strtotime('-5 hours'));


    $user_id=$_SESSION['userid'];
    $sap = $_GET['sap'];
    $s_id = $_GET['id'];
  


    $result_overspeed=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('Overspeed') and sa.delivery_no='$sap' and sa.id='$s_id' group by da.id");
    $count_trip_overspeed= mysqli_num_rows($result_overspeed);

    $result_blackspot=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('Un-Authorized Stop') and sa.delivery_no='$sap' and sa.id='$s_id'  group by da.id");
    $count_trip_blackspot= mysqli_num_rows($result_blackspot);

    $result_night=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('Night time violations') and sa.delivery_no='$sap' and sa.id='$s_id'  group by da.id");
    $count_trip_night= mysqli_num_rows($result_night);

    $result_excess=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join axcess_driving_alerts as da on da.vehicle_id=dc.id
    where da.created_at>=sa.created_at and (CASE
    WHEN sa.close_time='' THEN da.created_at <= NOW()
    ELSE da.created_at <= sa.close_time
    END) and da.created_by='$user_id'  and sa.delivery_no='$sap' and sa.id='$s_id' group by da.id");
    $count_trip_excess= mysqli_num_rows($result_excess);


    $result15 = mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('NR With Load') and sa.delivery_no='$sap' and sa.id='$s_id'  group by da.id");
    $nr_devices = mysqli_num_rows($result15);

    ?>


    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>


<body class="sidebar-noneoverflow starterkit">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <script>
    var arr_car = [];
    var car_lable = [];

    var route_data = [];
    var markersArray = [];
    
    </script>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3" y2="6"></line>
                    <line x1="3" y1="12" x2="3" y2="12"></line>
                    <line x1="3" y1="18" x2="3" y2="18"></line>
                </svg></a>

            <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> -->
                    <h2>

                    </h2>
                </li>
            </ul>

            <ul class="navbar-item flex-row navbar-dropdown">

                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" onClick="window.location.reload();" class="nav-link dropdown-toggle"
                        id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-refresh-ccw">
                            <polyline points="1 4 1 10 7 10"></polyline>
                            <polyline points="23 20 23 14 17 14"></polyline>
                            <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                        </svg>
                    </a>

                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp"
                        aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp"
                        aria-labelledby="userProfileDropdown">

                        <div class="dropdown-item">
                            <a href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php include 'sidebar.php'; ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <!-- <div class="container-fluid my-3">
                    <div class="row">
                        <div class="col-md-3">
                        <select class="selectpicker" id="user_track" onchange="mytraker()">
                            <option >Select User</option>
                            <option value="198">tracking_world</option>
                            <option value="230">al shyma</option>
                        </select>
                        </div>
                       
                    </div>
                    
                </div> -->

                <div class="container-fluid">


                    <!-- start page title -->

                    <div class="row ">
                        <div class="col-md-6 bg-light py-4">
                            <div class="row p-0">

                                <div class="col-2 mb-1 p-0 text-center" title="Excess Driving" onclick="excess_drive()">
                                    <button type="button" id="running"
                                        class="btn btn-soft-info waves-effect waves-light w-sm"
                                        style="min-width: 60px !important;background-color: white;">
                                        <i class="fas fa-shipping-fast d-block font-size-16"
                                            style="color: rgb(29, 115, 141);"></i>
                                        <b><?php echo $count_trip_excess ?></b>
                                    </button>
                                    <!-- <i class="fas fa-location-arrow" style="color: rgb(67, 153, 10);"></i>
                                                        <p> <b>150</b> </p> -->
                                </div>
                                <div class="col-2 mb-1 p-0 text-center" title="Night time Violations"
                                    onclick="night_time()">
                                    <button type="button" id="idle"
                                        class="btn btn-soft-warning waves-effect waves-light w-sm"
                                        style="min-width: 60px !important;background-color: white;">
                                        <i class="fas fa-cloud-moon d-block font-size-16" style="color: #E6B730;"></i>
                                        <b><?php echo $count_trip_night ?></b>
                                    </button>
                                    <!-- <i class="fas fa-hourglass-half" style="color: rgb(248, 229, 59);"></i>
                                                        <p> <b>10</b> </p> -->
                                </div>
                                <div class="col-2 mb-1 p-0 text-center" title="No Vehicles Activity Recored"
                                    onclick="activity_record()">
                                    <button type="button" id="inactive"
                                        class="btn btn-soft-purple waves-effect waves-light w-sm"
                                        style="min-width: 60px !important;background-color: white;">
                                        <i class="fas fa-ban d-block font-size-16" style="color: #751386;"></i>
                                        <b><?php echo $nr_devices; ?></b>
                                    </button>
                                    <!-- <i class="fas fa-ban" style="color: rgb(7, 149, 206);"></i>
                                                        <p> <b>10</b> </p> -->
                                </div>
                                <div class="col-2 mb-1 p-0 text-center" title="Speed Violation" onclick="speed_over()">
                                    <button type="button" id="nodata"
                                        class="btn btn-soft-danger waves-effect waves-light w-sm"
                                        style="min-width: 60px !important;background-color: white;">
                                        <i class="fas fa-tachometer-alt d-block font-size-16"
                                            style="color: #a70000;"></i>
                                        <b><?php echo $count_trip_overspeed; ?></b>
                                    </button>
                                    <!-- <i class="fab fa-creative-commons-zero" style="color: rgba(122, 122, 122, 0.973);"></i>
                                                        <p> <b>10</b> </p> -->
                                </div>
                                <div class="col-2 mb-1 p-0 text-center" title="Black Spot" onclick="blacks()">
                                    <button type="button" id="total"
                                        class="btn btn-soft-primary waves-effect waves-light w-sm"
                                        style="min-width: 60px !important;background-color: white;">
                                        <i class="fas fa-skull-crossbones align-middle d-block font-size-16"
                                            style="color: rgb(89, 7, 184);"></i>
                                        <b><?php echo $count_trip_blackspot ?></b>
                                    </button>
                                    <!-- <i class="fas fa-check-double align-middle" style="color: rgb(89, 7, 184);"></i>
                                                        <p> <b>1500</b> </p> -->
                                </div>
                            </div>

                            <div class="row layout-top-spacing">




                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing d-none" id="all_car">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">All Vehicle</h3>
                                            </center>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="moving_car">
                                    <div class="widget-content widget-content-area br-6">

                                        <div class="table-responsive mb-4 mt-4">


                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="moving_stop">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="never_report">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">All Vehicle</h3>
                                            </center>
                                            <table id="html5-extension3" class="table table-hover non-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Reg No</th>
                                                        <th>Reporting Time</th>
                                                        <th>Location</th>
                                                        <th>Coordinates</th>
                                                        <th>Speed</th>



                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="activity_record">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">No Vehicles Activity Recored</h3>
                                            </center>
                                            <table id="html5-extension4" class="table table-hover non-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>SAP #</th>
                                                        <th>Vehicle # </th>

                                                        <th>Alert</th>
                                                        <th>Time</th>




                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result15)) {
                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i ?></td>
                                                        <td><?php echo $row["delivery_no"]; ?></td>
                                                        <td><?php echo $row["vehicle_no"]; ?></td>

                                                        <td class="text-center">
                                                            <?php echo $row["message"]; ?>
                                                        </td>


                                                        <td class="text-center">
                                                            <?php echo $row["created_at"]; ?>
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
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="speed_over">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">Speed Violation</h3>
                                            </center>
                                            <table id="html5-extension5" class="table table-hover non-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>SAP #</th>
                                                        <th>Vehicle # </th>

                                                        <th>Alert</th>
                                                        <th>Time</th>



                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result_overspeed)) {
                    ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row["delivery_no"]; ?></td>
                                                        <td><?php echo $row["vehicle_no"]; ?></td>

                                                        <td>
                                                            <?php echo $row["message"]; ?>
                                                        </td>


                                                        <td>
                                                            <?php echo $row["created_at"]; ?>
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
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="ideal_state">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            \
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="api_nr">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">


                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="black__spot">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">Black Spot</h3>
                                            </center>
                                            <table id="html5-extension8" class="table table-hover non-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>SAP #</th>
                                                        <th>Vehicle # </th>

                                                        <th>Alert</th>
                                                        <th>Time</th>




                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result_blackspot)) {
                    ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row["delivery_no"]; ?></td>
                                                        <td><?php echo $row["vehicle_no"]; ?></td>

                                                        <td>
                                                            <?php echo $row["message"]; ?>
                                                        </td>


                                                        <td>
                                                            <?php echo $row["created_at"]; ?>
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
                                </div>

                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="night__time">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">Night time Violations</h3>
                                            </center>
                                            <table id="html5-extension15" class="table table-hover non-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>SAP #</th>
                                                        <th>Vehicle # </th>

                                                        <th>Alert</th>
                                                        <th>Time</th>



                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result_night)) {
                    ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row["delivery_no"]; ?></td>
                                                        <td><?php echo $row["vehicle_no"]; ?></td>

                                                        <td>
                                                            <?php echo $row["message"]; ?>
                                                        </td>


                                                        <td>
                                                            <?php echo $row["created_at"]; ?>
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
                                </div>


                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                                    id="excess__drive">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <center>
                                                <h3 style="color: #24245c;">Excess Driving</h3>
                                            </center>
                                            <table id="html5-extension16" class="table table-hover non-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>SAP #</th>
                                                        <th>Vehicle # </th>

                                                        <th>Alert</th>
                                                        <th>Time</th>



                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_array($result_excess)) {
                                                        ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i ?></td>
                                                        <td><?php echo $row["delivery_no"]; ?></td>
                                                        <td><?php echo $row["vehicle_no"]; ?></td>

                                                        <td class="text-center">
                                                            <?php echo $row["message"]; ?>
                                                        </td>


                                                        <td class="text-center">
                                                            <?php echo $row["created_at"]; ?>
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
                                </div>

                                <!-- list end -->
                                <!-- graph start -->


                                <!-- graph end -->
                            </div>


                        </div>

                        <div class="col-md-6 p-0">
                            <div id="map-canvas" style="width: 100%; height: 100vh; z-index: 0;" class="">

                            </div>
                        </div>

                    </div>




                </div>
            </div>

        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
    $(document).ready(function() {
        App.init();
        myFunction()
    });
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="plugins/apex/apexcharts.min.js"></script>
    <!-- <script src="assets/js/dashboard/dash_1.js"></script> -->
    <!-- <script src="assets/js/dashboard/dash_2.js"></script> -->
    <script src="plugins/treeview/custom-jstree.js"></script>

    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script>
    function chup() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "block";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";









    }
    </script>
    <script>
    function dis_all() {
        //alert("Running")
        document.getElementById("all_car").style.display = "block";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";









    }
    </script>
    <script>
    function vehi_stop() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "block";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";








    }
    </script>
    <script>
    function never_report() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "block";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";







    }
    </script>
    <script>
    function activity_record() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "block";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";






    }
    </script>
    <script>
    function speed_over() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "block";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";





    }
    </script>
    <script>
    function ideal_state() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "block";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";




    }
    </script>
    <script>
    function api_nr() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "block";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";




    }
    </script>
    <script>
    function blacks() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "block";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "none";


    }

    function night_time() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "block";
        document.getElementById("excess__drive").style.display = "none";

    }

    function excess_drive() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("night__time").style.display = "none";
        document.getElementById("excess__drive").style.display = "block";
    }
    </script>
    <script>
    $('#html5-extension15').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension2').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension4').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension5').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension6').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension7').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension8').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    $('#html5-extension16').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm'
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
    let map;
    var circle;
    let flightPath;

    function initMap() {

        gmarkers = [];
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: {
                lat: 30.3753,
                lng: 69.3451
            },
            zoom: 6,

        });





    }
    </script>

    <script>
    var startTime;
    var pre_time = 0;
    var end_time;
    var hours;

    function myFunction() {
        
        var sap_no = "<?php echo $_GET['sap']?>";
        var id = "<?php echo $_GET['id']?>";
        const format1 = "YYYY-MM-DD HH:mm:ss";

        

        if (sap_no != "" && id != "") {
            const flightPlanCoordinates = [];
            // drawing


            $.ajax({
                url: 'ajax_edit/sap_trip_route.php',
                type: 'POST',
                data: {
                    sap_no: sap_no,
                    id: id
                },
                success: function(data) {

                    data = JSON.parse(data);

                    var len = data.length;
                    if (len > 0) {
                       
                        const lineSymbol = {
                            path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        };


                        var i = 0;
                        const image = "images/rec.png";
                        const start = "images/icon/car_icon_blue.png";
                        const end = "images/icon/car_red.png";
                        const stops = "images/stop-sign1.png";
                        data.forEach(obj => {

                            var vehicle_name = data[i][0];
                            var lat = data[i][1];
                            var lng = data[i][2];
                            var speed = data[i][3];
                            var power = data[i][5];
                            var location = data[i][6];
                            var time = data[i][4];
                            var positiona = new google.maps.LatLng(lat, lng);
                            //console.log("Samad" + i)
                            //console.log(len)
                            if (i == 0) {
                                //console.log("samad")
                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map,
                                    icon: {
                                        url: start,
                                    },


                                });
                                markersArray.push(marker);

                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Details:' + '<p>Vehical # :' +
                                        vehicle_name +
                                        '</p>' + '<p>Start Location # :' + location +
                                        '</p>' + '<p>Latitude:' + lat + '</p>' +
                                        '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                        speed +
                                        '</p>' + '<p>Last:' + time + '</p>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }

                            if (power === '0' && speed === '0') {
                                var starting = time;
                                console.log("starting " + starting);
                                console.log("pre " + pre_time);
                                //  startTime = time;
                                //  pre_time = startTime;
                                // if (pre_time === 0) {
                                //     startTime = time;
                                //     pre_time = starting;

                                //     console.log("pre " + pre_time)
                                // }

                                if (i == 0) {
                                    startTime = starting;

                                    // pre_time = starting;
                                    ////console.loNext Time" + next_time)
                                    var now = moment(startTime); //todays date
                                    var ends = moment(pre_time); // another date
                                    // console.log("start " + now);
                                    // console.log("End " + ends);
                                    var duration = moment.duration(now.diff(ends));
                                    hours = duration.asMinutes();
                                    console.log(hours)
                                    pre_time = startTime;
                                } else {
                                    startTime = starting;

                                    ////console.loNext Time" + next_time)
                                    var now = moment(startTime); //todays date
                                    var ends = moment(pre_time); // another date
                                    // console.log("start " + now);
                                    // console.log("End " + ends);
                                    var duration = moment.duration(now.diff(ends));
                                    hours = duration.asMinutes();
                                    console.log(hours)
                                    pre_time = startTime;
                                }


                                // var now = moment(startTime); //todays date
                                // var ends = moment(pre_time); // another date
                                // console.log("start " + now);
                                // console.log("End " + ends);
                                // var duration = moment.duration(now.diff(ends));
                                // var hours = duration.asHours();
                                // console.log(hours)
                                // pre_time = 0;

                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map,
                                    icon: {
                                        url: stops,
                                    },


                                });
                                markersArray.push(marker);
                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Details:' + '<p>Vehical # :' +
                                        vehicle_name +
                                        '</p>' + '<p>Stop Location # :' + location +
                                        '</p>' + '<p>Latitude:' + lat + '</p>' +
                                        '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                        speed +
                                        '</p>' + '<p>Last:' + time + '</p>' +
                                        '<p>Stop Duration:' + Math.round(hours) +
                                        ' Minutes' + '</p>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }

                            if (i == len - 1) {
                                //console.log("samad")
                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map,
                                    icon: {
                                        url: end,
                                    },

                                });
                                markersArray.push(marker);
                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Details:' + '<p>Vehical # :' +
                                        vehicle_name +
                                        '</p>' + '<p>End Location # :' + location +
                                        '</p>' + '<p>Latitude:' + lat + '</p>' +
                                        '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                        speed +
                                        '</p>' + '<p>Last:' + time + '</p>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }
                            // var speed = data[i][3];
                            // var time = data[i][4];

                            var lati = parseFloat(lat)
                            var lngi = parseFloat(lng)
                            var position = new google.maps.LatLng(lat, lng);
                            flightPlanCoordinates.push({
                                lat: lati,
                                lng: lngi
                            });
                            map.setCenter(position);
                            map.setZoom(12)

                            // //console.log(route_data);
                            i++;

                        });
                        //console.log(flightPlanCoordinates);

                        flightPath = new google.maps.Polyline({
                            path: flightPlanCoordinates,
                            geodesic: true,
                            strokeColor: "#FF0000",
                            strokeOpacity: 1.0,
                            strokeWeight: 2,
                            icons: [{
                                icon: lineSymbol,
                                offset: "100%",
                                repeat: '30px',
                            }, ],

                        });

                        flightPath.setMap(map);
                    } else {
                        alert("Data Not Found");
                        document.getElementById("drawing").disabled = false;

                    }





                }
            });

        } else {
            alert("Please Select Field")

        }
    }
    </script>



    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
    setInterval(function() {
        window.location.reload();
    }, 180000);
    </script>


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>