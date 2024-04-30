const ctxm = document.getElementById('myChart');
const months = [
    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
];
const ctxm1=document.getElementById('myChart2');

fetch("http://127.0.0.1:8000/chartcateg")
.then(response => response.json())
.then(json => {
    // Générer une palette de couleurs dynamique
    let dynamicColors = [];
    for (let i = 0; i < json.labels.length; i++) {
        dynamicColors.push(`rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`);
    }

    new Chart(ctxm1, {
        type: 'doughnut',
        data: {
            labels: json.labels,
            datasets: [{
                label: 'Nombre de formation',
                data: json.dataset,
                backgroundColor: dynamicColors, // Utiliser la palette de couleurs dynamique
                hoverOffset: 4,
            }]
        },
    });
});


 
fetch("http://127.0.0.1:8000/chartmembre")
.then(response=>response.json())
.then(json=>{new Chart(ctxm, {
    type: 'bar',
    data: {
      labels: months,
      datasets: [{
        label: 'Les clients inscrits par mois',
        data: json.dataset,
        backgroundColor : [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)',
            'rgba(255, 0, 0, 0.2)',       // Rouge
            'rgba(0, 255, 0, 0.2)',       // Vert
            'rgba(0, 0, 255, 0.2)',       // Bleu
            'rgba(255, 255, 0, 0.2)',     // Jaune
            'rgba(255, 0, 255, 0.2)'      // Magenta
        ],
        borderColor : [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)',
            'rgb(255, 0, 0)',       // Rouge
            'rgb(0, 255, 0)',       // Vert
            'rgb(0, 0, 255)',       // Bleu
            'rgb(255, 255, 0)',     // Jaune
            'rgb(255, 0, 255)'      // Magenta
        ],
        
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
   
});

 
