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
    <title>Sitara ROUTES</title>
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
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
        defer></script>
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">



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

    .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .numPlate {

        padding: 10px 40px;
        font-size: 20px;
        border: 2px solid #000;
        border-radius: 5px;
        background-color: #F7CE35;
        font-weight: bold;
    }

    .caret::before {
        display: none !important;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<script>
var all_fence = [];
var circle_cord = [];
var c_lat;
var c_lng;
</script>
<?php
include("config_indemnifier.php");

$sess_id = $_SESSION['userid'];

$result_in = mysqli_query($db,"SELECT 
geo.*,
(SELECT COUNT(*) as count_vehi FROM geo_in_check WHERE geo_id = geo.id) as vehi_count,
CASE 
    WHEN (SELECT COUNT(*) FROM geo_in_check WHERE geo_id = geo.id) > 0 
    THEN (SELECT GROUP_CONCAT(car_name SEPARATOR ',') FROM geo_in_check WHERE geo_id = geo.id) 
    ELSE '0 Vehicles' -- You can customize the value for cases where no vehicles are found
END AS vehicles_name 
FROM 
geofenceing as geo 
WHERE 
geotype = 'Depot';");

if($_SESSION['prive']==='Cartraige'){


    $resultdevice = mysqli_query($db,"SELECT dc.* FROM users_devices as ud join devices as dc on ud.devices_id=dc.uniqueId where ud.users_id='$sess_id'");
}
else{
    $resultdevice = mysqli_query($db,"SELECT * FROM devices;");


}

// $asset = "SELECT name , uniqueId from  devices";
// $resultdevice = mysqli_query($db, $asset);

?>

<?php

$result = mysqli_query($db,"SELECT * FROM `geofenceing` where type='polygon'");
while($row = mysqli_fetch_array($result)) 
{
    ?>

<script>
var poly_cord = [];
var cord = "<?php echo $row[7] ?>";
var radib = "<?php echo $row[2] ?>";
console.log(radib);

var str = cord;
var str_array = str.split(';');
var center = {};

var points = [];
for (var i = 0; i < str_array.length - 1; i++) {
    var co = str_array[i].split(',');
    if (i == 0) {
        center = {
            lat: parseFloat(co[0]),
            lng: parseFloat(co[1])
        }
    }

    points.push({
        lat: parseFloat(co[0]),
        lng: parseFloat(co[1])
    });
}
all_fence.push(points);
</script>
<?php }?>

<?php

$result = mysqli_query($db,"SELECT * FROM `geofenceing` where type='circle' and geotype = 'Depot'");
while($row = mysqli_fetch_array($result)) 
{
    ?>

<script>
var cord = "<?php echo $row[7] ?>";
var radib = "<?php echo $row[2] ?>";

var geo_type = "<?php echo $row['geotype'] ?>";



circle_cord.push(cord)
</script>
<?php }?>


<body class="sidebar-noneoverflow starterkit">
    <script>
    console.log(circle_cord);

    var route_data = [];
    var markersArray = [];
    </script>

    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>ROUTES</h3>
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
        <div id="content" class="main-content mt-5" style="background-color:#FFFFFF">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-6" style="padding :0 !important">
                        <div id="map-canvas" style="width: 100%; height: 100vh;" class="">

                        </div>


                    </div>

                    <div class="col-md-6" style="padding :0 !important">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive mb-4 mt-4">
                                        <?php
                                                    if (mysqli_num_rows($result_in) > 0) {
                                                ?>
                                        <!-- <div class="row">
                                                            <div class="col-md-12">
                                                                <button id="delete_btn" class="btn btn-danger">Delete</button>

                                                            </div>
                                                        </div> -->
                                        <table id="html5-extension" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <!-- <th class="text-center">Delete</th> -->

                                                    <th class="text-center">S.NO</th>
                                                    <th class="text-center">Fence Name</th>
                                                    <th class="text-center">Type </th>
                                                    <th class="text-center">Total vehicle </th>
                                                    <th class="text-center">vehicle Name </th>
                                                    <th class="text-center">View </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                                    $i=1;
                                                                    while($row = mysqli_fetch_array($result_in)) {


                                                                        
                                                                ?>
                                                <tr>
                                                    <!-- <td class="text-center"><input type='checkbox' name='delete[]'
                                                                    value='<?= $row["uniqueId"]; ?>'></td> -->

                                                    <td class="text-center"><?php echo $i ?></td>

                                                    <td class="text-center"><?php echo $row["consignee_name"]; ?></td>
                                                    <td class="text-center"><?php echo $row["geotype"]; ?></td>
                                                    <td class="text-center"><?php echo $row["vehi_count"]; ?> vehicles
                                                    <td class="text-center"><?php echo $row["vehicles_name"]; ?>
                                                    </td>



                                                    <td class="text-center">





                                                        <svg onclick='check_center(<?php echo $row["Coordinates"]; ?>)'
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-minimize-2">
                                                            <polyline points="4 14 10 14 10 20"></polyline>
                                                            <polyline points="20 10 14 10 14 4"></polyline>
                                                            <line x1="14" y1="10" x2="21" y2="3"></line>
                                                            <line x1="3" y1="21" x2="10" y2="14"></line>
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

    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="assets/js/elements/custom-search.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>

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

    <!-- <script src="plugins/apex/custom-apexcharts.js"></script> -->




    <script>
    $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        // alert(maxDate);
        $('#from').attr('max', maxDate);

        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            $('#to').attr('max', maxDate);
        });
    });
    </script>


    <script>
    let map;
    var circle;
    let flightPath;

    function initMap() {

        gmarkers = [];
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: {
                lat: 24.8607,
                lng: 67.001
            },
            zoom: 6,

        });
        for (var i = 0; i < all_fence.length; i++) {
            // console.log(all_fence[i])
            const bermudaTriangle = new google.maps.Polygon({
                paths: all_fence[i],
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
            });

            bermudaTriangle.setMap(map);
        }



        for (var i = 0; i < circle_cord.length; i++) {
            console.log(circle_cord[i])
            var str_array = circle_cord[i].split(',');
            const cityCircle = new google.maps.Circle({
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
                map,
                center: {
                    lat: parseFloat(str_array[0]),
                    lng: parseFloat(str_array[1])
                },
                radius: 5000,
            });

            cityCircle.setMap(map);
        }
        $.ajax({
            url: 'geo_in_depo_vehicles.php',
            type: 'POST',
            success: function(data) {
                data = JSON.parse(data);
                //console.log(data)
                var len = data.length;
                var i = 0;

                while (i <= len) {

                    //console.log(i)
                    var consignee = data[i]["consignee_name"]
                    var cordinates = data[i]["coordinates"]
                    var location = data[i]["location"]
                    var time = data[i]["time"]
                    var speed = data[i]["speed"]
                    //console.log(cordinates)
                    var chars = cordinates.split(', ');
                    //console.log(chars[0]);
                    //console.log(chars[1]);
                    marker_creation(chars[0], chars[1], consignee,location,time,speed)

                    i++;
                };
            }
        });

        function marker_creation(lat, lng, consignee,location,time,speed) {
            const image = "images/icon/car_icon_blue.png";
            var positiona = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({
                position: positiona,

                map,
                icon: {
                    labelOrigin: new google.maps.Point(11, 50),
                    url: image,

                    //size: new google.maps.Size(22, 40),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(11, 40),
                },
            });
            var infowindow = new google.maps.InfoWindow({
                content: '<p>Details:' + '<p>Vehicle # :' + consignee + '</p><p>Location :' + location + '</p><p>Time :' + time + '</p><p>Speed :' + speed + ' km/hr</p>'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

        }

    }

    function remove_line() {
        flightPath.setMap(null);
        setMapOnAll(null);
        markersArray = [];
        document.getElementById("removing").style.display = 'none';
        document.getElementById("drawing").disabled = false;
    }

    function setMapOnAll(map) {
        for (let i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(map);
        }
    }

    function check_center(lat, lng) {
        // alert(lat);
        // alert(lng);

        map.setCenter({
            lat: lat,
            lng: lng
        });

        map.setZoom(10);

    }
    </script>

    <script>
    var startTime;
    var pre_time = 0;
    var end_time;
    var hours;

    function myFunction() {
        document.getElementById("drawing").disabled = true;

        var vehicle = document.getElementById("vehi_id").value;
        // var from = document.getElementById("from").value;
        // var to = document.getElementById("to").value;

        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
        const format1 = "YYYY-MM-DD HH:mm:ss";

        from = moment(from).format(format1);
        to = moment(to).format(format1);
        // alert(vehicle + " " + from + " " + to);

        if (vehicle != "" && from != "" && to != "") {
            const flightPlanCoordinates = [];
            // drawing


            $.ajax({
                url: 'get_route.php',
                type: 'POST',
                data: {
                    vehicle: vehicle,
                    from: from,
                    to: to
                },
                success: function(data) {

                    data = JSON.parse(data);

                    var len = data.length;
                    if (len > 0) {
                        document.getElementById("removing").style.display = 'block';
                        document.getElementById("drawing").disabled = true;
                        const lineSymbol = {
                            path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        };


                        var i = 0;
                        const image = "images/rec.png";
                        const start = "images/icon/car_icon_blue.png";
                        const end = "images/icon/car_red.png";
                        const stops = "images/stop-sign1.png";
                        data.forEach(obj => {

                            var vehicle_name = data[i][0];
                            var lat = data[i][1];
                            var lng = data[i][2];
                            var speed = data[i][3];
                            var power = data[i][5];
                            var location = data[i][6];
                            var time = data[i][4];
                            var positiona = new google.maps.LatLng(lat, lng);
                            //console.log("Samad" + i)
                            //console.log(len)
                            if (i == 0) {
                                //console.log("samad")
                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map,
                                    icon: {
                                        url: start,
                                    },


                                });
                                markersArray.push(marker);

                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Details:' + '<p>Vehical # :' +
                                        vehicle_name +
                                        '</p>' + '<p>Start Location # :' + location +
                                        '</p>' + '<p>Latitude:' + lat + '</p>' +
                                        '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                        speed +
                                        '</p>' + '<p>Last:' + time + '</p>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }

                            if (power === '0' && speed === '0') {
                                var starting = time;
                                console.log("starting " + starting);
                                console.log("pre " + pre_time);
                                //  startTime = time;
                                //  pre_time = startTime;
                                // if (pre_time === 0) {
                                //     startTime = time;
                                //     pre_time = starting;

                                //     console.log("pre " + pre_time)
                                // }

                                if (i == 0) {
                                    startTime = starting;

                                    // pre_time = starting;
                                    ////console.loNext Time" + next_time)
                                    var now = moment(startTime); //todays date
                                    var ends = moment(pre_time); // another date
                                    // console.log("start " + now);
                                    // console.log("End " + ends);
                                    var duration = moment.duration(now.diff(ends));
                                    hours = duration.asMinutes();
                                    console.log(hours)
                                    pre_time = startTime;
                                } else {
                                    startTime = starting;

                                    ////console.loNext Time" + next_time)
                                    var now = moment(startTime); //todays date
                                    var ends = moment(pre_time); // another date
                                    // console.log("start " + now);
                                    // console.log("End " + ends);
                                    var duration = moment.duration(now.diff(ends));
                                    hours = duration.asMinutes();
                                    console.log(hours)
                                    pre_time = startTime;
                                }


                                // var now = moment(startTime); //todays date
                                // var ends = moment(pre_time); // another date
                                // console.log("start " + now);
                                // console.log("End " + ends);
                                // var duration = moment.duration(now.diff(ends));
                                // var hours = duration.asHours();
                                // console.log(hours)
                                // pre_time = 0;

                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map,
                                    icon: {
                                        url: stops,
                                    },


                                });
                                markersArray.push(marker);
                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Details:' + '<p>Vehical # :' +
                                        vehicle_name +
                                        '</p>' + '<p>Stop Location # :' + location +
                                        '</p>' + '<p>Latitude:' + lat + '</p>' +
                                        '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                        speed +
                                        '</p>' + '<p>Last:' + time + '</p>' +
                                        '<p>Stop Duration:' + Math.round(hours) +
                                        ' Minutes' + '</p>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }

                            if (i == len - 1) {
                                //console.log("samad")
                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map,
                                    icon: {
                                        url: end,
                                    },

                                });
                                markersArray.push(marker);
                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Details:' + '<p>Vehical # :' +
                                        vehicle_name +
                                        '</p>' + '<p>End Location # :' + location +
                                        '</p>' + '<p>Latitude:' + lat + '</p>' +
                                        '<p>Longitude:' + lng + '</p>' + '<p>speed:' +
                                        speed +
                                        '</p>' + '<p>Last:' + time + '</p>'
                                });
                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            }
                            // var speed = data[i][3];
                            // var time = data[i][4];

                            var lati = parseFloat(lat)
                            var lngi = parseFloat(lng)
                            var position = new google.maps.LatLng(lat, lng);
                            flightPlanCoordinates.push({
                                lat: lati,
                                lng: lngi
                            });
                            map.setCenter(position);
                            map.setZoom(12)

                            // //console.log(route_data);
                            i++;

                        });
                        //console.log(flightPlanCoordinates);

                        flightPath = new google.maps.Polyline({
                            path: flightPlanCoordinates,
                            geodesic: true,
                            strokeColor: "#FF0000",
                            strokeOpacity: 1.0,
                            strokeWeight: 2,
                            icons: [{
                                icon: lineSymbol,
                                offset: "100%",
                                repeat: '30px',
                            }, ],

                        });

                        flightPath.setMap(map);
                    } else {
                        alert("Data Not Found");
                        document.getElementById("drawing").disabled = false;

                    }





                }
            });

        } else {
            alert("Please Select Field")

        }
    }
    </script>


    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>