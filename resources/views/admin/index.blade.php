<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang quản trị</title>
    <!-- plugins:css -->
    
    <base href="{{asset('public')}}/">

    <link rel="stylesheet" href="assetsAdmin/vendors/mdi/css/materialdesignicons.min.css">
    <link href="maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="assetsAdmin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assetsAdmin/css/search.css">
    <!-- jQuery -->
    <script src="assets/javascripts/jquery.js"></script>
    <link rel="stylesheet" href="assets/stylesheets/jquery.dataTables.min.css">
    <!-- DataTables -->
    <script src="assets/javascripts/jquery.dataTables.min.js" defer></script>
    <style>
      .active_star{
          color: #ffc03f !important;
        }
    </style>
<!-- CKeditor -->
<script src="ckeditor/ckeditor.js"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assetsAdmin/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assetsAdmin/css/demo_2/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assetsAdmin/images/user-account.png" />
  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-12 fixed-top d-flex flex-row">
        <div class="text-center ">
        <!-- <a class="navbar-brand brand-logo" > -->
          <!-- <a class="navbar-brand brand-logo-mini" > -->
            <!-- </a> -->
        </div>
        <br>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          </button>
          <ul class="navbar-nav navbar-nav-right">
         
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text">{{Auth::user()->name}}</span>
                <img class="img-xs rounded-circle" src="assets/images/user/{{Auth::user()->image}}" alt="Profile image"> </a>
              
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
              <a class="dropdown-item mt-2" href="{{route('admin.get_info')}}"> Quản lý tài khoản </a>
              <a class="dropdown-item" href="{{route('admin.change_passwd')}}"> Thay đổi mật khẩu </a>
                <a class="dropdown-item" href="{{route('admin.Admin_Logout')}}">  Đăng xuất </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile not-navigation-link">
              <div class="nav-link">
                <div class="user-wrapper">
                  <div class="profile-image">
                  <!-- <img src="assets/images/user/{{Auth::user()->image}}" alt="profile image"> -->
                  </div>
                  <div class="text-wrapper">
                    <p><h2 style="font-weight: bold; margin-left: -50px; margin-top: 70px; margin-bottom: -40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Admin quản lý</h2></p>
                    <!-- <p class="profile-name">{{Auth::user()->name}}</p> -->
                    <ul class="nav navbar-nav">
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                          <!-- <small class="designation text-muted">Quản lý</small> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown" aria-labelledby="UsersettingsDropdown">
                          <a class="dropdown-item p-0">
                            <div class="d-flex border-bottom">
                              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                              </div>
                              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                              </div>
                              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                              </div>
                            </div>
                          </a>
                          <a class="dropdown-item mt-2" href="{{route('admin.get_info')}}"> Quản lý tài khoản </a>
                          <a class="dropdown-item" href="{{route('admin.change_passwd')}}"> Thay đổi mật khẩu </a>
                          <a class="dropdown-item" href="{{route('admin.Admin_Logout')}}" >  Đăng xuất </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
               
              </div>
            </li>
            <li class="nav-item @if (!Request::segment(2) && Request::segment(1) === 'admin')
                active
            @endif">
            <a class="nav-link" href="{{route('admin.home')}}">
                <i class="menu-icon mdi mdi-home"></i>
                <span class="menu-title">Quản lý đơn hàng</span>
              </a>
            </li>
            <li class="nav-item @if (Request::segment(1) === 'admin' && (Request::segment(2)=== 'blog' ||Request::segment(2)=== 'comment_blogs'))
                active
              @endif">

              <div class="collapse" id="resources-dropdown1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'blog')
                    active
                @endif" href="{{route('admin.list_blog')}}">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'comment_blogs')
                    active
                @endif"  href="{{route('admin.list_cmt')}}">Bình luận</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item @if (Request::segment(1) === 'admin' && (Request::segment(2)=== 'product' ||Request::segment(2)=== 'type_product' ||Request::segment(2)=== 'product_review'))
                active
              @endif">
              <a class="nav-link" data-toggle="collapse" href="#resources-dropdowns" aria-expanded="false" aria-controls="resources-dropdowns">
                <i class="menu-icon mdi mdi-texture"></i>
                <span class="menu-title">Quản lý sản phẩm</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="resources-dropdowns">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'product')
                    active
                @endif" href="{{route('admin.list_product')}}">Danh sách sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'type_product')
                    active
                @endif" href="{{route('admin.list_type_product')}}">Loại sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'product_review')
                    active
                @endif" href="{{route('admin.list_review')}}">Đánh giá sản phẩm</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item @if (Request::segment(1) === 'admin' && (Request::segment(2)=== 'size' ||Request::segment(2)=== 'topping'))
            active
          @endif">
              <a class="nav-link" data-toggle="collapse" href="#resources-dropdownss" aria-expanded="false" aria-controls="resources-dropdownss">
                <i class="menu-icon mdi mdi-lightbulb-outline"></i>
                <span class="menu-title">Quản lý thêm</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="resources-dropdownss">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'size')
                    active
                @endif" href="{{route('admin.list_size')}}">Danh sách size</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === 'admin' && Request::segment(2) === 'topping')
                    active
                @endif" href="{{route('admin.list_topping')}}">Danh sách topping</a>
                  </li>
                 
                </ul>
              </div>
            </li>
            <li class="nav-item @if (Request::segment(1) === 'admin' && (Request::segment(2)=== 'about' ||Request::segment(2)=== 'our_team'))
            active
          @endif">
          <a class="nav-link " href="{{route('admin.list_contact')}}">
                <i class="menu-icon mdi mdi-contacts"></i>
                <span class="menu-title">Phản hồi liên hệ</span>
              </a>
            </li>
            
            <li class="nav-item @if (Request::segment(1) === 'admin' && Request::segment(2) === 'contact_info')
            active
        @endif">
            <a class="nav-link" href="{{route('admin.Admin_Logout')}}">
                <i class="menu-icon mdi mdi-code-brackets"></i>
                <span class="menu-title">Đăng xuất</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('mainContent')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2023. All rights reserved.</span>
              </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
     
    <!-- plugins:js -->
    <script src="assetsAdmin/vendors/js/vendor.bundle.base.js"></script>

    
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assetsAdmin/vendors/chart.js/Chart.min.js"></script>
    <script src="assetsAdmin/vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assetsAdmin/js/shared/off-canvas.js"></script>
    <script src="assetsAdmin/js/shared/hoverable-collapse.js"></script>
    {{-- <script src="assetsAdmin/js/shared/misc.js"></script> --}}
    <script src="assetsAdmin/js/shared/settings.js"></script>
    <script src="assetsAdmin/js/shared/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assetsAdmin/js/demo_2/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script>
      function active(i) {
        // for (let index = 1; index < 5; index++) {
        //   $('.at_'+index).classList.remove('active');
        // }
       
        $('.at_'+i).removeClass('active');
      }
    </script>
   
  </body>

</html>