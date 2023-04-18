<?php include('partials-food/menu.php') ?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
              $sql="SELECT * FROM t_category WHERE active='Yes'";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
            <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container"><?php if($image_name==""){
                    echo "<div style='color:red;'>Image is not Available</div>";
                }
                else{
                    ?>
                <img src="<?php echo SITEURL?>images/categories/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve" style="border-radius:20px;box-shadow:0 0 5px black;">
             <?php   
            }
            ?>

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>
            <?php } }
            else{
                echo  "<div style='color:red;'>Category is not Available</div>";
            } ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <?php include('partials-food/footer.php'); ?>