<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Menu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $user = auth()->user();
            $company_id = null;

            if ($user) {
                $company = Company::where('user_id', $user->id)->first();
                if ($company) {
                    $company_id = $company->id;
                } elseif (!is_null($user->company_id)) {
                    $company_id = $user->company_id;
                }
            }

            $menuNames = [];
            if ($company_id) {
                $menuNames = Menu::whereIn('key', [
                    'follow_up_' . $company_id,
                    'create_follow_up_' . $company_id,
                    'priority_' . $company_id,
                    'domain_class_' . $company_id,
                    'student_' . $company_id,
                    'admission_' . $company_id,
                    'student_fees_' . $company_id,
                    'student_fees_dashboard_create_' . $company_id,
                    'calendar_' . $company_id,
                    'event_' . $company_id,
                    'user_' . $company_id,
                ])->pluck('name', 'key');
            }

            // Pass both variables to all views
            $view->with([
                'menuNames' => $menuNames,
                'company_id' => $company_id
            ]);
        });
    }
}
