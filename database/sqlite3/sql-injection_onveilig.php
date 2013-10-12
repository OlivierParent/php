<?php
$db = new SQLite3(':memory:');

$sql = 'CREATE TABLE IF NOT EXISTS admins ('
     . 'admin_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, '
     . 'admin_username VARCHAR(255), '
	 . 'admin_password CHARACTER(40)'
     . ')';
$db->exec($sql); // Query uitvoeren waarvan geen resultaat verwacht wordt

$sql = 'INSERT INTO admins ('
     . 'admin_username, '
     . 'admin_password '
	 . ') VALUES ('
     . "'admin',"
     . "'" . sha1('admin') . "'"
     . ')';
$db->exec($sql); // Query uitvoeren waarvan geen resultaat verwacht wordt

if ( !empty($_POST) && isset($_POST['login']) ) {
	$sql = 'SELECT admin_username AS id '
		 . 'FROM admins '
		 . 'WHERE '
		 . "admin_username = '{$_POST['username']}' AND "
		 . "admin_password = '"  . sha1($_POST['password']) . "' "
		 . 'LIMIT 1';
	if ( $res = $db->query($sql) ) {
		if ($row = $res->fetchArray()) {
			$html = "<strong>ingelogd:</strong> <code>{$sql}</code>";
		} else {
			$html = "<strong>niet ingelogd:</strong> <code>{$sql}</code>";
		}

	}
}


$db->close();    // Databaseconnectie sluiten.

?>
<!DOCTYPE html>
<html lang="nl" xml:lang="nl">
<head>
<meta charset="utf-8">
<title>SQL-Injectie demo</title>
</head>

<body>
<h1>Inloggen</h1>
<form action="" method="post">
	<dl>
		<dt><label for="username">Gebruikersnaam:</label></dt>
		<dd><input id="username" name="username" type="text" value="<?php echo $_POST['username']; ?>"></dd>
		<dt><label for="password">Wachtwoord:</label></dt>
		<dd><input id="password" name="password" type="password"></dd>
		<dd><input name="login" type="submit" value="Inloggen"></dd>
	</dl>
</form>
<?php echo @$html; ?>
</body>
</html>
