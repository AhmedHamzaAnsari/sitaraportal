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
    <link href="assets/css/elements/search.css" rel="stylesheet" type="text/css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Xcp5FeJeVPn0nuCvLr-n_UG6_EL3ufs&callback=initMap&libraries=&v=weekly"
        defer></script>
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
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$result = mysqli_query($db,"SELECT * FROM `bulkdata`");

?>

<body class="sidebar-noneoverflow starterkit">
    <script>
    var arr = [];
    var arr2 = [];
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
                        style="width: 300px;height: 100vh; ;position: absolute;   z-index: 1 ; background: #FFFFFF">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">
                                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                                        <div class="w-100">
                                            <span style="position: absolute;left: -60px; top: 13px;"><i
                                                    class="fas fa-search" style="margin-left: 45px;"></i></span> <input
                                                type="text" class="form-control product-search br-30" id="input-search"
                                                placeholder="Search "
                                                style="background-color: #FFFFFF;box-shadow: none;border-bottom: 1px solid #686868;border-radius: 0 !important;margin-left: -17px;width: 220px;padding-left:25px">
                                        </div>
                                    </form>
                                </div>

                                <div class="searchable-container ml-4" style="border: none;">
                                    <div class="row">
                                        <div class="col-md-12" style="overflow: auto;height: 80vh;">

                                            <div class="searchable-items" style="">
                                                <div class="items" style="box-shadow: none;padding: 0;">


                                                    <div class="user-name">
                                                        <div class="container-fluid">
                                                            <div class="row my-2">

                                                                <div class="col-md-12"
                                                                    style="width: 100% !important; padding-left: 0;">
                                                                    <?php foreach($result as $key => $value){ $i=1; ?>

                                                                        <div class="container">
                                                                    <a href="javascript:google.maps.event.trigger(window.location.href ='run.php?id=<?= $value['imei']; ?>' ,'dblclick');">
                                                                            <div class="row mb-3">


                                                                                <div class="col-md-4">
                                                                                    <?php if ($value['speed']>0) { ?>
                                                                                    <i class="fa fa-car text-success "
                                                                                        aria-hidden="true"
                                                                                        style="font-size: 25px; font-weight: 1; "></i>
                                                                                    <?php } else { ?>
                                                                                    <i class="fa fa-car text-danger "
                                                                                        aria-hidden="true"
                                                                                        style="font-size: 25px; font-weight: 1; "></i>
                                                                                    <?php } ?>
                                                                                </div>

                                                                                <div class="col-md-8"
                                                                                    style="margin-left: -35px;">
                                                                                    <div class="vertical-center">
                                                                                        <p class=""
                                                                                            style="font-size: 15px;opacity: 0.9; width: 177px; font-weight: bold; color: #686868;">
                                                                                            <?= $value['name']; ?></p>
                                                                                    </div>


                                                                                    <p class="" id=""
                                                                                        style="opacity: 0.9; width: 177px;">
                                                                                    </p>
                                                                                    <p class="" style=" ">
                                                                                </div>

                                                                            </div>
                                                                            <!-- <hr style="border-top: 1px solid #000;"> -->

                                                                    </a>
                                                                        </div>

                                                                    
                                                                    <script>
                                                                    var lat = " <?= $value['lat']; ?>";
                                                                    var id = " <?= $value['lng']; ?>";
                                                                    // var name1 = "<p style='font-weight: bold; color: #465A64;'><%=data.name %></p>"+
                                                                    // "<p style='color: #465A64; font-size: small;''>Speed:<%=data.speed %>km/h</p>";
                                                                    var name12 =
                                                                        '<div class="container" style="width: 100%; height: auto; ">' +
                                                                        '<div class="row">' +
                                                                        '<div class="col-md-12">' +
                                                                        '<p style="font-weight: bold; color:#000;text-align:center">' +
                                                                        '<?= $value['name']; ?>' +
                                                                        '</p>' +
                                                                        '<p id="<%= j %>" style="color: #465A64; font-size: small;">' +
                                                                        'samad' +
                                                                        '</p>' +
                                                                        '<div class="row">' +
                                                                        '<div class="col-md-12">' +
                                                                        '<label for="" style="width: 33.33%; font-size: 12px; color:#000">' +
                                                                        'Odometer :' +
                                                                        '</label>' +
                                                                        '<span style="color: #000;" id="odoo">' +
                                                                        '21,528.8 mi' +
                                                                        '</span>' +
                                                                        '</div>' +
                                                                        '<div class="col-md-12">' +
                                                                        '<label for=""style="width: 33.33%; font-size: 12px;  color:#000">' +
                                                                        'Speed :' +
                                                                        '</label>' +
                                                                        '<span style="color: #000;">' +
                                                                        '<?= $value['speed']; ?> km/h' +
                                                                        '</span>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>';
                                                                    var lng = "<?= $value['lng']; ?>";
                                                                    var carName = "<?= $value['name']; ?>";
                                                                    var speed = "<?= $value['speed']; ?>";
                                                                    //console.log(lat+","+lng+","+name1);
                                                                    arr.push({
                                                                        val: lat + "," + lng + "," + name12,
                                                                        text: lat + "," + lng
                                                                    });
                                                                    arr2.push([name12, lat, lng, id, carName, speed], );


                                                                    function set(lat, lng) {

                                                                        map.setCenter(new google.maps.LatLng(lat, lng));

                                                                    }
                                                                    // console.log(arr);
                                                                    </script>
                                                                    <?php $i++;} 
                                                                    ?>

                                                                </div>




                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>





                                            </div>

                                        </div>
                                    </div>
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
    <script src="assets/js/elements/custom-search.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
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


        const geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        // const image = "/car_stopped.png";
        const image = "images/car_stopped.png";
        const fimage = "images/car_travelling.png";


        function createMarker(latlng, html, id1, carName, lat, lng, speed) {

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
        }





    }
    //         setTimeout(function(){
    //     location.reload();
    // }, 1000*21);
    </script>
    <!-- <script>

        let map;

        function initMap() {
            
            
            var locations = [
                ['Bondi Beach', -33.890542, 151.274856, 4],
                ['Coogee Beach', -33.923036, 151.259052, 5],
                ['Cronulla Beach', -34.028249, 151.157507, 3],
                ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                ['Maroubra Beach', -33.950198, 151.259302, 1]
                ];

                    map = new google.maps.Map(document.getElementById("mapid"), {
                    center: { lat: 24.860966, lng: 66.990501 },
                     zoom: 8,
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                
            for (var i = 0; i < arr2.length; i++) {
                gmarkers[arr2[i][0]] =
                    createMarker(new google.maps.LatLng(arr2[i][1], arr2[i][2]), arr2[i][0], arr2[i][3], arr2[i][4],arr2[i][1],arr2[i][2],arr2[i][5]);
            }

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }

    </script> -->
    <script>
    // const api_url = "http://live.resq911.com.pk/ap12test/api/falcon.php?id=1333&accesskey=12345";
    // async function get_car_data() {
    //    const response = await fetch(api_url);
    //    const data = await response.json();
    //    console.log("json data of cars "+data);
    // }

    // get_car_data();

    // $.getJSON('http://live.resq911.com.pk/ap12test/api/falcon.php?id=1333&accesskey=12345', function(data) {
    //     // JSON result in `data` variable
    //    console.log("json data of cars "+data);

    // })
    //     $.get('http://live.resq911.com.pk/ap12test/api/falcon.php?id=1333&accesskey=12345', function (data) {
    //         console.log("json data of cars "+data);


    //     });
    // 
    </script>
    <!-- <script>
fetch('http://live.resq911.com.pk/ap12test/api/falcon.php?id=1333&accesskey=12345')
    .then(res => res.json())
    .then((out) => {
        console.log('Output: ', out);
}).catch(err => console.error(err));
</script> -->

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
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
    </script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>