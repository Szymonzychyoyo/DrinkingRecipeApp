<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Recipe;
use App\Policies\RecipePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Mapowanie modeli na ich polityki.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Recipe::class => RecipePolicy::class, // Rejestracja polityki dla modelu Recipe
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies(); // Rejestracja polityk

        //
    }
}
