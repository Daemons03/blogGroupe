<?php
//on vérifie si les données sont bien renseigner
if (isset($_POST['email']) && isset($_POST['password'])) {
	require_once "./methodes/usermanager.php";
	require_once "./methodes/user.php";
	$usersquery = new UserManager($bdd);
	$user = $usersquery->getUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
	// si les données sont juste
	if($user){
		$_SESSION['id'] = $user->getIdClient();
		$_SESSION['nom'] = $user->getUser();
		$_SESSION['email'] = $user->getEmail();
		header("Location: index.php");
	}
}else{
	echo "Vous n'avez pas remplis les champs";
}
?>