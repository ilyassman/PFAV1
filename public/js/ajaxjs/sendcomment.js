const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get("id");
const comment = document.getElementById("commentin");
const stars = document.querySelectorAll(".stars i"); 
document.querySelectorAll('.reply').forEach(function(bouton) {
    bouton.addEventListener('click', function() {
      Swal.fire({
  title: "Do you want to delete the comment?",
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: "Yes"
}).then((result) => {
  if (result.isConfirmed) {
    
         deletecomment(bouton.querySelector('small').getAttribute("id"));
       supprimerCommentaire(this);
          Swal.fire("Commentaire supprimé", "", "success");
      
  }
});
      
    });
  });

async function deletecomment(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/commentaires/${id}`;
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
 var numberOfSelectedStars;
// Loop through the "stars" NodeList
stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
      
      // Loop through the "stars" NodeList Again
      stars.forEach((star, index2) => {
        // Add the "active" class to the clicked star and any stars with a lower index
        // and remove the "active" class from any stars with a higher index
        index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
      });
      const selectedStars = document.querySelectorAll(".stars .active");
          numberOfSelectedStars = selectedStars.length;
    });
  });
stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
      
        fetch(`http://127.0.0.1:8000/decrypt-id/${id}`)
        .then((response) => response.json())
        .then((json) => {
            sendvote(numberOfSelectedStars,json.idmembre,json.idform);
        });
    })
})
const sendcomment = () => {
    fetch(`http://127.0.0.1:8000/decrypt-id/${id}`)
        .then((response) => response.json())
        .then((json) => {
            addcomment(comment.value,json.idmembre,json.idform);
        });
};

async function addcomment(contenu, membre_id, formation_id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/commentaires`;
    try {
        const response = await fetch(urlAPI, {
            method: "POST",
            body: JSON.stringify({
                contenu,
                membre_id,
                formation_id,
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
        comment.value='';
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your comment has been saved",
            showConfirmButton: false,
            timer: 1500
          });
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
           
          });
    }
}

async function sendvote(niveau_etoile, id_membre, id_formation) {
    const urlAPI = `http://127.0.0.1:8000/api/addvote/${id_membre}/${id_formation}`;
    try {
        const response = await fetch(urlAPI, {
            method: "POST",
            body: JSON.stringify({
                niveau_etoile,
                id_membre,
                id_formation,
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
        comment.value='';
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your vote has been saved",
            showConfirmButton: false,
            timer: 1500
          });
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
           
          });
    }
}