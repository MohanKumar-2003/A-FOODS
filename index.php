<?php include('partials-food/menu.php') ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required style="border-radius:20px;box-shadow:0 0 5px black;">
                <input type="submit" name="submit" value="Search" class="btn btn-primary" style="border-radius:20px;box-shadow:0 0 5px crimson;">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
       <?php
        if(isset($_SESSION['order'])){
            $order=addslashes($_SESSION['order']);
            echo "<script type='text/javascript'>alert('$order');</script>";
            unset($_SESSION['order']);
        }
        if(isset($_SESSION['no_login'])){
            $no_login=addslashes($_SESSION['no_login']);
            echo "<script type='text/javascript'>alert('$no_login');</script>";
            unset($_SESSION['no_login']);
        }
        if(isset($_SESSION['login'])){
            $login=addslashes($_SESSION['login']);
            echo "<script type='text/javascript'>alert('$login');</script>";
            unset($_SESSION['login']);
        }
       ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
              $sql="SELECT * FROM t_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                     <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <?php if($image_name==""){
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
                    <?php
                }
              }
              else{
                echo "<div style='color:red;'>Category is not Available</div>";
              }
            ?>
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
             $sql2="SELECT * from tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
             $res2=mysqli_query($conn,$sql2);
             $count2=mysqli_num_rows($res2);
             if($count2>0){
               while($row=mysqli_fetch_assoc($res2)){
                   $id=$row['id'];
                   $title=$row['title'];
                   $image_name=$row['image_name'];
                   $description=$row['description'];
                   $price=$row['price'];
                   ?>
                    <div class="food-menu-box" style="box-shadow:0 0 4px black">
                <div class="food-menu-img">
                    <?php if($image_name==""){
                        echo "<div style='color:red';>Image is not Available</div>";
                    }
                    else{
                        ?>
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                
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

        <p class="text-center">
            <a href="<?php echo SITEURL;?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
<?php include('partials-food/footer.php'); ?>