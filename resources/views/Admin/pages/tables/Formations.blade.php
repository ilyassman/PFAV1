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
      <style>
      #loading {
   position: relative; /* Positionner la div de chargement de manière fixe par rapport à la fenêtre du navigateur */
   top: 0; /* Aligner la div en haut de la fenêtre */
   left: 50%; /* Aligner la div à gauche de la fenêtre */
}
#loadingf {
   position: relative; /* Positionner la div de chargement de manière fixe par rapport à la fenêtre du navigateur */
   top: 0; /* Aligner la div en haut de la fenêtre */
   left: 50%; /* Aligner la div à gauche de la fenêtre */
}
#supp:hover {
    cursor: pointer; 
}
#listeCategories::-webkit-scrollbar {
  height: 6px;
  width: 6px;
}

#listeCategories::-webkit-scrollbar-track {
  border-radius: 5px;
  background-color: #EBEBEB;
  
}

#listeCategories::-webkit-scrollbar-track:hover {
  background-color: #B8C0C2;
}

#listeCategories::-webkit-scrollbar-track:active {
  background-color: #B8C0C2;
}

#listeCategories::-webkit-scrollbar-thumb {
  border-radius: 5px;
  background-color: #2274E0;
}

#listeCategories::-webkit-scrollbar-thumb:hover {
  background-color: #52AFC7;
}

#listeCategories::-webkit-scrollbar-thumb:active {
  background-color: #1600A3;
}


   </style>
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
                <h1>Certificats</h1>
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
                    <h3 class="card-title">Liste des Certificats</h3>
                    <button
                      type="button"
                      class="btn btn-primary float-right"
                      data-toggle="modal"
                      data-target="#ajouterFormationModal"
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
                          <th>Titre</th>
                          <th>Prix</th>
                          <th>Contenu</th>
                          <th>Disponibilité</th>
                          <th>Date de publication</th>
                          <th>Langue</th>
                          <th>Video</th>
                          <th>Niveau</th>
                          <th>Prérequis</th>
                          <th>Objectif</th>
                          <th>Programme</th>
                          <th>Actions</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <div id="loadingf" style="display: none !important;">
                          <img src="Animation - 1711828043942.gif" alt="Chargement..." />
                      </div>
                        @foreach ($datas as $formation)
                        <tr>
                          <td>{{$formation->titre}}</td>
                          <td>{{$formation->prix}}$</td>
                          <td>
                            {{$formation->contenue}}
                          </td>
                          <td>
                            @php
                                echo ($formation->disponibilite == 1) ? "Disponible" : "Indisponible";
                            @endphp
                          </td>
                          <td> {{$formation->created_at}}</td>
                          <td>{{$formation->langue}}</td>
                          <td>
                            <div class="col-lg-4 col-12 video">
                              <div class="mx-auto">
                                <a href="Formationvideo/{{$formation->video}}" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                                  <span class="play">
                                    <span class="icon-play"></span>
                                  </span>
                                  <img
                                  src="Formationpic/{{$formation->image}}"
                                  alt="Image"
                                  style="width: 50px; height: 50px"
                                />                                </a>
                              </div>
                            </div>
                               
                              
                            
                          </td>
                          <td>{{$formation->niveau}}</td>
                          <td>{{$formation->prerequis}}</td>
                          <td>
                            {!! $formation->objectif !!}
                          </td>
                          <td>
                            {!! $formation->programme !!}
                          </td>
                          <td>
                            <i id="supp" onclick="suppdialog({{$formation->id}})" class="fas fa-trash-alt text-danger"></i>
                            <!-- Icône de suppression -->
                            <i
                            onclick="updatedialogfor({{$formation->id}})"
                             id="supp" class="fas fa-edit text-primary ml-2"
                            data-target="#modifierFormationModal"
                            data-toggle="modal"
                            ></i>
                            <!-- Icône de modification -->
                          </td>
                        </tr>
                    
                        @endforeach
                        
                        <!-- Ajouter d'autres lignes pour chaque formation -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Formulaire Modal pour Ajouter une Formation en Génie Civil -->
        <div
          class="modal fade"
          id="ajouterFormationModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Ajouter une Formation
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
                <!-- Formulaire pour ajouter une formation en génie civil -->
                <form id="ajouterFormationForm" method="POST">
                  <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="titre"
                      name="titre"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="prix">Prix:</label>
                    <input
                      type="number"
                      class="form-control"
                      id="prix"
                      name="prix"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="contenu">Contenu:</label>
                    <textarea
                      class="form-control"
                      id="contenu"
                      name="contenu"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="disponibilite">Disponibilité:</label>
                    <select
                      class="form-control"
                      id="disponibilite"
                      name="disponibilite"
                      required
                    >
                      <option value="1">Disponible</option>
                      <option value="0">Indisponible</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="categorie">Catégorie:</label>
                    <select id="selectcateg" class="form-control" id="categorie" name="categorie">
                      <!-- Ajoutez des options de catégorie ici -->
                      @foreach ($categs as $categ)
                      <option value="{{$categ->id}}">{{$categ->nom}}</option>
                      @endforeach


                    </select>
                  </div>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gererCategoriesModal" style="font-size: 14px;margin-top: -10px;margin-bottom: 10px;">
                    Gérer Catégories
                  </button>

                  <div class="form-group">
                    <label for="langue">Langue:</label>
                    <input
                      type="text"
                      class="form-control"
                      id="langue"
                      name="langue"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="image">Image:</label>
                    <input
                      type="file"
                      class="form-control-file"
                      id="image"
                      name="image"
                      accept="image/*"
                    />
                  </div>
                  <div class="form-group">
                    <label for="video">Video:</label>
                    <input
                      type="file"
                      class="form-control-file"
                      id="video"
                      name="video"
                      accept="video/*"
                    />
                  </div>
                  <div class="form-group">
                    <label for="niveau">Niveau:</label>
                    <select class="form-control" id="niveau" name="niveau" required>
                      <option value="Debutant">Débutant</option>
                      <option value="Intermediaire">Intermédiaire</option>
                      <option value="Avance">Avancé</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="prerequis">Prérequis:</label>
                    <div id="prerequisContainer" class="mb-2">
                      <!-- Champ de prérequis initial -->
                      <div class="input-group mb-1">
                        <input type="text" class="form-control" name="prerequis" required>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-danger btn-remove" onclick="removePrerequis(this)">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" id="addPrerequis">
                      <i class="fas fa-plus"></i> Ajouter Prérequis
                    </button>
                  </div>



                  <div class="form-group">
                    <label for="objectif">Objectif:</label>
                    <textarea
                      class="form-control"
                      id="objectif"
                      name="objectif"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="Programme">Programme:</label>
                    <textarea
                      class="form-control"
                      id="Programme"
                      name="Programme"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                  <button id="addforamtion" type="submit" class="btn btn-primary">Ajouter</button>
                </form>
              </div>
            </div>
          </div>
        </div>
<!-- Formulaire Modal pour Modifier une Formation en Génie Civil -->
<div
class="modal fade"
id="modifierFormationModal"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">
        Modifier une Formation
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
      <!-- Formulaire pour modifier une formation en génie civil -->
      <form id="modifierFormationForm" method="POST">
        <div class="form-group">
          <label for="titre">Titre:</label>
          <input
            type="text"
            class="form-control"
            id="titreu"
            name="titre"
            required
          />
        </div>
        <div class="form-group">
          <label for="prix">Prix:</label>
          <input
            type="number"
            class="form-control"
            id="prixu"
            name="prix"
            required
          />
        </div>
        <div class="form-group">
          <label for="contenu">Contenu:</label>
          <textarea
            class="form-control"
            id="contenuu"
            name="contenu"
            rows="3"
            required
          ></textarea>
        </div>
        <div class="form-group">
          <label for="disponibilite">Disponibilité:</label>
          <select
            class="form-control"
            id="disponibiliteu"
            name="disponibilite"
            required
          >
            <option value="1">Disponible</option>
            <option value="0">Indisponible</option>
          </select>
        </div>
        <div class="form-group">
          <label for="categorie">Catégorie:</label>
          <select id="selectcategu" class="form-control" id="categorie" name="categorie">
            <!-- Ajoutez des options de catégorie ici -->
            @foreach ($categs as $categ)
            <option value="{{$categ->id}}">{{$categ->nom}}</option>
            @endforeach


          </select>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gererCategoriesModal" style="font-size: 14px;margin-top: -10px;margin-bottom: 10px;">
          Gérer Catégories
        </button>

        <div class="form-group">
          <label for="langue">Langue:</label>
          <input
            type="text"
            class="form-control"
            id="langueu"
            name="langue"
            required
          />
        </div>
        <div class="form-group">
          <label for="niveau">Niveau:</label>
          <select class="form-control" id="niveauu" name="niveau" required>
            <option value="Debutant">Débutant</option>
            <option value="Intermediaire">Intermédiaire</option>
            <option value="Avance">Avancé</option>
          </select>
        </div>
        <div class="form-group">
          <label for="prerequis">Prérequis:</label>
          <div id="prerequisContaineru" class="mb-2">
            <!-- Champ de prérequis initial -->
            <div class="input-group mb-1">
              <input type="text" class="form-control" name="prerequisu" required>
              <div class="input-group-append">
                <button type="button" class="btn btn-danger btn-remove" onclick="removePrerequisu(this)">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-success btn-sm" id="addPrerequisu">
            <i class="fas fa-plus"></i> Ajouter Prérequis
          </button>
        </div>



        <div class="form-group">
          <label for="objectif">Objectif:</label>
          <textarea
            class="form-control"
            id="objectifu"
            name="objectif"
            rows="3"
            required
          ></textarea>
        </div>
        <div class="form-group">
          <label for="Programme">Programme:</label>
          <textarea
            class="form-control"
            id="Programmeu"
            name="Programme"
            rows="3"
            required
          ></textarea>
        </div>
        <button id="updateforamtion" type="submit" class="btn btn-primary">Modifier</button>
      </form>
    </div>
  </div>
</div>
</div>
        <!-- /.content -->
      </div>
<!-- Modal pour gérer les catégories -->
<div class="modal fade" id="gererCategoriesModal" tabindex="-1" aria-labelledby="gererCategoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gererCategoriesModalLabel">Gérer les catégories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Liste des catégories -->
        <div id="loading" style="display: none !important;" class="d-flex justify-content-center">
        <img   src="Animation - 1711828043942.gif" alt="Chargement..." />
      </div>
      <nav class="navbar ">
        <div class="container-fluid">
            <input oninput="filtrecateg()" id="search" class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
        </div>
      </nav>
        <ul  style="overflow:scroll; height:150px;" id="listeCategories" class="list-group">
          @foreach ($categs as $categ)
          <li  class="list-group-item">
            {{$categ->nom}}
            <button onclick="suppcategdialog({{$categ->id}})" class="btn btn-danger btn-sm float-right"><i class="fas fa-trash-alt"></i></button>
            <button onclick="updatecategdial({{$categ->id}})" class="btn btn-primary btn-sm float-right mr-2"><i class="fas fa-edit"></i></button>
          </li>
          @endforeach



        </ul>

        <form id="ajouterCategorieForm">
          <div class="form-group">
            <label for="nouvelleCategorie">Nouvelle catégorie:</label>
            <input type="text" class="form-control" id="nouvelleCategorie" name="nouvelleCategorie" required>
          </div>
          <button id="addcateg" value="add" type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js"></script>
    <script src="js/ajaxjsadmin/formationcrud.js"></script>
    <script src="js/ajaxjsadmin/categcrud.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      var i=0;
      var j=0;
      function removePrerequis(element) {
    if(i!=0){
        element.closest('.input-group').remove();
    i--;
      }
  }
  

  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("addPrerequis").addEventListener("click", function() {
      
      var container = document.getElementById("prerequisContainer");
      var inputGroup = document.createElement("div");
      inputGroup.className = "input-group mb-1";
      var input = document.createElement("input");
      input.type = "text";
      input.className = "form-control";
      input.name = "prerequis";
      input.required = true;
      var button = document.createElement("button");
      button.type = "button";
      button.className = "btn btn-danger btn-remove";
      button.innerHTML = '<i class="fas fa-times"></i>';
      button.setAttribute("onclick", "removePrerequis(this)");
      var buttonWrapper = document.createElement("div");
      buttonWrapper.className = "input-group-append";
      buttonWrapper.appendChild(button);
      inputGroup.appendChild(input);
      inputGroup.appendChild(buttonWrapper);
      container.appendChild(inputGroup);
      i++;
      
    });
  });
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("addPrerequisu").addEventListener("click", function() {
      
      var containeru = document.getElementById("prerequisContaineru");
      var inputGroup = document.createElement("div");
      inputGroup.className = "input-group mb-1";
      var input = document.createElement("input");
      input.type = "text";
      input.className = "form-control";
      input.name = "prerequisu";
      input.required = true;
      var button = document.createElement("button");
      button.type = "button";
      button.className = "btn btn-danger btn-remove";
      button.innerHTML = '<i class="fas fa-times"></i>';
      button.setAttribute("onclick", "removePrerequisu(this)");
      var buttonWrapper = document.createElement("div");
      buttonWrapper.className = "input-group-append";
      buttonWrapper.appendChild(button);
      inputGroup.appendChild(input);
      inputGroup.appendChild(buttonWrapper);
      containeru.appendChild(inputGroup);
      j++;
      
    });
  });
  let objectif;
  let programme;
  let objectifu;
  let programmeu;
  CKEDITOR.ClassicEditor.create(document.getElementById("Programme"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|', 'blockQuote', 'insertTable', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Taper ici les objectifs',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            })
            .then( newEditor => {
              programme = newEditor;
              programme.setData( '<h3 style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">Module 1 : Taper votre Module 1</h3><ul style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:17.6px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:300;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;"><li style="box-sizing:border-box;font-size:15px;">taper le 1ere sous module</li></ul><h3 style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">Module 2 : Taper votre Module 2</h3><ul style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:17.6px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:300;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;"><li style="box-sizing:border-box;font-size:15px;">taper le 1ere sous module</li></ul><h3 style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">Et plus encore...</h3><ul style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:17.6px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:300;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;"><li style="box-sizing:border-box;font-size:15px;">taper ici</li></ul>' );


    } )
    .catch( error => {
        console.log( error );
    } );
    CKEDITOR.ClassicEditor.create(document.getElementById("Programmeu"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|', 'blockQuote', 'insertTable', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Taper ici les objectifs',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            })
            .then( newEditor => {
              programmeu = newEditor;
              programmeu.setData( '<h3 style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">Module 1 : Taper votre Module 1</h3><ul style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:17.6px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:300;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;"><li style="box-sizing:border-box;font-size:15px;">taper le 1ere sous module</li></ul><h3 style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">Module 2 : Taper votre Module 2</h3><ul style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:17.6px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:300;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;"><li style="box-sizing:border-box;font-size:15px;">taper le 1ere sous module</li></ul><h3 style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">Et plus encore...</h3><ul style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:17.6px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:300;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;"><li style="box-sizing:border-box;font-size:15px;">taper ici</li></ul>' );


    } )
    .catch( error => {
        console.log( error );
    } );
    CKEDITOR.ClassicEditor.create(document.getElementById("objectif"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|', 'blockQuote', 'insertTable', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Taper ici les objectifs',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            })
            .then( newEditor => {
              objectif = newEditor;

    } )
    .catch( error => {
        console.log( error );
    } );

    CKEDITOR.ClassicEditor.create(document.getElementById("objectifu"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|', 'blockQuote', 'insertTable', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Taper ici les objectifs',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            })
            .then( newEditor => {
              objectifu = newEditor;

    } )
    .catch( error => {
        console.log( error );
    } );

$(document).ready(function(){
  $('#gererCategoriesModal').on('hidden.bs.modal', function () {
    $('body').removeClass('modal-open');
    $('body').css('padding-right', '');
    $('#ajouterFormationModal').css('overflow-y', 'auto');
  });
});



    </script>
  </body>
</html>
