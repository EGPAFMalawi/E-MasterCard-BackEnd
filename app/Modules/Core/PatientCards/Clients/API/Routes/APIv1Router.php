<?php

namespace App\Modules\Core\PatientCards\Clients\API\Routes;


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
            'prefix' => 'patient-cards',
            'as' => 'patient-cards.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'PatientCardAPIController@getAll',
            ]);

            $router->get('/{patientCard}', [
                'as' => 'get',
                'uses' => 'PatientCardAPIController@get',
            ]);

            $router->post('/', [
                'as' => 'store',
                'uses' => 'PatientCardAPIController@store',
            ]);

            $router->post('/{patientCard}/data', [
                'as' => 'get_data',
                'uses' => 'PatientCardAPIController@getData',
            ]);
        });
    }
}