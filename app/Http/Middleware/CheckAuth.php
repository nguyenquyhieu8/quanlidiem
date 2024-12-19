<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $restrictedRoutes = [
            // 'quantri.cutoff_scores.editByYear',
            // 'quantri.cutoff_scores.updateByYear',
            // 'quantri.cutoff_scores.destroy',
            // 'quantri.cutoff_scores.create',
            // 'quantri.cutoff_scores.store',
            // 'quantri.cutoff_scores.edit',
            // 'quantri.cutoff_scores.update',
        //     'quantri.user.store',
        //     'quantri.user.update',
        //     'quantri.user.destroy',
        //     'quantri.user.create',
        //     'quantri.user.edit',
        //     'quantri.applicants.store',
        //     'quantri.applicants.destroy',
        //     'quantri.applicants.update',
        //     'quantri.applicants.create',
        //     'quantri.applicants.edit',
        //     'quantri.feedback.store',
        //     'quantri.feedback.update',
        //     'quantri.feedback.destroy',
        //     'quantri.feedback.create',
        //     'quantri.feedback.edit',
        //     'quantri.majors.store',
        //     'quantri.majors.update',
        //     'quantri.majors.destroy',
        //     'quantri.majors.create',
        //     'quantri.majors.edit',
        //     'quantri.subject_blocks.store',
        //     'quantri.subject_blocks.update',
        //     'quantri.subject_blocks.destroy',
        //     'quantri.subject_blocks.create',
        //     'quantri.subject_blocks.edit',
        //     'quantri.province.store',
        //     'quantri.province.update',
        //     'quantri.province.destroy',
        //     'quantri.province.create',
        //     'quantri.province.edit',
        //     'quantri.school_years.destroy',
        // ];

        // Danh sách các route bị hạn chế
        $restrictedRoutes = [

            'quantri.cutoff_scores.editByYear',
            'quantri.cutoff_scores.updateByYear',
            'quantri.cutoff_scores.destroy',
            'quantri.cutoff_scores.create',
            'quantri.cutoff_scores.store',
            'quantri.cutoff_scores.edit',
            'quantri.cutoff_scores.update',
            // 'quantri.applicants.store',
            // 'quantri.applicants.index',
            // 'quantri.applicants.destroy',
            // 'quantri.applicants.update',
            // 'quantri.applicants.create',
            // 'quantri.applicants.edit',
            // 'quantri.feedback.store',
            // 'quantri.feedback.index',
            // 'quantri.feedback.update',
            // 'quantri.feedback.destroy',
            // 'quantri.feedback.create',
            // 'quantri.feedback.edit',
            // 'quantri.majors.store',
            // 'quantri.majors.index',
            // 'quantri.majors.update',
            // 'quantri.majors.destroy',
            // 'quantri.majors.create',
            // 'quantri.majors.edit',
            // 'quantri.subject_blocks.store',
            // 'quantri.subject_blocks.index',
            // 'quantri.subject_blocks.update',
            'quantri.subject_blocks.destroy',
            // 'quantri.subject_blocks.create',
            // 'quantri.subject_blocks.edit',
            // 'quantri.province.store',
            // 'quantri.province.index',
            // 'quantri.province.update',
            // 'quantri.province.destroy',
            // 'quantri.province.create',
            // 'quantri.province.edit',
            'quantri.school_years.destroy',
        ];

        if (Auth::check() && Auth::user()->role_id == 2) {
            foreach ($restrictedRoutes as $route) {
                if ($request->routeIs($route)) {
                    return redirect('/unauthorized')->with('error', 'Access denied.');
                }
            }
        }

        return $next($request);
    }
}
