<?php

namespace App\Solid\OpenClosedPrinciple;

/**
 * Open Closed Principle, OCP (Принцип открытости / закрытости)
 * 
 * Программные сущности (классы, модули, функции и т. п.) 
 * должны быть открыты для расширения,
 * но закрыты для изменения
 *
 * @link https://ru.wikipedia.org/wiki/Принцип_открытости/закрытости
 */
class FileLogger implements LoggerInterface
{
    public function log($error)
    {
        $this->saveToFile($error);
    }

    private function saveToFile($error)
    {
        logger()->error($error);
    }
}