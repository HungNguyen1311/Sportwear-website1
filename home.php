<div class="chitiet2">
<div class="sanpham1">
        <div class="tieude"><strong>CÁC SẢN PHẨM MỚI </strong></div>   
            <div class="noidung">
                <div class="kid2">
                <?php 
                $sql_product=mysqli_query($con,"SELECT * from hanghoa1  order by id DESC LIMIT 8");
                while($row_sanpham=mysqli_fetch_array($sql_product)){ ?>                
                                <div class="boy">                                    
                                    <div class="B1"><IMG SRC="<?php echo $row_sanpham['hinh']?>" width:100 height=250  ></div>
                                    <div class="B1" style="font-weight:bold; font-size:18px;"><a href="?quanly=chitietsp1&id=<?php echo $row_sanpham['id'] ?>"><?php echo $row_sanpham['tenhh'] ?></a></div>
                                    <div class="B1"><strong><?php echo number_format($row_sanpham['gia']).' vnđ'?></strong></div>
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
    <?php
        $sql_spbc=mysqli_query($con,'select mshh,COUNT(mshh) as soluong from giaodich GROUP by mshh ORDER BY `soluong` DESC limit 5');
        $temp=array();
        $i=0;
        while($row_spbc=mysqli_fetch_array($sql_spbc)){
            $temp[$i]=$row_spbc['mshh'];
            $i++;           
        }
        $temp1=(string)$temp[0];
        $temp2=$temp[1];
        $temp3=$temp[2];
        $temp4=$temp[3];
        $temp5=$temp[4];
        $sql_spbc1=mysqli_query($con,"SELECT * from hanghoa1 where mshh='$temp1' or mshh='$temp2' or mshh='$temp3' or mshh='$temp4' or mshh='$temp5'");
        $sql_spbc2=mysqli_query($con,"SELECT * from sanphamkhuyenmai where mshh='$temp1' or mshh='$temp2' or mshh='$temp3' or mshh='$temp4' or mshh='$temp5'");
    ?> 
    <div class="sanpham1">
        <div class="tieude"><strong>CÁC SẢN PHẨM BÁN CHẠY </strong></div>
            <div class="noidung">
                <div class="kid2">
                <?php                                
                while($row_sanpham=mysqli_fetch_array($sql_spbc1)){ ?>                
                                <div class="boy">                                    
                                    <div class="B1"><IMG SRC="<?php echo $row_sanpham['hinh']?>" width:100 height=250 ></div>
                                    <div class="B1" style="font-weight:bold; font-size:18px;"><a href="?quanly=chitietsp1&id=<?php echo $row_sanpham['id'] ?>"><?php echo $row_sanpham['tenhh'] ?></a></div>
                                    <div class="B1"><strong><?php echo number_format($row_sanpham['gia']).' vnđ'?></strong></div>
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
<?php                                
                while($row_sanpham=mysqli_fetch_array($sql_spbc2)){ ?>                
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
    <div class="sanpham1">
        <div class="tieude"><strong>CÁC SẢN PHẨM KHUYẾN MÃI </strong></div>
            <div class="noidung">
                <div class="kid2">
                <?php                                
                $sql_product3=mysqli_query($con,"SELECT * from sanphamkhuyenmai  order by id DESC limit 5");
                while($row_sanpham=mysqli_fetch_array($sql_product3)){ ?>                
                                <div class="boy">                                    
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
</div>       