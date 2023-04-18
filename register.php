<?php include('config/constants.php'); ?>
<>
    <head>
        <title>Login - Food Order System </title>
        <link rel="stylesheet" href="css/style.css">
</head>

<div class="login">
        <h1 class="text-center">Register</h1> 
       

        <form action="" method="POST" class="text-center">
            <br><br>
      Full name: 
      <br><br>
      <input type="text" name="fullname" placeholder=" Enter Username" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black">
      <br><br>
      User name: 
      <br><br>
      <input type="text" name="username" placeholder=" Enter Username" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black">
      <br><br>
      Create Password:
      <br><br>
      <input type="password" name="cpassword" placeholder=" Enter Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black">
      <br><br>
      Confirm Password:
      <br><br>
      <input type="password" name="copassword" placeholder=" Enter Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black">
      <br><br>
      <input type="submit" value="Register" name="submit" class="btn-secondary" style="height:35px;width:60px">
      <br><br>
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
      $fullname=$_POST['fullname'];
      $username=$_POST['username'];
      $cpassword=md5($_POST['cpassword']);
      $copassword=md5($_POST['copassword']);
      if($cpassword=$copassword){
        $sql="INSERT INTO t_user SET full_name='$fullname',username='$username',password='$cpassword'";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['user_reg']="User Created";
            header("location:".SITEURL.'loginuser.php');
        }
        else{
            header("location:".SITEURL.'register.php');
        }
      }
}

?>