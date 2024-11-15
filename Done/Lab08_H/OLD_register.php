<?php
require "utils.php";
require "db.php";

$error = '';
$first_name = '';
$last_name = '';
$email = '';
$user = '';
$pass = '';
$pass_confirm = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các trường đã được gửi chưa
    if (isset($_POST['first'], $_POST['last'], $_POST['email'], $_POST['user'], $_POST['pass'], $_POST['pass-confirm'])) {
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];

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
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register an account</title>
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
            <div class="col-xl-5 col-lg-6 col-md-8 border my-5 p-4 rounded mx-3">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Create a new account</h3>
                <form method="post" action="" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First name</label>
                            <input value="<?= $first_name ?>" name="first" required class="form-control" type="text"
                                placeholder="First name" id="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last name</label>
                            <input value="<?= $last_name ?>" name="last" required class="form-control" type="text"
                                placeholder="Last name" id="lastname">
                            <div class="invalid-tooltip">Last name is required</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $email ?>" name="email" required class="form-control" type="email"
                            placeholder="Email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input value="<?= $user ?>" name="user" required class="form-control" type="text"
                            placeholder="Username" id="user">
                        <div class="invalid-feedback">Please enter your username</div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input value="<?= $pass ?>" name="pass" required class="form-control" type="password"
                            placeholder="Password" id="pass">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirm Password</label>
                        <input value="<?= $pass_confirm ?>" name="pass-confirm" required class="form-control"
                            type="password" placeholder="Confirm Password" id="pass2">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>

                    <div class="form-group">
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                        <button type="submit" class="btn btn-success px-5 mt-3 mr-2">Register</button>
                        <button type="reset" class="btn btn-outline-success px-5 mt-3">Reset</button>
                    </div>
                    <div class="form-group">
                        <p>Already have an account? <a href="login.php">Login</a> now.</p>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

</html>