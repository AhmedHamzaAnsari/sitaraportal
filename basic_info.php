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
    <title>Basic Info</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css">
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- toastr -->
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
        min-height: calc(100vh - 125px) !important;
    }

    .caret::before {
        content: none !important;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<style>
.select2-container--default .select2-selection--multiple {
    background-color: transparent;
    height: 46px !important
}



.a-box {
    display: inline-block;
    width: 240px;
    text-align: center;
}

.img-container {
    height: 230px;
    width: 200px;
    overflow: hidden;
    border-radius: 0px 0px 20px 20px;
    display: inline-block;
}

.img-container img {
    transform: skew(0deg, -13deg);
    height: 108px;
    margin: 48px -55px 0px -70px;
}

.inner-skew {
    display: inline-block;
    border-radius: 20px;
    overflow: hidden;
    padding: 0px;
    transform: skew(0deg, 13deg);
    font-size: 0px;
    margin: 30px 0px 0px 0px;
    background: #c8c2c2;
    height: 250px;
    width: 200px;
}

.text-container {
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    padding: 120px 20px 20px 20px;
    border-radius: 20px;
    background: #fff;
    margin: -120px 0px 0px 0px;
    line-height: 19px;
    font-size: 14px;
}

.text-container h3 {
    margin: 20px 0px 10px 0px;
    color: #04bcff;
    font-size: 18px;
}
</style>
<?php
include("config_indemnifier.php");
// session_start();
$userid = $_SESSION['userid'];
$driver = "SELECT * FROM driver_detail where user_id='$userid';";
$resultdriver = mysqli_query($db, $driver);

$users = "SELECT * FROM users where privilege='Cartraige';";
$resultusers = mysqli_query($db, $users);
$dev_id = $_GET["id"];

$vehi_tracker = "SELECT * FROM inlist_tracker where main_name='$dev_id';";
$result_vehi_tracker = mysqli_query($db, $vehi_tracker);


          $deviceid;
          $id_query="SELECT uniqueId,name FROM devices where name='$dev_id';";
          $result = $db->query($id_query);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $deviceid = $row["uniqueId"];
                //echo "id: " . $row["id"]. "<br>";
            }
            } else {
            echo "0 results";
            }

            // echo $deviceid;

$result = mysqli_query($db,"SELECT dv.*,dc.name,dd.name as driver_name,us.name as username FROM driver_vehicles as dv join devices as dc on dv.vehicle_id=dc.uniqueId join driver_detail as dd on dv.driver_id=dd.id JOIN users as us on us.id=dv.created_by where dv.vehicle_id='$deviceid' order by dv.id desc");
$result_users = mysqli_query($db,"SELECT ud.*,us.name,us.privilege FROM users_devices as ud inner join users as us on ud.users_id=us.id where ud.devices_id='$deviceid' and us.privilege='admin' or us.privilege='Cartraige'  order by id desc;");
$result_trackers = mysqli_query($db,"SELECT * FROM device_trackers where vehicle_id='$deviceid';");
$data = mysqli_fetch_array($result_trackers);

$info = mysqli_query($db,"SELECT * FROM devices where uniqueId='$deviceid';");
$info_data = mysqli_fetch_array($info); 

// mysqli_close($db);
?>

<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Basic Info</h3>
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


                <!-- CONTENT AREA -->


                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area br-4">
                            <div class="widget-one">



                                <div class="container-fluid my-4">
                                    <div class="widget-content widget-content-area vertical-line-pill">

                                        <div class="row mb-4 mt-3">
                                            <div class="col-sm-3 col-12">
                                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 text-center mx-auto"
                                                    id="v-line-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active mb-3  text-center"
                                                        id="v-line-pills-vehi_info-tab" data-toggle="pill"
                                                        href="#v-line-pills-vehi_info" role="tab"
                                                        aria-controls="v-line-pills-vehi_info"
                                                        aria-selected="false">Vehicle Info</a>

                                                    <a class="nav-link  mb-3  text-center" id="v-line-pills-profile-tab"
                                                        data-toggle="pill" href="#v-line-pills-profile" role="tab"
                                                        aria-controls="v-line-pills-profile"
                                                        aria-selected="false">API</a>
                                                    <?php if($_SESSION['prive']==='Admin'){?>
                                                    <a class="nav-link mb-3  text-center" id="v-line-pills-messages-tab"
                                                        data-toggle="pill" href="#v-line-pills-messages" role="tab"
                                                        aria-controls="v-line-pills-messages"
                                                        aria-selected="false">Cartraige </a>
                                                    <?php }?>
                                                    <a class="nav-link  mb-3" id="v-line-pills-home-tab"
                                                        data-toggle="pill" href="#v-line-pills-home" role="tab"
                                                        aria-controls="v-line-pills-home"
                                                        aria-selected="true">Drivers</a>



                                                </div>
                                            </div>

                                            <div class="col-sm-9 col-12">
                                                <div class="tab-content" id="v-line-pills-tabContent">

                                                    <div class="tab-pane fade show active" id="v-line-pills-vehi_info"
                                                        role="tabpanel" aria-labelledby="v-line-pills-vehi_info-tab">
                                                        <h4 class="mb-4">Vehicle Info</h4>

                                                        <blockquote class="blockquote mb-4">

                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="a-box">
                                                                            <div class="img-container">
                                                                                <div class="img-inner">
                                                                                    <div class="inner-skew">
                                                                                        <img
                                                                                            src="https://pngimg.com/uploads/truck/truck_PNG16269.png">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-container">
                                                                                <h3>Vehicle #</h3>
                                                                                <div>
                                                                                    <?php echo $info_data['name'];?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="a-box">
                                                                            <div class="img-container">
                                                                                <div class="img-inner">
                                                                                    <div class="inner-skew">
                                                                                        <img
                                                                                            src="https://cdn-icons-png.flaticon.com/512/84/84909.png">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-container">
                                                                                <h3>Chassis #</h3>
                                                                                <div>
                                                                                    hb78rqwr6q8.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="a-box">
                                                                            <div class="img-container">
                                                                                <div class="img-inner">
                                                                                    <div class="inner-skew">
                                                                                        <img
                                                                                            src="https://www.pngkey.com/png/full/301-3010864_car-engine-icon-png-engine-clipart-png.png">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-container">
                                                                                <h3>Engine #</h3>
                                                                                <div>
                                                                                    En78q67rqr8q
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>





                                                                </div>
                                                            </div>

                                                            <div class="container-fuild">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- <div id="radial-chart" class=""></div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </blockquote>

                                                    </div>
                                                    <div class="tab-pane fade " id="v-line-pills-profile"
                                                        role="tabpanel" aria-labelledby="v-line-pills-profile-tab">
                                                        <h4 class="mb-4">API Tagged</h4>

                                                        <blockquote class="blockquote mb-4">

                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <ul class="list-group task-list-group">

                                                                            <?php
                                                                                                    $i=1;
                                                                                                    while($row = mysqli_fetch_array($result_vehi_tracker)) {
                                                                                                
                                                                                                     


                                                                                                ?>
                                                                                                <?php if($row['status']==='1') {?>

                                                                            <li
                                                                                class="list-group-item list-group-item-action">
                                                                                <div class="n-chk">
                                                                                    <label
                                                                                        class="new-control switch s-success mr-2">
                                                                                        <input
                                                                                            id="toggle_<?php echo $row["id"]; ?>"
                                                                                            type="checkbox" checked=""
                                                                                            name=toggle value="<?php echo $row["id"]; ?>"
                                                                                            data-toggle="toggle"
                                                                                            data-off="Closed"
                                                                                            data-on="Open">


                                                                                        <span class="slider"></span>
                                                                                        <span
                                                                                            class="new-control-indicator ml-4"></span>
                                                                                        <span
                                                                                            class="ml-2"><?php echo $row["tracker"]; ?>
                                                                                        </span>



                                                                                    </label>
                                                                                </div>
                                                                            </li>
                                                                            <?php }else{?>

                                                                                <li
                                                                                class="list-group-item list-group-item-action">
                                                                                <div class="n-chk">
                                                                                    <label
                                                                                        class="new-control switch s-success mr-2">
                                                                                        <input
                                                                                            id="toggle_<?php echo $roe["id"]; ?>"
                                                                                            type="checkbox" name=toggle
                                                                                            value="<?php echo $row["id"]; ?>">


                                                                                        <span class="slider"></span>
                                                                                        <span
                                                                                            class="new-control-indicator ml-4"></span>
                                                                                        <span class="ml-2">al_shyma
                                                                                        </span>



                                                                                    </label>
                                                                                </div>
                                                                            </li>
                                                                            <?php }?>
                                                                            <?php
                                                                                                
                                                                                                    $i++;
                                                                                                    }
                                                                                                ?>

                                                                         

                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </blockquote>

                                                    </div>

                                                    <div class="tab-pane fade" id="v-line-pills-messages"
                                                        role="tabpanel" aria-labelledby="v-line-pills-messages-tab">

                                                        <h4 class="mb-4">Users </h4>


                                                        <blockquote class="blockquote mb-4">

                                                            <!-- <div class="container-fluid mb-4">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" id="add"
                                                                            data-toggle="modal"
                                                                            data-target="#cartraige_add">Add
                                                                            Cartraige</button>


                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">


                                                                        <!-- <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group row  mb-4">
                                                                                    <label for="colFormLabelSm"
                                                                                        class="col-sm-4 col-form-label col-form-label-sm text-center">Users
                                                                                        List </label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="selectpicker"
                                                                                            data-live-search="true"
                                                                                            data-width="100%"
                                                                                            name="users_id"
                                                                                            id="users_id">

                                                                                            <option value="">Select
                                                                                                Users</option>
                                                                                            <?php foreach($resultusers as $key => $value){ ?>
                                                                                            <option
                                                                                                value="<?= $value['id'];?>">
                                                                                                <?= $value['name']; ?>
                                                                                            </option>
                                                                                            <?php } 
                                                                                            ?>

                                                                                        </select>

                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                        </div>


                                                                        <div class="container" id='assign_driver_buttn'>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="submit"
                                                                                        class="btn btn-primary font-weight-bold mx-2"
                                                                                        name="users_assign_btn"
                                                                                        id="users_assign_btn"
                                                                                        value="SAVE"
                                                                                        style="float: right; ">




                                                                                </div>
                                                                            </div>
                                                                        </div> -->


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div
                                                                            class="admin-data-content layout-top-spacing">

                                                                            <div class="row layout-top-spacing"
                                                                                id="cancel-row">

                                                                                <div
                                                                                    class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                                                    <h4 class="mb-4">Current Allocation
                                                                                    </h4>
                                                                                    <div
                                                                                        class="widget-content widget-content-area br-6">
                                                                                        <table id="Users_table"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>S.NO</th>
                                                                                                    <th>User Name</th>

                                                                                                    <th
                                                                                                        id="driver_delt_buttn">
                                                                                                        Delete</th>

                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <script>
                                                                                                driver_lenght =
                                                                                                    '<%= driverlist.length %>';
                                                                                                </script>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row = mysqli_fetch_array($result_users)) {
                                                                                                
                                                                                                        if($row["name"]==='admin'){


                                                                                                ?>

                                                                                                <tr>
                                                                                                    <td><?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $row["name"]; ?>
                                                                                                    </td>

                                                                                                    <td class="">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24"
                                                                                                            height="24"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            class="feather feather-trash-2 text-dark warning">
                                                                                                            <polyline
                                                                                                                points="3 6 5 6 21 6">
                                                                                                            </polyline>
                                                                                                            <path
                                                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                            </path>
                                                                                                            <line
                                                                                                                x1="10"
                                                                                                                y1="11"
                                                                                                                x2="10"
                                                                                                                y2="17">
                                                                                                            </line>
                                                                                                            <line
                                                                                                                x1="14"
                                                                                                                y1="11"
                                                                                                                x2="14"
                                                                                                                y2="17">
                                                                                                            </line>
                                                                                                        </svg>
                                                                                                    </td>
                                                                                                </tr>

                                                                                                <?php }else{?>

                                                                                                <tr>
                                                                                                    <td><?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $row["name"]; ?>
                                                                                                    </td>

                                                                                                    <td class="">
                                                                                                        <a class="unassign_user"
                                                                                                            data-id='where users_id=<?php echo $row['users_id']; ?> and devices_id=<?php echo $row['devices_id']; ?>'
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Delete"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-trash-2 text-danger warning ">
                                                                                                                <polyline
                                                                                                                    points="3 6 5 6 21 6">
                                                                                                                </polyline>
                                                                                                                <path
                                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="11"
                                                                                                                    x2="10"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="11"
                                                                                                                    x2="14"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                            </svg></a>
                                                                                                    </td>
                                                                                                </tr>

                                                                                                <?php
                                                                                                }
                                                                                                    $i++;
                                                                                                    }
                                                                                                ?>


                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </blockquote>
                                                    </div>

                                                    <div class="tab-pane fade " id="v-line-pills-home" role="tabpanel"
                                                        aria-labelledby="v-line-pills-home-tab">

                                                        <h4 class="mb-4">Drivers</h4>


                                                        <blockquote class="blockquote mb-4">
                                                            <div class="container-fluid mb-4">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" id="add"
                                                                            data-toggle="modal"
                                                                            data-target="#zoomupModal">Add
                                                                            Driver</button>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">


                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group row  mb-4">
                                                                                    <label for="colFormLabelSm"
                                                                                        class="col-sm-4 col-form-label col-form-label-sm text-center">Drivers
                                                                                        List </label>
                                                                                    <div class="col-sm-4">
                                                                                        <select class="selectpicker"
                                                                                            data-live-search="true"
                                                                                            data-width="100%"
                                                                                            name="driver_id"
                                                                                            id="driver_id">

                                                                                            <option value="">Select
                                                                                                Driver</option>
                                                                                            <?php foreach($resultdriver as $key => $value){ ?>
                                                                                            <option
                                                                                                value="<?= $value['id'];?>">
                                                                                                <?= $value['name']; ?>
                                                                                            </option>
                                                                                            <?php } 
                                                                                            ?>

                                                                                        </select>

                                                                                        <input type="hidden" name=""
                                                                                            value='<?php echo $deviceid;?>'
                                                                                            id='device_id'>
                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                        </div>


                                                                        <div class="container" id='assign_driver_buttn'>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="submit"
                                                                                        class="btn btn-primary font-weight-bold mx-2"
                                                                                        name="driver_assign_btn"
                                                                                        id="driver_assign_btn"
                                                                                        value="SAVE"
                                                                                        style="float: right; ">




                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div
                                                                            class="admin-data-content layout-top-spacing">

                                                                            <div class="row layout-top-spacing"
                                                                                id="cancel-row">

                                                                                <div
                                                                                    class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                                                    <h4 class="mb-4">Current Allocation
                                                                                    </h4>
                                                                                    <div
                                                                                        class="widget-content widget-content-area br-6">
                                                                                        <table id="Driver_table"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>S.NO</th>
                                                                                                    <th>Driver ID</th>
                                                                                                    <th>Driver Name</th>
                                                                                                    <th>Created By</th>
                                                                                                    <th>Created On</th>
                                                                                                    <th
                                                                                                        id="driver_delt_buttn">
                                                                                                        Delete</th>

                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <script>
                                                                                                driver_lenght =
                                                                                                    '<%= driverlist.length %>';
                                                                                                </script>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row = mysqli_fetch_array($result)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $row["driver_id"]; ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $row["driver_name"]; ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $row["username"]; ?>
                                                                                                    </td>
                                                                                                    <td><?php echo $row["created_on"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a class="delete_driver"
                                                                                                            data-id='<?php echo $row['id']; ?>'
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Delete"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-trash-2 text-danger warning ">
                                                                                                                <polyline
                                                                                                                    points="3 6 5 6 21 6">
                                                                                                                </polyline>
                                                                                                                <path
                                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="11"
                                                                                                                    x2="10"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="11"
                                                                                                                    x2="14"
                                                                                                                    y2="17">
                                                                                                                </line>
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

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </blockquote>
                                                    </div>




                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>


                    <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:#000" id="title_edit">Add Drivers</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x">
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
                                                            <label for="inputEmail4">Name</label>
                                                            <input type="text" class="form-control" id="cname"
                                                                name="cname" placeholder="Enter Name">
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">CNIC</label>
                                                            <input type="text" class="form-control" id="d_cnic"
                                                                name="d_cnic" placeholder="Enter CNIC">
                                                        </div>


                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Mobile No</label>
                                                            <input type="text" class="form-control" id="d_no"
                                                                name="d_no" placeholder="Enter Mobile No">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Privilage</label>
                                                            <select type="text" class="form-control" id="d_pri"
                                                                name="d_pri" placeholder="Enter Mobile No">
                                                                <option></option>
                                                                <option value='0'>Driver</option>
                                                                <option value='1'>Driver Helper</option>
                                                            </select>
                                                        </div>



                                                        <input type="hidden" name="employee_id" id="employee_id">
                                                    </div>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="submit" class="btn btn-primary"
                                                                    name="insert" id="insert" value="Insert"
                                                                    style="float:right" />

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

                    <!-- ---------------------add cartraige--------------------- -->

                    <div id="cartraige_add" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:#000" id="title_edit">Add Cartraige</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container my-4">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <form method="post" id="cartraige_form" enctype="multipart/form-data">
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Username</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Enter Username" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword4">Email</label>
                                                            <input type="email" class="form-control" id="email_c"
                                                                name="email" placeholder="Enter Email" required>
                                                        </div>

                                                        <div class="form-group col-md-6  ">

                                                            <label for="" class="lab"> Enter
                                                                Password</label>
                                                            <input type="password" id="password" required minlength="8"
                                                                class="form-control input" placeholder="Enter Password">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                id="togglePassword" class="feather feather-eye"
                                                                style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </div>


                                                        <div class="form-group col-md-6 ">

                                                            <label for="" class="lab"> Confirm Password</label>
                                                            <input type="password" id="confirm_password"
                                                                name="confirm_password" required minlength="8"
                                                                class="form-control input"
                                                                placeholder="Confirm Password">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                id="togglePassword1" class="feather feather-eye"
                                                                style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>



                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword4">Contact No</label>
                                                            <input type="text" class="form-control" id="number"
                                                                name="number" placeholder="Enter Contact No" required>
                                                        </div>

                                                        <!-- <div class="form-group col-md-6">
                                                            <label for="inputAddress">Role</label>

                                                            <select id="role" name="role"
                                                                class="form-control selectpicker">
                                                                <option selected>Choose...</option>
                                                                <option value="admin_user">Admin User</option>
                                                                <option value="viewer">viewer</option>


                                                            </select>
                                                        </div> -->

                                                    </div>

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-primary  font-weight-bold mx-2"
                                                                    name="submit" type="submit"
                                                                    style="float: right; ">SAVE</button>
                                                                <a class="btn mx-2" href="manageusers.php"
                                                                    style="float: right;">CANCEL</a>

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
        <script src="assets/js/components/notification/custom-snackbar.js"></script>
        <script src="plugins/notification/snackbar/snackbar.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <!--  BEGIN CUSTOM SCRIPTS FILE  -->
        <script src="assets/js/components/notification/custom-snackbar.js"></script>

        <script>
        $('input[name=toggle]').change(function() {
            var mode = $(this).prop('checked');
            console.log("hamza " + mode)
            var col_name = $(this).val();

            var url_str = (window.location).href;
            let url = new URL(url_str);
            let search_params = url.searchParams;
            var vehicle_id = search_params.get('id');
            // var stringArray = id.split(/(\s+)/);

            // console.log(stringArray[2]);
            // var record_id = stringArray[2];
            // var col_name = stringArray[0];
            alert(col_name);

            var confirmalert = confirm("Are you sure to update status?");
            if (confirmalert == true) {
                // AJAX Request
                $.ajax({
                    type: 'POST',
                    // dataType: 'JSON',
                    url: 'update_trackers.php',
                    data: {
                        mode: mode,
                        col_name: col_name
                    },
                    success: function(data) {
                        Snackbar.show({
                            text: '' + data + ' Successfully.',
                            pos: 'top-right'
                        });


                        // $("#heading").html(success);
                        // $("#body").html(response_result);
                    }
                });
            }
            else{
                $("#toggle_"+col_name+"").prop("checked",true);
            }

        });
        </script>

        <script>
        $(document).ready(function() {

            $('#insert_form').on("submit", function(event) {
                event.preventDefault();
                if ($('#cname').val() == "") {
                    alert("Driver name is required");

                } else if ($('#d_cnic').val() == "") {
                    alert("Driver CNIC is required");

                } else if ($('#d_no').val() == "") {
                    alert("Driver Mobile no is required");

                } else if ($('#d_pri').val() == "") {
                    alert("Driver privilage is required");

                } else {
                    $.ajax({
                        url: "ajax_edit/insert_driver.php",
                        method: "POST",
                        data: $('#insert_form').serialize(),
                        beforeSend: function() {
                            $('#insert').val("Inserting");
                        },
                        success: function(data) {
                            console.log(data)
                            if (data != "") {
                                data = JSON.parse(data)
                                console.log();
                                $('#insert_form')[0].reset();
                                $('#zoomupModal').modal('hide');
                                // $('.selectpicker').selectpicker('refresh');
                                $("#driver_div").load(" #driver_div");


                                Snackbar.show({
                                    text: 'Driver Create Successfully.',
                                    pos: 'top-right'
                                });

                                $("#driver_id").append('<option value="' + data.id + '">' +
                                    data.name + '</option>');
                                $("#driver_id").selectpicker("refresh");
                                // $("#driver_id").val(data.id);

                            } else {
                                $('#insert').val("Insert");

                                alert(data);
                            }



                            //    $("#html5-extension").load(" #html5-extension");
                            //    window.location.reload();

                        }
                    });
                }
            });

            $('#cartraige_form').on("submit", function(event) {
                event.preventDefault();
                if ($('#name').val() == "") {
                    alert("Cartraige name is required");

                } else if ($('#email_c').val() == "") {
                    alert("Cartraige Email is required");

                } else if ($('#password').val() == "") {
                    alert("Cartraige Mobile no is required");

                } else if ($('#number').val() == "") {
                    alert("Cartraige Number is required");

                } else {
                    $.ajax({
                        url: "ajax_edit/insert_cartaige.php",
                        method: "POST",
                        data: $('#cartraige_form').serialize(),
                        beforeSend: function() {
                            $('#insert_c').val("Inserting");
                        },
                        success: function(data) {
                            console.log(data)
                            if (data == 1) {
                                $('#cartraige_form')[0].reset();
                                $('#cartraige_add').modal('hide');
                                // $('.selectpicker').selectpicker('refresh');
                                // $("#driver_div").load(" #driver_div");

                                Snackbar.show({
                                    text: 'Cartraige Create Successfully.',
                                    pos: 'top-right'
                                });
                            } else {
                                $('#insert_c').val("Insert");

                                alert(data);
                            }



                            //    $("#html5-extension").load(" #html5-extension");
                            //    window.location.reload();

                        }
                    });
                }
            });


            $('#driver_assign_btn').on("click", function(event) {
                event.preventDefault();

                // var url_str = (window.location).href;
                // let url = new URL(url_str);
                // let search_params = url.searchParams;
                var vehicle_id = $('#device_id').val();
                if ($('#driver_id').val() == "") {
                    alert("Driver name is required");

                } else {
                    $.ajax({
                        url: "ajax_edit/assign_driver.php",
                        method: "POST",
                        data: {
                            driver_id: $('#driver_id').val(),
                            vehicle_id: vehicle_id
                        },
                        beforeSend: function() {
                            $('#driver_assign').val("Inserting");
                        },
                        success: function(data) {
                            console.log(data)
                            if (data == 1) {
                                // $('#driver_id').selectpicker('refresh');
                                Snackbar.show({
                                    text: 'Driver Assign to vehicle Successfully.',
                                    pos: 'top-right'
                                });
                                $("#Driver_table").load(" #Driver_table");
                            } else {
                                $('#insert').val("Insert");

                                alert(data);
                            }



                            //    $("#html5-extension").load(" #html5-extension");
                            //    window.location.reload();

                        }
                    });
                }
            });


            $('#users_assign_btn').on("click", function(event) {
                event.preventDefault();

                var url_str = (window.location).href;
                let url = new URL(url_str);
                let search_params = url.searchParams;
                var vehicle_id = search_params.get('id');
                if ($('#users_id').val() == "") {
                    alert("Driver name is required");

                } else {
                    $.ajax({
                        url: "ajax_edit/assign_vehi_users.php",
                        method: "POST",
                        data: {
                            user_id: $('#users_id').val(),
                            vehicle_id: vehicle_id
                        },
                        beforeSend: function() {
                            $('#users_assign_btn').val("Inserting");
                        },
                        success: function(data) {
                            console.log(data)
                            if (data == 1) {
                                // $('#driver_id').selectpicker('refresh');
                                $('#users_assign_btn').val("SAVE");
                                $("#Users_table").load(" #Users_table");

                                Snackbar.show({
                                    text: 'Users Assign to vehicle Successfully.',
                                    pos: 'top-right'
                                });
                            } else {
                                $('#insert').val("Insert");

                                alert(data);
                            }



                            //    $("#html5-extension").load(" #html5-extension");
                            //    window.location.reload();

                        }
                    });
                }
            });


            $('.delete_driver').click(function() {
                var el = this;

                // Delete id
                var deleteid = $(this).data('id');
                //alert(deleteid)

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'ajax_edit/delete_driver.php',
                        type: 'POST',
                        data: {
                            id: deleteid
                        },
                        success: function(response) {

                            if (response == 1) {
                                // Remove row from HTML Table
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                    Snackbar.show({
                                        text: 'Record Delete Successfully.',
                                        pos: 'top-right'
                                    });

                                });

                            } else {
                                alert('Invalid ID.');
                            }

                        }
                    });
                }

            });

            $('.unassign_user').click(function() {
                var el = this;

                // Delete id
                var deleteid = $(this).data('id');
                //alert(deleteid)

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'ajax_edit/unassign_user.php',
                        type: 'POST',
                        data: {
                            id: deleteid
                        },
                        success: function(response) {

                            if (response == 1) {
                                // Remove row from HTML Table
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                    Snackbar.show({
                                        text: 'Record Delete Successfully.',
                                        pos: 'top-right'
                                    });

                                });

                            } else {
                                console.log(response)
                                alert('Invalid ID.');
                            }

                        }
                    });
                }

            });


        });
        </script>


        <script>
        $(document).ready(function() {
            App.init();
        });
        </script>
        <script src="plugins/highlight/highlight.pack.js"></script>
        <script src="assets/js/custom.js"></script>

        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>


        <script src="assets/js/scrollspyNav.js"></script>
        <script src="plugins/select2/select2.min.js"></script>
        <script src="plugins/select2/custom-select2.js"></script>
        <script src="plugins/treeview/custom-jstree.js"></script>

        <script src="plugins/apex/apexcharts.min.js"></script>
        <!-- <script src="plugins/apex/custom-apexcharts.js"></script> -->
        <script>
        var radialChart = {
            chart: {
                height: 350,
                type: 'radialBar',
                toolbar: {
                    show: false,
                }
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Trip',
                            formatter: function(w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
            series: [44, 55, 67],
            labels: ['Total Trips', 'Completed', 'Incompleted'],
        }

        var chart = new ApexCharts(
            document.querySelector("#radial-chart"),
            radialChart
        );

        chart.render();
        </script>



        <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        </script>
        <script>
        const togglePassword1 = document.querySelector('#togglePassword1');
        const password1 = document.querySelector('#confirm_password');

        togglePassword1.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        </script>
        <script>
        var password2 = document.getElementById("password"),
            confirm_password2 = document.getElementById("confirm_password");

        function validatePassword() {
            if (password2.value != confirm_password2.value) {
                confirm_password2.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password2.setCustomValidity('');
            }
        }
        password2.onchange = validatePassword;
        confirm_password2.onkeyup = validatePassword;
        </script>
        <!--  BEGIN CUSTOM SCRIPTS FILE  -->





        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>