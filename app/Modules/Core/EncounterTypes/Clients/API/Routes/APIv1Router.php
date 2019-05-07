<?php

namespace App\Modules\Core\EncounterTypes\Clients\API\Routes;


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
            'prefix' => 'encounter-types',
            'as' => 'encounter_types.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'EncounterTypeAPIController@getAll',
            ]);

            $router->get('/{encounterType}', [
                'as' => 'get',
                'uses' => 'EncounterTypeAPIController@get',
            ]);
        });
    }
}