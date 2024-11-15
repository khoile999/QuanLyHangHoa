<?php
session_start();
require '../../element_LHK/class/nhanvienCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $hoten = $_REQUEST['hoten'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $sdt = $_REQUEST['sdt'];
            $email = $_REQUEST['email'];
            $chucvu = $_REQUEST['chucvu'];

            $nv = new nhanvien();
            $kq = $nv->NhanvienAdd($hoten, $ngaysinh, $diachi, $sdt, $email, $chucvu);

            if ($kq) {
                header('location: ../../index.php?req=nhanvienView&result=ok');
            } else {
                header('location: ../../index.php?req=nhanvienView&result=not ok');
            }
            break;

        case 'deletenhanvien':
            $idnhanvien = $_REQUEST['idnhanvien'];
            $nv = new nhanvien();
            $kq = $nv->NhanvienDelete($idnhanvien);

            if ($kq) {
                header('location: ../../index.php?req=nhanvienView&result=ok');
            } else {
                header('location: ../../index.php?req=nhanvienView&result=not ok');
            }
            break;

        case 'updatenhanvien':
            $idnhanvien = $_REQUEST['idnhanvien'];
            $hoten = $_REQUEST['hoten'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $sdt = $_REQUEST['sdt'];
            $email = $_REQUEST['email'];
            $chucvu = $_REQUEST['chucvu'];

            $nv = new nhanvien();
            $kq = $nv->NhanvienUpdate($idnhanvien, $hoten, $ngaysinh, $diachi, $sdt, $email, $chucvu);

            if ($kq) {
                header('location: ../../index.php?req=nhanvienView&result=ok');
            } else {
                header('location: ../../index.php?req=nhanvienView&result=not ok');
            }
            break;

        default:
            header('location: ../../index.php?req=nhanvienView');
            break;
    }
} else {
    header('location: ../../index.php?req=nhanvienView');
}
?>
