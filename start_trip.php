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
    <title>sitara</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />


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
</style>
<?php
include("config_indemnifier.php");
// session_start();



$devices = "SELECT name , uniqueId as id from devices";
$devices_result = mysqli_query($db, $devices);
$consignee = "SELECT id,consignee_name,geotype FROM geofenceing where geotype!='black Spote';";
$consignee_result = mysqli_query($db, $consignee);

// error_reporting(0);

if(isset($_POST['submit'])){

    $s_time = mysqli_real_escape_string($db,$_POST['s_time']);
    $consignee = mysqli_real_escape_string($db,$_POST['consignee']);
    $products = mysqli_real_escape_string($db,$_POST['products']); 
    // $status = mysqli_real_escape_string($db,$_POST['status']);
    $quantity = mysqli_real_escape_string($db,$_POST['quantity']); 
    $vehicle = mysqli_real_escape_string($db,$_POST['vehicle']); 
    $estimate_time = mysqli_real_escape_string($db,$_POST['estimate_time']); 
    $date = date('d-m-y h:i:s');
    // echo $date;

    

       
    
    
   
    
    $sql = "INSERT INTO `trip_sitara`(`vehicle`,`createtime`,`activetime`,`completetime`,`product`,`quentity`,`geostart`,`geoend`,`estimatetime`,`status`)VALUES('$vehicle','$date','$s_time','','$products','$quantity','','$consignee','$estimate_time','1');";
        echo $sql;

    if (mysqli_query($db, $sql)) {
        echo '<script>alert("New record created successfully")</script>';
    } else {
        // $erre ="Error: " . $sql . "<br>" . mysqli_error($db);
        echo "<script>alert('Error: Duplicate Email , Email already exist');</script>";
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    

    
   
    


}

// mysqli_close($db);
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
                            <h3>Trips</h3>
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
                                            <form name="add_name" id="add_name">
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Tank Lorry Number</label>
                                                        <input type="text" class="form-control" id="lorry_number"
                                                            name="lorry_number" placeholder="Enter Tank Lorry Number"
                                                            required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputAddress">Location</label>

                                                        <select data-live-search="true"
                                                            class="form-control selectpicker" id="location"
                                                            name="location">
                                                            <option value="" selected>Select Location</option>
                                                            <?php foreach($consignee_result as $key => $value1){ ?>
                                                            <option value="<?= $value1['id'];?>">
                                                                <?= $value1['consignee_name']; ?></option>
                                                            <?php } 
                                                            ?>


                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Base</label>
                                                        <input type="text" class="form-control" id="base" name="base"
                                                            placeholder="Enter Base" required>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Driver CNIC</label>
                                                        <input type="text" class="form-control" id="driver_cnic"
                                                            name="driver_cnic" placeholder="Enter Driver CNIC" required>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Driver Mobile Number</label>
                                                        <input type="text" class="form-control" id="driver_no"
                                                            name="driver_no" placeholder="Enter Driver Mobile Number"
                                                            required>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Driver Helper CNIC</label>
                                                        <input type="text" class="form-control" id="driver_h_cnic"
                                                            name="driver_h_cnic" placeholder="Enter Driver Helper CNIC"
                                                            required>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Driver helper Mobile Number</label>
                                                        <input type="text" class="form-control" id="driver_h_no"
                                                            name="driver_h_no"
                                                            placeholder="Enter Driver helper Mobile Number" required>
                                                    </div>



                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Document No</label>
                                                        <input type="text" class="form-control" id="document"
                                                            name="document" placeholder="Enter Document No" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Trip Quantity</label>
                                                        <!-- <input type="text" class="form-control" id="trip_qtys"
                                                            placeholder="Enter Trip Quantity" > -->

                                                        <select id="trip_qtys" onchange="creat_form()"
                                                            class="form-control selectpicker">
                                                            <option value="0">1</option>
                                                            <option value="1">2</option>
                                                            <option value="2">3</option>
                                                            <option value="3">4</option>
                                                            <option value="4">5</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">Stage</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="checkbox" name="checkbox" id="checkbox"
                                                                    value="scheckbox" />

                                                            </div>
                                                            <div class="col-md-11">
                                                                <input type="text" class="form-control" id="stage"
                                                                    name="stage" placeholder="Enter Stage">

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12" style="overflow:auto">

                                                        <div class="row" >
                                                            <!-- <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Consignee Code</label>
                                                                <input type="text" class="form-control" id="consignee_code"
                                                                    name="consignee_code[]" placeholder="Enter Stage" required>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Consignee Name</label>
                                                                <input type="text" class="form-control" id="consignee_name"
                                                                    name="consignee_name[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Products</label>
                                                                <input type="text" class="form-control" id="products"
                                                                    name="products[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Quantity</label>
                                                                <input type="text" class="form-control" id="quantity"
                                                                    name="quantity[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Document Ref Number</label>
                                                                <input type="text" class="form-control" id="document_no"
                                                                    name="document_no[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Consignee Contact Number
                                                                    1</label>
                                                                <input type="text" class="form-control" id="consignee_contact1"
                                                                    name="consignee_contact1[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Consignee Contact Number
                                                                    2</label>
                                                                <input type="text" class="form-control" id="consignee_contact2"
                                                                    name="consignee_contact2[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Consignee Contact Number
                                                                    3</label>
                                                                <input type="text" class="form-control" id="consignee_contact3"
                                                                    name="consignee_contact3[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Del Order</label>
                                                                <input type="text" class="form-control" id="del_order"
                                                                    name="del_order[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">ETA</label>
                                                                <input type="text" class="form-control" id="eta"
                                                                    name="eta[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">Del Ch</label>
                                                                <input type="text" class="form-control" id="del_ch"
                                                                    name="del_ch[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4">By</label>
                                                                <input type="text" class="form-control" id="by"
                                                                    name="by[]" placeholder="Enter Document No"
                                                                    required>

                                                            </div> -->
                                                            <!-- <div class="form-group col-md-12">
                                                                <button type="button" name="add" id="add"
                                                                    class="btn btn-primary" style="float:right">Add
                                                                    More</button>

                                                            </div> -->
                                                           

                                                            <table class="table mb-4" id="dynamic_field" >
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">#</th>
                                                                        <th>Consignee Code</th>
                                                                        <th>Consignee Name</th>
                                                                        <th>Products</th>
                                                                        <th>Quantity</th>
                                                                        <th>Document Ref Number</th>
                                                                        <th>Consignee Contact Number 1</th>
                                                                        <th>Consignee Contact Number 2</th>
                                                                        <th>Consignee Contact Number 3</th>
                                                                        <th>Del Order</th>
                                                                        <th>ETA</th>
                                                                        <th>Del Ch</th>
                                                                        <th>By</th>
                                                                        <th>Stage Area</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-primary">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="text"
                                                                                        class="form-control" id="consignee_code"
                                                                                        name="consignee_code[]"
                                                                                         required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>

                                                                            </div>
                                                                        </div>    
                                                                        <td><input type="text" class="form-control"
                                                                                id="consignee_name"
                                                                                name="consignee_name[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td class=""><input type="text"
                                                                                class="form-control" id="products"
                                                                                name="products[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="quantity" name="quantity[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="document_no" name="document_no[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="consignee_contact1"
                                                                                name="consignee_contact1[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="consignee_contact2"
                                                                                name="consignee_contact2[]"
                                                                                
                                                                                required> <span style="color:transparent">ffffffffffffffffffffftttttttttttt</span> </td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="consignee_contact3"
                                                                                name="consignee_contact3[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="del_order" name="del_order[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="eta" name="eta[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="del_ch" name="del_ch[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>
                                                                        <td><input type="text" class="form-control"
                                                                                id="by" name="by[]"
                                                                                
                                                                                required><span style="color:transparent">ffffffffffffffffffffftttttttttttt</span></td>

                                                                                <td>
                                                                                    <div class="row">
                                                                                        <div class="col-md-1">
                                                                                            <input type="checkbox" name="checkbox" id="checkbox"
                                                                                                value="scheckbox" />

                                                                                        </div>
                                                                                        <div class="col-md-11">
                                                                                            <input type="text" class="form-control" id="stage"
                                                                                                name="stage" >

                                                                                        </div>
                                                                                    </div>
                                                                                        <span style="color:transparent">ffffffffffffffffffffftttttttttttt</span>
                                                                                </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>


                                                    </div>

                                                    <!-- <div class="row" id="dynamic_field">
                                                                
                                                    </div> -->







                                                </div>

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary  font-weight-bold mx-2"
                                                                type="submit" name="submit" id="submit"
                                                                style="float: right; ">Start
                                                                Trip</button>

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
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>


    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script>
    function creat_form() {
        var qty_f = document.getElementById("trip_qtys").value;
            // $("#dynamic_field").empty();
            $("#dynamic_field").find("tr:not(:nth-child(1)):not(:nth-child(1))").remove();

        // alert(qty_f)
        if (qty_f > 5) {
            alert("overloaded");
        } else {
            // $("#dynamic_field").empty();
            for (var i = 1; i <= qty_f; i++) {
                $('#dynamic_field').append('<tr id="row' + i +


                    '"><td class="text-center">' + (i + 1) +
                    '</td> <td class="text-primary"><input type="text" class="form-control" id="consignee_code" name="consignee_code[]"  required></td> <td><input type="text" class="form-control" id="consignee_name" name="consignee_name[]"  required></td> <td class=""><input type="text" class="form-control" id="products" name="products[]"  required></td> <td><input type="text" class="form-control" id="quantity" name="quantity[]"  required></td> <td><input type="text" class="form-control" id="document_no" name="document_no[]"  required></td> <td><input type="text" class="form-control" id="consignee_contact1" name="consignee_contact1[]"  required></td> <td><input type="text" class="form-control" id="consignee_contact2" name="consignee_contact2[]"  required></td> <td><input type="text" class="form-control" id="consignee_contact3" name="consignee_contact3[]"  required></td> <td><input type="text" class="form-control" id="del_order" name="del_order[]" required></td> <td><input type="text" class="form-control" id="eta" name="eta[]"  required></td> <td><input type="text" class="form-control" id="del_ch" name="del_ch[]"  required></td> <td><input type="text" class="form-control" id="by" name="by[]"  required> </td> <td> <div class="row"> <div class="col-md-1"> <input type="checkbox" name="checkbox" id="checkbox'+i+'" value="scheckbox" onclick="stages('+i+')"/> </div> <div class="col-md-11"> <input type="text" class="form-control" id="stage'+i+'" name="stage[]" style="display:none"> </div> </div> </td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-success btn_remove">X</button></td></tr>');
                // alert("Create " + i)
                $(document).on('click', '.btn_remove', function() {
                    i--;
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });
            }

        }
    }

    $("#submit").on('click', function() {
        var formdata = $("#add_name").serialize();
        $.ajax({
            url: "actioin.php",
            type: "POST",
            data: formdata,
            cache: false,
            success: function(result) {
                alert(result);
                $("#add_name")[0].reset();
            }
        });
    });

    $(function() {
        $('input[name="stage"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox"]').on('click', function() {
            if ($(this).prop('checked')) {
                $('input[name="stage"]').fadeIn();
            } else {
                $('input[name="stage"]').fadeOut();
            }
        });
    });
    function stages(i){
        var checkBox = document.getElementById("checkbox" + i + "");

            if(checkBox.checked === true){
                // alert("Checked "+i);
                $('input[id="stage'+i+'"]').fadeIn();


            }
            else{
                // alert("UnChecked "+i);
                $('input[id="stage'+i+'"]').fadeOut();

            }
       
    }
    </script>

    <!-- <script type="text/javascript">
    $(document).ready(function() {

        var i = 1;



        $("#add").click(function() {
            if (i > 5) {
                alert("overloaded");
            } else {
                $('#dynamic_field').append('<div class="row" id="row' + i +


                    '"><label for="">Service</label><select name="service[]" class="form-control "><option selected>Choose...</option><option >Builtin GPS</option><option >Blutooth</option><option >Digital Inputs</option><option >Door Sensor</option><option >Fuel Sensor</option><option >Driver Behaviour </option><option >Backup Battery</option><option >ignition Alert Via</option><option >Geo Fencing</option><option >Immobilization</option><option >Crash Detection</option><option >Towing Dection</option></select><label for="">Amount</label><input type="text" name="amount[]" placeholder="Amount" class="form-control name_email" /><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></div>');
            }



        });
        i++;

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $("#submit").on('click', function() {
            var formdata = $("#add_name").serialize();
            $.ajax({
                url: "actioin.php",
                type: "POST",
                data: formdata,
                cache: false,
                success: function(result) {
                    alert(result);
                    $("#add_name")[0].reset();
                }
            });
        });
    });
    </script> -->



    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>