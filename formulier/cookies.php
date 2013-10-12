<?php
    $waarde = 'Hallo wereld!';
    setcookie('cookieVar', $waarde, time() + 3600);
    // (Zet tijd in het verleden om cookie te verwijderen)

    function outputArray($naam, $array)
    {
        echo "<hr><pre>{$naam} ";
        print_r($array);
        echo '</pre>';
    }
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Formulier</title>
</head>
<body>
    <form action="?getVar1=Formulier%20verstuurd%21&amp;getVar2=Ontvangen%20%26%20opgeslagen" method="post">
        <label for="postVar1">Postvariabele 1:</label>
        <input type="text" id="postVar1" name="postVar1" value="<?=@$_POST['postVar1'] ?>">
        <label for="postVar2">Postvariabele 2:</label>
        <input type="text" id="postVar2" name="postVar2" value="<?=@$_POST['postVar2'] ?>">
        <input type="submit" value="versturen" title="versturen">
    </form>
<?php
        outputArray('Get'    , $_GET);
        outputArray('Post'   , $_POST);
        outputArray('Cookie' , $_COOKIE);
        outputArray('Request', $_REQUEST);
?>
</body>
</html>
