<?php
$s = '../../element_LHK/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element_LHK/mod/database.php';
    if (!file_exists($f)) {
        $f = './administrator/element_LHK/mod/database.php';
    }
}
require_once $f;

class nhanvien extends Database
{
    // Lấy tất cả nhân viên
    public function NhanvienGetAll()
    {
        $sql = 'SELECT * FROM nhanvien';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    // Thêm nhân viên mới
    public function NhanvienAdd($hoten, $ngaysinh, $diachi, $sdt, $email, $chucvu)
    {
        $sql = "INSERT INTO nhanvien (hoten, ngaysinh, diachi, sdt, email, chucvu) VALUES (?, ?, ?, ?, ?, ?)";
        $data = array($hoten, $ngaysinh, $diachi, $sdt, $email, $chucvu);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    // Xóa nhân viên theo id
    public function NhanvienDelete($idnhanvien)
    {
        $sql = "DELETE FROM nhanvien WHERE idnhanvien = ?";
        $data = array($idnhanvien);
    
        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    

    // Cập nhật thông tin nhân viên
    public function NhanvienUpdate($idnhanvien, $hoten, $ngaysinh, $diachi, $sdt, $email, $chucvu)
    {
        $sql = "UPDATE nhanvien SET hoten=?, ngaysinh=?, diachi=?, sdt=?, email=?, chucvu=? WHERE idnhanvien=?";
        $data = array($hoten, $ngaysinh, $diachi, $sdt, $email, $chucvu, $idnhanvien);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }

    // Lấy thông tin nhân viên theo id
    public function NhanvienGetById($idnhanvien)
    {
        $sql = 'SELECT * FROM nhanvien WHERE idnhanvien = ?';
        $data = array($idnhanvien);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }
}
?>
