<?php
    session_start();
    include_once "./connect.php";
?>
<?php
   if (isset($_POST['submit']))
   {
       $username = $_POST['username'];
       $password = md5($_POST['password']);
       //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
       //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
       $username = strip_tags($username);
       $username = addslashes($username);
       $password = strip_tags($password);
       $password = addslashes($password);

       $remember = isset($_POST['remember']) ? 1 : 0;
       if ($username =='' || $password == '')
       {
           echo "vui long nhap lai";
       } else
       {
           $connect = connect();
           $sql = "SELECT email, `password` FROM users  WHERE email = '$username' AND password = '$password' ";
           if($remember == 1) {
               setcookie('username', $username , time()+ 3600,"/","",0,0);
               setcookie("password", $password, time()+3600,"/","",0,0);

           }
           $statement = $connect->prepare($sql);
           $statement->execute(array($username,$password));
           $count = $statement->rowCount();
           if($count > 0) {
               $_SESSION["username"] = $_POST["username"];
               header("location: LoginSuccessPdo.php");

           } else
           {
               echo '<p>Tài khoản hoặc mật khẩu sai</p>';
           }
       }
   }

?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Login Form -->
        <form method="post">
            <input type="mail" id="username" class="fadeIn second" name="username" placeholder="username" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'];  ?>" required> <br> <br>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];  ?>" required>
            <input type="submit" class="fadeIn fourth" name="submit">
        </form>
        <div class="remember">
            <input type="checkbox"  name="remember" value=" <?php if(isset($_COOKIE['username'])) echo 'checked';  ?>">
            <label>Remember login</label>
        </div>
        <div id="formFooter">
            <a class="underlineHover" href="RegisterPdo.php">Register</a>
        </div>
    </div>
</div>

