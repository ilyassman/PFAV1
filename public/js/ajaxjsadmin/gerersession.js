const sessions=document.getElementById("sessionList");
const membres=document.getElementById("memberList");
sessions.onchange=()=>{
    fetchData();
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
    membres.innerHTML='';
    const urlAPI = 'http://127.0.0.1:8000/api/sessionmembres/'+sessions.value;
    const loading=document.getElementById("loading");
    try{var data = await lireAPI(urlAPI);
    if (data) {
        data.forEach(membre => {
            membres.innerHTML+=`
            <option value="${membre.id}">${membre.nom} ${membre.prenom} (${membre.email})</option>
            `
        });
       
    } else {
     alert("error loading data");
    }
}finally{
    
}
  }

fetchData();
