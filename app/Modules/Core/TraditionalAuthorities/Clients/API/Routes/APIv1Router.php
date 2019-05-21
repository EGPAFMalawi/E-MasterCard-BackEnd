<?php

namespace App\Modules\Core\TraditionalAuthorities\Clients\API\Routes;


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
            'prefix' => 'traditional-authorities',
            'as' => 'traditional_authorities.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'TraditionalAuthorityAPIController@getAll',
            ]);

            $router->get('/{traditionalAuthority}', [
                'as' => 'get',
                'uses' => 'TraditionalAuthorityAPIController@get',
            ]);

            $router->get('/{traditionalAuthority}/villages', [
                'as' => 'get.villages',
                'uses' => 'TraditionalAuthorityAPIController@getVillages',
            ]);
        });
    }
}