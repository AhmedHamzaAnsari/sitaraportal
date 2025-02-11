<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Email Verification</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<?php
include("config_indemnifier.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    function check_time($time)
    {
        $specificDateTime = new DateTime($time);

        // Current date and timeadmin_user
        $currentDateTime = new DateTime();

        // Calculate the difference between the two dates
        $timeDifference = $currentDateTime->diff($specificDateTime);

        // Check if the difference is less than five hours (300 seconds)
        if ($timeDifference->s + $timeDifference->i * 60 + $timeDifference->h * 3600 < 5 * 3600) {
            return 1;
        } else {
            return 0;
        }
    }
    $code = mysqli_real_escape_string($db, $_POST['email']);
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);

    $sql = "SELECT * FROM users where id = $user_id and allowed_actions='$code'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //   $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        //  session_register("myusername");
        // verify_email($row['id']);



        if (check_time($row['independent_exist']) != 0) {
            $_SESSION['username'] = $row['login'];
            $_SESSION['password'] = $row['description'];
            $_SESSION['member_name'] = $row['name'];
            $_SESSION['login_time'] = $row['independent_exist'];
            $_SESSION['prive'] = $row['privilege'];
            $id = $row['id'];
            // Assign default user ID
            if ($_SESSION['prive'] === 'admin_user' || $_SESSION['prive'] === 'Distributor') {
                $_SESSION['userid'] = 1;
            } elseif ($_SESSION['prive'] === 'karachi_base') {
                $_SESSION['userid'] = 433;
            } else {
                $_SESSION['userid'] = $row['id'];
            }
            
            if ($row['privilege'] === 'viewer' && $row['id'] === '322') {
                // echo 'hamza';
                $_SESSION['userid'] = 353;
                $id = 353;
                $_SESSION['prive'] = 'Cartraige';
                $_SESSION['username'] = 'SPS';
            }
            // Special case for user with ID 322
           
           

            if ($row['privilege'] === 'Depot') {
                $sql_depot = "SELECT ud.*,geo.consignee_name FROM depot_users as ud join geofenceing as geo on geo.id=ud.depot_id where ud.user_id='" . $row['id'] . "'";
                $result_depot = mysqli_query($db, $sql_depot);
                $row_depot = mysqli_fetch_array($result_depot, MYSQLI_ASSOC);
                $_SESSION['depot_id'] = $row_depot['depot_id'];
                $_SESSION['depot_name'] = $row_depot['consignee_name'];

            }

            $current_date = date('Y-m-d');
            $next_dat = date('Y-m-d', strtotime($current_date . '+1 day'));
            
            //  echo $_SESSION['userid'];
            if ($_SESSION['prive'] != 'Integrated') {
                if($_SESSION['prive'] == 'karachi_base'){
                    $id=433;
                }
                // echo  $_SESSION['userid'];
                // echo "dev_dashboard_apis.php?id=' . $id . '&from=' . $current_date . '&to=' . $next_dat . '";

                echo '<script>
                alert("Verified Successfully !");
                window.location.href="dev_dashboard_apis.php?id=' . $id . '&from=' . $current_date . '&to=' . $next_dat . '";
                
                // </script>';

                // header("location: dev_dashboard.php?id=" . $row['id'] . "&from=$current_date&to=$next_dat");
            } else {
                echo '<script>
                alert("Verified Successfully !");
                window.location.href="sap_upload_dasboard.php";
                
                </script>';
                //  header("location: sap_upload_dasboard.php");
            }

        } else {
            echo '<script>alert("Verification Code Expired !");</script>';
        }


    } else {
        // $error = "Your Login Name or Password is invalid";
        echo '<script>alert("Wrong Verification Code !");</script>';
    }


}
?>

<body class="form no-image-content">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Verify Your Identity</h1>
                        <p class="signup-link recovery">Enter your email Verification code!</p>
                        <form class="text-left" method="post" id="insert_form" enctype="multipart/form-data">
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">Code</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="text" class="form-control" value=""
                                        placeholder="Verification Code">
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_GET['id'] ?>">
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Verify</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>


</body>

</html>