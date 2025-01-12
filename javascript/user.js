const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
};


searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    
    // Gestion de la classe 'active' sur searchBar
    if (searchTerm.trim() !== "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data; // Mettre à jour le contenu de usersList avec la réponse de search.php
            }
        }
    };

    // Définir l'en-tête Content-Type pour les données de formulaire encodé
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Formatage des données avec URLSearchParams
    let formData = new URLSearchParams();
    formData.append('searchTerm', searchTerm);

    // Envoyer la requête avec les données formatées
    xhr.send(formData.toString());
};

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                //usersList.innerHTML = data;

                //Vérifie si searchBar n'a pas la classe "active" avant de mettre à jour usersList
                if (!searchBar.classList.contains("active")) {
                    usersList.innerHTML = data;
                }

            } else {
                console.error("Erreur de requête. Statut :", xhr.status);
            }
        }
    };
    xhr.send();
}, 500);


