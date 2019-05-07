<?php

namespace App\Modules\Core\Locations\Clients\API\Routes;


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
            'prefix' => 'locations',
            'as' => 'locations.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'LocationAPIController@getAll',
            ]);

            $router->get('/{location}', [
                'as' => 'get',
                'uses' => 'LocationAPIController@get',
            ]);
        });
    }
}