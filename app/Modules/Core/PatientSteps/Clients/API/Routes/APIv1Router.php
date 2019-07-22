<?php

namespace App\Modules\Core\PatientSteps\Clients\API\Routes;


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
            'prefix' => 'patient-steps',
            'as' => 'patient_steps.',
//            'middleware' => 'auth:api'
            ],
            function($router)
            {

                $router->get('/{patientStep}', [
                    'as' => 'get',
                    'uses' => 'PatientStepAPIController@get',
                ]);

                $router->post('/', [
                    'as' => 'store',
                    'uses' => 'PatientStepAPIController@store',
                ]);

                $router->patch('/{patientStep}', [
                    'as' => 'update',
                    'uses' => 'PatientStepAPIController@update',
                ]);

                $router->patch('/{patientStep}/toggle-void', [
                    'as' => 'toggle.void',
                    'uses' => 'PatientStepAPIController@toggleVoid',
                ]);

        });
    }
}