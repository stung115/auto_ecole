<?php include('server6.php'); 


if(!isset($_SESSION['username'])){
    header('Location:../index.php');
    die();
}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = $pdo->query("SELECT * FROM code WHERE id=$id");
    $record = $rec->fetch();
	$adresse = $record['adresse'];
	$code_postal = $record['code_postal'];
    $ville = $record['ville'];
    $type_examen = $record['type_examen'];
    $nom_candidat = $record['nom_candidat'];
    $prenom_candidat = $record['prenom_candidat'];
    $heure = $record['heure'];
   

	$id = $record['id'];

}



?>
<html>
<head>
	<title>Code</title>
	<link rel="stylesheet" type="text/css" href="style6.css">
	<link rel="shortcut icon" href="../img/logo1.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
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
                <a class="nav-link " href="../eleve/eleve1.php">Inscription des élèves </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../planning/planning1.php">Planning </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="../Programme/index.php">Planning </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../moniteur/index1.php">Moniteur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../code/code1.php">Examen code</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../conduite/conduite1.php">Examen coduite </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../moto/moto1.php">Moto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../voiture/voiture1.php">Voiture</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../logout.php">Deconnexion</a>
              </li>
              
              

            </ul>
          </div>
        </div>
      </nav>
<center> <strong><h1> Examen du code </h1></srong> </center>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>


<table>
	<thead>
		<tr>
			<th>Adresse</th>
			<th>Code Postal</th>
			<th>Ville</th>
            <th>Examen</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Heure</th>
			<th colspan="7">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = $results->fetch()) { ?>  
	<tr>
	<td><?php echo $row['adresse']; ?> </td>
	<td><?php echo $row['code_postal']; ?> </td>
	<td><?php echo $row['ville']; ?> </td>
    <td><?php echo $row['type_examen']; ?> </td>
    <td><?php echo $row['nom_candidat']; ?> </td>
    <td><?php echo $row['prenom_candidat']; ?> </td>
    <td><?php echo $row['heure']; ?> </td>
	<td>
	    <a class="edit_btn" href="code1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server6.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server6.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Adresse</label>
			<input type="text" required="required" name="adresse" value="<?php echo $adresse; ?>">
		</div>



		<div class="input-group">
			<label>Code postal</label>
			<input type="text" required="required" name="code_postal" value="<?php echo $code_postal; ?>">
		</div>


		<div class="input-group">
			<label>Ville</label>
			<input type="text" required="required" name="ville" value="<?php echo $ville; ?>">
		</div>

<div class="input-group">
			<label>Type examen</label>
			<input type="text" required="required" name="type_examen" value="<?php echo $type_examen; ?>">
        </div>
        

        <div class="input-group">
			<label>Nom du candidat</label>
			<input type="text" required="required" name="nom_candidat" value="<?php echo $nom_candidat; ?>">
		</div>


        <div class="input-group">
			<label>Prenom du candidat</label>
			<input type="text" required="required" name="prenom_candidat" value="<?php echo $prenom_candidat; ?>">
		</div>


        <div class="input-group">
			<label>Heure</label>
			<input type="time" required="required" name="heure" value="<?php echo $heure; ?>">
		</div>
		<input type="hidden" name="id" value="<?= isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">






		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn"  >Valider</button>

			<?php else: ?>
				<button type="submit" name="update" class="btn">Modifier</button>
				<?php endif ?>





		</div>
	</form>






</body>
</html>