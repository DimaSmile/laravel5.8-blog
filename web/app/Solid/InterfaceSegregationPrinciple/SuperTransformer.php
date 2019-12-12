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
 * @link https://ru.wikipedia.org/wiki/Принцип_разделения_интерфейса
 */
class SuperTransformer implements CarTransformerInterface, PlaneTransformerInterface, ShipTransformerInterface //NotRightTransformerInterface в данном случае лучше реализовать несколько интерфейсов
{
    public function toCar()
    {
        //реализация
    }
    public function toPlan()
    {
        //реализация
    }
    public function toShip()
    {
        //реализация
    }
}