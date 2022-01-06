<?php
include('../core/connectDB.php');
if(isset($_POST['themdanhmuc'])){
    $tendanhmuc=$_POST['danhmuc'];
    $sql_insert=mysqli_query($con,"insert into hanghoa1 (tenhh) values ('$tendanhmuc')");
}elseif(isset($_POST['capnhatdanhmuc'])){
    $id_post_capnhat=$_POST['id_danhmuc'];
    $tendanhmuc=$_POST['danhmuc'];
    $sql_update=mysqli_query($con,"UPDATE `hanghoa1` SET `tenhh`='$tendanhmuc' where `id`='$id_post_capnhat'");
    header('Location=xulydanhmuc.php');
}
if(isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    $sql_xoa=mysqli_query($con,"DELETE FROM `hanghoa1` where id ='$id'");
}if(isset($_POST['capnhatdonhang'])){
    $xuly=$_POST['xuly'];
    $mahang=$_POST['mahang_xuly'];
    $sql_update_donhang=mysqli_query($con,"update donhang set tinhtrang='$xuly' where mahang='$mahang'"); 
}
if(isset($_GET['xoadonhang'])){
    $mahang=$_GET['xoadonhang'];
    $sql_delete=mysqli_query($con,"delete from donhang where mahang ='$mahang'");
    header("location=xulydonhang.php");
}
?>
<html>
    <head>
        <style>
            .xulydanhmuc{
                width: 100%;
                min-height: 500px;
                flex-direction: row;
                display: flex;
            }
            .themdanhmuc{
                width: 50%;
                min-height: 100px;
                text-align: right;
            }
            .lietkedanhmuc{
                width: 50%;
                min-height: 200px;
                text-align: center;
            }
            .lietkedanhmuc table{
                margin-left: auto;
                margin-right: auto;

            }
            .lietkedanhmuc table th,td{
                min-width: 30px;
                height: 20px;
                text-align: center;
            }
            #themdanhmucbt{
                margin-top: 50px;
            }
            .menu{
                width: 100%;
                height: 70px;
                background-color: purple;
            }
            .menudanhmuc li{
                float: left;
                list-style: none;
                position: relative;
            }
            ul.menudanhmuc >li >a{
                color:white;
                text-decoration: none;
                padding: 0px 15px 0px 15px;
                line-height: 70px;
                display: block;
            }
            .cndh{
                margin-top: 10px;
                width: 160px;
                height: 28px;
                margin-bottom: 10px;
                border-radius: 5px;
                border: none;
                background-color:red;
                color: white;
            }
        </style>
    </head>
<body>
    <div class="menu">
        <ul class="menudanhmuc">
            <li><a href="?admin=donhang">Đon Hàng</a></li>
            <li><a href="?admin=danhmuc1">Danh Mục</a></li>
            <li><a href="?admin=sanpham1">Sản Phẩm Áo Thể Thao</a></li>
            <li><a href="?admin=sanpham2">Sản Phẩm Áo Phông</a></li>
            <li><a href="?admin=sanpham3">Sản Phẩm Giày</a></li>
            <li><a href="?admin=sanphamkm">Sản Phẩm Khuyến Mãi</a></li>
            <li><a href="?admin=khachhang">Khách Hàng</a></li>
        </ul>
    </div>
    <div class="xulydanhmuc">
        <div class="themdanhmuc">
            <?php
            if(isset($_GET['admin'])=='xemdonhang' && isset($_GET['mahang'])){
               $mahang=$_GET['mahang'];
                 $sql_chitiet=mysqli_query($con,"select * from donhang,hanghoa1 where donhang.mshh=hanghoa1.mshh and donhang.mahang='$mahang'");                 
                 $sql_chitiet2=mysqli_query($con,"select * from donhang,sanphamkhuyenmai where donhang.mshh=sanphamkhuyenmai.mshh and donhang.mahang='$mahang'");                                                                                                   
            ?>
            <h3>Xem Chi tiết dơn hàng</h3> 
            <form action="" method="post">
            <table border="">
                    <tr>
                        <th> Thứ tự</th>
                        <th>Mã hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Mã hàng hóa</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>                       
                    </tr>
                    <?php
                    $i=0;
                    while($row_donhang=mysqli_fetch_array($sql_chitiet)){
                        $i++;
                        $subtotal=$row_donhang['dh_soluong'] * $row_donhang['gia'];
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_donhang['mahang']?></td>
                        <td><?php 
                                if($row_donhang['tinhtrang']==0){
                                    echo 'Chưa xử lý';
                                }else{
                                    echo 'Đã xử lý';
                                }     
                        ?></td>
                        <td><?php echo $row_donhang['mshh']?></td>                       
                        <td><?php echo $row_donhang['tenhh']?></td>
                        <td><?php echo $row_donhang['dh_soluong']?></td>  
                        <td><?php echo number_format($row_donhang['gia']).'vnđ'?></td>               
                        <td><?php echo number_format( $subtotal).'vnđ'?></td>
                        <td><?php echo $row_donhang['ngaythang']?></td>
                        <input type="hidden" name="mahang_xuly" id="" value="<?php echo $row_donhang['mahang']?>">
                        <!-- <td><a href="?xoa=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem đon hàng</a></td> -->
                    </tr>
                    <?php } ?>
                    <?php
                    $i=0;
                    while($row_donhang=mysqli_fetch_array($sql_chitiet2)){
                        $i++;
                        $subtotal=$row_donhang['dh_soluong'] * $row_donhang['gia'];
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_donhang['mahang']?></td>
                        <td><?php 
                                if($row_donhang['tinhtrang']==0){
                                    echo 'Chưa xử lý';
                                }else{
                                    echo 'Đã xử lý';
                                }     
                        ?></td>
                        <td><?php echo $row_donhang['mshh']?></td>                       
                        <td><?php echo $row_donhang['tenhh']?></td>
                        <td><?php echo $row_donhang['dh_soluong']?></td>  
                        <td><?php echo number_format($row_donhang['gia']).'vnđ'?></td>               
                        <td><?php echo number_format( $subtotal).'vnđ'?></td>
                        <td><?php echo $row_donhang['ngaythang']?></td>
                        <input type="hidden" name="mahang_xuly" id="" value="<?php echo $row_donhang['mahang']?>">
                        <!-- <td><a href="?xoa=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem đon hàng</a></td> -->
                    </tr>
                    <?php } ?>
            </table>
            <br><select name="xuly" id="">
                <option value="1">Đã xử lý</option>
                <option value="2">Chưa xử lý</option><br>       
            </select>
           <br> <input type="submit" value="Cập nhật đon hàng" name="capnhatdonhang" class="cndh">
            </form>
            <?php
            }else{               
                ?>          
            <p style="font-weight:bold; font-size:30px">Đơn Hàng</p>
            <?php } ?>                   
        </div>
        <div class="lietkedanhmuc">
            <h2>Liệt Kê Đơn Hàng</h2>
            <?php
                $sql_select=mysqli_query($con,"SELECT  * FROM `khachhang`,`donhang`  where donhang.khachhangid=khachhang.khachhangid group by donhang.mahang");       
            ?>
            <table border="">
                    <tr>
                        <th> Thứ tự</th>
                        <th>Mã hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Quản lý</th>

                    </tr>
                    <?php
                    $i=0;
                    while($row_donhang=mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr style="text-align:left;font-weight:bold;">
                        <td><?php echo $i ?></td>                      
                        <td><?php echo $row_donhang['mahang']?></td>
                        <td><?php echo $row_donhang['ten']?></td>
                        <td><?php echo $row_donhang['ngaythang']?></td>
                        <td><a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?admin=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem đon hàng</a></td>
                    </tr>
                    <?php } ?>
                     <!-- <?php
                    $i=0;
                    while($row_donhang2=mysqli_fetch_array($sql_select2)){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>                       
                        <td><?php echo $row_donhang2['mahang']?></td>
                        <td><?php echo $row_donhang2['ten']?></td>
                        <td><?php echo $row_donhang2['ngaythang']?></td>
                        <td><a href="?xoa=<?php echo $row['id'] ?>">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row['id'] ?>">Xem đon hàng</a></td>
                    </tr>
                    <?php } ?>
                    <?php
                    $i=0;
                    while($row_donhang3=mysqli_fetch_array($sql_select3)){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>                       
                        <td><?php echo $row_donhang3['mahang']?></td>
                        <td><?php echo $row_donhang3['ten']?></td>
                        <td><?php echo $row_donhang3['ngaythang']?></td>
                        <td><a href="?xoa=<?php echo $row['id'] ?>">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row['id'] ?>">Xem đon hàng</a></td>
                    </tr>
                    <?php } ?>  --> 
            </table>
        </div>
    </div>
</body>
</html>