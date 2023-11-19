<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-dangnhap{
            text-align: center;
            border: 1px solid black;
            margin: 200px 500px 50px 500px;
            margin-top: 100px;
            height: 330px;
            border-radius: 20px;
        }
        .form-dangnhap h1{
            margin-top: 10px;
            color: red;
        }
        .username{
            margin-top: 26px;
            margin-bottom: 30px;
        }
        .username input{
            width: 300px;
            border-radius: 4px;
            height: 26px;
        }
        .password input{
            width: 300px;
            border-radius: 4px;
            height: 26px;
        }
        li a{
            text-decoration: none;
        }
        li{
            list-style: none;
        }
        .btn-signin{
            width: 200px;
            color: white;
            background-color: #54FF9F;
            border-radius: 6px;
            border: 1px solid #54FF9F;
            height: 26px;
            margin: 10px 0;
        }
        .form_li1{
            margin: 20px 100px 0 100px;
            border: 1px solid black;
            border-radius: 10px;
        }
        .form-taikhoan{
            text-align: center;
            border: 1px solid black;
            margin: 200px 500px 50px 500px;
            margin-top: 100px;
            height: 330px;
            border-radius: 20px;
        }
        .form-taikhoan h1{
            margin-top: 10px;
            color: red;
        }
    </style>
</head>
<body>
<?php
if(isset($_SESSION['user'])){
    extract($_SESSION['user']);
?>
<div class="form-taikhoan">
  <h1>Xin Chào : <?= $user ?></h1>
  <?php if($role == 1){?>
  <li class="form_li1"><a href="admin/index.php">Đăng nhập admin</a></li>
  <?php } ?>

  <li class="form_li1"><a href="index.php?act=thoat">Đăng Xuất</a></li>
  <li class="form_li1"><a href="#">Trạng Thái Đơn Hàng</a></li>
  <li class="form_li1"><a href="#">Cập Nhập Thông Tin</a></li>
</div>

<?php
}else {
?>
<div class="form-dangnhap">
    <h1>ĐĂNG NHẬP</h1>
    <form action="index.php?act=dangnhap" method="POST">
    <div class="username">
    <label class="username-label" for="username">Tên Đăng Nhập</label><br>
    <input type="text" name="user" id="username">
    </div>
    <div class="password">
    <label class="password-label" for="password">Mật Khẩu</label><br>
    <input type="password" name="pass" id="password"><br>
    </div>
        <br>
    <input type="checkbox" name="">Ghi nhớ tài khoản?
    <br><input class="btn-signin" type="submit" value="Đăng nhập" name="dangnhap">

    </form>
    <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
    <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
</div>
<?php  }  ?>

</body>
</html>
