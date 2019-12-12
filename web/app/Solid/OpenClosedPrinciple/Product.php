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
class Product
{
    /**
     * @var Logger
     */
    private $logger;

    // принимаем любой класс реализующий LoggerInterface (типа LoggerInterface)
    // что-бы можно было легко менять запись логов в базу или в файла (FileLogger to DBLogger)
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    
    public function setPrice($price)
    {
        try {
            // save price in db
        } catch (\Exception $e) {
            $this->logger->log($e->getMessage());
        }
    }
}