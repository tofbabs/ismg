<?php
/**
 * User Model
 */
class Shortcode extends Model {
	
    protected static $tableName = 'shortcode';
    protected static $primaryKey = 'ID';
    
    function getId(){
        return $this->getColumnValue('ID');
    }
    
    function setCode($value){
        $this->setColumnValue('code', $value);
    }
    function getCode(){
        return $this->getColumnValue('code');
    }

    function setSMSC($value){
        $this->setColumnValue('smsc', $value);
    }

    function getSMSC(){
        return $this->getColumnValue('smsc');
    }

    function setValue($value){
        $this->setColumnValue('value', $value);
    }
    function getValue(){
        return $this->getColumnValue('value');
    }
    
    // MO or MT
    function setType($value){
        $this->setColumnValue('type', $value);
    }
    function getType(){
        return $this->getColumnValue('type');
    }
}
