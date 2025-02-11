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
    <title>Sitara</title>
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
$devices = "SELECT dc.name,dc.id as uniqueId  FROM users_devices_new as ud join devicesnew as dc on dc.id=ud.devices_id where ud.users_id='$id'";
$devices_result = mysqli_query($db, $devices);


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
                            <h3>Night Violation Report</h3>
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
        <?php include 'sidebar.php';?>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">Tank Lorry Number</label>


                                                    <select class="form-control tagging" id="lorry_number"
                                                        name="lorry_number">
                                                        <option value="">Select Lorry number</option>
                                                        <!-- <option value="all">All Lorries</option> -->
                                                        <?php foreach($devices_result as $key => $lorry){ ?>
                                                        <option value="<?= $lorry['uniqueId'];?>">
                                                            <?= $lorry['name']; ?></option>
                                                        <?php } 
                                                            ?>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">From Date</label>
                                                    <input type="date" class="form-control" id="from" name="from"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">To Date</label>
                                                    <input type="date" class="form-control" id="to" name="to" required>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" style="float:right" id="geted"
                                                    onclick="get_history()"> Get </button>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-info" style="float:right;display:none"
                                                    id="sending" data-toggle="modal" data-target="#zoomupModal"> Send
                                                    Mail </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive mb-4 mt-4">
                                    <!-- Image loader -->
                                    <div id='loader' style='display: none;'>
                                        <img src='images/loader.gif' width='100%'>
                                    </div>
                                    <!-- Image loader -->
                                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Date</th>
                                                <th>Vehicle</th>
                                                <!-- <th>Start Time</th>
                                                <th>End Time</th> -->
                                                <th>Moving Duration</th>



                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <!-- CONTENT AREA -->
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


                                                    <select class="selectpicker" multiple id="multi_mail"
                                                        name="multi_mail" data-width='100%'>
                                                        <option>Select Email</option>
                                                        <?php foreach($resultdevice as $key => $value){ ?>
                                                        <option value="<?= $value['email'];?>"><?= $value['email']; ?>
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
        "pageLength": 10
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
    var table_html;

    function get_history() {

        // var v_id = [];
        // var vehicle_name = [];

        // $('#lorry_number :selected').each(function(key) {
        //     v_id[key] = $(this).val();


        // })
        // $('#lorry_number :selected').each(function(key) {
        //     vehicle_name[key] = $(this).text();


        // })
        // alert(vehicle_name);
        var vehicle = document.getElementById("lorry_number").value;
        var vehicle_name = $("#lorry_number option:selected").text();;
        var from1 = document.getElementById("from").value;
        var to1 = document.getElementById("to").value;
        const format1 = "YYYY-MM-DD HH:mm:ss";

        from = moment(from1).format(format1);
        to = moment(to1).format(format1);



        if (vehicle != '' && from1 != "" && to1 != "") {
            $.ajax({
                url: 'communicaton.php',
                type: 'POST',
                data: {
                    check: vehicle,
                    from: from1,
                    to: to1,
                    vehicle_name: vehicle_name
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
                    var table = $('#html5-extension').DataTable();
                    table
                        .clear()
                        .draw();


                    if (len > 0) {
                        document.getElementById('sending').style.display = 'none';

                        for (var i = 0; i < len; i++) {


                            date = data[i].date;
                            vehicle_name = data[i].vehicle_name;
                            start_time = data[i].start_time;
                            end_time = data[i].end_time;


                            moving_duration = data[i].moving_duration;


                            table
                                .row.add([
                                    (i + 1),
                                    date,
                                    vehicle_name,
                                    // start_time,
                                    // end_time,

                                    moving_duration,


                                ])
                                .draw()
                                .node();

                            if (i === len) {
                                $("#loader").hide();

                            }

                        }
                    } else {
                        alert("No Data Found")
                    }






                },
                complete: function(data) {
                    // Hide image container
                    $("#loader").hide();
                    $("#geted").prop("disabled", false);
                }
            });
        } else {
            alert("Please Select Value")
        }

    }

    function send_mail() {

        var v_id = [];
        var email_arr = [];
        var vehicle_name = [];

        $('#lorry_number :selected').each(function(key) {
            v_id[key] = $(this).val();


        })

        $('#multi_mail :selected').each(function(key) {
            email_arr[key] = $(this).val();


        })




        $('#lorry_number :selected').each(function(key) {
            vehicle_name[key] = $(this).text();


        })
        alert(vehicle_name);
        // alert(email_arr);

        var from1 = document.getElementById("from").value;
        var to1 = document.getElementById("to").value;
        const format1 = "YYYY-MM-DD HH:mm:ss";

        from = moment(from1).format(format1);
        to = moment(to1).format(format1);

        // var r_email = [];
        // r_email.push('ahmedhamzaansari.99@gmail.com')

        $.ajax({
            url: 'http://151.106.17.246:8080/sitara_schedule_email/night_violation_report.php',
            type: 'POST',
            data: {
                check: v_id,
                from: from,
                to: to,
                email_arr: email_arr,
                vehicle_name: vehicle_name
            },
            beforeSend: function() {
                // $('#insert').val("Updating");
                $("#insert").prop("disabled", true);
                $("#loader1").show();
                $('#insert').val("Sending");
                $('#title_edit').text("Sending Mail");


            },
            success: function(data) {


                console.log(data)

                setTimeout(() => {
                    $("#employee_table").fadeOut();
                    // $('#employee_table').html('');

                }, 5000);






            },
            complete: function(data) {
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