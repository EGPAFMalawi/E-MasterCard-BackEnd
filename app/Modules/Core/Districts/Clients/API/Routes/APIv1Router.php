<?php

namespace App\Modules\Core\Districts\Clients\API\Routes;


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
            'prefix' => 'districts',
            'as' => 'districts.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'DistrictAPIController@getAll',
            ]);

            $router->get('/{district}', [
                'as' => 'get',
                'uses' => 'DistrictAPIController@get',
            ]);
        });
    }
}