Ce projet est une application web permettant de gérer la généalogie de plusieurs familles.

Développé en HTML, CSS, PHP et MySQL pour la base de données.
L'application fonctionne en local avec une base de données MySQL (les détails de la configuration en local sont dans le fichier projet/app/controller/config.php).
Pour assurer le bon fonctionnement de l'application, la base de données MySQL "genealogie" doit au préalabre être créée avec le fichier projet/outil/genealogie_create.sql

Fonctionnalités :
- Accéder à la liste des familles
- Ajouter une famille (nom)
- Sélectionner une famille (pour utiliser les autres fonctionnalités avec cette dernière)

- Liste des individu de la famille
- Ajouter un individu (nom, prénom, sexe)

- Liste des évènements
- Ajouter un évènement (Individu, Naissance/Décès, Date, Lieu)

- Liste des liens
- Ajouter un lien parent (Parent, Enfant)
- Ajouter un lien Union (Homme, Femme, type d'union, Date, Lieu)

- Afficher la page d'un individu (toutes les informations le concernant) et naviguer directement vers les pages des individus ayant un lien avec ce dernier.