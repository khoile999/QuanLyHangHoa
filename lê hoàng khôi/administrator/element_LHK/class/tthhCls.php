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

class ThuocTinhHangHoa extends Database
{
    public function ThuocTinhHangHoaGetAll()
    {
        $sql = 'SELECT * FROM tthh';

        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function ThuocTinhHangHoaAdd($idthuoctinh, $idhanghoa, $giatri, $ghichu)
    {
        $sql = "INSERT INTO tthh (idthuoctinh, idhanghoa, giatri, ghichu) VALUES (?, ?, ?, ?)";
        $data = array($idthuoctinh,$idhanghoa, $giatri, $ghichu);

        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }

    public function ThuocTinhHangHoaDelete($idtthh)
    {
        $sql = "DELETE FROM tthh WHERE idtthh = ?";
        $data = array($idtthh);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }

    public function ThuocTinhHangHoaUpdate($idtthh, $idthuoctinh, $giatri, $ghichu)
    {
        $sql = "UPDATE tthh SET idthuoctinh=?, giatri=?, ghichu=? WHERE idtthh=?";
        $data = array($idthuoctinh, $giatri, $ghichu, $idtthh);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }

    public function ThuocTinhHangHoaGetById($idtthh)
    {
        $sql = 'SELECT * FROM tthh WHERE idtthh = ?';
        $data = array($idtthh);

        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

}
?>
