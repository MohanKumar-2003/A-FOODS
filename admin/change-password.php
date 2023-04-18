<?php include('partials/menu.php'); ?>

<div class="main-content">
   <div class="wrapper">
    <h1>Change Password</h1>
    <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    ?>
    <form action="" method="POST">

<table class="tbl-30">
   <tr>
    <td>Cuurent Password: </td>
    <td><input type="password" name="current_password" placeholder="  Enter your Old Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black"></td>
</tr>
<tr>
    <td>New Password: </td>
    <td><input type="password" name="new_password" placeholder="  Enter your New Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black"></td>
</tr>
<tr>
    <td>Confirm Password: </td>
    <td><input type="password" name="confirm_password" placeholder="  Confirm Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black"></td>
</tr>
<tr>
<td colspan="2">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" name="submit" value="Change Password" class="btn-secondary" style="margin-top:10px">
</td>  
</td>

</table>
</form>
</div>
</div>
<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    $sql="SELECT * FROM t_admin WHERE id=$id AND password='$current_password'";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
           if($new_password=$confirm_password){
               $sql2="UPDATE t_admin SET password='$new_passwword' WHERE id=$id";
               $res2=mysqli_query($conn,$sql2);
               if($res2==true){
                $_SESSION['password_match']="Password is changed";
                header("location:".SITEURL.'admin/manage-admin.php');
               }
               else{
                if($res2==true){
                    $_SESSION['password_match_not']="Password is not changed";
                    header("location:".SITEURL.'admin/manage-admin.php');
                   }
               }
           }
           else{
            $_SESSION['password_not_match']="Incorrect Password";
            header("location:".SITEURL.'admin/manage-admin.php');
           }
        }
        else{
            $_SESSION['user_not_found']="User Not Found";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
}
}
?>

<?php include('partials/footer.php'); ?>