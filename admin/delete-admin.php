<?php
  include('../config/constants.php');
  $id=$_GET['id'];
  $sql="DELETE FROM t_admin WHERE id=$id";
  $res=mysqli_query($conn,$sql);
  if($res==true){
   $_SESSION['delete']="Admin Deleted successfully";
   header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    $_SESSION['delete']="Admin is Not Deleted";
    header('location:'.SITEURL.'admin/manage-admin.php');  
}
?>