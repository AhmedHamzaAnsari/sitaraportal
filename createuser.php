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
    <title>Create Users</title>
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
session_start();


if(isset($_POST['submit']))
{	
    $name= $_POST['name'];
    $email= $_POST['email'];
    $city= $_POST['city'];
    $password= $_POST['password'];
    $confirm_password= $_POST['confirm_password'];
    $privilege= $_POST['privilege'];
    $role= $_POST['role'];
    $selectBox= $_POST['selectBox'];

  $sql = "INSERT INTO `create_user`(`name`,`email`,`city`,`password`,`confirm_password`,`privilege`,`role`,`selectBox`) 
  VALUES ('$name','$email','$city','$password','$confirm_password','$privilege','$role','$selectBox')";
echo $sql;

if (mysqli_query($db, $sql)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql . "" . mysqli_error($link);
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
                    <line x1="3" y1="12" x2="3" y2="12">
                        </l ine>
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
                        <!-- <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="assets/img/profile-7.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5>Alan Green</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div> -->
                         
                        <!-- <div class="dropdown-item">
                            <a href="apps_mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>My Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth_lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div> -->
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

                                <div class="page-title">
                                    <h3>Create Users</h3>
                                </div>

                                <div class="container my-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="" method="post">
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Enter Name" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Enter Email" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">City</label>
                                                        <input type="text" class="form-control" id="city" name="city"
                                                            placeholder="Enter Email" required>
                                                    </div>

                                                    <div class="form-group col-md-6  ">

                                                        <label for="" class="lab"> Enter Password</label>
                                                        <input type="password" id="password" required minlength="8"
                                                            class="form-control input" name="password" placeholder="Enter Password">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" id="togglePassword"
                                                            class="feather feather-eye"
                                                            style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </div>


                                                    <div class="form-group col-md-6 ">

                                                        <label for="" class="lab"> Confirm Password</label>
                                                        <input type="password" id="confirm_password"
                                                            name="confirm_password" required minlength="8"
                                                            class="form-control input" placeholder="Confirm Password">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" id="togglePassword1"
                                                            class="feather feather-eye"
                                                            style="    position: absolute;top: 42px;right: 13px;color: #888ea8;fill: rgba(0, 23, 55, 0.08);width: 17px;cursor: pointer;">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>



                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Privilege</label>

                                                        <select id="privilege" name="privilege"
                                                            class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <?php foreach($result1 as $key => $value){ ?>
                                                            <option value="<?= $value['name'];?>"><?= $value['name']; ?>
                                                            </option>
                                                            <?php } 
                                                            ?>


                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Role</label>

                                                        <select id="role" name="role" class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Sales">Sales</option>
                                                            <option value="Complainer">Complainer</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Account Type</label>

                                                        <select id="selectBox" name="selectBox" onchange="showDiv(this)"
                                                            class="form-control selectpicker">
                                                            <option selected>Choose...</option>

                                                            <option value="0">Personal</option>
                                                            <option value="1">Organization</option>
                                                            <!-- <option value="Complainer">Complainer</option> -->


                                                        </select>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="javascript:void(0);" class="add_button" title="Add field"
                                                    style="float: right; "> <img src="assets/img/pluse.png"></a>

                                                <button class="btn btn-primary  font-weight-bold mx-2" name="submit"
                                                    type="submit" style="float: right; ">SAVE</button>


                                            </div>
                                        </div>
                                    </div>

                                    </form>
                                    <div id="hidden_div" style="display:none;">
                                        <div id="hidden_div">
                                            <div class="page-title">
                                                <h3>Organization</h3>
                                            </div>
                                            <div class="container my-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="addusers.php" method="post">
                                                            <div class="form-row mb-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">Name</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                        name="name" placeholder="Enter Name" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Email</label>
                                                                    <input type="email" class="form-control" id="email"
                                                                        name="email" placeholder="Enter Email/Username"
                                                                        required>
                                                                </div>


                                                                <div class="form-group col-md-6  ">

                                                                    <label for="" class="lab"> Mailing Address</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                        name="name" placeholder="Enter Name" required>
                                                                    </svg>
                                                                </div>


                                                                <div class="form-group col-md-6 ">

                                                                    <label for="" class="lab">Contact</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                        name="name" placeholder="Enter Name" required>
                                                                </div>

                                                                <div class="form-group col-md-6 ">

                                                                    <label for="" class="lab">Address</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                        name="name" placeholder="Enter Name" required>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>


                                                <div class="field_wrapper">
                                                    <div>
                                                        </form>
                                                    </div>
                                                    <!-- <input type="text" name="field_name[]" value=""/> -->
                                                </div>


                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>

        </div>


        <!-- END MAIN CONTAINER -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        function showDiv(select) {
            if (select.value == 1) {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                '<form action="addusers.php" method="post">  <div class="form-row mb-4">   <div class="form-group col-md-6">  <label for="inputEmail4">Name</label> <input type="text" class="form-control" id="name" name="name"   placeholder="Enter Name" required></div> <div class="form-group col-md-6">   <label for="inputPassword4">Email</label>    <input type="email" class="form-control" id="email" name="email"placeholder="Enter Email/Username" required>  </div> <div class="form-group col-md-6  "> <label for="" class="lab"> Mailing Address</label> <input type="text" class="form-control" id="name" name="name"placeholder="Enter Name" required></svg>    </div>  <div class="form-group col-md-6 "><label for="" class="lab">Contact</label><input type="text" class="form-control" id="name" name="name"placeholder="Enter Name" required> </div> <div class="form-group col-md-6 "><label for="" class="lab">Address</label><input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required></div></div>  </div> </div> <a href="javascript:void(0);" class="remove_button"><img src="assets/img/remove.png"/></a></form>'; //New input field html 
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('form').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
        </script>
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