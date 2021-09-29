<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Title of the Food"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" placeholder="Description of the food" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">


                        <?php
                        // creating php code to display categories from database;
                        // 1. Create SQL to get all active categories from database.

                        $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                        // Executing Query
                        $res=mysqli_query($conn, $sql);
                        // count rows to check whether we have categories or not
                        $count=mysqli_num_rows($res);
                        // If count is grateer than zero,we have categoires else we don't have categories
                        if($count>0){
                            // we have categories
                            while($row=mysqli_fetch_assoc($res)){
                                // get details of categories
                                $id=$row['id'];
                                $title=$row['title'];

                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php
                            }


                        }else{
                            // we don't have categories
                            ?>  
                            <option value="0">No Categories Available</option>
                            <?php
                        }


                        ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">YES
                        <input type="radio" name="featured" value="No">NO
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">YES
                        <input type="radio" name="active" value="No">NO
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    <?php
    // check whether the button is clicked or not
    if(isset($_POST['submit'])){
        // Add the Food in database

        //  1. Get the data from the form
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];

        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }else{
            $featured="No"; // Setting the default value.   
        }

        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }else{
            $active="No";// setting default value
        }

        // check radio button for featured

        //2.Upload the Image if selected

        if(isset($_FILES['image']['name'])){
            // Get the details of the selected image
            $image_name=$_FILES['image']['name'];
            //check whether the image is selected or not

            if($image_name!=""){
                //Image is selected // 1. Rename the image
                // Get the Extension of selected Image (jpg,png,gif,etc.)
                $ext=end(explode('.', $image_name));
                
                // create new Name for Image
                $image_name="Food-Name-".rand(0000,9000).".".$ext; // New Image name may be 
                //3. Upload the Image
                // Get the source path and destination path

                $src=$_FILES['image']['tmp_name'];
                // destination opath for the Image to be Uploaded.

                $dst="../images/food/".$image_name;
                // Finally upload the Food Image.
                $upload=move_uploaded_file($src,$dst);
                // Check Whether Image Uploaded or not.

                if($upload==false){
                    // Failed to Upload the Image
                    // Redirect to Add Food page With Error Message

                    $_SESSION['upload']="<div class='error'>Failed to Upload Image</div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                    die();
                }



            }

        }else{
            $image_name="";// setting default Value as blank
        }


        //3.Insert into database;

        // create a sql query to Save or Add food.

        $sql2="INSERT INTO tbl_food SET
               title='$title',
               description='$description',
               price=$price,
               image_name='$image_name',
               category_id=$category,
               featured='$featured',
               active='$active'
            ";

        // Execute the Query
        $res2=mysqli_query($conn, $sql2);
        //
        if($res2==true){
            // Data Inserted Successfully
            $_SESSION['add']="<div class='success'>Food Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }else{
            // Failed to Insert Data
            $_SESSION['add']="<div class='error'>Failed to Add Food...</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        //4.Redirect with Message to Manage Food page.
    }
    ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>