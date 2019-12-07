
@include('includes.header')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- login , logout  -->

        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div id="dorp" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item dropdown-menu-right" href="/admin">Dashboard</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>



    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url("/")}}" class="brand-link">
            <!--
            <img src="{{asset("adminlte/img/AdminLTELogo.png")}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8"> -->
            <span class="brand-text font-weight-light">Blood Bank</span>

        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset("adminlte/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
{{--                    <a href="{{url("/")}}" class="d-block">{{auth()->user()->name}}</a>--}}
                    <a href="{{url("/")}}" class="d-block"></a>

                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <!--  governorats   -->
                    <li class="nav-item">
                        <a href="{{url("admin/governorate")}}" class="nav-link">
                            <i class="nav-icon fas fa-landmark"></i>
                            <p>governorats</p>
                        </a>
                    </li>

                    <!--  cities   -->
                    <li class="nav-item">
                        <a href="{{url("admin/city")}}" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p>Cities</p>
                        </a>
                    </li>

                    <!--  clients   -->
                    <li class="nav-item">
                        <a href="{{url("admin/client")}}" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>Clients</p>
                        </a>
                    </li>

                    <!--  posts   -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Posts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("admin/post")}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("admin/category")}}" class="nav-link">
                                    <i class="far nav-icon  fa-circle"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--  contacts   -->
                    <li class="nav-item">
                        <a href="{{url("admin/contact")}}" class="nav-link">
                            <i class="nav-icon fas fa-hands-helping"></i>
                            <p>Contacts</p>
                        </a>
                    </li>
                    <!--  donation   -->
                    <li class="nav-item">
                        <a href="{{url("admin/donation")}}" class="nav-link">
                            <i class="nav-icon fas fa-heart"></i>
                            <p>Donations</p>
                        </a>
                    </li>



                    <!--  settings   -->
                    <li class="nav-item">
                        <a href="{{url("admin/setting")}}" class="nav-link">
                            <i class="nav-icon fas fa-bolt "></i>
                            <p>Setting</p>
                        </a>
                    </li>


                    <!--  change password   -->
                    <li class="nav-item">
                        <a href="{{route('password.request')}}" class="nav-link">
                            <i class="nav-icon fas fa-user-secret "></i>
                            <p>Change password</p>
                        </a>
                    </li>

                    <!--  user   -->
                    <li class="nav-item">
                        <a href="{{url("admin/user")}}" class="nav-link">
                            <i class="nav-icon fas fa-user "></i>
                            <p>User</p>
                        </a>
                    </li>
                    <!--  roles   -->
                    <li class="nav-item">
                        <a href="{{url("admin/role")}}" class="nav-link">
                            <i class="nav-icon fas fa-shapes"></i>
                            <p>Role</p>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield("page_title")</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
       @yield("content")
       <!-- Content Header (Page header) -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.0
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('includes.footer')
