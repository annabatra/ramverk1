<?php

namespace Anax\View;

require "../view/url/header.php";

?>

<p> Här kommer det finnas möjlighet att se på en url </p>


<?php
// Variable to check
$ip = "127.0.0.1";

// Validate ip
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
  echo("$ip is a valid IP4 address");
} elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    echo("$ip is a valid IP6 address");
} else {
    echo("NOT A VALID ADRESS");
}

?>
