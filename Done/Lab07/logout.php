<?php
session_start();

$_SESSION = array();

session_destroy();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function startCountdown(seconds) {
      var countdownElement = document.getElementById('countdown');
      var loginBtn = document.getElementById('loginBtn');
      var countdown = seconds;
      countdownElement.textContent = countdown;
      var timer = setInterval(function() {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown <= 0) {
          clearInterval(timer);
          loginBtn.click();
        }
      }, 1000);
    }
    $
      (document).ready(function() {
        startCountdown(10);
        $('#loginBtn').click(function() {
          window.location.href = 'login.php';
        });
      });
  </script>


</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto p-3 border rounded">
        <h4>Đăng xuất thành công</h4>
        <p>Tài khoản của bạn đã được đăng xuất khỏi hệ thống.</p>
        <p>Nhấn <a href="login.php">vào đây</a> để trở về trang đăng nhập, hoặc trang web sẽ tự động chuyển hướng sau <span class="text-danger" id="countdown">10</span> giây nữa.</p>
        <button class="btn btn-success px-5" id="loginBtn">Đăng nhập</button>
      </div>
    </div>
  </div>
</body>

</html>