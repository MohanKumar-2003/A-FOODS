<?php include('partials-food/menu.php') ?>
    <!-- Navbar Section Ends Here -->
    <?php
                       if(isset($_GET['f_id'])){
                        $f_id=$_GET['f_id'];
                        $sql="SELECT * FROM tbl_food WHERE id=$f_id";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        if($count==1){
                            $row=mysqli_fetch_assoc($res); 
                            $title=$row['title'];
                            $image_name=$row['image_name']; 
                            $price=$row['price'];
                        }
                       }
                       else{
                        header("location:".SITEURL);
                       }

                     ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>
                   
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
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>"> 
                        <p class="food-price">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Mohan" class="input-responsive" required style="border-radius:10px;box-shadow:0 0 3px black;">

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9487xxxxxx" class="input-responsive" required style="border-radius:10px;box-shadow:0 0 3px black;">

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. mohan@gmail.com" class="input-responsive" required style="border-radius:10px;box-shadow:0 0 3px black;">

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required style="border-radius:10px;box-shadow:0 0 3px black;"></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary" style="margin-left:150px;background-color:black;box-shadow:0 0 5px black;opacity:0.8;">
                </fieldset>

            </form>
            <?php
               if(isset($_POST['submit']))  {
                   $food=$_POST['food'];
                   $price=$_POST['price'];
                   $qty=$_POST['qty'];
                   $total=$price*$qty;
                   $order_date=date("Y-m-d h:i:sa");
                   $status="Ordered";
                   $customer_name=$_POST['full-name'];
                   $customer_contact=$_POST['contact'];
                   $customer_email=$_POST['email'];
                   $customer_address=$_POST['address'];
                   $sql2="INSERT INTO t_order SET
                   food='$food',
                   price=$price,
                   qty=$qty,
                   total=$total,
                   order_date='$order_date',
                   status='$status',
                   customer_name='$customer_name',
                   customer_contact='$customer_contact',
                   customer_email='$customer_email',
                   customer_address='$customer_address'";
                   $res2=mysqli_query($conn,$sql2);
                   if($res2==true){
                    $_SESSION['order']="Order Placed Successfully";
                    header('location:'.SITEURL);
                   }
                   else{
                    $_SESSION['order']="Order is not Placed Successfully";
                    header('location:'.SITEURL);
                   }
               }

           ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('partials-food/footer.php'); ?>