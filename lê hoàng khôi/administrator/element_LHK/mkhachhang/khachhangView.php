<div>Quản lý Khách hàng</div>
<hr>
<div> Thêm khách hàng </div>
<div>
    <form name="newkhachhang" id="formaddkhachhang" method="post" action='./element_LHK/mkhachhang/khachhangAct.php?reqact=addnew' enctype="multipart/form-data">
        <table>
            <tr>
                <td> Họ tên: </td>
                <td><input type="text" name="hoten"></td>
            </tr>
            <tr>
                <td> Email: </td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td> Số điện thoại: </td>
                <td><input type="text" name="sdt"></td>
            </tr>
            <tr>
                <td> Địa chỉ: </td>
                <td><input type="text" name="diachi"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" class="btn btn-success"></td>
                <td><input type="reset" value="Làm lại" class="btn btn-danger"></td>
                <b id="noteForm"></b>
            </tr>
        </table>
    </form>
</div>
<hr />
<?php
require './element_LHK/class/khachhangCls.php'; 
$khObj = new khachhang();
$list_kh = $khObj->KhachhangGetAll(); 
$n = count($list_kh);
?>
<div class="title_khachhang">Danh sách khách hàng </div>
<div class="content_khachhang">
    Trong bản có: <span><?php echo $n; ?></span>
    <table class="table table-hover table-primary">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($n > 0) {
            foreach ($list_kh as $kh) {
        ?>
                <tr>
                    <td><?php echo $kh->idkhachhang; ?></td>
                    <td><?php echo $kh->hoten; ?></td>
                    <td><?php echo $kh->email; ?></td>
                    <td><?php echo $kh->sdt; ?></td>
                    <td><?php echo $kh->diachi; ?></td>
                    <td align="center">
                        <?php if(isset($_SESSION['ADMIN'])) { ?>
                            <a href="./element_LHK/mkhachhang/khachhangAct.php?reqact=deletekhachhang&idkhachhang=<?php echo $kh->idkhachhang; ?>">
                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                            </a>
                        <?php } else { ?>
                            <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                        <?php } ?>
                        <img src="./img_LHK/updateicon.png" class="w_update_btn_open_kh" data-id="<?php echo $kh->idkhachhang; ?>" width="18" height="18">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="w_update_kh">
    <div id="w_update_form_kh"></div>
    <input type="button" value="Close" id="w_close_btn_kh">
</div>
