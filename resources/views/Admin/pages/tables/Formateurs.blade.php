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
.error-message {
  color: red;
  font-size: 12px;
  font-weight: 600;
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
                <h1>Formateurs</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Formateurs</li>
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
                    <h3 class="card-title">Liste des formateurs</h3>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#ajouterFormateurModal">Ajouter</button>
                  </div>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Email</th>
                          <th>Numéro de téléphone</th>
                          <th>description</th>
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
                          <td>{{$data->description}}</td>
                          <td>
                            <img
                              src="/Formateurspic/{{$data->image}}"
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
                            data-target="#modifierFormateurModal"
                            id="supp" class="fas fa-edit text-primary ml-2"></i>
                            <!-- Icône de modification -->
                          </td>
                        </tr>
                        @endforeach
                        <!-- Ajouter d'autres lignes pour chaque formateur -->
                      </tbody>
                    </table>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Formulaire Modal pour Ajouter un Formateur -->
        <div class="modal fade" id="ajouterFormateurModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Formateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Formulaire pour ajouter un formateur -->
                <form id="ajouterFormateurForm" method="POST">
                  <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                    <div id="erreurenom" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                    <div id="erreureprenom" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div id="erreuremail" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telephone">Numéro de téléphone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                    <div id="erreurphone" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                    <div id="erreurdesc" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="motdepasse">Mot de passe:</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
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
                  <button id="postform" type="submit" class="btn btn-primary">Ajouter</button>
                </form>
              </div>
            </div>
          </div>
        </div>
          {{-- formulaire modal pour modifier formateur --}}
        <div class="modal fade" id="modifierFormateurModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un Formateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Formulaire pour ajouter un formateur -->
                <form id="modifierFormateurForm" method="POST">
                  <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nomu" name="nom" required>
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" class="form-control" id="prenomu" name="prenom" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="emailu" name="email" required>
                    <div id="erreuremailu" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telephone">Numéro de téléphone:</label>
                    <input type="text" class="form-control" id="telephoneu" name="telephone" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="descriptionu" name="description" required>
                  </div>
                  <div class="form-group">
                    <label for="motdepasse">Mot de passe:</label>
                    <input type="password" class="form-control" id="motdepasseu" name="motdepasse" required>
                  </div>

                  <button id="modifierform" type="submit" class="btn btn-primary">Modifier</button>
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
    <script src="js/ajaxjsadmin/formateurscrud.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
