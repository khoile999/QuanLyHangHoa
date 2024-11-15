<?php
require '../administrator/element_LHK/class/GiohangCls.php'; // Gọi thư viện để sử dụng được lớp GiohangCls
$gh = new giohang();
$list_gh = $gh->giohangGetAll(); // Trả về danh sách đối tượng giỏ hàng
$l = count($list_gh);
?>

<div class="container">
    <h2 class="mt-4 mb-4 text-primary">Danh sách giỏ hàng</h2>
    <div class="alert alert-info">
        Trong giỏ hàng có: <span class="font-weight-bold"><?php echo $l; ?></span> sản phẩm.
    </div>
    
    <?php if ($l > 0) { ?>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Giỏ hàng</th>
                    <th>ID Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_gh as $u) {
                ?>
                    <tr>
                        <td><?php echo $u->idgiohang; ?></td>
                        <td><?php echo $u->idhanghoa; ?></td>
                        <td><?php echo $u->tenhanghoa; ?></td>
                        <td><?php echo number_format($u->giathamkhao); ?> VND</td>
                        <td><?php echo $u->mota; ?></td>
                        <td align="center">
                            <a href="../administrator/element_LHK/mGiohang/GioHanhAct.php?reqact=delete&idGioHang=<?php echo $u->idgiohang; ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-warning">
            Giỏ hàng của bạn hiện tại không có sản phẩm nào.
        </div>
    <?php } ?>
    
    <a href="../index.php" class="btn btn-secondary mt-3">Quay lại trang chính</a>
</div>
