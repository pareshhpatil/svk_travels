<?php

class VehicleModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function saveReplaceCab($vehicle_number, $owner_name, $replace_vehicle_id, $start_time, $close_time, $amount, $paid, $remark, $date, $user_id) {
        try {
            $sql = "INSERT INTO `replace_cab`(`vehicle_number`,`owner_name`,`replace_vehicle_id`,`in_time`,`out_time`,`amount`,`is_paid`,`date`,`note`,`created_by`,`created_date`,`last_update_by`)VALUES(:vehicle_number,:owner_name,:replace_vehicle_id,:in_time,:out_time,:amount,:is_paid,:date,:remark,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':vehicle_number' => $vehicle_number, ':owner_name' => $owner_name, ':replace_vehicle_id' => $replace_vehicle_id, ':in_time' => $start_time,':out_time' => $close_time,':amount' => $amount,':is_paid' => $paid,':date' => $date,':remark' => $remark, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

}

?>
