<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link 
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
         integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <style>
         .fa, .fas {
         color: #858585;
         }
         .fa-folder {
         color: rgb(74, 158, 255);
         }
         i.fa, table i.fas {
         font-size: 16px;
         margin-right: 6px;
         }
         i.action {
         cursor: pointer;
         }
         a {
         color: black;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="row align-items-center py-5">
            <div class="col-6">
               <h3>File Manager</h3>
            </div>
            <div class="col-6">
               <h5 class="text-right">Xin chào User, <a class="text-primary" href="#">Logout</a></h5>
            </div>
         </div>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Accessories</li>
         </ol>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text">
               <span class="fa fa-search"></span>         
               </span>
            </div>
            <input type="text" class="form-control" placeholder="Search">
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
                     <i class="fa fa-edit action" ></i>
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
            <form>
               <div class="form-group">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="customFile">
                     <label class="custom-file-label" for="customFile">Choose file</label>            
                  </div>
               </div>
               <p>Người dùng chỉ được upload tập tin có kích thước tối đa là 20 MB.</p>
               <p>Các tập tin thực thi (*.exe, *.msi, *.sh) không được phép upload.</p>
               <p><strong>Yêu cầu nâng cao</strong>: hiển thị progress bar trong quá trình upload.</p>
               <button class="btn btn-success px-5">Upload</button>
            </form>
         </div>

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
                <input type="text" placeholder="Nhập tên mới" value="Document.txt" class="form-control"/>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Lưu</button>
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
                    <input type="text" placeholder="File name" class="form-control" id="name"/>
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