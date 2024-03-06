<?php

/**
 * Description of TExperssion
 *
 * @author hudson
 */
abstract class TExpression {
    const AND_OPERATOR = "and ";
    const OR_OPERATOR = "or ";
    
    abstract public function get();
}
