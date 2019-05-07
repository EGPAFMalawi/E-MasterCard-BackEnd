<?php

namespace App\Modules\Priority\HTSRecords\Clients\API\Routes;


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
            'prefix' => 'hts-records',
            'as' => 'hts_records.',
//            'middleware' => 'auth:api'
            ],
            function($router)
            {

                $router->get('/', [
                    'as' => 'get_all',
                    'uses' => 'HTSRecordAPIController@getAll',
                ]);

                $router->get('/{HTSRecord}', [
                    'as' => 'get',
                    'uses' => 'HTSRecordAPIController@get',
                ]);

                $router->post('/', [
                    'as' => 'store',
                    'uses' => 'HTSRecordAPIController@store',
                ]);

                $router->patch('/{HTSRecord}', [
                    'as' => 'update',
                    'uses' => 'HTSRecordAPIController@update',
                ]);

        });
    }
}