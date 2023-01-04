<?php
namespace AppApproval;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApprovalServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //load migration
        $this->loadMigrationsFrom([
            base_path('app_approval/migrations')
        ]);
        //load views
        $this->loadViewsFrom(base_path('app_approval/views'), 'Approval');
        //load routes
        Route::middleware('web')
            ->group(base_path('app_approval/approval_routes.php'));
    }
}
