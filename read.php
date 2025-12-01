<?php

$port = "/dev/pts/4"; // other side of the fake port

$fp = fopen($port, "r");

if (!$fp) {
    die("Cannot open port");
}

echo "Waiting for data...\n";

while ($line = fgets($fp)) {
    echo "Received: " . $line;
}

fclose($fp);

