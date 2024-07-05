<?php

namespace App\Console\Commands;

use Binafy\LaravelStub\Facades\LaravelStub;
use Illuminate\Console\Command;

LaravelStub::class;
class RepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {repository} {--m=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make repository file for logical model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $option = $this->option('m');
        $argument = $this->argument('repository');

        LaravelStub::from(__DIR__ . '/../Stubs/repository.stub')
            ->to(app_path() . '/Http/Repositories')
            ->name($argument)
            ->ext('php')
            ->replaces([
                'NAMESPACE' => 'App\Http\Repositories',
                'CLASS' => $argument,
                'MODEL' => $option
            ])->generate();
    }
}
