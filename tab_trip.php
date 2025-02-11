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
    <title>Manage Trip</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />


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

    .edits:hover {
        cursor: pointer;
        color: green;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        height: 185px;
        color: #000;
        background-color: #edf5f4;
        /* border: 1px solid green; */
    }

    .nav-pills .nav-link {
        height: 160px;

    }

    i.fa {
        display: inline-block;
        border-radius: 60px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;

    }

    #style-4::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    #style-4::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    #style-4::-webkit-scrollbar-thumb {
        background-color: gray;
        border: 2px solid #555555;
    }

    #myInput {
        background-image: url('images/search.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        border: none;
        border-bottom: 1px solid;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$users_test = mysqli_query($db,"SELECT * FROM users");
// $result = "SELECT tc_users.name,tc_users.email,users.privilege,users.login,users.description\n"

//     . "FROM tc_users\n"

//     . "INNER JOIN users ON tc_users.id=users.id";


?>

<body class="sidebar-noneoverflow starterkit">
<div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>History Trip</h3>
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
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Type here to search">
                        </div>
                    </form>
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
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> <span>My Profile</span>
                            </a>
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
                <script>
                var markersArray = [];
                var flightPlanCoordinates = [];
                </script>

                <!-- CONTENT AREA -->


                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="container-fluid mt-4">
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <a href="addusers.php"> <button class="btn btn-primary">ACTIVE TRIP</button>
                                        </a>

                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Date</label>
                                            <input type="date" class="form-control" id="name_date" name="name" placeholder="Select date" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-primary " style="margin-top:30px " onclick="go_route()">Get</button>
                                        </div>
                                    </div>

                                    </div>

                                    <script>
                                        
                                        function go_route(){
                                            var date = document.getElementById("name_date").value;
                                            // alert(date)

                                            if(date===""){
                                                alert("Please Select date");
                                            }
                                            else{
                                                window.location.href = 'tab_trip.php?date='+date; 
                                            }

                                        }
                                    </script>
                                </div>
                                <div class="row mb-4 mt-3">
                                    <?php include_once("tab.php"); ?>
                                    <div class="col-sm-3 col-12 scrollbar" id="style-4"
                                        style="height:70vh;overflow:auto">
                                        <input type="text" id="myInput" 
                                            placeholder="Search Vehicle..." title="Type in a name">
                                        <div class="nav flex-column nav-pills mb-sm-0 mb-3 text-center mx-auto"
                                            id="v-line-pills-tab" role="tablist" aria-orientation="vertical">

                                            <?php echo $category_html; ?>

                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12" id="style-4" style="height:70vh;overflow:auto">
                                        <div class="tab-content" id="v-line-pills-tabContent">

                                            <?php echo $product_html; ?>

                                            <div class="col-md-12">
                                                <div id="map" style="width: 100%; height: 100vh;" class="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3"></div> -->

                                </div>
                            </div>
                        </div>





                        <!-- CONTENT AREA -->

                    </div>
                    <!-- <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div> -->
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

            <script src="plugins/treeview/custom-jstree.js"></script>
            <script src="assets/js/scrollspyNav.js"></script>
            <script src="plugins/highlight/highlight.pack.js"></script>

            <script>
            let map;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 30.3753,
                        lng: 69.3451
                    },
                    zoom: 8,
                });
            }
            </script>
            <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#v-line-pills-tab a").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });

            var url_string = window.location.href;
                var url = new URL(url_string);
                var c = url.searchParams.get("date");
                $('#name_date').val(c);
            </script>
            <!-- END GLOBAL MANDATORY SCRIPTS -->
            <script>
            function open_new_win(name,trip_id) {
                // alert(name)
                window.open("tab_run.php?id=" + name+"&trip="+trip_id, "_blank",
                    "location=yes,height=570,width=520,scrollbars=yes,status=yes");
            }
            </script>
            <script>
            function my_markers(name,consignee_name) {
                // alert("Running " + name);
                var trip_id = name;
                deleteMarkers();

                $.ajax({
                    url: 'get_trip_position.php',
                    type: 'POST',
                    data: {
                        check: name
                    },
                    success: function(data) {
                        data = JSON.parse(data)

                        console.log(data)
                        var len = data.length;
                        //alert("len "+len)
                        for (var i = 0; i <= len; i++) {
                            var name = data[i][0];
                            var lat = data[i][1];
                            var lng = data[i][2];
                            console.log(lat + " " + lng)
                            var coordinate = data[i][3];
                            var time = data[i][4];
                            var myArr = coordinate.split(",");
                            var pos_lat = myArr[0];
                            var pos_lng = myArr[1];

                            setMarker_users(lat, lng, name, 'altitude', trip_id, time)
                            setMarker_pos(pos_lat, pos_lng, 2, name, consignee_name, 'vlocation', 'time')

                            
                            // flightPlanCoordinates.push({lat: lat,lng: lng});
                            // flightPlanCoordinates.push({lat: pos_lat,lng: pos_lng});
                            // console.log(flightPlanCoordinates);

                        }




                    }
                });

            }



            function setMarker_users(lat, lng, device_id, vehicle_name, trip_id, time) {
                //removeMarker(markerId);
                ids = device_id;


                const image = "images/icon/car_icon_blue.png";
                const fimage = "images/icon/car_icon_green.png";
                const nr = "images/icon/car_red.png";

                // var server_time = moment(last_time).format('MM/DD/YYYY hh:mm A');
                // var current_time = moment().format('MM/DD/YYYY hh:mm A');
                // var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                // var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                // var diffDays = b.diff(a, 'minutes');
                // alert(diffDays ) ;

                const mark = fimage;

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
                var latLng = marker.getPosition(); // returns LatLng object
                // map.setCenter(latLng);
                map.setZoom(6);
                map.panTo(latLng);
                markersArray.push(marker);


                // const flightPath = new google.maps.Polyline({
                //     path: flightPlanCoordinates,
                //     geodesic: true,
                //     strokeColor: "#FF0000",
                //     strokeOpacity: 1.0,
                //     strokeWeight: 2,
                // });

                // flightPath.setMap(map);
                // allMyMarkers.push( marker );

                // var index = map.markers.length;
                // map.markers.push(marker /* new Point(map.markers.length, location.lat(), location.lng())*/ );
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
                    content: '<p>Details:' + '<p>Vehical # :' + device_id + '</p>' + '<p>Trip ID # :' +
                        trip_id +
                        '</p>' + '<p>Last:' + time + '</p>'
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }

            function setMarker_pos(lat, lng, speeds, device_id, consignee_name, location, last_time) {
                //removeMarker(markerId);
                ids = device_id;
                // alert("Saa"+vehicle_name)
                var speed = speeds;



                const image = "images/pump.png";
                const fimage = "images/pump.png";
                const nr = "images/pump.png";
                // const mark = (speed > 0) ? fimage : image;
                var diffDays = 20;

                // var server_time = moment(last_time).format('MM/DD/YYYY hh:mm A');
                // var current_time = moment().format('MM/DD/YYYY hh:mm A');
                // var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                // var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                // var diffDays = b.diff(a, 'minutes');
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
                // var latLng = marker.getPosition(); // returns LatLng object
                // map.setCenter(latLng);
                markersArray.push(marker);
                // allMyMarkers.push( marker );

                // var index = map.markers.length;
                // map.markers.push(marker /* new Point(map.markers.length, location.lat(), location.lng())*/ );
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
                    content: '<p>Details:' + '<p>Name # :' + consignee_name + '</p>' 
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }



            function setMapOnAll(map) {
                for (let i = 0; i < markersArray.length; i++) {
                    markersArray[i].setMap(map);
                }
            }

            function deleteMarkers() {
                hideMarkers();
                markersArray = [];
            }

            function hideMarkers() {
                setMapOnAll(null);
            }
            </script>
            <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

            <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
<?php echo $modal_zoom; ?>


<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>