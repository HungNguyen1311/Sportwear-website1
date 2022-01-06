<?php
include('../core/connectDB.php');
// if(isset($_POST['themdanhmuc'])){
//     $tendanhmuc=$_POST['danhmuc'];
//     $sql_insert=mysqli_query($con,"insert into hanghoa1 (tenhh) values ('$tendanhmuc')");
// }elseif(isset($_POST['capnhatdanhmuc'])){
//     $id_post_capnhat=$_POST['id_danhmuc'];
//     $tendanhmuc=$_POST['danhmuc'];
//     $sql_update=mysqli_query($con,"UPDATE `hanghoa1` SET `tenhh`='$tendanhmuc' where `id`='$id_post_capnhat'");
//     header('Location=xulydanhmuc.php');
// }
// if(isset($_GET['xoa'])){
//     $id=$_GET['xoa'];
//     $sql_xoa=mysqli_query($con,"DELETE FROM `hanghoa1` where id ='$id'");
// }if(isset($_POST['capnhatkhachhang'])){
//     $xuly=$_POST['xuly'];
//     $mahang=$_POST['mahang_xuly'];
//     $sql_update_khachhang=mysqli_query($con,"update khachhang set tinhtrang='$xuly' where mahang='$mahang'"); 
// }
// if(isset($_GET['xoakhachhang'])){
//     $mahang=$_GET['xoakhachhang'];
//     $sql_delete=mysqli_query($con,"delete from khachhang where mahang ='$mahang'");
//     header("location=xulykhachhang.php");
// }
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
            .lietkedanhmuc{
                width: 100%;
                min-height: 100px;
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
            <li><a href="?admin=donhang">Đơn Hàng</a></li>
            <li><a href="?admin=sanpham1">Sản Phẩm Áo Thể Thao</a></li>
            <li><a href="?admin=sanpham2">Sản Phẩm Áo Phông</a></li>
            <li><a href="?admin=sanpham3">Sản Phẩm Giày</a></li>
            <li><a href="?admin=sanphamkm">Sản Phẩm Khuyến Mãi</a></li>
            <li><a href="?admin=khachhang">Khách Hàng</a></li>
        </ul>
    </div>
    <div class="xulydanhmuc">
        <div class="lietkedanhmuc">
            <h3>Liệt Kê Khách Hàng </h3>
            <?php
                $sql_select=mysqli_query($con,"SELECT  * FROM `khachhang`,`giaodich` where khachhang.khachhangid=giaodich.khachhangid group by khachhang.khachhangid order by khachhang.khachhangid DESC");       
            ?>
            <table border="">
                    <tr style="text-align:left;font-weight:bold;"   >
                        <th> Thứ tự</th>                      
                        <th>Tên khách hàng</th>  
                        <th>Số điện thoại</th>     
                        <th>Địa chỉ</th>               
                        <th>Email</th>
                        <th>Quản lý</th>

                    </tr>
                    <?php
                    $i=0;
                    while($row_khachhang=mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr style="text-align:left;font-weight:bold;">
                        <td><?php echo $i ?></td>                      
                        <td><?php echo $row_khachhang['ten']?></td>
                        <td><?php echo $row_khachhang['sodienthoai']?></td>
                        <td><?php echo $row_khachhang['diachi']?></td>
                        <td><?php echo $row_khachhang['email']?></td>
                        <td><a href="?admin=xemgiaodich&khachhang=<?php echo $row_khachhang['khachhangid'] ?>">Xem giao dịch</a></td>
                    </tr>
                    <?php } ?>                    
            </table>
        </div>
        <div class="lietkedanhmuc">
            <h2>Liệt Kê Lịch Sử Đơn Hàng</h2>
            <?php
            if(isset($_GET['khachhang'])){
                $magiaodich=$_GET['khachhang'];                    
            }else{
                $magiaodich='';
            }
            $sql_select=mysqli_query($con,"SELECT * from giaodich, hanghoa1 where giaodich.khachhangid='$magiaodich' and giaodich.mshh=hanghoa1.mshh ORDER by giaodich.magiaodich DESC");
            $sql_select4=mysqli_query($con,"SELECT * from giaodich, sanphamkhuyenmai where giaodich.khachhangid='$magiaodich' and giaodich.mshh=sanphamkhuyenmai.mshh ORDER by giaodich.magiaodich DESC");
            ?>
            <table border="">
                    <tr>
                        <th> Thứ tự</th>
                        <th>Mã giao dich</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày đặt</th>                      

                    </tr>
                    <?php
                    $i=0;
                    while($row_donhang=mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr style="text-align:left;font-weight:bold;">
                        <td><?php echo $i ?></td>                      
                        <td><?php echo $row_donhang['magiaodich']?></td>
                        <td style="text-align:left"><?php echo $row_donhang['tenhh']?></td>
                        <td><?php echo $row_donhang['ngaythang']?></td>
                    </tr>
                    <?php } ?>
                    <?php
                    while($row_donhang4=mysqli_fetch_array($sql_select4)){
                        $i++;
                    ?>
                    <tr style="text-align:left;font-weight:bold;">
                        <td><?php echo $i ?></td>                       
                        <td><?php echo $row_donhang4['magiaodich']?></td>
                        <td style="text-align:left"><?php echo $row_donhang4['tenhh']?></td>
                        <td><?php echo $row_donhang4['ngaythang']?></td>
                    </tr>
                    <?php } ?>  
            </table>
        </div>
    </div>
</body>
</html>