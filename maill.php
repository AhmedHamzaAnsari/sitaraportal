<?php
include("sessioninput.php");


?>
<?php
include("config_indemnifier.php");       
$statusMsg='';
if(isset($_FILES["file"]["name"])){
    $subject;
    $email = $_POST['email'];
    $name = $_POST['name'];
     $title_id = $_POST['users'];

     $title = "SELECT * FROM `email` where id = '".$title_id."'";

     $result = $db->query($title);
 
     if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $subject = $row["title"];
         //echo "id: " . $row["id"]. "<br>";
     }
     } else {
     echo "0 results";
     }
 
     
    $message = $_POST['message'];
$fromemail =  $email;
$subject=$subject;
$email_message = '<table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                   <table role="presentation"
                        style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                           <tr>
                            <td
                                style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                                
                                <p style="margin:0;font-size:14px;line-height:20px; color: white;">'.$subject.'</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <img src="http://151.106.6.114/indemnifier/dist/img/ilogo.png" width="165" alt="Logo"style="width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;">
                                <p style="margin:0;"><b>Dear Sir:</b> .</p>
                                <p style="margin:0;"><b>Name:</b> '.$name.'.</p>
                                <p style="margin:0;"><b>Email:</b> '.$email.'.</p>
                                
                            </td>
                        </tr>

                        <tr>
                            <td
                                style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                                
                                <div class="col-sml"
                                    style="display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;">
                                    <img src="https://assets.codepen.io/210284/icon.png" width="115" alt=""
                                        style="width:80%;max-width:115px;margin-bottom:20px;">
                                </div>
                                
                                <div class="col-lge"
                                    style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                                    <p style="margin-top:0;margin-bottom:12px;">'.$message.'.</p>

                                </div>
                                
                            </td>
                        </tr>


                        <tr>
                            <td
                                style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                                <p style="margin:0;font-size:14px;line-height:20px;">&reg; INDEMNIFIER</p>
                            </td>
                        </tr>
                    </table>
                    
                </td>
            </tr>
        </table> ';
$email_message.="Please find the attachment";
$semi_rand = md5(uniqid(time()));
$headers = "From: ".$fromemail;
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
 
if($_FILES["file"]["name"]!= ""){  
	$strFilesName = $_FILES["file"]["name"];  
	$strContent = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));  
	
	
    $email_message .= "This is a multi-part message in MIME format.\n\n" .
    "--{$mime_boundary}\n" .
    "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $email_message .= "\n\n";
 
 
    $email_message .= "--{$mime_boundary}\n" .
    "Content-Type: application/octet-stream;\n" .
    " name=\"{$strFilesName}\"\n" .
    //"Content-Disposition: attachment;\n" .
    //" filename=\"{$fileatt_name}\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $strContent  .= "\n\n" .
    "--{$mime_boundary}--\n";
}
$toemail="abdulsamadq67@gmail.com";	
 
if(mail($email, $subject, $email_message, $headers)){
   $statusMsg= "Email send successfully with attachment";
}else{
   $statusMsg= "Not sent";
}
}
   ?>
<!-- <!DOCTYPE html>
<html>
    <head><title>Send attachment on email</title></head>
    <body>
        
        
<?php if(!empty($statusMsg)){ ?>
    <p><?php echo $statusMsg; ?></p>
<?php } ?>
 

<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="name" class="form-control"  placeholder="Name" required="">
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control"  placeholder="Email address" required="">
    </div>
    <div class="form-group">
        <input type="text" name="subject" class="form-control"  placeholder="Subject" required="">
    </div>
    <div class="form-group">
        <textarea name="message" class="form-control" placeholder="Write your message here" required=""></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="file" class="form-control">
    </div>
    <div class="submit">
        <input type="submit" name="submit" class="btn" value="SEND MESSAGE">
    </div>
</form>
 
</body>
 
</html> -->

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo10/apps_mailbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:30:49 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=sdevice-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Email</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
    <link href="assets/css/apps/mailbox.css" rel="stylesheet" type="text/css" />

    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

    <!--  END CUSTOM STYLE FILE  -->

</head>
<style>
.caret::before {
    content: none !important;
}
</style>

<body class="sidebar-noneoverflow application">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Email</h3>
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

            <ul class="navbar-item flex-row search-ul">
                <!-- <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Type here to search">
                        </div>
                    </form>
                </li> -->
            </ul>

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
                            </a>s
                        </div>
                        <div class="dropdown-item">
                            <a href="auth_lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div> -->
                        <div class="dropdown-item">
                            <a href="logout.php">
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
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'sidebar.php';?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <?php if(!empty($statusMsg)){ ?>
                <p><?php echo $statusMsg; ?></p>
                <?php } ?>


                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="row">

                            <div class="col-xl-12  col-md-12">

                                <!-- <div class="mail-box-container">
                                    <div class="mail-overlay"></div>
                                    
                                    <div class="tab-title">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12 text-center mail-btn-container">
                                                <a id="btn-compose-mail" class="btn btn-block" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                                                <div class="mail-sidebar-scroll">

                                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions active" id="mailInbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span class="nav-names">Inbox</span> <span class="mail-badge badge"></span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="important"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> <span class="nav-names">Important</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="draft"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> <span class="nav-names">Draft</span> <span class="mail-badge badge"></span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="sentmail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> <span class="nav-names"> Sent Mail</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="spam"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> <span class="nav-names">Spam</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions" id="trashed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="nav-names">Trash</span></a>
                                                        </li>
                                                    </ul>

                                                    <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg> Groups</p>

                                                    <ul class="nav nav-pills d-block group-list" id="pills-tab2" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions active g-dot-primary" id="personal"><span>Personal</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions g-dot-warning" id="work"><span>Work</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions g-dot-success" id="social"><span>Social</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions g-dot-danger" id="private"><span>Private</span></a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                        <div class="search">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                            <input type="text" class="form-control input-search" placeholder="Search Here...">
                                        </div>

                                        <div class="action-center">
                                            <div class="">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                      <input type="checkbox" class="new-control-input" id="inboxAll">
                                                      <span class="new-control-indicator"></span><span>Check All</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="Label" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="label-group-item label-personal dropdown-item position-relative g-dot-primary" href="javascript:void(0);"> Personal</a>
                                                    <a class="label-group-item label-work dropdown-item position-relative g-dot-warning" href="javascript:void(0);"> Work</a>
                                                    <a class="label-group-item label-social dropdown-item position-relative g-dot-success" href="javascript:void(0);"> Social</a>
                                                    <a class="label-group-item label-private dropdown-item position-relative g-dot-danger" href="javascript:void(0);"> Private</a>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="Important" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star action-important"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Spam" class="feather feather-alert-circle action-spam"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" data-toggle="tooltip" data-placement="top" data-original-title="Revive Mail" stroke-linejoin="round" class="feather feather-activity revive-mail"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete Permanently" class="feather feather-trash permanent-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                <div class="dropdown d-inline-block more-actions">
                                                    <a class="nav-link dropdown-toggle" id="more-actions-btns-dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-actions-btns-dropdown">
                                                        <a class="dropdown-item action-mark_as_read" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Mark as Read
                                                        </a>
                                                        <a class="dropdown-item action-mark_as_unRead" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Mark as Unread
                                                        </a>
                                                        <a class="dropdown-item action-delete" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Trash
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                
                                        <div class="message-box">
                                            
                                            <div class="message-box-scroll" id="ct">

                                                <div class="mail-item draft">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingOne">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading personal collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseOne" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-body" data-mailfrom="info@mail.com" data-mailto="kf@mail.com" data-mailcc="">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="kf@mail.com">Keith Foster</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Web Design News">Draft: Web Design News - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">9:30 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item sentmail">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingTwo">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading work collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseTwo" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="alan@mail.com">  </p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Mozilla Update">Mozilla Update - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">8:45 AM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                  
                                                <div id="unread-promotion-page" class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThree">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading social collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseThree" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-16.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="laurieFox@mail.com">Laurie Fox</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg><span class="mail-title" data-mailTitle="Promotion Page">Promotion Page - </span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.
                                                                                </p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">2:00 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="attachments">
                                                                    <span class="">Confirm File.txt</span>
                                                                    <span class="">Important Docs.xml</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item draft">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFour">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading private collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseFour" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-body" data-mailfrom="info@mail.com" data-mailto="amDiaz@mail.com" data-mailcc="">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="amDiaz@mail.com">Amy Diaz</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Ecommerce Analytics">Draft: Ecommerce Analytics - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">2:00 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFive">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseFive" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-19.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="kingAndy@mail.com">Andy King</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Hosting Payment Reminder">Hosting Payment Reminder -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">6:28 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="unread-verification-link" class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEleven">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading social collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseEleven" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <div class="avatar avatar-sm">
                                                                                <span class="avatar-title rounded-circle">KB</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="kirsten.beck@mail.com">Kristen Beck</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Verification Link">Verification Link - </span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">8 Dec</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingTwelve">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading private collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseTwelve" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-34.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="christian@mail.com">Christian</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg><span class="mail-title" data-mailTitle="New Updates">New Updates - </span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">30 Nov</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="attachments">
                                                                    <span class="">update.zip</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="unread-schedular-alert" class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThirteen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading personal collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseThirteen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-31.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="roxanne@mail.com">Roxanne</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Schedular Alert">Schedular Alert - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">15 Nov</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                

                                                <div class="mail-item sentmail">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSix">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseSix" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="justincross@mail.com">Justin Cross</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="App Project Checklist">App Project Checklist - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">3:10 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox important">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSeven">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseSeven" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-17.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="niahillyer@mail.com">Nia Hillyer</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Motion UI Kit">Motion UI Kit - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">2:22 AM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox important">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEight">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseEight" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-23.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="irishubbard@mail.com">Iris Hubbard</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Green Illustration">Green Illustration - </span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">1:40 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item spam">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingNine">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseNine" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-18.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="alexGray@mail.com">Alex Gray</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Weekly Newsletter">Weekly Newsletter - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">10:18 AM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item trashed">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingTen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseTen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-13.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="ryanMCkillop@mail.com">Ryan MC Killop</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Make it Simple">Make it Simple - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">11:45 PM</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox important">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFourteen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading work collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseFourteen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <div class="avatar avatar-sm">
                                                                                <span class="avatar-title rounded-circle">E</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="f-body">    
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="reevesErnest@mail.com">Ernest Reeves</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Just uploaded new video Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Youtube">Youtube - </span>Just uploaded new video Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">2 Jun</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox spam">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFifteen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading work collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseFifteen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-15.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="infocompany@mail.com">Info Company</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="50% Discount">50% Discount - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">10 Feb</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="unread-verification-link-new" class="mail-item mailInbox">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSixteen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading personal collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseSixteen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <div class="avatar avatar-sm">
                                                                                <span class="avatar-title rounded-circle">NI</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="npminc@mail.com">NPM Inc</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg><span class="mail-title" data-mailTitle="npm Inc">npm Inc - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">12/15/2018</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="attachments">
                                                                    <span class="">package.zip</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item mailInbox spam">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSeventeen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading personal collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseSeventeen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-18.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="marleneWood@mail.com">Marlene Wood</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="eBill">eBill - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">11/25/2018</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mail-item trashed">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEighteen">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseEighteen" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                              <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                              <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-head">
                                                                            <img src="assets/img/profile-23.jpg" class="user-profile" alt="avatar">
                                                                        </div>
                                                                        <div class="f-body">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="liamSheldon@mail.com">Liam Sheldon</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="New Offers">New Offers - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">11:45 PM</p>
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

                                        <div class="content-box">
                                            <div class="d-flex msg-close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left close-message"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                                <h2 class="mail-title" data-selectedMailTitle=""></h2>
                                            </div>

                                            <div id="mailCollapseTwo" class="collapse" aria-labelledby="mailHeadingTwo" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container sentmail" data-mailfrom="info@mail.com" data-mailto="alan@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex user-info">
                                                            <div class="f-body">
                                                                <div class="meta-mail-time">
                                                                    <div class="">
                                                                        <p class="user-email" data-mailto="alan@mail.com"><span>To,</span> alan@mail.com</p>
                                                                    </div>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">8:45 AM</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p class="mail-content" data-mailTitle="Mozilla Update" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Shaun Park</p>

                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Confirm File</p>
                                                                    <p class="file-size">450kb</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-folder">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Important Docs</p>
                                                                    <p class="file-size">2.1MB</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-img">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Photo.png</p>
                                                                    <p class="file-size">50kb</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div id="mailCollapseThree" class="collapse" aria-labelledby="mailHeadingThree" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="linda@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between">

                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-16.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Promotion Page">Laurie Fox</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="laurieFox@mail.com">laurieFox@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">2:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Promotion Page" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <div class="gallery text-center">
                                                        <img alt="image-gallery" src="assets/img/scroll-6.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-7.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-8.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                    </div>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Laurie Fox</p>


                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Confirm File.txt</p>
                                                                    <p class="file-size">450kb</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-folder">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Important Docs.xml</p>
                                                                    <p class="file-size">2.1MB</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <div id="mailCollapseFive" class="collapse" aria-labelledby="mailHeadingFive" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="kingAndy@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-19.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Hosting Payment Reminder">Andy King</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="kingAndy@mail.com">kingAndy@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">6:28 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Hosting Payment Reminder" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Andy King</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseEleven" class="collapse" aria-labelledby="mailHeadingEleven" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="kirsten.beck@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <div class="avatar avatar-sm">
                                                                    <span class="avatar-title rounded-circle">KB</span>
                                                                </div>
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Verification Link">Kirsten Beck</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="kirsten.beck@mail.com">kirsten.beck@mail.com</p>
                                                                    <p class="mail-content-meta-date">12/08/2019 -</p>
                                                                    <p class="meta-time align-self-center">11:09 AM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Verification Link" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Kirsten Beck</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseTwelve" class="collapse" aria-labelledby="mailHeadingTwelve" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="christian@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-34.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="New Updates">Christian</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="christian@mail.com">christian@mail.com</p>
                                                                    <p class="mail-content-meta-date">11/30/2019 -</p>
                                                                    <p class="meta-time align-self-center">2:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="New Updates" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Christian</p>


                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">update.zip</p>
                                                                    <p class="file-size">1.3MB</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="mailCollapseThirteen" class="collapse" aria-labelledby="mailHeadingThirteen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="roxanne@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-31.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Schedular Alert">Roxanne</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="roxanne@mail.com">roxanne@mail.com</p>
                                                                    <p class="mail-content-meta-date">11/15/2019 -</p>
                                                                    <p class="meta-time align-self-center">2:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Schedular Alert" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Roxanne</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseFourteen" class="collapse" aria-labelledby="mailHeadingFourteen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="reevesErnest@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <div class="avatar avatar-sm">
                                                                    <span class="avatar-title rounded-circle">E</span>
                                                                </div>
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Youtube">Youtube</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="reevesErnest@mail.com">reevesErnest@mail.com</p>
                                                                    <p class="mail-content-meta-date">06/02/2019 -</p>
                                                                    <p class="meta-time align-self-center">8:25 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Youtube" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Ernest Reeves</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseFifteen" class="collapse" aria-labelledby="mailHeadingFifteen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-15.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="50% Discount">Info Company</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                                                    <p class="mail-content-meta-date">02/10/2019 -</p>
                                                                    <p class="meta-time align-self-center">7:00 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="50% Discount" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Info Company</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseSixteen" class="collapse" aria-labelledby="mailHeadingSixteen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="npminc@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <div class="avatar avatar-sm">
                                                                    <span class="avatar-title rounded-circle">NI</span>
                                                                </div>
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="npm Inc">npm Inc</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="npminc@mail.com">npminc@mail.com</p>
                                                                    <p class="mail-content-meta-date">12/15/2018 -</p>
                                                                    <p class="meta-time align-self-center">8:37 AM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="npm Inc" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Info Company</p>


                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">package.zip</p>
                                                                    <p class="file-size">450kb</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="mailCollapseSeventeen" class="collapse" aria-labelledby="mailHeadingSeventeen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-18.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="eBill">eBill</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                                                    <p class="mail-content-meta-date">11/25/2018 -</p>
                                                                    <p class="meta-time align-self-center">1:51 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="eBill" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Info Company</p>
                                                </div>
                                            </div>

                                            <div id="mailCollapseEighteen" class="collapse" aria-labelledby="mailHeadingEighteen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-28.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="">Info Company</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">11:45 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="New Offers" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Info Company</p>


                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Confirm File</p>
                                                                    <p class="file-size">450kb</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="mailCollapseSix" class="collapse" aria-labelledby="mailHeadingSix" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container sentmail" data-mailfrom="info@mail.com" data-mailto="justincross@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex user-info">
                                                            <div class="f-body">
                                                                <div class="meta-mail-time">
                                                                    <div class="">
                                                                        <p class="user-email" data-mailto="justincross@mail.com"><span>To,</span> justincross@mail.com </p>
                                                                    </div>
                                                                    <p class="mail-content-meta-date">12/14/219 -</p>
                                                                    <p class="meta-time align-self-center">3:10 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="App Project Checklist" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Shaun Park</p>

                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-folder">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Important Docs</p>
                                                                    <p class="file-size">2.1MB</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-img">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Photo.png</p>
                                                                    <p class="file-size">50kb</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="mailCollapseSeven" class="collapse" aria-labelledby="mailHeadingSeven" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container important" data-mailfrom="info@mail.com" data-mailto="niahillyer@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-17.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Motion UI Kit">Nia Hillyer</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="niahillyer@mail.com">niahillyer@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">2:22 AM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="op" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Motion UI Kit" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>

                                                    <div class="gallery text-center">
                                                        <img alt="image-gallery" src="assets/img/scroll-6.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-7.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-8.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                    </div>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Nia Hillyer</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseEight" class="collapse" aria-labelledby="mailHeadingEight" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container important" data-mailfrom="info@mail.com" data-mailto="irishubbard@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-23.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Green Illustration">Iris Hubbard</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="irishubbard@mail.com">irishubbard@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">1:40 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Green Illustration" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Iris Hubbard</p>

                                                </div>
                                            </div>

                                            <div id="mailCollapseNine" class="collapse" aria-labelledby="mailHeadingNine" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container spam" data-mailfrom="info@mail.com" data-mailto="alexGray@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-18.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Weekly Newsletter">Alex Gray</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="alexGray@mail.com">alexGray@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">10:18 AM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <p class="mail-content" data-mailTitle="Weekly Newsletter" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. </p>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Alexander Gray</p>

                                                    <div class="attachments">
                                                        <h6 class="attachments-section-title">Attachments</h6>
                                                        <div class="attachment file-pdf">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Confirm File</p>
                                                                    <p class="file-size">450kb</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-folder">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Important Docs</p>
                                                                    <p class="file-size">2.1MB</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="attachment file-img">
                                                            <div class="media">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                                <div class="media-body">
                                                                    <p class="file-name">Photo.png</p>
                                                                    <p class="file-size">50kb</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="mailCollapseTen" class="collapse" aria-labelledby="mailHeadingTen" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container trashed" data-mailfrom="info@mail.com" data-mailto="ryanMCkillop@mail.com" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/profile-13.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Make it Simple">Ryan MC Killop</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <p class="user-email" data-mailto="ryanMCkillop@mail.com">ryanMCkillop@mail.com</p>
                                                                    <p class="mail-content-meta-date current-recent-mail">12/14/2019 -</p>
                                                                    <p class="meta-time align-self-center">11:45 PM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p class="mail-content" data-mailTitle="Make it Simple" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                    <div class="gallery text-center">
                                                        <img alt="image-gallery" src="assets/img/scroll-6.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-7.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                        <img alt="image-gallery" src="assets/img/scroll-8.jpg" class="img-fluid mb-4 mt-4" style="width: 250px; height: 180px;">
                                                    </div>

                                                    <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                    <p>Best Regards,</p>
                                                    <p>Ryan McKillop</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div> -->

                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email address" required="">
                                    </div>
                                    <!-- <div class="form-group">
                                                                <input type="text" name="subject" class="form-control"  placeholder="Subject" required="">
                                                            </div> -->
                                    <select class="selectpicker" name="users" onchange="showUser(this.value)">
                                        <option value="">Select a Title:</option>
                                        <!-- <option value="1">Test</option>
                                                                <option value="test1">Test1</option>
                                                                <option value="test2">Test2</option>
                                                                <option value="test3">Test3</option> -->
                                        <?php
                                                                    // include("config_tc.php");

                                                                    $sql = "SELECT * FROM email";
                                                                    $resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
                                                                    while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                                                    ?>
                                        <option value="<?php 
                                                                    echo $rows["id"]; ?>"><?php echo $rows["title"]; ?>
                                        </option>
                                        <?php }	?>
                                    </select>
                                    <!-- style="height: 20vh;border: 1px solid #bfc9d4;padding: 10px;" -->
                                    <div class="form-group">
                                        <input name="message" id="txtHint" class="form-control"
                                            value="Select title for body" placeholder="Select title for body"
                                            required="" style="height: max-content;">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <div class="submit">
                                        <input type="submit" name="submit" class="btn" value="SEND MESSAGE">
                                    </div>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x close" data-dismiss="modal">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                                <div class="compose-box">
                                                    <div class="compose-content">


                                                        <!-- Display contact form -->
                                                        <form method="post" action="" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="Name" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="Email address" required="">
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <input type="text" name="subject" class="form-control"  placeholder="Subject" required="">
                                                            </div> -->
                                                            <select class="selectpicker" name="users"
                                                                onchange="showUser(this.value)">
                                                                <option value="">Select a Title:</option>
                                                                <!-- <option value="1">Test</option>
                                                                <option value="test1">Test1</option>
                                                                <option value="test2">Test2</option>
                                                                <option value="test3">Test3</option> -->
                                                                <?php
                                                                    include("config_tc.php");

                                                                    $sql = "SELECT * FROM email";
                                                                    $resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
                                                                    while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                                                    ?>
                                                                <option value="<?php 
                                                                    echo $rows["id"]; ?>"><?php echo $rows["title"]; ?>
                                                                </option>
                                                                <?php }	?>
                                                            </select>
                                                            <!-- style="height: 20vh;border: 1px solid #bfc9d4;padding: 10px;" -->
                                                            <div class="form-group">
                                                                <input name="message" id="txtHint" class="form-control"
                                                                    value="Select title for body"
                                                                    placeholder="Write your message here" required=""
                                                                    style="height: max-content;">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="file" name="file" class="form-control">
                                                            </div>
                                                            <div class="submit">
                                                                <input type="submit" name="submit" class="btn"
                                                                    value="SEND MESSAGE">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button id="btn-save" class="btn float-left"> Save</button> -->
                                                <!-- <button id="btn-reply-save" class="btn float-left"> Save Reply</button> -->
                                                <!-- <button id="btn-fwd-save" class="btn float-left"> Save Fwd</button> -->

                                                <button class="btn" data-dismiss="modal"> <i
                                                        class="flaticon-delete-1"></i> Discard</button>

                                                <!-- <button id="btn-reply" class="btn"> Reply</button> -->
                                                <!-- <button id="btn-fwd" class="btn"> Forward</button> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
            <!-- <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div> -->
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
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/ie11fix/fn.fix-padStart.js"></script>
        <script src="plugins/editors/quill/quill.js"></script>
        <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
        <script src="plugins/notification/snackbar/snackbar.min.js"></script>
        <script src="assets/js/apps/custom-mailbox.js"></script>
        <script src="plugins/treeview/custom-jstree.js"></script>
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").value = this.responseText;
                }
            }
            console.log(str)
            xmlhttp.open("GET", "getuser.php?q=" + str, true);
            xmlhttp.send();
        }
        </script>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo10/apps_mailbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 06:30:56 GMT -->

</html>