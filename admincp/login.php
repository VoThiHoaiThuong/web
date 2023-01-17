<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];
        $sql = "select * from admin where username='$taikhoan' and password='$matkhau'limit 1";
        $query=$mysqli->query($sql);
		$nums=$query->num_rows;
        $row = mysqli_query($mysqli, $sql);
         $run=$mysqli->query($sql);
        if($nums>0){
            $_SESSION['dangnhap']=$taikhoan;
            header("Location:index.php");
        }else{
            echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại."); </script>';
			header("Location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admincp</title>
    <style>
    .wrapper-login {
        width: 18%;
        margin: auto;
    }
    table.table-login {
        width: 100%;
    }
    table.table-login tr td {
        padding: 5px;
    }
    </style>
</head>
<body>
<div class="wrapper-login"> 
    <form action="" autocomlete="off" method="POST">
    <table border="1" class="table-login" style="text-align:center;">
        <tr>
            <td colspan="2"><h3>Đăng nhập Admin</h3></td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
    </form>
</div>   
</body>

</html>