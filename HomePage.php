<?php
// Database connection
require_once 'connection.php'; // Assuming you have a separate file for database connection

function productsContainer($conn) {
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    $productsHTML = '';
    if ($result->num_rows >  0) {
        while($row = $result->fetch_assoc()) {
            $productsHTML .= '
            <div class="product-box">
                <img alt="apple" src="' . htmlspecialchars($row["image"]) . '">
                <strong>' . htmlspecialchars($row["name"]) . '</strong>
                <span class="quantity">' . htmlspecialchars($row["kg"]) . ' kg</span>
                <span class="price">Rs. ' . htmlspecialchars($row["priceCents"]) . '</span>
                <button class="cart-btn" data-product-name="' . htmlspecialchars($row["id"]) . '">
                    <i class="fas fa-shopping-bag"></i> Add to Cart
                </button>
                <button class="like-btn" data-like-name="' . htmlspecialchars($row["id"]) . '">
                    <i class="far fa-heart"></i>
                </button>
            </div>';
        }
    } else {
        echo "No products found";
    }
    return $productsHTML;
}
?>



<DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==Title==================================-->
    <title>

        BHUMI Grocery Store

    </title>

    <!--==Stylesheet=============================-->
    <link rel="stylesheet" type="text/css" href="Home Page CSS.css">

    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="images/fav-icon.png"/>

    <!--==Using-Font-Awesome=====================-->
    <script src="https://kit.fontawesome.com/80d6d976a0.js" crossorigin="anonymous"></script>

    <script src="products.js"></script>
    <script src="wishcart.js"></script>
    <script src="cartt.js"></script>
   

    <!-- <script src = 'Home Page JS.js' defer></script> -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	    
   <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    </head>

    <body>

        <!--==Navigation================================-->
        <nav class="navigation">

            <!--logo-------->
            <div class="imagecon">
            <img class="img"  src="https://i.imgur.com/oRhEAUj.jpg">
            </div>
            <div class="search">
            <form action="" class="search-box">
                <!--input----->
                <input type="text" class="search-input" placeholder="Search" name="search" size = "80px" required>

                <!--btn------->
                <input type="submit" class="search-btn" value="Search">

            </form>
        </div>
        
        <div class="menu">
            <li>
                <a href="adress.html" class="active">
                    
                    My Adress 
                    <i class="fa-solid fa-location-dot"></i>

                </a>
            
            </li>


            <li>
                
                <a href="Login And Registration HTML.html">
                    
                    Login
                
                </a>
            
            </li>
        </div>
            <!--right-nav-(cart-like)-->
            <div class="right-nav">
            

                <!--like----->
                <a href="login.php" target="_blank" class="like">

                    <i class="fas fa-heart"></i>

                    <span class="js-wish-quantity">
                        
                        0
                    
                    </span>

                </a>

                <!--cart----->
                <a href="login.php" class="cart" target="_blank">

                    <i class="fas fa-shopping-cart"></i>
                    
                    <span class="js-cart-quantity">
                        
                        0
                    
                    </span>

                </a>

                <!--cart----->
                <div class="user-profile">
                    <a href="login.php" class="trigger">
                      <i class="fas fa-user"></i>
                    </a>
                   
                     
                    
                  </div>
            </div>

        </nav>

        <!--nav-end--------------------->

        <!--==category=========================================-->
        <section id="category" >

            <!--heading---------------->
            <div class="category-heading">

                <h2>
                    
                    Category
                
                </h2>

                <span>
                    
                    All
                
                </span>

            </div>

            <!--box-container---------->
            <div class="category-container">

                <!--box---------------->
                <a class="category-box" href = 'Fruits Category Page HTML.html' target="_blank">
					<img alt="Fruits and Vegetables" src="https://i.imgur.com/XpKSPDU.png">
					<span>Fruits & <br> Vegetables</span>
				
                <!--box---------------->
                <a class="category-box" href="Dairy.html" target="_blank">
                    <img alt="Baby Care Products" src="uploads/dairy.png">
                    <span>Dairy Products</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Spices.html' target="_blank">
                    <img alt="Fish" src="https://i.imgur.com/HBPp6aG.png">
                    <span>Spices</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Meat.html' target="_blank">
                    <img alt="Beauty Products" src="https://i.imgur.com/qW76pSG.png">
                    <span>Meat</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Seeds.html' target="_blank">
                    <img alt="Gardening Products" src="https://i.imgur.com/O4UbKKq.png">
                    <span>Seeds</span>
                </a>
                <a class="category-box" href = 'Fertilizerss.html' target="_blank">
                    <img alt="Gardening Products" src="https://i.imgur.com/Lxu0Tc5.png">
                    <span>Fertilizers</span>
                </a>
            </div>
            
        </section>
        <!--category-end----------------------------------->
        <!--==Products====================================-->
        <section id="popular-product">
            <!--heading----------->
            <div class="product-heading">
                <h3>Popular Product</h3>
                <span>All</span>
            </div>
            <!--box-container------>
            <div class="product-container">
                <!--box---------->
                <?php echo productsContainer($conn); ?>
               
            </div>
        </section>
        <!--popular-product-end--------------------->
        <!--Popular-bundle-pack===================================-->
        <section id="popular-bundle-pack" >
            <!--heading-------------->
            <div class="product-heading">
                <h3>Popular Bundle Pack</h3>
            </div>
            <!--box-container------>
            <div class="product-container bundle">
                
            </div>
        </section>
        <!--popular-bundle-pack-end-------------------------------->
        <!--==Clients===============================================-->
        <section id="clients">
            <!--heading---------------->
            <div class="client-heading">
                <h3> Our Trusted Farmers</h3>
            </div>
            <!--box-container---------->
            <div class="client-box-container">
                <!--box------------->
                <div class="client-box">
                    <!--==profile===-->
                    <div class="client-profile">
                        <!--img--->
                        <img alt="client" src="https://i.imgur.com/FNVH9z6.jpg">
                        <!--text-->
                        <div class="profile-text">
                            <strong>Vamsi</strong>
                            <span>Vegetable farmer</span>
                        </div>
                    </div>
                    <!--==Rating======-->
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <!--==comments===-->
                    <p>BHUMI Grocery Store is the best. CGS never fails to dissapoint me. Grocery shopping has become so easy with BHUMI Grocery Store.</Str></p>
                </div>
                <!--box------------->
                <div class="client-box">
                    <!--==profile===-->
                    <div class="client-profile">
                        <!--img--->
                        <img alt="client" src="https://i.imgur.com/3yv9Hkj.jpg">
                        <!--text-->
                        <div class="profile-text">
                            <strong>Naga Lakshmi</strong>
                            <span>Fruits Farmer</span>
                        </div>
                    </div>
                    <!--==Rating======-->
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <!--==comments===-->
                    <p>BHUMI Grocery Store is just amazing. I can buy all my groceries from a single place. The groceries are available at very affordable prices. And, the groceries are delivered at the time slot you choose and prefer.</p>
                </div>
                <!--box------------->
                <div class="client-box">
                    <!--==profile===-->
                    <div class="client-profile">
                        <!--img--->
                        <img alt="client" src="https://i.imgur.com/Rk5RDey.jpg">
                        <!--text-->
                        <div class="profile-text">
                            <strong>Joysthna</strong>
                            <span>Spice Farmer</span>
                        </div>
                    </div>
                    <!--==Rating======-->
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <!--==comments===-->
                    <p>At BHUMI Grocery Store, you can get fresh fruits and vegetables. And it is not only about fruits or vegetables, you can buy all kinds of stuff here.</p>
                </div>
            </div>
        </section>
     
        <!--==Footer=============================================-->
        <footer>
            <div class="footer-container">
                <!--logo-container------>
                <div class="footer-logo">
                    <a href="file:///C:/Users/RAGHAV/Desktop/Coding/Grocery/Logo.png"><span>B</span>HUMI</a>
                    <!--social----->
                    <div class="footer-social">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/?lang=en-in"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <!--links------------------------->
            <div class="footer-links">
                <strong>Product</strong>
                <ul>
                    <li><a href="#">Grocery</a></li>
                    <li><a href="#">Packages</a></li>
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">New</a></li>
                </ul>
            </div>
            <!--links------------------------->
            <div class="footer-links">
                <strong>Category</strong>
                <ul>
                    <li><a href="#">Fruits</a></li>
                    <li><a href="#">Vegetables</a></li>
                    <li><a href="#">Dairy</a></li>
                    <li><a href="#">Spices</a></li>
                </ul>
            </div>
            <!--links-------------------------->
            <div class="footer-links">
                <strong>Contact</strong>
                <ul>
                    <li><a href="#">Phone : +123456789</a></li>
                    <li><a href="#">Email : Bhumi@gmail.com</a></li>
                    <li><a href="#">Cities we serve</a></li>
                </ul>
				
            </div>
            </div>
        </footer>

    </body>
</html>
