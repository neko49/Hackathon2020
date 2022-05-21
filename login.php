<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <title>Identification</title>
</head>
<body>
<?php
require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_POST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $passwd = stripslashes($_POST['password']);
  $passwd = mysqli_real_escape_string($conn, $passwd);
    $query = "SELECT * FROM `users` WHERE username='$username' and passwd='".hash('sha256', $passwd)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="mef" action="" method="post" name="login">
	<div class="two">
          <center>
          <img src="Images/logo.png" alt="">
          <h2>Coffre Numérique</h2>
          </center>
        </div>
   </div><br/>
<center><h1>Connexion</h1>
<input type="text" id="ID" name="username" placeholder="Nom d'utilisateur">
<input type="password" id="pwd" name="password" placeholder="Mot de passe">
<input type="submit" id="submit" value="Connexion " name="submit" class="">
<p class="">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p></center>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
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
  color: #244D57;
  border-radius: 10px;
  color: white;



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