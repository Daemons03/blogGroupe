<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
<!-- Header et aside -->
<?php 
		require_once "./inc/headernonconnec.inc.php";
		require_once "./inc/asidenonconnec.inc.php";
?>
	<!-- Header et aside -->
	<!-- Section -->
	<section>
			<form class="form" method="POST" action="?page=inscription">
			<label>Nom:</label><br/>
			<input type="text" name="nom" required><br/><br/>
			<label>Mot de passe:</label><br/>
			<input type="password" name="motdepasse" required><br/><br/>
			<label>Email:</label><br/>
			<input type="email" name="mail" required><br/><br/>
			<input type="submit" name="insription" value="S'inscrire">
		</form>
	</section>
	<?php
	if (isset($_POST["nom"]) && isset($_POST["motdepasse"]) && isset($_POST["mail"])){
		$user = $_POST["nom"];
		$password = MD5($_POST["motdepasse"]);
		$email= $_POST["mail"];
		$query = $bdd->query("SELECT id FROM user WHERE email = '$email'");
		var_dump($query);
		if($query == 1){
		   // Pseudo déjà utilisé
		   echo 'Ce pseudo est déjà utilisé';
		}else{
		   // Pseudo libre
		  echo 'Ce pseudo est libre';
		}
		// if ($dn== 0){
		// 	$req = $bdd->prepare('INSERT INTO user(user, password, email) VALUES(:user, :password, :email)');
		// 	$req->execute(array(
		// 		'user' => $user,
		// 		'password' => $password,
		// 		'email' => $email
		// 		));
		// 		//connexion après inscription
		// 	if (isset($user) && isset($_POST["motdepasse"])) {
		// 	require_once "./methodes/usermanager.php";
		// 	require_once "./methodes/user.php";
		// 	$usersquery = new UserManager($bdd);
		// 	$user = $usersquery->getUser($user, $_POST["motdepasse"]);
		// 		// si les données sont juste
		// 		if($user){
		// 			$_SESSION['id'] = $user->getIdClient();
		// 			$_SESSION['nom'] = $user->getUser();
		// 			$_SESSION['email'] = $user->getEmail();
		// 			header("Location: index.php");
		// 		}
		// 	}
		// }else{
		// 	echo "L'email existe déjà";
		// }
	}
?>
	<!--Fin de section -->
	<?php 
	require_once "./inc/footer.inc.php";
?>


</body>
</html>