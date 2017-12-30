<?php

/**
 * Supplier controller class to handle Admins supplier
 */
class Logsheet extends Controller {

    function __construct() {
        parent::__construct();
        $this->validateSession('admin');
        $this->view->selectedMenu = 'logsheet';
        $this->view->mainMenu = 'logsheet';
    }

    function bill() {
        try {
            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $companylist = $this->common->getList('company', 'is_active', 1);
            $list = $this->common->getList('logsheet_invoice', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['logsheet_id']);
                $row1 = $this->common->getDetails('vehicle', 'vehicle_id', $item['vehicle_id']);
                $row = $this->common->getDetails('company', 'company_id', $item['company_id']);
                $list[$int]['vehicle'] = $row1['name'];
                $list[$int]['company'] = $row['name'];
                $int++;
            }
            $this->smarty->assign("vehiclelist", $vehiclelist);
            $this->smarty->assign("companylist", $companylist);
            $this->smarty->assign("invoicelist", $list);
            $this->smarty->assign("title", "Logsheet list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/logsheet/logsheet_bill.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function outstation() {
        try {
            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $companylist = $this->common->getList('company', 'is_active', 1);
            $list = $this->common->getList('outstation_invoice', 'is_active', 1);
            $int = 0;
            foreach ($list as $item) {
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['invoice_id']);
                $row1 = $this->common->getDetails('vehicle', 'vehicle_id', $item['vehicle_id']);
                $row = $this->common->getDetails('company', 'company_id', $item['company_id']);
                $list[$int]['vehicle'] = $row1['name'];
                $list[$int]['company'] = $row['name'];
                $int++;
            }
            $this->smarty->assign("vehiclelist", $vehiclelist);
            $this->smarty->assign("companylist", $companylist);
            $this->smarty->assign("invoicelist", $list);
            $this->smarty->assign("title", "Out station list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/logsheet/outstation_bill.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function outstationsaved() {
        try {

            SwipezLogger::info(__CLASS__, '[E295+54]Error while saveLogsheetbill Error: ');
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : 0;
            $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : 0;
            $_POST['toll_amount'] = ($_POST['toll_amount'] > 0) ? $_POST['toll_amount'] : 0;
            $date = new DateTime($_POST['month']);
            $bill_date = new DateTime($_POST['bill_date']);
            $daynight = ($_POST['is_gst'] == 1) ? 1 : 0;
            $invoice_id = $this->model->saveOutstationbill($vehicle_id, $company_id, $date->format('Y-m-d'), $bill_date->format('Y-m-d'), $daynight, $_POST['toll_amount'], $user_id);
            $int = 0;
            foreach ($_POST['particular'] as $rr) {
                $this->model->saveOutstationDetail($invoice_id, $_POST['particular'][$int], $_POST['date'][$int], $_POST['qty'][$int], $_POST['rate'][$int], $_POST['amount'][$int], $user_id);
                $int++;
            }
            header("Location:/admin/logsheet/outstation");
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function printoutstation($id) {
        try {
            $invoice = $this->common->getDetails('outstation_invoice', 'invoice_id', $id);
            $invoice_detail = $this->common->getList('outstation_detail', 'invoice_id', $id, 'asc');
            $total = 0;
            $total_gst = 0;
            foreach ($invoice_detail as $row) {
                $total = $total + $row['amount'];
            }
            $total_taxable = $total + $invoice['toll'];
            if ($invoice['is_gst'] == 1) {
                $gst = $total_taxable * 2.50 / 100;
                $total_gst = $gst * 2;
            }
            $grand_total = $total_gst + $total_taxable;
            $money_word = $this->getmoneyword($grand_total);
            $money_word = ($money_word == ' Only') ? $invoice['amount_in_word'] : $money_word;
            $this->smarty->assign("wordmoney", $money_word);
            $this->smarty->assign("total_taxable", $total_taxable);
            $this->smarty->assign("gst", $gst);
            $this->smarty->assign("total_gst", $total_gst);
            $grand_total = $this->roundAmount($grand_total, 2);
            $this->smarty->assign("grand_total", $grand_total);
            $vehicle_id = $invoice['vehicle_id'];
            $company_id = $invoice['company_id'];
            $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $invoice['vehicle_id']);
            $company = $this->common->getDetails('company', 'company_id', $invoice['company_id']);
            $this->smarty->assign("invoice", $invoice);
            $this->smarty->assign("post", $invoice);
            $this->smarty->assign("vehicle", $vehicle);
            $this->smarty->assign("company", $company);
            $this->smarty->assign("invoice_detail", $invoice_detail);
            $this->smarty->assign("date", $invoice['date']);
            $this->smarty->assign("is_gst", $invoice['is_gst']);
            $this->smarty->assign("title", "Logsheet list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/logsheet/printoutstation.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function getexcel($id = null) {
        try {
            if ($id != null) {
                $invoice = $this->common->getDetails('logsheet_invoice', 'invoice_id', $id);
                $vehicle_id = $invoice['vehicle_id'];
                $company_id = $invoice['company_id'];
                $date = new DateTime($invoice['date']);
                $_POST['vehicle_id'] = $vehicle_id;
                $_POST['company_id'] = $company_id;
                $_POST['date'] = $invoice['date'];
            } else {
                $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : 0;
                $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : 0;
                $date = new DateTime($_POST['date']);
                $invoice = $this->model->getInvoice($date->format('Y-m-d'), $company_id, $vehicle_id);
            }
            $list = $this->model->getExcel($date->format('Y-m-d'), $company_id, $vehicle_id);
            $int = 0;

            foreach ($list as $item) {
                $type=$item['type'];
                $list[$int]['encrypted_id'] = $this->encrypt->encode($item['logsheet_id']);
                $int++;
            }
            $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $vehicle_id);
            $company = $this->common->getDetails('company', 'company_id', $company_id);

            $vehiclelist = $this->common->getList('vehicle', 'is_active', 1);
            $companylist = $this->common->getList('company', 'is_active', 1);

            $this->smarty->assign("vehiclelist", $vehiclelist);
            $this->smarty->assign("companylist", $companylist);

            $this->smarty->assign("invoice", $invoice);
            $this->smarty->assign("post", $_POST);
            $this->smarty->assign("vehicle", $vehicle);
            $this->smarty->assign("company", $company);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("date", $_POST['date']);
            $this->smarty->assign("title", "Logsheet list");
            $this->smarty->assign("type", $type);
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->render('header/list');
            if ($type == 1) {
                $this->smarty->display(VIEW . 'admin/logsheet/excel.tpl');
            } else {
                $this->smarty->display(VIEW . 'admin/logsheet/location_excel.tpl');
            }
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function logsheetbillsaved() {
        try {
            $this->session->remove('file_name');
            $user_id = $this->session->get('userid');
            $type = isset($_POST['type']) ? 2 : 1;
            $pick_drop = isset($_POST['pickup']) ? 'PICKUP' : 'DROP';
            $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : 0;
            $company_id = isset($_POST['company_id']) ? $_POST['company_id'] : 0;
            $_POST['toll_amount'] = ($_POST['toll_amount'] > 0) ? $_POST['toll_amount'] : 0;
            $start_time = date('H:i:s', strtotime($_POST['start_time']));
            $close_time = date('H:i:s', strtotime($_POST['close_time']));
            if ($type == 2) {
                $start_time = '00:00:00';
                $close_time = '00:00:00';
            } else {
                $pick_drop = '';
                $_POST['from'] = '';
                $_POST['to'] = '';
            }
            $date = new DateTime($_POST['date']);
            $bill_date = new DateTime($_POST['bill_date']);
            $daynight = ($_POST['is_night'] == 1) ? 'Night' : 'Day';
            $result = $this->model->saveLogsheetbill($vehicle_id, $company_id, 0, $date->format('Y-m-d'), $bill_date->format('Y-m-d'), $_POST['start_km'], $_POST['end_km'], $start_time, $close_time, $daynight, $_POST['remark'], $_POST['toll_amount'], $type, $pick_drop, $_POST['from'], $_POST['to'], $user_id);
            if ($result['message'] == 'success') {
                $this->session->set('successMessage', 'Customer have been saved.');
            }
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E289]Error while creating supplier Error: ' . $e->getMessage());
            header("Location:/error");
        }
    }

    function printexcel($id) {
        try {
            $invoice = $this->common->getDetails('logsheet_invoice', 'invoice_id', $id);
            $vehicle_id = $invoice['vehicle_id'];
            $company_id = $invoice['company_id'];
            $list = $this->model->getExcel($invoice['date'], $company_id, $vehicle_id);

            $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $invoice['vehicle_id']);
            $company = $this->common->getDetails('company', 'company_id', $invoice['company_id']);
            $this->smarty->assign("invoice", $invoice);
            $this->smarty->assign("post", $invoice);
            $this->smarty->assign("vehicle", $vehicle);
            $this->smarty->assign("company", $company);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("date", $invoice['date']);
            $this->smarty->assign("title", "Logsheet list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/logsheet/printexcel.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function printword($id) {
        try {
            $invoice = $this->common->getDetails('logsheet_invoice', 'invoice_id', $id);

            $total_taxable = $invoice['fix_amt'] + $invoice['extra_day_amt'] + $invoice['extra_hr_amt'] + $invoice['extra_km_amt'] - $invoice['br_down_amt'] + $invoice['toll'];
            $gst = $total_taxable * 2.50 / 100;
            $total_gst = $gst * 2;
            $grand_total = $total_gst + $total_taxable;
            $money_word = $this->getmoneyword($grand_total);
            $money_word = ($money_word == ' Only') ? $invoice['amount_in_word'] : $money_word;
            $this->smarty->assign("wordmoney", $money_word);
            $this->smarty->assign("total_taxable", $total_taxable);
            $this->smarty->assign("gst", $gst);
            $this->smarty->assign("total_gst", $total_gst);
            $grand_total = $this->roundAmount($grand_total, 2);
            $this->smarty->assign("grand_total", $grand_total);


            $vehicle_id = $invoice['vehicle_id'];
            $company_id = $invoice['company_id'];
            $list = $this->model->getExcel($invoice['date'], $company_id, $vehicle_id);

            $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $invoice['vehicle_id']);
            $company = $this->common->getDetails('company', 'company_id', $invoice['company_id']);
            $this->smarty->assign("invoice", $invoice);
            $this->smarty->assign("post", $invoice);
            $this->smarty->assign("vehicle", $vehicle);
            $this->smarty->assign("company", $company);
            $this->smarty->assign("list", $list);
            $this->smarty->assign("date", $invoice['date']);
            $this->smarty->assign("title", "Logsheet list");
            $this->view->canonical = 'admin/supplier/viewlist';
            $this->view->render('header/list');
            $this->smarty->display(VIEW . 'admin/logsheet/printword.tpl');
            $this->view->render('footer/list');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E999]Error while listing driver Error: for user id [' . $this->session->get('userid') . '] ' . $e->getMessage());
        }
    }

    function viewlogsheetbill($link) {
        $id = $this->encrypt->decode($link);
        $row = $this->common->getDetails('logsheet_bill', 'logsheet_id', $id);
        $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $row['vehicle_id']);
        $company = $this->common->getDetails('company', 'company_id', $row['company_id']);

        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        echo ' <tr><td><b>Vehicle number:</b></td><td>' . $vehicle['name'] . '</td></tr>';
        echo ' <tr><td><b>Comapny name:</b></td><td>' . $company['name'] . '</td></tr>';
        echo ' <tr><td><b>Date:</b></td><td>' . $row['date'] . '</td></tr>';
        echo ' <tr><td><b>Start KM:</b></td><td>' . $row['start_km'] . '</td></tr>';
        echo ' <tr><td><b>End KM:</b></td><td>' . $row['end_km'] . '</td></tr>';
        echo ' <tr><td><b>Total KM:</b></td><td>' . $row['total_km'] . '</td></tr>';
        echo ' <tr><td><b>Start Time:</b></td><td>' . date('h:i A', strtotime($row['start_time'])) . '</td></tr>';
        echo ' <tr><td><b>Close Time:</b></td><td>' . date('h:i A', strtotime($row['close_time'])) . '</td></tr>';
        echo ' <tr><td><b>Toll:</b></td><td>' . $row['toll'] . '</td></tr>';
        echo ' <tr><td><b>Remark:</b></td><td>' . $row['remark'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function confirmlogsheetbill() {
        $type = isset($_POST['type']) ? 2 : 1;
        $vehicle = $this->common->getDetails('vehicle', 'vehicle_id', $_POST['vehicle_id']);
        $driver = $this->common->getDetails('driver', 'driver_id', $_POST['driver_id']);
        $company = $this->common->getDetails('company', 'company_id', $_POST['company_id']);
        $_POST['toll_amount'] = ($_POST['toll_amount'] > 0) ? $_POST['toll_amount'] : 0;
        $totalkm = $_POST['end_km'] - $_POST['start_km'];
        echo '<table class="table table-bordered table-condensed" style="margin: 0px 0 0px 0 !important;">';
        echo ' <tr><td><b>Vehicle number:</b></td><td>' . $vehicle['name'] . '</td></tr>';
        echo ' <tr><td><b>Comapny name:</b></td><td>' . $company['name'] . '</td></tr>';
        echo ' <tr><td><b>Date:</b></td><td>' . $_POST['date'] . '</td></tr>';
        echo ' <tr><td><b>Start KM:</b></td><td>' . $_POST['start_km'] . '</td></tr>';
        echo ' <tr><td><b>End KM:</b></td><td>' . $_POST['end_km'] . '</td></tr>';
        echo ' <tr><td><b>Total KM:</b></td><td>' . $totalkm . '</td></tr>';
        if ($type == 1) {
            echo ' <tr><td><b>Start Time:</b></td><td>' . date('h:i A', strtotime($_POST['start_time'])) . '</td></tr>';
            echo ' <tr><td><b>Close Time:</b></td><td>' . date('h:i A', strtotime($_POST['close_time'])) . '</td></tr>';
        } else {
            echo ' <tr><td><b>From Location:</b></td><td>' . $_POST['from'] . '</td></tr>';
            echo ' <tr><td><b>To Location:</b></td><td>' . $_POST['to'] . '</td></tr>';
        }
        echo ' <tr><td><b>Toll:</b></td><td>' . $_POST['toll_amount'] . '</td></tr>';
        echo ' <tr><td><b>Remark:</b></td><td>' . $_POST['remark'] . '</td></tr>';
        echo '</tbody></table>';
    }

    function savefilesession() {
        $_SESSION['file_name'] = $this->model->uploadImage($_FILES['fileupload'], 'photo');
    }

    function delete($id) {
        $this->model->deletesheet($id);
        header("Location:/admin/logsheet/bill");
    }

    function getmoneyword($amount) {
        $amount = $this->roundAmount($amount, 2);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://admin.wica.in/login/getstringmoney/' . $amount);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    function roundAmount($amount, $num) {
        $text = number_format($amount, $num);
        $amount = str_replace(',', '', $text);
        return $amount;
    }

    function savelogsheet() {
        $date = new DateTime($_POST['date']);
        $bill_date = new DateTime($_POST['bill_date']);
        if ($_POST['invoice_id'] > 0) {

            $this->model->updateLogsheetInvoice($_POST['invoice_id'], $_POST['vehicle_id'], $_POST['company_id'], $date->format('Y-m-01'), $bill_date->format('Y-m-d'), $_POST['fix_qty'], $_POST['fix_rate'], $_POST['fix_amt'], $_POST['extra_day_qty'], $_POST['extra_day_rate'], $_POST['extra_day_amt'], $_POST['extra_km_qty'], $_POST['extra_km_rate'], $_POST['extra_km_amt'], $_POST['extra_hr_qty'], $_POST['extra_hr_rate'], $_POST['extra_hr_amt'], $_POST['br_down_qty'], $_POST['br_down_rate'], $_POST['br_down_amt'], $_POST['toll'], $this->session->get('userid'));
        } else {
            $this->model->saveLogsheetInvoice($_POST['vehicle_id'], $_POST['company_id'], $date->format('Y-m-01'), $bill_date->format('Y-m-d'), $_POST['fix_qty'], $_POST['fix_rate'], $_POST['fix_amt'], $_POST['extra_day_qty'], $_POST['extra_day_rate'], $_POST['extra_day_amt'], $_POST['extra_km_qty'], $_POST['extra_km_rate'], $_POST['extra_km_amt'], $_POST['extra_hr_qty'], $_POST['extra_hr_rate'], $_POST['extra_hr_amt'], $_POST['br_down_qty'], $_POST['br_down_rate'], $_POST['br_down_amt'], $_POST['toll'],$_POST['type'], $this->session->get('userid'));
        }
        header("Location:/admin/logsheet/bill");
    }

}

?>
