<?php

namespace App\Solid\DependencyInversionPrinciple;

/**
 * Dependency Inversion Principle DIP (Принцип инверсии зависимостей)
 *
 * Объектом зависимости должна быть абстракция, а не что-то конкретное.
 * 
 * !!! НАРУШЕНИЕ ПРИНЦИПА !!!!
 * Жесткая привязка к объекту класса Wife
 *
 * @link https://ru.wikipedia.org/wiki/Принцип_инверсии_зависимостей
 */
class LowRankingMale
{
    //Жесткая привязка к объекту класса Wife
    public function eat()
    {
        $wife = new Wife();
        $food = $wife->getFood();
        // ...
    }
}