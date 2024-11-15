<h2>Cập nhật Thông Tin Khách Hàng</h2>
<?php
    require '../../element_LHK/class/khachhangCls.php'; 

    if (isset($_GET['idkhachhang'])) {
        $idkhachhang = $_GET['idkhachhang'];
        $khachhangObj = new khachhang();
        $getKhachhangUpdate = $khachhangObj->KhachhangGetByID($idkhachhang);
    }
?>

<div>
    <form name="updatekhachhang" id="formupdatekh" method="post" action='./element_LHK/mkhachhang/khachhangAct.php?reqact=updatekhachhang'>
        <input type="hidden" name="idkhachhang" value="<?php echo $getKhachhangUpdate->idkhachhang; ?>"/>
        
        <table>
            <tr>
                <td> Họ Tên: </td>
                <td><input type="text" name="hoten" value="<?php echo $getKhachhangUpdate->hoten; ?>" required></td>
            </tr>
            <tr>
                <td> Email: </td>
                <td><input type="email" name="email" value="<?php echo $getKhachhangUpdate->email; ?>" required></td>
            </tr>
            <tr>
                <td> Số Điện Thoại: </td>
                <td><input type="text" name="sdt" value="<?php echo $getKhachhangUpdate->sdt; ?>" required></td>
            </tr>
            <tr>
                <td> Địa Chỉ: </td>
                <td><input type="text" name="diachi" value="<?php echo $getKhachhangUpdate->diachi; ?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"></td>
                <td><b id="noteFrom"></b></td>
            </tr>
        </table>
    </form>
</div>
