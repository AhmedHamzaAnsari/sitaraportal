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
    <title>Manage Accounts</title>
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

    .modal-content .modal-body {
        padding: 0;
    }

    .modal-body {
        padding: 0;
    }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
include("config_indemnifier.php");
$result = mysqli_query($db,"SELECT w.id,w.name,w.email,w.phone,w.fax,w.privilege FROM accinsurance w UNION ALL SELECT m.id,m.name,m.email,m.phone,m.fax,m.privilege FROM corporate  m UNION ALL SELECT n.id,n.fname,n.email,n.phone,n.fax,n.privilege FROM accperson  n");
// $result = "SELECT tc_users.name,tc_users.email,users.privilege,users.login,users.description\n"

//     . "FROM tc_users\n"

//     . "INNER JOIN users ON tc_users.id=users.id";
?>

<?php

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
    $hid3= $_POST['hid3'];
    // $doc= $_POST['doc'];
    // $selectBox= $_POST['selectBox'];
      
    // $file = rand(1000,100000)."-".$_FILES['file']['name'];
    // $file_loc = $_FILES['file']['tmp_name'];
    // $file_size = $_FILES['file']['size'];
    // //  $file_type = $_FILES['file']['type'];
    // $folder="uploads/";
    // move_uploaded_file($file_loc,$folder.$file);

  $sql = "INSERT INTO `accinsurance`(`name`,`email`,`website`,`phone`,`fax`,`address`,`ntn`,`privilege`) 
  VALUES ('$name','$email','$website','$phone','$fax','$address','$ntn','$hid3')";
echo $sql;

if (mysqli_query($db, $sql)) {
    // echo '<script>alert("New record created successfully !")</script>';
    // header("Location: manage_accounts_h.php");
    echo "<script>
alert('New Record Created successfully..!');
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
    $hid2= $_POST['hid2'];
    
      
// $file = rand(1000,100000)."-".$_FILES['file']['name'];
// $file_loc = $_FILES['file']['tmp_name'];
// $file_size = $_FILES['file']['size'];
// //  $file_type = $_FILES['file']['type'];
// $folder="uploads/";
// move_uploaded_file($file_loc,$folder.$file);

    // $selectBox= $_POST['selectBox'];

  $sql1 = "INSERT INTO `accperson`(`fname`,`lname`,`email`,`phone`,`mobile`,`nic`,`aphone`,`fax`,`mail`,`ava`,`other`,`privilege`) 
  VALUES ('$fname','$lname','$email','$phone','$mobile','$nic','$aphone','$fax','$mail','$ava','$other','$hid2')";
// echo $sql1;

if (mysqli_query($db, $sql1)) {
    // echo "New record created successfully !";
    echo "<script>
alert('New Record Created successfully..!');
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
    $hid1= $_POST['hid1'];
       // $file= $_POST['file'];
 


    // $file = rand(1000,100000)."-".$_FILES['file']['name'];
    // $file_loc = $_FILES['file']['tmp_name'];
    // $file_size = $_FILES['file']['size'];
    //  $file_type = $_FILES['file']['type'];
    // $folder="uploads/";

    // move_uploaded_file($file_loc,$folder.$file);

  $sql2  = "INSERT INTO `corporate`(name,website,email,phone,fax,address,ntn,privilege) 
  VALUES ('$name','$website','$email','$phone','$fax','$address','$ntn','$hid1')";

    if (mysqli_query($db, $sql2)) {
        echo "<script>
alert('New Record Created successfully..!');
window.location.href='manage_accounts_h.php';
</script>";
    } else {
        // $erre ="Error: " . $sql . "<br>" . mysqli_error($db);
        // echo "<script>alert('Error: Duplicate Email , Email already exist');</script>";
        echo "Error: " . $sql2 . "<br>" . mysqli_error($db);
    }
    // echo $sql2;

    // if ($db->query($sql2) === TRUE) {
    //     $last_id = $db->insert_id;
    //     // echo "New record created successfully. Last inserted ID is: " . $last_id;
        
    //     $bname = $_POST['fname1'];
    //     $bname2 = $_POST['lname1'];
    //     $email2 = $_POST['email1'];
    //     $phone2= $_POST['phone1'];
    //     $mobile2= $_POST['mobile1'];
    //     $nic2= $_POST['nic1'];
    //     $aphone2= $_POST['aphone1'];
    //     $fax2= $_POST['fax1'];
    //     $mail2= $_POST['mail1'];
    //     $ava2= $_POST['ava1'];
    //     $other2= $_POST['other1'];
    //     //$file2= $_POST['file1'];
    //     $docbbname =  $_FILES['file1']['name'];
    //     $file_loc =  $_FILES['file1']['tmp_name'];
    //     //$docbbname =  $_FILES['file1']['name'];
    //     $file_type = $_FILES['file']['type'];
    //     $folder="uploads/";
    
    //     $i = 0;
    //     foreach ($bname as $bbname) {
    //         //$file2 = rand(1000,100000)."-".$docbb[$i]['name'];

    //         move_uploaded_file($file_loc[$i],$folder.$docbbname[$i]);
    //         $sqlbasit  = "INSERT INTO addperson(fname,lname,email,phone,mobile,nic,aphone,fax,mail,ava,other,filedoc,mainid) 
    //     VALUES ('$bbname','$bname2[$i]','$email2[$i]','$phone2[$i]','$mobile2[$i]','$nic2[$i]','$aphone2[$i]','$fax2[$i]','$mail2[$i]','$ava2[$i]','$other2[$i]','$docbbname[$i]','$last_id')";
    //     $db->query($sqlbasit) ;
    //     $i++;
    //       }
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $db->error;
    //   }
}
if(isset($_POST['submit5']))
{
    $main_id = $_POST['main_id'];
    $bname = $_POST['fname1'];
    // $bname2 = $_POST['lname1'];
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
    // $file11 = rand(1000,100000)."-".$_FILES['file11']['name'];
    // $file_loc11 = $_FILES['file11']['tmp_name'];
    // // $file_size1 = $_FILES['file11']['size'];
    // //  $file_type = $_FILES['file']['type'];
    // $folder="uploads/";1

   
    // $i = 0;
    // foreach ($bname as $bbname) {
    //     //$file2 = rand(1000,100000)."-".$docbb[$i]['name'];

    //     move_uploaded_file($file_loc11,$folder.$file11);
    //     $sql  = "INSERT INTO addperson(fname,lname,email,phone,mobile,nic,aphone,fax,mail,ava,other,filedoc,mainid) 
    //     VALUES ('$bbname','$bname2[$i]','$email2[$i]','$phone2[$i]','$mobile2[$i]','$nic2[$i]','$aphone2[$i]','$fax2[$i]','$mail2[$i]','$ava2[$i]','$other2[$i]','$file11','$main_id')";
    //     $db->query($sql) ;
    //     $i++;
    // }

    // $file11 = rand(1000,100000)."-".$_FILES['file11']['name'];
    // $file_loc11 = $_FILES['file11']['tmp_name'];
    // $file_size = $_FILES['file']['size'];
    //  $file_type = $_FILES['file']['type'];
    // $folder="uploads/";
    // move_uploaded_file($file_loc11,$folder.$file11);

    $sql  = "INSERT INTO addperson(fname,email,phone,mobile,nic,aphone,fax,mail,ava,other,mainid) 
    VALUES ('$bname','$email2','$phone2','$mobile2','$nic2','$aphone2','$fax2','$mail2','$ava2','$other2','$main_id')";
    // echo $sql;

    if (mysqli_query($db, $sql)) {
        echo "<script>
        alert('New Record Created successfully..!');
        window.location.href='manage_accounts_h.php';
        </script>";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($db);
    }
  
}

if(isset($_POST['submit6']))
{
    $main_id_doc = $_POST['main_id_doc'];
    $table_doc = $_POST['table_doc'];

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

    $user_doc = $_FILES['user_doc']['name'];
    $file_loc12 = $_FILES['user_doc']['tmp_name'];
    // $file_size = $_FILES['file']['size'];
    //  $file_type = $_FILES['file']['type'];
    $folder="uploads/";
    // move_uploaded_file($file_loc12,$folder.$user_doc);

    // $sql  = "INSERT INTO `users_doc`(`table_name`, `table_user_id`, `user_doc`) VALUES ('$table_doc','$main_id_doc','$user_doc')";
    // echo $sql;

    // if (mysqli_query($db, $sql)) {
    //     echo "<script>
    //     alert('New Record Created successfully..!');
    //     window.location.href='manage_accounts_h.php';
    //     </script>";
    // } else {
    //     echo "Error: " . $sql . "" . mysqli_error($db);
    // }

    $i = 0;
    foreach ($user_doc as $user_docc) {
        //$file2 = rand(1000,100000)."-".$docbb[$i]['name'];

        move_uploaded_file($file_loc12[$i],$folder.$user_doc[$i]);
        $sql  = "INSERT INTO `users_doc`(`table_name`, `table_user_id`, `user_doc`) VALUES ('$table_doc','$main_id_doc','$user_docc')";
        if (mysqli_query($db, $sql)) {
            echo "<script>
            alert('New Record Created successfully..!');
            
            </script>";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($db);
        }
    $i++;
    }
  
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
                            <h3>Manage Accounts</h3>
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


                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            Launch modal
                                        </button> -->

                                        <a data-toggle="modal" href="#myModal1" class="btn btn-primary">Add Account</a>
                                        <!-- --------------------modal -->
                                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalTitle" aria-hidden="true">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="" method="post">
                                                                        <div class="form-row mb-3">
                                                                            <h6 class="mt-3">Select Form</h6>
                                                                            <div class="form-group col-md-12">

                                                                                <select class="form-control  basic"
                                                                                    id="demo" name="demo">
                                                                                    <option selected="selected"
                                                                                        value="1">Select Form...
                                                                                    </option>
                                                                                    <option value="2">Corporate</option>
                                                                                    <option value="3">Individual
                                                                                    </option>
                                                                                    <option value="4">Bank</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i
                                                                class="flaticon-cancel-12"></i> Cancel</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" href="#myModal2"
                                                            onclick="onch();">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-backdrop="static" class="modal fade bd-example-modal-xl" id="myModal2"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body" style="height:70vh ; overflow:auto">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </button>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">
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

                                                                                    <div id="form1"
                                                                                        style="display:none;"
                                                                                        class=" form">
                                                                                        <!-- <div>
                                                        array_shift
                                                    </div> -->
                                                                                    </div>

                                                                                    <div id="form2"
                                                                                        style="display:none;"
                                                                                        class=" form">
                                                                                        <h3>Account (Corporate)</h3>
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <form action=""
                                                                                                        method="post"
                                                                                                        enctype="multipart/form-data">

                                                                                                        <!-- <form name="add_name" id="add_name"> -->
                                                                                                        <div
                                                                                                            class="form-row mb-4">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                class="form-control"
                                                                                                                id="hid1"
                                                                                                                name="hid1"
                                                                                                                value="Corporate"
                                                                                                                placeholder="Enter Name">
                                                                                                            <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <label
                                                                                                                    for="inputEmail4">Name</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="name"
                                                                                                                    name="name"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="form-group col-md-6  ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Website</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="website"
                                                                                                                    name="website"
                                                                                                                    placeholder="Enter Website"
                                                                                                                    required></svg>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Email</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="email"
                                                                                                                    name="email"
                                                                                                                    placeholder="Enter Email"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Phone</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="phone"
                                                                                                                    name="phone"
                                                                                                                    placeholder="Enter Phone"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Fax</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="fax"
                                                                                                                    name="fax"
                                                                                                                    placeholder="Enter Fax"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Address</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="address"
                                                                                                                    name="address"
                                                                                                                    placeholder="Enter Address"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">NTN</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="ntn"
                                                                                                                    name="ntn"
                                                                                                                    placeholder="NTN"
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


                                                                                                        <div
                                                                                                            class="field_wrapper">

                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="container-fluid">
                                                                                                            <!-- <a href="javascript:void(0);"
                                                                                                                class="add_button btn btn-primary"
                                                                                                                title="Add field"
                                                                                                                style="float: right; ">Add
                                                                                                                Contact
                                                                                                            </a> -->
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <button
                                                                                                                    class="btn btn-primary  font-weight-bold mx-2"
                                                                                                                    name="submit2"
                                                                                                                    type="submit"
                                                                                                                    style="float: right; ">SAVE</button>
                                                                                                                <a class="btn mx-2"
                                                                                                                    href="#"
                                                                                                                    style="float: right;">CANCEL</a>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>



                                                                                    </div>

                                                                                    <div id="form3"
                                                                                        style="display:none;"
                                                                                        class=" form">
                                                                                        <h3>Account (Person) </h3>
                                                                                        <br>
                                                                                        <div class="container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <form action=""
                                                                                                        method="post"
                                                                                                        enctype="multipart/form-data">
                                                                                                        <div
                                                                                                            class="form-row mb-4">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                class="form-control"
                                                                                                                id="hid2"
                                                                                                                name="hid2"
                                                                                                                value="Person"
                                                                                                                placeholder="Enter Name">
                                                                                                            <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <label
                                                                                                                    for="inputEmail4">First
                                                                                                                    Name</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="fname"
                                                                                                                    name="fname"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>

                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <label
                                                                                                                    for="inputPassword4">Last
                                                                                                                    Name</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="lname"
                                                                                                                    name="lname"
                                                                                                                    placeholder="Enter Email/Username"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6  ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Email</label>
                                                                                                                <input
                                                                                                                    type="email"
                                                                                                                    class="form-control"
                                                                                                                    id="email"
                                                                                                                    name="email"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required></svg>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Phone</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="phone"
                                                                                                                    name="phone"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Mobile</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="mobile"
                                                                                                                    name="mobile"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">NIC
                                                                                                                    #</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="nic"
                                                                                                                    name="nic"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Alternate
                                                                                                                    Phone</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="aphone"
                                                                                                                    name="aphone"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Fax</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="fax"
                                                                                                                    name="fax"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Mailing
                                                                                                                    Address</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="mail"
                                                                                                                    name="mail"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Availability
                                                                                                                    Timings</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="ava"
                                                                                                                    name="ava"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Other
                                                                                                                    Address</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="other"
                                                                                                                    name="other"
                                                                                                                    placeholder="Enter Name"
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
                                                                                                        <div
                                                                                                            class="form-group col-md-6 ">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-12">
                                                                                                            <button
                                                                                                                class="btn btn-primary  font-weight-bold mx-2"
                                                                                                                name="submit1"
                                                                                                                type="submit"
                                                                                                                style="float: right; ">SAVE</button>
                                                                                                            <!-- <a class="btn mx-2"
                                                                                                                href="managecustomer.php"
                                                                                                                style="float: right;">CANCEL</a> -->

                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                    </div>
                                                                                    <div id="form4"
                                                                                        style="display:none;"
                                                                                        class=" form">
                                                                                        <h3>Account (Insurance)</h3>
                                                                                        <br>

                                                                                        <div class="container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <form action=""
                                                                                                        method="post"
                                                                                                        enctype="multipart/form-data">
                                                                                                        <div
                                                                                                            class="form-row mb-4">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                class="form-control"
                                                                                                                id="hid3"
                                                                                                                name="hid3"
                                                                                                                value="Insurance"
                                                                                                                placeholder="Enter Name">
                                                                                                            <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <label
                                                                                                                    for="inputEmail4">Name</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="name"
                                                                                                                    name="name"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6  ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Website</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="website"
                                                                                                                    name="website"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required></svg>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Email</label><input
                                                                                                                    type="email"
                                                                                                                    class="form-control"
                                                                                                                    id="email"
                                                                                                                    name="email"
                                                                                                                    placeholder="Enter email"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Phone</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="phone"
                                                                                                                    name="phone"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Fax</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="fax"
                                                                                                                    name="fax"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Address</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="address"
                                                                                                                    name="address"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">NTN</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="ntn"
                                                                                                                    name="ntn"
                                                                                                                    placeholder="Enter Name"
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
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div> -->
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="container">

                                                                                                            <div
                                                                                                                class="row">

                                                                                                                <div
                                                                                                                    class="col-md-12">
                                                                                                                    <button
                                                                                                                        class="btn btn-primary  font-weight-bold mx-2"
                                                                                                                        name="submit3"
                                                                                                                        type="submit"
                                                                                                                        style="float: right; ">SAVE</button>
                                                                                                                    <!-- <a class="btn mx-2"
                                                                                                                        href="managecustomer.php"
                                                                                                                        style="float: right;">CANCEL</a> -->

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
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i
                                                                class="flaticon-cancel-12"></i> Cancel</button>
                                                        <!-- <button type="button" class="btn btn-primary">Send</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mb-4 mt-4">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                ?>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S.No</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Privilage</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Veiw</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>


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
                                            <td class="text-center"><?php echo $row["email"]; ?></td>
                                            <td class="text-center"><?php echo $row["phone"]; ?></td>
                                            <td class="text-center"><?php echo $row["privilege"]; ?></td>
                                            <td class="text-center">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-outline-secondary mb-2"
                                                            data-toggle="modal" href="#a<?php echo $i?>">Add
                                                            Documents</button>

                                                        <div class="modal fade" id="a<?php echo $i?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog " role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <svg aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-x">
                                                                                <line x1="18" y1="6" x2="6" y2="18">
                                                                                </line>
                                                                                <line x1="6" y1="6" x2="18" y2="18">
                                                                                </line>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <form action="" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">

                                                                                        <div class="form-row mb-3">
                                                                                            <h6 class="mt-3">Select
                                                                                                Document
                                                                                            </h6>
                                                                                            <div
                                                                                                class="form-group col-md-12">

                                                                                                <input type="hidden"
                                                                                                    class="form-control"
                                                                                                    id="main_id_doc"
                                                                                                    name="main_id_doc"
                                                                                                    value="<?php echo $row["id"]; ?>">



                                                                                                <input type="file"
                                                                                                    name="user_doc[]"
                                                                                                    id="user_doc"
                                                                                                    class="form-control"
                                                                                                    required multiple>

                                                                                                <input type="hidden"
                                                                                                    class="form-control"
                                                                                                    id="table_doc"
                                                                                                    name="table_doc"
                                                                                                    value="<?php echo $row["privilege"]; ?>" required>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn" data-dismiss="modal"><i
                                                                                    class="flaticon-cancel-12"></i>
                                                                                Cancel</button>
                                                                            <button
                                                                                class="btn btn-primary  font-weight-bold mx-2"
                                                                                name="submit6" type="submit"
                                                                                style="float: right; ">SAVE</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <?php if ($row["privilege"]==='Corporate') { ?>
                                                        <div class="mydiv">
                                                            <button class="btn btn-outline-info mb-2"
                                                                data-toggle="modal" href="#b<?php echo $i?>"
                                                                style="float: right;">Add Contact</button>

                                                            <div data-backdrop="static"
                                                                class="modal fade bd-example-modal-xl" id="b<?php echo $i?>"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <svg aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-x">
                                                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                                                    </line>
                                                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                                                    </line>
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body"
                                                                            style="height:70vh ; overflow:auto">

                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="container my-4">
                                                                                            <h4>Contact Form</h4>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <form action=""
                                                                                                        method="post"
                                                                                                        enctype="multipart/form-data">
                                                                                                        <div
                                                                                                            class="form-row mb-3">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                class="form-control"
                                                                                                                id="main_id"
                                                                                                                name="main_id"
                                                                                                                value="<?php echo $row["id"]; ?>"
                                                                                                                placeholder="Enter Name">
                                                                                                            <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <label
                                                                                                                    for="inputEmail4">Name</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="fname1"
                                                                                                                    name="fname1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required >
                                                                                                            </div>
                                                                                                            <!-- <div
                                                                                                                class="form-group col-md-6">
                                                                                                                <label
                                                                                                                    for="inputPassword4">Last
                                                                                                                    Name</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="lname1"
                                                                                                                    name="lname1"
                                                                                                                    placeholder="Enter Email/Username"
                                                                                                                    required>
                                                                                                            </div> -->
                                                                                                            <div
                                                                                                                class="form-group col-md-6  ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Email</label>
                                                                                                                <input
                                                                                                                    type="email"
                                                                                                                    class="form-control"
                                                                                                                    id="email1"
                                                                                                                    name="email1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required></svg>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Phone</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="phone1"
                                                                                                                    name="phone1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Mobile</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="mobile1"
                                                                                                                    name="mobile1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">NIC
                                                                                                                    #</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="nic1"
                                                                                                                    name="nic1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Alternate
                                                                                                                    Phone</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="aphone1"
                                                                                                                    name="aphone1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Fax</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="fax1"
                                                                                                                    name="fax1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Mailing
                                                                                                                    Address</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="mail1"
                                                                                                                    name="mail1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Availability
                                                                                                                    Timings</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="ava1"
                                                                                                                    name="ava1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Other
                                                                                                                    Address</label><input
                                                                                                                    type="text"
                                                                                                                    class="form-control"
                                                                                                                    id="other1"
                                                                                                                    name="other1"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div>
                                                                                                            <!-- <div
                                                                                                                class="form-group col-md-6 ">
                                                                                                                <label
                                                                                                                    for=""
                                                                                                                    class="lab">Documents</label><input
                                                                                                                    type="file"
                                                                                                                    class="form-control"
                                                                                                                    id="file11"
                                                                                                                    name="file11"
                                                                                                                    placeholder="Enter Name"
                                                                                                                    required>
                                                                                                            </div> -->


                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="container">

                                                                                                            <div
                                                                                                                class="row">

                                                                                                                <div
                                                                                                                    class="col-md-12">
                                                                                                                    <button
                                                                                                                        class="btn btn-primary  font-weight-bold mx-2"
                                                                                                                        name="submit5"
                                                                                                                        type="submit"
                                                                                                                        style="float: right; ">SAVE</button>


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
                                                                        <div class="modal-footer">
                                                                            <button class="btn" data-dismiss="modal"><i
                                                                                    class="flaticon-cancel-12"></i>
                                                                                Cancel</button>
                                                                            <!-- <button type="button" class="btn btn-primary">Send</button> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } else { ?>

                                                        <?php } ?>
                                                    </div>
                                                </div>





                                            </td>



                                            <td class="text-center"><a
                                                    href="accounts_veiw_Cop_h.php?id=<?php echo $row['id']; ?>&table=<?php echo $row["privilege"];?>"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                                            </td>                

                                            <td class="text-center"><a
                                                    href="accounts_edit_Cop_h.php?id=<?php echo $row['id']; ?>&table=<?php echo $row["privilege"];?>"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 text-success">
                                                        <path
                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></a>
                                            </td>
                                            <td class="text-center"><a
                                                    onclick="return confirm('Are you sure to Delete this User ?');"
                                                    href="delete_users.php?id=<?php echo $row['id']; ?>&table=<?php echo $row["privilege"];?>"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><svg
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
        <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
        <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
        <script src="plugins/treeview/custom-jstree.js"></script>
        <script src="assets/js/scrollspyNav.js"></script>
        <script>
        // $('.widget-content .warning.confirm').on('click', function () {
        //     swal({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Delete',
        //         padding: '2em'
        //         }).then(function(result) {
        //         if (result.value) {
        //             swal(
        //             'Deleted!',
        //             'Your file has been deleted.',
        //             'success'
        //             )
        //         }
        //         })
        //     })
        // }
        </script>
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

        $("#myModal2").on('show.bs.modal', function(e) {
            $("#myModal1").modal("hide");
        });
        </script>

        <script>
        // function onch() {
        //     var form_no = document.getElementById("demo").value;
        //     console.log("hamza " + form_no);
        //     // window.location.href("accounts_form_Cop_h.php?id="+form_no+"");
        //     // window.location.href = "accounts_form_Cop_h.php?id=" + form_no + "";
        // }

        function onch() {
            var e = document.getElementById("demo");
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
        </script>


        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Aligned</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="modal-heading mb-4 mt-2">Select Form</h4>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-12">

                                        <select class="form-control  basic"  id="demo"
                                            name="demo">
                                            <option selected="selected" value="1">Select Form...
                                            </option>
                                            <option value="2">Corporate</option>
                                            <option value="3">Individual</option>
                                            <option value="4">Bank</option>

                                        </select>
                                    </div>
                                </div>
                            </form>
                            <a data-toggle="modal" href="#myModal2" class="btn btn-primary">Launch modal 2</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="button" class="btn btn-primary" onclick="onch();">Send</button>
            </div>
        </div>
    </div>
</div> -->






<!-- Mirrored from designreset.com/cork/ltr/demo10/starter_kit_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:32:07 GMT -->

</html>