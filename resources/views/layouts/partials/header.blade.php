<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right">
      <div class="main-header-left">
        <div class="logo-wrapper"><a href="index.html"><img src="../assets/images/logo/logo.png" alt=""></a></div>
      </div>
      <div class="mobile-sidebar">
        <div class="media-body text-right switch-sm">
          <label class="switch">
            <input id="sidebar-toggle" type="checkbox" data-toggle=".container" checked="checked"><span class="switch-state"></span>
          </label>
        </div>
      </div>
      <div class="nav-right col pull-right right-menu">
        <ul class="nav-menus">
            @guest
            @if (Route::has('login'))
            <li>
                <div class="media">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>


                </div>
              </li>

            @endif

            @if (Route::has('register'))
            <li>
                <div class="media">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>


                </div>
              </li>

            @endif
        @else
          <li class="px-0">
            <form class="form-inline search-form">
              <input class="form-control-plaintext" placeholder="Search....."><i class="close-search" data-feather="x"></i>
            </form><span class="mobile-search"><i data-feather="search"></i></span>
          </li>

          <li class="onhover-dropdown"><i data-feather="message-circle"></i>
            <ul class="chat-dropdown onhover-show-div p-t-20 p-b-20">
              <li>
                <div class="media"><img class="img-fluid rounded-circle mr-3" src="../assets/images/user/2.jpg" alt="">
                  <div class="status-circle online"></div>
                  <div class="media-body"><span class="f-w-600">Erica Hughes</span>
                    <p class="f-12 mb-0 light-font">There are many variations of passages...</p>
                    <p class="f-12 mb-0 font-primary">1 hr ago</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media"><img class="img-fluid rounded-circle mr-3" src="../assets/images/user/1.jpg" alt="">
                  <div class="status-circle away"></div>
                  <div class="media-body"><span class="f-w-600">Kori Thomas</span>
                    <p class="f-12 mb-0 light-font">There are many variations of passages...</p>
                    <p class="f-12 mb-0 font-primary">58 mins ago</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media"><img class="img-fluid rounded-circle mr-3" src="../assets/images/user/4.jpg" alt="">
                  <div class="status-circle offline"></div>
                  <div class="media-body"><span class="f-w-600">Ain Chavez</span>
                    <p class="f-12 mb-0 light-font">There are many variations of passages...</p>
                    <p class="f-12 mb-0 font-primary">32 mins ago</p>
                  </div>
                </div>
              </li>
              <li class="light-font text-center">Mark all as read      </li>
            </ul>
          </li>
          <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
          <li class="theme-setting"><i data-feather="settings"></i></li>
          <li class="onhover-dropdown px-0"><span class="media user-header">

            <img class="mr-2 rounded-circle img-35" src="../assets/images/dashboard/user.png" alt=""><span class="media-body"><span class="f-12 f-w-600">Elana Saint</span><span class="d-block">Admin</span></span></span>
            <ul class="profile-dropdown onhover-show-div">
              <li><i data-feather="user"> </i><a href="user-profile.html">Profile</a></li>

              <li class="f-w-600">Home</li>
              {{--  <li class="f-12"><i data-feather="chevron-right"> </i><a href="{{ route('change_password_view') }}">Change Passowrd</a></li>  --}}
              {{--  <li class="f-12"><i data-feather="chevron-right"> </i>Inbox</li>  --}}
              {{--  <li class="f-12"><i data-feather="chevron-right"> </i>Taskboard</li>  --}}
              {{--  <li class="f-12"><i data-feather="chevron-right"> </i>Settings</li>  --}}
              {{--  <li class="f-12"><i data-feather="chevron-right"> </i><a href="company_details.html">Details</a></li>  --}}

              <li><i data-feather="chevron-right"> </i>
                <a class="mr-2" class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
                   </li>



            </ul>
          </li>
          @endguest
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>
<!-- Page Header Ends -->
