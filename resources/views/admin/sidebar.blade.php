  <!-- header area -->
  <header class="header_area">
                <!-- logo -->
                <div class="sidebar_logo">
                    <a href="{{ route('admin.index') }}">
                        <h3 class="text-center" style="color:white">Dashboard</h3>
                    </a>
                </div>
                <div class="sidebar_btn">
                    <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
                </div>
                <ul class="header_menu">
                    
                    
                    <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                            <div class="user_item dropdown-menu dropdown-menu-right">
                                <!-- <div class="admin">
                                    <a href="#" class="user_link"><img src="panel/assets/images/admin.jpg" alt=""></a>
                                </div> -->
                            <ul>
                                
                                <li><a href="#"><span><i class="fas fa-user"></i></span>{{ Auth::guard('admin')->user()->name }}</a></li>
                                
                                <li>


  <a href="{{ route('admin.logout') }}"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>

                        <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
                </ul>
            </header><!-- / header area -->
            <!-- sidebar area -->
            <aside class="sidebar-wrapper ">
              <nav class="sidebar-nav">
                 <ul class="metismenu" id="menu1">
                    <li class="single-nav-wrapper">
                        <a href="{{ route('admin.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">home</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="menu-item" href="{{ route('admin.users') }}" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-user"></i></span>
                              <span class="menu-text">Users</span>
                          </a>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="menu-item" href="{{ route('admin.books') }}" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-edit"></i></span>
                              <span class="menu-text">Books</span>
                          </a>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="menu-item" href="{{ route('admin.subscription') }}" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-edit"></i></span>
                              <span class="menu-text">Subscriptions</span>
                          </a>
                      </li>
                    
                    </ul>
              </nav>
            </aside><!-- /sidebar Area-->