<div>
    <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ecole') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ecole</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('membres') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('commentaires') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commentaires</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('formateurs') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Formateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('formations') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Certificats</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Membres_Formation') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Membres_Formation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sessions') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sessions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('support') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gererSessions') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gérer les sessions</p>
                </a>
            </li>
            </ul>
          </li>
      </nav>
</div>
