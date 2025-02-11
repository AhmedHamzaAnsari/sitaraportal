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
    .table-responsive{
        width:1000px !important;
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


if(isset($_POST['submit3']))
{	
    $name= $_POST['name'];
    $email= $_POST['email'];
    $website= $_POST['website'];
    $phone= $_POST['phone'];
    $fax= $_POST['fax'];
    $address= $_POST['address'];
    $ntn= $_POST['ntn'];
    // $doc= $_POST['doc'];
    // $selectBox= $_POST['selectBox'];
      
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    //  $file_type = $_FILES['file']['type'];
    $folder="uploads/";
    move_uploaded_file($file_loc,$folder.$file);

  $sql = "INSERT INTO `accinsurance`(`name`,`email`,`website`,`phone`,`fax`,`address`,`ntn`,`file`,`size`) 
  VALUES ('$name','$email','$website','$phone','$fax','$address','$ntn','$file','$file_size')";
echo $sql;

if (mysqli_query($db, $sql)) {
    echo "New record created successfully !";
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
    
      
$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
//  $file_type = $_FILES['file']['type'];
$folder="uploads/";
move_uploaded_file($file_loc,$folder.$file);

    // $selectBox= $_POST['selectBox'];

  $sql1 = "INSERT INTO `accperson`(`fname`,`lname`,`email`,`phone`,`mobile`,`nic`,`aphone`,`fax`,`mail`,`ava`,`other`,`file`,`size`) 
  VALUES ('$fname','$lname','$email','$phone','$mobile','$nic','$aphone','$fax','$mail','$ava','$other','$file','$file_size')";
// echo $sql1;

if (mysqli_query($db, $sql1)) {
    echo "New record created successfully !";
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
       // $file= $_POST['file'];
 


$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
//  $file_type = $_FILES['file']['type'];
$folder="uploads/";

move_uploaded_file($file_loc,$folder.$file);

  $sql2  = "INSERT INTO `corporate`(name,website,email,phone,fax,address,ntn,file,size) 
  VALUES ('$name','$website','$email','$phone','$fax','$address','$ntn','$file','$file_size')";
// echo $sql2;

if ($db->query($sql2) === TRUE) {
    $last_id = $db->insert_id;
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
    
    $bname = $_POST['fname1'];
    $bname2 = $_POST['lname1'];
    $email2 = $_POST['email1'];
    $phone2= $_POST['phone1'];
    $mobile2= $_POST['mobile1'];
    $nic2= $_POST['nic1'];
    $aphone2= $_POST['aphone1'];
    $fax2= $_POST['fax1'];
    $mail2= $_POST['mail1'];
    $ava2= $_POST['ava1'];
    $other2= $_POST['other1'];
    //$file2= $_POST['file1'];
   $docbbname =  $_FILES['file1']['name'];
   $file_loc =  $_FILES['file1']['tmp_name'];
//    $docbbname =  $_FILES['file1']['name'];
   $file_type = $_FILES['file']['type'];
   $folder="uploads/";
   
    $i = 0;
    foreach ($bname as $bbname) {
        //$file2 = rand(1000,100000)."-".$docbb[$i]['name'];

        move_uploaded_file($file_loc[$i],$folder.$docbbname[$i]);
        $sqlbasit  = "INSERT INTO addperson(fname,lname,email,phone,mobile,nic,aphone,fax,mail,ava,other,filedoc,mainid) 
    VALUES ('$bbname','$bname2[$i]','$email2[$i]','$phone2[$i]','$mobile2[$i]','$nic2[$i]','$aphone2[$i]','$fax2[$i]','$mail2[$i]','$ava2[$i]','$other2[$i]','$docbbname[$i]','$last_id')";
    $db->query($sqlbasit) ;
    $i++;
      }
  } else {
    echo "Error: " . $sql . "<br>" . $db->error;
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
                                                <div class="form-group col-md-6">

                                                    <select class="form-control  basic" onchange="onch();"
                                                        id="formName9" name="blockUnits">
                                                        <option selected="selected" value="1">Select Form...
                                                        </option>
                                                        <option value="2">Corporate</option>
                                                        <option value="3">Individual</option>
                                                        <option value="4">Bank</option>

                                                    </select>
                                                </div>
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
                                                                        <div class="form-group col-md-6"> <label
                                                                                for="inputEmail4">Name</label> <input
                                                                                type="text" class="form-control"
                                                                                id="name" name="name"
                                                                                placeholder="Enter Name" required>
                                                                        </div>

                                                                        <div class="form-group col-md-6  "> <label
                                                                                for="" class="lab">Website</label>
                                                                            <input type="text" class="form-control"
                                                                                id="website" name="website"
                                                                                placeholder="Enter Website"
                                                                                required></svg>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Email</label><input
                                                                                type="text" class="form-control"
                                                                                id="email" name="email"
                                                                                placeholder="Enter Email" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Phone</label><input
                                                                                type="text" class="form-control"
                                                                                id="phone" name="phone"
                                                                                placeholder="Enter Phone" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Fax</label><input
                                                                                type="text" class="form-control"
                                                                                id="fax" name="fax"
                                                                                placeholder="Enter Fax" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Address</label><input
                                                                                type="text" class="form-control"
                                                                                id="address" name="address"
                                                                                placeholder="Enter Address" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">NTN</label><input
                                                                                type="text" class="form-control"
                                                                                id="ntn" name="ntn" placeholder="NTN"
                                                                                required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Decumentation</label><input
                                                                                type="file" class="form-control"
                                                                                id="file" name="file"
                                                                                placeholder="Decumentation" required>
                                                                        </div>
                                                                    </div>


                                                                    <div class="field_wrapper">

                                                                    </div>

                                                                    <div class="container-fluid">
                                                                        <a href="javascript:void(0);"
                                                                            class="add_button btn btn-primary"
                                                                            title="Add field" style="float: right; ">Add
                                                                            Contact </a>
                                                                        <div class="col-md-12">
                                                                            <button
                                                                                class="btn btn-primary  font-weight-bold mx-2"
                                                                                name="submit2" type="submit"
                                                                                style="float: right; ">SAVE</button>
                                                                            <a class="btn mx-2" href="#"
                                                                                style="float: right;">CANCEL</a>

                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="widget-content widget-content-area mt-5">
                                                        <div id="toggleAccordion">
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne1">
                                                                    <section class="mb-0 mt-0">
                                                                        <div role="menu" class="collapsed"
                                                                            data-toggle="collapse"
                                                                            data-target="#defaultAccordionOne"
                                                                            aria-expanded="true"
                                                                            aria-controls="defaultAccordionOne">
                                                                            Account (Corporate) <div class="icons"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-chevron-down">
                                                                                    <polyline points="6 9 12 15 18 9">
                                                                                    </polyline>
                                                                                </svg></div>
                                                                        </div>
                                                                    </section>
                                                                </div>

                                                                <div id="defaultAccordionOne" class="collapse"
                                                                    aria-labelledby="headingOne1"
                                                                    data-parent="#toggleAccordion">
                                                                    <div class="card-body">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div
                                                                                        class="table-responsive mb-4 mt-4">
                                                                                        <?php
                                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                            ?>
                                                                                        <table id="html5-extension"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        S.No</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Name</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Website</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Email</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Phone</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Fax</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Address</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        NTN</th>
                                                                                                        <th
                                                                                                        class="text-center">
                                                                                                        Doc File</th>
                                                                                                    <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit</th> -->
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Delete</th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row = mysqli_fetch_array($result)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["name"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["website"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["email"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["phone"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["fax"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["address"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row["ntn"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a href="uploads/<?php echo $row["file"]; ?>" target="_blank">
                                                                                                        <?php echo $row["file"]; ?></a>
                                                                                                    </td>

                                                                                                    <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="edit_family_Product_h.php?id=<?php echo $row['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a onclick="return confirm('Are you sure to Delete this User ?');"
                                                                                                            href="delete_familyProduct.php?id=<?php echo $row['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Delete"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-trash-2 text-danger warning ">
                                                                                                                <polyline
                                                                                                                    points="3 6 5 6 21 6">
                                                                                                                </polyline>
                                                                                                                <path
                                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="11"
                                                                                                                    x2="10"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="11"
                                                                                                                    x2="14"
                                                                                                                    y2="17">
                                                                                                                </line>
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
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingThree1">
                                                                    <section class="mb-0 mt-0">
                                                                        <div role="menu" class="collapsed"
                                                                            data-toggle="collapse"
                                                                            data-target="#defaultAccordionThree"
                                                                            aria-expanded="false"
                                                                            aria-controls="defaultAccordionThree">
                                                                            Contact Person <div class="icons"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-chevron-down">
                                                                                    <polyline points="6 9 12 15 18 9">
                                                                                    </polyline>
                                                                                </svg></div>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div id="defaultAccordionThree" class="collapse"
                                                                    aria-labelledby="headingThree1"
                                                                    data-parent="#toggleAccordion">
                                                                    <div class="card-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div
                                                                                        class="table-responsive mb-4 mt-4">
                                                                                        <?php
                                                                                                if (mysqli_num_rows($persons) > 0) {
                                                                                            ?>
                                                                                        <table id="html5-extension1"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        S.No</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        First Name</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Last Name</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Email</th>

                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Phone</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Mobile</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        NIC</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Alternate Phone
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Fax</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Mailing Address
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Availability
                                                                                                        Timings</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Other Address
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Doc File
                                                                                                    </th>
                                                                                                    <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit</th> -->
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Delete</th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row1 = mysqli_fetch_array($persons)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["fname"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["lname"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["email"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["phone"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["mobile"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["nic"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["aphone"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["fax"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["mail"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["ava"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row1["other"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a href="uploads/<?php echo $row1["filedoc"]; ?>" target="_blank">
                                                                                                        <?php echo $row1["filedoc"]; ?></a>
                                                                                                    </td>

                                                                                                    <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="edit_family_Product_h.php?id=<?php echo $row1['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a onclick="return confirm('Are you sure to Delete this User ?');"
                                                                                                            href="delete_familyProduct.php?id=<?php echo $row1['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Delete"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-trash-2 text-danger warning ">
                                                                                                                <polyline
                                                                                                                    points="3 6 5 6 21 6">
                                                                                                                </polyline>
                                                                                                                <path
                                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="11"
                                                                                                                    x2="10"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="11"
                                                                                                                    x2="14"
                                                                                                                    y2="17">
                                                                                                                </line>
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
                                                                </div>
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
                                                                        <div class="form-group col-md-6"> <label
                                                                                for="inputEmail4">First
                                                                                Name</label> <input type="text"
                                                                                class="form-control" id="fname"
                                                                                name="fname" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6"> <label
                                                                                for="inputPassword4">Last
                                                                                Name</label> <input type="text"
                                                                                class="form-control" id="lname"
                                                                                name="lname"
                                                                                placeholder="Enter Email/Username"
                                                                                required> </div>
                                                                        <div class="form-group col-md-6  "> <label
                                                                                for="" class="lab">Email</label> <input
                                                                                type="email" class="form-control"
                                                                                id="email" name="email"
                                                                                placeholder="Enter Name" required></svg>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Phone</label><input
                                                                                type="text" class="form-control"
                                                                                id="phone" name="phone"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Mobile</label><input
                                                                                type="text" class="form-control"
                                                                                id="mobile" name="mobile"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">NIC
                                                                                #</label><input type="text"
                                                                                class="form-control" id="nic" name="nic"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Alternate
                                                                                Phone</label><input type="text"
                                                                                class="form-control" id="aphone"
                                                                                name="aphone" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Fax</label><input
                                                                                type="text" class="form-control"
                                                                                id="fax" name="fax"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Mailing
                                                                                Address</label><input type="text"
                                                                                class="form-control" id="mail"
                                                                                name="mail" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Availability
                                                                                Timings</label><input type="text"
                                                                                class="form-control" id="ava" name="ava"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Other
                                                                                Address</label><input type="text"
                                                                                class="form-control" id="other"
                                                                                name="other" placeholder="Enter Name"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 ">
                                                                            <label for="" class="lab">Documents</label>
                                                                            <input type="file" class="form-control"
                                                                                id="file" name="file"
                                                                                placeholder="Enter Name" required>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-md-6 ">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button
                                                                            class="btn btn-primary  font-weight-bold mx-2"
                                                                            name="submit1" type="submit"
                                                                            style="float: right; ">SAVE</button>
                                                                        <a class="btn mx-2" href="managecustomer.php"
                                                                            style="float: right;">CANCEL</a>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="widget-content widget-content-area mt-5">
                                                        <div id="toggleAccordion1">
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne11">
                                                                    <section class="mb-0 mt-0">
                                                                        <div role="menu" class="collapsed"
                                                                            data-toggle="collapse"
                                                                            data-target="#defaultAccordionOne1"
                                                                            aria-expanded="true"
                                                                            aria-controls="defaultAccordionOne1">
                                                                            Account (Person) <div class="icons"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-chevron-down">
                                                                                    <polyline points="6 9 12 15 18 9">
                                                                                    </polyline>
                                                                                </svg></div>
                                                                        </div>
                                                                    </section>
                                                                </div>

                                                                <div id="defaultAccordionOne1" class="collapse"
                                                                    aria-labelledby="headingOne11"
                                                                    data-parent="#toggleAccordion1">
                                                                    <div class="card-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div
                                                                                        class="table-responsive mb-4 mt-4">
                                                                                        <?php
                                                                                                if (mysqli_num_rows($accperson) > 0) {
                                                                                            ?>
                                                                                        <table id="html5-extension2"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        S.No</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        First Name</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Last Name</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Email</th>

                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Phone</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Mobile</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        NIC</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Alternate Phone
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Fax</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Mailing Address
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Availability
                                                                                                        Timings</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Other Address
                                                                                                    </th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Doc File
                                                                                                    </th>
                                                                                                    <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit</th> -->
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Delete</th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row2 = mysqli_fetch_array($accperson)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["fname"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["lname"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["email"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["phone"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["mobile"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["nic"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["aphone"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["fax"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["mail"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["ava"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row2["other"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a href="uploads/<?php echo $row2["file"]; ?>" target="_blank">
                                                                                                        <?php echo $row2["file"]; ?></a>
                                                                                                    </td>

                                                                                                    <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="edit_family_Product_h.php?id=<?php echo $row1['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a onclick="return confirm('Are you sure to Delete this User ?');"
                                                                                                            href="delete_familyProduct.php?id=<?php echo $row2['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Delete"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-trash-2 text-danger warning ">
                                                                                                                <polyline
                                                                                                                    points="3 6 5 6 21 6">
                                                                                                                </polyline>
                                                                                                                <path
                                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="11"
                                                                                                                    x2="10"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="11"
                                                                                                                    x2="14"
                                                                                                                    y2="17">
                                                                                                                </line>
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
                                                                </div>
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
                                                                        <div class="form-group col-md-6"> <label
                                                                                for="inputEmail4">Name</label>
                                                                            <input type="text" class="form-control"
                                                                                id="name" name="name"
                                                                                placeholder="Enter Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6  "> <label
                                                                                for="" class="lab">Website</label>
                                                                            <input type="text" class="form-control"
                                                                                id="website" name="website"
                                                                                placeholder="Enter Name" required></svg>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Email</label><input
                                                                                type="email" class="form-control"
                                                                                id="email" name="email"
                                                                                placeholder="Enter email" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Phone</label><input
                                                                                type="text" class="form-control"
                                                                                id="phone" name="phone"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Fax</label><input
                                                                                type="text" class="form-control"
                                                                                id="fax" name="fax"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Address</label><input
                                                                                type="text" class="form-control"
                                                                                id="address" name="address"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">NTN</label><input
                                                                                type="text" class="form-control"
                                                                                id="ntn" name="ntn"
                                                                                placeholder="Enter Name" required></div>
                                                                        <div class="form-group col-md-6 "><label for=""
                                                                                class="lab">Decumentation</label><input
                                                                                type="file" class="form-control"
                                                                                id="file" name="file"
                                                                                placeholder="Enter Name" required></div>
                                                                    </div>
                                                                    <div class="container">

                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <button
                                                                                    class="btn btn-primary  font-weight-bold mx-2"
                                                                                    name="submit3" type="submit3"
                                                                                    style="float: right; ">SAVE</button>
                                                                                <a class="btn mx-2"
                                                                                    href="managecustomer.php"
                                                                                    style="float: right;">CANCEL</a>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="widget-content widget-content-area mt-5">
                                                        <div id="toggleAccordion12">
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne112">
                                                                    <section class="mb-0 mt-0">
                                                                        <div role="menu" class="collapsed"
                                                                            data-toggle="collapse"
                                                                            data-target="#defaultAccordionOne12"
                                                                            aria-expanded="true"
                                                                            aria-controls="defaultAccordionOne12">
                                                                            Account (Insurance) <div class="icons"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-chevron-down">
                                                                                    <polyline points="6 9 12 15 18 9">
                                                                                    </polyline>
                                                                                </svg></div>
                                                                        </div>
                                                                    </section>
                                                                </div>

                                                                <div id="defaultAccordionOne12" class="collapse"
                                                                    aria-labelledby="headingOne112"
                                                                    data-parent="#toggleAccordion12">
                                                                    <div class="card-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div
                                                                                        class="table-responsive mb-4 mt-4">
                                                                                        <?php
                                                                                                if (mysqli_num_rows($accinsurance) > 0) {
                                                                                            ?>
                                                                                        <table id="html5-extension3"
                                                                                            class="table table-hover non-hover"
                                                                                            style="width:100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        S.No</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Name</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Website</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Email</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Phone</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Fax</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Address</th>
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        NTN</th>
                                                                                                        <th
                                                                                                        class="text-center">
                                                                                                        Doc File</th>
                                                                                                    <!-- <th
                                                                                                        class="text-center">
                                                                                                        Edit</th> -->
                                                                                                    <th
                                                                                                        class="text-center">
                                                                                                        Delete</th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                    $i=1;
                                                                                                    while($row3 = mysqli_fetch_array($accinsurance)) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $i ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["name"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["website"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["email"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["phone"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["fax"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["address"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <?php echo $row3["ntn"]; ?>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a href="uploads/<?php echo $row3["file"]; ?>" target="_blank">
                                                                                                        <?php echo $row3["file"]; ?></a>
                                                                                                    </td>

                                                                                                    <!-- <td
                                                                                                        class="text-center">
                                                                                                        <a href="edit_family_Product_h.php?id=<?php echo $row3['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Edit"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-edit-2 text-success">
                                                                                                                <path
                                                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                                                </path>
                                                                                                            </svg></a>
                                                                                                    </td> -->
                                                                                                    <td
                                                                                                        class="text-center">
                                                                                                        <a onclick="return confirm('Are you sure to Delete this User ?');"
                                                                                                            href="delete_familyProduct.php?id=<?php echo $row3['id']; ?>"
                                                                                                            data-toggle="tooltip"
                                                                                                            data-placement="top"
                                                                                                            title="Delete"><svg
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="24"
                                                                                                                height="24"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                fill="none"
                                                                                                                stroke="currentColor"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round"
                                                                                                                class="feather feather-trash-2 text-danger warning ">
                                                                                                                <polyline
                                                                                                                    points="3 6 5 6 21 6">
                                                                                                                </polyline>
                                                                                                                <path
                                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                                </path>
                                                                                                                <line
                                                                                                                    x1="10"
                                                                                                                    y1="11"
                                                                                                                    x2="10"
                                                                                                                    y2="17">
                                                                                                                </line>
                                                                                                                <line
                                                                                                                    x1="14"
                                                                                                                    y1="11"
                                                                                                                    x2="14"
                                                                                                                    y2="17">
                                                                                                                </line>
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
    function onch() {
        var e = document.getElementById("formName9");
        var strUser = e.value;
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

    };
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