<?php
include("sessioninput.php");


?>

<?php 
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Add Assets</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
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
            min-height: calc(100vh - 125px)!important;
        }
        .caret::before{
            content:none !important;
        }

    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
</head>
<?php
 include("config_indemnifier.php");
 session_start();
 $imeic = "SELECT imei from imei";
 $result = mysqli_query($db, $imeic);
 $groups = "SELECT name , id from create_group";
$result1 = mysqli_query($db, $groups);
if(isset($_POST['dvla']))
{
    // echo "You entered the number " . $_POST['pname']; 
    $pname = mysqli_real_escape_string($_POST['pname']);

    $url = "https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "x-api-key: o8xfJ2klTS3UsXuE6cMH96TbZQsFiuYbachUcvqE",
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data = '{"registrationNumber": "'.$_POST['pname'].'"}';

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    // echo $resp;
    
    $dvla = json_decode($resp);
    $make = $dvla->make;
    $reg = $dvla->registrationNumber;
    $color = $dvla->colour;
    $fuel = $dvla->fuelType;
    $engine = $dvla->engineCapacity;
    $yearOfManufacture = $dvla->yearOfManufacture;
    $taxedDue = $dvla->taxDueDate;
    $mot = $dvla->motStatus;
    // echo $reg;
    // echo $make;
    // echo $color;
    // echo $fuel;
    // echo $engine;
    // echo $yearOfManufacture;
    // echo $taxedDue;
    // echo $mot;
    curl_close($curl);
    // var_dump($resp);
}
else 
if(isset($_POST['useradd']))
{
   
// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $make = mysqli_real_escape_string($db,$_POST['make']); 
    $color = mysqli_real_escape_string($db,$_POST['color']); 
    $fuel = mysqli_real_escape_string($db,$_POST['fuel']); 
    $engine = mysqli_real_escape_string($db,$_POST['engine']); 
    $yearOfManufacture = mysqli_real_escape_string($db,$_POST['yearOfManufacture']); 
    $taxedDue = mysqli_real_escape_string($db,$_POST['taxedDue']); 
    $mot = mysqli_real_escape_string($db,$_POST['mot']); 

    $imei = mysqli_real_escape_string($db,$_POST['imei']); 
    $group = mysqli_real_escape_string($db,$_POST['group']); 
    $phone = mysqli_real_escape_string($db,$_POST['phone']); 
    $model = mysqli_real_escape_string($db,$_POST['model']); 
    $mileage = mysqli_real_escape_string($db,$_POST['mileage']); 
    $contact = mysqli_real_escape_string($db,$_POST['contact']); 
    $category = mysqli_real_escape_string($db,$_POST['category']);
    
            
           
    

    

    $sql1 = "INSERT INTO  tc_devices (`name`,`uniqueid`,  `attributes`, `phone`, `model`, `contact`, `category`, `disabled`)
    VALUES ('$name', '$imei', '{}','','$model','','$category','0')";

    if (mysqli_query($db, $sql1)) {
        echo '<script>alert("New record created successfully")</script>';
    } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
    }

    $tc_devices_id = "SELECT id FROM `tc_devices` ORDER BY `id` DESC limit 1";

    $result = $db->query($tc_devices_id);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $deviceid = $row["id"];
        //echo "id: " . $row["id"]. "<br>";
    }
    } else {
    echo "0 results";
    }

    echo $deviceid;

    $plateNum = $name;
    echo $plateNum;
    $trimplate = substr($plateNum, strrpos($plateNum, '' ));
    echo $trimplate;



    $sql = "INSERT INTO  addasset (`device_id`,`name`,`imei`, `assetGroup`, `phone`, `model`, `mileage`, `contact`, `category`,`make`,`colour`,`fuel`,`engine`,`yearOfManufacture`,`taxedDue`,`mot`)
    VALUES ('$deviceid','$name', '$imei', '$group',' $phone','$model','$mileage','','$category','$make','$color','$fuel','$engine','$yearOfManufacture','$taxedDue','$mot')";

        if (mysqli_query($db, $sql)) {
            echo '<script>alert("New record created successfully")</script>';
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        mysqli_close($db);
}




   


?>
<body class="sidebar-noneoverflow starterkit">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Add Assets</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

            <!-- <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Type here to search">
                        </div>
                    </form>
                </li>
            </ul> -->

            <ul class="navbar-item flex-row navbar-dropdown">
                <!-- <li class="nav-item dropdown language-dropdown more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/img/ca.png" class="flag-width" alt="flag"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                        <div class="dropdown-menu dropdown-menu-right animated fadeInUp" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-img-value="de" data-value="German" href="javascript:void(0);"><img src="assets/img/de.png" class="flag-width" alt="flag"> German</a>
                            <a class="dropdown-item" data-img-value="jp" data-value="Japanese" href="javascript:void(0);"><img src="assets/img/jp.png" class="flag-width" alt="flag"> Japanese</a>
                            <a class="dropdown-item" data-img-value="fr" data-value="French" href="javascript:void(0);"><img src="assets/img/fr.png" class="flag-width" alt="flag"> French</a>
                            <a class="dropdown-item" data-img-value="ca" data-value="English" href="javascript:void(0);"><img src="assets/img/ca.png" class="flag-width" alt="flag"> English</a>
                        </div>
                    </div>
                </li> -->
                
                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg><span class="badge badge-primary"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                        <div class="">
                            <!-- <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">KY</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Kara Young</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a> -->
                            <!-- <a class="dropdown-item">
                                <div class="">
                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">DA</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Daisy Anderson</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </a> -->
                            <!-- <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">OG</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Oscar Garner</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a> -->
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">

                            <!-- <div class="dropdown-item">
                                <div class="media server-log">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Server Rebooted</h6>
                                            <p class="">45 min ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="dropdown-item">
                                <div class="media ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Licence Expiring Soon</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="dropdown-item">
                                <div class="media file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kelly Portfolio.pdf</h6>
                                            <p class="">670 kb</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                        <!-- <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="assets/img/profile-7.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5>Alan Green</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="dropdown-item">
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>My Profile</span>
                            </a>
                        </div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
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
                                            <form action="" method = "post">
                                            <div class="form-row mb-2">
                                            <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Search DVLA detail for Asset</label>
                                                        <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter Plate Number" value="<?php echo $reg ?>">
                                                        <!-- <input type="submit" name="submit123">  -->
                                                        <!-- <button class="btn" name="submit123" style="margin-top:26px"> Search</button> -->
                                                    </div>
                                                    


                                                    <div class="form-group col-md-1 d-flex align-items-center">
                                                        <!-- <button class="btn btn-primary text-white" Type="submit" name="dvla" style=""> Search</button> -->
                                                        <button type="submit" name="dvla" class="btn btn-primary  font-weight-bold mx-2" style="margin-top:26px ">Search</button>

                                                    </div>
                                                    </div>
                                            </form>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action = "addAsset.php" method = "post">
                                            
                                             
                                                <div class="form-row mb-4">

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Asset Plate Number</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Plate Number" value="<?php echo $reg ?>" required>
                                                    </div>
                                                    


                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Make</label>
                                                        <input type="text" class="form-control" id="make" name="make" placeholder="" value="<?php echo $make ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Color</label>
                                                        <input type="text" class="form-control" id="color" name="color" placeholder="" value="<?php echo $color ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Fuel</label>
                                                        <input type="text" class="form-control" id="fuel" name="fuel" placeholder="" value="<?php echo $fuel ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Engine</label>
                                                        <input type="text" class="form-control" id="engine" name="engine" placeholder="" value="<?php echo $engine ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Year of Manufacture</label>
                                                        <input type="text" class="form-control" id="yearOfManufacture" name="yearOfManufacture" placeholder="" value="<?php echo $yearOfManufacture ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Taxed</label>
                                                        <input type="text" class="form-control" id="taxedDue" name="taxedDue" placeholder="Enter group" value="<?php echo $taxedDue ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Mot</label>
                                                        <input type="text" class="form-control" id="mot" name="mot" placeholder="Enter Mot" value="<?php echo $mot ?>">
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Model</label>
                                                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Mileage</label>
                                                        <input type="text" class="form-control" id="mileage" name="mileage" placeholder="Enter Mileage">
                                                    </div>

                                                    <!-- <div class="form-group col-md-6">
                                                        <label for="inputPassword4">IMEI</label>
                                                        <input type="text" class="form-control" id="imei" name="imei" placeholder="Enter IMEI" required>
                                                    </div> -->
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">IMEI</label>
                                                        
                                                        <select id="imei" name="imei" class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <?php foreach($result as $key => $value){ ?>
                                                                <option value="<?= $value['imei'];?>"><?= $value['imei']; ?></option> 
                                                            <?php } 
                                                            ?>
                                                            
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Sim Number</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Sim Number">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Group</label>
                                                        
                                                        <select id="group" name="group" class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <?php foreach($result1 as $key => $value){ ?>
                                                                <option value="<?= $value['name'];?>"><?= $value['name']; ?></option> 
                                                            <?php } 
                                                            ?>
                                                            
                                                            
                                                            
                                                        </select>
                                                    </div>
                                                    
                                                    
                                                    <!-- <div class="form-group col-md-6">
                                                        <label for="inputAddress">Contact</label>
                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact">
                                                    </div> -->
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">category</label>
                                                        <select id="category" name="category" class="form-control selectpicker">
                                                            <option selected>Choose...</option>
                                                            <option value="Car">Car</option>
                                                            <option value="Truck">Truck </option>
                                                            <option value="Motor Bike">Motor Bike</option>
                                                            <option value="Tank Lorry">Tank Lorry</option>
                                                            <option value="Mobile">Mobile</option>
                                                            
                                                        </select>
                                                    </div>
                                                    

                                                    <!-- <div class="form-group col-md-6 mt-4">
                                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                        <label for="vehicle1"> Disable</label><br>
                                                    </div> -->

                                                </div>
                                                
                                                
                                                
                                                <div class="container">
                                                    <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="submit" name="useradd" class="btn btn-primary  font-weight-bold mx-2" style="float: right; ">SAVE</button>
                                                                    <a class="btn mx-2" href="manageAsset.php" style="float: right;">CANCEL</a>

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
            <!-- <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div> -->
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
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="plugins/treeview/custom-jstree.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->
</html>