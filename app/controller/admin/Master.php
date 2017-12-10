<?php

/**
 * Supplier controller class to handle Admins supplier
 */
class Master extends Controller {

    function __construct() {
        parent::__construct();
        $this->validateSession('admin');
        $this->view->selectedMenu = 'master';
        $this->view->mainMenu = 'master';
    }

    /**
     * Display admin suppliers list
     */
    function driver() {
        try {
            $list = $this->common->getList('driver', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['driver_id']);
                $int++;
            }
            $this->smarty->assign("success", $success);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("title", "Driver list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->selectedMenu = 'driver';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/master/driver.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function driversaved() {
        try {
            $file = $_SESSION['file_name'];
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $join_date = new DateTime($_POST['join_date']);
            $payment_date = new DateTime($_POST['payment_date']);
            $result = $this->model->saveDriver($_POST['name'], $_POST['email'], $_POST['mobile'],$_POST['payment'], $_POST['pan'], $_POST['address'], $_POST['adharcard'], $_POST['license'], $file, $join_date->format('Y-m-d'), $payment_date->format('Y-m-d'), $user_id);
            if ($result['message'] == 'success') {
                $this->session->set('successMessage', 'Customer have been saved.');
            }
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    /**
     * Display admin suppliers list
     */
    function vehicle() {
        try {
            $list = $this->common->getList('vehicle', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['vehicle_id']);
                $int++;
            }
            $this->smarty->assign("success", $success);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("title", "Vehicle list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->selectedMenu = 'vehicle';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/master/vehicle.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function vehiclesaved() {
        try {
            $file = $_SESSION['file_name'];
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $purchase_date = new DateTime($_POST['purchase_date']);
            $result = $this->model->saveVehicle($_POST['name'], $_POST['brand'], $_POST['number'], $_POST['model'], $purchase_date->format('Y-m-d'), $file, $user_id);
            if ($result['message'] == 'success') {
                $this->session->set('successMessage', 'Vehicle have been saved.');
            }
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating vehicle Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function company() {
        try {
            $list = $this->common->getList('company', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['company_id']);
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->view->selectedMenu = 'company';
            $this->smarty->assign("title", "Company list");
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/master/company.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function companysaved() {
        try {
            $file = $_SESSION['file_name'];
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $date = new DateTime($_POST['join_date']);
            $result = $this->model->saveCompany($_POST['name'], $_POST['package'], $_POST['address'], $date->format('Y-m-d'), $file, $user_id);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating vehicle Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function vendor() {
        try {
            $list = $this->common->getList('vendor', 'is_active', 1);
            $companylist = $this->common->getList('company', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['vendor_id']);
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->smarty->assign("companylist", $companylist);
            $this->smarty->assign("title", "Vendor list");
            $this->view->selectedMenu = 'vendor';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/master/vendor.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function vendorsaved() {
        try {
            $file = $_SESSION['file_name'];
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $result = $this->model->saveVendor($_POST['name'], $_POST['company'], $_POST['mobile'], $file, $user_id);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating vehicle Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function card() {
        try {
            $list = $this->common->getList('card', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['card_id']);
                $int++;
            }
            $this->smarty->assign("list", $list);
            $this->smarty->assign("title", "Card list");
            $this->view->selectedMenu = 'card';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/master/card.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function cardsaved() {
        try {
            $user_id = $this->session->get('userid');
            $result = $this->model->saveCard($_POST['name'], $_POST['bank'], $_POST['type'], $user_id);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating vehicle Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }
    
    function location() {
        try {
            $list = $this->common->getList('location', 'is_active', 1);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("title", "Location list");
            $this->view->selectedMenu = 'location';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/master/location.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function locationsaved() {
        try {
            $user_id = $this->session->get('userid');
            $result = $this->model->saveLocation($_POST['name'],$user_id);
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating vehicle Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function viewdriver($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('driver', 'driver_id', $id);
        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        if ($row['photo'] != '') {
            echo ' <tr><td colspan="2"><img style="max-width:200px;max-height:100px;" src="/uploads/images/photo/' . $row['photo'] . '"</td></tr> ';
        }
        echo ' <tr><td><b>Driver name:</b></td><td>' . $row['name'] . '</td></tr>';
        echo ' <tr><td><b>Email:</b></td><td>' . $row['email'] . '</td></tr>';
        echo ' <tr><td><b>Mobile:</b></td><td>' . $row['mobile'] . '</td></tr>';
        echo ' <tr><td><b>Pancard:</b></td><td>' . $row['pan'] . '</td></tr>';
        echo ' <tr><td><b>License:</b></td><td>' . $row['license'] . '</td></tr>';
        echo ' <tr><td><b>Salary:</b></td><td>' . $row['payment'] . '</td></tr>';
        echo ' <tr><td><b>Adharcard:</b></td><td>' . $row['adharcard'] . '</td></tr>';
        echo ' <tr><td><b>Address:</b></td><td>' . $row['address'] . '</td></tr>';
        echo ' <tr><td><b>Join date:</b></td><td>' . $row['join_date'] . '</td></tr>';
        echo ' <tr><td><b>Payment date:</b></td><td>' . $row['payment_date'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function viewvehicle($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('vehicle', 'vehicle_id', $id);
        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        if ($row['photo'] != '') {
            echo ' <tr><td colspan="2"><img style="max-width:200px;max-height:100px;" src="/uploads/images/photo/' . $row['photo'] . '"</td></tr> ';
        }
        echo ' <tr><td><b>Vehicle name:</b></td><td>' . $row['name'] . '</td></tr>';
        echo ' <tr><td><b>Brand:</b></td><td>' . $row['brand'] . '</td></tr>';
        echo ' <tr><td><b>Model:</b></td><td>' . $row['model'] . '</td></tr>';
        echo ' <tr><td><b>Number:</b></td><td>' . $row['number'] . '</td></tr>';
        echo ' <tr><td><b>Purchase date:</b></td><td>' . $row['purchase_date'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function viewcompany($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('company', 'company_id', $id);
        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        echo ' <tr><td><b>Company name:</b></td><td>' . $row['name'] . '</td></tr>';
        echo ' <tr><td><b>Address:</b></td><td>' . $row['address'] . '</td></tr>';
        echo ' <tr><td><b>Package:</b></td><td>' . $row['package'] . '</td></tr>';
        echo ' <tr><td><b>Join date:</b></td><td>' . $row['join_date'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function viewvendor($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('vendor', 'vendor_id', $id);
        $com = $this->common->getDetails('company', 'company_id', $row['company_id']);
        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        if ($row['photo'] != '') {
            echo ' <tr><td colspan="2"><img style="max-width:200px;max-height:100px;" src="/uploads/images/photo/' . $row['photo'] . '"</td></tr> ';
        }
        echo ' <tr><td><b>Vendor name:</b></td><td>' . $row['name'] . '</td></tr>';
        echo ' <tr><td><b>Company:</b></td><td>' . $com['name'] . '</td></tr>';
        echo ' <tr><td><b>Mobile:</b></td><td>' . $row['mobile'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function viewcard($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('card', 'card_id', $id);
        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';

        echo ' <tr><td><b>Crad name:</b></td><td>' . $row['name'] . '</td></tr>';
        echo ' <tr><td><b>Bank:</b></td><td>' . $row['bank'] . '</td></tr>';
        echo ' <tr><td><b>Type:</b></td><td>' . $row['type'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function savefilesession() {
        $_SESSION['file_name'] = $this->model->uploadImage($_FILES['fileupload'], 'photo');
    }

}

?>
