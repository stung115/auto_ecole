<?php 
 session_start();
		$adresse = "";
		$code_postal = "";
		$ville = "";
        $type_examen = "";
        $nom_candidat = "";
        $prenom_candidat = "";
        $heure = "";
		$id = 0;
		$edit_state = false;
		

		$pdo = new PDO("mysql:dbname=inscription_candidat;host=localhost","root","");

	if (isset($_POST['save'])) {
		$adresse = $_POST['adresse'];
		$code_postal = $_POST['code_postal'];
		$ville = $_POST['ville'];
        $type_examen = $_POST['type_examen'];
        $nom_candidat = $_POST['nom_candidat'];
        $prenom_candidat = $_POST['prenom_candidat'];
        $heure = $_POST['heure'];

		$query = "INSERT INTO code (adresse, code_postal,ville,type_examen,nom_candidat,prenom_candidat,heure) VALUES ('$adresse', '$code_postal' , '$ville'  , '$type_examen','$nom_candidat','$prenom_candidat','$heure' )"; 
	    $pdo->query($query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: code1.php');	
	
	}
	


	if (isset($_POST['update'])) {
		$requete = $pdo->prepare("UPDATE code SET 
	    adresse = :adresse,
		code_postal = :code_postal,
		ville= :ville,
        type_examen= :type_examen,
        nom_candidat= :nom_candidat, 
        prenom_candidat = :prenom_candidat,
        heure= :heure
      	WHERE id= :id");

         $requete->bindValue(':adresse',$_POST['adresse'],PDO::PARAM_STR);
         $requete->bindValue(':code_postal',$_POST['code_postal'],PDO::PARAM_STR);
         $requete->bindValue(':ville',$_POST['ville'],PDO::PARAM_STR);
         $requete->bindValue(':type_examen',$_POST['type_examen'],PDO::PARAM_STR);
         $requete->bindValue(':nom_candidat',$_POST['nom_candidat'],PDO::PARAM_STR);
         $requete->bindValue(':prenom_candidat',$_POST['prenom_candidat'],PDO::PARAM_STR);
         $requete->bindValue(':heure',$_POST['heure'],PDO::PARAM_STR);
         $requete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
         $requete->execute();


		
	    $_SESSION['msg'] = "Champs modifié"; 
	    header('location: code1.php');





   }


   if(isset($_GET['del'])){
	$id = (int)$_GET['del'];
	$requete = $pdo->prepare("DELETE FROM code WHERE id=$id");
	$requete->execute();   
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: code1.php');
}

$results = $pdo->query( "SELECT * FROM code");
	
	

?>



 


