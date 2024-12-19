<?php

namespace App\Providers;

use App\Models\Classroom;
use App\Models\SchoolYear;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrapFour();

        // View::composer('*', function ($view) {
        //     $schoolYear = SchoolYear::where('is_active', 0)->get();

        //     $classroom = Classroom::where(function ($query) {
        //         $query->where('Class_Leader', Auth::id())
        //             ->orWhere('class_advisor', Auth::id());
        //     })->first();
        //     if ($classroom) {
        //         $view->with(['schoolYear' => $schoolYear, 'classroom' => $classroom]);
        //     } else {
        //         $view->with(['schoolYear' => $schoolYear]);
        //     }
        // });
    }

}
