<!DOCTYPE html>
<html lang="en">

<head>
    <title>Académique &mdash; Site Web par Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="css/aos.css">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/1cf483120b.js" crossorigin="anonymous"></script>
    <style>
        .site-navbar .site-navigation .site-menu .has-children .dropdown>li>a {
            padding: 9px 20px;
            width: 500px;
            display: block;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }

        body {
            background-color: #f7f6f6
        }

        .card {
            border: none;

        }


        .dots {

            height: 4px;
            width: 4px;
            margin-bottom: 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .badge {

            padding: 7px;
            padding-right: 9px;
            padding-left: 16px;
            box-shadow: 5px 6px 6px 2px #e9ecef;
        }

        .user-img {

            margin-top: 4px;
        }

        .check-icon {

            font-size: 17px;
            color: #c3bfbf;
            top: 1px;
            position: relative;
            margin-left: 3px;
        }

        .form-check-input {
            margin-top: 6px;
            margin-left: -24px !important;
            cursor: pointer;
        }


        .form-check-input:focus {
            box-shadow: none;
        }


        .icons i {

            margin-left: 8px;
        }

        .reply {

            margin-left: 12px;
        }

        .reply small {

            color: #b7b4b4;

        }


        .reply small:hover {

            color: green;
            cursor: pointer;

        }

        .comment {
            width: 60%;
        }

        .underline {
            width: 90%;
            height: 1.5px;
            background-color: #ccc;
        }

        .comment-title {
            color: black;
            font-size: 24px;
            font-weight: 800;
        }

        .icons .fa-star {
            font-size: 16px;
        }

        .user-info {
            width: 85%;
        }
        .zone-commentaire{
    padding: 30px 0;
    display: flex ;
    justify-content: center;
    align-content: center;
}

.zone-commentaire .zone-carte {
    background-color: rgb(255, 255, 255);
    border : none ;
    border-radius: 20px;
    width: 80% ;
    padding: 10px ;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);

}
.zone-etoiles{
    display: flex ;
    justify-content: center ;
    align-items: center ;
}

.zone-etoiles .etoiles {
  display: flex;
  align-items: center;
  gap: 25px;
}
.zone-etoiles .etoiles i {
  color: #e6e6e6;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.zone-etoiles .etoiles i.active {
  color: #ff9c1a;
}
.bouton-annuler {
    background-color: rgb(230, 93, 93);
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.bouton-ajouter {
    background-color: green;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}


    </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <x-header  />
        

        <div class="custom-breadcrumns border-bottom" style="margin-top:0">
            <div class="container">
                <a href="{{ route('home') }}">Accueil</a>
                <span class="mx-3 icon-keyboard_arrow_right"></span>
                <a href="{{ route('courses') }}">Cours</a>
                <span class="mx-3 icon-keyboard_arrow_right"></span>
                <span class="current">Cours</span>
            </div>
        </div>

        <div class="video-section">
            <div class="mejs__container-fullscreen container_">
                <div class="row">
                    <div class="col-lg-8 col-12 info">
                        <h1>Formation : {{ $formation->titre }}

                            <!-- Autres détails de la formation... -->
                        </h1>
                        <p>Présentation : {{ $formation->contenue }}</p>
                        {{-- <div class="info-formateur">
                            <div class="img-formateur"><img src="prof.jpeg" alt=""></div>
                            <p class="name-formateur">Enseignant <br> <span> EMS AFRIQUE</span>
                            </p>
                        </div> --}}

                    </div>
                    <div class="col-lg-4 col-12 video">
                        <div class="mx-auto">
                            <a href="Formationvideo/{{ $formation->video }}" class="video-1 mb-4" data-fancybox=""
                                data-ratio="2">
                                <span class="play">
                                    <span class="icon-play"></span>
                                </span>
                                <img src="Formationpic/{{ $formation->image }}" alt="Image" class="img-fluid rounded"
                                    style="max-width: 100%;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-bg presentation style-1">
            <div class="container">
                <div class="roww">
                    <h1>Présentation:
                    </h1>
                    <p> {{ $formation->contenue }}
                    </p>
                    <h1>Niveau <i class="fas fa-users"></i>
                    </h1>
                    <p>{{ $formation->niveau }}</p>
                    <h1>Prérequis <i class="fas fa-check-circle"></i>
                    </h1>
                    <p>{{ $formation->prerequis }}</p>
                    <h1>Objectifs <i class="fas fa-bullseye"></i></h1>
                    {!! $formation->objectif !!}
                    <h1> Programme de la formation <i class="fas fa-list-ul"></i></h1>
                    {!! $formation->programme !!}
                    @if(!$isInscrit)
                    <a href="{{ route('inscription', ['id' => Crypt::encrypt($formation->id)]) }}"
                        class="small btn btn-primary px-2 py-2 rounded-2 mt-2">

                        <span class="icon-users mr-1"></span> S'inscrire

                    </a>
                    @else
                    <a href="{{ route('formation_membre', ['id' => Crypt::encrypt($formation->id)]) }}"
                        class="small btn btn-primary px-2 py-2 rounded-2 mt-2">

                        <span class="icon-users mr-1"></span> Consulter

                    </a>
                    @endif
                </div>
            </div>
        </div>




        <div class="clcl"></div>
        <div class="section-bg presentation style-1 comment" style="padding:0 30px;">
            <div class="container mt-5" style="padding-top: 30px;">
                <h2 class="comment-title">
                    <i class="fa fa-star text-warning"></i>
                    @if($vote)
                    {{$vote[0]->nbr}}
                    @else
                    0
                    @endif
                    note de cours
                </h2>
                <div class="row d-flex justify-content-center" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <!--A single comment--------------------->
                        <div class="comment-container" @if(count($comments) === 0) style="height:100px"  @elseif (count($comments) === 1) style="min-height:180px" @elseif (count($comments) === 2) style="min-height:250px" @else style="min-height: 300px; overflow-y: scroll;" @endif>
                            @if(count($comments) === 0)
                                <p>Aucun commentaire pour le moment.</p>
                            @else
                                @foreach ($comments as $comment)
                                <div class="underline"></div>
                                <div class="card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="user user-info d-flex flex-row align-items-center">
                                            <img src="Membrespic/{{$comment->image}}" width="30"
                                                class="user-img rounded-circle mr-2">
                                            <span><small class="font-weight-bold text-primary">{{$comment->nom}}
                                                    {{$comment->prenom}}</small> <small
                                                    class="font-weight-bold">{{$comment->contenu}}</small></span>
                                        </div>
                                        <small>{{$comment->created_at}}</small>
                                    </div>
                                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                                        <div class="reply px-4">
                                            @if(isset($membre->id) && $comment->membre_id==$membre->id)
                                            <small id="{{$comment->id}}">Supprimer</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--end of single comment--------------------->
                                @endforeach
                            @endif
                            <button type="button" class="btn btn-dark bouton-ajouter-commentaire" data-toggle="modal" data-target="#modal-commentaire">Add Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-commentaire" tabindex="-1" aria-labelledby="modal-commentaire-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Ajout de la classe "modal-lg" pour une largeur plus grande -->
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Bouton pour fermer la modal -->
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="zone-commentaire">
                            <div class="col-md-6 zone-carte">
                                <div class="card">
                                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                        <div>
                                            <!-- Image de l'utilisateur -->
                                            <img src="url_de_l_image_statique" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
                                            <!-- Nom de l'utilisateur -->
                                            <span class="ms-2 ml-2">Nom de l'utilisateur</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Zone de notation statique -->
                                        <div class="zone-etoiles">
                                            <div class="etoiles">
                                                <!-- Étoiles statiques -->
                                                <i class="fa-solid fa-star active"></i>
                                                <i class="fa-solid fa-star active"></i>
                                                <i class="fa-solid fa-star active"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <!-- Zone de commentaire statique -->
                                        <textarea id="commentin" class="form-control mt-3" placeholder="What is your view?">Commentaire statique</textarea>
                                    </div>
                                    <div class="card-footer d-flex bg-white justify-content-between align-items-center">
                                        <!-- Bouton d'ajout de commentaire (statique) -->
                                        <button type="button" class="btn bouton-ajouter" data-mdb-ripple-init>Ajouter <i class="fa-solid fa-arrow-right" style="font-size: 13px"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="https://api.whatsapp.com/send?phone=212606178638&text=Bienvenue%20dans%20notre%20formation."
            class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>

        @if(isset($datas))
        <x-footer :datas="$datas" />
        @endif


    </div>
    <!-- .site-wrap -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#51be78" />
        </svg></div>
        <script src="js/ajaxjs/sendcomment.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>


    <script src="js/header.js"></script>

    <script src="js/main.js"></script>
    <script>
        function supprimerCommentaire(element) {
          var commentaire = element.closest('.card');
          commentaire.remove();
        }

    </script>


</body>

</html>
