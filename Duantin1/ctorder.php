<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shop name - Thanh toán đơn hàng">

    <title>HTT</title>


    <link rel="shortcut icon" href="https://oh-me-va-be.bizwebvietnam.net/favicon.ico" type="image/x-icon">


    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="styles/thankyou.css" rel="stylesheet" type="text/css">


    <style>
        #map {
            width: 100%;
            height: 245px;
        }
        
        .hidden-map {
            display: none;
        }
    </style>


    <script type="text/javascript" charset="UTF-8" src="styles/common.js.tải xuống"></script>
    <script type="text/javascript" charset="UTF-8" src="styles/util.js.tải xuống"></script>
    <script type="text/javascript" charset="UTF-8" src="styles/map.js.tải xuống"></script>
    <script type="text/javascript" charset="UTF-8" src="styles/marker.js.tải xuống"></script>
    <script type="text/javascript" charset="UTF-8" src="styles/onion.js.tải xuống"></script>
    <script type="text/javascript" charset="UTF-8" src="styles/controls.js.tải xuống"></script>
</head>

<body class="body--custom-background-color ">

    <div context="checkout" define="{checkout: new Bizweb.StoreCheckout(this,{})}" class="container">
        <div class="header">
            <div class="wrap">
                <div class="shop logo logo--left ">

                    <h1 class="shop__name">
                        <a href="index.php">
                        </a>
                    </h1>

                </div>
            </div>
        </div>
        <div class="main">
            <div class="wrap clearfix">
                <div class="row thankyou-infos">
                    <div class="col-md-7 thankyou-message">
                        <div class="thankyou-message-icon unprint">
                            <div class="icon icon--order-success svg">
                                    <g fill="none" stroke="#8EC343" stroke-width="2">
                                        <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                        <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="thankyou-message-text">
                            <h3>Cảm ơn bạn đã đặt hàng</h3>
                            <p>

                                Một email xác nhận đã được gửi tới. Xin vui lòng kiểm tra email của bạn

                            </p>
                            <div style="font-style: italic;">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 order-info">
                        <div class="order-summary order-summary--custom-background-color ">
                          <?php 
                          $totalItemOnCart = 0;

                          if(isset($_SESSION[CART])){
                            $cart = $_SESSION[CART];
                            foreach ($cart as $item) {
                                $totalItemOnCart += $item['quantity'];
                            }
                        }

                        ?>
                        <div class="order-summary-header summary-header--thin summary-header--border">
                            <h2>
                                <label class="control-label">Đơn hàng có (<span id="numberCartPay" ><?php echo $totalItemOnCart ?></span> sản phẩm)</label>
                            </h2>
                            <a class="underline-none expandable expandable--pull-right mobile unprint" bind-event-click="toggle(this, &#39;.order-items&#39;)" bind-class="{open: order_expand}" href="javascript:void(0)">
                                Xem chi tiết
                            </a>
                        </div>
                        <div class="order-items mobile--is-collapsed">
                            <div class="summary-body summary-section summary-product">
                                <div class="summary-product-list">
                                    <?php 
                                    $cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
                                    $totalPrice = 0;?>                          
                                    <?php foreach ($cart as $item): ?>
                                        <ul class="product-list">   
                                            <li class="product product-has-image clearfix">
                                                <div class="product-thumbnail pull-left">
                                                    <div class="product-thumbnail__wrapper">

                                                     <img src="./admin/images/img_pro/<?php echo $item['feature_image'] ?>" class="product-thumbnail__image">

                                                 </div>
                                                 <span class="product-thumbnail__quantity unprint" aria-hidden="true"><?php echo $item['quantity'] ;?></span>
                                             </div>
                                             <div class="product-info pull-left">
                                                <span class="product-info-name">
                                                    <strong><?php echo $item['name']; ?></strong>
                                                    <label class="print">x<?php echo $quantity; ?></label>
                                                </span>


                                            </div>
                                            <strong class="product-price pull-right">
                                               $<?php 
                                               $itemTotal = $item['sale_price']*$item['quantity'];
                                               $totalPrice += $itemTotal;

                                               echo number_format($itemTotal, 0, '', ','); ?>

                                           </strong>
                                       </li>
                                   <?php endforeach ?>
                               </ul>
                           </div>
                       </div>
                   </div>

                   <div class="summary-section  border-top-none--mobile ">
                    <div class="total-line total-line-subtotal clearfix">
                        <span class="total-line-name pull-left">
                            Tạm tính
                        </span>
                        <span class="total-line-subprice pull-right">
                          $<?php echo number_format($totalPrice, 0, '', ','); ?>
                      </span>
                  </div>

              </div>
              <div class="summary-section">
                <div class="total-line total-line-total clearfix">
                    <span class="total-line-name total-line-name--bold pull-left">
                        Tổng cộng 
                    </span>
                    <span class="total-line-price pull-right">
                     $<?php echo number_format($totalPrice, 0, '', ','); ?>
                 </span>
             </div>
         </div>
     </div>
 </div>
 <div class="col-md-7 col-sm-12 customer-info">

    <div class="shipping-info">
        <div class="row">
         <?php 
         include './admin/db.php';
         $sql="select * from orders";
         $kq=$conn->query($sql);
         foreach ($kq as $key => $row) {
            ?>  <div class="col-md-6 col-sm-6">
                <div class="order-summary order-summary--white no-border no-padding-top">
                    <div class="order-summary-header">
                        <h2>
                            <label class="control-label">Thông tin nhận hàng</label>
                        </h2>
                    </div>
                    <div class="summary-section no-border no-padding-top">
                        <p class="address-name">
                            <?php echo $row['customer_name']; ?>
                        </p>
                        <p class="address-address">
                            <?php echo $row['customer_phone_number']; ?>
                        </p>

                        <p class="address-ward">
                            <?php echo $row['customer_email']; ?>
                        </p>
                        <p class="address-ward">
                            <?php echo $row['address']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="order-summary order-summary--white no-border">
                    <div class="order-summary-header">
                        <h2>
                            <label class="control-label">Hình thức thanh toán</label>
                        </h2>
                    </div>
                    <div class="summary-section no-border no-padding-top">
                        <span>Thanh toán khi giao hàng </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="order-summary order-summary--white no-border">
                    <div class="order-summary-header">
                        <h2>
                            <label class="control-label">Hình thức vận chuyển</label>
                        </h2>
                    </div>
                    <div class="summary-section no-border no-padding-top">


                        <span>Thanh toán khi giao hàng </span>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="order-success unprint">
        <a href="index.php" class="btn btn-primary">
            Tiếp tục mua hàng
        </a>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
<script src="styles/jquery-2.1.3.min.js.tải xuống" type="text/javascript"></script>
<script src="styles/bootstrap.min.js.tải xuống" type="text/javascript"></script>
<script src="styles/twine.min.js.tải xuống" type="text/javascript"></script>
<script src="styles/checkout.js.tải xuống" type="text/javascript"></script>
<!--<script src="https://bizweb.dktcdn.net/100/000/001/themes/544642/assets/checkout.js?15168730444422222" type='text/javascript'></script>-->
<script src="styles/thankyou.js.tải xuống" type="text/javascript"></script>




</body>

</html>