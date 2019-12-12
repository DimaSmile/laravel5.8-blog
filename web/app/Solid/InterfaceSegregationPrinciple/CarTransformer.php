<?php

namespace App\Solid\InterfaceSegregationPrinciple;

/**
 * Interface Segregation Principle, ISP (Принцип разделения интерфейса)
 * Создавайте узкоспециализированные интерфейсы, предназначенные для конкретного клиента.
 * Клиенты не должны зависеть от интерфейсов, которые они не используют.
 * 
 * Кроме того, этот принцип указывает на то, 
 * что интерфейс должен решать лишь какую-то одну задачу 
 * (в этом он похож на принцип единственной ответственности), поэтому всё, 
 * что выходит за рамки этой задачи, должно быть вынесено в другой интерфейс или интерфейсы.
 * 
 * Если бы не разделили NotRightTransformerInterface на несколько маленьких интерфейсов,
 * пришлось бы делать методы заглушки
 * @link https://ru.wikipedia.org/wiki/Принцип_разделения_интерфейса
 */
class CarTransformer implements CarTransformerInterface
{
    public function toCar()
    {
        //реализация
    }

    /*
        Если реализовывать NotRightTransformerInterface то надо делать заглушки
    */
    // public function toPlan()
    // {
    //     //заглушка
    //     throw or something else
    // }
    // public function toShip()
    // {
    //     //заглушка
    //      throw or something else
    // }
}