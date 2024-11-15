<?php
session_start();
require '../../element_LHK/class/tthhCls.php';

if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $idthuoctinh = $_REQUEST['idthuoctinh'];
            $idhanghoa = $_REQUEST['idhanghoa'];  
            $giatri = $_REQUEST['giatri'];       
            $ghichu = $_REQUEST['ghichu'];     

            // Tạo đối tượng và gọi hàm thêm mới thuộc tính hàng hóa
            $tthh = new ThuocTinhHangHoa();
            $kq = $tthh->ThuocTinhHangHoaAdd($idthuoctinh,$idhanghoa, $giatri, $ghichu);

      
            if ($kq) {
                header('location: ../../index.php?req=tthhView&result=ok');
            } else {
                header('location: ../../index.php?req=tthhView&result=not ok');
            }
            break;

        case 'deletetthh':
            $idtthh = $_REQUEST['idtthh'];  
            $tthh = new ThuocTinhHangHoa();
            $kq = $tthh->ThuocTinhHangHoaDelete($idtthh);

            if ($kq) {
                header('location: ../../index.php?req=tthhView&result=ok');
            } else {
                header('location: ../../index.php?req=tthhView&result=not ok');
            }
            break;

        case 'updatetthh':
            $idtthh = $_REQUEST['idtthh']; 
            $idthuoctinh = $_REQUEST['idthuoctinh']; 
            $idhanghoa = $_REQUEST['idhanghoa']; 
            $giatri = $_REQUEST['giatri'];           
            $ghichu = $_REQUEST['ghichu'];          

          
            $tthh = new ThuocTinhHangHoa();
            $kq = $tthh->ThuocTinhHangHoaUpdate($idtthh, $idthuoctinh, $giatri, $ghichu);

            if ($kq) {
                header('location: ../../index.php?req=tthhView&result=ok');
            } else {
                header('location: ../../index.php?req=tthhView&result=not ok');
            }
            break;

        default:
            header('location: ../../index.php?req=tthhView');
            break;
    }
} else {
    header('location: ../../index.php?req=tthhView');
}
?>
