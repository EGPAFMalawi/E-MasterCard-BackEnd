<?php

namespace App\Modules\Core\PersonAddresses\Clients\API\Routes;


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
            'prefix' => 'person-addresses',
            'as' => 'person_addresses.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'PersonAddressAPIController@getAll',
            ]);

            $router->get('/{personAddress}', [
                'as' => 'get',
                'uses' => 'PersonAddressAPIController@get',
            ]);
        });
    }
}