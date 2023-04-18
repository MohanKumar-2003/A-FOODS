<?php 
include('partials/menu.php');
?>
<div class="main-content">
<div class="wrapper">
    <h1>Update Food</h1>
    <br><br>
    <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM tbl_food WHERE id='$id' ";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $count=mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                 $title=$row['title'];
                $curr_image=$row['image_name'];
                $description=$row['description'];
                $price=$row['price'];
                $category=$row['category_id'];
                $featured=$row['featured'];
                $active=$row['active'];
            }
            else{
                $_SESSION['no_c_f']="Food is not found";
                header("location:".SITEURL.'admin/manage-food.php');
            }
        }
      }
      else{
        header("location:".SITEURL.'admin/manage-food.php');
      }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" value="<?php echo $title ?>" style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black">
</td>
</tr>
<tr>
            <td>Current Image: </td>
            <td>
                <?php if($curr_image!=""){
                         ?>
                         <img src="<?php echo SITEURL; ?>images/food/<?php echo $curr_image; ?>" width="150px">
                         <?php
                }
                else{
                    echo "<div style='color:red';>Image is not Added</div>";
                }
                ?>
</td>
</tr>
<tr>
            <td>New Image: </td>
            <td>
                <input type="file" name="image">
</td>
</tr>
<tr>
    <td>Description: </td>
    <td>
        <textarea  name="description" cols="30"  rows="5"  style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black"><?php echo $description; ?> </textarea>
</td>
</tr>
<tr>
    <td>Price: </td>
    <td>
        <input type="number" name="price" value="<?php echo $price; ?>" style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black"> 
</td>
</tr>
<tr>
    <td>Category: </td>
    <td>
        <select name="category">
            <?php 
              $sql2="SELECT * from t_category WHERE active='Yes' ";
              $res2=mysqli_query($conn,$sql2);
              $count=mysqli_num_rows($res2);
              if($count>0){
                while($row=mysqli_fetch_assoc($res2)){
                    $c_id=$row['id'];
                    $c_title=$row['title'];
                    ?>
                    <option <?php if($category==$c_id) {echo "selected";} ?> value="<?php echo $c_id; ?>"><?php echo $c_title; ?></option>
                    <?php
                }
              }
              else{
                ?>
                <option value="0">No Category Found</option>
                <?php
              }
            ?>
           
</select>
</td>
</tr>
<tr>
    <td>Featured: </td>
    <td>
        <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
        <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
</td>
</tr>
<tr>
    <td>Active: </td>
    <td>
        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
</td>
</tr>
<tr>
    <td>
    <input type="hidden" name="curr_image" value="<?php echo $curr_image; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="submit" value="Update Food" class="btn-secondary" style="margin-top:10px">
</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $curr_image=$_POST['curr_image'];
    $description=$_POST['description'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
        if($image_name!=""){
            $ext=end(explode('.',$image_name));
            $image_name="Food_Name_".rand(0000,9999).'.'.$ext;
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/food/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);
            if($upload==false){
              $_SESSION['upload']="Image is not uploaded";
              header("location:".SITEURL.'admin/manage-food.php');
              die();
          }
          if($curr_image!=""){
          $path="../images/food/".$curr_image;
         $remove=unlink($path);
         if($remove==false){
            $_SESSION['f_r']="Image is not removed";
            header("location:".SITEURL.'admin/manage-food.php');
            die();
        }
    }
        }
        else{
            $image_name=$curr_image;
        }
    }
    else{
        $image_name=$curr_image;
    }
    $sql3="UPDATE tbl_food SET title='$title',
    image_name='$image_name',
    description='$description',
    price='$price',
    category_id='$category',
    featured='$featured',
    active='$active' WHERE id='$id'";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
        $_SESSION['update']="Food is Updated Successfully";
        header("location:".SITEURL.'admin/manage-food.php');
    }
    else{
        $_SESSION['update']="Food is not Updated Successfully";
        header("location:".SITEURL.'admin/manage-food.php');
    }
}
?>
</div>

</div>
<?php include('partials/footer.php') ?>