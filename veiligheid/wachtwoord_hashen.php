<php
 
/**
 * Hasht wachtwoord met het Blowfish hashalgoritme.
 * Het resultaat is een tekenstring met exact 60 tekens en bevat het oorspronkelijk salt
 * zodat je de resulterende hashcode als salt kan gebruiken om met het oorspronkelijk wachtwoord
 * tot exact dezelfde hashcode te berekenen.
 *
 * Zie ook: http://php.net/mcrypt_create_iv
 * Zie ook: http://php.net/base64_encode
 * Zie ook: http://php.net/strtr
 * Zie ook: http://php.net/sprintf
 * Zie ook: http://php.net/crypt
 *
 * @param string $wachtwoord
 * @return string
 */
function hashWachtwoord($wachtwoord)
{
    $algo       = '2y';   // Blowfish algoritme (heeft PHP 5.3.7+ nodig)
    $cost       = 13;     // int van 4 t.e.m. 31. Hoe hoger hoe langer de hashberekening duurt, dus hoe veiliger.
    $randomSalt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

    if (is_string($randomSalt) && strlen($randomSalt) > 22) {
        $salt = '$' . $algo . '$' . sprintf('%02d', $cost) . '$' . $randomSalt;
        $gehashtWachtwoord = crypt($wachtwoord, $salt);

        return $gehashtWachtwoord;
    }
    
    // Volledig script (niet enkel deze functie) moet stoppen want $randomSalt is onveilig.
    die('Kan geen veilige salt genereren om het wachtwoord te hashen.');
}