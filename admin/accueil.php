<?php 
session_start();

if(!isset($_SESSION['username'])){
    header('Location:login/pdo_login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link href="styleco.css" rel="stylesheet">
     <link rel="shortcut icon" href="img/logo1.png">
</head>

<!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


<body >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../accueil.php">Accueil</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " href="eleve/eleve1.php">Inscription des élèves </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="planning/planning1.php">Planning </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="Programme/index.php">Planning </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="moniteur/index1.php">Moniteur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="code/code1.php">Examen code</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="conduite/conduite1.php">Examen coduite </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="moto/moto1.php">Moto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="voiture/voiture1.php">Voiture</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Deconnexion</a>
              </li>
              
              

            </ul>
          </div>
        </div>
      </nav>
        
      


  </body>

</html>
