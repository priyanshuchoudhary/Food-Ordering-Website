<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>


        <?php  
            if(isset($_SESSION['add'])){ // checking whether the session is set or not

                echo $_SESSION['add'];// Display the session message if set
                unset($_SESSION['add']);// Remove session message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name:"></td>
                </tr>


                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter your username:"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter your Password:"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>

</div>

<?php include('partials/footer.php'); ?>


<?php
// process the value from form save it in database
// Check whether the button is clicked or not
global $full_name,$username,$password;

if (isset($_POST['submit'])) {
    // Button  clicked
    //echo "Button Clicked";
    // 1. get data from form

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Password Encryption with md5
}
//2. Sql query to save the data into database

$sql = "INSERT INTO tbl_admin SET

    full_name='$full_name',
    username='$username',
    password='$password'

";

// 3. Execute Query and Save data i database


// $conn=mysqli_connect('localhost', 'root','') or die(mysqli_error());// database connection

// $db_select=mysqli_select_db($conn, 'food-order') or die(mysqli_error());// selecting Database

// 3.executing query and savingb data into the database

$res=mysqli_query($conn, $sql) or die(mysqli_error($conn));

// 4.Check whether the (query is executed) data is inserted or not and display 

if($res==TRUE){
// data inserted
//echo "Data Inserted";
// create a session to display a variable

  $_SESSION['add']="<div class='success'>Admin Added succesfully.</div>";
  // redirect page to managfe admin page
   //header("location:".SITEURL.'admin/manage-admin.php');


}
else{
    // Failed to insert the data
    //echo "Failed to insert data";
  $_SESSION['add']="<div class='error'>Failed to Add Admin.</div>";
  // redirect page to add admin poage
   header("location:".SITEURL.'admin/add-admin.php');

}


?>