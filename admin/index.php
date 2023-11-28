<?php
 include "../model/pdo.php";
 include "../model/danhmuc.php";
 include "../model/sanpham.php";
 include "../model/taikhoan.php";
 include "../model/cart.php";
 include "../model/thongke.php";

 include "header.php";
 if(isset($_GET['act'])){
     $act = $_GET['act'];
     switch ($act) {
        case 'adddm':
            if(isset($_POST['themmoi']) && $_POST['themmoi']){
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "thêm thành công";
            }
            include("danhmuc/add.php");
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include("danhmuc/list.php");
            break;
        case 'xoadm':
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $dm=loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                $tenloai= $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id,$tenloai);
                $thongbao = "Cập nhật thành công";
            } 
            $listdanhmuc =  loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            //end controller danh mục
            //bắt đầu sản phẩm
        case 'addsp':
            if(isset($_POST['themmoi']) && $_POST['themmoi']){
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp= $_POST['giasp'];
                $mota= $_POST['mota'];
                $hinh= $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc(); 
            include "sanpham/add.php";
            break;
        case 'listsp':
            if(isset($_POST['listok']) && $_POST['listok']){
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];
            }else{
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw,$iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_sanpham($_GET['id']);
            }
            $listsanpham =  loadall_sanpham("",0);
            include "sanpham/list.php";
            break;
        case 'suasp':
           if(isset($_GET['idsp']) && ($_GET['idsp']>0)){
                $sanpham = loadone_sanpham($_GET['idsp']);
           } 
           $listdanhmuc = loadall_danhmuc();
           include "sanpham/update.php";
            break;
        case "updatesp":
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $id = $_POST['id']; 
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                    //echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);

                $thongbao = "cập nhật thành công";
            }
            $listdanhmuc =  loadall_danhmuc();
            $listsanpham=   loadall_sanpham("",0);             
            include "sanpham/list.php";
            break;

            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "khachhang/list.php";
                break;
            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "khachhang/list.php";
                break;

            case 'bieudo':           
                $dsthongke = load_thongke_sanpham_danhmuc();
                include "thongke/bieudo.php";             
                break;

            case 'listbill':
                if(isset($_POST['kyw']) && $_POST['kyw']!=""){
                    $kyw =$_POST['kyw'];
                }else{
                    $kyw ="";
                }
                $listbill = loadall_bill($kyw,0);
                include "bill/listbill.php";
                break;
            case 'ttdh':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Lấy giá trị từ biểu mẫu
                    $n = $_POST['n'];
                    // Gọi hàm và thực hiện các xử lý khác nếu cần
                    $ttdh_value = get_ttdh($n);
                }
                include "bill/ttdh.php";
                break;

            case 'suattdh':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $dh=loadone_bill($_GET['id']);
                }
                include "bill/ttdh.php";
                break;
    
            case 'updatettdh':
                if(isset($_POST['capnhat-tt']) && ($_POST['capnhat-tt'])){
                    $id = $_POST['id'];
                    $n = $_POST['n'];
                    update_ttdh($id,$n);
                    $ttdh_value = get_ttdh($n);
                    $thongbao = "Cập nhật thành công";
                } 
                $listbill = loadall_bill("",0);
                include "bill/listbill.php";
                break;
        default:
            include "home.php";
            break;
     } 
 } else{
    include "home.php";
 }
 include "footer.php";

?>