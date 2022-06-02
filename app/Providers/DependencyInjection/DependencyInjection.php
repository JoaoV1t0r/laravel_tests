<?php


namespace App\Providers\DependencyInjection;


use Illuminate\Support\Collection;
use Illuminate\Contracts\Foundation\Application;

abstract class DependencyInjection
{
    private Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public static function providers(Application $app): Collection
    {
        return collect([
            new UsersDi($app),
        ]);
    }

    public function configure(): void
    {
        $configurations = array_merge(
            $this->daoConfigurations(),
            $this->repositoriesConfigurations(),
            $this->servicesConfiguration(),
            $this->mappersConfiguration()
        );
        foreach ($configurations as $configuration) {
            $this->app->bind($configuration[0], $configuration[1]);
        }
    }

    abstract protected function daoConfigurations(): array;

    abstract protected function repositoriesConfigurations(): array;

    abstract protected function servicesConfiguration(): array;

    abstract protected function mappersConfiguration(): array;
}
