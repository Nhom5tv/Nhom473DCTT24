<?php
if(session_id()=='') session_start();
if(isset($_SESSION['Id'])== false){
    echo'<script>alert("Chưa đăng ký tài khoản");
   window.location.href = "' . BASE_URL . 'Dangky";
    </script>';    
}
$email=$_SESSION['Email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/login.css?v=<?php echo time();?>">
    
    <style>
        .content{
            margin-top: 70px;
        }
        .formDangnhap{
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
                }
    </style>
    
</head>
<body>
    
    <div class="formDangnhap">
        <!-- <span class="close">&times;</span> -->
        <form method="post" action="<?php echo BASE_URL; ?>Doimatkhau/doimatkhau">
        <div style="background-color:white;" class="content" >
        
        <div class="form-box login">
            <h2>Đổi mật khẩu</h2>
            
              
                 
                <div class="input-box">
                    <span class="icon">
                        <img src="<?php echo BASE_URL; ?>Public/Picture/Pic_login/email.png" alt="" width="15px">
                    </span>
                    <input style="padding-left: 50px;" type="email" name="txtEmaildky" value="<?php echo $email ?>" readonly>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <img src="<?php echo BASE_URL; ?>Public/Picture/Pic_login/khoa.png" alt="" width="15px">
                    </span>
                    <input type="password" required name="txtMatkhaucu">
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <img src="<?php echo BASE_URL; ?>Public/Picture/Pic_login/khoa.png" alt="" width="15px">
                    </span>
                    <input type="password" required name="txtMatkhaulan1">
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <img src="<?php echo BASE_URL; ?>Public/Picture/Pic_login/khoa.png" alt="" width="15px">
                    </span>
                    <input type="password" required name="txtMatkhaulan2">
                    <label>Nhập lại password</label>
                </div>
                
                <button type="submit" class="btn" name="btnluu">Lưu</button>
                
            
        </div>
    </div>
        </form>
    </div>
<!-- </div> -->
<!-- <script src="./Public/JS/script.js"></script> -->
    
</body>
</html>
