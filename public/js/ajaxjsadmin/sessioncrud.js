const date_debut=document.getElementById('dateDebut');
const date_fun=document.getElementById('dateFin');
const nbd_place=document.getElementById('nbr');
const id_formateur=document.getElementById('formateur');
const id_formation=document.getElementById('formation');
const butt=document.getElementById('addsession');
const table=document.getElementById("tablebody");
const date_debutu=document.getElementById('dateDebutu');
const date_funu=document.getElementById('dateFinu');
const nbd_placeu=document.getElementById('nbru');
const id_formateuru=document.getElementById('formateuru');
const id_formationu=document.getElementById('formationu');
const buttu=document.getElementById('updatesession');

async function updatedialog(id){
    var data = await lireAPI("http://127.0.0.1:8000/api/v1/sessions/"+id);
    date_debutu.value=data[0].date_debut;
    date_funu.value=data[0].date_fun;
    nbd_placeu.value=data[0].nbd_place;
    id_formationu.value=data[0].id_formation;
    id_formateuru.value=data[0].id_formateur;
    buttu.onclick=function(e){
    e.preventDefault();
    updateSession(id, date_debutu.value, date_funu.value, nbd_placeu.value,id_formationu.value, id_formateuru.value);
    const modalElement = document.getElementById('modifierSessionModal');
    $(modalElement).modal('hide');
    $('.modal-backdrop').remove();
    fetchData(table);
   
  }  
}
async function updateSession(id, date_debut, date_fun, nbd_place,id_formation,id_formateur) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/sessions/${id}`;
    console.log(JSON.stringify({ date_debut, date_fun, nbd_place,id_formation,id_formateur }))

    try {
        const response = await fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify({ date_debut, date_fun, nbd_place,id_formation,id_formateur }),
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





butt.onclick=function(e){
    e.preventDefault(); 
    addsession(date_debut.value,date_fun.value,nbd_place.value,id_formation.value,id_formateur.value);
    const modalElement = document.getElementById('ajouterSessionModal');
    $(modalElement).modal('hide');
    $('.modal-backdrop').remove(); // Supprimer le backdrop
    fetchData(table);
    
}
function suppdialog(id){
    Swal.fire({
        title: "Do you want to delete the Session?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("deleted Session", "", "success");
          deleteSession(id);
        } 
      });
}
async function deleteSession(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/sessions/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'DELETE',
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        fetchData(table);
    } catch (error) {
        console.error('Error deleting post:', error);
        alert('Une erreur est survenue lors de la suppression du post.');
    }
}
async function addsession( date_debut, date_fun, nbd_place,id_formation,id_formateur) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/sessions`;
    console.log(JSON.stringify({ date_debut, date_fun, nbd_place,id_formation,id_formateur }))

    try {
        const response = await fetch(urlAPI, {
            method: 'POST',
            body: JSON.stringify({ date_debut, date_fun, nbd_place,id_formation,id_formateur }),
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

async function fetchData(table) {
    const urlAPI = 'http://127.0.0.1:8000/api/v1/sessions/';
    const loading = document.getElementById("loading");
    loading.style.display = "block";

    try {
        var data = await lireAPI(urlAPI);
        if (data) {
            // Vider la table existante
            $('#example1').DataTable().clear().draw();
            
            // Ajouter les nouvelles lignes
            for (const session of data) {
                $('#example1').DataTable().row.add([
                    session.date_debut,
                    session.date_fun,
                    session.nbd_place,
                    session.titre,
                    session.nom + ' ' + session.prenom,
                    `<i id="supp" onclick="suppdialog(${session.id})" class="fas fa-trash-alt text-danger"></i>
                    <i onclick="updatedialog(${session.id})" data-toggle="modal" data-target="#modifierSessionModal" id="supp" class="fas fa-edit text-primary ml-2"></i>`
                ]).draw();
            }
        } else {
            alert("error loading data");
        }
    } finally {
        loading.style.display = "none";
    }
}

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