<?php

namespace App\Modules\Core\Concepts\Clients\API\Routes;


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
            'prefix' => 'concepts',
            'as' => 'concepts.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'ConceptAPIController@getAll',
            ]);

            $router->get('/{concept}', [
                'as' => 'get',
                'uses' => 'ConceptAPIController@get',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'ConceptAPIController@store',
            ]);

            $router->patch('/{concept}', [
                'as' => 'update',
                'uses' => 'ConceptAPIController@update',
            ]);

            $router->delete('/{concept}', [
                'as' => 'delete',
                'uses' => 'ConceptAPIController@delete',
            ]);
        });
    }
}