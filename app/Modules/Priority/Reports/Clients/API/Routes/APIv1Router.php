<?php

namespace App\Modules\Priority\Reports\Clients\API\Routes;


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
            'prefix' => 'reports',
            'as' => 'reports.',
//            'middleware' => 'auth:api'
            ],
            function($router)
            {

            $router->get('/counts', [
                'as' => 'get_counts',
                'uses' => 'ReportAPIController@getCounts',
            ]);

            $router->get('/patients', [
                'as' => 'get_patients',
                'uses' => 'ReportAPIController@getPatients',
            ]);

            $router->get('/export', [
                'as' => 'export',
                'uses' => 'ReportAPIController@exportPatients',
            ]);

            $router->get('/hts', [
                'as' => 'hts',
                'uses' => 'ReportAPIController@getHTS',
            ]);

            $router->get('/hts/export', [
                'as' => 'hts.export',
                'uses' => 'ReportAPIController@exportHTS',
            ]);

                $router->get('/test', [
                    'as' => 'hts.export',
                    'uses' => 'ReportAPIController@test',
                ]);
        });
    }
}