
<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

$cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
$totalPrice = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">

</head>

<body>

	<div class="super_container">
		
		<!-- Header -->
		
		<?php include_once './_share/header.php'; ?>  
		<!-- Cart -->
		
		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="cart_container">
							<div class="cart_title">Shopping Cart</div>
							<div class="cart_items">
								<?php foreach ($cart as $item): ?>
									<ul class="cart_list">

										<li class="cart_item clearfix">
											<div class="cart_item_image">
												<img src="./admin/images/img_pro/<?php echo $item['feature_image'] ?>" alt=""></div>
												<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
													<div class="cart_item_name cart_info_col">
														<div class="cart_item_title">Name</div>
														<div class="cart_item_text"><?php echo $item['name'] ?></div>
													</div>
													
													<div class="cart_item_quantity cart_info_col">
														<div class="cart_item_title">Quantity</div>
														<div class="cart_item_text"><?php echo $item['quantity'] ?></div>

													</div>
													<div class="cart_item_price cart_info_col">
														<div class="cart_item_title">Price</div>
														<div class="cart_item_text">$<?php echo number_format($item['sale_price'], 0, '', ','); ?></div>
													</div>
													<div class="cart_item_total cart_info_col">
														<div class="cart_item_title">Total</div>
														<div class="cart_item_text">
															$<?php 
															$itemTotal = $item['sale_price']*$item['quantity'];
															$totalPrice += $itemTotal;

															echo number_format($itemTotal, 0, '', ','); ?>
															
														</div>
													</div>
													<div class="cart_item_price cart_info_col">
														<div class="cart_item_title">Xóa</div>
														<a href="<?php echo "deleteCart.php?id=".$item["id"] ?>"><div class="cart_item_text"><i class="fas fa-trash-alt"></i></div></a>
													</div>
												</li>
											</ul>
										<?php endforeach ?>
									</div>
									
									
									<!-- Order Total -->
									<div class="order_total">
										<div class="order_total_content text-md-right">
											<div class="order_total_title">Order Total:</div>
											<div class="order_total_amount">$
												<?php echo number_format($totalPrice, 0, '', ','); ?> 
											</div>
										</div>
										<div class="cart_buttons">
											<button type="button" class="button cart_button_clear">Add to Cart</button>
											<a href="order.php"><button type="button" class="button cart_button_checkout">Buy now</button></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
	<!-- Newsletter -->


	<!-- Footer -->

	<footer class="footer" style="background: #ede6e6">
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
	<script src="plugins/easing/easing.js"></script>
	<script src="js/cart_custom.js"></script>
	<input type="hidden" id="total-price" value="<?php echo $totalPrice ?>">
	<script>
		$("input[name='demo0']").TouchSpin({});

		var buttonApplyVoucher = document.querySelector(".btn-voucher");
		buttonApplyVoucher.onclick = function(){
			var voucherCode = document.querySelector('.voucher-code-input').value;

			var url = "<?php echo BASE_URL ?>checkVoucherCode.php?code=" + voucherCode;
			fetch(url, {method: 'GET'})
			.then((resp) => resp.json())
			.then(function(data){
				if(data == null){
					alert('Mã Voucher không tồn tại/hết hạn');
				}else{
					var totalPrice = document.querySelector('#total-price').value;
					totalPrice = parseInt(totalPrice)-parseInt(data.discount_price);
					totalPrice = totalPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
					document.querySelector('.cart-total').innerText = totalPrice;

				}
			});

		}
	</script>
</body>

</html>