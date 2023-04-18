<?php include('partials/menu.php'); ?>
<div class="main-content">
<div class="wrapper">
    <h1>Manage-ADMIN</h1>
    <br />
    <?php
    if(isset($_SESSION['add'])){
        $add=addslashes($_SESSION['add']);
        echo "<script type='text/javascript'>alert('$add');</script>";
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['delete'])){
        $delete=addslashes($_SESSION['delete']);
        echo "<script type='text/javascript'>alert('$delete');</script>";
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['update'])){
        $update=addslashes($_SESSION['update']);
        echo "<script type='text/javascript'>alert('$update');</script>";
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['user_not_found'])){
        $user_not_found=addslashes($_SESSION['user_not_found']);
        echo "<script type='text/javascript'>alert('$user_not_found');</script>";
        unset($_SESSION['user_not_found']);
    }
    if(isset($_SESSION['password_not_match'])){
        $password_not_match=addslashes($_SESSION['password_not_match']);
        echo "<script type='text/javascript'>alert('$password_not_match');</script>";
        unset($_SESSION['password_not_match']);
    }
    if(isset($_SESSION['password_match'])){
        $password_match=addslashes($_SESSION['password_match']);
        echo "<script type='text/javascript'>alert('$password_match');</script>";
        unset($_SESSION['password_match']);
    }
    if(isset($_SESSION['password_match_not'])){
        $password_match_not=addslashes($_SESSION['password_match_not']);
        echo "<script type='text/javascript'>alert('$password_match_not');</script>";
        unset($_SESSION['password_match_not']);
    }


     ?>
     <br><br><br>
    <a href="add-admin2.php" class="btn-primary">Add Admin</a>
    <br />
    <br />
    <table class="tbfull">
        <tr>
            <th>S.No.</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Actions</th>
</tr>
<?php 
 $sql="SELECT * FROM t_admin";
 $res=mysqli_query($conn,$sql);
 $sn=1;
 if($res==TRUE){
    $count=mysqli_num_rows($res);
    if($count>0){
        while($rows=mysqli_fetch_assoc($res)){
            $id=$rows['id'];
            $full_name=$rows['full_name'];
            $username=$rows['username'];
        
        ?>
        <tr>
    <td><?php echo $sn++; ?>.</td>
    <td><?php echo $full_name; ?></td>
    <td><?php echo $username; ?></td>
    <td>
        <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-delete"> Delete Admin</a>
    </td>
</tr>
        <?php
    } 
}
    else{

    }
 }
?>

</table>
 

</div>
</div>
<?php include('partials/footer.php'); ?>