<?php 
if(!isset($_SESSION['user'])){
    $_SESSION['no_login_message']="Please Login";
    header("location:".SITEURL.'admin/login.php');
}

?>