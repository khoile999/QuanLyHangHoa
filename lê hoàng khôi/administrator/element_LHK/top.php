<!-- 
 <?php

if (isset($_SESSION['USER'])) {
    $namelogin = $_SESSION['USER'];
}
if (isset($_SESSION['ADMIN'])) {
    $namelogin = $_SESSION['ADMIN'];
}
if (isset($_COOKIE [$namelogin])) {
    echo "Xin chào " . $namelogin . "<br>";
    echo "Lần đăng nhập gần nhất: " . $_COOKIE [$namelogin];
}
?>


<?php
if (isset($_GET['result'])) {
    if ($_GET['result'] == 'ok') {
        ?>
        <img src="img_LHK/success.png" height="20px">
        <?php
    } else {
        ?>
        <img src="img_LHK/fail.png" height="20px">
        <?php
    }
} else {
    ?>
    <img src="img_LHK/wait.png" height="20px">
    <?php
}
?>  -->

    
 <nav class="navbar navbar-expand-lg bg-primary-subtle">
    <!-- Brand: Direct Child of ".navbar" -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
   <a class="navbar-brand" href="#">
   <img src="./img_LHK/maylanh.png" style="width:50px;">
   </a>

   
</nav>


  <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Tranghanghoa.php">Hàng Hóa</a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="https://getbootstrap.com" target="_blank">Bootstrap</a>
</li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        

        <form class="d-flex" method="GET" action="index.php?quanly=timkiem">
    <input class="form-control me-2" type="search" name="timkiem" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>


      </ul>
<div class="left-align">

<?php

if (isset($_SESSION['USER'])) {
    $namelogin = $_SESSION['USER'];
}
if (isset($_SESSION['ADMIN'])) {
    $namelogin = $_SESSION['ADMIN'];
}
if (isset($_COOKIE [$namelogin])) {
    echo "Xin chào " . $namelogin . "<br>";
    echo "Lần đăng nhập gần nhất: " . $_COOKIE [$namelogin];
}
?>


<?php
if (isset($_GET['result'])) {
    if ($_GET['result'] == 'ok') {
        ?>
        <img src="img_LHK/success.png" height="20px">
        <?php
    } else {
        ?>
        <img src="img_LHK/fail.png" height="20px">
        <?php
    }
} else {
    ?>
    <img src="img_LHK/wait.png" height="20px">
    <?php
}
?> 


    </div>
  </div>
</nav>
