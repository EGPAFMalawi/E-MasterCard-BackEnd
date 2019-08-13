<?php

namespace App\Modules\Priority\ActivityLogs\Other\Providers;

use App\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Modules\Priority\ActivityLogs\Data\Repositories\ActivityLogRepository;

use App\Modules\Priority\ActivityLogs\Clients\API\Routes\APIv1Router;


class RouteServiceProvider extends ServiceProvider
{
  /**
   * This namespace is applied to your controller routes.
   *
   * In addition, it is set as the URL generator's root namespace.
   *
   * @var string
   */
  protected $namespaces = [
        'api' => 'App\Modules\Priority\ActivityLogs\Clients\API\Controllers'
    ];

  /**
   * Define your route model bindings, pattern filters, etc.
   *
   * @return void
   */
  public function boot()
  {
      $this->registerRouteBindings();

      parent::boot();
  }

  public function registerRouteBindings()
  {
      Route::bind('activityLog',function ($value){
          $activityLog = App::make(ActivityLogRepository::class)->get($value);

          return $activityLog?$activityLog : abort(404, 'ActivityLog not found');
      });
  }

  /**
   * Define the routes for the application.
   *
   * @return void
   */
  public function map()
  {
      $this->mapApiRoutes();
  }


  /**
   * Define the "api" routes for the application.
   *
   * These routes are typically stateless.
   *
   * @return void
   */
  protected function mapApiRoutes()
  {
      Route::group([
               'prefix' => 'api',
               'as' => 'api.',
               'middleware' => 'api',
               'namespace' => $this->namespaces['api']
           ],function($router){
              $router->group([
                              'prefix' => 'v1',
                              'as' => 'v1.'
                            ],function($router){
                              App::makeWith(APIv1Router::class,['router' => $router])->run();
                            });
           });
  }
}
