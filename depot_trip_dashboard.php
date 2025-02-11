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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">

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

    .my-card {
        position: absolute;
        left: 3%;
        top: -45px;
        border-radius: 50%;
    }

    .fad {
        font-size: 35px;
    }
    </style>

    <?php function clean($string) {
        $string=str_replace('', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    }

    $todate=date("Y-m-d H:i:s", time());
    $prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 day'));
    include("config_indemnifier.php");
    $id=$_GET['id'];
    if($_SESSION['prive'] != 'Depot'){
        $depot_id = $_GET['id'];
        $user_depot_id = $_GET['depot_user_id'];
        $result=mysqli_query($db, "SELECT us.*,du.depot_id FROM depot_users as du join users as us on us.id=du.user_id where du.user_id='$user_depot_id' and du.depot_id='$depot_id'");
        $data=mysqli_fetch_array($result);
    }
    else{

        $depot_id = $_SESSION['depot_id'];
        $result=mysqli_query($db, "SELECT * FROM users where id='$id'");
        $data=mysqli_fetch_array($result);
    }

    // session_start();
    $user_id=$_SESSION['userid'];

    



    $vehicle=mysqli_query($db, "SELECT count(*) as t_trip FROM trip_main as tm  join trip_sub as ts on ts.main_id=tm.id  where tm.base='$depot_id' and tm.user_id!='';");
    // echo "SELECT count(*) as t_trip FROM trip_main as tm  join trip_sub as ts on ts.main_id=tm.id  join users_devices as ud on ud.devices_id=ts.vehicle_id join users as ur on ud.users_id=ur.id where tm.base='$depot_id' and tm.user_id!=''";
    $countdata=mysqli_fetch_array($vehicle);

    $vehicle_movw=mysqli_query($db, "SELECT count(*) as on_trip FROM trip_main as tm join trip_sub as ts on ts.main_id=tm.id  where tm.base='$depot_id' and tm.user_id!='' and ts.status='0';");
    $count_move=mysqli_fetch_array($vehicle_movw);

    $vehicle_idel=mysqli_query($db, "SELECT count(*) as comp_trip FROM trip_main as tm join trip_sub as ts on ts.main_id=tm.id  where tm.base='$depot_id' and tm.user_id!='' and ts.status='1';");
    $count_idel=mysqli_fetch_array($vehicle_idel);

    $vehicle_stop=mysqli_query($db, "SELECT count(*) as forced_trip FROM trip_main as tm join trip_sub as ts on ts.main_id=tm.id  where tm.base='$depot_id' and tm.user_id!='' and ts.status='2';");
    $count_stop=mysqli_fetch_array($vehicle_stop);

    $vehicle_speed=mysqli_query($db, "SELECT count(*) as r_trip FROM receive_sub as rs
    join trip_sub as ts on ts.id=rs.trip_sub_id
    join trip_main as tm on tm.id=ts.main_id where tm.base='$depot_id';");
    $count_speed=mysqli_fetch_array($vehicle_speed);

    $not_reciving=mysqli_query($db, "SELECT count(*) as not_rec FROM receive_sub as rs
    join trip_sub as ts on ts.id=rs.trip_sub_id
    join trip_main as tm on tm.id=ts.main_id where tm.base='$depot_id'
     group by rs.trip_sub_id;");
   
    $count_not_reciving=mysqli_fetch_array($not_reciving);

    

    
    // $nr=mysqli_query($db, "SELECT count(*) as car_nr FROM `positions` as pos INNER join `devices` as dv on pos.id = dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where  pos.time <='$prev_date' and ud.users_id='$id'");
    // $countnr=mysqli_fetch_array($nr);

    // $black_=mysqli_query($db, "SELECT count(*) as black_spot FROM geo_in_check join users_devices as ud on ud.devices_id = geo_in_check.veh_id where geotype='black spote' and ud.users_id ='$id'");
    // $blacking=mysqli_fetch_array($black_);


    $result12=mysqli_query($db, "SELECT ts.*,tm.driver_name,tm.location,tm.without_tracker,geo.consignee_name as base,toc.close_time FROM trip_main as tm join trip_sub as ts on ts.main_id=tm.id join geofenceing as geo on geo.id=tm.base left join trip_close as toc on toc.sub_id=ts.id where tm.base='$depot_id' and tm.user_id!='';");
    // echo "SELECT * FROM trip_main as tm join trip_sub as ts on ts.main_id=tm.id join users_devices as ud on ud.devices_id=ts.vehicle_id join users as ur on ud.users_id=ur.id where tm.base='$depot_id' and tm.user_id!='';";
    // $result13=mysqli_query($db, "SELECT dv.name,dv.vehicle_make,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.speed>0 and  pos.speed < 55 and pos.time >='$prev_date' and ud.users_id='$id'");
    // $result14=mysqli_query($db, "SELECT dv.name,dv.vehicle_make,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where  pos.speed=0 and pos.power = 0 and pos.time >='$prev_date' and ud.users_id='$id'");
    // $result15=mysqli_query($db, "SELECT dv.name,dv.vehicle_make,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.time <='$prev_date' and ud.users_id='$id'");
    // $result16=mysqli_query($db, "SELECT dv.name,dv.vehicle_make,pos.time,pos.speed,pos.vlocation FROM `positions` as pos INNER join `devices` as dv on pos.id=dv.latestPosition_id INNER JOIN `users_devices` as ud on dv.uniqueId=ud.devices_id where pos.speed>=55   and pos.time >='$prev_date' and ud.users_id='$id'");
    // $result17=mysqli_query($db, "SELECT dv.name,dv.vehicle_make,pos.time,pos.speed,pos.vlocation FROM positions as pos INNER join devices as dv on pos.id = dv.latestPosition_id INNER JOIN users_devices as ud on dv.uniqueId = ud.devices_id where pos.speed = 0 and pos.power =1 and pos.time >='$prev_date' and ud.users_id='$id'");
    // $result18=mysqli_query($db, "SELECT * FROM geo_in_check join users_devices as ud on ud.devices_id = geo_in_check.veh_id where geotype='black spote' and ud.users_id ='$id'");
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
                    <h2 class="text-center"><?php echo $data['name']; ?> </h2>
                </li>
            </ul>

            <ul class="navbar-item flex-row navbar-dropdown">

                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-message-circle">
                            <path
                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                            </path>
                        </svg><span class="badge badge-primary"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                        <div class="">
                        </div>
                    </div>
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
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php include 'sidebar.php';?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">



                <div class="row layout-top-spacing">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="jumbotron mt-4">
                                    <div class="row w-100">
                                        <div class="col-md-3">
                                            <div class="card border-info mx-sm-1 p-3" onclick="dis_all()">
                                                <div class="card border-info shadow text-info p-3 my-card"><i
                                                        class="fad fa-abacus"></i></div>

                                                <div class="text-info text-center mt-3">
                                                    <h4>Total Trip</h4>
                                                </div>
                                                <div class="text-info text-center mt-2">
                                                    <h1><?php echo $countdata['t_trip']?></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card border-success mx-sm-1 p-3">
                                                <div class="card border-success shadow text-success p-3 my-card"><i
                                                        class="fad fa-check-circle"></i></div>
                                                <div class="text-success text-center mt-3">
                                                    <h4>Complete Trip</h4>
                                                </div>
                                                <div class="text-success text-center mt-2">
                                                    <h1><?php echo $count_idel['comp_trip']?></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card border-warning mx-sm-1 p-3">
                                                <div class="card border-warning shadow text-warning p-3 my-card"><i
                                                        class="fad fa-tasks-alt"></i></div>
                                                <div class="text-warning text-center mt-3">
                                                    <h4>On Trips</h4>
                                                </div>
                                                <div class="text-warning text-center mt-2">
                                                    <h1><?php echo $count_move['on_trip']?></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card border-danger mx-sm-1 p-3">
                                                <div class="card border-danger shadow text-danger p-3 my-card"><i
                                                        class="fad fa-ban"></i></div>
                                                <div class="text-danger text-center mt-3">
                                                    <h4>Forced Stop Trips </h4>
                                                </div>
                                                <div class="text-danger text-center mt-2">
                                                    <h1><?php echo $count_stop['forced_trip']?></h1>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row w-100 mt-5">

                                        <div class="col-md-3">
                                            <div class="card border-secondary mx-sm-1 p-3">
                                                <div class="card border-secondary shadow text-secondary p-3 my-card"><i
                                                        class="fad fa-abacus"></i></div>
                                                <div class="text-secondary text-center mt-3">
                                                    <h4>Total Receiving </h4>
                                                </div>
                                                <div class="text-secondary text-center mt-2">
                                                    <h1><?php echo $count_speed['r_trip'] ;?></h1>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card border-primary mx-sm-1 p-3">
                                                <div class="card border-primary shadow text-primary p-3 my-card"><i class="fad fa-spinner-third"></i></div>
                                                <div class="text-primary text-center mt-3">
                                                    <h4>Remaining Receiving</h4>
                                                </div>
                                                <div class="text-primary text-center mt-2">
                                                    <h1><?php echo ($countdata['t_trip'] - $count_speed['r_trip']) ;?></h1>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card border-info mx-sm-1 p-3">
                                                <div class="card border-info shadow text-info p-3 my-card"><i class="fad fa-clock"></i></div>
                                                <div class="text-info text-center mt-3">
                                                    <h4>On Time </h4>
                                                </div>
                                                <div class="text-info text-center mt-2">
                                                    <h1 id="ontime_id"></h1>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card border-danger mx-sm-1 p-3">
                                                <div class="card border-danger shadow text-danger p-3 my-card"><i class="fad fa-alarm-exclamation"></i></i></div>
                                                <div class="text-danger text-center mt-3">
                                                    <h4>Late </h4>
                                                </div>
                                                <div class="text-danger text-center mt-2">
                                                    <h1 id="late_id"></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="all_car">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <center>
                                    <h3 style="color: #24245c;">All Trips</h3>
                                </center>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Vehicle Name</th>
                                            <th>Base</th>
                                            <th>Start Time</th>
                                            <th>ETA</th>
                                            <th>Complete Time</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Consignee Name</th>
                                            <th>Driver Name</th>
                                            <th>Trip Status</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        $ontime=0;
                                        $late=0;
                                        while($row1 = mysqli_fetch_array($result12)) {
                                            $eta=$row1["eta"];
                                            $close_time=$row1["close_time"];
                                            $date_a = new DateTime($eta);
                                            $date_b = new DateTime($close_time);
                                            $color='';
                                          

                                            if ($date_a > $date_b && $close_time!='') {
                                                $color='#c2fbc2'; // green
                                                $ontime++;
                                            }
                                            elseif($close_time==''){
                                                $color='#fff';

                                            }
                                            else{
                                                $color='#fbbdbd';
                                                $late++;

                                            }

                                            $interval = date_diff($date_a,$date_b);

                                            // echo $interval->format('%h:%i:%s');

                                    ?>
                                        <tr style="background-color:<?php echo $color;?>">
                                            <td><?php echo $i ?></td>
                                            
                                            <td><?php echo $row1["vehicle_name"]; ?></td>
                                            <td><?php echo $row1["base"]; ?></td>
                                            <td><?php echo $row1["start_time"]; ?></td>
                                            <td><?php echo date("Y-m-d H:i:s", strtotime($row1["eta"])); ?></td>
                                            <td><?php echo $row1["close_time"]; ?></td>
                                            <td><?php echo $row1["products"]; ?></td>
                                            <td><?php echo $row1["quantity"]; ?></td>
                                            <td><?php echo $row1["consignee_name"]; ?></td>
                                            <td><?php echo $row1["driver_name"]; ?></td>

                                            <?php if ($row1["status"]=='0') { ?>
                                            <td class="car_upper" >
                                                
                                                  <span class="text-primary">On Trip <?php if($row1['without_tracker']==1)
                                                   echo 'Without Tracker'?></span></td>
                                            <?php }elseif($row1["status"]=='1'){ ?>
                                            <td class="car_upper " >
                                                 <span class="text-success">Completed</span></td>

                                            <?php }elseif($row1["status"]=='2'){ ?>
                                            <td class="car_upper" >
                                               <span class="text-danger">Forced Stop</span> </td>



                                            <?php }else{} ?>






                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        ?>
                                        <script type="text/javascript">
                                                
                                                        document.getElementById("ontime_id").innerHTML = "<?php echo $ontime; ?>";
                                                        document.getElementById("late_id").innerHTML = "<?php echo $late; ?>";
                                                    
                                            </script>


                                    </tbody>
                                </table>


                            </div>
                        </div>
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
            "pageLength": 20
        });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
    var donutChart = {
        chart: {
            height: 350,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        series: depot_count,
        labels: consignee_name,
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
        series: blackSpot_count,
        labels: back_consignee_name,
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
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>