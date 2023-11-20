<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.1/dist/css/ionicons.min.css">
    <style>
        .giohang-icon a:hover{
            color: red;
        }
        .taikhoan-icon a:hover{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <header>
                <div class="inner-header">
                    <a href="index.php" class="logo">HCT Sneaker</a>
                    <nav>
                        <ul id="main-menu">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                            <li><a href="#">Khuyến mãi</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="#">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="giohang-taikhoan">
                    <div class="giohang-icon">
                    <a href="index.php?act=dangnhap" class="icon"><ion-icon name="people-outline"></ion-icon></a>
                    </div>
                    <div class="line-icon"></div>
                    <div class="taikhoan-icon">
                    <a href="index.php?act=viewcart" class="icon"><ion-icon name="bag-outline"></ion-icon></a>
                    </div>
                </div>
            </header>