<?php

$fp = fsockopen($host, $port, $error_no, $error_desc, 30);
if ($fp) {
 fputs($fp, "POST {$path} HTTP/1.1\r\n");
 fputs($fp, "Host: {$host}\r\n");
 fputs($fp, "Content-Type: {$http_entity_type}\r\n");
 fputs($fp, "Content-Length: {$http_entity_length}\r\n");
 fputs($fp, "Connection: close\r\n\r\n");
 fputs($fp, $http_entity_body . "\r\n\r\n");
 
 while (!feof($fp)) {
 $d .= fgets($fp, 4096);
 }
}
 fclose($fp);