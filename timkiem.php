<?php
    if(isset($_POST['search_button'])){
        $tukhoa=$_POST['search_product'];
        $sql_product=mysqli_query($con,"SELECT * from hanghoa1 where tenhh like '%$tukhoa%' order by id DESC");
        $sql_product4=mysqli_query($con,"SELECT * from sanphamkhuyenmai where tenhh like '%$tukhoa%' order by id DESC");
        $title=$tukhoa;
        $count1=mysqli_num_rows($sql_product);
        $count4=mysqli_num_rows($sql_product4);
    }
?>
<h3 id="timkiem">Tìm Kiếm :<?php echo $title ?></h3>
<?php if($count1>0){?>
<div class="chitiet2">
    <div class="sanpham1"><div class="noidung">
                <div class="kid2">
                <?php while($row_sanpham=mysqli_fetch_array($sql_product)){ ?>                
                                <div class="boy">                                    
                                    <div class="B1"><IMG SRC="<?php echo $row_sanpham['hinh']?>" width:100 height=250 ></div>
                                    <div class="B1"><a href="?quanly=chitietsp1&id=<?php echo $row_sanpham['id'] ?>"><?php echo $row_sanpham['tenhh'] ?></a></div>
                                    <div class="B1"><?php echo number_format($row_sanpham['gia']).' vnđ'?></strong></div>
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
<?php while($row_sanpham=mysqli_fetch_array($sql_product4)){ ?>                
                                <div class="boy">                                    
                                <div class="B1spkm"><IMG SRC="<?php echo $row_sanpham['hinh']?>" width:100 height=250 ></div>                                   
                                    <div class="B1spkm"><a href="?quanly=chitietspkm&id=<?php echo $row_sanpham['id'] ?>"><?php echo $row_sanpham['tenhh'] ?></a></div>
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
                <?php } ?>
</div>           