<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/public/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-4">Đăng nhập</h2>
            <?php
            if (isset($_COOKIE['msg'])) {
                ?>
                <div class="alert alert-danger">
                    <strong>Cảnh báo!</strong> <?php echo $_COOKIE['msg']; ?>
                </div>
                <?php
            }
            ?>
            <form action="?mod=authentication&act=authenticate" method="post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <div class="flex">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <a href="?mod=authentication&act=signup" type="button" class="btn btn-link">Đăng ký</a>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
