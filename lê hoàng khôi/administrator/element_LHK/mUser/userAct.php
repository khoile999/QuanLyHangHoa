<?php
session_start();

require '../../element_LHK/mod/userCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $hoten = $_REQUEST['hoten'];
            $gioitinh = $_REQUEST['gioitinh'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $dienthoai = $_REQUEST['dienthoai'];

 
            if (strlen($password) < 6) {
                header('location: ../../index.php?req=userview&result=password_too_short');
                exit();
            }

            $userObj = new user();
            $kq = $userObj->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);

            if ($kq) {
                $userObj->UserSetActive($kq, 1);
                header('location: ../../index.php?req=userview&result=ok');
            } else {
                header('location: ../../index.php?req=userview&result=not_ok');
            }
            break;

        case 'deleteuser':
            $iduser = $_REQUEST['iduser'];
            $userObj = new user();
            $kq = $userObj->UserDelete($iduser);
            if ($kq) {
                header('location: ../../index.php?req=userview&result=ok');
            } else {
                header('location: ../../index.php?req=userview&result=not_ok');
            }
            break;

        case 'setlock':
            $iduser = $_REQUEST['iduser'];
            $setlock = $_REQUEST['setlock'];
            $userObj = new user();
            if ($setlock == 1) {
                $kq = $userObj->UserSetActive($iduser, 0);
            } else {
                $kq = $userObj->UserSetActive($iduser, 1);
            }
            if ($kq) {
                header('location: ../../index.php?req=userview&result=ok');
            } else {
                header('location: ../../index.php?req=userview&result=not_ok');
            }
            break;

        case 'updateuser':
            $iduser = $_REQUEST['iduser'];
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $hoten = $_REQUEST['hoten'];
            $gioitinh = $_REQUEST['gioitinh'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $dienthoai = $_REQUEST['dienthoai'];

            // Kiểm tra mật khẩu
            if (strlen($password) < 6) {
                header('location: ../../index.php?req=userview&result=password_too_short');
                exit();
            }

            $userObj = new user();
            $kq = $userObj->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);
            if ($kq) {
                header('location: ../../index.php?req=userview&result=ok');
            } else {
                header('location: ../../index.php?req=userview&result=not_ok');
            }
            break;

        case 'checklogin':
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $userObj = new user();
            $kq = $userObj->UserCheckLogin($username, $password);
            if ($kq) {
                if ($username == 'admin') {
                    $_SESSION['ADMIN'] = $username;
                } else {
                    $_SESSION['USER'] = $username;
                }
                header('location: ../../index.php?req=userview&result=ok');
            } else {
                header('location: ../../index.php?req=userview&result=not_ok');
            }
            break;

        case 'userlogout':
            $time_login = date('h:i - d/m/Y');
            $namelogin = isset($_SESSION['USER']) ? $_SESSION['USER'] : (isset($_SESSION['ADMIN']) ? $_SESSION['ADMIN'] : '');

            if ($namelogin) {
                setcookie($namelogin, $time_login, time() + (86400 * 30), '/');
            }

            session_destroy();
            header('location: ../../index.php');
            break;

        default:
            header('location: ../../index.php?req=userview');
            break;
    }
} else {
    header('location: ../../index.php?req=userview');
}
?>
