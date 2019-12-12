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
class Product
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
    
    public function setPrice($price)
    {
        try {
            // save price
        } catch (\Exception $e) {
            // $this->logError($e->getMessage());
            $this->logger->log($e->getMessage());
        }
    }

    // //Нужно вынести в одтельный класс, т.к это другая ответственность
    // public function logError($error)
    // {
    //     logger()->error($error);
    // }
}