<?php

namespace App\DesignPatterns\Fundamental\Delegation\Messengers;

/**
 * Class SmsMessenger
 * 
 * @package App\DesignPatterns\Fundamental\Delegation\Messengers
 */
class SmsMessenger extends AbstractMessenger
{
    /**
     * @return bool
     */
    public function send(): bool
    {
        \DebugBar::info('Sent by '.__METHOD__);

        return parent::send();
    }
}