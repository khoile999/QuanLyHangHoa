
    <h2>Quản lý người dùng</h2>
    <?php
        require './element_LHK/mod/userCls.php';
        // nhận dữ liệu đối tượng cần truy cập 
        $iduser = $_REQUEST['iduser'];
        // load dữ liệu đối tượng để truy cập
        $userObj = new user();
        $getUserUpdate = $userObj->UserGetbyID($iduser);
    ?>

    <div>
        <form name="updateuser" id="formupdate" method="post" action='./element_LHK/mUser/userAct.php?reqact=updateuser'>
            <input type="hidden" name="iduser" value="<?php echo $getUserUpdate->iduser; ?>"/>
            <table>
                <tr>
                    <td> Tên đăng nhập: </td>
                    <td><input type="text" name="username" value="<?php echo $getUserUpdate->username; ?>" required></td>
                </tr>
                <tr>
                    <td> Mật khẩu: </td>
                    <td><input type="password" name="password" value="<?php echo $getUserUpdate->password; ?>" required></td>
                </tr>
                <tr>
                    <td> Họ Tên: </td>
                    <td><input type="text" name="hoten" value="<?php echo $getUserUpdate->hoten; ?>" required></td>
                </tr>
                <tr>
                    <td> Giới Tính:</td>
                    <td>
                        Nam <input type="radio" name="gioitinh" value="1" <?php echo ($getUserUpdate->gioitinh == 1) ? 'checked' : ''; ?>/>
                        Nữ <input type="radio" name="gioitinh" value="0" <?php echo ($getUserUpdate->gioitinh == 0) ? 'checked' : ''; ?>/>
                    </td>
                </tr>
                <tr>
                    <td> Ngày sinh:</td>
                    <td><input type="date" name="ngaysinh" value="<?php echo $getUserUpdate->ngaysinh; ?>" required></td>
                </tr>
                <tr>
                    <td> Địa chỉ:</td>
                    <td><input type="text" name="diachi" value="<?php echo $getUserUpdate->diachi; ?>" required></td>
                </tr>
                <tr>
                    <td> Điện thoại:</td>
                    <td><input type="tel" name="dienthoai" value="<?php echo $getUserUpdate->dienthoai; ?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" id="btnsubmit" value="Update"></td>
                    <td><b id="noteFrom"></b></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

