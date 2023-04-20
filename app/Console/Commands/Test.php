<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $admin = Admin::create([
//            'name' => 'admin',
//            'email' => 'admin@gmail.com',
//            'password' => '111111',
//        ]);
    }
}
