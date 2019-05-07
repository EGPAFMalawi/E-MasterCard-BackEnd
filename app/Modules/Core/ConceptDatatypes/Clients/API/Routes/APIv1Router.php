<?php

namespace App\Modules\Core\ConceptDatatypes\Clients\API\Routes;


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
//        $this->router->group([
//            'prefix' => 'concept-datatype',
//            'as' => 'concept_names.',
//            'middleware' => 'auth:api'
//            ],
//            function($router)
//            {
//
//            $router->get('/', [
//                'as' => 'get_all',
//                'uses' => 'ConceptDatatypeAPIController@getAll',
//            ]);
//
//            $router->get('/{conceptDatatype}', [
//                'as' => 'get',
//                'uses' => 'ConceptDatatypeAPIController@get',
//            ]);
//        });
    }
}