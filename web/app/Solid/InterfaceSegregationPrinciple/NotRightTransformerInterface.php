<?php

namespace App\Solid\InterfaceSegregationPrinciple;

/**
 * !!! НАРУШЕНИЕ ISP !!!
 * Нужно разделить этот интерфейс чтобы не нарушать принцип ISP
 * 
 * этот принцип указывает на то, 
 * что интерфейс должен решать лишь какую-то одну задачу 
 * (в этом он похож на принцип единственной ответственности), поэтому всё, 
 * что выходит за рамки этой задачи, должно быть вынесено в другой интерфейс или интерфейсы.
 */
interface NotRightTransformerInterface
{
    public function toCar();
    public function toPlan();
    public function toShip();
}