<?php

namespace App\Solid\LiskovSubstitutionPrinciple;

/**
 * Liskov Substitution Principle LSP (Принцип подстановки Барбары Лисков)
 * Необходимо, чтобы подклассы могли бы служить заменой для своих суперклассов.
 * Наследующий класс должен дополнять, а не изменять базовый.
 * 
 * @link https://ru.wikipedia.org/wiki/Принцип_подстановки_Барбары_Лисков
 */
class BirdRun
{
    /**
     * @var Bird
     */
    private $bird;

    public function __construct(Bird $bird)
    {
        $this->bird = $bird;
    }

    public function run()
    {
        return $this->bird->fly();
    }
}