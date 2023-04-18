
<?php
if(!isset($_SESSION['user1'])){
    $_SESSION['no_login']="Please Login";
    header("location:".SITEURL.'loginuser.php');
}
?>