<div> Thêm thương hiệu </div>
<div>
    <form name="newthuonghieu" id="formaddthuonghieu" method="post" action='./element_LHK/mthuonghieu/thuonghieuAct.php?reqact=addnew' enctype="multipart/form-data"> 
        <table>
            <tr>
                <td> Tên thương hiệu: </td>
                <td><input type="text" name="tenthuonghieu" required></td>
            </tr>
            <tr>
                <td> Mô tả: </td>
                <td><input type="text" name="mota" required></td>
            </tr>
            <tr>
                <td> Hình ảnh: </td>
                <td><input type="file" name="fileimage"></td>
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
require './element_LHK/class/thuonghieuCls.php';  
$thObj = new thuonghieu();
$list_th = $thObj->ThuonghieuGetAll(); 
$n = count($list_th);
?>
<div class="title_thuonghieu">Danh sách thương hiệu </div>
<div class="content_thuonghieu">
    Trong bản có: <span><?php echo $n; ?></span>
    <table class="table table-hover table-primary">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Tên thương hiệu</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($n > 0) {
            foreach ($list_th as $th) {
        ?>
                <tr>
                    <td><?php echo $th->idthuonghieu; ?></td>
                    <td><?php echo $th->tenthuonghieu; ?></td>
                    <td><?php echo $th->mota; ?></td>
                    
                               
                    <td align="center">
    <img class="iconbutton" src="data:image/png;base64,<?php echo $th->hinhanh; ?>" width="50" height="50">
</td>

                    
                    <td align="center">
                        <?php if(isset($_SESSION['ADMIN'])) { ?>
                            <a href="./element_LHK/mthuonghieu/thuonghieuAct.php?reqact=deletethuonghieu&idthuonghieu=<?php echo $th->idthuonghieu; ?>">
                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                            </a>
                        <?php } else { ?>
                            <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                        <?php } ?>
                        <img src="./img_LHK/updateicon.png" class="w_update_btn_open_th" data-id="<?php echo $th->idthuonghieu; ?>" width="18" height="18">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="w_update_th">
        <div id="w_update_form_th"></div>
        <input type="button" value="close" id="w_close_btn_th">
    </div>
