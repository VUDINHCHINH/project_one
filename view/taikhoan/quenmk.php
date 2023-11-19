<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form{
            text-align: center;
            border: 1px solid black;
            margin: 200px 500px 50px 500px;
            margin-top: 100px;
            height: 200px;
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
        .btn{
            width: 100px;
            color: white;
            background-color: #54FF9F;
            border-radius: 6px;
            border: 1px solid #54FF9F;
            height: 26px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="form">
    <div class="box_title"><h1>QUÊN MẬT KHẨU</h1></div>
    <div class="box_content form_account">
        <form action="index.php?act=quenmk" method="post">
            <div class="email">
        <h3>Email: </h3>
        <input type="email" name="email">
        </div>

        <input class="btn" type="submit" value="GỬI" name="guiemail">
        <input class="btn" type="reset" value="NHẬP LẠI">
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