<?php

namespace App\Modules\Core\Persons\Clients\API\Routes;


use Illuminate\Routing\Router;

class APIv1Router
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $this->router->group([
            'prefix' => 'people',
            'as' => 'people.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'PersonAPIController@getAll',
            ]);

            $router->get('/{person}', [
                'as' => 'get',
                'uses' => 'PersonAPIController@get',
            ]);

            $router->patch('/{person}', [
                'as' => 'update',
                'uses' => 'PersonAPIController@update',
            ]);
        });
    }
}