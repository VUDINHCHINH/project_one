<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-dangky{
            text-align: center;
            border: 1px solid black;
            margin: 200px 500px 50px 500px;
            margin-top: 100px;
            height: 370px;
            border-radius: 20px;
        }
        .box_title{
            margin-top: 10px;
            color: red;
        }.email{
            margin-top: 10px;
        }
        .email input{
            width: 300px;
            border-radius: 4px;
            height: 26px;
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
        .btn-signup{
            width: 100px;
            color: white;
            background-color: #54FF9F;
            border-radius: 6px;
            border: 1px solid #54FF9F;
            height: 26px;
            margin: 10px 0;
        }
        a{
            text-decoration: none;
            height: 26px;
        }
    </style>
</head>
<body>
<div class="form-dangky">
        <div class="box_title"><h1>ĐĂNG KÝ THÀNH VIÊN </h1></div>
        <div class="box_content form_account">
            <form action="index.php?act=dangky" method="post">
            <div class="email">
            Email: <br>
            <input type="email" name="email">
            </div>

            <div class="username">
            Tên đăng nhập: <br>
            <input type="text" name="user">
            </div>

            <div class="password">
            Mật Khẩu: <br>
            <input type="password" name="pass">
            </div>
            <input class="btn-signup" type="submit" value="ĐĂNG KÝ" name="dangky">
            <input class="btn-signup" type="reset" value="NHẬP LẠI">
            <p><a class="btn-signup" href="index.php?act=dangnhap">Đăng Nhập</a></p>
            </form>
            <h3 style="color:red;">
                    <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }  
                ?>
            </h3>
        </div>
</div>
</body>
</html>
