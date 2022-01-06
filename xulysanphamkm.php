<?php
include('../core/connectDB.php');
if(isset($_POST['themsanpham'])){
    $tensanpham=$_POST['tensanpham'];
    $hinhanh=$_POST['hinhanh'];
    $soluong=$_POST['soluong'];
    $gia=$_POST['giasanpham'];
    $giakm=$_POST['giasanphamkm'];
    $mshh=$_POST['mshh'];
    $path='../uploads/';
    $sql_insert=mysqli_query($con,"INSERT INTO `sanphamkhuyenmai`(`mshh`, `tenhh`, `gia`,`giakhuyenmai`, `soluong`, `hinh`) VALUES('$mshh','$tensanpham','$gia','$giakm','$soluong','$hinhanh')");
}elseif(isset($_POST['capnhatsanpham'])){
    $id_update=$_POST['id_update'];
    $tensanpham=$_POST['tensanpham'];
    $hinhanh=$_POST['hinhanh'];
    $soluong=$_POST['soluong'];
    $gia=$_POST['giasanpham'];
    $giakm=$_POST['giasanphamkm'];
    $mshh=$_POST['mshh'];
    $path='../uploads/';
    if($hinhanh==''){
        $sql_update_no_image="UPDATE `sanphamkhuyenmai` SET `mshh`='$mshh',`tenhh`='$tensanpham',`gia`='$gia',`giakhuyenmai`='$giakm',`soluong`='$soluong'  where id='$id_update'";
    }else{
        $sql_update_no_image="UPDATE `sanphamkhuyenmai` SET `mshh`='$mshh',`tenhh`='$tensanpham',`gia`='$gia',`giakhuyenmai`='$giakm',`soluong`='$soluong',`hinh`='$hinhanh' where id='$id_update'";
    }
    mysqli_query($con,$sql_update_no_image);
}

?>
<?php
    if(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_xoa=mysqli_query($con,"DELETE FROM `sanphamkhuyenmai` where id ='$id'");
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
                width: 30%;
                min-height: 100px;
                text-align: right;
            }
            .lietkedanhmuc{
                width: 70%;
                min-height: 200px;
                text-align: center;
            }
            .lietkedanhmuc table{
                margin-left: auto;
                margin-right: auto;

            }
            .lietkedanhmuc table th,td{
                min-width: 50px;
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
            if(isset($_GET['admin'])=='capnhat' && isset($_GET['capnhat_id'])){
                $id_capnhat=$_GET['capnhat_id'];
                $sql_capnhat=mysqli_query($con,"select * from sanphamkhuyenmai where id='$id_capnhat'");
                $row_capnhat=mysqli_fetch_array($sql_capnhat);
                $hinh_tmp=$row_capnhat['hinh'];
                $hinh_tmp_2=array();
                $hinh_tmp_2=explode('/',$hinh_tmp,3);
            ?>
                <h2>Cập nhật sản phẩm</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Mã số hàng hóa</label>
                <input type="text" name="mshh" value="<?php echo $row_capnhat['mshh'] ?>"><br><br>
                <label for="">Tên sản phẩm</label>
                <input type="hidden" name="id_update" value="<?php echo $row_capnhat['id']?>">
                <input type="text" name="tensanpham"value="<?php echo $row_capnhat['tenhh'] ?>"><br><br>
                <label for="">Hình ảnh</label>
                <input type="text" name="hinhanh" value="<?php echo $row_capnhat['hinh'] ?>"><br><br>
                <label for="">Giá</label>
                <input type="text" name="giasanpham" value="<?php echo $row_capnhat['gia'] ?>"><br><br>
                <label for="">Giá KM</label>
                <input type="text" name="giasanphamkm" value="<?php echo $row_capnhat['giakhuyenmai'] ?>"><br><br>
                <label for="">Số lượng</label>
                <input type="text" name="soluong" value="<?php echo $row_capnhat['soluong'] ?>"><br>          
                <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" id="themdanhmucbt">
            </form>
               <?php     
            }else{ 
                ?>
                <h2>Thêm sản phẩm</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Mã số hàng hóa</label>
                <input type="text" name="mshh" placeholder="Mã số hàng hóa"><br><br>
                <label for="">Tên sản phẩm</label>
                <input type="text" name="tensanpham" placeholder="Tên sản phẩm"><br><br>
                <label for="">Hình ảnh</label>
                <input type="text"name="hinhanh" placeholder="./MVC/Public/pic/AoBD/"><br><br>
                <label for="">Giá</label>
                <input type="text" name="giasanpham"><br><br>
                <label for="">Giá KM</label>
                <input type="text" name="giasanphamkm"><br><br>
                <label for="">Số lượng</label>
                <input type="text" name="soluong" placeholder="Số Lượng"><br>          
                <input type="submit" name="themsanpham" value="Thêm sản phẩm" id="themdanhmucbt">
            </form>
             <?php } ?> 
            
            
        </div>
        <div class="lietkedanhmuc">
            <h2>Liệt kê sản phẩm</h2>
            <?php
                $sql_select_sp=mysqli_query($con,"SELECT * FROM `sanphamkhuyenmai` order by id DESC");
            ?>
            <table border="">
                    <tr>
                        <th>Thứ tự</th>
                        <th>MSHH</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    $i=0;
                    while($row_sp=mysqli_fetch_array( $sql_select_sp)){
                        $i++;
                        $hinh_tmp=$row_sp['hinh'];
                        // echo $hinh_tmp;  
                        // echo '<br>';
                        $hinh_tmp_2=array();
                        $hinh_tmp_2=explode('/',$hinh_tmp,3);
                        // print_r($hinh_tmp_2);
                        // echo '<br>';                 
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_sp['mshh'] ?></td>
                        <td><?php echo $row_sp['tenhh'] ?></td>
                        <td><img src="../<?php echo $hinh_tmp_2['2'] ?>" alt="" height="100" width="80"></td>
                        <td><?php echo $row_sp['soluong'] ?></td>
                        <td><?php echo number_format($row_sp['gia']).' vnđ' ?></td>
                        <td><?php echo number_format($row_sp['giakhuyenmai']).' vnđ' ?></td>
                        <td><a href="?admin=sanphamkm&xoa=<?php echo $row_sp['id']?>">Xóa</a> || <a href="?admin=sanphamkm&capnhat_id=<?php echo $row_sp['id']?>">Cập nhật</a></td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>