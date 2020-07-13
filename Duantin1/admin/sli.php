<?php ob_start();
      session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


  <title>ADMIN</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />


  <!-- PLUGINS CSS STYLE -->
  <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />

  
  
  <!-- No Extra plugin used -->
  
  
  
  <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  
  
  
  <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  
  
  <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" />
  
  

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />

  <!-- FAVICON -->
  <link href="assets/img/favicon.png" rel="shortcut icon" />

  

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
  
  <script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>

  
  <div id="toaster"></div>
  

  <div class="wrapper">
    <!-- Github Link -->
    <a href="https://github.com/tafcoder/sleek-dashboard" class="github-link">
      <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
        <defs>
          <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
            <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
          </linearGradient>
        </defs>
        <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
      </svg>
      <i class="mdi mdi-github-circle"></i>
    </a>

            <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="index.php">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">HTT</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li  class="has-sub active expand" >
                    <a class="sidenav-item-link" href="./index.php?view=home">
                      <span class="nav-text">Home</span>
                    </a>
                  </li>
                

                

                
                 
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
                      aria-expanded="false" aria-controls="components">
                      <span class="nav-text">Caretory</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="components"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="add_cate.php">
                                <span class="nav-text">ADD caretory</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="cate.php">
                                <span class="nav-text">Table caretory</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                      aria-expanded="false" aria-controls="icons">
                      <span class="nav-text">Products</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="icons"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="add_pro.php">
                                <span class="nav-text">ADD products</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="pro.php">
                                <span class="nav-text">Table product</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="order.php">
                      <span class="nav-text">Quản Lí Đơn Hàng</span>
                    </a>
                  </li>
                


                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="user.php" >
                      <span class="nav-text">Quản Lý Tài Khoản</span>
                    </a>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#maps"
                      aria-expanded="false" aria-controls="maps">
                      <span class="nav-text">Quản Lí Slider</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="maps"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="add_sli.php">
                                <span class="nav-text">Add Slider</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="sli.php">
                                <span class="nav-text">Table slider</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="comment.php">
                      <span class="nav-text">Quản Lí Bình Luận</span></b>
                    </a>
                  </li>
                
                   <li  class="has-sub" >
                    <a class="sidenav-item-link" href="contact.php">
                      <span class="nav-text">Quản Lí Contact</span></b>
                    </a>
                  </li>

                
              </ul>

            </div>

            <div class="sidebar-footer">
              <hr class="separator mb-0" />
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                  Cpu Uses <span class="float-right">40%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar active"
                    style="width: 40%;"
                    role="progressbar"
                  ></div>
                </div>
                <h6 class="text-uppercase">
                  Memory Uses <span class="float-right">65%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar progress-bar-warning"
                    style="width: 65%;"
                    role="progressbar"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </aside>


    <div class="page-wrapper">
                <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
          

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <li class="dropdown notifications-menu">
                    
                 
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <?php if (isset($_SESSION['name'])){ ?>
                         <span class="d-none d-lg-inline-block"><a href=""><?php echo $_SESSION['name']; ?></a></span>
                      <?php } ?>
                     <!--  <span class="d-none d-lg-inline-block">Admin</span> -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      

                      <li class="dropdown-footer">
                        <a href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>


      <div class="content-wrapper">
        <div class="content">            
                  <!-- Top Statistics -->
       <h2 style="color: black">Sildes</h2></a>     
  <table class="table table-bordered">
    <thead class="bg-primary">
      <tr>
        <th>id</th>
        <th>image</th>
        <th>status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
  </thead>
<?php 
      include 'db.php';
      $sql="select * from sliders";
      $kq=$conn->query($sql);
      foreach ($kq as $key => $row) {
        ?>
        <form action="slon.php" method="POST">
        <tr>
          <input type="hidden" value="<?php echo $row['id'] ?>" name="id" id="">
          <th><?php echo $key+1; ?></th>
               <td><img style="margin-left: 30px;width: 200px" src="images/img_sli/<?php echo $row['images']; ?>"></td>
                <th><input style="color: #0ae619" type="submit" name="status" value="<?php echo displayStatusForSlide($row['status']) ?>"></th>
                 </form>
          <th><a href="sua_sli.php?masua=<?php echo $row ['id']?>"><input type="submit" name=""
          value="Edit"></a></th>
      <th><a href="xoa_sli.php?maxoa=<?php echo $row ['id']?>"><input type="submit" name="" value="Delete" onclick="return confirm('ban co muon xoa k ?')" ></a></th>
        </tr>
     
      <?php }
       ?>
</table>
</div>
</div>
          
            
                <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                <a
                  class="text-primary"
                  href="http://www.iamabdus.com/"
                  target="_blank"
                  >Abdus</a
                >.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

    </div>
  </div>

  <script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/jekyll-search.min.js"></script>



<script src="assets/plugins/charts/Chart.min.js"></script>
  


<script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  


<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
  


<script src="assets/plugins/toastr/toastr.min.js"></script>
  


<script src="assets/js/sleek.bundle.js"></script>

</body>

</html>
<?php 
  function displayStatusForSlide($status){
    return $status ? 'ON' : 'OFF';
  }
 ?>