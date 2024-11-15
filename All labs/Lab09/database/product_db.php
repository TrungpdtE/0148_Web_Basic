<?php
    require_once('db.php');

    function add_product($name, $price, $desc)
    {
        $sql = "insert into product(name, price, description) values(?,?,?)";
        $conn = get_connection();

        // TODO: thực hiện prepare statement
        // TODO: sau đó gọi bind_param() và execute()

    }

    function get_products() {
        // TODO: viết chức năng đọc tất cả sản phẩm ở đây
    }

    function get_product($id) {
        // TODO: viết chức năng đọc sản phẩm theo $id
    }

    function update_product($id, $name, $price, $desc)
    {
        // TODO: viết chức năng cập nhật sản phẩm theo id
    }

    function delete_product($id)
    {
        // TODO: viết chức xóa nhật sản phẩm theo id
    }
?>
