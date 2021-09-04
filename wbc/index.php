<?php

require('vendor/autoload.php');

use WebSocket\Client;

$client = new Client("ws://127.0.0.1:8080");
$client->send("Hello from PHP");

echo $client->receive() . "\n"; // Should output 'Hello from PHP'
