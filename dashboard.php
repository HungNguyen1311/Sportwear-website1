<?php
    session_start();
if(!isset($_SESSION['dangnhap'])){
    header('Location:login.php');
}
if(isset($_GET['login'])){
    $dangxuat=$_GET['login'];
}else{
    $dangxuat='';
}
// if($dangxuat='dangxuat'){
//     session_destroy();
//     header('Location:login.php');
// }
if(isset($_GET['dangxuat'])){
    $id=$_GET['dangxuat'];
    if($id==1){
  unset($_SESSION['dangnhap']);
  header("location:login.php");
    }
}
?>
<html>
<head>
    <style>
        h3{
            text-align: center;

        }
        body{
            font-weight:bold;
        }
    </style>
</head>
<body>
    <h3>Xin Chào <?php echo $_SESSION['dangnhap'] ?><a href="?admin=dangxuat&dangxuat=1">&nbspĐăng Xuất</a></h3>
    <?php 
         if(isset($_GET["admin"])){
            $tam=$_GET["admin"];
        }
        else{
            $tam='';
        }
        if($tam=='danhmuc1'){
            include("./xulydanhmuc.php");
        }elseif($tam=='danhmuc2'){
            include("./xulydanhmuc2.php");
        }elseif($tam=='danhmuc3'){
            include("./xulydanhmuc3.php");
        }elseif($tam=='sanpham1'){
            include("./xulysanpham.php");
        }elseif($tam=='sanpham2'){
            include("./xulysanpham2.php");
        }elseif($tam=='sanpham3'){
            include("./xulysanpham3.php");
        }elseif($tam=='donhang'){
            include("./xulydonhang.php");
        }elseif($tam=='khachhang'){
            include("./xulykhachhang.php");
        }elseif($tam=='xemgiaodich'){
            include("./xulykhachhang.php");
        }elseif($tam=='sanphamkm'){
            include("./xulysanphamkm.php");
        }elseif($tam=='capnhatdanhmuc'){
            include("./xulydanhmuc.php");
        }elseif($tam=='xoadanhmuc'){
            include("./xulydanhmuc.php");
        }elseif($tam=='xemdonhang'){
            include("./xulydonhang.php");
        }
        else{
            include("./xulydonhang.php");
        }
    ?>
</body>
</html>