@props(['notifs'])
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"
        ><i class="fas fa-bars"></i
      ></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
   

    <!-- Messages Dropdown Menu -->
   
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{$notifs[0]->nbr}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"
          >{{$notifs[0]->nbr}} Notifications</span
        >
        @for($i=0;$i<3;$i++)
        <div class="dropdown-divider"></div>
        <div class="dropdown-item d-flex align-items-center" style="font-size: 13px; display :flex ;justify-content : space-between">
          <div class="mr-2">
            <i class="fas fa-user-circle text-primary"></i>
            <span class="d-block">{{$notifs[$i]->nom}} {{$notifs[$i]->prenom}}</span>
            <span class="text-muted">Formation: {{$notifs[$i]->titre}}</span>
          </div>
          <div class="d-flex justify-content-between">
              <button class="btn btn-sm btn-success" style="font-size: 11px; margin-right : 4px ;">Accepter</button>
              <button class="btn btn-sm btn-danger" style="font-size: 11px;">Rejeter</button>
            </div>
        </div>
        @endfor

       
        
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer"
          >See All Notifications</a
        >
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a
        class="nav-link"
        data-widget="control-sidebar"
        data-slide="true"
        href="#"
        role="button"
      >
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>