<?php

namespace App\Solid\SingleResponsibilityPrinciple;

/**
 * Single Responsibility Principle (SRP) (Принцип единственной ответственности).
 *
 * Каждый объект должен иметь одну ответственность 
 * и эта ответственность должна быть полностью инкапсулирована в класс
 *
 * @link https://ru.wikipedia.org/wiki/Принцип_единственной_ответственности
 */
class Logger
{
    //вынесли запись логов в одтельный класс, по Single Responsibility Principle
    public function log($error)
    {
        $this->saveToFile($error);
    }

    private function saveToFile($error)
    {
        logger()->error($error);
    }
}