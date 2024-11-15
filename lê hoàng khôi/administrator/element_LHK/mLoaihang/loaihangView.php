<div>Quản lý Loại hàng </div>
    <hr>
    <div> Thêm loại hàng </div>
    <div>
        <form name="newloaihang" id="formaddloaihang" method="post" action='./element_LHK/mLoaihang/loaihangAct.php?reqact=addnew' enctype="multipart/form-data">
            <table>
                <tr>
                    <td> Tên loại hàng: </td>
                    <td><input type="text" name="tenloaihang"></td>
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
    require './element_LHK/mod/loaihangCls.php';  
    $lhObj = new loaihang();
    $list_lh = $lhObj->LoaihangGetAll(); 
    $l = count($list_lh);
    ?>
    <div class="title_loaihang">Danh sách loại hàng </div>
    <div class="content_loaihang">
        Trong bản có: <span><?php echo $l; ?></span>
        <table class="table table-hover table-primary">
        <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Tên loại hàng</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
            <?php
          
            if ($l > 0) {
                foreach ($list_lh as $u) {
            ?>
                    <tr>
                        <td><?php echo $u->idloaihang; ?></td>
                        <td><?php echo $u->tenloaihang; ?></td>
                        <td><?php echo $u->mota; ?></td>
                        <td align="center">
                            <img class="iconbutton" src="data:image/png;base64,<?php echo $u->hinhanh; ?>" width="90" height="90">
                        </td>
                        <td align="center">
                            <?php if(isset($_SESSION['ADMIN'])) { ?>
                                <a href="./element_LHK/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $u->idloaihang; ?>">
                                    <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                                </a>
                            <?php } else { ?>
                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                            <?php } ?>
                            <img src="./img_LHK/updateicon.png" class="w_update_btn_open" data-id="<?php echo $u->idloaihang; ?>" width="18" height="18">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <div id="w_update">
        <div id="w_update_form"></div>
        <input type="button" value="Close" id="w_close_btn">
    </div>