<?php

class Logout extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        try {
            $domain = ($_SERVER['HTTP_HOST'] == 'siddhivinayaktravels.in') ? $_SERVER['HTTP_HOST'] : false;
            unset($_COOKIE['logged_in']);
            unset($_COOKIE['userid']);
            unset($_COOKIE['user_name']);
            setcookie('logged_in', '', time() - 120,"/",  $domain, false);
            setcookie('user_name', '', time() - 120,"/",  $domain, false);
            setcookie('userid', '', time() - 120,"/",  $domain, false);
            setcookie('logged_in', '', time() + 120,"/",  $domain, false);
            setcookie('user_name', '', time() + 120,"/",  $domain, false);
            setcookie('userid', '', time() + 120,"/",  $domain, false);
            $this->session->destroy();
            header('Location: /login');
        } catch (Exception $e) {
            SwipezLogger::error(__CLASS__, '[E074]Error while logout Error: ' . $e->getMessage());
            $this->setGenericError();
        }
    }

}
