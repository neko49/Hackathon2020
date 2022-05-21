<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="page_utilisateur.css">
  <head>
    <meta charset="utf-8">
    <title>Coffre Numérique</title>
  </head>
  <body>
    <div class="titre">
        <div class="two">
          <center>
          <img src="Images/logo.png" alt="">
          <h2>Coffre Numérique</h2>
		  <h2>Bienvenue <?php echo $_SESSION['username']; ?>!</h2>
          </center>
        </div>
    </div>

    <div class="opt">
      <div class="cadre1">
        <a href="https://www.linkedin.com/in/jaur%C3%A8s-fassinou/"><p>Profil Linkedin</p></a>
        <a href="Videos/CV VIDEO.mp4"><p>CV Vidéo</p></a>
        <a href="doc/CV Infographique.pdf"><p>CV Infographie</p></a>
        <a href="doc/CV ÉSTIAM FASSINOU.pdf"><p>CV Estiam</p></a>

      </div>
      <div class="cadre2">
        <a href="#"><p>Ajouter/Supprimer un compte</p></a>
        <a href="#"><p>Modifier mot de passe</p></a>
		<a href="generateur.html"><p>Générer un mot de passe</p></a>
		<a href="logout.php"><p>Déconnexion</p></a>
      </div>


      </div>
  </body>
</html>