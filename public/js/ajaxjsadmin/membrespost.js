const namee = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const email = document.getElementById("email");
const tele = document.getElementById("telephone");
const password = document.getElementById("motdepasse");
const butmemb = document.getElementById("postmem");
const butupdate = document.getElementById("butmodifier");
const image = document.getElementById("image");
const table = document.getElementById("tablebody");
const nameu = document.getElementById("nomu");
const prenomu = document.getElementById("prenomu");
const emailu = document.getElementById("emailu");
const teleu = document.getElementById("telephoneu");
const passwordu = document.getElementById("motdepasseu");
const imague = document.getElementById("imageu");
// -------msg erreur ajout---------------
const messageErreur = document.querySelector("#erreurname");
const erruerprenom = document.querySelector("#erreurprenom");
function isValidEmail(email) {
    // Expression régulière pour vérifier le format de l'e-mail
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
function containsOnlyDigits(str) {
    const digitsRegex = /^[0-9]+$/;
    return digitsRegex.test(str);
}
function champvide(inputname, erreurmessage) {
    if (inputname.value.length == 0) {
        erreurmessage.innerHTML = "Champ obligatoires";
        erreurmessage.style.display = "block";
        inputname.style.borderColor = "#dc3545";
        return false;
    } else {
        erreurmessage.style.display = "none";
        inputname.style.borderColor = "";
        return true;
    }
}
function champemailvalid(inputname, erreurmessage) {
    if (!isValidEmail(inputname.value)) {
        erreurmessage.innerHTML = "Veuillez entrer un email valide";
        erreurmessage.style.display = "block";
        inputname.style.borderColor = "#dc3545";
        return false;
    } else {
        erreurmessage.style.display = "none";
        inputname.style.borderColor = "";
        return true;
    }
}
function champphonelvalid(inputname, erreurmessage) {
    if (!containsOnlyDigits(inputname.value) || inputname.value.length != 10) {
        erreurmessage.innerHTML = "Numéro de téléphone invalide";
        erreurmessage.style.display = "block";
        inputname.style.borderColor = "#dc3545";
        return false;
    } else {
        erreurmessage.style.display = "none";
        inputname.style.borderColor = "";
        return true;
    }
}
function champpassvalid(inputname, erreurmessage) {
    if (inputname.value.length < 8) {
        erreurmessage.innerHTML =
            "Le mot de passe doit comporter au moins 8 caractères";
        erreurmessage.style.display = "block";
        inputname.style.borderColor = "#dc3545";
        return false;
    } else {
        erreurmessage.style.display = "none";
        inputname.style.borderColor = "";
        return true;
    }
}
function isEmailexists(email) {
    return fetch(`http://127.0.0.1:8000/api/isEmailexists/${email}`)
        .then((response) => response.json())
        .then((json) => json);
}

// ------------------------------------------------------
let fichier;
async function updatedialog(id) {
    var data = await lireAPI("http://127.0.0.1:8000/api/v1/membres/" + id);
    nameu.value = data[0].nom;
    prenomu.value = data[0].prenom;
    emailu.value = data[0].email;
    teleu.value = data[0].num_tel;
    butupdate.onclick = function (e) {
        e.preventDefault();
        if(emailu.value!=data[0].email){
        isEmailexists(emailu.value)
        .then((isexists) => {
            if(isexists){
                document.getElementById("erreuremailu").innerHTML = "Email deja existe";
                document.getElementById("erreuremailu").style.display = "block";
                emailu.style.borderColor = "#dc3545";
            }
            else{
                document.getElementById("erreuremailu").style.display = "none";
                emailu.style.borderColor = "";
        updateUser(
            id,
            emailu.value,
            passwordu.value,
            teleu.value,
            nameu.value,
            prenomu.value,
            fichier
        );
        const modalElement = document.getElementById("modifierMembreModal");
        $(modalElement).modal("hide");
        $(".modal-backdrop").remove();
        fetchData(table);
    }

});
    }
    else{
        updateUser(
            id,
            emailu.value,
            passwordu.value,
            teleu.value,
            nameu.value,
            prenomu.value,
            fichier
        );
        const modalElement = document.getElementById("modifierMembreModal");
        $(modalElement).modal("hide");
        $(".modal-backdrop").remove();
        fetchData(table);  
    }
  } 
}
async function fetchData(table) {
    // Supprimer le contenu existant de la table
    $("#example1").DataTable().clear().draw();

    const urlAPI = "http://127.0.0.1:8000/api/v1/membres/";
    const loading = document.getElementById("loading");
    loading.style.display = "block";

    try {
        const data = await lireAPI(urlAPI);
        if (data) {
            $("#example1").DataTable().clear().draw();
            // Ajouter les nouvelles lignes à la table
            for (const membr of data) {
                $("#example1")
                    .DataTable()
                    .row.add([
                        membr.nom,
                        membr.prenom,
                        membr.email,
                        membr.num_tel, // Vous pouvez utiliser une autre méthode pour gérer les mots de passe
                        `<img src="/Membrespic/${membr.image}" alt="Image" style="width: 50px; height: 50px" />`,
                        `<i id="supp" onclick="suppdialog(${membr.id})" class="fas fa-trash-alt text-danger"></i>
                  <i onclick="updatedialog(${membr.id})" data-toggle="modal" data-target="#modifierMembreModal" id="supp" class="fas fa-edit text-primary ml-2"></i>`,
                    ])
                    .draw();
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
        console.error("Une erreur s'est produite :", erreur);
        return null;
    }
}

image.addEventListener("change", function (event) {
    fichier = event.target.files[0];
});
namee.onkeyup = () => {
    champvide(namee, messageErreur);
};
prenom.onkeyup = () => {
    champvide(prenom, erruerprenom);
};
email.onkeyup = () => {
    champemailvalid(email, document.getElementById("erreuremail"));
    
};
tele.onkeyup = () => {
    champphonelvalid(tele, document.getElementById("erreurphone"));
};
password.onkeyup = () => {
    champpassvalid(password, document.getElementById("erreurpass"));
};
butmemb.onclick = function (e) {
    e.preventDefault();
    champvide(namee, messageErreur);
    champvide(prenom, erruerprenom);
    champemailvalid(email, document.getElementById("erreuremail"));
    champphonelvalid(tele, document.getElementById("erreurphone"));
    champpassvalid(password, document.getElementById("erreurpass"));
    if (
        !champvide(namee, messageErreur) ||
        !champvide(prenom, erruerprenom) ||
        !champemailvalid(email, document.getElementById("erreuremail")) ||
        !champphonelvalid(tele, document.getElementById("erreurphone")) ||
        !champpassvalid(password, document.getElementById("erreurpass"))
    ) {
        return; // Arrêtez l'exécution de la fonction si l'un des champs est vide
    } else {
        isEmailexists(email.value)
    .then((isexists) => {
        if(isexists){
            document.getElementById("erreuremail").innerHTML = "Email deja existe";
            document.getElementById("erreuremail").style.display = "block";
            email.style.borderColor = "#dc3545";
        }
        else{
            document.getElementById("erreuremail").style.display = "none";
            email.style.borderColor = "";
            Swal.fire({
                title: "Ajout de membre en cours...",
                html: "Veuillez patienter un peu.",
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                    adduser(email.value, password.value, tele.value, 2)
                        .then((id) => {
                            addmembre(namee.value, prenom.value, id, fichier).then(
                                () => {
                                    fichier = null;
                                    Swal.close();
                                    const modalElement =
                                        document.getElementById(
                                            "ajouterMembreModal"
                                        );
                                    $(modalElement).modal("hide");
                                    $(".modal-backdrop").remove();
                                    document
                                        .getElementById("ajouterMembreForm")
                                        .reset();
                                }
                            );
                        })
                        .catch((error) => {
                            console.error(
                                "Une erreur s'est produite lors de la récupération de l'ID :",
                                error
                            );
                        });
                },
            });
        }

    });
        
    }
};

async function adduser(email, password, num_tel, type) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/users`;
    try {
        const response = await fetch(urlAPI, {
            method: "POST",
            body: JSON.stringify({ email, password, num_tel, type }),
            headers: {
                "Content-Type": "application/json",
            },
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || "Something went wrong");
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
            method: "DELETE",
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || "Something went wrong");
        }
    } catch (error) {
        console.error("Error deleting post:", error);
        alert("Une erreur est survenue lors de la suppression du post.");
    }
}
async function deleteImage(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/membres/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: "DELETE",
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || "Something went wrong");
        }
        deleteMember(id);
        fetchData();
    } catch (error) {
        console.error("Error deleting post:", error);
        alert("Une erreur est survenue lors de la suppression du post.");
    }
}

function suppdialog(id) {
    Swal.fire({
        title: "Do you want to delete the member?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes",
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
    formData.append("nom", nom);
    formData.append("prenom", prenom);
    formData.append("iduser", iduser);
    formData.append("image", image);
    try {
        loading.style.display = "block";
        $.ajax({
            url: urlAPI,
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log("Response from server:", response);
                console.log("Member added successfully");
                fetchData(table);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error adding member:", errorThrown);
            },
        });
    } catch (error) {
        console.error("Error adding member:", error);
    }
}

async function updateUser(id, email, password, num_tel, nom, prenom, image) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/users/${id}`;
    console.log(
        JSON.stringify({ email, password, num_tel, nom, prenom, image })
    );

    try {
        const response = await fetch(urlAPI, {
            method: "PUT",
            body: JSON.stringify({
                email,
                password,
                num_tel,
                nom,
                prenom,
                image,
            }),
            headers: {
                "Content-Type": "application/json",
            },
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || "Something went wrong");
        }

        const updatedPost = await response.json();
        // Vous pouvez traiter les données mises à jour ici si nécessaire
        // console.log('Updated Post:', updatedPost);
    } catch (error) {
        // console.error('Error updating post:', error);
        // alert('Une erreur est survenue lors de la mise à jour du post.');
    }
}
