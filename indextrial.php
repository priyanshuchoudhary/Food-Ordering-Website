<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make a website responsive -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Food Ordering Website</title>
    <link rel="stylesheet" href="csstrial/styletrial.css">
</head>

<body>


    <!-- Navbar section starts here -->
    <section class="navbar">
        <div class="container">

            <div class="logo">
                <img src="images/logo.png" alt="Website logo class" class="img-responsive">
            </div>
            <div class="menu text-right">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Food</a></li>
                    <li><a href="#">Categories</a></li>
                </ul>
            </div>

        </div class="clearfix">
        <div>

        </div>
    </section>
    <!-- Navbar section ends here -->

    <!-- Food search section starts here -->
    <section class="food-search text-center">
        <div class="container">
            <!-- <img src="images/bg.jpg"> -->
            <form action="">
                <input type="search" placeholder="Search your favourite dish here" name="search for food....">

                <input type="submit" name="submit" value="Search" class="btn btn-primary">

            </form>

        </div>
    </section>
    <!-- Food search section ends here -->

    <!-- Categories section starts here -->
    <section class="categories">
        <div class="container">


            <h2 class="text-center">Categories</h2>
            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Neapolitan Pizza</h3>

                </div>
            </a>

            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/burger.jpg" alt="burger" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Special Burger</h3>
                </div>

            </a>
            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/momo.jpg" alt="MoMo" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Chilly Momos</h3>
                </div>
            </a>
            <div class="clearfix">

            </div>

        </div>

        <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/menu-burger.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/menu-momo.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/menu-pizza.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div> -->

    </section>
    <!-- Categories section ends here -->


    <!-- Food menu section starts here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Explore the variety of food</h2>



            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Pizzaa" class="img-responsive">
                </div>
                <div class="food-menu-desc">
                    <h4>Mexican Pizza</h4>
                    <p class="food-price">199 Rs/-</p>
                    <p class="food-detail">Made with italian sauce and organic vegetable</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>

            </div>



            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Pizzaa" class="img-responsive">
                </div>
                <div class="food-menu-desc">
                    <h4>Special momo</h4>
                    <p class="food-price">299 Rs/-</p>
                    <p class="food-detail">Made with italian sauce and organic vegetable</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>

            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Pizzaa" class="img-responsive">
                </div>
                <div class="food-menu-desc">
                    <h4>Special Pizza</h4>
                    <p class="food-price">199 Rs/-</p>
                    <p class="food-detail">Made with italian sauce and organic vegetable</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>

            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Pizzaa" class="img-responsive">
                </div>
                <div class="food-menu-desc">
                    <h4>Special burger</h4>
                    <p class="food-price">250 Rs/-</p>
                    <p class="food-detail">Made with italian sauce and organic vegetable</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>

            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Pizzaa" class="img-responsive">
                </div>
                <div class="food-menu-desc">
                    <h4>Mexican Pizza</h4>
                    <p class="food-price">150 Rs/-</p>
                    <p class="food-detail">Made with italian sauce and organic vegetable</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>

            </div>


            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Pizzaa" class="img-responsive">
                </div>
                <div class="food-menu-desc">
                    <h4>Chilly momos</h4>
                    <p class="food-price">120 Rs/-</p>
                    <p class="food-detail">Made with italian sauce and organic vegetable</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>

            </div>

            <div class="clearfix">

            </div>

        </div>
    </section>
    <!-- food menu section ends here -->

    <!-- Social section starts here -->
    <section class="social">
        <div class="container text-center">


            <ul>

                <li>
                    <img src="https://img.icons8.com/material-rounded/48/4a90e2/facebook-circled.png" />
                </li>

                <li>
                    <img src="https://img.icons8.com/office/48/fa314a/instagram-new.png" />
                </li>
                <img src="https://img.icons8.com/ios-glyphs/48/4a90e2/twitter.png" />
                <li>
                </li>


            </ul>

        </div>

        </div>
    </section>
    <!-- Social section ends here -->

    <!-- Footer section starts here -->
    <section class="footer">
        <div class="container text-center">


            <p>All rights Reserved. Designed by <a href="#">Priyanshu</a></p>

        </div>
    </section>
    <!-- Footer section ends here -->

</body>

</html>