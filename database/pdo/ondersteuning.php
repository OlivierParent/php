<?php

$beschibare_stuurprogrammas = PDO::getAvailableDrivers();
var_dump("Beschikbare stuurprogramma's:", $beschibare_stuurprogrammas);
