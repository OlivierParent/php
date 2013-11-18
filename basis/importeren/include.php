<?php
include      'inhoud.php'; // output: Hallo wereld!
require_once 'inhoud.php'; // geen output (voordien al ingevoegd)
require      'inhoud.php'; // output: Hallo wereld!
include_once 'inhoud.php'; // geen output (voordien al ingevoegd)
