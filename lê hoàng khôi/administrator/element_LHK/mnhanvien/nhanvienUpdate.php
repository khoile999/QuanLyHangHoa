<h2>Cập nhật Nhân Viên</h2>
<?php
    require '../../element_LHK/class/nhanvienCls.php'; 

    if (isset($_GET['idnhanvien'])) {
        $idnhanvien = $_GET['idnhanvien'];
        $nvObj = new nhanvien();
        $getNvUpdate = $nvObj->NhanvienGetbyID($idnhanvien);
    }
?>
<div>
    <form name="updatenhanvien" id="formupdatenv" method="post" action='./element_LHK/mnhanvien/nhanvienAct.php?reqact=updatenhanvien'>
        <input type="hidden" name="idnhanvien" value="<?php echo $getNvUpdate->idnhanvien; ?>"/>
        
        <table>
            <tr>
                <td> Họ tên: </td>
                <td><input type="text" name="hoten" value="<?php echo $getNvUpdate->hoten; ?>" required></td>
            </tr>
            <tr>
                <td> Ngày sinh: </td>
                <td><input type="date" name="ngaysinh" value="<?php echo $getNvUpdate->ngaysinh; ?>" required></td>
            </tr>
            <tr>
                <td> Địa chỉ: </td>
                <td><input type="text" name="diachi" value="<?php echo $getNvUpdate->diachi; ?>" required></td>
            </tr>
            <tr>
                <td> Số điện thoại: </td>
                <td><input type="text" name="sdt" value="<?php echo $getNvUpdate->sdt; ?>" required></td>
            </tr>
            <tr>
                <td> Email: </td>
                <td><input type="email" name="email" value="<?php echo $getNvUpdate->email; ?>" required></td>
            </tr>
            <tr>
                <td> Chức vụ: </td>
                <td><input type="text" name="chucvu" value="<?php echo $getNvUpdate->chucvu; ?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"></td>
                <td><b id="noteFrom"></b></td>
            </tr>
        </table>
    </form>
</div>
