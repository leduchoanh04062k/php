<?php
ob_start(); 
session_start();
require_once './commons/constants.php';
require_once './commons/helpers.php';
require_once './commons/db.php' ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include_once './_share/header.php'; ?>  

		<!-- Contact Info -->

		<div class="contact_info">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

							<!-- Contact Item -->
							<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
								<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
								<div class="contact_info_content">
									<div class="contact_info_title">Phone</div>
									<div class="contact_info_text">+38 068 005 3570</div>
								</div>
							</div>

							<!-- Contact Item -->
							<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
								<div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
								<div class="contact_info_content">
									<div class="contact_info_title">Email</div>
									<div class="contact_info_text">fastsales@gmail.com</div>
								</div>
							</div>

							<!-- Contact Item -->
							<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
								<div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
								<div class="contact_info_content">
									<div class="contact_info_title">Address</div>
									<div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Contact Form -->

		<div class="contact_form">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="contact_form_container">
							<div class="contact_form_title">Get in Touch</div>

							<form action="#" id="contact_form" id="form" method="POST">
								<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
									<input type="text"  class="contact_form_name input_field" value='' required name="name" placeholder="Your name">
									<input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value='' required class="input-control" name="email">
									<input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number" value=""  required class="input-control" name="phone">
								</div>
								<div class="contact_form_text">
									<textarea id="contact_form_message" class="text_field contact_form_message"  rows="4"  required="required" data-error="Please, write us a message"name="content" placeholder="Nội dung*" class="input-control" cols="5" rows="4" required ></textarea>
								</div>
								<div class="contact_form_button"><br>
									<button type="submit" name="save">Gửi liên hệ</button>

								</div>
								<?php 
								include './admin/db.php';
								if (isset($_POST['save'])){
									$name=$_POST['name'];
									$phone=$_POST['phone'];
									$email=$_POST['email'];
									$content=$_POST['content'];
									$sql="insert into contacts value('','$name','$phone','$email','$content','')";
          //var_dump($sql);
									$kq=$conn->exec($sql);

									if ($kq==1) {
										echo "<script> alert('Gửi liên hệ thành công !');</script>";
								}else{
									echo "that bai";
								}
							}
							?> 
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">OneTech</a></div>
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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="js/contact_custom.js"></script>
</body>

</html>