<?php 
        $sql_product=mysqli_query($con,"SELECT * from sanphamkhuyenmai  order by id DESC");
?>
<div class="chitiet2">
    <div class="sanpham1">
        <div class="tieude"><strong>CÁC SẢN PHẨM </strong></div>
            <div class="noidung">
                <div class="kid2">
                <?php while($row_sanpham=mysqli_fetch_array($sql_product)){ ?>                
                                <div class="boyspkm">                                    
                                    <div class="B1spkm"><IMG SRC="<?php echo $row_sanpham['hinh']?>" width:100 height=250 ></div>                                   
                                    <div class="B1" style="font-weight:bold; font-size:18px;"><a href="?quanly=chitietspkm&id=<?php echo $row_sanpham['id'] ?>"><?php echo $row_sanpham['tenhh'] ?></a></div>
                                    <div class="B1spkm"><strong><?php echo number_format($row_sanpham['giakhuyenmai']).' vnđ'?></strong></div>
                                    <div class="B1spkm"><del><strong><?php echo number_format($row_sanpham['gia']).' vnđ'?></strong></del></div>
                                    <form action="?quanly=giohang" method="post">      
                                        <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['tenhh'] ?>">
                                        <input type="hidden" name="mshh" value="<?php echo $row_sanpham['mshh'] ?>">
                                        <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['id'] ?>">
                                        <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['gia'] ?>">
                                        <input type="hidden" name="hinhanh" value="<?php echo$row_sanpham['hinh'] ?>">
                                        <input type="hidden" name="soluong" value="1">
                                        <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" id="tgh">
                                    </form>  
                                </div>
<?php } ?>
                            </div>
                    </div>
                </div>                  
    </div>       