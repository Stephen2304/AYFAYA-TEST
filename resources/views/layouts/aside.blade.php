<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->nom}} {{Auth::user()->prenom}}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @role('admin')
            <li class="nav-item">
                <a href=" {{route("users.index")}} " class="nav-link">
                    <i class="nav-icon fa fa-user-plus" aria-hidden="true"></i>
                <p>
                    Utilisateurs
                </p>
                </a>
            </li>
            @endrole
            <li class="nav-item">
                <a href="{{route("rdv.index")}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Rendez-vous
                </p>
                </a>
            </li>
        </ul>
      </nav>

    </div>
    <!-- /.sidebar -->
  </aside>