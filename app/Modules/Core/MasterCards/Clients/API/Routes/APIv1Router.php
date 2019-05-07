<?php

namespace App\Modules\Core\MasterCards\Clients\API\Routes;


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
            'prefix' => 'master-cards',
            'as' => 'master-cards.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'MasterCardAPIController@getAll',
            ]);

            $router->get('/{masterCard}', [
                'as' => 'get',
                'uses' => 'MasterCardAPIController@get',
            ]);
        });
    }
}