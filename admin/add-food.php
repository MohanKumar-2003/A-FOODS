<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php  if(isset($_SESSION['upload'])){
        $upload=addslashes($_SESSION['upload']);
        echo "<script type='text/javascript'>alert('$upload');</script>";
        unset($_SESSION['upload']);
    } ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
        <tr>
    <td>Title: </td>
    <td>
        <input type="text" name="title" placeholder="Enter the title of the food"  style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black"> 
</td>
</tr>
<tr>
    <td>Description: </td>
    <td>
        <textarea  name="description" cols="30" placeholder="Description of the food" rows="5"  style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black"> </textarea>
</td>
</tr>
<tr>
    <td>Price: </td>
    <td>
        <input type="number" name="price"  style="border-radius:10px;margin:5px;height:30px;box-shadow:0 0 5px black"> 
</td>
</tr>
<tr>
    <td>Image: </td>
    <td>
        <input type="file" name="image" > 
</td>
</tr>
<tr>
    <td>Category: </td>
    <td>
        <select name="category">
            <?php 
              $sql="SELECT * from t_category WHERE active='Yes' ";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['title'];
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
        <input type="submit" name="submit"  value="Add Food" class="btn-secondary" style="margin-top:10px">
            </td>
            </tr>
</table>

</form>
<?php 
if(isset($_POST['submit'])){
     $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
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
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
        if($image_name!=""){
          $ext=end(explode('.',$image_name));
          $image_name="Food_Name_".rand(0000,9999).'.'.$ext;
          $src=$_FILES['image']['tmp_name'];
          $dest="../images/food/".$image_name;
          $upload=move_uploaded_file($src,$dest);
          if($upload==false){
            $_SESSION['upload']="Image is not uploaded";
            header("location:".SITEURL.'admin/add-food.php');
            die();
        }
       
        }
      }
      else{
        $image_name="";
      }
      $sql2="INSERT INTO tbl_food SET title='$title',description='$description',price=$price,image_name='$image_name',category_id=$category, featured='$featured',active='$active' ";
      $res2=mysqli_query($conn,$sql2);
      if($res2==true){
          $_SESSION['add']="Food Added Successfully";
          header("location:".SITEURL.'admin/manage-food.php');
      }
      else{
        $_SESSION['add']="Food is not Added Successfully";
        header("location:".SITEURL.'admin/manage-food.php');
      }

    }
?>
    </div>
</div>

<?php include('partials/footer.php'); ?>