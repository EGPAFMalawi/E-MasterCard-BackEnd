<?php

namespace App\Modules\Priority\ActivityLogs\Clients\API\Routes;


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
            'prefix' => 'activity-logs',
            'as' => 'activity_logs.',
            //'middleware' => 'auth:api'
            ],
            function($router)
            {

                $router->get('/', [
                    'as' => 'get_all',
                    'uses' => 'ActivityLogAPIController@getAll',
                ]);

                $router->get('/{activityLog}', [
                    'as' => 'get',
                    'uses' => 'ActivityLogAPIController@get',
                ]);

                $router->get('/user/{user}', [
                    'as' => 'get.user',
                    'uses' => 'ActivityLogAPIController@getAllForUser',
                ]);
        });
    }
}