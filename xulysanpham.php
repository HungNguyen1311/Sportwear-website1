<?php
include('../core/connectDB.php');
if(isset($_POST['themsanpham'])){
    $tensanpham=$_POST['tensanpham'];
    $hinhanh=$_POST['hinhanh'];
    $soluong=$_POST['soluong'];
    $gia=$_POST['giasanpham'];
    $mshh=$_POST['mshh'];
    $idloai=$_POST['idloai'];
    $path='../uploads/';
    $sql_insert=mysqli_query($con,"INSERT INTO `hanghoa1`(`mshh`, `tenhh`, `gia`, `soluong`, `hinh`,`idloai`) VALUES('$mshh','$tensanpham','$gia','$soluong','$hinhanh','$idloai')");
}elseif(isset($_POST['capnhatsanpham'])){
    $id_update=$_POST['id_update'];
    $tensanpham=$_POST['tensanpham'];
    $hinhanh=$_POST['hinhanh'];
    $soluong=$_POST['soluong'];
    $gia=$_POST['giasanpham'];
    $mshh=$_POST['mshh'];
    $idloai=$_POST['idloai'];
    $path='../uploads/';
    if($hinhanh==''){
        $sql_update_no_image="UPDATE `hanghoa1` SET `mshh`='$mshh',`tenhh`='$tensanpham',`gia`='$gia',`soluong`='$soluong',`idloai` = '$idloai'  where id='$id_update'";
    }else{
        $sql_update_no_image="UPDATE `hanghoa1` SET `mshh`='$mshh',`tenhh`='$tensanpham',`gia`='$gia',`soluong`='$soluong',`hinh`='$hinhanh' where id='$id_update'";
    }
    mysqli_query($con,$sql_update_no_image);
}

?>
<?php
    if(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_xoa=mysqli_query($con,"DELETE FROM `hanghoa1` where id ='$id'");
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
        <li><a href="?admin=donhang">??on H??ng</a></li>
            <li><a href="?admin=danhmuc1">Danh M???c</a></li>
            <li><a href="?admin=sanpham1">S???n Ph???m ??o Th??? Thao</a></li>
            <li><a href="?admin=sanpham2">S???n Ph???m ??o Ph??ng</a></li>
            <li><a href="?admin=sanpham3">S???n Ph???m Gi??y</a></li>
            <li><a href="?admin=sanphamkm">S???n Ph???m Khuy???n M??i</a></li>
            <li><a href="?admin=khachhang">Kh??ch H??ng</a></li>
        </ul>
    </div>
    <div class="xulydanhmuc">
        <div class="themdanhmuc">
            <?php
            if(isset($_GET['admin'])=='capnhat' && isset($_GET['capnhat_id'])){
                $id_capnhat=$_GET['capnhat_id'];
                $sql_capnhat=mysqli_query($con,"select * from hanghoa1 where id='$id_capnhat'");
                $row_capnhat=mysqli_fetch_array($sql_capnhat);
                $hinh_tmp=$row_capnhat['hinh'];
                $hinh_tmp_2=array();
                $hinh_tmp_2=explode('/',$hinh_tmp,3);
            ?>
                <h2>C???p nh???t s???n ph???m</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Id lo???i s???n ph???m</label>
                <input type="text" name="idloai" value="<?php echo $row_capnhat['idloai'] ?>"><br><br>
                <label for="">M?? s??? h??ng h??a</label>
                <input type="text" name="mshh" value="<?php echo $row_capnhat['mshh'] ?>"><br><br>
                <label for="">T??n s???n ph???m</label>
                <input type="hidden" name="id_update" value="<?php echo $row_capnhat['id']?>">
                <input type="text" name="tensanpham"value="<?php echo $row_capnhat['tenhh'] ?>"><br><br>
                <label for="">H??nh ???nh</label>
                <input type="text" name="hinhanh" value="<?php echo $row_capnhat['hinh'] ?>"><br><br>
                <label for="">Gi??</label>
                <input type="text" name="giasanpham" value="<?php echo $row_capnhat['gia'] ?>"><br><br>
                <label for="">S??? l?????ng</label>
                <input type="text" name="soluong" value="<?php echo $row_capnhat['soluong'] ?>"><br>          
                <input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" id="themdanhmucbt">
            </form>
               <?php     
            }else{ 
                ?>
                <h2>Th??m s???n ph???m</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Id lo???i s???n ph???m</label>
                <input type="text" name="idloai" value="1"><br><br>
                <label for="">M?? s??? h??ng h??a</label>
                <input type="text" name="mshh" placeholder="M?? s??? h??ng h??a"><br><br>
                <label for="">T??n s???n ph???m</label>
                <input type="text" name="tensanpham" placeholder="T??n s???n ph???m"><br><br>
                <label for="">H??nh ???nh</label>
                <input type="text"name="hinhanh" placeholder="./MVC/Public/pic/AoBD/"><br><br>
                <label for="">Gi??</label>
                <input type="text" name="giasanpham"><br><br>
                <label for="">S??? l?????ng</label>
                <input type="text" name="soluong" placeholder="S??? L?????ng"><br>          
                <input type="submit" name="themsanpham" value="Th??m s???n ph???m" id="themdanhmucbt">
            </form>
             <?php } ?> 
            
            
        </div>
        <div class="lietkedanhmuc">
            <h2>Li???t k?? s???n ph???m</h2>
            <?php
                $sql_select_sp=mysqli_query($con,"SELECT * FROM `hanghoa1` where idloai=1 order by id DESC");
            ?>
            <table border="">
                    <tr>
                        <th>Th??? t???</th>
                        <th>idloai</th>
                        <th>MSHH</th>
                        <th>T??n danh m???c</th>
                        <th>H??nh ???nh</th>
                        <th>S??? l?????ng</th>
                        <th>Gi??</th>
                        <th>Qu???n l??</th>
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
                        <td><?php echo $row_sp['idloai'] ?></td>
                        <td><?php echo $row_sp['mshh'] ?></td>
                        <td><?php echo $row_sp['tenhh'] ?></td>
                        <td><img src="../<?php echo $hinh_tmp_2['2'] ?>" alt="" height="100" width="80"></td>
                        <td><?php echo $row_sp['soluong'] ?></td>
                        <td><?php echo number_format($row_sp['gia']).' vn??' ?></td>
                        <td><a href="?admin=sanpham1&xoa=<?php echo $row_sp['id']?>">X??a</a> || <a href="?admin=sanpham1&capnhat_id=<?php echo $row_sp['id']?>">C???p nh???t</a></td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>