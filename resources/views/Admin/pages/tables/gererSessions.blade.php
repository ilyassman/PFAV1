<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../../plugins/fontawesome-free/css/all.min.css"
    />
    <!-- DataTables -->
    <link
      rel="stylesheet"
      href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
    <style>
      #loading {
    position: relative; /* Positionner la div de chargement de manière fixe par rapport à la fenêtre du navigateur */
    top: 0; /* Aligner la div en haut de la fenêtre */
    left: 40%; /* Aligner la div à gauche de la fenêtre */


}
      #supp:hover {
    cursor: pointer;
}
.card {
    margin: 20px 40px ;

}
.card-header i {
    margin-right: 5px;
  }
  .selected-member {
      display: inline-block;
      background-color: white;
      border: 1px solid #ced4da;
      border-radius: 5px;
      margin-right: 10px;
      margin-bottom: 10px;
    }
    .membre-user {
      background-color: green;
      color: white;
      padding: 5px;
      margin-right: 5px ;
    }
    .membre-delete {
      background-color: red;
      color: white;
      padding: 5px;
      margin-left: 5px ;
    }

    </style>
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <x-notif-bar :notifs="$notifs" />
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->


        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
         

          <!-- SidebarSearch Form -->


          <!-- Sidebar Menu -->
          <x-navbar-admin />
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"></li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
<!-- Formulaire de sélection des membres -->
<div class="card card-primary">
    <div class="card-header">
        <i class="fas fa-users"></i>
        <h3 class="card-title">Sélectionner des membres</h3>
    </div>
    <div class="card-body">

            <!-- Liste des membres avec barre de recherche -->

             <!-- Liste des sessions de formation -->
             <div class="form-group mt-4">
                <label for="sessionList"><i class="fas fa-calendar-alt"></i> Sélectionner une session de formation :</label>
                <select class="form-control" id="sessionList">
                  @foreach ($sessions as $session)
                      <option value="{{ $session->id }}">{{ $session->date_debut }} - {{ $session->titre }}</option>
                  @endforeach
              </select>
            </div>


            <div class="form-group" style="margin-top: 20px;">
                <label for="memberSearch"><i class="fas fa-search"></i> Rechercher un membre :</label>
                <div class="input-group">
                    <input type="text" onchange="filterMembers()" class="form-control" id="memberSearch" placeholder="Rechercher...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <select multiple class="form-control mt-2" id="memberList" onclick="ajouterMembre()">
                    <!-- Remplacez les options suivantes par les membres de votre site -->
                    @foreach ($membres as $membre)
                    <option value="{{$membre->idmembre}}">{{$membre->nom}} {{$membre->prenom}} ({{$membre->email}})</option>
                    @endforeach

                    <!-- Ajoutez plus d'options si nécessaire -->
                </select>
            </div>

            <!-- Conteneur pour afficher les membres sélectionnés -->
            <div id="selectedMembersContainer">
            </div>



    </div>
</div>




        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
        <strong
          >Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page specific script -->
    <!-- script ajax -->
    <script src="js/ajaxjsadmin/gerersession.js"></script>
    <!--------------------->
    <script>
     function filterMembers() {
    var input, filter, select, options, option, i, txtValue;
    input = document.getElementById("memberSearch"); // Modifier ici
    filter = input.value.toLowerCase();
    select = document.getElementById("memberList");
    options = select.getElementsByTagName("option");
    for (i = 0; i < options.length; i++) {
        option = options[i];
        txtValue = option.textContent || option.innerText;
        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            option.style.display = "";
        } else {
            option.style.display = "none";
        }
    }
}

// Fonction pour ajouter un membre sélectionné
function ajouterMembre() {
    var selectedMembers = document.getElementById("memberList").selectedOptions;
    var selectedMembersContainer = document.getElementById("selectedMembersContainer");

    for (var i = 0; i < selectedMembers.length; i++) {
        var memberName = selectedMembers[i].text;
        var memberEmail = selectedMembers[i].value;

        var existingMembers = selectedMembersContainer.getElementsByClassName("selected-member");
        var alreadyAdded = false;
        for (var j = 0; j < existingMembers.length; j++) {
            if (existingMembers[j].innerText.includes(memberName)) {
                alreadyAdded = true;
                break;
            }
        }

        if (!alreadyAdded) {
            addmembre(1,selectedMembers[i].value,sessions.value);
            var memberElement = document.createElement("div");
            memberElement.classList.add("selected-member");
            memberElement.setAttribute("value", selectedMembers[i].value);
            memberElement.innerHTML = `<i class="fas fa-user membre-user"></i> ${memberName} <span class="badge badge-success" onclick="changerEtat(this,${selectedMembers[i].value})" style="cursor: pointer;"></span> <i class="fas fa-times-circle membre-delete" onclick="supprimerMembre(this)" style="cursor: pointer;"></i>`;

            selectedMembersContainer.appendChild(memberElement);
        }
    }
}







    </script>
  </body>
</html>
