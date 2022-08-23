<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function __construct($message = "", $code = 500, Throwable $previous = null) 
    {
        $this->message  = $message;
        $this->code     = $code;
        $this->previous = $previous;
    }

    public function render()
    {
        return response()->json([
            'success' => false,
            'message' => $this->message 
        ], $this->code==0?500:$this->code);
    }
}
