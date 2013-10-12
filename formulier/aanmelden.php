<?php
$hash_algos = hash_algos(); // Haal een array op van alle ondersteunde hash-algoritmes

if (!empty($_POST) && isset($_POST['loginForm'])) {
	// @todo databaseconnectie maken.

	$login  = $_POST['login' ];  // Gebruikersnaam
	$passwd = $_POST['passwd']; // Wachtwoord
	$algo   = $_POST['algo'  ];   // Hash-algoritme

	$sleutel = 'Deze sleutel wordt nooit geraden!'; // Unieke sleutel, zodat de hashcodes specifiek voor deze applicatie zijn
	$hash_passwd = hash_hmac($algo, $passwd, $sleutel); // Deze code wordt vergeleken met de code in de database
}
?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Aanmelden</title>
</head>
<body>
	<form method="post">
		<dl>
			<dt><label for="login">Hashalgoritme:</label></dt>
			<dd><select id="algo" name="algo">
<?php foreach ($hash_algos as $hash_algo) : ?>
				<option value="<?=$hash_algo ?>"<?=@($algo == $hash_algo ? ' selected' : '') ?>><?=$hash_algo ?></option>
<?php endforeach; ?>
			</select></dd>
			<dt><label for="login">Gebruikersnaam:</label></dt>
			<dd><input id="login" name="login" type="text" value="<?=@$login ?>" placeholder="Gebruikersnaam"></dd>
			<dt><label for="passwd">Wachtwoord:</label></dt>
			<dd><input id="passwd" name="passwd" type="password" value="" placeholder="Wachtwoord"></dd>
			<dd><input name="loginForm" type="submit" value="Aanmelden"></dd>
		</dl>
	</form>
<?php
if (isset($hash_passwd)) {
	echo "hashcode: <code>{$hash_passwd}</code>";
}
?>
</body>
</html>
