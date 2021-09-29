<?php
// workflow
include('../config/constants.php');

// 1. Get the id of the admin to be deleted
$id=$_GET['id'];
// 2.Create sql query to delete admin\
$sql="DELETE FROM tbl_admin WHERE id=$id";

// 3. Redirect to manage admin page with message (Success/error)
$res=mysqli_query($conn, $sql);
// check whether the query executed successfully or not
if($res==true){
    // Query executed successfully and admin deleted
    //echo "Admin Deleted";
    // create session variable to display mesage
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";
    // Rediredect to Manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}else{
    // Failed to delete admin
    //echo "Failed to delete Admin";
    $_SESSION['delete']="<div class='error'>Failed to delete admin. Try again later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}



?>