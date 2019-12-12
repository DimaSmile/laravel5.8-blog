<?php

namespace App\Solid\LiskovSubstitutionPrinciple;

/**
 * Дочерний класс от bird
 * Не изменяет поведение но дополняет.
 * Не нарушает принцип LSP
 * 
 * @link https://ru.wikipedia.org/wiki/Принцип_подстановки_Барбары_Лисков
 */
class Duck extends Bird
{
    public function fly()
    {
        $flySpeed = 8;
        return $flySpeed;
    }

    public function swim()
    {
        $swimSpeed = 3;
        return $swimSpeed;
    }
}