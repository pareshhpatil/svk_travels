<?php

/**
 * Supplier controller class to handle Admins supplier
 */
class Vehicle extends Controller {

    function __construct() {
        parent::__construct();
        $this->validateSession('admin');
        $this->view->mainMenu = 'vehicle';
    }

    /**
     * Display admin suppliers list
     */
    function replacecab() {
        try {

            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $this->smarty->assign("vehiclelist", $vehiclelist);
            $list = $this->common->getList('replace_cab', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['id']);
                $row1 = $this->common->getDetails('vehicle', 'vehicle_id', $item['replace_vehicle_id']);
                $list[$int]['vehicle'] = $row1['name'];
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->view->selectedMenu = 'replacecab';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/vehicle/replace.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function replacesaved() {
        try {
            $user_id = $this->session->get('userid');
            $date = new DateTime($_POST['date']);
            $start_time = date('H:i:s', strtotime($_POST['in_time']));
            $close_time = date('H:i:s', strtotime($_POST['out_time']));
            $paid = ($_POST['is_paid'] == 1) ? 'Paid' : 'Not Paid';
            $this->model->saveReplaceCab($_POST['vehicle_number'], $_POST['owner_name'], $_POST['replace_vehicle_id'], $start_time, $close_time, $_POST['amount'], $paid, $_POST['note'], $date->format('Y-m-d'), $user_id);
            header("Location:/admin/vehicle/replacecab");
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

}

?>
