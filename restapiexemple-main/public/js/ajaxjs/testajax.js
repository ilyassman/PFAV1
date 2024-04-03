var but1=document.getElementById('ajaxbuton');
var categs=document.getElementsByName('domaine');
var formations=document.getElementById('listeform');
var loading= document.getElementById('loading');
var categlen=0;
categs.forEach(function(checkbox) {
    checkbox.onclick=function(e){
       // e.preventDefault();
    categlen=0;
    var fomtionlen=0;
    var isvide=false;
    loading.style.display = 'block';
    formations.innerHTML='';
    
    categs.forEach(element => {
        if(element.checked){
            categlen++;
        }
    }
    )
    
    if(categlen>0){
    categs.forEach(element => {
        if(element.checked){
    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
        if(req.readyState===req.DONE){
            loading.style.display = 'none';
            
            var result=JSON.parse(req.response);
            fomtionlen+=result.length;
            console.log("result"+fomtionlen);
            if(fomtionlen>0){
            result.forEach(element => {
                let k=0;
                let etoile='';
                k=element.niveau_etoile;
                      for(let j=1;j<=5;j++){
                      if(k!=0){
                     etoile+='<span class="icon-star2 text-warning"></span>'
                      k--;
                      }
                      }
                formations.innerHTML+=`
                <div class="course-1-item">
                <figure class="thumnail">
                  <a href="course"><img src="`+element.image+`"alt="Civil Engineering Structures Course" class="img-fluid"></a>
                  <div class="price">`+element.prix+` €</div>
                  <div class="category"><h3>`+element.titre +`</h3></div>
                </figure>
                <div class="course-1-content pb-4">
                  <h2>`+element.objectif+`</h2>
                  <div class="rating text-center mb-3">
                    `+etoile+
                    `
                  </div>
                  <p class="desc mb-4">`+element.contenue+`</p>
                  <p><a href="course" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a></p>
                </div>
              </div>
                
                
                `;
            });}
            else{
               
                if(!isvide)
                formations.innerHTML+=`
                <p>Aucune formation</p>`;
            isvide=true;
            }
        }

    }
    
       
        
       
       req.open('GET','http://127.0.0.1:8000/api/v1/categories/'+element.value);
       req.send();
       
    }

});}
  else{
    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
        if(req.readyState===req.DONE){
            loading.style.display = 'none';
            
            var result=JSON.parse(req.response);
            console.log(result);
            result.forEach(element => {
                var i=0;
                var etoile='';
                i=element.niveau_etoile;
                      for(let j=1;j<=5;j++){
                      if(i!=0){
                     etoile+='<span class="icon-star2 text-warning"></span>'
                      i--;
                      }
                      }
                formations.innerHTML+=`
                <div class="course-1-item">
                <figure class="thumnail">
                  <a href="course"><img src="`+element.image+`" alt="Civil Engineering Structures Course" class="img-fluid"></a>
                  <div class="price">`+element.prix+` €</div>
                  <div class="category"><h3>`+element.titre +`</h3></div>
                </figure>
                <div class="course-1-content pb-4">
                  <h2>`+element.objectif +`</h2>
                  <div class="rating text-center mb-3">`+
                      etoile
                      +`
                  </div>
                  <p class="desc mb-4">`+element.contenue +`</p>
                  <p><a href="course" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a></p>
                </div>
              </div>
                
                
                `;
            });
        }

    }
    
       
        
       
       req.open('GET','http://127.0.0.1:8000/api/v1/formations');
       req.send();
  }
    }
});
but1.onclick=function(e){
e.preventDefault();
loading.style.display = 'block';
formations.innerHTML='';
categs.forEach(categ => {
    categ.checked=false;
    
});

    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
        if(req.readyState===req.DONE){
            loading.style.display = 'none ';
            
            var result=JSON.parse(req.response);
            
            
            result.forEach(element => {
                var i=0;
                var etoile='';
                i=element.niveau_etoile;
                      for(let j=1;j<=5;j++){
                      if(i!=0){
                     etoile+='<span class="icon-star2 text-warning"></span>'
                      i--;
                      }
                      }
                formations.innerHTML+=`
                <div class="course-1-item">
                <figure class="thumnail">
                  <a href="course"><img src="`+element.image+`" alt="Civil Engineering Structures Course" class="img-fluid"></a>
                  <div class="price">`+element.prix+` €</div>
                  <div class="category"><h3>`+element.titre +`</h3></div>
                </figure>
                <div class="course-1-content pb-4">
                  <h2>`+element.objectif +`</h2>
                  <div class="rating text-center mb-3">`+
                      etoile
                      +`
                  </div>
                  <p class="desc mb-4">`+element.contenue +`</p>
                  <p><a href="course" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a></p>
                </div>
              </div>
                
                
                `;
            });
        }

    }
    
       
        
       
       req.open('GET','http://127.0.0.1:8000/api/v1/formations');
       req.send();

}

