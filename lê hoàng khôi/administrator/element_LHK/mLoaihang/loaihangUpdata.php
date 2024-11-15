
<h2>Cập nhật loại hàng</h2>
<?php
    require '../../element_LHK/mod/loaihangCls.php'; 

    if (isset($_GET['idloaihang'])) 
        $idloaihang = $_GET['idloaihang'];
        $lhObj = new loaihang();
        $getLhUpdate = $lhObj->LoaihangGetbyID($idloaihang);
    
?>

<div>
    <form name="updateloaihang" id="formupdatelh" method="post" action='./element_LHK/mLoaihang/loaihangAct.php?reqact=updateloaihang' enctype="multipart/form-data">
        <input type="hidden" name="idloaihang" value="<?php echo $getLhUpdate->idloaihang; ?>"/>
        <input type="hidden" name="hinhanh" value="<?php echo $getLhUpdate->hinhanh; ?>"/>
        <table>
            <tr>
                <td> Tên loại hàng: </td>
                <td><input type="text" name="tenloaihang" value="<?php echo $getLhUpdate->tenloaihang; ?>" required></td>
            </tr>
            <tr>
                <td> Mô tả: </td>
                <td><input type="text" name="mota" value="<?php echo $getLhUpdate->mota; ?>" required></td>
            </tr>
            <tr>
                <td> Hình ảnh: </td>
                <td><input type="file" name="fileimage"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cập nhật"></td>
                <td><b id="noteFrom"></b></td>
            </tr>
        </table>
    </form>
    <img src="data:image/png;base64,<?php echo $getLhUpdate->hinhanh; ?>" width="50">
</div>
