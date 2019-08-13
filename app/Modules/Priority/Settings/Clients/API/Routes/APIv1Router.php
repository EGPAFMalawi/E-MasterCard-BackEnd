<?php

namespace App\Modules\Priority\Settings\Clients\API\Routes;


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
            'prefix' => 'settings',
            'as' => 'settings.',
           // 'middleware' => 'auth:api'
        ],
            function($router)
            {

            $router->get('/', [
                'as' => 'get_all',
                'uses' => 'SettingAPIController@getAll',
            ]);

            $router->get('/{setting}', [
                'as' => 'get',
                'uses' => 'SettingAPIController@get',
            ]);

            $router->patch('/{setting}', [
                'as' => 'update',
                'uses' => 'SettingAPIController@update',
            ]);
        });
    }
}
