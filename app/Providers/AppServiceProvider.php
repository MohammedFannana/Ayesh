<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


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
        Paginator::useBootstrapFive();

        // Gate للتحقق من صلاحية الوصول للوحة التحكم (Admin)
        Gate::define('access-admin', function ($user) {
            return $user->type === 'admin';
        });

        // Gate للتحقق من صلاحية الوصول لصفحات التسجيل (مسجل)
        Gate::define('access-registrations', function ($user) {
            return $user->type === 'registered' || $user->can('access-admin');
        });

        // Gate للتحقق من صلاحية الوصول لصفحات المراجعة (مراجع)
        Gate::define('access-review', function ($user) {
            return $user->type === 'references' || $user->can('access-admin');
        });

        // Gate للتحقق من صلاحية الوصول لصفحات الاعتماد (معتمد)
        Gate::define('access-certified', function ($user) {
            return $user->type === 'certified' || $user->can('access-admin');
        });

        // Gate للتحقق من صلاحية الوصول لصفحات المدفوعات (مدير مالي)
        Gate::define('access-financial', function ($user) {
            return $user->type === 'financial_manager' || $user->can('access-admin');
        });
    }
}
