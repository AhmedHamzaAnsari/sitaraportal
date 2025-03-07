<?php
ini_set('max_execution_time', '0');
// $url1 = $_SERVER['REQUEST_URI'];
// header("Refresh: 10; URL=$url1");

include("../config_indemnifier.php");
ini_set('memory_limit', '-1');
set_time_limit(0);

include('class/class.phpmailer.php');
include('pdf.php');

$today = date("Y-m-d");
$_to_today = date("Y-m-d H:i:s");
echo $_to_today . ' Run time <br>';
$dur_time = $today . ' 00:00:00 ' . ' - ' . $_to_today;

$email = 'ahmedhamzaansari.99@gmail.com';
$report = 'vehicle';
$privilege = 'Admin';

$currentHour = date('H:i');

// Check if the current hour is 10 AM
echo smtp_mailer('insanehamza1@gmail.com', $dur_time, $currentHour, $db);
// if ($currentHour == '00:12') {
// } else {
//     echo "It's not 10 AM yet. Current time: " . $currentHour;
// }

function fetch_customer_data($db)
{
    $lorry_number = "1";
    $date_range = get_dynamic_dates();
    $from = $date_range['from'];
    $to = $date_range['to'];

    $data = get_overspeed_data($lorry_number, $from, $to);

    $output = '
        <div class="table-responsive">
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            font-size: 10px; /* Set font size */
        }
        th {
            font-weight: bold;
            width: 50px; /* Adjust column width for th */
        }
        td {
            width: 50px; /* Adjust column width for td */
        }
        table {
            width: 100%; /* Make sure the table fits the page */
            font-size: 10px; /* Adjust font size for the whole table */
        }
    </style>
        <table>
            <tr>
                <th>Reg No</th>
                <th>Reporting Time</th>
                <th>Coordinates</th>
                <th>Detail Message</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Overspeed Duration (Min)</th>
                <th>Min Speed</th>
                <th>Max Speed</th>
            </tr>
    ';

    $index = 1;
    if (!empty($data) && is_array($data)) {
        foreach ($data as $row) {
            $output .= '
                <tr>
                    <td>' . htmlspecialchars($row["name"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars($row["time"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars(($row["v_lat"] ?? "N/A") . ' ' . ($row["v_lng"] ?? "N/A")) . '</td>
                    <td>' . htmlspecialchars($row["message"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars($row["in_time"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars($row["out_time"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars($row["duration"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars($row["min_speed"] ?? "N/A") . '</td>
                    <td>' . htmlspecialchars($row["max_speed"] ?? "N/A") . '</td>
                </tr>
            ';
        }
    } else {
        $output .= '<tr><td colspan="10">No data available.</td></tr>';
    }

    $output .= '</table></div>';


    return $output;
}

function black_spot($db)
{
    $id = "1";
    $date_range = get_dynamic_dates();
    $from = $date_range['from'];
    $to = $date_range['to'];

    $query = "SELECT dc.id as device_id, dc.name as device_name, geo.consignee_name, geo.location, ck.in_time, ck.out_time, ck.in_duration 
              FROM geo_check as ck
              JOIN geofenceing as geo ON geo.id = ck.geo_id
              JOIN users_devices_new as ud ON ud.devices_id = ck.veh_id
              JOIN devicesnew as dc ON dc.id = ud.devices_id
              WHERE geo.geotype = 'Black Spote'
              AND ck.in_time >= '$from'
              AND ck.in_time <= '$to'
              AND ud.users_id = '$id'
              AND ck.in_duration >= 60
              ORDER BY ck.id DESC";

    $result = mysqli_query($db, $query);

    // Fetch all rows
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $output = '
        <div class="table-responsive">
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            font-size: 10px; /* Set font size */
        }
        th {
            font-weight: bold;
            width: 50px; /* Adjust column width for th */
        }
        td {
            width: 50px; /* Adjust column width for td */
        }
        table {
            width: 100%; /* Make sure the table fits the page */
            font-size: 10px; /* Adjust font size for the whole table */
        }
    </style>
        <table>
            <tr>
                <th>Reg No</th>
                <th>Black Spot</th>
                <th>Location</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>In Duration (MIN)</th>
            </tr>';

    if (!empty($rows)) {
        foreach ($rows as $row) {
            $output .= '
                <tr>
                    <td >' . htmlspecialchars($row["device_name"]) . '</td>
                    <td >' . htmlspecialchars($row["consignee_name"]) . '</td>
                    <td>' . htmlspecialchars($row["location"]) . '</td>
                    <td>' . htmlspecialchars($row["in_time"]) . '</td>
                    <td>' . htmlspecialchars($row["out_time"]) . '</td>
                    <td>' . htmlspecialchars($row["in_duration"]) . '</td>
                </tr>';
        }
    } else {
        $output .= '<tr><td colspan="6">No data found.</td></tr>';
    }

    $output .= '</table></div>';

    return $output;
}


function night($db)
{
    $id = "1";
    $date_range = get_dynamic_dates();
    $from = $date_range['from'];
    $to = $date_range['to'];

    $query = "SELECT da.*, dc.name, dc.lat as v_lat, dc.lng as v_lng 
              FROM driving_alerts as da 
              JOIN devicesnew as dc ON dc.id = da.device_id 
              WHERE da.type = 'Night time violations' 
              AND da.created_at >= '$from' 
              AND da.created_at <= '$to' 
              AND da.created_by = '$id'";

    $result = mysqli_query($db, $query);

    // Fetch all rows
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Start building the HTML output
    $output = '
        <div class="table-responsive">
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            font-size: 10px; /* Set font size */
        }
        th {
            font-weight: bold;
            width: 50px; /* Adjust column width for th */
        }
        td {
            width: 50px; /* Adjust column width for td */
        }
        table {
            width: 100%; /* Make sure the table fits the page */
            font-size: 10px; /* Adjust font size for the whole table */
        }
    </style>
        <table>
            <tr>
                <th>Reg No</th>
                <th>Detail</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Night Violations Duration (Min)</th>
                <th>Created At</th>
                <th>Coordinates</th>
            </tr>';

    // Check if there are any rows to output
    if (!empty($rows)) {
        foreach ($rows as $row) {
            $output .= '
                <tr>
                    <td class="text-center">' . htmlspecialchars($row["name"]) . '</td>
                    <td class="text-center">' . htmlspecialchars($row["message"]) . '</td>
                    <td>' . htmlspecialchars($row["in_time"]) . '</td>
                    <td>' . htmlspecialchars($row["out_time"]) . ' Min</td>
                    <td>' . htmlspecialchars($row["duration"]) . '</td>
                    <td>' . htmlspecialchars($row["created_at"]) . '</td>
                    <td>' . htmlspecialchars($row["v_lat"]) . ' ' . htmlspecialchars($row["v_lng"]) . '</td>
                </tr>';
        }
    } else {
        // If no data is found, display a message
        $output .= '<tr><td colspan="7">No data found.</td></tr>';
    }

    $output .= '</table></div>';

    return $output;
}


function get_dynamic_dates()
{
    // Get the current date and time
    $current_date = new DateTime();

    // Set time to 9:00 AM for today's date
    $current_date->setTime(9, 0); // 9:00 AM today
    $to = $current_date->format('Y-m-d H:i:s');

    // Calculate the previous day and set the time to 9:00 AM
    $from_date = new DateTime();
    $from_date->modify('-1 day'); // Go Get Going With Go  back one day
    $from_date->setTime(9, 0); // Set the time to 9:00 AM
    $from = $from_date->format('Y-m-d H:i:s');

    return ['from' => $from, 'to' => $to];
}

function get_overspeed_data($lorry_number, $from, $to)
{
    if (!empty($lorry_number) && !empty($from) && !empty($to)) {
        $url = "http://151.106.17.246:8080/sitara/get_overspeed_history_data.php";

        $params = [
            "id" => $lorry_number,
            "from" => $from,
            "to" => $to
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($http_code == 200) ? json_decode($response, true) : ["error" => "Failed to fetch data from API."];
    }

    return ["error" => "Missing required parameters."];
}

function smtp_mailer($to, $time, $currentHour, $db)
{
    $html_code = '<h2 style="color: #3e3ea7;">Go Get Going With Go </h2>';
    $html_code .= '<h6>Report Name: Vehicle Activity</h6><br>';
    $html_code .= '<h6>Speed Violation</h6><br>';
    $html_code .= fetch_customer_data($db);
    $html_code .= '<h6>Black Spot</h6><br>';
    $html_code .= black_spot($db);
    $html_code .= '<h6>Night time Violations</h6><br>';
    $html_code .= night($db);



    $file_name = 'files/' . md5(rand()) . '.pdf';
    $pdf = new Pdf();
    $pdf->load_html($html_code);
    $pdf->render();
    file_put_contents($file_name, $pdf->output());

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "sitaras222@gmail.com";
    $mail->Password = "kjyqvamkejoqtbki";
    $mail->SetFrom("sitaras222@gmail.com");
    $mail->AddAddress($to);
    $mail->WordWrap = 50;
    $mail->AddAttachment($file_name);
    $mail->Subject = 'Vehicle Activity Report - ' . date('Y-m-d H:i:s');
    $mail->Body = '<h3>Please find the details of the Overspeed report in the attached PDF file.</h3>';

    if ($mail->Send()) {
        echo '<label class="text-success">Customer Details have been sent successfully.</label>';
    } else {
        echo 'Mail Not Sent';
    }

    unlink($file_name);
}
?>