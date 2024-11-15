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
class ThuocTinh extends Database
{
    // Lấy tất cả các thuộc tính
    public function ThuocTinhGetAll()
    {
        $sql = 'SELECT * FROM thuoctinh';
        
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
        return $getAll->fetchAll();
    }

    // Thêm mới một thuộc tính
    public function ThuocTinhAdd($tenthuoctinh, $mota, $hinhanh)
    {
        $sql = "INSERT INTO thuoctinh (tenthuoctinh, mota, hinhanh) VALUES (?, ?, ?)";
        $data = array($tenthuoctinh, $mota, $hinhanh);
        
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        
        return $add->rowCount();
    }

    // Xóa thuộc tính theo id
    public function ThuocTinhDelete($idthuoctinh)
    {
        $sql = "DELETE FROM thuoctinh WHERE idthuoctinh = ?";
        $data = array($idthuoctinh);
        
        $del = $this->connect->prepare($sql);
        $del->execute($data);
        
        return $del->rowCount();
    }

    // Cập nhật thuộc tính
    public function ThuocTinhUpdate($tenthuoctinh, $mota, $hinhanh, $idthuoctinh)
    {
        $sql = "UPDATE thuoctinh SET tenthuoctinh = ?, mota = ?, hinhanh = ? WHERE idthuoctinh = ?";
        $data = array($tenthuoctinh, $mota, $hinhanh, $idthuoctinh);
        
        $update = $this->connect->prepare($sql);
        $update->execute($data);
        
        return $update->rowCount();
    }

    // Lấy thông tin thuộc tính theo id
    public function ThuocTinhGetById($idthuoctinh)
    {
        $sql = 'SELECT * FROM thuoctinh WHERE idthuoctinh = ?';
        $data = array($idthuoctinh);
        
        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
}
?>
