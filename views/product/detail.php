<?php
require_once('views/header.php');
?>
<div class="row mx-auto mt-5" style="width: 80%">
    <div class="col-md-4 ml-8">
        <img src="<?=$data['image']?>"
            class="img-responsive" alt="a" style="width: 300px">
    </div>
    <div class="col">

        <div class="row col-md-8">
            <div class="col-md-4">
                <label class="font-weight-bold">Mã sản phẩm</label>
                <p><?php echo $data["code"] ?></p>
            </div>
            <div class="col-md-4">
                <label class="font-weight-bold">Tên sản phẩm</label>
                <p><?php echo $data["name"] ?></p>
            </div>
            <div class="col-md-8">
                <label class="font-weight-bold">Số lượng</label>
                <p><?php echo $data["quantity"] ?></p>
            </div>
        </div>
        <div class="row row col-md-8">
            <div class="col-md-8">
                <label class="font-weight-bold">Mô tả</label>
                <p><?php echo $data["description"] ?></p>
            </div>
        </div>
    </div>
</div>
