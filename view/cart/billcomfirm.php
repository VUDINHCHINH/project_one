<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.1/dist/css/ionicons.min.css">
</head>
<style>
    .table-thanhtoan{
        border: 1px solid black;
        border-radius: 6px
    }
    .hr-bottom{
        margin: 20px 0;
    }
</style>
<body>
<?php
    if(isset($bill) && (is_array($bill))){
        extract($bill);
    }
?>
    <div class="container">
   <!-- code trong đây -->
   <div class="content-row">
    <div class="title-extra">
        <p>GIỎ HÀNG > THANH TOÁN > <u>HOÀN TẤT</u></p>
    </div>
    
    <div class="notify">
    <div class="notify-title">
        <p>CHÚC MỪNG BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG</p>   
        <P>Vui lòng chờ xác nhận</P>
    </div>
    <div class="notify-detail">
        <h2>Chi tiết đơn hàng:</h2>
        <h3>-Mã đơn hàng : <?= $bill['id']; ?></h3>
        <h3>-Ngày đặt hàng: <?= $bill['ngaydathang']; ?></h3>
        <h3>-Phương thức thanh toán: <?= $bill['bill_pttt']; ?></h3>
        <hr class="hr-bottom">
        <div class="notify-detail-one">
        <table>
        <tr>
                <?php
                bill_chi_tiet($billct);
                ?>  
        </tr>      
        </table>
        </div>
        <div class="notify-detail-three">
        <table class="table-thanhtoan">
        <tr>
            <td>Người đặt hàng: </td>    
            <td><?= $bill['bill_name']; ?></td>                 
        </tr>
        <tr>
            <td>Địa chỉ: </td>    
            <td><?= $bill['bill_address']; ?></td>                  
        </tr>
        <tr>
            <td>Email: </td>    
            <td><?= $bill['bill_email']; ?></td>                  
        </tr>
        <tr>
            <td>Số điện thoại: </td>    
            <td><?= $bill['bill_tel']; ?></td>                  
        </tr>
            
        </table>
        </div>
        
    </div>
    <hr class="hr-bottom">
    <div class="notify-status">
        <h2>Trạng thái</h2>
        <p>Chưa xác nhận</p>
    </div>

    </div>
    </div>
   <!-- end code trong đây -->
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>