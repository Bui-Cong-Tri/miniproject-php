<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once('views/header.php');
?>
<div class="container">
    <h3 align="center">UPDATE INFORMATION</h3>
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
    <form action="?mod=user&act=update" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã khách hàng</label>
            <input type="text" class="form-control" id="" placeholder="Mã khách hàng" name="code"
                   value="<?= $data['code'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Tên khách hàng</label>
            <input type="text" class="form-control" id="" placeholder="Nhập vào tên khách hàng" name="name"
                   value="<?= $data['name'] ?>">
        </div>
        <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="number" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="mobile"
                   value="<?= $data['mobile'] ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" placeholder="Nhập vào email" name="email"
                   value="<?= $data['email'] ?>">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address"
                   value="<?= $data['address'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    </form>
</div>
<?php
require_once('views/footer.php');
?>
</body>
</html>