<?php

namespace App\DesignPatterns\Fundamental\EventChannel;

use App\DesignPatterns\Fundamental\EventChannel\Classes\Publisher;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Subscriber;
use App\DesignPatterns\Fundamental\EventChannel\Classes\EventChannel;

class EventChannelJob
{
    public function run()
    {
        $newsChannel = new EventChannel();

        $hightgardenGroup = new Publisher('hightgarden-news', $newsChannel);//поставщик(издатель)

        $winterfellNews = new Publisher('winterfell-news', $newsChannel);
        $winterfellDaily = new Publisher('winterfell-news', $newsChannel);

        $sansa = new Subscriber('Sansa Stark');
        $arya = new Subscriber('Arya Stark');
        $cersei = new Subscriber('Cersei Lannister');
        $snow = new Subscriber('John Snow');

        $newsChannel->subscribe('hightgarden-news', $cersei);
        $newsChannel->subscribe('winterfell-new', $sansa);

        $newsChannel->subscribe('hightgarden-news', $arya);
        $newsChannel->subscribe('winterfell-new', $arya);

        $newsChannel->subscribe('winterfell-new', $snow);

        $hightgardenGroup->publish('New hightgarden post');
        $winterfellNews->publish('New winterfell post');
        $winterfellDaily->publish('New alternative winterfellpost');
    }
}