<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe\StripeClient;

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
        $stripe = new StripeClient('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

        $result = $stripe->paymentIntents->create(
            ['amount' => 500, 'currency' => 'cny', 'payment_method' => 'pm_card_cn']
        )->toArray();
        dd($result);

    }
}
