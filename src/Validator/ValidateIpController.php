<?php

namespace Anax\Validator;

// use Anax\Commons\AppInjectableInterface;
//
// use Anax\Commons\AppInjectableTrait;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Validera din IP";

        $page->add("validate/inputpage");
        return $page->render([
            "title" => $title,
        ]);
    }

    public function checkIpAction()
    {
        $page = $this->di->get("page");
        $title = "Resultat";

        $ip = $_GET["ip"];

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
          $result ="Din ip är en ok IP4 address";
          if (gethostbyaddr($ip) != $ip) {
              $domain = gethostbyaddr($ip);
          }
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $result ="Din ip är en ok IP6 address";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } else {
            $result = "Tyvärr, inte en ok ip-adress";
        }

        $data = [
            "result" => $result,
            "domain" => $domain ?? null
        ];

        $page->add("validate/resultpage", $data);
        return $page->render([
            "title" => $title,
        ]);
    }


}
