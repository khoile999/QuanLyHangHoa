<?php
session_start();
require '../../element_LHK/mod/hanghoaCls.php';


if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            // Nhận dữ liệu từ form
            $tenhanghoa = $_REQUEST['tenhanghoa'];
            $giathamkhao = $_REQUEST['giathamkhao'];
            $mota = $_REQUEST['mota'];
            $idloaihang = $_REQUEST['idloaihang'];
            $idthuonghieu = $_REQUEST['idthuonghieu']; 
            $hinhanh_file = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));

            // Gọi phương thức thêm mới
            $lh = new hanghoa();
            $kq = $lh->HanghoaAdd($tenhanghoa, $mota, $giathamkhao, $hinhanh, $idloaihang, $idthuonghieu); 
            if ($kq) {
                header('location: ../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location: ../../index.php?req=hanghoaView&result=notok');
            }
            break;

        case 'deletehanghoa':
            $idhanghoa = $_REQUEST['idhanghoa'];
            $hh = new hanghoa();
            $kq = $hh->HanghoaDelete($idhanghoa);
            if ($kq) {
                header('location: ../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location: ../../index.php?req=hanghoaView&result=notok');
            }
            break;

        case 'updatehanghoa':
            $idhanghoa = $_REQUEST['idhanghoa'];
            $tenhanghoa = $_REQUEST['tenhanghoa'];
            $giathamkhao = $_REQUEST['giathamkhao'];
            $idloaihang = $_REQUEST['idloaihang'];
            $idthuonghieu = $_REQUEST['idthuonghieu'];
            $mota = $_REQUEST['mota'];

            if (file_exists($_FILES['fileimage']['tmp_name'])) {
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            } else {
                $hinhanh = $_REQUEST['hinhanh'];
            }

        
            $lh = new hanghoa();
            $kq = $lh->HanghoaUpdate($tenhanghoa, $hinhanh, $mota, $giathamkhao, $idloaihang, $idthuonghieu, $idhanghoa); 
            if ($kq) {
                header('location: ../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location: ../../index.php?req=hanghoaView&result=notok');
            }
            break;

        default:
            header('location: ../../index.php?req=hanghoaView');
            break;
    }
} else {
    header('location: ../../index.php?req=hanghoaView');
}
