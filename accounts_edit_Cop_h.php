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
    <title>Accounts</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link href="assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />


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

    /* .form {
        padding: 10px;
        border: 1px dotted #000;
        margin: 5px;
    } */
    .table-responsive {
        width: 1000px !important;
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

$id = $_GET['id'];
$table_doc = $_GET['table'];
echo $table_doc;

if($table_doc==="Corporate"){
    $table_doc = "corporate";
    
}
else if($table_doc==="Person"){
    $table_doc = "accperson";
}
else if($table_doc==="Insurance"){
    $table_doc = "accinsurance";
}

echo $table_doc;

$qry = mysqli_query($db,"select * from $table_doc where id = '$id'"); // select query
$data = mysqli_fetch_array($qry);

if(isset($_POST['submit3']))
{	
    $name= $_POST['name'];
    $email= $_POST['email'];
    $website= $_POST['website'];
    $phone= $_POST['phone'];
    $fax= $_POST['fax'];
    $address= $_POST['address'];
    $ntn= $_POST['ntn'];
    

$sql = "UPDATE `accinsurance` SET `name`='$name',`website`='$website',`email`='$email',`phone`='$phone',`fax`='$fax',`address`='$address',`ntn`='$ntn' WHERE id = '$id'";
// echo $sql;

if (mysqli_query($db, $sql)) {
    // echo '<script>alert("New record created successfully !")</script>';
    // header("Location: manage_accounts_h.php");
    echo "<script>
alert('Record Update successfully..!');
window.location.href='manage_accounts_h.php';
</script>";
 } else {
    echo "Error: " . $sql . "" . mysqli_error($db);
 }
 
//  mysqli_close($db);

}


if(isset($_POST['submit1']))
{	
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $mobile= $_POST['mobile'];
    $nic= $_POST['nic'];
    $aphone= $_POST['aphone'];
    $fax= $_POST['fax'];
    $mail= $_POST['mail'];
    $ava= $_POST['ava'];
    $other= $_POST['other'];
    
    $sql1 = "UPDATE `accperson` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`mobile`='$mobile',`nic`='$nic',`aphone`='$aphone',`fax`='$fax',`mail`='$mail',`ava`='$ava',`other`='$other' WHERE id = '$id'";

    if (mysqli_query($db, $sql1)) {
        // echo "New record created successfully !";
        echo "<script>
    alert('Record Update successfully..!');
    window.location.href='manage_accounts_h.php';
    </script>";
    } else {
        echo "Error: " . $sql1 . "" . mysqli_error($db);
    }
 
//  mysqli_close($db);

} 

if(isset($_POST['submit2']))
{	
    $name= $_POST['name'];
    $website= $_POST['website'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $fax= $_POST['fax'];
    $address= $_POST['address'];
    $ntn= $_POST['ntn'];
   
     $sql2 = "UPDATE `corporate` SET `name`='$name',`website`='$website',`email`='$email',`phone`='$phone',`fax`='$fax',`address`='$address',`ntn`='$ntn' WHERE id = '$id'";

    if (mysqli_query($db, $sql2)) {
        echo "<script>
                alert('Record Update successfully..!');
                window.location.href='manage_accounts_h.php';
              </script>";
    } else {
        // $erre ="Error: " . $sql . "<br>" . mysqli_error($db);
        // echo "<script>alert('Error: Duplicate Email , Email already exist');</script>";
        echo "Error: " . $sql2 . "<br>" . mysqli_error($db);
    }
    
}

// mysqli_close($db);
?>
<script>
console.log('<?php echo $last_id;?>')
</script>
<?php
$result = mysqli_query($db,"SELECT * FROM `corporate`");

$persons = mysqli_query($db,"SELECT * FROM `addperson`");

$accperson = mysqli_query($db,"SELECT * FROM `accperson`");

$accinsurance = mysqli_query($db,"SELECT * FROM `accinsurance`");


?>


<body class="sidebar-noneoverflow starterkit">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Customer Accounts</h3>
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
                                            <!-- <form action="addCustomer.php" method="post"> -->
                                            <div class="form-row mb-3">
                                                <!-- <div class="form-group col-md-6">

                                                                                        <select class="form-control  basic" onchange="onch();"
                                                                                            id="formName9" name="blockUnits">
                                                                                            <option selected="selected" value="1">Select Form...
                                                                                            </option>
                                                                                            <option value="2">Corporate</option>
                                                                                            <option value="3">Individual</option>
                                                                                            <option value="4">Bank</option>

                                                                                        </select>
                                                                                    </div> -->
                                                <div class="form-group col-md-6">
                                                    <!-- <label for="inputPassword4">Type</label> -->
                                                </div>


                                                <!-- class="form-control  basic" -->

                                                <div id="form1" style="display:none;" class=" form">
                                                    <!-- <div>
                                                        array_shift
                                                    </div> -->
                                                </div>

                                                <div id="form2" style="display:none;" class=" form">
                                                    <h3>Account (Corporate)</h3>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="" method="post"
                                                                    enctype="multipart/form-data">

                                                                    <!-- <form name="add_name" id="add_name"> -->
                                                                    <div class="form-row mb-4">
                                                                        <input type="hidden" class="form-control"
                                                                            id="hid1" name="hid1" value="Corporate"
                                                                            placeholder="Enter Name">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4">Name</label>
                                                                            <input type="text" class="form-control"
                                                                                id="name" name="name" value="<?php echo $data['name'] ?>" 
                                                                                placeholder="Enter Name" required>
                                                                        </div>

                                                                        <div class="form-group col-md-6  ">
                                                                            <label for="" class="lab">Website</label>
                                                                            <input type="text" class="form-control"
                                                                                id="website" name="website" value="<?php echo $data['website'] ?>" 
                                                                                placeholder="Enter Website"
                                                                                required></svg>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Email</label><input
                                                                                type="text" class="form-control"
                                                                                id="email" name="email" value="<?php echo $data['email'] ?>" 
                                                                                placeholder="Enter Email" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Phone</label><input
                                                                                type="text" class="form-control"
                                                                                id="phone" name="phone" value="<?php echo $data['phone'] ?>" 
                                                                                placeholder="Enter Phone" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Fax</label><input
                                                                                type="text" class="form-control"
                                                                                id="fax" name="fax" value="<?php echo $data['fax'] ?>" 
                                                                                placeholder="Enter Fax" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Address</label><input
                                                                                type="text" class="form-control"
                                                                                id="address" name="address" value="<?php echo $data['address'] ?>"
                                                                                placeholder="Enter Address" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">NTN</label><input
                                                                                type="text" class="form-control"
                                                                                id="ntn" name="ntn" placeholder="NTN" value="<?php echo $data['ntn'] ?>"
                                                                                required>
                                                                        </div>
                                                                        <!-- <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Decumentation</label><input
                                                                                                                    type="file"
                                                                                                                    class="form-control"
                                                                                                                    id="file"
                                                                                                                    name="file"
                                                                                                                    placeholder="Decumentation"
                                                                                                                    required>
                                                                                                            </div> -->
                                                                    </div>


                                                                    <div class="field_wrapper">

                                                                    </div>

                                                                    <div class="container-fluid">
                                                                        <!-- <a href="javascript:void(0);"
                                                                                                                class="add_button btn btn-primary"
                                                                                                                title="Add field"
                                                                                                                style="float: right; ">Add
                                                                                                                Contact
                                                                                                            </a> -->
                                                                        <div class="col-md-12">
                                                                            <button
                                                                                class="btn btn-primary  font-weight-bold mx-2"
                                                                                name="submit2" type="submit"
                                                                                style="float: right; ">SAVE</button>
                                                                                <a class="btn mx-2"
                                                                                                                href="manage_accounts_h.php"
                                                                                                                style="float: right;">CANCEL</a>

                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div id="form3" style="display:none;" class=" form">
                                                    <h3>Account (Person) </h3>
                                                    <br>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="" method="post"
                                                                    enctype="multipart/form-data">
                                                                    <div class="form-row mb-4">
                                                                        <input type="hidden" class="form-control"
                                                                            id="hid2" name="hid2" value="Person"
                                                                            placeholder="Enter Name">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4">First
                                                                                Name</label>
                                                                            <input type="text" class="form-control"
                                                                                id="fname" name="fname" value="<?php echo $data['fname'] ?>" 
                                                                                placeholder="Enter Name" required>

                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4">Last
                                                                                Name</label>
                                                                            <input type="text" class="form-control"
                                                                                id="lname" name="lname" value="<?php echo $data['lname'] ?>"
                                                                                placeholder="Enter Email/Username"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6  ">
                                                                            <label for="" class="lab">Email</label>
                                                                            <input type="email" class="form-control"
                                                                                id="email" name="email" value="<?php echo $data['email'] ?>"
                                                                                placeholder="Enter Name" required></svg>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Phone</label><input
                                                                                type="text" class="form-control"
                                                                                id="phone" name="phone" value="<?php echo $data['phone'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Mobile</label><input
                                                                                type="text" class="form-control"
                                                                                id="mobile" name="mobile"value="<?php echo $data['mobile'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">NIC
                                                                                #</label><input type="text"
                                                                                class="form-control" id="nic" name="nic" value="<?php echo $data['nic'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Alternate
                                                                                Phone</label><input type="text"
                                                                                class="form-control" id="aphone" value="<?php echo $data['aphone'] ?>"
                                                                                name="aphone" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Fax</label><input
                                                                                type="text" class="form-control"
                                                                                id="fax" name="fax" value="<?php echo $data['fax'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Mailing
                                                                                Address</label><input type="text"
                                                                                class="form-control" id="mail" value="<?php echo $data['mail'] ?>"
                                                                                name="mail" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Availability
                                                                                Timings</label><input type="text"
                                                                                class="form-control" id="ava" name="ava" value="<?php echo $data['ava'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Other
                                                                                Address</label><input type="text"
                                                                                class="form-control" id="other" value="<?php echo $data['other'] ?>"
                                                                                name="other" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <!-- <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Documents</label>
                                                                                                                <input
                                                                                                                    type="file"
                                                                                                                    class="form-control"
                                                                                                                    id="file"
                                                                                                                    name="file"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div> -->

                                                                    </div>
                                                                    <div class="form-group col-md-6 ">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button
                                                                            class="btn btn-primary  font-weight-bold mx-2"
                                                                            name="submit1" type="submit"
                                                                            style="float: right; ">SAVE</button>
                                                                        <a class="btn mx-2"
                                                                                                                href="manage_accounts_h.php"
                                                                                                                style="float: right;">CANCEL</a>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </div>
                                                <div id="form4" style="display:none;" class=" form">
                                                    <h3>Account (Insurance)</h3>
                                                    <br>

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="" method="post"
                                                                    enctype="multipart/form-data">
                                                                    <div class="form-row mb-4">
                                                                        <input type="hidden" class="form-control"
                                                                            id="hid3" name="hid3" value="Insurance"
                                                                            placeholder="Enter Name">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4">Name</label>
                                                                            <input type="text" class="form-control"
                                                                                id="name" name="name" value="<?php echo $data['name'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6  ">
                                                                            <label for="" class="lab">Website</label>
                                                                            <input type="text" class="form-control"
                                                                                id="website" name="website" value="<?php echo $data['website'] ?>"
                                                                                placeholder="Enter Name" required></svg>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Email</label><input
                                                                                type="email" class="form-control"
                                                                                id="email" name="email" value="<?php echo $data['email'] ?>"
                                                                                placeholder="Enter email" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Phone</label><input
                                                                                type="text" class="form-control"
                                                                                id="phone" name="phone" value="<?php echo $data['phone'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Fax</label><input
                                                                                type="text" class="form-control"
                                                                                id="fax" name="fax" value="<?php echo $data['fax'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for=""
                                                                                class="lab">Address</label><input
                                                                                type="text" class="form-control"
                                                                                id="address" name="address" value="<?php echo $data['address'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">NTN</label><input
                                                                                type="text" class="form-control"
                                                                                id="ntn" name="ntn" value="<?php echo $data['ntn'] ?>"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <!-- <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Decumentation</label><input
                                                                                                                    type="file"
                                                                                                                    class="form-control"
                                                                                                                    id="file"
                                                                                                                    name="file"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div> -->
                                                                    </div>
                                                                    <div class="container">

                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <button
                                                                                    class="btn btn-primary  font-weight-bold mx-2"
                                                                                    name="submit3" type="submit"
                                                                                    style="float: right; ">SAVE</button>
                                                                                    <a class="btn mx-2"
                                                                                                                href="manage_accounts_h.php"
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
    var e = location.search.split('table=')[1]
    var a;
    console.log(e)

    if (e === 'Insurance') {
        a = 4;
    } else if (e === 'Corporate') {
        a = 2;
    } else if (e === 'Person') {
        a = 3;
    }

    // var e = document.getElementById("formName9");
    var strUser = a;
    console.log(strUser);
    if (strUser == 1) {
        document.getElementById("form1").style.display = "block";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "none";
    }
    if (strUser == 2) {
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "block";
        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "none";
    }
    if (strUser == 3) {
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "block";
        document.getElementById("form4").style.display = "none";
    }
    if (strUser == 4) {
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "block";
    }
    </script>
    <!--  -->
    <script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div id="row' + i +
            '"><br> <h4>Contact Person</h4>  <div class="form-row mb-4" > <div class="form-group col-md-6"> <label for="inputEmail4">First Name</label> <input   type="text" class="form-control" id="fname1" name="fname1[]" placeholder="Enter Name" required>  </div>   <div class="form-group col-md-6"> <label for="inputPassword4">Last Name</label> <input  type="text" class="form-control" id="lname1"  name="lname1[]" placeholder="Enter Email/Username"  required> </div>  <div class="form-group col-md-6  "> <label for=""  class="lab">Email</label> <input type="email"  class="form-control" id="email1" name="email1[]"   placeholder="Enter Name" required></svg> </div>    <div class="form-group col-md-6 "><label for=""  class="lab">Phone</label><input type="text"  class="form-control" id="phone1" name="phone1[]"  placeholder="Enter Name" required> </div>  <div class="form-group col-md-6 "><label for=""    class="lab">Mobile</label><input type="text"   class="form-control" id="mobile1" name="mobile1[]"  placeholder="Enter Name" required></div>  <div class="form-group col-md-6 "><label for=""  class="lab">NIC #</label><input type="text"  class="form-control" id="nic1" name="nic1[]"  placeholder="Enter Name" required></div>   <div class="form-group col-md-6 "><label for=""  class="lab">Alternate Phone</label><input   type="text" class="form-control" id="aphone1"    name="aphone1[]" placeholder="Enter Name" required> </div>     <div class="form-group col-md-6 "><label for=""   class="lab">Fax</label><input type="text"  class="form-control" id="fax1" name="fax1[]"  placeholder="Enter Name" required></div> <div class="form-group col-md-6 "><label for=""   class="lab">Mailing Address</label><input  type="text" class="form-control" id="mail1"  name="mail1[]" placeholder="Enter Name" required>     </div>  <div class="form-group col-md-6 "><label for=""  class="lab">Availability Timings</label><input   type="text" class="form-control" id="ava1"  name="ava1[]" placeholder="Enter Name" required>  </div>  <div class="form-group col-md-6 "><label for=""  class="lab">Other Address</label><input  type="text" class="form-control" id="other1"     name="other1[]" placeholder="Enter Name" required>    </div>  <div class="form-group col-md-6 "><label for=""   class="lab">Documents</label><input type="file" class="form-control" id="file1" name="file1[]"   placeholder="Enter Name" required></div></div> <button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button> </div>'; //New input field html 
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
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $("#submit2").on('click', function() {
            var input = document.getElementsByName('fname[]');

            for (var i = 0; i < input.length; i++) {
                var a = input[i];
                k = k + "array[" + i + "].value= " +
                    a.value + " ";
                console.log(k);
            }
            $.ajax({
                url: "cop.php",
                type: "POST",
                data: formdata,
                cache: false,
                success: function(result) {
                    alert(result);
                    $("#add_name")[0].reset();
                }
            });
        });
    });
    </script>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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

    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="assets/js/components/ui-accordions.js"></script>
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
    </script>
    <script>
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
    </script>
    <script>
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
    </script>
    <script>
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
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>