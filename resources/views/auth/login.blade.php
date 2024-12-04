<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quantum Able Bootstrap 4 Admin Dashboard Template</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->


    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="codedthemes">
    <meta name="keywords"
        content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--ico Fonts-->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- waves css -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/Waves/waves.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color" />

</head>

<body>
    <section class="login p-fixed d-flex bg-primary common-img-bg text-center">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12">
                    <div class="login-card card-block">
                        <form class="md-float-material" id="login" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="text-center">
                                <img src="assets/images/logo-black.png" alt="logo">
                            </div>
                            <h3 class="txt-primary text-center">
                                Sign In to your account
                            </h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-input-wrapper">
                                        <input type="email" class="md-form-control" name="email"
                                            required="required" />
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="md-input-wrapper">
                                        <input type="password" class="md-form-control" name="password"
                                            required="required" />
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
                                        <label class="input-checkbox checkbox-primary">
                                            <input type="checkbox" id="checkbox">
                                            <span class="checkbox"></span>
                                        </label>
                                        <div class="captions">Remember Me</div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                    <a href="/forgot-password" class="f-w-600 text-right"> Forget Password?</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-10 offset-xs-1">
                                    <button type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect m-b-20 text-center">LOGIN</button>
                                </div>
                            </div>
                            <!-- <div class="card-footer"> -->
                            <div class="col-sm-12 col-xs-12 text-center">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="/register" class="f-w-600 p-l-5">Sign up Now</a>
                            </div>

                            <!-- </div> -->
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- end of login-card -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jqurey -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

    <!-- Required Fremwork -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- waves effects.js -->
    <script src="assets/plugins/Waves/waves.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/pages/elements.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#login').on('submit', function(event) {
                event.preventDefault(); // Cegah form submit langsung
                var form = $(this);

                // Menonaktifkan tombol submit untuk mencegah multiple click
                form.find('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: form.attr('action'), // Ambil URL dari atribut action form
                    method: form.attr('method'), // Ambil metode dari atribut method form
                    data: form.serialize(), // Kirim semua data form yang telah di-serialize
                    success: function(response) {
                        // Jika login berhasil
                        Swal.fire({
                            title: 'Success',
                            text: response.success,
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = response
                            .redirect; // Redirect setelah success
                        });
                    },
                    error: function(xhr) {
                        // Tangani error dari response JSON Laravel
                        var errors = xhr.responseJSON?.errors || ['Unknown error occurred.'];
                        var errorMessage = '';

                        if (Array.isArray(errors)) {
                            // Jika errors berupa array
                            errors.forEach(function(message) {
                                errorMessage += message + '<br>';
                            });
                        } else {
                            // Jika errors berupa objek
                            $.each(errors, function(field, messages) {
                                messages.forEach(function(message) {
                                    errorMessage += message + '<br>';
                                });
                            });
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage // Menampilkan semua pesan error
                        });

                        // Aktifkan kembali tombol submit
                        form.find('button[type="submit"]').prop('disabled', false);
                    }
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 2500,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if (session('failed'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: '{{ session('failed') }}',
                });
            });
        </script>
    @endif


</body>

</html>
