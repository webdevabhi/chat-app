<?php

require ("vendor/autoload.php");

use Ratchet \Server\IoServer;
use ChatApp\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
	new HttpServer(
		new WsServer(
			new Chat()
		)
	),
	9000
);

$server->run();