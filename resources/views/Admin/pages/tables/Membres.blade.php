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
                <h1>Clients</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Membres</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste des Clients du site</h3>
                    <button
                      type="button"
                      class="btn btn-primary float-right"
                      data-toggle="modal"
                      data-target="#ajouterMembreModal"
                    >
                      Ajouter
                    </button>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">

                    <table
                      id="example1"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Email</th>
                          <th>Numéro de téléphone</th>

                          <th>Image</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody id="tablebody">
                        <div id="loading" style="display: none !important;">
                          <img src="Animation - 1711828043942.gif" alt="Chargement..." />
                      </div>
                        @foreach ($datas as $data)
                        <tr>
                          <td>{{$data->nom}}</td>
                          <td>{{$data->prenom}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->num_tel}}</td>

                          <td>
                            <img
                              src="/Membrespic/{{$data->image}}"
                              alt="Image"
                              style="width: 50px; height: 50px"
                            />
                          </td>

                          <td>
                            <i id="supp" onclick="suppdialog({{$data->id}})" class="fas fa-trash-alt text-danger"></i>
                            <!-- Icône de suppression -->
                            <i
                            onclick="updatedialog({{$data->id}})"
                            data-toggle="modal"
                            data-target="#modifierMembreModal"
                            id="supp" class="fas fa-edit text-primary ml-2"></i>
                            <!-- Icône de modification -->
                          </td>
                        </tr>
                        @endforeach


                        <!-- Ajouter d'autres lignes pour chaque membre du site -->
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Formulaire Modal pour Ajouter un Membre -->
        <div
          class="modal fade"
          id="ajouterMembreModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Ajouter un Membre
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
                <!-- Formulaire pour ajouter un membre -->
                <form id="ajouterMembreForm" method="POST">
                  <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="nom"
                      name="nom"
                      required
                    />
                    <div id="erreurname" class="invalid-feedback">
                    </div>

                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="prenom"
                      name="prenom"
                      required
                    />
                    <div id="erreurprenom" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      required
                    />
                    <div id="erreuremail" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telephone">Numéro de téléphone:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="telephone"
                      name="telephone"
                      required
                    />
                    <div id="erreurphone" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="motdepasse">Mot de passe:</label>
                    <input
                      type="password"
                      class="form-control"
                      id="motdepasse"
                      name="motdepasse"
                      required
                    />
                    <div id="erreurpass" class="invalid-feedback">
                    </div> 
                  </div>
                  <div class="form-group">
                    <label for="image">Image:</label>
                    <input
                      type="file"
                      class="form-control-file"
                      id="image"
                      name="image"
                    />
                  </div>

                  <button id="postmem" type="submit" class="btn btn-primary">Ajouter</button>
                </form>
              </div>
            </div>
          </div>
        </div>
 <!-- Formulaire pour modifier un membre -->
        <div
          class="modal fade"
          id="modifierMembreModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Modifier un Membre
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
                <!-- Formulaire pour ajouter un membre -->
                <form id="modifierMembreModal" method="POST">
                  <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="nomu"
                      name="nom"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="prenomu"
                      name="prenom"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input
                      type="email"
                      class="form-control"
                      id="emailu"
                      name="email"
                      required
                    />
                    <div id="erreuremailu" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telephone">Numéro de téléphone:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="telephoneu"
                      name="telephone"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="motdepasse">Mot de passe:</label>
                    <input
                      type="password"
                      class="form-control"
                      id="motdepasseu"
                      name="motdepasse"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="image">Image:</label>
                    <input
                      type="file"
                      class="form-control-file"
                      id="imageu"
                      name="image"
                    />
                  </div>
                 
                  <button id="butmodifier" type="submit" class="btn btn-primary">Modifier</button>
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
    <script src="js/ajaxjsadmin/membrespost.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $("#example1")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
          })
          .buttons()
          .container()
          .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
          paging: true,
          lengthChange: false,
          searching: false,
          ordering: true,
          info: true,
          autoWidth: false,
          responsive: true,
        });
      });
    </script>
  </body>
</html>