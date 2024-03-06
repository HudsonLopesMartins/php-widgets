<?php

/**
 * Description of TCriteria
 *
 * @author hudson
 * @version '1.0.0'
 */
class TCriteria extends TExpression{
    private $expressions;
    private $operators;
    private $properties;
    
    public function __construct() {
        $this->expressions = array();
        $this->operators = array();
    }
    
    public function add(TExpression $expression, $operator = self::AND_OPERATOR) {
        $this->expressions[] = $expression;
        $this->operators[] = $operator;
    }
    
    public function get() {
        $i = 0;
        if (is_array($this->expressions)){
            if (count($this->expressions) > 0){
                $result = '';
                foreach ($this->expressions as $k => $expression) {
                    $operator = $this->operators[$k];
                    ($i > 0)? $result .= $operator . $expression->get() . ' ': $result .= $expression->get() . ' ';
                    $i++; 
                }
                $result = trim($result);
                return "({$result})";
            }
        }
    }
    
    public function setProperty($property, $value) {
        isset($value)? $this->properties[$property] = $value : $this->properties[$property] = NULL;        
    }
    
    public function getProperty($property) {
        if (isset($this->properties[$property])){
            return $this->properties[$property];
        }
    }
}
