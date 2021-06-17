# Php-RESTFUL-API-s-integration

# Comment monter le projet

Placer le dossier php dqns ton projet React
Dabord  importer la base de donnée schoolmanager se trouvant dans backend/base de donnée dans phpmyadmin

# Comment Utiliser l'API REST
Allez sur le terminal sur vscode faite : cd backend   php -S localhost:8000
maintenant le php s'execute sur le port 8000

# Pour Creer un nouveau Etudiant

dabord tu creer une fonction creer dans ton page d'inscription () qui te permet de lancer la requete http a ton Api comme suit :

const creer = (userData) =>
{
        const baseUrl ="http://localhost:8000/api"
        const requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData)
        };
        fetch(`${baseUrl}/student/create.php`, requestOptions)
            .then(response => response.json())
            .then(data => console.log(data));
}   

Ensuite tu recupere les tout les saisies de l'utilisateurs tu met sa dans un object et tu appelle la fonction que t'a creer auparavant et lui passer
ton objet en parametre et la c'est bon tu viens de creer un nouveau etudiant

pour la connexion on procede presque de la meme maniere sauf dans le fetch on appelle un fichier different readSingle et ici on precise qui se connecte 
c'est pour quoi la fonction a pris pris en parametre le type

const connect  = (userData,type) =>
{
        const requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData)
        };
        fetch(`${baseUrl}/${type}/readSingle.php`, requestOptions)
            .then(response => response.json())
            .then(data => {console.log(data)
                if (typeof(data.id)==undefined) 
                {
                     console.log("Mot de passe ou adresse mail incorrect ! ")  
                 }
                 else
                 {
                    localStorage.setItem("User",JSON.stringify(data))
                }     
            });
}





