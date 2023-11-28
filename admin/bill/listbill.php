<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
     
/* CSS CHO ADMIN */
.header_admin{
  background-color:#EEE;
  border:1px #CCC solid;
  color:#666;
  border-radius:5px;
  padding:10px 20px;
  
}
.header_admin h1{
font-size:2vv;
}
.font_title{
  background-color:#EEE;
  border:1px #CCC solid;
  color:#666;
  border-radius:5px;
  padding:10px 20px;
}
.mr20{
 margin-right:10px;
}
label{
 display:flex;
 justify-content:start;
  font-size:20px;
  color:red;
  margin-top:5px;
}
.formds_loai table{
  width:100%;
  border-collapse:collapse;
   background-color:#ccc;
 
      padding:20px;
}
.formds_loai table td {
  padding:10px 20px;
  border:1px #ccc solid;
  padding:30px;
}
.box_footer{
  margin-top:300px;
}
.row{
  display:flex;
  width:100%;
}
.mb{
    margin-bottom:30px;
}
.menu{
    background:black;
    border:1px solid #000;
   
    padding:5px;
    height:33px;

}
.menu ul{
  display:flex;
  align-items:center;
  gap:30px;
  }
.menu ul li{
  list-style:none;
}
.menu li a{
  color:white;
  text-decoration:none;
}
.menu li a:hover,.dropdown:hover .dropbtn{
 background-color:rgb(225,0,43);
 padding:13px 0;
}
.formds_loai table td{
    padding:10px 20px;
    border:2px #130c0c solid;
    padding:30px;
}
.mb10{
    margin-top: 20px;
}
/* end admin */
    </style>
</head>
<body>
    <div class="boxcenter">
       
        <div class="row2">
        <div class="row2 font_title">
          <h1>DANH SÁCH ĐƠN HÀNG</h1>
         </div>
         <form action="index.php?act=listbill" method="post">
            <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
            <input type="submit" name="listok" value="OK">
         </form>
         <div class="row2 form_content ">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ ĐƠN HÀNG</th>
                <th>KHÁCH HÀNG</th>
                <th>SỐ LƯỢNG HÀNG</th>
                <th>GIÁ TRỊ ĐƠN HÀNG</th>
                <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                <th>NGÀY ĐẶT HÀNG</th>
                <th>THAO TÁC</th>
            </tr>
            <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $suattdh = "index.php?act=suattdh&id=".$id;
                    $kh=$bill["bill_name"].'
                    <br>'.$bill["bill_email"].'
                    <br>'.$bill["bill_address"].'
                    <br>'.$bill["bill_tel"];
                    $countsp =loadall_cart_count($bill["id"]);
                    $ttdh =get_ttdh($bill["bill_status"]);
                    echo '<tr>
                    <td><input type="checkbox"></td>
                    <td>'.$bill['id'].'</td>
                    <td>'.$kh.'</td>
                    <td>'.$countsp.'</td>
                    <td><strong>'.$bill['total'].' VND</strong> </td>
                    <td>'.$ttdh.'</td>
                    <td>'.$bill["ngaydathang"].'</td>
                    <td><a href="'.$suattdh.'"><input type="button" value="Sửa"></a></td>
                   
                    </tr>';
                }
            ?>     
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
         <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>
    
</body>
</html>