<?php
include ("sessioninput.php");


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
    /* Optional: Additional styles to enhance the overlay appearance */
    .blockOverlay {
        background-color: rgba(0, 0, 0, 0.6) !important;
        /* Dark semi-transparent background */
        border: none !important;
    }

    .blockMsg {
        color: #fff !important;
        /* White text color */
        border: none !important;
        background-color: transparent !important;
        /* No background color */
    }

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
    include ("config_indemnifier.php");
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
                                window.location = "dev_dashboard_apis.php?id=<?php echo $id; ?>&from=" + from + "&to=" + to +
                                    "";
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
                                                    <h3 style="color: #fff;" id="all_vehicles">
                                                        0
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
                                                    <h6 class="card-user_name" style="color:#fff">
                                                        Vehicles Currently
                                                        Moving
                                                    </h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;" id="moving_vehicles">
                                                        0
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
                                                    <h6 class="card-user_name" style="color:#fff">
                                                        Vehicles Currently
                                                        Stopped</h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <h3 style="color: #fff;" id="stop_vehicles">
                                                        0
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
                                                    <h3 style="color: #fff;" id="idle_vehicles">
                                                        0
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
                                                    <h3 style="color: #fff;" id="nr_vehicles">
                                                        0
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
                                                    <h3 style="color: #fff;" id="overspeed_vehicles">
                                                        0
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
                                                    <h3 style="color: #fff;" id="black_spote_vehicles">
                                                        0
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
                                                    <h3 style="color: #fff;" id="nigthtime_vehicles">
                                                        0
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
                                                    <h3 style="color: #fff;" id="excess_vehicles">
                                                        0
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
                                    <table id="all_vehicle_table" class="table table-hover non-hover"
                                        style="width:100%">
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
                                    <table id="all_moving_table" class="table table-hover non-hover" style="width:100%">
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

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                            id="moving_stop">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="all_stop_table" class="table table-hover non-hover" style="width:100%">
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
                                    <table id="all_nr_table" class="table table-hover non-hover" style="width:100%">
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

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="speed_over">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="all_overspeed_table" class="table table-hover non-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Reporting Time</th>
                                                <th>Coordinates</th>
                                                <th>Detail Message</th>
                                               



                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                            id="ideal_state">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="all_idle_table" class="table table-hover non-hover" style="width:100%">
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
                                    <table id="all_blackspot_table" class="table table-hover non-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Black Spot</th>
                                                <th>Location</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>In Duration (MIN)</th>



                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                            id="night__time">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="all_nighttime_table" class="table table-hover non-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reg No</th>
                                                <th>Detail</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Night violations Duration (Min)</th>
                                                <th>Created At</th>
                                                <th>Coordinates</th>
                                                <th>View</th>


                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                            id="excess__drive">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="all_excess_table" class="table table-hover non-hover" style="width:100%">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <!-- <script src="assets/js/libs/jquery-3.1.1.min.js"></script> -->
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
    var all_vehicle_table = '';
    var all_moving_table = '';
    var all_stop_table = '';
    var all_idle_table = '';
    var all_nr_table = '';
    var all_overspeed_table = '';
    var all_blackspot_table = '';
    var all_nighttime_table = '';
    var all_excess_table = '';

    function chup() {
        //alert("Running")
        get_moving_vehicles();
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
        get_all_vehicles();
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
        get_stop_vehicles();
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
        get_nr_vehicles();
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
        get_overspeed_vehicles();
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
        get_idle_vehicles();
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
        get_blackspot_vehicles();
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
        get_nighttime_vehicles();
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
        get_excess_vehicles();
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
    all_vehicle_table = $('#all_vehicle_table').DataTable({
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

    all_moving_table = $('#all_moving_table').DataTable({
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
    all_stop_table = $('#all_stop_table').DataTable({
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
    all_idle_table = $('#all_idle_table').DataTable({
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
    all_nr_table = $('#all_nr_table').DataTable({
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
    all_overspeed_table = $('#all_overspeed_table').DataTable({
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

    all_blackspot_table = $('#all_blackspot_table').DataTable({
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
    all_nighttime_table = $('#all_nighttime_table').DataTable({
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
    all_excess_table = $('#all_excess_table').DataTable({
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
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
    $(document).ready(function() {
        $('.loader_load').removeClass('d-none');

        count();
        get_all_vehicles();
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
        // window.location.reload();
        count()
    }, 10000);

    function count() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var settings = {
            "url": "ajax_edit/get/dashboard/all_counts.php?accesskey=12345&id=" + id + "&from=" + from + "&to=" +
                to + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            $("#all_vehicles").html(data["all_devices"]);
            $("#moving_vehicles").html(data["moving_devices"]);
            $("#stop_vehicles").html(data["stop_devices"]);
            $("#idle_vehicles").html(data["idle_devices"]);
            $("#overspeed_vehicles").html(data["overspeed_devices"]);
            $("#black_spote_vehicles").html(data["black_count"]);
            $("#nigthtime_vehicles").html(data["night_count"]);
            $("#excess_vehicles").html(data["excess_count"]);
            $("#nr_vehicles").html(data["nr_devices"]);

        });
    }

    function get_all_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        // console.log(`ajax_edit/get/dashboard/get_all_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`)
        fetch(`ajax_edit/get/dashboard/get_all_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_vehicle_table.clear().draw();
                $.each(response, function(index, data) {
                    all_vehicle_table.row.add([
                        index + 1,
                        data.name,
                        data.time,
                        data.vlocation,
                        data.latitude + ' ' + data.longitude,
                        data.speed,
                        data.vehicle_make
                    ]).draw(false);
                });

                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }


    function get_moving_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_moving_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_moving_table.clear().draw();
                $.each(response, function(index, data) {
                    all_moving_table.row.add([
                        index + 1,
                        data.name,
                        data.time,
                        data.vlocation,
                        data.latitude + ' ' + data.longitude,
                        data.speed,
                        data.vehicle_make
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_stop_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_stop_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_stop_table.clear().draw();
                $.each(response, function(index, data) {
                    all_stop_table.row.add([
                        index + 1,
                        data.name,
                        data.time,
                        data.vlocation,
                        data.latitude + ' ' + data.longitude,
                        data.speed,
                        data.vehicle_make
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_idle_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_idle_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_idle_table.clear().draw();
                $.each(response, function(index, data) {
                    all_idle_table.row.add([
                        index + 1,
                        data.name,
                        data.time,
                        data.vlocation,
                        data.latitude + ' ' + data.longitude,
                        data.speed,
                        data.vehicle_make
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_nr_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_nr_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_nr_table.clear().draw();
                $.each(response, function(index, data) {
                    all_nr_table.row.add([
                        index + 1,
                        data.name,
                        data.time,
                        data.vlocation,
                        data.latitude + ' ' + data.longitude,
                        data.speed,
                        data.vehicle_make
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_overspeed_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_overspeed_alert.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_overspeed_table.clear().draw();
                $.each(response, function(index, data) {
                    all_overspeed_table.row.add([
                        index + 1,
                        data.name,
                        data.time,
                        data.v_lat + ' ' + data.v_lng,
                        data.message,
                       
                      
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_blackspot_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_blackspot_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_blackspot_table.clear().draw();
                $.each(response, function(index, data) {
                    all_blackspot_table.row.add([
                        index + 1,
                        data.device_name,
                        data.consignee_name,
                        data.location,
                        data.in_time,
                        data.out_time,
                        data.in_duration
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_nighttime_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_nighttime_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_nighttime_table.clear().draw();
                $.each(response, function(index, data) {
                    all_nighttime_table.row.add([
                        index + 1,
                        data.name,
                        data.message,
                        data.in_time,
                        data.out_time,
                        data.duration,
                        data.created_at,
                        data.v_lat + ' ' + data.v_lng,
                        ` <a href="veiw_alert.php?id=${data.id}" target="_black" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>`
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }

    function get_excess_vehicles() {
        var from = "<?php echo $_GET['from'] ?>";
        var to = "<?php echo $_GET['to'] ?>";
        var id = "<?php echo $id ;  ?>";
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        blocking();
        fetch(`ajax_edit/get/dashboard/get_excess_vehicles.php?accesskey=12345&id=${id}&from=${from}&to=${to}`,
                requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    $.unblockUI();
                }
                return response.json();
            })
            .then(response => {
                console.log(response);

                all_excess_table.clear().draw();
                $.each(response, function(index, data) {
                    all_excess_table.row.add([
                        index + 1,
                        data.name,
                        data.message,
                        data.duration,

                        data.created_at
                    ]).draw(false);
                });
                $.unblockUI();
            })
            .catch(error => console.log('Error:', error));
    }


    function blocking() {
        $.blockUI({
            message: '<h1>Please Wait...</h1>',
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });
    }
    </script>




    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>