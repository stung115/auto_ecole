<?php 
 session_start();
		$nom_candidat = "";
		$prenom_candidat = "";
		$intitule_lecon = "";
		$datep = "";
		$heure = "";
		$heuref = "";
		$id = 0;
		$edit_state = false;
		

		$pdo = new PDO("mysql:dbname=inscription_candidat;host=localhost","root","");

	if (isset($_POST['save'])) {
		$nom_candidat = $_POST['nom_candidat'];
		$prenom_candidat = $_POST['prenom_candidat'];
		$intitule_lecon = $_POST['intitule_lecon'];
		$datep = $_POST['datep'];
		$heure = $_POST['heure'];
		$heuref = $_POST['heuref'];
		$query = "INSERT INTO planning (nom_candidat, prenom_candidat,intitule_lecon,datep ,heure,heuref) 
		VALUES ('$nom_candidat', '$prenom_candidat' , '$intitule_lecon ','$datep'  , '$heure','$heuref')"; 
		$pdo->query($query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: planning1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$requete = $pdo->prepare("UPDATE planning SET 
		nom_candidat = :nom_candidat,
		prenom_candidat= :prenom_candidat,
		intitule_lecon= :intitule_lecon,
		datep= :datep,
		heure= :heure,
		heuref= :heuref
        WHERE id= :id" );

     $requete->bindValue(':nom_candidat',$_POST['nom_candidat'],PDO::PARAM_STR);
     $requete->bindValue(':prenom_candidat',$_POST['prenom_candidat'],PDO::PARAM_STR);
     $requete->bindValue(':intitule_lecon',$_POST['intitule_lecon'],PDO::PARAM_STR);
     $requete->bindValue(':datep',$_POST['datep'],PDO::PARAM_STR);
	 $requete->bindValue(':heure',$_POST['heure'],PDO::PARAM_STR);
	 $requete->bindValue(':heuref',$_POST['heuref'],PDO::PARAM_STR);
     $requete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
     $requete->execute();
		$_SESSION['msg'] = "Champs modifié"; 
	    header('location: planning1.php');





}
 

   if(isset($_GET['del'])){
	$id = (int)$_GET['del'];
	$requete = $pdo->prepare("DELETE FROM planning WHERE id=$id");
    $requete->execute();  
	$_SESSION['msg'] = "Champs supprimé"; 
	header('location: planning1.php');
}

$results = $pdo->query( "SELECT * FROM planning");
	

?>



 


