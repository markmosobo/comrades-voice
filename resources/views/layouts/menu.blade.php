<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <router-link to="/home" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt blue"></i>
                  <p>
                    Dashboard
                  </p>
                </router-link>
               </li>

          <li class="nav-item">
            <router-link to="/results" class="nav-link">
            <i class="nav-icon fas fa-clipboard cyan"></i>
              <p>Results (real-time)</p>
            </router-link>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog red"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/schools"class="nav-link">
                  <i class="fas fa-list-ul nav-icon red"></i>
                  <p>Schools & Faculties</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/positions" class="nav-link">
                  <i class="fas fa-tags nav-icon cyan"></i>
                  <p>Electable Positions</p>
                </router-link>
              </li>  
              <li class="nav-item">
                <router-link to="/candidates" class="nav-link">
                  <i class="fas fa-tags nav-icon cyan"></i>
                  <p>Candidates</p>
                </router-link>
              </li>                                    
            </ul>
          </li>

          <li class="nav-item">
            <router-link to="/user" class="nav-link">
            <i class="nav-icon fas fa-users yellow"></i>
              <p>Users</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
            <i class="nav-icon fas fa-user green"></i>
              <p>Profile</p>
            </router-link>
          </li>
        
          <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="nav-icon fas fa-power-off blue"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </a>
          </li>
        </ul>
            </nav>        