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
    </style>

    <?php function clean($string) {
        $string=str_replace('', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    }

    $todate=date("Y-m-d H:i:s", time());
    $prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 hour'));
    include("config_indemnifier.php");
    $id=230;;

    // $idd=$_SESSION['userid'];
    $result__=mysqli_query($db, "SELECT * FROM users where id='$id'");
    $data__=mysqli_fetch_array($result__);
    if($data__['privilege']==='Admin' || $data__['privilege'] === 'Depot' || $data__['privilege'] === 'viewer'){

        $result=mysqli_query($db, "SELECT * FROM users where id='1'");
        $data=mysqli_fetch_array($result);
        $id=$data['id'];
    }
    else{
        $result=mysqli_query($db, "SELECT * FROM users where id='$id'");
        $data=mysqli_fetch_array($result);
        $id=$data['id'];

    }

   
    $t_transit=mysqli_query($db, "SELECT count(*) as t_transit FROM sapstart 
    where  deliveryno not in(SELECT deliveryno from sapend)   and sapstart.status=0 order by sapstart.id desc;");
    $count_t_transit=mysqli_fetch_array($t_transit);

    $result_transit=mysqli_query($db, "SELECT * FROM sapstart 
    where  deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;");

    $t_not_integrated=mysqli_query($db, "SELECT count(*) as t_not_integrated FROM sapstart where tlno  not IN(SELECT name from devices) and deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by id desc;");
    $count_t_not_integrated=mysqli_fetch_array($t_not_integrated);

    $result_inte=mysqli_query($db, "SELECT * FROM sapstart where tlno  not IN(SELECT name from devices) and deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by id desc;");
    
    $t_integrated=mysqli_query($db, "SELECT count(*) as t_integrated FROM sapstart where tlno  IN(SELECT name from devices) and deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by id desc;");
    $count_t_integrated=mysqli_fetch_array($t_integrated);
    
    $result_not_inte=mysqli_query($db, "SELECT * FROM sapstart where tlno  IN(SELECT name from devices) and deliveryno not in(SELECT deliveryno from sapend)  and sapstart.status=0 order by id desc;");

    $vehicle=mysqli_query($db, "SELECT  count(distinct(dc.name)) as device FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;");
    $countdata=mysqli_fetch_array($vehicle);

    $vehicle_movw=mysqli_query($db, "SELECT count(distinct(dc.name)) as car_moving FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed > 0  and pos.time >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");

    $count_move=mysqli_fetch_array($vehicle_movw);

    $vehicle_idel=mysqli_query($db, "SELECT count(distinct(dc.name)) as idel FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed = 0 and pos.power =1 and pos.time >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;");
    $count_idel=mysqli_fetch_array($vehicle_idel);

    $vehicle_stop=mysqli_query($db, "SELECT count(distinct(dc.name)) as car_stop FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed = 0  and pos.time >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $count_stop=mysqli_fetch_array($vehicle_stop);

    $vehicle_speed=mysqli_query($db, "SELECT count(distinct(dc.name)) as car_speed FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed >= 60 and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $count_speed=mysqli_fetch_array($vehicle_speed);

    $nr=mysqli_query($db, "SELECT count(distinct(dc.name)) as car_nr FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.time <='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $countnr=mysqli_fetch_array($nr);

    $black_=mysqli_query($db, "SELECT count(distinct(dc.name)) as black_spot FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    join geo_in_check as gc on gc.veh_id=dc.uniqueId
    where tlno IN(SELECT name from devices) and gc.geotype='black spote' and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $blacking=mysqli_fetch_array($black_);

    $diversing=mysqli_query($db, "SELECT count(distinct(dc.name)) as diverse FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    join old_sapno as os on os.sap_id=sapstart.id
    where tlno IN(SELECT name from devices) and pos.time >='$prev_date' order by sapstart.id desc");
    $diverse=mysqli_fetch_array($diversing);


    $result12=mysqli_query($db, "SELECT  distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $result13=mysqli_query($db, "SELECT  distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed > 0 and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;");
    $result14=mysqli_query($db, "SELECT  distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed = 0 and pos.time >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $result15=mysqli_query($db, "SELECT  distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.time <='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;");
    $result16=mysqli_query($db, "SELECT distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed >= 60 and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");
    $result17=mysqli_query($db, "SELECT  distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.* FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    where tlno IN(SELECT name from devices) and pos.speed = 0 and pos.power =1 and pos.time >='$prev_date'  and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc;");
    
    
    $result18=mysqli_query($db, "SELECT distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.*,gc.consignee_name FROM sapstart 
    join devices as dc on dc.name=sapstart.tlno
    join positions as pos on pos.id=dc.latestPosition_id
    join geo_in_check as gc on gc.veh_id=dc.uniqueId
    where tlno IN(SELECT name from devices) and gc.geotype='black spote' and pos.time >='$prev_date' and deliveryno NOT IN(select deliveryno from sapend)  and sapstart.status=0 order by sapstart.id desc");

$result19=mysqli_query($db, "SELECT distinct(dc.name),dc.vehicle_make,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude,sapstart.*,os.old_sapno FROM sapstart 
join devices as dc on dc.name=sapstart.tlno
join positions as pos on pos.id=dc.latestPosition_id
join old_sapno as os on os.sap_id=sapstart.id
where tlno IN(SELECT name from devices) and pos.time >='$prev_date' order by sapstart.id desc");
    ?>


    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<script>
var consignee_name = [];
var depot_count = [];

var back_consignee_name = [];
var blackSpot_count = [];
</script>



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
                    <!-- <h2 class="text-center"><?php echo $data__['name']; ?> </h2> -->
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
    <!--  END NAVBAR  -->
    <script>
    var total = <?php echo $countdata['device'] ?>;
    var mov = <?php echo $count_move['car_moving'] ?>;
    var stop = <?php echo $count_stop['car_stop'] ?>;
    var overspeed = <?php echo $count_speed['car_speed'] ?>;
    var ideal_state = <?php echo $count_idel['idel'] ?>;
    var no_activity = <?php echo $countnr['car_nr'] ?>;

    total = parseInt(total);
    mov = parseInt(mov);
    stop = parseInt(stop);
    overspeed = parseInt(overspeed);
    ideal_state = parseInt(ideal_state);
    var per_move = ((mov / total) * 100).toFixed();
    var per_stop = ((stop / total) * 100).toFixed();
    var per_over = ((overspeed / total) * 100).toFixed();
    var per_ideal = ((ideal_state / total) * 100).toFixed();
    var per_no_activity = ((no_activity / total) * 100).toFixed();
    // alert(per_ideal)
    arr_car.push(per_move, per_stop, per_over, per_ideal, per_no_activity)
    car_lable.push('Moving', 'Stop', 'Overspeed', 'Ideal', 'NR');
    // //alert(arr_car)
    </script>
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


                <div class="row layout-top-spacing">

                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#4a5870  !important ;  cursor: pointer;"
                                        onclick="transit()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-car p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Total Loads Intransit
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_t_transit['t_transit'] ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#9f8972 !important ;  cursor: pointer;"
                                        onclick="diverse()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-stop-circle p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Diversion
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;">
                                                    <?php echo $diverse['diverse'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#3ba6b7 !important ;  cursor: pointer;"
                                        onclick="integrated()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-route p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff">Loads where vehicles are
                                                    Integrated
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;">
                                                    <?php echo $count_t_integrated['t_integrated'] ?></h3>
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
                                    <div class="card-body" style="background:#eaaf72 !important ;  cursor: pointer;"
                                        onclick="not_integrated()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-stop-circle p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Loads where vehicles are
                                                    Not Integrated
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;">
                                                    <?php echo $count_t_not_integrated['t_not_integrated'] ?></h3>
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
                                                <h6 class="card-user_name" style="color:#fff">integrated Vehicles In
                                                    Transit</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $countdata['device'] ?></h3>
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
                                                <h6 class="card-user_name" style="color:#fff"> Vehicles Currently Moving
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_move['car_moving'] ?></h3>
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
                                                <h6 class="card-user_name" style="color:#fff">Vehicle Ignition On but
                                                    not moving</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $count_idel['idel'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#8e71a9 !important ;  cursor: pointer;"
                                        >
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tasks p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Continous Driving
                                                    (Ignition on for > 240 min)</h6>

                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
                                                <h3 style="color: #fff;"><?php echo $count_speed['car_speed'] ?></h3>
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
                                                <h3 style="color: #fff;"><?php echo $count_stop['car_stop'] ?></h3>
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
                                    <div class="card-body" style="background:#421515 !important ;  cursor: pointer;"
                                        onclick="blacks()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tachometer-alt p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgba(255,255,255,1); border-radius: 50%;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#fff"> Vehicles On Black Spot
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $blacking['black_spot'] ?></h3>
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
                                                <h6 class="card-user_name" style="color:#fff">NR (Tracker Not Responding
                                                    > 60 min)</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #fff;"><?php echo $countnr['car_nr'] ?></h3>
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
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result12)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <?php if ($row["speed"]>='60') { ?>
                                            <td class="car_upper" style="background:#e62e2d !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <?php }elseif($row["speed"]==='0'){ ?>
                                            <td class="car_upper" style="background:#ea7372 !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>

                                            <?php }elseif($row["speed"]>'0'){ ?>
                                            <td class="car_upper" style="background:#3b78b7 !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>



                                            <?php }else{} ?>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>






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
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result13)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#3b78b7 !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="moving_stop">
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
                                            <th>Tracker</th>
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result14)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper"
                                                style="background:#ea7372  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="tt_transte">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension3" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Edit</th>
                                            <!-- <th>Location</th>
                                            <th>Coordinates</th>
                                            <th>Speed</th> -->



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result_transit)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#4a5870 !important ;  color: #fff;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><a name="edit" id="<?php echo $row["id"]; ?>" class="edit_data"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 text-success">
                                                        <path
                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
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
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result15)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper"
                                                style="background:#c24e9d  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>





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
                                            <th>Location</th>
                                            <th>Coordinates</th>
                                            <th>Speed</th>
                                            <th>Tracker</th>
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result16)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper"
                                                style="background:#e63130  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="ideal_state">
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
                                            <th>Tracker</th>
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result17)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td style="background:#e6b730  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>






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
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Track</th>




                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result_not_inte)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#3ba6b7 !important ;  color: #fff;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><a target="_blank"
                                                    href="sap_run.php?id=<?php echo $row["tlno"]; ?>&start=<?php echo $row["datetime"]; ?>&end=<?php echo date('Y-m-d H:i:s') ?>">Track</a>
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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="black__spot">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension8" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result_inte)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#eaaf72 !important ;  color: #fff;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>






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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="blackspoting">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extensionblack" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Black Spot</th>
                                            <th>Location</th>
                                            <th>Coordinates</th>
                                            <th>Speed</th>
                                            <th>Tracker</th>
                                            <th>Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result18)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper"
                                                style="background:#421515  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["consignee_name"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>






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


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="diversing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extensionserce" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Reporting Time</th>
                                            <th>Location</th>
                                            <th>Coordinates</th>
                                            <th>Speed</th>
                                            <th>Tracker</th>
                                            <th>New Sap #</th>
                                            <th>Old Sap #</th>
                                            <th>Driver name</th>
                                            <th>Driver CNIC</th>
                                            <th>Driver Contact</th>
                                            <th>Initial TIme</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result19)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper"
                                                style="background:#9f8972  !important ;  color: #fff;">
                                                <?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["latitude"] .' , ' .$row["longitude"]; ?></td>

                                            <td><?php echo $row["speed"]; ?></td>
                                            <td><?php echo $row["vehicle_make"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["old_sapno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>
                                            <td><?php echo $row["dcnic"]; ?></td>
                                            <td><?php echo $row["dnumber"]; ?></td>
                                            <td><?php echo $row["datetime"]; ?></td>






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
                    <!-- <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="">Black Spot Status</h5>
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
                            </div>
                            <div class="widget-content">
                                <div id="radial-chart1" class=""></div>
                            </div>
                        </div>
                    </div> -->
                    <!-- graph end -->
                </div>


                <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:#000" id="title_edit">Add Partner</h5>
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
                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Device Name</label>
                                                        <input type="text" class="form-control" id="cname" name="cname"
                                                            placeholder="Enter Device Name">
                                                    </div>

                                                    <input type="hidden" name="employee_id" id="employee_id">
                                                    <input type="hidden" name="old_sapno" id="old_sapno">
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary" name="insert"
                                                                id="insert" value="Insert" style="float:right" />

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
    $(document).ready(function() {
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#cname').val() == "") {
                alert("CName is required");

            } else {
                $.ajax({
                    url: "ajax_edit/update_sap_no.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Updating");
                    },
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            $('#insert_form')[0].reset();
                            $('#zoomupModal').modal('hide');
                            alert("Sap Update Successfully.");
                            window.location.reload();

                        } else if (data == 0) {
                            alert("Sap no already Exist please select different sap no .");
                            $('#insert').val("Update");

                        }
                        // $('#employee_table').html(data);
                        //    $("#html5-extension").load(" #html5-extension");

                    }
                });
            }
        });
        $(document).on('click', '.edit_data', function() {

            var employee_id = $(this).attr("id");
            // alert(employee_id)
            $.ajax({
                url: "ajax_edit/get_integrated_record.php",
                method: "POST",
                data: {
                    sap_id: employee_id
                },
                dataType: "json",
                success: function(data) {

                    $('#employee_id').val(data.id);
                    $('#cname').val(data.deliveryno);
                    $('#old_sapno').val(data.deliveryno);
                    $('#insert').val("Update");
                    $('#title_edit').text("Edit Sap #");
                    $('#zoomupModal').modal('show');
                }
            });
        });
    });
    </script>
    <script>
    function chup() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "block";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";








    }
    </script>
    <script>
    function transit() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("tt_transte").style.display = "block";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";








    }

    function integrated() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "block";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";







    }

    function not_integrated() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("black__spot").style.display = "block";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";








    }
    </script>

    <script>
    function dis_all() {
        //alert("Running")
        document.getElementById("all_car").style.display = "block";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";









    }
    </script>
    <script>
    function vehi_stop() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "block";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";








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

        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";





    }
    </script>
    <script>
    function activity_record() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "block";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";


        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";



    }
    </script>
    <script>
    function speed_over() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "block";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";

        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";



    }
    </script>
    <script>
    function ideal_state() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "block";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";

        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";


    }
    </script>
    <script>
    function api_nr() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "block";
        document.getElementById("black__spot").style.display = "none";

        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "none";


    }
    </script>
    <script>
    function blacks() {
        //alert("Running")

        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";

        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "block";
        document.getElementById("diversing").style.display = "none";

    }

    function diverse() {
        //alert("Running")

        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";

        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";

        document.getElementById("tt_transte").style.display = "none";
        document.getElementById("blackspoting").style.display = "none";
        document.getElementById("diversing").style.display = "block";
    }
    </script>
    <script>
    $('#html5-extensionserce').DataTable({
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
    $('#html5-extensionblack').DataTable({
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
    // var radialChart = {
    //     chart: {
    //         height: 350,
    //         type: 'radialBar',
    //         toolbar: {
    //             show: false,
    //         }
    //     },
    //     plotOptions: {
    //         radialBar: {
    //             dataLabels: {
    //                 name: {
    //                     fontSize: '22px',
    //                 },
    //                 value: {
    //                     fontSize: '16px',
    //                 },
    //                 total: {
    //                     show: true,
    //                     label: '',
    //                     formatter: function(w) {
    //                         // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
    //                         // return 249
    //                     }
    //                 }
    //             }
    //         }
    //     },
    //     series: arr_car,
    //     labels: car_lable,
    //     colors: ['#3b78b7','#ea7372','#e62e2d','#e6b730','#c34d9c'],
    // }

    // var chart = new ApexCharts(
    //     document.querySelector("#radial-chart"),
    //     radialChart
    // );

    // chart.render();
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>