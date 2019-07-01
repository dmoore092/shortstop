<?php 

use PHPUnit\Framework\TestCase;
//include_once ("../classes/PDO.DB.Class.php");
include("classes/Player.PDO.Class.php");

class PlayerClassTest extends TestCase{
    final public function getConnection() {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }
 
        return $this->conn;
    }
    public function testIdCanBeGot(){
        $player = new PlayerDB();
        $player->$Id=1;
        $this->assertTrue($player->getId(), 1);
    }
}

?>