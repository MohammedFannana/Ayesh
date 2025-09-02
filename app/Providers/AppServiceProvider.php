<?php

namespace App\Providers;

use App\Models\Orphan;
use App\Models\SupporterField;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

        // $user = Auth::user();
        // App::setlocale($user->locale);



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

        // Gate للتحقق من صلاحية الوصول لصفحات التسويق (مراجع)
        Gate::define('access-marketer', function ($user) {
            return $user->type === 'marketer' || $user->can('access-admin');
        });


        // صلاحية لمنع اليتيم الانتقال من حالة الاعتماد الا بعد اكمال البيانات

        Gate::define('has-certified-extra', function ($user, Orphan $orphan) {
            return $orphan->certified_orphan_extras()->exists();
        });


        // لمنع اليتيم من اكمال بيانات التقديم للجكعية اكثر من مرة
        Gate::define('has-filled-fields', function ($user, $orphan) {
            // احصل على الحقول المطلوبة لهذا المتبرع
            $requiredFields = SupporterField::where('supporter_id', $orphan->marketing->supporter_id)->pluck('id')->toArray();

            // احصل على الحقول التي تم ملؤها لهذا اليتيم
            $filledFields = $orphan->supporterFieldValues()->whereNotNull('value')->pluck('supporter_field_id')->toArray();

            // قارن بين الحقول المطلوبة والحقول المملوءة
            return empty(array_diff($requiredFields, $filledFields));
        });

    }
}
