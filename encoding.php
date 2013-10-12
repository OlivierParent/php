<?php

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>code</th>
            <th>Character</th>
        </tr>
        </thead>
        <tbody>
<?php for ($i = 0; $i < 256; $i++) : ?>
        <tr>
            <th>code</th>
            <th>Character</th>
        </tr>
   
        </tbody>

    </table>
<?php
    for ($i = 0; $i < 256; $i++) {
        echo "<p><strong>{$i}</strong>: " . chr ($i) . "</p>\n";
    }
?>
</body>
</html>