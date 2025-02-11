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
    <title>INDEMNIFIER</title>
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
    <!-- <link href="assets/css/elements/search.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Xcp5FeJeVPn0nuCvLr-n_UG6_EL3ufs&callback=initMap&libraries=&v=weekly"
        defer></script>
    <link type="text/css" rel="stylesheet" href="src/jquery.treefilter.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

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
    </style>

</head>
<?php
    include("config_indemnifier.php");
    

    $active = mysqli_query($db,"SELECT si.*,geo.*,dv.name as v_name FROM trip_sitara as si join geofenceing as geo on geo.id=si.geoend join devices as dv on dv.uniqueId = si.vehicle where si.status=1;");
    $complete = mysqli_query($db,"SELECT si.*,geo.*,dv.name as v_name FROM trip_sitara as si join geofenceing as geo on geo.id=si.geoend join devices as dv on dv.uniqueId = si.vehicle where si.status=2;");


    ?>

<body class="sidebar-noneoverflow starterkit">
    <script>
    var arr = [];
    var arr2 = [];
    var allMyMarkers = [];
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


            <div class="widget-content widget-content-area rounded-pills-icon" style="height: 100%;margin-top: 1%;">

                <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-pills-icon-tab" role="tablist">
                    <li class="nav-item ml-2 mr-2">
                        <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab" data-toggle="pill"
                            href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home"
                            aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg> Compelete</a>
                    </li>

                    <li class="nav-item ml-2 mr-2">
                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab" data-toggle="pill"
                            href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact"
                            aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>Active</a>
                    </li>


                </ul>
                <div class="tab-content" id="rounded-pills-icon-tabContent">
                    <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel"
                        aria-labelledby="rounded-pills-icon-home-tab">
                        
                        <table id="html5-extension1" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ETA </th>
                                    <th>ID</th>
                                    <th>Details</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                        $i=1;
                                        while($row1 = mysqli_fetch_array($complete)) {
                                    ?>
                                <tr>
                                    <td style=" font-size: 23px; color: orange;    font-weight: bold;">2 MIN AWAY
                                        <p style="font-size: 15px;font-weight: bold;"> 1:40 arrival
                                        </p>
                                        <p style="font-size: 12px;"> Updated at 1:42 PM
                                        </p>
                                    </td>
                                    <td style=" font-size: 25px; color: black; font-weight: bold;">299</td>
                                    <td>
                                        <p style="font-size: 13px;">Customer Name</p>
                                        <p style=" font-size: 18px;font-weight: bold;">Abdul Samad</p>
                                        <p style=" font-size: 12px; ">Phone Number</p>
                                        <p style="  font-size: 15px;  color: black;font-weight: bold;">03341331909</p>
                                        <p style="font-size: 13px;">Car Model</p>
                                        <p style="  font-size: 15px;  color: black;font-weight: bold;">KHI-234</p>

                                    </td>
                                    <td>

                                        <button class="btn btn-primary mb-2 mr-2" style="
    width: 29%;
"><img src=".\assets\img\back.png"><br> MARK AS ACTIVE</button>

                                    </td>


                                </tr>
                                <?php
                                            $i++;
                                            }
                                        ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel"
                        aria-labelledby="rounded-pills-icon-contact-tab">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>END TIME</th>
                                    <th>Vehicle</th>
                                    <th>Customer</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($active)) {
                                    ?>
                                    <td style=" font-size: 23px; color: black;    font-weight: bold;"><?php echo $row["estimatetime"]; ?>
                                        <!-- <p style="font-size: 15px;font-weight: bold;"> 1:40 arrival
                                            </p> -->
                                    </td>
                                    <td style=" font-size: 25px; color: black;    font-weight: bold;"><?php echo $row["v_name"]; ?></td>
                                    <td>
                                        <p style="
    font-size: 13px;
">Customer Name</p>
                                        <p style="
    font-size: 18px;
    font-weight: bold;
"><?php echo $row["consignee_name"]; ?></p>
                                        <p style="
    font-size: 12px;
">Sales Group</p>
                                        <p style="
    font-size: 15px;
    color: black;
    font-weight: bold;
"><?php echo $row["Sales_Group"]; ?></p>
                                    </td>
                                    <td>

                                        <a href="./map.php" class="btn btn-primary mb-2 mr-2" style="
    width: 29%;
"><img src=".\assets\img\map.png"><br> VIEW ON MAP</a>
                                        <button class="btn btn-secondary  mb-2 mr-2 chaining-modals" style="
    width:29%;
"><img src=".\assets\img\check.png"><br> MARK AS COMPLETE</button>
                                        <button class="btn btn-secondary  mb-2 mr-2 " style="
    width:29%;
"><img src=".\assets\img\edit.png"><br><br> EDIT </button>

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
    </div>
    <!-- <div id="mapid" style="width: 100%; height: 100vh; z-index: 0;" class="">

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
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <!-- <script src="assets/js/elements/custom-search.js"></script> -->
    <script src="assets/js/scrollspyNav.js"></script>

    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
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
    </script>
    <script>
    $('.widget-content .chaining-modals').on('click', function() {
        swal.mixin({
            input: 'text',
            confirmButtonText: 'Next →',
            showCancelButton: true,
            progressSteps: ['1', '2', '3'],
            padding: '2em',
        }).queue([{
                title: 'Question 1',
                text: 'Chaining swal2 modals is easy'
            },
            'Question 2',
            'Question 3'
        ]).then(function(result) {
            if (result.value) {
                swal({
                    title: 'All done!',
                    padding: '2em',
                    html: 'Your answers: <pre>' +
                        JSON.stringify(result.value) +
                        '</pre>',
                    confirmButtonText: 'Lovely!'
                })
            }
        })
    })
    </script>
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


    }
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="src/jquery.treefilter.js"></script>

    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
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
                    setMarker(data.latitude, data.longitude, data.speed, device_id, data.altitude, data
                        .vlocation, data.record_creation_time)




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
                url: 'get_user_vehi.php',
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


                        dis_veh.push(deviceId);
                        console.log(dis_veh);
                        setMarker(lat, lng, speed, deviceId, altitude, vlocation, time)
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
            console.log(dis_veh);
            window.location.reload();
            ////alert("Unchecked " + currentId);
            for (var i = 0; i <= dis_veh.length; i++) {
                removeMarker(i, allMyMarkers)
                //removeMarker(id,dis_veh[i])
            }
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
        const image = "images/car_stopped.png";
        const fimage = "images/car_travelling.png";
        const mark = (speed > 0) ? fimage : image;
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
                '</p>' + '<p>Last:' + last_time + '</p>'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
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