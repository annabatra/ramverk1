<?php

namespace Anax\Validator;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * test the ValidateIpController.
 */
class ValidateIpControllerTest extends TestCase
{
    // Create the di container.
    public $di;
    public $controller;

    /**
     * Prepare before each test.
     */

    public function setUp()
    {

        // di setup
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // Setup the controller
        $this->controller = new ValidateIpController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $res = $this->controller->indexAction();
        $this->assertIsObject($res);
    }

    /**
     * Test the route "checkIpAction" in three ways
     */
    public function testcheckIpActionIpv4()
    {
        $_GET["ip"] = "127.0.0.1";
        $res = $this->controller->checkIpAction();
        $this->assertIsObject($res);
    }

    public function testcheckIpActionIpv6()
    {
        $_GET["ip"] = "1234:ab1::1a2b:123:1234";
        $res = $this->controller->checkIpAction();
        $this->assertIsObject($res);
    }

    public function testcheckIpActionNotValid()
    {
        $_GET["ip"] = "notValid";
        $res = $this->controller->checkIpAction();
        $this->assertIsObject($res);
    }
}
