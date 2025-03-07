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
    <title>Go Get Going With Go </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
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

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
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

    /* .component-card_3 .card-body h5.card-user_name{
            color: #f47621;
        } */
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

    .component-card_7 {
        width: 100% !important;
    }

    .caret::before {
        display: none !important;
    }

    .car_upper {
        text-transform: uppercase !important;
    }
    </style>

    <?php function clean($string) {
        $string=str_replace('', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    }

    $todate=date("Y-m-d H:i:s", time());
    $prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 day'));
    include("config_indemnifier.php");
    
    $id=1;;

    $user_id=$_SESSION['userid'];

    $froming = $_GET['from'];
    $toing = $_GET['to'];


    


    $result12=mysqli_query($db, "SELECT
    a.*
  FROM
    (SELECT * From sapstart where datetime >='$froming' and datetime <='$toing'
      UNION 
     SELECT  * From sapend where datetime >='$froming' and datetime <='$toing')  AS a ");
    $count_t_loads= mysqli_num_rows($result12);
    $result13=mysqli_query($db, "SELECT * FROM sapstart as ss 
    
    where ss.datetime >='$froming' and ss.datetime <='$toing' order by ss.id desc");
    $count_trip_start= mysqli_num_rows($result13);
    
    $result14=mysqli_query($db, "SELECT * FROM sapend as ss 
    
    where ss.datetime >='$froming' and ss.datetime <='$toing' order by ss.id desc");
    $count_trip_end= mysqli_num_rows($result14);
    $result15=mysqli_query($db, "SELECT * FROM sapend as ss 
    
     where ss.tlno not IN(SELECT name from devicesnew) and 
     ss.datetime >='$froming' and ss.datetime <='$toing'  order by ss.id desc");
    $count_trip_end_not_inte= mysqli_num_rows($result15);

    $result16=mysqli_query($db, "SELECT * FROM sapend as ss 
    
    where ss.deliveryno not IN(select deliveryno from sapstart) and ss.datetime >='$froming' and ss.datetime <='$toing'  order by ss.id desc");
    $count_not_open= mysqli_num_rows($result16);
    
    $result17=mysqli_query($db, "SELECT ss.deliveryno,ss.datetime,se.datetime,se.tlno,ss.dname FROM sapstart ss 
    join sapend as se on se.deliveryno = ss.deliveryno  
    
    where ss.tlno NOT IN(select name from devicesnew) AND ss.datetime >='$froming' and ss.datetime <='$toing'  order by ss.id desc");
    $count_trip_not_comp= mysqli_num_rows($result17);
    
    $result18=mysqli_query($db, "SELECT * FROM sapstart as ss 
    
    where ss.tlno not IN(SELECT name from devicesnew) and ss.deliveryno not in(SELECT deliveryno from sapend) and ss.datetime >='$froming' and ss.datetime <='$toing' order by ss.id desc");
    $count_not_inte= mysqli_num_rows($result18);

    $result_trip_comp=mysqli_query($db, "SELECT ss.deliveryno,ss.datetime as starttime,se.datetime as endtime,se.tlno,se.dname FROM sapstart ss 
    join sapend as se on se.deliveryno = ss.deliveryno  
    
    where ss.tlno IN(select name from devicesnew)AND  ss.datetime >='$froming' and ss.datetime <='$toing'  order by ss.id desc");
    $count_trip_comp= mysqli_num_rows($result_trip_comp);
    
    $result_trip_vehicle=mysqli_query($db, "SELECT sp.*,dc.location as vlocation,dc.time,dc.speed FROM sapstart as sp 
    left join devicesnew as dc on dc.name=sp.tlno
    left join users_devices_new as ud on ud.devices_id=dc.id
    where sp.tlno IN(SELECT name from devicesnew) and sp.deliveryno NOT IN(select deliveryno from sapend)and sp.datetime >='$froming' and sp.datetime <='$toing'  order by sp.id desc");
    $count_on_trip= mysqli_num_rows($result_trip_vehicle);
    ?>


    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="sidebar-noneoverflow starterkit">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <script>
    var arr_car = [];
    var car_lable = [];
    </script>
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Dashboard</h3>
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

            <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> -->

                </li>
            </ul>

            <ul class="navbar-item flex-row navbar-dropdown">

                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" onClick="window.location.reload();" class="nav-link dropdown-toggle"
                        id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-refresh-ccw">
                            <polyline points="1 4 1 10 7 10"></polyline>
                            <polyline points="23 20 23 14 17 14"></polyline>
                            <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                        </svg>
                    </a>

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


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row mb-4">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">From</label>
                                    <input type="date" class="form-control" id="name_date" name="name"
                                        value="<?php echo $_GET['from']?>" placeholder="Select date" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">to</label>
                                    <input type="date" class="form-control" id="name_from" name="name"
                                        value="<?php echo $_GET['to']?>" placeholder="Select date" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-primary " style="margin-top:30px "
                                        onclick="go_route()">Get</button>
                                </div>
                            </div>

                        </div>

                        <script>
                        function go_route() {
                            var date = document.getElementById("name_date").value;
                            var dateto = document.getElementById("name_from").value;
                            // alert(date)

                            if (date === "") {
                                alert("Please Select date");
                            } else {
                                window.location.href = 'sap_dashboard.php?from=' + date + '&to=' + dateto;
                            }

                        }
                        </script>
                    </div>
                </div>
                <div class="row layout-top-spacing">


                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:##80a1f1 !important ;  cursor: pointer;"
                                        onclick="dis_all()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-car p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000"> Total Loads
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;">
                                                    <?php echo $count_t_loads; ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#f8cbad !important ;  cursor: pointer;"
                                        onclick="chup()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-route p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000"> Trip Start
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_trip_start; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#d6dce4 !important ;  cursor: pointer;"
                                        onclick="vehi_stop()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-stop-circle p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000"> Trip End
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_trip_end ; ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#fff2cc !important ;  cursor: pointer;"
                                        onclick="trip_complete()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-stop-circle p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000"> Trip Complete With Back
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_trip_comp; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#acb9ca !important ;  cursor: pointer;"
                                        onclick="ideal_state()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-pause p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000"> Trip Complete Not
                                                    Integrated</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_trip_not_comp; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#ff0000 !important ;  cursor: pointer;"
                                        onclick="speed_over()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tachometer-alt p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000"> Not Open By SAP</h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_not_open; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#f4b084 !important ;  cursor: pointer;"
                                        onclick="blacks()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tachometer-alt p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000">Trip Start Not Integrated
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_not_inte; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#d6dce4 !important ;  cursor: pointer;"
                                        onclick="activity_record()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-tasks p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000">Trip End Not Integrated
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_trip_end_not_inte; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mt-3">
                                <div class="card component-card_7">
                                    <div class="card-body" style="background:#8ebbb7 !important ;  cursor: pointer;"
                                        onclick="on_trips()">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="fas fa-car p-3"
                                                    style="box-shadow: 0px -1px 45px -1px rgb(74 67 67); border-radius: 50%;color: #000;"></i>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-user_name" style="color:#000">On Trip Vehicles
                                                </h6>

                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color: #000;"><?php echo $count_on_trip; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- list start -->


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="all_car">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <center>
                                    <h3 style="color: #24245c;">All Vehicle</h3>
                                </center>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result12)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#80a1f1 !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>






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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="moving_car">
                        <div class="widget-content widget-content-area br-6">

                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension1" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>





                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result13)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#f8cbad !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="moving_stop">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension2" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result14)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#d6dce4 !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="trip__comp">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension3" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>Start TIme</th>
                                            <th>End TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result_trip_comp)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#fff2cc !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["starttime"]; ?></td>
                                            <td><?php echo $row["endtime"]; ?></td>
                                            <td><a
                                                    href="sap_run.php?id=<?php echo $row["tlno"]; ?>&start=<?php echo $row["starttime"]; ?>&end=<?php echo $row["endtime"]; ?>">Track</a>
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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none"
                        id="activity_record">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension4" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result15)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper"
                                                style="background:#d6dce4  !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="speed_over">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension5" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result16)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="car_upper" style="background:#f8cbad !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="ideal_state">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension6" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result17)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>

                                            <td class="car_upper"
                                                style="background:#acb9ca  !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="api_nr">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension7" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme (Tracker Status)</th>
                                            <th>Location</th>
                                            <th>Speed</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result_trip_vehicle)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>

                                            <td class="car_upper"
                                                style="background:#8ebbb7   !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["time"]; ?></td>
                                            <td><?php echo $row["vlocation"]; ?></td>
                                            <td><?php echo $row["speed"]; ?></td>





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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="display:none" id="black__spot">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension8" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Reg No</th>
                                            <th>Sap no </th>
                                            <th>Driver name</th>
                                            <th>TIme</th>
                                            <th>Track</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result18)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>

                                            <td class="car_upper"
                                                style="background:#f4b084   !important ;  color: #000;">
                                                <?php echo $row["tlno"]; ?></td>
                                            <td><?php echo $row["deliveryno"]; ?></td>
                                            <td><?php echo $row["dname"]; ?></td>

                                            <td><?php echo $row["datetime"]; ?></td>
                                            <td><a href="#">Track</a></td>





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
                    <!-- list end -->





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
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>

    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script>
    function chup() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "block";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";







    }
    </script>
    <script>
    function dis_all() {
        //alert("Running")
        document.getElementById("all_car").style.display = "block";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";








    }
    </script>
    <script>
    function vehi_stop() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "block";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";







    }

    function trip_complete() {
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "block";
    }
    </script>
    <script>
    function never_report() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        document.getElementById("never_report").style.display = "block";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";






    }
    </script>
    <script>
    function activity_record() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "block";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";





    }
    </script>
    <script>
    function speed_over() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "block";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";




    }
    </script>
    <script>
    function ideal_state() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "block";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";



    }
    </script>
    <script>
    function api_nr() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "block";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";



    }

    function on_trips() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "block";
        document.getElementById("black__spot").style.display = "none";
        document.getElementById("trip__comp").style.display = "none";



    }
    </script>
    <script>
    function blacks() {
        //alert("Running")
        document.getElementById("all_car").style.display = "none";
        document.getElementById("moving_car").style.display = "none";
        document.getElementById("moving_stop").style.display = "none";
        //document.getElementById("never_report").style.display = "none";
        document.getElementById("activity_record").style.display = "none";
        document.getElementById("speed_over").style.display = "none";
        document.getElementById("ideal_state").style.display = "none";
        document.getElementById("api_nr").style.display = "none";
        document.getElementById("black__spot").style.display = "block";
        document.getElementById("trip__comp").style.display = "none";

    }
    </script>
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
    $('#html5-extension2').DataTable({
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
    $('#html5-extension3').DataTable({
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
    $('#html5-extension4').DataTable({
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
    $('#html5-extension5').DataTable({
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
    $('#html5-extension6').DataTable({
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
    $('#html5-extension7').DataTable({
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
    $('#html5-extension8').DataTable({
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
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
    // var radialChart = {
    //     chart: {
    //         height: 350,
    //         type: 'radialBar',
    //         toolbar: {
    //             show: false,
    //         }
    //     },
    //     plotOptions: {
    //         radialBar: {
    //             dataLabels: {
    //                 name: {
    //                     fontSize: '22px',
    //                 },
    //                 value: {
    //                     fontSize: '16px',
    //                 },
    //                 total: {
    //                     show: true,
    //                     label: '',
    //                     formatter: function(w) {
    //                         // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
    //                         // return 249
    //                     }
    //                 }
    //             }
    //         }
    //     },
    //     series: arr_car,
    //     labels: car_lable,
    //     colors: ['#3b78b7','#ea7372','#e62e2d','#e6b730','#c34d9c'],
    // }

    // var chart = new ApexCharts(
    //     document.querySelector("#radial-chart"),
    //     radialChart
    // );

    // chart.render();

    var donutChart = {
        chart: {
            height: 350,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        series: depot_count,
        labels: consignee_name,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donut = new ApexCharts(
        document.querySelector("#radial-chart1"),
        donutChart
    );

    donut.render();

    var donutChart1 = {
        chart: {
            height: 350,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        series: blackSpot_count,
        labels: back_consignee_name,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donut1 = new ApexCharts(
        document.querySelector("#radial-chart"),
        donutChart1
    );

    donut1.render();
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>