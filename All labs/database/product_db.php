<?php
require_once 'db.php';



// Kiểm tra phương thức của yêu cầu
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Nếu là GET, trả về danh sách sản phẩm
    $products = get_products();
    header('Content-Type: application/json');
    echo json_encode($products);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nếu là POST, thêm sản phẩm mới
    $data = json_decode(file_get_contents("php://input"), true); // Lấy dữ liệu JSON từ yêu cầu
    if (isset($data['name']) && isset($data['price']) && isset($data['description'])) {
        add_product($data['name'], $data['price'], $data['description']);
        echo json_encode(array('message' => 'Product added successfully'));
    } else {
        echo json_encode(array('message' => 'Missing data for adding product'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Nếu là PUT, cập nhật sản phẩm
    parse_str(file_get_contents("php://input"), $data); // Lấy dữ liệu từ yêu cầu
    if (isset($data['id']) && isset($data['name']) && isset($data['price']) && isset($data['description'])) {
        update_product($data['id'], $data['name'], $data['price'], $data['description']);
        echo json_encode(array('message' => 'Product updated successfully'));
    } else {
        echo json_encode(array('message' => 'Missing data for updating product'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Nếu là DELETE, xóa sản phẩm
    parse_str($_SERVER['QUERY_STRING'], $params); // Lấy tham số từ URL
    if (isset($params['id'])) {
        delete_product($params['id']);
        echo json_encode(array('message' => 'Product deleted successfully'));
    } else {
        echo json_encode(array('message' => 'Missing product ID for deletion'));
    }
} else {
    // Nếu không phải GET, POST, PUT hoặc DELETE, trả về lỗi phương thức không được hỗ trợ
    http_response_code(405); // Lỗi phương thức không được hỗ trợ
    echo json_encode(array('message' => 'Method not allowed'));
}


// Bổ sung các hàm xử lý thêm, cập nhật và xóa sản phẩm

function add_product($name, $price, $desc)
{
    $sql = "insert into product(name, price, description) values(?,?,?)";
    $conn = get_connection();

    // TODO: thực hiện prepare statement
    // TODO: sau đó gọi bind_param() và execute()
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $name, $price, $desc);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // echo "Add product successfully";

}

function get_products()
{
    // TODO: viết chức năng đọc tất cả sản phẩm ở đây
    $sql = "select * from product";
    $conn = get_connection();

    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    $conn->close();
    // echo "<pre>";
    // print_r($products);
    return $products;
}


function get_product($id)
{
    // TODO: viết chức năng đọc sản phẩm theo $id
    $sql = "select * from product where id = ?";
    $conn = get_connection();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    $conn->close();

    echo "<pre>";
    print_r($product);
    return $product;
}

function update_product($id, $name, $price, $desc)
{
    // TODO: viết chức năng cập nhật sản phẩm theo id
    $sql = "update product set name = ?, price = ?, description = ? where id = ?";
    $conn = get_connection();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdsi", $name, $price, $desc, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    // echo "Update product successfully";
}

function delete_product($id)
{
    // TODO: viết chức xóa nhật sản phẩm theo id
    $sql = "delete from product where id = ?";
    $conn = get_connection();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // echo "Delete product successfully";
}
