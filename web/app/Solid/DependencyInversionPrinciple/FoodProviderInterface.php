<?php

namespace App\Solid\DependencyInversionPrinciple;

/**
 * Dependency Inversion Principle DIP (Принцип инверсии зависимостей)
 *
 * Объектом зависимости должна быть абстракция, а не что-то конкретное.
 *
 * @link https://ru.wikipedia.org/wiki/Принцип_инверсии_зависимостей
 */
interface FoodProviderInterface
{
    public function getFood();
}