<?php

namespace App\Http\Controllers;

use App\Services\SerialPortService;

class SerialPortController extends Controller
{
    public function test()
    {
        // For testing:
        // Use your fake port from socat like /dev/pts/5
        $port = "/dev/pts/11";

        $serial = new SerialPortService($port);

        try {
            $serial->open();

            // Send data
            $serial->write("Hello from Laravel\n");

            // Read response (if any)
            $response = $serial->readLine();

            $serial->close();

            return response()->json([
                "status" => "success",
                "response" => $response
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }
}

