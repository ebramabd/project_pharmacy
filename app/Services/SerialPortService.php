<?php

namespace App\Services;

class SerialPortService
{
    protected string $port;
    protected $handle = null;

    public function __construct(string $port = "/dev/ttyUSB0")
    {
        $this->port = $port;
    }

    public function open(): bool
    {
        // Serial port must exist!
        if (!file_exists($this->port)) {
            throw new \Exception("Serial port {$this->port} not found");
        }

        $this->handle = fopen($this->port, "r+");

        if (!$this->handle) {
            throw new \Exception("Cannot open serial port {$this->port}");
        }

        // Configure port (115200 baud example)
        exec("stty -F {$this->port} 115200 raw -echo");

        return true;
    }

    public function write(string $data): bool
    {
        if (!$this->handle) {
            throw new \Exception("Serial port not opened");
        }

        return fwrite($this->handle, $data) !== false;
    }

    public function read(int $length = 1024): string
    {
        if (!$this->handle) {
            throw new \Exception("Serial port not opened");
        }

        return fread($this->handle, $length);
    }

    public function readLine(): string
    {
        if (!$this->handle) {
            throw new \Exception("Serial port not opened");
        }

        return fgets($this->handle);
    }

    public function close(): void
    {
        if ($this->handle) {
            fclose($this->handle);
            $this->handle = null;
        }
    }
}

