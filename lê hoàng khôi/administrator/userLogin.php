<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightblue;

            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat; 
            background-size: 50%; 


        }
        .login-container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-container h4 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-control {
            border-radius: 30px;
        }
        .btn-login {
            border-radius: 30px;
            width: 100%;
        }
        .login-container p {
            text-align: center;
            margin-top: 15px;
        }
        .login-container p a {
            color: #0d6efd;
            text-decoration: none;
        }
        .login-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h4>ĐĂNG NHẬP HỆ THỐNG</h4>
        <form name="frmLogin" method="post" action="element_LHK/mUser/userAct.php?reqact=checklogin">
            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-login">Đăng nhập</button>
            </div>
        </form>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
