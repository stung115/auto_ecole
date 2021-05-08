<?php include('server5.php'); 


if(!isset($_SESSION['username'])){
    header('Location:index.php');
    die();
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = $pdo->query("SELECT * FROM planning WHERE id=$id");
	$record = $rec->fetch();
	$nom_candidat = $record['nom_candidat'];
	$prenom_candidat = $record['prenom_candidat'];
	$intitule_lecon = $record['intitule_lecon'];
	$datep = $record['datep'];
	$heure = $record['heure'];
	$heuref = $record['heuref'];

	$id = $record['id'];

}



?>
<html>
<head>
<link rel="shortcut icon" href="../img/logo1.png">
	<title>Planning</title>
	<link rel="stylesheet" type="text/css" href="style5.css">
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
<center> <strong><h1> Planning </h1></srong> </center>


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
			<th>Nom</th>
			<th>Prenom</th>
			<th>Lecon</th>
			<th>Date</th>
			<th>Heure début</th>
			<th>Heure fin</th>
			<th colspan="4">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = $results->fetch()) { ?>  
	<tr>
	<td><?php echo $row['nom_candidat']; ?> </td>
	<td><?php echo $row['prenom_candidat']; ?> </td>
	<td><?php echo $row['intitule_lecon']; ?> </td>
	<td><?php echo $row['datep']; ?> </td>
	<td><?php echo $row['heure']; ?> </td>
	<td><?php echo $row['heuref']; ?> </td>
	
	<td>
	    <a class="edit_btn" href="planning1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server5.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server5.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Nom Candidat</label>
			<input type="text" required="required" name="nom_candidat" value="<?php echo $nom_candidat; ?>">
		</div>



		<div class="input-group">
			<label>Prenom Candidat</label>
			<input type="text" required="required" name="prenom_candidat" value="<?php echo $prenom_candidat; ?>">
		</div>


		<div class="input-group">
			<label>Intitule lecon</label>
			<input type="text" required="required" name="intitule_lecon" value="<?php echo $intitule_lecon; ?>">
		</div>

		<div class="input-group">
			<label>Date</label>
			<input type="date" required="required" name="datep" value="<?php echo $datep; ?>">
		</div>



<div class="input-group">
			<label>Heure début</label>
			<input type="time" required="required" name="heure" value="<?php echo $heure; ?>">
		</div>

		<div class="input-group">
			<label>Heure fin</label>
			<input type="time" required="required" name="heuref" value="<?php echo $heure; ?>">
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