<?php
/**
 * User Model
 */
class SentSms extends Model {
	
    protected static $tableName = 'sent_sms';
    protected static $primaryKey = 'sql_id';

    function getSender($shortcode){
        return $this->getColumnValue('sender', $shortcode);
    }

    function getReceiver($msisdn){
        return $this->getColumnValue('receiver', $msisdn);
    }


    function getSmsc($smsc){
        return $this->getColumnValue('smsc_id', $smsc);
    }

    function getAccount($profile){
        # code...
        return $this->getColumnValue('account', $msg);
    }
    
    /**
     * Get the number of items
     */
    static function getCount($condition=array()){
       $query = "SELECT COUNT(*) FROM " . static::$tableName;
        if(!empty($condition)){
            $query .= " WHERE ";
            foreach ($condition as $key => $value) {
                
                if ($key=='date') {
                    # code...
                    $query .= $key . ">:".$key." AND date<='" . $value . "'::date + interval '1 day' AND ";
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
