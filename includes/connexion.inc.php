<?php
//connexion a la bdd
try{
	$pdo = new PDO('mysql:host=localhost;dbname=micro_blog_soltysiak_samuel', 'root', '');
}catch (PDOException $e){
	echo 'Connexion échouée : ' . $e->getMessage();
}


//si le cookie existe, on récupére les informations de l'utilisateurs en fonction de son sid et on crée la variable $pseudo
if(isset($_COOKIE['cookieBlog'])){
	$query='SELECT * FROM utilisateurs WHERE sid=:sid';
	$prep= $pdo->prepare($query);
	$prep->bindValue(':sid', $_COOKIE['cookieBlog']);
	$prep->execute();
	$count=$prep->rowCount();
	if($count!=0){
		while ($data = $prep->fetch()) {
			$pseudo=$data['pseudo'];
		}
	}
	else{
		$pseudo="";
	}
}
//Si le cookie n'existe pas, on crée la variable $pseudo vide
else{
	$pseudo="";
}
?>
