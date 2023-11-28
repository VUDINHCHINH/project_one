<?php
 session_start();
 include "model/pdo.php";
 include "model/danhmuc.php";
 include "model/sanpham.php";
 include "model/taikhoan.php";
 include "model/cart.php";
 include "global.php";
 include "view/header.php";

 if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
 $dsdm = loadall_danhmuc();
 $sp_banchay = loadall_sanpham_banchay();
 $sp_new = loadall_sanpham_new();

 if((isset($_GET['act'])) && ($_GET['act'] !="")){
    $act = $_GET['act'];
   switch ($act) {
        case 'sanphamct':
            if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                
                extract($onesp);
                $sp_cung_loai=load_sanpham_cungloai($id,$iddm);
                include "view/sanphamct.php";
            }else {
                include "view/home.php";
            }
        break;
        case 'sanpham':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw = $_POST['kyw'];                       
            } else{
                $kyw = "";
            }
            if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $iddm = $_GET['iddm'];
            }else {
                $iddm = 0;
            }
            $dssp=loadall_sanpham($kyw,$iddm);
            $tendm=load_ten_dm($iddm);
            include "view/sanpham.php";
            break;

        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email,$user,$pass);
                $thongbao= "Đăng ký thành công !";
            }
            include "view/taikhoan/dangky.php";
            break;   
            
        case 'dangnhap':
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user,$pass);
                if(is_array($checkuser)){
                    $_SESSION['user']=$checkuser;
                    $thongbao= "Đăng nhập thành công !";
                }else{ 
                    $thongbao ="Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký !";
                }             
            }
            include "view/dangnhap.php";
            break;
        case 'thoat':
            session_unset();
            include "view/dangnhap.php";
            break;
        case 'quenmk':
            if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                $email = $_POST['email'];
                $checkemail=checkemail($email); 
                if(is_array($checkemail)){
                    $thongbao= "Mật khẩu của bạn là: ".$checkemail['pass'];
                }else{
                    $thongbao="Email này không tồn tại";
                }   
            }
            include "view/taikhoan/quenmk.php";
            break;
            
        case 'addtocart':
            if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $ttien = $soluong*$price;
                $spadd = [$id,$name,$img,$price,$soluong,$ttien];
                array_push($_SESSION['mycart'],$spadd);
                
            }
            include "view/cart/viewcart.php";
            break;
        case 'delcart':
            if(isset($_GET['idcart'])){
                array_splice($_SESSION['mycart'],$_GET['idcart'],1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
                                     
        case 'viewcart':
            
            include "view/cart/viewcart.php";
            break;
        case 'bill':

            include "view/cart/bill.php";
                break;
        case 'billcomfirm':
            if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                else $id=0;
                $name=$_POST['name'];
                $email=$_POST['email'];
                $address=$_POST['address'];
                $tel=$_POST['tel'];
                $pttt=$_POST['pttt'];
                
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('H:i:sA d/m/Y'); 
                $tongdonhang = tongdonhang();
               //tạo bill
               $idbill= insert_bill($iduser,$name,$email,$address,$tel,$pttt,$tongdonhang,$ngaydathang);

               //insert into cart : $SESSION['mycart'] & idbill;
               foreach($_SESSION['mycart'] as $cart) {
                    extract($cart);
                    insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
               }
               //xóa cart
               $_SESSION['cart']= "";
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "view/cart/billcomfirm.php";
            break;
        case 'mybill':
            $listbill = loadall_bill($kyw="",$_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
    default:
        include "view/home.php";
        break;
   }
}else{
  include "view/home.php";
}
include "view/footer.php";

?>