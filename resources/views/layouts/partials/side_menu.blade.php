<!-- Page Sidebar Start-->
<nav-menus></nav-menus>
<header class="main-nav">
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn">
            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="{{ url('/') }}"><i data-feather="airplay"></i><span>Dashboard</span></a>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="{{ url('/user') }}"><i data-feather="airplay"></i><span>Students</span></a>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Employees</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('employee.index') }}">All Employees</a></li>
              <li><a href="{{ route('employee.create') }}">Add Employees</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>
    <!-- Page Sidebar Ends-->
