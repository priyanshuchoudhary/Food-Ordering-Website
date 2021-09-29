<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper"></div>
    <h1>Manage Category</h1>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
    <br><br>

    <br />
    <!-- Button to add Admin -->
    <br />
    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>


    <table class="tbl-full">

        <tr>

            <th>Sr. No</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>

        </tr>

        <?php
        // Query to get all categories from database.
        $sql = "SELECT * FROM tbl_category";

        // Execute Query
        $res = mysqli_query($conn, $sql);
        // Count rows
        $count = mysqli_num_rows($res);
        //Check whether we have data in database
    
        // Create Serial Number variable
        $sn=1;

        if ($count > 0) {
            // we have data in database// get the data and display

            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title=$row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

        ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title;?></td>


                    <td>
                        <?php// Check whether image name is Available or
                            if($image_name!=""){
                                // Display the Image
                                   ?>
                                   
                                   <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">

                                   <?php
                            // }
                            
                            //else{
                            //     // display the message
                            //     echo "<div class='error'>Image Not Added.</div>";
                            // }

                        ?>
                    </td>


                    <td><?php echo $featured ?></td>
                    <td><?php echo $active ?></td>
                    <td>
                        <a href="#" class="btn-secondary">Update Category</a>
                        <a href="#" class="btn-danger">Delete Category</a>


                    </td>
                </tr>


            <?php
            }
        } else{
            // we don't have data 
            // we will display the message inside table
            ?>
            <tr>
                <td colspan="6">
                    <div class="error">No Category Added.</div>
                </td>
            </tr>
        <?php

        }

        ?>
    </table>

</div>
<?php
include('partials/footer.php');
?>