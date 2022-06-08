<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kemenkeu | @yield('title')</title>  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">    
  <link rel="stylesheet" href="{{ asset('css/font-awesome/all.min.css') }}">
  <script src="https://kit.fontawesome.com/f1223f01a6.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>dw
  <link rel="stylesheet" href="{{ asset('css/overlayScrollbars/OverlayScrollbars.min.css') }}">   
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">          
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">  
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>      
      </ul>      
      <ul class="navbar-nav ml-auto">                        
        <li class="nav-item">
          <a class="nav-link" href="/">
            SinDu
          </a>
        </li>
      </ul>
    </nav>    
    <aside class="main-sidebar sidebar-dark-primary bg-indigo elevation-4">    
      <div class="sidebar">      
        <div class="text-center mt-4">
          <img src="{{ asset('image/profil/'. Auth::user()->foto_profile) }}" class="img-circle elevation-2" alt="User Image" style="max-width:100px; max-height:100px;">
          <a href="#" class="d-block mt-2" style="font-size:13px; color:white; font-weight:bold;">{{ Auth::user()->name }}</a>
          <a href="#" class="d-block" style="font-size:11px; color:white; font-weight:lighter;">{{ Auth::user()->level }}</a>
        </div>      
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >                
            @if(Auth::user()->level == "relawan")
            <li class="nav-item">
              <a href="{{ route('relawan.index') }}" class="nav-link {{ request()->route()->getName() === 'relawan.index' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>     
            <li class="nav-item">
              <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Profil</p>
              </a>
            </li>  
            <li class="nav-item">
              <a href="../relawan/mendaftar" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Jadi Relawan</p>
              </a>
            </li>             
            <li class="nav-item">
              <a href="{{ route('relawan.show.materi') }}" class="nav-link {{ request()->route()->getName() === 'relawan.show.materi' || 
                request()->route()->getName() === 'relawan.tambah.materi' ||
                request()->route()->getName() === 'relawan.edit.materi' || 
                request()->route()->getName() === 'relawan.cari.materi' ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>Materi</p>
              </a>
            </li> 
            @elseif(Auth::user()->level == "admin")
            <li class="nav-item">
              <a href="{{ route('admin.index') }}" class="nav-link {{ request()->route()->getName() === 'admin.index' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Profil</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>                
                <p>Akun Relawan</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('admin.show.verifikasi.materi') }}" class="nav-link {{ request()->route()->getName() === 'admin.show.verifikasi.materi' || 
                request()->route()->getName() === 'admin.cari.verifikasi.materi' ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-open"></i>                
                <p>Verifikasi Materi</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('admin.show.donasi') }}" class="nav-link {{ request()->route()->getName() === 'admin.show.donasi' ||
                request()->route()->getName() === 'admin.cari.donasi' ? 'active' : '' }}">
                <i class="nav-icon fas fa-donate"></i>                
                <p>Donasi</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('admin.show.testimoni') }}" class="nav-link {{ request()->route()->getName() === 'admin.show.testimoni' ||
                request()->route()->getName() === 'admin.cari.testimoni' ? 'active' : '' }}">
                <i class="nav-icon fas fa-comment-alt"></i>
                <p>Testimoni</p>                                            
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('admin.show.verifikasi.pengajuan') }}" class="nav-link">
                <i class="nav-icon fas fa-hands-helping"></i>
                <p>Pengajuan Relawan</p>                
              </a>
            </li> 
            @endif                                    
            <li class="nav-header"><hr style="border-top:1px solid white;"></li>                                                                                                             
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form> 
            </li> 
          </ul>
        </nav>        
      </div>
    </aside>    
    <div class="content-wrapper">  
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('title-page')</h1>
            </div>          
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container">
          @yield('content')  
        </div>        
      </section>    
    </div>      
  </div>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('/js/demo.js') }}"></script>
<script src="{{ asset('/js/bs-custom-file-input.min.js') }}"></script>
@yield('add_ck-editor')
@yield('input-file')
<script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.js" integrity="sha256-0Nkb10Hnhm4EJZ0QDpvInc3bRp77wQIbIQmWYH3Y7Vw=" crossorigin="anonymous"></script>
</script>
</body>

</html>