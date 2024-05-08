const acceptdemande=(inscription)=>{
    if(inscription.id_membre){
        updateEtat(inscription.id,1);
    }
    else{
       
        Swal.fire({
            title: "Ajout de membre en cours...",
            html: "Veuillez patienter un peu.",
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();

                var passwd = generateRandomPassword(7);
                adduserd(inscription.email, passwd, inscription.tele, 2)
                    .then((id) => {
                        console.log("id1",id);
                        addmembred(inscription.nom, inscription.prenom, id,"noimage.png").then(
                            (id2) => {
                                console.log("ide",id2);
                                updateEtat2(inscription.id,1,id2).then(()=>{

                                    sendmail(inscription.email,passwd,inscription.nom,inscription.prenom) .then(
                                        ()=>{
                                          Swal.close();
                                        }
                                      )
                                })




                            }
                        ).catch((error) => {
                            console.error(
                                "Une erreur s'est produite lors de la récupération de l'ID :",
                                error
                            );
                        });
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

}
function generateRandomPassword(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let password = '';
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        password += characters[randomIndex];
    }
    return password;
}

async function sendmail(mail,pass,nom,prenom) {
    const urlAPI = `http://127.0.0.1:8000/api/Mailinscri/${mail}`;

    try {
        const response = await fetch(urlAPI, {
            method: 'POST',
            body: JSON.stringify({mail,pass,nom,prenom}),
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
async function updateEtat(idinscription,etat) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/demandes/${idinscription}`;
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


    } catch (error) {

    }
}
async function updateEtat2(idinscription,etat,id_membre) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/demandes/${idinscription}`;
    try {
        const response = await fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify({ etat,id_membre }),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || 'Something went wrong');
        }




    } catch (error) {

    }
}
async function suppdemande(idinscription) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/demandes/${idinscription}`;
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
async function adduserd(email, password, num_tel, type) {
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
async function addmembred(nom, prenom, iduser,image) {
    const urlAPI = `http://127.0.0.1:8000/api/v1/membres`;
    try {
        const response = await fetch(urlAPI, {
            method: "POST",
            body: JSON.stringify({ nom, prenom, iduser,image}),
            headers: {
                "Content-Type": "application/json",
            },
        });

        // Utilisez response pour obtenir le contenu de la réponse
        if (!response.ok) {
            const errorMessage = await response.text();
            throw new Error(errorMessage || "Something went wrong");
        }
        const idmembre = await response.json();
        return idmembre.id;
        
        // Vous pouvez traiter les données mises à jour ici si nécessaire
        // console.log('add Post:', addPost);
    } catch (error) {
        // console.error('Error add post:', error);
        // alert('Une erreur est survenue lors de la mise à jour du post.');
    }

}
