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

/* styles.css */

/* Rendre le tableau réactif */
.table-responsive {
    overflow-x: auto;
}

/* Style pour le logo */
.site-logo img {
    max-width: 90px;
    height: 40px;
    opacity: 0.8;
}

/* Style pour rendre le tableau lisible sur les petits écrans */
@media screen and (max-width: 767px) {
    .table-responsive {
        overflow-x: auto;
    }
    .table-responsive table {
        width: 100%;
    }
    .table-responsive table thead {
        display: none;
    }
    .table-responsive table tbody tr {
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }
    .table-responsive table tbody td {
        display: block;
        text-align: left;
        width: 100%;
        word-wrap: break-word;
        padding: 10px;
        border: none;
    }
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
                <h1>Ecole</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Ecole</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Paramètres de l'école</h3>
                      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modifierEcoleModal">Modifier</button>
                    </div>
                    <div class="card-body">
                      <div id="loading" style="display: none !important;">
                        <img src="Animation - 1711828043942.gif" alt="Chargement..." />
                    </div>
                      <table id="configTable" class="table table-bordered table-striped">
                        <tbody id="tbodyecole">
                            <tr>
                                <th>Nom de l'école:</th>
                                <td id="nomEcoleValue">{{ !empty($ecole->nom) ?$ecole->nom: 'Champ vide, veuillez le remplir' }}</td>
                            </tr>
                            <tr>
                                <th>Logo:</th>
                                <td>
                                    @if(!empty($ecole->logo))
                                        <img src="/Ecolelogo/{{ $ecole->logo }}" alt="Logo"
                                        style="opacity: 0.8;max-width: 200px; height: auto;">
                                    @else
                                        <p>Logo non disponible, veuillez le télécharger</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Propos:</th>
                                <td id="proposValue">{{ !empty($ecole->propos) ?$ecole->propos: 'Champ vide, veuillez le remplir' }}</td>
                            </tr>
                            <tr>
                                <th>Facebook:</th>
                                <td id="facebookValue">
                                    @if(!empty($ecole->facebook))
                                        <a href="{{ $ecole->facebook }}" target="_blank">{{ $ecole->facebook }}</a>
                                    @else
                                        <p>Facebook non renseigné</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Instagram:</th>
                                <td id="instagramValue">
                                    @if(!empty($ecole->instagram))
                                        <a href="{{ $ecole->instagram }}" target="_blank">{{ $ecole->instagram }}</a>
                                    @else
                                        <p>Instagram non renseigné</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Twitter:</th>
                                <td id="twitterValue">
                                    @if(!empty($ecole->twitter))
                                        <a href="{{ $ecole->twitter }}" target="_blank">{{ $ecole->twitter }}</a>
                                    @else
                                        <p>Twitter non renseigné</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td id="emailValue">{{ !empty($ecole->email) ?$ecole->email: 'Champ vide, veuillez le remplir' }}</td>
                            </tr>
                            <tr>
                                <th>Numéro WhatsApp:</th>
                                <td id="numeroWhatsAppValue">{{ !empty($ecole->numero_whatsapp) ?$ecole->numero_whatsapp: 'Champ vide, veuillez le remplir' }}</td>
                            </tr>
                            <!-- Ajoutez d'autres attributs de l'école ici selon votre modèle de données -->
                        </tbody>
                    </table>




                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Formulaire Modal pour Modifier l'École -->
          <div class="modal fade" id="modifierEcoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modifier les paramètres de l'école</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="modifierEcoleForm" method="POST">
                    <div class="form-group">
                      <label for="nomEcole">Nom de l'école:</label>
                      <input value="{{ !empty($ecole->nom) ?$ecole->nom: '' }}" type="text" class="form-control" id="nomEcole" name="nomEcole" required>
                    </div>
                    <div class="form-group">
                      <label for="logo">Logo:</label>
                      <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*">
                    </div>
                    <div class="form-group">
                      <label for="logo">Video:</label>
                      <input type="file" class="form-control-file" id="video" name="video" accept="video/*">
                    </div>
                    <div class="form-group">
                      <label for="coordonnees">À Propos de l'Université:</label>
                      <textarea class="form-control" id="propos" name="propos" rows="3" required>{{ !empty($ecole->propos) ?$ecole->propos: '' }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="numeroWhatsApp">Numéro WhatsApp:</label>
                      <input value="{{ !empty($ecole->numero_whatsapp) ?$ecole->numero_whatsapp: '' }}" type="text" class="form-control" id="numeroWhatsApp" name="numeroWhatsApp" required>
                    </div>
                    <!-- Champ Facebook -->
                    <div class="form-group">
                      <label for="facebook">Facebook:</label>
                      <input value="{{ !empty($ecole->facebook) ?$ecole->facebook: '' }}" type="url" class="form-control" id="facebook" name="facebook">
                    </div>
                    <!-- Champ Instagram -->
                    <div class="form-group">
                      <label for="instagram">Instagram:</label>
                      <input value="{{ !empty($ecole->instagram) ?$ecole->instagram: '' }}"  type="url" class="form-control" id="instagram" name="instagram">
                    </div>
                    <!-- Champ Twitter -->
                    <div class="form-group">
                      <label for="twitter">Twitter:</label>
                      <input value="{{ !empty($ecole->twitter) ?$ecole->twitter: '' }}"  type="url" class="form-control" id="twitter" name="twitter">
                    </div>
                    <!-- Champ Email -->
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input value="{{ !empty($ecole->email) ?$ecole->email: '' }}" type="email" class="form-control" id="email" name="email">
                    </div>
                    <button id="btnecole" type="submit" class="btn btn-primary">Enregistrer</button>
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
    <script src="js/ajaxjsadmin/ecoleajax.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page specific script -->

  </body>
</html>
