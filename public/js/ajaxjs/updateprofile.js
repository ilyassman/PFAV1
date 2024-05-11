const namee = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const email = document.getElementById("email");
const tele = document.getElementById("num_tel");
const password = document.getElementById("password");
const butmemb = document.getElementById("postmem");
const image = document.getElementById("image");
var fichier;
image.addEventListener("change", function (event) {
    fichier = event.target.files[0];
});
butmemb.onclick = function (e) {
    e.preventDefault();

    Swal.fire({
        title: "Modification en cours...",
        html: "Veuillez patienter un peu.",
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
            fetch("http://127.0.0.1:8000/idsession")
    .then((response) => response.json())
    .then((json) => {
        updatemembre(
            json.iduser,
            namee.value,
            prenom.value,
            email.value,
            tele.value,
            password.value,
            fichier)
        .then(() => {
            console.log("sf sala");
            fetch(`http://127.0.0.1:8000/api/v1/membres/${json.iduser}`)
                .then((response) => response.json())
                .then((membre) => {
                    console.log("afficher");
                const infodetail =
                    document.getElementById("infodetail");
                    infodetail.innerHTML='';
                    console.log(membre[0]);
                infodetail.innerHTML+= `
                <div id="infodetail" class="d-flex flex-column align-items-center text-center">
                <img src="Membrespic/${membre[0].image}" alt="Admin" class="rounded-circle" width="150" height="150">
                
                <div class="mt-3">
               
                  <h4> ${membre[0].nom} ${membre[0].prenom}</h4>
                  <p class="text-muted font-size-sm">${ membre[0].email }</p>
                 
                </div>
                    `;
            const info2=document.getElementById("info2");
                    info2.innerHTML=`
                    <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Nom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            ${ membre[0].nom }
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Prénom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        ${ membre[0].prenom }
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        ${ membre[0].email }
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Numéro de téléphone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        ${ membre[0].num_tel }
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
data-nom="${ membre[0].nom }" data-prenom="${ membre[0].prenom }"
data-email="${ membre[0].email }" data-num-tel="${ membre[0].num_tel }">
<i class="fa-solid fa-pen-to-square"></i> Edit
</button>
                    `
                            fichier = null;
                    Swal.close();
                    const modalElement =
                        document.getElementById("editModal");
                    $(modalElement).modal("hide");
                    $(".modal-backdrop").remove();
                    document.getElementById("editForm").reset();
                    });
                    })
                    
                    ;
          
            })
            .catch((error) => {
                console.error(
                    "Une erreur s'est produite lors de la mise a jours :",
                    error
                );
            });
    },
});

};


async function updatemembre(id, nom, prenom, email, tel, pass, image) {
  const urlAPI = `http://127.0.0.1:8000/api/updatemembre/${id}`;
  const formData = new FormData();
  formData.append("nom", nom);
  formData.append("prenom", prenom);
  formData.append("image", image);
  formData.append("email", email);
  formData.append("num_tel", tel);
  formData.append("password", pass);

  return new Promise((resolve, reject) => {
      $.ajax({
          url: urlAPI,
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
              console.log("Response from server:", response);
              console.log("Member updated successfully");
              resolve(response); // Résoudre la promesse avec la réponse
          },
          error: function (jqXHR, textStatus, errorThrown) {
              console.error("Error updating member:", errorThrown);
              reject(errorThrown); // Rejeter la promesse avec l'erreur
          },
      });
  });
}
