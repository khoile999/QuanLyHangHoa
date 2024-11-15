<div>Quản lý Thuộc Tính</div>
<hr>
<div>Thêm Thuộc Tính</div>
<div>
    <form name="newthuoctinh" id="formaddthuoctinh" method="post" action='./element_LHK/mthuoctinh/thuoctinhAct.php?reqact=addnew' enctype="multipart/form-data">
        <table>
            <tr>
                <td> Tên thuộc tính: </td>
                <td><input type="text" name="tenthuoctinh"></td>
            </tr>
            <tr>
                <td> Mô tả: </td>
                <td><input type="text" name="mota"></td>
            </tr>
            <tr>
                <td> Hình ảnh: </td>
                <td><input type="file" name="fileimage"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" class="btn btn-success"></td>
                <td><input type="reset" value="Làm lại" class="btn btn-danger"></td>
                <b id="noteForm"></b>
            </td>
            </tr>
        </table>
    </form>
</div>
<hr />
<?php
require './element_LHK/class/thuoctinhCls.php';  
$ttObj = new ThuocTinh();
$list_tt = $ttObj->ThuocTinhGetAll(); 
$l = count($list_tt);
?>
<div class="title_thuoctinh">Danh sách Thuộc Tính</div>
<div class="content_thuoctinh">
    Trong bản có: <span><?php echo $l; ?></span>
    <table class="table table-hover table-primary">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Tên thuộc tính</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
       
        if ($l > 0) {
            foreach ($list_tt as $tt) {
        ?>
                <tr>
                    <td><?php echo $tt->idthuoctinh; ?></td>
                    <td><?php echo $tt->tenthuoctinh; ?></td>
                    <td><?php echo $tt->mota; ?></td>
                    <td align="center">
    <img class="iconbutton" src="data:image/png;base64,<?php echo $tt->hinhanh; ?>" width="50" height="50">
</td>
                    <td align="center">
                        
                        <?php if(isset($_SESSION['ADMIN'])) { ?>
                            <a href="./element_LHK/mthuoctinh/thuoctinhAct.php?reqact=deletethuoctinh&idthuoctinh=<?php echo $tt->idthuoctinh; ?>">
                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                            </a>
                        <?php } else { ?>
                            <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                        <?php } ?>
                        <img src="./img_LHK/updateicon.png" class="w_update_btn_open_tt" data-id="<?php echo $tt->idthuoctinh; ?>" width="18" height="18">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="w_update_tt">
    <div id="w_update_form_tt"></div>
    <input type="button" value="Close" id="w_close_btn_tt">
</div>
