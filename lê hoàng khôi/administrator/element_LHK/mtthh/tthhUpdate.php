<h2>Cập nhật Thuộc Tính Hàng Hóa</h2>
<?php
    require '../../element_LHK/class/tthhCls.php'; 

    if (isset($_GET['idtthh'])) {
        $idtthh = $_GET['idtthh'];
        $tthhObj = new ThuocTinhHangHoa();
        $getTthhUpdate = $tthhObj->ThuocTinhHangHoaGetByID($idtthh);
    }
?>

<div>
    <form name="updatetthh" id="formupdatetthh" method="post" action='./element_LHK/mtthh/tthhAct.php?reqact=updatetthh'>
        <input type="hidden" name="idtthh" value="<?php echo $getTthhUpdate->idtthh; ?>"/>
        
        <table>
        <tr>
                <td> id thuộc tính: </td>
                <td><input type="text" name="idthuoctinh" value="<?php echo $getTthhUpdate->idthuoctinh; ?>" required></td>
            </tr>
            <tr>
                <td> id hàng hóa: </td>
                <td><input type="text" name="idhanghoa" value="<?php echo $getTthhUpdate->idhanghoa; ?>" required></td>
            </tr>
            <tr>
                <td> Giá Trị: </td>
                <td><input type="text" name="giatri" value="<?php echo $getTthhUpdate->giatri; ?>" required></td>
            </tr>
            <tr>
                <td> Ghi Chú: </td>
                <td><input type="text" name="ghichu" value="<?php echo $getTthhUpdate->ghichu; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"></td>
                <td><b id="noteFrom"></b></td>
            </tr>
        </table>
    </form>
</div>
