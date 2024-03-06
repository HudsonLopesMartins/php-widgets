<?php

/**
 * Description of dbconn
 * Dependencia:
 * - config.inc.php contendo as constantes
 *   DBN_MYSQL - nome do banco de dados
 *   DSN_MYSQL - host do banco de dados
 *   UID_MYSQL - usuario
 *   PWD_MYSQL - senha
 * @author hudson martins
 */
final class TDBConn {
    private static $options = [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_EMULATE_PREPARES => false
                              ];
    private $vers = "2024.03.06-0950";
    
    private function __construct() {}

    public static function db() {
        $db = new PDO("mysql:dbname=" . DBN_MYSQL . ";host=" . DSN_MYSQL . ";charset=utf8mb4"
                    , UID_MYSQL
                    , PWD_MYSQL
                    , self::$options);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    
    public static function getVersion() {
        return self::$vers;
    }
}
