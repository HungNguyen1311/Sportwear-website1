<?php
include('../core/connectDB.php');
if(isset($_POST['themdanhmuc'])){
    $tendanhmuc=$_POST['danhmuc'];
    $sql_insert=mysqli_query($con,"insert into nhomhanghoa (tenloai) values ('$tendanhmuc')");
}elseif(isset($_POST['capnhatdanhmuc'])){
    $id_post_capnhat=$_POST['id_danhmuc'];
    $tendanhmuc=$_POST['danhmuc'];
    $sql_update=mysqli_query($con,"UPDATE `nhomhanghoa` SET `tenloai`='$tendanhmuc' where `id`='$id_post_capnhat'");
    header('Location=xulydanhmuc.php');
}
if(isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    $sql_xoa=mysqli_query($con,"DELETE FROM `nhomhanghoa` where id ='$id'");
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
                min-width: 200px;
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
            if(isset($_GET['admin'])=='capnhatdanhmuc' && isset($_GET['id'])){
                $id_capnhat=$_GET['id'];
                $sql_capnhat=mysqli_query($con,"select * from nhomhanghoa where id='$id_capnhat'");
                $row_capnhat=mysqli_fetch_array($sql_capnhat);
            ?>
                <h2>Cập nhật danh mục</h2>
            <form action="" method="post">
                <input type="text" name="danhmuc" value="<?php echo $row_capnhat['tenloai'] ?>"><br>
                <input type="hidden" name="id_danhmuc" value="<?php echo $row_capnhat['id'] ?>">
                <input type="submit" name="capnhatdanhmuc" id="themdanhmuc" value="Cập nhật danh mục" id="themdanhmucbt">
            </form>
            <?php
            }else{
                ?> 
                <h2>Thêm danh mục</h2>
            <form action="" method="post">
                <input type="text" name="danhmuc" placeholder="Tên danh mục"><br>
                <input type="submit" name="themdanhmuc" id="themdanhmuc" value="Thêm danh mục" id="themdanhmucbt">
            </form> 
             <?php } ?>  
                      
        </div>
        <div class="lietkedanhmuc">
            <h2>Liệt kê danh mục</h2>
            <?php
                $sql_select=mysqli_query($con,"SELECT * FROM nhomhanghoa ");
            ?>
            <table border="">
                    <tr>
                        <th> Thứ tự</th>
                        <th>Tên danh mục</th>
                    </tr>
                    <?php
                    
                    while($row=mysqli_fetch_array($sql_select)){
                        
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['tenloai']?></td>
                        <td><a href="?admin=xoadanhmuc&xoa=<?php echo $row['id'] ?>">Xóa</a> || <a href="?admin=capnhatdanhmuc&id=<?php echo $row['id'] ?>">Cập nhật</a></td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>