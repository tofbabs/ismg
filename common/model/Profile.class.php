<?php
/**
 * User Model
 */
class Profile extends Model {
	
    protected static $tableName = 'profile';
    protected static $primaryKey = 'id';
    
    
    function setId($value){
        $this->setColumnValue('id', $value);
    }
    function getId(){
        return trim($this->getColumnValue('id'));
    }
    
    function setUsername($value){
        $this->setColumnValue('name', $value);
        echo 'Setting Name to {$value}';
    }
    function getUsername(){
        return $this->getColumnValue('name');
    }

    function setShortcode($value){
        $this->setColumnValue('shortcode', $value);
    }

    function getShortcode(){
        return trim($this->getColumnValue('shortcode'));
    }
    
    function setSMSC($value){
        $this->setColumnValue('smsc', $value);
    }
    function getSMSC(){
        return trim($this->getColumnValue('smsc'));
    }
    
    function setType($value){
        $this->setColumnValue('type', $value);
    }
    function getType(){
        return trim($this->getColumnValue('type'));
    }

    function setPassword($value){
        $this->setColumnValue('password', $value);
    }
    function getPassword(){
        return trim($this->getColumnValue('password'));
    }
}
