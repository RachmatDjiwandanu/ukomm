<?php
session_start();
include 'koneksi.php';
?>

<center><h1>Silahkan Login Dahulu</h1>
<?php
if(isset($_POST['submit'])) {
    $submit = $_POST['submit'];
    if ($submit=='Login') {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql=mysqli_query($conn,"SELECT * FROM user WHERE Username='$username'");
        $row = mysqli_fetch_assoc($sql);

        if ($row) {
            if (password_verify($password, $row['Password'])) {
                echo 'Login Berhasil';
                $_SESSION['username']=$row['Username'];
                $_SESSION['user_id']=$row['Id_User'];
                $_SESSION['email']=$row['Email'];
                $_SESSION['nama_lengkap']=$row['Nama_User'];
                echo '<meta http-equiv="refresh" content="0.8; url=./">';
            } else {
                echo 'Login Gagal: Password tidak cocok';
                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
            }
        } else {
            echo 'Login Gagal: Username tidak ditemukan';
            echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
        }
    }
}
?>                 

<form action="login.php" method="post">
    <input type="username" name="username" placeholder="Username" required="required"/><br/>
    <input type="password" name="password" placeholder="Password"  required="required"/><br/><br/>
    <input type="submit" name="submit" value="Login"/>
</form><br/>
<h4>Copyright &copy; <font color="red" alt="Danu">Danu</font></h4>
</center>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
        color: #333333;
    }

    form {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 0 auto;
        margin-top: 50px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #666666;
    }

    input[type="username"],
    input[type="password"] {
        padding: 10px;
        border-radius: 5px;
        border: none;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        width: 100%;
        margin-bottom: 20px;
    }

    input[type="submit"] {
        background-color: #fa0000;
        color: #ffffff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #06e5f5;
    }

    .error {
        color: #ff0000;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>
