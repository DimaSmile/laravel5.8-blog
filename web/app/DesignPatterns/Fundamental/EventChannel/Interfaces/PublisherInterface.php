<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;

/**
 * Interface PublisherInterface
 *
 * @package App\DesignPatterns\Fundamental\EventChannel\Interfaces
 */
interface PublisherInterface
{
    /**
     * Уведомление подписчиков
     *
     * @param string $data данные которыми уведомляеться подписчик
     *
     * @return mixed
     */
    public function publish($data);
}