<?php

namespace App\Modules\Core\Encounters\Clients\API\Routes;


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
//        $this->router->group([
//            'prefix' => 'encounters',
//            'as' => 'encounters.',
//            'middleware' => 'auth:api'
//            ],
//            function($router)
//            {
//
//            $router->get('/', [
//                'as' => 'get_all',
//                'uses' => 'EncounterAPIController@getAll',
//            ]);
//
//            $router->get('/{encounter}', [
//                'as' => 'get',
//                'uses' => 'EncounterAPIController@get',
//            ]);
//        });
    }
}