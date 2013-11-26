<?php
/**
 * Verifieert of het wachtwoord overeenkomt met het gehasht wachtwoord.
 *
 * @param string $wachtwoord
 * @param string $gehashtWachtwoord
 * @return bool
 */
function verifieerWachtwoord($wachtwoord, $gehashtWachtwoord)
{
    return crypt($wachtwoord, $gehashtWachtwoord) === $gehashtWachtwoord;
}