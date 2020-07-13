

<?php ob_start(); ?>
<header class="header">

    <!-- Top Bar -->

    <div class="top_bar" style="background:#bd3539">
        <div class="container" >
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item" style="color: white"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005 3570</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com"style="color: white">fastsales@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            
                        </div>
                        <div class="top_bar_user">
                           <?php
                           if(isset($_SESSION['name'])){
                            ?>
                            
                            <a href=""><?php echo $_SESSION['name']; ?></a>|
                            <a href="./logout.php" style="color: white">Log out</a>
                            <?php       
                        }else{
                            ?>
                            <div class="user_icon"><img src="images/user.svg" alt=""></div>
                            <div><a href="./singin.php"style="color: white">Register</a></div>
                            <div><a href="./login.php"style="color: white">Sign in</a></div>
                        <?php } ?>                 
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>

<!-- Header Main -->

<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="#">HTT</a></div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="./search.php" method="get" role="search" class="header_search_form clearfix">
                                <input type="search" required="required" class="header_search_input" placeholder="Search for products..." name="form_search">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down">
                                            <ul class="custom_list clc">
                                                <li><a class="clc" href="shop.php">All Categories</a></li>
                                                <li><a class="clc" href="#">Computers</a></li>
                                                <li><a class="clc" href="#">Laptops</a></li>
                                                <li><a class="clc" href="#">Cameras</a></li>
                                                <li><a class="clc" href="#">Hardware</a></li>
                                                <li><a class="clc" href="#">Smartphones</a></li>
                                            </ul>
                                        </i>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit" style="background:black"><img src="images/search.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon"></div>
                        <div class="wishlist_content">
                            
                        </div>
                    </div>
                    <?php 
                    $totalItemOnCart = 0;

                    if(isset($_SESSION[CART])){
                        $cart = $_SESSION[CART];
                        foreach ($cart as $item) {
                            $totalItemOnCart += $item['quantity'];
                        }
                    }

                    ?>
                    <!-- Cart -->
                    <div class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon"><a>
                             <a href="<?php echo BASE_URL . "cart.php" ?>" class="btn btn-small btn-dark-solid"><img src="images/cart.png" alt=""></a>
                             <div class="cart_count"><span><?php echo $totalItemOnCart ?></span>Cart(<?php echo $totalItemOnCart ?>)</a></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

<!-- Main Navigation -->

<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <?php 
                    $sqlGetMenus = "select * from categories where show_menu = 1 limit 2";
                    $menus = executeQuery($sqlGetMenus, true);
                    ?>
                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown" style="margin-left: -1200px;margin-top: -20px">

                            <li><a href="<?php echo BASE_URL ?>">Home<i class="fas fa-chevron-down"></i></a></li>
                            <?php foreach ($menus as $menu): ?>
                                <li class="hassubs">

                                   <a href="<?php echo BASE_URL . 'apple.php?cateId=' . $menu['id'] ?>"><?php echo $menu['name'] ?>
                                   
                                   <li>
                                   <?php endforeach ?>
                                   <li ><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                               </ul>
                           </div>

                           <!-- Menu Trigger -->

                           <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text"></div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Menu -->

    <div class="page_menu">
        
    </div>

</header>