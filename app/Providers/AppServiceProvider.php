<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UsuarioServiceInterface::class, UsuarioService::class);
        $this->app->bind(RegistroSonoServiceInterface::class, RegistroSonoService::class);
        $this->app->bind(BFServiceInterface::class, BFService::class);
        $this->app->bind(AlimentacaoServiceInterface::class, AlimentacaoService::class);
        $this->app->bind(AvaliacaoServiceInterface::class, AvaliacaoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
