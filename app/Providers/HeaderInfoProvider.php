<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderInfoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $categories = Category::where("status","1")->get();
        $collections = Collection::where("status","1")->get();
        View::share("categories",$categories);
        View::share("collections",$collections);
      
    }
}
