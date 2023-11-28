<?php
if(is_array($dh)){
    extract($dh);
}
?>
<form method="post" action="index.php?act=updatettdh">
     <label for="n">Nhập : <br> 0,Chưa xác nhận <br>1,Đang giao hàng <br> 2,Hoàn tất</label>
     <input type="text" name="n" id="n">
     <input type="submit" value="OK" name="capnhat-tt">
     <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0)) echo $id ;?>">
 </form>

<!-- Hiển thị giá trị $ttdh -->
 <td><?php echo isset($ttdh_value) ? $ttdh_value : ''; ?></td>


