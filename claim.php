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
    <title>Policy</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">


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
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<style>
.select2-container--default .select2-selection--multiple {
    background-color: transparent;
    height: 46px !important
}
</style>
<?php
include("config_indemnifier.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


if(isset($_POST['submit']))
{	
    $claim= $_POST['claim'];
    $role= $_POST['role'];
    $sur= $_POST['sur'];
    $insu= $_POST['insu'];
    $status= $_POST['status'];
    $reason= $_POST['reason'];
    $offer= $_POST['offer'];
    $set= $_POST['set'];
    $payment= $_POST['payment'];
    $create= $_POST['create'];
    // $file= $_POST['file'];
    // $name= $_POST['name'];

      
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    //  $file_type = $_FILES['file']['type'];
    $folder="uploads/";
    move_uploaded_file($file_loc,$folder.$file);

  $sql = "INSERT INTO `claims`(`claim`,`role`,`sur`,`insu`,`status`,`reason`,`offer`,`set`,`payment`,`create`,`file`,`size`) 
  VALUES ('$claim','$role','$sur','$insu','$status','$reason','$offer','$set','$payment','$create','$file','$file_size')";
echo $sql;

if (mysqli_query($db, $sql)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql . "" . mysqli_error($db);
 }
 
//  mysqli_close($db);

}

// mysqli_close($db);
?>

<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Maaz to connect with Qazi for Fields</h3>
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


                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area br-4">
                            <div class="widget-one">



                                <div class="container my-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Claim Number</label>
                                                        <input type="text" class="form-control" id="claim" name="claim"
                                                            placeholder="Enter Claim Number" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Type</label>
                                                        <select id="role" name="role" class="form-control selectpicker" placeholder="Enter Type" >
                                                            <option selected>Choose...</option>
                                                            <option value="Policy Type">Policy Type</option>
                                                            <!-- <option value="Sales">Tracker</option> -->
                                                         </select>
                                                   
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6  ">

                                                        <label for="" class="lab">Surverer (Name, Contact)</label>
                                                            <input type="text" class="form-control" id="sur" name="sur"
                                                            placeholder="Surverer (Name, Contact)" required>
                                                    </div>


                                                    <div class="form-group col-md-6 ">

                                                        <label for="" class="lab"> Insurance Company</label>
                                                        <input type="text" class="form-control" id="insu" name="insu"
                                                            placeholder="Enter Insurance Company" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Status</label>

                                                        <select id="privilege" name="status"
                                                            class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <option selected value="draft">Draft</option>
                                                            <option selected value="New">New</option>
                                                            <option selected value="Progress">In-Progress</option>
                                                            <option selected value="Pending on Custome"> Pending on Custome</option>
                                                            <option selected value="Pending on Surverer" > Pending on Surverer</option>
                                                            <option selected value="Payment Processing">Payment Processing</option>
                                                            <option selected value="Un-Settled">Un-Settled</option>
                                                            <option selected value="Rejected">Rejected</option>
                                                          </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Reason For Rejection</label>
                                                        <input type="text" class="form-control" id="reason" name="reason"
                                                            placeholder="Enter Reason For Rejection" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Documents</label>
                                                        <input type="file" class="form-control" id="file" name="file"
                                                            placeholder="Enter Documents" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Offer Amount</label>
                                                        <input type="text" class="form-control" id="offer" name="offer"
                                                            placeholder="Enter Offer Amount" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Settled Amount </label>
                                                        <input type="text" class="form-control" id="set" name="set"
                                                            placeholder="Enter Settled Amount" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Claim Payment Process</label>
                                                        <input type="text" class="form-control" id="payment" name="payment"
                                                            placeholder="Enter Claim Payment Process" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Created Date</label>
                                                        <input type="email" class="form-control" id="create" name="create"
                                                            placeholder="Created Date" required>
                                                    </div>
                                                          </div>

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary  font-weight-bold mx-2" name="submit" type="submit"
                                                                style="float: right; ">SAVE</button>
                                                            <a class="btn mx-2" href="manageusers.php"
                                                                style="float: right;">CANCEL</a>

                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
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
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>
    <script>
    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#confirm_password');

    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>
    <script>
    var password2 = document.getElementById("password"),
        confirm_password2 = document.getElementById("confirm_password");

    function validatePassword() {
        if (password2.value != confirm_password2.value) {
            confirm_password2.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password2.setCustomValidity('');
        }
    }
    password2.onchange = validatePassword;
    confirm_password2.onkeyup = validatePassword;
    </script>
    <script>
    $(document).ready(function() {
        App.init();
    });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>


    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>