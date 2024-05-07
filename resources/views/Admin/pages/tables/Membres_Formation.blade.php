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
          <li class="nav-item">
            <a
              class="nav-link"
              data-widget="navbar-search"
              href="#"
              role="button"
            >
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input

                    class="form-control form-control-navbar"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button
                      class="btn btn-navbar"
                      type="button"
                      data-widget="navbar-search"
                    >
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start --->
                <div class="media">
                  <img
                    src="../../dist/img/user1-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 mr-3 img-circle"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"
                        ><i class="fas fa-star"></i
                      ></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="../../dist/img/user8-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 img-circle mr-3"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"
                        ><i class="fas fa-star"></i
                      ></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="../../dist/img/user3-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 img-circle mr-3"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"
                        ><i class="fas fa-star"></i
                      ></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer"
                >See All Messages</a
              >
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header"
                >15 Notifications</span
              >
              <div class="dropdown-divider"></div>
              <div class="dropdown-item d-flex align-items-center" style="font-size: 13px; display :flex ;justify-content : space-between">
                <div class="mr-2">
                  <i class="fas fa-user-circle text-primary"></i>
                  <span class="d-block">Pierre Dupont</span>
                  <span class="text-muted">Formation: Web Dev</span>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-success" style="font-size: 11px; margin-right : 4px ;">Accepter</button>
                    <button class="btn btn-sm btn-danger" style="font-size: 11px;">Rejeter</button>
                  </div>
              </div>

              <div class="dropdown-divider"></div>
              <div class="dropdown-item d-flex align-items-center" style="font-size: 13px; display :flex ;justify-content : space-between">
                <div class="mr-2">
                  <i class="fas fa-user-circle text-primary"></i>
                  <span class="d-block">Pierre Dupont</span>
                  <span class="text-muted">Formation: Web Dev</span>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-success" style="font-size: 11px; margin-right : 4px ;">Accepter</button>
                    <button class="btn btn-sm btn-danger" style="font-size: 11px;">Rejeter</button>
                  </div>
              </div>

              <div class="dropdown-divider"></div>
              <div class="dropdown-item d-flex align-items-center" style="font-size: 13px; display :flex ;justify-content : space-between">
                <div class="mr-2">
                  <i class="fas fa-user-circle text-primary"></i>
                  <span class="d-block">Pierre Dupont</span>
                  <span class="text-muted">Formation: Web Dev</span>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-success" style="font-size: 11px; margin-right : 4px ;">Accepter</button>
                    <button class="btn btn-sm btn-danger" style="font-size: 11px;">Rejeter</button>
                  </div>
              </div>

              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#allNotificationsModal">See All Notifications</a>
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

                  <!-- Modal pour afficher toutes les notifications -->
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
                        <!-- Lignes statiques pour tester -->
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>Web Dev</td>
                            <td>2024-04-28 10:00:00</td>
                            <td>
                                <button class="btn btn-success accept-btn">Accepter</button>
                                <button class="btn btn-danger reject-btn">Rejeter</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Alice</td>
                            <td>Smith</td>
                            <td>Data Science</td>
                            <td>2024-04-28 09:30:00</td>
                            <td>
                                <button class="btn btn-success accept-btn">Accepter</button>
                                <button class="btn btn-danger reject-btn">Rejeter</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Emily</td>
                            <td>Jackson</td>
                            <td>Mobile App Dev</td>
                            <td>2024-04-27 15:45:00</td>
                            <td>
                                <button class="btn btn-success accept-btn">Accepter</button>
                                <button class="btn btn-danger reject-btn">Rejeter</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Michael</td>
                            <td>Williams</td>
                            <td>UI/UX Design</td>
                            <td>2024-04-27 12:20:00</td>
                            <td>
                                <button class="btn btn-success accept-btn">Accepter</button>
                                <button class="btn btn-danger reject-btn">Rejeter</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Sophia</td>
                            <td>Anderson</td>
                            <td>Data Analysis</td>
                            <td>2024-04-26 11:10:00</td>
                            <td>
                                <button class="btn btn-success accept-btn">Accepter</button>
                                <button class="btn btn-danger reject-btn">Rejeter</button>
                            </td>
                        </tr>
                        <!-- Ajoutez d'autres lignes statiques pour tester -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
                        <h1>Membres par Formation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Membres_Formation</li>
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
                                <h3 class="card-title">Liste des Formations et Membres</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Formation</th>
                                            <th>Membres</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($formations as $form)
                                      @if (count($form->membres)>0 && $form->etat==1)
                                      <tr>
                                      
                                            <td>{{$form->titre}}</td>
                                            <td>
                                              <div class="member-list" style="max-height: 105px; overflow-y: auto;">
                                    
                                                  @foreach ($form->membres as $membre)
                                                  <div style="height: 35px;">{{$membre->nom}} {{$membre->prenom}}</div>
                                                  @endforeach
                                                     
                                                 
                                              </div>
                                              <button type="button" class="btn btn-primary text-white btn-show-members" data-toggle="modal" data-target="#allMembersModal" data-formation-id="{{ $form->id }}">
                                                <i class="fas fa-users me-2"></i> Afficher tous les membres
                                            </button>
                                            
                                          </td>
                                        </tr>
                                        @endif
                                         
                                      
                                      @endforeach
                                        
                                        <!-- Ajoutez d'autres lignes pour chaque formation avec sa liste de membres -->
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

        <!-- Modal pour afficher tous les membres -->
        <div class="modal fade" id="allMembersModal" tabindex="-1" role="dialog" aria-labelledby="allMembersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allMembersModalLabel">Tous les membres</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="member-list">
                            <!-- Ajoutez ici tous les membres de toutes les formations -->
                            <!-- Vous pouvez les récupérer dynamiquement à partir de votre backend -->
                            <!-- Voici juste un exemple statique -->
                            <?php for ($i = 1; $i <= 100; $i++): ?>
                                <div>Membre <?= $i ?></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
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
      $(document).ready(function() {
          $('.btn-show-members').click(function() {
              var formationId = $(this).data('formation-id');
              
              // Envoyer une requête AJAX pour récupérer les membres associés à la formation sélectionnée
              $.ajax({
                  url: `http://127.0.0.1:8000/getmembers/${formationId}`, // Remplacez '/get-members/' par l'URL de votre endpoint backend pour récupérer les membres
                  type: 'GET',
                  success: function(data) {
                      // Mettre à jour le contenu du modal avec les membres récupérés
                      var memberList = $('.modal-body .member-list');
                      memberList.empty(); // Vider le contenu actuel du modal
                      
                      // Ajouter les membres récupérés au modal
                      $.each(data.members, function(index, member) {
                          memberList.append('<div>' + member.nom + ' ' + member.prenom + '</div>');
                      });
                  },
                  error: function(xhr, status, error) {
                      console.error(error);
                  }
              });
          });
      });
  </script>
  
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