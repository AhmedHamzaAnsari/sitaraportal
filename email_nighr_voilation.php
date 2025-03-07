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
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">

    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
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

        .car_upper {
            text-transform: uppercase !important;
        }

        .caret::before {
            content: none !important;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$user_id = $_SESSION['userid'];

$pre = $_SESSION['prive'];
$from = $_GET['from'];
$to = $_GET['to'];
$cart_id = $_GET['id'];
if ($pre != 'Admin') {
    $resultss = mysqli_query($db, "SELECT * FROM activity_night_voilation_voiltion WHERE DATE(created_at) >= '$from' and DATE(created_at) <= '$to' and cartraige_id='$cart_id'");

} else {
    // echo "SELECT * FROM activity_overspeed_voiltion WHERE DATE(created_at) >= '$date' and cartraige_id='$cart_id'";
    $resultss = mysqli_query($db, "SELECT * FROM activity_night_voilation_voiltion WHERE DATE(created_at) >= '$from' and DATE(created_at) <= '$to' and cartraige_id='$cart_id'");

}


$asset = "SELECT * from  report_email";
$resultdevice = mysqli_query($db, $asset);
?>

<body class="sidebar-noneoverflow starterkit">
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
                            <h3>Night Voilation Email Alert</h3>
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

                    <div class="row layout-top-spacing" id="cancel-row">

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="container-fluid">
                                    <h2>
                                        <?php echo $_GET['name'] ?>
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">From</label>
                                                    <input type="date" class="form-control" id="name_date" name="name"
                                                        value="<?php echo $_GET['from'] ?>" placeholder="Select date"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">to</label>
                                                    <input type="date" class="form-control" id="name_from" name="name"
                                                        value="<?php echo $_GET['to'] ?>" placeholder="Select date"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button type="button" class="btn btn-primary "
                                                        style="margin-top:30px " onclick="go_route()">Get</button>
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
                                                    window.location.href =
                                                        'email_nighr_voilation.php?id=<?php echo $_GET['id'] ?>&name=<?php echo $_GET['name'] ?>&from=' +
                                                        date + '&to=' +
                                                        dateto;
                                                }

                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4 mt-4">

                                        <table id="html5-extension" class="table table-hover non-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                <th class="text-center">S.NO</th>
                                                        <th>Vehicle #</th>
                                                        <th>Speed</th>
                                                        <th>Message</th>
                                                        <th>Time</th>
                                                        <th>Location</th>
                                                        <th>Latitude</th>
                                                        <th>Longitude</th>

                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($resultss)) {
                                                    ?>
                                                    <tr>
                                                    <td class="text-center">
                                                                <?php echo $i ?>
                                                            </td>
                                                            <td class="text-center car_upper">
                                                                <?php echo $row["vehicle_name"]; ?>
                                                            </td>
                                                            
                                                            <td class="text-center">
                                                                <?php echo $row["location"]; ?>
                                                            </td>

                                                            <td class="text-center">
                                                                <?php echo $row["message"]; ?>
                                                            </td>

                                                            <td class="text-center">
                                                                <?php echo $row["time"]; ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row["location"]; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row["latitude"]; ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row["longitude"]; ?>

                                                            </td>
                                                           


                                                        <td class="text-center">


                                                            <a name="edit" id="<?php echo $row["id"]; ?>" class="edit_data"
                                                                data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-alert-octagon text-danger">
                                                                    <polygon
                                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                    </polygon>
                                                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                                </svg></a>

                                                        </td>
                                                        <td class="text-center">


                                                            <a name="edit" id="<?php echo $row["id"]; ?>" class="view_data"
                                                                data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye text-success">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg></a>

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


                    <!-- CONTENT AREA -->

                </div>

            </div>
            <!--  END CONTENT AREA  -->

            <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#000" id="title_edit">Add Alert Description
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" id="insert_form" enctype="multipart/form-data">
                                            <div class="form-row mb-4">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div>
                                                                <label>Is this Authentic Alert ?</label>
                                                                <select name="os_authentic_action"
                                                                    id="os_authentic_action" class="form-control">
                                                                    <option value="">Select an Option</option>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                            </div>
                                                            <div id="dynamic-fields"></div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4">Description</label>
                                                    <input type="text" class="form-control" id="action_discription"
                                                        name="action_discription">
                                                </div>




                                                <input type="hidden" name="employee_id" id="employee_id">
                                                <input type="hidden" name="table_name" id="table_name" value="action_night_voilation">

                                                <input type="hidden" name="cartraige_id" id="cartraige_id"
                                                    value="<?php echo $_GET['id'] ?>">
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-primary" name="insert"
                                                            id="insert" value="Insert" style="float:right" />

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


            <div id="zoomupModal2" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog modal-xl">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#000" id="title_edit">View Alert Action
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
                            <div class="container-fluid my-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="action_table" class="table table-hover non-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.NO</th>
                                                    <th>Is Authentic</th>
                                                    <th>Status</th>
                                                    <th>Driver CNIC</th>
                                                    <th>Who is Responsible</th>
                                                    <th>Description</th>
                                                    <th>Created At</th>



                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
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
                $(document).on('click', '.edit_data', function () {

                    var employee_id = $(this).attr("id");
                    // alert(employee_id)
                    $('#zoomupModal').modal('show');
                    $('#employee_id').val(employee_id);
                    $('#insert_form')[0].reset();
                    $('#dynamic-fields').empty();

                });

                $(document).on('click', '.view_data', function () {

                    var employee_id = $(this).attr("id");
                    // alert(employee_id)
                    if (employee_id != "") {
                        $.ajax({
                            url: "ajax_edit/get_all_alert_action_data.php",
                            method: "POST",
                            data: {
                                alert_id: employee_id,
                                table_name : 'action_night_voilation'
                            },
                            beforeSend: function () {
                            },
                            success: function (data) {
                                data = JSON.parse(data)
                                console.log(data);
                                $('#zoomupModal2').modal('show');
                                var len = data.length;
                                //alert("len "+len)
                                var table = $('#action_table').DataTable();
                                table
                                    .clear()
                                    .draw();

                                if (len > 0) {
                                    // $("email_btn").fadeIn();
                                    for (var i = 0; i < len; i++) {



                                        table
                                            .row.add([
                                                (i + 1),
                                                data[i].is_authorize,
                                                data[i].status,
                                                data[i].driver_cnic,
                                                data[i].who_is_responsible,
                                                data[i].description,
                                                data[i].created_at,


                                            ])
                                            .draw()
                                            .node();

                                        // if(i===len){
                                        //     $("#loader").hide();

                                        // }





                                    }


                                }
                            }
                        });

                    }

                });

                $('#insert_form').on("submit", function (event) {
                    event.preventDefault();
                    var data = new FormData(this);
                    if ($('#total').val() == "") {
                        alert("Total is required");

                    } else {
                        $.ajax({
                            url: "ajax_edit/overspeed_action.php",
                            cache: false,
                            contentType: false,
                            processData: false,
                            method: "POST",
                            data: data,
                            beforeSend: function () {
                                $('#insert').val("Inserting");
                                $("#insert").prop("disabled", true);

                            },
                            success: function (data) {
                                console.log(data)


                                //    $("#html5-extension").load(" #html5-extension");

                                if (data != 0) {

                                    alert('Action Inserted succesfully');
                                    $('#insert_form')[0].reset();
                                    setTimeout(function () {
                                        window.location.reload();

                                    }, 2000);
                                } else {
                                    alert('Action Not Insert');
                                    $('#insert').val("Insert");

                                    $("#insert").prop("disabled", false);


                                }



                            }
                        });
                    }
                });

                $('#os_authentic_action').on('change', function () {
                    var selectedValue = $(this).val();
                    $('#dynamic-fields').empty(); // Clear any previous dynamic fields

                    if (selectedValue === 'yes') {
                        var dynamicSelect = '<label>Select status:</label>' +
                            '<select name="licenseStatus" class="form-control">' +
                            '<option value=""></option>' +
                            '<option value="loaded">Loaded</option>' +
                            '<option value="empty">Empty</option>' +
                            '</select>';
                        $('#dynamic-fields').append(dynamicSelect);

                        $('select[name="licenseStatus"]').on('change', function () {
                            var licenseStatusValue = $(this).val();
                            $('#dynamic-fields').find('.dynamic-input')
                                .remove(); // Clear any previous dynamic input fields

                            if (licenseStatusValue === 'loaded') {
                                $('#dynamic-fields').append('<div class="dynamic-input">' +
                                    '<label>Enter Driver CNIC number:</label>' +
                                    '<input type="text" name="driverCNIC" class="form-control">' +
                                    '</div>');
                            } else if (licenseStatusValue === 'empty') {
                                $('#dynamic-fields').append('<div class="dynamic-input">' +
                                    '<label>Who is responsible?</label>' +
                                    '<input type="text" name="responsible" class="form-control">' +
                                    '</div>');
                            }
                        });
                    }
                });
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


        <script>
            function toggleInputs() {
                const yesRadio = document.querySelector('input[value="yes"]');
                const addCninInput = document.getElementById('addCninInput');
                const responsibleInput = document.getElementById('responsibleInput');

                if (yesRadio.checked) {
                    addCninInput.style.display = 'block';
                    responsibleInput.style.display = 'none';
                } else {
                    addCninInput.style.display = 'none';
                    responsibleInput.style.display = 'block';
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
                "pageLength": 7
            });
        </script>

        <script>
            function send_mail() {

                var email_arr = [];



                $('#multi_mail :selected').each(function (key) {
                    email_arr[key] = $(this).val();


                })
                // alert(email_arr);



                // var r_email = [];
                // r_email.push('ahmedhamzaansari.99@gmail.com')

                $.ajax({
                    url: 'sitara_schedule_email/current_location_report.php',
                    type: 'POST',
                    data: {
                        email_arr: email_arr
                    },
                    beforeSend: function () {
                        // $('#insert').val("Updating");
                        $("#insert").prop("disabled", true);
                        $("#loader1").show();
                        $('#insert').val("Sending");
                        $('#title_edit').text("Sending Mail");


                    },
                    success: function (data) {


                        console.log(data)

                        setTimeout(() => {
                            $("#employee_table").fadeOut();
                            // $('#employee_table').html('');

                        }, 5000);






                    },
                    complete: function (data) {
                        // Hide image container
                        $("#loader1").hide();
                        $('#employee_table').html('<h1> Mail Send Successfully ..!</h1>');
                        $("#insert").prop("disabled", false);
                        $('#insert').val("Send");

                        $('#title_edit').text("Send Mail");

                        // $('#zoomupModal').modal('hide');
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