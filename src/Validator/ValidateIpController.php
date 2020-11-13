<?php

namespace Anax\Validator;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\ValidateIp;
use Anax\Models\GetGeo;
use Anax\Models\GetIp;

class ValidateIpController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Validera din IP";

        $ipGet = new GetIp();
        $ip = [
            "ip" => $ipGet->getIPAddress()
        ];

        $page->add("validate/inputpage", $ip["ip"]);
        return $page->render([
            "title" => $title,
        ]);
    }

    public function checkIpAction()
    {
        $page = $this->di->get("page");
        $title = "Resultat";
        $ip = $_GET["ip"];

        $validator = new ValidateIp();
        $geoTracker = new GetGeo();


        $data = [
            "valid" => $validator->checkIp($ip)["result"],
            "domain" => $validator->checkIp($ip)["domain"] ?? null,
            "location" => $geoTracker->getGeo($ip) ?? null
        ];

        $page->add("validate/resultpage", $data);

        return $page->render([
            "title" => $title,
        ]);
    }
}
