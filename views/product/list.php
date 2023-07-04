<?php
require_once('views/header.php');
//include_once("models/Product.php");
//$pro = new Product();
?>
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sản phẩm</li>
        </ol>

        <!-- Page Content -->
        <h1>Sản phẩm</h1>
        <hr>
        <a href="?mod=product&act=add" class="btn btn-primary">Thêm sản phẩm mới</a>
        <?php
        if (isset($_COOKIE['msg'])) {
            ?>
            <div class="alert alert-success">
                <strong>Thành công!</strong> <?php echo $_COOKIE['msg']; ?>
            </div>
            <?php
        }
        if (isset($_COOKIE['msg_fail'])) {
            ?>
            <div class="alert alert-danger">
                <strong>Cảnh báo!</strong> <?php echo $_COOKIE['msg_fail']; ?>
            </div>
            <?php
        }
        ?>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="products-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mã Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Số lượng</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
//                    $data = $pro->All();
                    foreach ($data as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['code']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td style="text-align: center;">

                                <a href="?mod=product&act=detail&code=<?php echo $row['code']; ?>"
                                   data-id="<?php echo $row['code'] ?>" class="btn btn-success">Detail</a>
                                <a href="?mod=product&act=edit&code=<?php echo $row['code']; ?>"
                                   class="btn btn-warning">Update</a>
                                <a href="?mod=product&act=delete&code=<?php echo $row['code']; ?>"
                                   class="btn btn-danger delete">Delete</a>

                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".detail").click(function () {

                var code = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: "?mod=product&act=detail&id=" + code,
                    data: {},
                    success: function (response) {
                        $('#detail').html(response);
                        $("#myModal").modal("show");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    }
                });
            });
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = url;
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            })
        })

    </script>

    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#products-table').DataTable();
        });
    </script>
<?php require_once('views/footer.php') ?>