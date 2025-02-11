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
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">

    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />

    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css"> -->
    <!-- <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">

    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=initMap&libraries=drawing&v=weekly"
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

    .car_upper {
        text-transform: uppercase !important;
    }

    .caret::before {
        content: none !important;
    }

    .select2-container--default .select2-selection--multiple {
        background-color: #fff;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$id = $_SESSION['userid'];
$devices = "SELECT name ,id  from devicesnew as dc
join users_devices_new as ud on ud.devices_id=dc.id
where ud.users_id='$id'";
$devices_result = mysqli_query($db, $devices);

$asset = "SELECT * from  geofenceing where geotype='depot'";
$resultdevice = mysqli_query($db, $asset);
?>

<body class="sidebar-noneoverflow starterkit">
    <script>
    var route_data = [];
    var markersArray = [];
    var hs = 0;
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
                            <h3>Vehicle Alerts Report</h3>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Tank Lorry Number</label>

                                                <!-- <select data-live-search="true" class="form-control selectpicker"
                                                        id="lorry_number" name="lorry_number" multiple='multiple'>
                                                        <option value="" selected>Select Lorry number</option>
                                                        <?php foreach ($devices_result as $key => $lorry) { ?>
                                                        <option value="<?= $lorry['uniqueId']; ?>">
                                                            <?= $lorry['name']; ?></option>
                                                        <?php }
                                                        ?>


                                                    </select> -->

                                                <select class="form-control tagging" id="lorry_number"
                                                    name="lorry_number">
                                                    <option value="">Select Lorry number</option>
                                                    <!-- <option value="all">All Lorries</option> -->
                                                    <?php foreach ($devices_result as $key => $lorry) { ?>
                                                    <option value="<?= $lorry['id']; ?>">
                                                        <?= $lorry['name']; ?>
                                                    </option>
                                                    <?php }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Depo</label>
                                                <select class="form-control tagging" id="depots" name="depots">
                                                    <option value="">Select</option>
                                                    <!-- <option value="all">All Lorries</option> -->
                                                    <?php foreach ($resultdevice as $key => $lorry) { ?>
                                                    <option value="<?= $lorry['Coordinates']; ?>">
                                                        <?= $lorry['consignee_name']; ?>
                                                    </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">From Date</label>
                                                <input type="datetime-local" class="form-control" id="from" name="from"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">To Date</label>
                                                <input type="datetime-local" class="form-control" id="to" name="to"
                                                    required>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" style="float:right" id="geted"
                                                onclick="get_history()"> Get </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="container-fluid">
                                <div id='loader' style='display: none;'>
                                    <img src='images/loader.gif' width='100%'>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map-canvas" style="width: 100%; height: 100vh; z-index: 0;" class="">

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
        <!--  END CONTENT AREA  -->
        <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#000" id="title_edit">Send Mail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container my-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="employee_table"></div>
                                    <div class="form-row mb-4">
                                        <label for="inputEmail4">Email Address</label>
                                        <div class="form-group col-md-12">


                                            <select class="selectpicker" multiple id="multi_mail" name="multi_mail"
                                                data-width='100%'>
                                                <option>Select Email</option>
                                                <?php foreach ($resultdevice as $key => $value) { ?>
                                                <option value="<?= $value['email']; ?>">
                                                    <?= $value['email']; ?>
                                                </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div id='loader1' style='display: none;'>
                                            <img src='images/loader.gif' width='100%'>
                                        </div>

                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="button" class="btn btn-primary" name="insert"
                                                    onclick="send_mail()" id="insert" value="Send"
                                                    style="float:right" />

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>

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
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/noUiSlider/nouislider.min.js"></script>

    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>

    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>

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
    </script>

    <!-- <script>
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
</script> -->



    <script>
    let map;
    var circle;
    let flightPath;
    const image = "images/rec.png";
    const start = "images/icon/car_icon_blue.png";
    const end = "images/icon/car_red.png";
    const stops = "images/stop-sign1.png";

    function initMap() {

        gmarkers = [];
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: {
                lat: 30.3753,
                lng: 69.3451
            },
            zoom: 6,

        });

        $.ajax({
            url: 'geo_location.php',
            type: 'POST',
            success: function(data) {
                data = JSON.parse(data);
                //console.log(data)
                var len = data.length;
                var i = 0;

                while (i < len) {

                    //console.log(i)
                    var consignee = data[i]["consignee_name"]
                    var cordinates = data[i]["coordinates"]
                    var geotype = data[i]["geotype"]
                    //console.log(cordinates)
                    var chars = cordinates.split(', ');
                    //console.log(chars[0]);
                    //console.log(chars[1]);
                    marker_creation(chars[0], chars[1], consignee, geotype)

                    i++;
                };
            }
        });

        function marker_creation(lat, lng, consignee, geotype) {
            const image = "images/rec.png";
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
                content: '<p>Details:' + '<p>Consignee # :' + consignee + '</p><p>Type # :' + geotype + '</p>'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

        }

    }

    function remove_line() {
        console.log("map clear")
        flightPath.setMap(null);
        setMapOnAll(null);
        markersArray = [];
        // document.getElementById("removing").style.display = 'none';
        // document.getElementById("drawing").disabled = false;
    }

    function setMapOnAll(map) {
        for (let i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(map);
        }
    }
    </script>

    <script>
    var startTime;
    var pre_time = 0;
    var end_time;
    var hours;

    function myFunction() {
        // document.getElementById("drawing").disabled = true;


        var vehicle = document.getElementById("lorry_number").value;
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
                        // document.getElementById("removing").style.display = 'block';
                        // document.getElementById("drawing").disabled = true;
                        const lineSymbol = {
                            path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        };


                        var i = 0;

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
                            // map.setCenter(position);
                            // map.setZoom(12)

                            // //console.log(route_data);
                            i++;

                        });
                        //console.log(flightPlanCoordinates);

                        flightPath = new google.maps.Polyline({
                            path: flightPlanCoordinates,
                            geodesic: true,
                            strokeColor: "#914747",
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
                        // alert("Data Not Found");
                        // document.getElementById("drawing").disabled = false;

                    }





                },
                complete: function(data) {
                    // Hide image container
                    $("#loader").hide();
                    $("#geted").prop("disabled", false);
                }
            });

        } else {
            alert("Please Select Field")

        }
    }
    </script>

    <script>
    var table_html;

    function get_history() {

        var v_id = [];
        var vehicle_name = [];

        // $('#lorry_number :selected').each(function(key) {
        //     v_id[key] = $(this).val();


        // })
        // $('#lorry_number :selected').each(function(key) {
        //     vehicle_name[key] = $(this).text();


        // })
        // alert(vehicle_name);
        // var vehicle = document.getElementById("lorry_number").value;
        var from1 = document.getElementById("from").value;
        var to1 = document.getElementById("to").value;
        var depots = document.getElementById("depots").value;
        var lorry_number = document.getElementById("lorry_number").value;

        const format1 = "YYYY-MM-DD HH:mm:ss";

        from = moment(from1).format(format1);
        to = moment(to1).format(format1);
        var len_vehi = v_id.length;
        var parts = depots.split(',');

        if (lorry_number != "" && from1 != "" && to1 != "" && depots != "") {
            

            // Extract latitude and longitude

            $.ajax({
                url: 'all_alerts_checks.php',
                type: 'POST',
                data: {
                    vehicle_id: lorry_number,
                    from: from,
                    to: to,
                    depo: depots
                },
                beforeSend: function() {
                    // $('#insert').val("Updating");
                    $("#geted").prop("disabled", true);
                    $("#loader").show();
                },
                success: function(data) {
                    data = JSON.parse(data)

                    console.log(data)
                    var len = data.length;
                    //alert("len "+len)
                  

                    if (len > 0) {
                        if (hs != 0) {

                            remove_line();
                        }


                        for (var i = 0; i < len; i++) {
                            (function() {
                                var a_lat = data[i].alert_latitude;
                                var a_lng = data[i].alert_longitude;
                                var name = data[i].name;
                                var type = data[i].type;
                                var message = data[i].message;
                                var location = data[i].location;
                                var created_at = data[i].created_at;
                                var positiona = new google.maps.LatLng(a_lat, a_lng);

                                var icons = '';
                                if (type == 'NR With Load' || type == 'NR' || type ==
                                    'NR with Load Vehicle') {
                                    icons =
                                        'https://iconape.com/wp-content/png_logo_vector/electric-power-sign-logo.png';
                                } else if (type == 'Un-Authorized Stop') {
                                    icons =
                                        'https://cdn.pixabay.com/photo/2020/04/24/15/13/panel-5087276_1280.png';
                                } else if (type == 'Night time violations') {
                                    icons =
                                        'https://icon-library.com/images/car-wash-icon-png/car-wash-icon-png-2.jpg';
                                } else if (type == 'Overspeed' || type ==
                                    'Overspeed with Load Vehicle') {
                                    icons =
                                        'https://w7.pngwing.com/pngs/667/937/png-transparent-computer-icons-measurement-social-media-performance-metric-fast-speed-text-measurement-logo-thumbnail.png';
                                }

                                var marker = new google.maps.Marker({
                                    position: positiona,
                                    map: map,
                                    icon: {
                                        url: icons,
                                        scaledSize: new google.maps.Size(40, 40)
                                    },
                                });

                                markersArray.push(marker);

                                var infowindow = new google.maps.InfoWindow({
                                    content: '<div style="width:160px">Details:' +
                                        '<p>Vehical # :' + name +
                                        '</p>' + '<p>Stop Location # :' + location + '</p>' +
                                        '<p>Latitude:' + a_lat +
                                        '</p>' + '<p>Longitude:' + a_lng + '</p>' + '<p>Type:' +
                                        type + '</p>' +
                                        '<p>Message:' + message + '</p><div>'
                                });

                                marker.addListener('click', function() {
                                    infowindow.open(map, marker);
                                });
                            })();
                        }

                        

                       

                    } else {
                        // alert("No Data Found");
                        if (hs != 0) {
                          
                            remove_line();
                        }
                    }
                    var latitude = parseFloat(parts[0]);
                        var longitude = parseFloat(parts[1]);
                        var circleOptions = {
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35,
                            map: map,
                            center: {
                                lat: latitude,
                                lng: longitude
                            }, // Center the circle on the map center
                            radius: 10000 // 10km in meters
                        };

                        // Create circle object
                        var circle = new google.maps.Circle(circleOptions);
                        const newCenter = {
                            lat: latitude,
                            lng: longitude
                        };
                        // Set the new center
                        map.setCenter(newCenter);
                        // You can optionally adjust the zoom level as well
                        map.setZoom(12);
                    myFunction();


                    hs++;

                },
                complete: function(data) {
                    // Hide image container
                    // $("#loader").hide();
                    $("#geted").prop("disabled", false);
                }
            });
        } else {
            alert("Please Select Value")
        }

    }
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>