<div>Quản lý Thuộc tính hàng hóa</div>
<hr>
<div> Thêm thuộc tính hàng hóa </div>
<div>
    
    <form name="newthuoctinhhanghoa" id="formaddthuoctinhhanghoa" method="post" action='./element_LHK/mtthh/tthhAct.php?reqact=addnew' enctype="multipart/form-data">
        <table>
            <tr>
                <td> Thuộc tính: </td>
                <td>
                    <select name="idthuoctinh">
                        <?php
                       
                        require './element_LHK/class/thuoctinhCls.php';
                        $ttObj = new ThuocTinh();
                        $list_tt = $ttObj->ThuocTinhGetAll();
                        foreach ($list_tt as $tt) {
                            echo "<option value='" . $tt->idthuoctinh . "'>" . $tt->tenthuoctinh . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <tr>
                <td> Chọn Hàng Hóa: </td>
               
                <td>
                    <?php
                    require './element_LHK/mod/HanghoaCls.php';
                    $hhObj = new HangHoa();
                    $list_hh = $hhObj->HangHoaGetAll();
                    foreach ($list_hh as $hh) {
                    ?>
                        <input type="radio" name="idhanghoa" value="<?php echo $hh->idhanghoa; ?>">
                      
                        <?php echo $hh->tenhanghoa; ?>
                        <br>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td> Giá trị: </td>
                <td><input type="text" name="giatri"></td>
            </tr>
            <tr>
                <td> Ghi chú: </td>
                <td><input type="text" name="ghichu"></td>
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

require './element_LHK/class/tthhCls.php';
$tthhObj = new ThuocTinhHangHoa();
$list_tthh = $tthhObj->ThuocTinhHangHoaGetAll();
$n = count($list_tthh);

  
?>

<div class="title_tthh">Danh sách thuộc tính hàng hóa</div>
<div class="content_tthh">
    Trong bản có: <span><?php echo $n; ?></span>
    <table class="table table-hover table-primary">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Thuộc tính</th>
                <th>Hàng hóa</th>
                <th>Giá trị</th>
                <th>Ghi chú</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($n > 0) {
            foreach ($list_tthh as $tthh) {
        ?>
                <tr>
                    <td><?php echo $tthh->idtthh; ?></td>
                    <td><?php echo $tthh->idthuoctinh; ?></td>
                    <td><?php echo $tthh->idhanghoa; ?></td>
                    <td><?php echo $tthh->giatri; ?></td>
                    <td><?php echo $tthh->ghichu; ?></td>
                    <td align="center">
                        <a href="./element_LHK/mtthh/tthhAct.php?reqact=deletetthh&idtthh=<?php echo $tthh->idtthh; ?>">
                            <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                        </a>
                        <img src="./img_LHK/updateicon.png" class="w_update_btn_open_tthh" data-id="<?php echo $tthh->idtthh; ?>" width="18" height="18">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="w_update_tthh">
    <div id="w_update_form_tthh"></div>
    <input type="button" value="Close" id="w_close_btn_tthh">
</div>
