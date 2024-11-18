<?php
session_start();
require '../../element_LHK/class/thuoctinhCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenthuoctinh = $_REQUEST['tenthuoctinh'];
            $mota = $_REQUEST['mota'];
            $hinhanh_file = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            $tt = new ThuocTinh();
            $kq = $tt->ThuocTinhAdd($tenthuoctinh, $mota, $hinhanh);

            if ($kq) {
                header('location: ../../index.php?req=thuoctinhView&result=ok');
            } else {
                header('location: ../../index.php?req=thuoctinhView&result=notok');
            }
            break;

        case 'deletethuoctinh':
            $idthuoctinh = $_REQUEST['idthuoctinh'];

            $tt = new ThuocTinh();
            $kq = $tt->ThuocTinhDelete($idthuoctinh);

            if ($kq) {
                header('location: ../../index.php?req=thuoctinhView&result=ok');
            } else {
                header('location: ../../index.php?req=thuoctinhView&result=notok');
            }
            break;

        case 'updatethuoctinh':
            $idthuoctinh = $_REQUEST['idthuoctinh'];
            $tenthuoctinh = $_REQUEST['tenthuoctinh'];
            $mota = $_REQUEST['mota'];
            if(file_exists($_FILES['fileimage']['tmp_name'])){
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            }else{
                $hinhanh = $_REQUEST['hinhanh'];
            }
            $tt = new ThuocTinh();
            $kq = $tt->ThuocTinhUpdate($tenthuoctinh, $mota, $hinhanh, $idthuoctinh);

            if ($kq) {
                header('location: ../../index.php?req=thuoctinhView&result=ok');
            } else {
                header('location: ../../index.php?req=thuoctinhView&result=notok');
            }
            break;

        default:
            header('location: ../../index.php?req=thuoctinhView');
            break;
    }
} else {
    header('location: ../../index.php?req=thuoctinhView');
}
?>
