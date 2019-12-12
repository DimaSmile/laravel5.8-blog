<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;

class FundamentalPatternsController extends Controller
{
    /**
     * Контейнер свойств (property container)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @trows \Exception
     */
    public function PropertyContainer()
    {

        $item = new BlogPost();

        $item->setTitle('Заголовок статьи');
        $item->setCategory(10);

        $item->addProperty('view_count', 100);

        $item->addProperty('last_update', '2030-02-01');
        $item->setProperty('last_update', '2030-02-02');
        // $item->setProperty('tttt', '2030-02-02'); // throw exception property not found

        $item->addProperty('read_only', true);
        $item->deleteProperty('read_only');
        dd($item);
    }

    public function Delegation()
    {
        $name = 'Делегирование(Delegation)';

        $item = new AppMessenger();

        $item->setSender('sender@mail.com')
             ->setRecipient('recipient@mail.com')
             ->setMessage('Hello EMAIL messenger!!!')
             ->send();

        \DebugBar::info($item);

        $item->toSms()
             ->setSender(11111111111)
             ->setRecipient(22222222)
             ->setMessage('Hello SMS messenger!!!')
             ->send();

        \DebugBar::info($item);

        return view('dump', compact('name', 'item'));
    }
}