<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System </title>
        <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1> 
        <?php
            if(isset($_SESSION['login'])){
                $login=addslashes($_SESSION['login']);
                echo "<script type='text/javascript'>alert('$login');</script>";
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no_login_message'])){
                $no_login_message=addslashes($_SESSION['no_login_message']);
                echo "<script type='text/javascript'>alert('$no_login_message');</script>";
                unset($_SESSION['no_login_message']);
            }
        ?>
        <form action="" method="POST" class="text-center">
            <br><br>
      Username: 
      <br><br>
      <input type="text" name="username" placeholder=" Enter Username" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black">
      <br><br>
      Password:
      <br><br>
      <input type="text" name="password" placeholder=" Enter Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black">
      <br><br>
      <input type="submit" value="Login" name="submit" class="btn-secondary" style="height:35px;width:55px">

</form>


</div>
</body>
</html>
<?php 
 if(isset($_POST['submit'])){
     $username= mysqli_real_escape_string($conn,$_POST['username']);
     $password= mysqli_real_escape_string($conn, md5($_POST['password']));
    

    $sql="SELECT * FROM t_admin WHERE username='$username' AND password='$password' ";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
         $_SESSION['login']="Login Successful";
         $_SESSION['user']=$username;
         header("location:".SITEURL.'admin/');
    }
    else{
        $_SESSION['login']="Login is not Successful";
        header("location:".SITEURL.'admin/login.php');
    }
 }
?>