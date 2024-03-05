<?php

namespace App\Services\RabbitMQ;

class RabbitMQConsumer
{
    protected $connection;

    protected $channel;

    /**
     * RabbitMQConsumer constructor.
     */
    public function __construct()
    {
        $this->connection = app('rabbitmq');
        $this->channel = $this->connection->channel();
    }

    public function consume($queue, $callback)
    {
        $this->channel->queue_declare($queue, false, true, false, false);

        $this->channel->basic_consume($queue, '', false, true, false, false, $callback);

        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }

    /**
     * @throws \Exception
     */
    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
