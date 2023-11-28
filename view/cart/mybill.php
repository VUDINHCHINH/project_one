<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border: 1px solid #808080;
        }
        table tr th{
            border: 1px solid #808080;
        }
        table tr td{
            border: 1px solid #808080;
        }
        .boxleft{
            width: 1400px;
            text-align: center;
            margin-left: 50px;
        }
        table{
            width: 1400px;
            height: 200px;
            border-collapse: collapse;
        }
        .ttdh{
            color: red;
        }
    </style>
</head>
<body>
    
<div class="row mb">
    <div class="boxleft mr">
        <div class=" mb">
            <div class="title">ĐƠN HÀNG CỦA BẠN</div>
            <div class="cart">
    <table>
        <tr>
            <th>ID</th>
            <th>MÃ ĐƠN HÀNG</th>
            <th>SỐ LƯỢNG MẶT HÀNG</th>
            <th>THỜI GIAN ĐẶT HÀNG</th>
            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
            <th>ĐỊA CHỈ VÀ SDT </th>
            <th>TÌNH TRẠNG ĐƠN HÀNG</th>                   
        </tr>
        <?php
            if(is_array($listbill)){
                foreach ($listbill as $bill) {
                    extract($bill);
                    $kh=$bill["bill_email"].'
                    <br>'.$bill["bill_tel"];
                    $ttdh = get_ttdh($bill['bill_status']);
                    $countsp =loadall_cart_count($bill['id']); //số lượng mặt hàng
                   echo '<tr>
                        <td></td>
                        <td>'.$bill['id'].'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$bill['ngaydathang'].'</td>
                        <td>'.$bill['total'].' VND</td>
                        <td>'.$kh.'</td>
                        <td class="ttdh">'.$ttdh.'</td>
                   </tr> ';
                };
            }
        ?>
        
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>