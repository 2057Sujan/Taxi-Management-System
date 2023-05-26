<?php 
session_start();
//session destoryed and redirected to index page
session_destroy();
header('location:../index.php');

?>