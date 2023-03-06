<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innogroup</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/php-email-form/validate.js" rel="stylesheet">
    <link href="assets/vendor/bootstrap/js/bootstrap.bundle.js" rel="stylesheet">


    <link href="assets/css/lightbg.css" rel="stylesheet">
    <!-- Section: Design Block -->
    <style>
        .background-radial-gradient {
            background-color: hsl(175, 90%, 59%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(180, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(hsl(180, 41%, 45%) 15%, hsl(180, 41%, 45%) 15%);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(hsl(180, 41%, 45%) 15%, hsl(180, 41%, 45%) 15%);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
            border-color: azure;
        }

        .animate {
            margin-left: 90px;
        }

        .form {
            margin-bottom: 100vh;
        }
    </style>
</head>

<body>
    <section class="background-radial-gradient overflow-hidden p-0 " style="height: 100vh;">
        <div class="container px-4 py-2 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-6 mb-lg-0">
                    <h1 class="text-white">Innogroup</h1>
                </div>
                <div class="col-lg-6 mb-6 mb-lg-0 ">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card background-radial-gradient ">
                        <div class="logo">
                            <center><img src="assets/img/innoland.png" class="mt-5"></center>
                        </div>
                        <div class="card-body px-4 py-5 px-md-5">
                            <form style="position:relative;">

                                <!-- Username input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="username" class="form-control" />
                                    <label class="form-label text-white">Username</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control" />
                                    <label class="form-label text-white">Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" id="btn_login" class="btn btn-outline-info btn-block mb-4">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Section: Design Block -->


    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="dist/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>



    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function() {

            $('#btn_login').on('click', function(e) {
                e.preventDefault();
                const username = $('#username').val();
                const password = $('#password').val();
                const mydata = 'username=' + username + '&password=' + password;
                $.ajax({
                    type: 'POST',
                    url: 'controls/login.php',
                    data: mydata,

                    success: function(response) {
                        if (response > 0) {
                            alert('Login Successfully');
                            window.location = 'controls/check_if_exist.php';
                        } else {
                            alert('Login failed');
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>