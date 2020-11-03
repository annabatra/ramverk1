<?php

namespace Chbl\Url;

use Anax\Commons\AppInjectableInterface;

use Anax\Commons\AppInjectableTrait;

class UrlController implements AppInjectableInterface
{
    use AppInjectableTrait;

    // index that redirect to inputpage
    public function indexAction() : string
    {
        return $this->app->response->redirect("urlvalidator/inputpage");
    }
}
