<?php

namespace App\Libraries;

class CIAuth
{
    public static function setCIAuth($result)
    {
        $session = session();
        $array = ['logged_in' => true];
        $userdata = $result;
        $session->set('userdata', $userdata);
        $session->set($array);
    }

    public static function checkAuth()
    {
        $session = session();
        return $session->has('logged_in');
    }

    public static function destroySession()
    {
        $session = session();
        $session->destroy();
        // $session->remove('logged_in');
        // $session->remove('userdata');
        // $session->close();
    }
}
