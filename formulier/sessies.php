<?php
session_start();

if (!empty($_POST)) {
    $_SESSION += $_POST; // Nieuwe waarden toevoegen en oude overschrijven 
}

/**
 * @param string $naam
 * @param mixed $var
 */
function output($naam, $var)
{
    echo '<h2>', $naam, '</h2>', PHP_EOL;
    var_dump($var);
}

function sessieLeegmaken()
{
    session_destroy(); // Sessie leegmaken na het beëindigen van het script.
    $_SESSION = [];    // Sessie onmiddellijk leegmaken.
}

?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Formulier met sessies</title>
</head>
<body>
    <h1>Formulier met sessies</h1>
    <form action="#"  method="post">
        <label>Postvariabele 1:
            <input type="text" name="post_var1">
        </label>
        <label>Postvariabele 2:
            <input type="text" name="post_var2">
        </label>
        <input type="submit" value="Versturen">
    </form>
    <?php
    output('Post'      , $_POST      );
    output('Session'   , $_SESSION   );
    sessieLeegmaken();
    output('Session ID', session_id());
    output('Session'   , $_SESSION   ); 
?>
</body>
</html>