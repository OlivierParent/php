<?php
$bool = true;

/**
 * Ternaire operator: de conditionele operator (? :)
 */
echo $bool ? 'WAAR' : 'ONWAAR'; // output: WAAR

/**
 * De conditionele operator doet hetzelfde als deze if-lus.
 */
if ($bool) {
    echo 'WAAR';
} else {
    echo 'ONWAAR';
}