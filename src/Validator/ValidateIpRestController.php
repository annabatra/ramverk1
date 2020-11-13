<?php

namespace Anax\Validator;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\ValidateIp;
use Anax\Models\GetGeo;

class ValidateIpRestController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function validateIpRestAction()
    {
        $ip = $_GET["ip"];


        $validator = new ValidateIp();
        $geoTracker = new GetGeo();

        $data = [
            "valid" => $validator->checkIp($ip)["result"],
            "domain" => $validator->checkIp($ip)["domain"] ?? null,
            "location" => $geoTracker->getGeo($ip) ?? null
        ];

        json_encode($data, true);

        return [[ $data ]];
    }
}
