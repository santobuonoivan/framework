<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


// API group
$app->group('/movies', function () use ($app) {  

    // Get empty
    $app->get('[/]', 'MoviesController:index');

    // Post with id
    $app->post('/{id}', 'MoviesController:create');    

    // Get with id
    $app->get('/{id}', 'MoviesController:show');    

    // Patch with id
    $app->patch('/{id}', 'MoviesController:edit');

    // Put book with ID
    $app->put('/{id}', 'MoviesController:reemplace');

    // Delete book with ID
    $app->delete('/{id}', 'MoviesController:delete');    
    
});
//plancontroller
$app->get('/plans', 'PlanController'); 