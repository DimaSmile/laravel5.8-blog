<?php

namespace App\Solid\LiskovSubstitutionPrinciple;

/**
 * Изменяет поведение.
 * !!! Тем самым НАРУШАЕТ принцип LSP !!!
 * 
 * @link https://ru.wikipedia.org/wiki/Принцип_подстановки_Барбары_Лисков
 */
class Penguin extends Bird
{
    // этот метод возвращает не характерный результат
    public function fly()
    {
        return 'I can\'t fly';
    }

    public function swim()
    {
        $swimSpeed = 3;
        return $swimSpeed;
    }
}