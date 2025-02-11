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
    <title>SITARA</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" class="dashboard-sales" />
    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="assets/css/elements/custom-tree_view.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/search.css" rel="stylesheet" type="text/css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>
    <link href="assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">


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
            min-height: calc(100vh - 125px)!important;
        }

        @font-face {
            font-family: myFirstFont;
            src: url(sansation_light.woff);
        }
        .widget-account-invoice-two{
            background-image: 0;
            background: #fff !important;
        }
        .component-card_3 .card-body{
            background: #1b1650;
            border-radius: 10px;
        }
        .component-card_3 .card-body h5.card-user_name{
            color: #f47621;
        }
        .navbar .navbar-item.search-ul{
            margin-left: auto;
            margin-right: 0;
        }
        .widget-one_hybrid.widget-followers{
            background: #fff;
        }
        .widget-one_hybrid.widget-referral{
            background: #fff;

        }
        .widget-one_hybrid.widget-engagement{
            background: #fff;

        }
        .file-tree li.file-tree-folder::before{
            content: url(data:image/svg+xml <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="%232b50ed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>);



        }
        .searchable-container .searchable-items{
                 overflow-x: hidden;
        }
        .filtered-list-search{
            margin-top:30px;
        }
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .searchable-items{
            border:none;
            padding: 0;
            
                
        }
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .numPlate{
            
    padding: 10px 40px;
    font-size: 20px;
    border: 2px solid #000;
    border-radius: 5px;
    background-color: #F7CE35;
    font-weight: bold;
        }

    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
</head>
<?php
include("config_indemnifier.php");
$id = $_GET['id'];
$qry = mysqli_query($db,"SELECT * FROM `positions` where device_id='$id' order by id DESC limit 1"); // select query
$data11 = mysqli_fetch_array($qry); 

?>
<body class="sidebar-noneoverflow starterkit">
    <script>
        var arr2 =[];
    </script>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Live Map</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

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
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg><span class="badge badge-primary"></span>
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
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
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
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                        <!-- <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="assets/img/profile-7.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5>Alan Green</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="dropdown-item">
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>My Profile</span>
                            </a>
                        </div>
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
                            <a href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
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

            <div class="container-fluid">
            
                <div class="row">
                    <div class="col-md-3" style="width: 350px;height: 100vh; overflow-y:auto ;position: absolute;   z-index: 1 ; background: #FFFFFF">
                        <div class="container mt-4 ">
                            <div class="row" style="display: flex;justify-content: center;">
                                    <p class="numPlate"> <?php echo $data11['altitude']?></p>
                            </div>
                        </div>
                        <div class="container-fluid mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-car  "aria-hidden="true"style="font-size: 20px; font-weight: 1; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                   <?php echo $data11['altitude']?>
                                    </p>
                                </div>
                                </div>
                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-city"aria-hidden="true"style="font-size: 20px; font-weight: 1; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;" id="locating">
                                   <?php echo $data11['vlocation']?>
                                    </p>
                                </div>
                                </div>
                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-tachometer-alt  "aria-hidden="true"style="font-size: 20px; font-weight: 1; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;" id="speeding">
                                   <?php echo $data11['speed']?> km/h
                                    </p>
                                </div>
                                </div>
                
                            </div>
                            
                            <div class="row mb-3">
                            <?php if ($data11['speed']>0) { ?>
                                <div class="col-md-2">
                                    <i class="fa fa-car text-success "aria-hidden="true"style="font-size: 20px; font-weight: 20; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                            Moving <span id="timmming">( <?php echo $data11['time']?> )</span> 
                                        </p>
                                    </div>
                                </div>
                                <?php } else { ?>
                                    <div class="col-md-2">
                                    <i class="fa fa-car text-danger "aria-hidden="true"style="font-size: 20px; font-weight: 20; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                            Parked <span id="timmming">( <?php echo $data11['time']?> )</span> 
                                        </p>
                                    </div>
                                </div>
                            <?php } ?> 
                                
                                                            <script>
                                                                var lat1 = "<?= $data11['latitude']; ?>";
                                                                var id = "<?= $data11['longitude']; ?>";
                                                                // var name1 = "<%=data.name %>";
                                                                var name1 = '<div class="container" style="width: 100%; height: auto; "><div class="row"><div class="col-md-12"><p style="font-weight: bold; color:#000;text-align:center"><?= $data11['altitude']; ?></p></div></div></div>';
                                                                var lng1 = "<?= $data11['longitude']; ?>";
                                                                var speed = "<?= $data11['speed']; ?>";
                                                                var round = Math.round(speed);
                                                                //console.log(lat+","+lng+","+name1);
                                                                // arr.push({ val: lat1 + "," + lng1 + "," + name1, text: lat1 + "," + lng1 });
                                                                arr2.push([name1, lat1, lng1, id, speed],);
                                                                // var attribute = "<%=data.attributes%>";
                                                                 
                                                                // var att = JSON.parse((JSON.stringify(attribute)));
                                                               // console.log("attributes==>"+attribute);
                                                                //  console.log("att"+att);
                                                                // var emileage = att.odometer;
                                                                // console.log("emile==>"+emileage);

                                                            </script>
                            </div>
                                                                               

                        </div>
                    </div>
                    <div class="col-md-12" style="padding:0 !important">
                        <div id="mapid" style="width: 100%; height: 100vh; z-index: 0;" class="">
                        </div>

                    </div>
                    <!-- <div class="col-md-3" style=" background: #FFFFFF;height:90vh;overflow:auto;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget-content widget-content-area">

                                  

                                    <div id="iconsAccordion" class="accordion-icons">
                                        <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#iconAccordionOne" aria-expanded="true" aria-controls="iconAccordionOne">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></div>
                                                        Tracker Details  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="iconAccordionOne" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <ul class="list-group">
                                                     <li class="list-group-item list-group-item-light">Tracker model 1 date</li>
                                                     <li class="list-group-item list-group-item-light">Tracker model 2 date</li>
                                                     <li class="list-group-item list-group-item-light">Tracker model 3 date</li>
                                                     <li class="list-group-item list-group-item-light">Tracker model 4 date</li>
                                                   
                                                </ul>
                                                </div>
                                            </div>
                                      </div>

                                        
                                    </div>

                                    
                                </div>
                                </div>
                            </div>
                            <div class="container-fluid mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-car text-success "aria-hidden="true"style="font-size: 20px; font-weight: 1; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                         Suzuki BMB-943
                                    </p>
                                </div>
                                </div>
                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-city   "aria-hidden="true"style="font-size: 20px; font-weight: 1; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                   Plot 70, Rohail Khand Society PECHS, Karachi, Karachi City, Sindh, Pakistan
                                    </p>
                                </div>
                                </div>
                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-tachometer-alt  "aria-hidden="true"style="font-size: 20px; font-weight: 1; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                         0 km/h
                                    </p>
                                </div>
                                </div>
                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <img src="images/chassis.png" alt="" srcset="" style="width:24px ">
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                         12345678
                                    </p>
                                </div>
                                </div>
                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-car text-danger "aria-hidden="true"style="font-size: 20px; font-weight: 20; "></i>
                                                                                            
                                </div>
                                <div class="col-md-10" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                         Parked
                                    </p>
                                </div>
                                </div>
                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                   <span>Last Payment</span>
                                                                                            
                                </div>
                                <div class="col-md-7" style="">
                                <div class=" ">
                                   <p class="vertical-center" style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                         22-07-2020
                                    </p>
                                </div>
                                </div>
                
                            </div>
                                                                               

                        </div>
                            <hr style="border-top:1px solid #000">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Complaints</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div id="donut-chart" class=""></div>

                                    
                                </div>
                                </div>
                            </div>
                        <hr style="border-top:1px solid #000">
                        <div class="row">
                                <div class="col-md-12">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Payments</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div id="s-line" class=""></div>

                                    
                                </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> -->
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
    <!-- <script src="plugins/apex/apexcharts.min.js"></script> -->
    <script src="assets/js/dashboard/dash_1.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="assets/js/elements/custom-search.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="assets/js/components/ui-accordions.js"></script>
    <script src="plugins/apex/apexcharts.min.js"></script>
    <!-- <script src="plugins/apex/custom-apexcharts.js"></script> -->

    <script>
        var donutChart = {
    chart: {
        height: 220,
        type: 'donut',
        toolbar: {
          show: false,
        }
    },
    dataLabels: {
        enabled: false
    },
    labels: [
        // 'idle',
        'Urgent',
        'Most Urgent',
        'General',
        
        

    ],
    series: [44, 55, 41],
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
    document.querySelector("#donut-chart"),
    donutChart
);

donut.render();
    </script>
    <script>
        var sline = {
  chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false,
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'straight'
  },
  series: [{
    name: "Desktops",
    data: [10, 41, 35, 51, 49, 62, 69, 91, 148,20]
  }],
  title: {
    text: 'Product Trends by Month',
    align: 'left'
  },
  grid: {
    row: {
      colors: ['#f1f2f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  xaxis: {
    categories: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019','2020'],
  }
}

var chart = new ApexCharts(
  document.querySelector("#s-line"),
  sline
);

chart.render();
    </script>


    <!-- <script>

let map;

function initMap() {
    const myLatLng = { lat: 24.8607, lng: 67.0011 };
  const map = new google.maps.Map(document.getElementById("mapid"), {
    zoom: 16,
    center: myLatLng,
  });
  const contentString = 'BMB-943';
  const infowindow = new google.maps.InfoWindow({
    content: contentString,
  });
  const marker = new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Uluru (Ayers Rock)",
  });
  marker.addListener("click", () => {
    infowindow.open(map, marker);
  });
}

</script> -->

<script>
let map;
     function initMap() {

// console.log(arr2);

gmarkers = [];
var lati = new google.maps.LatLng(lat1, lng1)
map = new google.maps.Map(document.getElementById("mapid"), {
    center: lati,
    zoom: 18,
});
// const panorama = new google.maps.StreetViewPanorama(
//     document.getElementById("pano"),
//     {
//         position: new google.maps.LatLng(lat1, lng1),
//         pov: {
//             heading: 34,
//             pitch: 10,
//         },
//     });
// map.setStreetView(panorama);

var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
const image = "images/car_icon_grey.png";
const fimage = "images/car_icon_blue.png";
const mark = (speed > 0) ? fimage : image;
function createMarker(latlng, html) {
    marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: mark
    });

    map.addListener('click', function (e) {
       // animatedMove(marker, .15, marker.position, e.latLng);
    });
    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(html);
        infowindow.open(map, marker);
    });
    google.maps.event.addListener(marker, 'mouseover', function () {
        infowindow.setContent(html);
        infowindow.open(map, marker);
    });
    google.maps.event.addListener(marker, 'mouseout', function () {
        infowindow.setContent(html);
        infowindow.close();
    });
    return marker;
}


createMarker(new google.maps.LatLng(lat1, lng1), name1);
var lati;
var lngi;
    setInterval(() => {
        //onsole.log(window.location.href);
        let url_str = window.location.href;

        let url = new URL(url_str);
        let search_params = url.searchParams;

        // get value of "id" parameter
        // "100"
        id = search_params.get('id');
        // $.get('data?id=' + id + '', function (data) {
        //     lati = data[0]['latitude'];
        //     lngi = data[0]['longitude'];
        //     var speed = data[0]['speed'];
        //     var attributes = data[0]['attributes'];
        //     console.log(attributes);
        //     var att = JSON.parse(attributes);
        //     var ignition = att.ignition;
        //     var odomE = att.odometer;
        //     lastOdometer=odomE;
        //     // console.log("last Odometer " +lastOdometer)
            
        //     if(ignition==false)
        //     {
        //         animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati, lngi));
        //     }
        //     /// console.log(data[0]['latitude'] + "," + data[0]['longitude'])
        //     else{
        //         animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati, lngi));
        //         map.setCenter(new google.maps.LatLng(lati, lngi));
        //     }
            
        //     //map.animateCamera(Ca)

        // }) 

        $.ajax({
                url: 'get_run_lat_lng.php',
                type: 'POST',
                data: {
                    check: id
                },
                success: function(data) {
                    data = JSON.parse(data)

                    lati = data.latitude;
                    lngi = data.longitude;
                    var location = data.vlocation;
                    console.log(lati);
                    var speed = data.speed;
                    var time = data.time;
                    
                    var ignition = data.power;
                    document.getElementById("speeding").innerHTML = speed +" km/hr";
                    document.getElementById("locating").innerHTML = location;
                    document.getElementById("timmming").innerHTML = time;
                    // console.log("last Odometer " +lastOdometer)
                    
                    if(ignition==false)
                    {
                        animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati, lngi));
                    }
                    /// console.log(data[0]['latitude'] + "," + data[0]['longitude'])
                    else{
                        animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati, lngi));
                        map.setCenter(new google.maps.LatLng(lati, lngi));
                    }
                    
                    // setMarker(data.latitude,data.longitude,data.speed,device_id,data.altitude,data.vlocation,data.record_creation_time)




                }
            });
  

            
            
    }, 1000*40);


}

function animatedMove(marker, t, current, moveto) {
        var lat = current.lat();
        var lng = current.lng();

        var deltalat = (moveto.lat() - current.lat()) / 100;
        var deltalng = (moveto.lng() - current.lng()) / 100;

        var delay = 10 * t;
        for (var i = 0; i < 100; i++) {
            (function (ind) {
                setTimeout(
                    function () {
                        var lat = marker.position.lat();
                        var lng = marker.position.lng();
                        lat += deltalat;
                        lng += deltalng;
                        latlng = new google.maps.LatLng(lat, lng);
                        marker.setPosition(latlng);
                    }, delay * ind
                );
            })(i)
        }
    }
</script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->
</html>