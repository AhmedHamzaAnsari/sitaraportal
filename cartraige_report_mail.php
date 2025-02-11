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
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">


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

    .caret::before {
        content: none !important;
    }

    .select2-container--default .select2-selection--multiple {
        background: transparent
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
    include("config_indemnifier.php");

    // session_start();
    $user_id=$_SESSION['userid'];
   
    $asset = "SELECT * from  report_email where user_id='$user_id'";
    $resultdevice = mysqli_query($db, $asset); 

    $cartraige = "SELECT * FROM users  where privilege='Cartraige'";
    $resultcartraige = mysqli_query($db, $cartraige); 

    $users = "SELECT * FROM `users`";
    $resultusers = mysqli_query($db, $users); 

    $email_assign = mysqli_query($db,"SELECT es.*,us.name as cname FROM email_scedule as es join users as us on es.user_id=us.id where us.privilege='Cartraige'");

    if(isset($_POST['inserted'])){

        $name = mysqli_real_escape_string($db,$_POST['name']);
        $email = mysqli_real_escape_string($db,$_POST['address']);
        $contact = mysqli_real_escape_string($db,$_POST['contact']);
        $cartraige_id = mysqli_real_escape_string($db,$_POST['cartraige']);
         
    
        
    
           
        
        
       
        
        $sql = "INSERT INTO `report_email`(`name`, `email`,`user_id`,`contact`) VALUES ('$name', '$email','$cartraige_id','$contact')";
            echo $sql;
    
        if (mysqli_query($db, $sql)) {
            echo '<script>alert("New record created successfully");
                window.location.href="cartraige_report_mail.php";
            
            </script>';
        } else {
            // $erre ="Error: " . $sql . "<br>" . mysqli_error($db);
            echo "<script>alert('Error: Duplicate Email , Email already exist');</script>";
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    
        
    
        
       
        
    
    
    }

    if(isset($_POST['assigning']))
{
   

    



    
    $user = mysqli_real_escape_string($db,$_POST['user']); 
    $time = mysqli_real_escape_string($db,$_POST['time']); 
    $cartraige_check = mysqli_real_escape_string($db,$_POST['cartraige_check']); 
    // $time_to = mysqli_real_escape_string($db,$_POST['time_to']); 
    

    $qty = $_POST['assign'];    
    
    foreach ($qty as $assign) {
        $sql1 = "INSERT INTO `email_scedule`(`report`, `time`, `email`,`status`,`user_id`) VALUES
     ('$user','$time','$assign','0','$cartraige_check')";
    echo $sql1;

    if (mysqli_query($db, $sql1)) {
        echo '<script>alert("Report assigned successfully")</script>';
        
        
    } else {
        echo '<script>alert("Already Assign;")</script>';

    // echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    }
    echo "<script>
    window.location.href='cartraige_report_mail.php';
    </script>";

}

    
?>

<body class="sidebar-noneoverflow starterkit">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Cartraige Reports Mail</h3>
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


                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area br-4">
                            <div class="widget-one">


                                <div class="container-fluid mt-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" id="add" data-toggle="modal"
                                                data-target="#zoomupModal">Add Email</button>


                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid my-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="cartraige_report_mail.php" method="post">
                                                <div class="form-row mb-4">
                                                <div class="form-group col-md-3">
                                                        <label for="inputAddress">Cartraige User</label>
                                                        <select id="cartraige_check" name="cartraige_check"
                                                            class="form-control selectpicker basic" onchange='get_cartraige(this.value)'>
                                                           <option >Select Cartraige</option>

                                                            <?php foreach($resultcartraige as $key => $value){ ?>
                                                            <option value="<?= $value['id'];?>"><?= $value['name']; ?>
                                                            </option>
                                                            <?php } 
                                                            ?>
                                                        </select>

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="inputPassword4">Report</label>
                                                        <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email/Username" required> -->
                                                        <select id="user" name="user"
                                                            class="form-control selectpicker basic">
                                                            <option >Select Report</option>
                                                            <!-- <option value="Night_violation">Night violation Report</option> -->
                                                            <option value="Black_spot">Black spot Report</option>
                                                            <option value="Speed_violation">Speed violation Report</option>
                                                            <option value="current_location">Current Location Report</option>
                                                            <!-- <option value="hist_report">History Report</option> -->
                                                            <option value="nr">NR Report</option>
                                                            <option value="night_voilation">Night Voilation</option>
                                                            


                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="inputPassword4">Time</label>
                                                        <input type="time" class="form-control" id="time" name="time" placeholder="Enter Email/Username" required>
                                                        
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputAddress">Email</label>
                                                        <select id="assign" name="assign[]" class="form-control tagging"
                                                            multiple="multiple">
                                                            
                                                        </select>

                                                    </div>



                                                </div>



                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit" name="assigning"
                                                                class="btn btn-primary  font-weight-bold mx-2"
                                                                name="assigning" style="float: right; ">SAVE</button>
                                                            <!-- <a class="btn mx-2" href="manageAsset.php" style="float: right;">CANCEL</a> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                <?php
                                if (mysqli_num_rows($email_assign) > 0) {
                             ?>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S.No</th>
                                            <th class="text-center">Carriage</th>
                                            <th class="text-center">Report</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Email</th>
                                            <!-- <th class="text-center">Edit</th> -->
                                            <th class="text-center">Delete</th>
                                           
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i=1;
                                        while($row = mysqli_fetch_array($email_assign)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i ?></td>
                                            <td class="text-center"><?php echo $row["cname"] ?></td>
                                            <td class="text-center"><?php echo $row["report"]; ?></td>
                                            <td class="text-center"><?php echo $row["time"]; ?></td>
                                            <td class="text-center"><?php echo $row["email"]; ?></td>
                                            
                                            <!-- <td class="text-center"><a href="editGroup.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a>
                                            </td> -->
                                            <td class="text-center"><a onclick="return confirm('Are you sure to Delete this Records ?');" href="delete_cartraige_report_mail.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
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
            <!-- <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div> -->
        </div>

        <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#000" id="title_edit">Add Email</h5>
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
                                    <form method="post" action="cartraige_report_mail.php">
                                        <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                                        <label for="inputAddress">Cartraige User</label>
                                                        <select id="cartraige" name="cartraige" class="form-control tagging"
                                                           >
                                                           <option >Select Cartraige</option>

                                                            <?php foreach($resultcartraige as $key => $value){ ?>
                                                            <option value="<?= $value['id'];?>"><?= $value['name']; ?>
                                                            </option>
                                                            <?php } 
                                                            ?>
                                                        </select>

                                                    </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Contact #</label>
                                                <input type="number" class="form-control" id="contact" name="contact"
                                                    placeholder="Enter Contact" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email</label>
                                                <input type="email" class="form-control" id="address" name="address"
                                                    placeholder="Enter Email Address" required>
                                            </div>

                                            <input type="hidden" name="employee_id" id="employee_id">
                                        </div>

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary" name="inserted"
                                                        id="inserted" value="Insert" style="float:right" />

                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
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
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
        $('#cartraige').select2({
        dropdownParent: $('#zoomupModal')
    });
    </script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>
        function get_cartraige(cart_id){

            $.ajax({
                url: 'get_lat_lng.php',
                type: 'POST',
                data: {
                    cartraige_id: cart_id
                },
                success: function(data) {
                    data = JSON.parse(data)
                    // console.log(data);
                    var len = data.length;
                    // alert(len)
                    $("#assign").empty();
                    if(len>0){
    
                        for(var i=0 ; i<len ; i++){
                            var id = data[i]['id'];
                            var email = data[i]['email'];
                            console.log(email);
                            $('#assign').append(`<option value="${email}">${email}</option>`);
    
                        }

                    }
                    else{
                        alert("No emails found");
                    }
                    

               

                }
            });
        }
    </script>

    <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        } );
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>