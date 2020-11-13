<?php

namespace Anax\Models;

class ValidateIp
{
    public function checkIp($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $result = "Ok IPv4 address";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $result ="Ok IPv6 address";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } else {
            $result = "Ej OK";
        }

        $data = [
            "result" => $result,
            "domain" => $domain ?? null,
        ];

        return $data;
    }
}
