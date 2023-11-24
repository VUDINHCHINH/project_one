<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.1/dist/css/ionicons.min.css">
    <style>
        table tr td{
            padding: 0 40px 0 0;
        }
        #submit{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
   <!-- code trong đây -->
   <div class="content-row">
    <div class="title-extra">
        <p>GIỎ HÀNG > <u>THANH TOÁN</u> HOÀN TẤT</p>
    </div>
    <div class="page-pay">
        <?php
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user']['user'];
                $address = $_SESSION['user']['address'];
                $email = $_SESSION['user']['email'];
                $tel = $_SESSION['user']['tel'];
            }else{
                $user ="";
                $address ="";
                $email ="";
                $tel = "";
            }
        ?>
        <div class="page-information">
            <h3>Thông tin thanh toán</h3>
            <form action="index.php?act=billcomfirm" method="post">
                <div class="information-thrre">
                    <div class="information-one">
                        <label for="">Người đặt hàng *</label>
                        <br>
                        <input type="text" name="name" id="" value="<?= $user ?>" required>
                    </div>
                </div>
                <div class="information-thrre">
                    <label for="">Địa chỉ *</label>
                    <br>
                    <input type="text" name="address" id="" value="<?= $address ?>" required>
                </div>
                
                <div class="information-thrre">
                    <label for="">số điện thoại *</label>
                    <br>
                    <input type="text" name="tel" id="" value="<?= $tel ?>" required> 
                </div>

                <div class="information-thrre">
                    <label for="">địa chỉ email *</label>
                    <br>
                    <input type="text" name="email" id="" value="<?= $email ?>" required>
                </div>

                <div class="information-thrre" >
                    <label for="">Thông tin bổ xung: </label>
                    <br>
                    <input type="" name="" id="telll" >
                </div>
                
        </div>

        <div class="page-orders" >
            
            <h3>ĐƠN HÀNG CỦA BẠN</h3>
            <hr>
            <div class="page-count">
                <table>
                    <tr>
                            <th></th>    
                            <th></th>    
                            <th>Tên sản phẩm</th>    
                            <th></th>
                            <th></th>
                            <th>Giá sản phẩm</th>
                    </tr>
            <?php
            $tong = 0;
            $i=0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $hinh = $img_path.$cart[2];
                        $ttien = $cart[3]*$cart[4];
                        $tong+=$ttien;
                        echo '<tr>                                  
                        <td><img src="'.$hinh.'" alt="" width="120px" height="120px"></td>
                        <td colspan="3">'.$cart[1].'</td>
                        <td colspan="6">'.$cart[3].' VNĐ</td>                           
                    </tr>';
                    $i+=1;
                    }
            ?>
                </table>
                <div class="product-count-one">
                    <div class="page-product-three">
                        <h4>Tổng :</h4>
                       
                    </div>
                    <div class="page-product-four">
                        <p><?= $tong ?> VNĐ</p>
                    </div>
                </div> 
            </div>
           
                <div class="select-one">
                    <input type="radio" name="pttt" id="" value="1">
                    <label for="">Trả tiền khi nhận hàng</label>

                </div>
                <div class="select-one">
                    <input type="radio" name="pttt" id="" value="2"> 
                    <label for="">Thanh toán online</label>
                    <br>
                   <input type="submit" name="dongydathang" value="ĐẶT HÀNG" id="submit">
                </div>

    </form>
    </div>
    </div>
   <!-- end code trong đây -->
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>