<?php

namespace App\Solid\DependencyInversionPrinciple;

/**
 * Dependency Inversion Principle DIP (Принцип инверсии зависимостей)
 *
 * Объектом зависимости должна быть абстракция, а не что-то конкретное.
 * 
 * !!! НАРУШЕНИЕ ПРИНЦИПА !!!!
 * Уже лучше но можно передавать только объекты класса Wife или потомков
 *
 * @link https://ru.wikipedia.org/wiki/Принцип_инверсии_зависимостей
 */
class AverageRankingMale
{
    protected $wife;
    public function __construct(Wife $wife) //это зависимость от детали, а зависимости должны строиться от абстракций как в HighRankingMale
    {
        $this->wife = $wife;
    }
    public function eat()
    {
        $food = $this->wife->getFood();
        // ...
    }
}