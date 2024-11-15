<?php
$s = '../mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element_LHK/mod/database.php';
    if (!file_exists($f)) {
        $f = '../administrator/element_LHK/mod/database.php';
        if (!file_exists($f)) {
            die('Lỗi: Không tìm thấy tệp database.php');
        }
    }
}
require_once $f;
class giohang extends Database
{
    public function giohangGetAll()
    {
        $sql = 'select * from giohang';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function HanghoaGetbyId($idhanghoa)
    {
        $sql = 'select * from hanghoa where idhanghoa=?';
        $data = array($idhanghoa);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }
    public function giohangAdd($idhanghoa, $tenhanghoa, $giathamkhao, $mota)
    {   
        $sql = "INSERT INTO giohang (idhanghoa, tenhanghoa, giathamkhao, mota) VALUES (?,?,?,?)";
        $data = array($idhanghoa, $tenhanghoa, $giathamkhao, $mota);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function giohangDelete($idgiohang)
    {
        $sql = "DELETE from giohang where idgiohang = ?";
        $data = array($idgiohang);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function giohangUpdate($idSanpham, $soluong, $tenSanpham,$gia, $anhSanpham, $idgiohang)
    {
        $sql = "UPDATE giohang set idSanpham=?, soluong=?, tenSanpham=?, gia=?, anhSanpham=? WHERE idgiohang =?";
        $data = array($idSanpham, $soluong, $tenSanpham, $gia, $anhSanpham, $idgiohang);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function giohangGetbyId($idgiohang)
    {
        $sql = 'select * from giohang where idgiohang=?';
        $data = array($idgiohang);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function giohangGetbyanhSanpham($anhSanpham)
    {
        $sql = 'select * from giohang where anhSanpham=?';
        $data = array($anhSanpham);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
}
