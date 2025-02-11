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
    <title>Reciving Record</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
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
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">

    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/elements/alert.css">

    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <link href="plugins/pricing-table/css/component.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />




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

    .edits:hover {
        cursor: pointer;
        color: green;
    }

    .caret::before {
        display: none !important;
    }
    #pricingWrapper .stacked .card-header .card-price{
        font-size : 15px !important;
        line-height:25px !important;
        width : 16.25rem !important;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
$cur_date = date('Y-m-d');
include("config_indemnifier.php");
$user_id=$_SESSION['userid'];

$result = mysqli_query($db,"SELECT rm.*,tm.lorry_no,tm.location,tm.driver_cnic,tm.driver_contact,dc.name FROM receive_main as rm join trip_main as tm on rm.trip_id=tm.id join devices as dc on tm.lorry_no=dc.uniqueId  where tm.complete='1'");
// $result = "SELECT tc_users.name,tc_users.email,users.privilege,users.login,users.description\n"

//     . "FROM tc_users\n"

//     . "INNER JOIN users ON tc_users.id=users.id";
?>

<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Manage Reciving Record</h3>
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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div id="employee_table"></div>

                            <!-- <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" id="add" data-toggle="modal"
                                            data-target="#zoomupModal">Add Partner</button>


                                    </div>
                                </div>
                            </div> -->
                            <div class="table-responsive mb-4 mt-4">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S.No</th>
                                            <th class="text-center">Lorry Number</th>
                                            <!-- <th class="text-center">Upload Reciving</th> -->
                                            <th class="text-center">Trip id</th>
                                            <th class="text-center">Driver CNIC</th>
                                            <th class="text-center">Driver Number</th>
                                            <th class="text-center">Remarks</th>
                                            <th class="text-center">Total Trip</th>

                                            <!-- <th class="text-center">Contact Person</th> -->

                                            <th class="text-center">View</th>
                                            <!-- <th class="text-center">Delete</th> -->


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i ?></td>
                                            <td class="text-center"><?php echo $row["name"]; ?></td>
                                            <!-- <td class="text-center"><a
                                                    href="uploads/<?php echo $row["upload_receiving"]; ?>"
                                                    target="_blank" class="">View Document</a></td> -->
                                            <td class="text-center"><?php echo $row["trip_id"]; ?></td>
                                            <td class="text-center"><?php echo $row["driver_cnic"]; ?></td>
                                            <td class="text-center"><?php echo $row["driver_contact"]; ?></td>
                                            <td class="text-center"><?php echo $row["remarks"]; ?></td>
                                            <td class="text-center"><?php echo $row["trip_qty"]; ?></td>
                                            <!-- <td class="text-center">    <button class="btn btn-primary" id="add2" data-toggle="modal"
                                            data-target="#zoomupModal2">Add Contact</button></td> -->
                                            <td class="text-center"><a name="edit" id="<?php echo $row["id"]; ?>"
                                                    class="edit_data" data-toggle="tooltip" data-placement="top"
                                                    title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></a>
                                            </td>
                                            <!-- <td class="text-center"><a class="delete_product"
                                                    data-id='<?php echo $row['id']; ?>' data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2 text-danger warning ">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a>
                                            </td> -->
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

        <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
            <div class="modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#000" id="title_edit">Add Partner</h5>
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
                                    <div class="container">
                                        <div id="main_info" class="">


                                            

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div id="pricingWrapper" class="row">




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
        <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
        <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
        <script src="plugins/treeview/custom-jstree.js"></script>
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="assets/js/scrollspyNav.js"></script>
        <script src="plugins/select2/select2.min.js"></script>
        <script src="plugins/select2/custom-select2.js"></script>

        <script src="plugins/highlight/highlight.pack.js"></script>
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


        <script>
        $(document).ready(function() {


            $('#insert_form').on("submit", function(event) {
                event.preventDefault();
                if ($('#cname').val() == "") {
                    alert("CName is required");

                } else {
                    $.ajax({
                        url: "ajax_edit/update_fright.php",
                        method: "POST",
                        data: $('#insert_form').serialize(),
                        beforeSend: function() {
                            $('#insert').val("Updating");
                        },
                        success: function(data) {
                            $('#insert_form')[0].reset();
                            $('#zoomupModal').modal('hide');
                            $('#employee_table').html(data);
                            //    $("#html5-extension").load(" #html5-extension");
                            window.location.reload();

                        }
                    });
                }
            });


            $(document).on('click', '.edit_data', function() {

                var employee_id = $(this).attr("id");
                // alert(employee_id)
                $.ajax({
                    url: "ajax_edit/fetch_reciving_trip.php",
                    method: "POST",
                    data: {
                        mr_id: employee_id
                    },
                    dataType: "json",
                    success: function(data) {

                        var len = data.length;
                        // alert(len)
                        // $('#pricingWrapper').append('');
                        console.log(data);
                        $("#main_info").html('');

                        $('#main_info').append('<div class="table-responsive">'+
                                                '<table class="table mb-4">'+
                                                    '<thead>'+
                                                        '<tr>'+
                                                            '<th class="text-center">#</th>'+
                                                            '<th>Lorry Number</th>'+
                                                            '<th>Location</th>'+
                                                            '<th>Driver CNIC</th>'+
                                                            '<th>Driver Number</th>'+
                                                            '<th>Driver Helper CNIC</th>'+
                                                            '<th>Driver Helper Number</th>'+
                                                            '<th>Document No</th>'+
                                                            '<th>Stage Area</th>'+
                                                            '<th>Total Trip</th>'+
                                                       ' </tr>'+
                                                    '</thead>'+
                                                   ' <tbody>'+
                                                        '<tr>'+
                                                            '<td class="text-center">1</td>'+
                                                            '<td class="text-primary">'+data.name+'</td>'+
                                                            '<td>'+data.location+'</td>'+
                                                            '<td>'+data.driver_cnic+'</td>'+
                                                            '<td>'+data.driver_contact+'</td>'+
                                                            '<td>'+data.driver_helper_cnic+'</td>'+
                                                            '<td>'+data.driver_helper_contact+'</td>'+
                                                            '<td>'+data.document+'</td>'+
                                                            '<td>'+data.consignee_name+'</td>'+
                                                            '<td>'+data.trip_qty+'</td>'+
                                                            
                                                        '</tr>'+
                                                        
                                                    '</tbody>'+
                                                '</table>'+
                                           ' </div>');








                    }
                });
                $.ajax({
                    url: "ajax_edit/fetch_reciving_trip.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    dataType: "json",
                    success: function(data) {

                        var len = data.length;
                        // alert(len)
                        // $('#pricingWrapper').append('');
                        $("#pricingWrapper").html('');
                        console.log(data);
                        for (var i = 0; i < len; i++) {
                            $('#pricingWrapper').append('<div class="col-md-4 col-lg-4">' +
                                '<div class="card stacked mt-5">' +
                                '   <div class="card-header pt-0">' +
                                ' <span class="card-price"> Consignee Name : ' +
                                ' <br>' + data[i]['consignee_name'] + '</span>' +
                                ' <h3 class="card-title mt-3 mb-1"></h3>' +
                                
                                '<p>Product : ' + data[i]['products'] + '</p>' +
                                '<p>Quantity : ' + data[i]['quantity'] + '</p>' +
                               
                                '</p>' +
                                '<p>Consignee No 1: ' + data[i]['consignee_contact_1'] +
                                '</p>' +
                                '<p>Consignee No 3: ' + data[i]['consignee_contact_2'] +
                                '</p>' +
                                '<p>Consignee No 3: ' + data[i]['consignee_contact_3'] +
                                '</p>' +
                                '<p>Start Date: ' + data[i]['start_time'] + '</p>' +
                                
                                '</div>' +
                                '<div class="card-body">' +
                                ' <ul class="list-group list-group-minimal mb-3">' +
                                '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                                'Remark Case Product : ' + data[i][
                                    'remark_case_product'] + '' +
                                ' </li>' +
                                ' <li class="list-group-item d-flex justify-content-between align-items-center">' +
                                'Remark Deliverd Quantity : ' + data[i][
                                    'remarks_deliverd_qty'
                                ] + '' +
                                '</li>' +
                                ' <li class="list-group-item d-flex justify-content-between align-items-center">' +
                                'shortage in ltr : ' + data[i]['shortage_ltr'] + '' +
                                '</li>' +
                                '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                                ' Receive  Upload : <a href="uploads/' + data[i][
                                    'receive_upload'
                                ] + '" target="_blank"class="">View Document</a>' +
                                ' </li>' +
                                '</ul>' +
                                '</div>' +
                                ' </div>' +
                                '</div>');

                        }





                        $('#title_edit').text("Trip Data");
                        $('#zoomupModal').modal('show');
                    }
                });
            });

            $('.delete_product').click(function() {
                var el = this;

                // Delete id
                var deleteid = $(this).data('id');

                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'ajax_delete/remove_patners.php',
                        type: 'POST',
                        data: {
                            id: deleteid
                        },
                        success: function(response) {

                            if (response == 1) {
                                // Remove row from HTML Table
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                    swal({
                                        title: 'Delete Contact Partners succesfully',
                                        padding: '2em'
                                    })
                                });

                            } else {
                                alert('Invalid ID.');
                            }

                        }
                    });
                }

            });
        });
        </script>

        <script>
        $('input[name=toggle]').change(function() {
            var mode = $(this).prop('checked');
            console.log("hamza " + mode)
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'do_products.php',
                data: {
                    mode: mode,
                    id: id
                },
                success: function(data) {
                    var data = eval(data);
                    response_result = data.response_result;
                    success = data.success;
                    $("#heading").html(success);
                    $("#body").html(response_result);
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