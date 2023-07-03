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
    <h3>Thêm sản phẩm</h3>
    <?php
    if (isset($_COOKIE['msg'])) {
        ?>
        <div class="alert alert-danger">
            <strong>Cảnh báo!</strong> <br><?php echo $_COOKIE['msg']; ?>
        </div>
        <?php
    }
    ?>
    <hr>
    <form action="?mod=product&act=store" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="code">Mã sản phẩm</label>
            <input required type="text" class="form-control" id="code" placeholder="Mã sản phẩm" name="code">
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input required type="text" class="form-control" id="name" placeholder="Nhập vào tên sản phẩm"
                   name="name">
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea type="text" class="form-control" id="description" placeholder="Nhập vào mô tả sản phẩm"
                      name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="quanity">Số lượng</label>
            <input required type="number" class="form-control" id="quanity" name="quanity" value="1">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Lưu thông tin</button>
    </form>
</div>
</body>
</html>