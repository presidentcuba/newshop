<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title']?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/public/admin/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/public/admin/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/public/admin/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1">Administrator</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                    <?=$data['title']?>
                </p>

                <?php
                    include __DIR__.'/../errors.php';
                 ?>

                <form action="/admin/login/store" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Địa chỉ email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ghi nhớ
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng Nhâp</button>
                        </div>
                    <!-- /.col -->
                    </div>
                </form>

            

           
            </div>
            <!-- /.card-body -->
        </div>
    <!-- /.card -->
    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/public/admin/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/public/admin/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/public/admin/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
