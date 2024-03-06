<?php
/**
 * Description of TGetJSON
 *
 * @author hudsonl
 */

interface iGetJSON {
    public static function getVersion();
    public static function getJSON($nameResult, $data = array());
    public static function getJSONData( $data = array() );
    public static function toJSON($code, $message);
}

class TGetJSON implements iGetJSON {
    public static function getVersion() {
        echo json_encode(array("versão" => "2024.02.06-1341"));
    }
    /**
     * 
     * @param string $nameResult
     * @param array $data
     * @return json
     */
    public static function getJSON($key, $data = array() ) {
        return json_encode( array($key => $data), JSON_NUMERIC_CHECK );
    }
    
    /**
     * 
     * @param array $data
     * @return json
     * 
     */
    public static function getJSONData($data = array()) {
        return json_encode($data, JSON_NUMERIC_CHECK);
    }
    
    /**
     * 
     * @param int $code
     * @param string $message
     * @return json
     */
    public static function messageToJSON($code, $message){
        $msg = array("COD"=>$code, "MSG"=>$message);
        return json_encode($msg, JSON_NUMERIC_CHECK);
    }
    
}

?>
