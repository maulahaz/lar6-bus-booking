<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/t_material_dashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/t_material_dashboard/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ $title }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/t_material_dashboard/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/t_material_dashboard/assets/demo/demo.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <div class="main-panel">
      <div class="content">
        
        @include('shared.msgbox', ['errors'=>$errors])

        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">User ID</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                
                @error('username')
                  <small style="color:red">{{ $message }}</small>
                @enderror

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Password</label>
                <input type="password" class="form-control" name="password">
                
                @error('password')
                  <small style="color:red">{{ $message }}</small>
                @enderror

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
          </div>
          </div>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="/t_material_dashboard/assets/js/core/jquery.min.js" ></script>
  <script src="/t_material_dashboard/assets/js/core/popper.min.js"></script>
  <script src="/t_material_dashboard/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="/t_material_dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="/t_material_dashboard/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="/t_material_dashboard/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="/t_material_dashboard/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="/t_material_dashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/t_material_dashboard/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/t_material_dashboard/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="/t_material_dashboard/assets/demo/demo.js"></script>
</body>

</html>