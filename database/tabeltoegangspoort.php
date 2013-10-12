<?php
class TabelToegangspoort
{
    protected static $_db;

    public function __construct($db)
    {
        self::$_db = $db;
    }
}

class Gebruikers extends TabelToegangspoort
{
    const STMT_INIT   = 'CREATE TABLE gebruikers (id INTEGER PRIMARY KEY, voornaam VARCHAR(255), naam VARCHAR(255), login VARCHAR(255), wachtwoord CHARACTER(40))';
    const STMT_CREATE = 'INSERT INTO gebruikers (voornaam, naam, login, wachtwoord) VALUES (:voornaam, :naam, :login, :wachtwoord)';
    const STMT_READ   = 'SELECT id, voornaam, naam, login FROM gebruikers';
    const STMT_UPDATE = 'UPDATE gebruikers SET voornaam = :voornaam, naam = :naam WHERE login = :login AND wachtwoord = :wachtwoord';
    const STMT_DELETE = 'DELETE FROM gebruikers WHERE login = :login AND wachtwoord = :wachtwoord';

    private $_stmtInit;
    private $_stmtCreate;
    private $_stmtRead;
    private $_stmtUpdate;
    private $_stmtDelete;
    
    public function __construct($db)
    {
        parent::__construct($db);
        self::init();
        $this->_stmtCreate = self::$db->prepare(self::STMT_CREATE);
        $this->_stmtUpdate = self::$db->prepare(self::STMT_UPDATE);
        $this->_stmtDelete = self::$db->prepare(self::STMT_DELETE);
    }
    
    public function __destruct()
    {
        $this->_stmtCreate->close();
        $this->_stmtUpdate->close();
        $this->_stmtDelete->close();
        echo 'Alle statements afgesloten';
    }
    
    public static function init()
    {
        self::$db->exec(self::STMT_INIT);
    }
    
    public function create($voornaam, $naam, $login, $wachtwoord)
    {
        $stmt = $this->_stmtCreate;
        $stmt->bindValue(':voornaam'  , $voornaam);
        $stmt->bindValue(':naam'      , $naam);
        $stmt->bindValue(':login'     , $login);
        $stmt->bindValue(':wachtwoord', sha1($wachtwoord));
        $stmt->execute();
    }

    public function read()
    {
        $res = self::$db->query(self::STMT_READ);
        echo '<pre>';
        while ($row = $res->fetchArray()) {
            print_r($row);
        }
        echo '<hr>';
    }

    public function update($voornaam, $naam, $login, $wachtwoord)
    {
        $stmt = $this->_stmtUpdate;
        $stmt->bindValue(':voornaam'  , $voornaam);
        $stmt->bindValue(':naam'      , $naam);
        $stmt->bindValue(':login'     , $login);
        $stmt->bindValue(':wachtwoord', sha1($wachtwoord));
        $stmt->execute();
    }

    public function delete($login, $wachtwoord)
    {
        $stmt = $this->_stmtDelete;
        $stmt->bindValue(':login'     , $login);
        $stmt->bindValue(':wachtwoord', sha1($wachtwoord));
        $stmt->execute();
    }
}

$db = new SQLite3(':memory:');
$gebruikers = new Gebruikers($db); // $db object: altijd pass-by-reference
$gebruikers->create('John', 'Doe', 'johndoe', 'root');
$gebruikers->create('Jane', 'Doe', 'janedoe', 'root');
$gebruikers->create('Jack', 'Doe', 'jackdoe', 'root');
$gebruikers->read();
$gebruikers->delete('janedoe', 'root');
$gebruikers->read();
$gebruikers->update('Jill', 'Doe', 'jackdoe', 'root');
$gebruikers->read();
unset($gebruikers);
$db->close();
