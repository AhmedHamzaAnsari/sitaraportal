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
    <title>Sitara Vehicle Tracking</title>
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
    <!-- <link href="assets/css/elements/search.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>
    <link type="text/css" rel="stylesheet" href="src/jquery.treefilter.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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

    .component-card_3 .card-body h5.card-user_name {
        color: #f47621;
    }

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

    .searchable-container .searchable-items {
        overflow-x: hidden;
    }

    .filtered-list-search {
        margin-top: 30px;
    }

    .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .searchable-items {
        border: none;
        padding: 0;


    }

    .map-marker-label {
        position: absolute;
        color: #000;
        font-size: 16px;
        /* font-weight: bold; */
        background: #fff;
        padding: 7px;
        margin-left: -20px;
        /* margin-top:5px; */
        border-radius: 5px;
        border: 1px solid #000;
    }

    * {
        box-sizing: border-box;
    }

    #my-search {
        background-image: url('images/search.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 167%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        border: none;
        border-bottom: 1px solid;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myUL li a {
        /* border: 1px solid #ddd; */
        margin-top: -1px;
        /* Prevent double borders */
        /* background-color: #f6f6f6; */
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        /* color: black; */
        display: block
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }

    .file-tree li.file-tree-folder::before {
        display: none !important;
    }

    .tf-tree .tf-child-true:before {
        /* content: "\f00c" !important; */
        top: 7px !important;
        display: none
    }

    .file-tree .file-tree-folder {
        padding-left: 0px !important;
    }

    .car_upper {
        text-transform: uppercase !important;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$result = mysqli_query($db,"SELECT * FROM `bulkdata`");
$idd=$_SESSION['userid'];
$result=mysqli_query($db, "SELECT * FROM users where id='$idd'");
$data=mysqli_fetch_array($result);

if ($data['privilege']==='viewer') {
    $idd='1';
}else{
    
}

if($data['privilege']==='Admin' || $data['privilege'] === 'Depot' || $data['privilege'] === 'viewer'){

    $users = mysqli_query($db,"SELECT * FROM `users` WHERE   id='$idd'");
}

$admin_vehi = mysqli_query($db,"SELECT  count(distinct(dc.name)) as admin_vehi FROM sapstart 
join devices as dc on dc.name=sapstart.tlno
join positions as pos on pos.id=dc.latestPosition_id
join users_devices as ud on ud.devices_id=dc.uniqueId
where ud.users_id=1 and tlno IN(SELECT name from devices) and deliveryno NOT IN(select deliveryno from sapend) and sapstart.status = 0  order by sapstart.id desc");
$countadmin_vehi=mysqli_fetch_array($admin_vehi);


?>

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
    var arr = [];
    var arr2 = [];
    var allMyMarkers = [];
    var markersArray = [];
    </script>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Vehicle Detail</h3>
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

            <!-- <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <h2 class="text-center"></h2>
                </li>
            </ul> -->

            <ul class="navbar-item flex-row navbar-dropdown">
                <!-- <li class="nav-item dropdown language-dropdown more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/img/ca.png" class="flag-width" alt="flag"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                        <div class="dropdown-menu dropdown-menu-right animated fadeInUp" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-img-value="de" data-value="German" href="javascript:void(0);"><img src="assets/img/de.png" class="flag-width" alt="flag"> German</a>
                            <a class="dropdown-item" data-img-value="jp" data-value="Japanese" href="javascript:void(0);"><img src="assets/img/jp.png" class="flag-width" alt="flag"> Japanese</a>
                            <a class="dropdown-item" data-img-value="fr" data-value="French" href="javascript:void(0);"><img src="assets/img/fr.png" class="flag-width" alt="flag"> French</a>
                            <a class="dropdown-item" data-img-value="ca" data-value="English" href="javascript:void(0);"><img src="assets/img/ca.png" class="flag-width" alt="flag"> English</a>
                        </div>
                    </div>
                </li> -->

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
                            <!-- <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">KY</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Kara Young</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a> -->
                            <!-- <a class="dropdown-item">
                                <div class="">
                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">DA</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Daisy Anderson</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </a> -->
                            <!-- <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">OG</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Oscar Garner</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a> -->
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

                            <!-- <div class="dropdown-item">
                                <div class="media server-log">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Server Rebooted</h6>
                                            <p class="">45 min ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="dropdown-item">
                                <div class="media ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Licence Expiring Soon</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="dropdown-item">
                                <div class="media file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kelly Portfolio.pdf</h6>
                                            <p class="">670 kb</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
                        <!-- <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="assets/img/profile-7.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5>Alan Green</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="dropdown-item">
                            <a href="apps_mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>My Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth_lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div> -->
                        <div class="dropdown-item">
                            <a href="logout.php">
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
        <script>
        var rondomly = Math.floor(Math.random() * 10000);
        </script>
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php include 'sidebar.php';?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content mt-5" style="background-color:#FFFFFF">

            <div>
                <div class="row">
                    <div class="col-md-3"
                        style="width: 500px;height: 100vh; ;position: absolute;   z-index: 1 ; background: #FFFFFF ; ">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search ">
                                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                                        <div class="w-100">
                                            <!-- <span style="position: absolute;left: -60px; top: 13px;"><i
                                                    class="fas fa-search" style="margin-left: 45px;"></i></span> <input
                                                type="text" class="form-control product-search br-30" id="input-search"
                                                placeholder="Search "
                                                style="background-color: #FFFFFF;box-shadow: none;border-bottom: 1px solid #686868;border-radius: 0 !important;margin-left: -17px;width: 220px;padding-left:25px"> -->
                                            <input type="text" id="my-search" placeholder="Search Vehicle..."
                                                title="Type in a name">
                                        </div>
                                    </form>
                                </div>
                                <div class="container" style="height: 90vh;overflow: auto;">

                                    <ul id="my-tree" class="file-tree">

                                        <?php if($data['privilege']==='Admin' || $data['privilege']==='viewer' || $data['privilege']==='Depot' ){?>
                                        <?php foreach($users as $key => $value1){ 
                                            if($data['privilege']==='Depot' || $data['privilege']==='viewer'){

                                                $cid=1; 
                                            }
                                            else{
                                                $cid=$value1['id']; 

                                            }
                                            $b = mt_rand(100000,9999969); ?>
                                        <li class="file-tree-folder">
                                            <input type="checkbox" name="myCheck" id="userCheck<?= $b ?>"
                                                value="<?= $cid; ?>" onclick="users_car('<?= $cid; ?>','<?= $b; ?>')">
                                            <span style="font-weight:bold"><?= $value1['name']; ?></span><br>
                                            <p class="mt-1">Total Vehicle :
                                                (<?php echo $countadmin_vehi['admin_vehi'] ?>)</p>

                                            <ul>
                                                <?php 
                                                        $distributor="SELECT us.id,us.name,us.privilege FROM `users` as us INNER join `admin_distibutor` as ad on us.id=ad.distributor_id WHERE ad.admin_id=$cid";
                                                        // echo $query;
                                                        $distribut = mysqli_query($db, $distributor);
                                                        
                                                        foreach($distribut as $key => $value2){ 
                                                            if($data['privilege']==='Depot'){

                                                                $cidd=2; 
                                                            }
                                                            else{
                                                                $cidd=$value2['id'];
                                                                // echo '<script>alert('.$cidd.')</script>';

                
                                                            }
                                                            // $cidd=$value2['id']; 
                                                            $c = mt_rand(100000,9995999); $did=$value2['id']; ?>

                                                <li class="file-tree-folder"><input type="checkbox" name="myCheck"
                                                        id="userCheck<?= $c ?>" value="<?= $cidd; ?>"
                                                        onclick="users_car('<?= $cidd; ?>','<?= $c; ?>')">
                                                    <?= $value2['name']; ?><p>Total Vehicle : (<span
                                                            id="dis__vehi<?= $cidd; ?>"></span>)</p>

                                                    <ul>
                                                        <?php
                                                                $query2="SELECT us.id,us.name FROM `users` as us INNER join `distributor_end_user` as ue on us.id=ue.end_user_id  WHERE ue.distributor_id=$did";
                                                                // echo $query;
                                                                $results2 = mysqli_query($db, $query2);
                                                                
                                                                $i=1;
                                                                foreach ($results2 as $city2){$f = mt_rand(100000,9949999);$eid=$city2['id'];  
                                                                    ?>
                                                        <li class="file-tree-folder"> <input type="checkbox"
                                                                name="myCheck" id="userCheck<?= $f ?>"
                                                                value="<?= $city2['id']; ?>"
                                                                onclick="users_car('<?= $city2['id']; ?>','<?= $f; ?>')">
                                                            <?= $city2['name']; ?> <p>Total Vehicle : (<span
                                                                    id="end__vehi<?= $city2['id']; ?>"></span>)</p>
                                                            <ul>
                                                                <li>
                                                                    <?php
                                                                            $query4="SELECT  distinct(dc.name),ud.users_id,ud.devices_id,us.name,UPPER(dc.licensepn) as car_name,pos.power,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM sapstart 
                                                                            join devices as dc on dc.name=sapstart.tlno
                                                                            join positions as pos on pos.id=dc.latestPosition_id
                                                                            join users_devices as ud on ud.devices_id=dc.uniqueId
                                                                            INNER JOIN users as us on us.id=ud.users_id 
                                                                            where ud.show_authority=1 and ud.users_id='$eid' and tlno IN(SELECT name from devices) and deliveryno NOT IN(select deliveryno from sapend) and sapstart.status = 0  order by sapstart.id desc;";
                                                                            // echo $query;
                                                                            $results4 = mysqli_query($db, $query4);

                                                                            $end_vehi = mysqli_query($db,"SELECT  count(distinct(dc.name)) as end_vehi FROM sapstart 
                                                                            join devices as dc on dc.name=sapstart.tlno
                                                                            join positions as pos on pos.id=dc.latestPosition_id
                                                                            join users_devices as ud on ud.devices_id=dc.uniqueId
                                                                            INNER JOIN users as us on us.id=ud.users_id 
                                                                            where ud.show_authority=1 and ud.users_id=$eid and tlno IN(SELECT name from devices) and deliveryno NOT IN(select deliveryno from sapend) and sapstart.status = 0  order by sapstart.id desc");
                                                                            // echo "SELECT count(*) as end_vehi FROM `users_devices` where users_id=$eid";
                                                                            $countend_vehi=mysqli_fetch_array($end_vehi);
                                                                            $ending=$countend_vehi['end_vehi'];
                                                                            echo "
                                                                                <script type=\"text/javascript\">
                                                                                    document.getElementById('end__vehi'+$eid).innerHTML= $ending;
                                                                                </script>
                                                                            ";
                                                                            $i=1;
                                                                            foreach ($results4 as $city4){$e = $city4['devices_id']; 

                                                                                $datetime1 = new DateTime();
                                                                                $datetime2 = new DateTime($city4['time']);
                                                                                $interval = $datetime1->diff($datetime2);
                                                                                $elapsedS = $interval->format('%a');
                                                                                $elapsed = (int)$elapsedS;
                                                                    ?>

                                                                <li>
                                                                    <!-- <script>
                                                                                var last_update_time = "<?= $city4['time']; ?>";
                                                                                var server_time2 = moment(last_update_time).format(
                                                                                    'MM/DD/YYYY hh:mm A');
                                                                                var current_time2 = moment().format(
                                                                                    'MM/DD/YYYY hh:mm A');
                                                                                var a = moment(server_time2, 'MM/DD/YYYY hh:mm A');
                                                                                var b = moment(current_time2, 'MM/DD/YYYY hh:mm A');
                                                                                var diffDays2 = b.diff(a, 'minutes');
                                                                                // console.log("last " + diffDays2)
                                                                                <?php $variable_diff = "<script>document.write(diffDays2)</script>"?>
                                                                                </script> -->



                                                                    <?php if ($elapsed<=1 && $city4['speed']==='0') { ?>


                                                                    <input type="checkbox" name="myCheck"
                                                                        id="myCheck<?= $e ?>"
                                                                        value="<?= $city4['devices_id']; ?>"
                                                                        onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                                    <span><img src="images/icon/car_icon_blue.png"
                                                                            alt="" srcset="">
                                                                    </span><?= $city4['car_name']; ?>
                                                                    <span class=" mt-2"
                                                                        style="float:right ;font-size: 10px;"><?= $city4['speed']; ?>
                                                                        Stop</span>
                                                                    <?php } elseif($elapsed<=1 && $city4['speed']>'0' ){?>

                                                                    <input type="checkbox" name="myCheck"
                                                                        id="myCheck<?= $e ?>"
                                                                        value="<?= $city4['devices_id']; ?>"
                                                                        onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                                    <span><img src="images/icon/car_icon_green.png"
                                                                            alt="" srcset="">
                                                                    </span><?= $city4['car_name']; ?> <span
                                                                        class=" mt-2"
                                                                        style="float:right ;font-size: 10px;"><?= $city4['speed']; ?>
                                                                        km/h Moving</span>


                                                                    <?php } elseif($elapsed>=1 && $city4['speed']>='0' || $elapsed>=1 && $city4['speed']>='1') {?>



                                                                    <input type="checkbox" name="myCheck"
                                                                        id="myCheck<?= $e ?>"
                                                                        value="<?= $city4['devices_id']; ?>"
                                                                        onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                                    <span><img src="images/icon/car_red.png" alt=""
                                                                            srcset="">
                                                                    </span> <?= $city4['car_name']; ?> <span
                                                                        class=" mt-2"
                                                                        style="float:right ;font-size: 10px;">
                                                                        <?= $city4['time']; ?> (NR)</span>

                                                                    <?php }?>
                                                                    <!-- <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                                            value="<?= $city4['devices_id']; ?>"
                                                                            onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                                        <span><img src="images/truck.png" width="20px" alt="" srcset=""> </span><?= $city4['car_name']; ?>  -->
                                                                </li>


                                                                <?php
                                                                    $i++; }
                                                                    
                                                                ?>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <?php
                                                                    $i++; }
                                                                    
                                                                ?>


                                                <?php
                                                                            $query1="SELECT ud.users_id,ud.devices_id,us.name,dc.name ,UPPER(dc.licensepn) as car_name,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where ud.show_authority=1 and ud.users_id=$cidd";
                                                                            // echo $query;
                                                                            $results1 = mysqli_query($db, $query1);
                                                                            // echo "SELECT count(*) as end_vehi FROM `users_devices` where users_id=$cidd";
                                                                            $dis_vehi = mysqli_query($db,"SELECT  count(distinct(dc.name)) as dis_vehi FROM sapstart 
                                                                            join devices as dc on dc.name=sapstart.tlno
                                                                            join positions as pos on pos.id=dc.latestPosition_id
                                                                            join users_devices as ud on ud.devices_id=dc.uniqueId
                                                                            INNER JOIN users as us on us.id=ud.users_id 
                                                                            where ud.show_authority=0 and ud.users_id=$cidd and tlno IN(SELECT name from devices) and deliveryno NOT IN(select deliveryno from sapend) and sapstart.status = 0  order by sapstart.id desc");
                                                                            $countdis_vehi=mysqli_fetch_array($dis_vehi);
                                                                            $dissing=$countdis_vehi['dis_vehi'];
                                                                            echo "
                                                                                <script type=\"text/javascript\">
                                                                                // alert($dissing);
                                                                                document.getElementById('dis__vehi'+$cidd).innerHTML= $dissing;
                                                                                </script>
                                                                            ";
                                                                            $i=1;
                                                                            foreach ($results1 as $city1){$d = $city1['devices_id']; 
                                                                                // foreach ($results1 as $city1){$d = mt_rand(100000,999999); 
                                                                    ?>

                                                <li><input type="checkbox" name="myCheck" id="myCheck<?= $d ?>"
                                                        value="<?= $city1['devices_id']; ?>"
                                                        onclick="myFunction('<?= $city1['car_name']; ?>','<?= $d; ?>')">
                                                    <?= $city1['car_name']; ?>
                                                </li>


                                                <?php
                                                                    $i++; }
                                                                    
                                                                ?>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                        <?php
                                                        $query="SELECT ud.users_id,ud.devices_id,us.name,dc.name ,UPPER(dc.licensepn) as car_name,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where ud.show_authority=0 and ud.users_id=$cid";
                                                        // echo $query;
                                                        $results = mysqli_query($db, $query);

                                                        

                                                        $i=1;
                                                        foreach ($results as $city){$a = $city['devices_id'];
                                                            // foreach ($results as $city){$a = mt_rand(100000,999999); 
                                                        ?>

                                        <!-- <li><input type="checkbox" name="myCheck" id="myCheck<?= $a ?>"
                                                value="<?= $city['devices_id']; ?>"
                                                onclick="myFunction('<?= $city['car_name']; ?>','<?= $a; ?>')">
                                            <?= $city['car_name']; ?>
                                        </li> -->


                                        <?php $i++; } ?>
                                    </ul>
                                    </li>
                                    <?php } ?>

                                    <?php } elseif($data['privilege']==='Distributor'){$cid=$data['id']?>

                                    <?php 
                                                    $distributor="SELECT us.id,us.name,us.privilege FROM `users` as us WHERE us.id=$cid";
                                                    // echo $query;
                                                    $distribut = mysqli_query($db, $distributor);
                                                    
                                                    foreach($distribut as $key => $value2){ $cidd=$value2['id']; $c = mt_rand(100000,9995999); $did=$value2['id']; ?>

                                    <li class="file-tree-folder"><input type="checkbox" name="myCheck"
                                            id="userCheck<?= $c ?>" value="<?= $value2['id']; ?>"
                                            onclick="users_car('<?= $value2['id']; ?>','<?= $c; ?>')">
                                        <?= $value2['name']; ?><p>Total Vehicle : (<span
                                                id="dis__vehi<?= $value2['id']; ?>"></span>)</p>

                                        <ul>
                                            <?php
                                                            $query2="SELECT us.id,us.name FROM `users` as us INNER join `distributor_end_user` as ue on us.id=ue.end_user_id  WHERE ue.distributor_id=$did";
                                                            // echo $query;
                                                            $results2 = mysqli_query($db, $query2);
                                                            
                                                            $i=1;
                                                            foreach ($results2 as $city2){$f = mt_rand(100000,9949999);$eid=$city2['id'];  
                                                                ?>
                                            <li class="file-tree-folder"> <input type="checkbox" name="myCheck"
                                                    id="userCheck<?= $f ?>" value="<?= $city2['id']; ?>"
                                                    onclick="users_car('<?= $city2['id']; ?>','<?= $f; ?>')">
                                                <?= $city2['name']; ?> <p>Total Vehicle : (<span
                                                        id="end__vehi<?= $city2['id']; ?>"></span>)</p>
                                                <ul>
                                                    <li>
                                                        <?php
                                                                        $query4="SELECT ud.users_id,ud.devices_id,us.name,dc.name,UPPER(dc.licensepn) as car_name,pos.power,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where ud.show_authority=1 and ud.users_id=$eid";
                                                                        // echo $query;
                                                                        $results4 = mysqli_query($db, $query4);

                                                                        $end_vehi = mysqli_query($db,"SELECT count(*) as end_vehi FROM `users_devices` as ud join devices as dc on dc.uniqueId=ud.devices_id where users_id=$eid");
                                                                        // echo "SELECT count(*) as end_vehi FROM `users_devices` where users_id=$eid";
                                                                        $countend_vehi=mysqli_fetch_array($end_vehi);
                                                                        $ending=$countend_vehi['end_vehi'];
                                                                        echo "
                                                                            <script type=\"text/javascript\">
                                                                                document.getElementById('end__vehi'+$eid).innerHTML= $ending;
                                                                            </script>
                                                                        ";
                                                                        $i=1;
                                                                        foreach ($results4 as $city4){$e = $city4['devices_id']; 

                                                                            $datetime1 = new DateTime();
                                                                            $datetime2 = new DateTime($city4['time']);
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            $elapsedS = $interval->format('%a');
                                                                            $elapsed = (int)$elapsedS;
                                                                ?>

                                                    <li>
                                                        <!-- <script>
                                                                            var last_update_time = "<?= $city4['time']; ?>";
                                                                            var server_time2 = moment(last_update_time).format(
                                                                                'MM/DD/YYYY hh:mm A');
                                                                            var current_time2 = moment().format(
                                                                                'MM/DD/YYYY hh:mm A');
                                                                            var a = moment(server_time2, 'MM/DD/YYYY hh:mm A');
                                                                            var b = moment(current_time2, 'MM/DD/YYYY hh:mm A');
                                                                            var diffDays2 = b.diff(a, 'minutes');
                                                                            // console.log("last " + diffDays2)
                                                                            <?php $variable_diff = "<script>document.write(diffDays2)</script>"?>
                                                                            </script> -->



                                                        <?php if ($elapsed<=1 && $city4['speed']==='0') { ?>


                                                        <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                            value="<?= $city4['devices_id']; ?>"
                                                            onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                        <span><img src="images/icon/car_icon_blue.png" alt="" srcset="">
                                                        </span><?= $city4['car_name']; ?>
                                                        <span class=" mt-2"
                                                            style="float:right ;font-size: 10px;"><?= $city4['speed']; ?>
                                                            Stop</span>
                                                        <?php } elseif($elapsed<=1 && $city4['speed']>'0' ){?>

                                                        <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                            value="<?= $city4['devices_id']; ?>"
                                                            onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                        <span><img src="images/icon/car_icon_green.png" alt=""
                                                                srcset="">
                                                        </span><?= $city4['car_name']; ?> <span class=" mt-2"
                                                            style="float:right ;font-size: 10px;"><?= $city4['speed']; ?>
                                                            km/h Moving</span>


                                                        <?php } elseif($elapsed>=1 && $city4['speed']>='0' || $elapsed>=1 && $city4['speed']>='1') {?>



                                                        <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                            value="<?= $city4['devices_id']; ?>"
                                                            onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                        <span><img src="images/icon/car_red.png" alt="" srcset="">
                                                        </span> <?= $city4['car_name']; ?> <span class=" mt-2"
                                                            style="float:right ;font-size: 10px;">
                                                            <?= $city4['time']; ?> (NR)</span>

                                                        <?php }?>
                                                        <!-- <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                                        value="<?= $city4['devices_id']; ?>"
                                                                        onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                                    <span><img src="images/truck.png" width="20px" alt="" srcset=""> </span><?= $city4['car_name']; ?>  -->
                                                    </li>


                                                    <?php
                                                                $i++; }
                                                                
                                                            ?>
                                            </li>

                                        </ul>
                                    </li>
                                    <?php
                                                                $i++; }
                                                                
                                                            ?>


                                    <?php
                                                                        $query1="SELECT ud.users_id,ud.devices_id,us.name,dc.name ,UPPER(dc.licensepn) as car_name,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where ud.show_authority=1 and ud.users_id=$cidd";
                                                                        // echo $query;
                                                                        $results1 = mysqli_query($db, $query1);
                                                                        // echo "SELECT count(*) as end_vehi FROM `users_devices` where users_id=$cidd";
                                                                        $dis_vehi = mysqli_query($db,"SELECT count(*) as dis_vehi FROM `users_devices` as ud join devices as dc on dc.uniqueId=ud.devices_id where users_id=$cidd");
                                                                        $countdis_vehi=mysqli_fetch_array($dis_vehi);
                                                                        $dissing=$countdis_vehi['dis_vehi'];
                                                                        echo "
                                                                            <script type=\"text/javascript\">
                                                                            // alert($dissing);
                                                                            document.getElementById('dis__vehi'+$cidd).innerHTML= $dissing;
                                                                            </script>
                                                                        ";
                                                                        $i=1;
                                                                        foreach ($results1 as $city1){$d = $city1['devices_id']; 
                                                                            // foreach ($results1 as $city1){$d = mt_rand(100000,999999); 
                                                                ?>

                                    <li><input type="checkbox" name="myCheck" id="myCheck<?= $d ?>"
                                            value="<?= $city1['devices_id']; ?>"
                                            onclick="myFunction('<?= $city1['car_name']; ?>','<?= $d; ?>')">
                                        <?= $city1['car_name']; ?>
                                    </li>


                                    <?php
                                                                $i++; }
                                                                
                                                            ?>

                                    </li>
                                    <?php } ?>
                                    <?php }else{ $did=$data['id'];?>

                                    <?php
                                                                $query2="SELECT us.id,us.name,us.privilege FROM `users` as us WHERE us.id=$did";
                                                                // echo $query;
                                                                $results2 = mysqli_query($db, $query2);
                                                                
                                                                $i=1;
                                                                foreach ($results2 as $city2){$f = mt_rand(100000,9949999);$eid=$city2['id'];  
                                                                    ?>
                                    <li class="file-tree-folder"> <input type="checkbox" name="myCheck"
                                            id="userCheck<?= $f ?>" value="<?= $city2['id']; ?>"
                                            onclick="users_car('<?= $city2['id']; ?>','<?= $f; ?>')">
                                        <?= $city2['name']; ?> <p>Total Vehicle : (<span
                                                id="end__vehi<?= $city2['id']; ?>"></span>)</p>
                                        <ul>
                                            <li>
                                                <?php
                                                                            $query4="SELECT ud.users_id,ud.devices_id,us.name,dc.name,UPPER(dc.licensepn) as car_name,pos.power,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time FROM users_devices as ud INNER JOIN users as us on ud.users_id=us.id INNER JOIN devices as dc on ud.devices_id=dc.uniqueId INNER JOIN positions as pos on dc.latestPosition_id=pos.id where ud.show_authority=1 and ud.users_id=$eid";
                                                                            // echo $query;
                                                                            $results4 = mysqli_query($db, $query4);

                                                                            $end_vehi = mysqli_query($db,"SELECT count(*) as end_vehi FROM `users_devices` as ud join devices as dc on dc.uniqueId=ud.devices_id where users_id=$eid");
                                                                            // echo "SELECT count(*) as end_vehi FROM `users_devices` where users_id=$eid";
                                                                            $countend_vehi=mysqli_fetch_array($end_vehi);
                                                                            $ending=$countend_vehi['end_vehi'];
                                                                            echo "
                                                                                <script type=\"text/javascript\">
                                                                                    document.getElementById('end__vehi'+$eid).innerHTML= $ending;
                                                                                </script>
                                                                            ";
                                                                            $i=1;
                                                                            foreach ($results4 as $city4){$e = $city4['devices_id']; 

                                                                                $datetime1 = new DateTime();
                                                                                $datetime2 = new DateTime($city4['time']);
                                                                                $interval = $datetime1->diff($datetime2);
                                                                                $elapsedS = $interval->format('%a');
                                                                                $elapsed = (int)$elapsedS;
                                                                    ?>

                                            <li>
                                                <!-- <script>
                                                                                var last_update_time = "<?= $city4['time']; ?>";
                                                                                var server_time2 = moment(last_update_time).format(
                                                                                    'MM/DD/YYYY hh:mm A');
                                                                                var current_time2 = moment().format(
                                                                                    'MM/DD/YYYY hh:mm A');
                                                                                var a = moment(server_time2, 'MM/DD/YYYY hh:mm A');
                                                                                var b = moment(current_time2, 'MM/DD/YYYY hh:mm A');
                                                                                var diffDays2 = b.diff(a, 'minutes');
                                                                                // console.log("last " + diffDays2)
                                                                                <?php $variable_diff = "<script>document.write(diffDays2)</script>"?>
                                                                                </script> -->



                                                <?php if ($elapsed<=1 && $city4['speed']==='0') { ?>


                                                <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                    value="<?= $city4['devices_id']; ?>"
                                                    onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                <span><img src="images/icon/car_icon_blue.png" alt="" srcset="">
                                                </span><?= $city4['car_name']; ?>
                                                <span class=" mt-2"
                                                    style="float:right ;font-size: 10px;"><?= $city4['speed']; ?>
                                                    Stop</span>
                                                <?php } elseif($elapsed<=1 && $city4['speed']>'0' ){?>

                                                <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                    value="<?= $city4['devices_id']; ?>"
                                                    onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                <span><img src="images/icon/car_icon_green.png" alt="" srcset="">
                                                </span><?= $city4['car_name']; ?> <span class=" mt-2"
                                                    style="float:right ;font-size: 10px;"><?= $city4['speed']; ?>
                                                    km/h Moving</span>


                                                <?php } elseif($elapsed>=1 && $city4['speed']>='0' || $elapsed>=1 && $city4['speed']>='1') {?>



                                                <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                    value="<?= $city4['devices_id']; ?>"
                                                    onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                <span><img src="images/icon/car_red.png" alt="" srcset="">
                                                </span> <?= $city4['car_name']; ?> <span class=" mt-2"
                                                    style="float:right ;font-size: 10px;">
                                                    <?= $city4['time']; ?> (NR)</span>

                                                <?php }?>
                                                <!-- <input type="checkbox" name="myCheck" id="myCheck<?= $e ?>"
                                                                            value="<?= $city4['devices_id']; ?>"
                                                                            onclick="myFunction('<?= $city4['car_name']; ?>','<?= $e; ?>')">
                                                                        <span><img src="images/truck.png" width="20px" alt="" srcset=""> </span><?= $city4['car_name']; ?>  -->
                                            </li>


                                            <?php
                                                                    $i++; }
                                                                    
                                                                ?>
                                    </li>

                                    </ul>
                                    </li>
                                    <?php
                                                                    $i++; }
                                                                    
                                                                ?>

                                    <?php }?>




                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="mapid" style="width: 100%; height: 100vh; z-index: 0;" class="">
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
    <script src="plugins/highlight/highlight.pack.js"></script>

    <script src="assets/js/custom.js"></script>
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <!-- <script src="assets/js/elements/custom-search.js"></script> -->
    <script src="assets/js/scrollspyNav.js"></script>


    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    let map, popup, Popup;



    function initMap() {
        var markerSize = {
            x: 22,
            y: 40
        };
        google.maps.Marker.prototype.setLabel = function(label) {
            this.label = new MarkerLabel({
                map: this.map,
                marker: this,
                text: label
            });
            this.label.bindTo('position', this, 'position');
        };

        var MarkerLabel = function(options) {
            this.setValues(options);
            this.span = document.createElement('span');
            this.span.className = 'map-marker-label';
        };

        MarkerLabel.prototype = $.extend(new google.maps.OverlayView(), {
            onAdd: function() {
                this.getPanes().overlayImage.appendChild(this.span);
                var self = this;
                this.listeners = [
                    google.maps.event.addListener(this, 'position_changed', function() {
                        self.draw();
                    })
                ];
            },
            draw: function() {
                var text = String(this.get('text'));
                var position = this.getProjection().fromLatLngToDivPixel(this.get('position'));
                this.span.innerHTML = text;
                this.span.style.left = (position.x - (markerSize.x / 2)) - (text.length * 3) + 10 + 'px';
                this.span.style.top = (position.y - markerSize.y + 40) + 'px';
            }
        });

        // console.log(arr2);
        gmarkers = [];
        map = new google.maps.Map(document.getElementById("mapid"), {
            center: {
                lat: 30.3753,
                lng: 69.3451
            },
            zoom: 6,

        });


        map.markers = [];

        const geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        // const image = "/car_stopped.png";
        const image = "images/car_stopped.png";
        const fimage = "images/car_travelling.png";


        /*  function createMarker(latlng, html, id1, carName, lat, lng, speed) {

             const mark = (speed > 0) ? fimage : image;


             var marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 // url: "run.php?id="+id1,


                 label: carName,



                 icon: {
                     labelOrigin: new google.maps.Point(11, 50),
                     url: mark,
                     //size: new google.maps.Size(22, 40),
                     origin: new google.maps.Point(0, 0),
                     anchor: new google.maps.Point(11, 40),
                 },



             });
             // console.log(lat, lng);
             var address11, samad;
             // console.log(address);
             $.get('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng +
                 '&key=AIzaSyA0Xcp5FeJeVPn0nuCvLr-n_UG6_EL3ufs&sensor=false',
                 function(data) {
                     // address11 = (data['results'][0]['formatted_address']);
                     // console.log("add"+address11);
                     samad = '<div class="container" style="width: 100%; height: auto; ">' +
                         '<div class="row">' +
                         '<div class="col-md-12">' +
                         '<p style="font-weight: bold; color:#000;text-align:center">' +
                         carName +
                         '</p>' +
                         '<p id="<%= j %>" style="color: #465A64; font-size: small;">' +
                         +
                         '</p>' +
                         '<div class="row">' +
                         // '<div class="col-md-12">'+
                         // '<label for="" style="width: 33.33%; font-size: 12px; color:#000">'+
                         //     'Odometer :'+
                         //     '</label>'+
                         //     '<span style="color: #000;" id="odoo">'+
                         //         '21,528.8 mi'+
                         //         '</span>'+
                         //         '</div>'+
                         '<div class="col-md-12">' +
                         '<label for=""style="width: 33.33%; font-size: 12px;  color:#000">' +
                         'Speed :' +
                         '</label>' +
                         '<span style="color: #000;">' +
                         speed +
                         '</span>' +
                         '</div>' +
                         '</div>' +
                         '</div>' +
                         '</div>' +
                         '</div>';
                 });
             //new google.maps.setCenter(latlng);
             // google.maps.event.addListener(marker, 'dblclick', function () {
             //     window.location.href = marker.url;
             // });
             google.maps.event.addListener(marker, 'click', function() {

                 infowindow.setContent(samad);
                 infowindow.open(map, marker);
             });
             google.maps.event.addListener(marker, 'mouseover', function() {
                 infowindow.setContent(samad);
                 infowindow.open(map, marker);
             });
             google.maps.event.addListener(marker, 'mouseout', function() {
                 infowindow.setContent(samad);
                 infowindow.close();
             });
             return marker;
         }

         for (var i = 0; i < arr2.length; i++) {
             gmarkers[arr2[i][0]] =
                 createMarker(new google.maps.LatLng(arr2[i][1], arr2[i][2]), arr2[i][0], arr2[i][3], arr2[i][4], arr2[i]
                     [1], arr2[i][2], arr2[i][5]);
         } */





    }
    //         setTimeout(function(){
    //     location.reload();
    // }, 1000*21);
    </script>


    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- <script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    </script> -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="src/jquery.treefilter.js"></script>
    <script>
    $(function() {

        var tree = new treefilter($("#my-tree"), {
            searcher: $("input#my-search"),
            multiselect: false
        });
    });
    $("input[type='checkbox']").change(function() {
        $(this).siblings('ul')
            .find("input[type='checkbox']")
            .prop('checked', this.checked);
    });
    </script>
    <script>
    function myFunction(car, device_id) {
        ////alert(car + " " + id)
        var checkBox = document.getElementById("myCheck" + device_id + "");
        var currentId = 0;
        var delete_ids;
        var markers = {};
        var currentId = uniqueid();


        var carName = checkBox.value;
        //alert(carName)
        if (checkBox.checked === true) {
            //alert("Checked " + checkBox.id);
            $.ajax({
                url: 'get_lat_lng.php',
                type: 'POST',
                data: {
                    check: carName
                },
                success: function(data) {
                    data = JSON.parse(data)
                    //alert(data.latitude + " " + data.longitude);
                    // console.log(data)
                    // var marker = new google.maps.Marker({
                    //  var id = uniqueId();
                    // position: new google.maps.LatLng(data.lat, data.lng),
                    // map: map,
                    // });
                    //alert("car id " +device_id)

                    ////alert("SaaP" + currentId)
                    var str = data.altitude;
                    var res = str.toUpperCase();
                    setMarker(data.latitude, data.longitude, data.speed, device_id, res, data
                        .vlocation, data.time)




                }
            });

        } else {
            //alert("Unchecked " + device_id);
            // console.log(allMyMarkers)

            removeMarker(device_id, allMyMarkers)
        }

        function uniqueid() {
            return ++currentId;
        }

        /* function createMarker(lat, lng) {
            var id = uniqueId(); // get new id
            delete_ids = id
            ////alert("Saa" + id)
            var marker = new google.maps.Marker({ // create a marker and set id
                id: id,
                position: new google.maps.LatLng(lat, lng),
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });
            markers[id] = marker; // cache created marker to markers object with id as its key
            return marker;
        } */





        /* function deleteMarker(ida) {
            var marker = markers[ida]; // find the marker by given id
            marker.setMap(null);
        } */

    }
    </script>

    <script>
    var whole = [];
    var dis_veh = [];

    function users_car(user_id, id) {
        ////alert(car + " " + id)
        var checkBox = document.getElementById("userCheck" + id + "");
        var currentId = 0;
        var delete_ids;
        var markers = {};

        var carName = checkBox.value;
        var distriutor_id = carName;
        //alert(carName)
        //////alert("checked")
        if (checkBox.checked === true) {






            ////alert("Checked " + checkBox.id);
            $.ajax({
                url: 'get_sap_user_vehi.php',
                type: 'POST',
                data: {
                    check: carName
                },
                success: function(data) {
                    data = JSON.parse(data)

                    var len = data.length;
                    //alert("len "+len)
                    console.log(data[0][1])
                    for (var i = 0; i <= len; i++) {
                        var lat = data[i][1];
                        var lng = data[i][2];
                        var speed = data[i][3];
                        var name = data[i][4];
                        var deviceId = data[i][5];
                        var altitude = data[i][6];
                        var vlocation = data[i][7];
                        var time = data[i][8];
                        //console.log(deviceId)
                        var currentId1 = uniqueid();
                        ////alert(currentId1)


                        // dis_veh.push(deviceId);
                        // console.log(dis_veh);
                        setMarker_users(lat, lng, speed, deviceId, altitude, vlocation, time)
                    }
                    console.log("samad")

                    // var marker = new google.maps.Marker({
                    //  var id = uniqueId();   
                    // position: new google.maps.LatLng(data.lat, data.lng),
                    // map: map,
                    // });

                    ////alert("SaaP" + currentId)
                    // setMarker(data.lat, data.lng)



                }
            });

        } else {
            var carName = checkBox.value;


            removeMarker12();
            // window.location.reload();
            ////alert("Unchecked " + currentId);
            // for (var i = 0; i <= dis_veh.length; i++) {
            //     removeMarker(i, dis_veh)
            //     //removeMarker(id,dis_veh[i])
            // }
            // removeMarker_all(whole)
        }

        function uniqueid() {
            return ++currentId;
        }

        function removeMarker_all(params) {
            params.push(params.length + 1)
            console.log(params);
            // map.markers[index-1].setMap(null); ///////PROBLEM IS HERE
            // map.markers[index-1] = null;
            // map.markers.splice(index-1, 1);
            //alert(map.markers.length)
            var i = -1;
            // map.markers[params[0]].setMap(null); ///////PROBLEM IS HERE
            // map.markers[params[0]] = null;
            // map.markers.splice(params[0], 1);
            while (i <= map.markers.length) {
                //  //alert(map.markers.length-1)

                map.markers[map.markers.length - 1].setMap(null); ///////PROBLEM IS HERE
                map.markers[map.markers.length - 1] = null;
                map.markers.splice(map.markers.length - 1, 1);

                i++;
            }

        }

        /* function createMarker(lat, lng) {
            var id = uniqueId(); // get new id
            delete_ids = id
            ////alert("Saa" + id)
            var marker = new google.maps.Marker({ // create a marker and set id
                id: id,
                position: new google.maps.LatLng(lat, lng),
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });
            markers[id] = marker; // cache created marker to markers object with id as its key
            return marker;
        } */



        /* function deleteMarker(ida) {
            var marker = markers[ida]; // find the marker by given id
            marker.setMap(null);
        } */

    }
    </script>
    <script>
    function setMarker(lat, lng, speeds, device_id, vehicle_name, location, last_time) {
        //removeMarker(markerId);
        ids = device_id;
        // alert("Saa"+vehicle_name)
        var speed = speeds;



        const image = "images/icon/car_icon_blue.png";
        const fimage = "images/icon/car_icon_green.png";
        const nr = "images/icon/car_red.png";
        // const mark = (speed > 0) ? fimage : image;


        var server_time = moment(last_time).format('MM/DD/YYYY hh:mm A');
        var current_time = moment().format('MM/DD/YYYY hh:mm A');
        var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
        var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
        var diffDays = b.diff(a, 'minutes');
        // alert(diffDays ) ;

        const mark = speed > 0 ? fimage : (diffDays > 1440 ? nr : image);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            id: ids,
            animation: google.maps.Animation.DROP,
            map: map,
            icon: {
                labelOrigin: new google.maps.Point(11, 50),
                url: mark,

                //size: new google.maps.Size(22, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(11, 40),
            },
        });
        allMyMarkers[ids] = marker
        // allMyMarkers.push( marker );

        var index = map.markers.length;
        map.markers.push(marker /* new Point(map.markers.length, location.lat(), location.lng())*/ );
        // console.log(JSON.stringify(map.markers.length));
        /* var temp_marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
        });
        temp_marker.setMap(map);
        temp_marker.metadata = {
            id: markerId
        };
        markers[markerId] = temp_marker; */
        var infowindow = new google.maps.InfoWindow({
            content: '<p>Details:' + '<p>Vehical # :' + vehicle_name + '</p>' + '<p>Location # :' + location +
                '</p>' + '<p>Latitude:' + lat + '</p>' + '<p>Longitude:' + lng + '</p>' + '<p>speed:' + speeds +
                '</p>' + '<p>Last:' + last_time + '</p>' + '<a href="run.php?id=' + ids +
                '" class="btn btn-primary">Live Tracking</a>'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }


    function setMarker_users(lat, lng, speeds, device_id, vehicle_name, location, last_time) {
        //removeMarker(markerId);
        ids = device_id;
        // alert("Saa"+vehicle_name)
        var speed = speeds;



        const image = "images/icon/car_icon_blue.png";
        const fimage = "images/icon/car_icon_green.png";
        const nr = "images/icon/car_red.png";
        // const mark = (speed > 0) ? fimage : image;


        var server_time = moment(last_time).format('MM/DD/YYYY hh:mm A');
        var current_time = moment().format('MM/DD/YYYY hh:mm A');
        var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
        var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
        var diffDays = b.diff(a, 'minutes');
        // alert(diffDays ) ;

        const mark = speed > 0 ? fimage : (diffDays > 1440 ? nr : image);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            id: ids,
            animation: google.maps.Animation.DROP,
            map: map,
            icon: {
                labelOrigin: new google.maps.Point(11, 50),
                url: mark,

                //size: new google.maps.Size(22, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(11, 40),
            },
        });
        markersArray.push(marker);
        // allMyMarkers.push( marker );

        var index = map.markers.length;
        map.markers.push(marker /* new Point(map.markers.length, location.lat(), location.lng())*/ );
        // console.log(JSON.stringify(map.markers.length));
        /* var temp_marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
        });
        temp_marker.setMap(map);
        temp_marker.metadata = {
            id: markerId
        };
        markers[markerId] = temp_marker; */
        var infowindow = new google.maps.InfoWindow({
            content: '<p>Details:' + '<p>Vehical # :' + vehicle_name + '</p>' + '<p>Location # :' + location +
                '</p>' + '<p>Latitude:' + lat + '</p>' + '<p>Longitude:' + lng + '</p>' + '<p>speed:' + speeds +
                '</p>' + '<p>Last:' + last_time + '</p>' + '<a href="run.php?id=' + ids +
                '" class="btn btn-primary">Live Tracking</a>'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }

    function removeMarker12() {
        if (markersArray) {
            // console.log( markersArray.length)
            for (i = 0; i < markersArray.length; i++) {
                // console.log(markersArray[i].id)
                markersArray[i].setMap(null);
            }

            markersArray.length = 0;
            $(":checkbox").attr("checked", false);
        }
    }


    function removeMarker(index, allMyMarker) {
        console.log("marker index=" + index);

        console.log(allMyMarker[index])


        // for(var i=0;i<allMyMarker.length;i++){
        // console.log(allMyMarker[i].id)
        //     if(allMyMarker[i].id === index){
        allMyMarker[index].setMap(null);

        //     break;
        // }
        // }

        // allMyMarkers[i].id === index){
        // index.setMap(null);



    }
    </script>


</body>



</html>