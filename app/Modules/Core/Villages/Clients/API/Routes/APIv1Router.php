<?php

namespace App\Modules\Core\Villages\Clients\API\Routes;


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
            'prefix' => 'villages',
            'as' => 'villages.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'VillageAPIController@getAll',
            ]);

            $router->get('/{village}', [
                'as' => 'get',
                'uses' => 'VillageAPIController@get',
            ]);
        });
    }
}