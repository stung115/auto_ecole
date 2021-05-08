<?php include('server2.php'); 


if(!isset($_SESSION['username'])){
    header('Location:../index.php');
    die();
}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state = true;
	$rec = $pdo->query("SELECT * FROM utilisateurs WHERE id=$id");
    $record = $rec->fetch();
	$nom = $record['nom'];
	$prenom = $record['prenom'];
	$sexe = $record['sexe'];
    $date_de_naissance = $record['date_de_naissance'];
    $adresse = $record['adresse'];
    $code_postal = $record['code_postal'];
    $ville = $record['ville'];
    $telephone = $record['telephone'];
    $adresse_mail = $record['adresse_mail'];
	$etablissement = $record['etablissement'];
	$formule = $record['formule'];
	$id = $record['id'];

}



?>
<html>

<head>
	<title>Eleve</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="../img/logo1.png">
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
<center> <strong><h1> Liste des élèves </h1></srong> </center>

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
			<th>Sexe</th>
			<th>Date de naissance</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Telephone</th>
            <th>Adresse mail</th>
            <th>Etablissement</th>
			<th>Formule</th>
			
		</tr>
	</thead>
	<tbody> 
	<?php while ($row = $results->fetch()) { ?>  
	<tr>
	<td><?php echo $row['nom']; ?> </td>
	<td><?php echo $row['prenom']; ?> </td>
	<td><?php echo $row['sexe']; ?> </td>
	<td><?php echo $row['date_de_naissance']; ?> </td>
    <td><?php echo $row['adresse']; ?> </td>
    <td><?php echo $row['code_postal']; ?> </td>
    <td><?php echo $row['ville']; ?> </td>
    <td><?php echo $row['telephone']; ?> </td>
    <td><?php echo $row['adresse_mail']; ?> </td>
    <td><?php echo $row['etablissement']; ?> </td>
	<td><?php echo $row['formule']; ?> </td>
	<td>
	    <a class="edit_btn" href="eleve1.php?edit=<?php echo $row['id']; ?>">Modifier</a>
	</td>
	<td>
	<a  class="del_btn" href="server2.php?del=<?php echo $row['id']; ?>">Supprimer</a>
	</td>
	</tr>
<?php } ?>

</tbody>
</table>

<form method="post" action="server2.php" >
<imput type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Nom </label>
			<input type="text" required="required" name="nom" placeholder="Dupont" value="<?php echo $nom; ?>">
		</div>






















		<div class="input-group">
			<label>Prenom</label>
			<input type="text" required="required" name="prenom" placeholder="Dupont" value="<?php echo $prenom; ?>">
		</div>


		<div class="input-group">
			<label>Sexe</label>
			<input type="text" required="required" name="sexe" value="<?php echo $sexe; ?>">
		</div>

<div class="input-group">
			<label>Date de naissance (15ans minimum)</label>
			<input type="date" max="2005-01-01" name="date_de_naissance" value="<?php echo $date_de_naissance; ?>">
		</div>


        <div class="input-group">
			<label>Adresse</label>
			<input type="text" required="required" name="adresse" value="<?php echo $adresse; ?>">
		</div>

        <div class="input-group">
			<label>Code Postal</label>
			<input type="text" required="required" name="code_postal" value="<?php echo $code_postal; ?>">
		</div>
        <div class="input-group">
			<label>Ville</label>
			<input type="text" required="required" name="ville" value="<?php echo $ville; ?>">
		</div>
        <div class="input-group">
			<label>Telephone</label>
			<input type="text"  name="telephone" required="required" value="<?php echo $telephone; ?>">
		</div>

        <div class="input-group">
			<label>Adresse mail</label>
			<input type="email" required="required" name="adresse_mail" value="<?php echo $adresse_mail; ?>">
		</div>

        <div class="input-group">
			<label>Etablissement</label>
			<input type="text" name="etablissement" value="<?php echo $etablissement; ?>">
		</div>

		
        <div class="input-group">
			<label>Formule</label>
			<input type="text" required="required" name="formule" value="<?php echo $formule; ?>">
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