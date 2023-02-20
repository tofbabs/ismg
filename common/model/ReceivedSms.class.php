<?php
/**
 * User Model
 */
class ReceivedSms extends Model {
	
    protected static $tableName = 'received_sms';
    protected static $primaryKey = 'id';
    
    
    function getId(){
        return $this->getColumnValue('id');
    }

    function setShortcode($value){
        $this->setColumnValue('shortcode', $value);
    }
    function getShortcode(){
        return $this->getColumnValue('shortcode');
    }

    function setMsisdn($value){
        $this->setColumnValue('msisdn', $value);
    }
    function getMsisdn(){
        return $this->getColumnValue('msisdn');
    }

    function setTimestamp($value){
        $this->setColumnValue('timestamp', $value);        
    }
    function getTimestamp(){
        return $this->getColumnValue('timestamp');
    }

    function setMsg($value){
        $this->setColumnValue('msg', $value);
    }
    function getMsg(){
        return $this->getColumnValue('msg');
    }
    
      /**
     * Get the number of items
     */
    static function getCount($condition=array()){
       $query = "SELECT COUNT(*) FROM " . static::$tableName;
        if(!empty($condition)){
            $query .= " WHERE ";
            foreach ($condition as $key => $value) {
                
                if ($key=='timestamp') {
                    # code...
                    $query .= $key . ">:".$key." AND timestamp<='" . $value . "'::date + interval '1 day' AND ";
//                     $query .= $key . '>=:'.$key. ' AND ' . $key .'<(":'. $key .'"::date + "1 day"::interval) AND ';
                }
                else $query .= $key . "=:".$key." AND ";
            }
        }
//         echo $query;
        $query = rtrim($query,' AND ');
        $db = Database::getInstance();
        $s = $db->getPreparedStatment($query);
        foreach ($condition as $key => $value) {
            $condition[':'.$key] = $value;
            unset($condition[$key]);
        }
        $s->execute($condition);
        $countArr = $s->fetch();
        return $countArr[0];
    }
    
}
