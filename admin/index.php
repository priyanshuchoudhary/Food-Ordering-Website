<?php
include('partials/menu.php');
?>

<!-- Main Content section starts -->

<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {

            echo $_SESSION['login'];

            unset($_SESSION['login']);
        }

        ?>
        <br><br>

        <!-- <strong>DASHBOARD</strong> -->
        <div class="col-4 text-center">
            <?php
                $sql="SELECT * from tbl_category ";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
            ?>


            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">
        <?php
                $sql2="SELECT * from tbl_food ";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
            ?>


            <h1><?php echo $count2; ?></h1>
            <br />
            Foods
        </div>

        <div class="col-4 text-center">
        <?php
                $sql3="SELECT * from tbl_order ";
                $res3=mysqli_query($conn,$sql3);
                $count3=mysqli_num_rows($res3);
            ?>


            <h1><?php echo $count3; ?></h1>
            <br />
            Orders
        </div>

        <div class="col-4 text-center">
        <?php
        // Create sql Query to get Total Revenue Generatred
        // Aggreegate function in sql.

        $sql4="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
        // Execute The Query
        $res4=mysqli_query($conn,$sql4);
        // Get the value
        $row4=mysqli_fetch_assoc($res4);    
        //  Gwt the total REvenue
        $total_revenue=$row4['Total'];

            ?>


            <h1><?php echo $count; ?></h1>
            <br />
            Revenue Generated
        </div>

        <div class="clearfix">

        </div>


    </div>
</div>


<!-- Main Content section ends -->

<?php include('partials/footer.php') ?>