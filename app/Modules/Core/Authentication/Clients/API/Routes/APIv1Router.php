<?php

namespace App\Modules\Core\Authentication\Clients\API\Routes;


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
            'prefix' => 'auth',
            'as' => 'auth.'
            ],
            function($router)
            {

            $router->post('/login', [
                'as' => 'get_all',
                'uses' => 'AuthAPIController@login',
            ]);

            $router->post('/logout', [
                'as' => 'store',
                'uses' => 'AuthAPIController@logout',
            ]);

            $router->post('/refresh', [
                'as' => 'store',
                'uses' => 'AuthAPIController@refresh',
            ]);

            $router->get('/user', [
                'as' => 'store',
                'uses' => 'AuthAPIController@user',
            ]);

        });
    }
}