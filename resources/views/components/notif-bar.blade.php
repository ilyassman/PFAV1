@props(['notifs'])
<div class="modal fade" id="allNotificationsModal" tabindex="-1" role="dialog" aria-labelledby="allNotificationsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="allNotificationsModalLabel">Toutes les Notifications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Rechercher..." aria-label="Rechercher" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Rechercher</button>
                </div>
            </div>
              <table class="table">
                  <thead>
                      <tr>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Formation demandée</th>
                          <th>Temps de demande</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($notifs as $notif)
                    <tr>
                      <td>{{$notif->nom}}</td>
                      <td>{{$notif->nom}}</td>
                      <td>{{$notif->titre}}</td>
                      <td>{{$notif->created_at}}</td>
                      <td>
                          <button class="btn btn-success accept-btn">Accepter</button>
                          <button class="btn btn-danger reject-btn">Rejeter</button>
                      </td>
                  </tr>

                    @endforeach
                      <!-- Lignes statiques pour tester -->
                      <!-- Ajoutez d'autres lignes statiques pour tester -->
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
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
        <span class="badge badge-warning navbar-badge">
          @if($notifs)
          {{$notifs[0]->nbr}}
          @else
          0
          @endif

        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"
          >
          @if($notifs)
          {{$notifs[0]->nbr}}
          @else
          0
          @endif
          Notifications</span
        >
        @if($notifs)
        @for($i=0;$i<3;$i++)
        @if(isset($notifs[$i]))
        <div class="dropdown-divider"></div>
        <div class="dropdown-item d-flex align-items-center" style="font-size: 13px; display: flex; justify-content: space-between;">
            <div class="mr-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                <i class="fas fa-user-circle text-primary"></i>
                <span class="d-block">{{$notifs[$i]->nom}} {{$notifs[$i]->prenom}}</span>
                <span class="text-muted">Formation: {{$notifs[$i]->titre}}</span>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-success accept-btn" style="font-size: 11px; margin-right: 4px;">Accepter</button>
                <button class="btn btn-sm btn-danger reject-btn" style="font-size: 11px;">Rejeter</button>
                <i class="fas fa-check-circle text-success d-none accepted-icon"></i>
            </div>
        </div>
        @endif
        @endfor
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#allNotificationsModal">See All Notifications</a>

        @endif




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
<script>
      document.addEventListener("DOMContentLoaded", function() {
        const acceptBtns = document.querySelectorAll(".accept-btn");
        const rejeteBtns = document.querySelectorAll(".reject-btn")
        acceptBtns.forEach(function(btn) {
            btn.addEventListener("click", function(event) {
                const parentDiv = this.closest(".dropdown-item");
                const acceptedIcon = parentDiv.querySelector(".accepted-icon");
                const rejectedIcon = parentDiv.querySelector(".accepted-icon");

                acceptedIcon.classList.remove("d-none");

                // Supprimer les boutons après acceptation
                parentDiv.querySelector(".accept-btn").remove();
                parentDiv.querySelector(".reject-btn").remove();

                // Supprimer la notification après 10 secondes
                setTimeout(function() {
                    parentDiv.remove();
                }, 3000);

                // Empêcher la propagation de l'événement de clic du bouton à l'élément parent
                event.stopPropagation();
            });
        });
        rejeteBtns.forEach(function(btn) {
            btn.addEventListener("click", function(event) {
                const parentDiv = this.closest(".dropdown-item");
                const acceptedIcon = parentDiv.querySelector(".accepted-icon");
                const rejectedIcon = parentDiv.querySelector(".accepted-icon");

                acceptedIcon.classList.remove("d-none");

                // Supprimer les boutons après acceptation
                parentDiv.querySelector(".accept-btn").remove();
                parentDiv.querySelector(".reject-btn").remove();

                // Supprimer la notification après 10 secondes
                setTimeout(function() {
                    parentDiv.remove();
                }, 3000);

                // Empêcher la propagation de l'événement de clic du bouton à l'élément parent
                event.stopPropagation();
            });
        });
    });
</script>
