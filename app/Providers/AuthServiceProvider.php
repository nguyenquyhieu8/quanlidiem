<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Group;
use App\Models\module;
use App\Models\Faculty;
use App\Models\Institute;
use App\Models\Evaluation;
use App\Models\SchoolYear;
use App\Policies\GroupPolicy;
use App\Policies\FacultyPolicy;
use App\Policies\InstitutePolicy;
use App\Policies\EvaluationPolicy;
use App\Policies\SchoolYearPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     Institute::class => InstitutePolicy::class,
    //     Group::class => GroupPolicy::class,
    //     Faculty::class => FacultyPolicy::class,
    //     SchoolYear::class => SchoolYearPolicy::class,
    //     Classroom::class => ClassroomPolicy::class,
    //     Evaluation::class => EvaluationPolicy::class,
    // ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // $moduleList = module::all();
        
        // if ($moduleList->count() > 0) {
        //     foreach ($moduleList as $module) {
        //         Gate::define($module->name, function (User $user) use ($module) {
        //             $roleJson = $user->group->permisstion ?? "";
        //             if (!empty($roleJson)) {
        //                 $roleArr = json_decode($roleJson, true);
        //                 $check = checkInput($roleArr, $module->name);
        //                 return $check;
        //             }
        //             return false;

        //         });
        //         // print_r($module->name.'<br>');
        //     }
        // }
    }

}
