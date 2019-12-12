<?php

namespace App\Http\Controllers;

use App\Solid\DependencyInversionPrinciple\AverageRankingMale;
use App\Solid\DependencyInversionPrinciple\HighRankingMale;
use App\Solid\DependencyInversionPrinciple\LowRankingMale;
use App\Solid\DependencyInversionPrinciple\Restaurant;
use App\Solid\DependencyInversionPrinciple\Wife;
use App\Solid\InterfaceSegregationPrinciple\CarTransformer;
use App\Solid\InterfaceSegregationPrinciple\SuperTransformer;
use App\Solid\LiskovSubstitutionPrinciple\Bird;
use App\Solid\LiskovSubstitutionPrinciple\BirdRun;
use App\Solid\LiskovSubstitutionPrinciple\Duck;
use App\Solid\LiskovSubstitutionPrinciple\Penguin;
use Illuminate\Routing\Controller;
use App\Solid\OpenClosedPrinciple\DBLogger;
use App\Solid\OpenClosedPrinciple\FileLogger;
use App\Solid\SingleResponsibilityPrinciple\Logger;
use App\Solid\OpenClosedPrinciple\Product as OpenClosedPrincipleProduct;
use App\Solid\SingleResponsibilityPrinciple\Product as SingleResponsibilityPrincipleProduct;

/**
 * SOLID
 * 
 * S: Single Responsibility Principle (Принцип единственной ответственности).
 * O: Open-Closed Principle (Принцип открытости-закрытости).
 * L: Liskov Substitution Principle (Принцип подстановки Барбары Лисков).
 * I: Interface Segregation Principle (Принцип разделения интерфейса).
 * D: Dependency Inversion Principle (Принцип инверсии зависимостей).
 */
class Solid extends Controller
{

    /**
     * S - Single responsibility principle
     * принцип единственной обязанности(ответственности)
     */
    public function SingleResponsibilityPrinciple()
    {
        $logger = new Logger();
        $product = new SingleResponsibilityPrincipleProduct($logger);
        $product->setPrice(10);
    }

    /**
     * O - Open-Closed Principle
     * Принцип открытости-закрытости
     */
    public function OpenClosedPrinciple()
    {
        $fileLogger = new FileLogger();
        $dbLogger = new DBLogger();
        $product = new OpenClosedPrincipleProduct($fileLogger/* можем передать любой объект типа LoggerInterface (реализацию интерфейса LoggerInterface) */); 
        $product->setPrice(10);
    }

    /**
     * L - Liskov Substitution Principle 
     * Принцип подстановки Барбары Лисков.
     */
    public function LiskovSubstitutionPrinciple()
    {
        // $bird = new Bird();
        $bird = new Duck(); //Если подставим Duck вместо Bird поведение не поменяеться

        /*
            Если подставим Penguin вместо Bird 
            мы нарушим принцип LSP потомучто метод fly вернет не ожиданный результат
        */
        $bird = new Penguin();

        $birdRun = new BirdRun($bird);
        $birdRun->run();
    }

    /**
     * I - Interface Segregation Principle
     * Принцип разделения интерфейса
     */
    public function InterfaceSegregationPrinciple()
    {
        $carTransformer = new CarTransformer();
        $superTransformer = new SuperTransformer();
    }

    /**
     * D - Dependency Inversion Principle
     * Принцип инверсии зависимостей
     */
    public function DependencyInversionPrinciple()
    {
        $bad = new LowRankingMale();

        $wife = new Wife();
        $better = new AverageRankingMale($wife);//можно передавать объекты класса Wife или потомков
        
        $restaurant = new Restaurant();
        $best1 = new HighRankingMale($wife);//можно передавать объекты типа FoodProviderInterface, т.е те которые реализовуют FoodProviderInterface интерфейс
        $best2 = new HighRankingMale($restaurant);//можно передавать объекты типа FoodProviderInterface, т.е те которые реализовуют FoodProviderInterface интерфейс
        $best1->eat();
        $best2->eat();
    }
}
