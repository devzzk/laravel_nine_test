<?php

namespace App\Console\Commands;

use App\Services\RabbitMQ\RabbitMQConsumer;
use Illuminate\Console\Command;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConsumerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consumer';

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
        $consumer = new RabbitMQConsumer();
        $consumer->consume('default', function (AMQPMessage $message) {
            $this->info('Received message: '.$message->body);

            logger()->debug('Received message: '.$message->body);
        });

        return Command::SUCCESS;
    }
}
