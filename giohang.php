<?php
if(isset($_POST['themgiohang'])){
    $tensanpham =$_POST['tensanpham'];
    $sanpham_id =$_POST['sanpham_id'];
    $hinhanh =$_POST['hinhanh'];
    $gia =$_POST['giasanpham'];
    $soluong =$_POST['soluong'];
    $mshh=$_POST['mshh'];
    $sql_select_giohang=mysqli_query($con,"select * from giohang where mshh='$mshh'");
    $count=mysqli_num_rows($sql_select_giohang);
    if($count >0){
        $row_sanpham=mysqli_fetch_array($sql_select_giohang);
        $soluong=$row_sanpham['soluong']+1;
        $sql_giohang="update giohang set soluong='$soluong' where spid='$sanpham_id'";
    }else{
        $soluong=$soluong;
        $sql_giohang="insert into giohang(tenhh,gia,hinhanh,soluong,spid,mshh) values ('$tensanpham','$gia','$hinhanh','$soluong','$sanpham_id','$mshh')";
            header('Location:index.php');      
    }
    $insert_row=mysqli_query($con,$sql_giohang);
    if($insert_row==0){
        header('Location:index.php');
    } 
}elseif(isset($_POST['capnhatsoluong'])){
    for($i=0;$i<count($_POST['product_id']);$i++){
        $sanpham_id=$_POST['product_id'][$i];
        $soluong =$_POST['soluong'][$i];
        $sql_update=mysqli_query($con,"Update giohang SET soluong='$soluong' where spid='$sanpham_id'");
    }   
}
elseif(isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    $sql_delete=mysqli_query($con,"delete from giohang where giohangid = '$id'");
 }elseif(isset($_GET['dangxuat'])){
     $id=$_GET['dangxuat'];
     if($id==1){
   unset($_SESSION['dangnhap_home']);
     }
 }
elseif(isset($_POST['thanhtoan'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $note=$_POST['note'];
    $address=$_POST['address'];
    $giaohang=$_POST['giaohang'];
    $sql_khachhang= mysqli_query($con,"INSERT INTO `khachhang`( `ten`, `sodienthoai`, `diachi`, `ghichu`, `email`, `giaohang`,`password`) VALUES ('$name','$phone','$address','$note','$email','$giaohang','$password')");
    if($sql_khachhang){
        $sql_select_khachhang=mysqli_query($con,"select * from khachhang order by khachhangid DESC limit 1");
        $mahang=rand(0,9999);
        $row_khachhang=mysqli_fetch_array($sql_select_khachhang);
        $khachhang_id=$row_khachhang['khachhangid'];
        $_SESSION['dangnhap_home']=$row_khachhang['ten'];
        $_SESSION['khachhang_id']=$khachhang_id;
        for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            $sanpham_id=$_POST['thanhtoan_product_id'][$i];
            $soluong=$_POST['thanhtoan_soluong'][$i];
            $mshh=$_POST['thanhtoan_mshh'][$i];
            $sql_donhang=mysqli_query($con,"INSERT INTO `donhang`( `sanphamid`, `dh_soluong`, `mahang`, `khachhangid`,`mshh`) VALUES ('$sanpham_id','$soluong','$mahang','$khachhang_id','$mshh')");
            $sql_giaodich=mysqli_query($con,"INSERT into giaodich (sanphamid,soluong,magiaodich,khachhangid,mshh) values('$sanpham_id','$soluong','$mahang','$khachhang_id','$mshh')");
            $sql_delete_thanhtoan=mysqli_query($con,"delete from giohang where spid='$sanpham_id'");
        }
    }
}elseif(isset($_POST['thanhtoandangnhap'])){
        $khachhang_id=$_SESSION['khachhang_id'];
        $mahang=rand(0,9999);
        for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            $sanpham_id=$_POST['thanhtoan_product_id'][$i];
            $soluong=$_POST['thanhtoan_soluong'][$i];
            $mshh=$_POST['thanhtoan_mshh'][$i];
            $sql_donhang=mysqli_query($con,"INSERT INTO `donhang`( `sanphamid`, `dh_soluong`, `mahang`, `khachhangid`,`mshh`) VALUES ('$sanpham_id','$soluong','$mahang','$khachhang_id','$mshh')");
            $sql_giaodich=mysqli_query($con,"INSERT into giaodich (sanphamid,soluong,magiaodich,khachhangid,mshh) values('$sanpham_id','$soluong','$mahang','$khachhang_id','$mshh')");
            $sql_delete_thanhtoan=mysqli_query($con,"delete from giohang where spid='$sanpham_id'");
    }   
}
?>
<div class="giohang">
                        <h1 style="text-align: center">Giỏ Hàng Của Bạn</h1><br>
                        <?php
                        if(isset($_SESSION['dangnhap_home'])){
                            echo '<p>Xin chào bạn '.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=giohang&dangxuat=1">  Đăng xuất</a></p>';
                        }else{
                            echo '';
                        }
                        ?>
                        <div class="chitietgiohang">
                        <form action="" method="post">
                            <table border class="banggiohang">
                                <tr id="tieudegiohang">
                                    <td>Thứ tự</td>
                                    <td>Sản Phẩm</td>
                                    <td>Số Lượng</td>
                                    <td>Tên Sản Phẩm</td>
                                    <td>Giá</td>
                                    <td>Giá Tổng</td>
                                    <td>Xóa</td>
                                </tr>                              
                                <?php 
                                    $sql_lay_giohang=mysqli_query($con,"select * from giohang order by giohangid DESC");
                                    $i=0;
                                    $total=0;
                                    while($row_giohang=mysqli_fetch_array($sql_lay_giohang)){
                                    $subtotal=$row_giohang['soluong'] * $row_giohang['gia'];
                                    $total+=$subtotal;
                                    $i++;
                                    ?>
                                <tr id="chitietsanphamgiohang">
                                    <td><?php echo $i ?></td>
                                    <td><img src="<?php echo $row_giohang['hinhanh'] ?>" alt="" height=150px width=100px></td>
                                    <td> 
                                    <input type="number" min='1' name='soluong[]' value="<?php echo $row_giohang['soluong'] ?>"> 
                                    <input type="hidden" name="product_id[]" value="<?php echo $row_giohang['spid'] ?>">
                                    </td>
                                   <td><?php echo $row_giohang['tenhh'] ?></td>
                                    <td><?php echo $row_giohang['gia'] ?></td>
                                    <td><?php echo $subtotal ?></td>
                                    <td><a href="?xoa=<?php echo $row_giohang['giohangid'] ?>">Xóa</a></td>                                  
                                </tr>
                                <?php } ?>
                                <tr>
                                <td colspan="7" id="tongtien">Tổng Tiền: <?php echo number_format($total). 'vnđ' ?></td>
                                </tr>
                                <tr>
                                <td colspan="7" id="tdcapnhatgiohang">
                                    <input type="submit" value="Cập nhật giỏ hàng" name="capnhatsoluong" id="capnhatgiohang">
                                    <?php 
                                    $sql_giohang_select=mysqli_query($con,"SELECT * from giohang");
                                    $count_giohang_select=mysqli_num_rows($sql_giohang_select);
                                    if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){ 
                                        while($row_1=mysqli_fetch_array($sql_giohang_select)){
                                    ?>
                                        <input type="hidden" name='thanhtoan_soluong[]' value="<?php echo $row_1['soluong'] ?>"> 
                                        <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['spid'] ?>">
                                        <input type="hidden" name="thanhtoan_mshh[]" value="<?php echo $row_1['mshh'] ?>">
                                        <?php } ?>
                                        <input type="submit" value="Thanh Toán Giỏ Hàng" name="thanhtoandangnhap" id="thanhtoandangnhap"></td>
                                    <?php } ?>
                                </tr>
                            </table>
                            <?php if(!isset($_SESSION['dangnhap_home'])){ ?>
                            </form>
                            <form action="" method="post">
                            <div class="themdiachigiaohang">
                            <h1>Thêm địa chỉ giao hàng</h1>
                            <input type="text" name="name" placeholder="Điền tên khách hàng"><br><br>
                            <input type="text" name="phone" placeholder="Số điện thoại" require=""><br><br>
                            <input type="text" name="address" placeholder="Địa chỉ giao hàng" require=""><br><br>
                            <input type="text" name="email" placeholder="Email" require=""><br><br>
                            <input type="text" name="password" placeholder="Mật Khẩu" require=""><br><br>
                            <textarea name="note" id="" placeholder="Ghi chú" require="" style="resize:none" id="ghichu" cols="92" ></textarea><br><br>                       
                            <select name="giaohang" id="">
                                <option value="">Chọn hình thức giao hàng</option>
                                <option value="0">Thanh toán trực tuyến</option>
                                <option value="1">Thanh toán khi nhận hàng</option>
                            </select>
                        </div>
                            <?php 
                            $sql_lay_giohang=mysqli_query($con,"select * from giohang order by giohangid DESC");
                            while($row_thanhtoan=mysqli_fetch_array($sql_lay_giohang)){
                            ?>
                                    <input type="hidden" name='thanhtoan_soluong[]' value="<?php echo $row_thanhtoan['soluong'] ?>"> 
                                    <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['spid'] ?>">
                                    <input type="hidden" name="thanhtoan_mshh[]" value="<?php echo $row_thanhtoan['mshh'] ?>">
                            <?php } ?>        
                            <input type="submit" name="thanhtoan" value="Thanh toán" id="thanhtoan">                            
                            </form>
                            <?php } ?>
                        </div>
                </div>				