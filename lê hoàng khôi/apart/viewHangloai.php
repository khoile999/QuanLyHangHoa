<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php
require './administrator/element_LHK/mod/hanghoacls.php';
$hanghoa = new hanghoa();
if (isset($_GET['reqHanghoa'])) {
    $idhanghoa = $_GET['reqHanghoa'];
    $obj = $hanghoa->HanghoaGetbyId($idhanghoa);
}
?>

<form action="./administrator/element_LHK/mGiohang/GioHanhAct.php?reqact=addnew&idSanPham=<?php echo $obj->idhanghoa; ?>" method="post">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body text-center">
                    
                    <img class="img-fluid rounded mb-3" src='data:image/png;base64, <?php echo ($obj->hinhanh); ?>' alt="Product Image"/>
                    
                    
                    <h5 class="card-title">Sản phẩm: <?php echo $obj->tenhanghoa; ?></h5>
                    <input type="hidden" name="tenhanghoa" value="<?php echo $obj->tenhanghoa; ?>">
                    <input type="hidden" name="mota" value="<?php echo $obj->mota; ?>">
                    <input type="hidden" name="giathamkhao" value="<?php echo $obj->giathamkhao; ?>">
                    <p class="card-text">Mô tả: <?php echo $obj->mota; ?></p>
                    <p class="card-text">Giá bán: <?php echo $obj->giathamkhao; ?> VND</p>
                    
                 
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary me-2" onclick="goBack()">Go Back</button>
                        <input type="submit" value="Mua ngay">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>