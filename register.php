<!DOCTYPE html>
<html>
<head>
	<title>S'enregistrer</title>
</head>
<body>
<?php
require('config.php');
if (isset($_POST['username'], $_POST['email'], $_POST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_POST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $passwd = stripslashes($_POST['password']);
  $passwd = mysqli_real_escape_string($conn, $passwd);
  //requéte SQL + mot de passe crypté
  $query = "INSERT into `users` (username, email, passwd)
              VALUES ('$username', '$email', '".hash('sha256', $passwd)."')";
  // Exécuter la requête sur la base de données
  $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class=''>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="mef" action="" method="post">
  <div class="two">
          <center>
          <img src="Images/logo.png" alt="">
          <h2>Coffre Numérique</h2>
          </center>
        </div>
   </div><br/>
    <center><h1>S'inscrire</h1>
	<input type="text" id="ID" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" id="ID" name="email" placeholder="Email" required />
    <input type="password" id="pwd" name="password" placeholder="Mot de passe" required />
    <input type="submit" id="submit" name="submit" value="S'inscrire" class="" />
    <p class="">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p></center>
</form>
<?php } ?>
</body>
</html>

<style>



*{
  margin: 0px;
  padding: 0px;
  background-color: #326c7a;
}




.titre{
  margin-top: 40px;
}



.two img{
  width: 20%;
}
.two h2{
  margin: auto;
  color: white;
  font-size: 40px;
  font-family: Segoe UI;
}
.mef{
  margin-top: 100px;
  padding: 20px;
  margin: auto;
  width: 50%;
  height: auto;
}
.mef center{
  border: 10px outset;
  color: white;
  border-radius: 10px;



}



  #ID {
    margin:20px;
    justify-content: center;
      padding: 3px 30px 10px 40px;
      font-size: 30px;
      border-radius: 5px black;
      width: 200px;
      height: 30px;
  }
  #pwd {
    margin: 20px;
    justify-content: center;
      padding: 3px 30px 10px 40px;
      font-size: 30px;
      background-image: url(https://www.boostmyshop.fr/media/catalog/product/cache/7/image/265x/9df78eab33525d08d6e5fb8d27136e95/b/o/boost-my-shop-universal-password-for-magento.png);
      background-size: 35px;
      background-repeat: no-repeat;
      border-radius: 5px black;
      width: 200px;
      height: 30px;
  }
  button{



  }
  #submit{
    padding: 10px3px 30px 10px 40px;
    color: white;
    font-size: 30px;
    margin: 20px;
    width:auto;
    height:40px;
    border-radius: 5px black;
    cursor: pointer;
    background:none;
  }
</style>
