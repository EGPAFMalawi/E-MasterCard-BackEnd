<?php

namespace App\Modules\Core\PersonNames\Clients\API\Routes;


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
        /*$this->router->group([
            'prefix' => 'person-names',
            'as' => 'person_names.',
            'middleware' => 'auth:api'
            ],
            function($router)
            {

        });*/
    }
}