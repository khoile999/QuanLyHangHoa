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

class thuonghieu extends Database
{
    // Lấy tất cả thương hiệu
    public function ThuonghieuGetAll()
    {
        $sql = 'SELECT * FROM thuonghieu';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    // Thêm thương hiệu mới với hình ảnh
    public function ThuonghieuAdd($tenthuonghieu, $mota, $hinhanh)
    {
        $sql = "INSERT INTO thuonghieu (tenthuonghieu, mota, hinhanh) VALUES (?, ?, ?)";
        $data = array($tenthuonghieu, $mota, $hinhanh);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    // Xóa thương hiệu theo id
    public function ThuonghieuDelete($idthuonghieu)
    {
        $sql = "DELETE FROM thuonghieu WHERE idthuonghieu = ?";
        $data = array($idthuonghieu);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    // Cập nhật thông tin thương hiệu
    public function ThuonghieuUpdate($idthuonghieu, $tenthuonghieu, $mota, $hinhanh)
    {
        $sql = "UPDATE thuonghieu SET tenthuonghieu=?, mota=?, hinhanh=? WHERE idthuonghieu=?";
        $data = array($tenthuonghieu, $mota, $hinhanh, $idthuonghieu);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }

    // Lấy thương hiệu theo id
    public function ThuonghieuGetById($idthuonghieu)
    {
        $sql = 'SELECT * FROM thuonghieu WHERE idthuonghieu = ?';
        $data = array($idthuonghieu);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }
}
?>
