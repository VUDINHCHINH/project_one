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

function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$tongdonhang,$ngaydathang){
    $sql = "INSERT INTO bill(iduser,bill_name,bill_address,bill_tel,bill_email,bill_pttt,ngaydathang,total  ) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
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
function loadall_cart_count($idbill){
    $sql = "SELECT * from cart where idbill=".$idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
function loadall_bill($kyw="",$iduser=0){
    $sql = "SELECT * from bill where 1";
    if($iduser>0) $sql.=" AND iduser=".$iduser;
    if($kyw!="") $sql.=" AND id like '%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function bill_chi_tiet($listbill){
    global $img_path;
    $tong = 0;
    $i=0;
    echo '<tr>
        <th></th>
        <th>Hình</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
    </tr>';
    foreach ($listbill as $cart) {
        $hinh = $img_path.$cart['img'];
        $tong+=$cart['thanhtien'];
        echo '<tr>        
        <td></td>                          
        <td><img src="'.$hinh.'" alt="" width="120px" height="120px"></td>
        <td>'.$cart['name'].'</td>
        <td>'.$cart['price'].' VND</td>                          
    </tr>';
    $i+=1;
    }
    echo ' <tr>          
        <td colspan="4">Tổng Đơn Hàng</td>                       
        <td colspan="3">'.$tong.' VND</td>
        </tr>';
}

function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt = '<span style="color: red;">Chưa Xác Nhận</span>';
            break;
        case '1':
            $tt = '<span style="color: blue;">Đang giao hàng</span>';
            break;
        case '2':
            $tt = '<span style="color: green;">Hoàn tất</span>';
            break;
        default:
            $tt = '<span style="color: red;">Chưa Xác Nhận</span>';
            break;
    }
    return $tt;
} 
function update_ttdh($id,$n){
    $sql = "update bill set bill_status='".$n."' where id=".$id;
    pdo_execute($sql);
}
?>