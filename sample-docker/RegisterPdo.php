<?php
     session_start();
     include_once "./connect.php";
?>
<?php
//lấy dũ liệu
if (isset($_POST['submit'])) {
    $name = ($_POST['ten']);
    $email = ($_POST['email']);
    $phone = ($_POST['phone']);
    $pass = ($_POST['pass']);
    $cfpass = ($_POST['cfpass']);
    $address = ($_POST['address']);

// validate
    //name
    if ( $name === 0 && (strlen($name) > 6 && strlen($name) < 200 )) {
        echo "Tên không hợp lệ. Vui lòng nhập lại ";
    }

    //email
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && (strlen($email) > 0 && strlen($email) < 255 )  ){
        echo "Email không hợp lệ. Vui lòng nhập lại ";
    }

    //phone
    if ( strlen($phone) < 10 && strlen($phone) > 20 ) {
        echo "Phone không hợp lệ. Vui lòng nhập lại ";

    } else if (!preg_match("/^[0-9]*$/", $phone) ) {
        echo "Bạn chỉ được nhập giá trị số.";
    }

    //password
    if (strlen($pass) < 6 && strlen($pass) > 100  ) {
        echo "PassWord không hợp lệ. Vui lòng nhập lại ";
    }

    //password confirm
    if ($cfpass !== $pass) {
        echo "password confirm không hợp lệ. Vui lòng nhập lại ";
    }

    //address
    if (empty($address)) {
        echo "Chưa nhập địa chỉ. Vui lòng nhập lại ";
    }
    $pass_word = md5($pass);

    $con = connect();
    $sql = "INSERT INTO users (name,email,password,phone,address) values ('$name','$email','$pass_word','$phone','$address')";
    $result = $con->prepare($sql);
    $result->execute();
//  var_dump($result);
    header('Location: LoginPdo.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Đăng Ký</h2>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
                <div class="panel-body">
                <div class="form-group">
                    <label for="ten">Name:</label>
                    <input required type="text" class="form-control" name="ten" placeholder="Tên từ 6-200 kí tự" value="<?php echo $_POST['ten']?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" name="email" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input required type="password" class="form-control" name="pass" value="<?php echo $_POST['pass']?>">
                </div>
                    <label for="cfpass">Confirmation Password:</label>
                    <input required type="password" class="form-control" name="cfpass" value="<?php echo $_POST['cfpass']?>">
                </div>
                <div class="form-group">
                     <label for="address">Address:</label>
                     <input type="text" class="form-control" name="address" value="<?php echo $_POST['address']?>">
                </div>
                <button class="btn btn-success" name="submit" type="submit">Register</button>
             </div>
        </form>
    </div>
</div>
</body>
</html>





