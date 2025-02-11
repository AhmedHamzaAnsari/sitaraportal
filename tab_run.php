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
    <link href="assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css">


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

    #content {
        margin: 0 !important
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$id = $_GET['id'];
$qry = mysqli_query($db,"SELECT * FROM positions where device_id='$id' order by id DESC limit 1"); // select query
$data11 = mysqli_fetch_array($qry); 

?>

<body class="sidebar-noneoverflow starterkit">
    <script>
    var arr2 = [];
    </script>
    <script>
    var markersArray = [];
    var flightPlanCoordinates = [];
    </script>
    <!--  BEGIN NAVBAR  -->

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content mt-5" style="background-color:#FFFFFF">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3"
                        style="width: 350px;height: 100vh; overflow-y:auto ;position: absolute;   z-index: 1 ; background: #FFFFFF">
                        <div class="container mt-4 ">
                            <div class="row" style="display: flex;justify-content: center;">
                                <p class="numPlate"> <?php echo $data11['vehicle_id']?></p>
                            </div>
                        </div>
                        <div class="container-fluid mt-4">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-car  " aria-hidden="true"
                                        style="font-size: 20px; font-weight: 1; "></i>

                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class="vertical-center"
                                            style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                            <?php echo $data11['vehicle_id']?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-city" aria-hidden="true"
                                        style="font-size: 20px; font-weight: 1; "></i>

                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class=""
                                            style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;"
                                            id="locating">
                                            <?php echo $data11['vlocation']?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <i class="fa fa-tachometer-alt  " aria-hidden="true"
                                        style="font-size: 20px; font-weight: 1; "></i>

                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class="vertical-center"
                                            style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;"
                                            id="speeding">
                                            <?php echo $data11['speed']?> km/h
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <?php if ($data11['speed']>0) { ?>
                                <div class="col-md-2">
                                    <i class="fa fa-car text-success " aria-hidden="true"
                                        style="font-size: 20px; font-weight: 20; "></i>

                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class="vertical-center"
                                            style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                            Moving <span id="timmming">( <?php echo $data11['time']?> )</span>
                                        </p>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="col-md-2">
                                    <i class="fa fa-car text-danger " aria-hidden="true"
                                        style="font-size: 20px; font-weight: 20; "></i>

                                </div>
                                <div class="col-md-10" style="">
                                    <div class=" ">
                                        <p class="vertical-center"
                                            style="font-size: 15px;opacity: 0.9; width: 177px font-weight: bold; color: #686868;">
                                            Parked <span id="timmming">( <?php echo $data11['time']?> )</span>
                                        </p>
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="col-md-12 mt-5">
                                    <ul class="list-group list-group-icons-meta" id="consignee_list">
                                        <li class="list-group-item list-group-item-action">
                                            <div class="media">

                                                <div class="media-body">
                                                    <h6 class="tx-inverse">Consignee Name</h6>
                                                </div>
                                            </div>
                                        </li>


                                    </ul>
                                </div>

                                <script>
                                var lat1 = "<?= $data11['latitude']; ?>";
                                var id = "<?= $data11['longitude']; ?>";
                                // var name1 = "<%=data.name %>";
                                var name1 =
                                    '<div class="container" style="width: 100%; height: auto; "><div class="row"><div class="col-md-12"><p style="font-weight: bold; color:#000;text-align:center"><?= $data11['altitude']; ?></p></div></div></div>';
                                var lng1 = "<?= $data11['longitude']; ?>";
                                var speed = "<?= $data11['speed']; ?>";
                                var round = Math.round(speed);
                                //console.log(lat+","+lng+","+name1);
                                // arr.push({ val: lat1 + "," + lng1 + "," + name1, text: lat1 + "," + lng1 });
                                arr2.push([name1, lat1, lng1, id, speed], );
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
    let map;

    function initMap() {

        // console.log(arr2);

        gmarkers = [];
        var lati = new google.maps.LatLng(lat1, lng1)
        map = new google.maps.Map(document.getElementById("mapid"), {
            center: lati,
            zoom: 10,
        });
        var trip_id = id;
        let url_str = window.location.href;

        let url = new URL(url_str);
        let search_params = url.searchParams;
        var v_id = search_params.get('id');
        var trrip_id = search_params.get('trip');
        var starting_time, completed, sub_first_trip_id,sub_last_trip_id;
        // alert(trrip_id)
        $.ajax({
            url: 'get_tab_postion.php',
            type: 'POST',
            data: {
                trip_id: trrip_id,
                lorry_id: v_id,

            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data)
                var len = data.length;
                // alert(len)
                var i = 0;


                while (i < len) {
                    if (i == 0) {
                        starting_time = data[i][2];
                        sub_first_trip_id = data[i][4];
                        completed = data[i][3];
                        console.log(starting_time + " " + sub_first_trip_id  + " " + completed )
                    }
                   
                    console.log(i);
                    var name = data[i][0];
                    var coordinate = data[i][1];
                    var myArr = coordinate.split(",");
                    var pos_lat = myArr[0];
                    var pos_lng = myArr[1];
                    console.log(pos_lat + " " + pos_lng)
                    marker_creation(pos_lat, pos_lng, name)
                    $('#consignee_list').append(`<li class="list-group-item list-group-item-action">
                                            <div class="media">
                                              
                                                <div class="media-body">
                                                    <h6 class="tx-inverse">"${name}"</h6>
                                                </div>
                                            </div>
                                        </li>`);



                    // if(i==(len-1)){
                    //     completed = data[i][3];
                    // }
                    i++;
                };

                // alert(completed)
                // 
                // alert(completed)

                $.ajax({

                    url: 'get_trip_new_line.php',
                    type: 'POST',
                    data: {
                        vehicle: v_id,
                        trip_id: trrip_id,
                        starting_time: starting_time,
                        sub_first_trip_id: sub_first_trip_id,


                    },
                    success: function(data) {

                        data = JSON.parse(data);
                        console.log(data);

                        var len = data.length;
                        if (len > 0) {

                            const lineSymbol = {
                                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                            };


                            var i = 0;
                            const image = "images/rec.png";
                            const start = "images/icon/start1.png";
                            const end = "images/icon/car_red.png";
                            const stops = "images/stop-sign1.png";
                            data.forEach(obj => {

                                var vehicle_name = data[i][0];
                                var lat = data[i][1];
                                var lng = data[i][2];
                                var speed = data[i][3];
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
                                        content: '<p>Details:' +
                                            '<p>Vehical # :' +
                                            vehicle_name +
                                            '</p>' + '<p>Latitude:' + lat +
                                            '</p>' +
                                            '<p>Longitude:' + lng + '</p>' +
                                            '<p>' +
                                            '</p>' + '<p>Start Time:' + time +
                                            '</p>'
                                    });
                                    marker.addListener('click', function() {
                                        infowindow.open(map, marker);
                                    });
                                }




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

                        }





                    }
                });

            }
        });



        function marker_creation(lat, lng, consignee) {
            const image = "images/pump.png";
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
                content: '<p>Details:' + '<p>Consignee # :' + consignee + '</p>'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

        }



        var infowindow = new google.maps.InfoWindow();

        const image = "images/icon/car_icon_blue.png";
        const fimage = "images/icon/car_icon_green.png";
        const mark = (speed > 0) ? fimage : image;

        function createMarker(latlng, html) {
            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: mark
            });

            map.addListener('click', function(e) {
                // animatedMove(marker, .15, marker.position, e.latLng);
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(html);
                infowindow.open(map, marker);
            });
            google.maps.event.addListener(marker, 'mouseover', function() {
                infowindow.setContent(html);
                infowindow.open(map, marker);
            });
            google.maps.event.addListener(marker, 'mouseout', function() {
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


            id = search_params.get('id');


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
                    document.getElementById("speeding").innerHTML = speed + " km/hr";
                    document.getElementById("locating").innerHTML = location;
                    document.getElementById("timmming").innerHTML = time;
                    // console.log("last Odometer " +lastOdometer)

                    if (ignition == false) {
                        animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati,
                            lngi));
                    }
                    /// console.log(data[0]['latitude'] + "," + data[0]['longitude'])
                    else {
                        animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati,
                            lngi));
                        map.setCenter(new google.maps.LatLng(lati, lngi));
                    }

                    // setMarker(data.latitude,data.longitude,data.speed,device_id,data.altitude,data.vlocation,data.record_creation_time)




                }
            });




        }, 1000 * 40);


    }

    function animatedMove(marker, t, current, moveto) {
        var lat = current.lat();
        var lng = current.lng();

        var deltalat = (moveto.lat() - current.lat()) / 100;
        var deltalng = (moveto.lng() - current.lng()) / 100;

        var delay = 10 * t;
        for (var i = 0; i < 100; i++) {
            (function(ind) {
                setTimeout(
                    function() {
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