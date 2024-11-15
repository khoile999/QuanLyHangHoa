<?php
require '../administrator/element_LHK/mod/database.php';  

// Khởi tạo đối tượng database
$db = new Database();

if (isset($_GET['timkiem'])) {
    $search = $_GET['timkiem'];

    // Truy vấn cơ sở dữ liệu để tìm sản phẩm theo tên, dùng PDO và prepared statement để bảo mật
    $sql = "SELECT * FROM hanghoa WHERE tenhanghoa LIKE :search";
    $stmt = $db->prepare($sql);
    $stmt->execute(['search' => "%$search%"]);

    if ($stmt->rowCount() > 0) {
        echo "<h4>Kết quả tìm kiếm cho từ khóa: '$search'</h4>";
        echo "<table class='table table-hover table-bordered'>";
        echo "<thead><tr><th>ID</th><th>Tên hàng hóa</th><th>Giá tham khảo</th><th>Mô tả</th><th>Hình ảnh</th><th>Chức năng</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['idhanghoa'] . "</td>";
            echo "<td>" . $row['tenhanghoa'] . "</td>";
            echo "<td>" . number_format($row['giathamkhao']) . " VND</td>";
            echo "<td>" . $row['mota'] . "</td>";
            echo "<td><img src='data:image/png;base64," . $row['hinhanh'] . "' width='50' height='50'></td>";
            
            // Thêm cột Chức năng với nút "Thêm vào giỏ hàng"
            echo "<td class='text-center'>";
            echo "<form method='post' action='./Cart.php'>";
            echo "<input type='hidden' name='id' value='" . $row['idhanghoa'] . "'>";
            echo "<input type='hidden' name='tenhanghoa' value='" . $row['tenhanghoa'] . "'>";
            echo "<input type='hidden' name='giathamkhao' value='" . $row['giathamkhao'] . "'>";
            echo "<button type='submit' class='btn btn-primary btn-sm'><i class='fas fa-cart-plus'></i> Thêm vào giỏ hàng</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Không tìm thấy sản phẩm nào phù hợp với từ khóa '$search'.</p>";
    }
}
?>
