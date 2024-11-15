<?php
$s = '../../element_LHK/mod/database.php';
    if(file_exists($s)){
        $f = $s;
    }else{
        $f = './element_LHK/mod/database.php';
    }
    require_once $f;

    class user extends Database{
        public function UserCheckLogin ($username, $password){
            $sql = 'select * from user where username = ? and password = ? and  setlock = 1';
            $data = array($username, $password);

            $select = $this->connect->prepare($sql);
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute($data);

            $_get_obj = count($select->fetchAll());

            if($_get_obj === 1){
                return true;
            }else{
                return false;
            }
        }

        public function UserCheckUsername ($username){
            $sql = 'select * from user where username = ?';
            $data = array($username);

            $select = $this->connect->prepare($sql);
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute($data);

            $_get_obj = count($select->fetchAll());

            if($_get_obj === 1){
                return true;
            }else{
                return false;
            }
        }

        public function UserGetAll (){
            $sql = 'select * from user';

            $getAll = $this->connect->prepare($sql);
            $getAll->setFetchMode(PDO::FETCH_OBJ);
            $getAll->execute();
            return $getAll->fetchAll();
        }

        public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
            $sql = "INSERT INTO user (username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);
        
            // Chuẩn bị và thực thi câu lệnh
            $add = $this->connect->prepare($sql);
            $add->execute($data);
        
            // Kiểm tra xem người dùng đã được thêm thành công chưa
            if ($add->rowCount() > 0) {
                // Trả về ID của người dùng vừa được thêm
                return $this->connect->lastInsertId();
            } else {
                // Trả về false nếu thêm không thành công
                return false;
            }
        }
        

        public function UserDelete ($iduser){
            $sql = "DELETE from user where iduser = ?";
            $data = array($iduser);

            $del = $this->connect->prepare($sql);
            $del->execute($data);
            return $del->rowCount();
        }

        public function UserUpdate ($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser){
            $sql = "UPDATE user  set username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ? WHERE iduser =?";
            $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);

            $update = $this->connect->prepare($sql);
            $update->execute($data);
            return $update->rowCount();
        }

        public function UserGetbyID ($iduser){
            $sql = 'select *from user where iduser=?';
            $data = array($iduser);

            $getOne = $this->connect->prepare($sql);
            $getOne->setFetchMode(PDO::FETCH_OBJ);
            $getOne->execute($data);
            return $getOne->fetch();
        }

        public function UserSetPassword ($iduser, $password){
            $sql = "UPDATE user set password = ? WHERE  iduser =?";
            $data = array($password, $iduser);

            $update_pass = $this->connect->prepare($sql);
            $update_pass->execute($data);
            return $update_pass->rowCount();
        }

        public function UserSetActive ($iduser, $setlock){
            $sql = "UPDATE  user set setlock = ? WHERE iduser = ?";
            $data = array($setlock, $iduser);

            $update_lock = $this->connect->prepare($sql);
            $update_lock->execute($data);
            return $update_lock->rowCount();
        }

        public function UserChangePassword ($iduser, $passwordold, $passwordnew){
            $sql = 'select *from user where iduser=? and password =?';
            $data = array($iduser, $passwordold);

            $select = $this->connect->prepare($sql);
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute($data);

            $_get_obj =count($select->fetchAll());

            if($_get_obj === 1){
                $sql = "UPDATE user set password =? WHERE iduser = ?";
                $data = array($passwordnew, $iduser);
                $update_pass = $this->connect->prepare($sql);
                $update_pass->execute($data);
                return $update_pass->rowCount();
            }else{
                return false;
            }

            
        }
    }

        // $user = new user();
        // $row = $user->UserAdd('nlt','nltu1234','Lý Thần Thông','1','1911-11-10','phong điền, Ninh Kiều, Cần Thơ','0932289242');
        // echo $row;

    //kiểm tra usercheklogin ->ham nay kiem tra tai khoan khi dang nhap
    //  $user = new user();
    //  echo $user->UserCheckLogin('admin','admin1234');

    //kiem tra checkUsername ->ham nay de kiem tra co bi trung ten dang ky
        // $user = new user();
        // echo $user->UserCheckUsername('admin1');

    //kiem tra getAll ->dung de lay danh sach toan bo nguoi dung de hien thi
        //  $user = new user();
        //  $list = $user->UserGetAll(); //trả về là 1 danh sách đối tượng
        //  foreach ($list as $l){
        //     echo $l->hoten. '<br>';
        //  }

    //kiem thu xoa
        // $user = new user();
        // echo $user->UserDelete(9);

    //kiểm tra update
    //    $user = new user();
    //     $row = $user->UserAdd('nltu','nlt1234','Lý Thần','0','1921-11-10','Lê Lai, Bình Thủy, Cần Thơ','0932222242',10);
    //     echo $row;

    //kiem thu getid ->ok
        // $user = new user();
        // $obj = $user->UserGetbyID(10);
        // echo $obj->username . '<br>';
        // echo $obj->hoten . '<br>';
        // echo $obj->gioitinh . '<br>';
        // echo $obj->ngaysinh . '<br>';
        // echo $obj->diachi . '<br>';

    //kiem thu setPassword
        // $u = new user();
        // echo $u->UserSetPassword(11,'123456')

    //kiem thu setlock
        // $u = new user();
        // echo $u->UserSetPassword(11, 1)

     //kiem thu setActive
        // $u = new user();
        // echo $u->UserSetActive(11, 0);

    //kiem thu changePassword
        // $u = new user();
        // echo $u->UserChangePassword(11,1,'lamtan');
 ?>