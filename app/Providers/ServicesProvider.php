<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UsuarioServiceInterface;
use App\Services\UsuarioService;

class ServicesProvider extends ServiceProvider
{
    public array $bindings = [

        UsarioServiceInterface::class => UsuarioService::class,
        RegistroSonoServiceInterface::class => RegistroSonoService::class,
        BFServiceInterface::class => BFService::class,
        AlimentacaoServiceInterface::class => AlimentacaoService::class,
        AvaliacaoServiceInterface::class => AvaliacaoService::class,
        ExercicioServiceInterface::class => ExercicioService::class,
        MetasServiceInterface::class => MetasService::class,
        HistoricoPesoServiceInterface::class => HistoricoService::class,
    ];
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
    public function boot(): void
    {
        //
    }
}
