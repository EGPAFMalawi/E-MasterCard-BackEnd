<?php

namespace App\Modules\Core\PatientIdentifiers\Clients\API\Routes;


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
            'prefix' => 'patient-identifiers',
            'as' => 'patient_identifiers.',
            'middleware' => 'auth:api'
            ],
            function(Router $router)
            {

                $router->get('/', [
                    'as' => 'get_all',
                    'uses' => 'PatientIdentifierAPIController@getAll',
                ]);

                $router->get('/{patientIdentifier}', [
                    'as' => 'get',
                    'uses' => 'PatientIdentifierAPIController@get',
                ]);

                $router->post('/', [
                    'as' => 'store',
                    'uses' => 'PatientIdentifierAPIController@store',
                ]);

                $router->patch('/{patientIdentifier}', [
                    'as' => 'update',
                    'uses' => 'PatientIdentifierAPIController@update',
                ]);
        });
    }
}