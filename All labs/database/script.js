$(document).ready(function () {
    fetchProducts()

    function fetchProducts() {
        $.ajax({
            url: 'product_db.php',
            type: 'GET',
            dataType: 'json',
            success: function (products) {
                $('#productList').empty()
                products.forEach((product) => {
                    $('#productList').append(
                        `<li class="list-group-item d-flex justify-content-between align-items-center">
                            ${product.name} - $${product.price} - ${product.description}
                            <div>
                                <button onclick="deleteProduct(${product.id})" class="btn btn-danger btn-sm">Delete</button>
                                <button onclick="updateProduct(${product.id})" class="btn btn-secondary btn-sm">Update</button>
                            </div>
                        </li>`
                    )
                })
            },
            error: function () {
                alert('Error loading products')
            },
        })
    }

    window.addProduct = function () {
        const productName = $('#name').val()
        const productPrice = $('#price').val()
        const productDesc = $('#desc').val()

        // Kiểm tra xem có dữ liệu đầy đủ không
        if (!productName || !productPrice || !productDesc) {
            alert('Please fill in all fields')
            return
        }

        const productData = {
            name: productName,
            price: productPrice,
            description: productDesc,
        }

        $.ajax({
            url: 'product_db.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(productData),
            success: function (response) {
                alert('Product added successfully')
                fetchProducts() // Làm mới danh sách sản phẩm sau khi thêm
                // Xóa nội dung các trường sau khi thêm
                $('#name').val('')
                $('#price').val('')
                $('#desc').val('')
            },
            error: function () {
                alert('Error adding product')
            },
        })
    }

    window.deleteProduct = function (id) {
        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: `product_db.php?id=${id}`,
                type: 'DELETE',
                success: function (response) {
                    alert('Product deleted successfully')
                    fetchProducts() // Làm mới danh sách sau khi xóa
                },
                error: function () {
                    alert('Error deleting product')
                },
            })
        }
    }

    window.updateProduct = function (id) {
        const newName = prompt('Enter new name:')
        const newPrice = prompt('Enter new price:')
        const newDesc = prompt('Enter new description:')

        // Kiểm tra xem người dùng đã nhập đủ thông tin hay không
        if (!newName || !newPrice || !newDesc) {
            alert('Please fill in all fields')
            return
        }

        const productData = {
            id: id,
            name: newName,
            price: newPrice,
            description: newDesc,
        }

        $.ajax({
            url: 'product_db.php',
            type: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify(productData),
            success: function (response) {
                alert('Product updated successfully')
                fetchProducts() // Làm mới danh sách sau khi cập nhật
            },
            error: function () {
                alert('Error updating product')
            },
        })
    }
})
