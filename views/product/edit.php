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
    <h3>Cập nhật thông tin sản phẩm</h3>
    <?php
    if (isset($_COOKIE['msg'])) {
        ?>
        <div class="alert alert-danger">
            <strong>Cảnh báo!</strong> <?php echo $_COOKIE['msg']; ?>
        </div>
        <?php
    }
    ?>
    <hr>
    <form action="?mod=product&act=update" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã sản phẩm </label>
            <input type="text" class="form-control" id="" placeholder="Mã sản phẩm " name="code"
                   value="<?= $data['code'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" id="" placeholder="Nhập vào tên sản phẩm " name="name"
                   value="<?= $data['name'] ?>">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" class="form-control" id="" placeholder="Nhập vào mô tả sản phẩm" name="description"
                   value="<?= $data['description'] ?>">
        </div>
        <div class="form-group">
            <label for="">Số lượng</label>
            <input type="number" class="form-control" id="" placeholder="Nhập vào số lượng sản phẩm" name="quantity"
                   value="<?= $data['quantity'] ?>">
        </div>
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" name="photo" class="form-control">
            <img src="<?=$data['image']?>" style="width: 200px" class="img-thumbnail" alt="">
        </div>

        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    </form>
</div>
</body>
</html>