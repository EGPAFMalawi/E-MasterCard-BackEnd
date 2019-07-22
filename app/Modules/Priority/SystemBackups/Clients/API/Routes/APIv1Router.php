<?php

namespace App\Modules\Priority\SystemBackups\Clients\API\Routes;


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
            'prefix' => 'system-backups',
            'as' => 'system_backups.',
            //'middleware' => 'auth:api'
            ],
            function($router)
            {

                $router->get('/', [
                    'as' => 'get_all',
                    'uses' => 'SystemBackupAPIController@getAll',
                ]);

                $router->post('/', [
                    'as' => 'store',
                    'uses' => 'SystemBackupAPIController@store',
                ]);

                $router->get('/{systemBackup}', [
                    'as' => 'get',
                    'uses' => 'SystemBackupAPIController@get',
                ]);

                $router->delete('/{systemBackup}', [
                    'as' => 'delete',
                    'uses' => 'SystemBackupAPIController@delete',
                ]);

                $router->get('/{systemBackup}/download', [
                    'as' => 'get.download',
                    'uses' => 'SystemBackupAPIController@download',
                ]);
        });
    }
}