<?php include('config/constants.php');
?>
    <head>
        <title>Login - Food Order System </title>
        <link rel="stylesheet" href="css/style.css">
</head>


<div class="login">
        <h1 class="text-center">Login</h1> 
      
        <?php
        if(isset($_SESSION['user_reg'])){
            $order=addslashes($_SESSION['user_reg']);
            echo "<script type='text/javascript'>alert('$order');</script>";
            unset($_SESSION['user_reg']);
        }
       
        if(isset($_SESSION['no_login1'])){
            $no_login=addslashes($_SESSION['no_login']);
            echo "<script type='text/javascript'>alert('$no_login');</script>";
            unset($_SESSION['no_login']);
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
      <input type="hidden" value="adm" name="adm">
      <input type="submit" value="Login" name="submit" class="btn-secondary" style="height:35px;width:55px">
      <br><br>
      
      <a href="<?php echo SITEURL; ?>register.php" class="btn-secondary" style="font-size:15px;height:35px;width:55px">Register</a>
    
</form>
</div>
<style>
   .login{
    border:1px solid grey;
    width:30%;
    margin:10% auto;
    padding:2%;
    border-radius: 30px;
    box-shadow: 0 0 4px black;
    background-color: grey;
    opacity: 0.9;
} 
.btn-secondary{
    background-color: black;
    padding:1%;
    color: white;
    opacity: 0.9;
    text-decoration: none;
    font-weight: 530;
    border-radius: 10px;
    box-shadow: 0 0 5px black;
}
.btn-secondary:hover{
    background-color: grey;
    color: black;
}
.btn-primary{
    background-color: #1e90ff;
    padding:1%;
    color: white;
    text-decoration: none;
    font-weight: 530;
    border-radius: 20px;
    box-shadow: 0 0 5px blue;
}
.btn-primary:hover{
    background-color: #3742fa;
}
</style>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    // $adm=$_POST['adm'];
    $sql="SELECT * FROM t_user WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn,$sql);
    if($res==true){
     $sql2="SELECT adm FROM t_user WHERE username='$username' AND password='$password'";
     $res2=mysqli_query($conn,$sql2);
     if($res2==true){
        while($row=mysqli_fetch_assoc($res2)){
            $adm=$row['adm'];
        }
        if($adm==1){
        $_SESSION['login']="Login Successful";
        $_SESSION['user1']=$username;
    //   echo $username;
    //   echo $adm;
        header("location:".SITEURL.'/admin');
        }
        else{
            $_SESSION['login']="Login Successful";
            $_SESSION['user1']=$username;
            header("location:".SITEURL);
        }
    }
    }
    else{
     $_SESSION['no_login1']="Login UnSuccessful";
     header("location:".SITEURL.'loginuser.php');
    }
}

?>