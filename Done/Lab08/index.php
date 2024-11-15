<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Danh sách sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <style>
        body{
            padding-top: 50px;
        }
        table{
            width: 80%;
            text-align: center;
        }
        td{
            padding: 10px;
        }
        tr.item{
            border-top: 1px solid #5e5e5e;
            border-bottom: 1px solid #5e5e5e;
        }

        tr.item:hover{
            background-color: #d9edf7;
        }

        tr.item td{
            min-width: 150px;
        }

        tr.header{
            font-weight: bold;
        }

        a{
            text-decoration: none;
        }
        a:hover{
            color: deeppink;
            font-weight: bold;
        }

        td img {
            max-height: 100px;
        }
    </style>


    <script>
        $(document).ready(function () {
            $(".delete").click(function () {

                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        });
    </script>


    <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td colspan="4">
                <a href="add_product.php">Thêm sản phẩm</a>
            </td>
            <td class="text-right">
                <a href="logout.php">Đăng xuất</a>
            </td>
        </tr>
        <tr class="header">
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
        <tr class="item">
            <td><img src="images/iphone-7-plus-128gb-de-400x460.png"></td>
            <td>iPhone 7 Plus 128 GB</td>
            <td>9,490,000 VND</td>
            <td>Mẫu iPhone mới nhất của Apple</td>
            <td><a href="add_product.php">Edit</a> | <a href="#" class="delete">Delete</a></td>
        </tr>
        <tr class="item">
            <td><img src="images/samsung-galaxy-j7-plus-1-400x460.png"></td>
            <td>iPhone 7 Plus 128 GB</td>
            <td>9,490,000 VND</td>
            <td>Mẫu iPhone mới nhất của Apple</td>
            <td><a href="add_product.php">Edit</a> | <a href="#" class="delete">Delete</a></td>
        </tr>
        <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
            <td colspan="5">
                <p>Số lượng sản phẩm: 2</p>
            </td>
        </tr>
    </table>


    <!-- Delete Confirm Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Xóa sản phẩm</hp>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc rằng muốn xóa <strong>iPhone XS MAX</strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>

            </div>

        </div>
    </div>


</body>
</html>