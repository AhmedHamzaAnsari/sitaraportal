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

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">


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



if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($db,$_POST['name']);
    $status = mysqli_real_escape_string($db,$_POST['status']);
    

    
    
   
    
    $sql = "INSERT INTO `product_family`(`name`,`status`) VALUES ('$name','$status')";

    if (mysqli_query($db, $sql)) {
        echo '<script>alert("Product Family created successfully")</script>';
    } else {
        // $erre ="Error: " . $sql . "<br>" . mysqli_error($db);
        echo "<script>alert('Error: Duplicate Email , Email already exist');</script>";
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    


    
    
    

}

$product = "SELECT * FROM `product_family` where status='1'";
$result = mysqli_query($db, $product);

$product1 = "SELECT * FROM `products_h` where status='1'";
$result1 = mysqli_query($db, $product1);

$customers = "SELECT * FROM `addperson`";
$result2 = mysqli_query($db, $customers);

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
                            <h3>Policy</h3>
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


                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area br-4">
                            <div class="widget-one">



                                <div class="container my-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="family_product.php" method="post">
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Product Family</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Enter Product Family" required>
                                                    </div>
                                                    <div class="form-group col-md-6" id="select_box">
                                                        <label for="inputEmail4">Type</label>
                                                        <select id="sel_depart" name="sel_depart" onchange="fetch_select(this.value);"
                                                            class="form-control ">
                                                            <option selected>Choose...</option>
                                                            <?php foreach($result as $key => $value){ ?>
                                                            <option value="<?= $value['id'];?>"><?= $value['name']; ?></option>
                                                            <?php } 
                                                            ?>


                                                        </select>

                                                        
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Products</label>
                                                        <select id="new_select" name="new_select" 
                                                        class="form-control " required>
                                                            <option >Choose...</option>
                                                            


                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Issue Date</label>
                                                        <input id="basicFlatpickr" name="basicFlatpickr"
                                                            class="form-control flatpickr flatpickr-input active"
                                                            type="text" placeholder="Select Issue Date..">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Expiry Date</label>
                                                        <input id="basicFlatpickr1" name="basicFlatpickr1"
                                                            class="form-control flatpickr flatpickr-input active"
                                                            type="text" placeholder="Select Expiry Date..">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Duration</label>
                                                        <input type="text" class="form-control" id="duration"
                                                            name="duration" placeholder="Enter Duration" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Insurance / Tracker Company</label>
                                                        <input type="text" class="form-control" id="i_t_company"
                                                            name="i_t_company"
                                                            placeholder="Enter Insurance / Tracker Company" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Customer</label>
                                                        <select id="customer" name="customer"
                                                            class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <?php foreach($result2 as $key => $value){ ?>
                                                            <option value="<?= $value['id'];?>"><?= $value['fname']; ?>
                                                                <?= $value['lname']; ?></option>
                                                            <?php } 
                                                            ?>


                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">NTN</label>
                                                        <input type="text" class="form-control" id="ntn" name="ntn"
                                                            placeholder="Enter NTN" required>
                                                    </div>

                                                    <div class="form-group col-md-6 "><label for=""
                                                            class="lab">Decumentation</label><input type="file"
                                                            class="form-control" id="file" name="file"
                                                            placeholder="Decumentation" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Sum Insured</label>
                                                        <input type="text" class="form-control" id="s_insured" name="s_insured"
                                                            placeholder="Enter Sum Insured" required>
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Net Premium </label>
                                                        <input type="text" class="form-control" id="net_premium" name="net_premium"
                                                            placeholder="Enter Net Premium" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Gross Premium </label>
                                                        <input type="text" class="form-control" id="gross_premium" name="gross_premium"
                                                            placeholder="Enter Gross Premium" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Perils Cover </label>
                                                        <input type="text" class="form-control" id="p_cover" name="p_cover"
                                                            placeholder="Enter Perils Cover" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Rate </label>
                                                        <input type="text" class="form-control" id="rate" name="rate"
                                                            placeholder="Enter Rate" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Insurance Company Representative (Contact) </label>
                                                        <input type="text" class="form-control" id="i_c" name="i_c"
                                                            placeholder="Enter Insurance Company Representative (Contact)" required>
                                                    </div>
                                                </div>


                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary  font-weight-bold mx-2"
                                                                style="float: right; ">SAVE</button>
                                                            <a class="btn mx-2" href="manage_family_product_h.php"
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/noUiSlider/nouislider.min.js"></script>

    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>

    <script>
    var f2 = flatpickr(document.getElementById('basicFlatpickr1'));
    </script>
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $("#sel_depart").change(function(){
            var deptid = $(this).val();
            console.log(deptid);
            $.ajax({
                url: 'getUsers.php?depart='+deptid+'',
                type: 'post',
                //data: {depart:deptid},
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    var len = response.length;
                    console.log("Hamza " + len)
                    $("#sel_user").empty();
                    for( var i = 0; i<=len; i++)
                    {   
                        var id = response[0]['id'];
                            var name = response[0]['name'];
                            console.log(id+"sa"+name)
                        $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");
                    }
                }
            });
        });

    });
</script> -->
<script type="text/javascript">
function fetch_select(val)
{
    console.log("hamza "+val)
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
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