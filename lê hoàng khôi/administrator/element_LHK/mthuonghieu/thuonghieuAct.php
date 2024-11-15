<?php
session_start();
require '../../element_LHK/class/thuonghieuCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenthuonghieu = $_REQUEST['tenthuonghieu'];
            $mota = $_REQUEST['mota'];
            $hinhanh_file = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
           

            $th = new thuonghieu();
            $kq = $th->ThuonghieuAdd($tenthuonghieu, $mota, $hinhanh);

            if ($kq) {
                header('location: ../../index.php?req=thuonghieuView&result=ok');
            } else {
                header('location: ../../index.php?req=thuonghieuView&result=not ok');
            }
            break;

        case 'deletethuonghieu':
            $idthuonghieu = $_REQUEST['idthuonghieu'];
            $th = new thuonghieu();
            $kq = $th->ThuonghieuDelete($idthuonghieu);

            if ($kq) {
                header('location: ../../index.php?req=thuonghieuView&result=ok');
            } else {
                header('location: ../../index.php?req=thuonghieuView&result=not ok');
            }
            break;

        case 'updatethuonghieu':
            $idthuonghieu = $_REQUEST['idthuonghieu'];
            $tenthuonghieu = $_REQUEST['tenthuonghieu'];
            $mota = $_REQUEST['mota'];

            if (file_exists($_FILES['fileimage']['tmp_name'])) {
                $hinhanh_file = $_FILES['fileimage']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh_file)));
            } else {
                $hinhanh = $_REQUEST['hinhanh'];
            }


            $th = new thuonghieu();
            $kq = $th->ThuonghieuUpdate($idthuonghieu, $tenthuonghieu, $mota, $hinhanh);

            if ($kq) {
                header('location: ../../index.php?req=thuonghieuView&result=ok');
            } else {
                header('location: ../../index.php?req=thuonghieuView&result=not ok');
            }
            break;

        default:
            header('location: ../../index.php?req=thuonghieuView');
            break;
    }
} else {
    header('location: ../../index.php?req=thuonghieuView');
}
?>
