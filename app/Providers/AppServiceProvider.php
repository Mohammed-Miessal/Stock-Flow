<?php

namespace App\Providers;

use App\Models\Permission;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Interfaces\RoleInterface', 'App\Repositories\RoleRepository');
        $this->app->bind('App\Interfaces\PermissionInterface', 'App\Repositories\PermissionRepository');
        $this->app->bind('App\Interfaces\UserInterface', 'App\Repositories\UserRepository');
        $this->app->bind('App\Interfaces\CategoryInterface', 'App\Repositories\CategoryRepository');
        $this->app->bind('App\Interfaces\SubcategoryInterface', 'App\Repositories\SubcategoryRepository');
        $this->app->bind('App\Interfaces\UnitInterface', 'App\Repositories\UnitRepository');
        $this->app->bind('App\Interfaces\SupplierInterface', 'App\Repositories\SupplierRepository');
        $this->app->bind('App\Interfaces\CustomerInterface', 'App\Repositories\CustomerRepository');
        $this->app->bind('App\Interfaces\TaxInterface', 'App\Repositories\TaxRepository');
        $this->app->bind('App\Interfaces\ProductInterface', 'App\Repositories\ProductRepository');
        $this->app->bind('App\Interfaces\OrderInterface', 'App\Repositories\OrderRepository');
        $this->app->bind('App\Interfaces\InvoiceInterface', 'App\Repositories\InvoiceRepository');
        $this->app->bind('App\Interfaces\AuthInterface', 'App\Repositories\AuthRepository');
        // Enregistrez votre écouteur d'événements ici
        $this->app->bind('App\Events\ProductUpdated' , 'App\Listeners\UpdateProductStatus');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
        }

        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) : ?>";
});

Blade::directive('endrole', function ($role) {
return "<?php endif; ?>";
});
}
}
