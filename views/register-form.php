<head>
    <title>Form Đăng ký</title>
    <link rel="stylesheet" href="/public/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Form Đăng ký</h2>
    <?php
    if (isset($_COOKIE['msg'])) {
        ?>
        <div class="alert alert-danger">
            <strong>Cảnh báo!</strong> <?php echo $_COOKIE['msg']; ?>
        </div>
        <?php
    }
    ?>
    <form action="?mod=authentication&act=createAccount" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên đăng nhập:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="flex">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            <a href="?mod=authentication&act=login" type="button" class="btn btn-link">Đăng nhập</a>
        </div>
    </form>
</div>

<script src="/public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
