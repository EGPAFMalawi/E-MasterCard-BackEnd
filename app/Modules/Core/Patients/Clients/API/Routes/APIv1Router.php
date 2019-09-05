<?php

namespace App\Modules\Core\Patients\Clients\API\Routes;


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
            'prefix' => 'patients',
            'as' => 'patients.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'PatientAPIController@getAll',
            ]);

            $router->get('/{patient}', [
                'as' => 'get',
                'uses' => 'PatientAPIController@get',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'PatientAPIController@store',
            ]);

            $router->patch('/{patient}', [
                'as' => 'update',
                'uses' => 'PatientAPIController@update',
            ]);

            $router->post('/search', [
                'as' => 'search',
                'uses' => 'PatientAPIController@search',
            ]);

            $router->get('/{patient}/cards', [
                'as' => 'get_cards',
                'uses' => 'PatientAPIController@getCards',
            ]);
        });
    }
}