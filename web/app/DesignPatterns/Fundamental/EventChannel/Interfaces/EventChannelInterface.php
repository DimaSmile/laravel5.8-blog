<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

/**
 * Interface EventChannelInterface
 * 
 * @package App\DesignPatterns\Fundamental\EventChannel\Interfaces
 * 
 * Интерфейс канала событий
 * Связующее звено между подписчиками и издателями.
 */
interface EventChannelInterface
{
    /**
     * Издатель (publisher) уведомляет канал о том что надо 
     * всех кто подписан на тему $topic уведомить данными $data
     *
     * @param string $topic
     * @param        $data
     * @return mixed
     */
    public function publish($topic, $data);

    /**
     * Подписчик (subscriber) подписываеться на событие (данные, инфу и т.п) $topic
     *
     * @param string $topic
     * @param SubscriberInterface $Subscriber
     * @return mixed
     */
    public function subscribe($topic, SubscriberInterface $subscriber);
}