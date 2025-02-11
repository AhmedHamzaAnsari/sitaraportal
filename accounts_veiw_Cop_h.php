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
    <title>Manage Product Family</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">

    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />\
    <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />




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

    .modal-content .modal-body {
        padding: 0;
    }

    .modal-body {
        padding: 0;
    }

    .user-profile .widget-content-area .user-info img {
        box-shadow: none
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    include("config_indemnifier.php");

    $id = $_GET['id'];
    $table_doc = $_GET['table'];
    echo $table_doc;

    if($table_doc==="Corporate"){
        $table_doc = "corporate";
        $result = mysqli_query($db,"SELECT * FROM users_doc where table_name = '$table_doc' and table_user_id='$id'");
        
    }
    else if($table_doc==="Person"){
        $table_doc = "accperson";
        $result3 = mysqli_query($db,"SELECT * FROM users_doc where table_name = '$table_doc' and table_user_id='$id'");
    }
    else if($table_doc==="Insurance"){
        $table_doc = "accinsurance";
        $result2 = mysqli_query($db,"SELECT * FROM users_doc where table_name = '$table_doc' and table_user_id='$id'");
    }

    // $result = mysqli_query($db,"SELECT * FROM users_doc where table_name = '$table_doc'"); 
    $result_contact = mysqli_query($db,"SELECT * FROM `addperson` where mainid='$id'"); 

    $qry = mysqli_query($db,"select * from $table_doc where id = '$id'"); // select query
    $data = mysqli_fetch_array($qry);

    if(isset($_POST['submit6']))
{
    $main_id_doc = $_GET['id'];
    $table_doc = $_GET['table'];

    if($table_doc==="Corporate"){
        $table_doc = "corporate";
    }
    else if($table_doc==="Person"){
        $table_doc = "accperson";
    }
    else if($table_doc==="Insurance"){
        $table_doc = "accinsurance";
    }
    echo $table_doc;

    $user_doc = $_FILES['user_doc']['name'];
    $file_loc12 = $_FILES['user_doc']['tmp_name'];
    // $file_size = $_FILES['file']['size'];
    //  $file_type = $_FILES['file']['type'];
    $folder="uploads/";
    
    $i = 0;
    foreach ($user_doc as $user_docc) {
        //$file2 = rand(1000,100000)."-".$docbb[$i]['name'];

        move_uploaded_file($file_loc12[$i],$folder.$user_doc[$i]);
        $sql  = "INSERT INTO `users_doc`(`table_name`, `table_user_id`, `user_doc`) VALUES ('$table_doc','$main_id_doc','$user_docc')";
        if (mysqli_query($db, $sql)) {
            echo "<script>
            alert('New Record Created successfully..!');
            // window.location.href='manage_accounts_h.php
            
            </script>";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($db);
        }
    $i++;
    }
  
}

if(isset($_POST['submit5']))
{
    $main_id = $_GET['id'];
    $bname = $_POST['fname1'];
    // $bname2 = $_POST['lname1'];
    $email2 = $_POST['email1'];
    $phone2= $_POST['phone1'];
    $mobile2= $_POST['mobile1'];
    $nic2= $_POST['nic1'];
    $aphone2= $_POST['aphone1'];
    $fax2= $_POST['fax1'];
    $mail2= $_POST['mail1'];
    $ava2= $_POST['ava1'];
    $other2= $_POST['other1'];
    

    $sql  = "INSERT INTO addperson(fname,email,phone,mobile,nic,aphone,fax,mail,ava,other,mainid) 
    VALUES ('$bname','$email2','$phone2','$mobile2','$nic2','$aphone2','$fax2','$mail2','$ava2','$other2','$main_id')";
    // echo $sql;

    if (mysqli_query($db, $sql)) {
        echo "<script>
        alert('New Record Created successfully..!');
        // window.location.href='manage_accounts_h.php';
        </script>";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($db);
    }
  
}
?>



<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Accounts View</h3>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <form action="addCustomer.php" method="post"> -->
                                            <div class="form-row mb-3">
                                                <!-- class="form-control  basic" -->

                                                <div id="form1" style="display:none;" class="form">
                                                    <!-- <div>
                                                        array_shift
                                                    </div> -->
                                                </div>

                                                <div id="form2" style="display:none;" class="form">
                                                    <h3>Account (Corporate)</h3>
                                                    <div class="container-fluid mt-4">
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <div class="row">
                                                                    <div
                                                                        class="widget-content widget-content-area animated-underline-content">

                                                                        <ul class="nav nav-tabs  mb-3" id="animateLine1"
                                                                            role="tablist">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active"
                                                                                    id="animated-underline-home-tab1"
                                                                                    data-toggle="tab"
                                                                                    href="#animated-underline-home1"
                                                                                    role="tab"
                                                                                    aria-controls="animated-underline-home1"
                                                                                    aria-selected="true"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-home">
                                                                                        <path
                                                                                            d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                                                                        </path>
                                                                                        <polyline
                                                                                            points="9 22 9 12 15 12 15 22">
                                                                                        </polyline>
                                                                                    </svg> User Information</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    id="animated-underline-profile-tab1"
                                                                                    data-toggle="tab"
                                                                                    href="#animated-underline-profile1"
                                                                                    role="tab"
                                                                                    aria-controls="animated-underline-profile1"
                                                                                    aria-selected="false"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-user">
                                                                                        <path
                                                                                            d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                                        </path>
                                                                                        <circle cx="12" cy="7" r="4">
                                                                                        </circle>
                                                                                    </svg> User Documents</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    id="animated-underline-contact-tab1"
                                                                                    data-toggle="tab"
                                                                                    href="#animated-underline-contact"
                                                                                    role="tab"
                                                                                    aria-controls="animated-underline-contact"
                                                                                    aria-selected="false"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-phone">
                                                                                        <path
                                                                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                        </path>
                                                                                    </svg> Contact</a>
                                                                            </li>
                                                                        </ul>

                                                                        <div class="tab-content"
                                                                            id="animateLineContent-4">
                                                                            <div class="tab-pane fade show active"
                                                                                id="animated-underline-home1"
                                                                                role="tabpanel"
                                                                                aria-labelledby="animated-underline-home-tab1">

                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <p style="color:transparent">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, sit explicabo laudantium excepturi hic labore nihil repellat reprehenderit. Explicabo aperiam earum hic deleniti eos eum assumenda animi nesciunt distinctio iste.</p>
                                                                                            <div
                                                                                                class="user-profile layout-spacing " style="margin-top:-50px">
                                                                                                <div
                                                                                                    class="widget-content widget-content-area">
                                                                                                    <div
                                                                                                        class="d-flex justify-content-between">
                                                                                                        <h3 class="">
                                                                                                            Info</h3>
                                                                                                        <a href="#"
                                                                                                            class="mt-2 edit-profile">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-link">
                                                                                                                <path
                                                                                                                    d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="text-center user-info">
                                                                                                        <img src="images/round-account-button-with-user-inside.svg"
                                                                                                            alt="avatar"
                                                                                                            style="width:100px">
                                                                                                        <p class="">
                                                                                                            <?php echo $data['name'] ?>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="user-info-list">

                                                                                                        <div class="">
                                                                                                            <ul
                                                                                                                class="contacts-block list-unstyled">
                                                                                                                <li
                                                                                                                    class="contacts-block__item">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                        width="24"
                                                                                                                        height="24"
                                                                                                                        viewBox="0 0 24 24"
                                                                                                                        fill="none"
                                                                                                                        stroke="currentColor"
                                                                                                                        stroke-width="2"
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        class="feather feather-coffee">
                                                                                                                        <path
                                                                                                                            d="M18 8h1a4 4 0 0 1 0 8h-1">
                                                                                                                        </path>
                                                                                                                        <path
                                                                                                                            d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z">
                                                                                                                        </path>
                                                                                                                        <line
                                                                                                                            x1="6"
                                                                                                                            y1="1"
                                                                                                                            x2="6"
                                                                                                                            y2="4">
                                                                                                                        </line>
                                                                                                                        <line
                                                                                                                            x1="10"
                                                                                                                            y1="1"
                                                                                                                            x2="10"
                                                                                                                            y2="4">
                                                                                                                        </line>
                                                                                                                        <line
                                                                                                                            x1="14"
                                                                                                                            y1="1"
                                                                                                                            x2="14"
                                                                                                                            y2="4">
                                                                                                                        </line>
                                                                                                                    </svg>
                                                                                                                    <?php echo $data['website'] ?>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="contacts-block__item">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                        width="24"
                                                                                                                        height="24"
                                                                                                                        viewBox="0 0 24 24"
                                                                                                                        fill="none"
                                                                                                                        stroke="currentColor"
                                                                                                                        stroke-width="2"
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        class="feather feather-calendar">
                                                                                                                        <rect
                                                                                                                            x="3"
                                                                                                                            y="4"
                                                                                                                            width="18"
                                                                                                                            height="18"
                                                                                                                            rx="2"
                                                                                                                            ry="2">
                                                                                                                        </rect>
                                                                                                                        <line
                                                                                                                            x1="16"
                                                                                                                            y1="2"
                                                                                                                            x2="16"
                                                                                                                            y2="6">
                                                                                                                        </line>
                                                                                                                        <line
                                                                                                                            x1="8"
                                                                                                                            y1="2"
                                                                                                                            x2="8"
                                                                                                                            y2="6">
                                                                                                                        </line>
                                                                                                                        <line
                                                                                                                            x1="3"
                                                                                                                            y1="10"
                                                                                                                            x2="21"
                                                                                                                            y2="10">
                                                                                                                        </line>
                                                                                                                    </svg><?php echo $data['fax'] ?>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="contacts-block__item">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                        width="24"
                                                                                                                        height="24"
                                                                                                                        viewBox="0 0 24 24"
                                                                                                                        fill="none"
                                                                                                                        stroke="currentColor"
                                                                                                                        stroke-width="2"
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        class="feather feather-map-pin">
                                                                                                                        <path
                                                                                                                            d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                                                                        </path>
                                                                                                                        <circle
                                                                                                                            cx="12"
                                                                                                                            cy="10"
                                                                                                                            r="3">
                                                                                                                        </circle>
                                                                                                                    </svg><?php echo $data['address'] ?>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="contacts-block__item">
                                                                                                                    <a
                                                                                                                        href="mailto:example@mail.com"><svg
                                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                                            width="24"
                                                                                                                            height="24"
                                                                                                                            viewBox="0 0 24 24"
                                                                                                                            fill="none"
                                                                                                                            stroke="currentColor"
                                                                                                                            stroke-width="2"
                                                                                                                            stroke-linecap="round"
                                                                                                                            stroke-linejoin="round"
                                                                                                                            class="feather feather-mail">
                                                                                                                            <path
                                                                                                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                                                                                            </path>
                                                                                                                            <polyline
                                                                                                                                points="22,6 12,13 2,6">
                                                                                                                            </polyline>
                                                                                                                        </svg><?php echo $data['email'] ?></a>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="contacts-block__item">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                        width="24"
                                                                                                                        height="24"
                                                                                                                        viewBox="0 0 24 24"
                                                                                                                        fill="none"
                                                                                                                        stroke="currentColor"
                                                                                                                        stroke-width="2"
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        class="feather feather-phone">
                                                                                                                        <path
                                                                                                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                                                        </path>
                                                                                                                    </svg>
                                                                                                                    <?php echo $data['phone'] ?>
                                                                                                                </li>

                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>





                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div class="tab-pane fade"
                                                                                id="animated-underline-profile1"
                                                                                role="tabpanel"
                                                                                aria-labelledby="animated-underline-profile-tab"
                                                                                1>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <button
                                                                                                class="btn btn-outline-primary mb-2"
                                                                                                data-toggle="modal"
                                                                                                href="#add_doc1">Add
                                                                                                Documents</button>
                                                                                            <div class="modal fade"
                                                                                                id="add_doc1"
                                                                                                tabindex="-1"
                                                                                                role="dialog"
                                                                                                aria-labelledby="exampleModalTitle"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog "
                                                                                                    role="document">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="close"
                                                                                                                data-dismiss="modal"
                                                                                                                aria-label="Close">
                                                                                                                <svg aria-hidden="true"
                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                    width="24"
                                                                                                                    height="24"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-width="2"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    class="feather feather-x">
                                                                                                                    <line
                                                                                                                        x1="18"
                                                                                                                        y1="6"
                                                                                                                        x2="6"
                                                                                                                        y2="18">
                                                                                                                    </line>
                                                                                                                    <line
                                                                                                                        x1="6"
                                                                                                                        y1="6"
                                                                                                                        x2="18"
                                                                                                                        y2="18">
                                                                                                                    </line>
                                                                                                                </svg>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <form action=""
                                                                                                            method="post"
                                                                                                            enctype="multipart/form-data">
                                                                                                            <div
                                                                                                                class="modal-body">
                                                                                                                <div
                                                                                                                    class="container">
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-md-12">

                                                                                                                            <div
                                                                                                                                class="form-row mb-3">
                                                                                                                                <h6
                                                                                                                                    class="mt-3">
                                                                                                                                    Select
                                                                                                                                    Document
                                                                                                                                </h6>
                                                                                                                                <div
                                                                                                                                    class="form-group col-md-12">





                                                                                                                                    <input
                                                                                                                                        type="file"
                                                                                                                                        name="user_doc[]"
                                                                                                                                        id="user_doc"
                                                                                                                                        class="form-control"
                                                                                                                                        required
                                                                                                                                        multiple>


                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-footer">
                                                                                                                <button
                                                                                                                    class="btn"
                                                                                                                    data-dismiss="modal"><i
                                                                                                                        class="flaticon-cancel-12"></i>
                                                                                                                    Cancel</button>
                                                                                                                <button
                                                                                                                    class="btn btn-primary  font-weight-bold mx-2"
                                                                                                                    name="submit6"
                                                                                                                    type="submit"
                                                                                                                    style="float: right; ">SAVE</button>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="table-responsive mb-4 mt-4">
                                                                                                <?php
                                                                                            if (mysqli_num_rows($result) > 0) {
                                                                                            ?>
                                                                                                <table
                                                                                                    id="html5-extension"
                                                                                                    class="table table-hover non-hover"
                                                                                                    style="width:100%">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                S.No
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Documents
                                                                                                            </th>
                                                                                                            <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit
                                                                                                    </th> -->
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Delete
                                                                                                            </th>


                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                    $i=1;
                                                                                                    while($row = mysqli_fetch_array($result)) {
                                                                                                ?>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $i ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <a href="uploads/<?php echo $row["user_doc"]; ?>"
                                                                                                                    target="_blank">
                                                                                                                    <?php echo $row["user_doc"]; ?></a>
                                                                                                            </td>







                                                                                                            <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="accounts_edit_Cop_h.php?id=<?php echo $row['id']; ?>&table=<?php echo $row["privilege"];?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <svg data-id='<?= $row['id']; ?>'
                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                    width="24"
                                                                                                                    height="24"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-width="2"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    class="feather feather-trash-2 text-danger warning delete">
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
                                                                                                        <?php
                                                                                                    $i++;
                                                                                                    }
                                                                                                ?>


                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <?php
                                                                                            }
                                                                                            else{
                                                                                                echo "No result found";
                                                                                            }
                                                                                        ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade"
                                                                                id="animated-underline-contact"
                                                                                role="tabpanel"
                                                                                aria-labelledby="animated-underline-contact-tab">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <button
                                                                                                class="btn btn-outline-primary   mb-2"
                                                                                                data-toggle="modal"
                                                                                                href="#b_contact">Add
                                                                                                Contact</button>

                                                                                            <div data-backdrop="static"
                                                                                                class="modal fade bd-example-modal-xl"
                                                                                                id="b_contact"
                                                                                                tabindex="-1"
                                                                                                role="dialog"
                                                                                                aria-labelledby="exampleModalTitle"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog modal-xl"
                                                                                                    role="document">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="close"
                                                                                                                data-dismiss="modal"
                                                                                                                aria-label="Close">
                                                                                                                <svg aria-hidden="true"
                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                    width="24"
                                                                                                                    height="24"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-width="2"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    class="feather feather-x">
                                                                                                                    <line
                                                                                                                        x1="18"
                                                                                                                        y1="6"
                                                                                                                        x2="6"
                                                                                                                        y2="18">
                                                                                                                    </line>
                                                                                                                    <line
                                                                                                                        x1="6"
                                                                                                                        y1="6"
                                                                                                                        x2="18"
                                                                                                                        y2="18">
                                                                                                                    </line>
                                                                                                                </svg>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div class="modal-body"
                                                                                                            style="height:70vh ; overflow:auto">

                                                                                                            <div
                                                                                                                class="container">
                                                                                                                <div
                                                                                                                    class="row">
                                                                                                                    <div
                                                                                                                        class="col-md-12">
                                                                                                                        <div
                                                                                                                            class="container my-4">
                                                                                                                            <h4>Contact
                                                                                                                                Form
                                                                                                                            </h4>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div
                                                                                                                                    class="col-md-12">
                                                                                                                                    <form
                                                                                                                                        action=""
                                                                                                                                        method="post"
                                                                                                                                        enctype="multipart/form-data">
                                                                                                                                        <div
                                                                                                                                            class="form-row mb-3">
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                class="form-control"
                                                                                                                                                id="main_id"
                                                                                                                                                name="main_id"
                                                                                                                                                value="<?php echo $row["id"]; ?>"
                                                                                                                                                placeholder="Enter Name">
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6">
                                                                                                                                                <label
                                                                                                                                                    for="inputEmail4">Name</label>
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="fname1"
                                                                                                                                                    name="fname1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6  ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Email</label>
                                                                                                                                                <input
                                                                                                                                                    type="email"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="email1"
                                                                                                                                                    name="email1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required></svg>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Phone</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="phone1"
                                                                                                                                                    name="phone1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Mobile</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="mobile1"
                                                                                                                                                    name="mobile1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">NIC
                                                                                                                                                    #</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="nic1"
                                                                                                                                                    name="nic1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Alternate
                                                                                                                                                    Phone</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="aphone1"
                                                                                                                                                    name="aphone1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Fax</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="fax1"
                                                                                                                                                    name="fax1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Mailing
                                                                                                                                                    Address</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="mail1"
                                                                                                                                                    name="mail1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Availability
                                                                                                                                                    Timings</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="ava1"
                                                                                                                                                    name="ava1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="form-group col-md-6 ">
                                                                                                                                                <label
                                                                                                                                                    for=""
                                                                                                                                                    class="lab">Other
                                                                                                                                                    Address</label><input
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control"
                                                                                                                                                    id="other1"
                                                                                                                                                    name="other1"
                                                                                                                                                    placeholder="Enter Name"
                                                                                                                                                    required>
                                                                                                                                            </div>
                                                                                                                                            


                                                                                                                                        </div>

                                                                                                                                        <div
                                                                                                                                            class="container">

                                                                                                                                            <div
                                                                                                                                                class="row">

                                                                                                                                                <div
                                                                                                                                                    class="col-md-12">
                                                                                                                                                    <button
                                                                                                                                                        class="btn btn-primary  font-weight-bold mx-2"
                                                                                                                                                        name="submit5"
                                                                                                                                                        type="submit"
                                                                                                                                                        style="float: right; ">SAVE</button>


                                                                                                                                                </div>
                                                                                                                                            </div>

                                                                                                                                        </div>
                                                                                                                                    </form>

                                                                                                                                </div>


                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="modal-footer">
                                                                                                            <button
                                                                                                                class="btn"
                                                                                                                data-dismiss="modal"><i
                                                                                                                    class="flaticon-cancel-12"></i>
                                                                                                                Cancel</button>
                                                                                                            <!-- <button type="button" class="btn btn-primary">Send</button> -->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="table-responsive mb-4 mt-4">
                                                                                                <?php
                                                                                            if (mysqli_num_rows($result_contact) > 0) {
                                                                                            ?>
                                                                                                <table
                                                                                                    id="html5-extension1"
                                                                                                    class="table table-hover non-hover"
                                                                                                    style="width:100%">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                S.No
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Name
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Email
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Phone
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Mobile
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                CNIC
                                                                                                            </th>

                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Fax
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Mailing
                                                                                                                Address
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Availability
                                                                                                                Timings
                                                                                                            </th>

                                                                                                            <!-- <th
                                                                                                                class="text-center">
                                                                                                                Edit
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="text-center">
                                                                                                                Delete
                                                                                                            </th> -->


                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                    $i=1;
                                                                                                    while($row1 = mysqli_fetch_array($result_contact)) {
                                                                                                ?>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $i ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["fname"]; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["email"]; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["phone"]; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["mobile"]; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["nic"]; ?>
                                                                                                            </td>

                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["fax"]; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["mail"]; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <?php echo $row1["ava"]; ?>
                                                                                                            </td>








                                                                                                            <!-- <td
                                                                                                                class="text-center">
                                                                                                                <a href="accounts_edit_Cop_h.php?id=<?php echo $row['id']; ?>&table=<?php echo $row["privilege"];?>"
                                                                                                                    data-toggle="tooltip"
                                                                                                                    data-placement="top"
                                                                                                                    title="Edit"><svg
                                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                                        width="24"
                                                                                                                        height="24"
                                                                                                                        viewBox="0 0 24 24"
                                                                                                                        fill="none"
                                                                                                                        stroke="currentColor"
                                                                                                                        stroke-width="2"
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        class="feather feather-edit-2 text-success">
                                                                                                                        <path
                                                                                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                        </path>
                                                                                                                    </svg></a>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="text-center">
                                                                                                                <a onclick="return confirm('Are you sure to Delete this User ?');"
                                                                                                                    href="delete_users.php?id=<?php echo $row['id']; ?>&table=<?php echo $row["privilege"];?>"
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
                                                                                                            </td> -->



                                                                                                        </tr>
                                                                                                        <?php
                                                                                                    $i++;
                                                                                                    }
                                                                                                ?>


                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <?php
                                                                                            }
                                                                                            else{
                                                                                                echo "No result found";
                                                                                            }
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

                                                <div id="form3" style="display:none;" class=" form">
                                                    <h3>Account (Person) </h3>
                                                    <br>
                                                    <div class="container-fluid mt-4">


                                                        <div class="row">
                                                            <div
                                                                class="widget-content widget-content-area animated-underline-content">

                                                                <ul class="nav nav-tabs  mb-3" id="animateLine2"
                                                                    role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active"
                                                                            id="animated-underline-home-tab2"
                                                                            data-toggle="tab"
                                                                            href="#animated-underline-home2" role="tab"
                                                                            aria-controls="animated-underline-home2"
                                                                            aria-selected="true"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-home">
                                                                                <path
                                                                                    d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                                                                </path>
                                                                                <polyline
                                                                                    points="9 22 9 12 15 12 15 22">
                                                                                </polyline>
                                                                            </svg> User Information</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link"
                                                                            id="animated-underline-profile-tab2"
                                                                            data-toggle="tab"
                                                                            href="#animated-underline-profile2"
                                                                            role="tab"
                                                                            aria-controls="animated-underline-profile2"
                                                                            aria-selected="false"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-user">
                                                                                <path
                                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                                </path>
                                                                                <circle cx="12" cy="7" r="4"></circle>
                                                                            </svg> User Documents</a>
                                                                    </li>
                                                                    <!-- <li class="nav-item">
                                                                        <a class="nav-link"
                                                                            id="animated-underline-contact-tab"
                                                                            data-toggle="tab"
                                                                            href="#animated-underline-contact"
                                                                            role="tab"
                                                                            aria-controls="animated-underline-contact"
                                                                            aria-selected="false"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-phone">
                                                                                <path
                                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                </path>
                                                                            </svg> Contact</a>
                                                                    </li> -->
                                                                </ul>

                                                                <div class="tab-content" id="animateLineContent-4">
                                                                    <div class="tab-pane fade show active"
                                                                        id="animated-underline-home2" role="tabpanel"
                                                                        aria-labelledby="animated-underline-home-tab2">
                                                                        <!-- <p class="mb-4" style="color:transparent">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
                                                                        </p> -->
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-12">

                                                                                    <div
                                                                                        class="user-profile layout-spacing">
                                                                                        <div
                                                                                            class="widget-content widget-content-area">
                                                                                            <div
                                                                                                class="d-flex justify-content-between">
                                                                                                <h3 class="">Info</h3>
                                                                                                <a href="#"
                                                                                                    class="mt-2 edit-profile">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="24"
                                                                                                        height="24"
                                                                                                        viewBox="0 0 24 24"
                                                                                                        fill="none"
                                                                                                        stroke="currentColor"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        class="feather feather-link">
                                                                                                        <path
                                                                                                            d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                                                                        </path>
                                                                                                    </svg></a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="text-center user-info">
                                                                                                <img src="images/round-account-button-with-user-inside.svg"
                                                                                                    alt="avatar"
                                                                                                    style="width:100px">
                                                                                                <p class="">
                                                                                                    <?php echo $data['fname'] ?>
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="user-info-list">

                                                                                                <div class="">
                                                                                                    <ul
                                                                                                        class="contacts-block list-unstyled">
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-coffee">
                                                                                                                <path
                                                                                                                    d="M18 8h1a4 4 0 0 1 0 8h-1">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="6"
                                                                                                                    y1="1"
                                                                                                                    x2="6"
                                                                                                                    y2="4">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="1"
                                                                                                                    x2="10"
                                                                                                                    y2="4">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="1"
                                                                                                                    x2="14"
                                                                                                                    y2="4">
                                                                                                                </line>
                                                                                                            </svg>
                                                                                                            <?php echo $data['nic'] ?>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-calendar">
                                                                                                                <rect
                                                                                                                    x="3"
                                                                                                                    y="4"
                                                                                                                    width="18"
                                                                                                                    height="18"
                                                                                                                    rx="2"
                                                                                                                    ry="2">
                                                                                                                </rect>
                                                                                                                <line
                                                                                                                    x1="16"
                                                                                                                    y1="2"
                                                                                                                    x2="16"
                                                                                                                    y2="6">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="8"
                                                                                                                    y1="2"
                                                                                                                    x2="8"
                                                                                                                    y2="6">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="3"
                                                                                                                    y1="10"
                                                                                                                    x2="21"
                                                                                                                    y2="10">
                                                                                                                </line>
                                                                                                            </svg><?php echo $data['fax'] ?>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-map-pin">
                                                                                                                <path
                                                                                                                    d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                                                                </path>
                                                                                                                <circle
                                                                                                                    cx="12"
                                                                                                                    cy="10"
                                                                                                                    r="3">
                                                                                                                </circle>
                                                                                                            </svg><?php echo $data['other'] ?>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <a
                                                                                                                href="mailto:example@mail.com"><svg
                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                    width="24"
                                                                                                                    height="24"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-width="2"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    class="feather feather-mail">
                                                                                                                    <path
                                                                                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                                                                                    </path>
                                                                                                                    <polyline
                                                                                                                        points="22,6 12,13 2,6">
                                                                                                                    </polyline>
                                                                                                                </svg><?php echo $data['email'] ?></a>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-phone">
                                                                                                                <path
                                                                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                                                </path>
                                                                                                            </svg>
                                                                                                            <?php echo $data['phone'] ?>
                                                                                                        </li>

                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>





                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="tab-pane fade"
                                                                        id="animated-underline-profile2" role="tabpanel"
                                                                        aria-labelledby="animated-underline-profile-tab2">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <button
                                                                                        class="btn btn-outline-primary mb-2"
                                                                                        data-toggle="modal"
                                                                                        href="#add_doc2">Add
                                                                                        Documents</button>
                                                                                    <div class="modal fade"
                                                                                        id="add_doc2" tabindex="-1"
                                                                                        role="dialog"
                                                                                        aria-labelledby="exampleModalTitle"
                                                                                        aria-hidden="true">
                                                                                        <div class="modal-dialog "
                                                                                            role="document">
                                                                                            <div class="modal-content">
                                                                                                <div
                                                                                                    class="modal-header">
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="close"
                                                                                                        data-dismiss="modal"
                                                                                                        aria-label="Close">
                                                                                                        <svg aria-hidden="true"
                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24"
                                                                                                            height="24"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            class="feather feather-x">
                                                                                                            <line
                                                                                                                x1="18"
                                                                                                                y1="6"
                                                                                                                x2="6"
                                                                                                                y2="18">
                                                                                                            </line>
                                                                                                            <line x1="6"
                                                                                                                y1="6"
                                                                                                                x2="18"
                                                                                                                y2="18">
                                                                                                            </line>
                                                                                                        </svg>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <form action=""
                                                                                                    method="post"
                                                                                                    enctype="multipart/form-data">
                                                                                                    <div
                                                                                                        class="modal-body">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-md-12">

                                                                                                                    <div
                                                                                                                        class="form-row mb-3">
                                                                                                                        <h6
                                                                                                                            class="mt-3">
                                                                                                                            Select
                                                                                                                            Document
                                                                                                                        </h6>
                                                                                                                        <div
                                                                                                                            class="form-group col-md-12">





                                                                                                                            <input
                                                                                                                                type="file"
                                                                                                                                name="user_doc[]"
                                                                                                                                id="user_doc"
                                                                                                                                class="form-control"
                                                                                                                                required
                                                                                                                                multiple>


                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            class="btn"
                                                                                                            data-dismiss="modal"><i
                                                                                                                class="flaticon-cancel-12"></i>
                                                                                                            Cancel</button>
                                                                                                        <button
                                                                                                            class="btn btn-primary  font-weight-bold mx-2"
                                                                                                            name="submit6"
                                                                                                            type="submit"
                                                                                                            style="float: right; ">SAVE</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="table-responsive mb-4 mt-4">
                                                                                        <?php
                                                                                            if (mysqli_num_rows($result3) > 0) {
                                                                                            ?>
                                                                                        <table id="html5-extension3"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        S.No
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Documents
                                                                                                    </th>
                                                                                                    <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit
                                                                                                    </th> -->
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Delete
                                                                                                    </th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row3 = mysqli_fetch_array($result3)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a href="uploads/<?php echo $row3["user_doc"]; ?>"
                                                                                                            target="_blank">
                                                                                                            <?php echo $row3["user_doc"]; ?></a>
                                                                                                    </td>







                                                                                                    <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="accounts_edit_Cop_h.php?id=<?php echo $row3['id']; ?>&table=<?php echo $row3["privilege"];?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <svg data-id='<?= $row3['id']; ?>'
                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24"
                                                                                                            height="24"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            class="feather feather-trash-2 text-danger warning delete">
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
                                                                                                <?php
                                                                                                    $i++;
                                                                                                    }
                                                                                                ?>


                                                                                            </tbody>
                                                                                        </table>
                                                                                        <?php
                                                                                            }
                                                                                            else{
                                                                                                echo "No result found";
                                                                                            }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade"
                                                                        id="animated-underline-contact" role="tabpanel"
                                                                        aria-labelledby="animated-underline-contact-tab">
                                                                        <p class="dropcap  dc-outline-primary">
                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                            adipisicing elit, sed do
                                                                            eiusmod
                                                                            tempor incididunt ut labore et dolore magna
                                                                            aliqua. Ut enim ad
                                                                            minim veniam,
                                                                            quis nostrud exercitation ullamco laboris
                                                                            nisi ut aliquip ex ea
                                                                            commodo
                                                                            consequat. Duis aute irure dolor in
                                                                            reprehenderit in voluptate
                                                                            velit esse
                                                                            cillum dolore eu fugiat nulla pariatur.
                                                                            Excepteur sint occaecat
                                                                            cupidatat non
                                                                            proident, sunt in culpa qui officia deserunt
                                                                            mollit anim id est
                                                                            laborum.
                                                                        </p>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>

                                                    </div>




                                                </div>
                                                <div id="form4" style="display:none;" class=" form">

                                                    <h3>Account (Insurance)</h3>

                                                    <div class="container-fluid mt-4">


                                                        <div class="row">
                                                            <div
                                                                class="widget-content widget-content-area animated-underline-content">

                                                                <ul class="nav nav-tabs  mb-3" id="animateLine"
                                                                    role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active"
                                                                            id="animated-underline-home-tab"
                                                                            data-toggle="tab"
                                                                            href="#animated-underline-home" role="tab"
                                                                            aria-controls="animated-underline-home"
                                                                            aria-selected="true"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-home">
                                                                                <path
                                                                                    d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                                                                </path>
                                                                                <polyline
                                                                                    points="9 22 9 12 15 12 15 22">
                                                                                </polyline>
                                                                            </svg> User Information</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link"
                                                                            id="animated-underline-profile-tab"
                                                                            data-toggle="tab"
                                                                            href="#animated-underline-profile"
                                                                            role="tab"
                                                                            aria-controls="animated-underline-profile"
                                                                            aria-selected="false"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-user">
                                                                                <path
                                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                                </path>
                                                                                <circle cx="12" cy="7" r="4"></circle>
                                                                            </svg> User Documents</a>
                                                                    </li>
                                                                    <!-- <li class="nav-item">
                                                                        <a class="nav-link"
                                                                            id="animated-underline-contact-tab"
                                                                            data-toggle="tab"
                                                                            href="#animated-underline-contact"
                                                                            role="tab"
                                                                            aria-controls="animated-underline-contact"
                                                                            aria-selected="false"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-phone">
                                                                                <path
                                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                </path>
                                                                            </svg> Contact</a>
                                                                    </li> -->
                                                                </ul>

                                                                <div class="tab-content" id="animateLineContent-4">
                                                                    <div class="tab-pane fade show active"
                                                                        id="animated-underline-home" role="tabpanel"
                                                                        aria-labelledby="animated-underline-home-tab">
                                                                        <!-- <p class="mb-4" style="color:transparent">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
                                                                        </p> -->
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-12">

                                                                                    <div
                                                                                        class="user-profile layout-spacing">
                                                                                        <div
                                                                                            class="widget-content widget-content-area">
                                                                                            <div
                                                                                                class="d-flex justify-content-between">
                                                                                                <h3 class="">Info</h3>
                                                                                                <a href="#"
                                                                                                    class="mt-2 edit-profile">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="24"
                                                                                                        height="24"
                                                                                                        viewBox="0 0 24 24"
                                                                                                        fill="none"
                                                                                                        stroke="currentColor"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        class="feather feather-link">
                                                                                                        <path
                                                                                                            d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                                                                        </path>
                                                                                                    </svg></a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="text-center user-info">
                                                                                                <img src="images/round-account-button-with-user-inside.svg"
                                                                                                    alt="avatar"
                                                                                                    style="width:100px">
                                                                                                <p class="">
                                                                                                    <?php echo $data['name'] ?>
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="user-info-list">

                                                                                                <div class="">
                                                                                                    <ul
                                                                                                        class="contacts-block list-unstyled">
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-coffee">
                                                                                                                <path
                                                                                                                    d="M18 8h1a4 4 0 0 1 0 8h-1">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="6"
                                                                                                                    y1="1"
                                                                                                                    x2="6"
                                                                                                                    y2="4">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="1"
                                                                                                                    x2="10"
                                                                                                                    y2="4">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="1"
                                                                                                                    x2="14"
                                                                                                                    y2="4">
                                                                                                                </line>
                                                                                                            </svg>
                                                                                                            <?php echo $data['website'] ?>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-calendar">
                                                                                                                <rect
                                                                                                                    x="3"
                                                                                                                    y="4"
                                                                                                                    width="18"
                                                                                                                    height="18"
                                                                                                                    rx="2"
                                                                                                                    ry="2">
                                                                                                                </rect>
                                                                                                                <line
                                                                                                                    x1="16"
                                                                                                                    y1="2"
                                                                                                                    x2="16"
                                                                                                                    y2="6">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="8"
                                                                                                                    y1="2"
                                                                                                                    x2="8"
                                                                                                                    y2="6">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="3"
                                                                                                                    y1="10"
                                                                                                                    x2="21"
                                                                                                                    y2="10">
                                                                                                                </line>
                                                                                                            </svg><?php echo $data['fax'] ?>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-map-pin">
                                                                                                                <path
                                                                                                                    d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                                                                </path>
                                                                                                                <circle
                                                                                                                    cx="12"
                                                                                                                    cy="10"
                                                                                                                    r="3">
                                                                                                                </circle>
                                                                                                            </svg><?php echo $data['address'] ?>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <a
                                                                                                                href="mailto:example@mail.com"><svg
                                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                                    width="24"
                                                                                                                    height="24"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-width="2"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    class="feather feather-mail">
                                                                                                                    <path
                                                                                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                                                                                    </path>
                                                                                                                    <polyline
                                                                                                                        points="22,6 12,13 2,6">
                                                                                                                    </polyline>
                                                                                                                </svg><?php echo $data['email'] ?></a>
                                                                                                        </li>
                                                                                                        <li
                                                                                                            class="contacts-block__item">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-phone">
                                                                                                                <path
                                                                                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                                                </path>
                                                                                                            </svg>
                                                                                                            <?php echo $data['phone'] ?>
                                                                                                        </li>

                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>





                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="tab-pane fade"
                                                                        id="animated-underline-profile" role="tabpanel"
                                                                        aria-labelledby="animated-underline-profile-tab">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <button
                                                                                        class="btn btn-outline-primary mb-2"
                                                                                        data-toggle="modal"
                                                                                        href="#add_doc">Add
                                                                                        Documents</button>
                                                                                    <div class="modal fade" id="add_doc"
                                                                                        tabindex="-1" role="dialog"
                                                                                        aria-labelledby="exampleModalTitle"
                                                                                        aria-hidden="true">
                                                                                        <div class="modal-dialog "
                                                                                            role="document">
                                                                                            <div class="modal-content">
                                                                                                <div
                                                                                                    class="modal-header">
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="close"
                                                                                                        data-dismiss="modal"
                                                                                                        aria-label="Close">
                                                                                                        <svg aria-hidden="true"
                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24"
                                                                                                            height="24"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            class="feather feather-x">
                                                                                                            <line
                                                                                                                x1="18"
                                                                                                                y1="6"
                                                                                                                x2="6"
                                                                                                                y2="18">
                                                                                                            </line>
                                                                                                            <line x1="6"
                                                                                                                y1="6"
                                                                                                                x2="18"
                                                                                                                y2="18">
                                                                                                            </line>
                                                                                                        </svg>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <form action=""
                                                                                                    method="post"
                                                                                                    enctype="multipart/form-data">
                                                                                                    <div
                                                                                                        class="modal-body">
                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-md-12">

                                                                                                                    <div
                                                                                                                        class="form-row mb-3">
                                                                                                                        <h6
                                                                                                                            class="mt-3">
                                                                                                                            Select
                                                                                                                            Document
                                                                                                                        </h6>
                                                                                                                        <div
                                                                                                                            class="form-group col-md-12">





                                                                                                                            <input
                                                                                                                                type="file"
                                                                                                                                name="user_doc[]"
                                                                                                                                id="user_doc"
                                                                                                                                class="form-control"
                                                                                                                                required
                                                                                                                                multiple>


                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            class="btn"
                                                                                                            data-dismiss="modal"><i
                                                                                                                class="flaticon-cancel-12"></i>
                                                                                                            Cancel</button>
                                                                                                        <button
                                                                                                            class="btn btn-primary  font-weight-bold mx-2"
                                                                                                            name="submit6"
                                                                                                            type="submit"
                                                                                                            style="float: right; ">SAVE</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="table-responsive mb-4 mt-4">
                                                                                        <?php
                                                                                            if (mysqli_num_rows($result2) > 0) {
                                                                                            ?>
                                                                                        <table id="html5-extension2"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        S.No
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Documents
                                                                                                    </th>
                                                                                                    <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit
                                                                                                    </th> -->
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Delete
                                                                                                    </th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row2 = mysqli_fetch_array($result2)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a href="uploads/<?php echo $row2["user_doc"]; ?>"
                                                                                                            target="_blank">
                                                                                                            <?php echo $row2["user_doc"]; ?></a>
                                                                                                    </td>







                                                                                                    <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="accounts_edit_Cop_h.php?id=<?php echo $row2['id']; ?>&table=<?php echo $row["privilege"];?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <svg data-id='<?= $row2['id']; ?>'
                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24"
                                                                                                            height="24"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            fill="none"
                                                                                                            stroke="currentColor"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            class="feather feather-trash-2 text-danger warning delete">
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
                                                                                                <?php
                                                                                                    $i++;
                                                                                                    }
                                                                                                ?>


                                                                                            </tbody>
                                                                                        </table>
                                                                                        <?php
                                                                                            }
                                                                                            else{
                                                                                                echo "No result found";
                                                                                            }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade"
                                                                        id="animated-underline-contact" role="tabpanel"
                                                                        aria-labelledby="animated-underline-contact-tab">
                                                                        <p class="dropcap  dc-outline-primary">
                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                            adipisicing elit, sed do
                                                                            eiusmod
                                                                            tempor incididunt ut labore et dolore magna
                                                                            aliqua. Ut enim ad
                                                                            minim veniam,
                                                                            quis nostrud exercitation ullamco laboris
                                                                            nisi ut aliquip ex ea
                                                                            commodo
                                                                            consequat. Duis aute irure dolor in
                                                                            reprehenderit in voluptate
                                                                            velit esse
                                                                            cillum dolore eu fugiat nulla pariatur.
                                                                            Excepteur sint occaecat
                                                                            cupidatat non
                                                                            proident, sunt in culpa qui officia deserunt
                                                                            mollit anim id est
                                                                            laborum.
                                                                        </p>
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



                        <!-- CONTENT AREA -->

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
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

    <script>
    $('#html5-extension').DataTable({
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                {
                    extend: 'csv',
                    className: 'btn'
                },
                {
                    extend: 'excel',
                    className: 'btn'
                },
                {
                    extend: 'print',
                    className: 'btn'
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
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                {
                    extend: 'csv',
                    className: 'btn'
                },
                {
                    extend: 'excel',
                    className: 'btn'
                },
                {
                    extend: 'print',
                    className: 'btn'
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
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                {
                    extend: 'csv',
                    className: 'btn'
                },
                {
                    extend: 'excel',
                    className: 'btn'
                },
                {
                    extend: 'print',
                    className: 'btn'
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
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn'
                },
                {
                    extend: 'csv',
                    className: 'btn'
                },
                {
                    extend: 'excel',
                    className: 'btn'
                },
                {
                    extend: 'print',
                    className: 'btn'
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

    $("#myModal2").on('show.bs.modal', function(e) {
        $("#myModal1").modal("hide");
    });
    </script>

    <script>
    var e = location.search.split('table=')[1]
    var a;
    console.log(e)

    if (e === 'Insurance') {
        a = 4;
    } else if (e === 'Corporate') {
        a = 2;
    } else if (e === 'Person') {
        a = 3;
    }

    // var e = document.getElementById("formName9");
    var strUser = a;
    console.log(strUser);
    if (strUser == 1) {
        document.getElementById("form1").style.display = "block";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "none";
    }
    if (strUser == 2) {
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "block";
        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "none";
    }
    if (strUser == 3) {
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "block";
        document.getElementById("form4").style.display = "none";
    }
    if (strUser == 4) {
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "block";
    }
    </script>

    <script>
    $(document).ready(function() {

        // Delete 
        $('.delete').click(function() {
            var el = this;

            // Delete id
            var deleteid = $(this).data('id');
            console.log("hamza " + deleteid)

            var confirmalert = confirm("Are you sure?");
            if (confirmalert == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete_users_doc.php',
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
                            });
                        } else {
                            alert('Invalid ID.');
                        }

                    }
                });
            }

        });

    });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>








<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>