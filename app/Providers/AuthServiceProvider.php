<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Dietista;
use App\Policies\DietistaPolicy;
use App\Policies\MenuPolicy;
use App\Models\Menu;
use App\Models\Paciente;
use App\Models\Plato;
use App\Policies\PacientePolicy;
use App\Policies\PlatoPolicy;



use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Dietista::class => DietistaPolicy::class,
        Menu::class => MenuPolicy::class,
        Paciente::class => PacientePolicy::class,
        Plato::class => PlatoPolicy::class,



    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
