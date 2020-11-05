<?php
/**
 * check if ip is valid
 */
return [
    "routes" => [
        [
            "info" => "IP validator.",
            "mount" => "validate",
            "handler" => "\Anax\Validator\ValidateIpController",
        ],
        [
            "info" => "IP validator JSON format.",
            "mount" => "ip",
            "handler" => "\Anax\Validator\ValidateIpRestController",
        ],
    ]
];
