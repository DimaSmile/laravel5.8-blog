<?php

namespace App\DesignPatterns\Fundamental\EventChannel\Classes;

use Debugbar;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterface;

class Subscriber implements SubscriberInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * Subscriber constructor
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $data
     *
     * @return mixed|void
     */
    public function notify($data)
    {
        $msg = "{$this->getName()} оповещен(a) данными [{$data}]";

        DebugBar::info($msg);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}