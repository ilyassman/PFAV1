const btnaddformation=document.getElementById("addforamtion");
const titre=document.getElementById("titre");
const prix=document.getElementById("prix");
const contenue=document.getElementById("contenu");
const isDispo=document.getElementById("disponibilite");
const categform=document.getElementById("selectcateg");
const langue=document.getElementById("langue");
const imagef=document.getElementById("image");
const videof=document.getElementById("video");
const niveau=document.getElementById("niveau");
const inputprerequis=document.getElementsByName("prerequis");
let filepic;
let filevideo;
// ------------------------partie update-----------------------------------
const btnupdateformation=document.getElementById("updateforamtion");
const titreu=document.getElementById("titreu");
const prixu=document.getElementById("prixu");
const contenueu=document.getElementById("contenuu");
const isDispou=document.getElementById("disponibiliteu");
const categformu=document.getElementById("selectcategu");
const langueu=document.getElementById("langueu");
const niveauu=document.getElementById("niveauu");
const inputprerequisu=document.getElementsByName("prerequisu");

// ------------------------fin partie update-------------------------------
function removePrerequisu(element) {
    console.log(j)
    
    if(j-1!=0){
        element.closest('.input-group').remove();
    j--;
      }
  }
async function updatedialogfor(id){
    j=0
    var data = await lireAPI("http://127.0.0.1:8000/api/v1/formations/"+id);
    var prerequist=[];
    titreu.value=data.titre;
    prixu.value=data.prix;
    contenueu.value=data.contenue;
    isDispou.value=data.disponibilite;
    categformu.value=data.categ_id;
    langueu.value=data.langue;
    niveauu.value=data.niveau;
    prerequist=data.prerequis.split(",");
    const prerequiu=document.getElementsByName("prerequisu");
    var containeru = document.getElementById("prerequisContaineru");
    containeru.innerHTML=`<div class="input-group mb-1">
    <input type="text" class="form-control" name="prerequisu" required>
    <div class="input-group-append">
      <button type="button" class="btn btn-danger btn-remove" onclick="removePrerequisu(this)">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>`
    prerequiu[0].value=prerequist[0]
    prerequist.forEach(prerequi => {
      if(j>=1 && prerequist[j]){ 
      console.log("ajouet de "+prerequist[j]+" a la table")
      var inputGroup = document.createElement("div");
      inputGroup.className = "input-group mb-1";
      var input = document.createElement("input");
      input.type = "text";
      input.className = "form-control";
      input.name = "prerequisu";
      input.required = true;
      input.value=prerequist[j]
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
      
      }
      j++;
    });
    objectifu.setData(data.objectif)
    programmeu.setData(data.programme)
    btnupdateformation.onclick=(e)=>{
        e.preventDefault();
        var prerequis=[];
        e.preventDefault();
        inputprerequisu.forEach(prerequi => {
            prerequis.push(prerequi.value)
        });
        const prerequischaine=prerequis.join(",");
        updateFormation(id,titreu.value,prixu.value,contenueu.value,isDispou.value,categformu.value,langueu.value,niveauu.value,prerequischaine,objectifu.getData(),programmeu.getData());
        const modalElement = document.getElementById('modifierFormationModal');
        $(modalElement).modal('hide');
        $('.modal-backdrop').remove();
        fetchDataFor();

    }




}
function suppdialog(id){
    Swal.fire({
        title: "Do you want to delete the Formation?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("deleted Fomration", "", "success");
          deleteForm(id);
        } 
      });
}
async function deleteForm(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/formations/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'DELETE',
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        fetchDataFor();
    } catch (error) {
        console.error('Error deleting formation:', error);
        alert('Une erreur est survenue lors de la suppression du post.');
    }
}
imagef.addEventListener('change', function(event) {
    filepic = event.target.files[0];
 });
videof.addEventListener('change', function(event) {
    filevideo = event.target.files[0];
 });


 async function addformation(titre, prix, contenue, isDispo, categform, langue, niveau, prerequis, objectif, programme, image, video) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/formations`;
    const formData = new FormData();
    formData.append('titre', titre);
    formData.append('prix', prix);
    formData.append('disponibilite', isDispo);
    formData.append('contenue', contenue);
    formData.append('categ_id', categform);
    formData.append('langue', langue);
    formData.append('niveau', niveau);
    formData.append('prerequis', prerequis);
    formData.append('objectif', objectif);
    formData.append('programme', programme);
    formData.append('image', image);
    formData.append('video', video);

    // Afficher la div de chargement
    $('#loadingf').show();

    try {
        $.ajax({
            url: urlAPI,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Cacher la div de chargement
                $('#loadingf').hide();

                fetchDataFor();
                console.log('Formation ajoutée avec succès:', response);
                // Vous pouvez traiter les données mises à jour ici si nécessaire
                // console.log('add Post:', addPost);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Cacher la div de chargement
                $('#loadingf').hide();

                console.error('Erreur lors de l\'ajout du formation:', errorThrown);
                // alert('Une erreur est survenue lors de la mise à jour du post.');
            }
        });
    } catch (error) {
        // Cacher la div de chargement
        $('#loadingf').hide();

        console.error('Error add formation:', error);
    }
}

btnaddformation.onclick=function(e){
    var prerequis=[];
    e.preventDefault();
    inputprerequis.forEach(prerequi => {
        prerequis.push(prerequi.value)
    });
    const prerequischaine=prerequis.join(",");
    addformation(titre.value,prix.value,contenue.value,isDispo.value,categform.value,langue.value,niveau.value,prerequischaine,objectif.getData(),programme.getData(),filepic,filevideo);
    const modalElement = document.getElementById('ajouterFormationModal');
    $(modalElement).modal('hide');
    $('.modal-backdrop').remove();
    
    

}



async function fetchDataFor() {
    table.innerHTML="";
    const urlAPI = 'http://127.0.0.1:8000/api/v1/formations';
    const loading=document.getElementById("loadingf");
    loading.style.display="block";
    try{var data = await lireAPI(urlAPI);
      if (data) {
        $('#example1').DataTable().clear().draw();
        for (const form of data) {
            $('#example1').DataTable().row.add([
                form.titre,
                form.prix,
                form.contenue,
                form.disponibilite == 1 ? 'Disponible' : 'Indisponible',
                form.created_at,
                form.langue,
                `<div class="col-lg-4 col-12 video">
                    <div class="mx-auto">
                        <a href="Formationvideo/${form.video}" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                            <span class="play">
                                <span class="icon-play"></span>
                            </span>
                            <img src="Formationpic/${form.image}" alt="Image" style="width: 50px; height: 50px" />
                        </a>
                    </div>
                </div>`,
                form.niveau,
                form.prerequis,
                form.objectif,
                form.programme,
                ` <i id="supp" onclick="suppdialog(${form.id})" class="fas fa-trash-alt text-danger"></i>
                <!-- Icône de suppression -->
                <i
                            onclick="updatedialogfor(${form.id})"
                             id="supp" class="fas fa-edit text-primary ml-2"
                            data-target="#modifierFormationModal"
                            data-toggle="modal"
                            ></i>`
            ]).draw();
        }
    }
         else {
     alert("error loading data");
    }
}finally{
    loading.style.display="none";
}
  }
  async function updateFormation(id,titre, prix, contenue, isDispo, categform, langue, niveau, prerequis, objectif, programme ) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/formations/${id}`;
    console.log(JSON.stringify({ titre, prix, contenue, disponibilite: isDispo, categ_id: categform, langue, niveau, prerequis, objectif, programme }))

    try {
        const response = await fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify({ titre, prix, contenue, disponibilite: isDispo, categ_id: categform, langue, niveau, prerequis, objectif, programme }),
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