<?php

namespace App\Modules\Core\Regions\Clients\API\Routes;


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
            'prefix' => 'regions',
            'as' => 'regions.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'RegionAPIController@getAll',
            ]);

            $router->get('/{region}', [
                'as' => 'get',
                'uses' => 'RegionAPIController@get',
            ]);

            $router->get('/{region}/districts', [
                'as' => 'get.districts',
                'uses' => 'RegionAPIController@getDistricts',
            ]);
        });
    }
}