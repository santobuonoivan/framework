<?php

namespace Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class PlanController 
{
    public function __invoke(Request $request, Response $response)
    {
        return $response->withJson([
            ['name' => 'mensual', 'price' => 199.9 ],
            ['name' => '6 meses', 'price' => 399.9 ],
            ['name' => '12 meses', 'price' => 1199.9 ]
        ]);
    }
}