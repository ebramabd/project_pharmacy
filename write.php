<?php

$port = "/dev/pts/5";  // fake port
$message = "Hello from PHP\n";

// Open port
$fp = fopen($port, "w");

if (!$fp) {
    die("Cannot open port");
}

fwrite($fp, $message);
fclose($fp);

echo "Message sent to COM port\n";
