<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>HTT</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="OneTech shop project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
  <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="styles/responsive.css">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <link rel="stylesheet" type="text/css" href="styles/sao.css">
  <link type="text/css" rel="stylesheet" href="styles/slick.css" />
  <link type="text/css" rel="stylesheet" href="styles/slick-theme.css" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="styles/nouislider.min.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="styles/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="styles/style.css" />
</head>

<body>

  <div class="super_container">


    <?php include_once './_share/header.php'; ?>
    <!-- Banner -->
    <?php
    $sqlQuery = "select * from sliders where status='1'";
    $sliders = executeQuery($sqlQuery, true);
    ?>
    <div class="slideshow-container">
      <?php foreach ($sliders as $sli) : ?>
        <div class="mySlides fade">
          <img src="./admin/images/img_sli/<?php echo $sli['images'] ?>" style="width:710px;height: 400px;margin-left: 500px">
          <div class="text"></div>
        </div>
      <?php endforeach ?>
      <div>
        <img src="images/b3.png" style="width: 400px;margin-left: 70px;margin-top: -620px;height: 200px">
        <img src="images/b1.PNG" style="width: 400px;margin-left: -400px;margin-top: -220px;height: 200px">
      </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(0)"></span>
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
    </div>
</body>
<script>
  //khai báo biến slideIndex đại diện cho slide hiện tại
  var slideIndex;
  // KHai bào hàm hiển thị slide
  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex].style.display = "block";
    dots[slideIndex].className += " active";
    //chuyển đến slide tiếp theo
    slideIndex++;
    //nếu đang ở slide cuối cùng thì chuyển về slide đầu
    if (slideIndex > slides.length - 1) {
      slideIndex = 0
    }
    //tự động chuyển đổi slide sau 5s
    setTimeout(showSlides, 2000);
  }
  //mặc định hiển thị slide đầu tiên 
  showSlides(slideIndex = 0);


  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
</script>


<!-- Characteristics -->

<!-- Deals of the week -->

<div class="deals_featured">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

        <!-- Deals -->

        <div class="deals" style="border: 3px solid #bd3539">
          <div class="deals_title"></div>
          <div class="deals_slider_container">

            <!-- Deals Slider -->
            <div class="owl-carousel owl-theme deals_slider">
              <?php
              $sqlQuery = "select * from products where sale_price=267";
              $products = executeQuery($sqlQuery, true); ?>

              <!-- Deals Item -->
              <?php foreach ($products as $pro) : ?>
                <div class="owl-item deals_item">
                  <div class="deals_image"><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></a></div>
                  <div class="deals_content">
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_category"><a href="#">Headphones</a></div>
                      <div class="deals_item_price_a ml-auto">$300</div>
                    </div>
                    <div class="deals_info_line d-flex flex-row justify-content-start">
                      <div class="deals_item_name"><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a></div>
                      <div class="deals_item_price ml-auto">$225</div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>

            </div>

          </div>

          <div class="deals_slider_nav_container">
            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
          </div>
        </div>

        <!-- Featured -->
        <div class="featured">
          <div class="tabbed_container">
            <div class="tabs">
              <ul class="clearfix">
                <li class="active"></li>

              </ul>
              <div class="tabs_line"><span></span></div>
            </div>
            <?php
            $sqlQuery = "select * from products limit 12 ";
            $products = executeQuery($sqlQuery, true); ?>

            <!-- Product Panel -->
            <div class="product_panel panel active">
              <div class="featured_slider slider">

                <!-- Slider Item -->
                <?php foreach ($products as $pro) : ?>
                  <div class="featured_slider_item">
                    <div class="border_active"></div>
                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                      <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></div>
                      <div class="product_content">
                        <div class="product_price discount"><del style="margin: 20px">$<?php echo number_format($pro['price'], 0, '', ','); ?></del><a href="" style="color: black;font-size:15px">$<?php echo number_format($pro['sale_price'], 0, '', ','); ?></a></div>
                        <div class="product_name">
                          <div><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a></div>
                        </div>
                        <div class="review-rating pull-center">

                          <?php
                          for ($i = 1; $i <= 5; $i++) {
                            if ($pro['rating'] >= $i) {
                              $starClass = "fa fa-star";
                            } else {
                              $starClass = "fa fa-star-o";
                            }
                          ?>
                            <i class="<?php echo $starClass ?>"></i>
                          <?php
                          }
                          ?>
                        </div>

                        <div class="product_extras">

                          <button class="product_cart_button"><a href="<?php echo BASE_URL . 'add-cart.php?id=' . $pro['id'] ?>" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Add to cart</a></button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>

              </div>


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="viewed">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="viewed_title_container">
          <h3 class="viewed_title">Sale 50%</h3>

        </div>
        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
        <div class="viewed_slider_container">

          <!-- Recently Viewed Slider -->

          <div class="owl-carousel owl-theme viewed_slider">
            <?php
            $sqlQuery = "select * from products  where sale_price <= price/1 limit 6";
            $products = executeQuery($sqlQuery, true); ?>

            <!-- Recently Viewed Item -->
            <?php foreach ($products as $pro) : ?>
              <div class="owl-item">
                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price"><del style="margin: 20px">$<?php echo number_format($pro['sale_price'], 0, '', ','); ?></del><a href="" style="color: black;font-size:15px">$<?php echo number_format($pro['price'], 0, '', ','); ?></a></div>
                    <div class="viewed_name"><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a> </div>

                  </div>

                </div>
              </div>

            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Brands -->


<!-- Banner -->



<!-- Hot New Arrivals -->

<div class="new_arrivals">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="tabbed_container">
          <div class="tabs clearfix tabs-right">
            <div class="new_arrivals_title">Hot New Arrivals</div>
            <ul class="clearfix">
              <li class="active"></li>
              <li></li>
              <li></li>
            </ul>
            <div class="tabs_line"><span></span></div>
          </div>
          <div class="row">
            <div class="col-lg-9" style="z-index:1;">

              <!-- Product Panel -->
              <div class="product_panel panel active">
                <div class="arrivals_slider slider">
                  <?php
                  $sqlQuery = "select * from products order by id desc limit 18";
                  $products = executeQuery($sqlQuery, true); ?>

                  <?php foreach ($products as $pro) : ?>
                    <!-- Slider Item -->
                    <div class="arrivals_slider_item">
                      <div class="border_active"></div>
                      <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></div>
                        <div class="product_content">
                          <br>
                          <div class="viewed_price"><del style="margin: 20px">$<?php echo number_format($pro['price'], 0, '', ','); ?></del><a href="" style="color: red;font-size:15px">$<?php echo number_format($pro['sale_price'], 0, '', ','); ?></a></div>
                          <div class="product_name">
                            <div><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a></div>
                          </div>
                          <div class="product_extras">

                            <button class="product_cart_button"><a href="<?php echo BASE_URL . 'add-cart.php?id=' . $pro['id'] ?>" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Add to cart</a></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                  <!-- Slider Item -->
                </div>
                <div class="arrivals_slider_dots_cover"></div>
              </div>

            </div>

            <div class="col-lg-3">
              <div class="arrivals_single clearfix">
                <?php
                $sqlQuery = "select * from products where price='500'";
                $products = executeQuery($sqlQuery, true); ?>

                <?php foreach ($products as $pro) : ?>
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="arrivals_single_image"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></div>
                    <div class="arrivals_single_content">
                      <div class="arrivals_single_category"><del style="margin: 20px">$<?php echo number_format($pro['price'], 0, '', ','); ?></del><a href="" style="color: red;font-size:15px">$<?php echo number_format($pro['sale_price'], 0, '', ','); ?></a></div>
                      <div class="arrivals_single_name_container clearfix">
                        <div class="arrivals_single_name"><a href="#"><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a></a></div>
                        <div class="arrivals_single_price text-right">$379</div>
                      </div>

                      <form action="#"><button class="arrivals_single_button"><a href="<?php echo BASE_URL . 'add-cart.php?id=' . $pro['id'] ?>" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Add to cart</a></button></form>
                    </div>
                  <?php endforeach ?>
                  </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Best Sellers -->

<div class="best_sellers">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="tabbed_container">
          <div class="tabs clearfix tabs-right">
            <div class="new_arrivals_title">Hot Best Sellers</div>
            <ul class="clearfix">
              <li class="active"></li>

            </ul>
            <div class="tabs_line"><span></span></div>
          </div>

          <div class="bestsellers_panel panel active">

            <!-- Best Sellers Slider -->

            <div class="bestsellers_slider slider">
              <?php
              $sqlQuery = "select * from products where price='400'";
              $products = executeQuery($sqlQuery, true); ?>

              <?php foreach ($products as $pro) : ?>
                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="<?php echo BASE_URL . "detail.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a></div>
                      <div class="review-rating pull-center">

                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                          if ($pro['rating'] >= $i) {
                            $starClass = "fa fa-star";
                          } else {
                            $starClass = "fa fa-star-o";
                          }
                        ?>
                          <i class="<?php echo $starClass ?>"></i>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="bestsellers_price discount"><del style="margin: 20px">$<?php echo number_format($pro['price'], 0, '', ','); ?></del><a href="" style="color: black;font-size:15px">$<?php echo number_format($pro['sale_price'], 0, '', ','); ?></a></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"></div>

                </div>
              <?php endforeach ?>
              <!-- Best Sellers Item -->

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <br>

  <!-- Adverts -->



  <!-- Recently Viewed -->




  <!-- Newsletter -->

  <div class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
            <div class="newsletter_title_container">
              <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
              <div class="newsletter_title">Sign up for Newsletter</div>
              <div class="newsletter_text">
                <p>...and receive %20 coupon for first shopping.</p>
              </div>
            </div>
            <div class="newsletter_content clearfix">
              <form action="#" class="newsletter_form">
                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                <button class="newsletter_button">Subscribe</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 footer_col">
          <div class="footer_column footer_contact">
            <div class="logo_container">
              <div class="logo"><a href="#">HTT</a></div>
            </div>
            <div class="footer_title">Got Question? Call Us 24/7</div>
            <div class="footer_phone">+38 068 005 3570</div>
            <div class="footer_contact_text">
              <p>17 Princess Road, London</p>
              <p>Grester London NW18JR, UK</p>
            </div>
            <div class="footer_social">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fab fa-google"></i></a></li>
                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 offset-lg-2">
          <div class="footer_column">
            <div class="footer_title">Find it Fast</div>
            <ul class="footer_list">
              <li><a href="#">Computers & Laptops</a></li>
              <li><a href="#">Cameras & Photos</a></li>
              <li><a href="#">Hardware</a></li>
              <li><a href="#">Smartphones & Tablets</a></li>
              <li><a href="#">TV & Audio</a></li>
            </ul>
            <div class="footer_subtitle">Gadgets</div>
            <ul class="footer_list">
              <li><a href="#">Car Electronics</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="footer_column">
            <ul class="footer_list footer_list_2">
              <li><a href="#">Video Games & Consoles</a></li>
              <li><a href="#">Accessories</a></li>
              <li><a href="#">Cameras & Photos</a></li>
              <li><a href="#">Hardware</a></li>
              <li><a href="#">Computers & Laptops</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="footer_column">
            <div class="footer_title">Customer Care</div>
            <ul class="footer_list">
              <li><a href="#">My Account</a></li>
              <li><a href="#">Order Tracking</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">Customer Services</a></li>
              <li><a href="#">Returns / Exchange</a></li>
              <li><a href="#">FAQs</a></li>
              <li><a href="#">Product Support</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright -->


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="styles/bootstrap4/bootstrap.min.js"></script>
  <script src="plugins/greensock/TweenMax.min.js"></script>
  <script src="plugins/greensock/TimelineMax.min.js"></script>
  <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="plugins/greensock/animation.gsap.min.js"></script>
  <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="plugins/slick-1.8.0/slick.js"></script>
  <script src="plugins/easing/easing.js"></script>
  <script src="js/custom.js"></script>
  </body>

</html>