<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
        .form-container {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5 form-container">
        <h2 class="text-center">Đăng ký tài khoản</h2>
        <form action="element_LHK/mUser/userAct.php?reqact=addnew" method="post">
            <div class="mb-2">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-2">
                <label for="hoten" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="hoten" name="hoten" required>
            </div>
            <div class="mb-2">
                <label for="gioitinh" class="form-label">Giới tính</label>
                <select class="form-select" id="gioitinh" name="gioitinh" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="ngaysinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
            </div>
            <div class="mb-2">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" required>
            </div>
            <div class="mb-2">
                <label for="dienthoai" class="form-label">Điện thoại</label>
                <input type="text" class="form-control" id="dienthoai" name="dienthoai" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Đăng ký</button>
        </form>
    </div>
</body>
</html>
