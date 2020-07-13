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
<!--   <base href="<?php echo PUBLIC_URL ?>">
  <base href="<?php echo BASE_URL . "public/"; ?>"> -->
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
  <link rel="stylesheet" href="styles/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

  <div class="super_container" >

    <!-- Header -->

    <!-- Header -->
    <?php include_once './_share/header.php'; ?>  

  </div>
  <div class="container-fluid" >
    <div class="row">
      <div class="col-sm-3">
        <h2>Dang ki</h2>
      </div>  
      <div class="col-sm-5">
        <form action="" method="POST"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">User name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">RePassword</label>
            <input type="password" class="form-control" name="repass">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" name="address">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Avatar</label>
            <input type="file" class="form-control" name="images">
          </div>
          <input type="submit" name="luu" value="Dang nhap">
        </form>
        <?php
        if (isset($_POST['luu'])) {
          $name=$_POST['name'];
          $password=sha1($_POST['password']);
          $repass=sha1($_POST['repass']);
          $address=$_POST['address'];

          $nameA=$_FILES['images']['name'];
          $tmpA=$_FILES['images']['tmp_name'];

          move_uploaded_file($tmpA, 'admin/images/img_user'.$nameA);
          $conn = getConnect();
          if ($password==""|| $repass=="" || $name=="" || $address==""|| $nameA=="" ) {
            echo "bạn phải nhập đủ dữ liệu";
          }else if ($password != $repass) {
            echo "Pas nhập lại sai";
          }else{
            $sql="insert into users values('','$name','$password','$address','$nameA','','')";
            $kq=$conn->exec($sql);
            if ($kq==1) {
              echo "thanh cong";
            }else{
              echo " that bai";
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
  <hr> 
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