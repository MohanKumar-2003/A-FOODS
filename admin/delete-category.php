<?php
     include('../config/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){
      $id=$_GET['id'];
      $image_name=$_GET['image_name'];
      if($image_name!=""){
        $path="../images/categories/".$image_name;
        $remove=unlink($path);
        if($remove==false){
            $_SESSION['remove']="Image is not deleted successfully";
            header("location:".SITEURL.'admin/manage-category.php');
            die();
        }
      }
      $sql="DELETE FROM t_category WHERE id=$id";
      $res=mysqli_query($conn,$sql);
      if($res==true){
        $_SESSION['delete']="Category is deleted successfully";
        header("location:".SITEURL.'admin/manage-category.php');
      }
      else{
        $_SESSION['delete']="Category is not deleted successfully";
        header("location:".SITEURL.'admin/manage-category.php');
      }
      }

else{
    header("location:".SITEURL.'admin/manage-category.php');
}