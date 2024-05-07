var but1 = document.getElementById("ajaxbuton");
var categs = document.getElementsByName("domaine");
var formations = document.getElementById("listeform");
var loading = document.getElementById("loading");
var categlen = 0;
categs.forEach(function (checkbox) {
    checkbox.onclick = function (e) {
        // e.preventDefault();
        categlen = 0;
        var fomtionlen = 0;
        var isvide = false;
        loading.style.display = "block";
        formations.innerHTML = "";

        categs.forEach((element) => {
            if (element.checked) {
                categlen++;
            }
        });

        if (categlen > 0) {
            categs.forEach((element) => {
                if (element.checked) {
                    var req = new XMLHttpRequest();
                    req.onreadystatechange = function () {
                        if (req.readyState === req.DONE) {
                            var result = JSON.parse(req.response);
                            fomtionlen += result.length;
                            console.log("result" + fomtionlen);
                            if (fomtionlen > 0) {
                                result.forEach((element) => {
                                    let k = 0;
                                    let etoile = "";
                                    k = element.niveau_etoile;
                                    for (let j = 1; j <= 5; j++) {
                                        if (k != 0) {
                                            etoile +=
                                                '<span class="icon-star2 text-warning"></span>';
                                            k--;
                                        }
                                    }
                                    encryptId(element.id)
                                        .then((encryptedId) => {
                                            let content = element.contenue;
                                            let wordCount = content
                                                .trim()
                                                .split(/\s+/).length;
                                            let wordThreshold = 20;

                                            // Si le contenu dépasse le seuil de mots, tronquer et ajouter un lien "Lire la suite"
                                            if (wordCount > wordThreshold) {
                                                let shortContent = content
                                                    .trim()
                                                    .split(/\s+/)
                                                    .slice(0, wordThreshold)
                                                    .join(" ");
                                                content =
                                                    shortContent +
                                                    ' <a href="course?id=' +
                                                    encryptedId +
                                                    '" class="read-more">Lire la suite</a>';
                                            }

                                            formations.innerHTML += `
                          <div class="course-1-item">
                              <figure class="thumnail">
                                  <a href="course?id=${encryptedId}"><img src="Formationpic/${element.image}" alt="Civil Engineering Structures Course" class="img-fluid"></a>
                                  <div class="price">${element.prix} €</div>
                                  <div class="category"><h3>${element.titre}</h3></div>
                              </figure>
                              <div class="course-1-content pb-4">
                                  <div class="rating text-center mb-3">${etoile}</div>
                                  <p class="desc mb-4">${content}</p>
                                  <p><a href="course?id=${encryptedId}" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a></p>
                              </div>
                          </div>
                        `;
                                            loading.style.display = "none";
                                        })
                                        .catch((error) => console.error(error));
                                });
                            } else {
                                if (!isvide)
                                    formations.innerHTML += `
                <p>Aucune formation</p>`;
                                isvide = true;
                            }
                        }
                    };

                    req.open(
                        "GET",
                        "http://127.0.0.1:8000/api/v1/categories/" +
                            element.value
                    );
                    req.send();
                }
            });
        } else {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === req.DONE) {
                    var result = JSON.parse(req.response);
                    console.log(result);
                    result.forEach((element) => {
                        var i = 0;
                        var etoile = "";
                        i = element.niveau_etoile;
                        for (let j = 1; j <= 5; j++) {
                            if (i != 0) {
                                etoile +=
                                    '<span class="icon-star2 text-warning"></span>';
                                i--;
                            }
                        }
                        encryptId(element.id)
                            .then((encryptedId) => {
                                let content = element.contenue;
                                let wordCount = content
                                    .trim()
                                    .split(/\s+/).length;
                                let wordThreshold = 20;

                                // Si le contenu dépasse le seuil de mots, tronquer et ajouter un lien "Lire la suite"
                                if (wordCount > wordThreshold) {
                                    let shortContent = content
                                        .trim()
                                        .split(/\s+/)
                                        .slice(0, wordThreshold)
                                        .join(" ");
                                    content =
                                        shortContent +
                                        ' <a href="course?id=' +
                                        encryptedId +
                                        '" class="read-more">Lire la suite</a>';
                                }

                                formations.innerHTML += `
                          <div class="course-1-item">
                              <figure class="thumnail">
                                  <a href="course?id=${encryptedId}"><img src="Formationpic/${element.image}" alt="Civil Engineering Structures Course" class="img-fluid"></a>
                                  <div class="price">${element.prix} €</div>
                                  <div class="category"><h3>${element.titre}</h3></div>
                              </figure>
                              <div class="course-1-content pb-4">
                                  <div class="rating text-center mb-3">${etoile}</div>
                                  <p class="desc mb-4">${content}</p>
                                  <p><a href="course?id=${encryptedId}" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a></p>
                              </div>
                          </div>
                        `;
                                loading.style.display = "none";
                            })
                            .catch((error) => console.error(error));
                    });
                }
            };

            req.open("GET", "http://127.0.0.1:8000/api/v1/formations");
            req.send();
        }
    };
});
but1.onclick = function (e) {
    e.preventDefault();
    loading.style.display = "block";
    formations.innerHTML = "";
    categs.forEach((categ) => {
        categ.checked = false;
    });

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === req.DONE) {
            var result = JSON.parse(req.response);

            result.forEach((element) => {
                var i = 0;
                var etoile = "";
                i = element.niveau_etoile;
                for (let j = 1; j <= 5; j++) {
                    if (i != 0) {
                        etoile +=
                            '<span class="icon-star2 text-warning"></span>';
                        i--;
                    }
                }

                encryptId(element.id)
                    .then((encryptedId) => {
                        let content = element.contenue;
                        let wordCount = content.trim().split(/\s+/).length;
                        let wordThreshold = 20;

                        // Si le contenu dépasse le seuil de mots, tronquer et ajouter un lien "Lire la suite"
                        if (wordCount > wordThreshold) {
                            let shortContent = content
                                .trim()
                                .split(/\s+/)
                                .slice(0, wordThreshold)
                                .join(" ");
                            content =
                                shortContent +
                                ' <a href="course?id=' +
                                encryptedId +
                                '" class="read-more">Lire la suite</a>';
                        }

                        formations.innerHTML += `
      <div class="course-1-item">
          <figure class="thumnail">
              <a href="course?id=${encryptedId}"><img src="Formationpic/${element.image}" alt="Civil Engineering Structures Course" class="img-fluid"></a>
              <div class="price">${element.prix} €</div>
              <div class="category"><h3>${element.titre}</h3></div>
          </figure>
          <div class="course-1-content pb-4">
              <div class="rating text-center mb-3">${etoile}</div>
              <p class="desc mb-4">${content}</p>
              <p><a href="course?id=${encryptedId}" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a></p>
          </div>
      </div>
    `;
                        loading.style.display = "none";
                    })
                    .catch((error) => console.error(error));
            });
        }
    };

    req.open("GET", "http://127.0.0.1:8000/api/v1/formations");
    req.send();
};

function encryptId(id) {
    return new Promise((resolve, reject) => {
        fetch(`http://127.0.0.1:8000/encrypt-id/${id}`)
            .then((response) => response.json())
            .then((data) => resolve(data.encrypted_id))
            .catch((error) => reject(error));
    });
}
