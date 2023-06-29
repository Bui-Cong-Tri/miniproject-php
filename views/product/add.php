<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add user</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/public/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/public/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
require_once('views/header.php');
?>
<body>
<div class="container">
    <h3>ADD A NEW USER</h3>
    <?php
    if (isset($_COOKIE['msg'])) {
        ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong> <?php echo $_COOKIE['msg']; ?>
        </div>
        <?php
    }
    ?>
    <hr>
    <form action="?mod=user&act=store" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã khách hàng</label>
            <input type="text" class="form-control" id="" placeholder="Mã khách hàng" name="code">
        </div>
        <div class="form-group">
            <label for="">Tên khách hàng</label>
            <input type="text" class="form-control" id="" placeholder="Nhập vào tên khách hàng" name="name">
        </div>
        <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="number" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="mobile">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" placeholder="Nhập vào email" name="email">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Lưu thông tin</button>
    </form>
</div>
<?php
require_once('views/footer.php');
?>
</body>
</html>