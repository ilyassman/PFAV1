const sessions=document.getElementById("sessionList");
sessions.onchange=()=>{
    fetchData();
}
function supprimerMembre(element) {
    const id = element.parentElement.getAttribute("value");
    deleteMembre(id);
    element.parentElement.remove();
  }
  async function deleteMembre(id) {
    const urlAPI = `http://127.0.0.1:8000/api/inscriptiondeletemembre/${id}`;
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
                var statusBadge = membre.etat === 0 ? "<span class='badge badge-danger' onclick='changerEtat(this, " + membre.id + ")'>En cours</span>" : "<span class='badge badge-success' onclick='changerEtat(this, " + membre.id + ")'>Validé</span>";
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
                    memberElement.innerHTML = `<i value=${membre.id} class="fas fa-user membre-user"></i> ${membre.nom}  ${membre.prenom} (${membre.email}) ${statusBadge} <i class="fas fa-times-circle membre-delete" onclick="supprimerMembre(this)"></i>`;
                    selectedMembersContainer.appendChild(memberElement);
                }
            });
        } else {
            alert("error loading data");
        }
    } finally {

    }
}

async function changerEtat(badge, memberId) {
    var newStatus = badge.innerText.trim() === "En cours" ? 1 : 0;
    // Mettre à jour l'état dans la base de données ou via une autre méthode appropriée
    // Exemple : var updated = await mettreAJourEtatDansAPI(memberId, newStatus);
    // Si la mise à jour est réussie, mettre à jour l'affichage
    if (true /* remplacez true par la condition de réussite de la mise à jour */) {
        badge.innerText = newStatus === 0 ? "En cours" : "Validé";
        badge.classList.toggle("badge-danger");
        badge.classList.toggle("badge-success");
        badge.setAttribute("onclick", "changerEtat(this, " + memberId + ")");
    } else {
        alert("Erreur lors de la mise à jour de l'état.");
    }
}




fetchData();
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
