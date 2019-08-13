<?php

namespace App\Modules\Core\PatientIdentifierTypes\Clients\API\Routes;


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
            'prefix' => 'patient-identifier-types',
            'as' => 'patient_identifier_types.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'PatientIdentifierTypeAPIController@getAll',
            ]);

            $router->get('/{patientIdentifierType}', [
                'as' => 'get',
                'uses' => 'PatientIdentifierTypeAPIController@get',
            ]);
        });
    }
}