<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="public_files/pmycss.css">
    <title>Trang sản phẩm hàng hóa </title>
    
</head>
<body>

    <div id="lvOne" class="row">
        <ul class="nav">
            <li class="nav-item">
             
                <a class="btn-primary btn-lg" href="/administrator/userLogin.php" role="button">Đăng nhập</a>
            </li>
        </ul> 
        
        
        <form class="form-inline  d-flex " method="GET" action="./apart/timkiem.php">
    <input class="form-control form-control-lg rounded-pill shadow-sm" type="search" name="timkiem" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
    <button class="btn btn-success btn-lg rounded-pill px-4 shadow-sm" type="submit">Tìm kiếm</button>
</form>




        <a href="./apart/Cart.php" class="Cart">
            <img src="./administrator/img_LHK/iconCart.png" alt="">
        </a>
        
  
    </div>
   

    <div id="lvTwo">
        <?php
            require'./apart/menuLoaihang.php';
         ?>
    </div>
    <div id="lvThree">
        <?php
            if(!isset($_GET['reqHanghoa'])){
                require './apart/viewListLoaihang.php';
            }else{
                require'./apart/viewHangloai.php';
                }
                
        ?>
    </div>
    
</body>
</html>
