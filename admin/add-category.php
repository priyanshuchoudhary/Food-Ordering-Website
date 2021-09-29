<?php include('partials/menu.php') ?>
<div class="main-content">

    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <!-- Add category from starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Category title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>


                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">YES
                        <input type="radio" name="featured" value="No">NO
                    </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes">YES
                        <input type="radio" name="active" value="No">NO
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>

                </tr>
            </table>

        </form>



        <!-- Add category form ends here -->
        <?php
        // check whether the submit button is clicked or not
        if (isset($_POST['submit'])) {
            //echo "Clicked";
            // get the value from the form

            $title = $_POST['title'];

            // for radio input type lets check the button is selected or not

            if (isset($_POST['featured'])) {
                // get the value from form 
                $featured = $_POST['featured'];
            } else {
                // set the default value
                $featured = "No";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            // check whether the image is selected or not and set the value for image name accordingly.
            // print_r($_FILES['image']); // print_r() for displaying array not using acho this time.
            // die();// braek the code here

            if (isset($_FILES['image']['name'])) {
                // let's upload the image
                // To upload image we need image name,source path and destination path
                $image_name = $_FILES['image']['name'];
                // Auto rename image
                // get the extension of our image e.g SpecialFood.jpg

                $ext = end(explode('.', $image_name)); // .jpg
                // rename the image
                $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext; // e.g: Food_Category_420.jpg

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/category/" . $image_name;

                // finally upload the Image
                $upload = move_uploaded_file($source_path, $destination_path);
                // check whether the image is uploaded or not
                // and if the image is not uploaded then we will stop the process and redirect with error message
                if ($upload == false) {
                    $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                    // redirect to add Category
                    header('location:' . SITEURL . 'admin/add-category.php');
                    // stop the process
                    die();
                }
            } else {
                // Don't upload image and set the image_name value as blank.
                $image_name = "";
                //$source=$_FILES['image']['tmp'];
            }

            // 2. Let's create SQl query to insert category into database.
            $sql = "INSERT INTO tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
        ";

            // 3. let's execute the query
            $res = mysqli_query($conn, $sql);
            // 4. Check whether the query executed or not  and data added or not

            if ($res == true) {
                // query executed and Category added
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                // redirect to manage category page
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                // Failed to add category.
                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                header('location:' . SITEURL . 'admin/add-category.php');
            }
        }
        ?>


    </div>
</div>

<?php include('partials/footer.php') ?>