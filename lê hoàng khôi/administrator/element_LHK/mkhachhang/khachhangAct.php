<?php
session_start();
require '../../element_LHK/class/khachhangCls.php'; 

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $hoten = $_REQUEST['hoten'];
            $email = $_REQUEST['email'];       
            $sdt = $_REQUEST['sdt'];
            $diachi = $_REQUEST['diachi']; 

            // Tạo đối tượng và gọi hàm thêm mới khách hàng
            $khachhang = new Khachhang();
            $kq = $khachhang->KhachhangAdd($hoten, $email, $sdt, $diachi);
            
            if ($kq) {
                header('location: ../../index.php?req=khachhangView&result=ok');
            } else {
                header('location: ../../index.php?req=khachhangView&result=not ok');
            }
            break;

        case 'deletekhachhang':
            $idkhachhang = $_REQUEST['idkhachhang']; 
            $khachhang = new Khachhang();
            $kq = $khachhang->KhachhangDelete($idkhachhang);

            if ($kq) {
                header('location: ../../index.php?req=khachhangView&result=ok');
            } else {
                header('location: ../../index.php?req=khachhangView&result=not ok');
            }
            break;

        case 'updatekhachhang':
            $idkhachhang = $_REQUEST['idkhachhang'];
            $hoten = $_REQUEST['hoten'];
            $email = $_REQUEST['email'];       
            $sdt = $_REQUEST['sdt']; 
            $diachi = $_REQUEST['diachi']; 

            $khachhang = new Khachhang();
            $kq = $khachhang->KhachhangUpdate($idkhachhang, $hoten, $email, $sdt, $diachi);

            if ($kq) {
                header('location: ../../index.php?req=khachhangView&result=ok');
            } else {
                header('location: ../../index.php?req=khachhangView&result=not ok');
            }
            break;

        default:
            header('location: ../../index.php?req=khachhangView');
            break;
    }
} else {
    header('location: ../../index.php?req=khachhangView');
}
?>
