
const apiUrl = 'http://127.0.0.1:8000/api/v1/formations';
const apiUrl1 = 'http://127.0.0.1:8000/api/v1/formateurs';
const apiUrl2 = 'http://127.0.0.1:8000/api/v1/membres/';
var maxValue = 0;
var maxValue1 = 0;
var maxValue2 = 0;
function fetchData(apiUrl) {
    // Appel de l'API avec la méthode fetch
    fetch(apiUrl)
        .then(response => {
            // Vérification de la réponse du serveur
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Conversion de la réponse en JSON
            return response.json();
        })
        .then(data => {
            data.forEach(element => {
                maxValue++;

                
            });
            checkVisibility();
            window.addEventListener("scroll", checkVisibility);
            
        })
        .catch(error => {
            console.error('Error fetching API:', error);
            // Gérer les erreurs de requête ici
        });
}
function fetchData1(apiUrl) {
    // Appel de l'API avec la méthode fetch
    fetch(apiUrl)
        .then(response => {
            // Vérification de la réponse du serveur
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Conversion de la réponse en JSON
            return response.json();
        })
        .then(data => {
            data.forEach(element => {
                maxValue1++;

                
            });
            checkVisibility1();
            window.addEventListener("scroll", checkVisibility1);
            
        })
        .catch(error => {
            console.error('Error fetching API:', error);
            // Gérer les erreurs de requête ici
        });
}
// Fonction pour récupérer les données de l'API
function fetchData2(apiUrl) {
    // Appel de l'API avec la méthode fetch
    fetch(apiUrl)
        .then(response => {
            // Vérification de la réponse du serveur
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Conversion de la réponse en JSON
            return response.json();
        })
        .then(data => {
            data.forEach(element => {
                maxValue2++;

                
            });
            checkVisibility2();
            window.addEventListener("scroll", checkVisibility2);
            
        })
        .catch(error => {
            console.error('Error fetching API:', error);
            // Gérer les erreurs de requête ici
        });
}
fetchData(apiUrl);
fetchData1(apiUrl1);
fetchData2(apiUrl2);

    // Récupérez l'élément span par son ID
    const incrementedNumberElement = document.getElementById("incrementedNumber");
    const incrementedNumberElement1 = document.getElementById("incrementedNumber1");
    const incrementedNumberElement2 = document.getElementById("incrementedNumber2");
    // Définissez la valeur maximale souhaitée (par exemple, 10)
    
    let vis=false;
    let vis1=false;
    let vis2=false;

    // Incrémentation du chiffre jusqu'à la valeur maximale
    let currentNumber = maxValue>100 ? maxValue/2 : 0 ;
    let currentNumber1 = maxValue1>1100 ? maxValue1/2 : 0;
    let currentNumber2 = maxValue2>100 ? maxValue2/2 : 0;
    function incrementNumber(maxV) {
       
        if (currentNumber <= maxValue) {
            incrementedNumberElement.textContent = currentNumber;
            currentNumber++;
            let time;
            let delay = maxValue > 100 ? 0 : (maxValue1 > 10 ? 30 : 300);
            
            setTimeout(incrementNumber, delay); // Répétez toutes les 1 seconde (ajustez selon vos besoins)
        }
    }
    function incrementNumber1(maxV) {
        if (currentNumber1 <= maxValue1) {
            incrementedNumberElement1.textContent = currentNumber1;
            currentNumber1++;
            let delay = maxValue1 > 100 ? 1 : (maxValue1 > 10 ? 30 : 300);
            setTimeout(incrementNumber1, delay); // Répétez toutes les 1 seconde (ajustez selon vos besoins)
        }
    }
    function incrementNumber2(maxV) {
        if (currentNumber2 <= maxValue2) {
            incrementedNumberElement2.textContent = currentNumber2;
            currentNumber2++;
            let delay = maxValue2 > 1 ? 20 : (maxValue1 > 10 ? 30 : 300);
            setTimeout(incrementNumber2,delay); // Répétez toutes les 1 seconde (ajustez selon vos besoins)
        }
    }
    function checkVisibility() {
       
        const rect = incrementedNumberElement.getBoundingClientRect();
        const isVisible = (rect.top >= 0 && rect.bottom <= window.innerHeight);
        if (isVisible && !vis) {
            
            vis=true;
            incrementNumber(maxValue);
        }
    }
    function checkVisibility1() {
        const rect = incrementedNumberElement1.getBoundingClientRect();
        const isVisible = (rect.top >= 0 && rect.bottom <= window.innerHeight);
        if (isVisible  && !vis1) {
            vis1=true;
            incrementNumber1(maxValue1);
        }
    }
    function checkVisibility2() {
        const rect = incrementedNumberElement2.getBoundingClientRect();
        const isVisible = (rect.top >= 0 && rect.bottom <= window.innerHeight);
        if (isVisible  && !vis2) {
            vis2=true;
            incrementNumber2(maxValue2);
        }
    }
    // checkVisibility();
    
    // checkVisibility2();
    // window.addEventListener("scroll", checkVisibility);
    
    // window.addEventListener("scroll", checkVisibility2);