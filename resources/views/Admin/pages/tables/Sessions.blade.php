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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      #loading {
   position: relative; /* Positionner la div de chargement de manière fixe par rapport à la fenêtre du navigateur */
   top: 0; /* Aligner la div en haut de la fenêtre */
   left: 40%; /* Aligner la div à gauche de la fenêtre */


}
#supp:hover {
   cursor: pointer;
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
        <a href="../../index3.html" class="brand-link">
          <img
            src="../../dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="../../dist/img/user2-160x160.jpg"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

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
                <h1>Formations</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Formations</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste des sessions</h3>
                    <button
                      type="button"
                      class="btn btn-primary float-right"
                      data-toggle="modal"
                      data-target="#ajouterSessionModal"
                    >
                      Ajouter
                    </button>
                  </div>
                  <div class="card-body">
                    <table
                      id="example1"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                          <th>Date de début</th>
                          <th>Date de fin</th>
                          <th>Nombre de place</th>
                          <th>Formation</th>
                          <th>Formateur</th>
                          <th>Lien vers la session</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <div id="loading" style="display: none !important;">
                        <img src="Animation - 1711828043942.gif" alt="Chargement..." />
                    </div>
                      <tbody id="tablebody">

                        @foreach ($datas as $session)
                        <tr>
                          <td>{{$session->date_debut}}</td>
                          <td>{{$session->date_fun}}</td>
                          <td>{{$session->nbd_place}}</td>
                          <td>{{$session->titre}}</td>
                          <td>{{$session->nom}} {{$session->prenom}} </td>
                          <td><a href="{{$session->url}}">{{$session->url}}</a>
                            <button onclick="lancereunion({{json_encode($session)}})" type="button" class="btn btn-sm btn-primary" style="margin-top:4px ">
                                <i class="fa-solid fa-play-circle"></i> Lancer la réunion
                            </button>
                          </td>
                          <td>
                            <i id="supp" onclick="suppdialog({{$session->id}})" class="fas fa-trash-alt text-danger"></i>
                            <!-- Icône de suppression -->
                            <i
                            onclick="updatedialog({{$session->id}})"
                            data-toggle="modal"
                            data-target="#modifierSessionModal"
                            id="supp" class="fas fa-edit text-primary ml-2"></i>
                            <!-- Icône de modification -->
                          </td>
                        </tr>
                        @endforeach

                        <!-- Ajouter d'autres lignes pour chaque session -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Formulaire Modal pour Ajouter une Session -->
        <div
          class="modal fade"
          id="ajouterSessionModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Ajouter une Session
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Formulaire pour ajouter une session -->
                <form id="ajouterSessionForm" method="POST">
                  <div class="form-group">
                    <label for="dateDebut">Date de début:</label>
                    <input
                      type="date"
                      class="form-control"
                      id="dateDebut"
                      name="dateDebut"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="dateFin">Date de fin:</label>
                    <input
                      type="date"
                      class="form-control"
                      id="dateFin"
                      name="dateFin"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="nbr">Nombre de place:</label>
                    <input
                      type="number"
                      class="form-control"
                      id="nbr"
                      name="nbr"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="formation">Formation:</label>
                    <select
                      class="form-control"
                      id="formation"
                      name="formation"
                      required
                    >
                    @foreach ($formations as $formation)
                    <option value="{{$formation->id}}">
                      {{$formation->titre}}
                    </option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="formateur">Formateur:</label>
                    <select
                      class="form-control"
                      id="formateur"
                      name="formateur"
                      required
                    >

                    @foreach ($formateurs as $formateur)
                    <option value="{{$formateur->id}}">
                      {{$formateur->nom}} {{$formateur->prenom}}
                    </option>
                    @endforeach


                      <!-- Ajouter d'autres options pour les formations disponibles -->

                      <!-- Ajouter d'autres options pour les formations disponibles -->
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dateDebut">Lien vers la session:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="url"
                      name="lien_session"
                      required
                    />
                  </div>
                  <button id="addsession" type="submit" class="btn btn-primary">Ajouter</button>
                </form>
              </div>
            </div>
          </div>
        </div>
          <!-- Formulaire Modal pour Modifier une Session -->
          <div
          class="modal fade"
          id="modifierSessionModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Modifier une Session
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Formulaire pour ajouter une session -->
                <form id="modifierSessionForm" method="POST">
                  <div class="form-group">
                    <label for="dateDebutu">Date de début:</label>
                    <input
                      type="date"
                      class="form-control"
                      id="dateDebutu"
                      name="dateDebutu"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="dateFinu">Date de fin:</label>
                    <input
                      type="date"
                      class="form-control"
                      id="dateFinu"
                      name="dateFinu"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="nbru">Nombre de place:</label>
                    <input
                      type="number"
                      class="form-control"
                      id="nbru"
                      name="nbru"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="formation">Formation:</label>
                    <select
                      class="form-control"
                      id="formationu"
                      name="formationu"
                      required
                    >
                    @foreach ($formations as $formation)
                    <option value="{{$formation->id}}">
                      {{$formation->titre}}
                    </option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="formateuru">Formateur:</label>
                    <select
                      class="form-control"
                      id="formateuru"
                      name="formateuru"
                      required
                    >
                    @foreach ($formateurs as $formateur)
                    <option value="{{$formateur->id}}">
                      {{$formateur->nom}} {{$formateur->prenom}}
                    </option>
                    @endforeach


                      <!-- Ajouter d'autres options pour les formations disponibles -->

                      <!-- Ajouter d'autres options pour les formations disponibles -->
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dateDebut">Lien vers la session:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="urlu"
                      name="lien_session"
                      required
                    />
                  </div>
                  <button id="updatesession" type="submit" class="btn btn-primary">Modifier</button>
                </form>
              </div>
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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/ajaxjsadmin/sessioncrud.js"></script>
    <script>

    </script>
  </body>
</html>
