<?php
require "utils.php";
require "db.php";

$error = '';
$first_name = $_POST['first'] ?? '';
$last_name = $_POST['last'] ?? '';
$email = $_POST['email'] ?? '';
$user = $_POST['user'] ?? '';
$pass = $_POST['pass'] ?? '';
$pass_confirm = $_POST['pass-confirm'] ?? '';
$captcha_response = $_POST['g-recaptcha-response'] ?? '';
// Kiểm tra xem tất cả các trường đã được gửi chưa
$captcha_secret_key = '6LfX-dspAAAAAJ0huRD67wPglqpK9QzOwEP9mJ84';
$captcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$captcha_data = [
    'secret' => $captcha_secret_key,
    'response' => $captcha_response
];

$captcha_options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($captcha_data)
    ]
];

$captcha_context = stream_context_create($captcha_options);
$captcha_result = file_get_contents($captcha_url, false, $captcha_context);
$captcha_result_array = json_decode($captcha_result, true);

if (!$captcha_result_array['success']) {
    $error = 'reCAPTCHA verification failed.';
}
else if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($user) && !empty($pass) && !empty($pass_confirm)) {
    // Kiểm tra xem mật khẩu và mật khẩu xác nhận có khớp không
    if ($pass !== $pass_confirm) {
        $error = "Mật khẩu và mật khẩu xác nhận không khớp.";
    } else {
        // Tạo token kích hoạt
        $activate_token = generateToken(5);

        // Băm mật khẩu
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Chuẩn bị và bind statement
        $stmt = $conn->prepare("INSERT INTO account (username, firstname, lastname, email, password, activate_token) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $user, $first_name, $last_name, $email, $hashed_password, $activate_token);

        // Thực thi statement
        if ($stmt->execute()) {
            $activation_link = 'http://localhost:8080/522H0148/activate.php?email=' . urlencode($email) . '&activate_token=' . urlencode($activate_token);
            $body = "Click để kích hoạt tài khoản của bạn: <a href='" . $activation_link . "'>Kích hoạt</a>";
            send_mail($email, "Kích hoạt tài khoản", $body);
        } else {
            $error = "Lỗi: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    $error = "Vui lòng điền đầy đủ thông tin.";
}

$conn->close();

echo json_encode(['error' => $error]);
?>