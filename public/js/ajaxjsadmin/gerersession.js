const sessions=document.getElementById("sessionList");
sessions.onchange=()=>{
    fetchData();
}
function supprimerMembre(element) {
    const id = element.parentElement.getAttribute("value");
    deleteMembre(id,sessions.value);
    element.parentElement.remove();
  }
  async function deleteMembre(id,idsession) {
    const urlAPI = `http://127.0.0.1:8000/api/inscriptiondeletemembre/${id}/${idsession}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'DELETE',
        });

        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
    } catch (error) {
        console.error('Error deleting membre:', error);
        alert('Une erreur est survenue lors de la suppression du post.');
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
// Fonction pour récupérer les données
async function fetchData() {
    selectedMembersContainer.innerHTML = '';
    const urlAPI = 'http://127.0.0.1:8000/api/sessionmembres/' + sessions.value;
    const loading = document.getElementById("loading");
    try {
        var data = await lireAPI(urlAPI);
        if (data) {
            data.forEach(membre => {
                var memberName = membre.nom;
                var memberEmail = membre.email;
                var memberStatus = membre.etat === 0 ? "En cours" : "Validé";
                var statusBadge = membre.etat === 0 ? "<span class='badge badge-danger' onclick='changerEtat(this, " + membre.id + ")' style='cursor: pointer;'>En cours</span>" : "<span class='badge badge-success' onclick='changerEtat(this, " + membre.id + ")' style='cursor: pointer;'>Validé</span>";
                var statusIcon = membre.etat === 0 ? "<i class='fas fa-exclamation-circle text-danger'></i>" : "<i class='fas fa-check-circle text-success'></i>";

                var existingMembers = selectedMembersContainer.getElementsByClassName("selected-member");
                var alreadyAdded = false;
                for (var j = 0; j < existingMembers.length; j++) {
                    if (existingMembers[j].innerText.includes(memberName)) {
                        alreadyAdded = true;
                        break;
                    }
                }

                if (!alreadyAdded) {
                    var memberElement = document.createElement("div");
                    memberElement.classList.add("selected-member");
                    memberElement.setAttribute("value", membre.id);
                    memberElement.innerHTML = `<i value=${membre.id} class="fas fa-user membre-user"></i> ${membre.nom}  ${membre.prenom} (${membre.email}) ${statusBadge} <i class="fas fa-times-circle membre-delete" onclick="supprimerMembre(this)" style='cursor: pointer;'></i>`;
                    selectedMembersContainer.appendChild(memberElement);
                }
            });
        } else {
            alert("Erreur lors du chargement des données");
        }
    } finally {
        // Le reste du code de votre fonction fetchData()
    }
}

async function changerEtat(badge, memberId) {
    var newStatus = badge.innerText.trim() === "En cours" ? 1 : 0;
    updateEtat(memberId,sessions.value,newStatus);
    if (true ) {
        badge.innerText = newStatus === 0 ? "En cours" : "Validé";
        badge.classList.toggle("badge-danger");
        badge.classList.toggle("badge-success");
        badge.setAttribute("onclick", "changerEtat(this, " + memberId + ")");
    } else {
        alert("Erreur lors de la mise à jour de l'état.");
    }
}




fetchData();
async function updateEtat(idmembre,idsession,etat) {
    const urlAPI = `http://127.0.0.1:8000/api/inscriptionupdate/${idmembre}/${idsession}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify({ etat }),
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

async function addmembre(etat, id_membre, id_session) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/inscription`;
    try {
        const response = await fetch(urlAPI, {
            method: 'POST',
            body: JSON.stringify({ etat, id_membre, id_session }),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
        // Vous pouvez traiter les données mises à jour ici si nécessaire
        // console.log('add Post:', addPost);
    } catch (error) {
        // console.error('Error add post:', error);
        // alert('Une erreur est survenue lors de la mise à jour du post.');
    }
}
