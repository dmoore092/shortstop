<?php 

use PHPUnit\Framework\TestCase;

class PDODBTest extends TestCase{
    public function testTrueAssetsToTrue(){
        $this -> assertTrue(true);
    }

    // final public function getConnection() {
    //     if ($this->conn === null) {
    //         if (self::$pdo == null) {
    //             self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
    //         }
    //         $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
    //     }
 
    //     return $this->conn;
    // }
}

?>