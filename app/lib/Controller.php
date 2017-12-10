<?php

class Controller {

    protected $session = NULL;
    protected $encrypt = NULL;
    protected $common = NULL;

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
        $this->session = new Session();
        $this->encrypt = new Encryption();
        $this->common = new CommonModel();
        $this->filterPost();
        $this->smarty = new Smarty();
        $this->smarty->setCompileDir('../smarty/templates_c');
        $this->smarty->assign("current_date", date("d M Y"));
        $this->view->logged_in = ($this->session->get('logged_in') == TRUE) ? TRUE : FALSE;
        $this->smarty->assign("current_date", date("d M Y"));
        $env = getenv('ENV');
        $this->renderHeader();
        $this->host = ($env == 'LOCAL') ? 'http' : 'https';
        $this->view->env = $env;
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'model/') {

        $path = $modelPath . $name . 'Model.php';

        if (file_exists($path)) {
            require $modelPath . $name . 'Model.php';

            $modelName = $name . 'Model';
            $this->model = new $modelName();
        }
    }

    public function renderHeader() {
        if ($this->session->get('logged_in') == TRUE) {
            $this->view->usertype = ($this->session->get('user_status') != ACTIVE_PATRON) ? 'admin' : 'patron';
            $admin_type = $this->session->get('admin_type');
            $this->view->showWhygopaid = ($admin_type == 1) ? TRUE : FALSE;
            $this->view->userName = $this->session->get('display_name');
        }

        $successMessage = $this->session->get('successMessage');
        if (isset($successMessage)) {
            $this->view->successMessage = $successMessage;
            $this->smarty->assign("success", $successMessage);
            $this->session->remove('successMessage');
        }
    }

    public function validateSession($userType) {
        if ($userType == 'admin') {
            if ($this->session->get('logged_in')) {
                
            } else {
                header('location: /login');
                exit;
            }
        } else {
            if ($this->session->get('user_status') != ACTIVE_PATRON) {
                header('location: /login');
                exit;
            }
        }
    }

    public function validateLogin($userType) {
        if ($userType == 'admin') {
            if ($this->session->get('user_status') < ACTIVE_ADMIN) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            if ($this->session->get('user_status') != ACTIVE_PATRON) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function HTMLValidationPrinter() {
        require(CONTROLLER . "HTMLValidationPrinter.php");
        $HTMLValidatorPrinter = new HTMLValidationPrinter();
        $this->view->HTMLValidatorPrinter = $HTMLValidatorPrinter;
        $this->smarty->assign("validate", $HTMLValidatorPrinter->_messageList);
    }

    public function setError($title, $message) {
        $this->session->set('errorTitle', $title);
        $this->session->set('errorMessage', $message);
    }

    public function setGenericError() {
        $this->session->set('errorTitle', 'Error');
        $this->session->set('errorMessage', 'Error in Siddhivinayak system for this process please try again later.');
        header("Location:/error");
        exit;
    }

    public function isLoggedIn() {
        if ($this->session->get('logged_in') == TRUE) {
            return;
        } else {
            header('location: /login');
            exit;
        }
    }

    function getEMI($lamount, $terms, $intrest) {
        $mic = ($intrest / 100) / 12; // Monthly interest
        $top = pow((1 + $mic), $terms);
        $bottom = $top - 1;
        $sp = $top / $bottom;
        $emi = (($lamount * $mic) * $sp);
        return $emi;
    }

    
    public function filterPost() {
        foreach ($_POST as $key => $value) {
            if (is_array($_POST[$key])) {
                $filterarray = array();
                foreach ($_POST[$key] as $postarray) {
                    $filterarray[] = strip_tags($postarray);
                }
                $_POST[$key] = $filterarray;
            } else {
                $_POST[$key] = strip_tags($_POST[$key]);
            }
        }
    }



    public function validateCaptcha($response, $remote_addres) {
        try {
            $recaptcha = new \ReCaptcha\ReCaptcha($this->capcha_secretkey);
            $resp = $recaptcha->verify($response, $remote_addres);
            if ($resp->isSuccess()) {
                return 'success';
            } else {
                return FALSE;
            }
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E003]Error validate Captcha Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    function word_money($amount) {
        $num = $amount;
        $num_words = Numbers_Words::toCurrency($num, "en_IN");
        $num_words1 = str_replace("Indian Rupeess", "Rupees", $num_words);
        $money_words = strtoupper($num_words1) . ' ONLY';
        $result = str_replace('ZERO PAISES', '', $money_words);
        return $result;
    }

}
