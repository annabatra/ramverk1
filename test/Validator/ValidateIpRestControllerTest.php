<?php

namespace Anax\Validator;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * test the ValidateIpRestController
 */
class ValidateIpRestControllerTest extends TestCase
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
        $this->controller = new ValidateIpRestController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }

    /**
     * test the validator returning result in JSON-format
     */
     // Testing with a ipv4 format
    public function testValidateIpActionIPv4()
    {
        $_GET["ip"] = "127.0.0.1";
        $res = $this->controller->validateIpRestAction();
        $this->assertIsArray($res);
    }

    // testing with ipv6 format
    public function testValidateIpActionIPv6()
    {
        $_GET["ip"] = "0:0:0:0:0:0:0:1";
        $res = $this->controller->validateIpRestAction();
        $this->assertEquals("DESKTOP-V627922", $res[0]["domain"]);
    }

    // testing with a non valid ip adress
    public function testValidateIpActionNotValid()
    {
        $_GET["ip"] = "Not Valid";
        $res = $this->controller->validateIpRestAction();
        $this->assertEquals(null, $res[0]["domain"]);
        $this->assertEquals("Ej OK", $res[0]["valid"]);
    }
}
