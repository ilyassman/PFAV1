var nom=document.getElementById("nomEcole")
var propos=document.getElementById("propos")
var numero_whatsapp=document.getElementById("numeroWhatsApp")
var facebook=document.getElementById("facebook")
var instagram=document.getElementById("instagram")
var twitter=document.getElementById("twitter")
var email=document.getElementById("email")
let logo;
let video;
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
    var tableecole = document.getElementById("tbodyecole");
    const urlAPI = 'http://127.0.0.1:8000/api/v1/ecole';
    const loading = document.getElementById("loading");
    tableecole.innerHTML = '';
    loading.style.display = "block";
    try {
        var form = await lireAPI(urlAPI);
        console.log(form);
        if (form) {
            
                tableecole.innerHTML += `
                    <tr>
                        <th>Nom de l'école:</th>
                        <td id="nomEcoleValue">${form.nom ? form.nom : 'Champ vide, veuillez le remplir'}</td>
                    </tr>
                    <tr>
                        <th>Logo:</th>
                        <td>
                            ${form.logo ? `<img src="/Ecolelogo/${form.logo}" alt="Logo">` : `<p>Logo non disponible, veuillez le télécharger</p>`}
                        </td>
                    </tr>
                    <tr>
                        <th>Propos:</th>
                        <td id="proposValue">${form.propos ? form.propos : 'Champ vide, veuillez le remplir'}</td>
                    </tr>
                    <tr>
                        <th>Facebook:</th>
                        <td id="facebookValue">
                            ${form.facebook ? `<a href="${form.facebook}" target="_blank">${form.facebook}</a>` : `<p>Facebook non renseigné</p>`}
                        </td>
                    </tr>
                    <tr>
                        <th>Instagram:</th>
                        <td id="instagramValue">
                            ${form.instagram ? `<a href="${form.instagram}" target="_blank">${form.instagram}</a>` : `<p>Instagram non renseigné</p>`}
                        </td>
                    </tr>
                    <tr>
                        <th>Twitter:</th>
                        <td id="twitterValue">
                            ${form.twitter ? `<a href="${form.twitter}" target="_blank">${form.twitter}</a>` : `<p>Twitter non renseigné</p>`}
                        </td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td id="emailValue">${form.email ? form.email : 'Champ vide, veuillez le remplir'}</td>
                    </tr>
                    <tr>
                        <th>Numéro WhatsApp:</th>
                        <td id="numeroWhatsAppValue">${form.numero_whatsapp ? form.numero_whatsapp : 'Champ vide, veuillez le remplir'}</td>
                    </tr>`;
            
        } else {
            alert("error loading data");
        }
    } finally {
        loading.style.display = "none";
    }
}

document.getElementById("logo").addEventListener('change', function(event) {
    logo = event.target.files[0];
 });
 document.getElementById("video").addEventListener('change', function(event) {
    video = event.target.files[0];
 });

document.getElementById("btnecole").onclick=function (e){
    e.preventDefault();
    console.log(numero_whatsapp.value)
    addecole(nom.value, logo, video, propos.value, numero_whatsapp.value,facebook.value,instagram.value,twitter.value,email.value);
    const modalElement = document.getElementById('modifierEcoleModal');
    $(modalElement).modal('hide');
    $('.modal-backdrop').remove();
}


async function addecole(nom, logo, video, propos, numero_whatsapp,facebook,instagram,twitter,email) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/ecole`;
    const formData = new FormData();
    formData.append('nom', nom);
    formData.append('logo', logo);
    formData.append('video', video);
    formData.append('propos', propos);
    formData.append('whatsapp', numero_whatsapp);
    formData.append('facebook', facebook);
    formData.append('instagram', instagram);
    formData.append('twitter', twitter);
    formData.append('email', email);
    

    try {
        $.ajax({
            url: urlAPI,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Ecole Modifier avec succès:', response);
                fetchData() 
                logo=null;video=null;
                // Vous pouvez traiter les données mises à jour ici si nécessaire
                // console.log('add Post:', addPost);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Erreur lors de l\'ajout du formateur:', errorThrown);
                // alert('Une erreur est survenue lors de la mise à jour du post.');
            }
        });
    } catch (error) {
        console.error('Error add post:', error);
    }
}
