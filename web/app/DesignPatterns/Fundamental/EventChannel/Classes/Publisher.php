<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Classes;

use App\DesignPatterns\Fundamental\EventChannel\Interfaces\PublisherInterface;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\EventChannelInterface;

class Publisher implements PublisherInterface
{
    /**
     * @var string
     */
    private $topic;

    /**
     * @var EventChannelInterface
     */
    private $eventChannel;

    public function __construct($topic, EventChannelInterface $eventChannel)
    {
        $this->topic = $topic;

        $this->eventChannel = $eventChannel;
    }

    /**
     * Уведомление подписчиков
     *
     * @param string $data данные которыми уведомляеться подписчик
     *
     * @return mixed|void
     */
    public function publish($data)
    {
        $this->eventChannel->publish($this->topic, $data);
    }
}