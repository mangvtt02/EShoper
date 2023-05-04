
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('public')}}/">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assetsAdmin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assetsAdmin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assetsAdmin/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assetsAdmin/images/user-account.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                @if (count($errors)>0)
<div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $er)
      {{$er}}<br>
  @endforeach
</div>
@endif

{{-- success --}}

@if (session('error'))
<div class="alert alert-danger" role="alert">
  {{session('error')}}
</div>
@endif
<form action="{{route('Post_Admin_Login')}}" method="POST">
    @csrf
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" placeholder="Email" name="email" value="mp753114@gmail.com">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Mật khẩu</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="*********" name="password" value="1">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <input class="btn btn-primary submit-btn btn-block" type="submit" value="Đăng nhập">
                    </input>
                  </div>
                  
                  
                 
                </form>
              </div>
              
             
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assetsAdmin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assetsAdmin/js/shared/off-canvas.js"></script>
    <script src="assetsAdmin/js/shared/hoverable-collapse.js"></script>
    <script src="assetsAdmin/js/shared/misc.js"></script>
    <script src="assetsAdmin/js/shared/settings.js"></script>
    <script src="assetsAdmin/js/shared/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>