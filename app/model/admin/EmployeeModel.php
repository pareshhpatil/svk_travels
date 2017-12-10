<?php

class EmployeeModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function saveEmployeeAbsent($vehicle_id, $driver_id, $replace_driver, $remark,$date, $user_id) {
        try {
            $sql = "INSERT INTO `absent`(`driver_id`,`vehicle_id`,`replace_driver_id`,`date`,`note`,`created_by`,`created_date`,`last_update_by`)VALUES(:driver_id,:vehicle_id,:replace_driver_id,:date,:remark,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':driver_id' => $driver_id, ':vehicle_id' => $vehicle_id, ':replace_driver_id' => $replace_driver, ':date' => $date, ':remark' => $remark, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }
    
    public function saveEmployeeOverTime($vehicle_id, $driver_id, $replace_driver,$amount, $remark,$date, $user_id) {
        try {
            $sql = "INSERT INTO `overtime`(`driver_id`,`vehicle_id`,`replace_driver_id`,`date`,`note`,`amount`,`created_by`,`created_date`,`last_update_by`)VALUES(:driver_id,:vehicle_id,:replace_driver_id,:date,:remark,:amount,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':driver_id' => $driver_id, ':vehicle_id' => $vehicle_id, ':replace_driver_id' => $replace_driver, ':date' => $date, ':remark' => $remark,':amount' => $amount, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }
    
    public function saveEmployeeAdvance($driver_id, $amount, $remark,$date, $user_id) {
        try {
            $sql = "INSERT INTO `advance`(`driver_id`,`amount`,`date`,`note`,`created_by`,`created_date`,`last_update_by`)VALUES(:driver_id,:amount,:date,:remark,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':driver_id' => $driver_id, ':amount' => $amount, ':date' => $date, ':remark' => $remark, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

}

?>
