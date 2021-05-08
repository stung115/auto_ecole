<?php 
 session_start();
		$nom = "";
		$prenom = "";
		$sexe = "";
        $date_de_naissance = "";
        $adresse = "";
        $code_postal = "";
        $ville = "";
        $telephone = "";
        $adresse_mail = "";
		$etablissement = "";
		$formule = "";
		$id = 0;
		$edit_state = false;
		

		$pdo = new PDO("mysql:dbname=inscription_candidat;host=localhost","root","");

	if (isset($_POST['save'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$sexe = $_POST['sexe'];
        $date_de_naissance = $_POST['date_de_naissance'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $telephone = $_POST['telephone'];
        $adresse_mail = $_POST['adresse_mail'];
		$etablissement = $_POST['etablissement'];
		$formule = $_POST['formule'];

		$query = "INSERT INTO utilisateurs (nom, prenom,sexe,date_de_naissance,adresse,code_postal,ville,telephone,adresse_mail,etablissement,formule)
		 VALUES ('$nom', '$prenom' , '$sexe'  , '$date_de_naissance', '$adresse', '$code_postal', '$ville', '$telephone', '$adresse_mail', '$etablissement', '$formule' )"; 
		$pdo->query($query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: eleve1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$requete = $pdo->prepare("UPDATE utilisateurs SET 
		nom = :nom,
		prenom= :prenom,
		sexe= :sexe,
		date_de_naissance= :date_de_naissance,
		adresse= :adresse, 
		code_postal= :code_postal,
		ville= :ville,
		telephone= :telephone,
		adresse_mail= :adresse_mail, 
		etablissement= :etablissement,
		formule= :formule
        WHERE id= :id" );

     $requete->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
     $requete->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
     $requete->bindValue(':sexe',$_POST['sexe'],PDO::PARAM_STR);
     $requete->bindValue(':date_de_naissance',$_POST['date_de_naissance'],PDO::PARAM_STR);
     $requete->bindValue(':adresse',$_POST['adresse'],PDO::PARAM_STR);
     $requete->bindValue(':code_postal',$_POST['code_postal'],PDO::PARAM_STR);
     $requete->bindValue(':ville',$_POST['ville'],PDO::PARAM_STR);
     $requete->bindValue(':telephone',$_POST['telephone'],PDO::PARAM_STR);
     $requete->bindValue(':adresse_mail',$_POST['adresse_mail'],PDO::PARAM_STR);
     $requete->bindValue(':etablissement',$_POST['etablissement'],PDO::PARAM_STR);
     $requete->bindValue(':formule',$_POST['formule'],PDO::PARAM_STR);
     $requete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
     $requete->execute();
		
    $_SESSION['msg'] = "Champs modifié"; 
    header('location: eleve1.php');





}


   if(isset($_GET['del'])){
	$id = (int)$_GET['del'];
	$requete = $pdo->prepare("DELETE FROM utilisateurs WHERE id=$id");
    $requete->execute();  
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: eleve1.php');
}

$results = $pdo->query( "SELECT * FROM utilisateurs");
	

?>



 


