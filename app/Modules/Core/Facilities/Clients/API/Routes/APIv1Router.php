<?php

namespace App\Modules\Core\Facilities\Clients\API\Routes;


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
            'prefix' => 'facilities',
            'as' => 'facilities.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'FacilityAPIController@getAll',
            ]);

            $router->get('/{facility}', [
                'as' => 'get',
                'uses' => 'FacilityAPIController@get',
            ]);
        });
    }
}