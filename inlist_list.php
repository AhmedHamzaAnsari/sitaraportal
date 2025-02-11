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
    <title>Manage In-list Vehicle</title>
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

    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">


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

    .remove_style {
        border: none;
        background-color: #fff;
        box-shadow: none;
    }

    .btn:hover,
    .btn:focus {
        /* color: #3b3f5c; */
        background-color: #fff;
        border-color: none;
        -webkit-box-shadow: none
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$result = mysqli_query($db,"SELECT * FROM vehicle_inlist;");
$asset = "SELECT name , uniqueId from  vehicle_inlist";
    $resultdevice = mysqli_query($db, $asset); 
?>

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
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>In-list Vehicles</h3>
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


                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>
                                            <a href="manageAsset.php">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-arrow-left">
                                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                                    <polyline points="12 19 5 12 12 5"></polyline>
                                                </svg> Back
                                            </a>

                                        </span>
                                    </div>


                                </div>
                            </div>

                            <div class="table-responsive mb-4 mt-4">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                                <!-- <div class="row">
                                        <div class="col-md-12">
                                            <button id="delete_btn" class="btn btn-danger">Delete</button>

                                        </div>
                                    </div> -->
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <!-- <th class="text-center">Delete</th> -->

                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Vehicle #</th>
                                            <th class="text-center">Created Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <!-- <td class="text-center"><input type='checkbox' name='delete[]'
                                                        value='<?= $row["uniqueId"]; ?>'></td> -->

                                            <td class="text-center"><?php echo $i ?></td>
                                            <td class="text-center car_upper">
                                                <a href="#"
                                                    style="color: #5353b5;font-size: 19px;font-weight: bold;"><?php echo $row["name"]; ?></a>
                                            </td>
                                            <td class="text-center"><?php echo $row["created_on"]; ?></td>

                                            <td class="text-center">
                                                <?php if ($row["status"]=='1') { ?>
                                                <label class="switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                                    <input id="toggle_<?php echo $row["uniqueId"]; ?>" type="checkbox"
                                                        checked="" name=toggle value="<?php echo $row["uniqueId"]; ?>"
                                                        data-toggle="toggle" data-off="Closed" data-on="Open">
                                                    <span class="slider round"></span>
                                                </label>
                                                <?php } else { ?>
                                                <label class="switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                                    <input id="toggle_<?php echo $row["uniqueId"]; ?>" type="checkbox"
                                                        name=toggle value="<?php echo $row["uniqueId"]; ?>">
                                                    <span class="slider round"></span>
                                                </label>
                                                <?php } ?>

                                            </td>

                                            <td class="text-center">
                                                <!-- <a class=""
                                                        href="editAsset.php?id=<?php echo $row['uniqueId']; ?>"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-edit-2 text-success">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg></a> -->

                                                <button class="btn remove_style"
                                                    id="edit_btn_<?php echo $row["uniqueId"]; ?>"
                                                    onclick='check_status(<?php echo $row["uniqueId"]; ?>)'>


                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 text-success">
                                                        <path
                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></button>
                                            </td>

                                            <td class="text-center"><a
                                                    onclick="return confirm('Are you sure to Delete this Asset ?');"
                                                    href="delete_inlist_vehicle.php?id=<?php echo $row['id']; ?>"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2 text-danger">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a>
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


                <!-- CONTENT AREA -->
                <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:#000" id="title_edit">Add In-list vehicle
                                </h5>
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
                                    <form method="post" id="insert_form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Vehicle Number</label>
                                                        <input type="text" class="form-control" id="cname" name="cname"
                                                            onkeyup="myFunction()" placeholder="Enter Name">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Status</label>
                                                        <select type="text" class="form-control" id="status"
                                                            name="status">
                                                            <option value='1'>Active</option>
                                                            <option value='0'>Inactive</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="0" id='check_box'
                                                                    onchange="valueChanged()"> Without Tracker</label>
                                                            <input type="hidden" value="0" name='check_box_val'
                                                                id="post_val">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Tracker Quantity</label>
                                                        <!-- <input type="text" class="form-control" id="trip_qtys"
                                                            placeholder="Enter Trip Quantity" > -->

                                                        <select id="trip_qtys" onchange="creat_form()"
                                                            class="form-control selectpicker">
                                                            <option value="0">1</option>
                                                            <option value="1">2</option>
                                                            <option value="2">3</option>
                                                            <option value="3">4</option>
                                                            <option value="4">5</option>
                                                            <option value="5">6</option>
                                                            <option value="6">7</option>
                                                            <option value="7">8</option>



                                                        </select>
                                                    </div>




                                                    <input type="hidden" name="employee_id" id="employee_id">
                                                </div>


                                            </div>

                                            <div class="col-md-12" style="overflow:auto">

                                                <div class="row">


                                                    <table class="table mb-4" id="dynamic_field">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                <th>Tracker Name</th>
                                                                <th>Inlist Name</th>
                                                                <!-- <th>Api Name</th> -->
                                                                <!-- <th>Stage Area</th> -->
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">1</td>
                                                                <td>
                                                                    <!-- <input type="text" class="form-control"
                                                                                id="del_order" name="del_order[]"
                                                                                
                                                                                required> -->
                                                                    <select id="del_order" name="del_order[]"
                                                                        class="form-control del_order " required>
                                                                        <option value="">Select</option>
                                                                        <option value="al_shyma">al_shyma</option>
                                                                        <option value="anytracker">anytracker</option>
                                                                        <option value="topflay">topflay</option>
                                                                        <option value="Universal">Universal</option>
                                                                        <option value="PTSL">PTSL</option>
                                                                        <option value="tw_sitara">tw_sitara</option>
                                                                        <option value="united_sitara">united_sitara
                                                                        </option>
                                                                        <option value="resq911">resq911</option>
                                                                        <option value="TPL">TPL</option>
                                                                        <option value="tellogix">Tellogix</option>
                                                                        <option value="xtream">Xtream</option>
                                                                        <option value="teltonika">teltonika</option>



                                                                    </select>

                                                                </td>
                                                                <td class="text-primary">
                                                                    <input type="text" class="form-control"
                                                                        id="consignee_code1" name="consignee_code[]"
                                                                        required>
                                                                </td>


                                                                </td>
                                                                <!-- <td><input type="text" class="form-control"
                                                                        id="consignee_name1" name="consignee_name[]"
                                                                        required readonly><span
                                                                        style="color:transparent"></span>
                                                                    <input type="hidden" class="form-control"
                                                                        id="consignee_id1" name="consignee_id[]"
                                                                        required>
                                                                </td> -->



                                                                <!-- <input type="button" class="btn btn-primary"
                                                                        value="Add" onclick="creat_form()"> -->
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-primary" name="insert"
                                                            id="insert" value="Insert" style="float:right" />

                                                    </div>

                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-12 set_values">
                                                        <label for="inputEmail4">al_shyma</label>
                                                        <input type="text" class="form-control" id="al_shyma"
                                                            name="al_shyma" placeholder="Enter Name for al_shyma">
                                                    </div>

                                                    <div class="form-group col-md-12 set_values">
                                                        <label for="inputEmail4">anytracker</label>
                                                        <input type="text" class="form-control" id="anytracker"
                                                            name="anytracker" placeholder="Enter Name for anytracker">
                                                    </div>
                                                    <div class="form-group col-md-12 set_values">
                                                        <label for="inputEmail4">topflay</label>
                                                        <input type="text" class="form-control" id="topflay"
                                                            name="topflay" placeholder="Enter Name for topflay">
                                                    </div>
                                                    <div class="form-group col-md-12 set_values">
                                                        <label for="inputEmail4">Universal</label>
                                                        <input type="text" class="form-control" id="Universal"
                                                            name="Universal" placeholder="Enter Name for Universal">
                                                    </div>
                                                    <div class="form-group col-md-12 set_values">
                                                        <label for="inputEmail4">PTSL</label>
                                                        <input type="text" class="form-control" id="PTSL" name="PTSL"
                                                            placeholder="Enter Name for PTSL">
                                                    </div>
                                                    <div class="form-group col-md-12 set_values">
                                                        <label for="inputEmail4">united_sitara</label>
                                                        <input type="text" class="form-control" id="united_sitara"
                                                            name="united_sitara"
                                                            placeholder="Enter Name for united_sitara">
                                                    </div>

                                                </div>


                                            </div> -->
                                        </div>
                                    </form>
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
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script>
    function check_status(id) {
        // alert(id)

        if ($("#toggle_" + id + "").is(':checked')) {
            // alert("please Inactive vehicle first !");
            Snackbar.show({
                text: 'please Inactive vehicle first !',
                pos: 'top-right'
            }); // checked

        } else {
            // alert("Go !");
            window.location = 'editAsset.php?id=' + id + ''; // unchecked

        }


    }
    </script>
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
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>



    <script>
    function valueChanged() {
        if ($('#check_box').is(":checked")) {
            $("#dynamic_field").hide();
            $('#check_box').val("1");
            $('#post_val').val("1");
            document.getElementById("consignee_code1").required = false;
            document.getElementById("del_order").required = false;

            // alert($('#check_box').val())
        } else {
            $('#check_box').val("0");
            $('#post_val').val("0");

            $("#dynamic_field").show();

        }

        // $(".answer").hide();
    }

    function myFunction() {
        var x = document.getElementById("cname");
        var dInput = (x.value);
        $('#al_shyma').val(dInput);
        $('#anytracker').val(dInput);
        $('#topflay').val(dInput);
        $('#Universal').val(dInput);
        $('#PTSL').val(dInput);
        $('#united_sitara').val(dInput);
    }




    var qty_f = 0;

    function creat_form() {
        qty_f++;
        // del_order

        // $("#dynamic_field").empty();
        var qty_f = document.getElementById("trip_qtys").value;

        $("#dynamic_field").find("tr:not(:nth-child(1)):not(:nth-child(1))").remove();

        // alert(qty_f)
        if (qty_f >= 8) {
            alert("overloaded");
        } else {
            $('.del_order').val('');

            // $("#dynamic_field").empty();
            for (var i = 1; i <= qty_f; i++) {
                $('#dynamic_field').append('<tr id="row' + i + '"> <td class="text-center">' + (i + 1) +
                    ' </td> <td> <select id="del_order" name="del_order[]" class="form-control del_order"> <option value="">Select</option> <option value="al_shyma">al_shyma</option> <option value="anytracker">anytracker</option> <option value="topflay">topflay</option> <option value="Universal">Universal</option> <option value="PTSL">PTSL</option> <option value="tw_sitara">tw_sitara</option> <option value="united_sitara">united_sitara</option><option value="resq911">resq911</option> </select></td> <td class="text-primary"><input type="text" class="form-control" id="consignee_code' +
                    (i + 1) +
                    '" name="consignee_code[]"  required></td><td><button type="button" name="remove" id="' + i +
                    '" value="' + i + '" class="btn btn-success btn_remove">X</button></td></tr>');
                // alert("Create " + i)
            }
            $(document).on('click', '.btn_remove', function() {
                i--;
                var button = $(this).val();
                // alert(button);
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                var se = parseInt(button);
                se = se - 1;
                $('select[id=trip_qtys]').val(se);



            });
            // alert(qty_f)


            $(document).ready(function() {
                $('.del_order').on('change', function(event) {
                    var prevValue = $(this).data('previous');
                    $('.del_order').not(this).find('option[value="' + prevValue + '"]').show();
                    var value = $(this).val();
                    $(this).data('previous', value);
                    $('.del_order').not(this).find('option[value="' + value + '"]').hide();
                });
            });




        }

    }

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
    $(document).ready(function() {


        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#cname').val() == "") {
                alert("Vahicle name is required");

            } else {
                $.ajax({
                    url: "ajax_edit/system_vehicle.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                        $('#zoomupModal').modal('hide');

                        Snackbar.show({
                            text: '' + data + '.',
                            pos: 'top-right'
                        });

                        setTimeout(function() {
                            window.location.reload();
                        }, 5000);
                        //    $("#html5-extension").load(" #html5-extension");


                    }
                });
            }
        });





        $('#delete_btn').on('click', function() {
            var id = [];

            $(':checkbox:checked').each(function(key) {
                id[key] = $(this).val();


            })
            console.log(id);
            if (id.length == 0) {
                alert("Please Select Minimum One Checkbox")
            } else {
                if (confirm("Do you want to delete Records")) {
                    $.ajax({
                        url: 'delete_multi_device.php',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            console.log(data);
                            if (data == 1) {

                                // $('#success_mass').html("Data Delete Successfully ").slideDown();
                                // $('#error_mass').slideUp();
                                swal({
                                    title: 'Data Delete succesfully',
                                    padding: '2em'
                                })

                                // window.location.reload();
                            } else {
                                // $('#error_mass').html("Can't Data Delete").slideDown();
                                // $('#success_mass').slideUp();
                                swal({
                                    title: 'Cant Delete Data succesfully',
                                    padding: '2em'
                                })
                            }
                        }
                    });
                }


            }
        })
    })
    </script>

    <script>
    $('input[name=toggle]').change(function() {
        var mode = $(this).prop('checked');
        console.log("hamza " + mode)
        var id = $(this).val();
        // alert(id)
        $.ajax({
            type: 'POST',
            url: 'do_products.php',
            data: {
                mode: mode,
                id: id
            },
            success: function(data) {
                Snackbar.show({
                    text: '' + data + ' Successfully.',
                    pos: 'top-right'
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