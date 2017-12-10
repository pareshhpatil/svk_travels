<?php

class MasterModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function saveDriver($name, $email, $mobile,$salary, $pan, $address, $adharcard, $license, $photo, $join_date, $payment_date, $user_id) {
        try {
            $sql = "INSERT INTO `driver`(`name`,`email`,`mobile`,`pan`,`address`,`adharcard`,`license`,`payment`,`photo`,`join_date`,`payment_date`,`created_by`,`created_date`,`last_update_by`)VALUES(:name,:email,:mobile,:pan,:address,:adharcard,:license,:payment,:photo,:join_date,:payment_date,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':name' => $name, ':email' => $email, ':mobile' => $mobile, ':pan' => $pan, ':address' => $address,
                ':adharcard' => $adharcard, ':license' => $license,':payment' => $salary, ':photo' => $photo, ':join_date' => $join_date, ':payment_date' => $payment_date, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveDriver Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveVehicle($name, $brand, $number, $model, $purchase_date, $photo, $user_id) {
        try {
            $sql = "INSERT INTO `vehicle`(`name`,`brand`,`model`,`number`,`purchase_date`,`photo`,`created_by`,`created_date`,`last_update_by`)
                VALUES(:name,:brand,:model,:number,:purchase_date,:photo,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':name' => $name, ':brand' => $brand, ':model' => $model, ':number' => $number, ':purchase_date' => $purchase_date, ':photo' => $photo, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveVehicle Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveCompany($name, $package, $address, $date, $photo, $user_id) {
        try {
            $sql = "INSERT INTO `company`(`name`,`package`,`address`,`join_date`,`photo`,`created_by`,`created_date`,`last_update_by`)
                VALUES(:name,:package,:address,:date,:photo,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':name' => $name, ':package' => $package, ':address' => $address, ':date' => $date, ':photo' => $photo, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveCompany Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveVendor($name, $company, $mobile, $photo, $user_id) {
        try {
            $sql = "INSERT INTO `vendor`(`name`,`company_id`,`mobile`,`photo`,`created_by`,`created_date`,`last_update_by`)
                VALUES(:name,:company,:mobile,:photo,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':name' => $name, ':company' => $company, ':mobile' => $mobile, ':photo' => $photo, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveCompany Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveCard($name, $bank, $type, $user_id) {
        try {
            $sql = "INSERT INTO `card`(`name`,`bank`,`type`,`created_by`,`created_date`,`last_update_by`)
                VALUES(:name,:bank,:type,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':name' => $name, ':bank' => $bank, ':type' => $type, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveCompany Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveLocation($name, $user_id) {
        try {
            $sql = "INSERT INTO `location`(`name`,`created_by`,`created_date`,`last_update_by`)
                VALUES(:name,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':name' => $name, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295]Error while saveLocation Error: ' . $e->getMessage());
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
