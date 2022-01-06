<!Doctype html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Public/css/stylelogin.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <form action="" method="post">
        <div class="login">
            <h2>Admin Login</h2>
            <input type="text" name="username" placeholder="Username..."> 
            <input type="password" placeholder="Password..." name="password">            
            <button  type="submit"  name="dangnhap">Đăng Nhập</button>
            <button><a href="index.php">Đăng ký</a></button>
        </div>
        </form>
        <?php
        // session_destroy(); 
        session_start();
        include('../core/connectDB.php');
        $error = false;
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $name=mysqli_real_escape_string($con,$_POST['username']);
                $pwd=mysqli_real_escape_string($con,$_POST['password']);
                $pwdmd5=md5($pwd);
                $sql1=$sql1="select * from `login` where (`username`= '$name' and `password`='$pwdmd5')";
                $query=mysqli_query($con,$sql1);
                $num_row=mysqli_num_rows($query);
                $row_dangnhap=mysqli_fetch_array($query);
                if($num_row !=0){
                    echo "<h3>Đăng Nhập Thành Công !!<h3>";
                    $_SESSION['dangnhap']=$row_dangnhap['admin_name'];
                    $_SESSION['admin_id']=$row_dangnhap['id'];
                    header('Location:dashboard.php');
                }else{
                    echo "<h3>Tài khoản hoặc mật khẩu chưa chính xác !!</h3>";
                }
            }    
            ?>
    </body>