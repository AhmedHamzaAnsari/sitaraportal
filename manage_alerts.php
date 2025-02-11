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
    <title>Manage Alerts</title>
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
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">


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

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
// session_start();
include("config_indemnifier.php");
$user_id = $_SESSION['userid'];
$todate = date("Y-m-d H:i:s", time());

$prev_date = date("Y-m-d H:i:s", strtotime($todate . ' -1 day'));

// $resultss2 = mysqli_query($db,"SELECT da.*,pos.address,pos.vehicle_name,pos.speed,pos.latitude,pos.longitude,pos.time FROM driving_alerts  as da join positions as pos on pos.id=da.pos_id where da.created_at>=curdate() and da.created_by='$user_id' order by da.id desc;");
// $resultss2 = mysqli_query($db,"SELECT da.*,pos.address,pos.vehicle_name,pos.speed,pos.latitude,pos.longitude,pos.time FROM driving_alerts  as da join positions as pos on pos.id=da.pos_id where da.created_at>=curdate() and da.created_by='$user_id' order by da.id desc;");
$resultss2 = mysqli_query($db, "SELECT * FROM driving_alerts where is_load!=1 and created_at>='$prev_date' and created_by='$user_id' order by id desc ;");


$devices = "SELECT name , id as uniqueId  from devicesnew";
$devices_result = mysqli_query($db, $devices);
$alert_result = mysqli_query($db, "SELECT distinct(type) FROM driving_alerts");

$sql = "SELECT distinct(da.type),(SELECT count(*) FROM driving_alerts where type=da.type) as alert_count FROM driving_alerts as da where created_at>=curdate();";
$result = $db->query($sql);
?>

<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Manage Alerts</h3>
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
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> <span>My Profile</span>
                            </a>
                        </div>

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
        <?php include 'sidebar.php'; ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->


                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="container-fluid">
                                <div class="row" id="my-container">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <div class="col-md-3 my-2">
                                                <div class="card border-info mx-sm-1 p-3" style="border-radius: 17px;background: antiquewhite;">
                                                    <div class="card border-info shadow text-info p-3 my-card" style=" background-color: aliceblue;"><i
                                                            class="fad fa-abacus"></i></div>

                                                    <div class="text-info text-center mt-3">
                                                        <h6>
                                                            <?php echo $row["type"] ?>
                                                        </h6>
                                                    </div>
                                                    <div class="text-info text-center mt-2">
                                                        <h5 class="text-dark " style="font-weight: bold;">
                                                            <?php echo $row["alert_count"] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "No records found";
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Alert</label>

                                                <select class="form-control tagging" id="alert_type" name="alert_type"
                                                    multiple>
                                                    <!-- <option value="all">All</option> -->
                                                    <option value="all">All Alerts</option>
                                                    <?php foreach ($alert_result as $key => $lorry) {
                                                        if ($lorry["type"] == 'RTD') {
                                                            ?>
                                                            <option value="<?= $lorry['type']; ?>">
                                                                RTDT</option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?= $lorry['type']; ?>">
                                                                <?= $lorry['type']; ?></option>
                                                            <?php

                                                        }
                                                        ?>


                                                    <?php }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputEmail4">From</label>
                                                <input id="from" class="form-control " type="datetime-local"
                                                    placeholder="Select Date..">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputEmail4">To</label>
                                                <input id="to" class="form-control flatpickr  " type="datetime-local"
                                                    placeholder="Select Date..">
                                            </div>



                                        </div>
                                        <button type="button" class="btn btn-primary" id="drawing" style="float: right;"
                                            onclick="get_history()">Get</button>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid mt-4">

                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <div id='loader' style='display: none;'>
                                    <img src='images/loader.gif' width='100%'>
                                </div>
                               
                                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Alert Type</th>
                                                <th class="text-center">Alert</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Track</th>
                                                <th class="text-center">Description</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($resultss2)) {
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo $i ?>
                                                    </td>
                                                    <!-- <td class="text-center"><?php echo $row["vehicle_name"]; ?></td> -->
                                                    <td class="text-center">
                                                        <?php
                                                        if ($row["type"] == 'RTD') {
                                                            echo 'RTDT';
                                                        } else {
                                                            echo $row["type"];

                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $row["message"]; ?>
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                        <?php echo $row["created_at"]; ?>
                                                    </td>
                                                    <td class="text-center">

                                                        <a href="check_alerts.php?id=<?php echo $row["pos_id"]; ?>&geo=<?php echo $row["geo_id"]; ?>&type=<?php echo $row["type"]; ?>"
                                                            target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-activity">
                                                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                                            </svg></a>
                                                    </td>
                                                    <!-- <td class="text-center"><?php echo $row["speed"]; ?></td> -->
                                                    <td class="text-center">
                                                        <?php
                                                        if ($row["description"] != "") {
                                                            echo $row["description"];
                                                        } else {
                                                            ?>
                                                            <a name="edit" id="<?php echo $row["id"]; ?>" class="edit_data"
                                                                data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit-2 text-success">
                                                                    <path
                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                    </path>
                                                                </svg></a>
                                                            <?php
                                                        }
                                                        ?>
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


                    <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:#000" id="title_edit">Add Alert Description
                                    </h5>
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
                                                            <label for="inputEmail4">Description</label>
                                                            <input type="text" class="form-control" id="cname"
                                                                name="cname" placeholder="Enter Description">
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
            $(document).ready(function () {
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
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="assets/js/scrollspyNav.js"></script>
        <script src="plugins/select2/select2.min.js"></script>
        <script src="plugins/select2/custom-select2.js"></script>
        <script>
        // $('.widget-content .warning.confirm').on('click', function () {
        //     swal({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Delete',
        //         padding: '2em'
        //         }).then(function(result) {
        //         if (result.value) {
        //             swal(
        //             'Deleted!',
        //             'Your file has been deleted.',
        //             'success'
        //             )
        //         }
        //         })
        //     })
        // }
        </script>
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
                "pageLength": 10
            });
        </script>

        <script>
            $(document).ready(function () {


                $('#insert_form').on("submit", function (event) {
                    event.preventDefault();
                    if ($('#cname').val() == "") {
                        alert("Driver name is required");

                    } else {
                        $.ajax({
                            url: "ajax_edit/add_alert_des.php",
                            method: "POST",
                            data: $('#insert_form').serialize(),
                            beforeSend: function () {
                                $('#insert').val("Inserting");
                            },
                            success: function (data) {
                                $('#insert_form')[0].reset();
                                $('#zoomupModal').modal('hide');
                                //    $("#html5-extension").load(" #html5-extension");
                                window.location.reload();

                            }
                        });
                    }
                });


                $(document).on('click', '.edit_data', function () {

                    var employee_id = $(this).attr("id");
                    // alert(employee_id)
                    $('#zoomupModal').modal('show');
                    $('#employee_id').val(employee_id);

                });


            });

            function get_history() {

                var v_id = [];

                $('#alert_type :selected').each(function (key) {
                    v_id[key] = $(this).val();


                })
                // alert(vehicle_name);
                // var vehicle = document.getElementById("lorry_number").value;
                var from = $('#from').val();
                var to = $('#to').val();

                var len_vehi = v_id.length;


                if (len_vehi != 0 && from != "" && to != "") {
                    $.ajax({
                        url: 'get_alerts_data.php',
                        type: 'POST',
                        data: {
                            check: v_id,
                            from: from,
                            to: to
                        },
                        beforeSend: function () {
                            $("#loader").show();
                        },
                        success: function (data) {
                            data = JSON.parse(data)

                            console.log(data)
                            var len = data.length;
                            //alert("len "+len)
                            var table = $('#html5-extension').DataTable();
                            table
                                .clear()
                                .draw();

                            if (len > 0) {

                                for (var i = 0; i < len; i++) {

                                    // console.log(data[i].location);


                                    var disc = "";
                                    var rtdt = "";
                                    if (data[i].description != '') {
                                        disc = data[i].description;
                                    } else {
                                        disc = '<a name="edit" id="' + data[i].id +
                                            '" class="edit_data" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"> <path  d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></svg></a>'
                                    }
                                    if (data[i].type == 'RTD') {
                                        rtdt = 'RTDT';
                                    } else {
                                        rtdt = data[i].type;

                                    }

                                    table.row.add(
                                        [(i + 1),
                                            rtdt,
                                        data[i].message,
                                        data[i].created_at,
                                        '<a href="check_alerts.php?id=' + data[i].pos_id + '&type=' +
                                        data[i].type + '&geo=' + data[i].geo_id +
                                        '" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></a>',
                                            disc,
                                        ])
                                        .draw()
                                        .node();

                                    // if(i===len){
                                    //     $("#loader").hide();

                                    // }





                                }
                                get_kpi_data(v_id,from,to);

                            } else {
                                $('#my-container').empty();
                                alert("No Data Found")
                            }






                        },
                        complete: function (data) {
                            // Hide image container
                            $("#loader").hide();
                            $("#geted").prop("disabled", false);
                        }
                    });
                }

            }

            function get_kpi_data(v_id,from,to) {
                $.ajax({
                    url: 'get_alerts_data_kpi.php',
                    type: 'POST',
                    data: {
                        check: v_id,
                        from: from,
                        to: to
                    },
                    beforeSend: function () {
                        $("#loader").show();
                    },
                    success: function (data) {
                        data = JSON.parse(data)

                        console.log(data)
                        var len = data.length;
                       

                        if (len > 0) {
                            $('#my-container').empty();
                            for (var i = 0; i < len; i++) {

                               

                                $('#my-container').append('<div class="col-md-3 my-2">'+
                                                '<div class="card border-info mx-sm-1 p-3" style="border-radius: 17px;background: antiquewhite;">'+
                                                    '<div class="card border-info shadow text-info p-3 my-card" style=" background-color: aliceblue;"><i class="fad fa-abacus"></i></div>'+

                                                    '<div class="text-info text-center mt-3">'+
                                                        '<h6>'+data[i].type+'</h6>'+
                                                    '</div>'+
                                                   ' <div class="text-info text-center mt-2">'+
                                                        '<h5 class="text-dark " style="font-weight: bold;">'+data[i].alert_count+'</h5>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>');

                                




                            }

                        } else {
                            
                            alert("No Data Found")
                        }






                    }
                });
            }
        </script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>