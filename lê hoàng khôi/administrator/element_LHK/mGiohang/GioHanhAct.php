<?php
session_start();
    
     require '../../element_LHK/class/GiohangCls.php';
 
    if(isset($_GET['reqact'])){
        $requestAction = $_GET['reqact'];
        switch ($requestAction){
            case 'addnew':
                $idhanghoa =  $_REQUEST['idSanPham'];
                $tenhanghoa =  $_REQUEST['tenhanghoa'];
                $giathamkhao =  $_REQUEST['giathamkhao'];
                $mota =  $_REQUEST['mota'];
                // echo $idhanghoa . "<br>";
                // echo $tenhanghoa . "<br>";
                // echo $giathamkhao . "<br>";
                // echo $mota . "<br>";
                $gh = new giohang();
                $kq = $gh->giohangAdd($idhanghoa, $tenhanghoa, $giathamkhao, $mota);
                if ($kq) {
                    header('location: ../../index.php?req=GiohangView&result=ok');
                } else {
                    header('location: ../../index.php?req=GioHangView&result=notok');
                }
                break;
            case 'delete':
                $idGioHang = $_REQUEST['idGioHang'];
                // echo $idGioHang;
                $gh = new giohang();
                $kq = $gh->giohangDelete($idGioHang);
                if ($kq) {
                    header('location: ../../../apart/Cart.php');
                }
                break;
            
        
        }
    }
?>