<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="backend/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="backend/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="backend/css/pages/auth-light.css" rel="stylesheet" />

</head>

<body class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <img src="backend/img/logo-login.png" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-11">
                        <div class="card card-body bg-light">
                            <form id="login-form" action="{{ route('login') }}" method="post">
                                @csrf
                                <h2 class="login-title text-success font-strong font-weight-bold">Serba Sambal</h2>
                                <div class="form-group">
                                    <div class="input-group-icon right">
                                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                                        <input class="form-control" type="email"  placeholder="Masukkan Email" name="email" value="{{ old('email') }}"  class="frm-inp @error('email') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-icon right">
                                        <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                                        <input class="form-control" type="password" name="password" placeholder="Password" class="frm-inp @error('email') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <label class="ui-checkbox ui-checkbox-info">
                                        <input type="checkbox">
                                        <span class="input-span"></span>Remember me</label>
                                        <a href="forgot_password.html" class="text-success">Forgot password?</a>
                                        
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <a href="register" class="text-success">Register New Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="backend/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="backend/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="backend/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="backend/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="backend/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>