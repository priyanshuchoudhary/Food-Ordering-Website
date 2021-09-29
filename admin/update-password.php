<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1><br><br>    
    </div>
    <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
    ?>



    <form action="" method="POST">

    <table class="tbl-30">
        <tr>
            <td>Current Password:</td>
            <td>
                <input type="password" name="current_password" placeholder="Current Password">
            </td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td>
                <input type="password" name="new_password" placeholder="New Password">
            </td>
        </tr>

        <tr>
            <td>Confirm Password:</td>
            <td>
                <input type="password" name="confirm_password" placeholder="Confirm Passowrd">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-secondary">
            </td>
            
        </tr>

    </table>

    </form>
</div>

<?php
// check whether the submit button is clicked or not

if(isset($_POST['submit'])){
    // echo "clicked";
    
    //1. update the data from form 
    
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
    }
    //2. check whether the user with current id or pass exists or not
    $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    // lets Execute the query
    $res=mysqli_query($conn,$sql);

    if($res==true){
        // check whether the data is available or not
        $count=mysqli_num_rows($res);
        if($count==1){
            // user exists in db pass can be change
            //echo "user found ";
            // check whether the new pass and confirm pass matches or not

            if($new_password==$confirm_password){
                // update the password
                $sql2="UPDATE tbl_admin SET
                password='$password'
                WHERE id=$id
                ";
                // execute the query
                $res2=mysqli_query($conn,$sql);
                // chech whether the query execute opr not
                if($res2==true){
                    // display message
                    $_SESSION['change-pwd']="<div class='success'>Password changed successfully</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

                
                else{
                    // display error message
                    $_SESSION['change-pwd']="<div class='error'>Failed to change password</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                
                
            }else{
                // redirwct to manage asmin page eiyth error message
                $_SESSION['pwd-not-match']="<div class='error'>Password did n't Match</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }

        }else{
            // User does not exist set message and redirect
            $_SESSION['user-not-found']="<div class='error'>User Not Found</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
    //3. check whether the new password and confirm password match or not

    //4. Change pass if all above is true.



}
?>

<?php include('partials/footer.php') ?>
