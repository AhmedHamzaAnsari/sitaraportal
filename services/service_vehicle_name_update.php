<?php
ini_set('max_execution_time', -1);
include("../config_indemnifier.php");

function clean($string)
{
    $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}


//twsitara start

$fileman_twsitara = "http://203.175.74.153/AgilityWebApi/api/Values/GetVehiclesByLogin_Test?key=e4dafbca-9049-439b-aabd-68e0b4aa7de4";
$data_twsitara = file_get_contents($fileman_twsitara);
$array_twsitara = json_decode($data_twsitara, true);

if ($array_twsitara) {
} else {
    echo "Not Working ";
    $curl = curl_init();
    $base_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
    curl_setopt_array($curl, [
        CURLOPT_PORT => "8080",
        CURLOPT_URL => $base_url . "/sitara_schedule_email/api_status.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

foreach ($array_twsitara["Response"] as $row_twsitara) {

    $RecordDateTime_twsitara = $row_twsitara["RecordDateTime"];
    $time_server_twsitara = str_replace("T", " ", $RecordDateTime_twsitara);

    $id_twsitara = $row_twsitara["UnitMasterID"];

    $imei_twsitara = "tw" . clean($row_twsitara["Alias"]);

    $vehicle_twsitara = $row_twsitara["Alias"];

    $reason_twsitara = $row_twsitara["Reason"];

    $LAT_twsitara = $row_twsitara["LAT"];

    $LON_twsitara = $row_twsitara["LON"];

    $LandMark_twsitara = $row_twsitara["LandMark"];

    $Speed_twsitara = $row_twsitara["Speed"];
    if ($Speed_twsitara > '0') {
        $ign_sitara = 'On';
    } else {
        $ign_sitara = 'Off';
    }






    $sql_twsitara = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('tw_sitara','$imei_twsitara','$time_server_twsitara','$LAT_twsitara','$LON_twsitara','360','$Speed_twsitara','$vehicle_twsitara','$id_twsitara','3321','$ign_sitara','tw_sitara','$time_server_twsitara','$time_server_twsitara','$LandMark_twsitara','0');";
    mysqli_query($db, $sql_twsitara);


}

//twsitara end
//al shyma start

// $fileman1 = 'http://202.163.104.121/APIService/GetVehicleStatus.php?username=gas.oil&userpass=oil&choice=All';
// $data1 = file_get_contents($fileman1);
// $str = substr($data1, 11, -5);
// $array1 = json_decode($str, true);


// foreach ($array1 as $rowtpl) {

// $imei = clean($rowtpl["RegistrationNo"]);
// $name = $rowtpl["RegistrationNo"];
// $lat = $rowtpl["Latitude"];
// $lng = $rowtpl["Longitude"];
// $angle = $rowtpl["Direction"];
// $speed = $rowtpl["Speed"];
// $datetime = $rowtpl["GPSDateTime"];
// $licensepn = '112113114115';
// $odometer = '000';
// $ignetion = $rowtpl["IgnitionStatus"];
// $protocol = "al_shyma";
// $last_idle = '000';
// $last_move = '000';
// $last_stop = $rowtpl["Location"];

// $sqlshy = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('al_shyma','$imei','$datetime','$lat','$lng','$angle','$speed','$name','$licensepn','$odometer','$ignetion','$protocol','$last_idle','$last_move','$last_stop','0');";


// mysqli_query($db, $sqlshy);
// }

//universal start
$fileuni = "http://universal.sjsolutionz.com:8060/api/api.php?api=user&ver=1.0&key=105BD1DECBCE5FEB537F58E873AAA5FD&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$datauni = file_get_contents($fileuni);
$arrayuni = json_decode($datauni, true);


foreach ($arrayuni as $rowuni) {

    $imeiuni = clean($rowuni["name"]);
    $nameuni = $rowuni["RegNo"];
    $latuni = $rowuni["lat"];
    $lnguni = $rowuni["lng"];
    $angleuni = $rowuni["angle"];
    $speeduni = $rowuni["speed"];
    $datetimeuni = $rowuni["GpsDateTime"];
    $licensepnuni = '112113114115';
    $odometeruni = '000';
    if ($speeduni > 0) {
        $ignetionuni = 'On';
    } else {
        $ignetionuni = 'Off';
    }
    $protocoluni = "Universal";
    $last_idleuni = '000';
    $last_moveuni = '000';
    $last_stopuni = $rowuni["Location"];

    $sqluni = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('Universal','$imeiuni','$datetimeuni','$latuni','$lnguni','$angleuni','$speeduni','$nameuni','$licensepnuni','$odometeruni','$ignetionuni','$protocoluni','$last_idleuni','$last_moveuni','$last_stopuni','0');";


    mysqli_query($db, $sqluni);
}

//universal end
//any tracking one start

// $fileman_anyone = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_tariq&password=dGFyaXE=";
// $data_anyone = file_get_contents($fileman_anyone);
// $array_anyone = json_decode($data_anyone, true);

// foreach ($array_anyone as $row_anyone) {

// $RecordDateTime_anyone = $row_anyone["DateTime"];
// $time_server_anyone = str_replace("T", " ", $RecordDateTime_anyone);

// $id_anyone = $row_anyone["SimNo"];

// $imei_anyone = "any" . clean($row_anyone["VehicleName"]);

// $vehicle_anyone = $row_anyone["VehicleName"];

// $LAT_anyone = $row_anyone["Latitude"];

// $LON_anyone = $row_anyone["Longitude"];

// $LandMark_anyone = $row_anyone["Location"];

// $Speed_anyone = $row_anyone["Speed"];
// $ign_sitara = $row_anyone["ACC"];
// $odo_sitara = $row_anyone["Mileage"];






// $sql_anyone = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('anytracker','$imei_anyone','$time_server_anyone','$LAT_anyone','$LON_anyone','360','$Speed_anyone','$vehicle_anyone','$id_anyone','$odo_sitara','$ign_sitara','anytracker','$time_server_anyone','$time_server_anyone','$LandMark_anyone','0');";
// mysqli_query($db, $sql_anyone);


// }

//any tracking one end


//any tracking two start

// $fileman_anytwo = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_empiretransport&password=dHJhbnNwb3J0";
// $data_anytwo = file_get_contents($fileman_anytwo);
// $array_anytwo = json_decode($data_anytwo, true);

// foreach ($array_anytwo as $row_anytwo) {

// $RecordDateTime_anytwo = $row_anytwo["DateTime"];
// $time_server_anytwo = str_replace("T", " ", $RecordDateTime_anytwo);
// $id_anytwo = $row_anytwo["SimNo"];

// $imei_anytwo = "any" . clean($row_anytwo["VehicleName"]);

// $vehicle_anytwo = $row_anytwo["VehicleName"];

// $LAT_anytwo = $row_anytwo["Latitude"];

// $LON_anytwo = $row_anytwo["Longitude"];

// $LandMark_anytwo = $row_anytwo["Location"];

// $Speed_anytwo = $row_anytwo["Speed"];
// $ign_sitara = $row_anytwo["ACC"];
// $odo_sitara = $row_anytwo["Mileage"];






// $sql_anytwo = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('anytracker','$imei_anytwo','$time_server_anytwo','$LAT_anytwo','$LON_anytwo','360','$Speed_anytwo','$vehicle_anytwo','$id_anytwo','$odo_sitara','$ign_sitara','anytracker','$time_server_anytwo','$time_server_anytwo','$LandMark_anytwo','0');";
// mysqli_query($db, $sql_anytwo);


// }

//any tracking two end
//topfly start

$fileman_top = "http://topfly.sjsolutionz.com:8090/api/api.php?api=user&ver=1.0&key=8A1A03468671DC0D6378C9E77D16B632&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$data_top = file_get_contents($fileman_top);
$top_array = json_decode($data_top, true);


foreach ($top_array as $rowtop) {

    $imeitop = clean($rowtop["name"]);
    $nametop = $rowtop["name"];
    $lattop = $rowtop["lat"];
    $lngtop = $rowtop["lng"];
    $angletop = $rowtop["angle"];
    $speedtop = $rowtop["speed"];
    $datetimetop = $rowtop["GpsDateTime"];
    $licensepntop = '112113114115';
    $odometertop = '333';
    $ignetiontop = $rowtop["AccStatus"];
    $protocoltop = "topflay";
    $last_idletop = '000';
    $last_movetop = '000';
    $last_stoptop = $rowtop["Location"];

    $sqltop = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('topflay','$imeitop','$datetimetop','$lattop','$lngtop','$angletop','$speedtop','$nametop','$licensepntop','$odometertop','$ignetiontop','$protocoltop','$last_idletop','$last_movetop','$last_stoptop','0');";


    mysqli_query($db, $sqltop);
}

//topfly end

//primer start

$filemanpre = 'http://202.163.104.124/APIService/GetVehicleStatus.php?username=gas.oil&userpass=oil&choice=All';
$datapre = file_get_contents($filemanpre);
$strpre = substr($datapre, 11, -5);
$arraypre = json_decode($strpre, true);


foreach ($arraypre as $rowpre) {

    $imeipre = "pre" . clean($rowpre["RegistrationNo"]);
    $namepre = $rowpre["RegistrationNo"];
    $latpre = $rowpre["Latitude"];
    $lngpre = $rowpre["Longitude"];
    $anglepre = $rowpre["Direction"];
    $speedpre = $rowpre["Speed"];
    $datetimepre = $rowpre["GPSDateTime"];
    $licensepnpre = '112113114115';
    $odometerpre = '000';
    $ignetionpre = $rowpre["IgnitionStatus"];
    $protocolpre = "PTSL";
    $last_idlepre = '000';
    $last_movepre = '000';
    $last_stoppre = $rowpre["Location"];

    $sqlpre = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('PTSL','$imeipre','$datetimepre','$latpre','$lngpre','$anglepre','$speedpre','$namepre','$licensepnpre','$odometerpre','$ignetionpre','$protocolpre','$last_idlepre','$last_movepre','$last_stoppre','0');";


    mysqli_query($db, $sqlpre);
}
//primer end


//unitedsitara start

$fileman_unitedsitara = "http://151.106.17.246:8080/sitara/services/united.php";
$data_unitedsitara = file_get_contents($fileman_unitedsitara);
$array_unitedsitara = json_decode($data_unitedsitara, true);

foreach ($array_unitedsitara as $row_unitedsitara) {

    $datetunited = $row_unitedsitara["GPSTime"];
    $datebbunited = date_create($datetunited);
    $time_server_unitedsitara = date_format($datebbunited, "Y-m-d H:i:s");
    $id_unitedsitara = $row_unitedsitara["CarReg"];
    $imei_unitedsitara = "un" . clean($row_unitedsitara["CarReg"]);
    $vehicle_unitedsitara = $row_unitedsitara["CarReg"];
    $LAT_unitedsitara = $row_unitedsitara["Lat"];
    $LON_unitedsitara = $row_unitedsitara["Long"];
    $LandMark_unitedsitara = $row_unitedsitara["Location"];
    $Speed_unitedsitara = $row_unitedsitara["Speed"];
    if ($Speed_unitedsitara > '0') {
        $ign_sitara = 'On';
    } else {
        $ign_sitara = 'Off';
    }






    $sql_unitedsitara = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('united_sitara','$imei_unitedsitara','$time_server_unitedsitara','$LAT_unitedsitara','$LON_unitedsitara','360','$Speed_unitedsitara','$vehicle_unitedsitara','$id_unitedsitara','3321','$ign_sitara','united_sitara','$time_server_unitedsitara','$time_server_unitedsitara','$LandMark_unitedsitara','0');";
    mysqli_query($db, $sql_unitedsitara);


}

//united_sitara end
//resqstart
$fileman_resq911 = "http://151.106.17.246:8080/sitara/services/resq.php";
$data_resq911 = file_get_contents($fileman_resq911);
$array_resq911 = json_decode($data_resq911, true);

foreach ($array_resq911['data'] as $row_resq911) {

    $datetresq = $row_resq911["GPSDateTime"];
    $datebbresq = date_create($datetresq);
    $datetimeres = date_format($datebbresq, "Y-m-d H:i:s");
    $imeires = "res" . clean($row_resq911["VRN_Number"]);
    $nameres = $row_resq911["VRN_Number"];
    $latres = $row_resq911["VehicleLatitude"];
    $lngres = $row_resq911["VehicleLongitude"];
    $angleres = $row_resq911["VehicleAngle"];
    $speedres = $row_resq911["VehicleSpeed"];
    $licensepnres = '112113114115';
    $odometerres = $row_resq911['OdometerReading'];
    $ignetionres = $row_resq911["PowerIgnition"];
    $protocolres = "resq911";
    $last_idleres = '000';
    $last_moveres = '000';
    $last_stopres = $row_resq911['VehicleLocation'];

    $sqlresq = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('resq911','$imeires','$datetimeres','$latres','$lngres','$angleres','$speedres','$nameres','$licensepnres','$odometerres','$ignetionres','$protocolres','$last_idleres','$last_moveres','$last_stopres','0');";


    mysqli_query($db, $sqlresq);


}
//resqend

//new-tpl start


$filetpl = "https://mytrakker.tpltrakker.com/TrakkerServices_Stag/Api/Home/GetVLL/0404502130/2130";
$datatpl = file_get_contents($filetpl);
$arraytpl = json_decode($datatpl, true);

foreach ($arraytpl as $sitaratpl) {

    $imeitplnew = "tpl" . clean($sitaratpl["RegNo"]);
    $nametplnew = $sitaratpl["RegNo"];
    $lattplnew = $sitaratpl["Lat"];
    $lngtplnew = $sitaratpl["Long"];
    $angletplnew = $sitaratpl["Direction"];
    $speedtplnew = $sitaratpl["Speed"];
    $datetimetplnew = $sitaratpl["GpsDateTime"];
    $datebbtpl = date_create($datetimetplnew);
    $datetimetpl = date_format($datebbtpl, "Y-m-d H:i:s");
    $licensepntplnew = '112113114115';
    $odometertplnew = '000';
    $ignetiontplnew = $sitaratpl["Ignition"];
    $protocoltplnew = "TPL";
    $last_idletplnew = '000';
    $last_movetplnew = '000';
    $last_stoptplnew = $sitaratpl["Location"];

    $sqltplnew = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('TPL','$imeitplnew','$datetimetpl','$lattplnew','$lngtplnew','$angletplnew','$speedtplnew','$nametplnew','$licensepntplnew','$odometertplnew','$ignetiontplnew','$protocoltplnew','$last_idletplnew','$last_movetplnew','$last_stoptplnew','0');";


    mysqli_query($db, $sqltplnew);
}

//new-tpl end

//telogix api start

$tel_link_by = "https://mobile.telogix.com.pk/GetUserInfo.asmx/GetUserData?uname=info@gopetroleum.com.pk&upwd=go@petroleum";
$tel_file_by = file_get_contents($tel_link_by);
$tel_replace_by = str_replace('<string xmlns="http://tempuri.org/">', '', $tel_file_by);
$tel_replace1_by = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $tel_replace_by);
$tel_replace2_by = str_replace('</string>', '', $tel_replace1_by);
$content_tel_by = json_decode($tel_replace2_by, true);
foreach ($content_tel_by as $obj_by) {
$tel_vehicle_clean = "tel" . clean($obj_by['vehicleName']);
$tel_time = $obj_by['gpsTime'];
$tel_lat = $obj_by['lat'];
$tel_long = $obj_by['lng'];
$tel_address = $obj_by['location'];
$tel_angle = $obj_by['Direction'];
$tel_speed = $obj_by['speed'];
$tel_vehicle = $obj_by['vehicleName'];
$tel_odo = $obj_by['mileage'];
$ttigne = $obj_by['Status_Ignition'];
if ($ttigne == 'ON') {
$tel_igne = 'On';
} else {
$tel_igne = 'Off';
}

$sqltel = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('tellogix','$tel_vehicle_clean','$tel_time','$tel_lat','$tel_long','$tel_angle','$tel_speed','$tel_vehicle','','$tel_odo','$tel_igne','tellogix','$tel_time','$tel_time','$tel_address','0');";

mysqli_query($db, $sqltel);

}

//telogix api end

//xtream strat

$fileman_xtr = "http://151.106.17.246:8080/sitara/services/sitara_xtr.php";
$data_xtr = file_get_contents($fileman_xtr);
$array_xtr = json_decode($data_xtr, true);

foreach ($array_xtr['data'] as $row_xtr) {

$datetxtr = $row_xtr["ReceiveDateTime"];
$time_server_xtr = str_replace("T", " ", $datetxtr);
$imeixtr = "xtr" . clean($row_xtr["VRN"]);
$namextr = $row_xtr["VRN"];
$latxtr = $row_xtr["LATITUDE"];
$lngxtr = $row_xtr["LONGITUDE"];
$anglextr = $row_xtr["ANGLE"];
$speedxtr = $row_xtr["SPEED"];
$int_speed = (int) $speedxtr;

$licensepnxtr = '112113114115';
$odometerxtr = $row_xtr['Mileage'];
$ignetionxtr = $row_xtr["IgnitionStatus"];
if ($ignetionxtr == 'true') {
$ignxtr = 'On';
} else {
$ignxtr = 'Off';
}
$protocolxtr = "xtream";
$last_idlextr = $time_server_xtr;
$last_movextr = $time_server_xtr;
$last_stopxtr = $row_xtr['ReferenceLocation'];

$sqlxtr = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('xtream','$imeixtr','$time_server_xtr','$latxtr','$lngxtr','$anglextr','$int_speed','$namextr','$licensepnxtr','$odometerxtr','$ignxtr','$protocolxtr','$last_idlextr','$last_movextr','$last_stopxtr','0');";


mysqli_query($db, $sqlxtr);


}
//xtream end
//teltonika start

$fileman_teltonika =
"http://3star.sjsolutionz.com/api/api.php?api=user&ver=1.0&key=2681E9BD666155E393C3573B0F5FB37B&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$data_teltonika = file_get_contents($fileman_teltonika);
$array_teltonika = json_decode($data_teltonika, true);

foreach ($array_teltonika as $row_teltonika) {

$time_server_tel = $row_teltonika["GpsDateTime"];

$imeitel = "telto" . clean($row_teltonika["name"]);
$nametel = $row_teltonika["name"];
$lattel = $row_teltonika["lat"];
$lngtel = $row_teltonika["lng"];
$angletel = $row_teltonika["angle"];
$speedtel = $row_teltonika["speed"];

$licensepntel = '112113114115';
$odometertel = '3333';
$ignetiontel = $row_teltonika["speed"];
if ($ignetiontel > '0') {
$igntel = 'On';
} else {
$igntel = 'Off';
}
$protocoltel = "teltonika";
$last_idletel = $time_server_tel;
$last_movetel = $time_server_tel;
$last_stoptel = $row_teltonika['Location'];

$sqltelto = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('teltonika','$imeitel','$time_server_tel','$lattel','$lngtel','$angletel','$speedtel','$nametel','$licensepntel','$odometertel','$igntel','$protocoltel','$last_idletel','$last_movetel','$last_stoptel','0');";


mysqli_query($db, $sqltelto);


}
//teltonika end
//iot start

$filemaniot = "http://151.106.17.246:8080/sitara/services/iot.php";
$dataiot = file_get_contents($filemaniot);
$arrayiot = json_decode($dataiot, true);
$i = 0;

foreach ($arrayiot["root"]["VehicleData"] as $rowiot) {

$vehicle_iot = $rowiot["Vehicle_Name"];
$LandMark_iot = $rowiot["Location"];
$imei = "iot" . clean($rowiot["Vehicle_Name"]);
$iot_db = $rowiot["GPSActualTime"];
$old_date_iot = date($iot_db);
$old_date_timestamp_iot = strtotime($old_date_iot);
$time_server_iot = date('Y-m-d H:i:s', $old_date_timestamp_iot);
$LAT_iot = $rowiot["Latitude"];
$LON_iot = $rowiot["Longitude"];
$Speed_iot = $rowiot["Speed"];
if ($Speed_iot > '0') {
$ign_iot = 'On';
} else {
$ign_iot = 'Off';
}


$sql_iot = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('iot','$imei','$time_server_iot','$LAT_iot','$LON_iot','360','$Speed_iot','$vehicle_iot','','3321','$ign_iot','iot','$time_server_iot','$time_server_iot','$LandMark_iot','0');";
mysqli_query($db, $sql_iot);
}


//iot end
//teletix start

$filemanteletix = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_etc&password=ZXRjMTM1";
$datateletix = file_get_contents($filemanteletix);
$arrayteletix = json_decode($datateletix, true);
$i = 0;

foreach ($arrayteletix as $rowteletix) {

$vehicle_teletix = $rowteletix["VehicleName"];
$LandMark_teletix = $rowteletix["Location"];
$imei = "teletix" . clean($rowteletix["VehicleName"]);
$time_server_xtr_tele = $rowteletix["DateTime"];
$time_server_teletix = str_replace("T", " ", $time_server_xtr_tele);
$LAT_teletix = $rowteletix["Latitude"];
$LON_teletix = $rowteletix["Longitude"];
$Speed_teletix = $rowteletix["Speed"];
$ign_teletix = $rowteletix["ACC"];

$sql_teletix = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('teletix','$imei','$time_server_teletix','$LAT_teletix','$LON_teletix','360','$Speed_teletix','$vehicle_teletix','','3321','$ign_teletix','teletix','$time_server_teletix','$time_server_teletix','$LandMark_teletix','0');";
mysqli_query($db, $sql_teletix);
}


//teletix end

//tw_x_start

$tw_x =
"http://portalxs.com/twpxcc/TrackingServices.asmx/TWPXCC_GetVData?secret_key=a3605b70-039b-45b1-95c9-47b4fe42002f";
$tw_x_file = file_get_contents($tw_x);
$tw_replace_by = str_replace('<string xmlns="http://tempuri.org/">', '', $tw_x_file);
    $tw_replace1_by = str_replace('
    <?xml version="1.0" encoding="utf-8"?>', '', $tw_replace_by);
    $tw_replace2_by = str_replace('
</string>', '', $tw_replace1_by);
$content_tw_by = json_decode($tw_replace2_by, true);
foreach ($content_tw_by['_vehicleData'] as $tw_by) {
$tw_x_imei = "tw_x_" . clean($tw_by['RegNo']);
$tw_x_vehicle = $tw_by['RegNo'];
$tw_x_rdt = $tw_by['RDT'];
$tw_x_time = str_replace("T", " ", $tw_x_rdt);
$tw_x_lat = $tw_by['LAT'];
$tw_x_lng = $tw_by['LON'];
$tw_x_speed = $tw_by['Speed'];
$tw_x_location = $tw_by['Location'];
if ($tw_x_speed > 0) {
$tw_x_ign = 'On';
} else {
$tw_x_ign = 'Off';
}

$sql_tw_x = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('tw_x','$tw_x_imei','$tw_x_time','$tw_x_lat','$tw_x_lng','360','$tw_x_speed','$tw_x_vehicle','$tw_x_vehicle','3321','$tw_x_ign','tw_x','$tw_x_time','$tw_x_time','$tw_x_location','0');";
mysqli_query($db, $sql_tw_x);

}

//tw_x_end

//qtracker start

$fileman_qtrack =
'https://login.aitrack.pk/api/get_devices?user_api_hash=$2y$10$MWdI3fsiX4YhnhYDdomLzetApTdSmqRmBwvq/cY43WaQIv9o7HIP6';
$data_qtrack = file_get_contents($fileman_qtrack);
$array_qtrack = json_decode($data_qtrack, true);

foreach ($array_qtrack['0']['items'] as $qtrack) {

$nameqtrack = $qtrack["name"];
$timepm = $qtrack["time"];
$timevpm = date_create($timepm);
echo $timeqtrack = date_format($timevpm, "Y-m-d H:i:s");
echo "<br>";
$idqtrack = $qtrack["name"];
$imeiqtrack = "qtrack" . clean($qtrack["name"]);
$vehicleqtrack = $qtrack["name"];
$LATqtrack = $qtrack["lat"];
$LONqtrack = $qtrack["lng"];
$LandMarkqtrack = $qtrack["addr"];
$Speedqtrack = $qtrack["speed"];
if ($Speedqtrack > '0') {
$ignqtrack = 'On';
} else {
$ignqtrack = 'Off';
}






$sql_qtrack = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('q_tracker','$imeiqtrack','$timeqtrack','$LATqtrack','$LONqtrack','360','$Speedqtrack','$vehicleqtrack','$idqtrack','3321','$ignqtrack','q_tracker','$timeqtrack','$timeqtrack','$LandMarkqtrack','0');";
mysqli_query($db, $sql_qtrack);


}

//qtracker end

?>





<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
        style="width:<?php echo $i; ?>%">
        <span class="sr-only">
            <?php ?>
        </span>
    </div>
</div>
</div>
<?php


if ($sql_twsitara == true) {
    echo "<br> New record created successfully yeahoo Tracking World ";

} else {
    echo "Error: " . $sql_twsitara . "<br>" . mysqli_error($db);

}
// if ($sqlshy == true) {
// echo "<br> New record created successfully yeahoo Al Shyma ";

// } else {
// echo "Error: " . $sqlshy . "<br>" . mysqli_error($db);

// }
if ($sqluni == true) {
    echo "<br> New record created successfully yeahoo Universal ";

} else {
    echo "Error: " . $sqluni . "<br>" . mysqli_error($db);

}
// if ($sql_anyone == true) {
// echo "<br> New record created successfully yeahoo Any Tracker one ";

// } else {
// echo "Error: " . $sql_anyone . "<br>" . mysqli_error($db);

// // }
// if ($sql_anytwo == true) {
// echo "<br> New record created successfully yeahoo Any Tracker Two ";

// } else {
// echo "Error: " . $sql_anytwo . "<br>" . mysqli_error($db);

// }
if ($sqltop == true) {
    echo "<br> New record created successfully yeahoo TopFlay ";

} else {
    echo "Error: " . $sqltop . "<br>" . mysqli_error($db);

}
if ($sqlpre == true) {
    echo "<br> New record created successfully yeahoo PTSL ";

} else {
    echo "Error: " . $sqlpre . "<br>" . mysqli_error($db);

}
if ($sqlresq == true) {
    echo "<br> New record created successfully yeahoo RESQ ";

} else {
    echo "Error: " . $sqlresq . "<br>" . mysqli_error($db);

}
if ($sqltplnew == true) {
    echo "<br> New record created successfully yeahoo TPL ";

} else {
    echo "Error: " . $sqltplnew . "<br>" . mysqli_error($db);

}
if ($sqltel == true) {
    echo "<br> New record created successfully yeahoo Tellogix ";

} else {
    echo "Error: " . $sqltel . "<br>" . mysqli_error($db);

}
if ($sqltelto == true) {
    echo "<br> New record created successfully yeahoo Tellogix ";

} else {
    echo "Error: " . $sqltelto . "<br>" . mysqli_error($db);

}
if ($sql_iot == true) {
    echo "<br> New record created successfully yeahoo IOT ";

} else {
    echo "Error: " . $sql_iot . "<br>" . mysqli_error($db);

}
if ($sql_teletix == true) {
    echo "<br> New record created successfully yeahoo TELETIX ";

} else {
    echo "Error: " . $sql_teletix . "<br>" . mysqli_error($db);

}
if ($sql_tw_x == true) {
    echo "<br> New record created successfully yeahoo TW_X ";

} else {
    echo "Error: " . $sql_tw_x . "<br>" . mysqli_error($db);

}
if ($sql_qtrack == true) {
    echo "<br> New record created successfully yeahoo qtracker ";

} else {
    echo "Error: " . $sql_qtrack . "<br>" . mysqli_error($db);

}


$sql1 = mysqli_query($db, "SELECT COUNT(*) as num FROM bulkdatanew");

$result = mysqli_fetch_assoc($sql1);
echo '<br>' . $result['num'];
$t_row = $result['num'];
mysqli_close($db);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="200"> -->
    <title>Sitara Data</title>
    <style>
    .progress {
        height: 3px !important;
        margin-bottom: 1px !important;
    }
    </style>
</head>

<body style="background: #fff;">
    <div class="col-md-8">

        <div class="col-md-12">
            <br>
            <?php echo "Successfully done" . "<br>";
            echo date("d-m-Y H:i:s", time()); ?>
        </div>
</body>

</html>