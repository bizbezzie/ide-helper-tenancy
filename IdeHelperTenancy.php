<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Multitenancy\Models\Tenant;

class IdeHelperTenancy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:tenancy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create All Ide Helpers in Tenancy';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('tenants:artisan "ide-helper:eloquent" --tenant=1');
        Artisan::call('tenants:artisan "ide-helper:generate -M" --tenant=1');
        Artisan::call('tenants:artisan "ide-helper:meta" --tenant=1');
        Artisan::call('tenants:artisan "ide-helper:models -W" --tenant=1');
        return Artisan::output();
    }
}
