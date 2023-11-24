<?php
function viewcart(){
    global $img_path;
    $tong = 0;
    $i=0;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path.$cart[2];
        $ttien = $cart[3]*$cart[4];
        $tong+=$ttien;
        $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"> <input type="button" value="Xóa"></a>';
        echo '<tr>        
        <td></td>                          
        <td><img src="'.$hinh.'" alt="" width="120px" height="120px"></td>
        <td>'.$cart[1].'</td>
        <td>'.$cart[3].'</td>
        <td>'.$cart[4].'</td>
        <td>'.$ttien.'</td>
        <td>'.$xoasp.'</td>                                 
    </tr>';
    $i+=1;
    }
    echo ' <tr>          
        <td colspan="4">Tổng Đơn Hàng</td>                       
        <td colspan="3">'.$tong.'</td>
        </tr>';
}

function tongdonhang(){
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3]*$cart[4];
        $tong+=$ttien;
    }
    return $tong;
}

function insert_bill($name,$email,$address,$tel,$pttt,$tongdonhang,$ngaydathang){
    $sql = "INSERT INTO bill(bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$name','$email','$address','$tel','$pttt','$tongdonhang','$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql = "INSERT INTO cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro' ,'$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql = "SELECT * from bill where id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql = "SELECT * from cart where idbill=".$idbill;
    $cart = pdo_query($sql);
    return $cart;
}

function bill_chi_tiet($listbill){
    global $img_path;
    $tong = 0;
    $i=0;
    echo '<tr>
        <th></th>
        <th></th>
        <th>Sản phẩm</th>
        <th></th>
        <th></th>
        <th>Giá</th>
    </tr>';
    foreach ($listbill as $cart) {
        $hinh = $img_path.$cart['img'];
        $tong+=$cart['thanhtien'];
        echo '<tr>        
        <td></td>                          
        <td><img src="'.$hinh.'" alt="" width="120px" height="120px"></td>
        <td colspan="3">'.$cart['name'].'</td>
        <td>'.$cart['thanhtien'].' VND</td>                               
    </tr>';
    $i+=1;
    }
    echo '<div style="color: red; font-size:22px">
        <h2>- Tổng đơn hàng: '.$tong.' VND</h2>
    </div>';
}
?>