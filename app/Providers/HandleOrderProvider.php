<?php

namespace App\Providers;

use App\Http\Controllers\HandleOrderController;
use App\Models\Order;
use App\Services\handleOrder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class HandleOrderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {        //
  


        //{pickr API services}
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
