<?php include('partials-food/menu.php') ?>
    <!-- Navbar Section Ends Here -->
    <?php 
    if(isset($_GET['category_id'])){
         $category_id=$_GET['category_id'];
         $sql="SELECT title FROM t_category WHERE id=$category_id";
         $res=mysqli_query($conn,$sql);
         $row2=mysqli_fetch_assoc($res);
         $c_title=$row2['title'];
    }
    else{
        header('location:'.SITEURL);
    }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $c_title; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
              $sql2="SELECT * FROM tbl_food WHERE category_id=$category_id";
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
         <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php if($image_name==""){
                        echo "<div style='color:red';>Image is not Available</div>";
                    }
                    else{
                        ?>
                    <img src="<?php echo SITEURL?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                
                <?php } ?>
                </div>
                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">Rs.<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?f_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
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