<?php include('server4.php'); 


if(!isset($_SESSION['username'])){
    header('Location:../index.php');
    die();
}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = $pdo->query("SELECT * FROM voiture WHERE id=$id");
	$record = $rec->fetch();
	$modele = $record['modele'];
	$annee = $record['annee'];
	$immatriculation = $record['immatriculation'];
    $kilometrage = $record['kilometrage'];

	$id = $record['id'];

}



?>
<html>
<head>
	<title>Voiture</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
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
<center> <strong><h1> Liste des voitures </h1></srong> </center>


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
			<th>Modele</th>
			<th>Annee</th>
			<th>Immatriculation</th>
			<th>Kilometrage</th>
			<th colspan="4">Action</th>
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = $results->fetch()) { ?>  
	<tr>
	<td><?php echo $row['modele']; ?> </td>
	<td><?php echo $row['annee']; ?> </td>
	<td><?php echo $row['immatriculation']; ?> </td>
	<td><?php echo $row['kilometrage']; ?> </td>
	<td>
	    <a class="edit_btn" href="voiture1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a class="del_btn" href="server4.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server4.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Modele</label>
			<input type="text" required="required" name="modele" value="<?php echo $modele; ?>">
		</div>


		

		<div class="input-group">
			<label>Annee</label>
			<input type="text" required="required" name="annee" value="<?php echo $annee; ?>">
		</div>


		<div class="input-group">
			<label>Immatriculation</label>
			<input type="text" required="required" pattern="^[A-Z]{2} ?- ?\d{3} ?- ?[A-Z]{2}$" placeholder="XX-000-XX" name="immatriculation" value="<?php echo $immatriculation; ?>">
		</div>

<div class="input-group">
			<label>Kilometrage</label>
			<input type="text" required="required"  name="kilometrage" value="<?php echo $kilometrage; ?>">
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