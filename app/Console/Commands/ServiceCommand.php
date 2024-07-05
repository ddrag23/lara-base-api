<?php

namespace App\Console\Commands;

use Binafy\LaravelStub\Facades\LaravelStub;
use Illuminate\Console\Command;

class ServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service} {--r=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make service for logical flow bussines';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $option = $this->option('r');
        $argument = $this->argument('service');

        LaravelStub::from(__DIR__ . '/../Stubs/service.stub')
            ->to(app_path() . '/Http/Services')
            ->name($argument)
            ->ext('php')
            ->replaces([
                'NAMESPACE' => 'App\Http\Services',
                'CLASS' => $argument,
                'REPO' => $option
            ])->generate();
    }
}
