<?php

class TransactionModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function saveFuel($vehicle_id, $driver_id, $amount, $litre, $mode, $sub_id, $note, $photo, $date, $user_id) {
        try {
            $sql = "INSERT INTO `fuel`(`vehicle_id`,`driver_id`,`amount`,`litre`,`mode`,`sub_id`,`rate`,`note`,`photo`,`date`,`created_by`,`created_date`,`last_update_by`)
                VALUES(:vehicle_id,:driver_id,:amount,:litre,:mode,:sub_id,:rate,:note,:photo,:date,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':vehicle_id' => $vehicle_id, ':driver_id' => $driver_id, ':amount' => $amount, ':litre' => $litre, ':mode' => $mode, ':sub_id' => $sub_id, ':rate' => $amount / $litre, ':note' => $note, ':photo' => $photo, ':date' => $date, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveCompany Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveLogsheet($vehicle_id, $company_id, $vendor_id, $driver_id, $from, $to, $is_pickup, $log_no, $time, $date, $km, $toll_amount, $user_id) {
        try {
            $sql = "INSERT INTO `logsheet`(`vehicle_id`,`company_id`,`vendor_id`,`driver_id`,`from`,`to`,`pickdrop`,`log_no`,`time`,`date`,`km`,`toll`,`created_by`,`created_date`,`last_update_by`)VALUES(:vehicle_id,:company_id,:vendor_id,:driver_id,:from,:to,:pickdrop,:log_no,:time,:date,:km,:toll,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':vehicle_id' => $vehicle_id, ':company_id' => $company_id, ':vendor_id' => $vendor_id, ':driver_id' => $driver_id, ':from' => $from, ':to' => $to, ':pickdrop' => $is_pickup, ':log_no' => $log_no, ':time' => $time, ':date' => $date, ':km' => $km, ':toll' => $toll_amount, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveCompany Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function uploadImage($image_file, $folder) {
        try {
            if ($image_file['name'] != '') {
                $filename = time() . basename($image_file['name']);
                $newname = 'uploads/images/' . $folder . '/' . $filename;
                //Check if the file with the same name is already exists on the server
                while (file_exists($newname)) {
                    $filename = '1' . $filename;
                    $newname = 'uploads/images/' . $folder . '/' . $filename;
                }
                //Attempt to move the uploaded file to it's new place
                if ((move_uploaded_file($image_file['tmp_name'], $newname))) {
                    return $filename;
                } else {
                    SwipezLogger::info(__CLASS__, 'failed' . $filename);
                }
            }
            return '';
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E136]Error while uploading template logo Error: ' . $e->getMessage());
        }
    }

}

?>
