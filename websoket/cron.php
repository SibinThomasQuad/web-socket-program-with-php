<?php
$sock = stream_socket_client("ws://localhost:8080",$error,$errnum,30,STREAM_CLIENT_CONNECT,stream_context_create(null));
if (!$sock) {
    echo "[$errnum] $error" . PHP_EOL;
} else {
  echo "Connected - Do NOT get rekt!" . PHP_EOL;
  fwrite($sock, "GET /stream?streams=btcusdt@kline_1m HTTP/1.1\r\nHost: stream.binance.com:9443\r\nAccept: */*\r\nConnection: Upgrade\r\nUpgrade: websocket\r\nSec-WebSocket-Version: 13\r\nSec-WebSocket-Key: ".rand(0,999)."\r\n\r\n");
  while (!feof($sock)) {
    var_dump(explode(",",fgets($sock, 512)));
  }
}
