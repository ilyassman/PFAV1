async function lireAPI(url) {
  try {
    const reponse = await fetch(url);
    const donnees = await reponse.json();
    return donnees;
  } catch (erreur) {
    console.error('Une erreur s\'est produite :', erreur);
    return null;
  }
}
async function fetchData() {
  try {
    var data = await lireAPI("http://127.0.0.1:8000/api/v1/categories/");
    updateDOMWithData(data);
  } catch (error) {
    console.error('Erreur lors de la récupération des données:', error);
  }
  
}
function updateDOMWithData(data) {

}
fetchData();


document.getElementById('emplacement-entete').innerHTML = `
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

<div class="container">
  <div class="d-flex align-items-center">
    <div class="site-logo">
      <a href="index.html" class="d-block">
        <img src="images/logo.jpg" alt="Image" class="img-fluid">
      </a>
    </div>
    <div class="mr-auto">
      <nav class="site-navigation position-relative text-right" role="navigation">
        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
          <li class="active">
            <a href="index.html" class="nav-link text-left"><span class="icon-home mr-2"></span></a>
          </li>
          <li class="has-children">
            <a href="#" class="nav-link text-left">Génie Civil</a>
            <ul class="dropdown" >
              <li><a href="course-single.html">GÉNIE CIVIL AVANCÉ ET GESTION DE PROJETS BTP AVEC MS PROJECT</a></li>
              <li><a href="course-single.html">CONTRÔLE DE GESTION APPLIQUÉ AUX PROJETS DU BTP</a></li>
              <li><a href="course-single.html">CONCEPTION AVANCÉE DE STRUCTURES AVEC ROBOT STRUCTURAL ANALYSIS ET TEKLA STRUCTURES</a></li>
            </ul>
          </li>
          <li>
            <a href="courses.html" class="nav-link text-left">Certificats</a>
          </li>
        </ul>                                                                                                                                                                                                                                                                                          </ul>
      </nav>
    </div>
    <div class="ml-auto">
      <div class="social-wrap">
        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
          class="icon-menu h3"></span></a>
      </div>
    </div>
   
  </div>
</div>

</header>
`;

