<?php

session_start();
if ($_SESSION['access_type_id'] != 1) {
    header('Location: ../adminPage/controls/logout.php');
} else if ($_SESSION['onli'] != 1) {
    header('Location: ../adminPage/controls/logout.php');
}
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/innoland.png" alt="">
            <span style="color:azure;" class="d-none d-lg-block">Administrator</span>
        </a>
        <i style="color: whitesmoke;" class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input style="color: #7a7c7f;" type="text" class="search-input" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i style="color: #b0b3b8;" class="bi bi-search"></i></button>
        </form>
    </div> -->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-check"></i>
                    <span id="profile" class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a id="setting" class=" dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#settingmodal" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a id="setting" class="logout dropdown-item d-flex align-items-center" href="../adminPage/controls/logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->




<!-- Modal -->
<div class="modal fade" id="settingmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Account Settings</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label>Name:</label>
                    <div>
                        <input type="text" class="form-control" id="upd-id" value="<?php echo $_SESSION['id'] ?>" hidden>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>">
                    </div>

                    <label>Username:</label>
                    <div>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>">
                    </div>

                    <label>Password:</label>
                    <div>
                        <input type="password" id="password" class="form-control">
                    </div>

                    <label>Re-type Password:</label>
                    <div>
                        <input type="password" id="retype_password" class="form-control">
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="update()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="user_current_pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>Congratulation, your password has been successfully updated. You need to login again to complete the process <a style="color: red;" href="../adminPage/controls/logout.php">Click here</a> to continue.</center>
            </div>
            <div class="modal-footer">
                <a href="../adminPage/controls/logout.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">LOGOUT</button></a>
            </div>
        </div>
    </div>
</div>