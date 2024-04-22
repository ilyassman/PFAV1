var nom=document.getElementById("nomEcole")
var propos=document.getElementById("propos")
var numero_whatsapp=document.getElementById("numeroWhatsApp")
var facebook=document.getElementById("facebook")
var instagram=document.getElementById("instagram")
var twitter=document.getElementById("twitter")
var email=document.getElementById("email")
let logo;
let video;
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
