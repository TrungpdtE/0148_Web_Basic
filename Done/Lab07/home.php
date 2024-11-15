<?php
session_start();

if (!isset($_SESSION['username'])) {
   header("location: login.php");
   exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Bootstrap Example</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
   <style>
      .fa,
      .fas {
         color: #858585;
      }

      .fa-folder {
         color: rgb(74, 158, 255);
      }

      i.fa,
      table i.fas {
         font-size: 16px;
         margin-right: 6px;
      }

      i.action {
         cursor: pointer;
      }

      a {
         color: black;
      }

      .hidden {
         display: none;
      }

      #progressBar {
         width: 100%;
         color: #fff;
      }
   </style>
   <script>
      fetch("load_files.php")
         .then(response => {
            if (!response.ok) throw new Error("failed to fetch")

            return response.json();
         })

         .then(files => {
            let tbody = document.querySelector('tbody')
            tbody.innerHTML = ""
            files.forEach(file => {
               let iconClass;
               switch (file.type) {
                  case 'image/jpeg':
                  case 'image/png':
                  case 'image/gif':
                     iconClass = 'fa-file-image';
                     break;
                  case 'mp3':
                     iconClass = 'fa-file-audio';
                     break;
                  case 'mp4':
                     iconClass = 'fa-file-video';
                     break;
                  case 'audio/x-m4a':
                     iconClass = 'fa-file-audio';
                     break;
                  case 'File':
                     iconClass = 'fa-file-text';
                     break;
                  case 'Folder':
                     iconClass = 'fa-folder';
                     break;
                  default:
                     iconClass = 'fa-file';
               }

               let row =
                  `
            <tr>
               <td>
                  <i class="fa ${iconClass}"></i>
                  <a href="#">${file.name}</a>
               </td>
               <td>${file.type}</td>
               <td>${file.size}</td>
               <td>${file.last_modified}</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action" ></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
            `

               tbody.innerHTML += row
            })
         })
   </script>
</head>

<body>
   <div class="container">
      <div class="row align-items-center py-5">
         <div class="col-6">
            <h3>File Manager</h3>
         </div>
         <div class="col-6">
            <h5 class="text-right">Xin chào <?php echo $username ?> , <a class="text-primary" href="logout.php">Logout</a></h5>
         </div>
      </div>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="#">Home</a></li>
         <li class="breadcrumb-item"><a href="#">Products</a></li>
         <li class="breadcrumb-item active">Accessories</li>
      </ol>


      <div class="input-group mb-3">
         <div class="input-group-prepend">
            <button id="search-button" class="btn btn-primary">
               <span class="fa fa-search"></span>
            </button>
         </div>
         <input type="text" class="form-control" id="search-input" placeholder="Search">
      </div>


      <div class="btn-group my-3">
         <button type="button" class="btn btn-light border">
            <i class="fas fa-folder-plus"></i> New folder
         </button>
         <button type="button" class="btn btn-light border">
            <i class="fas fa-file"></i> Create text file
         </button>
      </div>
      <table class="table table-hover border">
         <thead>
            <tr>
               <th>Name</th>
               <th>Type</th>
               <th>Size</th>
               <th>Last modified</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>
                  <i class="fa fa-folder"></i>
                  <a href="#">Document</a>
               </td>
               <td>Folder</td>
               <td>-</td>
               <td>02-12-2019</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action"></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
            <tr>
               <td>
                  <i class="fa fa-folder"></i>
                  <a href="#">Video</a>
               </td>
               <td>Folder</td>
               <td>-</td>
               <td>02-12-2019</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action"></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
            <tr>
               <td>
                  <i class="fa fa-folder"></i>
                  <a href="#">Downloads</a>
               </td>
               <td>Folder</td>
               <td>-</td>
               <td>02-12-2019</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action"></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
            <tr>
               <td>
                  <i class="fas fa-file-archive"></i>
                  <a href="#">fontawesome-free-5.15.1-web.zip</a>
               </td>
               <td>Compressed file</td>
               <td>3.5 MB</td>
               <td>02-07-2020</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action"></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
            <tr>
               <td>
                  <i class="fas fa-file"></i>
                  <a href="#">Account.txt</a>
               </td>
               <td>Text Document</td>
               <td>18 KB</td>
               <td>11-02-2020</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action"></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
            <tr>
               <td>
                  <i class="fas fa-file-image"></i>
                  <a href="#">img101.png</a>
               </td>
               <td>JPG Image</td>
               <td>2.2 MB</td>
               <td>11-02-2020</td>
               <td>
                  <i class="fa fa-download action"></i>
                  <i class="fa fa-edit action"></i>
                  <i class="fa fa-trash action"></i>
               </td>
            </tr>
         </tbody>
      </table>

      <div class="border rounded mb-3 mt-5 p-3">
         <h4>File upload</h4>
         <form id="uploadForm">
            <div class="form-group">
               <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="fileToUpload">
                  <label class="custom-file-label" for="customFile">Choose file</label>
               </div>
               <progress id="progressBar" value="0" max="100" class="hidden"></progress>
            </div>
            <p>Người dùng chỉ được upload tập tin có kích thước tối đa là 20 MB.</p>
            <p>Các tập tin thực thi (*.exe, *.msi, *.sh) không được phép upload.</p>
            <p><strong>Yêu cầu nâng cao</strong>: hiển thị progress bar trong quá trình upload.</p>
            <button type="submit" class="btn btn-success px-5">Upload</button>
         </form>
      </div>

      <script>
         document.getElementById('customFile').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
         })
         document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('fileToUpload', document.getElementById('customFile').files[0]);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'load_files.php', true);

            var progressBar = document.getElementById('progressBar');
            progressBar.classList.remove('hidden');

            xhr.upload.onprogress = function(e) {
               if (e.lengthComputable) {
                  var percentComplete = (e.loaded / e.total) * 100;
                  progressBar.value = percentComplete;
               }
            };

            xhr.onload = function() {
               if (this.status == 200) {
                  progressBar.classList.add('hidden');
                  window.location.reload();
               } else {
                  console.error(this.statusText);
               }
            };

            xhr.onerror = function() {
               console.error(this.statusText);
            };

            xhr.send(formData);
         });
         $(document).ready(function() {
            $(document).on('click', '.fa-download', function() {
               $('#confirm-dow').modal('show');
            });

            $(document).on('click', '.fa-edit', function() {
               $('#confirm-rename').modal('show');
            });
            $(document).on('click', '.fa-trash', function() {
               $('#confirm-delete').modal('show');
            });

            $(document).on('click', '.fa-folder-plus', function() {
               $('#new-file-dialog').modal('show');
            });

            $(document).on('click', '.fa-file', function() {
               $('#new-file-dialog').modal('show');
            });
         });

         $(document).ready(function() {
            var originalTableContent = $('tbody').html(); 

            $('#search-input').on('input', function() {
               var searchQuery = $(this).val();

               if (searchQuery === '') {
                  $('tbody').html(originalTableContent);
               } else {
                  $.ajax({
                     url: '/search', 
                     type: 'GET',
                     data: {
                        query: searchQuery
                     },
                     success: function(data) {
                        $('tbody').empty();

                        data.forEach(function(item) {
                           var row = '<tr>';
                           row += '<td>' + item.name + '</td>';
                           row += '<td>' + item.type + '</td>';
                           row += '<td>' + item.size + '</td>';
                           row += '<td>' + item.lastModified + '</td>';
                           row += '<td>' + item.actions + '</td>';
                           row += '</tr>';

                           $('tbody').append(row);
                        });
                     },
                     error: function(error) {
                        console.error(error);
                     }
                  });
               }
            });
         });
      </script>

      <div class="modal-example my-5">
         <h4>Một số dialog mẫu</h4>
         <p>Nhấn vào để xem kết quả</p>
         <ul>
            <li><a href="#" data-toggle="modal" data-target="#confirm-delete">Confirm delete</a></li>
            <li><a href="#" data-toggle="modal" data-target="#confirm-rename">Confirm rename</a></li>
            <li><a href="#" data-toggle="modal" data-target="#new-file-dialog">New file dialog</a></li>
            <li><a href="#" data-toggle="modal" data-target="#message-dialog">Message Dialog</a></li>
         </ul>
      </div>

   </div>


   <!-- Delete dialog -->
   <div class="modal fade" id="confirm-delete">
      <div class="modal-dialog">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">Xóa tập tin</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
               Bạn có chắc rằng muốn xóa tập tin <strong>image.jpg</strong>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Xóa</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
         </div>
      </div>
   </div>


   <!-- Rename dialog -->
   <div class="modal fade" id="confirm-rename">
      <div class="modal-dialog">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">Đổi tên</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
               <p>Nhập tên mới cho tập tin <strong>Document.txt</strong></p>
               <input type="text" placeholder="Nhập tên mới" value="Document.txt" class="form-control" />
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Lưu</button>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="confirm-dow">
      <div class="modal-dialog">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">Tải Về</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Tải</button>
            </div>
         </div>
      </div>
   </div>



   <!-- New file dialog -->
   <div class="modal fade" id="new-file-dialog">
      <div class="modal-dialog">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">Tạo tập tin mới</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
               <div class="form-group">
                  <label for="name">File Name</label>
                  <input type="text" placeholder="File name" class="form-control" id="name" />
               </div>
               <div class="form-group">
                  <label for="content">Nội dung</label>
                  <textarea rows="10" id="content" class="form-control" placeholder="Nội dung"></textarea>

               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-success" data-dismiss="modal">Lưu</button>
            </div>
         </div>
      </div>
   </div>



   <!-- message dialog -->
   <div class="modal fade" id="message-dialog">
      <div class="modal-dialog">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">Xóa file</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
               <p>Bạn không được cấp quyền để xóa tập tin/thư mục này</p>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
            </div>
         </div>
      </div>
   </div>


</body>

</html>