<?php

$drivers = PDO::getAvailableDrivers();
var_dump("Beschikbare stuurprogramma’s:", $drivers);
