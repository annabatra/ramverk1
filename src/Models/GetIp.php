<?php

namespace Anax\Models;

class GetIp
{
    public function getIPAddress()
    {
        //whether ip is from the share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = [$_SERVER['HTTP_CLIENT_IP']];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = [$_SERVER['HTTP_X_FORWARDED_FOR']];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = [$_SERVER['REMOTE_ADDR']];
        } else {
             $ip = ["127.0.0.1"];
        }
        return $ip;
    }
}
