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
            
            <li class="right-sidebar-in right-sidebar-2-menu">
              <i class="mdi mdi-settings"></i>
            </li>
            <!-- User Account -->
            <li class="dropdown user-menu">
              <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <img src="assets/img/user/user.png" class="user-image" alt="User Image" />
                <span class="d-none d-lg-inline-block">Abdus Salam</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <!-- User image -->
                <li class="dropdown-header">
                  <img src="assets/img/user/user.png" class="img-circle" alt="User Image" />
                  <div class="d-inline-block">
                    Abdus Salam <small class="pt-1">iamabdus@gmail.com</small>
                  </div>
                </li>


                <li class="dropdown-footer">
                  <a href="index.html"> <i class="mdi mdi-logout"></i> Log Out </a>
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
        <div class="row">
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">
                <h2 class="mb-1">71,503</h2>
                <p>Online Signups</p>
                <div class="chartjs-wrapper">
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini  mb-4">
              <div class="card-body">
                <h2 class="mb-1">9,503</h2>
                <p>New Visitors Today</p>
                <div class="chartjs-wrapper">
                  <canvas id="dual-line"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">
                <h2 class="mb-1">71,503</h2>
                <p>Monthly Total Order</p>
                <div class="chartjs-wrapper">
                  <canvas id="area-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">
                <h2 class="mb-1">9,503</h2>
                <p>Total Revenue This Year</p>
                <div class="chartjs-wrapper">
                  <canvas id="line"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
         <div class="col-xl-8 col-md-12">
          <!-- Sales Graph -->
          <div class="card card-default" data-scroll-height="675">
            <div class="card-header">
              <h2>Sales Of The Year</h2>
            </div>
            <div class="card-body">
              <canvas id="linechart" class="chartjs"></canvas>
            </div>
            <div class="card-footer d-flex flex-wrap bg-white p-0">
              <div class="col-6 px-0">
                <div class="text-center p-4">
                  <h4>$6,308</h4>
                  <p class="mt-2">Total orders of this year</p>
                </div>
              </div>
              <div class="col-6 px-0">
                <div class="text-center p-4 border-left">
                  <h4>$70,506</h4>
                  <p class="mt-2">Total revenue of this year</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-12">
          <!-- Doughnut Chart -->
          <div class="card card-default" data-scroll-height="675">
            <div class="card-header justify-content-center">
              <h2>Orders Overview</h2>
            </div>
            <div class="card-body" >
              <canvas id="doChart" ></canvas>
            </div>
            <a href="#" class="pb-5 d-block text-center text-muted"><i class="mdi mdi-download mr-2"></i> Download overall report</a>
            <div class="card-footer d-flex flex-wrap bg-white p-0">
              <div class="col-6">
                <div class="py-4 px-4">
                  <ul class="d-flex flex-column justify-content-between">
                    <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #4c84ff"></i>Order Completed</li>
                    <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #80e1c1 "></i>Order Unpaid</li>
                  </ul>
                </div>
              </div>
              <div class="col-6 border-left">
                <div class="py-4 px-4 ">
                  <ul class="d-flex flex-column justify-content-between">
                    <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #8061ef"></i>Order Pending</li>
                    <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #ffa128"></i>Order Canceled</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
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