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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        td {
            vertical-align: middle;
        }
        img {
            max-height: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-10">
            <h3 class="my-4 text-center">Product List</h3>
            <div class="d-flex justify-content-between">
                <a class="btn btn-sm btn-secondary mb-4" href="add_product.php">Add Product</a>
                <a href="logout.php">Logout</a>
            </div>
            <table class="table-bordered table table-hover text-center">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td class="align-middle"><img src="images/iphone-7-plus-128gb-de-400x460.png"></td>
                    <td class="align-middle">iPhone 7 Plus 128 GB</td>
                    <td class="align-middle">9,490,000 VND</td>
                    <td class="align-middle">Mẫu iPhone mới nhất của Apple</td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-primary mr-1 edit-btn"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr class="item">
                    <td class="align-middle"><img src="images/samsung-galaxy-j7-plus-1-400x460.png"></td>
                    <td class="align-middle">iPhone 7 Plus 128 GB</td>
                    <td class="align-middle">9,490,000 VND</td>
                    <td class="align-middle">Mẫu iPhone mới nhất của Apple</td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-primary mr-1 edit-btn"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </table>
            <p class="text-right">Total products: <strong>2</strong></p>
        </div>
    </div>
</div>

    <!-- Delete Confirm Modal -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Delete a Product</hp>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong>iPhone XS MAX</strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </div>

            </div>

        </div>
    </div>


    <!-- Edit Confirm Modal -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <hp class="modal-title">Update product <strong>iPhone XS MAX</strong></hp>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input id="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input id="desc" type="text" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-success">Save</button>
                </div>
    
            </div>
    
        </div>
    </div>

    <script>
        $(document).ready(function () {

            // show delete confirm
            $(".delete-btn").click(function () {
                $('#deleteModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });

            // show edit confirm
            $(".edit-btn").click(function () {
                $('#editModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        });
    </script>

</body>
</html>