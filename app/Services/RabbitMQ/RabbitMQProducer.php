<?php

namespace App\Services\RabbitMQ;

use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQProducer
{
    protected $connection;

    protected $channel;

    /**
     * RabbitMQProducer constructor.
     */
    public function __construct()
    {
        $this->connection = app('rabbitmq');
        $this->channel = $this->connection->channel();
    }

    public function publish($message, $queue)
    {
        $this->channel->queue_declare($queue, false, true, false, false);

        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, '', $queue);
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
