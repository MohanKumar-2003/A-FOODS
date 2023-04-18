<?php include('partials-food/menu.php') ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required style="border-radius:20px;box-shadow:0 0 5px black;">
                <input type="submit" name="submit" value="Search" class="btn btn-primary"style="border-radius:20px;box-shadow:0 0 5px crimson;">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
              $sql="SELECT * FROM tbl_food WHERE active='Yes'";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    $description=$row['description'];
                    $price=$row['price'];
                    ?>
         <div class="food-menu-box" style="border-radius:20px;box-shadow:0 0 5px black;">
                <div class="food-menu-img">
                    <?php if($image_name==""){
                        echo "<div style='color:red';>Image is not Available</div>";
                    }
                    else{
                        ?>
                    <img src="<?php echo SITEURL?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" >
                
                <?php } ?>
                </div>
                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">Rs.<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?f_id=<?php echo $id; ?>" class="btn btn-primary" style="margin-left:50px;background-color:black;box-shadow:0 0 5px black;opacity:0.8;">Order Now</a>
                </div>
            </div>
            <?php
               }
            }
            else{
                echo "<div style='color:red';>Food is not Available</div>";
            }   
            ?>
           
         

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('partials-food/footer.php'); ?>