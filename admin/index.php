<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
    <h1>DASHBOARD</h1>
    <?php
            if(isset($_SESSION['login'])){
                $login=addslashes($_SESSION['login']);
                echo "<script type='text/javascript'>alert('$login');</script>";
                unset($_SESSION['login']);
            }
        ?>
    <div class="col-4 text-center">
        <?php
        $sql="SELECT * FROM t_category";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
         ?>
        <h1><?php echo $count; ?></h1>
        <br />
        Categories
</div>
<div class="col-4 text-center">
<?php
        $sql2="SELECT * FROM tbl_food";
        $res2=mysqli_query($conn,$sql2);
        $count2=mysqli_num_rows($res2);
         ?>
        <h1><?php echo $count2;?></h1>
        <br />
        Foods
</div>
<div class="col-4 text-center">
<?php
        $sql3="SELECT * FROM t_order";
        $res3=mysqli_query($conn,$sql3);
        $count3=mysqli_num_rows($res3);
         ?>
        <h1><?php echo $count3;?></h1>
        <br />
        Total Orders
</div>
<div class="col-4 text-center">
<?php
        $sql4="SELECT SUM(total) AS Total FROM t_order WHERE status='Delivered'";
        $res4=mysqli_query($conn,$sql4);
        $row4=mysqli_fetch_assoc($res4);
        $total_rev=$row4['Total']
         ?>
        <h1>Rs.<?php echo $total_rev ;?></h1>
        <br />
       Revenue Generated
</div>
<div class="clearfix"></div>

</div>
</div>
<?php include('partials/footer.php'); ?>