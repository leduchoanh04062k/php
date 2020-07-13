<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

?>
<!DOCTYPE html>
<html class="anyflexbox boxshadow display-table">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Thanh toán đơn hàng</title>
    <style></style>
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/nprogress.css" rel="stylesheet" type="text/css">
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="styles/select2-min.css" rel="stylesheet" type="text/css">
    <link href="styles/checkout.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>

<body class="body--custom-background-color ">
    <div class="banner" data-header="">
        <div class="wrap">
            <div class="shop logo logo--left ">
                <h1 class="shop__name">
                    <a href="index.php">
                    </a>
                </h1>
            </div>
        </div>
    </div>
    <form method="POST" class="content stateful-form formCheckout">
        <div class="wrap" context="checkout">
            <div class="sidebar ">
                <div class="sidebar_header">
                  <?php 
                  $totalItemOnCart = 0;

                  if(isset($_SESSION[CART])){
                    $cart = $_SESSION[CART];
                    foreach ($cart as $item) {
                        $totalItemOnCart += $item['quantity'];
                    }
                }

                ?>
                <h2>
                    <label class="control-label">Đơn hàng (<span id="numberCartPay" ><?php echo $totalItemOnCart ?></span> sản phẩm)</label>
                </h2>
                <hr class="full_width">
            </div>
            <div class="sidebar__content">
                <div class="order-summary order-summary--product-list order-summary--is-collapsed">
                    <div class="summary-body summary-section summary-product">
                        <div class="summary-product-list">
                            <table class="product-table">
                                <tbody>
                                    <?php 
                                    $cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
                                    $totalPrice = 0;?>                          
                                    <?php foreach ($cart as $item): ?>
                                        <tr class="product product-has-image clearfix">
                                            <td>
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail__wrapper">
                                                       <img src="./admin/images/img_pro/<?php echo $item['feature_image'] ?>" class="product-thumbnail__image">
                                                   </div>
                                                   <span class="product-thumbnail__quantity" aria-hidden="true"><?php echo $item['quantity'] ;?></span>
                                               </div>
                                           </td>
                                           <td class="product-info">
                                            <span class="product-info-name">       
                                                <?php echo $item['name'] ;?>
                                            </span>
                                        </td>
                                        <td class="product-price text-right">
                                          $<?php 
                                          $itemTotal = $item['sale_price']*$item['quantity'];
                                          $totalPrice += $itemTotal;

                                          echo number_format($itemTotal, 0, '', ','); ?>
                                          
                                      </td>
                                  </tr>
                              <?php endforeach ?>
                          </tbody>
                      </table>
                     
                </div>
            </div>
        </div>

        <div class="order-summary order-summary--total-lines">
            <div class="summary-section border-top-none--mobile">
                <div class="total-line total-line-subtotal clearfix">
                    <span class="total-line-name pull-left">
                        Tạm tính
                    </span>
                    <span class="total-line-subprice pull-right" name="total_price">$<?php echo number_format($totalPrice, 0, '', ','); ?></span>
                </div>

                <div class="total-line total-line-total clearfix">
                    <span class="total-line-name pull-left">
                       Tổng cộng
                   </span>
                   <input type="hidden" name="total_price" id="totalPay" value="<?php echo $totalPrice;?>">
                   <span class="total-line-price pull-right">$<?php echo number_format($totalPrice, 0, '', ','); ?></span>
               </div>
           </div>
       </div>
       <div class="form-group clearfix hidden-sm hidden-xs">
        <div class="field__input-btn-wrapper mt10">
            <a class="previous-link" href="cart.php">
                <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
                <span>Quay về giỏ hàng</span>
            </a>

            <div class="form-group clearfix m0">
                <a><input class="btn btn-primary btn-checkout" data-loading-text="Đang xử lý" type="submit" value="ĐẶT HÀNG" name="save"></a>
            </div>
        </div>
    </div>
    <div class="form-group has-error">
        <div class="help-block ">
            <ul class="list-unstyled">
            </ul>
        </div>
    </div>
</div>
</div>
<div class="main" role="main">
    <div class="main_header">
        <div class="shop logo logo--left ">
            <h1 class="shop__name">
                <a href="index.php">

                </a>
            </h1>
        </div>
    </div>
    <div style="border-bottom: 1px solid #e1e1e1;" class="main_content">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="section">
                    <div class="section__header">
                        <div class="layout-flex layout-flex--wrap">
                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                <label class="control-label">Thông tin mua hàng</label>
                            </h2>
                        </div>
                    </div>
                    <div class="section__content">
                        <div class="form-group">
                            <div>
                                <p>Email xác nhận đơn hàng:</p>
                                    <input name="customer_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email"  value=""  class="field__input form-control" id="_email"  placeholder="Email" >
                            </div>
                        </div>
                        <div class="billing">
                            <div>
                                <div class="form-group">
                                    <p>Họ và tên người nhận:</p>
                                      <input name="customer_name" type="text" class="field__input form-control" id="_billing_address_last_name" data-error="Vui lòng nhập họ tên"  placeholder="Họ và tên">
                              </div>
                              <div class="form-group">
                                <p>Số điện thoại:</p>
                                  <input name="customer_phone_number" type="tel"  value="" class="field__input form-control" id="_billing_address_phone" data-error="Vui lòng nhập số điện thoại"  placeholder="Số điện thoại" >
                          </div>
                          <div class="form-group">
                            <p>Địa chỉ người nhận:</p>
                              <input name="address"  type="text" class="field__input form-control" id="_billing_address_address1"  placeholder="Địa chỉ">
                      
                      </div>
                      <div class="form-group">
                        <p>Ghi chú:</p>
                        <div>
                          <label class="field__input-wrapper" style="border: none"></label>
                          <textarea  name="message" class="field__input form-control m0" placeholder="Ghi chú"></textarea>
                          
                      </div>
                  </div>
              </div>
          </div>
          <?php 
          include './admin/db.php';
          if (isset($_POST['save'])) {
              $created_date=date('y-m-d');
              $total_price=$_POST['total_price'];
              $customer_name=$_POST['customer_name'];
              $customer_email=$_POST['customer_email'];
              $customer_phone_number=$_POST['customer_phone_number'];
              $address=$_POST['address'];
              $message=$_POST['message'];
              if ($created_date==""|| $total_price=="" || $customer_name=="" || $customer_email==""|| $customer_phone_number==""|| $address==""|| $message=="" ) {
                echo "bạn phải nhập đủ dữ liệu";
              }else{
              $sql="insert into orders values('','$total_price','$created_date','','$customer_name','$customer_email','$customer_phone_number','','$address','$message')";
              $kq=$conn->exec($sql);
              if ($kq==1) {
                echo "<script> location.href='ctorder.php?id_order=$id'; </script>";
            }else{
                echo "that bai";
            }
          }
        }
        ?> 
    </div>
</div>
</div>

<div class="section hidden-md hidden-lg">
    <div class="form-group clearfix m0">
     <button class="btn btn-primary btn-checkout" data-loading-text="Đang xử lý" type="submit" value="ĐẶT HÀNG"></button>
 </div>
 <div class="text-center mt20">
    <a class="previous-link" href="#">
        <span>Quay về giỏ hàng</span>
    </a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<script>
            function vouchersCode() {
                totalPay = $("#totalPay").val();
                code = $("#checkout_reduction_code").val();

                $.post('cart/checkVouchers.php', {
                    'code': code
                }, function(data) {
                    if (parseInt(totalPay) > '500000' && parseInt(totalPay) > parseInt(data)) {
                        if (data == 0) {
                            $(".code-no").text("Mã Voucher không tồn tại/hết hạn !");
                            $(".code-no").removeClass('hide');
                        } else {
                            $(".code-no").addClass('hide');
                            $(".code-yes").text('Bạn đã nhập mã voucher thành công !');
                            $(".code-yes").removeClass('hide');
                            kq = totalPay - data;
                            $(".total-line-price").text(kq.toLocaleString('it-IT', {
                                style: 'currency',
                                currency: 'VND'
                            }));
                            $(".total-line-shipping.clearfix").removeClass('hide');
                            priceVouchers = $(".total-line-shipping.pull-right").text((-data).toLocaleString('it-IT', {
                                style: 'currency',
                                currency: 'VND'
                            }));
                        }
                    } else {
                        $(".code-no").text("Mã Voucher chỉ áp dụng cho đơn hàng trên 500.000₫ !/ Giá trị đơn hàng phải lớn hơn giá trị voucher");
                        $(".code-no").removeClass('hide');
                    }


                });
            }
        </script>
    </body>

    </html>
    <?php
   ob_end_flush();
?>