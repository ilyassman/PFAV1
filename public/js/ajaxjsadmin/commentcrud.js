const table=document.getElementById("tablebody");



function suppcomment(id){
    Swal.fire({
        title: "Do you want to delete the comment?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("deleted comment", "", "success");
          deleteComment(id);
        } 
      });
}

async function deleteComment(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/commentaires/${id}`;
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
async function fetchData(table) {
    table.innerHTML="";
    const urlAPI = 'http://127.0.0.1:8000/api/v1/commentaires/';
    const loading=document.getElementById("loading");
    console.log(loading)
    loading.style.display="block";
    try{var data = await lireAPI(urlAPI);
    if (data) {
        $('#example1').DataTable().clear().draw();
        for (const comment of data) {
            console.log(comment.contenu);
            $('#example1').DataTable().row.add([
                    comment.contenu,
                    comment.created_at,
                    `${comment.nom} ${comment.prenom}`,
                    comment.titre,
                    `<i id="supp" onclick="suppcomment(${comment.id})" class="fas fa-trash-alt text-danger"></i>`
                 ]).draw();
        }
    } else {
     alert("error loading data");
    }
}finally{
    loading.style.display="none";
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