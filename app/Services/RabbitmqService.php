<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitmqService
{

    private static function getConnect()
    {
        $config = config('queue.connections.rabbitmq.hosts');


    }
}
