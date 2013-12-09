<?php
$waarde = 'Hallo wereld!';
setcookie('cookie_var', $waarde, time() + 3600);
// (Zet tijd in het verleden om cookie te verwijderen)

/**
 * @param string $naam
 * @param mixed $var
 */
function output($naam, $var)
{
    echo '<h2>', $naam, '</h2>', PHP_EOL;
    var_dump($var);
}

/**
 * @param string $naam Naam van de POST-variabele.
 */
function getPostValue($naam)
{
    return isset($_POST[$naam]) ? $_POST[$naam] : '';
}

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Formulier met cookies</title>
</head>
<body>
    <form action="?get_var1=Formulier%20verstuurd%21&amp;get_var2=Ontvangen%20%26%20opgeslagen" method="post">
        <label>POST-variabele 1:
            <input type="text" name="post_var1" value="<?=getPostValue('post_var1') ?>">
        </label>
        <label>POST-variabele 2:
            <input type="text" name="post_var2" value="<?=getPostValue('post_var2') ?>">
        </label>
        <input type="submit" name="btn-versturen" value="Versturen">
    </form>
<?php
    output('GET-variabelen'    , $_GET);
    output('POST-variabelen'   , $_POST);
    output('Cookie-variabelen' , $_COOKIE);
    output('Request-variabelen', $_REQUEST);
?>
</body>
</html>