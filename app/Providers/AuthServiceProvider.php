<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Penghimpunan;
use App\Models\Penyaluran;
use App\Models\User;
use App\Policies\PenghimpunanPolicy;
use App\Policies\PenyaluranPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Penghimpunan::class => PenghimpunanPolicy::class,
        Penyaluran::class => PenyaluranPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            $user->hasRole('admin');
        });
    }
}
