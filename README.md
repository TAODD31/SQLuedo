# SQLuedo

<br/>
<p align="center">
  <a href="#">
    <img src="src/images/Logo.png" alt="Future Logo" width="250" height="250">
  </a>

  <h3 align="center">SQLuedo</h3>

  <p align="center">
    SQLuedo est un jeu sur navigateur web et sur application mobile qui consiste a resoudre des enquetes via des blocs de requete SQL
    <br/>
    <br/>
  </p>

## Contributeur

* [Louis Bordes](https://codefirst.iut.uca.fr/git/louis.bordes)
* [Mathéo Balko](https://codefirst.iut.uca.fr/git/matheo.balko) 
* [Titouan Ducroix](https://codefirst.iut.uca.fr/git/titouan.ducroix)  
* [Julien Araujo Da Silva](https://codefirst.iut.uca.fr/git/julien.araujo_da_silva )  
* [Chahid Lafdel](https://codefirst.iut.uca.fr/git/chahid.lafdel)  

## Utilisation de l'application

### 1 - Création de bases de données 

Premièrement, vous devez créer la base de données *sqluedo.sql* en mySQL. Le fichier est situé dans le dossier base de donné du projet. Ce sera la base de données de l'application.

<br>

Ensuite, il vous faut créer la base de donné *gestionevenements.sql* en mySQL. Le fichier se trouve au même endroit. Cette base de donné sera un exemple d'enquête pour notre jeu.

### 2 - mise en place de l'application

Ouvrer le fichier *Connection.php* situé dans le dossier *src/connection*

Vous devrez modifier les lignes suivante avec vos informations :

- Ligne 8 : Mettez le nom du super utilisateur de votre application de base de données (Exemple : UserBdd)
- Ligne 9 : Mettez le mot de passe de votre super utilisateur (Exemple : MdpUserBdd)
- Ligne 13 : remplacez le nom de la base de données de l'application situé dans la variable *dbName* par celle que vous avez créer. Normalement, ce sera celui déjà marqué, soit *sqluedo*.
- Ligne 14 : remplacez le host la partie *"mysql:host=localhost;dbname={$dbName}"* par le host que vous souhaitez. 
