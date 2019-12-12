<?php

namespace App\Solid\DependencyInversionPrinciple;

/**
 * Dependency Inversion Principle DIP (Принцип инверсии зависимостей)
 *
 * Объектом зависимости должна быть абстракция, а не что-то конкретное.
 * 
 * Можно передавать только объекты типа FoodProviderInterface
 *
 * @link https://ru.wikipedia.org/wiki/Принцип_инверсии_зависимостей
 */
class HighRankingMale
{
    protected $foodProvider;
    public function __construct(FoodProviderInterface $foodProvider)//зависимости строиться от абстракций
    {
        $this->foodProvider = $foodProvider;
    }
    public function eat()
    {
        $food = $this->foodProvider->getFood();
        // ...
    }
}