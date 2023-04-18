<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1>Add Category</h1>
     <br><br>
     <?php
    if(isset($_SESSION['add'])){
        $add=addslashes($_SESSION['add']);
        echo "<script type='text/javascript'>alert('$add');</script>";
        unset($_SESSION['add']);
    } 
    if(isset($_SESSION['upload'])){
        $upload=addslashes($_SESSION['upload']);
        echo "<script type='text/javascript'>alert('$upload');</script>";
        unset($_SESSION['upload']);
    }
    
    ?>
    <form action="" method="POST" enctype="multipart/form-data"> 
        <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="Category Title"  style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black">
</td>
</tr>
<tr>
            <td>Select Image: </td>
            <td>
                <input type="file" name="image">
</td> 
</tr>
<tr>
    <td>Featured: </td>
    <td>
        <input type="radio" name="featured" value="Yes">Yes
        <input type="radio" name="featured" value="No">No
</td>
</tr>
<tr>
    <td>Active: </td>
    <td>
        <input type="radio" name="active" value="Yes">Yes
        <input type="radio" name="active" value="No">No
</td>
</tr>
<tr>
    <td colspan="2">
        <br><br>
        <input type="submit" name="submit" value="Add Category" class="btn-primary" style="margin-top:10px">
</td>
</tr>
</table>
</form>
<?php
 if(isset($_POST['submit'])){
    $title=$_POST['title'];
    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];
    }
    else{
       $featured="No";
    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }
    else{
       $active="No";
    }
    // print_r($_FILES['image']);
    // die();
    if(isset($_FILES['image']['name'])){
      $image_name=$_FILES['image']['name'];
      if($image_name!=""){
        $ext=end(explode('.',$image_name));
        $image_name="Food_Category_".rand(000,999).'.'.$ext;
        $source_path=$_FILES['image']['tmp_name'];
        $destination_path="../images/categories/".$image_name;
        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
          $_SESSION['upload']="Image is not uploaded";
          header("location:".SITEURL.'admin/add-category.php');
          die();
      }
     
      }
    }
    else{
        $image_name="";
    }
    $sql="INSERT INTO t_category SET title='$title',image_name='$image_name', featured='$featured',active='$active'";
    $res=mysqli_query($conn,$sql);
    if($res==true){
         $_SESSION['add']="Category Added Successfully";
         header("location:".SITEURL.'admin/manage-category.php');
    }
    else{
        $_SESSION['add']="Category is not Added Successfully";
         header("location:".SITEURL.'admin/add-category.php');
    }
 }
?>
</div>
</div>
<?php include('partials/footer.php'); ?>



