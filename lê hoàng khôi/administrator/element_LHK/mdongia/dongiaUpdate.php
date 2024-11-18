<div align="center">Cập nhật đơn giá</div>
<hr>
<?php
require '../../element_LHK/class/dongiaCls.php';
require '../../element_LHK/mod/hanghoaCls.php';

$idDonGia = $_GET['iddongia'];
$dongiaObj = new Dongia();
$getLhUpdate = $dongiaObj->DongiaGetbyId($idDonGia);

// Get list of hanghoa for dropdown
$hanghoaObj = new Hanghoa();
$list_hh = $hanghoaObj->HanghoaGetAll();
?>

<div>
    <form name="updatedongia" method="post" action='./element_LHK/mdongia/dongiaAct.php?reqact=updatedongia' enctype="multipart/form-data">
        <input type="hidden" name="idDonGia" value="<?php echo $getLhUpdate->idDonGia; ?>">
   
        <table>
            <tr>
                <td>Hàng hóa:</td>
                <td>
                    <select name="idHangHoa" id="hanghoaSelect" onchange="updateTenHangHoa()">
                        <option value="">-- Chọn hàng hóa --</option>
                        <?php foreach ($list_hh as $hh) { ?>
                            <option value="<?php echo $hh->idhanghoa; ?>" 
                                    <?php echo ($hh->idhanghoa == $getLhUpdate->idHangHoa) ? 'selected' : ''; ?>
                                    data-name="<?php echo $hh->tenhanghoa; ?>">
                                <?php echo $hh->tenhanghoa; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên hàng hóa:</td>
                <td><input type="text" name="tenHangHoa" id="tenHangHoa" value="<?php echo $getLhUpdate->tenhanghoa; ?>" readonly /></td>
            </tr>
            <tr>
                <td>Giá Bán:</td>
                <td><input type="number" name="giaBan" value="<?php echo $getLhUpdate->giaBan; ?>" required /></td>
            </tr>
            <tr>
                <td>Ngày áp dụng:</td>
                <td><input type="date" name="ngayApDung" value="<?php echo $getLhUpdate->ngayApDung; ?>" required /></td>
            </tr>
            <tr>
                <td>Ngày Kết Thúc:</td>
                <td><input type="date" name="ngayKetThuc" value="<?php echo $getLhUpdate->ngayKetThuc; ?>" required /></td>
            </tr>
            <tr>
                <td>Điều kiện:</td>
                <td><input type="text" name="dieuKien" value="<?php echo $getLhUpdate->dieuKien; ?>" /></td>
            </tr>
            <tr>
                <td>Ghi Chú:</td>
                <td><input type="text" name="ghiChu" value="<?php echo $getLhUpdate->ghiChu; ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" value="Cập nhật" class="btn btn-success" /></td>
                <td><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>

<script>
function updateTenHangHoa() {
    var select = document.getElementById("hanghoaSelect");
    var selectedOption = select.options[select.selectedIndex];
    var tenHangHoa = selectedOption.getAttribute("data-name");
    document.getElementById("tenHangHoa").value = tenHangHoa;
}
</script>