const titre=document.getElementById("titreSupport");
const support=document.getElementById("support");
const formation=document.getElementById("titreFormation");
const addsupportbtn=document.getElementById("addsupport");
let fichier;
support.addEventListener('change',function(event) {
    fichier = event.target.files[0];
 });
 addsupportbtn.onclick=(e)=>{
    e.preventDefault();
    addsupport(titre.value,fichier,formation.value);
    const modalElement = document.getElementById('ajouterSupportModal');
    $(modalElement).modal('hide');
    $('.modal-backdrop').remove();
    var formElement = document.getElementById('ajouterSupportForm');
    formElement.reset();
    // fetchData();
    
 }
 function suppdialog(id){
    Swal.fire({
        title: "Do you want to delete the Support?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
            deleteSupport(id);
          Swal.fire("deleted Support", "", "success");
        
        } 
      });
}

 async function addsupport(titre, fichier, id_formation) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/supports`;
    const formData = new FormData();
    formData.append('titre', titre);
    formData.append('fichier', fichier);
    formData.append('id_formation', id_formation);

    try {
        const loading = document.getElementById("loading");
    loading.style.display = "block";
        $.ajax({
            url: urlAPI,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('suport ajouté avec succès:', response);
                fetchData();
                // Vous pouvez traiter les données mises à jour ici si nécessaire
                // console.log('add Post:', addPost);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Erreur lors de l\'ajout du formateur:', errorThrown);
                // alert('Une erreur est survenue lors de la mise à jour du post.');
            }
        });
    } catch (error) {
        console.error('Error add support:', error);
    }
}
async function fetchData() {
    // Supprimer le contenu existant de la table
    $('#example1').DataTable().clear().draw();
  
    const urlAPI = 'http://127.0.0.1:8000/api/v1/supports';
    const loading = document.getElementById("loading");
    loading.style.display = "block";
  
    try {
        const data = await lireAPI(urlAPI);
        if (data) {
          $('#example1').DataTable().clear().draw();
            // Ajouter les nouvelles lignes à la table
            for (const support of data) {
                $('#example1').DataTable().row.add([
                    support.titre,
                    ` <td><a href="Support/${support.fichier}" download="${support.fichier}">${support.fichier}</a></td>`,
                    support.formation,
                    `<i id="supp" onclick="suppdialog(${support.id})"  class="fas fa-trash-alt text-danger"></i>`
                    
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
  async function deleteSupport(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/supports/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'DELETE',
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        fetchData();
    } catch (error) {
        console.error('Error deleting support:', error);
        alert('Une erreur est survenue lors de la suppression du support.');
    }
}