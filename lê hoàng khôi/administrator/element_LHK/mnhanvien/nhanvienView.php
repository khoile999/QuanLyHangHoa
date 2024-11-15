<div> Thêm nhân viên </div>
<div>
    <form name="newnhanvien" id="formaddnhanvien" method="post" action='./element_LHK/mnhanvien/nhanvienAct.php?reqact=addnew' enctype="multipart/form-data"> 
        <table>
            <tr>
                <td> Họ tên: </td>
                <td><input type="text" name="hoten" required></td>
            </tr>
            <tr>
                <td> Ngày sinh: </td>
                <td><input type="date" name="ngaysinh" required></td>
            </tr>
            <tr>
                <td> Địa chỉ: </td>
                <td><input type="text" name="diachi" required></td>
            </tr>
            <tr>
                <td> Số điện thoại: </td>
                <td><input type="text" name="sdt" required></td>
            </tr>
            <tr>
                <td> Email: </td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td> Chức vụ: </td>
                <td><input type="text" name="chucvu" required></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" class="btn btn-success"></td>
                <td><input type="reset" value="Làm lại" class="btn btn-danger"></td>
            </tr>
        </table>
    </form>
</div>
<hr />
<?php
require './element_LHK/class/nhanvienCls.php';  
$nvObj = new nhanvien();
$list_nv = $nvObj->NhanvienGetAll(); 
$n = count($list_nv);
?>
<div class="title_nhanvien">Danh sách nhân viên</div>
<div class="content_nhanvien">
    Trong bản có: <span><?php echo $n; ?></span>
    <table class="table table-hover table-primary">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Chức vụ</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($n > 0) {
            foreach ($list_nv as $nv) {
        ?>
                <tr>
                    <td><?php echo $nv->idnhanvien; ?></td>
                    <td><?php echo $nv->hoten; ?></td>
                    <td><?php echo $nv->ngaysinh; ?></td>
                    <td><?php echo $nv->diachi; ?></td>
                    <td><?php echo $nv->sdt; ?></td>
                    <td><?php echo $nv->email; ?></td>
                    <td><?php echo $nv->chucvu; ?></td>
                    <td align="center">
                        <?php if(isset($_SESSION['ADMIN'])) { ?>
                            <a href="./element_LHK/mnhanvien/nhanvienAct.php?reqact=deletenhanvien&idnhanvien=<?php echo $nv->idnhanvien; ?>">
                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                            </a>
                        <?php } else { ?>
                            <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                        <?php } ?>
                        <img src="./img_LHK/updateicon.png" class="w_update_btn_open_nv" data-id="<?php echo $nv->idnhanvien; ?>" width="18" height="18">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="w_update_nv">
        <div id="w_update_form_nv"></div>
        <input type="button" value="close" id="w_close_btn_nv">
</div>
