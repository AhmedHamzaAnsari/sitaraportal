<?php
// require_once "config_tc.php";
                                
$tree = "SELECT * from company";
$sidebaaar = mysqli_query($db, $tree);
?>
<link href="../assets/css/elements/custom-tree_view.css" rel="stylesheet" type="text/css" />
<script src="../plugins/treeview/custom-jstree.js"></script>
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
</style>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar" style="background-color:#f47621 !important">

        <div class="theme-logo" style=" background-color: #fff;">
            <a href="#index.php">
                <img src="../images/crm logo 1.png" class="navbar-logo" alt="logo">
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
                <a href="#more" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-message-circle">
                                <path
                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Complain</span></div>
            </li>
            <li class="menu ">
                <a href="#imei" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-crosshair">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="22" y1="12" x2="18" y2="12"></line>
                                <line x1="6" y1="12" x2="2" y2="12"></line>
                                <line x1="12" y1="6" x2="12" y2="2"></line>
                                <line x1="12" y1="22" x2="12" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Tracker</span></div>
            </li>
            <li class="menu ">
                <a href="#company" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="far fa-building"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Company</span></div>
            </li>

            <li class="menu ">
                <a href="#chat" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="far fa-comment-alt"></i>
                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Chat</span></div>
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
                <a href="#bill" data-active="false" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                                viewBox="0 0 480 480" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M448,100h-64V36c0-17.673-14.327-32-32-32H64C46.327,4,32,18.327,32,36v384H8c-4.418,0-8,3.582-8,8v16    c0,17.673,14.327,32,32,32h272c17.673,0,32-14.327,32-32v-88h64c17.673,0,32-14.327,32-32v-72h40c4.418,0,8-3.582,8-8V132    C480,114.327,465.673,100,448,100z M32,460c-8.837,0-16-7.163-16-16v-8h256v8c-0.009,5.619,1.474,11.141,4.296,16H32z M320,36v408    c0,8.837-7.163,16-16,16s-16-7.163-16-16v-16c0-4.418-3.582-8-8-8H48V36c0-8.837,7.163-16,16-16h260.448    C321.569,24.843,320.033,30.366,320,36z M336,340V36c0-8.837,7.163-16,16-16s16,7.163,16,16v288    c0.033,5.634,1.569,11.157,4.448,16H336z M416,132v192c0,8.837-7.163,16-16,16s-16-7.163-16-16V116h36.448    C417.569,120.843,416.033,126.366,416,132z M464,236h-32V132c0-8.837,7.163-16,16-16s16,7.163,16,16V236z"
                                                fill="#ffffff" data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="80" y="220" width="184" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="128" y="188" width="168" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M206.968,110.357c-1.844-5.929-6.032-10.847-11.592-13.613l-15.592-7.8c-3.376-1.686-4.745-5.789-3.059-9.165    c1.156-2.314,3.52-3.777,6.107-3.779h2.336c3.771,0.004,6.828,3.061,6.832,6.832V84h16v-1.168c-0.037-9.94-6.511-18.71-16-21.672    V52h-16v9.16c-11.999,3.732-18.7,16.484-14.968,28.483c1.844,5.929,6.032,10.847,11.592,13.613l15.592,7.8    c3.376,1.686,4.745,5.789,3.059,9.165c-1.156,2.314-3.52,3.777-6.107,3.779h-2.336c-3.771-0.004-6.828-3.061-6.832-6.832V116h-16    v1.168c0.037,9.94,6.511,18.71,16,21.672V148h16v-9.16C203.999,135.108,210.7,122.356,206.968,110.357z"
                                                fill="#ffffff" data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="96" y="188" width="16" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="80" y="292" width="184" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="128" y="260" width="168" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="96" y="260" width="16" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="80" y="364" width="184" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="128" y="332" width="168" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect x="96" y="332" width="16" height="16" fill="#ffffff"
                                                data-original="#000000" style="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                </g>
                            </svg>


                        </div>
                    </div>
                </a>
                <div class="tooltip"><span>Customer Billing Detail</span></div>
            </li>
        </ul>

        <!-- <div class="external-links">
                    <a href="https://designreset.com/cork/documentation/index.html" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                        <div class="tooltip"><span>Documentation</span></div>
                    </a>
                </div> -->
    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar" style="background-color:#1b1650 !important">

        <div class="theme-brand-name">
            <a href="../index.php"><img src="../images/crm logo 1 inverse.png" alt="" srcset="" style="width:180px"></a>
        </div>

        <div class="submenu" id="dashboard">
            <div class="category-info">
                <h5>Dashboard</h5>

            </div>



            <ul class="file-tree submenu-list">
                <li class="file-tree-folder text-white">Companies

                    <?php foreach($sidebaaar as $key => $value){ ?>

                    <ul>
                        <a href="../dashboard.php?id=<?php echo $value['id']; ?>"><span class="icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg></span> <?= $value['name']; ?></a>
                    </ul>
                    <?php } 
                            ?>

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
                    <a href="../vehicleinfo.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Vehicles </a>
                </li>
                <!-- <li>
                            <a href="manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Manage Users </a>
                        </li> -->
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
                    <a href="../manageCustomer.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Customers </a>
                </li>
                <li>
                    <a href="../manageusers.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Manage Users </a>
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
                    <a href="../manageAsset.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
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
                    <a href="../manageComplain.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
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
                    <a href="../manageimei.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
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
                    <a href="../managecompany.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
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
                    <a href="../chat/index.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
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
                    <a href="../editmail/index.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Add Email Content </a>
                </li>
                <li class="">
                    <a href="../maill.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Send Email </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="excel">
            <div class="category-info">
                <h5>Email</h5>

            </div>
            <ul class="submenu-list" data-parent-element="#excel">

                <li class="">
                    <a href="../excel/index.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Import Excel </a>
                </li>

            </ul>
        </div>

        <div class="submenu" id="bill">
            <div class="category-info">
                <h5>Customer Billing </h5>

            </div>
            <ul class="submenu-list" data-parent-element="#bill">

                <li class="">
                    <a href="../customerbilling.php"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span>Billing Detail </a>
                </li>

            </ul>
        </div>


    </div>

</div>