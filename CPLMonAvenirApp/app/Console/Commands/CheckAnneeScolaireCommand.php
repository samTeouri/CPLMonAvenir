<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckAnneeScolaireCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-annee-scolaire-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $kernel = app(\Illuminate\Contracts\Console\Kernel::class);
        $kernel->call('check:annee-scolaire');
    }
}
