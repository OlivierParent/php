<?php
    session_start();
    if (!empty($_POST)) {
        $_SESSION += $_POST; // Nieuwe waarden toevoegen en oude overschrijven 
    }

    function outputArray($naam, $array)
    {
        echo "<hr><pre>{$naam} ";
        print_r($array);
    }
?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Formulier met sessies</title>
</head>
<body>
    <form method="post">
        <label for="postVar1">Postvariabele 1:</label>
        <input type="text" id="postVar1" name="postVar1">
        <label for="postVar2">Postvariabele 2:</label>
        <input type="text" id="postVar2" name="postVar2">
        <input type="submit" value="versturen">
    </form>
    <?php
    outputArray('Post'    , $_POST   );
    outputArray('Session' , $_SESSION);

    echo '<hr>', session_id();
    $_SESSION = array(); // Sessie onmiddellijk leegmaken
    session_destroy();   // Sessie leegmaken na het beëindigen van het script

    outputArray('Session' , $_SESSION); 
?>
</body>
</html>