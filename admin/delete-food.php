<?php
     include('../config/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){
     $id=$_GET['id'];
     $image_name=$_GET['image_name'];
      if($image_name!=""){
        $path="../images/food/".$image_name;
        $remove=unlink($path);
        if($remove==false){
            $_SESSION['remove']="Image is not deleted successfully";
            header("location:".SITEURL.'admin/manage-food.php');
            die();
        }
      }
      $sql="DELETE FROM tbl_food WHERE id=$id";
      $res=mysqli_query($conn,$sql);
      if($res==true){
        $_SESSION['delete']="Food is deleted successfully";
        header("location:".SITEURL.'admin/manage-food.php');
      }
      else{
        $_SESSION['delete']="Food is not deleted successfully";
        header("location:".SITEURL.'admin/manage-food.php');
      }
      }

else{
    // $_SESSION['delete']="Food is not deleted successfully";
    // header("location:".SITEURL.'admin/manage-food.php');
}
?>