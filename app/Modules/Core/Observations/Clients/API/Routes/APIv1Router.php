<?php

namespace App\Modules\Core\Observations\Clients\API\Routes;


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
            'prefix' => 'observations',
            'as' => 'observations.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/{observation}', [
                'as' => 'get',
                'uses' => 'ObservationAPIController@get',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'ObservationAPIController@store',
            ]);
        });
    }
}