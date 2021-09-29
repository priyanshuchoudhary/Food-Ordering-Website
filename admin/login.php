<?php
include('../config/constants.php');

?>

<html>

<head>
    <title>Login-Food order System</title>
    <link rel="stylesheet" href="../css/admin.css"> 
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>

        <?php
        if(isset($_SESSION['login'])){

            echo $_SESSION['login'];
            unset($_SESSION['login']);

        }
        if(isset($_SESSION['no-login-message'])){

            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);

        }



        ?>
        <br><br>



        <!-- Login form starts here -->
        <br>
        <form action="" method="POST" class="text-center">
        Username<br><br>
        <input type="text" name="username" placeholder="Enter username">
        <br><br>
        Password<br><br>
        <input type="password" name="password" placeholder="Enter password">
        
        <br><br>
        <input type="submit" name="submit" value="login" class="btn-primary">
        </form>
        <br>
        <!-- Login form Ends here -->
        <p class="text-center">Created by -<a href="#">Priyanshu</a></p>
    </div>
</body>

</html>


<?php
// check whether the submit button is clicked or not

if(isset($_POST['submit'])){
     // process for login
    // 1. Get the data from the form 

    //$username=$_POST['username'];

    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $raw_password=md5($_POST['password']);

    $password=mysqli_real_escape_string($conn,$raw_password);
    // $password=md5($_POST['password']);

    //2. sql to check whther the user with username and password exist or not

    $sql="SELECT * from tbl_admin where username='$username' AND password='$password'";

    //3. execute the query
    $res=mysqli_query($conn, $sql);

    //4.count rows to check whether the user exists or not.
    $count=mysqli_num_rows($res);

    if($count==1){
    // user available
    $_SESSION['login']="<div class='success'>Login Successful.</div>";

    $_SESSION['user']=$username;// To check whether the user is logged in  or not and logout will unset it

    // Redirect to homepage / Dashborad
    header('location:'.SITEURL.'admin/');
    }
    else{
        // user unavailable
        $_SESSION['login']="<div class='error text-center'>Username or password Incorrect.</div>";
        // Redirect to 
       header('location:'.SITEURL.'admin/login.php');
    }

}

?>