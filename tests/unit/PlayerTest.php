<?php 

use PHPUnit\Framework\TestCase;
include("classes/Database.class.php");
include("classes/PlayerPDO.class.php");
//include '../../assets/inc/autoloader.inc.php';

class PlayerTest extends TestCase{
    // final public function getConnection() {
    //     if ($this->conn === null) {
    //         if (self::$pdo == null) {
    //             self::$pdo = new PDO( $GLOBALS['DB_DSN'], "root", "y#GbqXtBGcy!z3Cf" );
    //         }
    //         $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
    //     }
 
    //     return $this->conn;
    // }
    public function testIdCanBeGot(){
        $player = new PlayerPDO();
        $player->getId();
        $this->assertTrue($player->getId(), "1");
    }
}

?>