<?php
    session_start();
    if(isset($_SESSION["username"])){ 
    $username = $_SESSION["username"];
    require_once '../Views/Headmenu.php';
    require_once '../db/connect.php';
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row["image"];     
    $email = $row["email"];    
    $name = $row["name"];    
    $phone = $row["phone"];  
    $permission = $row["permission"];      
    if($permission==0){
        $permission = "Khách Hàng";
    }   
    if(empty($image)) {
        $image = 'pngtree-businessman-user-avatar-free-vector-png-image_1538405.jpg';
    }
?>
<div class="container" style="min-height:600px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="wrapper">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-5 mt-5">	
                        <div class="avatar" style="position: relative;">
                            <img src="../Public/img/<?php echo $image;?>" alt="User Avatar" class="rounded-circle col-md-10">
                            <!-- Button trigger modal -->
                            <button style="background-color:gray;color:white;border:none;width:50px;height:50px;border-radius:50%;bottom:100px;position:absolute;z-index:10;left: 215px;top: 225px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                edit
                            </button>
                        </div>	
                                    
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 20px;">Chỉnh Sửa Hình Ảnh</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="avatar-preview" src="../Public/img/<?php echo $image; ?>" alt="User Avatar" class="mb-3 rounded-circle col-md-5">
                                        <input type="file" id="anh" class="form-control-file" name="imageFile"> <!-- Add the name attribute for the file input -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-10">
                            <form id="profileForm">
                                <div class="form-group">                                      
                                    <label class="label">Tên</label>
                                    <label class="text-warning" id="ername"> </label>
                                    <input type="text" id="nameInput" name="name" class="form-control" value="<?php echo $name; ?>">
                                </div>
                            
                                <div class="form-group">
                                    <label class="label">Email (*)</label>
                                    <span class="form-control"><?php echo $email; ?></span>
                                </div>
                            
                                <div class="form-group">
                                    <?php if ($phone): ?>
                                        <label class="label">Số Điện Thoại (*)</label>
                                        <span class="form-control"><?php echo $phone; ?></span>
                                        <input type="hidden" id="phoneInput" name="phone" value="<?php echo $phone; ?>">
                                    <?php else: ?>
                                        <label class="label">Số Điện Thoại</label>
                                        <label class="text-warning" id="erphonenumber"></label>
                                        <input type="text" class="form-control" id="phoneInput" name="phone" value="">
                                    <?php endif; ?>
                                </div>
                            
                                <div class="form-group">
                                    <input type="submit" id="btnupdate" value="Thay Đổi" class="btn btn-success mt-3">
                                </div>
                            </form>
                        </div>           
                        <div class="col-md-6 mt-2">
                            <input type="button" id="btnupdatepassword" value="Chỉnh sửa Mật Khẩu" class="btn btn-secondary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        </div>
                    </div>
                    <!-- Model Chỉnh sửa mật khẩu -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 20px;">Chỉnh Sửa Mật Khẩu</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="label">Nhập Lại Mật Khẩu Cũ</label>
                                            <input type="password" id="oldpassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Nhập Mật Khẩu Mới</label>
                                            <input type="password" id="newpassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Nhập Lại Mật Khẩu Mới</label>
                                            <input type="password" id="confirmpassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<!-- Nhúng CSS của SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- Nhúng JavaScript của SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.getElementById('anh').addEventListener('change', function(event) {
    var fileInput = event.target;
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var previewImage = document.getElementById('avatar-preview');
            previewImage.src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
});

$('input[name="phonenumber"]').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});
document.querySelector('#exampleModal button.btn-success').addEventListener('click', function() {
    var formData = new FormData();
    formData.append('imageFile', $('#anh')[0].files[0]);
    if (formData.has('imageFile')) {
        $.ajax({
            url: '../Authentication/editprofile.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response =="imagetrue") {
                    window.location.href = '../views/Editprofile.php';
                } else {
                    Toastify({
                    text:  "Vui Lòng Chọn 1 Ảnh",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", 
                    position: "right", 
                    stopOnFocus: true, 
                    style: {
                        background: "red",
                    },
                    onClick: function () { } 
                }).showToast();
                    }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Lỗi',
                    text: 'Có lỗi xảy ra. Vui lòng thử lại sau.',
                    icon: 'error',
                    confirmButtonText: 'Đóng'
                });
            }
        });
    }
});
//chỉnh mật khẩu
document.querySelector('#exampleModal2 button.btn-success').addEventListener('click', function() {
    var oldPassword = document.getElementById('oldpassword').value;
    var newPassword = document.getElementById('newpassword').value;
    var confirmPassword = document.getElementById('confirmpassword').value;
    $.ajax({
        url: '../Authentication/editprofile.php',
        type: 'POST',
        data: { oldPassword: oldPassword, newPassword: newPassword, confirmPassword: confirmPassword },
        success: function(response) {
            var color = "red";
            var reponsetemp = "";
            if (response == "infotrue") {
                reponsetemp = "Thay Đổi Mật Khẩu Thành Công";
                color = "linear-gradient(to right, #00b09b, #96c93d)";
            } else if (response == "nulloldpassword") {
                reponsetemp = "Vui Lòng Mật Khẩu Cũ";
            } else if (response == "nullnewpassword") {
                reponsetemp = "Vui lòng nhập Mật Khẩu Mới";
            } else if (response == "nullconfirmpassword") {
                reponsetemp = "Vui Lòng Nhập Lại Mật Khẩu";
            } else if (response == "passwordmismatch") {
                reponsetemp = "Mật Khẩu Không Giống Nhau";
            } else if (response == "passwordtooshort") {
                reponsetemp = "Mật Khẩu Quá Ngắn";
            } else if (response == "passwordtoolegth") {
                reponsetemp = "Mật Khẩu Quá Dài";
            }else if (response == "saimatkhaucu") {
                reponsetemp = "Sai Mật Khẩu Cũ";
            }
            console.log(response)
            Toastify({
                text: reponsetemp,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "right", 
                stopOnFocus: true, 
                style: {
                    background: color,
                },
                onClick: function () { } 
            }).showToast();
        },
    });
});


$('input[id="phoneInput"]').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
}); 
$("#profileForm").submit(function(event) {
    event.preventDefault();
    var nameValue = $('#nameInput').val();
    var phoneValue = $('#phoneInput').val();
    $.ajax({
        url: '../Authentication/editprofile.php',
        type: 'POST',
        data: { nameValue: nameValue, phoneValue: phoneValue },
        success: function(response) {
            if (response == "infotrue") {
                window.location.href = '../views/Editprofile.php';
            } else if (response == "ername") {
                $("#ername").html("Vui lòng nhập tên");
            } else if (response == "nullphonenumber") {
                $("#erphonenumber").html("Hãy Nhập số điện thoại");
            } else if (response == "erphonenumber") {
                $("#erphonenumber").html("SDT không hợp lệ");
            }else if (response == "duplicatephone") {
                $("#erphonenumber").html("SDT đã tồn tại");
            }else {
                Swal.fire({
                    title: 'Lỗi',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Lỗi',
                text: 'Có lỗi xảy ra. Vui lòng thử lại sau.',
                icon: 'error',
                confirmButtonText: 'Đóng'
            });
        }
    });
});

$("#search-btn").click(function(event) {
    var searchValue = $("#search-input").val();
    if (searchValue.trim() === "") {
        event.preventDefault(); // Ngăn chặn thực hiện tải trang
        Toastify({
            text: "Vui lòng nhập thông tin tìm kiếm",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", 
            position: "right", 
            stopOnFocus: true, 
            style: {
                background: "red",
            },
            onClick: function () { } // Callback after click
        }).showToast();
    } else {
        var searchUrl = "../Views/Search.php?search=" + encodeURIComponent(searchValue);
        window.location.href = searchUrl;
    }
});
</script>
<?php
require_once '../Views/Footer.php';
?>
<?php
}
?>
