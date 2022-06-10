<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kemenkeu | @yield('title')</title>  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">    
    <link rel="stylesheet" href="{{ asset('css/font-awesome/all.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/overlayScrollbars/OverlayScrollbars.min.css') }}">   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">          
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">          
    <script src="https://kit.fontawesome.com/f684a39365.js" crossorigin="anonymous"></script>
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
            Kemenkeu
          </a>
        </li>
      </ul>
    </nav>    
    <aside class="main-sidebar sidebar-dark-primary bg-kmk elevation-4">    
      <div class="sidebar">      
        <div class="text-center mt-4">
          <img src="{{ asset('image/profil/'. Auth::user()->foto_profile) }}" class="img-circle elevation-2" alt="User Image" style="max-width:100px; max-height:100px;">
          <a href="#" class="d-block mt-2" style="font-size:13px; color:white; font-weight:bold;">{{ Auth::user()->name }}</a>
          <a href="#" class="d-block" style="font-size:11px; color:white; font-weight:lighter;">{{ Auth::user()->level }}</a>
        </div>      
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >                
            @if(Auth::user()->role == "user")
            <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link {{ request()->route()->getName() === 'user.index' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>     
            <li class="nav-item">
              <a href="{{ route('user.profile') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>Profil</p>
              </a>
            </li>  
            <li class="nav-item">
              <a href="{{ route('kebijakan.index') }}" class="nav-link {{ request()->route()->getName() === 'kebijakan.index' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-book-open"></i>
                <p>Kebijakan</p>
              </a>
            </li>             
            <li class="nav-item">
              <a href=" {{ route('perizinan.index') }}" class="nav-link {{ request()->route()->getName() === 'perizinan.index' ||
                request()->route()->getName() === 'perizinan.cari' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-file-lines"></i>                
                <p>Perizinan</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('st.index') }}" class="nav-link {{ request()->route()->getName() === 'st.index' ||
                request()->route()->getName() === 'st.index' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-laptop-file"></i>
                <p>Surat Tugas</p>                                            
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('sanksi.index') }}" class="nav-link {{ request()->route()->getName() === 'sanksi.index' ||
                request()->route()->getName() === 'sanksi.index' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-gavel"></i>
                <p>Sanksi</p>                                            
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
              <a href="{{ route('admin.show.kebijakan') }}" class="nav-link {{ request()->route()->getName() === 'admin.show.kebijakan' || 
                request()->route()->getName() === 'admin.cari.kebijakan' ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-open"></i>                
                <p>Kebijakan</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href=" {{ route('admin.show.perizinan') }}" class="nav-link {{ request()->route()->getName() === 'admin.show.perizinan' ||
                request()->route()->getName() === 'admin.cari.perizinan' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-file-lines"></i>                
                <p>Perizinan</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('st.index') }}" class="nav-link {{ request()->route()->getName() === 'st.index' ||
                request()->route()->getName() === 'admin.cari.surat-tugas' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-laptop-file"></i>
                <p>Surat Tugas</p>                                            
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('admin.show.sanksi') }}" class="nav-link {{ request()->route()->getName() === 'admin.show.sanksi' ||
                request()->route()->getName() === 'admin.cari.sanksi' ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-gavel"></i>
                <p>Sanksi</p>                                            
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