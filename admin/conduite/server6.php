<?php 
session_start();
		$adresse_con = "";
		$code_postal_con = "";
		$ville_con = "";
        $type_examen_con = "";
        $nom_candidat_con = "";
        $prenom_candidat_con = "";
        $heure_con = "";
		$id = 0;
		$edit_state = false;
		

		$pdo = new PDO("mysql:dbname=inscription_candidat;host=localhost","root","");


	if  (isset($_POST['save'])) {
		$adresse_con = $_POST['adresse_con'];
		$code_postal_con = $_POST['code_postal_con'];
		$ville_con = $_POST['ville_con'];
        $type_examen_con = $_POST['type_examen_con'];
        $nom_candidat_con = $_POST['nom_candidat_con'];
        $prenom_candidat_con = $_POST['prenom_candidat_con'];
        $heure_con = $_POST['heure_con'];


		$query = "INSERT INTO conduite (adresse_con, code_postal_con,ville_con,type_examen_con,nom_candidat_con,prenom_candidat_con,heure_con)
         VALUES ('$adresse_con', '$code_postal_con' , '$ville_con'  , '$type_examen_con', '$nom_candidat_con', '$prenom_candidat_con', '$heure_con')"; 
		$pdo->query($query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: conduite1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$requete = $pdo->prepare("UPDATE conduite SET 
		adresse_con = :adresse_con,
		code_postal_con= :code_postal_con,
		ville_con= :ville_con,
		type_examen_con= :type_examen_con,
		nom_candidat_con= :nom_candidat_con, 
		prenom_candidat_con= :prenom_candidat_con,
		heure_con= :heure_con
		WHERE id= :id" );
		
        $requete->bindValue(':adresse_con',$_POST['adresse_con'],PDO::PARAM_STR);
		$requete->bindValue(':code_postal_con',$_POST['code_postal_con'],PDO::PARAM_STR);
		$requete->bindValue(':ville_con',$_POST['ville_con'],PDO::PARAM_STR);
		$requete->bindValue(':type_examen_con',$_POST['type_examen_con'],PDO::PARAM_STR);
		$requete->bindValue(':nom_candidat_con',$_POST['nom_candidat_con'],PDO::PARAM_STR);
		$requete->bindValue(':prenom_candidat_con',$_POST['prenom_candidat_con'],PDO::PARAM_STR);
		$requete->bindValue(':heure_con',$_POST['heure_con'],PDO::PARAM_STR);
		$requete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
		$requete->execute();

	    $_SESSION['msg'] = "Champs modifié !"; 
	    header('location: conduite1.php');





   }

if(isset($_GET['del'])){
	$id = (int)$_GET['del'];
$requete = $pdo->prepare("DELETE FROM conduite WHERE id=$id");
$requete->execute();   
$_SESSION['msg'] = "Champs suppimés"; 
	header('location: conduite1.php');
}



$results = $pdo->query( "SELECT * FROM conduite");
	

?>



 


