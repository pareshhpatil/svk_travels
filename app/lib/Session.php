<?php

class Session
{
    
    function __construct()
    {
        @session_start();
    }
    
    public function set($key, $value)
    {
        $domain = ($_SERVER['HTTP_HOST'] == 'siddhivinayaktravels.in') ? $_SERVER['HTTP_HOST'] : false;
        setcookie($key, $value, time() + 5200,"/", $domain, FALSE);
    }
    
    public function remove($key)
    {
        if (isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }
    
    public function get($key)
    {
        if (isset($_COOKIE[$key]))
            return $_COOKIE[$key];
    }
    
    public function destroy()
    {
        //unset($_SESSION);
        session_destroy();
    }
    public function destroyuser()
    {
        $this->remove('userid');
        $this->remove('logged_in');
        $this->remove('email_id');
        $this->remove('display_name');
        $this->remove('user_status');
        $this->remove('user_name');
        
    }
}