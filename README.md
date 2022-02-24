# Filmania

# Description

Le site Filmania permet de visualiser une liste de films et une liste d’acteurs.  
Il est possible de créer un compte et de s’identifier pour pouvoir voter pour un film  
Le nombre de votes pour chaque film est comptabilisé, un vote augmente simplement la note du film de 1.  
Avec un compte administrateur, il possible d’accéder à un formulaire permettant l’ajout de film et un formulaire permettant l’ajout d’acteur.  
Après avoir ajouté un acteur il est possible de l’associer à des films déjà présents dans la liste de films.  
Un film est caractérisé par son titre, son année de diffusion, son nombre de vote, sa note et son affiche.  
Un acteur est caractérisé par son nom et son prénom et sa photo de profil.  

Pour plus d'information sur le fonctionnement du site, ou pour voir une démonstration vidéo, vous pouvez vous rendre sur mon site :  
https://antonindehu.com/filmania/  


# Maintenance 
J'ai effectué 3 maintenances sur le site :
- Échec lors de la création d’un compte  
- Problème d’affichage des dates des films  
- Ajout d’une photo de profil pour les acteurs  

Les différentes maintenances sont détaillées dans les différentes issues de ce répertoire git. 
Elles sont aussi détaillées sur mon site : https://antonindehu.com/filmania/  

# Utilisation :
Si vous souhaitez tester vous même le site vous devez suivre les étapes suivantes :  
1. Télécharger le code ou cloner le répertoire git  
2. Créer une base de donnée, y importer le fichier "films.sql"  
3. Modifier le fichier BDDManager.php se trouvant dans le fichier models, pour mettre à jour les valeurs de "$host", "$user", "$db" et "$pwd" avec vos informations.
4. Ensuite tout devrait fonctionner, pour les identifiants de connexion (compte admin), il vous suffit de regarder dans le fichier "Identifiants de connexion.txt".
