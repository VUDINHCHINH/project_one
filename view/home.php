<div class="banner">

</div>
</div>
<main>
        <!-- bắt đầu sản phẩm bán chạy -->
         <div class="sanphambanchay">
                <div class="sanphambanchay-title">
                    <h2># Sản phẩm bán chạy</h2>
                    <p>Top những sản phẩm được mua nhiều nhất</p>
                </div>
                <div class="sanphambanchay-product">
                        <div class="sanphambanchay-product-top">                          
                                <?php
                                   $i = 0;
                                   foreach ($sp_banchay as $sp) {
                                       extract($sp);
                                       $hinh = $img_path . $img;
                                       $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                   
                                       // Xác định biến $mr dựa trên chỉ số $i
                                       $mr = ($i % 4 == 1 || $i % 4 == 0) ? "" : "mr";
                                   
                                       echo '<div class="box_items ' . $mr . '">
                                       <a href="' . $linksp . '"><img src="' . $hinh . '" alt="" width=200></a>
                                               <div class="sub">
                                                   <h2>' . $name . '</h2>
                                                   <p>' . $price . '</p>
                                               </div>
                                               <div class="content-button">
                                                   <a href="' . $linksp . '"><button>Xem Chi Tiết</button></a>
                                               </div>
                                               <div class="row btn_addtocart"> 
                                               <form action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="'.$id.'">
                                                <input type="hidden" name="name" value="'.$name.'">
                                                <input type="hidden" name="img" value="'.$img.'">
                                                <input type="hidden" name="price" value="'.$price.'">
                                                <input class="addcart" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                               </form>
                                                </div>
                                               </div>';                                  
                                       $i += 1;                                
                                       // Kiểm tra khi nào bắt đầu hàng mới
                                       if ($i % 4 == 0 && $i < count($sp_banchay)) {
                                       }
                                   
                                       if ($i >= 8) {
                                           break; // Dừng vòng lặp sau khi đã hiển thị 8 sản phẩm
                                       }
                                   }                    
                                ?>                          
                        </div>
                </div>
         </div>
        <!-- end sản phẩm bán chạy -->
         <div class="banner2"><img src="img/banner2.jpg" alt=""></div>

        <!-- bắt đầu sản phẩm mới về -->
        <div class="sanphammoive">
            <div class="sanphammoive-title">
                <h2># Sản phẩm mới về</h2>
                <p>Những sản phẩm mới nhất được shop nhập về phục vụ tín đồ</p>
            </div>
            <div class="sanphammoive-product">
                    <div class="sanphammoive-product-top">
                    <?php
                                   $i = 0;
                                   foreach ($sp_new as $sp) {
                                       extract($sp);
                                       $hinh = $img_path . $img;
                                       $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                   
                                       // Xác định biến $mr dựa trên chỉ số $i
                                       $mr = ($i % 4 == 1 || $i % 4 == 0) ? "" : "mr";
                                   
                                       echo '<div class="box_items ' . $mr . '">
                                               <img src="' . $hinh . '" alt="" width=200>
                                               <div class="sub">
                                                   <h2>' . $name . '</h2>
                                                   <p>' . $price . '</p>
                                               </div>
                                               <div class="content-button">
                                                   <a href="' . $linksp . '"><button>Xem Chi Tiết</button></a>
                                               </div>   
                                               <div class="row btnaddtocart"> 
                                               <form action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="'.$id.'">
                                                <input type="hidden" name="name" value="'.$name.'">
                                                <input type="hidden" name="img" value="'.$img.'">
                                                <input type="hidden" name="price" value="'.$price.'">
                                                <input class="addcart" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                               </form>
                                            </div>                               
                                               </div>';                                  
                                       $i += 1;                                
                                       // Kiểm tra khi nào bắt đầu hàng mới
                                       if ($i % 4 == 0 && $i < count($sp_banchay)) {
                                       }
                                   
                                       if ($i >= 8) {
                                           break; // Dừng vòng lặp sau khi đã hiển thị 8 sản phẩm
                                       }
                                   }                    
                                ?>                            
                    </div>

            </div>
     </div>
    </main>
    <!-- bắt đầu tin tức mới nhất -->
<div class="tintucmoinhat-title">
            <h2># Tin mới nhất</h2>
            <p>Nơi cập nhật những xu hướng thời trang mới nhất cho bạn</p>
        </div>

    <div class="tintucmoinhat">
        <div class="tintucmoinhat-left">
             <div class="tintucmoinhat-img">
                <img src="img/3.png" alt="" width="580">
             </div>
             <div class="tintucmoinhat-content">
                <h2>Giới trẻ Việt rộ mốt đi dép cá rô phi</h2>
                <p>22/10/2019</p>
                <div class="line"></div>
                <p>Trào lưu của giới trẻ thường bất ngờ xuất hiện mà chẳng cần lý do. <br>
                    Một bài hát, một câu nói, thậm chí một chiếc áo… cũng có thể trở <br>
                    thành xu hướng. Mới đây, ảnh chụp đôi dép nhựa màu xanh,...</p>
             </div>
        </div>

        <div class="tintucmoinhat-right">
            <div class="tintucmoinhat-right-top">
                <div class="tintucmoinhat-content-right">
                    <img src="img/tinmoi1.jpg" alt="" width="250" height="230">
                    <h2>Chọn giày dép lúc nào cũng vừa in chân</h2>
                    <p>22/10/2019</p>
                    <div class="line"></div>
                </div>
                <div class="tintucmoinhat-content-right">
                    <img src="img/tinmoi.jpg" alt="" width="250" height="230">
                    <h2>Chọn giày dép lúc nào cũng vừa in chân</h2>
                    <p>22/10/2019</p>
                    <div class="line"></div>
                </div>
            </div>
            <div class="tintucmoinhat-right-bottom">
                <div class="tintucmoinhat-content-right">
                    <img src="img/tinmoi1.jpg" alt="" width="250" height="230">
                    <h2>Chọn giày dép lúc nào cũng vừa in chân</h2>
                    <p>22/10/2019</p>
                    <div class="line"></div>
                </div>
                <div class="tintucmoinhat-content-right">
                    <img src="img/tinmoi.jpg" alt="" width="250" height="230">
                    <h2>Chọn giày dép lúc nào cũng vừa in chân</h2>
                    <p>22/10/2019</p>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- hết tin tức mới nhất -->