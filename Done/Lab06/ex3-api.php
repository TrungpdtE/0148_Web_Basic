<?php
$file = 'comments.txt';
// <!-- nhớ chạy:macbookpro@TTrung-2 lab6_web_522H0148 % php -S localhost:8080
// nhớ chạy: macbookpro@TTrung-2 lab6_web_522H0148 % sudo chmod -R 777 /Applications/XAMPP/xamppfiles/htdocs/ để cấp quyền cho thư mục htdocs, cho phép sửa file cmts.txt -->

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $name = $_POST['name'];
        $type = $_POST['type'];
        $comment = $_POST['comment'];
        $timestamp = time();
        $data = compact('name', 'type', 'comment', 'timestamp');
        file_put_contents($file, json_encode($data) . "\n", FILE_APPEND);
        break;

    case 'GET':
        $comments = array_reverse(file($file));
        echo json_encode($comments);
        break;

    case 'DELETE':
        $timestamp = $_GET['timestamp'];
        $comments = file($file);
        foreach ($comments as $i => $comment) {
            $data = json_decode($comment, true);
            if ($data['timestamp'] == $timestamp) {
                unset($comments[$i]);
                break;
            }
        }
        file_put_contents($file, $comments);
        break;
}
?>