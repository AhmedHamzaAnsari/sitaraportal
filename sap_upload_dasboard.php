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
    <title>Sitara</title>
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
    // $froming = $_GET['from'];

    $result12=mysqli_query($db, "SELECT sd.*,dc.lat,dc.lng,dc.location,dc.time,dc.ignition FROM sap_data_upload as sd
    left join devicesnew as dc on dc.name=sd.tl_no where sd.is_tracker=0 group by sd.tl_no,sd.delivery_no order by sd.id desc;");
    $count_t_loads= mysqli_num_rows($result12);

    $tt_trips=mysqli_query($db, "SELECT sd.*,dc.lat,dc.lng,dc.location,dc.time,dc.ignition FROM sap_data_upload as sd
    left join devicesnew as dc on dc.name=sd.tl_no group by sd.delivery_no order by sd.id desc;");
    $count_tt_trips= mysqli_num_rows($tt_trips);

    
    $result14=mysqli_query($db, "SELECT * FROM sap_data_upload where status=0 group by tl_no,delivery_no order by id desc");
    $count_trip_end= mysqli_num_rows($result14);

    $result_with_out_tracker=mysqli_query($db, "SELECT * FROM sap_data_upload where is_tracker=1 group by tl_no,delivery_no order by id desc;");
    $count_with_out_tracker= mysqli_num_rows($result_with_out_tracker);

    $result_trip_diversion=mysqli_query($db, "SELECT tl_no,count(tl_no) as count,dc.lat,dc.lng,dc.location,dc.time,dc.ignition FROM sap_data_upload as sd
    left join devicesnew as dc on dc.name=sd.tl_no where sd.is_tracker=0 group by sd.tl_no,sd.delivery_no order by sd.id desc");
    $count_trip_diversion= mysqli_num_rows($result_trip_diversion);

    $result_trip_comp=mysqli_query($db, "SELECT * FROM sap_data_upload where and status=1 group by tl_no,delivery_no order by id desc;");
    $count_trip_comp= mysqli_num_rows($result_trip_comp);


    $result_overspeed=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
    WHEN sa.close_time='' THEN da.created_at <= NOW()
    ELSE da.created_at <= sa.close_time
    END) and da.created_by='$user_id' and da.type IN ('Overspeed')  group by da.id,sa.tl_no order by da.created_at desc");
    $count_trip_overspeed= mysqli_num_rows($result_overspeed);

    $result_blackspot=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('Un-Authorized Stop')  group by da.id,sa.tl_no order by da.created_at desc");
    $count_trip_blackspot= mysqli_num_rows($result_blackspot);

    $result_night=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('Night time violations')  group by da.id,sa.tl_no order by da.created_at desc");
    $count_trip_night= mysqli_num_rows($result_night);

    $result_excess=mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join axcess_driving_alerts as da on da.vehicle_id=dc.id
    where da.created_at>=sa.created_at and (CASE
    WHEN sa.close_time='' THEN da.created_at <= NOW()
    ELSE da.created_at <= sa.close_time
    END) and da.created_by='$user_id'  group by da.id,sa.tl_no order by da.created_at desc");
    $count_trip_excess= mysqli_num_rows($result_excess);


    $result15 = mysqli_query($db, "SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
    join devicesnew as dc on dc.name=sa.tl_no
    join driving_alerts as da on da.device_id=dc.id
    where da.created_at>=sa.created_at and (CASE
            WHEN sa.close_time='' THEN da.created_at <= NOW()
            ELSE da.created_at <= sa.close_time
        END) and da.created_by='$user_id' and da.type IN ('NR With Load')  group by da.id,sa.tl_no order by da.created_at desc");
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
                    <!-- <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">From</label>
                            <input type="date" class="form-control " id="from" name="from" required
                                value='<?php echo $_GET['from'] ?>'>
                        </div>

                        <div class="col-md-2">
                            <button class="btn marron_bg mt-4" type="button" onclick='forward_date()'>Get Data</button>
                        </div>

                        <script>
                        function forward_date() {
                            var from = $('#from').val();
                            if (from != "") {
                                window.location = "sap_upload_dasboard.php?from=" + from;
                            } else {
                                alert('Please Select Date')
                            }
                        }
                        </script>
                    </div> -->
                    <div class="row layout-top-spacing">
                        <div class="col-nd-12">
                            <h3>Date : <span id='upload_date'></span></h3>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="row">
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
                                                    <h6 class="card-user_name" style="color:#fff">Total Sap Trips
                                                    </h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $count_tt_trips; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                    <h6 class="card-user_name" style="color:#fff">Integrated SAP Trips
                                                    </h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $count_t_loads; ?>
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
                                                    <h6 class="card-user_name" style="color:#fff"> Distinct</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $count_trip_diversion; ?>
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
                                                        <?php echo $count_trip_overspeed; ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
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
                                                        <?php echo $count_trip_blackspot ?>
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
                                                        <?php echo $count_trip_night ?>
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
                                                        <?php echo $count_trip_excess ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card component-card_7">
                                        <div class="card-body" style="background:#e6b730 !important ;  cursor: pointer;"
                                            onclick="ideal_state()">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fas fa-pause p-3"
                                                        style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="card-user_name" style="color:#fff">Without Tracker
                                                        Vehicle</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;">
                                                        <?php echo $count_with_out_tracker; ?>
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
                                        <h3 style="color: #24245c;">All Trips</h3>
                                    </center>
                                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Tank Lorry #</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Location</th>
                                                <th>Time</th>
                                                <th>Ignition</th>
                                                <th>Delivery No.</th>
                                                <th>GI Posting Date</th>
                                                <th>Sup. Plant Name</th>
                                                <th>Receiving Plant</th>
                                                <th>Recv. Plant Name</th>
                                                <th>Material Group</th>
                                                <th>Material No.</th>
                                                <th>GI Qty.</th>
                                                <!-- <th>Phy.Report Date</th>
                                                <th>Rep. Doc. No.</th>
                                                <th>Reported at OGRA</th>
                                                <th>Actual Days</th>
                                                <th>Over-Due Days</th> -->
                                                <th>Planned Arrival Date</th>
                                                <th>Driver Name</th>
                                                <th>Driver Contact</th>
                                                <th>Driver Cnic</th>
                                                <th>View Sap dashboard</th>
                                                <th>Created at</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        $uploadDate = '';
                                        while ($row = mysqli_fetch_array($result12)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row["tl_no"]; ?></td>
                                                <td><?php echo $row["lat"]; ?></td>
                                                <td><?php echo $row["lng"]; ?></td>
                                                <td><?php echo $row["location"]; ?></td>
                                                <td><?php echo $row["time"]; ?></td>
                                                <td><?php echo $row["ignition"]; ?></td>
                                                <td><?php echo $row["delivery_no"]; ?></td>
                                                <td><?php echo $row["gi_posting_date"]; ?></td>
                                                <td><?php echo $row["sub_plant_name"]; ?></td>
                                                <td><?php echo $row["receiving_plant"]; ?></td>
                                                <td><?php echo $row["receiving_plant_name"]; ?></td>
                                                <td><?php echo $row["material_group"]; ?></td>
                                                <td><?php echo $row["material_no"]; ?></td>
                                                <td><?php echo $row["gi_qty"]; ?></td>
                                                <!-- <td><?php echo $row["phy_report_date"]; ?></td>
                                                <td><?php echo $row["rep_doc_no"]; ?></td>
                                                <td><?php echo $row["reported_at_ogra"]; ?></td>
                                                <td><?php echo $row["actual_days"]; ?></td>
                                                <td><?php echo $row["over_due_days"]; ?></td> -->
                                                <td><?php echo $row["planned_arrival_date"]; ?></td>

                                                <td><?php echo $row["driver_contact"]; ?></td>
                                                <td><?php echo $row["driver_cnic"]; ?></td>
                                                <td><?php echo $row["driver_name"]; ?></td>
                                                <td>
                                                    <a href="sap_upload_dasboard_single.php?sap=<?php echo $row["delivery_no"]; ?>&id=<?php echo $row["id"]; ?>"
                                                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-image">
                                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                                            </rect>
                                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                            <polyline points="21 15 16 10 5 21"></polyline>
                                                        </svg></a>
                                                </td>
                                                <td><?php echo $row["created_at"]; ?></td>





                                            </tr>

                                            <?php
                                            $i++;
                                            $uploadDate = $row["created_at"];
                                        }
                                        ?>
                                            <script>
                                            // Assuming $uploadDate contains the date you want to display
                                            <?php ?>

                                            // Set the upload date in the span element using JavaScript
                                            var uploadDate = "<?php echo $uploadDate; ?>";
                                            document.getElementById("upload_date").textContent = uploadDate;
                                            </script>


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
                                                <th>S.No</th>
                                                <th>Tank Lorry #</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Location</th>
                                                <th>Time</th>
                                                <th>Ignition</th>
                                                <th>Delivery No.</th>
                                                <th>GI Posting Date</th>
                                                <th>Sup. Plant Name</th>
                                                <th>Receiving Plant</th>
                                                <th>Recv. Plant Name</th>
                                                <th>Material Group</th>
                                                <th>Material No.</th>
                                                <th>GI Qty.</th>
                                                <!-- <th>Phy.Report Date</th>
                                                <th>Rep. Doc. No.</th>
                                                <th>Reported at OGRA</th>
                                                <th>Actual Days</th>
                                                <th>Over-Due Days</th> -->
                                                <th>Planned Arrival Date</th>
                                                <th>Driver Name</th>
                                                <th>Driver Contact</th>
                                                <th>Driver Cnic</th>
                                                <!-- <th>View Sap dashboard</th> -->
                                                <th>Created at</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($tt_trips)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row["tl_no"]; ?></td>
                                                <td><?php echo $row["lat"]; ?></td>
                                                <td><?php echo $row["lng"]; ?></td>
                                                <td><?php echo $row["location"]; ?></td>
                                                <td><?php echo $row["time"]; ?></td>
                                                <td><?php echo $row["ignition"]; ?></td>
                                                <td><?php echo $row["delivery_no"]; ?></td>
                                                <td><?php echo $row["gi_posting_date"]; ?></td>
                                                <td><?php echo $row["sub_plant_name"]; ?></td>
                                                <td><?php echo $row["receiving_plant"]; ?></td>
                                                <td><?php echo $row["receiving_plant_name"]; ?></td>
                                                <td><?php echo $row["material_group"]; ?></td>
                                                <td><?php echo $row["material_no"]; ?></td>
                                                <td><?php echo $row["gi_qty"]; ?></td>
                                                <!-- <td><?php echo $row["phy_report_date"]; ?></td>
                                                <td><?php echo $row["rep_doc_no"]; ?></td>
                                                <td><?php echo $row["reported_at_ogra"]; ?></td>
                                                <td><?php echo $row["actual_days"]; ?></td>
                                                <td><?php echo $row["over_due_days"]; ?></td> -->
                                                <td><?php echo $row["planned_arrival_date"]; ?></td>

                                                <td><?php echo $row["driver_contact"]; ?></td>
                                                <td><?php echo $row["driver_cnic"]; ?></td>
                                                <td><?php echo $row["driver_name"]; ?></td>
                                                <!-- <td>
                                                    <a href="sap_upload_dasboard_single.php?sap=<?php echo $row["delivery_no"]; ?>&id=<?php echo $row["id"]; ?>"
                                                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-image">
                                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                                            </rect>
                                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                            <polyline points="21 15 16 10 5 21"></polyline>
                                                        </svg></a>
                                                </td> -->
                                                <td><?php echo $row["created_at"]; ?></td>





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
                                                <th>S.No</th>
                                                <th>Tank Lorry #</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Location</th>
                                                <th>Time</th>
                                                <th>Ignition</th>
                                                <th>No Of Trips</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result_trip_diversion)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row["tl_no"]; ?></td>
                                                <td><?php echo $row["lat"]; ?></td>
                                                <td><?php echo $row["lng"]; ?></td>
                                                <td><?php echo $row["location"]; ?></td>
                                                <td><?php echo $row["time"]; ?></td>
                                                <td><?php echo $row["ignition"]; ?></td>
                                                <td><?php echo $row["count"]; ?></td>



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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="speed_over">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="html5-extension5" class="table table-hover non-hover" style="width:100%">
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

                                    <center>
                                        <h3 style="color: #24245c;">With Out Trips</h3>
                                    </center>
                                    <table id="html5-extension6" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Tank Lorry #</th>
                                                <th>Delivery No.</th>
                                                <th>GI Posting Date</th>
                                                <th>Sup. Plant Name</th>
                                                <th>Receiving Plant</th>
                                                <th>Recv. Plant Name</th>
                                                <th>Material Group</th>
                                                <th>Material No.</th>
                                                <th>GI Qty.</th>
                                                <!-- <th>Phy.Report Date</th>
                                                <th>Rep. Doc. No.</th>
                                                <th>Reported at OGRA</th>
                                                <th>Actual Days</th>
                                                <th>Over-Due Days</th> -->
                                                <th>Planned Arrival Date</th>
                                                <th>Driver Name</th>
                                                <th>Driver Contact</th>
                                                <th>Driver Cnic</th>
                                                <!-- <th>View Sap dashboard</th> -->
                                                <th>Created at</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result_with_out_tracker)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row["tl_no"]; ?></td>
                                                <td><?php echo $row["delivery_no"]; ?></td>
                                                <td><?php echo $row["gi_posting_date"]; ?></td>
                                                <td><?php echo $row["sub_plant_name"]; ?></td>
                                                <td><?php echo $row["receiving_plant"]; ?></td>
                                                <td><?php echo $row["receiving_plant_name"]; ?></td>
                                                <td><?php echo $row["material_group"]; ?></td>
                                                <td><?php echo $row["material_no"]; ?></td>
                                                <td><?php echo $row["gi_qty"]; ?></td>
                                                <!-- <td><?php echo $row["phy_report_date"]; ?></td>
                                                <td><?php echo $row["rep_doc_no"]; ?></td>
                                                <td><?php echo $row["reported_at_ogra"]; ?></td>
                                                <td><?php echo $row["actual_days"]; ?></td>
                                                <td><?php echo $row["over_due_days"]; ?></td> -->
                                                <td><?php echo $row["planned_arrival_date"]; ?></td>

                                                <td><?php echo $row["driver_contact"]; ?></td>
                                                <td><?php echo $row["driver_cnic"]; ?></td>
                                                <td><?php echo $row["driver_name"]; ?></td>
                                                <!-- <td>
                                                    <a href="sap_upload_dasboard_single.php?sap=<?php echo $row["delivery_no"]; ?>&id=<?php echo $row["id"]; ?>"
                                                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-image">
                                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                                            </rect>
                                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                            <polyline points="21 15 16 10 5 21"></polyline>
                                                        </svg></a>
                                                </td> -->
                                                <td><?php echo $row["created_at"]; ?></td>





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