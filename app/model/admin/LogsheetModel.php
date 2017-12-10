<?php

class LogsheetModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function saveLogsheetbill($vehicle_id, $company_id, $driver_id, $date, $bill_date, $start_km, $end_km, $start_time, $close_time, $daynight, $remark, $toll_amount, $user_id) {
        try {
            $sql = "INSERT INTO `logsheet_bill`(`vehicle_id`,`company_id`,`driver_id`,`date`,`bill_date`,`start_km`,`end_km`,`total_km`,`start_time`,`close_time`,`day_night`,`remark`,`toll`,`created_by`,`created_date`,`last_update_by`)VALUES(:vehicle_id,:company_id,:driver_id,:date,:bill_date,:start_km,:end_km,:total_km,:start_time,:close_time,:day_night,:remark,:toll,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':vehicle_id' => $vehicle_id, ':company_id' => $company_id, ':driver_id' => $driver_id, ':date' => $date, ':bill_date' => $bill_date, ':start_km' => $start_km, ':end_km' => $end_km, ':total_km' => $end_km - $start_km, ':start_time' => $start_time, ':close_time' => $close_time, ':day_night' => $daynight, ':remark' => $remark, ':toll' => $toll_amount, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveOutstationbill($vehicle_id, $company_id, $date, $bill_date, $is_gst, $toll_amount, $user_id) {
        try {
            $invoice_number = $this->getInvoiceNumber();
            $sql = "INSERT INTO `outstation_invoice`(`invoice_number`,`vehicle_id`,`company_id`,`date`,`bill_date`,`is_gst`,`toll`,`created_by`,`created_date`,`last_update_by`)VALUES(:inv_number,:vehicle_id,:company_id,:date,:bill_date,:is_gst,:toll,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':inv_number' => $invoice_number, ':vehicle_id' => $vehicle_id, ':company_id' => $company_id, ':date' => $date, ':bill_date' => $bill_date, ':is_gst' => $is_gst, ':toll' => $toll_amount, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
            $id = $this->db->lastInsertId();
            return $id;
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+543]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function saveOutstationDetail($invoice_id, $particular, $date, $qty, $rate, $amount, $user_id) {
        try {
            $sql = "INSERT INTO `outstation_detail`
(`invoice_id`,`particular`,`date`,`qty`,`rate`,`amount`,`created_by`,`created_date`,`last_update_by`)
VALUES(:inv_id,:particular,:date,:qty,:rate,:amount,:user_id,CURRENT_TIMESTAMP(),:user_id);";
            $params = array(':inv_id' => $invoice_id, ':particular' => $particular, ':date' => $date, ':qty' => $qty, ':rate' => $rate, ':amount' => $amount, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function getExcel($date, $company_id, $vehicle_id) {
        $sql = "select *,TIMEDIFF( close_time,start_time) as total_time,TIMEDIFF( TIMEDIFF( close_time,start_time),'12:00:00') as extra_time from logsheet_bill where vehicle_id=:vehicle_id and company_id=:company_id and DATE_FORMAT(`date`,'%Y-%m')=DATE_FORMAT(:date,'%Y-%m') order by `date`";
        $params = array(':company_id' => $company_id, ':vehicle_id' => $vehicle_id, ':date' => $date);
        $this->db->exec($sql, $params);
        $rows = $this->db->resultset();
        return $rows;
    }

    public function getInvoice($date, $company_id, $vehicle_id) {
        $sql = "select * from logsheet_invoice where vehicle_id=:vehicle_id and company_id=:company_id and DATE_FORMAT(`date`,'%Y-%m')=DATE_FORMAT(:date,'%Y-%m')";
        $params = array(':company_id' => $company_id, ':vehicle_id' => $vehicle_id, ':date' => $date);
        $this->db->exec($sql, $params);
        $rows = $this->db->single();
        return $rows;
    }

    public function deletesheet($id) {
        $sql = "delete from logsheet_bill where logsheet_id=:logsheet_id";
        $params = array(':logsheet_id' => $id);
        $this->db->exec($sql, $params);
    }

    public function saveLogsheetInvoice($vehicle_id, $company_id, $date, $fix_qty, $fix_rate, $fix_amt, $extra_day_qty, $extra_day_rate, $extra_day_amt, $extra_km_qty, $extra_km_rate, $extra_km_amt, $extra_hr_qty, $extra_hr_rate, $extra_hr_amt, $br_down_qty, $br_down_rate, $br_down_amt, $toll, $user_id) {
        try {
            $invoice_number = $this->getInvoiceNumber();
            $sql = "INSERT INTO `logsheet_invoice`(`invoice_number`,`vehicle_id`,`company_id`,`date`,`fix_qty`,`fix_rate`,`fix_amt`,`extra_day_qty`,`extra_day_rate`,`extra_day_amt`,`extra_km_qty`,`extra_km_rate`,`extra_km_amt`,`extra_hr_qty`,`extra_hr_rate`,`extra_hr_amt`,`br_down_qty`,`br_down_rate`,`br_down_amt`,`toll`,`created_by`,`created_date`,`last_update_by`,`last_update_date`)
                VALUES(:invoice_number,:vehicle_id,:company_id,:date,:fix_qty,:fix_rate,:fix_amt,:extra_day_qty,:extra_day_rate,:extra_day_amt,:extra_km_qty,:extra_km_rate,:extra_km_amt,:extra_hr_qty,:extra_hr_rate,:extra_hr_amt,:br_down_qty,:br_down_rate,:br_down_amt,:toll,:user_id,CURRENT_TIMESTAMP(),:user_id,CURRENT_TIMESTAMP());";
            $params = array(':invoice_number' => $invoice_number, ':vehicle_id' => $vehicle_id, ':company_id' => $company_id, ':date' => $date, ':fix_qty' => $fix_qty, ':fix_rate' => $fix_rate, ':fix_amt' => $fix_amt, ':extra_day_qty' => $extra_day_qty, ':extra_day_rate' => $extra_day_rate, ':extra_day_amt' => $extra_day_amt, ':extra_km_qty' => $extra_km_qty, ':extra_km_rate' => $extra_km_rate, ':extra_km_amt' => $extra_km_amt, ':extra_hr_qty' => $extra_hr_qty, ':extra_hr_rate' => $extra_hr_rate, ':extra_hr_amt' => $extra_hr_amt, ':br_down_qty' => $br_down_qty, ':br_down_rate' => $br_down_rate, ':br_down_amt' => $br_down_amt, ':toll' => $toll, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function updateLogsheetInvoice($invoice_id, $vehicle_id, $company_id, $date, $fix_qty, $fix_rate, $fix_amt, $extra_day_qty, $extra_day_rate, $extra_day_amt, $extra_km_qty, $extra_km_rate, $extra_km_amt, $extra_hr_qty, $extra_hr_rate, $extra_hr_amt, $br_down_qty, $br_down_rate, $br_down_amt, $toll, $user_id) {
        try {
            $sql = "UPDATE `logsheet_invoice` SET `vehicle_id` = :vehicle_id,`company_id` = :company_id,`date` = :date,`fix_qty` = :fix_qty,`fix_rate` = :fix_rate,`fix_amt` = :fix_amt,`extra_day_qty` = :extra_day_qty,`extra_day_rate` = :extra_day_rate,`extra_day_amt` = :extra_day_amt,`extra_km_qty` = :extra_km_qty,`extra_km_rate` = :extra_km_rate,`extra_km_amt` = :extra_km_amt,`extra_hr_qty` = :extra_hr_qty,`extra_hr_rate` = :extra_hr_rate,`extra_hr_amt` = :extra_hr_amt,`br_down_qty` = :br_down_qty,`br_down_rate` = :br_down_rate,`br_down_amt` = :br_down_amt,`toll` = :toll,`last_update_by` = :user_id WHERE `invoice_id` = :invoice_id;";
            $params = array(':invoice_id' => $invoice_id, ':vehicle_id' => $vehicle_id, ':company_id' => $company_id, ':date' => $date, ':fix_qty' => $fix_qty, ':fix_rate' => $fix_rate, ':fix_amt' => $fix_amt, ':extra_day_qty' => $extra_day_qty, ':extra_day_rate' => $extra_day_rate, ':extra_day_amt' => $extra_day_amt, ':extra_km_qty' => $extra_km_qty, ':extra_km_rate' => $extra_km_rate, ':extra_km_amt' => $extra_km_amt, ':extra_hr_qty' => $extra_hr_qty, ':extra_hr_rate' => $extra_hr_rate, ':extra_hr_amt' => $extra_hr_amt, ':br_down_qty' => $br_down_qty, ':br_down_rate' => $br_down_rate, ':br_down_amt' => $br_down_amt, ':toll' => $toll, ':user_id' => $user_id);
            $this->db->exec($sql, $params);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    function getInvoiceNumber() {
        $sql = "select value from config where id=1";
        $params = array();
        $this->db->exec($sql, $params);
        $row = $this->db->single();

        $current_num = $row['value'] + 1;
        $sql = "update config set value='" . $current_num . "' where id=1";
        $params = array();
        $this->db->exec($sql, $params);

        if (strlen($current_num) == 2) {
            return 'ST0' . $current_num;
        } else {
            return 'ST' . $current_num;
        }
    }

}

?>
