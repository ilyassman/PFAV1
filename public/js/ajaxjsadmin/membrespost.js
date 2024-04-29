const namee=document.getElementById("nom");
const prenom=document.getElementById("prenom");
const email=document.getElementById("email");
const tele=document.getElementById("telephone");
const password=document.getElementById("motdepasse");
const butmemb=document.getElementById("postmem");
const butupdate=document.getElementById("butmodifier");
const image=document.getElementById("image");
const table=document.getElementById("tablebody");
const nameu=document.getElementById("nomu");
const prenomu=document.getElementById("prenomu");
const emailu=document.getElementById("emailu");
const teleu=document.getElementById("telephoneu");
const passwordu=document.getElementById("motdepasseu");
const imague=document.getElementById("imageu");
let fichier;
async function updatedialog(id){
    var data = await lireAPI("http://127.0.0.1:8000/api/v1/membres/"+id);
    nameu.value=data[0].nom;
    prenomu.value=data[0].prenom;
    emailu.value=data[0].email;
    teleu.value=data[0].num_tel;
  butupdate.onclick=function(e){
    e.preventDefault();
    updateUser(id, emailu.value,passwordu.value,teleu.value,nameu.value,prenomu.value,fichier);
    const modalElement = document.getElementById('modifierMembreModal');
    $(modalElement).modal('hide');
    $('.modal-backdrop').remove();
    fetchData(table);
   
  }  
}
async function fetchData(table) {
  // Supprimer le contenu existant de la table
  $('#example1').DataTable().clear().draw();

  const urlAPI = 'http://127.0.0.1:8000/api/v1/membres/';
  const loading = document.getElementById("loading");
  loading.style.display = "block";

  try {
      const data = await lireAPI(urlAPI);
      if (data) {
        $('#example1').DataTable().clear().draw();
          // Ajouter les nouvelles lignes à la table
          for (const membr of data) {
              $('#example1').DataTable().row.add([
                  membr.nom,
                  membr.prenom,
                  membr.email,
                  membr.num_tel, // Vous pouvez utiliser une autre méthode pour gérer les mots de passe
                  `<img src="/Membrespic/${membr.image}" alt="Image" style="width: 50px; height: 50px" />`,
                  `<i id="supp" onclick="suppdialog(${membr.id})" class="fas fa-trash-alt text-danger"></i>
                  <i onclick="updatedialog(${membr.id})" data-toggle="modal" data-target="#modifierMembreModal" id="supp" class="fas fa-edit text-primary ml-2"></i>`
              ]).draw();
          }
      } else {
          alert("error loading data");
      }
  } finally {
      loading.style.display = "none";
  }
}

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


image.addEventListener('change', function(event) {
     fichier = event.target.files[0];
  });
butmemb.onclick=function(e){
    e.preventDefault(); 
    Swal.fire({
        title: "Ajout de membre en cours...",
        html: "Veuillez patienter un peu.",
        showConfirmButton: false,
        didOpen: () => {
          Swal.showLoading();
          adduser(email.value, password.value, tele.value, 2).then(id => {
            addmembre(namee.value, prenom.value, id, fichier).then(() => {
              Swal.close();
              const modalElement = document.getElementById('ajouterMembreModal');
              $(modalElement).modal('hide');
              $('.modal-backdrop').remove(); 
              document.getElementById('ajouterMembreForm').reset();
            });
          });
        }
        
       
        
       
        
     })
     .catch(error => {
       console.error('Une erreur s\'est produite lors de la récupération de l\'ID :', error);
     });
    
}


async function adduser( email, password, num_tel,type) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/users`;
    try {
        const response = await fetch(urlAPI, {
            method: 'POST',
            body: JSON.stringify({ email, password, num_tel , type }),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        const userData = await response.json();
        return userData;
        // Vous pouvez traiter les données mises à jour ici si nécessaire
        // console.log('add Post:', addPost);
    } catch (error) {
        // console.error('Error add post:', error);
        // alert('Une erreur est survenue lors de la mise à jour du post.');
    }
}


async function deleteMember(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/users/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'DELETE',
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
    } catch (error) {
        console.error('Error deleting post:', error);
        alert('Une erreur est survenue lors de la suppression du post.');
    }
}
async function deleteImage(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/membres/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'DELETE',
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        deleteMember(id);
        fetchData();
    } catch (error) {
        console.error('Error deleting post:', error);
        alert('Une erreur est survenue lors de la suppression du post.');
    }
}

function suppdialog(id){
    Swal.fire({
        title: "Do you want to delete the member?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("deleted membre", "", "success");
          deleteImage(id);
          
        } 
      });
}
async function addmembre(nom, prenom, iduser, image) {
  const urlAPI = `http://127.0.0.1:8000/api/v1/membres`;
  const formData = new FormData();
  formData.append('nom', nom);
  formData.append('prenom', prenom);
  formData.append('iduser', iduser);
  formData.append('image', image);
  try {
    loading.style.display = "block";
      $.ajax({
          url: urlAPI,
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
              console.log('Response from server:', response);
              console.log('Member added successfully');
              fetchData(table);

          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error('Error adding member:', errorThrown);
          }
      });
  } catch (error) {
      console.error('Error adding member:', error);
  }
}



async function updateUser(id, email, password, num_tel,nom,prenom,image) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/users/${id}`;
    console.log(JSON.stringify({ email, password, num_tel,nom,prenom,image }))

    try {
        const response = await fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify({ email, password, num_tel,nom,prenom,image }),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        
        const updatedPost = await response.json();
        // Vous pouvez traiter les données mises à jour ici si nécessaire
        // console.log('Updated Post:', updatedPost);
        
    } catch (error) {
        // console.error('Error updating post:', error);
        // alert('Une erreur est survenue lors de la mise à jour du post.');
    }
}


