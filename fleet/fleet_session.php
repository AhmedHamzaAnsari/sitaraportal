<?php
session_start();



?>

<?php
if ($_SESSION["password"]) {
    if (check_time($_SESSION['login_time']) != 0) {

    }else{
        // If more than one hour has passed, destroy the session
        session_unset();
        session_destroy();
        header('Location: ../index.php'); // Redirect to the login page or another appropriate page
        exit;
    }
} else {
    echo "<h1>Please login first .</h1>";
    header("location: ../index.php");
}


function check_time($time)
{
    $specificDateTime = new DateTime($time);

    // Current date and time
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

?>