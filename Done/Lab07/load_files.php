<?php
$dir = "uploads/";
$files = scandir($dir);
$fileList = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_file = $dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo json_encode(["status" => "success", "message" => "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
    }
} else {
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            $filepath = $dir . $file;
            $fileInfo = array(
                "name" => $file,
                "type" => is_dir($filepath) ? "Folder" : mime_content_type($filepath),
                "size" => is_dir($filepath) ? "-" : filesize($filepath),
                "last_modified" => date("d-m-Y H:i:s", filemtime($filepath))
            );
            array_push($fileList, $fileInfo);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($fileList);
}
?>