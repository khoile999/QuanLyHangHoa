<h2>Cập nhật Thương Hiệu</h2>
<?php
    require '../../element_LHK/class/thuonghieuCls.php'; 

    if (isset($_GET['idthuonghieu'])) {
        $idthuonghieu = $_GET['idthuonghieu'];
        $thObj = new thuonghieu();
        $getThUpdate = $thObj->ThuonghieuGetbyID($idthuonghieu);
    }
?>

<div>
    <form name="updatethuonghieu" id="formupdateth" method="post" action='./element_LHK/mthuonghieu/thuonghieuAct.php?reqact=updatethuonghieu' enctype="multipart/form-data">
        <input type="hidden" name="idthuonghieu" value="<?php echo $getThUpdate->idthuonghieu; ?>"/>
        <input type="hidden" name="hinhanh" value="<?php echo $getThUpdate->hinhanh; ?>" />
        <table>
            <tr>
                <td> Tên thương hiệu: </td>
                <td><input type="text" name="tenthuonghieu" value="<?php echo $getThUpdate->tenthuonghieu; ?>" required></td>
            </tr>
            <tr>
                <td> Mô tả: </td>
                <td><input type="text" name="mota" value="<?php echo $getThUpdate->mota; ?>" required></td>
            </tr>
            <tr>
                <td> Hình ảnh: </td>
                <td>
                    <?php if (!empty($getThUpdate->hinhanh))  ?>
                    <img width="150px" src="data:image/png;base64,<?php echo $getThUpdate->hinhanh; ?>"><br>
                    
                    <input type="file" name="fileimage">
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"></td>
                <td><b id="noteFrom"></b></td>
            </tr>
        </table>
    </form>
</div>
