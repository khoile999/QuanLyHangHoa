<div class="container-fluid">
    <div>Quản lý người dùng</div>
    <hr>
    <div>Người dùng mới</div>
    <div>
        <form name="newuser" id="formreg" method="post" action='./element_LHK/mUser/userAct.php?reqact=addnew'>
            <table class="table table-borderless">
                <tr>
                    <td>Tên đăng nhập:</td>
                    <td><input type="text" class="form-control" name="username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" class="form-control" name="password"></td>
                </tr>
                <tr>
                    <td>Họ Tên:</td>
                    <td><input type="text" class="form-control" name="hoten"></td>
                </tr>
                <tr>
                    <td>Giới Tính:</td>
                    <td>
                        Nam <input type="radio" name="gioitinh" value="1" checked="true" />
                        Nữ <input type="radio" name="gioitinh" value="0" />
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><input type="date" class="form-control" name="ngaysinh" /></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" class="form-control" name="diachi"></td>
                </tr>
                <tr>
                    <td>Điện thoại:</td>
                    <td><input type="tel" class="form-control" name="dienthoai"></td>
                </tr>
                <tr>
                    <td><input type="submit" id="btnsubmit" value="Tạo mới" class="btn btn-success"></td>
                    <td><input type="reset" value="Làm lại" class="btn btn-danger"></td>
                </tr>
            </table>
        </form>
        <hr />
        <?php
        require './element_LHK/mod/userCls.php';  // gọi thư viện để sử dụng được lớp userCls;
        $userObj = new user();
        $list_user = $userObj->UserGetAll(); // trả về danh sách đối tượng user
        $l = count($list_user);
        ?>
        <div class="title_user">Danh sách người dùng</div>
        <div class="content_user">
            Trong bản có: <span><?php echo $l; ?></span>
            <div class="table-responsive">
                <table class="table table-hover table-primary">
                    <thead class="table-danger">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Ngày đăng ký</th>
                            <th>Hoạt động</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // trong danh sách trả về có dữ liệu
                        if ($l > 0) {
                            foreach ($list_user as $u) {
                        ?>
                                <tr>
                                    <td><?php echo $u->iduser; ?></td>
                                    <td><?php echo $u->username; ?></td>
                                    <td><?php echo $u->password; ?></td>
                                    <td><?php echo $u->hoten; ?></td>
                                    <td align="center">
                                        <?php if ($u->gioitinh == 1) { ?>
                                            <img src="./img_LHK/boy.png" class="iconimg" style="width: 35px; height: 35px;">
                                        <?php } else { ?>
                                            <img src="./img_LHK/girl.png" class="iconimg" style="width: 35px; height: 35px;">
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $u->ngaysinh; ?></td>
                                    <td><?php echo $u->diachi; ?></td>
                                    <td><?php echo $u->dienthoai; ?></td>
                                    <td><?php echo $u->ngaydangky; ?></td>
                                    <td align="center">
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            if ($u->setlock == 1) { ?>
                                                <a href="./element_LHK/mUser/userAct.php?reqact=setlock&iduser=<?php echo $u->iduser; ?>&setlock=<?php echo $u->setlock; ?>">
                                                    <img src="./img_LHK/unlock.png" class="iconimg" style="width: 20px; height: 20px;">
                                                </a>
                                            <?php } else { ?>
                                                <a href="./element_LHK/mUser/userAct.php?reqact=setlock&iduser=<?php echo $u->iduser; ?>&setlock=<?php echo $u->setlock; ?>">
                                                    <img src="./img_LHK/lock.png" class="iconimg" style="width: 20px; height: 20px;">
                                                </a>
                                            <?php }
                                        } else {
                                            if ($u->setlock == 1) {
                                            ?>
                                                <img src="./img_LHK/unlock.png" class="iconimg" style="width: 20px; height: 20px;">
                                            <?php } else { ?>
                                                <img src="./img_LHK/lock.png" class="iconimg" style="width: 20px; height: 20px;">
                                            <?php }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                        ?>
                                            <a href="./element_LHK/mUser/userAct.php?reqact=deleteuser&iduser=<?php echo $u->iduser; ?>">
                                                <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                                            </a>
                                        <?php } else { ?>
                                            <img src="./img_LHK/idelete.png" class="iconimg" width="16" height="16">
                                        <?php }
                                        ?>
                                        <?php
                                        if (isset($_SESSION['USER']) && $u->username == 'admin') {
                                        ?>
                                            <img src="./img_LHK/update.png" class="iconimg" width="16" height="16">
                                        <?php } else { ?>
                                            <a href="index.php?req=updateuser&iduser=<?php echo $u->iduser; ?>">
                                                <img src="./img_LHK/update.png" class="iconimg" width="18" height="18">
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
