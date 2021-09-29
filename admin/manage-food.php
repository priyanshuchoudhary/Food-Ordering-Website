<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper"></div>
    <h1>Manage Food</h1>

    <br />
    <!-- Button to add Admin -->
    <br />
    <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add food</a>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    ?>
    <table class="tbl-full">
        <tr>
            <th>Sr. No</th>
            <th>Title </th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_food"; // create sql query to get all the food
        $res = mysqli_query($conn, $sql); // Execute the query
        $count = mysqli_num_rows($res); // count rows to check whether wwe have food or not
        // create serial Number variable and set default value as 1.
        $sn = 1;
        if ($count > 0) {
            // food present in database// get the food from databse and display
            while ($row = mysqli_fetch_assoc($res)) {
                // get the values from individual column.
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
        ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php
                        if ($image_name == "") {
                            // we don't have image // display error message
                            echo "<div class='error'>Image Not Added</div>";
                        } else {
                            // we have Image,Display Image
                        ?>
                            <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" width="100px">

                        <?php
                        }
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="#" class="btn-secondary">Update Food</a>
                        <a href="#" class="btn-danger">Delete Food</a>


                    </td>
                </tr>
        <?php
            }
        } else {
            // food not added in databse
            echo "<tr><td colspan='7' class='error'>Food Not Added Yet.</td</tr>";
        }
        ?>
    </table>
</div>
<?php
include('partials/footer.php');
?>