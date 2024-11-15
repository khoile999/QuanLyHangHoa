
<?php
    if(isset($_GET['req'])){
        $request = $_GET['req'];
        switch ($request){
            case 'exjs':
                require './pageJS/exjs.php';
                break;
            case 'exjs02':
                require './pageJS/exjs02.php';
                break;
            case 'exjs03':
                require './pageJS/exjs03.php';
                break;
            case 'userview':
                require './element_LHK/mUser/userView.php';
                break;
            case 'hanghoaView':
                require'./element_LHK/mHanghoa/hanghoaView.php';
                    break;
            case 'updateuser':
                require './element_LHK/mUser/userUpdate.php';
                break;
            case 'loaihangView':
                require './element_LHK/mLoaihang/loaihangView.php';
                break;
            case 'nhanvienView':
                require './element_LHK/mnhanvien/nhanvienView.php';
                break;
            case 'thuonghieuView':
                require './element_LHK/mthuonghieu/thuonghieuView.php';
                break;
            case 'khachhangView':
                require './element_LHK/mkhachhang/khachhangView.php';
                break;
            case 'dongiaView':
                require './element_LHK/mdongia/dongiaView.php';
                break;
            case 'thuoctinhView':
                require './element_LHK/mthuoctinh/thuoctinhView.php';
                break;
            case 'tthhView':
                require './element_LHK/mtthh/tthhView.php';
                break;
                
        }
    }else{
        require './element_LHK/default.php';
    }
?>