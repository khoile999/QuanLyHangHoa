

    <?php
    require './element_LHK/class/GiohangCls.php';  
    $gh = new giohang();
    $list_gh = $gh->giohangGetAll(); 
    $l = count($list_gh);
    ?>
    <div class="title_loaihang">Danh sách gio hang </div>
    <div class="content_loaihang">
        Trong bản có: <span><?php echo $l; ?></span>
        <table class="table table-hover table-primary">
        <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>ID san pham</th>
                    <th>Tên san pham</th>
                    <th>Gia</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Trong danh sách trả về có dữ liệu
            if ($l > 0) {
                foreach ($list_gh as $u) {
            ?>
                    <tr>
                        <td><?php echo $u->idgiohang; ?></td>
                        <td><?php echo $u->idhanghoa; ?></td>
                        <td><?php echo $u->tenhanghoa; ?></td>
                        <td><?php echo $u->giathamkhao; ?>VND</td>
                        <td><?php echo $u->mota; ?></td>
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