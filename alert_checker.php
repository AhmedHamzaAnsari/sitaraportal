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
$result = mysqli_query($db,"SELECT cd.id,cd.cartrauge_id,us.name,cd.sms_alerts FROM cartrauge_depot_check as cd join users as us on us.id=cd.cartrauge_id ;");
$asset = "SELECT * FROM users where privilege='Cartraige'";
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
                            <h3> Report</h3>
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
                                <form method="post" id="insert_form" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">Cartraige User</label>


                                                    <select class="form-control tagging" id="cartraige"
                                                        name="cartraige">
                                                        <option value="">Cartraige User</option>
                                                        <!-- <option value="all">All Lorries</option> -->
                                                        <?php foreach($resultdevice as $key => $lorry){ ?>
                                                        <option value="<?= $lorry['id'];?>">
                                                            <?= $lorry['name']; ?></option>
                                                        <?php } 
                                                            ?>
                                                    </select>

                                                </div>
                                               
                                                 <div class="form-group col-md-4">
                                                    <label for="inputEmail4">SMS Alerts</label>


                                                    <select class="form-control selectpicker" id="alert_sms" multiple
                                                        name="alert_sms[]">
                                                        <option>Select</option>
                                                        <option value='black spot'>black spot</option>
                                                        <option value='prohibited hours'>prohibited hours</option>
                                                        <option value ='Not Reporting (NR)'>Not Reporting (NR)</option>
                                                        <option value ='Overspeeding'>Overspeeding</option>
                                                        
                                                    </select>

                                                </div>


                                                <div class="col-md-12" >

                                                    <div class="row">


                                                        <table class="table mb-4" id="dynamic_field">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th>Contact #</th>
                                                                   
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-primary">
                                                                      
                                                                            <input type="text" class="form-control" id="consignee_code1" name="consignee_code[]" required>

                                                                       
                                                                    </td>
                                                                <td> <button type='button' class='btn btn-primary' onclick='creat_form()'>+</button> </td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>


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
                                           
                                        </div>
                                    </div>
                                </form>

                                </div>

                                <div class="table-responsive mb-4 mt-4">
                                    <?php
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <!-- <th class="text-center">Delete</th> -->

                                                <th class="text-center">S.NO</th>
                                                <th class="text-center">Cartraige</th>
                                                <th class="text-center">SMS Alert </th>
                                               
                                                <!-- <th class="text-center">Edit</th>-->
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
                                              
                                                <td class="text-center"><?php echo $row["sms_alerts"]; ?> hr</td>

                                              
                                                <td class="text-center"><a
                                                        onclick="return confirm('Are you sure to Delete this Asset ?');"
                                                        href="#"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
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

                </div>


                <!-- CONTENT AREA -->

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
    <script src="plugins/highlight/highlight.pack.js"></script>


    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>

    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="assets/js/components/notification/custom-snackbar.js"></script>

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

<script>
    $(document).ready(function() {


        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#cartraige').val() == "") {
                alert("cartraige name is required");

            }
            else if ($('#alert_sms').val() == "") {
                alert("alert_sms is required");

            } 
            else {
                $.ajax({
                    url: "ajax_edit/insert_activity_check.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        console.log(data);
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
    var qty_f = 1;

function creat_form() {
    
    // del_order

    // $("#dynamic_field").empty();
    // var qty_f = document.getElementById("trip_qtys").value;


    // alert(qty_f)
    if (qty_f >= 5) {
        alert("Maximnum 5 numbers");
    } else {
        $("#dynamic_field").find("tr:not(:nth-child(1)):not(:nth-child(1))").remove();

        // $("#dynamic_field").empty();
        for (var i = 1; i <= qty_f; i++) {
            $('#dynamic_field').append('<tr id="row' + i + '"> <td class="text-center">' + (i + 1) +
                ' </td> <td> <input type="text" class="form-control" id="consignee_code1" name="consignee_code[]" required></td><td><button type="button" name="remove" id="' + i +
                '" value="' + i + '" class="btn btn-success btn_remove">X</button></td></tr>');
            // alert("Create " + i)
        }
        
        // alert(qty_f)


       




    }
    qty_f++;


}
$(document).on('click', '.btn_remove', function() {
            i--;
            qty_f--;
            var button = $(this).val();
            // alert(button);
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            var se = parseInt(button);
            se = se - 1;
            $('select[id=trip_qtys]').val(se);



        });
</script>

    <script>
    var table_html;

    function get_history() {

        var vehicle = document.getElementById("lorry_number").value;
        var vehicle_name = $("#lorry_number option:selected").text();;
        var from1 = document.getElementById("from").value;
        var to1 = document.getElementById("to").value;
        const format1 = "YYYY-MM-DD HH:mm:ss";

        from = moment(from1).format(format1);
        to = moment(to1).format(format1);



        if (vehicle != '' && from1 != "" && to1 != "") {
            $.ajax({
                url: 'stop_check.php',
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
                        // document.getElementById('sending').style.display = 'block';

                        for (var i = 0; i < len; i++) {

                            idel_duration = data[i].idel_duration;
                            Stop_duration = data[i].Stop_duration;

                            if (idel_duration > 20) {
                                alert("Your Vehicle is in idel position more then 20 minutes")
                            }


                            if (Stop_duration > 20) {
                                alert("Your Vehicle is Stoped more then 20 minutes")
                            }


                            // table
                            // .row.add([
                            //     (i+1), 
                            //     date, 
                            //     vehicle_name, 
                            //     start_time, 
                            //     end_time, 
                            //     Stop_duration, 
                            //     moving_duration, 
                            //     idel_duration, 
                            //     min_speed, 
                            //     max_speed, 
                            //     Averagespeed, 
                            //     round_distance, 

                            // ])
                            // .draw()
                            // .node();

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


    </script>

<script>
    $('input[name=toggle]').change(function() {
        var mode = $(this).prop('checked');
        console.log("hamza " + mode)
        var id = $(this).val();
        // alert(id)
        $.ajax({
            type: 'POST',
            url: 'ajax/do_product.php',
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