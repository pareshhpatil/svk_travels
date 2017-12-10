<?php

/**
 * This class calls necessary db objects to handle payment requests and requests to payment gateway
 *
 * @author Paresh
 */
class CommonModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getList($table, $column, $id, $order = 'desc') {
        try {
            $sql = "select * from " . $table . " where " . $column . "='" . $id . "' order by created_date " . $order;
            $params = array();
            $this->db->exec($sql, $params);
            $rows = $this->db->resultset();
            return $rows;
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E105]Error while ' . $sql . ' Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function getDetails($table, $column, $id) {
        try {
            $sql = "select * from " . $table . " where " . $column . "='" . $id . "'";
            $params = array();
            $this->db->exec($sql, $params);
            $rows = $this->db->single();
            return $rows;
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E105]Error while ' . $sql . ' Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

}
