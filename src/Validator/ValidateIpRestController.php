<?php

namespace Anax\Validator;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpRestController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function validateIpRestAction()
    {
        $ip = $_GET["ip"];

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $res = $ip;
            $domain = gethostbyaddr($ip);
            $valid = "IPV4";
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $res = $ip;
            $domain = gethostbyaddr($ip);
            $valid = "IPV6";
        } else {
            $res = $ip;
            $valid = "Ej OK";
        }

        return [[
            "ip" => $res,
            "domain" => $domain ?? null,
            "valid" => $valid ?? null
        ]];
    }
}
