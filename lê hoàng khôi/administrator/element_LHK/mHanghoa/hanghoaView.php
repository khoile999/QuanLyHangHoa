<div>Quản lý hàng hóa</div>
<hr>
<div>Thêm hàng hóa</div>
<?php
require './element_LHK/mod/loaihangCls.php';
$lhobj = new loaihang();
$list_lh = $lhobj->LoaihangGetAll();

require './element_LHK/class/thuonghieuCls.php';
$thobj = new thuonghieu();
$list_th = $thobj->ThuonghieuGetAll();

?>
<div>
    <form name="newhanghoa" id="formaddhanghoa" method="post" action='./element_LHK/mhanghoa/hanghoaAct.php?reqact=addnew' enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên hàng hóa</td>
                <td><input type="text" name="tenhanghoa" /></td>
            </tr>
            <tr>
                <td>Giá tham khảo</td>
                <td><input type="number" name="giathamkhao" /></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="mota" /></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="fileimage"></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <td>
                    <?php
                    foreach ($list_lh as $l) {
                    ?>
                        <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang; ?>">
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
                    foreach ($list_th as $th) {
                    ?>
                        <input type="radio" name="idthuonghieu" value="<?php echo $th->idthuonghieu; ?>">
                        <img class="iconbutton" src="data:image/png;base64,<?php echo $th->hinhanh; ?>">
                        <?php echo $th->tenthuonghieu; ?>
                        <br>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" class="btn btn-success"></td>
                <td><input type="reset" value="Làm lại" class="btn btn-danger"></td>
                <b id="noteForm"></b>
            </tr>
        </table>
    </form>
    <hr />
    <?php
    require './element_LHK/mod/hanghoaCls.php';
    $hhobj = new hanghoa();
    $list_hh = $hhobj->HanghoaGetAll();
    ?>
    <div class="title_hanghoa">Danh sách hàng hóa</div>
    <div class="content_hanghoa">
        Trong bảng có: <b><?php echo count($list_hh); ?></b>
        <table class="table table-hover table-primary">
            <thead class="table-danger">
                <th>ID</th>
                <th>Tên hàng hóa</th>
                <th>Giá tham khảo</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
              
                <th>Chức năng</th>
            </thead>
            <?php
            if (count($list_hh) > 0) {
                foreach ($list_hh as $hh) {
            ?>
                    <tr>
                        <td><?php echo $hh->idhanghoa; ?></td>
                        <td><?php echo $hh->tenhanghoa; ?></td>
                        <td><?php echo $hh->giathamkhao; ?></td>
                        <td><?php echo $hh->mota; ?></td>
                 
                   
                        <td align="center">
    <img class="iconbutton" src="data:image/png;base64,<?php echo $hh->hinhanh; ?>" width="50" height="50">
</td>

                    
                        <td align="center">
                            <?php if (isset($_SESSION['ADMIN'])) { ?>
                                <a href="./element_LHK/mhanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $hh->idhanghoa; ?>">
                                    <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                                </a>
                            <?php } else { ?>
                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                            <?php } ?>
                            <img src="./img_LHK/updateicon.png" class="w_update_btn_open_hh" data-id="<?php echo $hh->idhanghoa; ?>" width="18" height="18">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <div id="w_update_hh">
        <div id="w_update_form_hh"></div>
        <input type="button" value="close" id="w_close_btn_hh">
    </div>
</div>
