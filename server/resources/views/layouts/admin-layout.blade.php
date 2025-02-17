<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema Dashboard</title>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">


  <link rel="stylesheet" href="{{asset('/storage/admin_assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome CSS-->
  <!-- <link rel="stylesheet" href="{{asset('/storage/fontawesome/css/all.css')}}"> -->
  <!-- orion icons-->
  <link rel="stylesheet" href="{{asset('/storage/admin_assets/css/orionicons.css')}}">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{asset('/storage/admin_assets/css/style.default.css')}}" id="theme-stylesheet">
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="{{asset('/storage/admin_assets/css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('/storage/admin_assets/css/style.css')}}">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Favicon-->
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
      <div class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead" style="cursor: pointer;"><i class="fas fa-align-left"></i></div><a href="{{route('admin.home')}}" class="navbar-brand font-weight-bold text-uppercase text-base">ADMIN Dashboard</a>
      <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
        <li class="nav-item">
          <form id="searchForm" class="ml-auto d-none d-lg-block">
            <div class="form-group position-relative mb-0">
              <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
              <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
            </div>
          </form>
        </li>

        @if (Auth::check())
        <li class="nav-item dropdown ml-auto"><a id="userInfo" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="http://dmrmechanical.com/wp-content/uploads/2018/01/avatar-1577909_640-300x300.png" alt="" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
          <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{Auth::user()->full_name}}</strong></a>
            <div class=" dropdown-divider">
            </div><a href="./" class="dropdown-item">Trang chủ</a>
            <div class="dropdown-divider"></div><a href="../" class="dropdown-item">Logout</a>
          </div>
        </li>
        @endif

      </ul>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar py-3">
      <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">QUẢN LÝ</div>
      <ul class="sidebar-menu list-unstyled">
        <li class="sidebar-list-item"><a href="/admin" class="sidebar-link text-dark"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/cinema" class="sidebar-link text-dark"><i class="o-survey-1 mr-3 text-gray"></i><span>Quản Lý Rạp</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/film" class="sidebar-link text-dark"><i class="fas fa-film mr-3 text-gray"></i><span>Quản Lý Phim</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/screening" class="sidebar-link text-dark"><i class="fas fa-calendar-week mr-3 text-gray"></i><span>Quản Lý Lịch Chiếu</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/ticket" class="sidebar-link text-dark"><i class="fas fa-ticket-alt mr-3 text-gray"></i><span>Quản Lý Vé</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/room" class="sidebar-link text-dark"><i class="fab fa-windows mr-3 text-gray"></i><span>Quản Lý Phòng</span></a></li>
        <li class="sidebar-list-item"><a href="" class="sidebar-link text-dark"><i class="fas fa-couch mr-3 text-gray"></i><span>Quản Lý Ghế</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/combo" class="sidebar-link text-dark"><i class="fal fa-popcorn mr-3 text-gray"></i><span>Quản Lý Sản phẩm</span></a></li>  
        <li class="sidebar-list-item"><a href="/admin/member" class="sidebar-link text-dark"><i class="fas fa-user-friends mr-3 text-gray"></i><span>Quản Lý Thành viên</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/staff" class="sidebar-link text-dark"><i class="fad fa-user-friends mr-3 text-gray"></i><span>Quản Lý Nhân viên</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/advertisement" class="sidebar-link text-dark"><i class="fas fa-ad mr-3 text-gray"></i><span>Quảng cáo</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/revenue" class="sidebar-link text-dark"><i class="far fa-money-bill-alt mr-3 text-gray"></i><span>Doanh thu</span></a></li>
        <li class="sidebar-list-item"><a href="/admin/ticket-price" class="sidebar-link text-dark"><i class="fas fa-file-invoice-dollar mr-3 text-gray"></i><span>Quản lý Giá vé</span></a></li>

      </ul>

    </div>

    @yield('admin-content')
  </div>



  <script src="{{asset('/storage/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('/storage/ckfinder/ckfinder.js')}}"></script>


  <!-- <script src="{{asset('/storage/admin_assets/vendor/jquery/jquery.min.js')}}"></script> -->
  <!-- <script src="{{asset('/storage/admin_assets/vendor/popper.js/umd/popper.min.js')}}"> </script> -->
  <script src="{{asset('/storage/admin_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- <script src="{{asset('/storage/admin_assets/vendor/jquery.cookie/jquery.cookie.js')}}"> </script> -->
  <!-- {{-- <script src="{{asset('/storage/admin_assets/vendor/chart.js/Chart.min.js')}}"></script> --}} -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <script src="{{asset('/storage/admin_assets/js/charts-home.js')}}"></script>
  <script src="{{asset('/storage/admin_assets/js/front.js')}}"></script>
  <script src="{{asset('/storage/js/adminjs.js')}}"></script> -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>