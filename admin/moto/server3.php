<?php 
 session_start();
		$modele = "";
		$annee = "";
		$immatriculation = "";
		$kilometrage = "";
		$id = 0;
		$edit_state = false;
		

		$pdo = new PDO("mysql:dbname=inscription_candidat;host=localhost","root","");

	if (isset($_POST['save'])) {
		$modele = $_POST['modele'];
		$annee = $_POST['annee'];
		$immatriculation = $_POST['immatriculation'];
		$kilometrage = $_POST['kilometrage'];

		$query = "INSERT INTO moto (modele, annee,immatriculation,kilometrage) VALUES ('$modele', '$annee' , '$immatriculation'  , '$kilometrage')"; 
		$pdo->query($query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: moto1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$requete = $pdo->prepare("UPDATE moto SET 
		modele = :modele,
		annee= :annee,
		immatriculation= :immatriculation,
		kilometrage= :kilometrage
        WHERE id= :id" );

     $requete->bindValue(':modele',$_POST['modele'],PDO::PARAM_STR);
     $requete->bindValue(':annee',$_POST['annee'],PDO::PARAM_STR);
     $requete->bindValue(':immatriculation',$_POST['immatriculation'],PDO::PARAM_STR);
     $requete->bindValue(':kilometrage',$_POST['kilometrage'],PDO::PARAM_STR);
     $requete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
     $requete->execute();
	    $_SESSION['msg'] = "Champs modifié"; 
	    header('location: moto1.php');





}

   if(isset($_GET['del'])){
	$id = (int)$_GET['del'];
	$requete = $pdo->prepare("DELETE FROM moto WHERE id=$id");
    $requete->execute();  
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: moto1.php');
}

$results = $pdo->query( "SELECT * FROM moto");
	

?>



 


