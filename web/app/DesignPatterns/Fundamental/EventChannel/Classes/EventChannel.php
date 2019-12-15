<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Classes;

use Debugbar;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterface;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\EventChannelInterface;

/**
 * Class EventChannel
 *
 * @package App\DesignPatterns\Fundamental\EventChannel\Classes
 */
class EventChannel implements EventChannelInterface
{
    /**
     * @var array
     */
    private $topics = [];

    /**
     * @param string $topic
     * @param SubscriberInterface $subscriber
     */
    public function subscribe($topic, SubscriberInterface $subscriber)
    {
        $this->topics[$topic][] = $subscriber;

        $msg = "{$subscriber->getName()} подписан(-a) на [{$topic}]";
        DebugBar::debug($msg);
    }

    /**
     * @param string $topic
     * @param string $data
     */
    public function publish($topic, $data)
    {
        if (empty($this->topics[$topic])) {
            return;
        }

        foreach ($this->topics[$topic] as $subscriber) {
            /** @var SubscriberInterface $subscriber*/
            $subscriber->notify($data);
        }
    }
}