<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Config;

class Upgrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:upgrade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database looseless upgrade of existing migrations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //$this->version = (int) Config::build();
    }

    /**
     * Execute the console command.
     *
     * Based on Config::build
     * if current YmdHi is less than build value, then upgrade.
     * 
     * New instances of the appliation, derivatives of stable version should perform all upgrades.
     * 
     * @return int
     */
    public function handle()
    {
        if ($this->version < 202211201946){


        }
    }
}
