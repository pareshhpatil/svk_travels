<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('validation.js');
    }

    function index($type = NULL) {
        try {
            if ($this->session->get('logged_in') == TRUE) {
                //$usertype = ($this->session->get('user_status') != ACTIVE_PATRON) ? 'admin' : 'patron';
                header("Location:/admin/dashboard");
            }
            $this->view->isPatron = ($type == 'patron') ? TRUE : FALSE;
            $this->view->showCaptcha = $this->session->get('show_captcha');
            $this->view->title = 'Sign in';
            $this->view->canonical = 'login';
            $this->view->type = "login";
            $this->HTMLValidationPrinter();
            $this->view->render('login/login');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E066]Error while login initiate Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    function failed() {
        try {
            if (empty($_POST)) {
                header('Location:/login');
            }
            setcookie('svk_username', $_POST['username'], time() + (864000 * 30), "/"); // 86400 = 1 day
            $data = $this->model->queryLoginInfo($_POST['username'], $_POST['password']);
            if (isset($data['message'])) {
                $this->view->setError('There was an error with your E-Mail/Password combination. Please try again.');
                $this->index();
            } else {
                $this->session->set('user_name', $data['name']);
                $this->session->set('logged_in', TRUE);
                $this->session->set('userid', $data['user_id']);
                header('Location:/admin/dashboard');
            }
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E073]Error while login check Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

    public function keepalive() {
        $_SESSION['last_action'] = time();
    }

}
