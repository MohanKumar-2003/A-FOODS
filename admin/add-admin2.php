<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1>Add Admin</h1>
    <br><br>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
     ?>
    <form action="" method="POST">

    <table class="tbl-30">
       <tr>
        <td>Full Name: </td>
        <td><input type="text" name="full_name" placeholder="  Enter your name" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black"></td>
</tr>
<tr>
        <td>User Name: </td>
        <td><input type="text" name="username" placeholder="  Enter your Username" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black"></td>
</tr>
<tr>
        <td>Password: </td>
        <td><input type="password" name="password" placeholder="  Enter your Password" style="border-radius:20px;margin:5px;height:30px;box-shadow:0 0 5px black"></td>
</tr>
<tr>
    <td colspan="2">
    <input type="submit" name="submit" value="Add Admin" class="btn-secondary" style="margin-top:10px">
</td>  
</td>

    </table>
    </form>
</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
  if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="INSERT INTO t_admin SET full_name='$full_name', 
    username='$username',
    password='$password' ";
  
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE){
      // echo "Data Inserted";
      $_SESSION['add']="Admin added Successfully";
      header("location:".SITEURL.'admin/manage-admin.php');
    }
  
  else{
          $_SESSION['add']="Admin is not added Successfully";
      header("location:".SITEURL.'admin/add-admin2.php');
    }
  }
?>