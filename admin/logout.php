<?php
include('../config/constants.php');
// 1. Destroy thse session

session_destroy();

//2.Redirect to login page

header('location:'.SITEURL.'admin/login.php');

?>