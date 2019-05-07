<?php

namespace App\Modules\Core\ConceptNames\Clients\API\Routes;


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
            'prefix' => 'concept-names',
            'as' => 'concept_names.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'ConceptNameAPIController@getAll',
            ]);

            $router->get('/{conceptName}', [
                'as' => 'get',
                'uses' => 'ConceptNameAPIController@get',
            ]);
        });
    }
}