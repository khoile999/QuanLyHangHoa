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

class khachhang extends Database
{
    public function KhachhangGetAll()
    {
        $sql = 'SELECT * FROM khachhang';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function KhachhangAdd($hoten, $email, $sdt, $diachi)
    {
        $sql = "INSERT INTO khachhang (hoten, email, sdt, diachi) VALUES (?, ?, ?, ?)";
        $data = array($hoten, $email, $sdt, $diachi);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function KhachhangDelete($idkhachhang)
    {
        $sql = "DELETE FROM khachhang WHERE idkhachhang = ?";
        $data = array($idkhachhang);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function KhachhangUpdate($idkhachhang, $hoten, $email, $sdt, $diachi)
    {
        $sql = "UPDATE khachhang SET hoten=?, email=?, sdt=?, diachi=? WHERE idkhachhang=?";
        $data = array($hoten, $email, $sdt, $diachi, $idkhachhang);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }

    public function KhachhangGetById($idkhachhang)
    {
        $sql = 'SELECT * FROM khachhang WHERE idkhachhang = ?';
        $data = array($idkhachhang);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }
}
?>
