<h2>Cập nhật thuộc tính</h2>
<?php
    require '../../element_LHK/class/thuoctinhCls.php'; 

    if (isset($_GET['idthuoctinh'])) {
        $idthuoctinh = $_GET['idthuoctinh'];
        $ttObj = new ThuocTinh();
        $getTtUpdate = $ttObj->ThuocTinhGetById($idthuoctinh);
    }
?>

<div>
    <form name="updatethuoctinh" id="formupdatethuoctinh" method="post" action='./element_LHK/mthuoctinh/thuoctinhAct.php?reqact=updatethuoctinh' enctype="multipart/form-data">
        <input type="hidden" name="idthuoctinh" value="<?php echo $getTtUpdate->idthuoctinh; ?>"/>
        <table>
            <tr>
                <td> Tên thuộc tính: </td>
                <td><input type="text" name="tenthuoctinh" value="<?php echo $getTtUpdate->tenthuoctinh; ?>" required></td>
            </tr>
            <tr>
                <td> Mô tả: </td>
                <td><input type="text" name="mota" value="<?php echo $getTtUpdate->mota; ?>" required></td>
                </tr>
            <tr>

                <td> Hình ảnh: </td>
                <td>
                    <?php if (!empty($getTtUpdate->hinhanh))  ?>
                    <img width="150px" src="data:image/png;base64,<?php echo $getTtUpdate->hinhanh; ?>"><br>
                    
                    <input type="file" name="fileimage">
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"></td>
                <td><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
