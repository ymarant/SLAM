<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
  <title>CONNEXION</title>
  <style>
    body, html {
      height: 100%;
      font-family: "Inconsolata", sans-serif;
    }
    
    .bgimg {
      background-position: center;
      background-size: cover;
      background-image: url("https://www.maison-michard.fr/wp-content/uploads/2022/11/MICHARD-photo-158A5184.jpg");
      position: fixed;  
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      filter: blur(5px);
      z-index: -1;  
    }

    .form-container {
      position: relative;
      z-index: 1;
      background-color: rgba(255, 255, 255, 0.8); 
      max-width: 900px; 
      width: 100%; 
      margin: 0 auto;
      padding: 30px;
      border-radius: 8px;
      position: absolute;
      top: 50%; 
      left: 50%;
      transform: translate(-50%, -50%); 
    }
    
    .menu {
      display: none;
    }
    </style>
</head>
<body>
  
  <div class="bgimg"></div>

  <div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="index.php" class="w3-button w3-block w3-black">RETOUR</a>
    </div>
  </div>
</div>

  <div class="w3-container form-container" id="inscription" style="padding:64px;">
    <div class="w3-content" style="max-width:700px">
      <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">CONNEXION</span></h5>
      <form action="connexion_redirection.php" method="post">
        <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="E-mail" required name="email"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Mot de passe" required name="mdp"></p>

        
        <?php if (isset($_GET['errorConnexion'])){
          echo '<p class="w3-text-red">E-mail ou mot de passe incorrect.</p>';
        }
        ?>
       
        <br>
        <p><button class="w3-button w3-black w3-block" type="submit">SE CONNECTER</button></p>

        

        
      </form>
     
    </div>
  </div>

</body>
</html>