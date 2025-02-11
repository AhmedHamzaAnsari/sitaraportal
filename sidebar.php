<?php

$sess_id = $_SESSION['userid'];
$admin_ka_user = $_SESSION['prive'];
$username_name = $_SESSION['member_name'];

// $tree = "SELECT * from users  where privilege !='Admin' and privilege !='viewer' and privilege !='admin_user' and privilege !='app' order by id asc";

$resultside = mysqli_query($db, "SELECT * FROM users where id='$sess_id'");
$datasidde = mysqli_fetch_array($resultside);

if ($datasidde['privilege'] === 'Cartraige' || $datasidde['privilege'] === 'Depot' || $datasidde['privilege'] === 'viewer') {

    $tree = "SELECT * from  users where id='$sess_id'";

} else {
    $tree_caart = "SELECT * from users where privilege='Cartraige'";
    if ($datasidde['privilege'] === 'Admin' || $datasidde['privilege'] === 'Distributor') {
        $tree = "SELECT * from users where privilege='End-User' or privilege='Admin'";
        $tree_admin = "SELECT * from users where id='$sess_id'";
        $sidebaaar_Cartraige = mysqli_query($db, $tree_caart);
        $sidebaaar_admin = mysqli_query($db, $tree_admin);

        $depot_users = "SELECT us.*,du.depot_id FROM depot_users as du join users as us on us.id=du.user_id;";
        $sidebaaar_depot_users = mysqli_query($db, $depot_users);
    } else {
        $tree = "SELECT * from users where privilege='End-User' or privilege='Admin'";
        $tree_admin = "SELECT * from users where id='$sess_id'";
        $sidebaaar_Cartraige = mysqli_query($db, $tree_caart);
        $sidebaaar_admin = mysqli_query($db, $tree_admin);
    }

}
$sidebaaar = mysqli_query($db, $tree);
$current_date = date('Y-m-d');
$next_dat = date('Y-m-d', strtotime($current_date . '+1 day'));

?>
<link href="assets/css/elements/custom-tree_view.css" rel="stylesheet" type="text/css" />
<script src="plugins/treeview/custom-jstree.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<style>
.sidebar-wrapper #compactSidebar .menu-categories a.menu-toggle .base-icons svg {
    color: #fff !important;
}

h5 {
    color: #fff
}

.base-icons {
    color: #fff
}

.sidebar-wrapper #compact_submenuSidebar .submenu ul.submenu-list li a {
    color: #fff
}

.sidebar-wrapper #compact_submenuSidebar .submenu ul.submenu-list li a svg:not(.feather-chevron-right) {
    color: #f47621
}

.sidebar-wrapper #compactSidebar .menu-categories li.menu a.menu-toggle {
    border: 1px solid #1b1650;
    border-radius: 7px
}

.sidebar-wrapper #compactSidebar .theme-logo {
    border: 1px solid #1b1650;
    border-radius: 7px
}

.file-tree li::before {
    display: none;
}
</style>


<?php if ($datasidde['privilege'] === 'viewer' || $datasidde['privilege'] === 'Cartraige' || $datasidde['privilege'] === 'Depot') { ?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#3e3ea7 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <!-- <img src="images/crm logo 1.png" class="navbar-logo" alt="logo"> -->
                <h3>SP</h3>
            </a>
        </div>

        <ul class="menu-categories">
            <li class="menu">
                <a href="#dashboard" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Dashboard</span></div>
            </li>
            <li class="menu">
                <a href="#live" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 512.061 512.061" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m110.034 265.573-77.784-77.784c-20.777-20.777-32.22-48.401-32.22-77.785 0-60.656 49.348-110.004 110.004-110.004 60.657 0 110.004 49.348 110.004 110.004 0 29.384-11.442 57.008-32.22 77.785zm0-235.573c-44.114 0-80.004 35.89-80.004 80.004 0 21.37 8.322 41.461 23.433 56.572l56.571 56.571 56.572-56.571c15.111-15.111 23.433-35.202 23.433-56.572 0-44.114-35.89-80.004-80.005-80.004z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m110.034 160.008c-27.571 0-50.002-22.431-50.002-50.002s22.431-50.002 50.002-50.002 50.002 22.431 50.002 50.002-22.431 50.002-50.002 50.002zm0-70.004c-11.029 0-20.002 8.973-20.002 20.002s8.973 20.002 20.002 20.002 20.002-8.973 20.002-20.002-8.973-20.002-20.002-20.002z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m432.026 512.061-56.573-56.571c-15.109-15.111-23.431-35.202-23.431-56.572 0-44.114 35.89-80.004 80.004-80.004s80.004 35.89 80.004 80.004c0 21.369-8.321 41.46-23.432 56.572zm-35.359-77.785 35.359 35.358 35.358-35.358c9.444-9.445 14.646-22.003 14.646-35.359 0-27.572-22.432-50.004-50.004-50.004s-50.004 22.432-50.004 50.004c0 13.357 5.202 25.915 14.645 35.359z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m359.031 512h-167.453c-53.234 0-96.543-43.309-96.543-96.543s43.309-96.544 96.543-96.544h55.664c16.419 0 29.776-13.357 29.776-29.776s-13.357-29.776-29.776-29.776h-58.202v-30h58.202c32.961 0 59.776 26.815 59.776 59.776s-26.815 59.776-59.776 59.776h-55.664c-36.692 0-66.543 29.851-66.543 66.543s29.85 66.544 66.543 66.544h167.454v30z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Vehicle Tracking</span></div>
            </li>

            <li class="menu">
                <a href="#app" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Edit Profile</span></div>
            </li>

            <li class="menu">
                <a href="#users" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Assets</span></div>
            </li>
            <li class="menu ">
                <a href="#trip" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-atlas"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Trip</span></div>
            </li>



            <li class="menu ">
                <a href="#report" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="far fa-file-excel"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Reports</span></div>
            </li>

            <li class="menu ">
                <a href="#alert_email" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Email Alerts</span></div>
            </li>





        </ul>


    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="theme-brand-name">
            <!-- <a href="index.php"><img src="images/crm logo 1 inverse.png" alt="" srcset="" style="width:180px"></a> -->
            <h1 style="font-weight: bold;color: #fff;font-style: italic;font-weight: bold;text-align:center">SITARA</h1>
        </div>

        <div class="submenu" id="dashboard">
            <div class="category-info">
                <h5>Dashboard</h5>

            </div>

            <ul class="submenu-list" data-parent-element="#app">

            </ul>



            <ul class="file-tree submenu-list">
                <li class="file-tree-folder text-white">Dashboard

                    <?php foreach ($sidebaaar as $key => $value1) {
                                    if ($datasidde['privilege'] === 'Depot') {

                                        $cid = 1;
                                    } else {
                                        $cid = $value1['id'];

                                    }
                                    ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $cid; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>

                    </ul>
                    <?php }
                                ?>
                <li>
                <li class="file-tree-folder text-white">Dashboard New

                    <?php foreach ($sidebaaar as $key => $value1) {
                                    if ($datasidde['privilege'] === 'Depot') {

                                        $cid = 1;
                                    } else {
                                        $cid = $value1['id'];

                                    }
                                    ?>

                    <ul>
                        <a
                            href="dev_dashboard_apis.php?id=<?php echo $cid; ?>&from=<?php echo $current_date; ?>&to=<?php echo $next_dat; ?>"><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>

                    </ul>
                    <?php }
                                ?>
                <li>
                    <?php
                                $trip_url;
                                if ($_SESSION['prive'] != 'Depot') {
                                    $trip_url = 'trips_dashboard';
                                } else {
                                    $trip_url = 'depot_trip_dashboard';

                                }
                                ?>
                    <a href="<?php echo $trip_url; ?>.php?id=<?php echo $sess_id; ?>"><span class="icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip Dashboard

                    </a>


                </li>


                <li class="">
                    <?php
                                $datetime = new DateTime();
                                $datetime->modify('+1 day');
                                // echo $datetime->format('Y-m-d');
                                ?>

                    <a
                        href="sap_dashboard.php?from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Sap Dashboard </a>
                </li>


                <li class="">


                    <a href="integrated_dashboard.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Intransit Dashboard </a>
                </li>


            </ul>



        </div>

        <div class="submenu" id="live">
            <div class="category-info">
                <h5>Vehicle Tracking</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">

                <li>
                    <a onclick="post_new_data()"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map new</a>
                </li>
                <li>
                    <a href="vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map</a>
                </li>

                <li>
                    <a href="routes.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Play Back </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="app">
            <div class="category-info">
                <h5>Customers</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">

                <li>
                    <a href="editusers.php?id=<?php echo $sess_id ?>"><span class="icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Edit Profile </a>
                </li>
            </ul>
        </div>

        <div class="submenu" id="users">
            <div class="category-info">
                <h5>Assets</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#users">


                <li>
                    <a href="manage_devices.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage vehicles </a>
                </li>



            </ul>
        </div>





        <div class="submenu" id="trip">
            <div class="category-info">
                <h5>Trips </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#trip">

                <li class="">
                    <!-- starting_trip.php  old link-->
                    <a href="create_trip.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Create Trip </a>
                </li>

                <li class="">

                    <a href="tab_trip.php?date=<?php echo date('Y-m-d'); ?>"><span class="icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>View Trip </a>
                </li>

                <!-- <li class="">

                    <a href="create_reciving.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip Reciving </a>
                </li>

                <li class="">

                    <a href="create_reciving_list.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Reciving Record</a>
                </li> -->


            </ul>
        </div>


        <div class="submenu" id="report">
            <div class="category-info">
                <h5>Reports </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#report">

                <li class="">
                    <a href="current_location.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Current Location </a>
                </li>

                <li class="">
                    <a href="history_of_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>History Report </a>
                </li>
                <li class="">
                    <a href="blackspot_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Black Spot Report </a>
                </li>
                <li class="">
                    <a href="overspeed_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Overspeed Report </a>
                </li>
                <li class="">
                    <a href="nr_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>NR Report </a>
                </li>
                <!-- <li class="">
                    <a href="trip_start_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip start SMS Report </a>
                </li>
                <li class="">
                    <a href="trip_close_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip close SMS Report </a>
                </li> -->

                <li class="">
                    <a href="night_violation.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Night Violation Report </a>
                </li>
                <!-- <li class="">
                    <a href="not_reciving.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Not Reciving Trips </a>
                </li> -->



            </ul>
        </div>

        <div class="submenu" id="alert_email">
            <div class="category-info">
                <h5>Email Alerts</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">
                <?php

                            $datetime = new DateTime();
                            $datetime->modify('+1 day');


                            ?>
                <li class="">
                    <a
                        href="email_overspeed.php?id=<?php echo $sess_id ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $username_name ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Overspeed</a>
                </li>
                <li class="">
                    <a
                        href="email_excess_driving.php?id=<?php echo $sess_id ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $username_name ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Excess Driving</a>
                </li>
                <li class="">
                    <a
                        href="email_nr.php?id=<?php echo $sess_id ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $username_name ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>NR</a>
                </li>
                <li class="">
                    <a
                        href="email_nighr_voilation.php?id=<?php echo $sess_id; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $username_name ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Night Voilation</a>
                </li>
                <li class="">
                    <a
                        href="email_blackspot.php?id=<?php echo $sess_id ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $username_name ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Black Spot</a>
                </li>


            </ul>
        </div>

    </div>

</div>
<?php } elseif ($admin_ka_user === 'admin_user') { ?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#3e3ea7 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <!-- <img src="images/crm logo 1.png" class="navbar-logo" alt="logo"> -->
                <h3>S</h3>
            </a>
        </div>

        <ul class="menu-categories">
            <li class="menu">
                <a href="#dashboard" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Dashboard</span></div>
            </li>
            <li class="menu">
                <a href="#live" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 512.061 512.061" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m110.034 265.573-77.784-77.784c-20.777-20.777-32.22-48.401-32.22-77.785 0-60.656 49.348-110.004 110.004-110.004 60.657 0 110.004 49.348 110.004 110.004 0 29.384-11.442 57.008-32.22 77.785zm0-235.573c-44.114 0-80.004 35.89-80.004 80.004 0 21.37 8.322 41.461 23.433 56.572l56.571 56.571 56.572-56.571c15.111-15.111 23.433-35.202 23.433-56.572 0-44.114-35.89-80.004-80.005-80.004z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m110.034 160.008c-27.571 0-50.002-22.431-50.002-50.002s22.431-50.002 50.002-50.002 50.002 22.431 50.002 50.002-22.431 50.002-50.002 50.002zm0-70.004c-11.029 0-20.002 8.973-20.002 20.002s8.973 20.002 20.002 20.002 20.002-8.973 20.002-20.002-8.973-20.002-20.002-20.002z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m432.026 512.061-56.573-56.571c-15.109-15.111-23.431-35.202-23.431-56.572 0-44.114 35.89-80.004 80.004-80.004s80.004 35.89 80.004 80.004c0 21.369-8.321 41.46-23.432 56.572zm-35.359-77.785 35.359 35.358 35.358-35.358c9.444-9.445 14.646-22.003 14.646-35.359 0-27.572-22.432-50.004-50.004-50.004s-50.004 22.432-50.004 50.004c0 13.357 5.202 25.915 14.645 35.359z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m359.031 512h-167.453c-53.234 0-96.543-43.309-96.543-96.543s43.309-96.544 96.543-96.544h55.664c16.419 0 29.776-13.357 29.776-29.776s-13.357-29.776-29.776-29.776h-58.202v-30h58.202c32.961 0 59.776 26.815 59.776 59.776s-26.815 59.776-59.776 59.776h-55.664c-36.692 0-66.543 29.851-66.543 66.543s29.85 66.544 66.543 66.544h167.454v30z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Vehicle Tracking</span></div>
            </li>

            <li class="menu ">
                <a href="#trip" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-atlas"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Trip</span></div>
            </li>
            <li class="menu ">
                <a href="#sap_manual" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-image">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Sap Manual Trips</span></div>
            </li>


        </ul>



    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="theme-brand-name">
            <!-- <a href="index.php"><img src="images/crm logo 1 inverse.png" alt="" srcset="" style="width:180px"></a> -->
            <h1 style="font-weight: bold;color: #fff;font-style: italic;font-weight: bold;text-align:center">SITARA</h1>
        </div>

        <div class="submenu" id="dashboard">
            <div class="category-info">
                <h5>Dashboard</h5>

            </div>

            <ul class="submenu-list" data-parent-element="#app">

            </ul>


            <?php if ($datasidde['privilege'] === 'Admin' || $datasidde['privilege'] === 'Distributor') { ?>
            <ul class="file-tree submenu-list">
                <li class="file-tree-folder text-white">Admin Dashboard

                    <?php foreach ($sidebaaar_admin as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>

                </li>
                <li class="file-tree-folder text-white">Tracker Dashboard

                    <?php foreach ($sidebaaar as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>

                </li>

                <?php } ?>

                <li class="file-tree-folder text-white">Cartraige Dashboard

                    <?php foreach ($sidebaaar_Cartraige as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                ?>

                <li>
                <li class="file-tree-folder text-white">Depot Trip Dashboard

                    <?php foreach ($sidebaaar_depot_users as $key => $value1) { ?>

                    <ul>
                        <a
                            href="depot_trip_dashboard.php?id=<?php echo $value1['depot_id']; ?>&depot_user_id=<?php echo $value1['id']; ?>"><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                ?>

                </li>

                <?php
                            $trip_url;
                            if ($_SESSION['prive'] != 'Depot') {
                                $trip_url = 'trips_dashboard';
                            } else {
                                $trip_url = 'depot_trip_dashboard';

                            }
                            ?>
                <a href="<?php echo $trip_url; ?>.php?id=<?php echo $sess_id; ?>" class="text-white"><span
                        class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg></span>Trip Dashboard

                </a>
                </li>

                <li class="">
                    <?php
                                $datetime = new DateTime();
                                $datetime->modify('+1 day');
                                // echo $datetime->format('Y-m-d');
                                ?>

                    <a
                        href="sap_dashboard.php?from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Sap Dashboard </a>
                </li>


                <li class="">


                    <a href="integrated_dashboard.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Intransit Dashboard </a>
                </li>


            </ul>


            <!-- <ul class="nested active">
                            <li>
                                <span class="caret caret-down">img</span>
                                <ul class="nested">
                                    <a href="dashboard.html"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> ResQ 911 </a>

                                </ul>
                            </li>
                            
                        </ul> -->


        </div>
        <div class="submenu" id="sap_manual">
            <div class="category-info">
                <h5>Manual Trips</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">


                <li class="">
                    <a href="sap_data.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Upload CSV </a>
                </li>

                <li class="">
                    <a href="sap_upload_dasboard.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Dashboard </a>
                </li>
                <li class="">
                    <a href="fleet/sap_map.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Map </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="live">
            <div class="category-info">
                <h5>Vehicle Tracking</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">
                <!-- <li>
                            <a href="addCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Customers </a>
                        </li> -->
                <li>
                    <a onclick="post_new_data()"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map new</a>
                </li>
                <li>
                    <a href="vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map</a>
                </li>
                <li>
                    <a href="assign_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Assign Vehicles </a>
                </li>
                <li>
                    <a href="manage_geofence.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Geofences </a>

                </li>

                <li>
                    <a href="routes.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Play Back </a>
                </li>
                <!-- <li>
                            <a href="manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Manage Users </a>
                        </li> -->
            </ul>
        </div>

        <div class="submenu" id="trip">
            <div class="category-info">
                <h5>Trips </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#trip">

                <li class="">
                    <a href="starting_trip.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Create Trip </a>
                </li>

                <li class="">
                    <a href="tab_trip.php?date=<?php echo date('Y-m-d'); ?>"><span class="icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>View Trip </a>
                </li>

                <li class="">
                    <a href="reciving_trip.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip Reciving </a>
                </li>
                <li class="">
                    <a href="manage_recivce_list.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Reciving Record</a>
                </li>

                <li>
                    <a href="frightlist.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Fright List </a>
                </li>
                <li>
                    <a href="manage_drivers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Drivers </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="app">
            <div class="category-info">
                <h5>Customers</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">
                <!-- <li>
                            <a href="addCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Customers </a>
                        </li> -->
                <li>
                    <a href="manageCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Admins </a>
                </li>
                <li>
                    <a href="manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Cartraige </a>
                </li>
                <li>
                    <a href="manageapp.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage App Users </a>
                </li>
            </ul>
        </div>

        <div class="submenu" id="users">
            <div class="category-info">
                <h5>Assets</h5>
                <!-- <p>This menu consist of Sub-Sub category.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#users">
                <!-- <li>
                            <a href="addAsset.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Asset </a>
                        </li> -->
                <li>
                    <a href="manageAsset.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Asset </a>
                </li>
                <!-- <li>
                            <a href="assign.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Assign Asset </a>
                        </li> -->
                <!-- <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#starter-kit" aria-expanded="false"><div><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Submenu 3 </div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                            <ul id="starter-kit" class="collapse" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a href="javascript:void(0);"> Sub Submenu 1 </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> Sub Submenu 2 </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> Sub Submenu 2 </a>
                                </li>
                            </ul>
                        </li> -->
            </ul>
        </div>

        <div class="submenu" id="more">
            <div class="category-info">
                <h5>Complains</h5>
                <!-- <p>With starter kit, you can begin your work without any hassle.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#more">
                <!-- <li class="">
                            <a href="addCamplain.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Complain </a>
                        </li> -->
                <li>
                    <a href="manageComplain.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Complain </a>
                </li>
                <!-- <li>
                            <a href="complainTracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Complain Tracking </a>
                        </li> -->
            </ul>
        </div>

        <div class="submenu" id="imei">
            <div class="category-info">
                <h5>Add Tracker</h5>
                <!-- <p>With starter kit, you can begin your work without any hassle.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#imei">
                <!-- <li class="">
                            <a href="imei.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Tracker </a>
                        </li> -->
                <li class="">
                    <a href="manageimei.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Tracker </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="company">
            <div class="category-info">
                <h5>Add Company</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#company">

                <li class="">
                    <a href="managecompany.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Company </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="chat">
            <div class="category-info">
                <h5>Chat</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#chat">
                <li class="">
                    <a href="chat/chat2.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Chat </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="email">
            <div class="category-info">
                <h5>Email</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">

                <li class="">
                    <a href="editmail/index.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Add Email Content </a>
                </li>
                <li class="">
                    <a href="maill.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Send Email </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="excel">
            <div class="category-info">
                <h5>Excel Importor</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#excel">

                <li class="">
                    <a href="excel/index.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Import Excel </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="products">
            <div class="category-info">
                <h5>Manage Products</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#excel">

                <li class="">
                    <a href="manage_accounts_h.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Manage Account </a>
                </li>
                <li class="">
                    <a href="manage_products_h.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Manage Products </a>
                </li>
                <li class="">
                    <a href="manage_family_product_h.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Manage Family Products </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="bill">
            <div class="category-info">
                <h5>Customer Billing </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#bill">

                <li class="">
                    <a href="customerbilling.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Billing Detail </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="trip">
            <div class="category-info">
                <h5>Trips </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#trip">

                <li class="">
                    <a href="trip.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Create Trip </a>
                </li>

                <li class="">
                    <a href="trip_view.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>View Trip </a>
                </li>

                <li class="">
                    <a href="reciving_trip.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip Reciving </a>
                </li>

                <li class="">
                    <a href="manage_recivce_list.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Reciving Record</a>
                </li>
                <li>
                    <a href="frightlist.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Fright List </a>
                </li>

                <li>
                    <a href="without_tracker_car.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Without tracker Vehicle </a>
                </li>
            </ul>
        </div>

        <div class="submenu" id="report">
            <div class="category-info">
                <h5>Reports </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#report">

                <li class="">
                    <a href="current_location.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Current Location </a>
                </li>



            </ul>
        </div>



    </div>

</div>
<?php } elseif ($admin_ka_user === 'karachi_base') { ?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#3e3ea7 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <!-- <img src="images/crm logo 1.png" class="navbar-logo" alt="logo"> -->
                <h3>S</h3>
            </a>
        </div>

        <ul class="menu-categories">
            <li class="menu">
                <a href="#dashboard" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Dashboard</span></div>
            </li>
            <li class="menu">
                <a href="#live" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 512.061 512.061" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m110.034 265.573-77.784-77.784c-20.777-20.777-32.22-48.401-32.22-77.785 0-60.656 49.348-110.004 110.004-110.004 60.657 0 110.004 49.348 110.004 110.004 0 29.384-11.442 57.008-32.22 77.785zm0-235.573c-44.114 0-80.004 35.89-80.004 80.004 0 21.37 8.322 41.461 23.433 56.572l56.571 56.571 56.572-56.571c15.111-15.111 23.433-35.202 23.433-56.572 0-44.114-35.89-80.004-80.005-80.004z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m110.034 160.008c-27.571 0-50.002-22.431-50.002-50.002s22.431-50.002 50.002-50.002 50.002 22.431 50.002 50.002-22.431 50.002-50.002 50.002zm0-70.004c-11.029 0-20.002 8.973-20.002 20.002s8.973 20.002 20.002 20.002 20.002-8.973 20.002-20.002-8.973-20.002-20.002-20.002z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m432.026 512.061-56.573-56.571c-15.109-15.111-23.431-35.202-23.431-56.572 0-44.114 35.89-80.004 80.004-80.004s80.004 35.89 80.004 80.004c0 21.369-8.321 41.46-23.432 56.572zm-35.359-77.785 35.359 35.358 35.358-35.358c9.444-9.445 14.646-22.003 14.646-35.359 0-27.572-22.432-50.004-50.004-50.004s-50.004 22.432-50.004 50.004c0 13.357 5.202 25.915 14.645 35.359z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m359.031 512h-167.453c-53.234 0-96.543-43.309-96.543-96.543s43.309-96.544 96.543-96.544h55.664c16.419 0 29.776-13.357 29.776-29.776s-13.357-29.776-29.776-29.776h-58.202v-30h58.202c32.961 0 59.776 26.815 59.776 59.776s-26.815 59.776-59.776 59.776h-55.664c-36.692 0-66.543 29.851-66.543 66.543s29.85 66.544 66.543 66.544h167.454v30z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Vehicle Tracking</span></div>
            </li>



        </ul>



    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="theme-brand-name">
            <!-- <a href="index.php"><img src="images/crm logo 1 inverse.png" alt="" srcset="" style="width:180px"></a> -->
            <h1 style="font-weight: bold;color: #fff;font-style: italic;font-weight: bold;text-align:center">SITARA</h1>
        </div>

        <div class="submenu" id="dashboard">
            <div class="category-info">
                <h5>Dashboard</h5>

            </div>




            <?php
                        $datetime = new DateTime();
                        $datetime->modify('+1 day');
                        // echo $datetime->format('Y-m-d');
                        ?>


            <a href="dev_dashboard_apis.php?id=<?php echo $sess_id; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>"
                class="text-white"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg></span>Dashboard

            </a>












        </div>


        <div class="submenu" id="live">
            <div class="category-info">
                <h5>Vehicle Tracking</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">
                <!-- <li>
                            <a href="addCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Customers </a>
                        </li> -->
                <li>
                    <a onclick="post_new_data()"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map new</a>
                </li>
                <li>
                    <a href="vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map</a>
                </li>
                <!-- <li>
                                <a href="assign_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                        </svg></span> Assign Vehicles </a>
                            </li> -->
                <!-- <li>
                                <a href="manage_geofence.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                        </svg></span> Manage Geofences </a>

                            </li> -->

                <li>
                    <a href="routes.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Play Back </a>
                </li>
                <!-- <li>
                            <a href="manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Manage Users </a>
                        </li> -->
            </ul>
        </div>




    </div>

</div>

<?php } elseif ($admin_ka_user === 'dashboard') { ?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#3e3ea7 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <!-- <img src="images/crm logo 1.png" class="navbar-logo" alt="logo"> -->
                <h3>S</h3>
            </a>
        </div>

        <ul class="menu-categories">
            <li class="menu">
                <a href="#dashboard" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Dashboard</span></div>
            </li>
            <li class="menu">
                <a href="#live" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 512.061 512.061" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m110.034 265.573-77.784-77.784c-20.777-20.777-32.22-48.401-32.22-77.785 0-60.656 49.348-110.004 110.004-110.004 60.657 0 110.004 49.348 110.004 110.004 0 29.384-11.442 57.008-32.22 77.785zm0-235.573c-44.114 0-80.004 35.89-80.004 80.004 0 21.37 8.322 41.461 23.433 56.572l56.571 56.571 56.572-56.571c15.111-15.111 23.433-35.202 23.433-56.572 0-44.114-35.89-80.004-80.005-80.004z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m110.034 160.008c-27.571 0-50.002-22.431-50.002-50.002s22.431-50.002 50.002-50.002 50.002 22.431 50.002 50.002-22.431 50.002-50.002 50.002zm0-70.004c-11.029 0-20.002 8.973-20.002 20.002s8.973 20.002 20.002 20.002 20.002-8.973 20.002-20.002-8.973-20.002-20.002-20.002z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m432.026 512.061-56.573-56.571c-15.109-15.111-23.431-35.202-23.431-56.572 0-44.114 35.89-80.004 80.004-80.004s80.004 35.89 80.004 80.004c0 21.369-8.321 41.46-23.432 56.572zm-35.359-77.785 35.359 35.358 35.358-35.358c9.444-9.445 14.646-22.003 14.646-35.359 0-27.572-22.432-50.004-50.004-50.004s-50.004 22.432-50.004 50.004c0 13.357 5.202 25.915 14.645 35.359z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m359.031 512h-167.453c-53.234 0-96.543-43.309-96.543-96.543s43.309-96.544 96.543-96.544h55.664c16.419 0 29.776-13.357 29.776-29.776s-13.357-29.776-29.776-29.776h-58.202v-30h58.202c32.961 0 59.776 26.815 59.776 59.776s-26.815 59.776-59.776 59.776h-55.664c-36.692 0-66.543 29.851-66.543 66.543s29.85 66.544 66.543 66.544h167.454v30z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Vehicle Tracking</span></div>
            </li>



        </ul>



    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="theme-brand-name">
            <!-- <a href="index.php"><img src="images/crm logo 1 inverse.png" alt="" srcset="" style="width:180px"></a> -->
            <h1 style="font-weight: bold;color: #fff;font-style: italic;font-weight: bold;text-align:center">SITARA</h1>
        </div>

        <div class="submenu" id="dashboard">
            <div class="category-info">
                <h5>Dashboard</h5>

            </div>




            <?php
            $datetime = new DateTime();
            $datetime->modify('+1 day');
            // echo $datetime->format('Y-m-d');
            ?>


            <a href="dev_dashboard_apis.php?id=<?php echo $sess_id; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>"
                class="text-white"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg></span>Dashboard

            </a>












        </div>


        <div class="submenu" id="live">
            <div class="category-info">
                <h5>Vehicle Tracking</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">
                <!-- <li>
                <a href="addCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Add Customers </a>
            </li> -->
                <li>
                    <a onclick="post_new_data()"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map new</a>
                </li>
                <li>
                    <a href="vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map</a>
                </li>
                <!-- <li>
                    <a href="assign_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Assign Vehicles </a>
                </li> -->
                <!-- <li>
                    <a href="manage_geofence.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Geofences </a>

                </li> -->

                <li>
                    <a href="routes.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Play Back </a>
                </li>
                <!-- <li>
                <a href="manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Manage Users </a>
            </li> -->
            </ul>
        </div>




    </div>

</div>

<?php }
elseif ($admin_ka_user === 'Integrated') { ?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#3e3ea7 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <!-- <img src="images/crm logo 1.png" class="navbar-logo" alt="logo"> -->
                <h3>S</h3>
            </a>
        </div>

        <ul class="menu-categories">
            <li class="menu ">
                <a href="#sap_manual" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-image">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Sap Manual Trips</span></div>
            </li>


        </ul>



    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="submenu" id="sap_manual">
            <div class="category-info">
                <h5>Manual Trips</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">




                <li class="">
                    <a href="sap_upload_dasboard.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Dashboard </a>
                </li>
                <li class="">
                    <a href="fleet/sap_map.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Map </a>
                </li>

            </ul>
        </div>



    </div>

</div>
<?php } else { ?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#3e3ea7 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <!-- <img src="images/crm logo 1.png" class="navbar-logo" alt="logo"> -->
                <h3>S</h3>
            </a>
        </div>

        <ul class="menu-categories">
            <li class="menu">
                <a href="#dashboard" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Dashboard</span></div>
            </li>
            <li class="menu">
                <a href="#live" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 512.061 512.061" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m110.034 265.573-77.784-77.784c-20.777-20.777-32.22-48.401-32.22-77.785 0-60.656 49.348-110.004 110.004-110.004 60.657 0 110.004 49.348 110.004 110.004 0 29.384-11.442 57.008-32.22 77.785zm0-235.573c-44.114 0-80.004 35.89-80.004 80.004 0 21.37 8.322 41.461 23.433 56.572l56.571 56.571 56.572-56.571c15.111-15.111 23.433-35.202 23.433-56.572 0-44.114-35.89-80.004-80.005-80.004z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m110.034 160.008c-27.571 0-50.002-22.431-50.002-50.002s22.431-50.002 50.002-50.002 50.002 22.431 50.002 50.002-22.431 50.002-50.002 50.002zm0-70.004c-11.029 0-20.002 8.973-20.002 20.002s8.973 20.002 20.002 20.002 20.002-8.973 20.002-20.002-8.973-20.002-20.002-20.002z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m432.026 512.061-56.573-56.571c-15.109-15.111-23.431-35.202-23.431-56.572 0-44.114 35.89-80.004 80.004-80.004s80.004 35.89 80.004 80.004c0 21.369-8.321 41.46-23.432 56.572zm-35.359-77.785 35.359 35.358 35.358-35.358c9.444-9.445 14.646-22.003 14.646-35.359 0-27.572-22.432-50.004-50.004-50.004s-50.004 22.432-50.004 50.004c0 13.357 5.202 25.915 14.645 35.359z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                        <g>
                                            <path
                                                d="m359.031 512h-167.453c-53.234 0-96.543-43.309-96.543-96.543s43.309-96.544 96.543-96.544h55.664c16.419 0 29.776-13.357 29.776-29.776s-13.357-29.776-29.776-29.776h-58.202v-30h58.202c32.961 0 59.776 26.815 59.776 59.776s-26.815 59.776-59.776 59.776h-55.664c-36.692 0-66.543 29.851-66.543 66.543s29.85 66.544 66.543 66.544h167.454v30z"
                                                fill="#ffffff" data-original="#000000" style="" class="" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Vehicle Tracking</span></div>
            </li>

            <li class="menu">
                <a href="#app" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Customers</span></div>
            </li>

            <li class="menu">
                <a href="#users" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Assets</span></div>
            </li>



            <li class="menu ">
                <a href="#email" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="far fa-envelope-open"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Email</span></div>
            </li>

            <li class="menu ">
                <a href="#excel" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                <g>
                                    <path xmlns="http://www.w3.org/2000/svg"
                                        d="M349.657,18.343A8,8,0,0,0,344,16H120A56.064,56.064,0,0,0,64,72V440a56.064,56.064,0,0,0,56,56H392a56.064,56.064,0,0,0,56-56V120a8,8,0,0,0-2.343-5.657ZM352,43.313,420.687,112H392a40.045,40.045,0,0,1-40-40ZM120,32H336V72a56.064,56.064,0,0,0,56,56h40V352H80V72A40.045,40.045,0,0,1,120,32ZM392,480H120a40.045,40.045,0,0,1-40-40V368H432v72A40.045,40.045,0,0,1,392,480Z"
                                        fill="#ffffff" data-original="#000000" style="" />
                                    <path xmlns="http://www.w3.org/2000/svg"
                                        d="M272,448H248V392a8,8,0,0,0-16,0v64a8,8,0,0,0,8,8h32a8,8,0,0,0,0-16Z"
                                        fill="#ffffff" data-original="#000000" style="" />
                                    <path xmlns="http://www.w3.org/2000/svg"
                                        d="M211.578,384.845a8,8,0,0,0-10.733,3.577L192,406.112l-8.845-17.69a8,8,0,0,0-14.31,7.156L183.056,424l-14.211,28.422a8,8,0,1,0,14.31,7.156L192,441.888l8.845,17.69a8,8,0,1,0,14.31-7.156L200.944,424l14.211-28.422A8,8,0,0,0,211.578,384.845Z"
                                        fill="#ffffff" data-original="#000000" style="" />
                                    <path xmlns="http://www.w3.org/2000/svg"
                                        d="M320,400h16a8,8,0,0,0,0-16H320a24,24,0,0,0,0,48,8,8,0,0,1,0,16H304a8,8,0,0,0,0,16h16a24,24,0,0,0,0-48,8,8,0,0,1,0-16Z"
                                        fill="#ffffff" data-original="#000000" style="" />
                                    <path xmlns="http://www.w3.org/2000/svg"
                                        d="M136,304H376a8,8,0,0,0,8-8V152a8,8,0,0,0-8-8H136a8,8,0,0,0-8,8V296A8,8,0,0,0,136,304Zm8-48h64v32H144Zm144-48v32H224V208Zm-64-16V160h64v32Zm80,16h64v32H304Zm-16,48v32H224V256Zm-80-16H144V208h64Zm96,48V256h64v32Zm64-96H304V160h64ZM208,160v32H144V160Z"
                                        fill="#ffffff" data-original="#000000" style="" />
                                </g>
                            </svg>

                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Excel importer</span></div>
            </li>

            <li class="menu ">
                <a href="#trip" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-atlas"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Trip</span></div>
            </li>
            <li class="menu ">
                <a href="#report" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="far fa-file-excel"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Reports</span></div>
            </li>

            <li class="menu ">
                <a href="#alert" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Alert</span></div>
            </li>
            <li class="menu ">
                <a href="#alert_email" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Email Alerts</span></div>
            </li>
            <li class="menu ">
                <a href="#sap_manual" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-image">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Sap Manual Trips</span></div>
            </li>
        </ul>


    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="theme-brand-name">
            <!-- <a href="index.php"><img src="images/crm logo 1 inverse.png" alt="" srcset="" style="width:180px"></a> -->
            <h1 style="font-weight: bold;color: #fff;font-style: italic;font-weight: bold;text-align:center">SITARA</h1>
        </div>

        <div class="submenu" id="dashboard">
            <div class="category-info">
                <h5>Dashboard</h5>

            </div>

            <ul class="submenu-list" data-parent-element="#app">

            </ul>


            <?php if ($datasidde['privilege'] === 'Admin' || $datasidde['privilege'] === 'Distributor') { ?>
            <ul class="file-tree submenu-list">
                <li class="file-tree-folder text-white">Admin Dashboard

                    <?php foreach ($sidebaaar_admin as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>

                </li>
                <li class="file-tree-folder text-white">Dashboard New

                    <?php foreach ($sidebaaar_admin as $key => $value1) {
                                                if ($datasidde['privilege'] === 'Depot') {

                                                    $cid = 1;
                                                } else {
                                                    $cid = $value1['id'];

                                                }
                                                ?>

                    <ul>
                        <a
                            href="dev_dashboard_apis.php?id=<?php echo $cid; ?>&from=<?php echo $current_date; ?>&to=<?php echo $next_dat; ?>"><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>

                    </ul>
                    <?php }
                                            ?>
                    <ul>
                        <a
                            href="dev_dashboard_apis.php?id=433&from=<?php echo $current_date; ?>&to=<?php echo $next_dat; ?>"><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> Karachi base

                        </a>

                    </ul>



                <li>

                <li class="file-tree-folder text-white"> GO Track Tls Dashboard New




                    <ul>
                        <a
                            href="dev_dashboard_apis.php?id=504&from=<?php echo $current_date; ?>&to=<?php echo $next_dat; ?>"><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> GO Track Tls

                        </a>

                        <a onclick="post_new_data_go()"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> Track Map new</a>

                    </ul>

                <li></li>

                <li class="file-tree-folder text-white">Tracker Dashboard

                    <?php foreach ($sidebaaar as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>

                </li>
                <li class="file-tree-folder text-white">Cartraige Dashboard

                    <?php foreach ($sidebaaar_Cartraige as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>
                </li>
                <li class="file-tree-folder text-white">Depot Trip Dashboard

                    <?php foreach ($sidebaaar_depot_users as $key => $value1) { ?>

                    <ul>
                        <a
                            href="depot_trip_dashboard.php?id=<?php echo $value1['depot_id']; ?>&depot_user_id=<?php echo $value1['id']; ?>"><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>


                    <?php } ?>
                    <?php if ($datasidde['privilege'] === 'End-User') { ?>
                <li class="file-tree-folder text-white">End-User Dashboard

                    <?php foreach ($sidebaaar_admin as $key => $value1) { ?>

                    <ul>
                        <a href="dashboard.php?id=<?php echo $value1['id']; ?>" class='text-light'><span
                                class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value1['name']; ?>

                        </a>


                    </ul>
                    <?php }
                                            ?>

                </li>
                <?php } ?>


                <li>

                    <?php
                                $trip_url;
                                if ($_SESSION['prive'] != 'Depot') {
                                    $trip_url = 'trips_dashboard';
                                } else {
                                    $trip_url = 'depot_trip_dashboard';

                                }
                                ?>
                    <a href="<?php echo $trip_url; ?>.php?id=<?php echo $sess_id; ?>" class='text-light'><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip Dashboard

                    </a>
                </li>

                <li class="">
                    <?php
                                $datetime = new DateTime();
                                $datetime->modify('+1 day');
                                // echo $datetime->format('Y-m-d');
                                ?>

                    <a
                        href="sap_dashboard.php?from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>"><span
                            class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Sap Dashboard </a>
                </li>


                <li class="">


                    <a href="integrated_dashboard.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Intransit Dashboard </a>
                </li>

                </li>

            </ul>





        </div>

        <div class="submenu" id="live">
            <div class="category-info">
                <h5>Vehicle Tracking</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">

                <!-- <li>
                    <a href="vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map </a>
                </li> -->
                <li>
                    <a onclick="post_new_data()"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map new</a>
                </li>
                <li>
                    <a href="vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Track Map</a>
                </li>
                <li>
                    <a href="sap_vehi_tracking.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Sap Track Map </a>
                </li>

                <li>
                    <a href="manage_geofence.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Geofences </a>

                </li>
                <li>
                    <a href="manage_black_spote.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Black Spote </a>

                </li>

                <li>
                    <a href="routes.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Play Back </a>
                </li>

                <li>
                    <a href="geo_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Fence Detail</a>
                </li>
                <li>
                    <a href="depo_fence_detail.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Depot Fence Detail</a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="app">
            <div class="category-info">
                <h5>Customers</h5>
                <!-- <p>This menu consist of Same Icons.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#app">
                <li>
                    <a href="manage_web_user.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Web Users </a>
                </li>
                <li>
                    <a href="manageCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Admins </a>
                </li>
                <li>
                    <a href="manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Cartraige </a>
                </li>
                <li>
                    <a href="karachi_base_users.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Karachi Base Users </a>
                </li>
                <li>
                    <a href="manageapp.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage App Users </a>
                </li>
                <li>
                    <!-- manage_depot_users.php -->
                    <a href="manage_depot_users.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Depot Users </a>
                </li>
                <li>
                    <!-- manage_depot_users.php -->
                    <a href="driver_training.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Driver Training </a>
                </li>
            </ul>
        </div>

        <div class="submenu" id="users">
            <div class="category-info">
                <h5>Assets</h5>
                <!-- <p>This menu consist of Sub-Sub category.</p> -->
            </div>
            <ul class="submenu-list" data-parent-element="#users">

                <li>
                    <a href="manageAsset.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage In-list vehicles </a>
                </li>

                <li>
                    <a href="manage_devices.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage vehicles </a>
                </li>
                <li>
                    <a href="assign_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Assign Vehicles </a>
                </li>
                <li>
                    <a href="device_update.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage devices Name </a>
                </li>
                <li>
                    <a href="frightlist.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Fright List </a>
                </li>
                <li>
                    <a href="sap_forced.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> SAP Forced Close </a>
                </li>

            </ul>
        </div>







        <div class="submenu" id="email">
            <div class="category-info">
                <h5>Email</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">


                <li class="">
                    <a href="report_mail.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Schedule Email </a>
                </li>

                <li class="">
                    <a href="cartraige_report_mail.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Cartraige Schedule Email </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="sap_manual">
            <div class="category-info">
                <h5>Manual Trips</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">


                <li class="">
                    <a href="sap_data.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Upload CSV </a>
                </li>

                <li class="">
                    <a href="sap_upload_dasboard.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Dashboard </a>
                </li>
                <li class="">
                    <a href="fleet/sap_map.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Map </a>
                </li>

            </ul>
        </div>
        <div class="submenu" id="excel">
            <div class="category-info">
                <h5>Excel Importor</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#excel">

                <li class="">
                    <a href="excel/index.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Import Excel </a>
                </li>

                <li class="">
                    <a href="excel/add_fleed.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Fright Excel Import </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="alert">
            <div class="category-info">
                <h5>Alert</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">

                <li class="">
                    <a href="alert_checker.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Security Alert</a>
                </li>
                <!-- <li class="">
                    <a href="maill.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Send Email </a>
                </li> -->

            </ul>
        </div>



        <div class="submenu" id="trip">
            <div class="category-info">
                <h5>Trips </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#trip">

                <li class="">
                    <!-- starting_trip.php  old link-->
                    <a href="create_trip.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Create Trip </a>
                </li>

                <li class="">

                    <a href="tab_trip.php?date=<?php echo date('Y-m-d'); ?>"><span class="icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>View Trip </a>
                </li>

                <li class="">
                    <!-- reciving_trip.php  old link-->

                    <a href="create_reciving.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip Reciving </a>
                </li>

                <li class="">
                    <!-- manage_recivce_list.php  old link-->

                    <a href="create_reciving_list.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Reciving Record</a>
                </li>
                <li>
                    <a href="manage_drivers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Drivers </a>
                </li>
                <li>
                    <a href="without_tracker_car.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Without tracker Vehicle </a>
                </li>


            </ul>
        </div>

        <div class="submenu" id="report">
            <div class="category-info">
                <h5>Reports </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#report">

                <li class="">
                    <a href="current_location.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Current Location </a>
                </li>

                <li class="">
                    <a href="history_of_vehicle.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>History Report </a>
                </li>
                <li class="">
                    <a href="blackspot_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Black Spot Report </a>
                </li>
                <li class="">
                    <a href="overspeed_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Overspeed Report </a>
                </li>
                <li class="">
                    <a href="nr_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>NR Report </a>
                </li>
                <li class="">
                    <a href="trip_start_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip start SMS Report </a>
                </li>
                <li class="">
                    <a href="trip_close_report.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Trip close SMS Report </a>
                </li>

                <li class="">
                    <a href="night_violation.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Night Violation Report </a>
                </li>
                <li class="">
                    <a href="not_reciving.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Not Reciving Trips </a>
                </li>
                <li class="">
                    <a href="check_alerts_with_map.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Alerts Map </a>
                </li>

                <li class="">
                    <a href="overspeed_report_new.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Overspeed History Report </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="alert">
            <div class="category-info">
                <h5>Alert</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">

                <li class="">
                    <a href="time_checker.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Security Alert</a>
                </li>


            </ul>
        </div>
        <div class="submenu" id="alert_email">
            <div class="category-info">
                <h5>Email Alerts</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#email">

                <!-- <li class=""> -->
                <!-- <a href="email_overspeed.php?date=<?php echo date('Y-m-d') ?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Overspeed</a> -->
                <ul class="file-tree submenu-list">
                    <li class="file-tree-folder text-white"> Overspeed

                        <?php foreach ($sidebaaar_Cartraige as $key => $value1) {
                                        $datetime = new DateTime();
                                        $datetime->modify('+1 day');
                                        ?>

                        <ul>
                            <a
                                href="email_overspeed.php?id=<?php echo $value1['id']; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $value1['name'] ?>"><span
                                    class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg></span> <?= $value1['name']; ?>

                            </a>


                        </ul>
                        <?php }
                                    ?>
                    </li>

                    <li class="file-tree-folder text-white"> Excess Driving

                        <?php foreach ($sidebaaar_Cartraige as $key => $value1) {
                                        $datetime = new DateTime();
                                        $datetime->modify('+1 day');
                                        ?>

                        <ul>
                            <a
                                href="email_excess_driving.php?id=<?php echo $value1['id']; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $value1['name'] ?>"><span
                                    class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg></span> <?= $value1['name']; ?>

                            </a>


                        </ul>
                        <?php }
                                    ?>
                    </li>
                    <li class="file-tree-folder text-white"> NR

                        <?php foreach ($sidebaaar_Cartraige as $key => $value1) {
                                        $datetime = new DateTime();
                                        $datetime->modify('+1 day');
                                        ?>

                        <ul>
                            <a
                                href="email_nr.php?id=<?php echo $value1['id']; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $value1['name'] ?>"><span
                                    class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg></span> <?= $value1['name']; ?>

                            </a>


                        </ul>
                        <?php }
                                    ?>
                    </li>
                    <li class="file-tree-folder text-white"> Night Voilation

                        <?php foreach ($sidebaaar_Cartraige as $key => $value1) {
                                        $datetime = new DateTime();
                                        $datetime->modify('+1 day');
                                        ?>

                        <ul>
                            <a
                                href="email_nighr_voilation.php?id=<?php echo $value1['id']; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $value1['name'] ?>"><span
                                    class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg></span> <?= $value1['name']; ?>

                            </a>


                        </ul>
                        <?php }
                                    ?>
                    </li>
                    <li class="file-tree-folder text-white"> Black Spot

                        <?php foreach ($sidebaaar_Cartraige as $key => $value1) {
                                        $datetime = new DateTime();
                                        $datetime->modify('+1 day');
                                        ?>

                        <ul>
                            <a
                                href="email_blackspot.php?id=<?php echo $value1['id']; ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo $datetime->format('Y-m-d'); ?>&name=<?php echo $value1['name'] ?>"><span
                                    class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg></span> <?= $value1['name']; ?>

                            </a>


                        </ul>
                        <?php }
                                    ?>
                    </li>
                </ul>
                <!-- </li> -->



            </ul>
        </div>

    </div>

</div>
<?php } ?>

<script>
function post_new_data() {
    var user_id = "<?php echo $sess_id; ?>";
    // alert(user_id)
    var pre = "<?php echo $admin_ka_user; ?>";
    var u_name = "<?php echo $_SESSION['username']; ?>";

    localStorage.setItem("user_id", user_id);
    localStorage.setItem("prev", pre);
    localStorage.setItem("name", u_name);
    window.open('fleet/maps-google.php', '_blank');
}

function post_new_data_go() {
    var user_id = 504;
    // alert(user_id)
    var pre = "dashboard";
    var u_name = "GO Track Tls";

    localStorage.setItem("user_id", user_id);
    localStorage.setItem("prev", pre);
    localStorage.setItem("name", u_name);
    window.open('fleet/maps-google.php', '_blank');
}
</script>