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
class Dongia extends Database
{
    public function DongiaGetAll()
    {
        $sql = 'select * from Dongia';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function DongiaAdd($idHangHoa, $tenHangHoa, $giaBan, $ngayApDung, $ngayKetThuc, $dieuKien, $ghiChu)
    {
        $sql = "INSERT INTO dongia (idHangHoa, tenhanghoa, giaBan, ngayApDung, ngayKetThuc, dieuKien, ghiChu) VALUES (?,?,?,?,?,?,?)";
        $data = array($idHangHoa, $tenHangHoa, $giaBan, $ngayApDung, $ngayKetThuc, $dieuKien, $ghiChu);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function DongiaDelete($idDongia)
    {
        $sql = "DELETE from Dongia where idDongia = ?";
        $data = array($idDongia);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function DongiaUpdate($idDonGia, $idHangHoa, $tenHangHoa, $giaBan, $ngayApDung, $ngayKetThuc, $dieuKien, $ghiChu)
    {
        $sql = "UPDATE dongia SET idHangHoa=?, tenhanghoa=?, giaBan=?, ngayApDung=?, ngayKetThuc=?, dieuKien=?, ghiChu=? WHERE idDonGia=?";
        $data = array($idHangHoa, $tenHangHoa, $giaBan, $ngayApDung, $ngayKetThuc, $dieuKien, $ghiChu, $idDonGia);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function DongiaGetbyId($idDongia)
    {
        $sql = 'select * from dongia where idDonGia=?';
        $data = array($idDongia);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function DongiaGetbyIdloaihang($idloaihang)
    {
        $sql = 'select * from Dongia where idloaihang=?';
        $data = array($idloaihang);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
    public function HanghoaUpdatePrice($idhanghoa, $giaban)
    {
        $sql = "UPDATE hanghoa SET giathamkhao = ? WHERE idhanghoa = ?";
        $data = array($giaban, $idhanghoa);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
}