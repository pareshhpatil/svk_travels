<?php

/**
 * Supplier controller class to handle Admins supplier
 */
class Employee extends Controller {

    function __construct() {
        parent::__construct();
        $this->validateSession('admin');
        $this->view->mainMenu = 'employee';
    }

    /**
     * Display admin suppliers list
     */
    function absent() {
        try {
            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $driverlist = $this->common->getList('driver', 'is_active', 1);
            $this->smarty->assign("driverlist", $driverlist);
            $this->smarty->assign("vehiclelist", $vehiclelist);
            $list = $this->common->getList('absent', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['absent_id']);
                $row1 = $this->common->getDetails('vehicle', 'vehicle_id', $item['vehicle_id']);
                $row = $this->common->getDetails('driver', 'driver_id', $item['driver_id']);
                $row2 = $this->common->getDetails('driver', 'driver_id', $item['replace_driver_id']);
                $list[$int]['vehicle'] = $row1['name'];
                $list[$int]['driver_name'] = $row['name'];
                $list[$int]['replace_driver_name'] = $row2['name'];
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->view->selectedMenu = 'absent';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/employee/absent.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }
    function overtime() {
        try {
            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $driverlist = $this->common->getList('driver', 'is_active', 1);
            $this->smarty->assign("driverlist", $driverlist);
            $this->smarty->assign("vehiclelist", $vehiclelist);
            $list = $this->common->getList('overtime', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['absent_id']);
                $row1 = $this->common->getDetails('vehicle', 'vehicle_id', $item['vehicle_id']);
                $row = $this->common->getDetails('driver', 'driver_id', $item['driver_id']);
                $row2 = $this->common->getDetails('driver', 'driver_id', $item['replace_driver_id']);
                $list[$int]['vehicle'] = $row1['name'];
                $list[$int]['driver_name'] = $row['name'];
                $list[$int]['replace_driver_name'] = $row2['name'];
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->view->selectedMenu = 'overtime';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/employee/overtime.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }
     function advance() {
        try {
            $driverlist = $this->common->getList('driver', 'is_active', 1);
            $this->smarty->assign("driverlist", $driverlist);
            $list = $this->common->getList('advance', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $row = $this->common->getDetails('driver', 'driver_id', $item['driver_id']);
                $list[$int]['driver_name'] = $row['name'];
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->view->selectedMenu = 'advance';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/employee/advance.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function absentsaved() {
        try {
            $user_id = $this->session->get('userid');
            $date = new DateTime($_POST['date']);
            $this->model->saveEmployeeAbsent($_POST['vehicle_id'], $_POST['driver_id'], $_POST['replace_driver_id'], $_POST['note'], $date->format('Y-m-d'), $user_id);
            header("Location:/admin/employee/absent");
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }
    
    function overtimesaved() {
        try {
            $user_id = $this->session->get('userid');
            $date = new DateTime($_POST['date']);
            $this->model->saveEmployeeOverTime($_POST['vehicle_id'], $_POST['driver_id'], $_POST['replace_driver_id'], $_POST['amount'],$_POST['note'], $date->format('Y-m-d'), $user_id);
            header("Location:/admin/employee/overtime");
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }
    
    function advancesaved() {
        try {
            $user_id = $this->session->get('userid');
            $date = new DateTime($_POST['date']);
            $this->model->saveEmployeeAdvance( $_POST['driver_id'], $_POST['amount'], $_POST['note'], $date->format('Y-m-d'), $user_id);
            header("Location:/admin/employee/advance");
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function viewfuel($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('fuel', 'fuel_id', $id);
        $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $row['vehicle_id']);
        $driver = $this->common->getDetails('driver', 'driver_id', $row['driver_id']);
        if ($row['mode'] == 'Credit card') {
            $sub = $this->common->getDetails('card', 'card_id', $row['sub_id']);
        }
        if ($row['mode'] == 'Vendor') {
            $sub = $this->common->getDetails('vendor', 'vendor_id', $row['sub_id']);
        }

        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        if ($row['photo'] != '') {
            echo ' <tr><td colspan="2"><img style="max-width:200px;max-height:100px;" src="/uploads/images/photo/' . $row['photo'] . '"</td></tr> ';
        }
        echo ' <tr><td><b>Vehicle name:</b></td><td>' . $vehicle['name'] . '</td></tr>';
        echo ' <tr><td><b>Driver name:</b></td><td>' . $driver['name'] . '</td></tr>';
        echo ' <tr><td><b>Amount:</b></td><td>' . $row['amount'] . '</td></tr>';
        echo ' <tr><td><b>Litre:</b></td><td>' . $row['litre'] . '</td></tr>';
        echo ' <tr><td><b>Rate:</b></td><td>' . $row['rate'] . '</td></tr>';
        echo ' <tr><td><b>Mode:</b></td><td>' . $row['mode'] . '</td></tr>';
        echo ' <tr><td><b>' . $row['mode'] . ':</b></td><td>' . $sub['name'] . '</td></tr>';
        echo ' <tr><td><b>Date:</b></td><td>' . $row['date'] . '</td></tr>';
        echo ' <tr><td><b>Note:</b></td><td>' . $row['Note'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function logsheet() {
        try {
            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $driverlist = $this->common->getList('driver', 'is_active', 1);
            $location = $this->common->getList('location', 'is_active', 1);
            $vendorlist = $this->common->getList('vendor', 'is_active', 1);
            $list = $this->common->getList('logsheet', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['logsheet_id']);
                $row = $this->common->getDetails('vehicle', 'vehicle_id', $item['vehicle_id']);
                $list[$int]['vehicle'] = $row['name'];
                $row = $this->common->getDetails('driver', 'driver_id', $item['driver_id']);
                $list[$int]['driver'] = $row['name'];
                $int++;
            }
            $this->smarty->assign("vehiclelist", $vehiclelist);
            $this->smarty->assign("driverlist", $driverlist);
            $this->smarty->assign("location", $location);
            $this->smarty->assign("vendorlist", $vendorlist);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("title", "Logsheet list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->selectedMenu = 'fuel';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/transaction/logsheet.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function logsheetsaved() {
        try {
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $date = new DateTime($_POST['date']);
            $row = $this->common->getDetails('vendor', 'vendor_id', $_POST['vendor_id']);
            $company_id = isset($row['company_id']) ? $row['company_id'] : 0;
            $time = date('H:i:s', strtotime($_POST['time']));
            $date = new DateTime($_POST['date']);
            $pickup = ($_POST['is_pickup'] == 1) ? 'Pickup' : 'Drop';
            $result = $this->model->saveLogsheet($_POST['vehicle_id'], $company_id, $_POST['vendor_id'], $_POST['driver_id'], $_POST['from'], $_POST['to'], $pickup, $_POST['log_no'], $time, $date->format('Y-m-d'), $_POST['km'], $_POST['toll_amount'], $user_id);
            if ($result['message'] == 'success') {
                $this->session->set('successMessage', 'Customer have been saved.');
            }
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function viewlogsheet($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('logsheet', 'logsheet_id', $id);
        $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $row['vehicle_id']);
        $driver = $this->common->getDetails('driver', 'driver_id', $row['driver_id']);
        $company = $this->common->getDetails('company', 'company_id', $row['company_id']);
        $vendor = $this->common->getDetails('vendor', 'vendor_id', $row['vendor_id']);
        $from = $this->common->getDetails('location', 'location_id', $row['from']);
        $to = $this->common->getDetails('location', 'location_id', $row['to']);

        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        echo ' <tr><td><b>Log number:</b></td><td>' . $row['log_no'] . '</td></tr>';
        echo ' <tr><td><b>Vehicle name:</b></td><td>' . $vehicle['name'] . '</td></tr>';
        echo ' <tr><td><b>Driver name:</b></td><td>' . $driver['name'] . '</td></tr>';
        echo ' <tr><td><b>Company:</b></td><td>' . $company['name'] . '</td></tr>';
        echo ' <tr><td><b>Vendor:</b></td><td>' . $vendor['name'] . '</td></tr>';
        echo ' <tr><td><b>Pickup/Drop:</b></td><td>' . $row['pickdrop'] . '</td></tr>';
        echo ' <tr><td><b>From:</b></td><td>' . $from['name'] . '</td></tr>';
        echo ' <tr><td><b>To:</b></td><td>' . $to['name'] . '</td></tr>';
        echo ' <tr><td><b>Date:</b></td><td>' . $row['date'] . '</td></tr>';
        echo ' <tr><td><b>Time:</b></td><td>' . date('h:i a', strtotime($row['time'])) . '</td></tr>';
        echo ' <tr><td><b>KM:</b></td><td>' . $row['km'] . '</td></tr>';
        echo ' <tr><td><b>Toll:</b></td><td>' . $row['toll'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function savefilesession() {
        $_SESSION['file_name'] = $this->model->uploadImage($_FILES['fileupload'], 'photo');
    }

}

?>
