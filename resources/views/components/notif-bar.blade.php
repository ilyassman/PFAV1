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
                      <td>{{$notif->prenom}}</td>
                      <td>{{$notif->titre}}</td>
                      <td>{{$notif->created_at}}</td>
                      <td>
                          <button onclick="acceptdemande({{json_encode($notif)}})" class="btn btn-success accept-btn">Accepter</button>
                          <button onclick="suppdemande({{$notif->id}})" class="btn btn-danger reject-btn">Rejeter</button>
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
                <button  onclick="acceptdemande({{json_encode($notifs[$i])}})" class="btn btn-sm btn-success accept-btn" style="font-size: 11px; margin-right: 4px;">Accepter</button>
                <button onclick="suppdemande({{$notifs[$i]->id}})" class="btn btn-sm btn-danger reject-btn" style="font-size: 11px;">Rejeter</button>
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
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="small btn btn-danger btn-sm mt-1 rounded-6" style="">
            <span class="icon-lock"></span> Déconnexion
        </button>
    </form>
  </ul>
</nav>
<script src="js/ajaxjsadmin/demandecrud.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

        // Mettre à jour le nombre dans le badge
        const badge = document.querySelector(".navbar-badge");
        if (badge) {
            let count = parseInt(badge.textContent);
            if (!isNaN(count) && count > 0) {
                count--;
                badge.textContent = count;
            }
        }

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

        // Mettre à jour le nombre dans le badge
        const badge = document.querySelector(".navbar-badge");
        if (badge) {
            let count = parseInt(badge.textContent);
            if (!isNaN(count) && count > 0) {
                count--;
                badge.textContent = count;
            }
        }

        // Supprimer la notification après 10 secondes
        setTimeout(function() {
            parentDiv.remove();
        }, 3000);

        // Empêcher la propagation de l'événement de clic du bouton à l'élément parent
        event.stopPropagation();
    });
});

    });

    const acceptBtns = document.querySelectorAll(".accept-btn");
const rejectBtns = document.querySelectorAll(".reject-btn");

acceptBtns.forEach(function(btn) {
    btn.addEventListener("click", function(event) {
        const row = this.closest("tr"); // Target the table row (TR)
        const parentDiv = row.parentElement; // Optional: If needed for further actions

        // Handle acceptance logic (assuming it's handled elsewhere)
        // ...

        // Remove buttons from the row after click
        row.querySelector(".accept-btn").remove();
        row.querySelector(".reject-btn").remove();

        // Mettre à jour le nombre dans le badge
        const badge = document.querySelector(".navbar-badge");
        if (badge) {
            let count = parseInt(badge.textContent);
            if (!isNaN(count) && count > 0) {
                count--;
                badge.textContent = count;
            }
        }

        // Create and append a check icon (replace 'check-icon' with your actual class)
        const checkIcon = document.createElement("i");
        checkIcon.classList.add("check-icon", "fas", "fa-check"); // Add appropriate classes for your icon
        row.insertAdjacentHTML("beforeend", `<td></td>`); // Add an empty cell for the icon
        const iconCell = row.querySelector("td:last-child"); // Get the new cell
        iconCell.appendChild(checkIcon); // Append the icon to the cell

        // Optionally, remove the entire row after a delay (modify delay as needed)
        setTimeout(function() {
            row.remove();
        }, 3000); // 3 seconds

        // Prevent click propagation (if necessary)
        event.stopPropagation();
    });
});

rejectBtns.forEach(function(btn) {
    btn.addEventListener("click", function(event) {
        const row = this.closest("tr"); // Target the table row (TR)
        const parentDiv = row.parentElement; // Optional: If needed for further actions

        // Handle rejection logic (assuming it's handled elsewhere)
        // ...

        // Remove buttons from the row after click
        row.querySelector(".accept-btn").remove();
        row.querySelector(".reject-btn").remove();

        // Mettre à jour le nombre dans le badge
        const badge = document.querySelector(".navbar-badge");
        if (badge) {
            let count = parseInt(badge.textContent);
            if (!isNaN(count) && count > 0) {
                count--;
                badge.textContent = count;
            }
        }

        // Create and append a done icon (replace 'done-icon' with your actual class)
        const doneIcon = document.createElement("i");
        doneIcon.classList.add("done-icon", "fas", "fa-times-circle"); // Add appropriate classes for your icon
        row.insertAdjacentHTML("beforeend", `<td></td>`); // Add an empty cell for the icon
        const iconCell = row.querySelector("td:last-child"); // Get the new cell
        iconCell.appendChild(doneIcon); // Append the icon to the cell

        // Optionally, remove the entire row after a delay (modify delay as needed)
        setTimeout(function() {
            row.remove();
        }, 3000); // 3 seconds

        // Prevent click propagation (if necessary)
        event.stopPropagation();
    });
});


</script>
