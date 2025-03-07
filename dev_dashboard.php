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
    </style>

    <?php function clean($string)
    {
        $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
    
        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    }

    $todate = date("Y-m-d H:i:s", time());
    $prev_date = date("Y-m-d H:i:s", strtotime($todate . ' -1 day'));
    include("config_indemnifier.php");
    $id = $_GET['id'];
    $from = $_GET['from'];
    $to = $_GET['to'];
    // $idd=$_SESSION['userid'];
    $result__ = mysqli_query($db, "SELECT * FROM users where id='$id'");
    $data__ = mysqli_fetch_array($result__);
    if ($data__['privilege'] === 'Admin' || $data__['privilege'] === 'Depot' || $data__['privilege'] === 'viewer' || $data__['privilege'] === 'Distributor' || $data__['privilege'] === 'admin_user') {

        $result = mysqli_query($db, "SELECT * FROM users where id='1'");
        $data = mysqli_fetch_array($result);
        $id = $data['id'];
    } else {
        $result = mysqli_query($db, "SELECT * FROM users where id='$id'");
        $data = mysqli_fetch_array($result);
        $id = $data['id'];
    }






    $five_hour_back_time = date("Y-m-d H:i:s", strtotime('-5 hours'));

    $black_ = mysqli_query($db, "SELECT count(*) as black_spot FROM geo_in_check join users_devices_new as ud on ud.devices_id = geo_in_check.veh_id where geotype='black spote' and in_time>='$five_hour_back_time' and ud.users_id ='$id'");
    $blacking = mysqli_fetch_array($black_);


    $result12 = mysqli_query($db, "SELECT dc.name,dc.tracker as vehicle_make,dc.time,dc.speed,dc.location as vlocation ,dc.lat as latitude,dc.lng as longitude FROM users_devices_new as ud 
    join devicesnew as dc on dc.id=ud.devices_id where ud.users_id='$id'");
    $all_devices = mysqli_num_rows($result12);
    $result13 = mysqli_query($db, "SELECT dc.name,dc.tracker as vehicle_make,dc.time,dc.speed,dc.location as vlocation ,dc.lat as latitude,dc.lng as longitude FROM users_devices_new as ud 
    join devicesnew as dc on dc.id=ud.devices_id where  dc.speed>0 and  dc.speed < 60 and dc.time >='$prev_date' and ud.users_id='$id'");
    $moving_devices = mysqli_num_rows($result13);
    $result14 = mysqli_query($db, "SELECT dc.name,dc.tracker as vehicle_make,dc.time,dc.speed,dc.location as vlocation ,dc.lat as latitude,dc.lng as longitude FROM users_devices_new as ud 
    join devicesnew as dc on dc.id=ud.devices_id where dc.speed=0 and dc.ignition = 'Off' and dc.time >='$prev_date' and ud.users_id='$id';");
    $stop_devices = mysqli_num_rows($result14);
    $result15 = mysqli_query($db, "SELECT dc.name,dc.tracker as vehicle_make,dc.time,dc.speed,dc.location as vlocation ,dc.lat as latitude,dc.lng as longitude FROM users_devices_new as ud 
    join devicesnew as dc on dc.id=ud.devices_id where dc.time <='$prev_date' and ud.users_id='$id'");
    $nr_devices = mysqli_num_rows($result15);

    $result16 = mysqli_query($db, "SELECT da.*,dc.name FROM driving_alerts as da join devicesnew as dc on dc.id=da.device_id where 
    da.type='Overspeed' and da.created_at>='$from' and da.created_at<='$to' and da.created_by='$id' order by time desc");
    $overspeed_devices = mysqli_num_rows($result16);


    $result17 = mysqli_query($db, "SELECT dc.name,dc.tracker as vehicle_make,dc.time,dc.speed,dc.location as vlocation ,dc.lat as latitude,dc.lng as longitude FROM users_devices_new as ud 
    join devicesnew as dc on dc.id=ud.devices_id where dc.speed = 0 and dc.ignition ='On' and dc.time >='$prev_date' and ud.users_id='$id'");
    $idle_devices = mysqli_num_rows($result17);

    $result18 = mysqli_query($db, "SELECT * FROM geo_in_check join users_devices_new as ud on ud.devices_id = geo_in_check.veh_id where geotype='black spote' and in_time>='$five_hour_back_time' and ud.users_id ='$id'");
    $resultblack = mysqli_query($db, "SELECT da.*,dc.name FROM driving_alerts as da join devicesnew as dc on dc.id=da.device_id 
    where da.type='Un-Authorized Stop' and da.created_at>='$from' and da.created_at<='$to' and da.created_by='$id'");
    $black_count = mysqli_num_rows($resultblack);


    $resultnight = mysqli_query($db, "SELECT da.*,dc.name FROM driving_alerts as da join devicesnew as dc on dc.id=da.device_id where da.type='Night time violations' and da.created_at>='$from' and da.created_at<='$to' and da.created_by='$id'");
    $night_count = mysqli_num_rows($resultnight);

    $resultexcess = mysqli_query($db, "SELECT da.*,dc.name FROM axcess_driving_alerts as da 
    join devicesnew as dc on dc.id=da.vehicle_id 
    where da.created_at>='$from' and da.created_at<='$to' and da.created_by='$id'");
    $excess_count = mysqli_num_rows($resultexcess);


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
                    <h2 class="text-center">
                        <?php echo $data__['name']; ?>
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
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">From</label>
                            <input type="date" class="form-control " id="from" name="from" required
                                value='<?php echo $_GET['from'] ?>'>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">To</label>
                            <input type="date" class="form-control " id="to" name="to" required
                                value='<?php echo $_GET['to'] ?>'>
                        </div>
                        <div class="col-md-2">
                            <button class="btn marron_bg mt-4" type="button" onclick='forward_date()'>Get Data</button>
                        </div>

                        <script>
                        function forward_date() {
                            var from = $('#from').val();
                            var to = $('#to').val();
                            if (from != "" && to != "") {
                                window.location = "dev_dashboard.php?id=<?php echo $id; ?>&from=" + from + "&to=" + to + "";
                            } else {
                                alert('Please Select Date')
                            }
                        }
                        </script>
                    </div>
                    <div class="row layout-top-spacing">

                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#24245b !important ;  cursor: pointer;"
                                            onclick="dis_all()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-car p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> Total Vehicle</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $all_devices; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#3b78b7 !important ;  cursor: pointer;"
                                            onclick="chup()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-route p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> Vehicles Currently
                                                        Moving
                                                    </h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $moving_devices; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#ea7372 !important ;  cursor: pointer;"
                                            onclick="vehi_stop()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-stop-circle p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> Vehicles Currently
                                                        Stopped</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $stop_devices; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#e6b730 !important ;  cursor: pointer;"
                                            onclick="ideal_state()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-pause p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> Idle State</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $idle_devices; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#c34c9c !important ;  cursor: pointer;"
                                            onclick="activity_record()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-tasks p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> No Vehicles Activity
                                                        Recored</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $nr_devices; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#e62e2d !important ;  cursor: pointer;"
                                            onclick="speed_over()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-tachometer-alt p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> Speed Violation</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $overspeed_devices; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#421515 !important ;  cursor: pointer;"
                                            onclick="blacks()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-tachometer-alt p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff"> Black Spot</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $black_count ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#000 !important ;  cursor: pointer;"
                                            onclick="night_time()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-tachometer-alt p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff">Night time Violations
                                                    </h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $night_count ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#205a3d !important ;  cursor: pointer;"
                                            onclick="excess_drive()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-tachometer-alt p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff">Excess Driving</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $excess_count ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- list start -->


                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="all_car">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <center>
                                        <h3 style="color: #24245c;">All Vehicle</h3>
                                    </center>
                                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Reporting Time</th>
                                                <th>Location</th>
                                                <th>Coordinates</th>
                                                <th>Speed</th>
                                                <th>Tracker</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row1 = mysqli_fetch_array($result12)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <?php if ($row1["speed"] >= '60') { ?>
                                                <td class="car_upper"
                                                    style="background:#e62e2d !important ;  color: #fff;">
                                                    <?php echo $row1["name"]; ?>
                                                </td>
                                                <?php } elseif ($row1["speed"] === '0') { ?>
                                                <td class="car_upper"
                                                    style="background:#ea7372 !important ;  color: #fff;">
                                                    <?php echo $row1["name"]; ?>
                                                </td>

                                                <?php } elseif ($row1["speed"] > '0') { ?>
                                                <td class="car_upper"
                                                    style="background:#3b78b7 !important ;  color: #fff;">
                                                    <?php echo $row1["name"]; ?>
                                                </td>



                                                <?php } else {
                                                } ?>
                                                <td>
                                                    <?php echo $row1["time"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row1["vlocation"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row1["latitude"] . ' , ' . $row1["longitude"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row1["speed"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row1["vehicle_make"]; ?>
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="moving_car">
                            <div class="widget-content widget-content-area br-6">
                                <!-- <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="addAsset.php"> <button class="btn btn-primary">ADD Asset</button>
                                        </a>

                                    </div>
                                </div>
                            </div> -->
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension1" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Reporting Time</th>
                                                <th>Location</th>
                                                <th>Coordinates</th>

                                                <th>Speed</th>
                                                <th>Tracker</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result13)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#3b78b7 !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["time"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["vlocation"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["latitude"] . ' , ' . $row["longitude"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row["speed"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["vehicle_make"]; ?>
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
                            id="moving_stop">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension2" class="table table-hover non-hover" style="width:100%">
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
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result14)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#ea7372  !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?></td>
                                                <td>
                                                    <?php echo $row["time"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["vlocation"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["latitude"] . ' , ' . $row["longitude"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row["speed"]; ?>
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
                            id="never_report">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension3" class="table table-hover non-hover" style="width:100%">
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                            id="activity_record">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension4" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Reporting Time</th>
                                                <th>Location</th>
                                                <th>Coordinates</th>
                                                <th>Speed</th>
                                                <th>Tracker</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result15)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#c24e9d  !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?></td>
                                                <td>
                                                    <?php echo $row["time"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["vlocation"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["latitude"] . ' , ' . $row["longitude"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row["speed"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row["vehicle_make"]; ?>
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="speed_over">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension5" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Reporting Time</th>
                                                <th>Detail Message</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result16)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#e63130  !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?></td>
                                                <td>
                                                    <?php echo $row["time"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["message"]; ?>
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
                                    <table id="html5-extension6" class="table table-hover non-hover" style="width:100%">
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
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result17)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td style="background:#e6b730  !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["time"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["vlocation"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["latitude"] . ' , ' . $row["longitude"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row["speed"]; ?>
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="api_nr">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension7" class="table table-hover non-hover" style="width:100%">
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                            id="black__spot">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension8" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Detail</th>
                                                <th>In Time</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($resultblack)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#421515  !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?></td>
                                                <td>
                                                    <?php echo $row["message"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["in_time"]; ?>
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
                                    <table id="html5-extension15" class="table table-hover non-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Detail</th>
                                                <th>Created At</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($resultnight)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#421515  !important ;  color: #fff;">
                                                    <?php echo $row["name"]; ?></td>
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
                                    <table id="html5-extension16" class="table table-hover non-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Detail</th>
                                                <th>Duration (IN Minutes)</th>
                                                <th>Created At</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($resultexcess)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td class="car_upper"
                                                    style="background:#421515  !important ;  color: #fff;">
                                                    <?php echo $row["vehicle_name"]; ?></td>
                                                <td>
                                                    <?php echo $row["message"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["duration"]; ?>
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

                        <!-- list end -->
                        <!-- graph start -->
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <h5 class="">Black Spot Status</h5>
                                    <div class="loader_load d-none" style="text-align: center;">
                                        <img src="images/loader_load.gif" alt="Loading..." style="height: 130px;" />
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="radial-chart" class=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-two">
                                <div class="widget-heading">
                                    <h5 class="">Depot Status</h5>
                                    <div class="loader_load d-none" style="text-align: center;">
                                        <img src="images/loader_load.gif" alt="Loading..." style="height: 130px;" />
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="radial-chart1" class=""></div>

                                </div>
                            </div>
                        </div>
                        <!-- graph end -->
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
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
    $(document).ready(function() {
        $('.loader_load').removeClass('d-none');
        $.ajax({
            url: "api/geo_list_graph.php",
            method: "POST",
            data: {
                employee_id: "geo"
            },
            dataType: "json",
            success: function(data) {
                // console.log(data.depot_count)
                // console.log(data.consignee_name)
                // console.log(data.blackSpot_count)
                // console.log(data.back_consignee_name)
                var donutChart = {
                    chart: {
                        height: 350,
                        type: 'donut',
                        toolbar: {
                            show: false,
                        }
                    },
                    series: JSON.parse(data.depot_count),
                    labels: JSON.parse(data.consignee_name),
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                }

                var donut = new ApexCharts(
                    document.querySelector("#radial-chart1"),
                    donutChart
                );

                donut.render();

                var donutChart1 = {
                    chart: {
                        height: 350,
                        type: 'donut',
                        toolbar: {
                            show: false,
                        }
                    },
                    series: JSON.parse(data.blackSpot_count),
                    labels: JSON.parse(data.back_consignee_name),
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                }

                var donut1 = new ApexCharts(
                    document.querySelector("#radial-chart"),
                    donutChart1
                );

                donut1.render();

            },
            complete: function(data) {
                $('.loader_load').addClass('d-none');
            }

        });


    });

    setInterval(function() {
        window.location.reload();
    }, 180000);
    </script>


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>