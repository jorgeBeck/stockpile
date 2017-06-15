<?php

namespace App\Helpers\valida;

use Illuminate\Support\ServiceProvider;

class ValidaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      \App::bind('ValidaHelper', function()
      {
          return new \App\Helpers\valida\ValidaHelper;
      });
    }
}
