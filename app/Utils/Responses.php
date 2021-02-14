<?php


namespace App\Utils;


class Responses
{
    static function success ($message, $customMessages = [],  $status = 200)
    {
        $responses = [
            'success' => true,
            'message' => $message
        ];
        if (count($customMessages)) {
            foreach ($customMessages as $key => $value) {
                $responses[$key]  =  $value;
            }
        }
        return response()->json($responses, $status);
    }

    static function error ($message, $status = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
