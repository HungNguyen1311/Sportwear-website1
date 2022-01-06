<?php
if(isset($_GET['dangxuat'])){
    $id=$_GET['dangxuat'];
    if($id==1){
  unset($_SESSION['dangnhap_home']);
    }
}
?>
<div class="box">
    <div class="item">
        <div class="Menu">
            <a href="index.php"><img src="./MVC/Public/pic/AoBD/logo3.PNG" width="280" height="70"></a>
        </div>
        <div class="Menu">
        <ul class="Root">
                <li id="trangchu"><a href="<?php echo"index.php" ?>"><strong>TRANG CHỦ </strong></a></li>
                <li><a href="?quanly=danhmuc&id=1"><strong>ÁO THỂ THAO </strong></a>
                </li>         
                <li><a href="?quanly=danhmuc2&id=2"><strong>ÁO PHÔNG</strong></a>                           
                </li>                      
                <li><a href="?quanly=danhmuc3&id=3"><strong>GIÀY THỂ THAO </strong></a>
            </li>
                <li><a href="?quanly=danhmucspkm&id=3"><strong>SẢN PHẨM KHUYẾN MÃI </strong></a>                           
                </li>                          
        </ul>
        </div>
        <div class="Menu">
            <div class="Menu1">
                <a href="index.php?quanly=giohang" style="color:white"><u>Giỏ Hàng</u> | <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
            <div class="Menu1">
            <?php
                if(isset($_SESSION['dangnhap_home'])){
                    echo '<p id="dangnhaphome"> chào <i>'.$_SESSION['dangnhap_home'].'</i><br><a id="dangxuathome" href="index.php?dangxuat=1">  Đăng xuất</a></p>';
            ?>
            <?php      
                }else{
            ?>
                <a href="?quanly=dangnhap"><u>Đăng nhập | </u></a><a href="?quanly=dangky"><u>Đăng Ký</u></a>
                <?php }  ?>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="TK">         
            <form action="index.php?quanly=timkiem" method="post" id="formtimkiem">            
                <input type="search" name="search_product" placeholder="Tìm kiếm sản phẩm">
                <button type="submit" id='nuttimkiem' name="search_button">Tìm Kiếm</button>        
            </form>                
        </div>
        <div class="TK">
            <div class="Wall"> 
                <img id="img" onclick="ChangeImg()" src="./MVC/Public/Wall/Wall.png" alt="" height="385px" width="90%">; 
            </div>
        </div>
    </div>