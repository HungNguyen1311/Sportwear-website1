<html>
    <head>
    <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./MVC/Public/css/style.css"/>
        <link rel="stylesheet" href="./MVC/Public/css/Substyle.css"/>
        <link rel="stylesheet" href="./MVC/Public/css/stylelogin.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            var index=0
            ChangeImg=function (){
                var imgs =["./MVC/Public/Wall/Wall.png","./MVC/Public/Wall/Wall2.png","./MVC/Public/Wall/Wall6.jpg","./MVC/Public/Wall/Wall8.jpg","./MVC/Public/Wall/Wall5.png"];
                document.getElementById('img').src=imgs[index];
                index++;
                if(index==5){
                    index=0;
                }                
            }
            setInterval(ChangeImg,2000);
        </script>
        </head>
        <body>
        <?php 
        session_start();
        include('./MVC/include/menu.php');
        include('./MVC/core/connectDB.php');
        //include('./MVC/include/giohang.php');
        if(isset($_GET['xoa'])){
             $id=$_GET['xoa'];
        }else{
            $id='';
        }
        if(isset($_GET["quanly"])){
            $tam=$_GET["quanly"];
        }
        else{
            $tam='';
        }
        if($tam=='danhmuc'){
            include('./MVC/include/danhmuc.php');    
        }elseif($tam=='danhmuc2'){
            include('./MVC/include/danhmuc2.php');    
        }
        elseif($tam=='danhmuc3'){
            include('./MVC/include/danhmuc3.php');    
        }   
        elseif($tam=='chitietsp1'){
            include('./MVC/include/chitietsp1.php');    
        }
        elseif($tam=='chitietsp2'){
            include('./MVC/include/chitietsp2.php');    
        }
        elseif($tam=='chitietsp3'){
            include('./MVC/include/chitietsp3.php');    
        }     
        elseif($tam=='giohang'){
            include('./MVC/include/giohang.php');    
        }elseif($id!=''){
            include('./MVC/include/giohang.php'); 
        }elseif($tam=='dangnhap'){
            include('./MVC/include/login_khachhang.php');
        }elseif($tam=='dangky'){
            include('./MVC/include/dangky_khachhang.php');
        }elseif($tam=='timkiem'){
            include('./MVC/include/timkiem.php');
        }elseif($tam=='danhmucspkm'){
            include('./MVC/include/danhmucspkm.php');
        }elseif($tam=='chitietspkm'){
            include('./MVC/include/chitietspkm.php');
        }
        else{
            include('./MVC/include/home.php');
        }
        include('./MVC/include/cuoicung.php');
        ?>                 
    </body>
</html>