<?php
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shop</title>
	<meta charset="utf-8">
	<!-- <base href="<?php echo BASE_URL . "public/"; ?>"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

</head>

<body>

	<div class="super_container">

		<!-- Header -->
		<?php include_once './_share/header.php'; ?>  


		<!-- Shop -->

		<div class="shop">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">

						<!-- Shop Sidebar -->
						<div class="shop_sidebar">
							<div class="sidebar_section">
								<div class="sidebar_title"><a href="apple.php">Categories</a></div>
								<?php 
								$conn=getConnect();
								$sql_cate="select * from categories where show_menu='0'";
								$kq_cate=$conn->query($sql_cate);
								foreach ($kq_cate as $key => $row) {
									?>
									<ul class="sidebar_categories">
										<li><a href="shop.php?cateId=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>

									</ul>
								<?php	}
								?>
							</div>
							<div class="sidebar_section filter_by_section">
								<div class="sidebar_title">Filter By</div>
								<div class="sidebar_subtitle">Price</div>
								<div class="filter_price">
									<div id="slider-range" class="slider_range"></div>
									<p>Range: </p>
									<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
								</div> 
							</div>


						</div>

					</div>

					<div class="col-lg-9">

						<!-- Shop Content -->

						<div class="shop_content">
							<div class="shop_bar clearfix">
								<?php 
								$categoryId = $_GET["cateId"];
								$conn=getConnect();
								$sql="select * from categories where id = $categoryId";
								$kq=$conn->query($sql);
								foreach ($kq as $key => $row) {
									?>
									<div class="shop_product_count"><?php echo $row["name"]; ?></div>
								<?php	}
								?>

								<div class="shop_sorting">
									<span>Sort by:</span>
									<ul>
										<li>
											<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
											<ul>
												<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
												<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
												<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>

							<div class="product_grid">
								<div class="product_grid_border"></div>

								<!-- Product Item -->
								<?php 
								$categoryId = $_GET["cateId"];
								$conn=getConnect();
								$sqlProduct = "select * from products where cate_id = $categoryId";
								$products=$conn->query($sqlProduct);

								foreach ($products as $key => $value) {
									?>

									<div class="product_item discount">
										<div class="product_border"></div>
										<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo getImage('img_pro', $value['feature_image']) ?>" alt=""></div>
										<div class="product_content">
											<div class="product_price">$<?php echo $value['price']; ?></div>
											<div class="product_name"><div><a href="<?php echo BASE_URL . "detail.php?id=" . $value['id'] ?>" tabindex="0"><?php echo $value['name'] ?></a></div></div>
										</div>

									</div>
									<?php
								}
								?>

								<!-- Product Item -->



								<!-- Shop Page Navigation -->


							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Recently Viewed -->

			
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
			<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
			<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
			<script src="plugins/parallax-js-master/parallax.min.js"></script>
			<script src="js/shop_custom.js"></script>
		</body>

		</html>