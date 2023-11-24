<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.1/dist/css/ionicons.min.css">
    <style>
        .btn-xoa{
            background-color: #FF0000;
            height: 30px;
            width: 30px;
            border: 1px solid #FF0000;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">     
   <!-- code trong đây -->
        <div class="content-row">
            <div class="title-extra">
                <p><u>GIỎ HÀNG</u > THANH TOÁN > HOÀN TẤT</p>
            </div>

            <div class="content-cart">

                <div class="content-product">
                    <div>
                        <div class="product-one" style="border-bottom: 1px solid black ;">
                            <h3>SẢN PHẨM</h3>
                            
                            <p>GIÁ</p>
                            <p>SỐ LƯỢNG</p>
                            <p>TẠM TÍNH</p>
                            <p></p>
                        </div>
                        <?php
                        $tong = 0;
                        $i=0;
                        foreach ($_SESSION['mycart'] as $cart) {
                             $hinh = $img_path.$cart[2];
                             $ttien = $cart[3]*$cart[4];
                             $tong+=$ttien;
                             $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"> <input class="btn-xoa" type="button" value="X"></a>';

                           echo '<div class="product-true">
                             <div class="product-img">
                                 <img src="'.$hinh.'" alt="" width="140px" height="150px">                          
                             </div>
                             <div class="product-ift">
                                 <h4>'.$cart[1].'</h4>
                                 <p>đen</p>
                                 <p>44</p> 
                             </div>
                             <div class="product-text">
                                 <p>'.$cart[3].'</p> 
                                 <p>'.$cart[4].'</p>
                                 <p>'.$ttien.'</p>
                                 <p>'.$xoasp.'</p>
                             </div>
                             </div>';
                             $i+=1;
                        }
                        ?>                     
                    </div>

                    <div class="product-continue" style="border-top: 1px solid black;">
                        
                        <a href="#">TIẾP TỤC XEM SẢN PHẨM</a>
                        <a href="index.php?act=delcart"><input type="button" value="Xóa Giỏ Hàng"></a>
                        <input type="submit" id="input" value="CẬP NHẬP GIỎ HÀNG">
                    </div>
                </div>
                <!-- giỏ hàng -->
                <div class="content-bill"  >
                    <h3>CỘNG GIỎ HÀNG</h3  >
                    
                    <div class="bill-one" style="border-top: 1px solid black ;">
                        <div class="bill-true">
                            <p>Tổng</p>
                            
                        </div>
                        <div class="bill-twe">
                            <p><?= $tong ?>VND</p>
                        </div>
                    </div>
                    <div class="bill-discount"> 
                        <a href="index.php?act=bill">TIẾN HÀNH THANH TOÁN</a>
                        <form action="">
                            <label for="">Phiếu ưu đãi</label>
                            <hr>
                            <br>
                            <input type="text">
                            <br>
                            <input type="submit" value="Áp dụng">
                        </form>
                    </div>
                   
                </div>

            </div>
        </div>
   


   <!-- end code trong đây -->
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>