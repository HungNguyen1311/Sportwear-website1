<!Doctype html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Public/css/stylelogin.css"/>
        <style>
            h3{
                color:red;
            }
        </style>

    </head>
    <body>
        <form action="" name="dangky" onsubmit="return dk()" method='post'>
        <div class="dangky">
                <h1>Đăng ký tài khoản hệ thống</h1>
                <input type="text" id="tenDN" name="username" placeholder="Tên đăng nhập/Email"><br>
                <input type="text" name="phone" placeholder="Số điện thoại" require=""><br>
                <input type="text" name="address" placeholder="Địa chỉ giao hàng" require=""><br>
                <input type="text" name="email" placeholder="Email" require=""><br>
                <input type="password" id="pwd" name="password" placeholder="Mật Khẩu"><br>
                <input type="hidden" name="giaohang" value="0">
                <button  type="submit" id="DK" name="submit">Đăng ký</button>
                <br><a href="index.php?quanly=dangnhap">Quay về trang đăng nhập</a>
      </div>
    </form>
    <?php
        include('./MVC/core/connectDB.php');
        $error = false;
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $name=$_POST['username'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $password=md5($_POST['password']);
                $address=$_POST['address'];
                $giaohang=$_POST['giaohang'];
                $name=mysqli_real_escape_string($con,$_POST['username']);
                $pwd=mysqli_real_escape_string($con,$_POST['password']);
                $pwd=md5($pwd);
                $sql1="select * from `khachhang` where (`email`= '$email' and `password`='$pwd')";
                $query=mysqli_query($con,$sql1);
                $num_row=mysqli_num_rows($query);
                    if($num_row !=0){
                        echo "<h3>Tài khoản đã tồn tại !!<h3>";
                        exit();
                    }
                    else{
                        $sql_dangkyg= mysqli_query($con,"INSERT INTO `khachhang`( `ten`, `sodienthoai`, `diachi`, `email`, `giaohang`,`password`) VALUES ('$name','$phone','$address','$email','$giaohang','$password')");                      
                        echo "<h3>Tài Khoản  được tạo thành công !!</h3>";   
                        $sql_select_khachhang=mysqli_query($con,"SELECT * from khachhang order by khachhangid DESC Limit 1");
                        $row_khachhang=mysqli_fetch_array($sql_select_khachhang);
                        $_SESSION['dangnhap_home']=$name;
                        $_SESSION['khachhang_id']=$row_khachhang['khachhangid'];  
                         
                }    
            }    
            ?>
    </body> 
</html>