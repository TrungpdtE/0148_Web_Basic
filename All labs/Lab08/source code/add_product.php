<?php

    $error = '';
    $name = '';
    $price = '';
    $desc = '';


    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['desc']))
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];


        if (empty($name)) {
            $error = 'Hãy nhập tên sản phẩm';
        }
        else if (intval($price) <= 0) {
            $error = 'Giá của sản phẩm không hợp lệ';
        }
        else if (intval($price) < 1000000 || intval($price) % 10000 != 0) {
            $error = 'Giá sản phẩm phải trên 1,000,000đ và là bội số của 10,000 đ';
        }
        else if (empty($desc)) {
            $error = 'Hãy nhập mô tả của sản phẩm';
        }
        else if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
            $error = 'Vui lòng upload ảnh của sản phẩm';
        }
        else {
            print_r($_FILES);
            echo 'good';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thêm sản phẩm mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .bg {
            background: #eceb7b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border rounded my-5 p-4  mx-3">
                <p class="mb-5"><a href="index.php">Quay lại</a></p>
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Thêm sản phẩm mới</h3>
                <form method="post" action="" novalidate enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input value="<?= $name?>" name="name" required class="form-control" type="text" placeholder="Tên sản phẩm" id="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá bán</label>
                        <input value="<?= $price?>" name="price" required class="form-control" type="number" placeholder="Giá bán" id="price">
                    </div>
                    <div class="form-group">
                        <label for="desc">Mô tả</label>
                        <textarea id="desc" name="desc" rows="4" class="form-control" placeholder="Mô tả"><?= $desc ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
                            <label class="custom-file-label" for="customFile">Ảnh minh họa</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button type="submit" class="btn btn-primary px-5 mr-2">Thêm</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>

