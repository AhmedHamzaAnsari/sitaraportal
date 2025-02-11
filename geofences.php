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
    <title>INDEMNIFIER GEOFENCE</title>
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
<?php
include("config_indemnifier.php");
if(isset($_POST['add_geo'])){

    $name = mysqli_real_escape_string($db,$_POST['name']);
    $type = mysqli_real_escape_string($db,$_POST['type']);
    $time = mysqli_real_escape_string($db,$_POST['time']);
    $lati = mysqli_real_escape_string($db,$_POST['lati']); 
    $radi = mysqli_real_escape_string($db,$_POST['radius']);  
    $code1 = mysqli_real_escape_string($db,$_POST['code1']); 
    $address = mysqli_real_escape_string($db,$_POST['address']); 
    $district = mysqli_real_escape_string($db,$_POST['district']); 
    $province = mysqli_real_escape_string($db,$_POST['province']); 
    $code2 = mysqli_real_escape_string($db,$_POST['code2']); 
    $salegroup = mysqli_real_escape_string($db,$_POST['salegroup']); 
    $slocation = mysqli_real_escape_string($db,$_POST['slocation']); 
    $type = mysqli_real_escape_string($db,$_POST['type']); 
    $geotype = mysqli_real_escape_string($db,$_POST['geotype']); 
    // $longi = mysqli_real_escape_string($db,$_POST['longi']); 
    // $radius = mysqli_real_escape_string($db,$_POST['radius']); 
    $u_id = $_SESSION['userid'];

    

       
    
    
   
    
    $sql = "INSERT INTO geofenceing(code,consignee_name,location,District,Province,Code2,Coordinates,radius,Sales_Group,Supply_Location,userid,type,geotype)VALUES
('$code1','$name','$address','$district','$province','$code2','$lati','$radi','$salegroup','$slocation','$u_id','$type','$geotype')";
        echo $sql;

    if (mysqli_query($db, $sql)) {
        // echo '<script>alert("New record created successfully")</script>';
        echo "<script>
alert('New record created successfully');
window.location.href='geofences.php';
</script>";
    } else {
        // $erre ="Error: " . $sql . "<br>" . mysqli_error($db);
        echo "<script>alert('Error: '. $sql);</script>";
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    

    
   
    


}
$distict_query = mysqli_query($db,"SELECT distinct(District) FROM geofenceing;");
$province_query = mysqli_query($db,"SELECT distinct(Province) FROM geofenceing;");
$salegroup_query = mysqli_query($db,"SELECT distinct(Sales_Group) FROM geofenceing;");
$slocation_query = mysqli_query($db,"SELECT distinct(Supply_Location) FROM geofenceing;");
$geotype_query = mysqli_query($db,"SELECT distinct(geotype) FROM geofenceing;");
?>

<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>GEOFENCE</h3>
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

                    <div class="col-md-12" style="padding :0 !important">
                        <div id="map-canvas" style="width: 100%; height: 100vh; z-index: 0;" class="">

                        </div>
                        <div class="col-md-3"
                            style="position: absolute; top: 60px ;  z-index: 1 ; background: transparent; ">

                            <div class="card component-card_9" style="padding: 30px; width: 400px; ">
                                <form action="geofences.php" method="POST">

                                    <!-- <div class="row mb-4">
                                        
                                       
                                        <div class="col-md-12">

                                            <label for="" style="color: #fff;">Type<span>*</span></label>
                                            <select class="selectpicker" required data-width="100%" id="type" name="type">
                                                <option>Select Type</option>
                                                <option value="circle">Circle</option>
                                                <option value="polygone">Polygone</option>
                                            </select>
                                        </div>



                                    </div> -->
                                    <div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="name" name="name"
                                                placeholder="Enter Name" required>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="address" name="address"
                                                placeholder="Enter Address" required>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="code1" name="code1"
                                                placeholder="Enter CODE 1" required>
                                        </div>




                                    </div>
									
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="code2" name="code2"
                                                placeholder="Enter CODE 2" required>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                           <select class="selectpicker" required data-width="100%" id="district" name="district">
                                                <option>Select District</option>
												<?php  while($row_district = mysqli_fetch_array($distict_query)) { ?>
                                                <option value="<?php echo $row_district['District'];?>"><?php echo $row_district['District'];?></option>
												<?php } ?>
                                            </select>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                           <select class="selectpicker" required data-width="100%" id="province" name="province">
                                                <option>Select Province </option>
												<?php  while($row_province = mysqli_fetch_array($province_query)) { ?>
                                                <option value="<?php echo $row_province['Province'];?>"><?php echo $row_province['Province'];?></option>
												<?php } ?>
                                            </select>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                           <select class="selectpicker" required data-width="100%" id="salegroup" name="salegroup">
                                                <option>Select Sales Group </option>
												<?php  while($row_salegroup = mysqli_fetch_array($salegroup_query)) { ?>
                                                <option value="<?php echo $row_salegroup['Sales_Group'];?>"><?php echo $row_salegroup['Sales_Group'];?></option>
												<?php } ?>
                                            </select>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                           <select class="selectpicker" required data-width="100%" id="slocation" name="slocation">
                                                <option>Select Supply Location </option>
												<?php  while($row_slocation = mysqli_fetch_array($slocation_query)) { ?>
                                                <option value="<?php echo $row_slocation['Supply_Location'];?>"><?php echo $row_slocation['Supply_Location'];?></option>
												<?php } ?>
                                            </select>
                                        </div>




                                    </div>
									<div class="row mb-4">

                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Location Name <span>*</span></label> -->
                                           <select class="selectpicker" required data-width="100%" id="geotype" name="geotype">
                                                <option>Select Geo Type </option>
												<?php  while($row_geotype = mysqli_fetch_array($geotype_query)) { ?>
                                                <option value="<?php echo $row_geotype['geotype'];?>"><?php echo $row_geotype['geotype'];?></option>
												<?php } ?>
                                            </select>
                                        </div>




                                    </div>

                                    <div class="row mb-4" style="display:none;">
                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Date Time <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="time" name="time"
                                                placeholder="Enter Time">
                                        </div>



                                    </div>
									<div class="row mb-4"  style="display:none;">
                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Date Time <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="radius" name="radius"
                                                placeholder="Radius">
                                        </div>



                                    </div>
                                    <div class="row mb-4"  style="display:none;">
                                        <div class="col-md-12">

                                            <!-- <label for="" style="color: #fff;">Latitude <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="lati" name="lati"
                                                placeholder="Enter Latitude">
                                        </div>

                                        <!-- <div class="col-md-6">
                                            <label for="" style="color: #fff;">Longitude <span>*</span></label>
                                            <input type="text" class="form-control input" id="longi" name="longi"
                                                placeholder="Enter longitude">
                                        </div> -->


                                    </div>
                                    <div class="row mb-4"  style="display:none;">

                                        <div class="col-md-12">
                                            <!-- <label for="" style="color: #fff;">Longitude <span>*</span></label> -->
                                            <input type="text" class="form-control input" id="type" name="type"
                                                placeholder="Enter Type">
                                        </div>

                                    </div>
                                    <input type="submit" class="btn " name="add_geo"
                                        style="background-color: #fff; color: #000; font-weight: bold;">
                                </form>

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

    <!-- <script src="plugins/apex/custom-apexcharts.js"></script> -->






    <script>
    let map;
    var circle;

    function initMap() {

        gmarkers = [];
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: {
                lat: 30.3753,
                lng: 69.3451
            },
            zoom: 6,

        });


        const drawingManager = new google.maps.drawing.DrawingManager({
            // drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                    google.maps.drawing.OverlayType.CIRCLE,
                    google.maps.drawing.OverlayType.POLYGON,
                ],
            },
            // markerOptions: {
            //   icon:
            //     "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
            // },
            circleOptions: {
                fillColor: "lightGreen",
                fillOpacity: 0.4,
                strokeWeight: 5,
                clickable: false,
                editable: true,
                zIndex: 1,
            },
        });
        drawingManager.setMap(map);
        google.maps.event.addListener(drawingManager, 'circlecomplete', onCircleComplete);
        google.maps.event.addListener(drawingManager, 'polygoncomplete', polygon);
    }
    var circle_point = [];

    function onCircleComplete(shape) {
        if (shape == null || (!(shape instanceof google.maps.Circle))) return;

        if (circle != null) {
            circle.setMap(null);
            circle = null;
        }

        circle = shape;
        // console.log('radius', circle.getRadius());
        // console.log('lat', circle.getCenter().lat());
        // console.log('lng', circle.getCenter().lng());

        var radius = circle.getRadius();
        // console.log(radius);
        var cirlat = circle.getCenter().lat();
        // console.log(cirlat);
        var cirlng = circle.getCenter().lng();
        // console.log(cirlng);

        var time = new Date();
        var currentTime = time.toLocaleString();
        circle_point.push(cirlat + "," + cirlng)
        console.log(circle_point)

        // alert(n);

        // alert(" lat => "+ cirlat +" long => "+ cirlng+"Radius => "+radius );
        document.getElementById("lati").value = circle_point;
        document.getElementById("time").value = currentTime;
        document.getElementById("radius").value = radius;
        document.getElementById("type").value = 'circle';
        circle_point = [];
        // document.getElementById("longi").value = cirlng;
        // document.getElementById("radius").value = radius;
    }
    var poly_points = [];

    function polygon(polygon) {
        var coordStr = "";
        for (var i = 0; i < polygon.getPath().getLength(); i++) {
            coordStr += polygon.getPath().getAt(i).toUrlValue(6) + ";";
            // document.getElementById('coords').value = coordStr;

        }
        poly_points.push(coordStr)
        console.log(poly_points);
        var time = new Date();
        var currentTime = time.toLocaleString();
        document.getElementById("time").value = currentTime;
        document.getElementById("lati").value = poly_points;
        document.getElementById("type").value = 'polygon';

        poly_points = [];



    }
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>