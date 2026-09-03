<?php

namespace App\Providers;

use App\Models\arable_land;
use App\Models\Egg;
use App\Models\Farm_Animal;
use App\Models\FreshNut;
use App\Models\Fruit;
use App\Models\Vegetable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer(['dashboard', 'Arable_land.Arable_lands'], function ($view){
            $view->with('totalArea', arable_land::sum('area'));
        });


        $totalEgg = Egg::sum('qty');
        View::share('totalEgg', $totalEgg);


        $totalAnimal = Farm_Animal::sum('qty');
        View::share('totalAnimal', $totalAnimal);


        $totalFreshNut = FreshNut::sum('qty');
        View::share('totalFreshNut', $totalFreshNut);


        $totalVegetable = Vegetable::sum('qty');
        View::share('totalVegetable', $totalVegetable);


        $totalFruit = Fruit::sum('qty');
        View::share('totalFruit', $totalFruit);
    }
}
