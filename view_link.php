<?php
    include("config_indemnifier.php");

    $id__sms = base64_decode($_GET['c']);
    // echo base64_encode('650');
    $qry_sms = mysqli_query($db,"SELECT sl.sub_id,ts.status FROM sms_link as sl join trip_sub as ts on ts.id=sl.sub_id where ts.id='$id__sms'"); // select query
    $sms_result = mysqli_fetch_array($qry_sms); 

    $status = $sms_result['status'];
    
?>

<!--  -->
<?php if($status == '0'){?>
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
    <link rel="stylesheet" href="css/cardss.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>

    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<style>
#collaps_col {
    width: 350px !important;
    height: 100vh !important;
    overflow-y: auto !important;
    position: absolute !important;
    z-index: 1 !important;
    background: #FFFFFF
}

#closebtn {
    display: none;
}

@media screen and (max-width: 450px) {
    #collaps_col {
        width: 0 !important;
        padding: 0 !important;
    }

    #closebtn {
        display: block;
    }

    #open__ {
        position: absolute !important;
        z-index: 1 !important;
        top: 20x !important;
        display: inline-block !important
    }
}

/* #open__:active {
        width: 350px !important;
    } */
#closebtn {
    font-size: 50px;
    position: absolute;
    /* float: right; */
    right: 10px;
    color: #fff;
}

#open__ {
    top: 59px;
    left: 5px;
    padding: 10px;
    background-color: #fff;
}
</style>
<script>
var trip_id;
var car_id;
var start_date;
</script>
<?php
// include("config_indemnifier.php");
$id = base64_decode($_GET['c']);
$qry = mysqli_query($db,"SELECT ts.*,pos.vlocation,pos.speed,pos.time,pos.latitude,pos.longitude,pos.vehicle_id,pos.device_id FROM trip_sub as ts join positions as pos on ts.vehicle_id=pos.device_id where ts.id='$id' order by pos.time desc limit 1"); // select query
$data11 = mysqli_fetch_array($qry); 

?>

<body class="sidebar-noneoverflow starterkit">
    <script>
    var arr2 = [];
    var markersArray = [];
    var flightPlanCoordinates = [];
    var flightPlanCoordinates_new = [];
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

                    <span id="open__" style="font-size:30px;cursor:pointer ;display: none"
                        onclick="openNav()">&#9776;</span>

                    <div class="col-md-3" id="collaps_col" style="">






                        <script>
                        trip_id = "<?= $data11['id']; ?>";
                        car_id = "<?= $data11['device_id']; ?>";
                        start_date = "<?= $data11['start_time']; ?>";
                        var lat1 = "<?= $data11['latitude']; ?>";
                        var id = "<?= $data11['longitude']; ?>";
                        var name1 = '<p>Details:</p>' + '<p>Vehicle # : <?= $data11['vehicle_id']; ?></p>' +
                            '<p>Location  <?= $data11['vlocation']; ?></p>' +
                            '<p>Speed :<?= $data11['speed']; ?> km/hr</p>' + '<p>Time :<?= $data11['time']; ?></p>';
                        // var name1 = '<div class="container" style="width: 100%; height: auto; "><div class="row"><div class="col-md-12"><p style="font-weight: bold; color:#000;text-align:center"><?= $data11['vehicle_id']; ?></p><div class="row"><div class="col-md-12"><label for="" style="width: 33.33%; font-size: 12px; color:#000">Location:</label><span id="odometerinfo" style="color: #000;"><?= $data11['vlocation']; ?></span></div><div class="col-md-12"><label for=""style="width: 33.33%; font-size: 12px;  color:#000">Speed :</label><span style="color: #000;"><?= $data11['speed']; ?> km/h</span></div></div></div></div></div>';
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



                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                                <div class="widget widget-account-invoice-three">
                                    <a href="javascript:void(0)" id="closebtn" onclick="closeNav()">&times;</a>


                                    <div class="widget-heading">
                                        <div class="wallet-usr-info">
                                            <div class="usr-name">
                                                <span><?php echo $data11['vehicle_id']?></span>
                                            </div>

                                        </div>
                                        <!-- <div class="wallet-balance">
                                    <p>Order Quee</p>
                                    <h5 class=""><span class="w-currency"> </span><?php echo $data11['del_order']?></h5>
                                </div> -->
                                        <div class="wallet-balance">
                                            <p>Speed</p>
                                            <h5 class="" id="speeding"><span class="w-currency">
                                                </span><?php echo $data11['speed']?> Km/hr</h5>
                                        </div>


                                        <?php if ($data11['speed']>0) { ?>
                                        <div class="wallet-balance">
                                            <p>Status</p>
                                            <h5 class=""><span class="w-currency"> </span>Moving</h5>
                                        </div>
                                        <?php } else { ?>
                                        <div class="wallet-balance">
                                            <p>Status</p>
                                            <h5 class=""><span class="w-currency"> </span>Parked</h5>
                                        </div>
                                        <?php } ?>
                                        <div class="wallet-balance">
                                            <p>Time</p>
                                            <h5 class="" id="timmming"><span class="w-currency">
                                                </span><?php echo $data11['time']?> </h5>
                                        </div>
                                        <div class="wallet-balance">
                                            <p>Base</p>
                                            <h5 class="" id="base_area"><span class="w-currency"> </span></h5>
                                        </div>
                                        <div class="wallet-balance">
                                            <p id="locating"><?php echo $data11['vlocation']?></p>
                                        </div>


                                    </div>

                                    <div class="widget-amount">

                                        <div class="w-a-info funds-received">
                                            <span>Consignee Detail </span>
                                            <p><?php echo $data11['consignee_name']?></p>
                                            <p><?php echo $data11['eta']?></p>
                                            <p><?php echo $data11['products']?></p>
                                            <p><?php echo $data11['quantity']?> Ltr</p>
                                        </div>


                                    </div>



                                </div>
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
    function openNav() {
        // document.getElementById("collaps_col").style.width = "350px !important";
        var x = document.querySelectorAll("#collaps_col");
        x[0].style.setProperty("width", "350px", "important");
        // document.getElementById("mySidenav").style.padding = "0 15px";
    }

    function closeNav() {
        // document.getElementById("collaps_col").style.width = "0 !important";
        var x = document.querySelectorAll("#collaps_col");
        x[0].style.setProperty("width", "0px", "important");
    }
    </script>


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
        // var trip_id = id;
        // let url_str = window.location.href;

        // let url = new URL(url_str);trip_id
        // let search_params = url.searchParams;
        // var v_id = search_params.get('id');
        var v_id = trip_id;
        $.ajax({
            url: 'get_tab_position.php',
            type: 'POST',
            data: {
                trip_id: v_id
            },
            success: function(data) {
                data = JSON.parse(data);
                // alert("Hamza")
                // console.log(data)
                var len = data.length;
                // alert(len)
                var i = 0;

                while (i < len) {

                    // console.log(i);
                    var name = data[i][5];
                    var coordinate = data[i][3];
                    // alert(coordinate);
                    var myArr = coordinate.split(",");
                    var pos_lat = myArr[0];
                    var pos_lng = myArr[1];

                    var product = data[i][6];
                    var quantity = data[i][7];
                    var condignr_no = data[i][8];
                    var del_que = data[i][9];
                    var eta = data[i][10];
                    // console.log(pos_lat + " " + pos_lng)
                    marker_creation(pos_lat, pos_lng, name, product, quantity, condignr_no, del_que, eta)




                    i++;
                };
            }
        });
        $.ajax({
            url: 'get_tab_position.php',
            type: 'POST',
            data: {
                stage_area: v_id
            },
            success: function(data) {
                data = JSON.parse(data);
                // alert("stage")
                // console.log(data)
                var len = data.length;
                // alert(len)
                var i = 0;

                while (i < len) {

                    // console.log(i);
                    var name = data[i][0];
                    var coordinate = data[i][1];
                    var eta = data[i][2];
                    // alert(coordinate);
                    var myArr = coordinate.split(",");
                    var pos_lat = myArr[0];
                    var pos_lng = myArr[1];


                    create_consignee(pos_lat, pos_lng, name, eta, 'Stage Area')




                    i++;
                };
            }
        });
        $.ajax({
            url: 'get_tab_position.php',
            type: 'POST',
            data: {
                base_area: v_id
            },
            success: function(data) {
                data = JSON.parse(data);
                // alert(data)
                console.log(data)
                var len = data.length;
                // alert(len)
                var i = 0;

                while (i < len) {

                    // console.log(i);
                    var name = data[i][0];
                    var coordinate = data[i][1];
                    var start_time = data[i][2];
                    // alert(coordinate);
                    var myArr = coordinate.split(",");
                    var pos_lat = myArr[0];
                    var pos_lng = myArr[1];
                    // $('#base_area').val(name)
                    document.getElementById("base_area").innerHTML = name;


                    create_consignee(pos_lat, pos_lng, name, start_time, "Base Area")




                    i++;
                };
            }
        });
        date = moment().format('YYYY-MM-DD HH:mm:ss');
        $.ajax({
            url: 'get_trip_line.php',
            type: 'POST',
            data: {
                vehicle: car_id,
                from: start_date,
                to: date
            },
            success: function(data) {

                data = JSON.parse(data);
                // console.log(data);

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
                                content: '<p>Details:' + '<p>Vehical # :' +
                                    vehicle_name +
                                    '</p>' + '<p>Latitude:' + lat + '</p>' +
                                    '<p>Longitude:' + lng + '</p>' + '<p>' +
                                    '</p>' + '<p>Start Time:' + time + '</p>'
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
                    console.log("Data Not Found");

                }





            }
        });

        function marker_creation(lat, lng, consignee, product, quantity, condignr_no, del_que, eta) {
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
                content: '<p>Details:</p>' + '<p>Consignee  :' + consignee + '</p>' + '<p>Product  :' +
                    product + '</p>' + '<p>Quantity  :' + quantity + '</p>' + '<p>Consignee No  :' +
                    condignr_no + '</p>'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

        }

        function create_consignee(lat, lng, consignee, eta, name) {
            var time_type;
            if (name === 'Base Area') {
                time_type = 'Start Time'
            } else {
                time_type = 'Estimated Time'

            }
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
                content: '<p>Details:</p>' + '<p>' + name + '  :' + consignee + '</p>' + '<p>' + time_type +
                    '  :' + eta + '</p>'
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
            // let url_str = window.location.href;

            // let url = new URL(url_str);
            // let search_params = url.searchParams;


            // id = search_params.get('id');
            var __id = car_id;
            // alert(__id)


            $.ajax({
                url: 'get_run_lat_lng.php',
                type: 'POST',
                data: {
                    check: __id
                },
                success: function(data) {
                    data = JSON.parse(data)
                    console.log(data)

                    lati = data.latitude;
                    lngi = data.longitude;
                    var location = data.vlocation;
                    // console.log("==> " + lati);
                    // console.log(marker.position);
                    var speed = data.speed;
                    var time = data.time;

                    const lineSymbol = {
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                    };

                    lati = parseFloat(lati)
                    lngi = parseFloat(lngi)
                    var position = new google.maps.LatLng(lati, lngi);
                    flightPlanCoordinates_new.push({
                        lat: lati,
                        lng: lngi
                    });

                    var ignition = data.power;
                    document.getElementById("speeding").innerHTML = speed + " km/hr";
                    document.getElementById("locating").innerHTML = location;
                    document.getElementById("timmming").innerHTML = time;

                    if (ignition == false) {
                        animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati,
                            lngi));
                    }
                    /// console.log(data[0]['latitude'] + "," + data[0]['longitude'])
                    else {
                        animatedMove(marker, .5, marker.position, new google.maps.LatLng(lati,
                            lngi));
                        map.setCenter(new google.maps.LatLng(lati, lngi));
                        flightPath = new google.maps.Polyline({
                            path: flightPlanCoordinates_new,
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
<?php }else{?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Expired</title>
</head>

<body>
    <h1>Link Expired ...!</h1>
</body>

</html>
<?php }?>