<div align="center">Cập nhật hàng hóa</div>
<hr>
<?php

require '../../element_LHK/mod/hanghoaCls.php';
require '../../element_LHK/mod/loaihangCls.php';
require '../../element_LHK/class/thuonghieuCls.php'; 

$idhanghoa = $_REQUEST['idhanghoa'];
$lhobj = new hanghoa();
$getLhUpdate = $lhobj->HanghoaGetbyId($idhanghoa);

$obj = new loaihang();
$list_lh = $obj->LoaihangGetAll();

$thuonghieuObj = new thuonghieu(); 
$list_thuonghieu = $thuonghieuObj->ThuonghieuGetAll();
?>

<div>
    <form name="updatehanghoa" id="formupdatehh" method="post" action='./element_LHK/mhanghoa/hanghoaAct.php?reqact=updatehanghoa' enctype="multipart/form-data">
        <input type="hidden" name="idhanghoa" value="<?php echo $getLhUpdate->idhanghoa; ?>" />
        <input type="hidden" name="hinhanh" value="<?php echo $getLhUpdate->hinhanh; ?>" />
        <table>
            <tr>
                <td>Tên loại hàng</td>
                <td><input type="text" name="tenhanghoa" value="<?php echo $getLhUpdate->tenhanghoa; ?>" /></td>
            </tr>
            <tr>
                <td>Gía tham khảo</td>
                <td><input type="text" name="giathamkhao" value="<?php echo $getLhUpdate->giathamkhao; ?>" /></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" size="50" name="mota" value="<?php echo $getLhUpdate->mota; ?>" /></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <td>
                    <?php
                    foreach ($list_lh as $l) {
                    ?>
                        <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang; ?>"<?php if($l->idloaihang == $getLhUpdate->idloaihang){echo 'checked';}?>>
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $l->hinhanh; ?>">
                        <br>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Chọn thương hiệu:</td> 
                <td>
                    <?php
                    foreach ($list_thuonghieu as $th) {
                    ?>
                        <input type="radio" name="idthuonghieu" value="<?php echo $th->idthuonghieu; ?>"<?php if($th->idthuonghieu == $getLhUpdate->idthuonghieu){echo 'checked';}?>>
                        <?php echo $th->tenthuonghieu; ?>
                        <br>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <img width="150px" src="data:image/png;base64,<?php echo $getLhUpdate->hinhanh; ?>"><br>
                    <input type="file" name="fileimage">
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Update" size="50" /></td>
                <td><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
