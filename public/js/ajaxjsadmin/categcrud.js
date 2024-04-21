const categ=document.getElementById("nouvelleCategorie");
const btnaddcateg=document.getElementById("addcateg");
const table=document.getElementById("listeCategories");
const selectcateg=document.getElementById("selectcateg");
const insearch=document.getElementById("search");
async function fetchData1() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/v1/categories');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Une erreur s\'est produite lors de la récupération des données :', error);
    }
}

async function filtrecateg() {
    const inputValue = document.getElementById('search').value;
    const data = await fetchData1();

    const categtemp=data.filter(categ=>{
        return categ.nom.toString().toLowerCase().startsWith(insearch.value.toString().toLowerCase()) 
    })

    afficherResultats(categtemp);
}

function afficherResultats(resultats) {
    table.innerHTML = ''; // Efface les anciens résultats avant d'afficher les nouveaux
  if(resultats.length>0){
    resultats.forEach(resultat => {
        table.innerHTML+=`
                 <li class="list-group-item">
                     ${resultat.nom}
                     <button onclick="suppcategdialog(${resultat.id})" class="btn btn-danger btn-sm float-right"><i class="fas fa-trash-alt"></i></button>
        
                     <button onclick="updatecategdial(${resultat.id})" class="btn btn-primary btn-sm float-right mr-2"><i class="fas fa-edit"></i></button>
                </li>
                `
    });
}
    else
    table.innerHTML+=`<li style="text-align: center;" class="list-group-item">No data found</li>`
}
// async function filtrecateg(){
//     table.innerHTML="";
//     const urlAPI = 'http://127.0.0.1:8000/api/v1/categories/';
//     try{var data = await lireAPI(urlAPI);
//         const categtemp=data.filter(categ=>{
//             return categ.nom.toString().toLowerCase().startsWith(insearch.value.toString().toLowerCase()) 
//         })
        
//     if (categtemp) {
//       for (const categ of categtemp) {
//         table.innerHTML+=`
//         <li class="list-group-item">
//             ${categ.nom}
//             <button onclick="suppcategdialog(${categ.id})" class="btn btn-danger btn-sm float-right"><i class="fas fa-trash-alt"></i></button>

//             <button onclick="updatecategdial(${categ.id})" class="btn btn-primary btn-sm float-right mr-2"><i class="fas fa-edit"></i></button>
//           </li>
//         `


//       }
//     } else {
//      alert("error loading data");
//     }
// }finally{
    
// }
    
// }


btnaddcateg.onclick=(e)=>{
    e.preventDefault();
    if(btnaddcateg.value=="add"){
    addcateg(categ.value);
    categ.value="";
    
    }
    else{
        updateCateg(btnaddcateg.value,categ.value)
        btnaddcateg.value="add";
        btnaddcateg.innerHTML=""
        categ.value="";
        btnaddcateg.innerHTML+="Ajouter"
    }
    fetchData(table);  
    
}
async function updateCateg(id,nom) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/categories/${id}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify({ nom }),
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


async function updatecategdial(id){
    var data = await lireAPI("http://127.0.0.1:8000/api/categories/"+id);
    categ.value=data.nom;
    btnaddcateg.value=id;
    btnaddcateg.innerHTML=""
    btnaddcateg.innerHTML+="Modifier"
}
function suppcategdialog(id){
    Swal.fire({
        title: "Do you want to delete the Categ?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire("deleted Categ", "", "success");
          deleteCateg(id);
        } 
      });
}
async function deleteCateg(id) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/categories/${id}`;
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
async function addcateg(nom) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/categories`;
    console.log(JSON.stringify({ nom }))

    try {
        const response = await fetch(urlAPI, {
            method: 'POST',
            body: JSON.stringify({nom }),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }
    } catch (error) {
        // console.error('Error add post:', error);
        
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
    table.innerHTML="";
    selectcateg.innerHTML="";
    const urlAPI = 'http://127.0.0.1:8000/api/v1/categories/';
    const loading=document.getElementById("loading");
    console.log(loading)
    loading.className="d-flex justify-content-center";
    loading.style.display="block";
    try{var data = await lireAPI(urlAPI);
        
    if (data) {
      for (const categ of data) {
        selectcateg.innerHTML+=`
        <option value="${categ.id}">${categ.nom}</option>
        `;
        table.innerHTML+=`
        <li class="list-group-item">
            ${categ.nom}
            <button onclick="suppcategdialog(${categ.id})" class="btn btn-danger btn-sm float-right"><i class="fas fa-trash-alt"></i></button>

            <button onclick="updatecategdial(${categ.id})" class="btn btn-primary btn-sm float-right mr-2"><i class="fas fa-edit"></i></button>
          </li>
        `


      }
    } else {
     alert("error loading data");
    }
}finally{
    loading.className="";
    loading.style.display="none";
    
}
  }

