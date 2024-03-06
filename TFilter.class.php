<?php

/**
 * Description of TFilter
 *
 * @author hudson
 * @version '1.0.0'
 */
class TFilter extends TExpression {
    private $field;
    private $operator;
    private $value;
    
    public function __construct($field, $operator, $value, $modval = NULL) {
        $this->field = $field;
        $this->operator = $operator;
        switch ($modval) {
            case "FUNCTION":
                $this->value = $value;
                break;    
            default:
                $this->value = $this->convert($value);
                break;
        }
    }
    
    private function convert($value) {
        $result = null;
        if (is_array($value)){
            foreach ($value as $v) {
                if (is_integer($v)){
                    $f[] = $v;
                }
                else if (is_string($v)){
                    $f[] = "'$v'";
                }
            }
            $result = '(' . implode(',', $f) . ')';
        }
        else if (is_string($value)){
            $result = "'$value'";
        }
        else if (is_null($value)){
            $result = 'NULL';
        }
        else if (is_bool($value)){
            $result = $value? 'TRUE':'FALSE';
        }
        else {
            $result = $value;
        }
        return $result;
    }
    
    public function get() {
        return "{$this->field} {$this->operator} {$this->value}";
    }
}
