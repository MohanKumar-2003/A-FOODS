<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>
    <br />
    <?php
    if(isset($_SESSION['add'])){
        $add=addslashes($_SESSION['add']);
        echo "<script type='text/javascript'>alert('$add');</script>";
        unset($_SESSION['add']);
    } 
    if(isset($_SESSION['remove'])){
        $remove=addslashes($_SESSION['remove']);
        echo "<script type='text/javascript'>alert('$remove');</script>";
        unset($_SESSION['remove']);
    }
    if(isset($_SESSION['delete'])){
        $delete=addslashes($_SESSION['delete']);
        echo "<script type='text/javascript'>alert('$delete');</script>";
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['no_c_f'])){
        $no_c_f=addslashes($_SESSION['no_c_f']);
        echo "<script type='text/javascript'>alert('$no_c_f');</script>";
        unset($_SESSION['no_c_f']);
    }
    if(isset($_SESSION['update'])){
        $update=addslashes($_SESSION['update']);
        echo "<script type='text/javascript'>alert('$update');</script>";
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['upload'])){
        $upload=addslashes($_SESSION['upload']);
        echo "<script type='text/javascript'>alert('$upload');</script>";
        unset($_SESSION['upload']);
    }
    if(isset($_SESSION['f_r'])){
        $f_r=addslashes($_SESSION['f_r']);
        echo "<script type='text/javascript'>alert('$f_r');</script>";
        unset($_SESSION['f_r']);
    }
    ?>
    <br><br><br>
    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
    <br /><br /><br />
    <table class="tbfull">
        <tr>
            <th>S.No.</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
</tr>

<?php

$sql="SELECT * FROM t_category";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
$sn=1;
if($count>0){
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $title=$row['title'];
        $image_name=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];
         ?>
         <tr>
    <td><?php echo $sn++; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php if($image_name!=""){
         ?>
         <img src="<?php echo SITEURL; ?>images/categories/<?php echo $image_name; ?>" width="100px">
         <?php
    }
    else{
        echo "<div style='color:red';>Image is not Added</div>";
    } ?></td>
    <td><?php echo $featured; ?></td>
    <td><?php echo $active; ?></td>
    <td>
        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete"> Delete Category</a>
    </td>
</tr>
<?php
    }
}
else{

}

?>

</table>
 

</div>
</div>
<?php include('partials/footer.php'); ?>