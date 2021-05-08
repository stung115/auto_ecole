<?php 
 session_start();
		$nom = "";
		$prenom = "";
		$mail = "";
		$tel = "";
		$id = 0;
		$edit_state = false;
		

		$pdo = new PDO("mysql:dbname=inscription_candidat;host=localhost","root","");

	if (isset($_POST['save'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];

		$query = "INSERT INTO moniteur (nom, prenom,mail,tel) 
		VALUES ('$nom', '$prenom' , '$mail'  , '$tel')"; 
		$pdo->query($query);
		$_SESSION['msg'] = "Champs ajouté";
		header('location: index1.php');	
	
	}
	

	if (isset($_POST['update'])) {
		$requete = $pdo->prepare("UPDATE moniteur SET 
		nom = :nom,
		prenom= :prenom,
		mail= :mail,
		tel= :tel
        WHERE id= :id" );

     $requete->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
     $requete->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
     $requete->bindValue(':mail',$_POST['mail'],PDO::PARAM_STR);
     $requete->bindValue(':tel',$_POST['tel'],PDO::PARAM_STR);
     $requete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
     $requete->execute();
	$_SESSION['msg'] = "Champs modifié"; 
    header('location: index1.php');





}


   if(isset($_GET['del'])){
	$id = (int)$_GET['del'];
	$requete = $pdo->prepare("DELETE FROM moniteur WHERE id=$id");
    $requete->execute();  
	$_SESSION['msg'] = "Champs suppimer"; 
	header('location: index1.php');
}

$results = $pdo->query( "SELECT * FROM moniteur");
	

?>



 


