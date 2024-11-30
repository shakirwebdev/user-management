<?php

namespace App\Http\Controllers;


abstract class Controller
{
    public function responses($respond)
    {
        $data = [];

        $response = [
            'Response' => $respond['response'],
        ];

        if (isset($respond['data'])) {
            $data = [
                'Data' => $respond['data'] ?? [],
            ];
        }

        if ($data) {
            $response = array_merge($response, $data);
        }

        return $response;
    }
}
