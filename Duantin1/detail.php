<?php
session_start(); 
ob_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$sqlQuery = "select * from products where id = $id";
$product = executeQuery($sqlQuery);

if(!$product){
    header('location: ' . BASE_URL);
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/styles.php'; ?>  
</head>

<body>
    <?php 
    include "./admin/db.php";
    $id=$_GET['id'];

    $sqp ="select * from products where id='$id' ";
    $kq2= $conn ->query($sqp)->fetch();
    $view_count=$kq2['view_count'];
    $view_count++;
    $sqlview="update products set view_count='$view_count' where id='$id' ";
    $kqs=$conn->prepare($sqlview)->execute();
    ?>

    <div class="super_container" style="background: white">

        <!-- Header -->
        <?php include_once './_share/header.php'; ?>  

        <!-- Single Product -->
        
        <div class="single_product">
            <div class="container">
                <div class="row">
                    <!-- Images -->
                    <div class="col-lg-2 order-lg-1 order-2">
                        <ul class="image_list">

                            <li data-image="images/x8.1.png"><img src="images/x8.1.png" alt=""></li>
                            <li data-image="images/x8.2.png"><img src="images/x8.2.png" alt=""></li>
                            <li data-image="images/x8.3.png"><img src="images/x8.3.png" alt=""></li>
                        </ul>
                    </div>

                    <!-- Selected Image -->
                    <div class="col-lg-5 order-lg-2 order-1">
                        <div class="image_selected"><img src="./admin/images/img_pro/<?php echo $product['feature_image'] ?>" alt="" ></div>
                    </div>

                    <!-- Description -->
                    <div class="col-lg-5 order-3">
                        <div class="product_description">
                            <div class="product_category">Iphone</div>
                            <div class="product_name"><?php echo $product['name'] ?></div>
                            <div class="product_text"><p><?php echo $product['detail'] ?></p></div>
                            <div class="product_name"><p style="font-size:20px">View <?php echo $product["view_count"] ?></p></div>

                            <div class="order_info d-flex flex-row">
                                <form action="#">
                                    <div class="clearfix" style="z-index: 1000;">

                                        <!-- Product Quantity -->
                                        <div class="product_quantity clearfix">
                                            <span>Quantity: </span>
                                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                            </div>
                                        </div>

                                        <!-- Product Color -->


                                    </div>

                                    <div class="product_price"><del style="margin: 10px">$<?php echo number_format($product['price'], 0, '', ','); ?></del><a style="color: red">$<?php echo number_format($product['sale_price'], 0, '', ','); ?></a></div>
                                    <div class="button_container">
                                        <button type="button" class="button cart_button"><a href="<?php echo BASE_URL . 'add-cart.php?id=' . $product['id'] ?>">Add to Cart</button></a>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="product-tab">
                <ul class="tab-nav">

                    <li><a data-toggle="tab" href="#tab2">Reviews</a></li>
                </ul>
                

                <div id="tab2" class="tab-pane fade in">

                    <div class="row">

                        <div class="col-md-10">
                            <h4 class="text-uppercase">Comment</h4>
                            <?php
                            include('./admin/db.php');
                            if(isset($_GET['id_sua'])){

                                $id_sua = $_GET['product_id'];
                                $sqlbl = "select * from comments where product_id ='$id_sua'";
                                $kqbl = $conn->query($sqlbl)->fetch();
                            }
                            ?>


                            <?php 
                            if(isset($_SESSION['name'])){
                                ?>
                                <form action="detail.php?id=<?php echo $_GET['id'] ?>" method="post" style="margin-left: 0px; margin-top: px;margin-bottom: 50px;" enctype="multipart/form-data"> 

                                    <input type="text"  style="width:660px;font-size: 15px; height: 40px;" placeholder="Title" name="title" required >
                                    <br>
                                    <br>
                                    <input type="text"  style="width:660px;font-size: 15px; height: 70px;" placeholder="ADD A COMMENT...." name="content" required >
                                    <br>
                                    <br>
                                    <button style="height: 50px; width: 150px;background-color: #ffcc33;border: 1px solid #ffcc33; color: black;border-radius: 20px;" name="gui">COMMENTS</button>
                                </form>

                                <?php

                                if(isset($_POST['gui'])){
                                    $name = $_SESSION['name'];
                                    $title= $_POST['title'];
                                    $content =$_POST['content'];
                                    $date = date('y-m-d');
                                    $sqlgui = "insert into comments value('','$id','$title','$content','$date','$name')";
                                           // echo $sqlgui ."<br>";
                                    $kqgui = $conn->exec($sqlgui);
                                         //if($kqgui==1){
                                             //header("location:detail.php");
                                    //      }else{
                                        //     echo('thất bại');
                                       //  }



                                }



                                ?>
                            <?php }else{ ?>
                               <a href="login.php" style="color: #0B9E3C;font-size: 15px;margin-bottom: 20px;">Các bạn hãy đăng nhập để bình luận</a>
                               

                           <?php } ?>       
                       </div>
                       <div class="col-md-6" style="margin-left: 700px;margin-top: -250px">
                          <?php
                          $kq =$conn->query("SELECT * FROM comments where product_id=$_GET[id] ORDER BY id DESC limit 10") ;
                          foreach($kq as $key => $value){
                            ?>
                            <div class="product-reviews">
                                <div class="single-review">
                                    <div class="review-heading">
                                        <div><a href="#"><i class="fa fa-user-o"></i> <?php echo $value['name']; ?></a></div>
                                        <div><a href="#"><i class="fa fa-clock-o"></i> <?php echo $value['date']; ?></a></div><br>
                                        <div><a href="#"> <?php echo $value['title']; ?></a></div>
                                    </div>
                                    <div class="review-body">
                                        <p><?php echo $value['content']; ?></p>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

</div>
<!-- /Product Details -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    
                </div>
                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">
                        <?php 
                        $sqlQuery = "select * from products  where view_count>5 limit 6";
                        $products = executeQuery($sqlQuery, true); ?>

                        <!-- Recently Viewed Item -->
                        <?php foreach ($products as $pro): ?>
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="./admin/images/img_pro/<?php echo $pro['feature_image'] ?>" alt="" /></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price"><del style="margin: 20px">$<?php echo number_format($pro['sale_price'], 0, '', ','); ?></del><a href=""style="color: black;font-size:15px">$<?php echo number_format($pro['price'], 0, '', ','); ?></a></div>
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
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
</body>

</html>

<?php include_once './_share/script.php'; ?>
<script>
    $("input[name='demo0']").TouchSpin({});
</script>
</body>


<!-- Mirrored from massive.markup.themebucket.net/shop-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:55:09 GMT -->
</html>
